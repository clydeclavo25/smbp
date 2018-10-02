<?php 
/**
* 
*/
class Message
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


	public function get_all_messages() {
		try {
			$smt = $this->_pdo->prepare("SELECT * FROM tbl_messages ORDER BY is_read DESC");
			$smt->execute();
			$result = $smt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		} catch (PDOException $e) {
				throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
	}


	public function get_message_by_id($id) {
		try {
			$smt = $this->_pdo->prepare("SELECT * FROM tbl_messages WHERE id = ?");
			$smt->bindparam(1,$id);
			$smt->execute();
			$result = $smt->fetch();
			return $result;
		} catch (PDOException $e) {
				throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
	}


	public function read_message($id) {
		try {
			$smt = $this->_pdo->prepare("UPDATE tbl_messages set is_read = 1, date_read = now() WHERE id = ?");
			$smt->bindparam(1,$id);
			$smt->execute();
		} catch (PDOException $e) {
				throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
	}






}