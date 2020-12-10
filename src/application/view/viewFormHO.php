<!DOCTYPE html>
<html>

<head>
	<title>HO: View Form</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../public/css/myForm.css">
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
				Warning: Declaring false information is a violation of Vietnamese law and may be subject to criminal handling
			</h6>
		</div>

		<div class="question">
			<h5>Q1: Do you have any of the followings at the present or during the past 14 days ?</h5>

			<div id="fever">Fever:</div>
			<input type="radio" id="yes" name="field-0" value="1">
			<label for="yes">Yes</label>
			<input type="radio" id="no" name="field-0" value="0">
			<label for="no">No</label><br>

			<div id="cough">Cough:</div>
			<input type="radio" id="yes" name="field-1" value="1">
			<label for="yes">Yes</label>
			<input type="radio" id="no" name="field-1" value="0">
			<label for="no">No</label><br>

			<div id="shortBreath">Short breath:</div>
			<input type="radio" id="yes" name="field-2" value="1">
			<label for="yes">Yes</label>
			<input type="radio" id="no" name="field-2" value="0">
			<label for="no">No</label><br>

			<div id="soreThroat">Sore throat:</div>
			<input type="radio" id="yes" name="field-3" value="1">
			<label for="yes">Yes</label>
			<input type="radio" id="no" name="field-3" value="0">
			<label for="no">No</label><br>

			<div id="vomiting">Vomiting:</div>
			<input type="radio" id="yes" name="field-4" value="1">
			<label for="yes">Yes</label>
			<input type="radio" id="no" name="field-4" value="0">
			<label for="no">No</label><br>

			<div id="diarrhea">Diarrhea:</div>
			<input type="radio" id="yes" name="field-5" value="1">
			<label for="yes">Yes</label>
			<input type="radio" id="no" name="field-5" value="0">
			<label for="no">No</label><br>

			<div id="skinHaemorrhage">Skin haemorrhage:</div>
			<input type="radio" id="yes" name="field-6" value="1">
			<label for="yes">Yes</label>
			<input type="radio" id="no" name="field-6" value="0">
			<label for="no">No</label><br>

			<div id="skinRash">Skin rash:</div>
			<input type="radio" id="yes" name="field-7" value="1">
			<label for="yes">Yes</label>
			<input type="radio" id="no" name="field-7" value="0">
			<label for="no">No</label><br>

			<div>List of vaccines or biologicals used:</div>

			<textarea id="w3review" name="field-8" rows="4" cols="50"></textarea>

			<div style="color: red">Please answer all the fields</div>
		</div>

		<div class="question">
			<h5>Q2 :History of exposure: During the last 14 days, did you?</h5>

			<div id="visit">Visit any poultry farm/ living animal market/ slaughter house/ contact to animal?</div>
			<input type="radio" id="yes" name="field-9" value="1">
			<label for="yes">Yes</label>
			<input type="radio" id="no" name="field-9" value="0">
			<label for="no">No</label><br>
			<div id="care">Care for a sick person of communicables diseases?</div>

			<input type="radio" id="yes" name="field-10" value="1">
			<label for="yes">Yes</label>
			<input type="radio" id="no" name="field-10" value="0">
			<label for="no">No</label><br>

			<div style="color: red">Please answer all the fields</div>
		</div>
	</div>

</body>

</html>