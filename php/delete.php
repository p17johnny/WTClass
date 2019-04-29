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
                $deletefilepath = $row[$_GET['select']];
            endwhile;
            //echo "<br>";
            //echo $deletefilepath;
            //echo "<br>";
            if(file_exists($deletefilepath)){
                $sqli = "UPDATE `classtable` set `" .$_GET['select']. "` = '0' where `c_scid` ='" . $userid . "'";
                //echo $sqli;
                //echo "<br>";
                $result = filterTable($sqli);
                //echo "檔案存在,進行刪除"; 
                
                unlink($deletefilepath);//將檔案刪除
                echo "<script language='javascript'>";
                echo "alert('file deleted'); location.href = '../profile.php';";
                echo "</script>";
            }else{
                echo "<script language='javascript'>";
                echo "alert('file does not exist'); location.href = '../profile.php';";
                echo "</script>";
            }

?>
</body>
</html>