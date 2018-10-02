<?php 
/**
* 
*/
class Theme
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

	public function get_theme_by_id($id) {
		try {
			$smt = $this->_pdo->prepare("SELECT * FROM tbl_themes WHERE id = ?");
			$smt->bindparam(1,$id);
			$smt->execute();
			$result = $smt->fetch();
			return $result;
		} catch(PDOException $e) {
		 			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		 		}
	}

	public function save_theme($title,$description) {
		try {
			$smt = $this->_pdo->prepare("INSERT INTO tbl_themes (title, description) VALUES(?,?)");
			$smt->bindparam(1,$title);
			$smt->bindparam(2,$description);
			$smt->execute();
		}  catch(PDOException $e) {
		 			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		 		}
	}


	public function get_all_themes(){
		try {
			$smt = $this->_pdo->query("SELECT * FROM tbl_themes ORDER BY is_posted DESC");
			$result = $smt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		} catch (PDOException $e) {
			throw new Exception( $e->getMessage( ) , $e->getCode( ) );	
		}
	}

	public function post_unpost($id) {
		try {
			$query1 = $this->_pdo->prepare("UPDATE tbl_themes SET is_posted = 1 where id = ?");
			$query1->bindparam(1,$id);
			$query1->execute();

			$query2 = $this->_pdo->prepare("UPDATE tbl_themes SET is_posted = 0 where id <> ?");
			$query2->bindparam(1,$id);
			$query2->execute();

		} catch (PDOException $e) {
			throw new Exception( $e->getMessage( ) , $e->getCode( ) );	
		}
	}

	public function update_theme($title,$description,$id) {
		try {
			$smt = $this->_pdo->prepare("UPDATE tbl_themes SET title = ? , description = ? where id = ?");
			$smt->bindparam(1,$title);
			$smt->bindparam(2,$description);
			$smt->bindparam(3,$id);
			$smt->execute();

		} catch (PDOException $e) {
			throw new Exception( $e->getMessage( ) , $e->getCode( ) );	
		}
	}

	public function delete_theme($id){
		try {
			$smt = $this->_pdo->prepare("DELETE FROM tbl_themes where id = ?");
			$smt->bindparam(1,$id);
			$smt->execute();
		} catch (PDOException $e) {
			throw new Exception( $e->getMessage( ) , $e->getCode( ) );	
		}
	}
	


	



} //end of class

 ?>