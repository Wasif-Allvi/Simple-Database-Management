<?php
include_once 'dbMySql.php';
$con = new DB_con();
$table = "users";
if(isset($_GET['delete_id']))
{
	$id=$_GET['delete_id'];
	$res=$con->delete($table,$id);
	if($res)
	{
		?>
		<script>
		alert('Record Deleted ...')
        window.location='index.php'
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Record cant Deleted !!!')
        window.location='index.php'
        </script>
		<?php
	}
}
?>