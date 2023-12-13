<header>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
        <div class="container-fluid ">
            <a class="navbar-brand" href="/">Твой журнал</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-felx justify-content-between" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if (!isset($_COOKIE['token'])) { ?>
                        <li class="nav-item">
                            <a href="login">
                                <button class="btn btn-light m-3" type="submit">Логин</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="register">
                                <button class="btn btn-light m-3" type="submit">Регистрация</button>
                            </a>
                        </li>
                    <?php
                    } else { ?>
                        <form class="d-flex" method="post" action="searchTrainingDayAction">
                            <input class="form-control me-2" name="search" type="search" placeholder="Название тренеровки" aria-label="Search">
                            <button class="btn btn-light" type="submit">Найти</button>
                        </form>

                </ul>
                <form action="/logoutAction" method="post" class="d-flex">
                    <button class="btn btn-light m-3" type="submit">Выйти</button>
                </form>
            <?php
                    }
            ?>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</header>