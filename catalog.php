<?php include_once __DIR__."/header.php";?>
<section class="sect_wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Каталог</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-4 cat_menu_block gird">
                <div class="main_form form_filter">
                    <div class="btn_filter_close">
                        <span class="filter_close">
                            <img src="image/svg/closemod.svg" alt="Закрыть">
                        </span>
                    </div>
                    <form>
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link" data-toggle="collapse" href="#collapsMenu1">
                                        Цена
                                        <span class="collaps_arrow"></span>
                                    </a>
                                </div>
                                <div id="collapsMenu1" class="collapse show">
                                    <div class="card-body">
                                        <div class="form-group prise_input_wrap">
                                            <input type="text" id="price_min" class="form-control">
                                            -
                                            <input type="text" id="price_max" class="form-control">
                                        </div>
                                        <div class="form-group prise_slide_wrap">
                                            <input id="ex2" type="text" class="span2" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[0,1000]"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card active">
                                <div class="count_filter_wrap">
                                    <div class="count_filter">
                                        365
                                    </div>
                                    <div class="count_filter_text">
                                        товаров
                                    </div>
                                </div>
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapsMenu3">
                                        Бренды
                                        <span class="collaps_arrow"></span>
                                    </a>
                                </div>
                                <div id="collapsMenu3" class="collapse">
                                    <div class="card-body">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check" name="example1">
                                            <label class="custom-control-label" for="check">MattPear</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check1" name="example1">
                                            <label class="custom-control-label" for="check1">Alpha Hookah</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check3" name="example1">
                                            <label class="custom-control-label" for="check3">Mamay Customs</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check4" name="example1">
                                            <label class="custom-control-label" for="check4">Maklaud</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check5" name="example1">
                                            <label class="custom-control-label" for="check5">Hoob</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check6" name="example1">
                                            <label class="custom-control-label" for="check6">Mexanika Smoke</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check7" name="example1">
                                            <label class="custom-control-label" for="check7">CWP</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check8" name="example1">
                                            <label class="custom-control-label" for="check8">Softsmoke</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check9" name="example1">
                                            <label class="custom-control-label" for="check9">Voodoo Smoke</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check10" name="example1">
                                            <label class="custom-control-label" for="check10">RF</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check11" name="example1">
                                            <label class="custom-control-label" for="check11">NeoLux</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check12" name="example1">
                                            <label class="custom-control-label" for="check12">Blade Hookah</label>
                                        </div>
                                        <div class="collapse_blok">
                                            <span class="show_more_collapse">все бренды</span>
                                            <div class="collapse_wrap">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check13" name="example1">
                                                    <label class="custom-control-label" for="check13">Blade Hookah1</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="check14" name="example1">
                                                    <label class="custom-control-label" for="check14">Blade Hookah2</label>
                                                </div>
                                            </div>
                                            <span class="close_more_collapse">Скрыть</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapsMenu4">
                                        Размер
                                        <span class="collaps_arrow"></span>
                                    </a>
                                </div>
                                <div id="collapsMenu4" class="collapse">
                                    <div class="card-body">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkR" name="example1">
                                            <label class="custom-control-label" for="checkR">Высокие</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkR1" name="example1">
                                            <label class="custom-control-label" for="checkR1">Средние</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkR3" name="example1">
                                            <label class="custom-control-label" for="checkR3">Компактные</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapsMenu5">
                                        Цвет
                                        <span class="collaps_arrow"></span>
                                    </a>
                                </div>
                                <div id="collapsMenu5" class="collapse">
                                    <div class="card-body">
                                        <ul class="colr_picker">
                                            <li class="checked">
                                                <img src="image/color/cl1.png" alt="Золотой"  data-toggle="tooltip" title="Белый">
                                                <input type="checkbox" name="w" checked>
                                            </li>
                                            <li class="no_checked">
                                                <img src="image/color/cl2.png" alt="Золотой"  data-toggle="tooltip" title="Белый">
                                                <input type="checkbox" name="w">
                                            </li>
                                            <li class="no_checked">
                                                <img src="image/color/cl3.png" alt="Золотой"  data-toggle="tooltip" title="Белый">
                                                <input type="checkbox" name="w">
                                            </li>
                                            <li class="no_checked">
                                                <img src="image/color/cl4.png" alt="Золотой"  data-toggle="tooltip" title="Белый">
                                                <input type="checkbox" name="w">
                                            </li>
                                            <li class="no_checked">
                                                <img src="image/color/cl5.png" alt="Золотой"  data-toggle="tooltip" title="Белый">
                                                <input type="checkbox" name="w">
                                            </li>
                                            <li class="no_checked">
                                                <img src="image/color/cl6.png" alt="Золотой"  data-toggle="tooltip" title="Белый">
                                                <input type="checkbox" name="w">
                                            </li>
                                            <li class="no_checked">
                                                <img src="image/color/cl7.png" alt="Золотой"  data-toggle="tooltip" title="Белый">
                                                <input type="checkbox" name="w">
                                            </li>
                                            <li class="no_checked">
                                                <img src="image/color/cl8.png" alt="Золотой"  data-toggle="tooltip" title="Белый">
                                                <input type="checkbox" name="w">
                                            </li>
                                            <li class="no_checked">
                                                <img src="image/color/cl9.png" alt="Золотой"  data-toggle="tooltip" title="Белый">
                                                <input type="checkbox" name="w">
                                            </li>
                                            <li class="no_checked">
                                                <img src="image/color/cl10.png" alt="Золотой"  data-toggle="tooltip" title="Белый">
                                                <input type="checkbox" name="w">
                                            </li>
                                            <li class="no_checked">
                                                <img src="image/color/cl11.png" alt="Золотой"  data-toggle="tooltip" title="Белый">
                                                <input type="checkbox" name="w">
                                            </li>
                                            <li class="no_checked">
                                                <img src="image/color/cl12.png" alt="Золотой"  data-toggle="tooltip" title="Белый">
                                                <input type="checkbox" name="w">
                                            </li>
                                            <li class="no_checked">
                                                <img src="image/color/cl13.png" alt="Золотой"  data-toggle="tooltip" title="Белый">
                                                <input type="checkbox" name="w">
                                            </li>
                                            <li class="no_checked">
                                                <img src="image/color/cl14.png" alt="Золотой"  data-toggle="tooltip" title="Белый">
                                                <input type="checkbox" name="w">
                                            </li>
                                            <li class="no_checked">
                                                <img src="image/color/cl15.png" alt="Золотой"  data-toggle="tooltip" title="Белый">
                                                <input type="checkbox" name="w">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card btn_filter_wrap">
                                <button type="reset" class="btn_main light">
                                    Сбросить фильтр
                                </button>
                                <button type="submit" class="btn_main filter">
                                    Применить фильтр
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-8">
                <div class="row">
                    <div class="sort_block_wrap">
                        <div class="menu_raz select_col ">
                            <ul class="sort_ul">
                                <li class="modal_cl" data-toggle="modal" data-target="#razdel_menu">
                                                <span class="burger_razdel">
                                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                                </span>
                                    Кальяны
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="sort_block_wrap">
                        <div class="menu_raz select_col filter_mob_col">
                            <ul class="sort_ul">
                                <li class="filter_mob_btn">
                                            <span class="burger_razdel">
                                                <img src="image/svg/filtr.svg" alt="Фильтр">
                                            </span>
                                    Фильтр
                                </li>
                            </ul>
                        </div>
                        <div class="select_show select_col ">
                            <ul class="sort_ul">
                                <li>Показать по: </li>
                                <li>
                                    <div class="dropdown">
                                        <button type="button" class="btn sort_ul_btn dropdown-toggle" data-toggle="dropdown">
                                            18
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item count_news_click" data-sort="18" href="?news_count=18">18</a>
                                            <a class="dropdown-item count_news_click" data-sort="24" href="?news_count=24">24</a>
                                            <a class="dropdown-item count_news_click" data-sort="36" href="?news_count=36">36</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="select_sort select_col">
                            <ul class="sort_ul">
                                <li>Сортировать по: </li>
                                <li>
                                    <div class="dropdown">
                                        <button type="button" class="btn sort_ul_btn dropdown-toggle" data-toggle="dropdown">
                                                    <span class="drop_name">
                                                                                                                    Новизне
                                                                                                            </span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item sort_click" data-sort="timestamp_x" href="?sort=timestamp_x">Новизне</a>
                                            <a class="dropdown-item sort_click" data-sort="name" href="?sort=name">Имени</a>
                                            <a class="dropdown-item sort_click" data-sort="PROPERTY_PRICE" href="?sort=PROPERTY_PRICE">Цене</a>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="select_view">
                            <ul class="change_view_list">
                                <li>
                                    <span class="change_view" data-view="line">
                                        <svg width="32" height="25" viewBox="0 0 32 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.68508 0.0581055H0V6.57192H8.68508V0.0581055Z" fill="#5B5B5B"/>
                                            <path d="M31.1215 0.0581055H0V6.57192H31.1215V0.0581055Z" fill="#5B5B5B"/>
                                            <path d="M31.1216 0.0581055H22.4365V6.57192H31.1216V0.0581055Z" fill="#5B5B5B"/>
                                            <path d="M8.68508 8.74316H0V15.257H8.68508V8.74316Z" fill="#5B5B5B"/>
                                            <path d="M31.1215 8.74316H0V15.257H31.1215V8.74316Z" fill="#5B5B5B"/>
                                            <path d="M31.1216 8.74316H22.4365V15.257H31.1216V8.74316Z" fill="#5B5B5B"/>
                                            <path d="M8.68508 18.1521H0V24.6659H8.68508V18.1521Z" fill="#5B5B5B"/>
                                            <path d="M31.1215 18.1521H0V24.6659H31.1215V18.1521Z" fill="#5B5B5B"/>
                                            <path d="M31.1216 18.1521H22.4365V24.6659H31.1216V18.1521Z" fill="#5B5B5B"/>
                                        </svg>
                                        <!--<i class="fa fa-bars" aria-hidden="true"></i>-->
                                    </span>
                                </li>
                                <li>
                                    <span class="change_view" data-view="line_gird">
                                        <svg width="33" height="25" viewBox="0 0 33 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.62454 0.0581055H0.939453V6.57192H9.62454V0.0581055Z" fill="#5B5B5B"/>
                                            <path d="M31.3373 0.0581055H11.7959V6.57192H31.3373V0.0581055Z" fill="#5B5B5B"/>
                                            <path d="M32.0611 0.0581055H23.376V6.57192H32.0611V0.0581055Z" fill="#5B5B5B"/>
                                            <path d="M9.62454 8.74316H0.939453V15.257H9.62454V8.74316Z" fill="#5B5B5B"/>
                                            <path d="M31.3373 8.74316H11.7959V15.257H31.3373V8.74316Z" fill="#5B5B5B"/>
                                            <path d="M32.0611 8.74316H23.376V15.257H32.0611V8.74316Z" fill="#5B5B5B"/>
                                            <path d="M9.62454 18.1521H0.939453V24.6659H9.62454V18.1521Z" fill="#5B5B5B"/>
                                            <path d="M31.3373 18.1521H11.7959V24.6659H31.3373V18.1521Z" fill="#5B5B5B"/>
                                            <path d="M32.0611 18.1521H23.376V24.6659H32.0611V18.1521Z" fill="#5B5B5B"/>
                                        </svg>
                                        <!--<i class="fa fa-th-list" aria-hidden="true"></i>-->
                                    </span>
                                </li>
                                <li>
                                    <span class="change_view" data-view="gird">
                                        <svg width="32" height="25" viewBox="0 0 32 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.5635 0.0581055H0.878418V6.57192H9.5635V0.0581055Z" fill="#EB653B"/>
                                            <path d="M20.4199 0.0581055H11.7349V6.57192H20.4199V0.0581055Z" fill="#EB653B"/>
                                            <path d="M32 0.0581055H23.3149V6.57192H32V0.0581055Z" fill="#EB653B"/>
                                            <path d="M9.5635 8.74316H0.878418V15.257H9.5635V8.74316Z" fill="#EB653B"/>
                                            <path d="M20.4199 8.74316H11.7349V15.257H20.4199V8.74316Z" fill="#EB653B"/>
                                            <path d="M32 8.74316H23.3149V15.257H32V8.74316Z" fill="#EB653B"/>
                                            <path d="M9.5635 18.1521H0.878418V24.6659H9.5635V18.1521Z" fill="#EB653B"/>
                                            <path d="M20.4199 18.1521H11.7349V24.6659H20.4199V18.1521Z" fill="#EB653B"/>
                                            <path d="M32 18.1521H23.3149V24.6659H32V18.1521Z" fill="#EB653B"/>
                                        </svg>

                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row catalog_wrap">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product_wrap">
                            <div class="prod_img_wrap">
                                <a href="/product/detal.php">
                                    <img src="image/prod/pr1.png" alt="prod">
                                    <ul class="prod_label_inf">
                                        <li>
                                            <img src="image/svg/new.svg" alt="new">
                                        </li>
                                    </ul>
                                </a>
                            </div>
                            <div class="prod_inf_wrap">
                                <div class="prod_name_wrap">
                                    <p class="text_inf">
                                        Кальян Alpha Hookah X Black
                                        atte (Черный мат)
                                    </p>
                                </div>
                                <div class="characteristic_small">
                                    <div class="descript_prod">
                                        <p>
                                            Лаконичность главная изюминка модели Mini-M, позволяющий взять свой любимый кальян в поездку, а может и освободить немного пространства дома. MattPear зарекомендовавшая себя компания на рынке, которая не требует лишних слов.
                                        </p>
                                    </div>
                                    <table>
                                        <tr>
                                            <td>высота кальяна,</td>
                                            <td>35 см</td>
                                        </tr>
                                        <tr>
                                            <td>Комплект от
                                                производителя</td>
                                            <td>шахта, блюдце</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="prod_prise_wrap">
                                    <div class="price_wrap">
                                        <div class="prise_new_wrap">
                                            <span class="price">2500р</span>
                                        </div>
                                        <div class="prise_old_wrap">
                                            <span class="old_prise text_inf">3500р</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="desk_fav_btn_wrap">
                                    <ul class="shop_icon_list">
                                        <li>
                                            <a href="#" class="shop_icon_link " data-toggle="tooltip" data-placement="top" title="сравнить">
                                                    <span class="shop_icon_svg">
                                                        <img src="image/svg/sr.svg" alt="Сравнить">
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="shop_icon_link " data-toggle="tooltip" data-placement="top" title="избранное">
                                                    <span class="shop_icon_svg heart">
                                                        <img src="image/svg/iz.svg" alt="избранное">
                                                    </span>
                                            </a>
                                        </li>
                                        <li class="cart_for_mob">
                                            <a href="#" class="shop_icon_link" data-toggle="tooltip" data-placement="top" title="в корзину">
                                                <span class="shop_icon_svg">
                                                    <img src="image/svg/cart_light.svg" alt="Корзина">
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="prod_status_mob">
                                    <span>в наличии</span>
                                </div>
                                <div class="prod_btn_wrap">
                                    <button class="btn_main">
                                        <span class="text_for_line">
                                            <img src="image/svg/cart_light.svg" alt="Корзина">
                                        </span>
                                        <span  class="text_for_gird">
                                            В корзину
                                        </span>
                                    </button>
                                </div>
                                <div class="prod_btn_click_wrap">
                                    <button class="btn_main light"  data-toggle="modal" data-target="#fast_click">
                                        <span class="text_for_line">
                                            В 1 клик
                                        </span>
                                        <span  class="text_for_gird">
                                            Купить в 1 клик
                                        </span>
                                    </button>
                                </div>
                                <div class="prod_status">
                                    <span>в наличии</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product_wrap">
                            <div class="prod_img_wrap">
                                <a href="/product/detal.php">
                                    <img src="image/prod/pr1.png" alt="prod">
                                    <ul class="prod_label_inf">
                                        <li>
                                            <img src="image/svg/new.svg" alt="new">
                                        </li>
                                    </ul>
                                </a>
                            </div>
                            <div class="prod_inf_wrap">
                                <div class="prod_name_wrap">
                                    <p class="text_inf">
                                        Кальян Alpha Hookah X Black
                                        atte (Черный мат)
                                    </p>
                                </div>
                                <div class="characteristic_small">
                                    <div class="descript_prod">
                                        <p>
                                            Лаконичность главная изюминка модели Mini-M, позволяющий взять свой любимый кальян в поездку, а может и освободить немного пространства дома. MattPear зарекомендовавшая себя компания на рынке, которая не требует лишних слов.
                                        </p>
                                    </div>
                                    <table>
                                        <tr>
                                            <td>высота кальяна,</td>
                                            <td>35 см</td>
                                        </tr>
                                        <tr>
                                            <td>Комплект от
                                                производителя</td>
                                            <td>шахта, блюдце</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="prod_prise_wrap">
                                    <div class="price_wrap">
                                        <div class="prise_new_wrap">
                                            <span class="price">2500р</span>
                                        </div>
                                        <div class="prise_old_wrap">
                                            <span class="old_prise text_inf">3500р</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="desk_fav_btn_wrap">
                                    <ul class="shop_icon_list">
                                        <li>
                                            <a href="#" class="shop_icon_link " data-toggle="tooltip" data-placement="top" title="сравнить">
                                                    <span class="shop_icon_svg">
                                                        <img src="image/svg/sr.svg" alt="Сравнить">
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="shop_icon_link " data-toggle="tooltip" data-placement="top" title="избранное">
                                                    <span class="shop_icon_svg heart">
                                                        <img src="image/svg/iz.svg" alt="избранное">
                                                    </span>
                                            </a>
                                        </li>
                                        <li class="cart_for_mob">
                                            <a href="#" class="shop_icon_link" data-toggle="tooltip" data-placement="top" title="в корзину">
                                                <span class="shop_icon_svg">
                                                    <img src="image/svg/cart_light.svg" alt="Корзина">
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="prod_status_mob">
                                    <span>в наличии</span>
                                </div>
                                <div class="prod_btn_wrap">
                                    <button class="btn_main">
                                        <span class="text_for_line">
                                            <img src="image/svg/cart_light.svg" alt="Корзина">
                                        </span>
                                        <span  class="text_for_gird">
                                            В корзину
                                        </span>
                                    </button>
                                </div>
                                <div class="prod_btn_click_wrap">
                                    <button class="btn_main light"  data-toggle="modal" data-target="#fast_click">
                                        <span class="text_for_line">
                                            В 1 клик
                                        </span>
                                        <span  class="text_for_gird">
                                            Купить в 1 клик
                                        </span>
                                    </button>
                                </div>
                                <div class="prod_status">
                                    <span>в наличии</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product_wrap">
                            <div class="prod_img_wrap">
                                <a href="/product/detal.php">
                                    <img src="image/prod/pr1.png" alt="prod">
                                    <ul class="prod_label_inf">
                                        <li>
                                            <img src="image/svg/new.svg" alt="new">
                                        </li>
                                    </ul>
                                </a>
                            </div>
                            <div class="prod_inf_wrap">
                                <div class="prod_name_wrap">
                                    <p class="text_inf">
                                        Кальян Alpha Hookah X Black
                                        atte (Черный мат)
                                    </p>
                                </div>
                                <div class="characteristic_small">
                                    <div class="descript_prod">
                                        <p>
                                            Лаконичность главная изюминка модели Mini-M, позволяющий взять свой любимый кальян в поездку, а может и освободить немного пространства дома. MattPear зарекомендовавшая себя компания на рынке, которая не требует лишних слов.
                                        </p>
                                    </div>
                                    <table>
                                        <tr>
                                            <td>высота кальяна,</td>
                                            <td>35 см</td>
                                        </tr>
                                        <tr>
                                            <td>Комплект от
                                                производителя</td>
                                            <td>шахта, блюдце</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="prod_prise_wrap">
                                    <div class="price_wrap">
                                        <div class="prise_new_wrap">
                                            <span class="price">2500р</span>
                                        </div>
                                        <div class="prise_old_wrap">
                                            <span class="old_prise text_inf">3500р</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="desk_fav_btn_wrap">
                                    <ul class="shop_icon_list">
                                        <li>
                                            <a href="#" class="shop_icon_link " data-toggle="tooltip" data-placement="top" title="сравнить">
                                                    <span class="shop_icon_svg">
                                                        <img src="image/svg/sr.svg" alt="Сравнить">
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="shop_icon_link " data-toggle="tooltip" data-placement="top" title="избранное">
                                                    <span class="shop_icon_svg heart">
                                                        <img src="image/svg/iz.svg" alt="избранное">
                                                    </span>
                                            </a>
                                        </li>
                                        <li class="cart_for_mob">
                                            <a href="#" class="shop_icon_link" data-toggle="tooltip" data-placement="top" title="в корзину">
                                                <span class="shop_icon_svg">
                                                    <img src="image/svg/cart_light.svg" alt="Корзина">
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="prod_status_mob">
                                    <span>в наличии</span>
                                </div>
                                <div class="prod_btn_wrap">
                                    <button class="btn_main">
                                        <span class="text_for_line">
                                            <img src="image/svg/cart_light.svg" alt="Корзина">
                                        </span>
                                        <span  class="text_for_gird">
                                            В корзину
                                        </span>
                                    </button>
                                </div>
                                <div class="prod_btn_click_wrap">
                                    <button class="btn_main light"  data-toggle="modal" data-target="#fast_click">
                                        <span class="text_for_line">
                                            В 1 клик
                                        </span>
                                        <span  class="text_for_gird">
                                            Купить в 1 клик
                                        </span>
                                    </button>
                                </div>
                                <div class="prod_status">
                                    <span>в наличии</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product_wrap">
                            <div class="prod_img_wrap">
                                <a href="/product/detal.php">
                                    <img src="image/prod/pr1.png" alt="prod">
                                    <ul class="prod_label_inf">
                                        <li>
                                            <img src="image/svg/new.svg" alt="new">
                                        </li>
                                    </ul>
                                </a>
                            </div>
                            <div class="prod_inf_wrap">
                                <div class="prod_name_wrap">
                                    <p class="text_inf">
                                        Кальян Alpha Hookah X Black
                                        atte (Черный мат)
                                    </p>
                                </div>
                                <div class="characteristic_small">
                                    <div class="descript_prod">
                                        <p>
                                            Лаконичность главная изюминка модели Mini-M, позволяющий взять свой любимый кальян в поездку, а может и освободить немного пространства дома. MattPear зарекомендовавшая себя компания на рынке, которая не требует лишних слов.
                                        </p>
                                    </div>
                                    <table>
                                        <tr>
                                            <td>высота кальяна,</td>
                                            <td>35 см</td>
                                        </tr>
                                        <tr>
                                            <td>Комплект от
                                                производителя</td>
                                            <td>шахта, блюдце</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="prod_prise_wrap">
                                    <div class="price_wrap">
                                        <div class="prise_new_wrap">
                                            <span class="price">2500р</span>
                                        </div>
                                        <div class="prise_old_wrap">
                                            <span class="old_prise text_inf">3500р</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="desk_fav_btn_wrap">
                                    <ul class="shop_icon_list">
                                        <li>
                                            <a href="#" class="shop_icon_link " data-toggle="tooltip" data-placement="top" title="сравнить">
                                                    <span class="shop_icon_svg">
                                                        <img src="image/svg/sr.svg" alt="Сравнить">
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="shop_icon_link " data-toggle="tooltip" data-placement="top" title="избранное">
                                                    <span class="shop_icon_svg heart">
                                                        <img src="image/svg/iz.svg" alt="избранное">
                                                    </span>
                                            </a>
                                        </li>
                                        <li class="cart_for_mob">
                                            <a href="#" class="shop_icon_link" data-toggle="tooltip" data-placement="top" title="в корзину">
                                                <span class="shop_icon_svg">
                                                    <img src="image/svg/cart_light.svg" alt="Корзина">
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="prod_status_mob">
                                    <span>в наличии</span>
                                </div>
                                <div class="prod_btn_wrap">
                                    <button class="btn_main">
                                        <span class="text_for_line">
                                            <img src="image/svg/cart_light.svg" alt="Корзина">
                                        </span>
                                        <span  class="text_for_gird">
                                            В корзину
                                        </span>
                                    </button>
                                </div>
                                <div class="prod_btn_click_wrap">
                                    <button class="btn_main light"  data-toggle="modal" data-target="#fast_click">
                                        <span class="text_for_line">
                                            В 1 клик
                                        </span>
                                        <span  class="text_for_gird">
                                            Купить в 1 клик
                                        </span>
                                    </button>
                                </div>
                                <div class="prod_status">
                                    <span>в наличии</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product_wrap">
                            <div class="prod_img_wrap">
                                <a href="/product/detal.php">
                                    <img src="image/prod/pr1.png" alt="prod">
                                    <ul class="prod_label_inf">
                                        <li>
                                            <img src="image/svg/new.svg" alt="new">
                                        </li>
                                    </ul>
                                </a>
                            </div>
                            <div class="prod_inf_wrap">
                                <div class="prod_name_wrap">
                                    <p class="text_inf">
                                        Кальян Alpha Hookah X Black
                                        atte (Черный мат)
                                    </p>
                                </div>
                                <div class="characteristic_small">
                                    <div class="descript_prod">
                                        <p>
                                            Лаконичность главная изюминка модели Mini-M, позволяющий взять свой любимый кальян в поездку, а может и освободить немного пространства дома. MattPear зарекомендовавшая себя компания на рынке, которая не требует лишних слов.
                                        </p>
                                    </div>
                                    <table>
                                        <tr>
                                            <td>высота кальяна,</td>
                                            <td>35 см</td>
                                        </tr>
                                        <tr>
                                            <td>Комплект от
                                                производителя</td>
                                            <td>шахта, блюдце</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="prod_prise_wrap">
                                    <div class="price_wrap">
                                        <div class="prise_new_wrap">
                                            <span class="price">2500р</span>
                                        </div>
                                        <div class="prise_old_wrap">
                                            <span class="old_prise text_inf">3500р</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="desk_fav_btn_wrap">
                                    <ul class="shop_icon_list">
                                        <li>
                                            <a href="#" class="shop_icon_link " data-toggle="tooltip" data-placement="top" title="сравнить">
                                                    <span class="shop_icon_svg">
                                                        <img src="image/svg/sr.svg" alt="Сравнить">
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="shop_icon_link " data-toggle="tooltip" data-placement="top" title="избранное">
                                                    <span class="shop_icon_svg heart">
                                                        <img src="image/svg/iz.svg" alt="избранное">
                                                    </span>
                                            </a>
                                        </li>
                                        <li class="cart_for_mob">
                                            <a href="#" class="shop_icon_link" data-toggle="tooltip" data-placement="top" title="в корзину">
                                                <span class="shop_icon_svg">
                                                    <img src="image/svg/cart_light.svg" alt="Корзина">
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="prod_status_mob">
                                    <span>в наличии</span>
                                </div>
                                <div class="prod_btn_wrap">
                                    <button class="btn_main">
                                        <span class="text_for_line">
                                            <img src="image/svg/cart_light.svg" alt="Корзина">
                                        </span>
                                        <span  class="text_for_gird">
                                            В корзину
                                        </span>
                                    </button>
                                </div>
                                <div class="prod_btn_click_wrap">
                                    <button class="btn_main light"  data-toggle="modal" data-target="#fast_click">
                                        <span class="text_for_line">
                                            В 1 клик
                                        </span>
                                        <span  class="text_for_gird">
                                            Купить в 1 клик
                                        </span>
                                    </button>
                                </div>
                                <div class="prod_status">
                                    <span>в наличии</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product_wrap">
                            <div class="prod_img_wrap">
                                <a href="/product/detal.php">
                                    <img src="image/prod/pr1.png" alt="prod">
                                    <ul class="prod_label_inf">
                                        <li>
                                            <img src="image/svg/new.svg" alt="new">
                                        </li>
                                    </ul>
                                </a>
                            </div>
                            <div class="prod_inf_wrap">
                                <div class="prod_name_wrap">
                                    <p class="text_inf">
                                        Кальян Alpha Hookah X Black
                                        atte (Черный мат)
                                    </p>
                                </div>
                                <div class="characteristic_small">
                                    <div class="descript_prod">
                                        <p>
                                            Лаконичность главная изюминка модели Mini-M, позволяющий взять свой любимый кальян в поездку, а может и освободить немного пространства дома. MattPear зарекомендовавшая себя компания на рынке, которая не требует лишних слов.
                                        </p>
                                    </div>
                                    <table>
                                        <tr>
                                            <td>высота кальяна,</td>
                                            <td>35 см</td>
                                        </tr>
                                        <tr>
                                            <td>Комплект от
                                                производителя</td>
                                            <td>шахта, блюдце</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="prod_prise_wrap">
                                    <div class="price_wrap">
                                        <div class="prise_new_wrap">
                                            <span class="price">2500р</span>
                                        </div>
                                        <div class="prise_old_wrap">
                                            <span class="old_prise text_inf">3500р</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="desk_fav_btn_wrap">
                                    <ul class="shop_icon_list">
                                        <li>
                                            <a href="#" class="shop_icon_link " data-toggle="tooltip" data-placement="top" title="сравнить">
                                                    <span class="shop_icon_svg">
                                                        <img src="image/svg/sr.svg" alt="Сравнить">
                                                    </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="shop_icon_link " data-toggle="tooltip" data-placement="top" title="избранное">
                                                    <span class="shop_icon_svg heart">
                                                        <img src="image/svg/iz.svg" alt="избранное">
                                                    </span>
                                            </a>
                                        </li>
                                        <li class="cart_for_mob">
                                            <a href="#" class="shop_icon_link" data-toggle="tooltip" data-placement="top" title="в корзину">
                                                <span class="shop_icon_svg">
                                                    <img src="image/svg/cart_light.svg" alt="Корзина">
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="prod_status_mob">
                                    <span>в наличии</span>
                                </div>
                                <div class="prod_btn_wrap">
                                    <button class="btn_main">
                                        <span class="text_for_line">
                                            <img src="image/svg/cart_light.svg" alt="Корзина">
                                        </span>
                                        <span  class="text_for_gird">
                                            В корзину
                                        </span>
                                    </button>
                                </div>
                                <div class="prod_btn_click_wrap">
                                    <button class="btn_main light"  data-toggle="modal" data-target="#fast_click">
                                        <span class="text_for_line">
                                            В 1 клик
                                        </span>
                                        <span  class="text_for_gird">
                                            Купить в 1 клик
                                        </span>
                                    </button>
                                </div>
                                <div class="prod_status">
                                    <span>в наличии</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="razdel_menu">
    <div class="modal-dialog mob_menu_modal  modal-dialog-centered">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="catalog_modal_menu">
                    <ul class="nav nav-pills main_nav justify-content-center">
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="" href="#">КАЛЬЯНЫ</a>
                            <div class="dropdown-menu">
                                <div class="mob_buttons">
                                    <button type="button" class="back_menu"><i class="fa fa-angle-left" aria-hidden="true"></i> Назад</button>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <h4>Бренды1</h4>
                                <ul class="dropdown_nav first_ch">
                                    <li><a class="dropdown-item" href="#">MattPear</a></li>
                                    <li><a class="dropdown-item" href="#">Alpha Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Mamay Customs</a></li>
                                    <li><a class="dropdown-item" href="#">Maklaud</a></li>
                                    <li><a class="dropdown-item" href="#">Mexanika Smoke</a></li>
                                    <li><a class="dropdown-item" href="#">CWP</a></li>
                                    <li><a class="dropdown-item" href="#">Softsmoke</a></li>
                                    <li><a class="dropdown-item" href="#">Voodoo Smoke</a></li>
                                    <li><a class="dropdown-item" href="#">RF</a></li>
                                    <li><a class="dropdown-item" href="#">NeoLux</a></li>
                                    <li><a class="dropdown-item" href="#">Blade Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Tortuga</a></li>
                                    <li><a class="dropdown-item" href="#">SkySeven</a></li>
                                    <li><a class="dropdown-item" href="#">Easy Blow</a></li>
                                    <li><a class="dropdown-item" href="#">Wookah</a></li>
                                    <li><a class="dropdown-item" href="#">Volcano Hookah</a></li>
                                </ul>
                                <ul class="dropdown_nav">
                                    <li><a class="dropdown-item" href="#">Batia</a></li>
                                    <li><a class="dropdown-item" href="#">Cosmo Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Chosen</a></li>
                                    <li><a class="dropdown-item" href="#">NanoSmoke</a></li>
                                    <li><a class="dropdown-item" href="#">Khalil Mamoon</a></li>
                                    <li><a class="dropdown-item" href="#">Temple Fabula</a></li>
                                    <li><a class="dropdown-item" href="#">Egeglas "Latecia"</a></li>
                                    <li><a class="dropdown-item" href="#">MattPear</a></li>
                                    <li><a class="dropdown-item" href="#">Alpha Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Mamay Customs</a></li>
                                    <li><a class="dropdown-item" href="#">Maklaud</a></li>
                                    <li><a class="dropdown-item" href="#">Hoob</a></li>
                                    <li><a class="dropdown-item" href="#">Mexanika Smoke</a></li>
                                    <li><a class="dropdown-item" href="#">CWP</a></li>
                                    <li><a class="dropdown-item" href="#">Softsmoke</a></li>
                                    <li><a class="dropdown-item" href="#">Voodoo Smoke</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="" href="#">ТАБАК</a>
                            <div class="dropdown-menu">
                                <div class="mob_buttons">
                                    <button type="button" class="back_menu"><i class="fa fa-angle-left" aria-hidden="true"></i> Назад</button>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <h4>Бренды2</h4>
                                <ul class="dropdown_nav first_ch">
                                    <li><a class="dropdown-item" href="#">MattPear</a></li>
                                    <li><a class="dropdown-item" href="#">Alpha Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Mamay Customs</a></li>
                                    <li><a class="dropdown-item" href="#">Maklaud</a></li>
                                    <li><a class="dropdown-item" href="#">Mexanika Smoke</a></li>
                                    <li><a class="dropdown-item" href="#">CWP</a></li>
                                    <li><a class="dropdown-item" href="#">Softsmoke</a></li>
                                    <li><a class="dropdown-item" href="#">Voodoo Smoke</a></li>
                                    <li><a class="dropdown-item" href="#">RF</a></li>
                                    <li><a class="dropdown-item" href="#">NeoLux</a></li>
                                    <li><a class="dropdown-item" href="#">Blade Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Tortuga</a></li>
                                    <li><a class="dropdown-item" href="#">SkySeven</a></li>
                                    <li><a class="dropdown-item" href="#">Easy Blow</a></li>
                                    <li><a class="dropdown-item" href="#">Wookah</a></li>
                                    <li><a class="dropdown-item" href="#">Volcano Hookah</a></li>
                                </ul>
                                <ul class="dropdown_nav">
                                    <li><a class="dropdown-item" href="#">Batia</a></li>
                                    <li><a class="dropdown-item" href="#">Cosmo Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Chosen</a></li>
                                    <li><a class="dropdown-item" href="#">NanoSmoke</a></li>
                                    <li><a class="dropdown-item" href="#">Khalil Mamoon</a></li>
                                    <li><a class="dropdown-item" href="#">Temple Fabula</a></li>
                                    <li><a class="dropdown-item" href="#">Egeglas "Latecia"</a></li>
                                    <li><a class="dropdown-item" href="#">MattPear</a></li>
                                    <li><a class="dropdown-item" href="#">Alpha Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Mamay Customs</a></li>
                                    <li><a class="dropdown-item" href="#">Maklaud</a></li>
                                    <li><a class="dropdown-item" href="#">Hoob</a></li>
                                    <li><a class="dropdown-item" href="#">Mexanika Smoke</a></li>
                                    <li><a class="dropdown-item" href="#">CWP</a></li>
                                    <li><a class="dropdown-item" href="#">Softsmoke</a></li>
                                    <li><a class="dropdown-item" href="#">Voodoo Smoke</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="" href="#">АКСЕССУАРЫ</a>
                            <div class="dropdown-menu">
                                <div class="mob_buttons">
                                    <button type="button" class="back_menu"><i class="fa fa-angle-left" aria-hidden="true"></i> Назад</button>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <h4>Бренды3</h4>
                                <ul class="dropdown_nav first_ch">
                                    <li><a class="dropdown-item" href="#">MattPear</a></li>
                                    <li><a class="dropdown-item" href="#">Alpha Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Mamay Customs</a></li>
                                    <li><a class="dropdown-item" href="#">Maklaud</a></li>
                                    <li><a class="dropdown-item" href="#">Mexanika Smoke</a></li>
                                    <li><a class="dropdown-item" href="#">CWP</a></li>
                                    <li><a class="dropdown-item" href="#">Softsmoke</a></li>
                                    <li><a class="dropdown-item" href="#">Voodoo Smoke</a></li>
                                    <li><a class="dropdown-item" href="#">RF</a></li>
                                    <li><a class="dropdown-item" href="#">NeoLux</a></li>
                                    <li><a class="dropdown-item" href="#">Blade Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Tortuga</a></li>
                                    <li><a class="dropdown-item" href="#">SkySeven</a></li>
                                    <li><a class="dropdown-item" href="#">Easy Blow</a></li>
                                    <li><a class="dropdown-item" href="#">Wookah</a></li>
                                    <li><a class="dropdown-item" href="#">Volcano Hookah</a></li>
                                </ul>
                                <ul class="dropdown_nav">
                                    <li><a class="dropdown-item" href="#">Batia</a></li>
                                    <li><a class="dropdown-item" href="#">Cosmo Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Chosen</a></li>
                                    <li><a class="dropdown-item" href="#">NanoSmoke</a></li>
                                    <li><a class="dropdown-item" href="#">Khalil Mamoon</a></li>
                                    <li><a class="dropdown-item" href="#">Temple Fabula</a></li>
                                    <li><a class="dropdown-item" href="#">Egeglas "Latecia"</a></li>
                                    <li><a class="dropdown-item" href="#">MattPear</a></li>
                                    <li><a class="dropdown-item" href="#">Alpha Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Mamay Customs</a></li>
                                    <li><a class="dropdown-item" href="#">Maklaud</a></li>
                                    <li><a class="dropdown-item" href="#">Hoob</a></li>
                                    <li><a class="dropdown-item" href="#">Mexanika Smoke</a></li>
                                    <li><a class="dropdown-item" href="#">CWP</a></li>
                                    <li><a class="dropdown-item" href="#">Softsmoke</a></li>
                                    <li><a class="dropdown-item" href="#">Voodoo Smoke</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="" href="#">ЧАШИ</a>
                            <div class="dropdown-menu">
                                <div class="mob_buttons">
                                    <button type="button" class="back_menu"><i class="fa fa-angle-left" aria-hidden="true"></i> Назад</button>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <h4>Бренды4</h4>
                                <ul class="dropdown_nav first_ch">
                                    <li><a class="dropdown-item" href="#">MattPear</a></li>
                                    <li><a class="dropdown-item" href="#">Alpha Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Mamay Customs</a></li>
                                    <li><a class="dropdown-item" href="#">Maklaud</a></li>
                                    <li><a class="dropdown-item" href="#">Mexanika Smoke</a></li>
                                    <li><a class="dropdown-item" href="#">CWP</a></li>
                                    <li><a class="dropdown-item" href="#">Softsmoke</a></li>
                                    <li><a class="dropdown-item" href="#">Voodoo Smoke</a></li>
                                    <li><a class="dropdown-item" href="#">RF</a></li>
                                    <li><a class="dropdown-item" href="#">NeoLux</a></li>
                                    <li><a class="dropdown-item" href="#">Blade Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Tortuga</a></li>
                                    <li><a class="dropdown-item" href="#">SkySeven</a></li>
                                    <li><a class="dropdown-item" href="#">Easy Blow</a></li>
                                    <li><a class="dropdown-item" href="#">Wookah</a></li>
                                    <li><a class="dropdown-item" href="#">Volcano Hookah</a></li>
                                </ul>
                                <ul class="dropdown_nav">
                                    <li><a class="dropdown-item" href="#">Batia</a></li>
                                    <li><a class="dropdown-item" href="#">Cosmo Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Chosen</a></li>
                                    <li><a class="dropdown-item" href="#">NanoSmoke</a></li>
                                    <li><a class="dropdown-item" href="#">Khalil Mamoon</a></li>
                                    <li><a class="dropdown-item" href="#">Temple Fabula</a></li>
                                    <li><a class="dropdown-item" href="#">Egeglas "Latecia"</a></li>
                                    <li><a class="dropdown-item" href="#">MattPear</a></li>
                                    <li><a class="dropdown-item" href="#">Alpha Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Mamay Customs</a></li>
                                    <li><a class="dropdown-item" href="#">Maklaud</a></li>
                                    <li><a class="dropdown-item" href="#">Hoob</a></li>
                                    <li><a class="dropdown-item" href="#">Mexanika Smoke</a></li>
                                    <li><a class="dropdown-item" href="#">CWP</a></li>
                                    <li><a class="dropdown-item" href="#">Softsmoke</a></li>
                                    <li><a class="dropdown-item" href="#">Voodoo Smoke</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="" href="#">УГОЛЬ</a>
                            <div class="dropdown-menu">
                                <div class="mob_buttons">
                                    <button type="button" class="back_menu"><i class="fa fa-angle-left" aria-hidden="true"></i> Назад</button>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <h4>Бренды5</h4>
                                <ul class="dropdown_nav first_ch">
                                    <li><a class="dropdown-item" href="#">MattPear</a></li>
                                    <li><a class="dropdown-item" href="#">Alpha Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Mamay Customs</a></li>
                                    <li><a class="dropdown-item" href="#">Maklaud</a></li>
                                    <li><a class="dropdown-item" href="#">Mexanika Smoke</a></li>
                                    <li><a class="dropdown-item" href="#">CWP</a></li>
                                    <li><a class="dropdown-item" href="#">Softsmoke</a></li>
                                    <li><a class="dropdown-item" href="#">Voodoo Smoke</a></li>
                                    <li><a class="dropdown-item" href="#">RF</a></li>
                                    <li><a class="dropdown-item" href="#">NeoLux</a></li>
                                    <li><a class="dropdown-item" href="#">Blade Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Tortuga</a></li>
                                    <li><a class="dropdown-item" href="#">SkySeven</a></li>
                                    <li><a class="dropdown-item" href="#">Easy Blow</a></li>
                                    <li><a class="dropdown-item" href="#">Wookah</a></li>
                                    <li><a class="dropdown-item" href="#">Volcano Hookah</a></li>
                                </ul>
                                <ul class="dropdown_nav">
                                    <li><a class="dropdown-item" href="#">Batia</a></li>
                                    <li><a class="dropdown-item" href="#">Cosmo Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Chosen</a></li>
                                    <li><a class="dropdown-item" href="#">NanoSmoke</a></li>
                                    <li><a class="dropdown-item" href="#">Khalil Mamoon</a></li>
                                    <li><a class="dropdown-item" href="#">Temple Fabula</a></li>
                                    <li><a class="dropdown-item" href="#">Egeglas "Latecia"</a></li>
                                    <li><a class="dropdown-item" href="#">MattPear</a></li>
                                    <li><a class="dropdown-item" href="#">Alpha Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Mamay Customs</a></li>
                                    <li><a class="dropdown-item" href="#">Maklaud</a></li>
                                    <li><a class="dropdown-item" href="#">Hoob</a></li>
                                    <li><a class="dropdown-item" href="#">Mexanika Smoke</a></li>
                                    <li><a class="dropdown-item" href="#">CWP</a></li>
                                    <li><a class="dropdown-item" href="#">Softsmoke</a></li>
                                    <li><a class="dropdown-item" href="#">Voodoo Smoke</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="" href="#">VAPE</a>
                            <div class="dropdown-menu">
                                <div class="mob_buttons">
                                    <button type="button" class="back_menu"><i class="fa fa-angle-left" aria-hidden="true"></i> Назад</button>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <h4>Бренды6</h4>
                                <ul class="dropdown_nav first_ch">
                                    <li><a class="dropdown-item" href="#">MattPear</a></li>
                                    <li><a class="dropdown-item" href="#">Alpha Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Mamay Customs</a></li>
                                    <li><a class="dropdown-item" href="#">Maklaud</a></li>
                                    <li><a class="dropdown-item" href="#">Mexanika Smoke</a></li>
                                    <li><a class="dropdown-item" href="#">CWP</a></li>
                                    <li><a class="dropdown-item" href="#">Softsmoke</a></li>
                                    <li><a class="dropdown-item" href="#">Voodoo Smoke</a></li>
                                    <li><a class="dropdown-item" href="#">RF</a></li>
                                    <li><a class="dropdown-item" href="#">NeoLux</a></li>
                                    <li><a class="dropdown-item" href="#">Blade Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Tortuga</a></li>
                                    <li><a class="dropdown-item" href="#">SkySeven</a></li>
                                    <li><a class="dropdown-item" href="#">Easy Blow</a></li>
                                    <li><a class="dropdown-item" href="#">Wookah</a></li>
                                    <li><a class="dropdown-item" href="#">Volcano Hookah</a></li>
                                </ul>
                                <ul class="dropdown_nav">
                                    <li><a class="dropdown-item" href="#">Batia</a></li>
                                    <li><a class="dropdown-item" href="#">Cosmo Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Chosen</a></li>
                                    <li><a class="dropdown-item" href="#">NanoSmoke</a></li>
                                    <li><a class="dropdown-item" href="#">Khalil Mamoon</a></li>
                                    <li><a class="dropdown-item" href="#">Temple Fabula</a></li>
                                    <li><a class="dropdown-item" href="#">Egeglas "Latecia"</a></li>
                                    <li><a class="dropdown-item" href="#">MattPear</a></li>
                                    <li><a class="dropdown-item" href="#">Alpha Hookah</a></li>
                                    <li><a class="dropdown-item" href="#">Mamay Customs</a></li>
                                    <li><a class="dropdown-item" href="#">Maklaud</a></li>
                                    <li><a class="dropdown-item" href="#">Hoob</a></li>
                                    <li><a class="dropdown-item" href="#">Mexanika Smoke</a></li>
                                    <li><a class="dropdown-item" href="#">CWP</a></li>
                                    <li><a class="dropdown-item" href="#">Softsmoke</a></li>
                                    <li><a class="dropdown-item" href="#">Voodoo Smoke</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once __DIR__."/footer.php";?>
