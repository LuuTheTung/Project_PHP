<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <title>My Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../public/js/redirectFillForm.js"></script>
    <link rel="stylesheet" type="text/css" href="../public/css/myForm.css">

</head>

<body>

    <div class="myForm">
        <form method="post" action="index.php?controller=Citizen&action=onSelectForm">
            <?php
            require_once("model/data/form/FormDAO.php");
            $formList = FormDAOImpl::getAllForms(null);
            $counter = 0;
            foreach ($formList as $form) {
                $title = $form['title'];
                $description = $form['description'];
                $formID = $form['formID'];
                echo "
                <div class=\"row\">
                    <div class=\"one-third column\">
                        <h4>$title</h4>
                    </div>
                    <div class=\"one-third column\" style=\"text-align: right\">
                        <input type=\"submit\" name=$formID class=\"button\" value=\"Fill this form\"/>
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