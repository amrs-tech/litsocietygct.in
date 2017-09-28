<?php

$name = $dept = $clg = $mail = $mobnum = "";
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$name = $_POST["Name"];
	$dept = $_POST["Dept"];
	$clg = $_POST["clg"];
	$mail = $_POST["mail"];
	$mobnum = $_POST["mobnum"];
}
else{
	echo "<html>";
	//echo "<script type='text/javascript'>";
	//echo "alert('Server Error. Try after Sometime !');";
	//echo "</script>";
	echo "<br>";
	echo "<div align = 'center'>";
	echo "<b>Server Error. Try after Sometime !</b>";
	echo "</div>";
	echo "</html>";
}
?>

<?php
$serv = "localhost:3306";
$user = "litsocie_lds";
$pass = "ldsgct641013";
$db = "litsocie_ldsreg";

$conn = new mysqli($serv,$user,$pass,$db);

if($conn->connect_error){
	echo "<br>";
	echo "<div align = 'center'>";
	echo "Internal Database Error !";
	echo "</div>";
}
else{
	$sql = "insert into details(name,dept,clg,mail,mobnum) values('$name','$dept','$clg','$mail','$mobnum')";
	if($conn->query($sql)===True){
		echo "<html>";
		//echo "<script type='text/javascript'>";
		//echo "alert('Registered Successfully. You'll receive a confirmation mail within today !');";
		//echo "</script>";
		echo "<br>";
		echo "<div align = 'center'>";
		echo "<b>Registered Successfully. You'll receive a confirmation mail within today !</b>";
		echo "</div>";
		echo "</html>";
	}
	else{
		echo "<html>";
		//echo "<script type='text/javascript'>";
		//echo "alert('Internal Server Error. Try after Sometime !');";
		//echo "</script>";
		echo "<br>";
		echo "<div align = 'center'>";
		echo "<b>Database Error !</b>";
		echo "</div>";
		echo "</html>";
	}
	$conn->close();
}
?>