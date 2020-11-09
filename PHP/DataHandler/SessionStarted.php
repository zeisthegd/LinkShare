<?php

function CheckSessionStarted() {
  if ( isset( $_SESSION[ 'userId' ] ) && isset( $_SESSION[ 'username' ] ) ) 
  {  	  
	  $username = $_SESSION[ 'username' ]; 
	  return $username;
  } 
	else 
	{
    	return "";
  	}
}
?>