<?php
include_once 'FormDAOInterface.php';
include_once 'Form.php';
include_once 'MedicalForm.php';
include_once 'TravelForm.php';

class FormDAOImpl implements FormDAOInterface
{
    public static function getAllForms($content)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * from form');
        $req->execute();

        return $req->fetchAll();
    }

    public static function getForm($content)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * from form WHERE formID=' . $content['formID']);
        $req->execute();
        return new Form($req->fetch());
    }

    public static function getFilledForms()
    {
        // TODO: Implement getFilledForm() method.
    }

    public static function createForm($content)
    {
        $db = DB::getInstance();

        $req = $db->prepare('SELECT formID FROM form ORDER BY date DESC LIMIT 1');
        $req->execute();
        $formStrID = $req->fetch()['formID'];
        preg_match_all('!\d+!', $formStrID, $matches);
        $newID = (int) $matches[0][0] + 1;
        $formID = 'F' . $newID;

        $req = $db->prepare('INSERT INTO form (HOAccountID, formID, title, date, description, content) 
            VALUES (?, ?, ?, ?, ?, ?);');
        $req->execute([
            $content['HOAccountID'], $formID, $content['title'], $content['date'],
            $content['description'], $content['content']
        ]);
        return;
    }
}
