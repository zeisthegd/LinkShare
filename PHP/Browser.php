<?php
session_start();
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Browser Page</title>
<link rel="stylesheet" href="../CSS/Brower.css">
<script src="https://kit.fontawesome.com/af774a8861.js" crossorigin="anonymous"></script> 
<script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
</head>
<body id="browser">
<header class="row">
  <section class="logo_left"> <a href="./Index.php"> <img src="../Images/2.png" alt="ShareLink"> </a> </section>
  <section class="col_center">
    <form>
      <input type="search" name="Link Search" name="q" placeholder="Search here..." id="txtLinkName" onKeyUp="SearchLink()">
      <select>
        <option value="0"> All </option>
        <optgroup label="Audio">
        <option value="001">Music</option>
        <option value="002">Audio books</option>
        <option value="003">Sound clips</option>
        <option value="004">Other</option>
        </optgroup>
        <optgroup label="Video">
        <option value="101">Movies</option>
        <option value="102">Movies DVDR</option>
        <option value="103">Music videos</option>
        <option value="104">Movie clips</option>
        <option value="105">TV shows</option>
        <option value="106">Handheld</option>
        <option value="107">HD - Movies</option>
        <option value="108">HD - TV shows</option>
        <option value="109">3D</option>
        <option value="110">Other</option>
        </optgroup>
        <optgroup label="Applications">
        <option value="201">Windows</option>
        <option value="202">Mac</option>
        <option value="203">UNIX</option>
        <option value="204">Handheld</option>
        <option value="205">IOS(Ipad/Iphone)</option>
        <option value="206">Android</option>
        <option value="207">Other OS</option>
        </optgroup>
        <optgroup label="Games">
        <option value="301">PC</option>
        <option value="302">Mac</option>
        <option value="303">PSx</option>
        <option value="304">XBOX 360</option>
        <option value="305">Wii</option>
        <option value="306">Handheld</option>
        <option value="307">IOS(Ipad/Iphone)</option>
        <option value="308">Android</option>
        <option value="309">Other</option>
        </optgroup>
        <optgroup label="Other">
        <option value="401">E-books</option>
        <option value="402">Comics</option>
        <option value="403">Pictures</option>
        <option value="404">Covers</option>
        <option value="405">Physible</option>
        <option value="406">Other</option>
        </optgroup>
      </select>
      <button onClick="SearchLink()">Tìm Kiếm</button>
    </form>
  </section>
  <section class="logo_right"> <img src="../Images/3.PNG" alt="ShareLink"> </section>
  <section class="logo_right_2"> <img src="../Images/linkshare.gif" alt="ShareLink" width="122"> </section>
</header>
<main> <br>
  <table border="0" id="table_left">
    <tr>
      <?php KiemTraDangNhapUser()?>
    </tr>
  </table>

        <h1 align="center">Danh Sách Các Liên Kết</h1>
        <div id="result"></div>
  </div>
</main>
<script type="text/javascript">
function SearchLink()
{
		var txtLinkName = document.getElementById("txtLinkName").value;
		if(txtLinkName !='')
		{
			$.ajax({
				url:"DataHandler/TimLienKet.php",
				method:"post",
				data:{linkName :txtLinkName},
				dataType:"text",
				success:function(data)
				{
					$('#result').html(data);
				}
			});
		}
		else
		{		
			$('#result').html('');
		}

}

</script>
<?php

function KiemTraDangNhapUser() {
  include_once( "../PHP/DataHandler/SessionStarted.php" );
  $username = CheckSessionStarted();
  if ( $username == "" ) {
    echo( "<td colspan='2' align='right'>
                        <label id='left' style='color:rgb(59, 38, 6)'>
                        </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <img src='../Images/DangNhap.png' width='30' height='28'>
                        &nbsp;
                        <a href='../PHP/Index.php'>Đăng Nhập </a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <img src='../Images/DangKy.png' width='30' height='28'>
                        &nbsp;
                        <a href='../PHP/Index.php'>Đăng ký </a>
                    </td>" );
  } else {
    echo( "<td colspan='2' align='right'>Xin chào: " . $username . " <a href='DataHandler/DangXuat.php' ><i class='fas fa-sign-out-alt'></i></a></td>" );
  }
}


?>
</body>
</html>