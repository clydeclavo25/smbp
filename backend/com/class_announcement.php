<?php 
/**
* 
*/
class Announcement
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

	public function save_announcement($title,$content) {
		try {
			$smt = $this->_pdo->prepare("INSERT INTO tbl_announcements (title,content) VALUES (?,?)");
			$smt->bindparam(1, $title);
			$smt->bindparam(2, $content);
			$smt->execute();
			if($smt->rowCount()>=1) {
						return true;
					} else {
						return false;
					}
		} catch (PDOException $e) {
					throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
	}

		public function get_announcement_by_id($id) {
		try {
			$smt = $this->_pdo->prepare("SELECT * FROM tbl_announcements WHERE id = ?");
			$smt->bindparam(1,$id);
			$smt->execute();
			$result = $smt->fetch();
			return $result;
		} catch(PDOException $e) {
		 			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		 		}
	}

	public function get_all_announcements() {
		try {
			$smt = $this->_pdo->query("SELECT * FROM tbl_announcements ORDER BY date_posted DESC");
			$result = $smt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		} catch (PDOException $e) {
				throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
	}



	public function change_posting ($id) {
	 		$get_announcement = $this->get_announcement_by_id($id);
			$status = $get_announcement['is_posted'];
			$set_status = "";

			if ($status == 1) {
				$set_status = 0;
			} else {
				$set_status = 1;
			}

			try {
			$smt = $this->_pdo->prepare("UPDATE tbl_announcements set is_posted = ? , date_posted = now() where id = ?");
			$smt->bindparam(1, $set_status);
			$smt->bindparam(2, $id);
			$smt->execute();
		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
	 }


	public function update_announcement($title,$content,$id) {
		try {
			$smt = $this->_pdo->prepare("UPDATE tbl_announcements SET title = ? , content = ? where id = ?");
			$smt->bindparam(1,$title);
			$smt->bindparam(2,$content);
			$smt->bindparam(3,$id);
			$smt->execute();
				if($smt->rowCount()>=1) {
						return true;
					} else {
						return false;
					}
		} catch (PDOException $e) {
			throw new Exception( $e->getMessage( ) , $e->getCode( ) );	
		}
	}

	public function delete_announcement($id){
		try {
			$smt = $this->_pdo->prepare("DELETE FROM tbl_announcements where id = ?");
			$smt->bindparam(1,$id);
			$smt->execute();
		} catch (PDOException $e) {
			throw new Exception( $e->getMessage( ) , $e->getCode( ) );	
		}
	}




} //end of class

 ?>