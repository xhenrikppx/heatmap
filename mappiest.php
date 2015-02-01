<?php require_once("vendor/codebird/src/codebird.php"); ?>
<html>
<head>
	<title>mappiest.</title>
	<meta charset="UTF-8" />
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<script type="text/javascript">
    //cb.setConsumerKey('PiQNiP4BqojI4r7DIW1GSw', 'uV3TsGFslJwnSwLXXfjFoG7MaZxkLgcJjNNCRINCAo8');
    //cb.setToken('14798546-a01yrMBVvfUS4tdWu7wHhnh7SDzSPFS2iTJgbu4wN', '8ZbkbiesRIYrlkXOLDxfwZuGiIyGsqu83yMQ1kQDg');
    /*
    $config = array(
      'oauth_access_token' => '14798546-a01yrMBVvfUS4tdWu7wHhnh7SDzSPFS2iTJgbu4wN',
      'oauth_access_token_secret' => '8ZbkbiesRIYrlkXOLDxfwZuGiIyGsqu83yMQ1kQDg',
      'consumer_key' => 'PiQNiP4BqojI4r7DIW1GSw',
      'consumer_secret' => 'uV3TsGFslJwnSwLXXfjFoG7MaZxkLgcJjNNCRINCAo8',
      'use_whitelist' => true, // If you want to only allow some requests to use this script.
      'base_url' => 'http://api.twitter.com/1.1/'
    );
    */
    /*
    $.ajax({
      dataType: "json",
      url: 'https://stream.twitter.com/1.1/statuses/sample.json'
    })
    .done(function(data) {
      console.log("good");
    })
    .fail(function(jqxhr, textStatus, error) {
      console.log("bad");
    });
    */

$(document).ready(function(){

window.onload = function(){

    // standard gmaps initialization
    var myLatlng = new google.maps.LatLng(39.9701, -86.1603);
    // define map properties
    var myOptions = {
      zoom: 4,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      disableDefaultUI: false,
      scrollwheel: true,
      draggable: true,
      navigationControl: true,
      mapTypeControl: false,
      scaleControl: true,
      disableDoubleClickZoom: false
    };
    // we'll use the heatmapArea 
    var map = new google.maps.Map($("#heatmapArea")[0], myOptions);
    // let's create a heatmap-overlay
    // with heatmap config properties
    var heatmap = new HeatmapOverlay(map, {
        "radius":20,
        "visible":true, 
        "opacity":60
    });
     // here is our dataset
    // important: a datapoint now contains lat, lng and count property!
    var testData={
            max: 1,
            data: [
              {lat: 41.1533, lng:-85.1241, count: 1},
{lat: 29.6203, lng:-95.2667, count: 1},
{lat: 39.7216, lng:-86.3233, count: 1},
{lat: 39.9039, lng:-86.0691, count: 1},
{lat: 39.9701, lng:-86.1603, count: 1},
{lat: 39.5779, lng:-86.3731, count: 1},
{lat: 39.8484, lng:-86.1983, count: 1},
{lat: 39.9069, lng:-86.1246, count: 1},
{lat: 39.6749, lng:-86.1316, count: 1},
{lat: 40.0533, lng:-85.9252, count: 1},
{lat: 41.6139, lng:-87.0454, count: 1},
{lat: 38.7167, lng:-90.6411, count: 1},
{lat: 40.8683, lng:-73.8469, count: 1},
{lat: 47.2640, lng:-122.772, count: 1},
{lat: 39.4615, lng:-86.4578, count: 1},
{lat: 39.8484, lng:-86.1983, count: 1},
{lat: 39.0925, lng:-84.9889, count: 1},
{lat: 41.8018, lng:-87.9282, count: 1},
{lat: 42.1607, lng:-70.8177, count: 1},
{lat: 39.5872, lng:-88.5835, count: 1},
{lat: 39.8673, lng:-86.1080, count: 1},
{lat: 39.8982, lng:-86.2335, count: 1},
{lat: 39.8673, lng:-86.1080, count: 1},
{lat: 39.8673, lng:-86.1080, count: 1},
{lat: 39.8673, lng:-86.1080, count: 1},
{lat: 39.8673, lng:-86.1080, count: 1},
{lat: 39.7974, lng:-85.7653, count: 1},
{lat: 39.7623, lng:-86.4093, count: 1},
{lat: 39.8932, lng:-85.9658, count: 1},
{lat: 39.8311, lng:-84.8879, count: 1},
{lat: 39.9069, lng:-86.1246, count: 1},
{lat: 39.6749, lng:-86.1316, count: 1}
            ]
    };

    


    function getHeatData() {
      $.getJSON( "getHeat.php", function( data ) {
        testData.data = data;
      });
      // now we can set the data
      google.maps.event.addListenerOnce(map, "idle", function(){
        // this is important, because if you set the data set too early, the latlng/pixel projection doesn't work
        heatmap.setDataSet(testData);
      });
      console.log('getting data');
      setTimeout(getHeatData, 30000);
    }
    getHeatData();
    //console.log(testData);
    
 
};
});

  </script>

  <style>
    html { height: 100% }
    body { height: 100%; margin: 0px; padding: 0px }
    #heatmapArea { height: 100% }
  </style>
</head>




<body>
			
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <div id="heatmapArea" />

  <script type="text/javascript" src="vendor/heatmap/heatmap.js"></script>
  <script type="text/javascript" src="vendor/heatmap/heatmap-gmaps.js"></script>

</body>

</html>