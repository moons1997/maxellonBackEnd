@extends('layouts.main')

@section('content')
    <div class="services_traction">
        @if(!empty($section_1))
            <section class="section about-header dp-page">
                <div class="container">
                    <div class="dp-page_content">
                        <div class="about-header_content">
                            <div class="about-header_content__img">
                                <img
                                        src="{{asset('b_images/section/'.$section_1->img)}}"
                                        alt="about-header"
                                />
                            </div>
                            <div class="about-header_content__info">
                                <div class="text_anime">
                                    <h1 class="about-header__title">
                                        <span>{{$section_1->title}}</span>
                                    </h1>
                                </div>

                                <div class="about-header__info-b">
                                    <div class="left text_anime">
                          <span>
                            {!! $section_1->info !!}
                          </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if(!empty($section_2))
            <section class="section about-footer dark_scroll">
            <div class="container">
                <div class="dp-page_content">
                    <div class="about-header_content">
                        <div class="about-header_content__img">
                            <img src="{{asset('b_images/section/'.$section_2->img)}}" alt="about-footer" />
                        </div>
                        <div class="about-header_content__info">
                            <div class="text_anime">
                                <h1 class="about-header__title">
                                    <span>{{$section_2->title}}</span>
                                </h1>
                            </div>

                            <div class="left text_anime">
                        <span>
                          {!! $section_2->info !!}
                        </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

        @if(!empty($section_3))
                <section class="section dp-page advantage customer">
                    <div class="container">
                        <div class="dp-page_content">
                            <div class="text_anime">
                                <h2 class="dp-page__title">
                                    <span> Аренда АКБ выгодна в следующих ситуациях:</span>
                                </h2>
                            </div>

                            <div class="text_anime">
                    <span>
                      <div class="advantage_box">
                          @for($i = 0; $i < 2; $i++)
                              <div class="advantage_box__item">
                                      <div class="advantage_box__icon">
                                        <img
                                                src="./b_images/section/{{$section_3[$i]->img}}"
                                                alt="values-icon"
                                        />
                                      </div>
                                      <h2 class="advantage_box__title">
                                        {{$section_3[$i]->title}}
                                      </h2>
                              </div>
                          @endfor

                      </div>
                    </span>
                            </div>
                            <div class="text_anime">
                    <span>
                      <div class="advantage_box">
                        <div class="advantage_box__item long">
                          <div class="advantage_box__icon">
                            <img
                                    src="./b_images/section/{{$section_3[2]->img}}"
                                    alt="values-icon"
                            />
                          </div>
                          <h2 class="advantage_box__title">
                            {{$section_3[2]->title}}
                          </h2>
                        </div>

                        <div class="advantage_box__item short">
                          <div class="advantage_box__icon">
                            <img
                                    src="./b_images/section/{{$section_3[3]->img}}"
                                    alt="values-icon"
                            />
                          </div>
                          <h2 class="advantage_box__title">
                            {{$section_3[3]->title}}
                          </h2>
                        </div>
                      </div>
                    </span>
                            </div>

                            <div class="advantage_box-mob values_mob">
                                <div class="serv swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach($section_3 as $item)
                                        <div class="swiper-slide">
                                            <div class="advantage_box__item">
                                                <div class="advantage_box__icon">
                                                    <img
                                                            src="./b_images/section/{{$item->img}}"
                                                            alt="values-icon"
                                                    />
                                                </div>
                                                <h2 class="advantage_box__title">
                                                    {{$item->title}}
                                                </h2>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="swiper-button-next">
                                    <svg
                                            width="37"
                                            height="37"
                                            viewBox="0 0 37 37"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                                d="M29.257 18.4962H7.74499"
                                                stroke="#282828"
                                                stroke-width="3.04225"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                        />
                                        <path
                                                d="M18.501 7.74023L7.74499 18.4962L18.501 29.2522"
                                                stroke="#282828"
                                                stroke-width="3.04225"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                        />
                                    </svg>
                                </div>
                                <div class="swiper-button-prev">
                                    <svg
                                            width="37"
                                            height="37"
                                            viewBox="0 0 37 37"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                                d="M29.257 18.4962H7.74499"
                                                stroke="#282828"
                                                stroke-width="3.04225"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                        />
                                        <path
                                                d="M18.501 7.74023L7.74499 18.4962L18.501 29.2522"
                                                stroke="#282828"
                                                stroke-width="3.04225"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                        />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        @endif
        <section class="section advantage dp-page delivery">
                <div class="container">
                    <div class="dp-page_content">
                        <div class="text_anime">
                            <h2 class="dp-page__title">
                                <span>Доставка АКБ</span>
                            </h2>
                        </div>

                        <div class="dp-page__subtitle text_anime">
                    <span
                    >Доставка может быть организована двумя способами, исходя
                      из Ваших пожеланий:</span
                    >
                        </div>
                        <div class="text_anime">
                    <span>
                      <div class="advantage_box">
                        <div class="advantage_box__item left">
                          <div class="advantage_box__info">
                            <img
                                    src="./images/icon_number_01.png"
                                    alt="icon_number_01"
                            />
                          </div>
                          <div class="advantage_box__info info__bold">
                            Доставка организуется со стороны нашей компании в
                            удобное для Вас время и место.
                          </div>
                          <div class="advantage_box__info">
                            Доставка по городу Ташкент осуществляется бесплатно!
                          </div>
                          <div class="advantage_box__info">
                            По другим регионам Республики Узбекистан цена
                            доставки рассчитывается индивидуально.
                          </div>
                        </div>

                        <div class="advantage_box__item right">
                          <div class="right_b">
                            <div class="advantage_box__info">
                              <img
                                      src="./images/icon_number_02.png"
                                      alt="icon_number_02"
                              />
                            </div>
                            <div class="advantage_box__info info__bold">
                              Самовывоз с нашего склада
                            </div>
                            <div class="advantage_box__info">
                              Юнусобод тумани, Чингиз Айтматов кучаси, 2-Б-уй
                            </div>
                          </div>
                          <div class="map">
                            <iframe
                                    src="https://yandex.com/map-widget/v1/?um=constructor%3Ad9a84b8d26b99009d162fcee3eaae3235ed1f911fca7f50a6f8864836085be6a&amp;source=constructor"
                                    width="538"
                                    height="325"
                                    frameborder="0"
                            ></iframe>
                          </div>
                        </div>
                      </div>
                    </span>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="section footer fp-auto-height">
                <div class="container">
                    <div class="footer-content">
                        <div class="footer-content__item contact deck">
                            <div class="footer__title">Адрес:</div>
                            <p class="mb-4">
                                Г. Ташкент, проспект Мустакиллик, 88-а, Бизнес центр
                                «Darhan»
                            </p>
                        </div>
                        <div class="footer-content__item contact deck">
                            <div class="footer__title">Контакты:</div>
                            <p><a href="tel: +998781400775">+998 78 1400775</a></p>
                            <p><a href="tel: +998909440775">+998 90 9440775</a></p>
                            <p>
                                <a href="mailto: info@maxcellon.uz">info@maxcellon.uz</a>
                            </p>
                        </div>
                        <div class="footer-content__item contact mob">
                            <div class="footer__title">Адрес:</div>
                            <p class="mb-4">
                                Г. Ташкент, проспект Мустакиллик, 88-а, Бизнес центр
                                «Darhan»
                            </p>

                            <div class="footer__title">Контакты:</div>
                            <p><a href="tel: +998781400775">+998 78 1400775</a></p>
                            <p>
                                <a href="mailto: info@maxcellon.uz">info@maxcellon.uz</a>
                            </p>
                        </div>

                        <div class="footer-content__item navbar">
                            <div class="footer__title">Сервис</div>
                            <ul class="footer__navbar">
                                <li>
                                    <a href="/traction-battery-rental"
                                    >Аренда тяговых аккумуляторов</a
                                    >
                                </li>
                                <li>
                                    <a href="/loader-rental"
                                    >Аренда погрузчиков</a
                                    >
                                </li>
                                <li>
                                    <a href="/after-sales-service"
                                    >После продажное обслуживание</a
                                    >
                                </li>
                                <li>
                                    <a href="/warehouse-equipment-repair"
                                    >Ремонт складской техники</a
                                    >
                                </li>
                                <li>
                                    <a href="/training-consultation"
                                    >Обучение/Консултация</a
                                    >
                                </li>
                            </ul>
                        </div>
                        <div class="footer-content__item navbar">
                            <div class="footer__title">Продажа</div>
                            <ul class="footer__navbar">
                                <li>
                                    <a href="/sale-of-accumulators"
                                    >Продажа аккумуляторов</a
                                    >
                                </li>
                                <li>
                                    <a href="/sale-of-loader">Продажа погрузчиков</a>
                                </li>
                                <li>
                                    <a href="/installment-of-accumulators"
                                    >Рассрочка аккумуляторов</a
                                    >
                                </li>
                                <li>
                                    <a href="/loader-installments"
                                    >Рассрочка погрузчиков</a
                                    >
                                </li>
                                <li><a href="/test-drive">Тест-драйв</a></li>
                            </ul>
                        </div>

                        <div class="footer-content__item social">
                            <div class="footer__title">Соц. сети:</div>
                            <a href="/default.html">
                                <svg
                                        width="19"
                                        height="20"
                                        viewBox="0 0 19 20"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                >
                                    <g clip-path="url(#clip0)">
                                        <path
                                                d="M18.2795 3.85159L15.5131 16.3047C15.3044 17.1836 14.7601 17.4024 13.9867 16.9883L9.77165 14.0235L7.7378 15.8906C7.51273 16.1055 7.32448 16.2852 6.8907 16.2852L7.19353 12.1875L15.0057 5.44924C15.3453 5.16018 14.932 5.00002 14.4778 5.28909L4.82002 11.0938L0.662278 9.85159C-0.242112 9.58205 -0.258481 8.9883 0.850522 8.57424L17.1132 2.59377C17.8661 2.32424 18.525 2.75393 18.2795 3.85159Z"
                                                fill="#282828"
                                        />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                            <rect width="18.3333" height="20" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                            <a href="https://instagram.com/maxcellon?igshid=13jv8bc1dt6eh">
                                <svg
                                        width="20"
                                        height="20"
                                        viewBox="0 0 20 20"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                            d="M14.167 1.66602H5.83366C3.53247 1.66602 1.66699 3.5315 1.66699 5.83268V14.166C1.66699 16.4672 3.53247 18.3327 5.83366 18.3327H14.167C16.4682 18.3327 18.3337 16.4672 18.3337 14.166V5.83268C18.3337 3.5315 16.4682 1.66602 14.167 1.66602Z"
                                            stroke="#282828"
                                            stroke-width="1.66667"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                    <path
                                            d="M13.3328 9.4733C13.4356 10.1668 13.3171 10.8751 12.9942 11.4975C12.6713 12.1198 12.1604 12.6245 11.5341 12.9397C10.9079 13.2549 10.1981 13.3646 9.50592 13.2532C8.8137 13.1419 8.17423 12.815 7.67846 12.3193C7.18269 11.8235 6.85587 11.184 6.74449 10.4918C6.6331 9.79959 6.74282 9.08988 7.05804 8.46361C7.37325 7.83734 7.87792 7.32642 8.50025 7.0035C9.12258 6.68058 9.83089 6.56212 10.5244 6.66496C11.2319 6.76987 11.8868 7.09952 12.3925 7.60522C12.8982 8.11092 13.2279 8.76586 13.3328 9.4733Z"
                                            stroke="#282828"
                                            stroke-width="1.66667"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                    <path
                                            d="M14.583 5.41602H14.5918"
                                            stroke="#282828"
                                            stroke-width="1.66667"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                </svg>
                            </a>
                        </div>
                        <div class="footer-content__item scroll_top">
                            <div class="scroll-top">
                                <a>
                                    <svg
                                            width="34"
                                            height="34"
                                            viewBox="0 0 34 34"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                                d="M17 26.9154V7.08203"
                                                stroke="black"
                                                stroke-width="2.83333"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                        />
                                        <path
                                                d="M7.08301 16.9987L16.9997 7.08203L26.9163 16.9987"
                                                stroke="black"
                                                stroke-width="2.83333"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                        />
                                    </svg>
                                </a>
                                вверх
                            </div>
                        </div>
                    </div>
                    <div class="footer-bottom">
                        <div class="footer-content__item logo">
                            <div class="footer__logo">
                                <a href="{{route('main')}}">
                                    <img src="./images/logo_light.png" alt="logo"
                                    /></a>
                            </div>

                        </div>
                        <div class="license">
                            © 2021 Maxcellon. Все права защищены.
                        </div>
                    </div>
                </div>
            </footer>
    </div>

@endsection