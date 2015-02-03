<?php
ob_start();
include('konek.php');

if(isset($_POST['btnSave'])){

	$lastname = stripslashes($_POST['lastname']);
	$firstname = stripslashes($_POST['firstname']);
	$middlename = stripslashes($_POST['middlename']);
	$address = stripslashes($_POST['address']);
	$contact = stripslashes($_POST['contact']);

	$sql = mysql_query("INSERT INTO tblStudents2(`firstname`,`lastname`,`middlename`,`address`,`contact`) 
				VALUES('".$firstname."','".$lastname."','".$middlename."','".$address."','".$contact."')");

	if($sql){
		header("Location: index.php");
	}else{
		echo "<font color='red'>Error inserting data</font>";
	}


}

?>


<h2>Add New Student</h2>

<form method="post">
<p>Last Name: <input type="text" name="lastname" id="lastname" placeholder="Last Name"></p>
<p>First Name: <input type="text" name="firstname" id="firstname" placeholder="First Name"></p>
<p>Middle Name: <input type="text" name="middlename" id="middlename" placeholder="Middle Name"></p>
<p>Address: <input type="text" name="address" id="address" placeholder="Address"></p>
<p>Contact: <input type="text" name="contact" id="contact" placeholder="Contact"></p>
<p><input type="submit" value="save" name="btnSave" id="btnSave"> <a href="index.php"> Back </a></p>
</form>