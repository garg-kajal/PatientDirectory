<!DOCTYPE html>
<html lang="en">
<head>
  <title>Patient Directory</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="bootstrap-3.3.7-dist_2/bootstrap-3.3.7-dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css">
 <script src="jquery.js"></script> 
  <script src="bootstrap-3.3.7-dist_2/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  <script src="angular.min.js"></script>  
<!-- <script src = "jquery-ui.js"></script>   -->
  
  
    <script >

        $(function () {
            var CurrentDate = new Date();
            var tday = CurrentDate.getDate();
            var tmo = CurrentDate.getMonth() + 1;
            var tyr = (CurrentDate.getFullYear());
            var startRange = tyr - 25;
            var endRange = tyr - 15;

            // $("[id$=dcDOB]").datepicker({
                // dateFormat: 'dd-M-yy',
                // //showButtonPanel: true,
                // changeMonth: true,
                // changeYear: true,
                // //yearRange: startRange + ':' + endRange,
                // defaultDate: new Date(startRange, tmo, 01),
                // //minDate: new Date(startRange, 0, 1),
                // maxDate: '+10Y',
                // inline: true
            // });

        });


        function RunDateFunctionPostBack() {
            $(function () {
                $("[id$=dcDOB]").datepicker({
                    changeMonth: true,
                    changeYear: true
                    ,dateFormat: "dd-MMM-yyyy"
                });

            });

        }

		
	
    </script>
	

	
<script type="text/javascript">
$(document).ready(function() {

// submit form using $.ajax() method

$('#myForm').submit(function(e){

e.preventDefault(); // Prevent Default Submission

$.ajax({
url: 'submit.php',
type: 'POST',
data: $(this).serialize() // it will serialize the form data
})
.done(function(data){
$('#form-content').fadeOut('slow', function(){
$('#form-content').fadeIn('slow').html(data);

})
.fail(function(){
alert('Ajax Submit Failed ...');
});
});
});
});
/*
// submit form using ajax short hand $.post() method

$('#reg-form').submit(function(e){

e.preventDefault(); // Prevent Default Submission

$.post('submit.php', $(this).serialize() )
.done(function(data){
$('#form-content').fadeOut('slow', function(){
$('#form-content').fadeIn('slow').html(data);
});
})
.fail(function(){
alert('Ajax Submit Failed ...');
});

});
*/


</script>




  
  <style>
  body{
	<!-- background: radial-gradient(circle, white, black);  -->

	max-width: 100%;

  }
  label{
	  color: black;
	  font-weight: 900;
  }
  #mainform{
	  margin-top: 50px;
	  
  }
  h2{
	  color:darkslategrey;
	  margin-left:100px;
	  margin-bottom:40px;
	  font-weight:bolder;
  }
input.ng-invalid {
   border-color:red;
}
input.ng-valid {
    border-color:lightgreen;
}
  </style>
</head>
<body ng-app="" style="background-color:#ccc;">

<div class="container" id="mainform">



<div class="panel panel-default" style="padding-left:300px;box-shadow: 10px 10px 5px #888888;">
<div class="panel-body">
 
  <div class="innerdiv" id="form-content">
   <h2>Patient Record Form</h2>
  <form method="POST" action="submit.php" class="form-horizontal" name="myForm" id="myForm">
    <div class="form-group">
	<div class="col-md-2 control-label">
      <label  for="fname">First Name:</label></div>
	  <div class="col-md-4"> 
      <input name="fname" pattern="[a-zA-Z\s]+" ng-model="fname" class="form-control" id="fname" placeholder="Enter First Name" required>
	  </div>

    </div>
    <div class="form-group">
	<div class="col-md-2 control-label">
      <label for="lname">Last Name:</label></div>
	  <div class="col-md-4"> 
      <input name="lname" pattern="[a-zA-Z\s]+" class="form-control" id="lname" placeholder="Enter Last Name">
 </div> 
	</div>
	<div class="form-group">
	<div class="col-md-2 control-label">
      <label for="dob">Date Of Birth:</label> </div>
	  <div class="col-md-4">  
      <input name="dob" type="date" class="form-control" id="dcDOB" placeholder="Enter Date Of Birth">
	  </div> 
    </div> 
	<div class="form-group">
	<div class="col-md-2 control-label">
      <label for="dob">age:</label></div>
	  <div class="col-md-4"> 
      <input name="age" ng-model="age" pattern="[0-9\s]+" class="form-control" id="age" placeholder="Enter age">
	 </div> 
	 <span ng-show="myForm.age.$touched && myForm.age.$invalid"> age is required.</span>
    </div>
	
	
	<div class="form-group">
	<div class="col-md-2 control-label">
      <label for="dob">Gender:</label></div> 
  <div class="col-md-4"> 
      <select name="gender" ng-model="gender" class="form-control" placeholder="---Select---" required>
  <option value="male">male</option>
  <option value="female">female</option>
  <option value="others">others</option>
  
</select>

<span ng-show="myForm.gender.$touched && myForm.gender.$invalid">The gender is required.</span>
  </div>
	</div>
	
	
 <div class="form-group">
 <div class="col-md-2 control-label">
      <label for="lname">Contact:</label></div>
	  <div class="col-md-4">  
      <input name="contact" ng-maxlength="10" type="number" ng-model="contact" class="form-control" id="contact" placeholder="Enter Contact" required>
		<span ng-show="myForm.contact.$touched && myForm.contact.$invalid">The contact is invalid.</span>
		</div> 
	 
    </div>
  <div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-4" align="center">
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
	</div>
	</div>
  </form>
 <div style="height:8px;"></div>
   </div>
    <form method="POST" action="searchPage.php">
	<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-4" align="center">
   <button type="submit" name="View" class="btn btn-default">Search Patients</button>
   </div>
   </div>
   </form>
</div>
</div>
</div>



</body>
</html>












