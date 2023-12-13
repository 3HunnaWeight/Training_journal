<div type="button" data-bs-toggle="modal" class="pen" data-bs-target="#ModalRedactExcercises<?= $exercise['id'] ?>">
    <img src="/assets/img/pen.png">
</div>
<div class="modal fade" id="ModalRedactExcercises<?= $exercise['id'] ?>" tabindex="-1" aria-labelledby="ModalRedactExcercises<?= $exercise['id'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalLabel<?= $exercise['id'] ?>">Редактировать упражнение</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/redactExerciseAction" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="label">Название упражнения</div>
                        <input value="<?= $exercise['title'] ?>" type="text" name="title">
                    </div>
                    <div class="form-group">
                        <div class="label">Количество подходов</div>
                        <input value="<?= $exercise['sets'] ?>" type="number" name="sets">
                    </div>
                    <div class="form-group">
                        <div class="label">Количество повторений</div>
                        <input value="<?= $exercise['reps'] ?>" type="number" name="reps">
                    </div>
                    <div class="form-group">
                        <div class="label">Вес</div>
                        <input value="<?= $exercise['weight'] ?>" type="number" name="weight">
                    </div>
                    <input type="hidden" name="exerciseId" value="<?= $exercise['id'] ?>">
                    <input type="hidden" name="dayId" value="<?= $id ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary exerciseButton">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>