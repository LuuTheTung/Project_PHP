<?php
include_once 'Form.php';

class TravelForm extends FilledForm
{
    private $vehicleInfo;

    private $startDate;
    private $endDate;

    private $srcAddress;
    private $destAddress;

    private $travelHistory;

    public function __construct($formNumberID, $formInfo)
    {
        if (!is_null($formNumberID)) {
            $this->formID = $formNumberID;
        } else {
            $this->formID = $formInfo['formNumberID'];
        }

        $this->vehicleInfo = [];
        $this->vehicleInfo['vehicle'] = $formInfo['vehicle'];
        $this->vehicleInfo['otherVehicle'] = $formInfo['otherVehicle'];
        $this->vehicleInfo['licensePlate'] = $formInfo['licensePlate'];
        $this->vehicleInfo['seatNumber'] = $formInfo['seatNumber'];

        $this->startDate = $formInfo['startDate'];
        $this->endDate = $formInfo['endDate'];

        $this->srcAddress = [];
        $this->srcAddress['srcCountry'] = $formInfo['srcCountry'];
        $this->srcAddress['srcLocation'] = $formInfo['srcLocation'];

        $this->destAddress = [];
        $this->destAddress['destCountry'] = $formInfo['destCountry'];
        $this->destAddress['destLocation'] = $formInfo['destLocation'];

        $this->travelHistory = $formInfo['travelHistory'];
    }

    /**
     * @return array contain vehicleInfo
     */
    public function getVehicleInfo()
    {
        return $this->vehicleInfo;
    }

    /**
     * @return startDate of travel
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return endDate of travel
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @return array contain srcCountry and srcLocation
     */
    public function getSrcAddress()
    {
        return $this->srcAddress;
    }

    /**
     * @return array contain destCountry and destLocation
     */
    public function getDestAddress()
    {
        return $this->destAddress;
    }

    /**
     * @return string indicates travelHistory
     */
    public function getTravelHistory()
    {
        return $this->travelHistory;
    }
}
