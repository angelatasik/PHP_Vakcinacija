<html>
<head>
    <title> User LogIn and Registration </title>
    <!-- time() is there to make chrome reload style.css file -->
    <link rel="stylesheet" type="text/css" href="./css/style.css?v=<?=time();?>"> 
    <link rel = "stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >

</head>

<body>
<div class = "container">
    <div class = "login-box">
    <div class = "row">
        <div class = "col-md-6 login-left">
            <h2> LogIn Here </h2>
            <form action = "user_validation.php" method="POST">
                <div class = "form-group">
                    <label> Username </label>
                    <input type="text" name="user" class= "form-control" required>
                </div>
                <div class = "form-group">
                    <label> Password </label>
                    <input type="password" name="password" class= "form-control" autocomplete="current-password" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>

        <div class = "col-md-6 login-right">
            <h2> Register Here </h2>
            <form action = "registration.php" method="POST">
                <div class = "form-group">
                    <label> First Name </label>
                    <input type="text" name="firstName" class= "form-control" required>
                </div>
                <div class = "form-group">
                    <label> Last Name </label>
                    <input type="text" name="last_name" class= "form-control" required>
                </div>
                <div class = "form-group">
                    <label> Age </label>
                    <input type="text" name="age" class= "form-control" required>
                </div>

                <div class = "form-group"> 
                <label> Gender </label>
                <br>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">female</label><br>
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">male</label><br>  
                <input type="radio" id="other" name="gender" value="other">
                <label for="other">other</label><br>
                </div>
                <div class = "form-group">
                    <label> Username </label>
                    <input type="text" name="user" class= "form-control" required>
                </div>
                <div class = "form-group">
                    <label> Password </label>
                    <input type="password" name="password" class= "form-control" required>
                </div>
                <div class = "form-group">
                    <label> Confirm Password </label>
                    <input type="password" name="password" class= "form-control" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
    </div>
</div>

</body>

</html>
