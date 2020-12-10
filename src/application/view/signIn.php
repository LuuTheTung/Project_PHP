<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/signIn.css">
</head>

<body>
    <div class="row" style="margin-top: 120px;  ">
        <div class="one-third column"> </div>
        <div class="one-third column">
            <div class="sign-in">
                <form action="index.php?controller=Authentication&action=onClickSubmitSignInButton" method="post">
                    <label for="username">
                        <i class="fa fa-user" aria-hidden="true"></i> Username:
                    </label>
                    <input class="form-control" type="text" id="username" name="username" placeholder="Enter your username" required>
                    <br>
                    <label for="password">
                        <i class="fa fa-key"></i>Password:
                    </label>
                    <input class="form-control" type="password" id="password" placeholder="Enter your password" name="password" required>

                    <div style="text-align: center; padding-top: 12px">
                        <button type="submit" class="button-submit" value="Submit">Submit</button>
                        <button type="reset" class="button-reset" value="Reset">Reset</button>
                    </div>
                </form>
            </div>

        </div>
        <div class="one-third column">

        </div>
    </div>


</body>

</html>