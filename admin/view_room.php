<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<div class="card-body">
  <h3><?php  echo $_POST['edit_id'];?></h3>
  <?php
  $eid=$_POST['edit_id5'];
  $sql="SELECT * from rooms  where rooms.id=:eid";
  $query = $dbh -> prepare($sql);
  $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0)
  {
    foreach($results as $row)
      {?>

        <h4 style="color: blue">Room Information</h4>
        <table border="1" class="table table-bordered">
          <tr>
            <th>Seater</th>
            <td><?php  echo $row->seater;?></td>
          </tr>
          <tr>
            <th>Room No</th>
            <td><?php  echo $row->room_no;?></td>
          </tr>
          <tr>
            <th>Fee(Per Student)</th>
            <td><?php  echo $row->fees;?></td>
          </tr>
        </table> 
        <?php 
      }
    } ?>
  </div>