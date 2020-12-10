<?php
include_once 'AccountDAOImpl.php';
include_once 'Citizen.php';
include_once 'AccountCreationDAO.php';
include_once 'CitizenDAO.php';
class CitizenDAOImpl implements AccountCreationDAO, CitizenDAO
{
    public static function create($account)
    {
        AccountDAOImpl::create($account);
        $accountID = $account->getAccountID();
        $HOAccountID = 'H01';
        $citizenID = $account->getCitizenID();
        $firstName = $account->getFirstName();
        $lastName = $account->getLastName();
        $jobTitle = $account->getJobTitle();
        $DoB = $account->getDoB();
        $db = DB::getInstance();
        $sql = "INSERT INTO citizen (accountID,HOAccountID,citizenID, firstName, lastName, jobTitle, DoB) VALUES (?,?,?,?,?,?,?)";
        $db->prepare($sql)->execute([$accountID, $HOAccountID, $citizenID, $firstName, $lastName, $jobTitle, $DoB]);
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
