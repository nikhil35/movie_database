
<div style="height:100px">
     <header>
       <img src='images/n.jpg' id="logo">
         <nav>
           <ul>
              <li> <a id="link" href="home.php">HOME</a> </li>
            <li><a id="link"  onclick="<? include_once 'include/config.php'; $user->logout();?>" href="#">LOGOUT</a> </li>
              

              <li> <form>
                     <input type="text" name="genre"/ placeholder='search';height:25px style="border-radius: 4px;height:25px">&nbsp;
                      <input type = "submit" value="search" id='button'>
                    </form>
              </li>
           </ul>
        </nav>
     </header>
  </div>