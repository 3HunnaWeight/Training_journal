<?php

namespace App\Controllers\Helpers;

use App\Auth\Auth;
use App\Models\TrainingDay;
use App\Models\TrainingEc;
use App\View\Redirect;

class CreateExercise
{
    static public function createExercise($dataFromPost)
    {


        foreach ($dataFromPost as $value) {
            if (empty($value)) {
                Redirect::to("/");
                die();
            }
        }
        $day = new TrainingDay();
        $day->findInDatabase('id', $dataFromPost['dayId'], false);
        if ($day->getUserId() === Auth::getUser()->getId()) {
            $execrcise = new TrainingEc();
            $execrcise->setTitle($dataFromPost['title']);
            $execrcise->setSets($dataFromPost['sets']);
            $execrcise->setReps($dataFromPost['reps']);
            $execrcise->setWeight($dataFromPost['weight']);
            $execrcise->setTrainingDayId($dataFromPost['dayId']);
            $execrcise->addToDatabase();
            Redirect::to('/');
        } else {
            echo 'STOP DO THIS';
        }
    }
}
