<?php
header('Content-Type: application/json');
//Desired format:
/* 
              {lat: 33.5363, lng:23.17044, count: 121},
              {lat: 33.5608, lng:17.24, count: 1123},
              {lat: 38, lng:13.7, count: 121},
              {lat: 38.9358, lng:10.1621, count: 111},
              {lat: 48.9358, lng:16.1621, count: 20}
*/
$data = array();
$con=mysqli_connect("127.0.0.1","root","","mappiest");
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM tweets WHERE sentiment is not null LIMIT 0, 500");
while($row = mysqli_fetch_array($result)) {
  //echo $row['FirstName'] . " " . $row['LastName'];
  //echo "<br>";
  $heat = array(
    'lat' => $row['lat'],
    'lng' => $row['long'],
    'count' => $row['sentiment']
  );
  array_push($data, $heat);
}

mysqli_close($con);

echo json_encode($data);