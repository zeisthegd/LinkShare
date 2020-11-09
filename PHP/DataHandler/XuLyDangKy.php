<?php
include_once( "DataProvider.php" );
if ( isset( $_POST[ 'username' ] ) && isset( $_POST[ 'password' ] ) && isset( $_POST[ 'email' ] ) && isset( $_POST[ 'phone' ] ) ) {
	
  $username = $_POST[ 'username' ];
  $email = $_POST[ 'email' ];
  $password = $_POST[ 'password' ];
  $phone = $_POST[ 'phone' ];

  $sql = "INSERT INTO user(VaiTroID,TenUser,Password,Email,Phone) VALUES ('2','$username','$password','$email','$phone')";
  
	if(DataProvider::ExecuteQuery($sql))
		echo "success";
	else echo "failed";
	
}
else echo "no Data";
?>