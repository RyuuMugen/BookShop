<?php
class Model
{
	function __construct()
	{
		$this->db = new Database;
		$this->c = $this->db->conn;
	}
	function setQuery($sql)
	{
		return $this->c->query($sql);
	}
	function getAll($sql)
	{
		$result = $this->setQuery($sql);
		$a = array();
		while ($row = $result->fetch_assoc()) {
			$a[] = $row;
		}
		return $a;
	}
	function getOne($sql)
	{
		$result = $this->c->query($sql);
		$a = array();
		if ($result->num_rows == 1) {
			$row = $result->fetch_assoc();
			return $row;
		}
	}
	function getRecordByTrash($table, $trash = 0)
	{
		$sql = "SELECT * FROM $table WHERE trash=$trash";
		$result = $this->getAll($sql);
		return $result;
	}
	function getBookRecordByTrash($table, $trash, $id)
	{
		$sql = "SELECT * FROM $table WHERE trash=$trash AND book_id = $id AND types='cover'";
		$result = $this->getAll($sql);
		return $result;
	}
	function getBookReadByTrash($table, $trash, $id)
	{
		$sql = "SELECT * FROM $table WHERE trash=$trash AND book_id = $id AND types='read'";
		$result = $this->getAll($sql);
		return $result;
	}
	function getRecord($table)
	{
		$sql = "SELECT * FROM $table ";
		$result = $this->getAll($sql);
		return $result;
	}
	function getOneRecord($table, $id)
	{
		$sql = "SELECT * FROM $table WHERE id = $id";
		$result = $this->getOne($sql);
		return $result;
	}
	function getOneRecordByTrash($table, $trash = 0, $id)
	{
		$sql = "SELECT * FROM $table WHERE trash=$trash AND id = $id";
		$result = $this->getOne($sql);
		return $result;
	}

	function getDataCate($id, $table, $limit, $page)
	{
		$sql = "SELECT * FROM $table WHERE trash=0 AND status=0 AND category_id=$id LIMIT " . ($page - 1) * $limit . "," . $limit;
		$result = $this->getAll($sql);
		return $result;
	}
	function getData($table, $limit, $page)
	{
		$sql = "SELECT * FROM $table WHERE trash= 0 LIMIT " . ($page - 1) * $limit . "," . $limit;
		$result = $this->getAll($sql);
		return $result;
	}
	function getbookData($table, $limit, $page, $id)
	{
		$sql = "SELECT * FROM $table WHERE trash= 0 AND book_id = $id AND types='cover' LIMIT " . ($page - 1) * $limit . "," . $limit;
		$result = $this->getAll($sql);
		return $result;
	}
	function getreadbookData($table, $limit, $page, $id)
	{
		$sql = "SELECT * FROM $table WHERE trash= 0 AND book_id = $id AND types='read' LIMIT " . ($page - 1) * $limit . "," . $limit;
		$result = $this->getAll($sql);
		return $result;
	}
	function getDatas($table, $limit, $page)
	{
		$sql = "SELECT * FROM $table LIMIT " . ($page - 1) * $limit . "," . $limit;
		$result = $this->getAll($sql);
		return $result;
	}
	function getTrash($table, $limit, $page)
	{
		$sql = "SELECT * FROM $table WHERE trash= 1 LIMIT " . ($page - 1) * $limit . "," . $limit;
		$result = $this->getAll($sql);
		return $result;
	}
	public function addRecord($table, $params = array())
	{
		$txtKey = "";
		$txtValue = "";
		$i = 0;
		foreach ($params as $key => $value) {
			if ($i < count($params) - 1) {
				$txtKey .= $key . " ,";
				$txtValue .= "'" . $value . "',";
			} else {
				$txtKey .= $key;
				$txtValue .= "'" . $value . "'";
			}
			$i++;
		}
		$sql = "INSERT INTO " . $table . "(" . $txtKey . ") VALUES (" . $txtValue . ")";
		$this->setQuery($sql);
	}
	public function editRecord($table, $params = array(), $id)
	{
		$txtSet = "";
		$i = 0;
		foreach ($params as $key => $value) {
			if ($i < count($params) - 1) {
				$txtSet .= "$key = '$value',";
			} else {
				$txtSet .= "$key = '$value'";
			}
			$i++;
		}
		$sql = "UPDATE " . $table . " SET " . $txtSet . " WHERE id = $id";
		$this->setQuery($sql);
	}
	public function delTempRecord($table, $id)
	{
		$sql = "UPDATE $table SET trash=1 WHERE id=$id";
		$this->setQuery($sql);
	}

	public function getOrderDetails($table, $id)
	{
		$sql = "SELECT * FROM 	$table  WHERE order_id=$id";
		$result = $this->getAll($sql);
		return $result;
	}
	public function deleteTempRecord($table, $id)
	{
		$sql = "DELETE FROM $table WHERE id=$id";
		$this->setQuery($sql);
	}
	public function retoreTempRecord($table, $id)
	{
		$sql = "UPDATE $table SET trash=0 WHERE id=$id";
		$this->setQuery($sql);
	}

	public function statusF($table, $id)
	{
		$sql = "UPDATE $table SET status=1 WHERE id=$id";
		$this->setQuery($sql);
	}
	public function statusT($table, $id)
	{
		$sql = "UPDATE $table SET status=0 WHERE id=$id";
		$this->setQuery($sql);
	}
}
