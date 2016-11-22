
<html>
<head>
<title>HOME</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style>
  table, th, td {
  position:relative;
  margin:auto;
    border: 1px solid black;
       border-collapse: separate;
       border-color: gray;
    padding :10px 10px 10px 10px;
}
</style>
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
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

              <li> <form>
                     <input type="text" name="genre"/ placeholder='search';height:25px style="border-radius: 4px;height:25px">&nbsp;
                      <input type = "submit" value="search" id='button'>
                    </form>
              </li>
           </ul>
        </nav>
     </header>
  </div>
 <section>

              <?php 
                 $mov_id=$_GET['PID'];
                $stmt = $db_con->prepare("select *from movie join movie_actor on movie.Movie_id=movie_actor.movie_id join actor on actor.actor_id=movie_actor.Actor_id join movie_director on movie.Movie_id=movie_director.movie_id join director on movie_director.director_id=director.director_id where movie.Movie_id = $mov_id;");
                $stmt->execute();


            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            

            ?>
        
         

         <div id="form">
             <form  method ="post"  action="" enctype="multipart/form-data">
                  Movie Name:<input type="text" name="mov_name" value="<?php echo $row['Tittle']; ?>"/> <br><br>
                  Year:<input type="text" name="year" id="datepicker" value="<?php echo $row['Year'];?>" /> <br><br>
                  Genre:<input type="text" name="genre" value="<?php echo $row['Genre'];?>" /> <br><br>
                  Rating:<input type="text" name="rating" value="<?php echo $row['Rating'];?>" /> <br><br>
                   
                  <b>Actor:</b><br>
                  Firstname:<input type="text" name="firstname" value="<?php echo $row['First_name'];?>" /><br><br>
                  Lastname:<input type="text" name="lastname" value="<?php echo $row['Last_name'];?>" /><br><br>
               
                 <b>Gender</b>:
               

                  Male <input type="radio" name="gender"  style="margin-right:5px" value='Male' <?php if ($row['Gender'] == 'Male') echo 'checked="checked"';?> />
                  Female <input type="radio" name="gender" value="Female" <?php if ($row['Gender'] == 'Female') echo 'checked="checked"';?>"/><br><br>
             
                  <b>Director</b><br>
                  Firstname:<input type="text" name="first_name" value=<?php echo $row['first_name'];?> /><br><br>
                  Lastname:<input type="text" name="last_name" value=<?php echo $row['last_name'];?> /><br><br>
                
                 <b>Gender</b>:
               

                  Male <input type="radio" name="dir_gender"  style="margin-right:5px" value='Male' <?php if ($row['gender'] == 'Male') echo 'checked="checked"';?> />
                  Female <input type="radio" name="dir_gender" value="Female" <?php if ($row['gender'] == 'Female') echo 'checked="checked"';?>"/><br><br>
             




                 

                  Poster:<input type="file" name="file">


                  <input type = "submit" value="Update" name="submit">
             </form>
             </div>
             
</body>
</section>



       

       <?php
        if(isset($_POST['submit'])) 
 {
       $id = $row['Movie_id']; 
       $title =  $_POST['mov_name'];
       $year = $_POST['year'];
       $genre = $_POST['genre'];
       $rating = $_POST['rating'];
       $firstName = $_POST['firstname'];
       $lastName = $_POST['lastname'];
       $gender = $_POST['gender'];  
       $first_name = $_POST['first_name'];
       $last_name = $_POST['last_name'];
       $dir_gender = $_POST['dir_gender'];
       $imgFile = $_FILES['file']['name'];
       $tmp_dir = $_FILES['file']['tmp_name'];
       $imgSize = $_FILES['file']['size'];

       if($imgFile){
                        
                              $upload_dir = 'images/'; // upload directory
 
                               $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
                               $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
   // rename uploading image  
                               $userpic = $row['Poster'];
                                $userpic = rand(1000,1000000).".".$imgExt;
    

                                  if (in_array($imgExt, $valid_extensions)) {   
    // Check file size '5MB'
                                       if($imgSize < 5000000)    {
                                               // unlink($upload_dir.$row['Poster']);
                                                move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                                               
                                        }  else {
                                                    $errMSG = "Sorry, your file is too large.";
                                                }
                                   } else {
                                             $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
                                         }
                              } else{
                                       $userpic=$row['Poster'];
                                     }
  echo " ".$userpic." ";
  
   if($user->update($id, $title, $year, $genre, $rating, $userpic, $firstName, $lastName, $gender, $first_name, $last_name, $dir_gender)) {
            
            echo "done";
            echo '<script language="javascript">';
            echo 'alert("Updated")';
            echo '</script>'; 
            echo "<script>window.open('home.php','_self')</script> ";
       //header("Location:home.php");
    
    }
 else
 {
echo '<script language="javascript">';
            echo 'alert("wrong details")';
            echo '</script>'; 
 } 
 
}else{
 "form submitted";}

          
  

        include "include/footer.php" ?> 
</html>