<?php 
include 'header.php';
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
		<form class="form-horizontal">
		  <div class="form-group">
		    <label for="test" class="col-sm-1 control-label">Test</label>
		    <div class="col-sm-11">
		      <input type="text" class="form-control" id="test" placeholder="test">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="test" class="col-sm-1 control-label">Test</label>
		    <div class="col-sm-11">
		      <input type="text" class="form-control" id="test" placeholder="test">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="test" class="col-sm-1 control-label">Test</label>
		    <div class="col-sm-11">
		      <input type="text" class="form-control" id="test" placeholder="test">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="test" class="col-sm-1 control-label">Test</label>
		    <div class="col-sm-11">
		      <input type="text" class="form-control" id="test" placeholder="test">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-1 col-sm-11">
		      <div class="checkbox">
		        <label>
		          <input type="checkbox"> Remember me
		        </label>
		      </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-1 col-sm-11">
		      <button type="submit" class="btn btn-default">Connect</button>
		    </div>
		  </div>
		</form>
	</div>
	
	<!-- Mysql -->
	<div class="container">
		<h3>Mysql Connect</h3>
	</div>
	<div class="container">
		<form class="form-horizontal">
		  <div class="form-group">
		    <label for="test" class="col-sm-1 control-label">Test</label>
		    <div class="col-sm-11">
		      <input type="text" class="form-control" id="test" placeholder="test">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="test" class="col-sm-1 control-label">Test</label>
		    <div class="col-sm-11">
		      <input type="text" class="form-control" id="test" placeholder="test">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="test" class="col-sm-1 control-label">Test</label>
		    <div class="col-sm-11">
		      <input type="text" class="form-control" id="test" placeholder="test">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="test" class="col-sm-1 control-label">Test</label>
		    <div class="col-sm-11">
		      <input type="text" class="form-control" id="test" placeholder="test">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-1 col-sm-11">
		      <div class="checkbox">
		        <label>
		          <input type="checkbox"> Remember
		        </label>
		      </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-1 col-sm-11">
		      <button type="submit" class="btn btn-default">Connect</button>
		    </div>
		  </div>
		</form>
	</div>
	
	<!-- Data Move Button -->
	<div class="container">
		<h4 class="bg-warning text-danger">Oracle에서 Mysql로 데이터가 이동 됩니다.</h4>
		<button type="button" class="btn btn-danger">Data Move</button>
	</div>
	
</section>

<!-- php controll -->
<?php 
	include 'php/manager.php';
	//Useage:
		//oracle db 인스턴스 생성
		$oracleDB=new OracleDB("test1234","test1234","192.168.0.141/oracle9i");
		//mysql db 인스턴스 생성
		$mysql=new MysqlDB("localhost", "root", "root", "test1234");
		// 	print_r($mysql);
		//매니저 인스턴스 생성
		$manager=new Manager($mysql);
		//오라클 디비에서 데이터 가져오기
		$oracleData=$oracleDB->selectAll();
	// 	print_r($oracleData);
		//주소 변환 및 데이터 이동하기
		//move(테이블이름,주소컬럼이름,데이터)
		$manager->move("test1234","ADDR",$oracleData);
		//db 닫기
		$oracleDB->disConn();
		$mysql->disConn();
?>

<?php 
include 'footer.php';
?>
