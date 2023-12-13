<?php

namespace App\Controllers\Helpers;

use App\Models\User;
use App\Validation\Validation;
use App\View\Redirect;

class FindUser
{

    public static function findUser($dataFromPOST)
    {
        Validation::validate($dataFromPOST);

        $user = (new User())->findInDatabase("email", $dataFromPOST["email"], false);
        if ($user) {
            if (password_verify($dataFromPOST['password'], $user->getPassword())) {
                $token = (Random::str(50));
                $user->updateInDatabase(['token' => $token]);
                setcookie('token', $token);
                Redirect::to('/');
                die();
            } else {
                Validation::setErrors('password', 'Пароль неверный');
                Redirect::to("/login");
            }
        } else {
            Validation::setErrors('email', 'Пользователь не найден');
            Redirect::to("/login");
        }
        if (Validation::hasError() === true) {
            Redirect::to("/login");
        } else {
        }
    }
}
