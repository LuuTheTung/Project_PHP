<?php
include_once 'Form.php';

class MedicalForm extends FilledForm
{
    private $medicalInfo;
    private $usedMedicine;
    private $contactWildAnimal;
    private $contactCovidPatient;

    public function __construct($formNumberID, $formInfo)
    {
        if (!is_null($formNumberID)) {
            $this->formID = $formNumberID;
        } else {
            $this->formID = $formInfo['formNumberID'];
        }

        $this->medicalInfo = [];
        $this->medicalInfo['fever'] = $formInfo['fever'];
        $this->medicalInfo['cough'] = $formInfo['cough'];
        $this->medicalInfo['shortBreath'] = $formInfo['shortBreath'];
        $this->medicalInfo['soreThroat'] = $formInfo['soreThroat'];
        $this->medicalInfo['vomit'] = $formInfo['vomit'];
        $this->medicalInfo['diarrhea'] = $formInfo['diarrhea'];
        $this->medicalInfo['skinBleeding'] = $formInfo['skinBleeding'];
        $this->medicalInfo['skinRash'] = $formInfo['skinRash'];
        $this->usedMedicine = $formInfo['usedMedicine'];
        $this->contactWildAnimal = $formInfo['contactWildAnimal'];
        $this->contactCovidPatient = $formInfo['contactCovidPatient'];
    }

    /**
     * @return array contain medicalInfo of patient (including fever, cough, etc.)
     */
    public function getMedicalInfo()
    {
        return $this->medicalInfo;
    }

    /**
     * @return string contains medicine info of citizen
     */
    public function getUsedMedicine()
    {
        return $this->usedMedicine;
    }

    /**
     * @return boolean indicate whether citizen contact wild animal
     */
    public function getContactWildAnimal()
    {
        return $this->contactWildAnimal;
    }

    /**
     * @return boolean indicate whether citizen contact COVID patient
     */
    public function getContactCovidPatient()
    {
        return $this->contactCovidPatient;
    }
}
