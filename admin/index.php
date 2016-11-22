<html>
<head>
 <title>movies</title>

    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery.cycle.all.js" type="text/javascript"></script>
    <script src="js/owl.carousel.js" type="text/javascript"></script>
    <script src="js/owl.carousel.min.js" type="text/javascript"></script>
       <link rel="stylesheet" type="text/css" href="css/style.css">
       <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
       <link rel="stylesheet" type="text/css" href="css/owl.theme.css">
       <link rel="stylesheet" type="text/css" href="css/owl.transitions.css">
    <script type="text/javascript">
      $ (document).ready (function() {
     
           var owl = $("#owl-demo");
     
           owl.owlCarousel ({

         
              navigation : true,
              slideSpeed: 300,
              paginationSpeed:400,
              singleItem:true
     
           });
     
      });


     </script>
</head>

<body>
  <?php
   include 'include/header.php' ;

   
  ?>
<section>

<?php

include "include/config.php";
  



           

               


                $stmt = $db_con->prepare("select  Poster,Tittle,Movie_id from movie Limit 3;");
                $stmt->execute();?>


           
   <div id="owl-demo" class="owl-carousel owl-theme">



<?php

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { echo $row['Poster']; ?>
       <div class="item">

          

          <h1><a  id="link1" href="index_result.php?PID=<?php echo $row['Movie_id'];?>">
      <?php      echo "<img src=images/" .$row['Poster'].">"; ?>
           </a>
                 <p>
                    <em>
                  
                     </em>
                </p>
          </h1>
      </div>
     <?php } ?>

     </div>
 </section>

<Section>
<h1 style="margin:10px"><em>Action MOVIES</em></h1>
<?php
 $sql = $db_con->prepare("select Movie_id,Poster,Tittle from movie where genre='Action';");
 $sql->execute();?>

<ul>
<?php
while($row = $sql->fetch(PDO::FETCH_ASSOC)) 
  { 
 ?>
<li style="display:inline-block">
<a  id="link1" href="index_result.php?PID=<?php echo $row['Movie_id'];?>">
<?php echo "<img src=images/".$row['Poster']." style=height:300px;width:200px;margin:10px><p><b><h5 style=text-align:center'>".$row['Tittle']."</h5></b></p></li>"; ?></a></li>
<?php }?>
</ul>

</Section>

<Section>
<h1 style="margin:10px"><em>Thriller movies</em></h1>
<?php
 $sqlt = $db_con->prepare("select  Poster,Tittle,Movie_id  from movie where genre='Thriller';");
 $sqlt->execute();?>

<ul>
<?php
while($row = $sqlt->fetch(PDO::FETCH_ASSOC)) 
  { 
 ?>
<li style="display:inline-block">
<a  id="link1" href="index_result.php?PID=<?php echo $row['Movie_id'];?>">
<?php echo "<img src=images/".$row['Poster']." style=height:300px;width:200px;margin:10px><p><b><h5 style=text-align:center'>".$row['Tittle']."</h5></b></p></li>"; ?></a></li>
<?php }?>
</ul>

</Section>
<?php
  include 'include/footer.php';
?>


       </div>
     </body>
   </html>
  
