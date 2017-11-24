<?php
	/* 
	 *TOMO - code by jaime@nubiz
	 *date - 2017-11-23 
	*/
	//Useage:
	//oracle db 인스턴스 생성
	//$oracleDB=new OracleDB("test1234","test1234","192.168.0.141/oracle9i");
	//mysql db 인스턴스 생성
	//$mysql=new MysqlDB("localhost", "root", "root", "test1234");
	//매니저 인스턴스 생성
	//$manager=new Manager($mysql);
	//오라클 디비에서 데이터 가져오기
	//$oracleData=$oracleDB->selectAll();
	//주소 변환 및 데이터 이동하기
	//move(테이블이름,주소컬럼이름,데이터)
	//$manager->move("test1234","ADDR",$oracleData);
	//db 닫기
	//$oracleDB->disConn();
	//$mysql->disConn();

	include 'mysqldb.php';
	include 'oracledb.php';
	include 'addrtrans.php';
	
	class Manager{
		private $mysqlDB;
		
		public function __construct($mysqlDB){
			$this->mysqlDB=$mysqlDB;
		}
		
		//주소 좌표 변환 return arry(lat=>?,lng=>?)
		private function trans($addr){
			$addrtrans=new AddrTrans();
			$latLng=$addrtrans->addrToLatLng($addr);
// 			print_r($latLng);
			return $latLng;
		}
		
		//sql 만들기
		private function prepareSql($tabName,$addrColName,$addr,$latLng){
			$sql = " INSERT INTO ".$tabName." set "  ;
			$sql.=$addrColName."='".$addr."'";
			$sql .= ", lat='".$latLng['lat']."' ";
			$sql .= ", lng='".$latLng['lng']."' ";
			$sql .= ";";
// 			echo $sql."<br/>";
			return $sql;
		}
		
		//Mysql db 데이터 입력
		public function move($tabName,$addrColName,$data){
			$arrLen=count($data);
			for($i=0;$i<$arrLen;$i++){
				//좌표 가져오기
// 				echo $data[$i][$addrColName];
				$latLng=$this->trans($data[$i][$addrColName]);
				//sql 만들기
				$sql = $this->prepareSql($tabName,$addrColName,$data[$i]['ADDR'],$latLng);
// 				echo $sql."<br/>";
// 				$mysql->insert($sql);
				if($this->mysqlDB){
					$this->mysqlDB->insert($sql);
				}
			}
// 		print_r($this->mysqlDB);
			
		}
	}

?>