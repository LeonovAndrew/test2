<?php include_once __DIR__."/header.php";?>
<section class="sect_wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Личный кабинет</h2>
                <button type="button" class="btn_menu_lk" data-toggle="modal" data-target="#menu_lk">
                    <img src="image/svg/menu_light.svg" alt="menu">
                    ИЗБРАННОЕ
                </button>
                <div class="modal fade" id="menu_lk">
                    <div class="modal-dialog  modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2></h2>
                                <div class="menu_lk_modal">
                                    <ul class="menu_lk_list">
                                        <li class="active">
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
                        <li class="active">
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
                        <li>
                            <a href="#">
                                СМЕНА E-MAIL
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                ВЫЙТИ
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="fav_block_lk">
                    <div class="row">
                        <div class="col-12">
                            <div class="top_info">
                                <div class="col_fav_inf">
                                    Информация о продукте
                                </div>
                                <div class="col_fav_price">
                                    Цена за ед.
                                </div>
                                <div class="col_fav_step">
                                    Количество
                                </div>
                                <div class="col_fav_itog">
                                    Общая сумма
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row ">
                        <div class="col-12">
                            <div class="fav_prod_row">
                                <div class="fav_prod_img">
                                    <img src="image/prod/pr3.png" alt="prod">
                                </div>
                                <div class="fav_prod_text">
                                    <p class="fav_prod_name text_inf">
                                        Кальян Alpha Hookah X Black
                                        atte (Черный мат)
                                    </p>
                                    <table class="fav_property">
                                        <tbody>
                                        <tr>
                                            <td>высота кальяна,</td>
                                            <td>35 см</td>
                                        </tr>
                                        <tr>
                                            <td>Комплект от
                                                производителя</td>
                                            <td>шахта, блюдце</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="fav_prod_prise price_text">
                                    2500 р <span class="for_mob_inline">за шт.</span>
                                </div>
                                <div class="fav_prod_itog price_text for_mob">
                                    2500 р
                                </div>
                                <div class="fav_prod_step">
                                    <div class="stepper stepper--style-2 js-spinner">
                                        <input autofocus="" type="number" min="1" max="100" step="1" value="1" class="stepper__input" data-stepper-debounce="400">
                                        <div class="stepper__controls">
                                            <button type="button" spinner-button="up">+</button>
                                            <button type="button" spinner-button="down">-</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="fav_prod_itog price_text for_desk">
                                    2500 р
                                </div>
                                <div class="fav_prod_btn">
                                    <button class="btn_main">
                                        Купить
                                    </button>
                                </div>
                                <div class="fav_prod_btn_inf">
                                    <a class="srav_lk" href="#">
                                        <img src="image/svg/sr.svg" alt="сравнение">
                                    </a>
                                    <a class="close_fav">
                                        <img src="image/svg/closemod.svg">
                                    </a>
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="row ">
                        <div class="col-12">
                            <div class="fav_prod_row">
                                <div class="fav_prod_img">
                                    <img src="image/prod/pr3.png" alt="prod">
                                </div>
                                <div class="fav_prod_text">
                                    <p class="fav_prod_name text_inf">
                                        Кальян Alpha Hookah X Black
                                        atte (Черный мат)
                                    </p>
                                    <table class="fav_property">
                                        <tbody>
                                        <tr>
                                            <td>высота кальяна,</td>
                                            <td>35 см</td>
                                        </tr>
                                        <tr>
                                            <td>Комплект от
                                                производителя</td>
                                            <td>шахта, блюдце</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="fav_prod_prise price_text">
                                    2500 р <span class="for_mob_inline">за шт.</span>
                                </div>
                                <div class="fav_prod_itog price_text for_mob">
                                    2500 р
                                </div>
                                <div class="fav_prod_step">
                                    <div class="stepper stepper--style-2 js-spinner">
                                        <input autofocus="" type="number" min="1" max="100" step="1" value="1" class="stepper__input" data-stepper-debounce="400">
                                        <div class="stepper__controls">
                                            <button type="button" spinner-button="up">+</button>
                                            <button type="button" spinner-button="down">-</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="fav_prod_itog price_text for_desk">
                                    2500 р
                                </div>
                                <div class="fav_prod_btn">
                                    <button class="btn_main">
                                        Купить
                                    </button>
                                </div>
                                <div class="fav_prod_btn_inf">
                                    <a class="srav_lk" href="#">
                                        <img src="image/svg/sr.svg" alt="сравнение">
                                    </a>
                                    <a class="close_fav">
                                        <img src="image/svg/closemod.svg">
                                    </a>
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="row ">
                        <div class="col-12">
                            <div class="fav_prod_row">
                                <div class="fav_prod_img">
                                    <img src="image/prod/pr3.png" alt="prod">
                                </div>
                                <div class="fav_prod_text">
                                    <p class="fav_prod_name text_inf">
                                        Кальян Alpha Hookah X Black
                                        atte (Черный мат)
                                    </p>
                                    <table class="fav_property">
                                        <tbody>
                                        <tr>
                                            <td>высота кальяна,</td>
                                            <td>35 см</td>
                                        </tr>
                                        <tr>
                                            <td>Комплект от
                                                производителя</td>
                                            <td>шахта, блюдце</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="fav_prod_prise price_text">
                                    2500 р <span class="for_mob_inline">за шт.</span>
                                </div>
                                <div class="fav_prod_itog price_text for_mob">
                                    2500 р
                                </div>
                                <div class="fav_prod_step">
                                    <div class="stepper stepper--style-2 js-spinner">
                                        <input autofocus="" type="number" min="1" max="100" step="1" value="1" class="stepper__input" data-stepper-debounce="400">
                                        <div class="stepper__controls">
                                            <button type="button" spinner-button="up">+</button>
                                            <button type="button" spinner-button="down">-</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="fav_prod_itog price_text for_desk">
                                    2500 р
                                </div>
                                <div class="fav_prod_btn">
                                    <button class="btn_main">
                                        Купить
                                    </button>
                                </div>
                                <div class="fav_prod_btn_inf">
                                    <a class="srav_lk" href="#">
                                        <img src="image/svg/sr.svg" alt="сравнение">
                                    </a>
                                    <a class="close_fav">
                                        <img src="image/svg/closemod.svg">
                                    </a>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>


    </div>
</section>

<?php include_once __DIR__."/footer.php";?>
