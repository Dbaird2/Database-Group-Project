<?php
include_once("header.php");
?>
<style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .login-form-form {
            max-width: 50%;
            max-height: 40%;
            margin: 50px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333333;
        }
        .login-form{
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            color: #666666;
            display: block;
            margin-bottom: 5px;
        }
        input[type="password"] {
            width: 100%;
            margin-bottom:5px;
            padding: 8px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="text"] {
            width: 100%;
            margin-bottom:5px;
            padding: 8px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-size: 1em;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        .message {
            text-align: center;
            margin-top: 15px;
        }
        .error {
            color: #D8000C;
        }
        .success {
            color: #4F8A10;
        }

</style>

    <div class="login-form-form">

        <form action="includes/login.inc.php" method="post">
<h2>Login</h2>
<div class="form-group">
<label for="uid">Username: </label>
            <input style ="font-family: inherit;
  width: 100%;
  border: 0;
  border-bottom: 2px solid gray;
  outline: 0;
  font-size: 1.1rem;
  color: black;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;" type="text" name="uid" placeholder="Username/Email">
</div>
<div class="form-group">
<label for="pwd">Password: </label>
            <input style ="font-family: inherit;
  width: 100%;
  border: 0;
  border-bottom: 2px solid gray;
  outline: 0;
  font-size: 1.1rem;
  color: black;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;" type="password" name="pwd" placeholder="Password">
</div>
            <button type="submit" name="submit">Login</button>
        </form>
    </div>

<?php
    include_once("footer.php");
?>
