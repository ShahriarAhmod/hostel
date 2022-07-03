<?php
include('includes/checklogin.php');
check_login();
if(isset($_GET['delid']))
{
  $rid=intval($_GET['del']);
  $sql="delete from registration where regNo='$rid'";
  $query=$dbh->prepare($sql);
  $query->bindParam(':rid',$rid,PDO::PARAM_STR);
  $query->execute();
  echo "<script>alert('User deleted');</script>"; 
  echo "<script>window.location.href = 'manage_students.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php @include("includes/header.php");?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <?php @include("includes/sidebar.php");?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="modal-header">
                  <h5 class="modal-title" style="float: left;">Manage Students</h5>
                </div>
                <!--  start  modal -->
                <div id="editData" class="modal fade">
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Manage Students</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" id="info_update">
                       <?php @include("change_permissions.php");?>
                     </div>
                     <div class="modal-footer ">
                     </div>
                     <!-- /.modal-content -->
                   </div>
                   <!-- /.modal-dialog -->
                 </div>
                 <!-- /.modal -->
               </div>
               <!--   end modal -->

               <div class="card-body table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                  <thead>
                    <tr>
                      <th>Sno.</th>
                      <th>Student Name</th>
                      <th>Reg no</th>
                      <th>Contact no </th>
                      <th>room no  </th>
                      <th>Seater </th>
                      <th>Staying From </th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql="SELECT *  from registration ";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                      foreach($results as $row)
                      {    
                        ?>
                        <tr>
                          <td><?php echo $cnt;;?></td>
                          <td><?php echo $row->firstName;?>&nbsp;<?php echo $row->middleName;?><?php echo $row->lastName;?></td>
                          <td><?php echo $row->regno;?></td>
                          <td>0<?php echo $row->contactno;?></td>
                          <td><?php echo $row->roomno;?></td>
                          <td><?php echo $row->seater;?></td>
                          <td><?php echo $row->stayfrom;?></td>
                          <td>
                            <a href="student_details.php?regno=<?php echo $row->regno;?>" title="View Full Details"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp;
                            <a href="manage_students.php?del=<?php echo $row->regno;?>" title="Delete Record" onclick="return confirm('Do you want to delete');"><i class="mdi mdi-delete"></i></a>
                          </td>
                        </tr>
                        <?php $cnt=$cnt+1;
                      }
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:../../partials/_footer.html -->
      <?php @include("includes/footer.php");?>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<?php @include("includes/foot.php");?>
<!-- End custom js for this page -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.edit_data',function()
    {
      var edit_id=$(this).attr('id');
      $.ajax(
      {
        url:"change_permissions.php",
        type:"post",
        data:{edit_id:edit_id},
        success:function(data)
        {
          $("#info_update").html(data);
          $("#editData").modal('show');
        }
      });
    });
  });
</script>
</body>
</html>
