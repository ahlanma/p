<?php

//koneksi ke database employee
$connection =
mysqli_connect("localhost","root","","367_postest6") or die("Error " . mysqli_error($connection));

//query ke table employee
if(isset($_GET["dosen"])){
	$dosen = $_GET["dosen"];
	$sql = "select * from roman where dosen = '$dosen'";

} 

elseif(isset($_GET["nama_matkul"])){
	$nama_matkul = $_GET["nama_matkul"];
	$sql = "select * from roman where nama_matkul = '$nama_matkul'";

} 

else{
	$sql = "select * from roman order by id desc";
}

$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

//pembuatan array
$emparray = array();
while($row =mysqli_fetch_assoc($result))
{
	$emparray[] = $row;
}

//pembuatan json
echo json_encode($emparray);

//tutup koneksi
mysqli_close($connection);
?>