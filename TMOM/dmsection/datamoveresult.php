<?php 
include '../basephp/header.php';
?>
<?php
foreach($_POST as $key=>$value) {
    echo 'name='.$key.' value='.$value." ";
}
?>
<?php 
include 'classes/php/manager.php';
//Useage:
//oracle db 인스턴스 생성
$oracleDB=new OracleDB("test1234","test1234","192.168.0.141/oracle9i");
//mysql db 인스턴스 생성
$mysqlDB=new MysqlDB("localhost", "root", "root", "test1234");
//매니저 인스턴스 생성
$manager=new Manager($mysqlDB);
//오라클 디비에서 데이터 가져오기
$oracleData=$oracleDB->selectAll();
//주소 변환 및 데이터 이동하기
//move(테이블이름,주소컬럼이름,데이터)
$manager->move("test1234","ADDR",$oracleData);
//db 닫기
$oracleDB->disConn();
$mysql->disConn();
?>
<?php 
include '../basephp/footer.php';
?>