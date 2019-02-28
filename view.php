<?php
include_once 'dbMySql.php';
$con = new DB_con();
$table = "users";
$res=$con->select();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Database Operation Using OOP</title>
<link rel="stylesheet" href="style.css" type="text/css" />

<script type="text/javascript">
function del_id(id)
{
	if(confirm('Sure to delete this record ?'))
	{
		window.location = 'delete_data.php?delete_id='+id
	}
}
function edit_id(id)
{
	if(confirm('Sure to edit this record ?'))
	{
		window.location = 'edit_data.php?edit_id='+id
	}
}
</script>


</head>
<body>
<center>
<?php
include_once 'header.php';
?>
<div id="body">
	<div id="content">
    <table align="center">
    <tr>
    <th colspan="5">  <a href="index.php"><img src="b_back.jpg" alt="back" height="42" width="42"/></a></th>
    </tr>
     <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th colspan="2">edit/delete</th>
    </tr>
    <?php
	while($row=mysqli_fetch_row($res))
	{
			?>
            <tr>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
			<td align="center"><a href="javascript:edit_id(<?php echo $row[0]; ?>)"><img src="b_edit.png" alt="EDIT" /></a></td>
            <td align="center"><a href="javascript:del_id(<?php echo $row[0]; ?>)"><img src="b_drop.png" alt="DELETE" /></a></td>
            </tr>
            <?php
	}
	?>
    </table>
    </div>
</div>
<?php
include_once 'footer.php';
?>
</center>
</body>
</html>