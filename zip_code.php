<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Postcode Finder</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
 <style>
 html { 
		  background: url(zavicaj.jpg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		body{
		background:none;
		}
		.center{
		width:80%;
		}
		.obrub{
		background:white;
		padding:10px;
		border:2px white;
		border-radius: 25px;
		}
 </style>
 
 </head>
  <body>
  <br/>
  <div class="container center"><br/>
		<center><h1 class="obrub" style="width:60%;">Postcode finder</h1></center>
		<center><p class="obrub" style="width:50%;">Enter a partial addres to get the postcode.</p></center><br/>
		<div id="msg" ></div>
		<div id="msg2" ></div>
		<br/>
<form>
  <div class="form-group" class="obrub">
   <center> <label for="adress" class="obrub" >Address:</label>
    <input type="text" class="form-control" id="address"  placeholder="Enter partial address"></center>

  </div>
  
 <center> <button class="btn btn-primary" class="obrub" id="find_postcode">Submit</button></center>
</form>
		
  
  </div>
    

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  
 <script type="text/javascript">
    $("#find_postcode").click(function(e){
		e.preventDefault();
	
		$.ajax({
			url:"https://maps.googleapis.com/maps/api/geocode/json?address=" + encodeURIComponent($("#address").val()) + "&key=AIzaSyDFG7SrwsxAcoDJXMjKR1tXi_golJspgE0",
			type: "GET",
			success: function(data){
			
			if(data["status"] != "OK"){
$("#msg").html('<div class="alert alert-warning" role="alert"><strong>Postcode could not be found - please try again.</strong> </div>');
			$("#msg2").empty();
				
			}else{
						$.each(data['results'][0]["address_components"], function(key, value){
						
						if(value["types"][0]== "postal_code"){
						
$("#msg").html('<div class="alert alert-success" role="alert"><strong>Postcode found!</strong> The postcode is '+ value["long_name"] +'</div>');
						
							
						}
						})
						/*---------------*/
						
		
		
				var podaci = data['results'][0]['formatted_address'];
				if (podaci != ""){
						
$("#msg2").html('<div class="alert alert-success" role="alert"><strong>Address found!</strong> The address is '+ podaci +'</div>');
						
							
						}
						}
						}
		
		
		})
	})
 
  
  </script>
  
  </body>
</html>