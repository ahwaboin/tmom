<?php 
include_once '../basephp/header.php';
?>
<?php
//oracle class
include_once '../classes/oracledb.php';
?>
<!-- 
test param print
 -->
<div class="container">
<?php 
if($_POST["oracleUser"]){
		echo $_POST["oracleUser"]."<br/>";
		echo $_POST["oraclePass"]."<br/>";
		echo $_POST["oraclePath"]."<br/>";
}
?>
<?php
		foreach($_POST as $key=>$value) {
		    echo $key." => ".$value."<br/>";
		}
?>
</div>

<?php 
//oracle db 인스턴스 생성
$oracleDB=new OracleDB("test1234","test1234","192.168.0.141/oracle9i");

if($oracleDB->getConn()){
	echo "s";
}

echo "s";

$oracleDB->disConn();
?>

<?php 
include_once '../basephp/footer.php';
?>