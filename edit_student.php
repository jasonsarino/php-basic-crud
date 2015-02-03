<?php
ob_start();
include('konek.php');

if(isset($_POST['btnSave'])){

	$studentID = stripslashes($_POST['studentID']);
	$lastname = stripslashes($_POST['lastname']);
	$firstname = stripslashes($_POST['firstname']);
	$middlename = stripslashes($_POST['middlename']);
	$address = stripslashes($_POST['address']);
	$contact = stripslashes($_POST['contact']);

	$sql = mysql_query("UPDATE tblStudents SET 
						`firstname` = '".$firstname."',
						`lastname` = '".$lastname."',
						`middlename` = '".$middlename."',
						`address` = '".$address."',
						`contact` = '".$contact."'
						WHERE `studentID` = ".$studentID);

	if($sql){
		header("Location: index.php");
	}else{
		echo "<font color='red'>Error updating data</font>";
	}


}

?>


<?php
$id = $_GET['id'];
$sql = mysql_query("SELECT `studentID`,`firstname`,`lastname`,`middlename`,`address`,`contact` 
					FROM `tblStudents`
					WHERE `studentID` = ".$id);
$rs = mysql_fetch_array($sql);
?>
<h2>Edit Student</h2>

<form method="post">
<input type="hidden" name="studentID" id="studentID" value="<?php echo $rs['studentID'];?>">
<p>Last Name: <input type="text" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $rs['lastname'];?>"></p>
<p>First Name: <input type="text" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $rs['firstname'];?>"></p>
<p>Middle Name: <input type="text" name="middlename" id="middlename" placeholder="Middle Name" value="<?php echo $rs['middlename'];?>"></p>
<p>Address: <input type="text" name="address" id="address" placeholder="Address" value="<?php echo $rs['address'];?>"></p>
<p>Contact: <input type="text" name="contact" id="contact" placeholder="Contact" value="<?php echo $rs['contact'];?>"></p>
<p><input type="submit" value="save" name="btnSave" id="btnSave"> <a href="index.php"> Back </a></p>
</form>