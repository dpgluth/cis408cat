<?php
	if(isset($_POST['submit'])){
		if(isset($_GET['go'])){
			if(preg_match("^/[A-Za-z]+/", $_POST['name'])){
				$searchid=$_POST['name'];
				
				//connect to sql
				$sqlsel=mysql_connect("localhost", "root", "cis408cat") or die ('No database connection. Reason: '.mysql_error());
				//select which specific db
				$database=mysql_select_db("group_project", $sqlsel);
				//selecting table
				$clothing=mysql_query("SELECT * FROM clothing", $sqlsel);
				//finding what we need.
				$sql="SELECT name, price, rating, img, pglink, type, dbidnum WHERE name LIKE '%" . $searchid . "%' OR type LIKE '%" . $searchid . "%' OR price LIKE '%" . $searchid . "%'";
				while($row=mysql_fetch_array($result)){
					$name=$row['name'];
					$price=$row['price'];
					$rating=$row['rating'];
					$img=$row['img'];
					$pglink=$row['pglink'];
					$type=$row['type'];
					$dbidnum=$row['dbidnum'];
					
					echo $row['name'];
					echo print_r($row);
					echo"<ul>\n";
					echo"<li>" . "<a href=\"search.php?id=$dbidnum\">" .$name." ".$price." ".$rating."</a></li>\n";
					echo"</ul>";
				}
			}
			else{
				echo"<p>Please enter a valid option.</p>";
			}	
		}
	}
?>