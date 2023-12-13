<?php

namespace App\Models;

use App\Service\Model;

class   TrainingEc extends Model
{
    protected string $table = "`training_ec`"; //sql не дает добавить в название "exercise"
    protected string $title;
    protected int $sets;
    protected int $reps;
    protected int $weight;
    protected int $training_day_id;

    protected int $id;
    protected array $fields = ['`title`', '`sets`', '`reps`', '`weight`', '`training_day_id`'];
    protected array $bins = [":title", ":sets", ":reps", ":weight", ":training_day_id"];
    protected array $forExecute = ["title", "sets", "reps", "weight", "training_day_id"];

    public function setTitle($value)
    {
        $this->title = $value;
    }
    public function setSets($value)
    {
        $this->sets = $value;
    }
    public function setReps($value)
    {
        $this->reps = $value;
    }
    public function setWeight($value)
    {
        $this->weight = $value;
    }
    public function setTrainingDayId($value)
    {
        $this->training_day_id = $value;
    }

    public function getTitle()
    {
        return  $this->title;
    }
    public function getSets()
    {
        return  $this->sets;
    }
    public function getReps()
    {
        return  $this->reps;
    }
    public function getWeight()
    {
        return  $this->weight;
    }
    public function getTrainingDayId()
    {
        return  $this->training_day_id;
    }
}
