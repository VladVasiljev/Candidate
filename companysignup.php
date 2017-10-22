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
                echo "Username already exsits! ";
            }
            
            elseif(strpos($url, 'error=username')!==false){
                echo "Username already exists!";
            }
            
         if(isset($_SESSION['id'])){
             echo "<p class='pCenter'>Hi there user!</p>";
         } else{
             echo " <div align='center'>Enter Company details and SignUp<br>";
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
            echo" <form id ='signup'  action='includes/company.signup.inc.php' method='POST'>
      <input type ='text' name='name' placeholder='Company Name'><br>
         
        <input type ='text' name='username' placeholder='Username'><br>
       <input type ='password' name='pwd' placeholder='Password'><br>
       <label for='position'>Position</label> 
       <select name='position'>
       <option value='manager'>Manager</option>
       <option value='hr'>HR</option>
       <option value='recruiter'>Recruiter</option>
       </select>
         
        <label >Select Industry</label> 
        <select name='industry'>
        <option value='it'>IT</option>
        <option value='retail'>Retail</option>
        <option value='medical'>Medical</option>
        <option value='manual labour'>Manual Labour</option>
        <option value='motor industry'>Motor Industry</option>
        <option value='academic'>Academic</option>
        <option value='accountancy and finance'>Accountancy and Finance</option>
        <option value='architecture/design'>Architecture/Design</option>
        <option value='childcare'>Childcare</option>
        <option value='drivers'>Drivers</option>
        <option value='education/training'>Education/Training</option>
        <option value='graduate'>Graduate</option>
        <option value='hair and beauty'>Hair and Beauty</option></select>
        
        <button type ='submit'>Sign Up</button>
        </form>";
         } 
            ?>
              </div>
           </div></div></div>
    </body>

</html>
