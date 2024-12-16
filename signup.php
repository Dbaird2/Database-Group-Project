<?php
    include_once("header.php");
?>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align:center;
        }
        .signup-form-form {
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
<?php
if (isset($_GET["error"])) {
    $error = $_GET["error"];
    if ($error == 'emptyinput'){
        echo "<p style='margin-bottom:1.1vw;margin-top:1.1vw;'><b>Did not fill all fields</b></p>";
    }
    if ($error == 'invalidUsername'){
        echo "<p style='margin-bottom:1.1vw;margin-top:1.1vw;><b>Username not allowed</b></p>";
    }
    if ($error == "invalidEmail"){
        echo "<p style='margin-bottom:1.1vw;margin-top:1.1vw;'><b>Invalid Email Account</b></p>";
    }
    if ($error == "passwordsDoNotMatch"){
        echo "<p style='margin-bottom:1.1vw;margin-top:1.1vw;'><b>Passwords do not match</b></p>";
    }
    if ($error == "usernameAlreadyExists"){
        echo "<p style='margin-bottom:1.1vw;margin-top:1.1vw;'><b>Username already exists.</b></p>";
    }
    if ($error == "statementFailed"){
        echo "<p style='margin-bottom:1.1vw;margin-top:1.1vw;'><b>Statement failed</b></p>";
    }
}
?>
    <div class="signup-form-form">
<h2>Signup</h2>
        <form action="includes/signup.inc.php" method="post">
            <label>* Mandatory</label>
            <div class="form-group">
                <label for="first_name">*First Name:</label>
                <input style ="font-family: inherit;
  width: 20%;
  border: 0;
  border-bottom: 2px solid gray;
  outline: 0;
  font-size: 1.1rem;
  color: black;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;" type="text" name="first_name" placeholder="First name">
            </div>
            <div class="form-group">
                <label for="last_name">*Last Name:</label>
                <input style ="font-family: inherit;
  width: 20%;
  border: 0;
  border-bottom: 2px solid gray;
  outline: 0;
  font-size: 1.1rem;
  color: black;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;" type="text" name="last_name" placeholder="Last name">
            </div>
            <div class="form-group">
                <label for="email">*Email:</label>
                <input style ="font-family: inherit;
  width: 20%;
  border: 0;
  border-bottom: 2px solid gray;
  outline: 0;
  font-size: 1.1rem;
  color: black;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;" type="text" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="username">*Username:</label>
                <input style ="font-family: inherit;
  width: 20%;
  border: 0;
  border-bottom: 2px solid gray;
  outline: 0;
  font-size: 1.1rem;
  color: black;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;" type="text" name="uid" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="dob">*Date of Birth:</label>
                <input style ="font-family: inherit;
  width: 20%;
  border: 0;
  border-bottom: 2px solid gray;
  outline: 0;
  font-size: 1.1rem;
  color: black;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;" type="text" id="date" maxlength="10" name="dob" oninput="formatDate(this)" placeholder="Year-Month-Day">
            </div>
            <div class="form-group">
                <label for="address">*Address:</label>
                <input style ="font-family: inherit;
  width: 20%;
  border: 0;
  border-bottom: 2px solid gray;
  outline: 0;
  font-size: 1.1rem;
  color: black;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;" type="text" name="address" placeholder="Address">
            </div>
            <div class="form-group">
                <label for="phone">*Phone Number:</label>
                <input style ="font-family: inherit;
  width: 20%;
  border: 0;
  border-bottom: 2px solid gray;
  outline: 0;
  font-size: 1.1rem;
  color: black;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;" type="text" name="phone" oninput='addDashesPhone(this)' placeholder="XXXXXXXXXX">
            </div>
            <div class="form-group">
                <label for="pwd">*Password:</label>
                <input style ="font-family: inherit;
  width: 20%;
  border: 0;
  border-bottom: 2px solid gray;
  outline: 0;
  font-size: 1.1rem;
  color: black;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;" type="password" minlength="8" name="pwd" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="repeat_pwd">Repeat Passoword:</label>
                <input style ="font-family: inherit;
  width: 20%;
  border: 0;
  border-bottom: 2px solid gray;
  outline: 0;
  font-size: 1.1rem;
  color: black;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;" type="password" minlength="8" name="pwdr" placeholder="Repeat password">
            </div>
            <button style="width:20%;" type="submit" name="submit">Signup</button>
        </form>
    </div>

<script>
function addDashesPhone(input)
{
    const value = input.value.replace(/[^0-9]/g, '');
    const parts = [];

    if (value.length > 0) parts.push(value.slice(0, 3)); 
    if (value.length > 3) parts.push(value.slice(3, 6)); 
    if (value.length > 6) parts.push(value.slice(6, 10)); 

    input.value = parts.join('-');
}
function formatDate(input) {
    const value = input.value.replace(/[^0-9]/g, ''); 
    const parts = [];

    if (value.length > 0) parts.push(value.slice(0, 4)); 
    if (value.length > 4) parts.push(value.slice(4, 6)); 
    if (value.length > 6) parts.push(value.slice(6, 8)); 

    input.value = parts.join('-');
}
</script>

<?php
?>
