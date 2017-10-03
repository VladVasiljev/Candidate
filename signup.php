<?php
include 'header.php';
?>
<html>
        <body>
             <div class="wrapper">
       <div class="row">
      <div class="col-1-1">
        
        <center> <img  src="img/logo.png" alt="Logo" max-width="100%" ></center>
      
        
        <?php
            
            $url ="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            if(strpos($url, 'error=empty')!==false){
                echo " <div align='center'><h2>Please fill in all fields</h2><br>";
            }
            
            elseif(strpos($url, 'error=username')!==false){
                echo "<div align='center'><h2>Username already in use!</h2><br>";
            }
            
         if(isset($_SESSION['id'])){
             echo "<p class='pCenter'>Hi there user!</p>";
         } else{
             echo " <div align='center'>Enter User details and SignUp<br>";
             echo "Already Signed up?<br>Click <a href='index3.php'>Login</a></div> ";
         }
        
        ?>
        
        
        
        <br>
        <br>
        <br>
          <div align="center">
        <?php
         if(isset($_SESSION['id'])){
             echo "You're already logged in";
         } else{
            echo" <form id ='signup'  action='includes/signup.inc.php' method='POST'>
      <input type ='text' name='first' placeholder='First Name'><br>
         <input type ='text' name='last' placeholder='last Name'><br>
        <input type ='text' name='uid' placeholder='Username'><br>
       <input type ='password' name='pwd' placeholder='Password'><br>
         <input type ='text' name='email' placeholder='email'><br>
        <input type ='number' name='years' placeholder='Years experience'><br>
        <label for='Industry'>Select Industry</label> 
        <select name='industry'>
        <option value='it'>IT</option>
        <option value='retail'>Retail</option>
        <option value='medical'>Medical</option>
        <option value='manual labour'>Manual Labour</option>
        </select>
        <label for='Bio'>Bio</label>
        <textarea rows='5' cols='50' name='bio' placeholder='Bio Here'> </textarea>
        <button type ='submit'>Sign Up</button>
        </form>";
         } 
            ?>
              </div>
           </div></div></div>
    </body>

</html>
