<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
{
    $reg= $_POST["regnumber"];
    $sql ="SELECT regNo FROM userregistration WHERE regNo=:reg";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':reg', $reg, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    if($query -> rowCount() > 0)
    {
        echo "<script>alert('something wrong! Registration number already exists');</script>";
    } else{


        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname']; 
        $regno=$_POST['regnumber'];
        $contactno=$_POST['contactno'];
        $email=$_POST['useremail'];
        $gender=$_POST['gender'];
        $confirmpassword=md5($_POST['confirmpassword']); 
        $sql="INSERT INTO  userregistration(regNo,firstName,lastName,gender,contactNo,email,password) VALUES(:regno,:firstname,:lastname,:gender,:contactno,:email,:confirmpassword)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':firstname',$firstname,PDO::PARAM_STR);
        $query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
        $query->bindParam(':email',$email,PDO::PARAM_STR);
        $query->bindParam(':gender',$gender,PDO::PARAM_STR);
        $query->bindParam(':regno',$regno,PDO::PARAM_STR);
        $query->bindParam(':contactno',$contactno,PDO::PARAM_STR);
        $query->bindParam(':confirmpassword',$confirmpassword,PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if($lastInsertId)
        {
            echo "<script>alert('Registration successfull.');</script>";
            echo "<script > document.location ='index.php'; </script>";
        }
        else 
        {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }
    }
}
?>
<script>
    function checkAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data:'useremail='+$("#useremail").val(),
            type: "POST",
            success:function(data){
                $("#user-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error:function (){}
        });
    }
</script>
<script>
    function checkAvailability2() 
    {
        $("#loaderIcon").show();
        jQuery.ajax(
        {
            url: "check_availability.php",
            data:'regnumber='+$("#regnumber").val(),
            type: "POST",
            success:function(data)
            {
                $("#user-availability-status2").html(data);
                $("#loaderIcon").hide();
            },
            error:function (){}
        });
    }
</script>
<script type="text/javascript">
    function valid()
    {
        if(document.signup.password.value!= document.signup.confirmpassword.value)
        {
            alert("Password and Confirm Password Field do not match  !!");
            document.signup.confirmpassword.focus();
            return false;
        }
        return true;
    }
</script>

<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto" >
                        <div class="auth-form-light text-left p-5">
                            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                            <form class="pt-3" method="post" enctype="multipart/form-data" name="signup" onSubmit="return valid();">
                                <div class="form-group mb-3" >
                                    <input type="text" class="form-control form-control-lg" name="regnumber" id="regnumber" onBlur="checkAvailability2()" placeholder="Registration No" required style="height: 2.0rem;">
                                    <span id="user-availability-status2" style="font-size:12px;"></span>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control form-control-lg" name="firstname" id="firstname"placeholder="First Name" required style="height: 2.0rem;">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control form-control-lg" name="lastname" id="lastname" placeholder="Last Name" style="height: 2.0rem;" required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="email" class="form-control form-control-lg" name="useremail" id="useremail" onBlur="checkAvailability()"  style="height: 2.0rem;" placeholder="Email" required>
                                    <span id="user-availability-status" style="font-size:12px;"></span>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control form-control-lg" name="contactno" id="contactno" style="height: 2.0rem;" placeholder="Contact No" required>
                                </div>
                                <div class="form-group mb-3">
                                    <select class="form-control form-control-lg" name="gender" id="gender" required style="height: 2.0rem;">
                                        <option>Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" name="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password" required style="height: 2.0rem;">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" name="confirmpassword" class="form-control form-control-lg" id="confirmpassword" placeholder=" confirm password" style="height: 2.0rem;" required>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input" required> I agree to all Terms & Conditions 
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" name="submit" class="btn btn-sm btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Register</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account? 
                                    <a href="index.php" class="text-primary">
                                        Login
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
</body>
</html>