


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
<script type="javascript/text">


</script>

</head>

<body>
  <?php include 'include/header.php' ?>


<div class="login-page">
  <div class="form">
   
    <form class="login-form" method="post" >
      <input type="text" placeholder="username" name="txt_uname"/>
      <input type="password" placeholder="password" name="txt_password"/>
      <button type="submit" name="btn-login">login</button>

      <p class="message">Not registered? <a href="register.php">Create an account</a></p>
    </form>
  </div>
</div>
<?php
require_once 'include/config.php';

if(isset($_POST['btn-login']))
{
 $uname = $_POST['txt_uname'];
 $upass = $_POST['txt_password'];
   echo $uname;
   echo " ".$upass;
   if($user->login($uname,$upass)) {
           // session_start();
            echo "done";
            echo '<script language="javascript">';
            echo 'alert("logged in")';
            echo '</script>'; 
  
    header('Location:home.php');
    }
 else
 {
echo '<script language="javascript">';
            echo 'alert("wrong details")';
            echo '</script>'; 
 } 
}
?>

    <?php include 'include/footer.php' ?>

  </body>

  </html