<?php
$insert=false;
if(isset($_POST['name'])){
    $server="localhost";
    $username="root";
    $password="";
    $con= mysqli_connect($server,$username,$password);
    if(!$con){
    die("connection to this database failed due to".mysqli_connect_error());
    }
    //echo "Succesful Connection to Database";
     
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql="INSERT INTO `ustravel`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    //echo $sql;

    if($con->query($sql)==true){
      //  echo "succesfully inserted";
      $insert=true;
    }
    else{
        echo "ERROR:$sql <br> $con->error";
    }
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="NSUT-1.jpg" alt="NSIT Delhi" >
    <div class="container">
        <h1>Welcome to NSIT US Travel Form</h1>
        <p>Enter Your Details and submit this form to confirm Your Participation in the trip</p>
        <?php
        if($insert==true){
        echo "<p class='msg'>Thanks for submitting the form.we are happy to see you joining us for the US trip</p>";}
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="text" name="email" id="email" placeholder="Enter your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone no.">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other Information here"></textarea>
            <button class="btn">SUBMIT</button>


        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>