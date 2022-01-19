<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pothole";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `id`, `uid`, `photo`, `latitude`, `longitude`, `status`, `timestamp`, `addr` FROM `complain`";

//setting timezone
date_default_timezone_set("Asia/Calcutta");

$week = 0;
$month = 0;
$year = 0;

$weekPending = 0;
$monthPending = 0;
$yearPending = 0;

$weekReject = 0;
$monthReject = 0;
$yearReject = 0;

$weekDone = 0;
$monthDone = 0;
$yearDone = 0;

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$tt = $row['timestamp'];
		$stat = $row['status'];

		$datetime = explode(" ",$tt);

		$d1=strtotime($datetime[0]);
		$d2=-ceil(($d1-time())/60/60/24);	

		if($d2<=7){
			$week++;
			$year++;
			$month++;

			if($stat === "done"){				
				$weekDone++;
				$monthDone++;
				$yearDone++;
			}elseif($stat === "rejected"){				
				$weekReject++;
				$monthReject++;
				$yearReject++;
			}elseif($stat === "pending"){				
				$weekPending++;
				$monthPending++;
				$yearPending++;
			}
		}

		elseif($d2<=30){
			$year++;
			$month++;

			if($stat === "done"){				
				$monthDone++;
				$yearDone++;
			}elseif($stat === "rejected"){				
				$monthReject++;				
				$yearReject++;
			}elseif($stat === "pending"){				
				$monthPending++;				
				$yearPending++;
			}
		}

		elseif($d2<=365){		
			$year++;

			if($stat === "done"){				
				$yearDone++;
			}elseif($stat === "rejected"){				
				$yearReject++;
			}elseif($stat === "pending"){				
				$yearPending++;
			}
		}
	}
	$cmp = array(
		'1' => $week,
		'2' => $month,
		'3' => $year,
	);

	$re = array(
		'1' => $weekDone,
		'2' => $monthDone,
		'3' => $yearDone,
	);

	$pen = array(
		'1' => $weekPending,
		'2' => $monthPending,
		'3' => $yearPending,
	);

	$rej = array(
		'1' => $weekReject,
		'2' => $monthReject,
		'3' => $yearReject,
	);

	$str[] = array(
		'complain' => $cmp,
		'resolved' => $re,
		'pending' => $pen,
		'reject' => $rej
	);
	echo json_encode($str);
}else{
	echo "string";
}

//$d=strtotime("10:30pm April 15 2014");

//echo "Created date is " . date("Y-m-d h:i");

// $datetime = explode(" ","2019-03-03 17:32:15");
//echo "$datetime[0]";

// $d1=strtotime($datetime[0]);
// $d2=ceil(($d1-time())/60/60/24);

// $d2 = -($d2);
//echo "There are " . $d2 ." days until $datetime[0].\n";

//echo "<br><br>week : $week <br>month : $month <br>year : $year <br>";


?>