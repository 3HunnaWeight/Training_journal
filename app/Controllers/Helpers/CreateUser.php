<?php

namespace App\Controllers\Helpers;

use App\Models\User;
use App\Validation\Helpers\InputsChek;
use App\Validation\Validation;
use App\View\Redirect;

class CreateUser
{
    static public function createUser($dataFromPOST)
    {
        Validation::validate($dataFromPOST);
        $user = new User();
        $user->setEmail($dataFromPOST["email"]);
        $user->setName($dataFromPOST["name"]);
        InputsChek::validatePassword($dataFromPOST['password'], $dataFromPOST['password_confirm']) ?
            $user->setPassword(password_hash($dataFromPOST['password'], PASSWORD_DEFAULT)) :
            Validation::setErrors("password", 'Пароли не совпадают');
        InputsChek::validateEmail($dataFromPOST['email']) ?
            Validation::setErrors("email", 'Неверный формат электронной почты') :
            null;
        if (Validation::hasError() === true) {
            Redirect::to("/register");
        } else {
            $user->addToDatabase();
            Redirect::to("/login");
        }
    }
}
