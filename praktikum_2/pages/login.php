<?php
$loginPressed = filter_input(INPUT_POST, 'btnLogin');
if (isset($loginPressed)) {
    $email = filter_input(INPUT_POST, 'txtEmail');
    $password = filter_input(INPUT_POST, 'txtPassword');
    if (trim($email) == '' || trim($password) == '') {
        echo '<div>Please input your email and password!</div>';
    } else {
        $user = login($email, $password);
        if ($user['email'] == $email) {
            $_SESSION['registered_user'] = true;
            $_SESSION['registered_user'] = $user['name'];
            header('location:index.php');
        } else {
            echo '<div>Invalid email or password</div>';
        }
    }
}
?>

<form method="post">
    <div class="mb-row-3">
        <label for="txtEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="email@example.com" required autofocus>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="txtPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Your Secret Key" autofocus>
        </div>
    </div>
    <div>
        <input type="submit" class="btn btn-primary" name="btnLogin">
    </div>
</form>