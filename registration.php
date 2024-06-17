<?php
if(isset($_POST['firstname'])){
$server = "localhost";
$username = "root";
$password = "";
$database = "my-db";

$conn = mysqli_connect($server, $username, $password, $database);

if(!$conn){
    die("Connection failed!" .mysqli_connect_error());
}
else{
    echo "Successfully connected!";
}

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $city = $_POST["city"];
    $state = $_POST["state"];

    if ($password == $cpassword) {
    $sql = "INSERT INTO `registration` ( `firstname`, `lastname`, `email`, `username`, `password`, `cpassword`, `city`, `state`) VALUES 
    ('$firstname', '$lastname', '$email', '$username', '$password', '$password', '$city', '$state')";

    if($conn->query($sql) == true){
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br>" . $conn->error;
    }
}
else{
    echo "Passwod do not match";
}
    $conn-> close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Registration</title>
    <link rel="stylesheet" href="font-awesome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            /* font-family: Georgia, Times, 'Times New Roman', serif; */
            padding-top: 40px;
            background-image: url("registration.jpg");
            background-size: cover;
            background-position: center;
            font-family: cursive;
            /* opacity: 0.5; */
        }


        h1 {
            /* width: 10rem; */
            padding: 1.5rem 9rem 1.5rem 1.5rem;
        }

        form {
            font-size: 1.2rem;
            margin: 2% auto;

            width: 80%;
            /* align-items: center; */
            max-width: 600px;
            padding: 15px;
            padding-left: 75px;
            /* padding-left: 35%; */
            /* margin: 0rem 5rem; */
            /* align-content: center; */
            /* border: 1px solid #888; */
            background-color: rgba(237, 232, 232, 0.8);
            /* opacity: 0.8; */
        }

        /* 
        form:hover {
            box-shadow: inset 0 0 15px rgb(227, 221, 221), 0 0 25px #302d2d;
            transition-timing-function: linear;
            transition-duration: 0.2s;
            border: 1px solid black;
        } */
        #submit,
        #cancel {
            padding: 0.6rem 1.5rem;
        }

        #submit {
            border: 2px solid black;
        }

        #submit:hover,
        #cancel:hover {
            border: 3px solid black;
            border-radius: 5px;
        }

        #user {
            display: flex;
        }
    </style>
</head>

<body>
    
    <form id="registrationForm" method="POST" action="">
        <h1 class="text-center">Registration Form</h1>

        <div class="form-row">
            <div class="col-md-5 mb-3">
                <label for="validationDefault01">First name<sup style="color: red;">*</sup></label>
                <input type="text" class="form-control" id="validationDefault01" placeholder="firstame" name="firstname" required>
            </div>
            <div class="col-md-5 mb-3">
                <label for="validationDefault02">Last name<sup style="color: red;">*</sup></label>
                <input type="text" class="form-control" id="validationDefault02" placeholder="lastname" name="lastname" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-5 mb-3">
                <label for="validationDefault05">Email<sup style="color: red;">*</sup></label>
                <input type="email" class="form-control" id="validationDefault05" placeholder="email" name="email" required>
            </div>

            <div class="col-md-5 mb-3">
                <label for="validationDefault08">Username<sup style="color: red;">*</sup></label>
                <div class="form-row">
                    <div class="col-md-12 mb-3" id="user">
                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                        <input type="text" class="form-control" id="validationDefault08" placeholder="username" name="username"
                            required>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-5 mb-3">
                <label for="validationDefault06">Password<sup style="color: red;">*</sup></label>
                <input type="password" class="form-control" id="validationDefault06" placeholder="password" name="password" required>
            </div>
            <div class="col-md-5 mb-3">
                <label for="validationDefault07">Confirm Password<sup style="color: red;">*</sup></label>
                <input type="password" class="form-control" id="validationDefault07" placeholder="cpassword" name="cpassword"
                    required>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationDefault03">City<sup style="color: red;">*</sup></label>
                <input type="text" class="form-control" id="validationDefault03" placeholder="city" name="city" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault04">State<sup style="color: red;">*</sup></label>
                <input type="text" class="form-control" id="validationDefault04" placeholder="state" name="state" required>
            </div>
        </div>

        <button class="btn btn-success" type="submit" id="submit"
            style="width: 12rem; margin: 5px 20px 0px 40px;">Submit</button>
        <button type="button" class="btn btn-secondary" id="cancel"
            style="margin-left: 5px; margin-top: 5px;">Cancel</button><br><br>
        <p style="padding-left: 70px;">Already Registered? <a href="login.php"><b>Log
                    In</b></a></p>
    </form>

    <script>
        // Cancel button event listener
        document.getElementById('cancel').addEventListener('click', function () {
            window.location.href = 'index.html';
        });

        // Form submission and password validation
        document.getElementById('registrationForm').addEventListener('submit', function (event) {
            var password = document.getElementById("validationDefault06").value;
            var confirmPassword = document.getElementById("validationDefault07").value;

            if (password !== confirmPassword) {
                event.preventDefault();
                alert("Passwords don't match!");
            } else {
                alert("Registration successful!");
                window.location.href = "index.html";
            }
        });
        // document.getElementById('submit').addEventListener('click', function () {
        //     window.location.href = "index.html";
        // });
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>