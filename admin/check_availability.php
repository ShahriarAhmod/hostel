
<?php 
include('includes/dbconnection.php');
if(!empty($_POST["roomno"])) 
{
  $roomno=$_POST["roomno"];
  $result ="SELECT count(*) FROM registration WHERE roomno='$roomno'";
  $stmt = $dbh->prepare($result);
  $stmt->bind_param(':roomno',$roomno);
  $stmt->execute();
  $stmt->bind_result($count);
  $stmt->fetch();
  $stmt->close();
  if($count>0)
    echo "<span style='color:red'>$count. Seats already full.</span>";
  else
    echo "<span style='color:red'>All Seats are Available</span>";
}

if(!empty($_POST["oldpassword"])) 
{
  $pass=$_POST["oldpassword"];
  $sql ="SELECT password FROM userRegistration WHERE password=:pass";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':pass', $pass, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  if($query -> rowCount() > 0)
  {
    echo "<span style='color:red'>Password  matched .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  } else{

    echo "<span style='color:green'> Password Not matched .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}

//For Email
if(!empty($_POST["emailid"])) {
  $email= $_POST["emailid"];
  if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

    //echo "error : You did not enter a valid email.";
    echo "<span style='color:brown'> error : You did not enter a valid email.</span>";
  }
  else {
    $sql ="SELECT email FROM userRegistration WHERE email=:email";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    if($query -> rowCount() > 0)
    {
      echo "<span style='color:red'> Email already exists .</span>";
      echo "<script>$('#submit').prop('disabled',true);</script>";
    } else{

      echo "<span style='color:green'> Email available for Registration .</span>";
      echo "<script>$('#submit').prop('disabled',false);</script>";
    }
  }
}
//For Username
if(!empty($_POST["fullname"])) {
  $fullname= $_POST["fullname"];
  $sql ="SELECT UserName FROM tbladmin WHERE UserName=:fullname";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':fullname', $fullname, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  if($query -> rowCount() > 0)
  {
    echo "<span style='color:red'> Username already exists .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  } else{

    echo "<span style='color:green'> Username available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}
// For Registration Number
if(!empty($_POST["regno"])) {
  $regno= $_POST["regno"];
  $sql ="SELECT  regNo FROM userRegistration WHERE regNo=:regno";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':regno', $regno, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  if($query -> rowCount() > 0)
  {
    echo "<span style='color:red'>  Registration number already exist. Please try again .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  } else{

    echo "<span style='color:green'> Registration number available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}


?>
