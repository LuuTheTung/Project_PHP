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
            <div class="one-third column">
                <h4>Travel Form</h4>
            </div>
        </div>

        <div class="description">
            <h5>Description</h5>
            <h6>
                THIS IS IMPORTANT DOCUMENT, YOUR INFORMATION IS VITAL TO ALLOW HEALTH AUTHORITIES CONTACT YOU
                TO PREVENT COMMUNICABLE DISEASES
                <br />
                <br />
                Warning: Declaring false information is a violation of Vietnamese law and may be subject to criminal
                handling
            </h6>
        </div>

        <form name="myForm" action="index.php?controller=Citizen&action=onClickSubmitForm" method="post">
            <input type="hidden" name="formID" value="F02">
            <div class="question">
                <h5>Travel Information</h5>

                <div id="vehicle">Vehicle:</div>
                <input type="radio" id="car" name="field-0" value="car">
                <label for="car">Car</label>
                <input type="radio" id="plane" name="field-0" value="plane">
                <label for="plane">Plane</label>
                <input type="radio" id="ship" name="field-0" value="ship">
                <label for="ship">Ship</label>
                <input type="radio" id="other" name="field-0" value="other">
                <label for="other">Other Vehicle</label><br>

                <div>If vehicle is other, please specify:</div>
                <textarea id="w3review" name="field-1" rows="3" cols="60"></textarea>

                <div>License Plate:</div>
                <textarea id="w3review" name="field-2" rows="3" cols="60"></textarea>

                <div>Seat Number:</div>
                <textarea id="w3review" name="field-3" rows="3" cols="60"></textarea>

                <div id="startDate">Start Date:</div>
                <input type="date" id="startDate" name="field-4">

                <div id="endDate">End Date:</div>
                <input type="date" id="endDate" name="field-5">

                <div>Source Country</div>
                <textarea id="w3review" name="field-6" rows="3" cols="60"></textarea>

                <div>Destination Country</div>
                <textarea id="w3review" name="field-7" rows="3" cols="60"></textarea>

                <div>Source Address</div>
                <textarea id="w3review" name="field-8" rows="3" cols="60"></textarea>

                <div>Destination Address</div>
                <textarea id="w3review" name="field-9" rows="3" cols="60"></textarea>

                <div>During the past 14 days, which countries/territories did you visit?</div>
                <textarea id="w3review" name="field-10" rows="3" cols="60"></textarea>

                <div style="color: red">Please answer all the fields</div>
            </div>
            <div style="text-align: center">
                <?php if ($_SESSION['accountType'] != "ho") : ?>
                    <button type="submit" class="button-submit" value="Submit">Submit</button>
                <?php endif; ?>
            </div>
        </form>
    </div>

</body>

</html>