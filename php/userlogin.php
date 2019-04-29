<?php

include "db_connection.php";
session_start();

function filterTable($query)
{
    $connect = mysqli_connect("localhost", "rockuo", "jj088514", "smart");
    mysqli_query($connect, "SET NAMES 'utf8'");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}


	
	$schoolid= $_POST['username'];
	$passtr= $_POST['password'];
	
	$query = "SELECT * FROM `classtable` Where `c_scid` ='" . $schoolid . "'";

	$result = filterTable($query);
	$row = mysqli_fetch_array($result);

	if ($row){

          if ($row['c_pas']==$passtr)
            {
            $_SESSION['username'] = $schoolid;
              
            header('location:../class.php');

            }else{
                echo "<script language='javascript'>";
                echo "alert('wrong password'); location.href = '../index.php';";
                echo "</script>";
            }
     }else{
            echo "<script language='javascript'>";
            echo "alert('wrong username(schoolid)'); location.href = '../index.php';";
            echo "</script>";
	 }
?>