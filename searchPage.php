
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Patient Directory</title>
   <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.3.7-dist_2/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script src="jquery.js"></script>
  <script src="bootstrap-3.3.7-dist_2/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  <script src="jquery.min.js"></script>
  
      <style>
	      #custom-search-input{
    padding: 3px;
    border: solid 1px #E4E4E4;
    border-radius: 6px;
    background-color: #fff;
	margin-top: 50px;
	margin-left: 500px;
	width: 300px;
	border-style: inset;
	background-color: aliceblue;
	border-shadow: 9px;
}
.panel-default{
	box-shadow: 10px 10px 5px #888888;
}
#custom-search-input input{
    border: 0;
    box-shadow: none;
}
@media (min-width: 1200px)
{
.container {
    width: 1000px;
}
}
#custom-search-input button{
    margin: 2px 0 0 0;
    background: none;
    box-shadow: none;
    border: 0;
    color: #666666;
    padding: 0 8px 0 10px;
    border-left: solid 1px #ccc;
}

#custom-search-input button:hover{
    border: 0;
    box-shadow: none;
    border-left: solid 1px #ccc;
}

#custom-search-input .glyphicon-search{
    font-size: 23px;
}
.table{
	max-width: 50%;
	margin-left: 240px;
}
body{
	background-color:#ccc;
	
	max-width:100%;
	
}
	</style>
  </head>
  <body>
  <header>
 
   <div>
   
    			<button type="button" class="btn btn-default" onclick="window.location='index.php';" style="margin-top:0px; float:right;">Back</button>
           
			<div id="custom-search-input">
                <div class="input-group col-md-12">
                    <form action="searchPage.php" method="GET">
        
                    <input name="query" type="text" class="form-control input-lg" placeholder="Press enter to search" />
                    
                    
                    </form>
                </div>
            </div>
        </div>
		</header>
		<div style="height:8px;"></div>
 

	
		
		
		 <?php
		 
		 $servername = "127.0.0.1";
			$username = "root";
			$password = "";
			$dbname = "dataphilabs";
    $query = isset($_GET['query'])?$_GET['query']:""; 
    // $min_length = 3;
     
    // if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         	$conn = new mysqli($servername, $username, $password, $dbname);
			
			if($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
        $query = htmlspecialchars($query); 
        $query = mysqli_real_escape_string($conn, $query);
       
         
        $raw_results = mysqli_query($conn, "SELECT * FROM patients
            WHERE (`firstname` LIKE '%".$query."%') OR (`lastname` LIKE '%".$query."%') OR (`contact` LIKE '%".$query."%')")or die(mysql_error());
         
        if(mysqli_num_rows($raw_results) > 0){ 
               print " 
			   <div class=\"container\">
			   <div class=\"panel panel-default\">
		<div class=\"panel-body\">
<div class=\"table-responsive\">
<table class=\"table\" ><tr> 
<td width=100><strong>First Name:</strong></td> 
<td width=100><strong>Last Name: </strong></td> 
<td width=100><strong>DOB:</strong></td> 
<td width=100><strong>Age:</strong></td> 
<td width=100><strong>Gender:</strong></td> 
<td width=100><strong>Contact:</strong></td> 

</tr>"; 
            while($results = mysqli_fetch_array($raw_results)){
           
                     
print "<tr>"; 
print "<td>" . $results['firstname'] . "</td>"; 
print "<td>" . $results['lastname'] . "</td>"; 
print "<td>" . $results['DOB'] . "</td>"; 
print "<td>" . $results['age'] . "</td>";
print "<td>" . $results['gender'] . "</td>";
print "<td>" . $results['contact'] . "</td>"; 
print "</tr>"; 

              

            }
           print "</table>"; 
print"</div>";

                 echo"<br>";   
        }
        else{
            echo "No results";
        }
         
    
    // else{ 
        // echo "Minimum length of query searched should be ".$min_length;
    // }
?>

</body>
</html>




