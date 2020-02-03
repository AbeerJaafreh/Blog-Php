<?php
session_start();
?>
<?php
include('database.php');

include 'head.php';
?>
<div class="auth bg-white" id="auth">
    <div class="sign bg-primary">
        <div class="innerDiv" onmouseover="openForm2()">
            <h2>Sign Up</h2>
            <span>Sign up with your simple details. It will be cross checked by the adminstration</span>
        </div>
        <div class="innerDiv" onmouseover="openForm()">
            <h2>Sign In</h2>
            <span>Sign in with your username and password</span>
        </div>
    </div>

    <div class="row  bg-light">
        <form class="w-75 container" name="registerForm" action="" method="post" id="register" enctype="multipart/form-data">
            <div>
                <label for="fname">FIRST NAME</label>
                <input class="w3-input bg-light" type="text" required name="fname" placeholder="Enter First name ">
            </div>
            <div>
                <label for="lname">LAST NAME</label>
                <input class="w3-input bg-light" type="text" required name="lname" placeholder="Enter Last name ">
            </div>
            <div>
                <label for="email">EMAIL</label>
                <input class="w3-input bg-light" type="email" required name="email" placeholder="Enter Email  ">

            </div>
            <div>
                <label for="password">PASSWORD</label>
                <input class="w3-input bg-light" type="password" required name="password" placeholder="Password">

            </div>
            <?php
            if (isset($_SESSION['error']) && !empty($_SESSION['error'])) { ?>
                <div class="error" style="margin-bottom: 20px;font-size: 15px;color: red;"><?php echo $_SESSION['error']; ?></div>
            <?php
                unset($_SESSION['error']);
            }
            ?>
            <br />
            <div class="form-check">
                <input type="checkbox" class="form-check-input" required id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1" name="isCheck">I agree with the term and conditions </label>
            </div>



            <br />
            <div class=" pr-20 mr-30 float-left">
                <button type="submit" class="button btn-success" name="submit">Sign up</button>
                <span style="padding: 8px" ;>or </span>
                <a onclick="openForm()" class="button btn-transperent p-2" style="padding-top: 10px">log in</a>
            </div>
        </form>

        <form class="w-75 container" action="" method="post" id="login" enctype="multipart/form-data">

            <label for="email2">EMAIL </label>
            <input class="w3-input bg-light" type="email" name="username" placeholder="Enter Email  ">

            <label for="password2">PASSWORD</label>
            <input class="w3-input bg-light" type="password" name="pwd" placeholder="Enter Password  ">
            <br />
            <?php

            if (isset($_SESSION['error_input']) && !empty($_SESSION['error_input'])) { ?>
                <div class="error_input" style="margin-bottom: 20px;font-size: 15px;color: red;"><?php echo $_SESSION['error_input']; ?></div>
            <?php
                unset($_SESSION['error_input']);
            }
            ?>



            <button type="submit" class="button btn-primary float-left" name="login">Log in</button>


        </form>
    </div>
</div>

</body>





<script>
    function openForm() {
        document.getElementById("login").style.display = "block";
        document.getElementById("register").style.display = "none";
    }

    function openForm2() {
        document.getElementById("login").style.display = "none";
        document.getElementById("register").style.display = "block";
    }
</script>

<?php
if (isset($_POST['submit'])) {
    $result = false;
    $first_name = !empty($_POST['fname']) ? trim($_POST['fname']) : null;
    $last_name = !empty($_POST['lname']) ? trim($_POST['lname']) : null;
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;


    $sql = "SELECT COUNT(email) AS num FROM users WHERE first_name = :first_name";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':first_name', $first_name);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row['num'] > 0) {
        $_SESSION['error'] = "**That username already exists ";
        echo "<script>
        window.location.href='index.php'</script>";
    }
    $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));
    $sql = "INSERT INTO users (first_name,last_name,email, password) VALUES (:first_name,:last_name,:email, :password)";
    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':first_name', $first_name);
    $stmt->bindValue(':last_name', $last_name);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $passwordHash);

    $result = $stmt->execute();
    if ($result) {
        echo 'Thank you for registering with our website.';
    }
}


if (isset($_POST['login'])) {

    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['pwd']) ? trim($_POST['pwd']) : null;

    $sql = "SELECT id,first_name,last_name ,email, password FROM users WHERE email = :username";
    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':username', $username);

    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user === false) {
        $_SESSION['error_input'] = "**Username or password incorrect ";
        echo "<script>
        window.location.href='index.php'</script>";
    } else {
        $validPassword = password_verify($passwordAttempt, $user['password']);

        if ($validPassword) {
            $_SESSION["user_id"] = $user['id'];
            $_SESSION["logged_in"] = time();
            $_SESSION["username"] = $user['first_name'] . ' ' . $user['last_name'];

            echo "<script>
            window.location.href='main.php';
            </script>";
            exit;
        } else {
            $_SESSION['error_input'] = "**Username or password incorrect ";
            echo "<script>
            window.location.href='index.php'</script>";
                }
    }
}




?>