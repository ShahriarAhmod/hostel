<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<div class="card-body">
  <h3><?php  echo $_POST['edit_id'];?></h3>
  <?php
  $eid=$_POST['edit_id5'];
  $sql="SELECT * from courses  where courses.id=:eid";
  $query = $dbh -> prepare($sql);
  $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0)
  {
    foreach($results as $row)
      {?>

        <h4 style="color: blue">Course Information</h4>
        <table border="1" class="table table-bordered">
          <tr>
            <th>Course Code</th>
            <td><?php  echo $row->course_code;?></td>
          </tr>
          <tr>
            <th>Course Name(short)</th>
            <td><?php  echo $row->course_sn;?></td>
          </tr>
          <tr>
            <th>Course Name(full)</th>
            <td><?php  echo $row->course_fn;?></td>
          </tr>
        </table> 
        <?php 
      }
    } ?>
  </div>