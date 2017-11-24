<?php
class MysqlDB{
	private $server;
	private $user;
	private $pass;
	private $db;
	private $conn;
	
	public function __construct($server,$user,$pass,$db){
		$this->server=$server;
		$this->user=$user;
		$this->pass=$pass;
		$this->db=$db;
		$this->getConn();
	}
	
	public function getConn(){
		$this->conn=new mysqli($this->server, $this->user, $this->pass, $this->db);
		if($this->conn->connect_error){
			die("Mysql connection failed".$this->conn->connect_error);
		}else{
// 			echo "Connected successfully<br/>";
		}
	}
	
	public function disConn(){
		$this->conn->close();
	}
	
	public function selectAll(){
		$sql="select * from ".$this->db;
		$result=$this->conn->query($sql);
		
		$rows=array();
		$indexNum=0;
		
		while($row=$result->fetch_assoc()){
			$rows[$indexNum++]=$row;
		}

		return $rows;
	}
	
	public function insert($sql){
		$this->conn->query($sql);
	}
	
	//배열로 칼럼 이름 리턴
	public function getColName(){
		$sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS 
			WHERE TABLE_SCHEMA = SCHEMA() AND TABLE_NAME = '".$this->db."'";
		$result=$this->conn->query($sql);
		$rows=Array();
		$indexNum=0;
		while($row=$result->fetch_array()){
			$rows[$indexNum++]=$row[COLUMN_NAME];
		}
		return $rows;
	}
}

//debug
// $mysql=new MysqlDB("localhost", "root", "root", "test1234");
// $selectAll=$mysql->selectAll();
// print_r($selectAll);
// $colNames=$mysql->getColName();
// print_r ($colNames);
// $mysql->disConn();
?>