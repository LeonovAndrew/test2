<?php include_once __DIR__."/header.php";?>
<section class="sect_wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Оформление заказа</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-7">
                <div class="order_steps_list">
                    <ul class="order_steps_li">
                        <li>
                            <span class="step_number">
                                01
                            </span>
                            <span class="step_name">
                                Личные данные
                            </span>
                        </li>
                        <li class="">
                            <span class="step_number">
                                02
                            </span>
                            <span class="step_name">
                                Информация о доставке
                            </span>
                        </li>
                        <li class="active">
                            <span class="step_number">
                                03
                            </span>
                            <span class="step_name">
                                Оплата
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="row">
                   <div class="col-lg-8 col-sm-9">
                       <div class="order_steps_wrap">
                           <div class="row">
                               <div class="col-12">
                                   <form class="main_form">
                                       <div class="row check_dostavka order_final">
                                           <div class="col-12">
                                               <p class="font-weight-bold">
                                                   Окончательный расчет производится менеджером.<br>
                                                   Оплата возможна курьеру наличными или картой.
                                               </p>
                                               <div class="col-md-12 main_form">
                                                   <div class="custom-control custom-radio">
                                                       <input type="radio" class="custom-control-input" id="customRadio" name="example1" value="customEx">
                                                       <label class="custom-control-label comfortaa" for="customRadio">Наличный расчет</label>
                                                   </div>
                                                   <div class="custom-control custom-radio">
                                                       <input type="radio" class="custom-control-input" id="customRadio2" name="example1" value="customEx">
                                                       <label class="custom-control-label comfortaa" for="customRadio2">Оплата картой курьеру</label>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="row block_dostavka pl-3">
                                           <img src="image/svg/order_icon.svg" alt="icons">
                                       </div>
                                       <div class="row block_dostavka">
                                           <div class="col-sm-9">
                                               <div class="row">
                                                   <div class="col-md-12 col-sm-9 next_step_wrap">
                                                       <button class="btn_main next_step">
                                                           Подтвердить заказ
                                                       </button>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </form>
                               </div>
                           </div>

                       </div>
                   </div>
                </div>

            </div>
            <div class="button_order" data-toggle="modal" data-target="#order_items">
                <img src="image/svg/spis.svg" alt="spisoc">
            </div>
            <div class="col-lg-5 col-sm-5 for_table">
                <div class="order_items_block">
                    <div class="order_items_wrap">
                        <div class="order_items_title">
                            <div class="w-50 float-left">
                                <h4>Ваш заказ</h4>
                            </div>
                            <div class="w-50 float-left">
                                <a href="#">Продолжить покупки</a>
                            </div>
                        </div>
                        <div class="prod_order">
                            <div class="name_prod_it pt-3 w-100 float-left">
                                <p class="comfortaa">Кальян Alpha Hookah X Black atte (Черный мат)</p>
                            </div>
                            <div class="img_order_it w-25 float-left text-center">
                                <img src="image/prod/pr3.png" alt="12">
                            </div>
                            <div class="stepper_order w-75 float-left text-center pt-3" >
                                <div class="stepper stepper--style-2 js-spinner ">
                                    <input autofocus="" type="number" min="1" max="100" step="1" value="1" class="stepper__input" data-stepper-debounce="400">
                                    <div class="stepper__controls">
                                        <button type="button" spinner-button="up">+</button>
                                        <button type="button" spinner-button="down">-</button>
                                    </div>
                                </div>
                            </div>
                            <div class="stepper_order w-75 float-left text-center pt-3">
                                <span class="price_text comfortaa">2500 р</span>
                            </div>
                        </div>
                        <div class="prod_order">
                            <div class="name_prod_it pt-3 w-100 float-left">
                                <p class="comfortaa">Кальян Alpha Hookah X Black atte (Черный мат)</p>
                            </div>
                            <div class="img_order_it w-25 float-left text-center">
                                <img src="image/prod/pr3.png" alt="12">
                            </div>
                            <div class="stepper_order w-75 float-left text-center pt-3" >
                                <div class="stepper stepper--style-2 js-spinner ">
                                    <input autofocus="" type="number" min="1" max="100" step="1" value="1" class="stepper__input" data-stepper-debounce="400">
                                    <div class="stepper__controls">
                                        <button type="button" spinner-button="up">+</button>
                                        <button type="button" spinner-button="down">-</button>
                                    </div>
                                </div>
                            </div>
                            <div class="stepper_order w-75 float-left text-center pt-3">
                                <span class="price_text comfortaa">2500 р</span>
                            </div>
                        </div>
                    </div>
                    <div class="order_foot_wrap">
                    <span class="text_ex_small comfortaa">
                        Итого:
                    </span>
                        <span class="price_text comfortaa">
                        5000 р
                    </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<div class="modal" id="order_items">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">

                <div class="order_items_block">
                    <div class="order_items_wrap">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="order_items_title">
                            <div class="w-50 float-left">
                                <h4>Ваш заказ</h4>
                            </div>
                            <div class="w-50 float-left">
                                <a href="#">Продолжить покупки</a>
                            </div>
                        </div>
                        <div class="prod_order">
                            <div class="name_prod_it pt-3 w-100 float-left">
                                <p class="comfortaa">Кальян Alpha Hookah X Black atte (Черный мат)</p>
                            </div>
                            <div class="img_order_it w-25 float-left text-center">
                                <img src="image/prod/pr3.png" alt="12">
                            </div>
                            <div class="stepper_order w-75 float-left text-center pt-3" >
                                <div class="stepper stepper--style-2 js-spinner ">
                                    <input autofocus="" type="number" min="1" max="100" step="1" value="1" class="stepper__input" data-stepper-debounce="400">
                                    <div class="stepper__controls">
                                        <button type="button" spinner-button="up">+</button>
                                        <button type="button" spinner-button="down">-</button>
                                    </div>
                                </div>
                            </div>
                            <div class="stepper_order w-75 float-left text-center pt-3">
                                <span class="price_text comfortaa">2500 р</span>
                            </div>
                        </div>
                        <div class="prod_order">
                            <div class="name_prod_it pt-3 w-100 float-left">
                                <p class="comfortaa">Кальян Alpha Hookah X Black atte (Черный мат)</p>
                            </div>
                            <div class="img_order_it w-25 float-left text-center">
                                <img src="image/prod/pr3.png" alt="12">
                            </div>
                            <div class="stepper_order w-75 float-left text-center pt-3" >
                                <div class="stepper stepper--style-2 js-spinner ">
                                    <input autofocus="" type="number" min="1" max="100" step="1" value="1" class="stepper__input" data-stepper-debounce="400">
                                    <div class="stepper__controls">
                                        <button type="button" spinner-button="up">+</button>
                                        <button type="button" spinner-button="down">-</button>
                                    </div>
                                </div>
                            </div>
                            <div class="stepper_order w-75 float-left text-center pt-3">
                                <span class="price_text comfortaa">2500 р</span>
                            </div>
                        </div>
                    </div>
                    <div class="order_foot_wrap">
                    <span class="text_ex_small comfortaa">
                        Итого:
                    </span>
                        <span class="price_text comfortaa">
                        5000 р
                    </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include_once __DIR__."/footer.php";?>
