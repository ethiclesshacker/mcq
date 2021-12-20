<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_login.css">
    <title>Login</title>
</head>

<body>
    <div class="form-container">
        <div class="button-container">
            <button id="view-login">Login</button>
            <button id="view-register">Register</button>
        </div>
        <form action="qp_edit.php" method="POST" name="login" id="login-form" class="form" autocomplete="off">
        <input name="userid" type="text" placeholder="Enter your user id">
            <input name="password" type="password" placeholder="Enter your password">
            <input name="submit" class="submit" type="submit" value="Login">
        </form>
        <form action="#" method="POST" name="registration" id="registration-form" class="form" autocomplete="off">
            <input name="tid" type="text" placeholder="Enter your tid">
            <input name="name" type="text" placeholder="Enter your name">
            <input name="userid" type="text" placeholder="Enter your user id">
            <input name="password" type="password" placeholder="Enter your password">
            <input name="submit" class="submit" type="submit" value="Register">
        </form>
    
    <?php
    // If POST, then:
    // Add user details to database
    // If user already in the db, show error in red
    // else, Show success message in green
    // else, do absolutely nothing

    if (isset($_POST["submit"])) {
        $conn = mysqli_connect("localhost", "root", "", "mcq");
        $TABLE_NAME = "teachers";
        $tid = $_POST["tid"];
        $name = $_POST["name"];
        $userid = $_POST["userid"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "INSERT INTO $TABLE_NAME VALUES('$tid','$name','$userid','$password')");
        if ($result) {
            echo "<p class='message success'> Succesfully registered new user!! </p>";
        } else {
            echo "<p class='message failure'> Error in adding new user, please make sure your TID and User ID are correct... </p>";
        }
    }

    ?>
    </div>

    <script>
        const loginForm = document.querySelector("#login-form");
        const registrationForm = document.querySelector("#registration-form");
        document.querySelector("#view-login").addEventListener('click', () => {
            loginForm.style.display = "flex";
            registrationForm.style.display = "none";
        });
        document.querySelector("#view-register").addEventListener('click', () => {
            loginForm.style.display = "none";
            registrationForm.style.display = "flex";
        });
    </script>

</body>

</html>