<?php

namespace App\Controllers\Helpers;

use App\Auth\Auth;
use App\Models\TrainingDay;
use App\View\Redirect;

class DeleteTrainingDay
{
    static public function deleteTrainingDay($dataFromPOST)
    {

        $day = new TrainingDay();
        $day->findInDatabase('id', $dataFromPOST['dayId'], false);
        if ($day->getUserId() === Auth::getUser()->getId()) {
            $day->deleteFromDatabase('id', $dataFromPOST['dayId']);
            Redirect::to('/');
        } else {
            echo 'stop do this';
            die();
        }
    }
}
