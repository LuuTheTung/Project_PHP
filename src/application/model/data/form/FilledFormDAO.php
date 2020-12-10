<?php
include_once 'FormDAOInterface.php';
include_once 'Form.php';
include_once 'MedicalForm.php';
include_once 'TravelForm.php';
include_once '../../../connection.php';

class FilledFormDAOImpl implements FormDAOInterface
{
    public static function getAllForms($content)
    {
        $userID = $content['userID'];
        $db = DB::getInstance();
        $req = $db->prepare("select * from citizenform where citizenAccountID = '$userID'");
        $req->execute();

        return $req->fetchAll();
    }

    public static function getForm($formID)
    {
        $db = DB::getInstance();
        $req = $db->prepare("select * from citizenform where formNumberID = $formID");
        $req->execute();
        $content = $req->fetch();

        return FilledFormDAOImpl::parseForm($content);
    }

    public static function insertForm($content)
    {
        $db = DB::getInstance();

        $req = $db->prepare("INSERT INTO citizenform (formID, citizenAccountID, date) VALUES (?, ?, ?);");
        $req->execute([$content['formID'], $content['citizenAccountID'], $content['date']]);

        $req2 = $db->prepare("SELECT LAST_INSERT_ID();");
        $req2->execute();
        $formNumberID = $req2->fetch()[0];

        switch ($content["formID"]) {
            case "F01":
                $form = new MedicalForm($formNumberID, $content);
                FilledFormDAOImpl::fillMedicalForm($form);
                break;
            case "F02":
                $form = new TravelForm($formNumberID, $content);
                FilledFormDAOImpl::fillTravelForm($form);
                break;
            default:
                throw new Exception("Invalid form type");
        }
        return true;
    }

    public static function fillTravelForm($form)
    {
        $formID = $form->getFormID();
        $vehicleInfo = $form->getVehicleInfo();
        $startDate = $form->getStartDate();
        $endDate = $form->getEndDate();
        $srcAddress = $form->getSrcAddress();
        $destAddress = $form->getDestAddress();
        $travelHistory = $form->getTravelHistory();

        $db = DB::getInstance();

        $req = $db->prepare("INSERT INTO travelform (formID, vehicle, otherVehicle, licensePlate, 
                        seatNumber, startDate, endDate, srcCountry, destCountry, srcLocation, destLocation, travelHistory) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        return $req->execute([
            $formID, $vehicleInfo['vehicle'], $vehicleInfo['otherVehicle'],
            $vehicleInfo['licensePlate'], $vehicleInfo['seatNumber'], $startDate, $endDate, $srcAddress['srcCountry'],
            $destAddress['destCountry'], $srcAddress['srcLocation'], $destAddress['destLocation'], $travelHistory
        ]);
    }

    public static function fillMedicalForm($form)
    {
        $formID = $form->getFormID();
        $medicalInfo = $form->getMedicalInfo();
        $usedMedicine = $form->getUsedMedicine();
        $contactWildAnimal = $form->getContactWildAnimal();
        $contactCovidPatient = $form->getContactCovidPatient();

        $db = DB::getInstance();
        $req = $db->prepare("INSERT INTO medicalform (formID, fever, cough, shortBreath, soreThroat, vomit, 
                         diarrhea, skinBleeding, skinRash, usedMedicine, contactWildAnimal, contactCovidPatient) 
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        return $req->execute([
            $formID, $medicalInfo['fever'], $medicalInfo['cough'], $medicalInfo['shortBreath'],
            $medicalInfo['soreThroat'], $medicalInfo['vomit'], $medicalInfo['diarrhea'], $medicalInfo['skinBleeding'],
            $medicalInfo['skinRash'], $usedMedicine, $contactWildAnimal, $contactCovidPatient
        ]);
    }

    public static function parseForm($content)
    {
        $formNumberID = $content["formNumberID"];
        $db = DB::getInstance();
        switch ($content["formID"]) {
            case "F01":
                $req = $db->prepare("select * from medicalform where formID = $formNumberID");
                $req->execute();
                $formContent = $req->fetch();
                $form = new MedicalForm($formNumberID, $formContent);
                break;
            case "F02":
                $req = $db->prepare("select * from travelform where formID = $formNumberID");
                $req->execute();
                $formContent = $req->fetch();
                print_r($formContent);
                $form = new TravelForm($formNumberID, $formContent);
                break;
            default:
                throw new Exception("Invalid form type");
        }
        return $form;
    }
}
