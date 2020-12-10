<?php
class Account
{
    protected $accountID;
    protected $accountType;
    protected $username;
    protected $password;
    protected $phone;
    protected $address;

    function __construct($accountInfo)
    {
        $this->accountID = $accountInfo['accountID'];
        $this->accountType = $accountInfo['accountType'];
        $this->username = $accountInfo['username'];
        $this->password = $accountInfo['password'];
        $this->phone = $accountInfo['phone'];
        $this->address = $accountInfo['address'];
    }

    public function getAccountID()
    {
        return $this->accountID;
    }

    public function setAccountID($accountID)
    {
        $this->accountID = $accountID;
    }

    public function getAccountType()
    {
        return $this->accountType;
    }

    public function setAccountType($accountType)
    {
        $this->accountType = $accountType;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }
    public static function isValid($username, $password)
    {
        $db = DB::getInstance();
        $sql = "SELECT accountID,accountType,username,password FROM account WHERE UserName=:username and Password=:password";
        $query = $db->prepare($sql);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $accountID = $results['0']->accountID;
        $accountType = $results['0']->accountType;
        if ($query->rowCount() > 0) {
            $_SESSION['login'] = $username;
            $_SESSION['accountType'] = $accountType;
            $_SESSION['accountID'] = $accountID;
            return 1;
        } else {
            return 0;
        }
    }
}
