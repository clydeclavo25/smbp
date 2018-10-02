<?php

class Login {

	protected $_db;
	protected $_pdo;

	/**
	 *	Create an Instance of the connection of the database in the constructor.
	 */
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


// PROCESS LOG IN
public function login ($username,$password) {
		$if_exists = $this->if_exists($username);
		if ($if_exists) {
			try {
				$smt = $this->_pdo->prepare("SELECT * FROM tbl_login WHERE username = ?");
				$smt->bindparam(1, $username); 
				$smt->execute();
				$result = $smt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row) {
					if(md5($password) == $row['password']) {
						$_SESSION['admin'] = array(
							'login_id' => $row['id'],
							'username' => $row['username'],
							'access' => $row['access'],
							);
						return "success"
;					}
					else {
						return "incorrect";
					}
				}
			} catch (PDOException $e) {
				throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
			}
		} 
		// if user does not exists
		else {
			return "none";
		}
	
}

	/**
	 * Check if the person visiting the page is logged in.
	 */
	public function is_logged_in($id) {
		if(!isset($_SESSION['admin'])) {
			return false;
		} else {
			return true;
		}
	}


} //end class




?>