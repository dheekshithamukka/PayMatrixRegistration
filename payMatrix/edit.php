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
    <title>Registration page</title>
    <link rel="stylesheet" href="edit.css">
    <!-- Place your kit's code here -->
    <script src="https://kit.fontawesome.com/3203fd57e4.js" crossorigin="anonymous"></script>
</head>

<body>
    <form action="" name="form" method="POST" >
        <div class="container">
            <h1>Edit</h1>
            <div class="box">
                <i class="fa fa-user-circle-o"></i>
                <input type="text" name="name" id="name" placeholder="Enter Your Name" required autocomplete="off">
            </div>
            <div class="box">
                <i class="fa fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Enter your email" value=" " required autocomplete="off">
            </div>
            <div class="box">
                <i class="fa fa-phone"></i>
                <input type="text" name="phone" id="phone" placeholder="Enter your phone number" required autocomplete="off"><br>
                <!--<span id="messages" style="color: red; margin-left: 42px"></span>-->
            </div>
            <!--<a href="register.html"><button class="btn" onclick="return Validation()">Register</button></a>-->
            <input type="submit" value="Edit" name="submit" class="btn"/>
        </div>
    </form>
</body>

</html>


<?php 
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $r = $_SESSION['id'];
    echo $r;
if($name=='' || $email=='' || $phone=='')
{
echo "Please fill the empty field.";
}
else{
$sql="UPDATE registration SET name='$name', email='$email', phone_number='$phone' WHERE rollNo='$r' ";
$result=mysqli_query($con,$sql);
if($result)
{
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Updated successfully. ');
		window.location.href = 'profile.php';
		</script>");
}
else{
    echo ("<script LANGUAGE='JavaScript'>
		 window.alert('There is some problem in updating record. Try again. ' );
		window.location.href = 'edit.php';
		</script>");
    //Echo "There is some problem in inserting record";
    //header('location:stdProfile.php');
}
}
}
?>