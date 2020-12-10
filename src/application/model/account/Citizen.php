<?php
include_once 'Account.php';

class Citizen extends Account
{
    protected $citizenID;
    protected $firstName;
    protected $lastName;
    protected $jobTitle;
    protected $DoB;

    public function getCitizenID()
    {
        return $this->citizenID;
    }

    public function setCitizenID($citizenID)
    {
        $this->citizenID = $citizenID;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;
    }

    public function getDoB()
    {
        return $this->DoB;
    }

    public function setDoB($DoB)
    {
        $this->DoB = $DoB;
    }
    function __construct($accountInfo)
    {
        parent::__construct($accountInfo);
        $this->citizenID = $accountInfo['citizenID'];
        $this->firstName = $accountInfo['firstName'];
        $this->lastName = $accountInfo['lastName'];
        $this->jobTitle = $accountInfo['jobTitle'];
        $this->DoB = $accountInfo['DoB'];
    }

    public static function getCitizen($accountID)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM citizen WHERE accountID = '$accountID'");
        $list = $req->fetchAll();
        $req = $db->query("SELECT * FROM account WHERE accountID = '$accountID'");
        $list_2 = $req->fetchAll();

        $data = array(
            'phone' => $list_2[0]['phone'],
            'address' => $list_2[0]['address'],
            'citizenID' => $list[0]['citizenID'],
            'firstName' => $list[0]['firstName'],
            'lastName' => $list[0]['lastName'],
            'jobTitle' => $list[0]['jobTitle'],
            'DoB' => $list[0]['DoB']
        );
        return $data;
    }

    public static function updateInfo($data)
    {
        $phone = $data['phone'];
        $address = $data['address'];
        $citizenID = $data['citizenID'];
        $firstName = $data['firstName'];
        $lastName = $data['lastName'];
        $jobTitle = $data['jobTitle'];
        $DoB = $data['DoB'];
        $db = DB::getInstance();
        $sql = "UPDATE account SET phone= ?, address= ? where accountID= ?";
        $db->prepare($sql)->execute([$phone, $address, $_SESSION['accountID']]);
        $sql = "UPDATE citizen SET firstName= ?, lastName= ?, citizenID= ?, jobTitle=?, DoB=? where accountID= ?";
        $db->prepare($sql)->execute([$firstName, $lastName, $citizenID, $jobTitle, $DoB, $_SESSION['accountID']]);
    }
}
