<?php
include_once 'Statistics.php';

class StatisticsDAO
{
    public static function getAllStatistics($content)
    {
        $db = DB::getInstance();
        $req = $db->prepare("select * from statistics");
        $req->execute();

        return $req->fetchAll();
    }

    public static function getStatistics($content)
    {
        $statisticsID = $content['statisticsID'];
        $db = DB::getInstance();
        $req = $db->prepare("select * from statistics where statisticsID = '$statisticsID'");
        $req->execute();

        return $req->fetch();
    }

    public static function insertStatistics($content)
    {
        $db = DB::getInstance();

        $req = $db->prepare('SELECT statisticsID FROM statistics ORDER BY date DESC LIMIT 1');
        $req->execute();
        $statisticsStrID = $req->fetch()['statisticsID'];
        preg_match_all('!\d+!', $statisticsStrID, $matches);
        $newID = (int) $matches[0][0] + 1;
        $statisticsID = 'S' . $newID;

        $req = $db->prepare('INSERT INTO statistics (HOAccountID, statisticsID, title, date, description,  
            content) VALUES (?, ?, ?, ?, ?, ?);');
        $req->execute([
            $content['HOAccountID'], $statisticsID, $content['title'], $content['date'],
            $content['description'], $content['content']
        ]);
        return;
    }

    public static function QueryMedicalData($content)
    {
        $startDate = $content['startDate'];
        $endDate = $content['endDate'];

        $db = DB::getInstance();
        $req = $db->prepare("SELECT * FROM medicalform WHERE date BETWEEN FROM_UNIXTIME($startDate) 
            AND FROM_UNIXTIME($endDate)");
        $req->execute();

        $rawQueryData = $req->fetchAll();
        $keyList = array_keys($rawQueryData[0]);
        $queryData = array();
        foreach ($keyList as $key) {
            $queryData[$key] = 0;
        }
        foreach ($rawQueryData as $row) {
            foreach ($keyList as $key) {
                $queryData[$key] += $row[$key];
            }
        }

        $filepath = $content['filepath'];
        $filename = 'MedicalData_' . date('Y-m-d-H:i:s');
        $file = fopen($filepath . $filename, "w") or die("Unable to open file!");
        fwrite($file, "Field Number\n");
        foreach ($keyList as $key) {
            $text = $key . " " . $queryData[$key] . "\n";
            fwrite($file, $text);
        }
        fclose($file);
    }
}
