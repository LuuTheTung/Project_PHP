<!DOCTYPE html>
<html>

<head>
    <title>My Statistics</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../public/js/redirectFillForm.js"></script>

    <link rel="stylesheet" type="text/css" href="../public/css/myForm.css">

</head>

<body>
    <div class="myForm">
        <form method="post" action="index.php?controller=Citizen&action=onSelectStatistics">
            <?php
            require_once("model/data/analysis/StatisticsDAO.php");
            $statisticsList = StatisticsDAO::getAllStatistics(null);
            foreach ($statisticsList as $statistics) {
                $title = $statistics['title'];
                $description = $statistics['description'];
                $statisticsID = $statistics['statisticsID'];
                echo "
                <div class=\"row\">
                    <div class=\"one-third column\">
                        <h4>$title</h4>
                    </div>
                    <div class=\"one-third column\" style=\"text-align: right\">
                        <input type=\"submit\" name=$statisticsID class=\"button\" value=\"View this statistics\"/>
                    </div>
                </div>

                <div class=\"description\">
                    <h5>Description</h5>
                    <h6>
                        $description
                    </h6>
                </div>";
            }
            ?>
        </form>
    </div>

</body>

</html>