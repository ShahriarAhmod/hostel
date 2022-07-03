
<?php 
include('includes/dbconnection.php');
if(!empty($_POST["roomno"])) 
{
  $roomno=$_POST["roomno"];
  $sql ="SELECT count(*) FROM registration WHERE roomno='$roomno'";
  $query3 = $dbh -> prepare($sql);
  $query3-> bindParam(':roomno',$roomno, PDO::PARAM_STR);
  $query3->execute();
  $query3 -> fetchAll(PDO::FETCH_OBJ);
  if($query3 -> rowCount() > 0)
    echo "<span style='color:red'>$count. Seats already full.</span>";
  else
    echo "<span style='color:red'>All Seats are Available</span>";
}

if(!empty($_POST["oldpassword"])) 
{
  $password=$_POST["oldpassword"];
  $sql ="SELECT password FROM userregistration WHERE password=:pass";
  $query4= $dbh -> prepare($sql);
  $query4-> bindParam(':password', $password, PDO::PARAM_STR);
  $query4-> execute();
  $results = $query4 -> fetchAll(PDO::FETCH_OBJ);
  $opass=$results;
  if($opass==$password) 
    echo "<span style='color:green'> Password  matched .</span>";
  else echo "<span style='color:red'> Password Not matched</span>";
}

//For Email
if(!empty($_POST["emailid"])) {
  $email= $_POST["emailid"];
  if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

    //echo "error : You did not enter a valid email.";
    echo "<span style='color:brown'> error : You did not enter a valid email.</span>";
  }
  else {
    $sql ="SELECT count(*) FROM userRegistration WHERE email=:email";
    $query2 = $dbh -> prepare($sql);
    $query2-> bindParam(':email',$email, PDO::PARAM_STR);
    $query2->execute();
    $query2 -> fetchAll(PDO::FETCH_OBJ);
    if($query2 -> rowCount() > 0)
    {
      echo "<span style='color:red'> Email already exist. Please try again.</span>";
    }
  }
}
// For Registration Number
if(!empty($_POST["regno"])) {
  $regno= $_POST["regno"];

   $sql ="SELECT regNo FROM userregistration WHERE regNo=:regno";
  $query = $dbh -> prepare($sql);
  $query-> bindParam(':regno',$regno, PDO::PARAM_STR);
  $query->execute();
  $query -> fetchAll(PDO::FETCH_OBJ);
  if($query -> rowCount() > 0)
  {
    echo "<span style='color:green'> registration number available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }else{
    echo "<span style='color:red'> Registration number is not valid</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  }

}

if(!empty($_POST["regnumber"])) {
  $regno= $_POST["regnumber"];
  
  $sql ="SELECT regNo FROM userregistration WHERE regNo=:regno";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':regno', $regno, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  if($query -> rowCount() > 0)
  {
    echo "<span style='color:red'> Registration No. already exists .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  } else{
    
    echo "<span style='color:green'> registration No available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}

if(!empty($_POST["useremail"])) {
  $useremail= $_POST["useremail"];
  $sql ="SELECT email FROM userregistration WHERE email=:useremail";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  if($query -> rowCount() > 0)
  {
    echo "<span style='color:red'> email already exists .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  } else{
    
    echo "<span style='color:green'> email available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}
?>