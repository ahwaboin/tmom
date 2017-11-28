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
		<form class="form-horizontal" method="POST" action="dmmy.php">
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
</section>
<?php 
include 'footer.php';
?>