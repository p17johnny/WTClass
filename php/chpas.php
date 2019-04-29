<?php
session_start();

include "db_connection.php";
$userid = $_SESSION['username'];
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "rockuo", "jj088514", "smart");
    mysqli_query($connect, "SET NAMES 'utf8'");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}


?>
<html>
<head>
    <meta charset="utf-8">
  <title></title>

</head>
<body>
     <?php  
            $query = "SELECT * FROM `classtable` Where `c_scid` ='" . $userid . "'";
            $result = filterTable($query);
	        $row = mysqli_fetch_array($result);
            $oldpassword= $_POST['oldpassword'];
            $newpassword= $_POST['newpassword'];
            $renewpassword= $_POST['renewpassword'];
            if($userid != ""){
                if($oldpassword == $row['c_pas']){
                    if($newpassword == $renewpassword){
                        $sql = "UPDATE `classtable` set `c_pas` = '".$newpassword."' where `c_scid` ='" . $userid . "'";
                        $result = filterTable($sql);
                        echo "<script language='javascript'>";
                        echo "alert('request successfully sent'); location.href = '../profile.php';";
                        echo "</script>";
                    }else{
                        echo "<script language='javascript'>";
                        echo "alert('new password and renew password did not match'); location.href = '../profile.php';";
                        echo "</script>";
                    }
                }else{
                    echo "<script language='javascript'>";
                        echo "alert('old password did not match'); location.href = '../profile.php';";
                        echo "</script>";
                }   
            }else{
                echo "<script language='javascript'>";
                echo "alert('account verified failed'); location.href = '../profile.php';";
                echo "</script>";
            }

?>
</body>
</html>