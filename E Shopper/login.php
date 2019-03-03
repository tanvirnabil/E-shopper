<?php
$UserNameError = $PasswordError ="";
$name = $password ="";
if ($_POST) {
  if (empty($_POST["UserName"])) {
    $UserNameErr = "Name is required";
  } else {
    $name = test_input($_POST["UserName"]);
    // check if name only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $UserNameError = "Only letters and white space allowed";
    }
    else if(strlen($name)<5) {
      $UserNameError = "Must be 5 character";
    }
  }
  if (empty($_POST["Password"])) {
    $PasswordError = "Please Enter Password";
  } else {
    $Password = test_input($_POST["Password"]);
  }


$name=$_POST["username"];
$password=$_POST["Password"];
$connection = mysqli_connect("localhost","root","");
    if($connection)
    {
      $selectdb= mysqli_select_db($connection,'eshopper');
      if(!mysqli_select_db($connection,'eshopper'))
      {

    echo "database not selected";
      }
      $sql = "SELECT username,password FROM register WHERE ( ( username = '$newusername' ) AND ( password = '$password' ) )";
      
       $records=mysqli_query($connection,$sql);

      while($row=mysqli_fetch_array($records)){
            $new=$row['username'];
            $pass=$row['password'];
         }
         
                error_reporting(0); 
                if(strcmp($new,$name)!==0 && $name<=5){

                    if(strcmp($password,$password)!==0){
                        error_reporting(0);
                    echo "You are not a valid user";
                }
            }
                else{
                    echo "Acces granted";
                    header("Location: index.php");
                } 
    }
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }




?>
<!DOCTYPE html>
<html lang="en" class="no-js"> <!--<![endif]-->
    <head>
       
        <title>Login</title>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style4.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
        <style>
            .error {color: #FF0000;}
        </style>
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  method="post" action="mysuperscript.php" autocomplete="on"> 
                                <h1>Admin Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your email or username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>"/>
                                    <span class="error">* <?php echo $UserNameError;?></span>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>"/> 
                                    <span class="error">* <?php echo $PasswordError;?></span>
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="mysuperscript.php" autocomplete="on"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p class="signin button"> 
									<input type="submit" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>