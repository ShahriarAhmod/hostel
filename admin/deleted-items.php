<?php

if(isset($_POST['insert']))
{
  $itemname  = $_POST['itemname'];
  $descrip = $_POST['descrip'];
  $sql="insert into tblitems(item,description)values(:itemname,:descrip)";
  $query=$dbh->prepare($sql);
  $query->bindParam(':descrip',$descrip,PDO::PARAM_STR);
  $query->bindParam(':itemname',$itemname,PDO::PARAM_STR);
  $query->execute();
  $LastInsertId=$dbh->lastInsertId();
  if ($LastInsertId>0) {
    echo '<script>alert("successfully registered.")</script>';
    echo "<script>window.location.href ='store.php'</script>";
  }
  else
  {
    echo '<script>alert("Something Went Wrong. Please try again")</script>';
  }
}
?>
<form role="form" id=""  method="post" enctype="multipart/form-data" class="form-horizontal">
  <div class="card-body">
    <div class="form-group ">
      <label for="exampleInputPassword1">Item Name</label>
      <input type="text" name="itemname" class="form-control" id="exampleInputPassword1" placeholder="item" required>
    </div>
    <div class="form-group ">
      <label for="exampleInputPassword1">Description</label>
       <textarea class="form-control" name="descrip" rows="3" required></textarea>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="modal-footer text-right">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    <button type="submit" name="insert" class="btn btn-primary">Submit</button>
  </div>
</form>
