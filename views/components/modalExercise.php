<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalExcercises<?= $id ?>">
    Добавить Упражнение
</button>
<div class="modal fade" id="ModalExcercises<?= $id ?>" tabindex="-1" aria-labelledby="ModalExcercises<?= $id ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalLabel<?= $id ?>">Добавьте упражнение</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/addTrainExcerciseAction" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="label">Название упражнения</div>
                        <input type="text" name="title">
                    </div>
                    <div class="form-group">
                        <div class="label">Количество повторений</div>
                        <input value="0" type="number" name="reps">
                    </div>

                    <div class="form-group">
                        <div class="label">Количество подходов</div>
                        <input value="0" type="number" name="sets">
                    </div>

                    <div class="form-group">
                        <div class="label">Вес</div>
                        <input value="0" type="number" name="weight">
                    </div>
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