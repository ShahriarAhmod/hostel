<?php
include('includes/checklogin.php');
check_login();
include('includes/dbconnection.php');
if(isset($_POST['submit']))
{
  $adminid=$_SESSION['odmsaid'];
  $fName=$_POST['firstname'];
  $lName=$_POST['lastname'];
  $mobno=$_POST['mobilenumber'];
  $email=$_POST['email'];
  $sql="update userregistration set firstName=:firstname,lastName=:lastname,contactNo=:mobilenumber,email=:email where id=:aid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':firstname',$fName,PDO::PARAM_STR);
  $query->bindParam(':lastname',$lName,PDO::PARAM_STR);
  $query->bindParam(':email',$email,PDO::PARAM_STR);
  $query->bindParam(':mobilenumber',$mobno,PDO::PARAM_STR);
  $query->bindParam(':aid',$adminid,PDO::PARAM_STR);
  $query->execute();
  if($query->execute()){
     echo '<script>alert("Profile has been updated")</script>';

  }else{
     echo '<script>alert("Update failed")</script>';

  }
 
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
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <?php
                  $adminid=$_SESSION['odmsaid'];
                  $sql="SELECT * from  userregistration where id=:aid";
                  $query = $dbh -> prepare($sql);
                  $query->bindParam(':aid',$adminid,PDO::PARAM_STR);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query->rowCount() > 0)
                  {
                    foreach($results as $row)
                    {  
                      ?>
                      <form method="post">
                        <div class="form-group row">
                          <label class="col-12" for="register1-username">Reg No:</label>
                          <div class="col-12">
                            <input type="text" class="form-control" name="regno" value="<?php  echo $row->regNo;?>" readonly="true">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-12" for="register1-email">First Name:
                          </label>
                          <div class="col-12">
                            <input type="text" class="form-control" name="firstname" value="<?php  echo $row->firstName;?>" required='true' >
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-12" for="register1-email">Last Name:</label>
                          <div class="col-12">
                            <input type="text" class="form-control" name="lastname" value="<?php  echo $row->lastName;?>" required='true' >
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-12" for="register1-password">Email:</label>
                          <div class="col-12">
                            <input type="email" class="form-control" name="email" value="<?php  echo $row->email;?>" required='true' >
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-12" for="register1-password">Contact Number:</label>
                          <div class="col-12">
                            <input type="text" class="form-control" name="mobilenumber" value="0<?php  echo $row->contactNo;?>" required='true' maxlength='10'>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-12" for="register1-password">Registration Date:</label>
                          <div class="col-12">
                            <input type="text" class="form-control" id="date" name="" value="<?php  echo $row->regDate;?>" readonly="true">
                          </div>
                        </div>

                        <?php 
                      }
                    } ?>
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary btn-fw mr-2" style="float: left;">update</button>
                  </form>
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
</body>
</html>