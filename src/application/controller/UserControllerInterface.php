<?php
interface UserControllerInterface
{
    public function getAllForms();

    public function getAllStatistics();

    public function onClickMyFormButton();

    public function onSelectForm();

    public function makeForm();

    public function onClickMyStatisticsButton();

    public function onSelectStatistics();
}
