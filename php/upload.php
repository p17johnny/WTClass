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
    echo $_FILES['file']['name'];
    
    $pathx = 'file/'.$_GET['select'].'/'.$_FILES['file']['name'];
    echo $_GET['select'];
        if($_FILES['file']['error']>0){
            echo "<script language='javascript'>";
            echo "alert('file upload failed'); location.href = '../class.php';";
            echo "</script>";
        }else{
            move_uploaded_file($_FILES['file']['tmp_name'],$pathx);
            echo "路徑位置：".'<a href="file/'.$_GET['select']."/".$_FILES['file']['name'].'">file/'.$_FILES['file']['name'].'</a>';
            echo "<br />";
            echo "類型：".$_FILES['file']['type']."<br />大小：".$_FILES['file']['size']."<br/>";
            
            $sql = "UPDATE `classtable` set `" .$_GET['select']. "` = '".$pathx."' where `c_scid` ='" . $userid . "'";
            echo $sql;
            $result = filterTable($sql);
            //echo "<script language='javascript'>";
            //echo "alert('upload successed'); location.href = '../class.php';";
            //echo "</script>";
}
?>
</body>
</html>