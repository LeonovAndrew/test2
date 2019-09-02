<?php include_once __DIR__."/header.php";?>
<section class="sect_wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Личный кабинет</h2>
                <button type="button" class="btn_menu_lk" data-toggle="modal" data-target="#menu_lk">
                    <img src="image/svg/menu_light.svg" alt="menu">
                    АДРЕСА ДОСТАВКИ
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
                                        <li class="active">
                                            <a href="#">
                                                АДРЕСА ДОСТАВКИ
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                СМЕНА ПАРОЛЯ
                                            </a>
                                        </li>
                                        <li>
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
                        <li class="active">
                            <a href="#">
                                АДРЕСА ДОСТАВКИ
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                СМЕНА ПАРОЛЯ
                            </a>
                        </li>
                        <li>
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
                                <input type="text" class="form-control" placeholder="Индекс" name="post_code" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Регион" name="region" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Город" name="city" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Улица" name="street" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Номер дома" name="home" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Корпус" name="kor" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Квартира" name="kv" required>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <h4>Дополнительная информация</h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" placeholder="Ваш  комментарий" ></textarea>
                                </div>
                            </div>
                            <div class="form-group lk_btn">
                                <button class="btn_main">
                                    Сохранить изменения
                                </button>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="checkbox" class="custom-control-input" checked id="customRadio" name="example1" value="customEx">
                                    <label class="custom-control-label" for="customRadio">Подписаться на новости и скидки</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once __DIR__."/footer.php";?>
