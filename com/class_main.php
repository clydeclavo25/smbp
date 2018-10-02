<?php

/**
* 
*/
class Form 
{
	
	function __construct(){
		$_db = new Db;
		$this->_pdo = $_db->connect();
	}

	public function get_latest_form($type){
		try {
			$smt = $this->_pdo->prepare("SELECT filename, date_updated FROM tbl_forms where id = (SELECT max(id) from tbl_forms where is_active = 1 and type=?)");
			$smt->bindparam(1, $type);
			$smt->execute();
			$result = $smt->fetch();
			return $result;
		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
	}

	public function submit_form($lastname,$firstname,$middlename,$email,$contact,$filename,$control_number) {
		try {
			$smt = $this->_pdo->prepare("INSERT INTO tbl_submitted_forms (filename, last_name, first_name, middle_name, email, contact, control_no , date_sent) VALUES (?,?,?,?,?,?,?,now())");
			$smt->bindparam(1, $filename);
			$smt->bindparam(2, $lastname);
			$smt->bindparam(3, $firstname);
			$smt->bindparam(4, $middlename);
			$smt->bindparam(5, $email);
			$smt->bindparam(6, $contact);
			$smt->bindparam(7, $control_number);
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


public function get_latest_id () {
		try {
			$smt=$this->_pdo->prepare("SELECT left(control_no,2) as theleft , right(control_no,4) as theright FROM tbl_submitted_forms ORDER BY right(control_no,4) DESC limit 1");
			$smt->execute();
			$result = $smt->fetch();
			$result = $result['theright'];
			return $result;
		
		} catch (PDOException $e) {
				throw new MyDatabaseException($e->getMessage( ) , $e->getCode( ));
		}
	}


public function year_exists($year) {
		try {
			$smt = $this->_pdo->prepare("SELECT left(control_no,2) as theleft FROM tbl_submitted_forms where left(control_no,2) = ? ");
			$smt->bindparam(1, $year);
			$smt->execute();
			if($smt->rowCount()>=1) {
					return true;
				} else {
					return false;
				}

		} catch (PDOException $e) {
				throw new MyDatabaseException($e->getMessage( ) , $e->getCode( ));
		}
}

 function generate_ctr_no($yearnow) {
		try {
			$yearexists = $this->year_exists($yearnow);
			if ($yearexists) {
				$latest_id = $this->get_latest_id()+1;
			} else {
				$latest_id = 1;
			}
		
			$mylen = strlen($latest_id);
			$result = "";
		
			switch ($mylen) {
				case 0:
					$result = $yearnow."-0001";
					break;
				case 1:
					$result = $yearnow."-000".$latest_id;
					break;
				case 2:
					$result = $yearnow."-00".$latest_id;
					break;
				case 3:
					$result = $yearnow."-0".$latest_id;
					break;
				case 4:
					$result = $yearnow."-".$latest_id;
					break;

				default:
					$result = $yearnow."-".$latest_id;
					break;
			}
			return $result;
		} catch (PDOException $e) {
				throw new MyDatabaseException($e->getMessage( ) , $e->getCode( ));
		}
	}


}
// END OF CLASS FORM


class Announcement {

	function __construct(){
		$_db = new Db;
		$this->_pdo = $_db->connect();
	}

	function get_all_announcements(){
		try {
			$smt = $this->_pdo->query("SELECT * FROM tbl_announcements WHERE is_posted = 1 ORDER BY date_posted DESC limit 5");
			$result = $smt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
	}

	function get_min_year(){
		try {
			$smt = $this->_pdo->query("SELECT id, YEAR(date_posted) as year_posted FROM tbl_announcements WHERE is_posted = 1 ORDER BY date_posted ASC limit 1");
			
			$result = $smt->fetch();
			return $result;
		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
	}

	function get_max_year(){
		try {
			$smt = $this->_pdo->query("SELECT id, YEAR(date_posted) as year_posted FROM tbl_announcements WHERE is_posted = 1 ORDER BY date_posted DESC limit 1");	
			$result =	$smt->fetch();
			return $result;
		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage() , $e->getCode( ) );
		}
	}

 function	get_announcements_by_year($selected) {
 		try {
 			$smt = $this->_pdo->prepare("SELECT * FROM tbl_announcements WHERE year(date_posted) = ? and is_posted = 1 order by date_posted desc");
 			$smt->bindparam(1, $selected);
 			$smt->execute();
 			$result = $smt->fetchAll(PDO::FETCH_ASSOC);
 			return $result;
 		} catch (PDOException $e) {
 			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
 		}
 }


 function get_announcement_by_id($id) {
 	try {	
 			$smt = $this->_pdo->prepare("SELECT * FROM tbl_announcements WHERE id = ?");
 			$smt->bindparam(1, $id);
 			$smt->execute();
 			$result = $smt->fetch();
 			return $result;
 	} catch (PDOException $e) {
 		throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
 	}
 }

}
// END OF CLASS ANNOUNCEMENT


/**
* 
*/
class Theme
{
	
	function __construct(){
		$_db = new Db;
		$this->_pdo = $_db->connect();
	}

	public function get_theme()
	{
		try {
			$smt = $this->_pdo->query("SELECT * FROM tbl_themes WHERE is_posted = 1 LIMIT 1");
			$result =	$smt->fetch();
			return $result;
		} catch (PDOException $e) {
			throw new Exception($e->getMessage( ) , $e->getCode( ));
			
		}
	}


} //END OF CLASS THEME


class Message {
	function __construct(){
		$_db = new Db;
		$this->_pdo = $_db->connect();
	}

	public function save_message($name,$email,$phone,$subject,$message) {
			try {
				$smt = $this->_pdo->prepare("INSERT INTO tbl_messages (name,email,phone,subject,message) VALUES (?,?,?,?,?)")	;
				$smt->bindparam(1,$name);
				$smt->bindparam(2,$email);
				$smt->bindparam(3,$phone);
				$smt->bindparam(4,$subject);
				$smt->bindparam(5,$message);
				$smt->execute();
			} catch (PDOException $e) {
				throw new Exception($e->getMessage( ) , $e->getCode( ));
			}
	}
}
// END OF CLASS MESSAGE


class Gallery {
	function __construct(){
		$_db = new Db;
		$this->_pdo = $_db->connect();
	}
	
}	
//END OF CLASS GALLERY
?>