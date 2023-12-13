<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Добавить тренеровку
</button>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Добавьте тренеровочный день</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/addTrainAction" method="post">
                    <div class="form-group">
                        <div class="label">День недели</div>
                        <input type="text" name="weekday">
                    </div>
                    <div class="form-group">
                        <div class="label">Название тренеровки</div>
                        <input type="text" name="training_title">
                    </div>
                    <div class="form-group">
                        <div class="label">Дата тренеровки</div>
                        <input type="date" name="date_of_training">
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" id="TrainingDayButton" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>