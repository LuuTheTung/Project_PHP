<!DOCTYPE html>
<html>

<head>
    <title>My statistics</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../public/js/redirectFillForm.js"></script>
    <link rel="stylesheet" type="text/css" href="../public/css/myForm.css">
</head>

<body>
    <div class="myForm">
        <?php
        $statisticsContent = $_SESSION['statistics'];
        $title = $statisticsContent['title'];
        $description = $statisticsContent['description'];
        $img_path = $statisticsContent['content'];
        echo "
        <div class=\"row\">
            <div class=\"one-third column\">
                <h4>$title</h4>
            </div>
        </div>

        <div class=\"description\">
            <h5>Description</h5>
            <h6>$description</h6>
        </div>
        <div class=\"row\" >
            <div class=\"one column\"> <img src=$img_path alt=\"image\" style=\"width:100%\"> </div>
        </div>";
        $_SESSION['statisticsContent'] = '';
        ?>

    </div>

</body>

</html>