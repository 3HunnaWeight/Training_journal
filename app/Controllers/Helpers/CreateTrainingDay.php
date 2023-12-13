<?php

namespace App\Controllers\Helpers;

use App\Auth\Auth;
use App\Models\TrainingDay;
use App\View\Redirect;

class CreateTrainingDay
{
    static public function createTrainingDay($dataFromPost)
    {
        if (strlen($dataFromPost["date_of_training"]) > 10) {
            Redirect::to("/");
            die();
        }
        foreach ($dataFromPost as $value) {
            if (empty($value)) {
                Redirect::to("/");
                die();
            }
        }
        $day = new TrainingDay();
        $day->setWeekday($dataFromPost["weekday"]);
        $day->setTrainingTitle($dataFromPost["training_title"]);
        $day->setDateOfTraining($dataFromPost["date_of_training"]);
        $day->setUserId(Auth::getUser()->getId());
        $day->addToDatabase();
        Redirect::to("/");
    }
}
