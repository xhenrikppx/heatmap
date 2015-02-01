<!DOCTYPE html>
<html>
<head>
	<script src="http://www.heatmapapi.com/javascript/HeatmapAPI2.aspx?k=af5a2c2b-fa95-4e32-815c-05b5a359b618" type="text/javascript"></script>
	<script src="http://maps.google.com/maps?file=api&v=3&key=AIzaSyCSST31Px092N9fJFN1iaRZJFzqTJqoXnQ" type="text/javascript"></script>
	<script src="http://www.heatmapapi.com/javascript/HeatmapAPIGoogle2.js" type="text/javascript"></script>
	
	<script type="text/javascript">
	function initialize() {
	      if (GBrowserIsCompatible()) {
	        var map = new GMap2(document.getElementById("map_canvas"));
	        map.setCenter(new GLatLng(37.4419, -122.1419), 7);
	        map.setUIToDefault();
	initHeatmap();
	      }
	    }
	</script>	
</head>
<body onload="initialize()" onunload="GUnload()">
	
  	<div id="map_canvas" style="width: 500px; height: 300px"></div>

	<script type="text/javascript">

	setTimeout('loadGoogle()', 1);

	function initHeatmap()
	{
	 // Heatmap Scripts
	 try
	 {
	  var myHM = new GEOHeatmap();
	  myHM.Init(400, 300); // Must be same as map size, or same ratio

	  var data = new Array();

	  // Generate random lat/lon and value points

	  for(p=0;p<50;p++)
	  {
	   var rLatD=Math.floor(Math.random()*1000);
	   var rLonD=Math.floor(Math.random()*1000);
	   var rValD=Math.floor(Math.random()*10);
	   data.push(38.47+(rLatD/15000));
	   data.push(-121.84+(rLonD/15000));
	   data.push(rValD);
	  }

	  myHM.SetData(data);
	  myHM.SetBoost(1); // Optional, see documentation
	  myHM.SetDecay(0); // Optional, see documentation
	  var preUrl = myHM.GetURL();

	  // Now render in our Google Map
	  var heatmapOverlay = new HMGoogleOverlay(preUrl);
	  m.addOverlay(heatmapOverlay);
	 }
	 catch(e)
	 {
	  alert(e.Message);
	 }
	}
	</script>


</body>
</html>