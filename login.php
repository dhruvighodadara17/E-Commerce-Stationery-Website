<?php
if(isset($_POST['email']) && isset($_POST['password'])){
$server = "localhost";
$username = "root";
$password = "";
$database = "my-db";

$con = mysqli_connect($server, $username, $password, $database);

if(!$con){
    die("Connection failed!" .mysqli_connect_error());
}
else{
    echo "Successfully connected!";
}

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sqll = "INSERT INTO `login` (`email`, `password`) VALUES ('$email', '$password')";
    if($con->query($sqll) == true){
        $insert = true;
    }
    else{
        echo "ERROR: $sqll <br>" . $con->error;
    }

    $con-> close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="font-awesome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            font-size: 1.5rem;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: url('login.jpeg') no-repeat center center fixed;
            background-size: cover;
            font-family: cursive;
        }

        .container {
            /* background-color: rgba(255, 255, 255, 0.9); */
            padding: 2rem;
            /* border-radius: 8px; */
            width: 75%;
            height: 80%;
            /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
        }

        #login {
            border: none;
            padding: 1rem;
            margin-top: 1rem;
            background-color: #eef3ec;
        }

        #login div {
            border: none;
            background-color: #eef3ec;
        }

        #login:hover {
            /* box-shadow: inset 0 0 15px whitesmoke, 0 0 25px #fff; */
            transition-timing-function: linear;
            transition-duration: 0.2s;
            /* border: 1px solid black; */
        }



        #user {
            display: flex;
        }
    </style>
</head>

<body>
    <form id="login" method="POST" action="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5" id="login" style="background-color:#eef3ec">
                    <div class="card-header text-center">
                        <h2 style="font-size: 2.5rem;">Login</h2>
                    </div>
                    <div class="card-body">
                        <form id="loginForm">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submit"
                                style="width: 100%; margin: 1rem 0rem;">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <script>
        document.getElementById("loginForm").addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent the form from submitting the traditional way
            window.location.href = "index.html"; // Redirect to index.html
        });
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