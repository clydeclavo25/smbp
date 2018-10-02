<?php
 /**
 * 
 */
 class Form
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

	public function save_form($filename, $type) {
		try {
			$q1 = $this->_pdo->prepare("INSERT INTO tbl_forms (filename,type) VALUES (?,?)");
			$q1->bindparam(1, $filename);
		 	$q1->bindparam(2, $type);
		 	$q1->execute();
		} catch(PDOException $e) {
	 			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
	 		}
	}

	public function get_all($active){
	try {
			$smt = $this->_pdo->query("SELECT * FROM tbl_forms ORDER BY date_updated DESC");
			$result = $smt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
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

	public function get_form_by_id($id) {
		try {
			$smt = $this->_pdo->query("SELECT * FROM tbl_forms WHERE id = $id");
			$result = $smt->fetch();
			return $result;
		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
	}
	
	public function change_form_status($id) {
			$get_form = $this->get_form_by_id($id);
			$status = $get_form['is_active'];
			$set_status = "";

			if ($status == 1) {
				$set_status = 0;
			} else {
				$set_status = 1;
			}

			try {
			$smt = $this->_pdo->prepare("UPDATE tbl_forms set is_active = ? where id = ?");
			$smt->bindparam(1, $set_status);
			$smt->bindparam(2, $id);
			$smt->execute();
		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
	}

	public function delete_form($id) {
		try {
			$smt = $this->_pdo->prepare("DELETE FROM tbl_forms where id = ?");
			$smt->bindparam(1, $id);
			$smt->execute();
		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
	}

 

 } //END CLASS
?>