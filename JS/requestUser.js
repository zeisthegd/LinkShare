// JavaScript Document
$(function () {
  $("#btnLogin").click(function () {
    $("#btnLogin").hide();
    $("#loginMessage").html("<img src='../Images/loading.gif' class='center'>");

    var username = $("#lginUsername").val();
    var password = $("#lginPassword").val();

    $.post("../PHP/DataHandler/XuLyDangNhap.php", {
        username: username,
        password: password
      })
      .done(function (data) {
        if (data == "success") {
          $("#loginMessage").html("<img src='../Images/loginSuccess.gif' class='center'>");
          window.setTimeout(function(){ window.location = "../PHP/Browser.php" }, 1500);       
        } else {	
          $("#loginMessage").text("Tên người dùng hoặc mật khẩu không tồn tại!");
          $("#btnLogin").show();
        }
      });
  });

});
