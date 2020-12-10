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
                <h4>COVID-19 Daily</h4>
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
            <input type="hidden" name="formID" value="F01">
            <div class="question">
                <h5>Q1: Do you have any of the followings at the present or during the past 14 days ?</h5>

                <div id="fever">Fever:</div>
                <label class="container">Yes
                    <input type="radio" name="field-0" value="1" id="yes">
                    <span class="checkmark"></span>
                </label>
                <label class="container">No
                    <input type="radio" checked="checked" name="field-0" value="0" id="no">
                    <span class="checkmark"></span>
                </label>
                <br>
                <div id="cough">Cough:</div>
                <label class="container">Yes
                    <input type="radio" name="field-1" value="1" id="yes">
                    <span class="checkmark"></span>
                </label>
                <label class="container">No
                    <input type="radio" checked="checked" name="field-1" value="0" id="no">
                    <span class="checkmark"></span>
                </label>
                <br>
                <div id="shortBreath">Short breath:</div>
                <label class="container">Yes
                    <input type="radio" name="field-2" value="1" id="yes">
                    <span class="checkmark"></span>
                </label>
                <label class="container">No
                    <input type="radio" checked="checked" name="field-2" value="0" id="no">
                    <span class="checkmark"></span>
                </label>
                <br>
                <div id="soreThroat">Sore throat:</div>
                <label class="container">Yes
                    <input type="radio" name="field-3" value="1" id="yes">
                    <span class="checkmark"></span>
                </label>
                <label class="container">No
                    <input type="radio" checked="checked" name="field-3" value="0" id="no">
                    <span class="checkmark"></span>
                </label>
                <br>
                <div id="vomiting">Vomiting:</div>
                <label class="container">Yes
                    <input type="radio" name="field-4" value="1" id="yes">
                    <span class="checkmark"></span>
                </label>
                <label class="container">No
                    <input type="radio" checked="checked" name="field-4" value="0" id="no">
                    <span class="checkmark"></span>
                </label>
                <br>
                <div id="diarrhea">Diarrhea:</div>
                <label class="container">Yes
                    <input type="radio" name="field-5" value="1" id="yes">
                    <span class="checkmark"></span>
                </label>
                <label class="container">No
                    <input type="radio" checked="checked" name="field-5" value="0" id="no">
                    <span class="checkmark"></span>
                </label>
                <br>
                <div id="skinHaemorrhage">Skin bleeding:</div>
                <label class="container">Yes
                    <input type="radio" name="field-6" value="1" id="yes">
                    <span class="checkmark"></span>
                </label>
                <label class="container">No
                    <input type="radio" checked="checked" name="field-6" value="0" id="no">
                    <span class="checkmark"></span>
                </label>
                <br>
                <div id="skinRash">Skin rash:</div>
                <label class="container">Yes
                    <input type="radio" name="field-7" value="1" id="yes">
                    <span class="checkmark"></span>
                </label>
                <label class="container">No
                    <input type="radio" checked="checked" name="field-7" value="0" id="no">
                    <span class="checkmark"></span>
                </label>
                <br>
                <div>List of vaccines or biological used:</div>
                <textarea id="w3review" name="field-8" rows="4" cols="50"></textarea>
                <div style="color: red">Please answer all the fields</div>
            </div>

            <div class="question">
                <h5>Q2 :History of exposure: During the last 14 days, did you?</h5>

                <div id="visit">Visit any poultry farm/ living animal market/ slaughter house/ contact to animal?</div>
                <label class="container">Yes
                    <input type="radio" name="field-9" value="1" id="yes">
                    <span class="checkmark"></span>
                </label>
                <label class="container">No
                    <input type="radio" checked="checked" name="field-9" value="0" id="no">
                    <span class="checkmark"></span>
                </label>
                <br>
                <div id="care">Care for a sick person of communicable diseases?</div>
                <label class="container">Yes
                    <input type="radio" name="field-10" value="1" id="yes">
                    <span class="checkmark"></span>
                </label>
                <label class="container">No
                    <input type="radio" checked="checked" name="field-10" value="0" id="no">
                    <span class="checkmark"></span>
                </label>
                <br>
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