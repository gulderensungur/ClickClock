<?php
$host="localhost";
$user="root";
$password="";
$db="costumer";

session_start();


$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
    die("connection error");
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username=$_POST["username"];
    $password=$_POST["password"];


    $sql="select * from login where username='".$username."' AND password='".$password."' ";

    $result=mysqli_query($data,$sql);

    $row=mysqli_fetch_array($result);

    if($row["user type"]=="costumer")
    {

        $_SESSION["username"]=$username;

        header("location:homepage.html");
    }

    elseif($row["user type"]=="admin")
    {

        $_SESSION["username"]=$username;

        header("location:insert_product.php");
    }

    else
    {
        echo "username or password incorrect";
    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style type="text/css">

        body {
            box-sizing: border-box;
            font-family: Arial;
            text-align: center;
            color: #eee;
            background-color: #6f92dc;
        }


        h2 {
            margin-top: 1em;
            margin-bottom: 1em;
            color: #eee;
            font-weight: 400;
            text-align: center;
            font-size: 200%;
            letter-spacing: 4px;
        }

        h4 {
            margin-top: 1em;
            color: #eee;
            font-size: 150%;
            font-weight: 300;
            text-align: center;
        }

        button {
            display: inline;
            background: #01A4E0;
            color: #2184AC;
            border: 0;
            padding: 4px;
        }

        input {
            display: block;
            width: 98%;
            height: 30px;
            margin-top: 1.0em;
            padding: 4px;
        }

        small {
            display: inline-block;
            margin-top: 5px;
            color: white;
            font-size: 100%;
            color: #fff;
        }

        .login-box {
            padding: 1em 1em 1em 1em;
            margin: auto;
            text-align: center;
            display: block;
            background-color: #6f92dc;
            width: 60%;
            height: auto;
        }

        .outer-box {
            display: block;
            margin: auto;
            background: #6f92dc;
            border-radius: 5px;
            width: 50%;

        }

        #btn-login {
            display: block;
            width: 100%;
            height: 40px;
            margin-top: 2.0em;
            border-radius: 4px;
            background-color: #3366cc;
            color: #fff;
        }

    </style>

</head>
<body>
<form action="#" method="POST">
    <div class="outer-box">
        <div class="login-box">
            <h4 class="login-text">Login</h4>
            <center>
                <div>
                    <label>username</label>
                    <input placeholder="username" type="text" name="username" required>
                </div>
                <div>
                    <label>password</label>
                    <input placeholder="password" type="password" name="password" required>
                </div>
                <div>
                    <button id="btn-login" type="submit">Login</button>

                </div>
            </center>
        </div>
    </div>
</form>




</body>
</html>