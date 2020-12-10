<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/homeHeader.css">
</head>

<body>
    <div class="homeHeader">
        <ul>
            <li><a href="index.php?controller=Base&action=home">Home</a></li>
            <li><a href="index.php?controller=Base&action=about">About</a></li>

            <?php if ($_SESSION['login'] && $_SESSION['accountType'] != "ho") : ?>
                <li><a href="index.php?controller=Citizen&action=onClickMyFormButton">My Form</a></li>
                <li><a href="index.php?controller=Citizen&action=onClickMyStatisticsButton">My Statistics</a></li>
                <li class="nav-right"><a href="index.php?controller=Authentication&action=onClickSignOutButton">Sign Out</a></li>
                <li class="nav-right">
                    <a href="index.php?controller=Citizen&action=onClickViewInfo">Hi, <?php echo $_SESSION["login"]; ?>
                    </a>
                </li>

            <?php elseif ($_SESSION['login'] && $_SESSION['accountType'] == "ho") : ?>
                <li><a href="index.php?controller=HO&action=onClickMyFormButton">My Form</a></li>
                <li><a href="index.php?controller=HO&action=onClickMyStatisticsButton">My Statistics</a></li>
                <li class="nav-right"><a href="index.php?controller=Authentication&action=onClickSignOutButton">Sign Out</a></li>
                <li class="nav-right"> <a> Hi, <?php echo $_SESSION["login"]; ?>
                    </a>
                </li>

            <?php else : ?>
                <li class="nav-right"><a href="index.php?controller=Authentication&action=onClickSignInButton">Sign In</a></li>
                <li class="nav-right"><a href="index.php?controller=Authentication&action=onClickSignUpButton">Sign Up</a></li>
            <?php endif; ?>
        </ul>
    </div>

</body>

</html>