<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Search</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>

</body>


<?php
$servername="localhost";
$dbname="group_project";
$username="root";
$password="cis408cat";

//Open connection

$connect = mysqli_connect($servername, $username, $password, $dbname);
if(!$connect)
	die("Connection Failed: " . mysqli_connect_error());


$searchby = $_POST["search"];
$selector = "`name`, `price`, `rating`, `img`, `pglink`, `type`, `dbidnum`"; //$_POST["queryselector"];
echo "this is search by" . $searchby;
//$sql = "SELECT * FROM cds" ;
$sql = "SELECT * FROM cds WHERE ".$selector." LIKE '%" . $searchby. "%'";
$result = mysqli_query($connect, $sql);

$emparray = array();
 if(mysqli_num_rows($result) > 0){
	while ($row = mysqli_fetch_assoc($result)){
		$emparray[] = $row;

	}
}

	

$jsonresults = json_encode($emparray);
$fp = fopen('results.json', 'w');
fwrite($fp, $jsonresults);
fclose($fp);

mysqli_close($connect);

?>

<div class="container text-center">
<h2>Results</h2>
</div>

<div id="results" class="container">
</div>


</html>
