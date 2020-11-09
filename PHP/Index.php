<?php
	session_start();
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home Page</title>
<link rel="stylesheet" href="../CSS/Index.css">
<link rel="stylesheet" href="../CSS/style.css">
<script src="https://kit.fontawesome.com/af774a8861.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script> 
<script type="text/javascript" src="../JS/requestUser.js"></script> 
<script type="text/javascript" src="../JS/insertUser.js"></script> 
<script type="text/javascript" charset="utf-8" src="../js/jquery.leanModal.min.js"></script>
</head>
<body class="align-center" id="home" bgcolor="white">
<h1><font color="blue">Share Link</font></h1>
<header>
  <nav>
    <section> <a href style="border: 0;" > <img src="../Images/white_dragon.jpg" alt="Dragon"> </a> </section>
  </nav>
</header>
<main>
  <section>
    <form action="Browser.php" name="searchLinks" method="post">
      <br>
      <div>
        <input type="search" id="linkName" name="linkName" title="Search" placeholder="Search" 
                    autofocus required style="width: 10cm; padding: 5px;">
      </div>
      <br>
      <div> <span class="form-box"></span>
        <label for="all" title="All" accesskey="a">
          <input type="checkbox" name="all" id="all" onclick="setAll();">
          All </label>
        <span class="form-box"></span>
        <label for="audio" title="Audio" accesskey="q">
          <input type="checkbox" name="audio" id="audio" onclick="rmAll();">
          Audio </label>
        <span class="form-box"></span>
        <label for="video" title="video" accesskey="w">
          <input type="checkbox" name="video" id="video" onclick="rmAll();">
          Video </label>
        <span class="form-box"></span>
        <label for="apps" title="Application" accesskey="e">
          <input type="checkbox" name="apps" id="apps" onclick="rmAll();">
          Applications </label>
        <span class="form-box"></span>
        <label for="games" title="Games" accesskey="r">
          <input type="checkbox" name="games" id="games" onclick="rmAll();">
          Games </label>
        <span class="form-box"></span>
        <label for="other" title="Other" accesskey="y">
          <input type="checkbox" name="other" id="other" onclick="rmAll();">
          Other </label>
      </div>
      <br>
      <div>
        <input class="flatbtn" type="submit" value="Search" title="Search" name="btnSearch" id="btnSearch" acc>
      </div>
    </form>
  </section>
</main>
<br>
<footer>
  <nav>
    <?php KiemTraDangNhapUser()?>
    </div>
    </div>
    <div id="loginmodal" style="display:none;">
      <h1>ĐĂNG NHẬP</h1>
      <form id="loginform" name="loginform" method="post" action="Index.php">
        <label for="username">Tên người dùng:</label>
        <input type="text" name="lginUsername" id="lginUsername" class="txtfield" tabindex="1">
        <label for="password">Mật khẩu:</label>
        <input type="password" name="lginPassword" id="lginPassword" class="txtfield" tabindex="2">
        <span id="loginMessage"></span>
        <div class="center">
          <input type="submit" name="loginbtn" id="btnLogin" class="flatbtn-blu hidemodal" onClick="return false" value="Log In" tabindex="3">
        </div>
      </form>
    </div>
    <div id="registermodal" style="display:none;">
      <h1>ĐĂNG KÝ</h1>
      <form id="registerform" name="registerform" method="post" action="DangKy.php">
        <label for="username">Tên người dùng:</label>
        <input type="text" name="regUsername" id="regUsername" class="txtfield" tabindex="1">
        <label for="password">Mật khẩu:</label>
        <input type="password" name="regPassword" id="regPassword" class="txtfield" tabindex="2">
        <label for="password">Xác nhận mật khẩu:</label>
        <input type="password" name="regCfmPass" id="regCfmPass" class="txtfield" tabindex="2">
        <label for="password">Email:</label>
        <input type="text" name="regEmail" id="regEmail" class="txtfield" tabindex="2">
        <label for="password">Phone:</label>
        <input type="text" name="regPhone" id="regPhone" class="txtfield" tabindex="2">
        <span id="registerMessage"></span> <br>
        <div class="center">
          <input type="submit" name="btnRegister" id="btnRegister" class="flatbtn-blu hidemodal" onClick="return false" value="Sign Up" tabindex="3">
        </div>
      </form>
    </div>
  </nav>
</footer>
<script type="text/javascript">
$(function(){  
  $('#loginTrigger').leanModal({ top: 110, overlay: 0.45 });
	 $('#registerTrigger').leanModal({ top: 110, overlay: 0.45 });
});

</script>
<?php
function KiemTraDangNhapUser()
{	
	include_once("../PHP/DataHandler/SessionStarted.php");
	$username = CheckSessionStarted();
	if($username == "")
	{
		echo("<center>
      <a href='#loginmodal' class='flatbtn' id='loginTrigger'>ĐĂNG NHẬP</a> <a href='#registermodal' class='flatbtn' id='registerTrigger'>ĐĂNG KÝ</a>
    </center>");
	}
	else
	{
		echo("<td colspan='2' align='right'><a href='DataHandler/DangXuat.php' ><i class='fas fa-sign-out-alt'></i></a></td>");
	}
}
?>
</body>
</html>