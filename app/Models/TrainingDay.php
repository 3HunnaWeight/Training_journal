<?php

namespace App\Models;

use App\Service\Model;

class   TrainingDay extends Model
{
    protected string $table = "`training_day`";
    protected string $weekday;
    protected string $training_title;
    protected $date_of_training;
    protected int $id;
    protected int $user_id;

    protected array $fields = ['`weekday`', '`training_title`', '`date_of_training`', '`user_id`'];
    protected array $bins = [":weekday", ":training_title", ":date_of_training", ":user_id"];
    protected array $forExecute = ["weekday", "training_title", "date_of_training", "user_id"];
    public function setWeekday($value)
    {
        $this->weekday = $value;
    }
    public function setTrainingTitle($value)
    {
        $this->training_title = $value;
    }
    public function setDateOfTraining($value)
    {
        $this->date_of_training = $value;
    }
    public function setUserId($value)
    {
        $this->user_id = $value;
    }
    public function getWeekday()
    {
        return  $this->weekday;
    }
    public function getTrainingTitle()
    {
        return  $this->training_title;
    }
    public function getDateOfTraining()
    {
        return  $this->date_of_training;
    }
    public function getUserId()
    {
        return  $this->user_id;
    }
    public function getId()
    {
        return  $this->id;
    }
}
