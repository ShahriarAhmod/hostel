<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['insert']))
{
    $eib= $_SESSION['editbid'];
    $seater=$_POST['seater'];
    $fee=$_POST['fee'];
    $sql4="update rooms set seater=:seater,fees=:fee where id=:eib";
    $query=$dbh->prepare($sql4);
    $query->bindParam(':seater',$seater,PDO::PARAM_STR);
    $query->bindParam(':fee',$fee,PDO::PARAM_STR);
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
    $sql2="SELECT * from rooms  where rooms.id=:eid";
    $query2 = $dbh -> prepare($sql2);
    $query2-> bindParam(':eid', $eid, PDO::PARAM_STR);
    $query2->execute();
    $results=$query2->fetchAll(PDO::FETCH_OBJ);
    if($query2->rowCount() > 0)
    {
        foreach($results as $row)
        {
            $_SESSION['editbid']=$row->id;
            ?>
            <form class="form-sample"  method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-sm-12 pl-0 pr-0">Seater</label>
                        <div class="col-sm-12 pl-0 pr-0">
                            <input type="text" name="seater" id="seater" class="form-control" value="<?php  echo $row->seater;?>" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 ">
                        <label class="col-sm-12 pl-0 pr-0">Room No.</label>
                        <div class="col-sm-12 pl-0 pr-0">
                            <input type="text" name="number" value="<?php  echo $row->room_no;?>" class="form-control" disabled>
                            <span class="help-block m-b-none">Room no can't be changed.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 ">
                        <label class="col-sm-12 pl-0 pr-0">Fee(Per Student)</label>
                        <div class="col-sm-12 pl-0 pr-0">
                            <input type="text" name="fee" value="<?php  echo $row->fees;?>" class="form-control" required>
                        </div>
                    </div>
                </div>
                <button type="submit" name="insert" class="btn btn-primary btn-fw mr-2" style="float: left;">Update</button>
            </form>
            <?php 
        }
    } ?>
</div>