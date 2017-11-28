<?php 
include 'header.php';
?>
<section>
	<div class="container">
		<div class="page-header">
  		<h2>Data Move <small>section</small></h2>
		</div>
	</div>
	<div class="container">
		<h3>Oracle input</h3>
		<?php 
		if($_POST["oracleUser"]){
				echo $_POST["oracleUser"]."<br/>";
				echo $_POST["oraclePass"]."<br/>";
				echo $_POST["oraclePath"]."<br/>";
		}
		?>
		<?php
				foreach($_POST as $key=>$value) {
				    echo 'name="'.$key.'" value="'.$value;
				}
		?>
	</div>
	<!-- Mysql -->
	<div class="container">
		<h3>Mysql Connect</h3>
	</div>
	<div class="container">
		<form class="form-horizontal" method="post" action="datamoveresult.php">
			<!-- oracle data -->
			<?php
				foreach($_POST as $key=>$value) {
				    echo '<input type="hidden" name="'.$key.'" value="'.$value.'">';
				}
			?>
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
</section>
<?php 
include 'footer.php';
?>