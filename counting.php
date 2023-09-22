<?php
include("database.php");
session_start();

if($_SESSION['vote']==0)
    {
if(isset($_POST['click']))
{
    
$totalvote=$_POST["vote"]+1;

$gid=$_POST['id'];
$uid=$_SESSION['id'];

$sqli= "UPDATE  voting 
SET vote='$totalvote'
WHERE id='$gid'";
                    $updatevote=mysqli_query($conn,$sqli);
$sql="UPDATE voting 
SET status='1'
WHERE id='$uid'";
                     $updatestatus=mysqli_query($conn,$sql);
if($updatevote and $updatestatus)
{
    $sqli="SELECT * FROM voting
           WHERE selectoption ='group'";
           $group=mysqli_query($conn,$sqli);
          $groups= mysqli_fetch_array($group);
          $_SESSION['status']=$groups['status'];
          $_SESSION['status']=1;
         ?>
         <!DOCTYPE html>
         <html lang="en">
         <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
            <title>Document</title>
         </head>
         <body>
            <h2>voted successfully</h2>
            <button><a href="login.html">logout</a></button>

         </body>
         </html>
         <?php
    
}
else
{
    echo "some error";
}
    }
    else{
       
        session_destroy();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
            <title>Document</title>
        </head>
        <body>
            <h2>u have alredy voted</h2>
            <button><a href="login.html">logout</a></button>
        </body>
        </html>
        <?php

    }
}

?>