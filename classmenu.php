<?php
include "php/db_connection.php";
session_start();
//$userid = $_SESSION['username'];
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "rockuo", "jj088514", "wtclass");
    mysqli_query($connect, "SET NAMES 'utf8'");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
?>

<!DOCTYPE html>
<html lang="zh_TW">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta content="What the class" name="description">
	<meta content="陳繹仁" name="author">
	<title>Wtclass!</title><!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet"><!-- Custom styles for this template -->
	<link href="css/navbar.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		<a class="navbar-brand" href="#">WTClass!</a> <button aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarsExample03" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navbarsExample03">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">主選單 <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="changepas.php">更改密碼</a>
				</li>
                <li class="nav-item">
					<a class="nav-link" href="profile.php">個人檔案管理</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="php/logout.php">登出</a>
				</li>
			</ul>
			<form class="form-inline my-2 my-md-0">
				<input class="form-control" placeholder="搜尋姓名" type="text">
			</form>
		</div>
	</nav>
	<main role="main">
		<div class="jumbotron">
			<div class="col-sm-8 mx-auto">

                

                <?php 
                    $query = "SELECT * FROM `classtable` WHERE `class` = 'IM04' AND `time` = 'C'";
                    $result = filterTable($query);
                    //$row = mysqli_fetch_array($result); 

                    while($row = mysqli_fetch_array($result)):
                        echo "<div style='color:blue'>".$row['t01']."</div>";
                        echo $row['t02'];
                    endwhile;

                    
                ?>

				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">時間\日期</th>
							<th scope="col">週一</th>
							<th scope="col">週二</th>
							<th scope="col">週三</th>
							<th scope="col">週四</th>
							<th scope="col">週五</th>
                            <th scope="col">週六</th>
						</tr>
					</thead>
					<tbody>
                        <tr>
                            <th scope="row">08:10~09:00</th>
                            <?php
                                $query = "SELECT * FROM `classtable` WHERE `class` = 'IM04' AND `time` = 'A'";

                                $result = filterTable($query);

                                while($row = mysqli_fetch_array($result)):
                                    echo "<td>".$row['t01']."</td>";
                                    echo "<td>".$row['t02']."</td>";
                                    echo "<td>".$row['t03']."</td>";
                                    echo "<td>".$row['t04']."</td>";
                                    echo "<td>".$row['t05']."</td>";
                                    echo "<td>".$row['t06']."</td>";
                                endwhile; 
                            ?>
                        </tr>
                        <tr>
                            <th scope="row">09:10~10:00</th>
                            <?php
                                $query = "SELECT * FROM `classtable` WHERE `class` = 'IM04' AND `time` = 'B'";

                                $result = filterTable($query);

                                while($row = mysqli_fetch_array($result)):
                                    echo "<td>".$row['t01']."</td>";
                                    echo "<td>".$row['t02']."</td>";
                                    echo "<td>".$row['t03']."</td>";
                                    echo "<td>".$row['t04']."</td>";
                                    echo "<td>".$row['t05']."</td>";
                                    echo "<td>".$row['t06']."</td>";
                                endwhile; 
                            ?>
                        </tr>
                        <tr>
                            <th scope="row">10:10~11:00</th>
                            <?php
                                $query = "SELECT * FROM `classtable` WHERE `class` = 'IM04' AND `time` = 'C'";

                                $result = filterTable($query);

                                while($row = mysqli_fetch_array($result)):
                                    echo "<td>".$row['t01']."</td>";
                                    echo "<td>".$row['t02']."</td>";
                                    echo "<td>".$row['t03']."</td>";
                                    echo "<td>".$row['t04']."</td>";
                                    echo "<td>".$row['t05']."</td>";
                                    echo "<td>".$row['t06']."</td>";
                                endwhile; 
                            ?>
                        </tr>
                        <tr>
                            <th scope="row">11:10~12:00</th>
                            <?php
                                $query = "SELECT * FROM `classtable` WHERE `class` = 'IM04' AND `time` = 'D'";

                                $result = filterTable($query);

                                while($row = mysqli_fetch_array($result)):
                                    echo "<td>".$row['t01']."</td>";
                                    echo "<td>".$row['t02']."</td>";
                                    echo "<td>".$row['t03']."</td>";
                                    echo "<td>".$row['t04']."</td>";
                                    echo "<td>".$row['t05']."</td>";
                                    echo "<td>".$row['t06']."</td>";
                                endwhile; 
                            ?>
                        </tr>
                        <tr>
                            <th scope="row">12:10~13:25</th>
                            <?php
                                $query = "SELECT * FROM `classtable` WHERE `class` = 'IM04' AND `time` = 'E'";

                                $result = filterTable($query);

                                while($row = mysqli_fetch_array($result)):
                                    echo "<td>".$row['t01']."</td>";
                                    echo "<td>".$row['t02']."</td>";
                                    echo "<td>".$row['t03']."</td>";
                                    echo "<td>".$row['t04']."</td>";
                                    echo "<td>".$row['t05']."</td>";
                                    echo "<td>".$row['t06']."</td>";
                                endwhile; 
                            ?>
                        </tr>
                        <tr>
                            <th scope="row">13:25~14:15</th>
                            <?php
                                $query = "SELECT * FROM `classtable` WHERE `class` = 'IM04' AND `time` = 'F'";

                                $result = filterTable($query);

                                while($row = mysqli_fetch_array($result)):
                                    echo "<td>".$row['t01']."</td>";
                                    echo "<td>".$row['t02']."</td>";
                                    echo "<td>".$row['t03']."</td>";
                                    echo "<td>".$row['t04']."</td>";
                                    echo "<td>".$row['t05']."</td>";
                                    echo "<td>".$row['t06']."</td>";
                                endwhile; 
                            ?>
                        </tr>
                        <tr>
                            <th scope="row">14:20~15:10</th>
                            <?php
                                $query = "SELECT * FROM `classtable` WHERE `class` = 'IM04' AND `time` = 'G'";

                                $result = filterTable($query);

                                while($row = mysqli_fetch_array($result)):
                                    echo "<td>".$row['t01']."</td>";
                                    echo "<td>".$row['t02']."</td>";
                                    echo "<td>".$row['t03']."</td>";
                                    echo "<td>".$row['t04']."</td>";
                                    echo "<td>".$row['t05']."</td>";
                                    echo "<td>".$row['t06']."</td>";
                                endwhile; 
                            ?>
                        </tr>
                        <tr>
                            <th scope="row">15:20~16:10</th>
                            <?php
                                $query = "SELECT * FROM `classtable` WHERE `class` = 'IM04' AND `time` = 'H'";

                                $result = filterTable($query);

                                while($row = mysqli_fetch_array($result)):
                                    echo "<td>".$row['t01']."</td>";
                                    echo "<td>".$row['t02']."</td>";
                                    echo "<td>".$row['t03']."</td>";
                                    echo "<td>".$row['t04']."</td>";
                                    echo "<td>".$row['t05']."</td>";
                                    echo "<td>".$row['t06']."</td>";
                                endwhile; 
                            ?>
                        </tr>
                        <tr>
                            <th scope="row">16:15~17:05</th>
                            <?php
                                $query = "SELECT * FROM `classtable` WHERE `class` = 'IM04' AND `time` = 'I'";

                                $result = filterTable($query);

                                while($row = mysqli_fetch_array($result)):
                                    echo "<td>".$row['t01']."</td>";
                                    echo "<td>".$row['t02']."</td>";
                                    echo "<td>".$row['t03']."</td>";
                                    echo "<td>".$row['t04']."</td>";
                                    echo "<td>".$row['t05']."</td>";
                                    echo "<td>".$row['t06']."</td>";
                                endwhile; 
                            ?>
                        </tr>
					</tbody>
				</table>
			</div>
		</div>
	</main>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
	</script> 
	<script>
	window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')
	</script> 
	<script src="js/popper.min.js">
	</script> 
	<script src="js/bootstrap.min.js">
	</script>
</body>
</html>