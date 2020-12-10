<?php
require_once('controller/UserControllerInterface.php');
require_once('model/data/form/FormDAO.php');
require_once('controller/BaseController.php');
require_once('model/account/Account.php');
require_once('model/data/analysis/StatisticsDAO.php');

class HOController implements UserControllerInterface
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
        BaseController::render('myFormHO');
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
        $formContent = array();
        $formContent['HOAccountID'] = $_SESSION['accountID'];
        $formContent['title'] = $_POST['formTitleCreation'];
        $formContent['description'] = $_POST['descriptionCreation'];
        $formContent['date'] = date("Y-m-d H:i:s");

        $target_dir = realpath("../uploads/form");
        $target_file = $target_dir . '/' . basename($_FILES["fileToUpload"]["name"]);
        $tmp_file = $_FILES["fileToUpload"]["tmp_name"];
        $formContent['content'] = "../uploads/form/" . $_FILES["fileToUpload"]["name"]; // potato

        move_uploaded_file($tmp_file, $target_file);
        chmod($target_file, 0777);
        echo "<script>alert('Created form!');</script>";
        FormDAOImpl::createForm($formContent);
    }

    public function onClickSubmitFormButton()
    {
        $this->makeForm();
        BaseController::render('myFormHO');
    }

    public function onClickMyStatisticsButton()
    {
        BaseController::render('myStatisticsHO');
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
    }

    public function makeStatistics()
    {
        $statisticsContent = array();
        $statisticsContent['HOAccountID'] = $_SESSION['accountID'];
        $statisticsContent['title'] = $_POST['statisticsTitleCreation'];
        $statisticsContent['description'] = $_POST['descriptionCreation'];
        $statisticsContent['date'] = date("Y-m-d H:i:s");

        $target_dir = realpath("../uploads/statistics/");
        $target_file = $target_dir . '/' . basename($_FILES["fileToUpload"]["name"]);
        $tmp_file = $_FILES["fileToUpload"]["tmp_name"];
        $statisticsContent['content'] = "../uploads/statistics/" . $_FILES["fileToUpload"]["name"]; // potato

        move_uploaded_file($tmp_file, $target_file);
        chmod($target_file, 0777);

        StatisticsDAO::insertStatistics($statisticsContent);
    }

    public function onClickSubmitStatisticsButton()
    {
        $this->makeStatistics();
        BaseController::render('homePage');
    }
}
