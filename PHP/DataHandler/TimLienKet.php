<?php
$linkName = '';
if ( isset( $_POST[ 'linkName' ] ) ) 
{
	$linkName = $_POST[ 'linkName' ];
}
  include_once( "DataProvider.php" ); 
  $output = '';
  $sql = SetQuery( $linkName);
  $result = DataProvider::ExecuteQuery( $sql );
	
  if ( mysqli_num_rows( $result ) > 0 ) {
    $output .= '<div class="table-responsive">
					<table class="table table bordered">
					<tr>
						<th>Tên liên kết</th>
						<th>Người tải lên</th>
						<th>Ngày tải lên</th>
					<tr>';
    while ( $row = mysqli_fetch_array( $result ) ) {
		$userID = $row[ "UserID" ];
      $output .= '
			<tr>
				<td>' . $row['TenLienKet'] . '</td>
				<td>' . $row[ "NgayTaiLen" ] . '</td>
				<td>' . FindUploader($userID) . '</td>
			</tr>
		';
    }
    echo $output;
  } else {
    echo "Link not found";
  }

function SetQuery( string $linkName) {
  $sql = "select * from lienket";
  if ( $linkName != '' )
    return "select * from lienket where TenLienKet like '%" . $linkName . "%'";
  return $sql;
}
function FindUploader($userID)
{
	$sql = "SELECT * FROM `lienKet` INNER JOIN user on lienket.UserID = user.UserID WHERE user.UserID = " . $userID;
	$result = DataProvider::ExecuteQuery($sql);
	$row = mysqli_fetch_array( $result );
	return $row['TenUser'];
}
?>