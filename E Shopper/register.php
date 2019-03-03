<?php

$UserNameError = $PasswordError = $ConfirmPasswordError = $EmailError= "";
$UserName = $Password = $ConfirmPassword = $Email = "";

if ($_POST) {
  if (empty($_POST["UserName"])) {
    $UserNameErr = "Name is required";
  } else {
    $UserName = test_input($_POST["UserName"]);
    // check if name only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z ]*$/",$UserName)) {
      $UserNameError = "Only letters and white space allowed";
    }
    else if(strlen($UserName)<5) {
      $UserNameError = "Must be 5 character";
    }
  }
  
  
  if (empty($_POST["Password"])) {
    $PasswordError = "Please Enter Password";
  } else {
    $Password = test_input($_POST["Password"]);
  }
  if (empty($_POST["ConfirmPassword"])) {
    $ConfirmPasswordError = "Password Mismatched";
  } else {
    $ConfirmPassword = test_input($_POST["ConfirmPassword"]);
  }
  
  
  if (empty($_POST["Email"])) {
    $EmailError = "Email is required";
  } else {
    $Email = test_input($_POST["Email"]);
    // check if e-mail address is well-formed
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      $EmailError = "Invalid email format";
    }
  }
  if(!empty($_POST["UserName"]) && !empty($_POST["Password"]))
  {
   $UserName= $_POST["UserName"];
  $Password= $_POST["Password"];
  $Email=$_POST["Email"];
  $ConfirmPassword= $_POST["ConfirmPassword"];
  $connection = mysqli_connect("localhost","root","");
    if($connection)
    {
        
    if($password == $confirmpass){
      $selectdb= mysqli_select_db($connection,'eshopper');
      if(!mysqli_select_db($connection,'eshopper'))
      {

    echo "database not selected";
      }
        $sql= "INSERT INTO registration(UserName,Email,Password)VALUES('$UserName','$Email','$Password')";
       if( !mysqli_query($connection,$sql))
       {
    echo "Not inserted";
    header("Location: registration.php");
    }
  }
    else
    {
      echo "Password Mismatched <br>";
    }
    mysqli_close($connection);
       
    }
  
    else
    {
        echo "Not Connected <br>";
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
<html lang="en">
<head>
  <title>Signup</title>

<style type="text/css">

.error {color: #FF0000;}

html,
body {
    height: 100%;
}
html {
    display: table;
    margin: auto;
}
body {
    display: table-cell;
    vertical-align: middle;
}
.margin {
  margin: 0 !important;
}
</style>
  
</head>

<body class="blue">


  <div id="login-page" class="row">
    <div class="col s12 z-depth-6 card-panel">
      <form class="login-form" method="post" action="">
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <label for="UserName" class="center-align">UserName</label>
            <input id="UserName" type="text" class="validate" value="<?php if(isset($_POST['UserName'])) echo $_POST['UserName']; ?>">
            <span class="error">* <?php echo $UserNameError;?></span>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-communication-email prefix"></i>
            <label for="Email" class="center-align">Email</label>
            <input id="Email" type="email" class="validate" value="<?php if(isset($_POST['Email'])) echo $_POST['Email']; ?>">
            <span class="error">* <?php echo $EmailError;?></span>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <label for="Password">Password</label>
            <input id="Password" type="password" class="validate" value="<?php if(isset($_POST['Password'])) echo $_POST['Password']; ?>">
            <span class="error">* <?php echo $PasswordError;?></span>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <label for="ConfirmPassword">Re-type password</label>
            <input id="ConfirmPassword" type="password" value="<?php if(isset($_POST['ConfirmPassword'])) echo $_POST['ConfirmPassword']; ?>">
            <span class="error">* <?php echo $ConfirmPasswordError;?></span>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <a href="register.php" class="btn waves-effect waves-light col s12">Register Now</a>
          </div>
          <div class="input-field col s12">
            <p class="margin center medium-small sign-up">Already have an account? <a href="login.html">Login</a></p>
          </div>
        </div>
      </form>
    </div>
  </div>


  <center>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Post Page - Responsive -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-5104998679826243"
     data-ad-slot="3470684978"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</center>

  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
 <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!--materialize js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>



  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-27820211-3', 'auto');
  ga('send', 'pageview');

</script><script src="//load.sumome.com/" data-sumo-site-id="1cf2c3d548b156a57050bff06ee37284c67d0884b086bebd8e957ca1c34e99a1" async="async"></script>


   <footer class="page-footer">
          <div class="footer-copyright">
            <div class="container">
            © 2018 Ahmed Sazzad
            <a class="grey-text text-lighten-4 right" href="http://google.com"> Ahmed Sazzad</a>
            </div>
          </div>
  </footer>
</body>

</html>