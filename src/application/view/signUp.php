<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sign Up An Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/signIn.css">
</head>

<body>

    <div class="row" style="margin-top: 120px;  ">
        <div class="one-third column">

        </div>
        <div class="one-third column">
            <div class="sign-in">

                <form name="myForm" action="index.php?controller=Authentication&action=onClickSubmitSignUpButton" onsubmit="return validateForm()" method="post">
                    <label for="firstName">
                        First Name:
                    </label>
                    <input type="text" id="firstName" placeholder="Enter your first name" name="firstName" pattern="{a-zA-Z}" >
                    <br>

                    <label for="lastName">
                        Last Name:
                    </label>
                    <input type="text" id="lastName" placeholder="Enter your last name" name="lastName" pattern="{a-zA-Z}" >
                    <br>

                    <label for="citizenID">
                        <i class="fas fa-id-card"></i> Citizen ID:
                    </label>
                    <input type="text" id="citizenID" placeholder="Enter your citizen id" name="citizenID" >
                    <br>

                    <label for="username">
                        <i class="fa fa-user" aria-hidden="true"></i> Username:
                    </label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" >
                    <br>

                    <label for="password">
                        <i class="fa fa-key"></i>Password:
                    </label>
                    <input type="password" id="password" placeholder="Enter your password" name="password" >

                    <label for="DoB">
                        <i class="fas fa-birthday-cake"></i> Date of birth:
                    </label>
                    <input type="date" id="DoB" name="DoB">
                    <br>

                    <label for="phone">
                        <i class="fas fa-phone"></i>Phone:
                    </label>
                    <input type="text" id="phone" placeholder="Enter your phone: " name="phone"  >

                    <label for="address">
                        <i class="fas fa-map-marked"></i>Address:
                    </label>
                    <input type="text" id="address" placeholder="Enter your address" name="address" >

                    <label for="jobTitle">
                        Job Title:
                    </label>
                    <input type="text" id="jobTitle" placeholder="Enter your job Title" name="jobTitle" >
                    <br>


                    <div style="text-align: center; padding-top: 12px">
                        <button type="submit" class="button-submit" value="Submit">Submit</button>
                        <button type="reset" class="button-reset" value="Reset">Reset</button>
                    </div>
                </form>
            </div>

        </div>
        <div class="one-third column">

        </div>
    </div>
    <script>
        function validateForm() {
            
    
            var phonecheck_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            var phonevalue = document.myForm.phone.value;
            if (phonecheck_regex.test(phonevalue) == false) 
        {
            alert('Invalid phone number! Phone has 10 digits');
            return false;
        }
            
            if(document.myForm.firstName.value == ""){
                alert("Fill in first name!");
                return false;             
            }
            if(document.myForm.lastName.value == ""){
                alert("Fill in last name!");
                return false;             
            }
            if(document.myForm.citizenID.value == ""){
                alert("Fill in citizen id!");
                return false;             
            }
            if(document.myForm.username.value == ""){
                alert("Fill in username!");
                return false;                
            }
            if(document.myForm.password.value == ""){
                alert("Fill in password!");
                return false;               
            }
            if(document.myForm.phone.value == ""){
                alert("Fill in phone!");
                return false;              
            }
            if(document.myForm.address.value == ""){
                alert("Fill in address!");
                return false;                
            }
            if(document.myForm.jobTitle.value == ""){
                alert("Fill in job title!");
                return false;             
            }

            if(document.myForm.password.value.length < 6){
                alert("Password has at least 6 digit!");
                return false; 
            }

            if(document.myForm.username.value.length < 6){
                alert("Username has at least 6 digit!");
                return false; 
            }

        }
    </script> 
</body>

</html>