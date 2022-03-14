<?php

    session_start();

    $error = "";  
	$success = "";

    if (array_key_exists("logout", $_GET)) {
        
      unset($_SESSION);
        setcookie("ID", "", time() - 60*60);
         $_COOKIE["ID"] = "";  
        
        session_destroy();
        
    } else if ((array_key_exists("ID", $_SESSION) AND $_SESSION['ID']) OR (array_key_exists("ID", $_COOKIE) AND $_COOKIE['ID'])) {
        
        header("Location: loggedinpageintern.php");
        
  }	

    if (array_key_exists("submit", $_POST)) {
        
        include("connection_intern.php");
        
        if (!$_POST['Email']) {
            
            $error .= "An email address is required<br>";
            
        } 
        
        if (!$_POST['password']) {
            
            $error .= "A password is required<br>";
            
        } 
		  
        
        if ($error != "") {
            
            $error = "<p>There were error(s) in your form:</p>".$error;
            
        } else {
            
          if ($_POST['signUp'] == '1') {
            
            $query = "SELECT ID FROM `interns_data` WHERE Email = '".mysqli_real_escape_string($link, $_POST['Email'])."' LIMIT 1";

              $result = mysqli_query($link, $query);

           if (mysqli_num_rows($result) > 0) {

                   $error = "That email
				   address is taken.";

             } else {

                 $query = "INSERT INTO `interns_data` (`Email`, `password`, `Username`, `Comments`,`Progress`,`Task_Id`,`Description`) VALUES ('".mysqli_real_escape_string($link, $_POST['Email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."',  '".mysqli_real_escape_string($link, $_POST['Username'])."','No Comments Yet', 'No Progress yet', 'Task Not Assigned Yet','Task Description not given yet')";

                 if (!mysqli_query($link, $query)) {

                        $error = "<p>Could not sign you up - please try again later.</p>";

                    }else {

                        $query = "UPDATE `interns_data` SET password = '".md5(md5(mysqli_insert_ID($link)).$_POST['password'])."' WHERE ID = ".mysqli_insert_ID($link)." LIMIT 1";
                        
                        $ID = mysqli_insert_ID($link);
                        
                        mysqli_query($link, $query);

                        $_SESSION['ID'] = $ID;

                        if ($_POST['stayLoggedIn'] == '1') {

                            setcookie("ID", $ID, time() + 60*60*24*365);

                            setcookie("ID", $ID, time() - 60*60*24*365);

                        } 
                            
                       $success = "<p>Signed Up Successfully</p>";

                    }

            } 
                
              } else {
                    
                    $query = "SELECT * FROM `interns_data` WHERE Email = '".mysqli_real_escape_string($link, $_POST['Email'])."'";
                
                    $result = mysqli_query($link, $query);
                
                    $row = mysqli_fetch_array($result);
                
                  if (isset($row)) {
                        
                        $hashedPassword = md5(md5($row['ID']).$_POST['password']);
                        
                      if ($hashedPassword == $row['password']) {
                            
                            $_SESSION['ID'] = $row['ID'];
                            
                            if (isset($_POST['stayLoggedIn']) AND $_POST['stayLoggedIn'] == '1') {

                                setcookie("ID", $row['ID'], time() + 60*60*24*365);

                            } 

                            header("Location: loggedinpageintern.php");
                                
                        } else {
                            
                            $error = "That email/password combination could not be found.";
                            
                        }
                        
                    } else {	
                        
                        $error = "That email/password combination could not be found.";
                        
                    }
                    
                    }
            
          }
        
        
    }


?>

<?php include("headerintern.php"); ?>
<nav class="navbar navbar-light bg-faded navbar-fixed-top " style="background-color: #808080  ;">
  

  

    <div class="pull-xs-left">

 <a href ='mywebpage.php'>

        <!--<button class="btn btn-primary-outline fa fa-thumbs-up" >--><span style="color:white">Interns Form<br></span></button></a>
         <a href ='Home page.php'>

        <!--<button class="btn btn-primary-outline fa fa-thumbs-up" >--><span style="text-align:right;color:white">    Home Page</span></button></a>


        
    </div>

</nav>

<br>
<br>
     
      <div class="container">

      <br>
    <!--<h1>Sign Up</h1>-->
          
          
          <div ID="error"><?php if ($error!="") {
    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
    
} ?></div>
<div ID="success"><?php if ($success!="") {
    echo '<div class="alert alert-success" role="alert">'.$success.'</div>';
    
} ?></div>

<div class="mr">

<form method="post" ID = "signUpForm">
    
    <h3 ><p style="color:white;">Sign up now !!</p></h3>
    
    <fieldset class="form-group">

        <input class="form-control" type="email" name="Email" placeholder="Your email address" required>
        
    </fieldset>
    
    <fieldset class="form-group">
    
        <input class="form-control" type="password" name="password" placeholder="Password" required>
        
    </fieldset>
	
	<fieldset class="form-group">
    
        <input class="form-control" type="text" name="Username" placeholder="eg:yourname123456789" required>
        
    </fieldset>
	
	
	
	
	
	
    
    <div class="checkbox">
    
        <label>
    
        <input type="checkbox" name="stayLoggedIn" value=1><span style = "color:white;"> Continue </span>
            
        </label>
        
    </div>
    
    <fieldset class="form-group">
    
        <input type="hidden" name="signUp" value="1">
        
        <input class="btn btn-primary" type="submit" name="submit"  ID="btn" value="Sign Up!">
        
    </fieldset>
    
    <p><a class="toggleForms" style = "color:green;">Log in</a></p>

</form>

<form method="post" ID = "logInForm">
    
    <h3><p style="color:white;">Log in to move ahead</p></h3>
    
    <fieldset class="form-group">

        <input class="form-control" type="Email" name="Email" placeholder="Your email address" required>
        
    </fieldset>
    
    <fieldset class="form-group">
    
        <input class="form-control"type="password" name="password" placeholder="Password" required>
        
    </fieldset>
    
    <div class="checkbox">
    
        <label>
    
            <!--<input type="checkbox" name="stayLoggedIn" value=1 > <p style="color:white;">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Stay logged in</p>-->
             <input type="checkbox" name="stayLoggedIn" value=1><span style = "color:white;">Stay Logged In </span>
            
        </label>
        
    </div>
        
        <input type="hidden" name="signUp" value="0">
    
    <fieldset class="form-group">
        
        <input class="btn btn-primary"  type="submit" name="submit" ID="btn" value="Log In!">
        
    </fieldset>
    
    <p><a class="toggleForms" style = "color:green;">Sign Up</a></p>

</form>
</div>
          
      </div>
	  </div>

<?php include("footerintern.php"); 

?>