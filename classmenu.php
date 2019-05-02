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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

</head>
<style> 



td, th {text-align: center;}
        .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>td, .table>thead>tr>th {vertical-align: middle;}
        .container { margin:150px auto;}
        body { font-family:'Open Sans';}
</style> 

<script type="text/javascript">  
    
    (function() { 

      document.onmousedown = function() { 

        var selList = []; 

        var fileNodes = document.getElementsByTagName("td"); 

        for ( var i = 0; i < fileNodes.length; i++) { 

          if (fileNodes[i].className.indexOf("fileDiv") != -1) { 

            fileNodes[i].className = "fileDiv"; 

            selList.push(fileNodes[i]); 

          } 

        } 

        var isSelect = true; 

        var evt = window.event || arguments[0]; 

        var startX = (evt.x || evt.clientX); 

        var startY = (evt.y || evt.clientY); 

        var selDiv = document.createElement("td"); 

        selDiv.style.cssText = "position:absolute;width:0px;height:0px;font-size:0px;margin:0px;padding:0px;border:1px dashed #0099FF;background-color:#C3D5ED;z-index:1000;filter:alpha(opacity:60);opacity:0.6;display:none;"; 

        selDiv.id = "selectDiv"; 

        document.body.appendChild(selDiv); 

        selDiv.style.left = startX + "px"; 

        selDiv.style.top = startY + "px"; 

        var _x = null; 

        var _y = null; 

        clearEventBubble(evt); 

        document.onmousemove = function() { 

          evt = window.event || arguments[0]; 

          if (isSelect) { 

            if (selDiv.style.display == "none") { 

              selDiv.style.display = ""; 

            } 

            _x = (evt.x || evt.clientX); 

            _y = (evt.y || evt.clientY); 

            selDiv.style.left = Math.min(_x, startX) + "px"; 

            selDiv.style.top = Math.min(_y, startY) + "px"; 

            selDiv.style.width = Math.abs(_x - startX) + "px"; 

            selDiv.style.height = Math.abs(_y - startY) + "px"; 

            // ---------------- ¹Ø¼üËã·¨ ---------------------  

            var _l = selDiv.offsetLeft, _t = selDiv.offsetTop; 

            var _w = selDiv.offsetWidth, _h = selDiv.offsetHeight; 

            for ( var i = 0; i < selList.length; i++) { 

              var sl = selList[i].offsetWidth + selList[i].offsetLeft; 

              var st = selList[i].offsetHeight + selList[i].offsetTop; 

              if (sl > _l && st > _t && selList[i].offsetLeft < _l + _w && selList[i].offsetTop < _t + _h) { 

                if (selList[i].className.indexOf("seled") == -1) { 

                  selList[i].className = selList[i].className + " seled"; 

                } 

              } else { 

                if (selList[i].className.indexOf("seled") != -1) { 

                  selList[i].className = "fileDiv"; 

                } 

              } 

            } 

          } 

          clearEventBubble(evt); 

        } 

        document.onmouseup = function() { 

          isSelect = false; 

          if (selDiv) { 

            document.body.removeChild(selDiv); 

            showSelDiv(selList); 

          } 

          selList = null, _x = null, _y = null, selDiv = null, startX = null, startY = null, evt = null; 

        } 

      } 

    })(); 

    function clearEventBubble(evt) { 

      if (evt.stopPropagation) 

        evt.stopPropagation(); 

      else 

        evt.cancelBubble = true; 

      if (evt.preventDefault) 

        evt.preventDefault(); 

      else 

        evt.returnValue = false; 

    } 
    var selInfo="";
    function showSelDiv(arr) { 
      

      var count = 0; 

      //var selInfo = "";

      //var selInfo ="";  

      for ( var i = 0; i < arr.length; i++) { 

        if (arr[i].className.indexOf("seled") != -1) { 

          count++; 

          //selInfo += arr[i].innerHTML + "\n"; 

          selInfo += arr[i].id + "\n";

        } 

      } 

      //alert("總共是" + count + " 以下是這\n" + selInfo); 
      //all = selInfo;
      //alert(all);
      /*  
        $.ajax({
          type:"POST",
          url:"jquerykx.php",
          data:{
            selInfo:selInfo},
            success:function(data){
              console.log(data);
              result = data;
            alert(result);
            },
            error:function(data){
              alert("錯誤");
            }
        });
        */
    }

    function hello() {
      //alert(selInfo);
      
      $.ajax({
          type:"POST",
          url:"jquery.php",
          data:{
            selInfo:selInfo},
            success:function(data){
              console.log(data);
              result = data;
              alert(result);
            },
            error:function(data){
              alert("錯誤");
            }
        });
      selInfo = "";
    }
    function cancel(){
      selInfo = ""; 
    }
</script> 
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
			<div class="col-sm-8">

                

                

				<table class="table table-bordered">
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
                                    echo "<td class='fileDiv' id='a1'>".$row['t01']."</td>";
                                    echo "<td class='fileDiv' id='a2'>".$row['t02']."</td>";
                                    echo "<td class='fileDiv' id='a3'>".$row['t03']."</td>";
                                    echo "<td class='fileDiv' id='a4'>".$row['t04']."</td>";
                                    echo "<td class='fileDiv' id='a5'>".$row['t05']."</td>";
                                    echo "<td class='fileDiv' id='a6'>".$row['t06']."</td>";
                                endwhile; 
                            ?>
                        </tr>
                        <tr>
                            <th scope="row">09:10~10:00</th>
                            <?php
                                $query = "SELECT * FROM `classtable` WHERE `class` = 'IM04' AND `time` = 'B'";

                                $result = filterTable($query);

                                while($row = mysqli_fetch_array($result)):
                                    echo "<td class='fileDiv' id='b1'>".$row['t01']."</td>";
                                    echo "<td class='fileDiv' id='b2'>".$row['t02']."</td>";
                                    echo "<td class='fileDiv' id='b3'>".$row['t03']."</td>";
                                    echo "<td class='fileDiv' id='b4'>".$row['t04']."</td>";
                                    echo "<td class='fileDiv' id='b5'>".$row['t05']."</td>";
                                    echo "<td class='fileDiv' id='b6'>".$row['t06']."</td>";
                                endwhile; 
                            ?>
                        </tr>
                        <tr>
                            <th scope="row">10:10~11:00</th>
                            <?php
                                $query = "SELECT * FROM `classtable` WHERE `class` = 'IM04' AND `time` = 'C'";

                                $result = filterTable($query);

                                while($row = mysqli_fetch_array($result)):
                                    echo "<td class='fileDiv' id='c1'>".$row['t01']."</td>";
                                    echo "<td class='fileDiv' id='c2'>".$row['t02']."</td>";
                                    echo "<td class='fileDiv' id='c3'>".$row['t03']."</td>";
                                    echo "<td class='fileDiv' id='c4'>".$row['t04']."</td>";
                                    echo "<td class='fileDiv' id='c5'>".$row['t05']."</td>";
                                    echo "<td class='fileDiv' id='c6'>".$row['t06']."</td>";
                                endwhile; 
                            ?>
                        </tr>
                        <tr>
                            <th scope="row">11:10~12:00</th>
                            <?php
                                $query = "SELECT * FROM `classtable` WHERE `class` = 'IM04' AND `time` = 'D'";

                                $result = filterTable($query);

                                while($row = mysqli_fetch_array($result)):
                                    echo "<td class='fileDiv' id='d1'>".$row['t01']."</td>";
                                    echo "<td class='fileDiv' id='d2'>".$row['t02']."</td>";
                                    echo "<td class='fileDiv' id='d3'>".$row['t03']."</td>";
                                    echo "<td class='fileDiv' id='d4'>".$row['t04']."</td>";
                                    echo "<td class='fileDiv' id='d5'>".$row['t05']."</td>";
                                    echo "<td class='fileDiv' id='d6'>".$row['t06']."</td>";
                                endwhile; 
                            ?>
                        </tr>
                        <tr>
                            <th scope="row">12:10~13:25</th>
                            <?php
                                $query = "SELECT * FROM `classtable` WHERE `class` = 'IM04' AND `time` = 'E'";

                                $result = filterTable($query);

                                while($row = mysqli_fetch_array($result)):
                                    echo "<td class='fileDiv' id='e1'>".$row['t01']."</td>";
                                    echo "<td class='fileDiv' id='e2'>".$row['t02']."</td>";
                                    echo "<td class='fileDiv' id='e3'>".$row['t03']."</td>";
                                    echo "<td class='fileDiv' id='e4'>".$row['t04']."</td>";
                                    echo "<td class='fileDiv' id='e5'>".$row['t05']."</td>";
                                    echo "<td class='fileDiv' id='e6'>".$row['t06']."</td>";
                                endwhile;
                            ?>
                        </tr>
                        <tr>
                            <th scope="row">13:25~14:15</th>
                            <?php
                                $query = "SELECT * FROM `classtable` WHERE `class` = 'IM04' AND `time` = 'F'";

                                $result = filterTable($query);

                                while($row = mysqli_fetch_array($result)):
                                    echo "<td class='fileDiv' id='f1'>".$row['t01']."</td>";
                                    echo "<td class='fileDiv' id='f2'>".$row['t02']."</td>";
                                    echo "<td class='fileDiv' id='f3'>".$row['t03']."</td>";
                                    echo "<td class='fileDiv' id='f4'>".$row['t04']."</td>";
                                    echo "<td class='fileDiv' id='f5'>".$row['t05']."</td>";
                                    echo "<td class='fileDiv' id='f6'>".$row['t06']."</td>";
                                endwhile; 
                            ?>
                        </tr>
                        <tr>
                            <th scope="row">14:20~15:10</th>
                            <?php
                                $query = "SELECT * FROM `classtable` WHERE `class` = 'IM04' AND `time` = 'G'";

                                $result = filterTable($query);

                                while($row = mysqli_fetch_array($result)):
                                    echo "<td class='fileDiv' id='g1'>".$row['t01']."</td>";
                                    echo "<td class='fileDiv' id='g2'>".$row['t02']."</td>";
                                    echo "<td class='fileDiv' id='g3'>".$row['t03']."</td>";
                                    echo "<td class='fileDiv' id='g4'>".$row['t04']."</td>";
                                    echo "<td class='fileDiv' id='g5'>".$row['t05']."</td>";
                                    echo "<td class='fileDiv' id='g6'>".$row['t06']."</td>";
                                endwhile; 
                            ?>
                        </tr>
                        <tr>
                            <th scope="row">15:20~16:10</th>
                            <?php
                                $query = "SELECT * FROM `classtable` WHERE `class` = 'IM04' AND `time` = 'H'";

                                $result = filterTable($query);

                                while($row = mysqli_fetch_array($result)):
                                    echo "<td class='fileDiv' id='h1'>".$row['t01']."</td>";
                                    echo "<td class='fileDiv' id='h2'>".$row['t02']."</td>";
                                    echo "<td class='fileDiv' id='h3'>".$row['t03']."</td>";
                                    echo "<td class='fileDiv' id='h4'>".$row['t04']."</td>";
                                    echo "<td class='fileDiv' id='h5'>".$row['t05']."</td>";
                                    echo "<td class='fileDiv' id='h6'>".$row['t06']."</td>";
                                endwhile; 
                            ?>
                        </tr>
                        <tr>
                            <th scope="row">16:15~17:05</th>
                            <?php
                                $query = "SELECT * FROM `classtable` WHERE `class` = 'IM04' AND `time` = 'I'";

                                $result = filterTable($query);

                                while($row = mysqli_fetch_array($result)):
                                    echo "<td class='fileDiv' id='i1'>".$row['t01']."</td>";
                                    echo "<td class='fileDiv' id='i2'>".$row['t02']."</td>";
                                    echo "<td class='fileDiv' id='i3'>".$row['t03']."</td>";
                                    echo "<td class='fileDiv' id='i4'>".$row['t04']."</td>";
                                    echo "<td class='fileDiv' id='i5'>".$row['t05']."</td>";
                                    echo "<td class='fileDiv' id='i6'>".$row['t06']."</td>";
                                endwhile; 
                            ?>
                        </tr>
					</tbody>
				</table>
                    <button onclick="hello()"> test </button>
                    <button onclick="cancel()">cancel</button>
			</div>
		</div>
	</main>
	   <script>
    jQuery(document).ready(function ($) {
        $('#tablecellsselection').tableCellsSelection();
    });
  </script>

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