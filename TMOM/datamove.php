<?php 
include 'header.php';
?>
<!-- include tmom manager -->
<?php 
	include 'php/manager.php';
	//Useage:
	//oracle db 인스턴스 생성
	// 		$oracleDB=new OracleDB("test1234","test1234","192.168.0.141/oracle9i");
	//mysql db 인스턴스 생성
	// 		$mysql=new MysqlDB("localhost", "root", "root", "test1234");
	//매니저 인스턴스 생성
	// 		$manager=new Manager($mysql);
	//오라클 디비에서 데이터 가져오기
	// 		$oracleData=$oracleDB->selectAll();
	// 	print_r($oracleData);
	//주소 변환 및 데이터 이동하기
	//move(테이블이름,주소컬럼이름,데이터)
	// 		$manager->move("test1234","ADDR",$oracleData);
	$mysqlDB;
?>

<section>
	<div class="container">
		<div class="page-header">
  		<h2>Data Move <small>section</small></h2>
		</div>
	</div>
	<!-- Oracle -->
	<div class="container">
		<h3>Oracle Connect</h3>
	</div>
	<div class="container">
		<form class="form-horizontal" method="POST" aciton="dmmy.php">
		  <div class="form-group">
		    <label for="oracleUser" class="col-sm-2 control-label">User</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="oracleUser" name="oracleUser" placeholder="User">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="oraclePass" class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="oraclePass" name="oraclePass" placeholder="Password">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="oraclePath" class="col-sm-2 control-label">DB path & Sid</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="oraclePath" name="oraclePath" placeholder="DB path & Sid">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <div class="checkbox">
		        <label>
		          <input type="checkbox"> Remember
		        </label>
		      </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Connect</button>
		    </div>
		  </div>
		</form>
	</div>
	<?php
	//oracle db 인스턴스 생성
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if($_POST["oracleUser"]&&!$oracleDB){
// 			echo $_POST["oracleUser"]."<br/>";
// 			echo $_POST["oraclePass"]."<br/>";
// 			echo $_POST["oraclePath"]."<br/>";
			$oracleUser=$_POST["oracleUser"];
			$oraclePass=$_POST["oraclePass"];
			$oraclePath=$_POST["oraclePath"];
			//$oracleDB=new OracleDB($oracleUser,$oraclePass,$oraclePath);
			$oracleDB=new OracleDB("test1234","test1234","192.168.0.141/oracle9i");
			//faild conn
// 			$oracleDB=new OracleDB("test1234","test1234","192.168.0.141/oracle9");
			// db connect success or faild
			if($oracleDB->getConn()){
				$msg='<div class="container"><div class="alert alert-success" role="alert"><p>Oracle Database Connect Success!</p></div></div>';
				echo $msg;
			}elseif(!$oracleDB->getConn()){
				$msg='<div class="container"><div class="alert alert-warning" role="alert"><p>Oracle Database Connect Failed!</p></div></div>';
				echo $msg;
			}
		}
	}
	?>
	
	<!-- Mysql -->
	<div class="container">
		<h3>Mysql Connect</h3>
	</div>
	<div class="container">
		<form class="form-horizontal" method="post">
		  <div class="form-group">
		    <label for="mysqlPath" class="col-sm-2 control-label">DB path</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="mysqlPath" name="mysqlPath" placeholder="DB path">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="mysqlUser" class="col-sm-2 control-label">User</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="mysqlUser" name="mysqlUser" placeholder="User">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="mysqlPass" class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="mysqlPass" name="mysqlPass" placeholder="Password">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="mysqlTable" class="col-sm-2 control-label">Table Name</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="mysqlTable" name="mysqlTable" placeholder="Table Name">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <div class="checkbox">
		        <label>
		          <input type="checkbox"> Remember
		        </label>
		      </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Connect</button>
		    </div>
		  </div>
		</form>
	</div>
	<?php
		//mysql db 인스턴스 생성
		//$mysql=new MysqlDB("localhost", "root", "root", "test1234");
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if($_POST["mysqlUser"]&&!$mysqlDB){
// 				echo $_POST["mysqlPath"]."<br/>";
// 				echo $_POST["mysqlUser"]."<br/>";
// 				echo $_POST["mysqlPass"]."<br/>";
// 				echo $_POST["mysqlTable"]."<br/>";
				$mysqlPath=$_POST["mysqlPath"];
				$mysqlUser=$_POST["mysqlUser"];
				$mysqlPass=$_POST["mysqlPass"];
				$mysqlTable=$_POST["mysqlTable"];
				$mysqlDB=new MysqlDB("localhost", "root", "root", "test1234");
				//failed conn
				global $mysqlDB;
				$mysqlDB=new MysqlDB("localhost", "root", "root1", "test1234");
				// db connect success or faild
				if($mysqlDB->getConn()){
					$msg.='<div class="container"><div class="alert alert-success" role="alert"><p>Mysql Database Connect Success!</p></div></div>';
					echo $msg;
				}elseif(!$mysqlDB->getConn()){
					$msg.='<div class="container"><div class="alert alert-warning" role="alert"><p>Mysql Database Connect Failed!</p></div></div>';
					echo $msg;
				}
			}
			print_r($mysqlDB);
		}
	?>
	<!-- Data Move Button -->
	<div class="container">
				<h4 class="bg-warning text-danger">Oracle에서 Mysql로 데이터가 이동 됩니다.</h4>
				<form method="POST">
					<input type="hidden" name="move" value="move">
					<button type="submit" class="btn btn-danger">Data Move</button>
				</form>
		</div>
	</div>
	
</section>

<?php
//매니저 인스턴스 생성
//오라클 디비에서 데이터 가져오기
//주소 변환 및 데이터 이동하기
//move(테이블이름,주소컬럼이름,데이터)
	print_r($mysqlDB);
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if($_POST["move"]){
				echo "move btn<br/>";
				$manager=new Manager($mysqlDB);
				print_r($mysqlDB);
				echo "make manager<br/>";
				$oracleData=$oracleDB->selectAll();
				echo "make oracleData<br/>";
				print_r($oracleData);
// 				$manager->move("test1234","ADDR",$oracleData);
		}
	}

//db 닫기
// 	$oracleDB->disConn();
// 	$mysql->disConn();
?>

<?php 
include 'footer.php';
?>
