<?php

namespace App\Controllers;


use App\Controllers\Helpers\CreateExercise;

use App\Controllers\Helpers\CreateTrainingDay;
use App\Controllers\Helpers\DeleteTrainingDay;
use App\Controllers\Helpers\RedactExercise;
use App\Models\TrainingDay;
use App\Models\TrainingEc;
use App\View\Redirect;

class DaysController
{
    static public function findTrainingDays($userId, $search = false,)
    {

        if (!$userId) {
            Redirect::to("/login");
            die();
        }
        if (!$search) {
            $days = new TrainingDay();
            return $days->findInDatabase('user_id', $userId, true, true, 12);
        } else {
            $days = new TrainingDay();
            return $days->findInDatabase('training_title', $_COOKIE['search'], true, false, false, true, $userId);
        }
    }
    static public function FindExercises($key)
    {
        $exersises = new TrainingEc();
        return $exersises->findInDatabase('training_day_id', $key);
    }

    static public function addTrainingDay()
    {

        CreateTrainingDay::createTrainingDay($_POST);
    }
    static public function addTrainingExcercise()
    {
        CreateExercise::createExercise($_POST);
    }
    static public function redactExercise()
    {
        RedactExercise::redactExercise($_POST);
    }
    static public function searchTrainingDay()
    {
        setcookie('search', $_POST['search']);
        Redirect::to('/');
    }
    static public function deleteTrainingDay()
    {
        DeleteTrainingDay::deleteTrainingDay($_POST);
    }
}
