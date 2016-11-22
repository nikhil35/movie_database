<html>
<head>
<title>data</title>
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
}
</style>
 <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php include 'include/header.php'; ?>
  <?php 
include 'include/config.php';

                 $mov_id=$_GET['PID'];
                $stmt = $db_con->prepare("select *from movie join movie_actor on movie.Movie_id=movie_actor.movie_id join actor on actor.actor_id=movie_actor.Actor_id join movie_director on movie.Movie_id=movie_director.movie_id join director on movie_director.director_id=director.director_id where movie.Movie_id = $mov_id;");
                $stmt->execute();


            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            

            echo $row['Tittle'];
        
         
?>
<table>
  <tr>
   
  </tr>
  <tr>
    <td rowspan=5>
<?php	
    echo "<img src=images/".$row['Poster'].">";

    ?></td>
    <td>Tittle:<?php echo "<b><em>".$row['Tittle'];     ?></td>
   
   
  </tr>
  <tr>
   <td>Year:<?php echo "<b><em>".$row['Year'];     ?></td>
   
  </tr>
  <tr>
   <td> Genre:<?php echo "<b><em>".$row['Genre'];     ?></td>
  </tr>
   <tr>
   <td> Actor:<?php echo "<b><em>".$row['First_name']." ".$row['Last_name'];     ?></td>
  </tr>
   <tr>
   <td> Director:<?php echo "<b><em>".$row['first_name']." ".$row['last_name'];     ?></td>
  </tr>
</table>



</body>
<?php include "include/footer.php";?>

</html>