<?php
session_start();


?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Weather API Assignment</title>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	</script>
	<script type="text/javascript">
	$(document).ready(function(){
		$("form").submit(function(){
			var city = $( "select option:selected").attr('name');
			console.log(city);
			$.get($(this).attr('action'), $(this).serialize(), function(dojo){
				var temp = dojo.data.current_condition[0].temp_F;
				var humidity= dojo.data.current_condition[0].humidity;
				console.log(temp);
				$('#weather').html("The current temperature in " + city + " is: " +temp+"<br> Humidity: "+humidity+"%");
			}, 
			'json'
			);
			return false;
		});
	});
	</script>
</head>
<body>


<form action="http://api.worldweatheronline.com/free/v1/weather.ashx?callback=?" 
 	method="get"> 
<select name="q">
			<option value = '90713' name='Lakewood' >Lakewood</option>
			<option value = '94110' name="San Francisco">San Francisco</option>
			<option value = '10128' name="New York">New York</option>
			<option value = '97201' name="Portland">Portland</option>
		</select>
			<input type="hidden" name="key" value="jtpc4myth9fwxjgwz9fh5fw5">
			<input type="hidden" name="format" value="json">
			<input type="submit" value="Get Weather">
	</form>

	<div id="weather">
	</div>

</body>
</html>