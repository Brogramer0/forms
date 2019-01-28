<!DOCTYPE html>
<html>
<head>
	<title>TEST</title>
	<style type="text/css">
		select {
			width: 150px;
		}
	</style>
	<script type="text/javascript">
		function myfunc(event){
			document.getElementById("ct")=event;
		}
		function myFunction(e) {
    		//cument.getElementById("myText").value = e.currentTarget.id;
    		var xmlhttp = new XMLHttpRequest();
    		if (e.currentTarget.id == "country") {
	        	xmlhttp.onreadystatechange = function() {
		            if (this.readyState == 4 && this.status == 200) {
				        	document.getElementById("state").innerHTML = this.responseText;
		            }
		        };
		    } else if (e.currentTarget.id == "state") {
		    	xmlhttp.onreadystatechange = function() {
		            if (this.readyState == 4 && this.status == 200) {
				        	document.getElementById("city").innerHTML = this.responseText;
		            }
		        };
		    } else if (e.currentTarget.id == "city")  {
		    	xmlhttp.onreadystatechange = function() {
		            if (this.readyState == 4 && this.status == 200) {
				        	document.getElementById("pincode").innerHTML = this.responseText;
		            }
		        }
		    }
	        if (e.currentTarget.id == "country")
	        	xmlhttp.open("GET", "disp.php?country=" + e.target.value, true);
	        else if (e.currentTarget.id == "state") 
	        	xmlhttp.open("GET", "disp.php?state=" + e.target.value, true);
	        else if (e.currentTarget.id == "city") 
	        	xmlhttp.open("GET", "disp.php?city=" + e.target.value, true);
	        xmlhttp.send();
		}
	</script>
</head>
<body>
	<form>
		<select name="" id="country" oninput="myFunction(event)">
			<option disabled selected>Country</option>
			<?php
				$conn = new mysqli('localhost','test','test','place');

				$sql="SELECT country_name FROM country";
				$result=$conn->query($sql);
				while ($row=$result->fetch_assoc()) {
					echo "<option value=\"".$row['country_name']."\">".$row['country_name']."</option>";
				}
			?>
		</select> 
		<input type="text" name="ct"><br>
		<select name="" id="state" oninput="myFunction(event)">
			<option disabled selected>State</option>
		</select>
		<input type="text" name="st"><br>
		<select name="" id="city" oninput="myFunction(event)">
			<option disabled selected>City</option>
		</select>
		<input type="text" name="cit">
		
	</form>
</body>
</html>