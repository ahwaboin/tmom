<?php 
include_once '../basephp/header.php';
?>
<?php
//mysql class
include_once '../classes/mysqldb.php';
?>

<div class="container">
	<div class="page-header">
  	<h2>Mysql <small>section</small></h2>
	</div>
</div>

<!-- 
test param print
 -->
 
<div class="container">
<?php
		foreach($_POST as $key=>$value) {
		    echo $key." => ".$value."<br/>";
		}
?>
</div>
<div class="container">
<?php
//디비 접속
$mysqlDB=new MysqlDB("localhost", "tmom", "tmom", "tmom");

$connStatus=$mysqlDB->conn();

if($connStatus=="failed"){
	echo "<h3 class='bg-danger connMsg'>Mysql connect failed.</h3>";
}else{
	echo "<h3 class='bg-success connMsg'>Mysql connect success!</h3>";
}
?>
</div>

<?php 
$rows=$mysqlDB->selectAll();
print_r($rows);
?>
<!-- 버튼 그룹 -->
<div class="table-responsive">
	<table class="table table-striped">
	</table>
</div>


<?php
//db닫기
mysqli_close($mysqlDB->getConn());
?>
<?php 
include_once '../basephp/footer.php';
?>