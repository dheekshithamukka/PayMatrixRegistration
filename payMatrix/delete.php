<?php
$con = mysqli_connect('localhost','pay_matrix','PayMatrix','payMatrixRegistration');
if(mysqli_connect_errno()){
    echo "Failed to connect ".mysqli_connect_error();
}
session_start();
?>
<!doctype html>
<html>
<head>
    <title>Delete account</title>
    <link rel="stylesheet" href="edit.css">
    <!-- Place your kit's code here -->
    <script src="https://kit.fontawesome.com/3203fd57e4.js" crossorigin="anonymous"></script>
</head>

<?php 

    $r = $_SESSION['id'];
    //echo $r;
$sql = " DELETE FROM registration WHERE rollNo='$r' ";
$result=mysqli_query($con,$sql);
if($result)
{
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Deleted successfully. ');
		window.location.href = 'index.php';
		</script>");
}
else{
    echo ("<script LANGUAGE='JavaScript'>
		 window.alert('There is some problem in deleting account. Try again. ' );
		window.location.href = 'profile.php';
		</script>");
    //Echo "There is some problem in inserting record";
    //header('location:stdProfile.php');
}
?>