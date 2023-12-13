<!DOCTYPE html>
<html lang="ru">

<head>
    <?php require_once __DIR__ . "/../components/head.php";

    use App\Validation\Validation;

    $errors = Validation::getErrors();
    $savedInputs = Validation::getSavedInputs();
    ?>
    <title>Document</title>
</head>

<body>
    <?php require_once __DIR__ . "/../components/nav.php" ?>
    <div class="container border p-5 mt-5">
        <form method="post" action="/registerAction">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="email" value="<?= isset($savedInputs['email']) ? htmlspecialchars($savedInputs['email']) : '' ?>" class="form-control <?= isset($errors['email']) ? "is-invalid" : '' ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                <?php if (isset($errors['email'])) {
                ?>
                    <div id="emailHelp" class="form-text"><?= $errors['email'] ?></div>
                <?php
                }
                ?>
            </div>
            <div class="mb-3">
                <label for="fullNameField" class="form-label">Имя</label>
                <input name="name" value="<?= isset($savedInputs['name']) ? htmlspecialchars($savedInputs['name']) : '' ?>" class="form-control  <?= isset($errors['name']) ? "is-invalid" : '' ?>" type="text" class="form-control" id="fullNameField" aria-describedby="emailHelp">
                <?php if (isset($errors['name'])) {
                ?>
                    <div id="emailHelp" class="form-text"><?= $errors['name'] ?></div>
                <?php
                }
                ?>
            </div>
            <div class="mb-3">
                <label for="passwordRegisterField" class="form-label">Пароль <div style="display:inline-block">(больше 5 символов)</div></label>
                <input name="password" type="password" class="form-control  <?= isset($errors['password']) ? "is-invalid" : '' ?> " id="passwordRegisterField">
                <?php if (isset($errors['password'])) {
                ?>
                    <div id="emailHelp" class="form-text"><?= $errors['password'] ?></div>
                <?php
                }
                ?>
            </div>
            <div class="mb-3">
                <label for="passwordConfirmField" class="form-label">Подтверждение пароля</label>
                <input name="password_confirm" type="password" class="form-control" id="passwordConfirmField">
            </div>
            <button type="submit" class="btn btn-primary">Создать аккаунт</button>
        </form>
    </div>
</body>

</html>