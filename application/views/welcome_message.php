<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Boat Marker</title>
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/css/leaflet.css" rel="stylesheet" />
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
		text-decoration: none;
	}

	a:hover {
		color: #97310e;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
		min-height: 96px;
	}

	p {
		margin: 0 0 10px;
		padding:0;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	#map {
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
            height: 600px;;

	}
	</style>
	<script src="<?php echo base_url() ?>assets/js/leaflet.js"></script>
	<script src="<?php echo base_url() ?>assets/js/leaflet.rotatedMarker.js"></script>
</head>
<body>

<div id="container">
	<h1>Welcome to Boat Marker!</h1>

	<div id="body">
		<div class="row">
			<div class="col">
				<a href="<?=site_url("boat/index")?>">
					<button	ton class="btn btn-primary">Boat</button>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div id="map"></div>
			</div>
		</div>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
<script src="<?php echo base_url() ?>assets/js/core/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/core/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/core/bootstrap.min.js"></script>
<script>
var arrData;
$.ajax({
	url: "<?= site_url('welcome/getjson') ?>",
	type: "GET",
	dataType:'json',
	success : function(response){
		arrData = response['data'];
		console.log(arrData.length);
		var map = L.map('map').setView([-6.929552,115.575544], 13);
		var redIcon = L.icon({
			iconUrl: '<?php echo base_url() ?>assets/img/red-boat.png',
			// shadowUrl: '<?php echo base_url() ?>assets/img/red-boat.png',
		
			iconSize:     [16, 45], // size of the icon
			shadowSize:   [50, 64], // size of the shadow
			iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
			shadowAnchor: [4, 62],  // the same for the shadow
			popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
		});
		
		L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			maxZoom: 18,
			id: 'mapbox/streets-v11',
			tileSize: 512,
			zoomOffset: -1,
			accessToken: 'pk.eyJ1Ijoib29uZzI2IiwiYSI6ImNsMWtmbHVsdTAwYjQzY2w4OHl4OHQzdmMifQ.NRmBRR1XXhic1W-LxR8yrA'
		}).addTo(map);
		console.log('tes : ' +arrData.length);
		
		for (let i = 0; i < arrData.length; i++) {
			var latitude = arrData[i].latitude;
			var longitude = arrData[i].longitude;
			var rotation = arrData[i].rotation;
			L.marker([latitude, longitude], {icon: redIcon, rotationAngle: rotation,}).addTo(map);
		}
	}
});
</script>
</html>
