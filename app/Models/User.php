<?php

namespace App\Models;

use App\Service\Model;

class   User extends Model
{
    protected string $table = "`users`";
    protected int $id;
    protected string $email;
    protected string $name;
    protected string $password;
    protected  $token = null;
    protected array $fields = ['`name`', '`email`', '`password`', '`token`'];
    protected array $bins = [":name", ":email", ":password", ":token"];
    protected array $forExecute  = ["name", "email", "password", "token"];

    public function setName($value)
    {
        $this->name = $value;
    }
    public function setEmail($value)
    {
        $this->email = $value;
    }
    public function setPassword($value)
    {
        $this->password = $value;
    }
    public function getName()
    {
        return  $this->name;
    }
    public function getEmail()
    {
        return  $this->email;
    }
    public function getPassword()
    {
        return  $this->password;
    }
    public function getId()
    {
        return  $this->id;
    }
}
