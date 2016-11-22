
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<script type="javascript/text">
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
    </script>


</head>

<body>

  <?php include "include/header.php";?>
<div class="login-page">

  <div class="form">
   <form class="register-form" id="myForm"  method="post">
  
                 
      <input type="text" placeholder="name" name = "txt_uname"/>

      <input type="password" placeholder="password" name="txt_upass"  />
      <input type="text" placeholder="email address" name="txt_umail"  "/>
      <button type="submit" name="btn-signup">create</button>
  
      
    

      <p class="message">Already registered? <a href="login.php">Sign In</a></p>
    </form>
   

  </div>
</div>

<?php
require_once 'include/config.php';


if(isset($_POST['btn-signup']))
{
   $uname = trim($_POST['txt_uname']);
   $umail = trim($_POST['txt_umail']);
   $upass = trim($_POST['txt_upass']); 
 
echo $uname;

   if($uname=="") {
     echo '<script language="javascript">';
     echo 'alert("provide username !")';
     echo '</script>';
     
   }
   else if($umail=="") {
      echo '<script language="javascript">';
      echo 'alert("provide email id!")';
      echo '</script>';
    }
   else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
      echo '<script language="javascript">';
      echo 'alert("Please enter a valid email address !")';
      echo '</script>'; 
      
   }
   else if($upass=="") {
      echo '<script language="javascript">';
      echo 'alert("provide password!")';
      echo '</script>'; 
    }
   else if(strlen($upass) < 6){
    echo '<script language="javascript">';
      echo 'alert("password must be atleast 6 characters!")';
      echo '</script>'; 
      
   }
   else
   {
      try
      {
   $stmt = $db_con->prepare("SELECT user_name,user_email FROM user WHERE user_name=:uname OR user_email=:umail");
         $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
         echo "sas".$row['user_name']." ".$uname;
         if($row['user_name']==$uname) {
            echo '<script language="javascript">';
            echo 'alert("sorry username already taken")';
            echo '</script>'; 
               }
         else if($row['user_email']==$umail) {

          echo '<script language="javascript">';
          echo 'alert("sorry email id already taken")';
          echo '</script>'; 
            
         }
         else
         {
            if($user->register($uname,$umail,$upass)) 
            {
                $user->redirect('login.php');
            }
         }
     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
  } 
}

?>

    <?php include 'include/footer.php' ?>

  </body>

  </html>

  