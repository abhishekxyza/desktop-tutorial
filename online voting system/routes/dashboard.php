<?php
session_start();
if(!isset($_session['userdata'])){
    header("location../");
}
$userdata=$_SESSION['userdata'];
$groupsdata=$_SESSION['groupsdata'];
if($_SESSION['userdata']['status']==0){
    $status='<b style="color:red">not voted </b>';
}
else{
    $status='<b style="color:green">voted </b>'; 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>online voting system - dashboard</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
</head>
<body>
    <style> 
    #backbtn{
        padding-block: 5px;
    padding-inline: 5px;
    background-color: #0984e3;
    color: white;  
    float:left;
    margin: 10px;
    }
    #logoutbtn{
        padding-block: 5px;
    padding-inline: 5px;
    background-color: #0984e3;
    color: white;
    float:right;
    margin: 10px;
    }
#profile{
background-color: white;
width:40%;
padding:20px;
float:left;

}

#group{
    background-color: white;
width:60%;
padding:20px;
float:right;

}
#votebtn{
    padding-block: 5px;
    padding-inline: 5px;
    background-color: #0984e3;
    color: white;  
}
#mainpanel{
    padding:10px;
}
#headersection{
    padding: 10px;
}
#voted{
    padding-block: 5px;
    padding-inline: 5px;
    background-color: #0984e3;
    color: white;
}






    </style>





<div id="mainSection"> 
    <center>
        <div id="headersection">
        <a href="../"><button id="backbtn">back</button></a>
        <a href="logout.php"><button id="logoutbtn">logout</button></a>
    <h1>online voating system</h1>
</div>
</center>
    <hr>
    <div id="mainpanel">

    <div id="profile">
<center><image src="../uploads/<?php echo $userdata['photo'] ?>"height="100"width="100"></center><br><br>
    <b>name:</b><?php $userdata["name"]?><br><br>
    <b>mobile:</b><?php $userdata["mobile"]?><br><br>
    <b>Address:</b><?php $userdata["address"]?><br><br>
    <b>status:</b><?php $status?><br><br>
    </div>

    <div id="group">

    </div>

</div>

    
   
    <div id="group">
<?php
if($_SESSION['groupsdata']){
for( $i=0; $i<count($groupsdata); $i++){
?>
<div>
    <img style="float:right" src="../uploads/<?php echo $groupsdata[$i]["photo"] ?>"height="100" width="100">
    <b>group name:</b> <?php echo $groupsdata[$i]["name"]?><br><br>
    <b>Votes:</b><?php echo $groupsdata[$i]["name"]?><br><br>
    <form action="../api/vote.php" method="POST">
    <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]["votes"]?>">
    <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]["id"]?>">
<?php
if($_SESSION["userdata"]["status"]==0){


    ?>
    <input type="submit" name="votebtn" value="vote" id="votebtn">
    <?php

}
else{
    ?>
    <button disable type="submit" name="votebtn" value="vote" id="voted">voted</button>
    <?php




}

?>


    
</form>
</div>
<hr>
<?php
}
}
else{

}
?>
</div>
    </div>

</body>
</html>