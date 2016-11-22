
<html>
<head>
<title>HOME</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
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

ul.pagination {
    display: inline-block;
    padding: 0;
    margin: 0;
}

ul.pagination li {display: inline;}

ul.pagination li a {
    color: red;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
     
}



ul.pagination li a:hover{background-color:black;}

</style>
</head>
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

<div class="wrapper">

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

           

               
              $page=$_GET['page'];

                        if(!isset($page))
                        {
                          $page1=0;
                           }
              if($page==""||$page=="1")
              {


                $page1=0;
              }   
              else
              {
                $page1 = ($page*5)-5;

              }


                $stmt = $db_con->prepare("select *from movie join movie_actor on movie.Movie_id=movie_actor.movie_id join actor on actor.actor_id=movie_actor.Actor_id join movie_director on movie.Movie_id=movie_director.movie_id join director on movie_director.director_id=director.director_id LIMIT $page1 , 5;");
                $stmt->execute(); 
                     
             
             

             while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
              echo "<tr><td>".$row['Tittle']."</td><td>";
              echo  $row['Year']."</td>";
              echo "<td>".$row['Genre']."</td><td>";
              
              echo $row['First_name']." ".$row['Last_name']."</td><td>";
          
              echo $row['first_name']." ".$row['last_name']."</td><td>";
              echo $row['Rating']."</td><td>";
              echo "<img src=images/".$row['Poster']." height=100 width=100>"."</td>";
            ?>
              <td><a  id="link1" href="edit.php?PID=<?php echo $row['Movie_id'];?>">Edit</a></td><td>
              <a id ="link1" href="delete.php?PID=<?php echo $row['Movie_id']; ?>">Delete</a></td>
              <?php


            }

            


                $sql = $db_con->prepare("select *from movie join movie_actor on movie.Movie_id=movie_actor.movie_id join actor on actor.actor_id=movie_actor.Actor_id join movie_director on movie.Movie_id=movie_director.movie_id join director on movie_director.director_id=director.director_id;");
                $sql->execute();
               $count = $sql->rowCount();
               
               $a = $count/5;
               $a=ceil($a);
               //echo " ".$a;

               

            ?>

            </table>
            <center>
            <ul class="pagination">

<?php

for($b=1;$b<=$a;$b++)
               {

                ?><li><a  href="home.php?page=<?php echo $b;?>"><?php echo $b." "; ?></a></li><?php 

               }

?>
</ul></center>
<div class='push'>


</div>


       <?php include "include/footer.php"?>

</body>

</html>