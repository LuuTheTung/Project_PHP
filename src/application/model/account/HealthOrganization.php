<?php

class HealthOrganization extends Account
{

    private $HOName;
    private $specialization;

    function __construct($accountInfo)
    {
        parent::__construct($accountInfo);
        $this->HOName = $accountInfo['HOName'];
        $this->specialization = $accountInfo['specialization'];
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM ho');

        foreach ($req->fetchAll() as $item) {
            $list[] = new HealthOrganization($item);
        }

        return $list;
    }
}
