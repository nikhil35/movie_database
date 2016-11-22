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

<?php include 'include/header.php' ;?>
   <div class='wrapper'>
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
echo "<script>window.open('n.php','_self')</script> ";
exit();


}

echo $search;

if(!$user->search($search)){
echo "<script>alert('No results found')</script>";
echo "<script>window.open('n.php','_self')</script>"; 

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
  