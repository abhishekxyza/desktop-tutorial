<?php
include("connect.php");
$mobile=$_POST['mobile'];
$password=$_POST['password'];
$role=$_POST['role'];
$check=mysqli_query($connect,"SELECT * FROM user WHERE mobile='$mobile' and password='$password' and role='$role' " );
if(mysqli_num_rows($check)>0){
$userdata=mysqli_fetch_array($check);
$groups=mysqli_query($connect,"SELECT * FROM user WHERE role=2 ");
$groupsdata=mysqli_fetch_all($groups, MYSQLI_ASSOC);
$_SESSION['userdata']=$userdata;
$_SESSION['groupsdata']=$groupsdata;
echo'
    <script>
    window.location="../routes/dashboard.php";
    </script>
    ';
}
else{
    echo'
    <script>
    alert("invalid credential or user not found!");
    window.location="../";
    </script>
    ';
}
?>