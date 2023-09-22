<?php
include("database.php");
session_start();
?>

<?php
if(empty($_POST["name"]))
{ 
    echo "enter name <br>";
}
if(empty($_POST["number"]))
{
    die("enter the number")."<br>";
}
if(empty($_POST["password"]))
{
    die("Enter the password")."<br>";
}
if(empty($_POST["option"]))
{
    die("select the option")."<br>";
}
$name=$_POST["name"];
$phone=$_POST["number"];
$pass=$_POST["password"];
$status=$_POST["option"];
$sql="SELECT * FROM voting
WHERE name='$name'and phonenumber='$phone'and password='$pass'and selectoption='$status'";
$result=mysqli_query($conn,$sql);
          if(mysqli_num_rows($result)>0)
               {
                $sql="SELECT name,vote,id FROM voting
                       WHERE selectoption='group'";
                       $resultgroup=mysqli_query($conn,$sql);
            if(mysqli_num_rows($resultgroup)>0)
            {
                $group=mysqli_fetch_all($resultgroup,MYSQLI_ASSOC);
                $_SESSION['group']=$group;
            }
            $data=mysqli_fetch_array($result);
            $_SESSION['id']=$data['id'];
            $_SESSION['status']=$data["status"];
            $_SESSION['vote']=$data["vote"];
            $_SESSION['name']=$data["name"];
            $_SESSION['phone']=$data["phonenumber"];

            $_SESSION['data']=$data;
            header('location:votingpage.php');

               }
               else{
                echo"incorrect details";
               }
?>