<?php 
/**
* 
*/
class Gallery
{
	
	protected $_db;
	protected $_pdo;

	/**
	 *	Create an Instance of the connection of the database in the constructor.
	 */
	public function __construct() {
		$_db = new Db;
		$this->_pdo = $_db->connect();
	}

	public function generate_id () {
		try {
			$smt = $this->_pdo->query("SELECT id, generated_id FROM tbl_albums ORDER BY id DESC limit 1");
			$result = $smt->fetch();
			$id = "";
			if (!$result) {
				$id = 1;
			} else {
				$latest_id = $result['generated_id'];
				$id = $latest_id+1;
			}

			return $id;
			
		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
	}


public function insert_generated_id ($id) {
		try {
			$q1 = $this->_pdo->prepare("INSERT INTO tbl_albums (generated_id) VALUES (?)");
			$q1->bindparam(1, $id);
		 	$q1->execute();
		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
}


public function save_image($filename, $id) {
	try {
			$q1 = $this->_pdo->prepare("INSERT INTO tbl_images (file_name, album_id) VALUES (?,?)");
			$q1->bindparam(1, $filename);
			$q1->bindparam(2, $id);
		 	$q1->execute();
		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
}

public function save_album($id, $name, $description) {
	try {
			$q1 = $this->_pdo->prepare("UPDATE tbl_albums SET album_name = ? , album_description = ? WHERE generated_id = ?");
			$q1->bindparam(1, $name);
			$q1->bindparam(2, $description);
			$q1->bindparam(3, $id);
		 	$q1->execute();
		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
}

public function get_all_albums () {
	try {
			$smt = $this->_pdo->prepare("SELECT * FROM tbl_albums WHERE isdeleted = 0 AND album_name IS NOT NULL ORDER BY id DESC");
			$smt->execute();
			$result = $smt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		} catch (PDOException $e) {
				throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
}

public function get_album_by_id ($id) {
  try {
			$smt = $this->_pdo->prepare("SELECT * FROM tbl_albums WHERE generated_id = ?");
			$smt->bindparam(1,$id);
			$smt->execute();
			$result = $smt->fetch();
			return $result;
		} catch (PDOException $e) {
				throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
}

public function get_images ($id) {
		try {
			$smt = $this->_pdo->prepare("SELECT * FROM tbl_images WHERE isdeleted = 0 AND album_id =  ? ORDER BY id DESC");
			$smt->bindparam(1,$id);
			$smt->execute();
			$result = $smt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		} catch (PDOException $e) {
				throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
}

public function delete_image($id) {
	  try {
			$smt = $this->_pdo->prepare("UPDATE tbl_images set isdeleted = 1 WHERE id = ?");
			$smt->bindparam(1,$id);
			$smt->execute();
			return $result;
		} catch (PDOException $e) {
				throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
}


public function update_album($id, $name, $desc) {
	try {
			$smt = $this->_pdo->prepare("UPDATE tbl_albums set album_name = ?, album_description = ? WHERE generated_id = ?");
			$smt->bindparam(1,$name);
			$smt->bindparam(2,$desc);
			$smt->bindparam(3,$id);
			$smt->execute();
		} catch (PDOException $e) {
				throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
}


public function delete_album($id) {
	 try {
			$smt = $this->_pdo->prepare("UPDATE tbl_albums SET isdeleted = 1 WHERE generated_id = ?");
			$smt->bindparam(1,$id);
			$smt->execute();
			return $result;
		} catch (PDOException $e) {
				throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
}


}