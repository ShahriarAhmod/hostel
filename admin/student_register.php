<?php
include('includes/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
  $regname=$reg;
  $lastname=$reg2;
  $name=$_POST['name'];
  $code=$_POST['code'];
  $sex=$_POST['sex'];
  $age=$_POST['age'];
  $occupation=$_POST['occupation'];
  $status=$_POST['status'];
  $phone=$_POST['phone'];
  $birthdate=$_POST['birthdate'];
  $country=$_POST['country'];
  $district=$_POST['district'];
  $parish=$_POST['parish'];
  $village=$_POST['village'];
  $email=$_POST['email'];
  $marital=$_POST['marital'];
  $image=$_FILES["productimage1"]["name"];
  move_uploaded_file($_FILES["productimage1"]["tmp_name"],"christianimages/".$_FILES["productimage1"]["name"]);
  $sql="insert into tblbid(Name,Code,Sex,Age,Occupation,Status,Birthdate,Country,District,Parish,Village,Email,Phone,Registeredby,lastname,Photo,Marital)values(:name,:code,:sex,:age,:occupation,:status,:birthdate,:country,:district,:parish,:village,:email,:phone,:regname,:lastname,:image,:marital)";
  $query=$dbh->prepare($sql);
  $query->bindParam(':name',$name,PDO::PARAM_STR);
  $query->bindParam(':code',$code,PDO::PARAM_STR);
  $query->bindParam(':sex',$sex,PDO::PARAM_STR);
  $query->bindParam(':age',$age,PDO::PARAM_STR);
  $query->bindParam(':occupation',$occupation,PDO::PARAM_STR);
  $query->bindParam(':status',$status,PDO::PARAM_STR);
  $query->bindParam(':birthdate',$birthdate,PDO::PARAM_STR);
  $query->bindParam(':phone',$phone,PDO::PARAM_STR);
  $query->bindParam(':country',$country,PDO::PARAM_STR);
  $query->bindParam(':district',$district,PDO::PARAM_STR);
  $query->bindParam(':parish',$parish,PDO::PARAM_STR);
  $query->bindParam(':village',$village,PDO::PARAM_STR);
  $query->bindParam(':email',$email,PDO::PARAM_STR);
  $query->bindParam(':marital',$marital,PDO::PARAM_STR);
  $query->bindParam(':regname',$regname,PDO::PARAM_STR);
  $query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
  $query->bindParam(':image',$image,PDO::PARAM_STR);
  $query->execute();
  $LastInsertId=$dbh->lastInsertId();
  if ($LastInsertId>0) 
  {
    echo '<script>alert("Registered successfully")</script>';
    echo "<script>window.location.href ='newchristian.php'</script>";
  }
  else
  {
    echo '<script>alert("Something Went Wrong. Please try again")</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Hostel Booking Management System</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Custom styles for our template -->
  <link rel="stylesheet" type="text/css" href="assets2/css/isotope.css" media="screen" />
  <link rel="stylesheet" href="assets2/js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="assets2/css/style.css">
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/churchlogo.ico" />
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link href="vendor2/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <style >
    th { 
      white-space: normal !important;
      word-wrap: break-word;
      hyphens: auto;
    } 

    td { 

      white-space: normal !important;
      word-wrap: break-word;
      hyphens: auto;
      line-height: 20px !important;

    } 
  </style>
  
  <style>
    .se-pre-con {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url(images/loader-64x/Preloader_2.gif) center no-repeat #fff;
    }
  </style>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
  <script>
    $(window).load(function() {
      $(".se-pre-con").fadeOut("slow");
    });
  </script>
  <script>
    function getSeater(val) {
      $.ajax({
        type: "POST",
        url: "get_seater.php",
        data:'roomid='+val,
        success: function(data){
          //alert(data);
          $('#seater').val(data);
        }
      });

      $.ajax({
        type: "POST",
        url: "get_seater.php",
        data:'rid='+val,
        success: function(data){
          //alert(data);
          $('#fpm').val(data);
        }
      });
    }
  </script>
</head>
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
                <div class="modal-header">
                  <h5 class="modal-title" style="float: left;">Student  registration </h5>
                </div>

                <div class="card-body">
                 <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="panel panel-primary">
                          <div class="panel-body">
                            <form method="post" action="" class="form-horizontal">
                              <div class="form-group">
                                <label class="col-sm-4 control-label"><h4 style="color: green" align="left">Room Related info </h4> </label>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-4">
                                  <label class=" control-label">Room no. </label>
                                  <div class="">
                                    <select name="room" id="room"class="form-control"  onChange="getSeater(this.value);" onBlur="checkAvailability()" required> 
                                      <option value="">Select Room</option>
                                      <?php 
                                      $sql2="SELECT * from rooms  ";
                                      $query2 = $dbh -> prepare($sql2);
                                      $query2-> bindParam(':eid', $eid, PDO::PARAM_STR);
                                      $query2->execute();
                                      $results=$query2->fetchAll(PDO::FETCH_OBJ);
                                      if($query2->rowCount() > 0)
                                      {
                                        foreach($results as $row)
                                        {
                                          ?>
                                          <option value="<?php echo $row->room_no;?>"> <?php echo $row->room_no;?></option>
                                          <?php 
                                        }
                                      } ?>
                                    </select> 
                                    <span id="room-availability-status" style="font-size:12px;"></span>

                                  </div>
                                </div>

                                <div class="form-group col-md-4">
                                  <label class=" control-label">Seater</label>
                                  <div class="">
                                    <input type="text" name="seater" id="seater"  class="form-control" readonly="true"  >
                                  </div>
                                </div>

                                <div class="form-group col-md-4">
                                  <label class="control-label">Fees Per Month</label>
                                  <div class="">
                                    <input type="text" name="fpm" id="fpm"  class="form-control" readonly="true">
                                  </div>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="col-sm-2 control-label">Food Status</label>
                                <div class="col-sm-12">
                                  <input type="radio" value="0" name="foodstatus" checked="checked"> Without Food
                                  <input type="radio" value="1" name="foodstatus"> With Food(USD 500.00 Per Month )
                                </div>
                              </div>  
                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label class=" control-label">Stay From</label>
                                  <div class="">
                                    <input type="date" name="stayf" id="stayf"  class="form-control" >
                                  </div>
                                </div>

                                <div class="form-group col-md-6">
                                  <label class=" control-label">Duration</label>
                                  <div class="">
                                    <select name="duration" id="duration" class="form-control">
                                      <option value="">Select Duration in Month</option>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                      <option value="8">8</option>
                                      <option value="9">9</option>
                                      <option value="10">10</option>
                                      <option value="11">11</option>
                                      <option value="12">12</option>
                                    </select>
                                  </div>
                                </div>
                              </div>


                              <div class="form-group">
                                <label class="col-sm-2 control-label"><h4 style="color: green" align="left">Personal info </h4> </label>
                              </div>

                              <div class="row">
                                <div class="form-group col-md-4">
                                  <label class=" control-label">course </label>
                                  <div class="">
                                    <select name="course" id="course" class="form-control" required> 
                                      <option value="">Select Course</option>
                                      <?php 
                                      $sql2="SELECT * from courses  ";
                                      $query2 = $dbh -> prepare($sql2);
                                      $query2-> bindParam(':eid', $eid, PDO::PARAM_STR);
                                      $query2->execute();
                                      $results=$query2->fetchAll(PDO::FETCH_OBJ);
                                      if($query2->rowCount() > 0)
                                      {
                                        foreach($results as $row)
                                        {
                                          ?>
                                          <option value="<?php echo $row->course_fn;?>"><?php echo $row->course_fn;?>&nbsp;&nbsp;(<?php echo $row->course_sn;?>)</option>
                                          <?php 
                                        }
                                      } ?>
                                    </select> </div>
                                  </div>

                                  <div class="form-group col-md-4">
                                    <label class=" control-label">Registration No : </label>
                                    <div class="">
                                      <input type="text" name="regno" id="regno"  class="form-control" required="required"  onBlur="checkRegnoAvailability()">
                                      <span id="user-reg-availability" style="font-size:12px;"></span>
                                    </div>
                                  </div>


                                  <div class="form-group col-md-4">
                                    <label class=" control-label">First Name : </label>
                                    <div class="">
                                      <input type="text" name="fname" id="fname"  class="form-control" required="required" >
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-4">
                                    <label class=" control-label">Middle Name : </label>
                                    <div class="">
                                      <input type="text" name="mname" id="mname"  class="form-control">
                                    </div>
                                  </div>

                                  <div class="form-group col-md-4">
                                    <label class=" control-label">Last Name : </label>
                                    <div class="">
                                      <input type="text" name="lname" id="lname"  class="form-control" required="required">
                                    </div>
                                  </div>

                                  <div class="form-group col-md-4">
                                    <label class=" control-label">Gender : </label>
                                    <div class="">
                                      <select name="gender" class="form-control" required="required">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="others">Others</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-4">
                                    <label class=" control-label">Contact No : </label>
                                    <div class="">
                                      <input type="text" name="contact" id="contact"  class="form-control" required="required" >
                                    </div>
                                  </div>


                                  <div class="form-group col-md-4">
                                    <label class=" control-label">Email id : </label>
                                    <div class="">
                                      <input type="email" name="email" id="email"  class="form-control" onBlur="checkAvailability()" required="required">
                                      <span id="user-availability-status" style="font-size:12px;"></span>
                                    </div>
                                  </div>

                                  <div class="form-group col-md-4">
                                    <label class=" control-label">Emergency Contact: </label>
                                    <div class="">
                                      <input type="text" name="econtact" id="econtact"  class="form-control" required="required">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-4">
                                    <label class=" control-label">Guardian  Name : </label>
                                    <div class="">
                                      <input type="text" name="gname" id="gname"  class="form-control" required="required">
                                    </div>
                                  </div>

                                  <div class="form-group col-md-4">
                                    <label class=" control-label">Guardian  Relation : </label>
                                    <div class="">
                                      <input type="text" name="grelation" id="grelation"  class="form-control" required="required">
                                    </div>
                                  </div>

                                  <div class="form-group col-md-4">
                                    <label class=" control-label">Guardian Contact no : </label>
                                    <div class="">
                                      <input type="text" name="gcontact" id="gcontact"  class="form-control" required="required">
                                    </div>
                                  </div>
                                </div>  

                                <div class="form-group">
                                  <label class=" control-label"><h4 style="color: green" align="left">Correspondense Address </h4> </label>
                                </div>


                                <div class="form-group">
                                  <label class="col-sm-2 control-label">Address : </label>
                                  <div class="col-sm-12">
                                    <textarea  rows="5" name="address"  id="address" class="form-control" required="required"></textarea>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-4">
                                    <label class=" control-label">City : </label>
                                    <div class="">
                                      <input type="text" name="city" id="city"  class="form-control" required="required">
                                    </div>
                                  </div>  

                                  <div class="form-group col-md-4">
                                    <label class=" control-label">State </label>
                                    <div class="">
                                      <select name="state" id="state"class="form-control" required> 
                                        <option value="">Select State</option>
                                        <?php 
                                        $sql2="SELECT * from states";
                                        $query2 = $dbh -> prepare($sql2);
                                        $query2-> bindParam(':eid', $eid, PDO::PARAM_STR);
                                        $query2->execute();
                                        $results=$query2->fetchAll(PDO::FETCH_OBJ);
                                        if($query2->rowCount() > 0)
                                        {
                                          foreach($results as $row)
                                          {
                                            ?>
                                            <option value="<?php echo $row->State;?>"><?php echo $row->State;?></option>
                                            <?php 
                                          } 
                                        }?>
                                      </select> </div>
                                    </div>              

                                    <div class="form-group col-md-4">
                                      <label class=" control-label">Pincode : </label>
                                      <div class="">
                                        <input type="text" name="pincode" id="pincode"  class="form-control" required="required">
                                      </div>
                                    </div>  
                                  </div>

                                  <div class="form-group">
                                    <label class=" control-label"><h4 style="color: green" align="left">Permanent Address </h4> </label>
                                  </div>


                                  <div class="form-group">
                                    <label class=" control-label">Permanent Address same as Correspondense address : </label>
                                    <div class="col-sm-4">
                                      <input type="checkbox" name="adcheck" value="1"/>
                                    </div>
                                  </div>


                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Address : </label>
                                    <div class="col-sm-12">
                                      <textarea  rows="5" name="paddress"  id="paddress" class="form-control" required="required"></textarea>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="form-group col-md-4">
                                      <label class=" control-label">City : </label>
                                      <div class="">
                                        <input type="text" name="pcity" id="pcity"  class="form-control" required="required">
                                      </div>
                                    </div>  

                                    <div class="form-group col-md-4">
                                      <label class=" control-label">State </label>
                                      <div class="">
                                        <select name="pstate" id="pstate"class="form-control" required> 
                                          <option value="">Select State</option>
                                          <?php 
                                          $sql2="SELECT * from  states";
                                          $query2 = $dbh -> prepare($sql2);
                                          $query2-> bindParam(':eid', $eid, PDO::PARAM_STR);
                                          $query2->execute();
                                          $results=$query2->fetchAll(PDO::FETCH_OBJ);
                                          if($query2->rowCount() > 0)
                                          {
                                            foreach($results as $row)
                                            {
                                              ?>
                                              <option value="<?php echo $row->State;?>"><?php echo $row->State;?></option>
                                              <?php 
                                            }
                                          } ?>
                                        </select> </div>
                                      </div>              

                                      <div class="form-group col-md-4">
                                        <label class=" control-label">Pincode : </label>
                                        <div class="">
                                          <input type="text" name="ppincode" id="ppincode"  class="form-control" required="required">
                                        </div>
                                      </div>  
                                    </div>


                                    <div class="col-sm-6 col-sm-offset-4">
                                      <button class="btn btn-danger" type="reset">Reset</button>
                                      <input type="submit" name="submit" Value="Register" class="btn btn-primary">
                                    </div>
                                  </form>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
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
  <?php @include("includes/foot.php");?>
  <script type="text/javascript">
    $(document).ready(function(){
      $('input[type="checkbox"]').click(function(){
        if($(this).prop("checked") == true){
          $('#paddress').val( $('#address').val() );
          $('#pcity').val( $('#city').val() );
          $('#pstate').val( $('#state').val() );
          $('#ppincode').val( $('#pincode').val() );
        } 
      });
    });
  </script>
  <script>
    function checkAvailability() {
      $("#loaderIcon").show();
      jQuery.ajax({
        url: "check_availability.php",
        data:'roomno='+$("#room").val(),
        type: "POST",
        success:function(data){
          $("#room-availability-status").html(data);
          $("#loaderIcon").hide();
        },
        error:function (){}
      });
    }
  </script>
  <script>
    function checkAvailability() {

      $("#loaderIcon").show();
      jQuery.ajax({
        url: "check_availability.php",
        data:'emailid='+$("#email").val(),
        type: "POST",
        success:function(data){
          $("#user-availability-status").html(data);
          $("#loaderIcon").hide();
        },
        error:function ()
        {
          event.preventDefault();
          alert('error');
        }
      });
    }
  </script>
  <script>
    function checkRegnoAvailability() {

      $("#loaderIcon").show();
      jQuery.ajax({
        url: "check_availability.php",
        data:'regno='+$("#regno").val(),
        type: "POST",
        success:function(data){
          $("#user-reg-availability").html(data);
          $("#loaderIcon").hide();
        },
        error:function ()
        {
          event.preventDefault();
          alert('error');
        }
      });
    }
  </script>
</body>
</html>