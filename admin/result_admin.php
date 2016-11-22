<html>
<head>
 <title>movies</title>
  <style>
  table, th, td {
  cellpadding:"0";
  cellspacing:"0";
  border:"0"
  position:relative;
  margin:auto;
  
  border-collapse: separate;
  border-color: gray;
  padding :10px 12px 10px 10px;
}
</style>
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <body>

<div style="height:100px">
     <header>
       <img src='images/n.jpg' id="logo">
         <nav>
           <ul>
          <li> <a id="link" href="home.php">HOME</a> </li>  
           <li> <a id="link" href="insert_form.php">INSERT</a> </li>  
<?php

include "include/config.php";
   
  if($user->is_loggedin())
  {
  ?>
             
            <li><a id="link" href="logout.php" >LOGOUT</a> </li><?php } 
           

        else
  {
    header("location:login.php");
  }
             ?> 

              <li> <form action='result_admin.php' method='get'>
                     <input type="text" name="query" placeholder='search';height:25px style="border-radius: 4px;height:25px">&nbsp;
                      <input type = "submit" name="search" value="search" id='button'>
                    </form>
              </li>
           </ul>
        </nav>
     </header>
  </div>
   <div id='wrapper'>
<table><tr>
<th>Title </th>
<th>Year</th>
<th>Genre</th>
<th>Actor</th>

<th>Director</th>

<th>Rating</th>
<th>Poster</th>
</tr>
  <?php
 
   include 'include/config.php' ;
 if(isset($_GET['search'])){
$search=$_GET['query'];

if($search=='')
{
echo "<script>alert('enter title')</script>";
echo "<script>window.open('home.php','_self')</script> ";
exit();


}

echo $search;

if(!$user->admin_search($search)){
echo "<script>alert('No results found')</script>";
echo "<script>window.open('home.php','_self')</script>"; 

}
}
?>



            </table>


<div class='push'>


</div>
</div>
</body>
 <?php include "include/footer.php";?>

</html>
  