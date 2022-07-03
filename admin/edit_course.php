<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['insert']))
{
  $eib= $_SESSION['editbid'];
  $code=$_POST['code'];
  $short=$_POST['short'];
  $full=$_POST['full'];
  $sql4="update courses set course_code=:code,course_sn=:short,course_fn=:full where id=:eib";
  $query=$dbh->prepare($sql4);
  $query->bindParam(':code',$code,PDO::PARAM_STR);
  $query->bindParam(':short',$short,PDO::PARAM_STR);
  $query->bindParam(':full',$full,PDO::PARAM_STR);
  $query->bindParam(':eib',$eib,PDO::PARAM_STR);
  $query->execute();
  if ($query->execute())
  {
    echo '<script>alert("updated successfuly")</script>';
  }else{
    echo '<script>alert("update failed! try again later")</script>';
  }
}
?>
<div class="card-body">
  <?php
  $eid=$_POST['edit_id4'];
  $sql="SELECT * from courses  where courses.id=:eid";
  $query = $dbh -> prepare($sql);
  $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0)
  {
    foreach($results as $row)
    {
      $_SESSION['editbid']=$row->id;
      ?>
      <form class="form-sample"  method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="form-group col-md-12">
            <label class="col-sm-12 pl-0 pr-0">Course code</label>
            <div class="col-sm-12 pl-0 pr-0">
              <input type="text" name="code" id="code" class="form-control" value="<?php  echo $row->course_code;?>" required />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-12 ">
            <label class="col-sm-12 pl-0 pr-0">Course Name(short)</label>
            <div class="col-sm-12 pl-0 pr-0">
              <input type="text" name="short" value="<?php  echo $row->course_sn;?>" class="form-control" >
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-12 ">
            <label class="col-sm-12 pl-0 pr-0">Course Name(full)</label>
            <div class="col-sm-12 pl-0 pr-0">
              <input type="text" name="full" value="<?php  echo $row->course_fn;?>" class="form-control" required>
            </div>
          </div>
        </div>
        <button type="submit" name="insert" class="btn btn-primary btn-fw mr-2" style="float: left;">Update</button>
      </form>
      <?php 
    }
  } ?>
</div>