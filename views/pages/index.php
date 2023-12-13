<?php

use App\Auth\Auth;
use App\Controllers\DaysController;
use App\View\Redirect;
use App\View\View;

if (isset($_COOKIE['token'])) {
    $getDays = DaysController::findTrainingDays(Auth::getUser()->getId());
    $trainingDaysBelongsToUser =  array_reverse($getDays);

    if (isset($_COOKIE['search'])) {
        $getDays = DaysController::findTrainingDays(Auth::getUser()->getId(), true);
        $trainingDaysBelongsToUser =  array_reverse($getDays);
    }
} else {
    Redirect::to('login');
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <?php require_once __DIR__ . "/../components/head.php"; ?>
    <title>Document</title>
</head>

<body>
    <?= View::renderComponents('nav') ?>
    <main class="main">
        <?php isset($_COOKIE['search']) ? '' : View::renderComponents('modalTrainingDay');
        setcookie("search", "", time() - 3600, "/");
        ?>
        <div class="card-container">
            <?php
            if (count($trainingDaysBelongsToUser) == 0) {
            ?>
                <div class="card m-auto">
                    <div class="card-content">
                        <h1>Создай первую запись!</h1>
                        <h2>И отслеживай прогресс.</h2>
                    </div>
                </div>
            <?php
            }
            ?>
            <?php
            $counter = 0;
            foreach ($trainingDaysBelongsToUser as $day) {
                if ($counter >= 12) {
                    break;
                }
                $id = $day['id'];
                $excercisesBelongsToDay = DaysController::FindExercises($id);

            ?>
                <div class="card <?= count($trainingDaysBelongsToUser) < 2 ? 'm-auto' : '' ?>">
                    <div class="card-content">
                        <form action="deleteTrainingDayAction" method="post">
                            <input name="dayId" type="hidden" value="<?= $day['id'] ?>">
                            <input name="userId" type="hidden" value="<?= $day['user_id'] ?>">
                            <button type="submit" class="delete">&#10006;</button>
                        </form>
                        <h1><?= $day['weekday'] ?><div class="date"><?= $day['date_of_training'] ?></div>
                        </h1>
                        <h2><?= $day['training_title'] ?></h2>
                        <ul>
                            <?php
                            foreach ($excercisesBelongsToDay as $exercise) {
                            ?>
                                <li>
                                    <div class="li-content"><?= $exercise['title'] ?>. Подходов - <?= $exercise['sets'] ?>. Повторений - <?= $exercise['reps'] ?>. Вес - <?= $exercise['weight'] ?></div> <?php include __DIR__ . "/../components/moadalRedactExercise.php" ?>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <?php include __DIR__ . "/../components/modalExercise.php" ?>
                </div>
            <?php
                $counter++;
            }
            ?>
        </div>
        <?php
        if (count($trainingDaysBelongsToUser) > 3) {
        ?>
            <div class="control-btns">
                <button class="btn btn-primary" id="prevBtn">Назад</button>
                <button class="btn btn-primary" id="nextBtn">Вперед</button>
            </div>
        <?php
        }
        ?>

    </main>
    <script src="/assets/js/cardsSlider.js"></script>
</body>

</html>