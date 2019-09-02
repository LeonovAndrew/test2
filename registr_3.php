<?php include_once __DIR__."/header.php";?>
<section class="sect_wrap">
    <div class="container">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#enter">Войти </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#registr">Зарегистрироваться</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content enter_reg_tab">
            <div id="enter" class="container tab-pane active"><br>
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6 col-sm-8">
                        <div class="enter_wrap">
                            <form action="/action_reg.php" class="main_form">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="E-mail" name="mail" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Пароль" name="pwd" required>
                                </div>
                                <button type="submit" class="btn_main">Войти</button>
                            </form>
                            <p class="lose_pwd">
                                <a href="#">Забыли пароль?</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <div id="registr" class="container tab-pane fade"><br>
                <div class="row pt-3">
                    <div class="col-12">
                        <p>После регистрации Вы сможете видеть на сайте оптовые цены.</p>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-12">
                        <p class="main_color">поля помеченные * обязательны к заполнению</p>
                    </div>
                </div>
                <form class="main_form">
                    <div class="row pt-3">
                        <div class="col-lg-4 col-md-5 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Имя*" name="name" required>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" placeholder="Телефон*" name="phone" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="E-mail*" name="mail" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Дата рождения" name="date  ">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" checked id="customCheck" name="example1">
                                    <label class="custom-control-label" for="customCheck">
                                        Я согласен на обработку моих<br>
                                        персональных данных
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn_main">
                                    Зарегистрироваться
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<?php include_once __DIR__."/footer.php";?>
