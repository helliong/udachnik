<?php

include 'includes/core.php';
include 'includes/headerMain.php';

?>
    <main>
        <div class="container">

            <!-- ПРИВЕТСТВИЕ -->
            <?php if (!$user): ?>
                <h2 class="welcome">Добро пожаловать, Гость!</h2>
            <?php else: ?>
                <h2 class="welcome">Добро пожаловать, <?php echo $user['username']; ?>!</h2>
            <?php endif; ?>

            <!-- КАРТОЧКА ТОВАРА -->
            <div class="wrapper">
                <div class="products-content grid-container">
                    <ul class="products-grid">
                        <li class="products-grid__item">
                            <article class="product">
                                <a href="#" class="product__image">
                                    <div class="product__switch image-switch">
                                        <div class="image-switch__item">
                                            <div class="image-switch__img"><img src="/assets/img/cart/1.jpg"
                                                                                alt="Удобрения"></div>
                                        </div>
                                        <div class="image-switch__item">
                                            <div class="image-switch__img"><img src="/assets/img/cart/2.jpg"
                                                                                alt="Удобрения"></div>
                                        </div>
                                        <div class="image-switch__item">
                                            <div class="image-switch__img"><img src="/assets/img/cart/3.jpg"
                                                                                alt="Удобрения"></div>
                                        </div>
                                    </div>
                                    <ul class="product__image-pagination image-pagination" aria-hidden="true"></ul>
                                </a>
                                <h3 class="product__title">
                                    <a href="#">Удобрения 1кг</a>
                                </h3>
                                <div class="product__props">
								<span class="product__rating">
									<svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
										<path
                                                d="M7.04894 0.92705C7.3483 0.00573924 8.6517 0.00573965 8.95106 0.92705L10.0206 4.21885C10.1545 4.63087 10.5385 4.90983 10.9717 4.90983H14.4329C15.4016 4.90983 15.8044 6.14945 15.0207 6.71885L12.2205 8.75329C11.87 9.00793 11.7234 9.4593 11.8572 9.87132L12.9268 13.1631C13.2261 14.0844 12.1717 14.8506 11.388 14.2812L8.58779 12.2467C8.2373 11.9921 7.7627 11.9921 7.41221 12.2467L4.61204 14.2812C3.82833 14.8506 2.77385 14.0844 3.0732 13.1631L4.14277 9.87132C4.27665 9.4593 4.12999 9.00793 3.7795 8.75329L0.979333 6.71885C0.195619 6.14945 0.598395 4.90983 1.56712 4.90983H5.02832C5.46154 4.90983 5.8455 4.63087 5.97937 4.21885L7.04894 0.92705Z"/>
									</svg>
									4,5
								</span>
                                    <span class="product__testimonials">83 отзыва</span>
                                </div>
                                <div class="product__info">
                                    <span class="product__term">Артикул: 879876</span>
                                    <span class="product__available">В наличии: 500 шт</span>
                                </div>
                                <div class="product__price product-price">
                                    <span class="product-price__current">300 ₽</span>
                                    <span class="product-price__old">500 ₽</span>
                                </div>
                                <button class="product__btn btn">Добавить в корзину</button>
                            </article>
                        </li>

                        <li class="products-grid__item">
                            <article class="product">
                                <a href="#" class="product__image">
                                    <div class="product__switch image-switch">
                                        <div class="image-switch__item">
                                            <div class="image-switch__img"><img src="/assets/img/cart/1.jpg"
                                                                                alt="Удобрения"></div>
                                        </div>
                                        <div class="image-switch__item">
                                            <div class="image-switch__img"><img src="/assets/img/cart/2.jpg"
                                                                                alt="Удобрения"></div>
                                        </div>
                                        <div class="image-switch__item">
                                            <div class="image-switch__img"><img src="/assets/img/cart/3.jpg"
                                                                                alt="Удобрения"></div>
                                        </div>
                                    </div>
                                    <ul class="product__image-pagination image-pagination" aria-hidden="true"></ul>
                                </a>
                                <h3 class="product__title">
                                    <a href="#">Удобрения 1кг</a>
                                </h3>
                                <div class="product__props">
								<span class="product__rating">
									<svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
										<path
                                                d="M7.04894 0.92705C7.3483 0.00573924 8.6517 0.00573965 8.95106 0.92705L10.0206 4.21885C10.1545 4.63087 10.5385 4.90983 10.9717 4.90983H14.4329C15.4016 4.90983 15.8044 6.14945 15.0207 6.71885L12.2205 8.75329C11.87 9.00793 11.7234 9.4593 11.8572 9.87132L12.9268 13.1631C13.2261 14.0844 12.1717 14.8506 11.388 14.2812L8.58779 12.2467C8.2373 11.9921 7.7627 11.9921 7.41221 12.2467L4.61204 14.2812C3.82833 14.8506 2.77385 14.0844 3.0732 13.1631L4.14277 9.87132C4.27665 9.4593 4.12999 9.00793 3.7795 8.75329L0.979333 6.71885C0.195619 6.14945 0.598395 4.90983 1.56712 4.90983H5.02832C5.46154 4.90983 5.8455 4.63087 5.97937 4.21885L7.04894 0.92705Z"/>
									</svg>
									4,0
								</span>
                                    <span class="product__testimonials">552 отзыва</span>
                                </div>
                                <div class="product__info">
                                    <span class="product__term">Артикул: 117985</span>
                                    <span class="product__available">В наличии: 234 шт</span>
                                </div>
                                <div class="product__price product-price">
                                    <span class="product-price__current">220 ₽</span>
                                    <span class="product-price__old">430 ₽</span>
                                </div>
                                <button class="product__btn btn">Добавить в корзину</button>
                            </article>
                        </li>

                        <li class="products-grid__item">
                            <article class="product">
                                <a href="#" class="product__image">
                                    <div class="product__switch image-switch">
                                        <div class="image-switch__item">
                                            <div class="image-switch__img"><img src="/assets/img/cart/1.jpg"
                                                                                alt="Удобрения"></div>
                                        </div>
                                        <div class="image-switch__item">
                                            <div class="image-switch__img"><img src="/assets/img/cart/2.jpg"
                                                                                alt="Удобрения"></div>
                                        </div>
                                        <div class="image-switch__item">
                                            <div class="image-switch__img"><img src="/assets/img/cart/3.jpg"
                                                                                alt="Удобрения"></div>
                                        </div>
                                    </div>
                                    <ul class="product__image-pagination image-pagination" aria-hidden="true"></ul>
                                </a>
                                <h3 class="product__title">
                                    <a href="#">Удобрения 1кг</a>
                                </h3>
                                <div class="product__props">
								<span class="product__rating">
									<svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
										<path
                                                d="M7.04894 0.92705C7.3483 0.00573924 8.6517 0.00573965 8.95106 0.92705L10.0206 4.21885C10.1545 4.63087 10.5385 4.90983 10.9717 4.90983H14.4329C15.4016 4.90983 15.8044 6.14945 15.0207 6.71885L12.2205 8.75329C11.87 9.00793 11.7234 9.4593 11.8572 9.87132L12.9268 13.1631C13.2261 14.0844 12.1717 14.8506 11.388 14.2812L8.58779 12.2467C8.2373 11.9921 7.7627 11.9921 7.41221 12.2467L4.61204 14.2812C3.82833 14.8506 2.77385 14.0844 3.0732 13.1631L4.14277 9.87132C4.27665 9.4593 4.12999 9.00793 3.7795 8.75329L0.979333 6.71885C0.195619 6.14945 0.598395 4.90983 1.56712 4.90983H5.02832C5.46154 4.90983 5.8455 4.63087 5.97937 4.21885L7.04894 0.92705Z"/>
									</svg>
									3,8
								</span>
                                    <span class="product__testimonials">113 отзыва</span>
                                </div>
                                <div class="product__info">
                                    <span class="product__term">Артикул: 287976</span>
                                    <span class="product__available">В наличии: 50 шт</span>
                                </div>
                                <div class="product__price product-price">
                                    <span class="product-price__current">100 ₽</span>
                                    <span class="product-price__old">200 ₽</span>
                                </div>
                                <button class="product__btn btn">Добавить в корзину</button>
                            </article>
                        </li>

                        <li class="products-grid__item">
                            <article class="product">
                                <a href="#" class="product__image">
                                    <div class="product__switch image-switch">
                                        <div class="image-switch__item">
                                            <div class="image-switch__img"><img src="/assets/img/cart/1.jpg"
                                                                                alt="Удобрения"></div>
                                        </div>
                                        <div class="image-switch__item">
                                            <div class="image-switch__img"><img src="/assets/img/cart/2.jpg"
                                                                                alt="Удобрения"></div>
                                        </div>
                                        <div class="image-switch__item">
                                            <div class="image-switch__img"><img src="/assets/img/cart/3.jpg"
                                                                                alt="Удобрения"></div>
                                        </div>
                                    </div>
                                    <ul class="product__image-pagination image-pagination" aria-hidden="true"></ul>
                                </a>
                                <h3 class="product__title">
                                    <a href="#">Удобрения 1кг</a>
                                </h3>
                                <div class="product__props">
								<span class="product__rating">
									<svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
										<path
                                                d="M7.04894 0.92705C7.3483 0.00573924 8.6517 0.00573965 8.95106 0.92705L10.0206 4.21885C10.1545 4.63087 10.5385 4.90983 10.9717 4.90983H14.4329C15.4016 4.90983 15.8044 6.14945 15.0207 6.71885L12.2205 8.75329C11.87 9.00793 11.7234 9.4593 11.8572 9.87132L12.9268 13.1631C13.2261 14.0844 12.1717 14.8506 11.388 14.2812L8.58779 12.2467C8.2373 11.9921 7.7627 11.9921 7.41221 12.2467L4.61204 14.2812C3.82833 14.8506 2.77385 14.0844 3.0732 13.1631L4.14277 9.87132C4.27665 9.4593 4.12999 9.00793 3.7795 8.75329L0.979333 6.71885C0.195619 6.14945 0.598395 4.90983 1.56712 4.90983H5.02832C5.46154 4.90983 5.8455 4.63087 5.97937 4.21885L7.04894 0.92705Z"/>
									</svg>
									4,7
								</span>
                                    <span class="product__testimonials">225 отзыва</span>
                                </div>
                                <div class="product__info">
                                    <span class="product__term">Артикул: 394876</span>
                                    <span class="product__available">В наличии: 99 шт</span>
                                </div>
                                <div class="product__price product-price">
                                    <span class="product-price__current">450 ₽</span>
                                    <span class="product-price__old">800 ₽</span>
                                </div>
                                <button class="product__btn btn">Добавить в корзину</button>
                            </article>
                        </li>
                    </ul>
                    <div class="modal">
                        <div class="modal__container order-modal" role="dialog" aria-modal="true"
                             data-graph-target="modal">
                            <div class="modal-content order-modal__content">
                                <div class="order-modal__top">
                                    <h2 class="order-modal__title">Оформление заказа</h2>
                                    <span class="order-modal__number">Заказ № 3456 67</span>
                                </div>
                                <div class="order-modal__info">
                                    <div class="order-modal__quantity order-modal__info-item">Товаров в заказе: <span>3 шт</span>
                                    </div>
                                    <div class="order-modal__summ order-modal__info-item">Общая сумма заказа:
                                        <span></span></div>
                                    <div class="order-modal__products order-modal__info-item">
                                        <button class="order-modal__btn">Состав заказа</button>
                                        <ul class="order-modal__list">
                                            <!-- <li class="order-modal__item">
                                                                            <article class="order-modal__product order-product">
                                                                                <img src="img/1.jpg" alt="" class="order-product__img">
                                                                                <div class="order-product__text">
                                                                                    <h3 class="order-product__title">Удобрения 1кг</h3>
                                                                                    <span class="order-product__price">500 ₽ </span>
                                                                                </div>
                                                                                <button class="order-product__delete">Удалить</button>
                                                                            </article>
                                                                        </li> -->
                                        </ul>
                                    </div>
                                </div>
                                <form action="#" class="order-modal__form order">
                                    <input type="hidden" name="theme" value="Обратный звонок">
                                    <input type="hidden" name="admin_email[]" value="udachnik5@gmail.com">
                                    <input type="hidden" name="form_subject" value="Заявка с сайта Сайт">
                                    <label class="order__label">
                                        <span class="order__text">Ваше имя</span>
                                        <input type="text" name="Имя" class="order__input">
                                    </label>
                                    <label class="order__label">
                                        <span class="order__text">Номер телефона</span>
                                        <input type="tel" name="Телефон" class="order__input"
                                               placeholder="+7 (___)___-__-__">
                                    </label>
                                    <label class="order__label">
                                        <span class="order__text">Ваше имя</span>
                                        <input type="email" name="Email" class="order__input"
                                               placeholder="post@gmail.com">
                                    </label>
                                    <button class="order__btn btn">Оформить заказ</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <br>


            <!-- КНОПКА ВСЕ ТОВАРЫ
            <div class="all_products">
                <a href="allProducts.php" class="all_products_text">Все товары</a>
                <a href="allProducts.php"><img src="assets/img/svg/arrow.svg" alt="Вперёд" class="all_products_img"></a>
            </div> -->
        </div>

        <!-- О КОМПАНИИ -->
        <section class="about-all">
            <div class="container">
                <h3 class="block_name" id="about">Доставка</h3>
                <p class="about_text">Порядок обработки заказов: <br>

                   <li> Заказы, оформленные в рабочее время (пн-пт 9:00–22:00; сб 10:00–19:00; вс 12:00-20:00),
                    обрабатываются в тот же день и отправляются в течение суток после обработки;</li>
                    <br>
                   <li> Заказы, оформленные в выходные или праздничные дни, отправляются в ближайший рабочий день; <br></li>
                   <li> Сделав заказ, вы получите подтверждающее электронное письмо с номером и составом заказа. Затем в
                    течение 15 минут с вами свяжется наш оператор, чтобы окончательно подтвердить заказ;</li>
                    <br>
                    <li> После отправления заказа вам будут отправлено электронное письмо с трек-номером, по которому можно
                    отследить статус посылки. Проверить статус отправления можно по трек-номеру на сайте выбранной
                    службы доставки.</li>
                    <br>
                   <li> Товары можно забронировать на сутки с момента оформления. <br></li>
                <br>
                   <li> Контактные данные, состав заказа, а также способ оплаты и доставки можно изменить только до
                    подтверждения заказа.</p></li>
                <h3 class="block_name-pay" id="about">Оплата</h3>
               <p class="about_text"> <li>Услуга возможна только при условии доставки Почтой России или транспортной
                    компанией СДЭК. При этом сумма заказа не может превышать 30 тыс. руб.;</li>
                    <br>
                   <li> У каждого клиента может быть только один заказ с оплатой при получении, находящийся в процессе
                    доставки. Клиентам с имеющимися возвратами возможность выбрать оплату при получении не
                    предоставляется;</li>
                  <li> Обратите внимание, что при оплате наложенным платежом взимается страховой сбор и комиссия за
                    перечисление средств отправителю.</li>
                    <br>
                   <li> Также возможна частичная оплата заказа при получении. При подтверждении заказа оператор в праве
                    запросить сделать предоплату доставки, если доставка осуществляется в труднодоступный регион. В этом
                    случае доставка оплачивается онлайн, а товары – при получении</p></li>
            </div>
        </section>

        <!-- ПРЕИМУЩЕСТВА -->
        <section class="advantages">
            <div class="container">
                <h3 class="block_name" id="advantages">Помощь</h3>
                <p class="about_text">Какова стоимость доставки заказа? <br>

                    <li> Стоимость доставки рассчитывается для каждого клиента индивидуально. Зависит стоимость от веса заказа, способа и региона доставки.</li>
                    <br>
                    <li> Узнать стоимость доставки можно пройдя в корзину и начав оформление заказа.</p></li>
            </div>


        </section>
    </main>


<?php
include 'includes/footer.php';

?>