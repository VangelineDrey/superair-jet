<?php
session_start();
require 'functions.php';
if(isset($_COOKIE['id']) && isset($_COOKIE["key"])){
 $id = $_COOKIE["id"];
 $key =$_COOKIE["key"];
 
 $result = mysqli_query($conn,"SELECT name FROM users WHERE id=$id");
 $row = mysqli_fetch_assoc($result);

 if($key === hash('sha256', $row['name'])){
     $_SESSION['login'] =true;
     $_SESSION['id'] = $row['id'];
 }
}

if(isset($_SESSION["login"])){
    header('location:../admin/index.php');
    exit;
}
    if(isset($_POST["login"])){

        $name=$_POST["name"];
        $password=$_POST["password"];

        $result = mysqli_query($conn,"SELECT * FROM users WHERE name='$name'");
        
        if(mysqli_num_rows($result)===1){
        
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password,$row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];

                if(isset($_POST['remember'])){
                    setcookie('tebakiniapa',$row["id"], time() + 36000); 
                    setcookie('tebakiniapa2', hash('sha256',$row["name"]), time() + 36000); 
                }
                header("location:../admin/index.php");
                exit;
            }
        }
        $error=true;
    }
?>
<?php if(isset($error)) : ?>
    <script>
        alert('name atau password salah');
        </script>
<?php endif; ?>

        <!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Login Admin</title>
                                <link rel="shortcut icon" href="../assets/images/oska.png" />
                                <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
                                <style>@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif
}

body {
    height: 100vh;
    background: linear-gradient(to top, #c9c9ff 50%, #9090fa 90%) no-repeat
}

.container {
    margin: 50px auto
}

.panel-heading {
    text-align: center;
    margin-bottom: 10px
}

#forgot {
    min-width: 100px;
    margin-left: auto;
    text-decoration: none
}

a:hover {
    text-decoration: none
}

.form-inline label {
    padding-left: 10px;
    margin: 0;
    cursor: pointer
}

.btn.btn-primary {
    margin-top: 20px;
    border-radius: 15px
}

.panel {
    min-height: 380px;
    box-shadow: 20px 20px 80px rgb(218, 218, 218);
    border-radius: 12px
}

.input-field {
    border-radius: 5px;
    padding: 5px;
    display: flex;
    align-items: center;
    cursor: pointer;
    border: 1px solid #ddd;
    color: #4343ff
}

input[type='text'],
input[type='password'] {
    border: none;
    outline: none;
    box-shadow: none;
    width: 100%
}

.fa-eye-slash.btn {
    border: none;
    outline: none;
    box-shadow: none
}

img {
    width: 40px;
    height: 40px;
    object-fit: cover;
    border-radius: 50%;
    position: relative
}

a[target='_blank'] {
    position: relative;
    transition: all 0.1s ease-in-out
}

.bordert {
    border-top: 1px solid #aaa;
    position: relative
}

.bordert:after {
    content: "or connect with";
    position: absolute;
    top: -13px;
    left: 33%;
    background-color: #fff;
    padding: 0px 8px
}

@media(max-width: 360px) {
    #forgot {
        margin-left: 0;
        padding-top: 10px
    }

    body {
        height: 100%
    }

    .container {
        margin: 30px 0
    }

    .bordert:after {
        left: 25%
    }
}</style>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
                                <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js'></script>
                            </head>
                            <body oncontextmenu='return false' class='snippet-body'>
                            <div class="container">
    <div class="row">
        <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
            <div class="panel border bg-white">
                <div class="panel-heading">
                    <h3 class="pt-3 font-weight-bold">Login</h3>
                </div>
                <div class="panel-body p-3">
                    <form action="" method="POST">
                        <div class="form-group py-2">
                            <div class="input-field"> <span class="far fa-user p-2"></span> <input type="text" name="name" id="name" placeholder="Enter your Username" required> </div>
                        </div>
                        <div class="form-group py-1 pb-2">
                            <div class="input-field"> <span class="fas fa-lock px-2"></span> <input type="password" name="password" id="password" placeholder="Enter your Password" required> </span> </div>
                        </div>
                        <div class="remember"> <input type="radio" name="radio"> <span class="checkmark"></span><label class="option text-muted"> Remember me  </label> </div>
                        <button class="btn btn-primary btn-block mt-3" type="submit" name="login">Login</button>
                        <div class="text-center pt-4 text-muted">Don't have an account? <a href="registrasi.php">Sign up</a> </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                            <script type='text/javascript'></script>
                            </body>
                        </html>