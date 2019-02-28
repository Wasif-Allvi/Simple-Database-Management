<?php
include_once 'dbMySql.php';
$con = new DB_con();
$table = "users";
// data insert code starts here.
if(isset($_GET['edit_id']))
{	
	$sql = "SELECT * FROM users WHERE user_id=".$_GET['edit_id'];
	$res = mysqli_query($con->conn,$sql);
	$result = mysqli_fetch_array($res);
}
// data update code starts here.
if(isset($_POST['btn-update']))
{
	$fname = $_POST['first_name'];
	$lname = $_POST['last_name'];
	$email = $_POST['email_name'];
	
	$id=$_GET['edit_id'];
	$res=$con->update($table,$id,$fname,$lname,$email);
	if($res)
	{
		?>
		<script>
		alert('Record updated...');
        window.location='index.php'
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error updating record...');
        window.location='index.php'
        </script>
		<?php
	}
}
// data update code ends here.

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Database Operation Using OOP</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<?php
include_once 'header.php';
?>

<div id="body">
	<div id="content">
    <form method="post">
    <table align="center">
    <tr>
    <td><input type="text" name="first_name" placeholder="First Name" value="<?php echo $result['first_name']; ?>"  /></td>
    </tr>
    <tr>
    <td><input type="text" name="last_name" placeholder="Last Name" value="<?php echo $result['last_name']; ?>" /></td>
    </tr>
    <tr>
    <td><input type="text" name="email_name" placeholder="email" value="<?php echo $result['email']; ?>" /></td>
    </tr>
    <tr>
    <td>
    <button type="submit" name="btn-update"><strong>UPDATE</strong></button></td>
    </tr>
    </table>
    </form>
    </div>
</div>

<?php
include_once 'footer.php';
?>

</center>
</body>
</html>