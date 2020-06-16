<!--
   Database : 'payMatrixRegistration' , 
   SQL for table 'registration'

    CREATE TABLE `registration` (
    `id` int(200) NOT NULL,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `phone_number` varchar(10) NOT NULL,
    `rollNo` varchar(100) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-->

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
    <link rel="stylesheet" href="index1.css">
    <!-- Place your kit's code here -->
    <script src="https://kit.fontawesome.com/3203fd57e4.js" crossorigin="anonymous"></script>
</head>

<body>
    <!--<script>
        function Validation(inputtxt) {
            var a = document.getElementById("phone").value;
            if(a==""){
                document.getElementById("messages").innerHTML = "Please fill mobile number";
                return false;
            }
            if(isNaN(a)){
                document.getElementById("messages").innerHTML = "Only numbers are allowed.";
                return false;
            }
            if(a.length<10){
                document.getElementById("messages").innerHTML = "Mobile number must be 10 characters";
                return false;
            }
            if(a.length>10){
                document.getElementById("messages").innerHTML = "Mobile number must be 10 digits";
                return false;
            }
            if((a.charAt(0)!=9) && (a.charAt(0)!=8) && (a.charAt(0)!=7)){
                document.getElementById("messages").innerHTML = "Mobile number must start with 9 or 8 or 7.";
                return false;
            }
            else{
                return true;
            }
        }
    </script> -->
    <form action="" name="form" method="POST" >
        <div class="container">
            <h1>Registration Form</h1>
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
            <div class="box">
                <i class="fa fa-address-book"></i>
                <input type="text" name="roll" id="roll" placeholder="Enter your Roll No" required autocomplete="off">
                
            </div>
            <div class="small_field">
            <small>This field can't be changed again. Please fill correctly. </small></div>
            <div class="check">
                <input type="checkbox" name="checkbox" value="check" id="agree" required /> I have read and agree to the
                Terms and
                Conditions
            </div>
            <!--<a href="register.html"><button class="btn" onclick="return Validation()">Register</button></a>-->
            <input type="submit" value="Register" name="submit" class="btn"/>
        </div>
    </form>
</body>

</html>


<?php 
if(isset($_POST['submit'])){
    //echo "Hi";
$name=$_POST['name'];
$roll=$_POST['roll'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$_SESSION['id'] = $roll;
if($name=='' || $roll=='' || $email=='' || $phone=='')
{
echo "Please fill the empty field.";
}
else{
$sql="insert into registration(name,email,phone_number,rollNo) values('$name','$email','$phone','$roll')";
$res=mysqli_query($con,$sql);
if($res)
{
    /*<script>
        alert("Record successfully inserted");
    </script>*/
    echo ("<script LANGUAGE='JavaScript'>
		window.location.href = 'profile.php';
		</script>");
}
else{
    echo ("<script LANGUAGE='JavaScript'>
		 window.alert('There is some problem in inserting record');
		window.location.href = 'register.html';
		</script>");
    //Echo "There is some problem in inserting record";
    //header('location:stdProfile.php');
}
}
}
?>