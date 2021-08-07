<?php
/**
 * 
 */
class education
{
	private $sc_id;
private $address;
private $latitude;
private $longtitude;
private $status;
private $conn;
private $tableName="tb1_servicecenter";

function setSc_id($sc_id) { $this->sc_id = $sc_id; }
function getSc_id() { return $this->sc_id; }
function setAddress($address) { $this->address = $address; }
function getAddress() { return $this->address; }
function setLatitude($latitude) { $this->latitude = $latitude; }
function getLatitude() { return $this->latitude; }
function setLongtitude($longtitude) { $this->longtitude = $longtitude; }
function getLongtitude() { return $this->longtitude; }
function setStatus($status) { $this->status = $status; }
function getStatus() { return $this->status; }

	public function __construct()
	{
		require_once("DbConnect.php");	
		$conn=new DbConnect;
		$this->conn=$conn->connect();
	}
	public function abc()
	{
		$sql="SELECT * FROM $this->tableName";
		$stmt=$this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}
}
?>