<?php
class Register
{
	protected $db;
	protected $pdo;

	public function __construct() {
		$_db = new Db;
		$this->_pdo = $_db->connect();
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
public function register_admin(
	$username, 
	$password, 
	$email, 
	$access, 
	$lastname, 
	$firstname, 
	$middlename, 
	$address, 
	$contact_no
) {
	 if ($this->if_exists($username) == false)	
	 		{
	 			if ($this->dup_email($email) == false)
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


}
//end class
?>