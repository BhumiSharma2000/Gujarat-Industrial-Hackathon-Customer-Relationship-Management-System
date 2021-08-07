<?php
 class DbConnect
 {
 	private $host='localhost';
 	private $dbName='adminxyz';
 	private $user='root';
 	private $pass='';

 	public function connect()
 	{
 		try
 		{
 			$conn=new PDO('mysql:hosts='.$this->host.';dbname='.$this->dbName,$this->user,$this->pass);
 			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 			return $conn;
 		}
 		catch(PDOEXCEPTION $e)
 		{
 			echo 'Database Error:'.$e->getMessage();
 			
 		}
 	}
 }
 ?>