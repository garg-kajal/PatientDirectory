<?php
		if($_POST) {
			$servername = "127.0.0.1";
			$username = "root";
			$password = "";
			$dbname = "dataphilabs";
			
			$firstname = isset($_POST['fname'])?$_POST['fname']:"";
			$lastname = isset($_POST['lname'])?$_POST['lname']:"";
			$DOB = isset($_POST['dob'])?$_POST['dob']:"";
			$age = isset($_POST['age'])?$_POST['age']:"";
			$gender = isset($_POST['gender'])?$_POST['gender']:"";
			$contact = isset($_POST['contact'])?$_POST['contact']:"";
			
			
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			if($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			
			$sql = "INSERT INTO patients (firstname, lastname, DOB, age, gender, contact)
			VALUES ('$firstname', '$lastname', '$DOB', '$age', '$gender', '$contact')";
			
			if($conn->query($sql) === TRUE) {
				echo"<h2>";
				echo "Form Submitted.";
				echo"</h2>";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			$conn->close();
		}
		?>