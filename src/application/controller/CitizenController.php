<?php
require_once('controller/BaseController.php');
require_once('model/account/Citizen.php');
require_once('controller/UserControllerInterface.php');
require_once('model/data/form/FilledFormDAO.php');
require_once('model/data/form/FormDAO.php');
require_once('model/data/analysis/StatisticsDAO.php');
require_once('model/account/CitizenDAOImpl.php');

class CitizenController implements UserControllerInterface
{

    public function getAllForms()
    {
        return FormDAOImpl::getAllForms(null);
    }

    public function getAllStatistics()
    {
        return StatisticsDAO::getAllStatistics(null);
    }

    public function onClickMyFormButton()
    {
        BaseController::render('myForm');
    }

    public function onSelectForm()
    {
        $formList = $this->getAllForms();
        foreach ($formList as $form) {
            $formID = $form['formID'];
            $content = $form['content'];
            if (array_key_exists($formID, $_POST)) {
                $_SESSION['formTitle'] = $form['title'];
                $_SESSION['formDescription'] = $form['description'];
                $_SESSION['fillFormContent'] = $content;
            }
        }
        BaseController::render('fillForm');
    }

    public function makeForm()
    {
        $formID = $_POST['formID'];

        switch ($formID) {
            case 'F01':
                $key = array(
                    'fever', 'cough', 'shortBreath', 'soreThroat', 'vomit', 'diarrhea', 'skinBleeding',
                    'skinRash', 'usedMedicine', 'contactWildAnimal', 'contactCovidPatient'
                );
                break;
            case 'F02':
                $key = array(
                    'vehicle', 'otherVehicle', 'licensePlate', 'seatNumber', 'startDate', 'endDate',
                    'srcCountry', 'destCountry', 'srcLocation', 'destLocation', 'travelHistory'
                );
                break;
            default:
                $key = array();
        }

        $formContent = array();
        for ($i = 0; $i < count($key); $i++) {
            $formContent[$key[$i]] = $_POST["field-$i"];
        }

        $formContent['formID'] = $formID;
        $formContent['citizenAccountID'] = "C02";
        echo "Breakpoint";
        FilledFormDAOImpl::insertForm($formContent);
    }

    public function onClickMyStatisticsButton()
    {
        BaseController::render('myStatistics');
    }

    public function onSelectStatistics()
    {
        $statisticsList = $this->getAllStatistics();
        foreach ($statisticsList as $statistics) {
            $statisticsID = $statistics['statisticsID'];
            if (array_key_exists($statisticsID, $_POST)) {
                $_SESSION['statistics'] = $statistics;
                break;
            }
        }
        BaseController::render('viewStatistics');
    }

    public function onClickSubmitForm()
    {
        $this->makeForm();
        echo "<script>alert('Submit form successfully!');</script>";
        BaseController::render('homePage');
    }
    public function onClickViewInfo()
    {

        $data = CitizenDAOImpl::getCitizen($_SESSION['accountID']);
        BaseController::render('viewInfo', $data);
    }
    public function onClickUpdate()
    {
        $data = $_POST;
        CitizenDAOImpl::updateInfo($data);
        echo "<script>alert('Update info successfully!');</script>";
        echo "<script type='text/javascript'> document.location ='index.php?controller=Citizen&action=onClickViewInfo'; </script>";
    }
}
