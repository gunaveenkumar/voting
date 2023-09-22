<?php
include("database.php");



if(empty($_POST["name"]))
{ 
    echo "enter name";
}

if(empty($_POST["number"]))
{
    die("enter the number");
}

if(preg_match("/[a-z]/",$_POST["number"]))
{
    die("wrong number");
}
if(strlen($_POST["number"])!=10)
{
    die("must have 10 number");
}

if(empty($_POST["password"]))
{
    die("Enter the password");
}
if(empty($_POST["con_password"]))
{
    die("RE-Enter the password");
}

if(($_POST["password"])!=($_POST["con_password"]))
{
    die("password does not match");
}
if(empty($_POST["option"]))
{
    die("select the option");
}
?>


<?php
$name=$_POST["name"];
$phone=$_POST["number"];
$pass=$_POST["password"];
$repass=$_POST["con_password"];
$opt=$_POST["option"];
 $sql="INSERT INTO voting(name,phonenumber,password,selectoption,status,vote	)
                   VALUES('$name','$phone','$pass','$opt','0','0')";
       try
       {
        $result= mysqli_query($conn,$sql);
        header('location:login.html');
       }
      catch(mysqli_sql_exception)
      {
          echo"some error in connecting SQL database";
      }

?>