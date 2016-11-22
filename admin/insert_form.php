<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <title>movies</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

<script>
   function nk(){
    
var x = document.forms["myForm"]["mov_name"].value;
var a = document.forms["myForm"]["year"].value;
var b = document.forms["myForm"]["genre"].value;
var c = document.forms["myForm"]["rating"].value;
var d = document.forms["myForm"]["firstname"].value;
var e = document.forms["myForm"]["lastname"].value;
var f = document.forms["myForm"]["gender"].value;
var g = document.forms["myForm"]["first_name"].value;
var h = document.forms["myForm"]["last_name"].value;
var i = document.forms["myForm"]["direct"].value;
var j = document.forms["myForm"]["file"].value;


    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
     if (a == "") {
        alert("year must be filled ouy");
        return false;
    }
     if (b == "") {
        alert("genre must be filled out");
        return false;
    }
     if (c == "") {
        alert("rating must be filled out");
        return false;
    }
     if (isNaN(c) || c < 1 || c > 10) {
        alert( "range for rating is 1 to 10");
    } 

     if (d == "") {
        alert("Actors first name must be filled out");
        return false;
    }
     if (e == "") {
        alert("Actors lastname must be filled out");
        return false;
    }
     if (f == "") {
        alert("Actors gender must be filled out");
        return false;
    }
     if (g == "") {
        alert("Directors firstname must be filled out");
        return false;
    }
     if (h == "") {
        alert("Directors lastname must be filled out");
        return false;
    }
     if (i == "") {
        alert("Directors gender must be filled out");
        return false;
    }
     if (j == "") {
        alert("file must be filled out");
        return false;
    }
  

    


}


   
   </script>

        <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <section>

        
         <?php include('include/header2.php'); ?>
        
         

         <div id="form">
    <form  name="myForm" method ="post"  action="" enctype="multipart/form-data" onsubmit="nk();">
                  Movie Name:<input type="text" name="mov_name"/> <br><br>
                  Year:<input type="text" id="datepicker" name="year"> <br><br>
                  Genre:<select name="genre">
                       <option value="Action">Action</option>
                       <option value="Thriller">Thriller</option>
                       <option value="Comedy">Comedy</option>
                       <option value="Drama" selected>Drama</option>
                       </select><br><br>
                  Rating:<input type="text" name="rating"/> <br><br>
                   
                  <b>Actor:</b><br>
                  Firstname:<input type="text" name="firstname" /><br><br>
                  Lastname:<input type="text" name="lastname" /><br><br>
                  <fieldset>
                  <b>Gender</b>:Male <input type="radio" name="gender" value="Male" style="margin-right:5px"/>
                        Female <input type="radio" name="gender" value="Female" /><br><br></fieldset>
                  <b>Director</b><br>
                  Fir/stname:<input type="text" name="first_name"/><br><br>
                  Lastname:<input type="text" name="last_name"/><br><br>
                 Gender:<fieldset>Male <input type="radio" name="dir_gender" value="Male" style="margin-right:5px"/>
                  Female <input type="radio" name="dir_gender" value="Female" /><br><br></fieldset>
                  Poster:<input type="file" name="file" />
                  <input type = "submit" value="Submit" name="submit">
             </form>
             </div>
             
</body>
</section>
<section>

       <?php include "include/footer.php" ?> 
</html>

<?php
include 'include/config.php';
      if(isset($_POST['submit'])) 
{


echo '<script language="javascript">';
            echo 'alert("entered")';
            echo '</script>'; 
  
  
       $servername = "localhost";
       $username = "root";
       $password = "";
       $title =  $_POST['mov_name'];
       $year = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['year'])));
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

       if(empty($imgFile)){
                        $errMSG = "Please Select Image File.";
                  }    else {
                              $upload_dir = 'images/'; // upload directory
 
                               $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
                               $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
   // rename uploading image
                                $userpic = rand(1000,1000000).".".$imgExt;
    

                                  if (in_array($imgExt, $valid_extensions)) {   
    // Check file size '5MB'
                                       if($imgSize < 5000000)    {
                                                move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                                        }  else {
                                                    $errMSG = "Sorry, your file is too large.";
                                                }
                                   } else {
                                             $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
                                         }
                              }
  echo " ".$firstName." ";


  
   if($user->insert($title, $year, $genre, $rating, $userpic, $firstName, $lastName, $gender, $first_name, $last_name, $dir_gender)) {


            
            echo "done";
            echo '<script language="javascript">';
            echo 'alert("inserted")';
            echo '</script>'; 
  
    
    }
 else
 {
echo '<script language="javascript">';
            echo 'alert("Incomplete details")';
            echo '</script>'; 
 } 
 
}
else{
 echo "form submitted";}


 ?>   
