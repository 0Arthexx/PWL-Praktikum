<?php 
    $loginPressed = filter_input(INPUT_POST,'btnLogin');
    if(isset($loginPressed)){
        $email = filter_input(INPUT_POST,'email');
        $password = filter_input(INPUT_POST,'password');
        if(trim($email) == ''||trim($password) == ''){
            echo '<div>Please input your email and password!</div>';
        }else{
            $user = login($email, $password);
            if($user['email'] == $email){
                $_SESSION['registered_user'] = true;
                $_SESSION['registered_name'] = $user['name'];
                header('location:index.php');
            }else{
                echo '<div>Invalid email or password</div>';
            }
        }
    }
?>

<style>
    .card {
        width: 190px;
        padding: 1.9rem 1.2rem;
        text-align: center;
        background: #2a2b38;
    }

    /*Inputs*/
    .field {
        margin-top: .5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: .5em;
        background-color: #1f2029;
        border-radius: 4px;
        padding: .5em 1em;
    }

    .input-icon {
        height: 1em;
        width: 1em;
        fill: #ffeba7;
    }

    .input-field {
        background: none;
        border: none;
        outline: none;
        width: 100%;
        color: #d3d3d3;
    }

    /*Text*/
    .title {
        margin-bottom: 1rem;
        font-size: 1.5em;
        font-weight: 500;
        color: #f5f5f5;
    }

    /*Buttons*/
    .btn {
        margin: 1rem;
        border: none;
        border-radius: 4px;
        font-weight: bold;
        font-size: .8em;
        text-transform: uppercase;
        padding: 0.6em 1.2em;
        background-color: #ffeba7;
        color: #5e6681;
        box-shadow: 0 8px 24px 0 rgb(255 235 167 / 20%);
        transition: all .3s ease-in-out;
    }

    .btn-link {
        color: #f5f5f5;
        display: block;
        font-size: .75em;
        transition: color .3s ease-out;
    }

    /*Hover & focus*/
    .field input:focus::placeholder {
        opacity: 0;
        transition: opacity .3s;
    }

    .btn:hover {
        background-color: #5e6681;
        color: #ffeba7;
        box-shadow: 0 8px 24px 0 rgb(16 39 112 / 20%);
    }

    .btn-link:hover {
        color: #ffeba7;
    }

</style>

<?php
$loginPressed = filter_input(INPUT_POST, 'btnLogin');
if(isset($loginPressed)) {
    $email = filter_input(INPUT_POST, 'txtEmail');
    $password = filter_input(INPUT_POST, 'txtPassword');
    if (trim($email) == '' || trim($password) == '') {
        echo '<div>Please input Your email And funcion' ;
    } else {
        $user = login($email, $password);
        if ($user['email'] == $email) {
            $_SESSION['registered_user'] = true;
            $_SESSION['registered_user'] = $user['name'];
            header('location:index.php');

        } else {
            echo '<div>Invalid Email or Password</div>';
        }
    }
}

?>
<form action="" method="post">
    <div class="card m-auto">
        <h4 class="title">Log In!</h4>
        <form>
            <div class="field">
                <svg class="input-icon" viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
                    <path d="M207.8 20.73c-93.45 18.32-168.7 93.66-187 187.1c-27.64 140.9 68.65 266.2 199.1 285.1c19.01 2.888 36.17-12.26 36.17-31.49l.0001-.6631c0-15.74-11.44-28.88-26.84-31.24c-84.35-12.98-149.2-86.13-149.2-174.2c0-102.9 88.61-185.5 193.4-175.4c91.54 8.869 158.6 91.25 158.6 183.2l0 16.16c0 22.09-17.94 40.05-40 40.05s-40.01-17.96-40.01-40.05v-120.1c0-8.847-7.161-16.02-16.01-16.02l-31.98 .0036c-7.299 0-13.2 4.992-15.12 11.68c-24.85-12.15-54.24-16.38-86.06-5.106c-38.75 13.73-68.12 48.91-73.72 89.64c-9.483 69.01 43.81 128 110.9 128c26.44 0 50.43-9.544 69.59-24.88c24 31.3 65.23 48.69 109.4 37.49C465.2 369.3 496 324.1 495.1 277.2V256.3C495.1 107.1 361.2-9.332 207.8 20.73zM239.1 304.3c-26.47 0-48-21.56-48-48.05s21.53-48.05 48-48.05s48 21.56 48 48.05S266.5 304.3 239.1 304.3z"></path></svg>
                <input autocomplete="off" id="logemail" placeholder="Email" class="input-field" name="txtEmail" type="email" required autofocus>
            </div>
            <div class="field">
                <svg class="input-icon" viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
                    <path d="M80 192V144C80 64.47 144.5 0 224 0C303.5 0 368 64.47 368 144V192H384C419.3 192 448 220.7 448 256V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V256C0 220.7 28.65 192 64 192H80zM144 192H304V144C304 99.82 268.2 64 224 64C179.8 64 144 99.82 144 144V192z"></path></svg>
                <input autocomplete="off" id="logpass" placeholder="Password" class="input-field" name="txtPassword" type="password" required>
            </div>

            <button class="btn" type="submit" name="btnLogin">Login</button>
            <!--            <a href="#" class="btn-link">Forgot your password?</a>-->
        </form>
    </div>
</form>