<?php
$insert = false;
if(isset($_POST['name'])){
    $server ="localhost";
    $username ="root";
    $password ="";
    $con = mysqli_connect($server,$username,$password);
    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }
    // echo "successfully connected";
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    
    $sql ="INSERT INTO `ravan`.`trip`(`name`, `age`, `gender`, `address`) VALUES ('$name', '$age', '$gender', '$address');";
    // echo $sql;

    if($con->query($sql)==true){
        $insert = true;
    }
    else{
        echo "Failed $sql <br> $con->error";
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the world of Ravan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h3>Welcome to my world</h3>
        <p>
            Ram Naam Japna He Hamara Kaam
        </p>
        
        <?php
            if($insert==true){
                echo "<p class='submitmsg'> Your registration is done</p>";
            }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name:">
            <input type="text" name="age" id="age" placeholder="Enter your Age:">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender:">
            <input type="text" name="address" id="address" placeholder="Enter your Address:">
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>