<?php
	session_start();
  if(!$_SESSION['loggedIn'] && $_SESSION['username'] == '') {
		header("location: index.html");
  }
?>
<!DOCTYPE html>
<html>
<head>
<style>
  body, html {
    height: 100%;
    margin: 0;
  }
  #bg {
    background-image: url("http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg");
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    text-align: center;
    padding: 20px;
  }
  #ag {
    background-color: rgba(20, 17, 20, 0.322);
    width: 300px;
    height: 300px;
    padding: 100px;
    align-self: center;
    margin: 0 auto;
    align-content: center;
  }
  #one {
    font-family: "Bradley Hand ITC";
    font-style: italic;
  }
  #two {
    font-family: "Lucida Console";
    font-size: larger;
  }
  .color-brown {
    color: white; 
  }
  .button { 
    background-color:yellow;
    border: none;
    color: black;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
  }
</style>
</head>
<body>
   <div id="bg" class="color-brown" >
       <div id="ag">
           <div id="one">
               <h3>LOGIN SUCCESSFUL</h3>
           </div>
           <h2>Welcome, <?php echo ucfirst($_SESSION['username'])?></h2>
           <div id="two">
              <h2>WELCOME TO TECHY BLINDERS!</h2>
           </div>
           <div>
            <a href="script/logout.php" class="button">
              Logout
            </a>
       </div>
       </div>
   </div>
</body>
</html>