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


	
	$unamestr= $_POST['username'];
	$passtr= $_POST['password'];
	
	$query = "SELECT * FROM `user` Where `u_email` ='" . $unamestr . "'";

	$result = filterTable($query);
	$row = mysqli_fetch_array($result);

	if ($row){

          if ($row['u_passwd']==$passtr)
            {
            $_SESSION['username'] = $unamestr;


            //$data='welcome back';
			//echo($data);
            header('location:../class.php');
              

            }else{
                echo "<script language='javascript'>";
                echo "alert('wrong password') location.href = '../adminindex.php'";
                echo "</script>";
            }
     }else{
            echo "<script language='javascript'>";
            echo "alert('wrong username(email)') location.href = '../adminindex.php'";
            echo "</script>";
	 }
?>

