<?php 
class OracleDB{
	private $user;
	private $pass;
	private $dbPath;
	private $charSet="AL32UTF8";
	private $conn;
	private $tabName="test1234";
	
	public function __construct($user,$pass,$db){
		$this->user=$user;
		$this->pass=$pass;
		$this->dbPath=$db;
		$this->conn();
	}
	
	public function conn(){
		$this->conn=@oci_connect($this->user,$this->pass,$this->dbPath,$this->charSet);
		if(!$this->conn){
// 			echo "No Connection ".oci_error();
		}else{
// 			echo "Connected successfully<br/>";
		}
	}
	
	public function disConn(){
		oci_close($this->conn);
	}
	
	public function selectAll(){
		$sql="select * from ".$this->tabName;
		$result=oci_parse($this->conn, $sql);
		$success=oci_execute($result);
	
		$rows=array();
		$indexNum=0;
		while($row = oci_fetch_array($result, OCI_ASSOC)){
			foreach($row as $key=>$value){
				$rows[$indexNum][$key]=$value;
			}
			$indexNum++;
		}
		oci_free_statement($result);
// 		print_r($rows);
		return $rows;
	}
	
	public function getConn(){
		return $this->conn;
	}
}

//debug
// $oracleDB=new OracleDB("test1234","test1234","192.168.0.141/oracle9i");
// $selectAll=$oracleDB->selectAll();
// $oracleDB->disConn();
?>