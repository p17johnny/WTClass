<?php
session_start();

include "php/db_connection.php";
$userid = $_SESSION['username'];
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "rockuo", "jj088514", "smart");
    mysqli_query($connect, "SET NAMES 'utf8'");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

$path = $_GET['select'];

$name=iconv("UTF-8","BIG-5",$_FILES['fileField']['name']);

?>
<html>
<head>
    <meta charset="utf-8">
  <title></title>

</head>
<body>
     <?php
            //echo $_GET['select'];
            //echo "<br>";
             $sql = "SELECT `".$_GET['select']."` FROM `classtable` Where `c_scid` ='" . $userid . "'";
            //echo $sql;
            //echo "<br>";
            $result = filterTable($sql);
            
            while($row = mysqli_fetch_array($result)):
                //echo $row[$_GET['select']];
                $currst = $row[$_GET['select']];
            endwhile;
            
                
    
            if($currst == "0"){
                $sqli = "UPDATE `classtable` set `" .$_GET['select']. "` = '1' where `c_scid` ='" . $userid . "'";
                //echo $sqli;
                //echo "<br>";
                $result = filterTable($sqli);
                echo "<script language='javascript'>";
                echo "alert('file has been shared'); location.href = '../profile.php';";
                echo "</script>";
            }else if($currst == "1"){
                $sqli = "UPDATE `classtable` set `" .$_GET['select']. "` = '0' where `c_scid` ='" . $userid . "'";
                //echo $sqli;
                //echo "<br>";
                $result = filterTable($sqli);
                echo "<script language='javascript'>";
                echo "alert('you have canceled sharing this file'); location.href = '../profile.php';";
                echo "</script>";
            }else{
                echo "<script language='javascript'>";
                echo "alert('problem#sharing'); location.href = '../profile.php';";
                echo "</script>";
            }

?>
</body>
</html>