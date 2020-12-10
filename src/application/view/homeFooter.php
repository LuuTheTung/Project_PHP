<!DOCTYPE html>
<html>

<head>
    <title>Home Footer</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/homeFooter.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" crossorigin="anonymous">
</head>

<body>
    <div class="myfooter">
        <div class="row">
            <div class="row">
                <div class="one-fourth column">
                    <div>
                        <h4 style="text-align: center;"><img src="../public/img/logo.png" alt="Logo" class="my-logo"></h4>
                        <ul>
                            <li style="text-align: center;">
                                <a href="#"> Medical Trace Portal</a>
                            </li>
                            <li style="text-align: center; ">
                                <a href="#"> Website for Medical Declaration by MTP Inc.</a>
                            </li>
                        </ul>
                        <h4 style="text-align: center;">Hotline: 19001009</h4>
                    </div>
                </div>
                <div class="one-fourth column">
                    <div>
                        <h4>Citizen</h4>
                        <ul>
                            <?php if ($_SESSION['login'] && $_SESSION['accountType'] != "ho") : ?>
                                <li><a href="index.php?controller=Citizen&action=onClickMyFormButton"><i class="fa fa-angle-right" aria-hidden="true"></i>Fill in forms</a></li>
                                <li><a href="index.php?controller=Citizen&action=onClickMyStatisticsButton"><i class="fa fa-angle-right" aria-hidden="true"></i>View personal statistics</a></li>


                            <?php elseif ($_SESSION['login'] && $_SESSION['accountType'] == "ho") : ?>
                                <li>
                                    <a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Fill in forms
                                    </a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>View personal statistics
                                    </a>
                                </li>

                            <?php endif; ?>

                        </ul>
                    </div>
                </div>
                <div class="one-fourth column">
                    <div>
                        <h4>Health Organization</h4>
                        <ul>
                            <?php if ($_SESSION['login'] && $_SESSION['accountType'] == "ho") : ?>
                                <li><a href="index.php?controller=HO&action=onClickMyFormButton"><i class="fa fa-angle-right" aria-hidden="true"></i>Create forms</a></li>
                                <li><a href="index.php?controller=HO&action=onClickMyStatisticsButton"><i class="fa fa-angle-right" aria-hidden="true"></i>Create statistics</a></li>


                            <?php elseif ($_SESSION['login'] && $_SESSION['accountType'] != "ho") : ?>
                                <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Create forms</a></li>
                                <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Create statistics</a></li>

                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="one-fourth column">
                    <div>
                        <h4>Our policies</h4>
                        <ul>
                            <li>
                                <a href="index.php?controller=Base&action=termOfService"><i class="fa fa-angle-right" aria-hidden="true"></i> Term of services</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="one column" style="text-align: center;font-size: 16px; ">
                © 2020 MTP Inc. All rights reserved </div>
        </div>
    </div>

</body>

</html>