<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 850px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    <title>mediclient</title>
</head><body>
 <div class="wrapper">
  <div class="container-fluid">
     <div class="row">
         <div class="col-md-12">
              <div class="page-header clearfix">
                  <h2 class="pull-left">CLIENT RECORDS</h2>
                  <div class="active-pink-3 active-pink-4 mb-4">
  <input class="form-control" id="myInput" onkeyup="myFunction()" type="text" placeholder="Search by ID number" aria-label="Search">
</div>
                  <a href="K1.php" class="btn btn-success pull-right">LOG OUT</a>
               </div>
                    <?php
                    // Include config file
                    require_once "configK.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM p1";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table id ='myTable' class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>name</th>";
                                        echo "<th>idno</th>";
                                        //echo "<th>status</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['idno'] . "</td>";
                                        //echo "<td>" . $row['status'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='readK.php?id=". $row['id'] ."' title='Records' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            
                                            
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>

            </div>        
        </div>
    </div>
    <div>
    <div id="result"></div>
    <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
    <script>
   
    $(document).ready(function(){

        $("#search").keyup(function(){
var K=$("#search").val();
            var txt=$(this).val();
            if(txt!=''){
            var dataString={'id':txt};
            console.log(txt);
      $.ajax({
        
        type: "POST",
      url: "search.php",
      data: dataString,
      success: function() {
       console.log("sucess");
      }
               });
            }else{
          
                $.ajax({
        type: "POST",
      url: "search.php",
      data: dataString,
      success: function() {
       console.log("sucfailess");
      }
               }); 
            }
        });
    });
    
    
    </script>






</body>
</html>