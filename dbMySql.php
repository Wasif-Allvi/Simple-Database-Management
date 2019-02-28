<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', "oopphp");

class DB_con
{	
	public $conn;
	
	function __construct()
	{
		$this->conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME) or die('localhost connection problem'.mysqli_connect_error());
	}
	
	public function insert($fname,$lname,$email)
	{	
		$sql = "INSERT into users( first_name,last_name,email) VALUES('$fname','$lname','$email')";
		if(mysqli_query($this->conn, $sql)){
			//echo "Records inserted successfully.";
			return true;
		} else{
			//echo "ERROR: Could not able to execute '$sql'. " . mysqli_error($conn);
			return false;
		}
	}
	
	public function select()
	{	
		$sql = "SELECT * FROM users";
		$res = mysqli_query($this->conn, $sql);
		return $res;
	}
	
	public function delete($table,$id)
	{
		$sql = "DELETE FROM '$table' WHERE user_id=".$id;
		$res = mysqli_query($this->conn, $sql);
		return $res;
	}
	
	public function update($table, $id, $fname, $lname, $email)
	{	
		$sql = "UPDATE '$table' SET first_name='$fname', last_name='$lname', email='$email' WHERE user_id=".$id;
		$res = mysqli_query($this->conn, $sql);
		return $res;
	}
	
}

?>