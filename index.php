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
    var myLatlng = new google.maps.LatLng(48.3333, 16.35);
    // define map properties
    var myOptions = {
      zoom: 3,
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
              {lat: 33.5363, lng:23.17044, count: 121},
              {lat: 33.5608, lng:17.24, count: 1123},
              {lat: 38, lng:13.7, count: 121},
              {lat: 38.9358, lng:10.1621, count: 111},
              {lat: 48.9358, lng:16.1621, count: 20}
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