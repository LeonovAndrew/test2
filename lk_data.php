<?php include_once __DIR__."/header.php";?>
<section class="sect_wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Личный кабинет</h2>
                <button type="button" class="btn_menu_lk" data-toggle="modal" data-target="#menu_lk">
                    <img src="image/svg/menu_light.svg" alt="menu">
                    ЛИЧНЫЕ ДАННЫЕ
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
                                        <li class="active">
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
                        <li class="active">
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
                                <input type="text" class="form-control" placeholder="Имя" name="name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Фамилия" name="sec_name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Отчество" name="otch" required>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" placeholder="Телефон" name="phone" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="E-mail" name="mail" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Название Юр лица" name="name_ur" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="ИНН" name="inn" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Название компании" name="comp_name" required>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" checked  id="customFile">
                                    <label class="custom-file-label" for="customFile">Прикрепить реквизиты</label>
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
