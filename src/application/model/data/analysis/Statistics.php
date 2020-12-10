<?php
class Statistics
{
    protected $HOAccountID, $statisticsID, $title, $description, $date, $contents;

    public function __construct($content)
    {
        $this->HOAccountID = $content['HOAccountID'];
        $this->statisticsID = $content['statisticsID'];
        $this->title = $content['title'];
        $this->description = $content['description'];
        $this->date = $content['date'];
        $this->contents = $content['statisticsID'];
    }

    /**
     * @return str HOAccountID
     */
    public function getHOAccountID()
    {
        return $this->HOAccountID;
    }

    /**
     * @return str statisticsID
     */
    public function getStatisticsID()
    {
        return $this->statisticsID;
    }

    /**
     * @return str title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return str title
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return str contents
     */
    public function getContents()
    {
        return $this->contents;
    }
}
