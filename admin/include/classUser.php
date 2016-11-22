<?php
class USER
{
    private $db;
 
    function __construct ($db_con) {
      $this->db = $db_con;
    }
 
    public function register ($userName, $userMail, $userPass)
    {
        try {
            
              $new_password = password_hash($userPass, PASSWORD_DEFAULT);
              $stmt = $this->db->prepare("INSERT INTO user(user_name, user_email, user_password) 
                      VALUES (:uname, :umail, :upass)");

              $stmt->bindparam (":uname", $userName);
              $stmt->bindparam (":umail", $userMail);
              $stmt->bindparam (":upass", $new_password);            
              $stmt->execute(); 
   
              return $stmt; 
         }
        catch(PDOException $e) {
           echo $e->getMessage();
        }    
    }
 
    
    public function login ($userName, $userPass)
    {
        try {
        
              $stmt = $this->db->prepare("SELECT * FROM user WHERE user_name=:uname OR user_email=:umail LIMIT 1");
              $stmt->bindparam (":uname", $userName);
              $stmt->bindparam (":umail", $userMail);
              $stmt->execute();
              $userRow = $stmt->fetch (PDO::FETCH_ASSOC);
          
            if ($stmt -> rowCount() > 0) {
                if (password_verify($userPass, $userRow['user_password'])) {
                  
                     $_SESSION['user_session'] = $userRow['user_id'];
                     return true;
                  } else {
                         return false;
                        }
              }
            }
       catch (PDOException $e) {
           echo $e->getMessage();
        }
    }
 
   public function is_loggedin () {
      if (isset($_SESSION['user_session'])) {
         return true;
      }
   }
 
   
   public function redirect ($url) {
          echo " sas".$url;
          header("Location: $url");
   }
 
   public function insert ($title, $year, $genre, $rating, $userpic, $firstName, $lastName, $gender, $first_name, $last_name, $dir_gender) {
             try {
              
                   echo $title."".$year." ".$genre." ".$rating. " ".$userpic;
                   $stmt = $this->db->prepare("INSERT INTO movie(Year, Genre, Tittle, Rating, Poster) 
                            VALUES(:year, :genre, :title, :rating, :userpic)");
                
                  $stmt->bindparam(":year", $year);
                   $stmt->bindparam(":genre", $genre);
                   $stmt->bindparam(":title", $title);
                   $stmt->bindparam(":rating", $rating);
                   $stmt->bindparam(":userpic", $userpic);
                   $stmt->execute();
 
                   $mov_id = $this->db->lastInsertId();
    
                    echo $mov_id;
                   $stmt=$this->db->prepare("insert into actor(first_name, last_name, gender)
                           values(:firstName, :lastName, :gender)");
                   $stmt->bindparam(":firstName", $firstName);
                   $stmt->bindparam(":lastName", $lastName);
                   $stmt->bindparam(":gender", $gender);
                   $stmt->execute();
                   $act_id = $this->db->lastInsertId();


                   $sd=$this->db->prepare("insert into director(first_name, last_name, gender) 
                        values(:first_name, :last_name, :dir_gender)");
                   $sd->bindparam(":first_name", $first_name);
                   $sd->bindparam(":last_name", $last_name);
                   $sd->bindparam(":dir_gender", $dir_gender);
                   $sd->execute();
                   
                   $dir_id = $this->db->lastInsertId(); 
    
                   $s=$this->db->prepare("insert into movie_actor(Movie_id, Actor_id) values(:mov_id, :act_id)");
                   $s->bindparam(":mov_id", $mov_id);
                   $s->bindparam(":act_id", $act_id);
                   $s->execute();
    

                   $d=$this->db->prepare("insert into movie_director(movie_id, director_id)
                       values(:mov_id, :dir_id)");
                   $d->bindparam(":mov_id", $mov_id);
                   $d->bindparam(":dir_id", $dir_id);
                   $d->execute();
    
                    return $stmt;
                  }
       catch (PDOException $e) {
         
              echo $e->getMessage();
              $conn = null;
       }
   }


  public function delete ($mov_id) {

        try {
             $stmt = $this->db->prepare("DELETE movie, actor, director, movie_director, movie_actor FROM  movie join movie_actor on movie.Movie_id=movie_actor.movie_id join actor on actor.actor_id=movie_actor.Actor_id join movie_director on movie.Movie_id=movie_director.movie_id join director on movie_director.director_id=director.director_id where movie.Movie_id=:mov_id");

              $stmt->bindparam(":mov_id", $mov_id);
              $stmt->execute();

              return $stmt;

            }
        catch (PDOException $e) {
         
              echo $e->getMess111age();
              $conn = null;
       }    



   }



   public function update ($id, $title, $year, $genre, $rating, $userpic, $firstName, $lastName, $gender, $first_name, $last_name, $dir_gender) {
        

      try {
              
                   
                   $stmt = $this->db->prepare(" update  movie join movie_actor on movie.Movie_id=movie_actor.movie_id join actor on actor.actor_id=movie_actor.Actor_id join movie_director on movie.Movie_id=movie_director.movie_id join director on movie_director.director_id=director.director_id set movie.Tittle=:title, movie.Year=:year,
                     movie.Genre=:genre, movie.rating=:rating, movie.Poster=:userpic, actor.First_name=:firstName,
                     actor.Last_name=:lastName, actor.Gender=:gender, director.first_name=:first_name, director.last_name=:last_name, director.gender=:dir_gender where movie.Movie_id='$id'");
                

                   $stmt->bindparam(":year", $year);
                   $stmt->bindparam(":genre", $genre);
                   $stmt->bindparam(":title", $title);
                   $stmt->bindparam(":rating", $rating);
                   $stmt->bindparam(":userpic", $userpic);
                   $stmt->bindparam(":firstName", $firstName);
                   $stmt->bindparam(":lastName", $lastName);
                   $stmt->bindparam(":gender", $gender);
                   $stmt->bindparam(":first_name", $first_name);
                   $stmt->bindparam(":last_name", $last_name);
                   $stmt->bindparam(":dir_gender", $dir_gender);
                 

              
                   $stmt->execute();
 

        return $stmt;
                  }
       catch (PDOException $e) {
         
              echo $e->getMessage();
              $conn = null;
       }




    }

   public function search($search) {

         echo $search;
       $stmt= $this->db->prepare("select *from movie join movie_actor on movie.Movie_id=movie_actor.movie_id join actor on actor.actor_id=movie_actor.Actor_id join movie_director on movie.Movie_id=movie_director.movie_id join director on movie_director.director_id=director.director_id where movie.Tittle LIKE '%$search%';");
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
            



            }
            return $stmt;
      }
            

      public function admin_search($search) {

         echo $search;
       $stmt= $this->db->prepare("select *from movie join movie_actor on movie.Movie_id=movie_actor.movie_id join actor on actor.actor_id=movie_actor.Actor_id join movie_director on movie.Movie_id=movie_director.movie_id join director on movie_director.director_id=director.director_id where movie.Tittle LIKE '%$search%';");
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
              echo "<td><a  id=link1 href='edit.php?PID=". $row['Movie_id']."'>Edit</a></td><td>";
         
            echo "<td><a  id=link1 href='delete.php?PID=". $row['Movie_id']."'>Delete</a></td><td>";


            }
            return $stmt;
      }
            




   



 }
?>