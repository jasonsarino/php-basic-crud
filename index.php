<?php
ob_start();
include('konek.php');
?>


<h2>Student Lists</h2>

<p><a href="add_student.php">Add Student</a></p>
<table border="1">
<tr>
	<th>Last Name</th>
	<th>First Name</th>
	<th>Middle Name</th>
	<th>Address</th>
	<th>Contact</th>
	<th colspan="2">Commands</th>
</tr>
<?php
$sql = mysql_query("SELECT `studentID`,`firstname`,`lastname`,`middlename`,`address`,`contact`
					FROM `tblStudents` 
					ORDER BY `lastname`");
if(mysql_num_rows($sql) == 0){
	echo "<tr><td colspan='7'>No Student found.</td></tr>";
}else{
	while($rs = mysql_fetch_array($sql)){
?>
<tr>
	<td><?php echo $rs['lastname'];?></td>
	<td><?php echo $rs['firstname'];?></td>
	<td><?php echo $rs['middlename'];?></td>
	<td><?php echo $rs['address'];?></td>
	<td><?php echo $rs['contact'];?></td>
	<td><a href="edit_student.php?id=<?php echo $rs['studentID'];?>">Edit</a></td>
	<td><a href="delete_student.php?id=<?php echo $rs['studentID'];?>" onClick="return confirm('Are you sure you want to delete?');">Delete</a></td>
</tr>
<?php }}?>
</table>