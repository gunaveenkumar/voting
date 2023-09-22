

<?php
session_start();


if( $_SESSION['status']==0)
{
 $ans="not voted";
}
else
{
    $ans="voted";
}
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
    <div>
        <button><a href="login.html">Back</a></button>
        <button><a href="singup.html">logout</a></button>
    </div>

    <div><h1>Voting System</h1></div>
    <div> 
        <?php
        $group=$_SESSION['group'];
        for($i=0;$i<count($group);$i++)
        {
            echo "Group Name: {$group[$i]["name"]} <br> ";
            echo "votes: {$group[$i]["vote"]}<br><hr>"  ;
            ?>
        
            <form action="counting.php" method="post">
             <input type="hidden" name="id" value="<?php  echo " {$group[$i]["id"]}"?>">
             <input type="hidden" name="vote" value="<?php  echo " {$group[$i]["vote"]}"?>">
           
        <?php
        
        if($_SESSION['status']==0)
           {
            ?>
              <button type="submit" name="click">vote</button>
              <?php
           }
     else
          {
            ?>
             <button>voted</button>
             
             <?php
          } 
        
        
    
    ?>
          </form>
          <?php
          ?>
          <?php
        
        }
        ?>
       
<hr>
        <div>
         <h3> Name <br>       <?php echo $_SESSION['name']
         ?>
         </h3>

        <h3> phone Number<br>  <?php echo $_SESSION['phone']
         ?>   
         </h3>

        <h3> status<br>       <?php echo $ans
         ?>   
        </h3>
        <hr>
        
    </div>
    </div>
   

</body>
</html>


