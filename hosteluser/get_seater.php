<?php
include('includes/dbconnection.php');
if(!empty($_POST["roomid"])) 
{
	$eid=$_POST["roomid"];
	$sql2="SELECT * from rooms WHERE room_no = :eid  ";
	$query2 = $dbh -> prepare($sql2);
	$query2-> bindParam(':eid', $eid, PDO::PARAM_STR);
	$query2->execute();
	$results=$query2->fetchAll(PDO::FETCH_OBJ);
	if($query2->rowCount() > 0)
	{
		foreach($results as $row)
		{
			echo htmlentities($row->seater);
		}
	}
}



	if(!empty($_POST["rid"])) 
	{
		$eid=$_POST["rid"];
		$sql2="SELECT * from rooms WHERE room_no = :eid  ";
		$query2 = $dbh -> prepare($sql2);
		$query2-> bindParam(':eid', $eid, PDO::PARAM_STR);
		$query2->execute();
		$results=$query2->fetchAll(PDO::FETCH_OBJ);
		if($query2->rowCount() > 0)
		{
			foreach($results as $row)
			{
				echo htmlentities($row->fees);

			}
		}
	}

	?>