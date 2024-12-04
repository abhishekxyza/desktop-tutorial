<?php

include("connect.php");
$name=$_post['name'];
$mobile=$_post['mobile'];
$address=$_post['address'];
$password=$_post['password'];
// $confirmpassword=$_post['confirm password'];

// $image=$_FILES['name']['photo'];
// $tmp_name=$_FILES['photo']['tmp_name'];
$role=$_post['role'];
if($password==$confirmpassword){
move_uploaded_file($tmp_name,"../uploads/$image");
$insert=mysqli_query($connect,"INSERT INTO user (name,mobile,address,password,role,status,votes) VALUES ('$name','$mobile','$address','$password','$role',0,0)");
if($insert){
    echo'
    <script>
    alert("registration successfull!");
    window.location="../";
    </script>
    ';
}
else{
    echo'
    <script>
    alert("some error occured!");
    window.location="../routes/register.html";
    </script>
    ';
}
}
else{
    echo'
    <script>
    alert("Password and confirmpassword does not match!");
    window.location="../routes/register.html";
    </script>
    ';
}
?>