
<?php 

/**
* 
*/
class Registration
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

	public function get_all_registration($confirmed,$deleted) {
		try {
			$smt = $this->_pdo->prepare("
				SELECT *, CONCAT(last_name,', ',first_name,' ',IF(LENGTH(middle_name) != 0, middle_name, ' ')) as fullname 
				  FROM tbl_submitted_forms 
				 WHERE confirmed = ? 
				   AND deleted = ? 
			   ORDER BY date_sent 
				  DESC");
			$smt->bindparam(1, $confirmed);
			$smt->bindparam(2, $deleted);
			$smt->execute();
			$result = $smt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		} catch (PDOException $e) {
			throw new MyDatabaseException( $e->getMessage( ) , $e->getCode( ) );
		}
	}

	public function delete_registration($id) {
		try {
			$smt = $this->_pdo->prepare("UPDATE tbl_submitted_forms set deleted = 1 where id = ?");
			$smt->bindparam(1, $id);
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

	public function confirm_registration($id) {
		try {
			$smt = $this->_pdo->prepare("UPDATE tbl_submitted_forms set confirmed = 1 , date_confirmed = now() where id = ?");
			$smt->bindparam(1, $id);
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


} //END OF CLASS


 ?>