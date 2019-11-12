<?php

 require_once("db.php");
 $companies = $conn->getCompaniesList();
 $streets = $conn->getStreetsList();
 $areas = $conn->getAreasList();
?>
<!DOCTYPE html>
<html>
<head>
 <title>Leaflet basic example</title>
 <script src="js/jquery.min.js"></script>
 <link rel="stylesheet" href="css/leaflet.css" />
 <script src="js/leaflet.js"></script>
 
 <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="wrap">
		<div class="header">
			<div class="logo">
				<img src="img/idwifi.png"/>
			</div>
			
			<div class="title">
			Peta Lokasi Layanan @Wifi.id Kota Sigli
		</div>
		
		<div class="home">
		<p> <center>
			<button onclick="window.location.href='index.php'">HOME</button>
			<button onclick="window.location.href='login.php'">LOGIN</button>
		</p>
		</div>
			<div class="badan">			
			<div class="sidebar">
				<p> <center>
				<button onclick="window.location.href='#'">Deteksi Lokasi</button>
				</p>
			</div>
			<div class="content">
				<div id="map" style="width: 727px; height: 450px"></div>
				<div id="searchresult"></div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="footer">
			<center> © Raja Muchlisar </center>
		</div>
	</div>
	
 </div>

 <script>
 
 var map = L.map('map').setView([5.385235, 95.961035], 14);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
			minZoom: 14
			
  }).addTo(map);
  
  $( document ).ready(function() {
	$('#searchBtn').click(function() {
	  $.ajax({
		type: "GET",
		url: "ajax.php?keyword="+$("#search").val()
	  }).done(function( data )
	  {
		var jsonData = JSON.parse(data);
		var jsonLength = jsonData.results.length;
		var html = "<ul>";
		for (var i = 0; i < jsonLength; i++) {
		  var result = jsonData.results[i];
		  html += '<li data-lat="' + result.latitude + '" data-lng="' + result.longitude + '" class="searchResultElement">' + result.name + '</li>';
		}
		html += '</ul>';
		$('#searchresult').html(html);  		
		$( 'li.searchResultElement' ).click( function() {
		  var lat = $(this).attr( "data-lat" );
		  var lng = $(this).attr( "data-lng" );
		  map.panTo( [lat,lng] );
		});
	  });
	});
   addCompanies();   
   addStreets();   
   addAreas();   
  });
  
  function addCompanies() {
   for(var i=0; i<companies.length; i++) {
    var marker = L.marker( [companies[i]['latitude'], companies[i]['longitude']]).addTo(map);
    marker.bindPopup( "<b>" + companies[i]['company']+"</b><br>Details:" + companies[i]['details'] + "<br />Telephone: " + companies[i]['telephone']);
   }
  }
  
  function stringToGeoPoints( geo ) {
   var linesPin = geo.split(",");

   var linesLat = new Array();
   var linesLng = new Array();

   for(i=0; i < linesPin.length; i++) {
    if(i % 2) {
     linesLat.push(linesPin[i]);
    }else{
     linesLng.push(linesPin[i]);
    }
   }

   var latLngLine = new Array();

   for(i=0; i<linesLng.length;i++) {
    latLngLine.push( L.latLng( linesLat[i], linesLng[i]));
   }
   
   return latLngLine;
  }
  
  function addAreas() {
   for(var i=0; i < areas.length; i++) {
	   console.log(areas[i]['geolocations']);
    var polygon = L.polygon( stringToGeoPoints(areas[i]['geolocations']), { color: 'blue'}).addTo(map);
    polygon.bindPopup( "<b>" + areas[i]['name']);   
   }
  }
  
  function addStreets() {
   for(var i=0; i < streets.length; i++) {
    var polyline = L.polyline( stringToGeoPoints(streets[i]['geolocations']), { color: 'red'}).addTo(map);
    polyline.bindPopup( "<b>" + streets[i]['name']);   
   }
  }
  
  var companies = JSON.parse( '<?php echo json_encode($companies) ?>' );
  var streets = JSON.parse( '<?php echo json_encode($streets) ?>' );
  var areas = JSON.parse( '<?php echo json_encode($areas) ?>' );

 </script>
 
</body>
</html>
