<html> 

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Table Cells Selection Using jQuery  Plugin | Tutorial</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  
    <script src="tablecellsselection.js"></script>
  
    <!--<link rel="stylesheet" href="tablecellsselection.css">-->
    

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

          selInfo += arr[i].innerHTML + "\n"; 

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
      alert(selInfo);

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
    }
    function cancel(){
      selInfo = ""; 
    }
</script> 

<body> 
 <div class="col-md-8">
    <table class="table table-bordered table-inverse" summary="Table selection with plugin" id="tablecellsselection">
        <thead>
            <tr>
                <th rowspan="1">資管四甲課表</th>
                <th colspan="1">禮拜一</th>
                <th colspan="1">禮拜二</th>
                <th colspan="1">禮拜三</th>
                <th colspan="1">禮拜四</th>
                <th colspan="1">禮拜五</th>
            </tr>
            <tr>
                <th>08:00-</th>
                <td class="fileDiv"name="a1"></td>
                <td class="fileDiv"name="a2"></td>
                <td class="fileDiv"name="a3"></td>
                <td class="fileDiv"name="a4"></td>
                <td class="fileDiv"name="a5"></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>09:00-</th>
                <td class="fileDiv"name="b1"></td>
                <td class="fileDiv"name="b2"></td>
                <td class="fileDiv"name="b3"></td>
                <td class="fileDiv"name="b4"></td>
                <td class="fileDiv"name="b5"></td>
            </tr>
            <tr>
                <th>10:00-</th>
                <td class="fileDiv"name="c1"></td>
                <td class="fileDiv"name="c2"></td>
                <td class="fileDiv"name="c3"></td>
                <td class="fileDiv"name="c4"></td>   
                <td class="fileDiv"name="c5"></td>              
            </tr>
            <tr>
                <th>11:00-</th>                
                <td class="fileDiv"name="d1"></td>  
                <td class="fileDiv"name="d2"></td>
                <td class="fileDiv"name="d3"></td>
                <td class="fileDiv"name="d4"></td>
                <td class="fileDiv"name="d5"></td>           
            </tr>
            <tr>
                <th>中午休息</th>
                <td colspan="7">午間用餐時間</td>    
            </tr>
            <tr>
                <th>13:00-</th>
                <td class="fileDiv"name="e1"></td>
                <td class="fileDiv"name="e2"></td>
                <td class="fileDiv"name="e3"></td>
                <td class="fileDiv"name="e4"></td>
                <td class="fileDiv"name="e5"></td>               
            </tr>
            <tr>
                <th>14:00-</th>
                <td class="fileDiv"name="f1">f1</td>
                <td class="fileDiv"name="f1">f2</td>
                <td class="fileDiv">f3</td>
                <td class="fileDiv">f4</td>
                <td class="fileDiv">f5</td>
            </tr>
            <tr>
                <th>15:00-</th>
                <td class="fileDiv">g1</td>
                <td class="fileDiv">g1</td>
                <td class="fileDiv">g1</td>
                <td class="fileDiv">g1</td>
                <td class="fileDiv">g1</td>
               
            </tr>
            <tr>
                <th>16:00-</th>
                <td class="fileDiv">h1</td>
                <td class="fileDiv">h2</td>
                <td class="fileDiv">h3</td>
                <td class="fileDiv">h4</td>
                <td class="fileDiv">h5</td>
               
            </tr>
        </tbody>
    </table>
    <button onclick="hello()"> test </button>
    <button onclick="cancel()">cancel</button>
</div>
	<script>
    jQuery(document).ready(function ($) {
        $('#tablecellsselection').tableCellsSelection();
    });
  </script>


</body> 

</html>