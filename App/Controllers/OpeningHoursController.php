<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Model\openingHour;

class OpeningHoursController extends AControllerBase
{

    public function index(): Response
    {
       $schedulle = openingHour::getAll();
       return $this->html($schedulle);
    }

    public function editSchedule(){
        $id = $this->request()->getValue('id');
        $changeTime = openingHour::getOne($id);
        $casOd = $_POST['startTime'];
        $casDo = $_POST['endTime'];
        if (isset($changeTime)){
            $changeTime->setStartTime($casOd);
            $changeTime->setEndTime($casDo);
            $changeTime->save('id',0);
        }
        return $this->redirect("?c=openingHours");
    }
}