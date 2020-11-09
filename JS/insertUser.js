$(function () {
  $("#btnRegister").click(function () {
    $("#btnRegister").hide();
    $("#registerMessage").html("<img src='../images/loading.gif' class='center'>");

    var username = $("#regUsername").val();
    var password = $("#regPassword").val();
    var cfmPassword = $("#regCfmPass").val();
    var email = $("#regEmail").val();
    var phone = $("#regPhone").val();

    if (username == "") {
      $("#registerMessage").text("Ten dang nhap khong duoc de trong!")
      $("#regUsername").focus();
      $("#btnRegister").show();
      return false;
    }
    if (password == "") {
      $("#registerMessage").text("Mat khau khong duoc de trong!")
      $("#regPassword").focus();
      $("#btnRegister").show();
      return false;
    }
    if (cfmPassword == "") {
      $("#registerMessage").text("Moi ban nhap lai mat khau!")
      $("#regCfmPass").focus();
      $("#btnRegister").show();
      return false;
    }
    if (password != cfmPassword) {
      $("#registerMessage").text("Mat khau go lai khong trung khop!")
      $("#regCfmPass").focus();
      $("#btnRegister").show();
      return false;
    }
    if (username.length < 5) {
      $("#registerMessage").text("Ten dang nhap qua ngan!")
      $("#regUsername").focus();
      $("#btnRegister").show();
      return false;
    }


    $.post("../PHP/DataHandler/XuLyDangKy.php", {
        username: username,
        password: password,
        email: email,
        phone: phone
      })
      .done(function (data) {
        if (data == "success") {
          
          $("#registerMessage").html("<img src='../images/loginSuccess.gif' class='center'>");
          window.setTimeout(function () {
            window.location = "Browser.php"
          }, 1500);
        }else {
          $("#registerMessage").text("Lỗi!");
          $("#btnRegister").show();
        }
      });
  });

}); // JavaScript Document
