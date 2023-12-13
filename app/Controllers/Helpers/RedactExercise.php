<?php

namespace App\Controllers\Helpers;

use App\Auth\Auth;
use App\Models\TrainingDay;
use App\Models\TrainingEc;
use App\View\Redirect;

class RedactExercise
{
    static public function redactExercise($dataFromPost)
    {

        $exercise  = (new TrainingEc())->findInDatabase('id', $dataFromPost['exerciseId'], false);
        $day = new TrainingDay();
        $day->findInDatabase('id', $dataFromPost['dayId'], false);
        if (Auth::getUser()->getId() == $day->getUserId() && $day->getId() == $exercise->getTrainingDayId()) {
            if ($exercise) {
                $exercise->updateInDatabase(['title' => $dataFromPost['title'], 'reps' => $dataFromPost['reps'], 'sets' => $dataFromPost['sets'], 'weight' => $dataFromPost['weight'], 'id' => $dataFromPost['exerciseId']]);
                Redirect::to('/');
            }
        } else {
            echo 'STOP DO THIS!';
        }
    }
}
