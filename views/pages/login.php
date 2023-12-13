<!DOCTYPE html>
<html lang="ru">

<head>
    <?php

    use App\Validation\Validation;

    $errors = Validation::getErrors();
    $savedInputs = Validation::getSavedInputs();
    require_once __DIR__ . "/../components/head.php";
    ?>
    <title>Document</title>
</head>

<body>
    <?php require_once __DIR__ . "/../components/nav.php" ?>
    <div class="container border p-5 mt-5">
        <form method="post" action="/loginAction">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" value="<?= isset($savedInputs['email']) ? htmlspecialchars($savedInputs['email']) : '' ?>" name="email" class="form-control <?= isset($errors['email']) ? "is-invalid" : '' ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                <?php if (isset($errors['email'])) {
                ?>
                    <div id="emailHelp" class="form-text"><?= $errors['email'] ?></div>
                <?php
                }
                ?>
            </div>
            <div class="mb-3">
                <label for="passwordRegisterField" class="form-label">Пароль</label>
                <input name="password" type="password" class="form-control  <?= isset($errors['password']) ? "is-invalid" : '' ?>" id="passwordRegisterField">
                <?php if (isset($errors['password'])) {
                ?>
                    <div id="passwordHelp" class="form-text"><?= $errors['password'] ?></div>
                <?php
                }
                ?>
            </div>
            <button type="submit" class="btn btn-primary">Логин</button>
        </form>
    </div>
</body>

</html>