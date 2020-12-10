<!DOCTYPE html>
<html>

<head>
    <title>Fill Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/myForm.css">
</head>

<body>
<div class="myForm">
    <div class="row">
        <?php
        $title = $_SESSION['formTitle'];
        echo "
                <div class=\"one-third column\">
                    <h4>$title</h4>
                </div>
            ";
        $_SESSION['formTitle'] = '';
        ?>

    </div>

    <div class="description">
        <h5>Description</h5>
        <h6>
            THIS IS IMPORTANT DOCUMENT, YOUR INFORMATION IS VITAL TO ALLOW HEALTH AUTHORITIES CONTACT YOU
            TO PREVENT COMMUNICABLE DISEASES
            <br/>
            <br/>
            Warning: Declaring false information is a violation of Vietnamese law and may be subject to criminal
            handling
            <?php
            $description = $_SESSION['formDescription'];
            echo "<br /><br /><br />$description";
            $_SESSION['formDescription'] = '';
            ?>
        </h6>
    </div>

    <?php
    include_once($_SESSION['fillFormContent']);
    $_SESSION['fillFormContent'] = '';
    ?>
</div>

</body>

</html>