<?php
class Form
{
    protected $HOAccountID;
    protected $formID;
    protected $title, $createdDate, $description;
    protected $pathToHTMLForm;

    public function __construct($formInfo)
    {
        $this->HOAccountID = $formInfo['HOAccountID'];
        $this->formID = $formInfo['formID'];
        $this->title = $formInfo['title'];
        $this->createdDate = $formInfo['date'];
        $this->description = $formInfo['description'];
        $this->pathToHTMLForm = $formInfo['content'];
    }
}

abstract class FilledForm
{
    protected $formType; // Form class
    protected $formID;

    /**
     * @return int formID (aka ID of filledForm)
     */
    public function getFormID()
    {
        return $this->formID;
    }
}
