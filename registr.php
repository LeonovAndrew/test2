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
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-8">
                        <div class="btn_registr_wrap">
                            <div class="btn_registr_w50 active">
                                <button class="btn_main">
                                    Юр лицо
                                </button>
                            </div>
                            <div class="btn_registr_w50 deactive">
                                <button class="btn_main">
                                    Физ лицо
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once __DIR__."/footer.php";?>
