<?php include_once __DIR__."/header.php";?>
<section class="sect_wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Личный кабинет</h2>
                <button type="button" class="btn_menu_lk" data-toggle="modal" data-target="#menu_lk">
                    <img src="image/svg/menu_light.svg" alt="menu">
                    СМЕНА E-MAIL
                </button>
                <div class="modal fade" id="menu_lk">
                    <div class="modal-dialog  modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2></h2>
                                <div class="menu_lk_modal">
                                    <ul class="menu_lk_list">
                                        <li>
                                            <a href="#">
                                                ИЗБРАННОЕ
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                ИСТОРИЯ ПОКУПОК
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                ЛИЧНЫЕ ДАННЫЕ
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                АДРЕСА ДОСТАВКИ
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                СМЕНА ПАРОЛЯ
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="#">
                                                СМЕНА E-MAIL
                                            </a>
                                        </li>
                                        <li>
                                            <a class="font-weight-bold main_color" href="#">
                                                ВЫЙТИ
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="menu_lk">
                    <ul class="menu_lk_list">
                        <li>
                            <a href="#">
                                ИЗБРАННОЕ
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                ИСТОРИЯ ПОКУПОК
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                ЛИЧНЫЕ ДАННЫЕ
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                АДРЕСА ДОСТАВКИ
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                СМЕНА ПАРОЛЯ
                            </a>
                        </li>
                        <li class="active">
                            <a href="#">
                                СМЕНА E-MAIL
                            </a>
                        </li>
                        <li>
                            <a class="font-weight-bold main_color" href="#">
                                ВЫЙТИ
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="row">
                    <div class="col-lg-6">
                        <form class="main_form">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Старый e-mail" name="email" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Новый e-mail" name="newemail" required>
                            </div>
                            <div class="form-group lk_btn">
                                <button class="btn_main">
                                    Сохранить изменения
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once __DIR__."/footer.php";?>
