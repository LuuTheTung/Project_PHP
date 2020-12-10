<?php
include_once 'Account.php';
include_once 'AccountCreationDAO.php';
include_once 'AccountExistantDAO.php';

class AccountDAOImpl implements AccountCreationDAO, AccountExistantDAO
{
    public static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM account');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Account($item['accountID'], $item['accountType'], $item['username'], $item['password'], $item['phone'], $item['address']);
        }

        return $list;
    }

    public static function create($account)
    {
        $account->setAccountID(uniqid('C'));
        $account->setAccountType('citizen');
        print_r($account);
        $accountID = $account->getAccountID();
        $accountType = $account->getAccountType();
        $username = $account->getUsername();
        $password = $account->getPassword();
        $phone = $account->getPhone();
        $address = $account->getAddress();
        $db = DB::getInstance();
        $sql = "INSERT INTO account (accountID, accountType, username, password, phone, address) VALUES (?,?,?,?,?,?)";
        $db->prepare($sql)->execute([$accountID, $accountType, $username, $password, $phone, $address]);
    }

    public static function exist($account)
    {
        $username = $account->getUsername();
        $phone = $account->getPhone();
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM account');
        $result = $req->fetchAll();
        foreach ($result as $item) {
            if ($item['username'] == $username) {
                return 0;
            } else if ($item['phone'] == $phone) {
                return -1;
            }
        }
        return 1;
    }
}
