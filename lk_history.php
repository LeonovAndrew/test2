<?php include_once __DIR__."/header.php";?>
<section class="sect_wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Личный кабинет</h2>
                <button type="button" class="btn_menu_lk" data-toggle="modal" data-target="#menu_lk">
                    <img src="image/svg/menu_light.svg" alt="menu">
                    ИСТОРИЯ ПОКУПОК
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
                                        <li class="active" >
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
                        <li class="active">
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
                <div class="history_wrap">
                    <div class="history_info_top">
                        <div class="history_info_text">
                            <span class="comfortaa">
                                Заказ №125 от 24.04.2019, 2 товара на сумму 13100 р
                            </span>
                        </div>
                        <div class="btn_history_wrap">
                            <button class="btn_main closed">Завершенный</button>
                        </div>
                    </div>
                    <div class="history_info_pays">
                        <div class="btn_history_wrap">
                            <button class="btn_main info">Оплачено</button>
                        </div>
                    </div>
                    <div class="line_info">
                        <hr>
                        <div class="text_after_line">
                            Оплата
                        </div>
                    </div>
                    <div class="product_history">
                        <div class="product_history_text">
                            <p class="comfortaa">
                                Кальян Alpha Hookah X Black
                                atte (Черный мат)
                            </p>
                        </div>
                        <div class="product_history_count">
                            <p class="comfortaa">
                                2 шт
                            </p>
                        </div>
                        <div class="product_history_price">
                            <p class="comfortaa price_text">
                                600 р
                            </p>
                        </div>
                    </div>
                    <div class="product_history">
                        <div class="product_history_text">
                            <p class="comfortaa">
                                Кальян Alpha Hookah X Black
                                atte (Черный мат)
                            </p>
                        </div>
                        <div class="product_history_count">
                            <p class="comfortaa">
                                2 шт
                            </p>
                        </div>
                        <div class="product_history_price">
                            <p class="comfortaa price_text">
                                600 р
                            </p>
                        </div>
                    </div>
                    <div class="history_info_pays">
                        <div class="btn_history_wrap">
                            <button class="btn_main info">Доставлено</button>
                        </div>
                    </div>
                    <div class="line_info">
                        <hr>
                        <div class="text_after_line">
                            Доставка
                        </div>
                    </div>
                    <div class="product_history">
                        <div class="product_history_text">
                            <p class="comfortaa">
                                Кальян Alpha Hookah X Black
                                atte (Черный мат)
                            </p>
                        </div>
                        <div class="product_history_price float-right">
                            <p class="comfortaa ">
                                Бесплатно
                            </p>
                        </div>
                    </div>
                    <div class="text_itog_history float-right text-right w-100">
                        <span>
                            Итоговая сумма:
                        </span>
                        <span class="price_text">
                            13100 р
                        </span>
                    </div>
                </div>
                <div class="history_wrap">
                    <div class="history_info_top">
                        <div class="history_info_text">
                            <span class="comfortaa">
                                Заказ №125 от 24.04.2019, 2 товара на сумму 13100 р
                            </span>
                        </div>
                        <div class="btn_history_wrap">
                            <button class="btn_main filter">В обработке</button>
                        </div>
                    </div>
                    <div class="history_info_pays">
                        <div class="btn_history_wrap">
                            <button class="btn_main">Не оплачено</button>
                        </div>
                    </div>
                    <div class="line_info">
                        <hr>
                        <div class="text_after_line">
                            Оплата
                        </div>
                    </div>
                    <div class="product_history">
                        <div class="product_history_text">
                            <p class="comfortaa">
                                Кальян Alpha Hookah X Black
                                atte (Черный мат)
                            </p>
                        </div>
                        <div class="product_history_count">
                            <p class="comfortaa">
                                2 шт
                            </p>
                        </div>
                        <div class="product_history_price">
                            <p class="comfortaa price_text">
                                600 р
                            </p>
                        </div>
                    </div>
                    <div class="product_history">
                        <div class="product_history_text">
                            <p class="comfortaa">
                                Кальян Alpha Hookah X Black
                                atte (Черный мат)
                            </p>
                        </div>
                        <div class="product_history_count">
                            <p class="comfortaa">
                                2 шт
                            </p>
                        </div>
                        <div class="product_history_price">
                            <p class="comfortaa price_text">
                                600 р
                            </p>
                        </div>
                    </div>
                    <div class="history_info_pays">
                        <div class="btn_history_wrap">
                            <button class="btn_main info">Не доставлено</button>
                        </div>
                    </div>
                    <div class="line_info">
                        <hr>
                        <div class="text_after_line">
                            Доставка
                        </div>
                    </div>
                    <div class="product_history">
                        <div class="product_history_text">
                            <p class="comfortaa">
                                Кальян Alpha Hookah X Black
                                atte (Черный мат)
                            </p>
                        </div>
                        <div class="product_history_price float-right">
                            <p class="comfortaa ">
                                Бесплатно
                            </p>
                        </div>
                    </div>
                    <div class="text_itog_history float-right text-right w-100">
                        <span>
                            Итоговая сумма:
                        </span>
                        <span class="price_text">
                            13100 р
                        </span>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>

<?php include_once __DIR__."/footer.php";?>
