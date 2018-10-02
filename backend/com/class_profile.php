<?php

class Profile
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

	public function get_all_profiles($active){
		try {
			$smt = $this->_pdo->query("SELECT CONCAT(a.first_name,' ',a.last_name) as fullname,
							 a.first_name as first_name,
							 a.last_name as last_name,
							 a.middle_name as middle_name,
						   a.address as address,
						   a.email as email,
						   a.contact_no as contact_no,
						   b.id as id,
						   b.username as username,
						   b.access as access,
						   b.is_active as is_active
				  FROM tbl_profiles a
		     INNER JOIN tbl_login b
						   ON a.login_id = b.id
				 WHERE b.is_active = $active
			   ORDER BY b.id ASC");
			$result = $smt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
	}

	

	public function get_profile_by_id($id) {
		try {
			$smt = $this->_pdo->prepare("SELECT CONCAT(a.first_name,' ',a.last_name) as fullname,
							 a.first_name as first_name,
							 a.last_name as last_name,
							 a.middle_name as middle_name,
						   a.address as address,
						   a.email as email,
						   a.contact_no as contact_no,
				       a.id as id,
					     b.username as username,
					     b.password as password,
					     b.access as access,
					     b.is_active as is_active
				  FROM tbl_profiles a
		     INNER JOIN tbl_login b
						   ON a.login_id = b.id
				 WHERE a.login_id = ?
				 LIMIT 1");
			$smt->bindparam(1,$id);
			$smt->execute();
			$result = $smt->fetch();
			// return  $smt;
			return $result;
		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
	}


	public function if_exists($username) {
		try {
			$smt = $this->_pdo->prepare("SELECT COUNT(username) FROM tbl_login WHERE username = ?");
			$smt->bindparam(1, $username);
			$smt->execute();
			if($smt->fetchColumn() > 0){
				return true;
			}
			else {
				return false;
			}
		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
	}
	// END IF DUP USERNAME

	public function dup_email($email) {
		try {
			$smt = $this->_pdo->prepare("SELECT COUNT(email) FROM tbl_profiles WHERE email = ?");
			$smt->bindparam(1, $email);
			$smt->execute();

			if($smt->fetchColumn() > 0){
				return true;
			}
			else {
				return false;
			}
		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
	}

// END IF DUP EMAIL


public function edit_username($id,$username) {
		try {
			$smt = $this->_pdo->prepare("UPDATE tbl_login set username = ? where id = ?");
			$smt->bindparam(1, $username);
			$smt->bindparam(2, $id);
			$smt->execute();
		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
			
		}
	}
// END EDIT USERNAME

public function edit_profile(
	$lastname,
	$firstname,
	$middlename,
	$email,
	$mobile,
	$address,
	$id
) {
	try {
		$smt = $this->_pdo->prepare("
			UPDATE tbl_profiles
				 SET last_name = ? ,
				 		 first_name = ? ,
				 		 middle_name = ? ,
				 		 email = ? ,
				 		 contact_no = ? ,
				 		 address = ?
			 WHERE login_id = ?
			");
		$smt->bindparam(1, $lastname);
		$smt->bindparam(2, $firstname);
		$smt->bindparam(3, $middlename);
		$smt->bindparam(4, $email);
		$smt->bindparam(5, $mobile);
		$smt->bindparam(6, $address);
		$smt->bindparam(7, $id);
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
//END EDIT_PROFILE



// GET LOGIN ID BY USERNAME
	function getID_by_username($username) {
		try {
			$smt = $this->_pdo->prepare("SELECT id FROM tbl_login WHERE username = ? LIMIT 1");
			$smt->bindparam(1, $username);
			$smt->execute();

			$result = $smt->fetchColumn();
			return $result;
		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
	}

// REGISTRATION PROCESS FOR ADMIN
public function save_user(
	$username,
	$password,
	$email,
	$lastname,
	$firstname,
	$middlename,
	$address,
	$contact_no,
	$access
) {
	 if ($this->if_exists($username)== false)
	 		{
	 			if ($this->dup_email($email)== false)
	 			{
		 			try {
		 				$q1 = $this->_pdo->prepare("INSERT INTO tbl_login (username,password,access) VALUES (?,?,?)");
		 				$q1->bindparam(1, $username);
		 				$q1->bindparam(2, $password);
		 				$q1->bindparam(3, $access);
		 				$q1->execute();
		 				if($q1->rowCount() >= 1) {
		 					$loginid = $this->getID_by_username($username);
								try {
									$q2 = $this->_pdo->prepare("INSERT INTO tbl_profiles (login_id,last_name,first_name,middle_name,address,email,contact_no) VALUES (?,?,?,?,?,?,?)");
									$q2->bindparam(1, $loginid);
									$q2->bindparam(2, $lastname);
									$q2->bindparam(3, $firstname);
									$q2->bindparam(4, $middlename);
									$q2->bindparam(5, $address);
									$q2->bindparam(6, $email);
									$q2->bindparam(7, $contact_no);
									$q2->execute();
									if($q1->rowCount()>=1) {
										return "success";
									} else {
										return "fail";
									}

								}  catch(PDOException $e) {
								 			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
								 		}
							}
							else {
								return "fail";
							}
	 		} catch(PDOException $e) {
	 			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
	 		}
	 			} else {
	 				return "dup_email";
	 			}
	 	} else {
	 		return "dup_user";
	 	}

	 }


// CHANGE ACCESS
	 public function change_access ($id,$access) {
	 		try {
			$smt = $this->_pdo->prepare("UPDATE tbl_login set access = ? where id = ?");
			$smt->bindparam(1, $access);
			$smt->bindparam(2, $id);
			$smt->execute();
		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
	 }


	 public function change_status ($id) {
	 		$get_profile = $this->get_profile_by_id($id);
			$status = $get_profile['is_active'];
			$set_status = "";

			if ($status == 1) {
				$set_status = 0;
			} else {
				$set_status = 1;
			}

			try {
			$smt = $this->_pdo->prepare("UPDATE tbl_login set is_active = ? where id = ?");
			$smt->bindparam(1, $set_status);
			$smt->bindparam(2, $id);
			$smt->execute();
		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
	 }

	 public function delete_user($id) {
	 	try {
			$smt = $this->_pdo->prepare("DELETE FROM tbl_login where id = ?");
			$smt->bindparam(1, $id);
			$smt->execute();

			$smt = $this->_pdo->prepare("DELETE FROM tbl_profiles where login_id = ?");
			$smt->bindparam(1, $id);
			$smt->execute();

		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
	 }

}
// end class


?>
