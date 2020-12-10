<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>View Citizen Info</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/signIn.css">
</head>

<body>

    <div class="row" style="margin-top: 120px;  ">
        <div class="one-third column">

        </div>
        <?php
        echo '<div class="one-third column">
                <div class="sign-in">

                    <form name="myForm"  action="index.php?controller=Citizen&action=onClickUpdate" method="post">
                        <label for="firstName" >
                            First Name:     
                        </label>
                        <input  type="text" id="firstName" placeholder="Enter your first name" value ="' . $data['firstName'] . '" name="firstName"  pattern="{a-zA-Z}" required>
                        <br>

                        <label for="lastName" >
                            Last Name:      
                        </label>
                        <input  type="text" id="lastName" placeholder="Enter your last name" value ="' . $data['lastName'] . '"name="lastName" pattern="{a-zA-Z}" required>
                        <br>

                        <label for="citizenID" >
                            <i class="fas fa-id-card"></i> Citizen ID:
                        </label>
                        <input  type="text" id="citizenID" placeholder="Enter your citizen id" value ="' . $data['citizenID'] . '" name="citizenID" required>
                        <br>

                        <label for="DoB" >
                            <i class="fas fa-birthday-cake"></i> Date of birth:
                        </label>
                        <input  type="date" id="DoB" value ="' . $data['DoB'] . '" name="DoB">
                        <br>
                        
                        <label for="phone" >
                            <i class="fas fa-phone"></i>Phone:
                        </label>
                        <input type="text" id="phone" placeholder="Enter your phone: " value ="' . $data['phone'] . '" name="phone" pattern="[0][0-9]{9}" required>
                        <br>
                        
                        <label for="address" >
                            <i class="fas fa-map-marked"></i>Address:
                        </label>
                        <input  type="text" id="address" placeholder="Enter your address" value ="' . $data['address'] . '" name="address" required>
                        <br>

                        <label for="jobTitle" >
                            Job Title:
                        </label>
                        <input  type="text" id="jobTitle" placeholder="Enter your job Title" value ="' . $data['jobTitle'] . '" name="jobTitle" required>
                        <br>
                        <div style="text-align: center; padding-top: 12px">
                            <button type="submit" class="button-submit" value="Submit">Submit changes</button>
                            <button type="reset" class="button-reset" value="Reset">Reset</button>
                        </div>
                    </form>
                </div>

            </div>'
        ?>
        <div class="one-third column">

        </div>
    </div>
</body>

</html>