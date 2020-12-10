<!DOCTYPE html>
<html>


<head>
    <title>My Form HO</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--         <link rel="stylesheet" type="text/css" href="../../public/css/myForm.css"> -->
    <script type="text/javascript" src="../public/js/redirectFillForm.js"></script>

    <link rel="stylesheet" type="text/css" href="../public/css/myForm.css">
</head>

<body>
    <div class="createForm">
        <div class="row">
            <h4>Create New Form</h4>
            <div class="description">
                <form action="index.php?controller=HO&action=onClickSubmitFormButton" method="post" enctype="multipart/form-data">
                    <label for="formTitleCreation">Title:</label>
                    <br>
                    <input type="text" name="formTitleCreation" placeholder="Enter form title" required>
                    <br>
                    <label for="fileToUpload">Select file to upload:</label>

                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <br>
                    <label for="descriptionCreation">Description</label>
                    <br>
                    <textarea id="w3review" name="descriptionCreation" rows="4" cols="60" required>
</textarea>

                    <br>
                    <div style="text-align: center">
                        <button type="submit" class="button-submit" value="Submit">Submit</button>
                        <button type="reset" class="button-reset" value="Reset">Reset</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <hr>

    <div class="myForm">
        <form method="post" action="index.php?controller=HO&action=onSelectForm">
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