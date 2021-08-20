window.addEventListener("DOMContentLoaded", () => {
  function preloader() {
    if (document.querySelector(".preloader")) {
      document.documentElement.classList.add("flow-hidden");

      let counter = 0,
          c = 0;

      let counterNode = document.querySelector(".preloader__percent"),
          fillNode = document.querySelector(".preloader__line-fill"),
          textNode = document.querySelector(".preloader__text");

      let i = setInterval(() => {
        counter++;
        c++;
        if (c === 51) {
          textNode.classList.add("text-fill");
        }

        counterNode.textContent = `${counter}%`;
        fillNode.style.width = `${counter}%`;

        if (counter === 100) {
          setTimeout(() => {}, 2000);
          clearInterval(i);

          document.querySelector(".wrapper").style.height = "100vh";
          mainSlider();

          let tl = gsap.timeline();
          tl.to(".preloader__line ", {
            opacity: 0,
            duration: 1,
          });
          tl.to(".preloader__text ", {
            opacity: 0,
            duration: 1,
          });
          tl.to(
              ".preloader__percent ",
              {
                opacity: 0,
                duration: 1,
              },
              "-=1"
          );

          tl.to(".preloader__top ", {
            y: "-100%",
            duration: 2.5,
            ease: "back.out(1.5)",
          });
          tl.to(
              ".preloader__bottom",
              {
                y: "100%",
                duration: 2.5,
                ease: "back.out(1.5)",
                onComplete() {
                  document.querySelector(".preloader").style.display = "none";
                },
              },
              "-=2.5"
          );
        }
      }, 25);
    }
  }
  preloader();

  const mainSlider = () => {
    let slidesUrl = [];
    document.querySelectorAll("[data-producurl]").forEach((item) => {
      slidesUrl.push(item.dataset.producurl);
    });

    const swiper = new Swiper(".hero__slider", {
      // slidesPerView: 1,
      // loop: true,
      simulateTouch: false,
      allowTouchMove: false,
      speed: 2000,
      // loopedSlides: 50,
      draggable: false,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
    });

    function sanitisePercentage(i) {
      return Math.min(100, Math.max(0, i));
    }

    // Slider
    var percentTime;
    var tick;
    var progressBar = document.querySelector(".hero-pagination__line span");
    swiper.on("slideChange", function (e) {
      var swiper = this;
      var defaultSlideDelay = swiper.params.autoplay.delay;
      var currentIndex = swiper.realIndex + 1;
      var currentSlide = swiper.slides[currentIndex];
      var currentSlideDelay = defaultSlideDelay;

      updateSwiperProgressBar(progressBar, currentSlideDelay);

      // change page url

      const linkSlideBtn = document.querySelector(".slid-btn");

      if (linkSlideBtn) {
        linkSlideBtn.setAttribute("href", `${slidesUrl[swiper.realIndex]}`);
      }
    });

    var getTimeout = (function () {
      var e = setTimeout,
          b = {};
      setTimeout = function (a, c) {
        var d = e(a, c);
        b[d] = [Date.now(), c];
        return d;
      };
      return function (a) {
        return (a = b[a]) ? Math.max(a[1] - Date.now() + a[0], 0) : NaN;
      };
    })();

    function updateSwiperProgressBar(bar, slideDelay) {
      function startProgressBar() {
        resetProgressBar();
        setTimeout(() => {
          bar.style.transition = "width 0.55s";
        }, 50);
        tick = setInterval(progress, 50);
      }

      function progress() {
        var timeLeft = getTimeout(swiper.autoplay.timeout);
        if (swiper.autoplay.running && !swiper.autoplay.paused) {
          percentTime = sanitisePercentage(
              120 - Math.round((timeLeft / slideDelay) * 100)
          );
          bar.style.width = percentTime + "%";

          if (percentTime > 100) {
            resetProgressBar();
          }
        }

        if (swiper.autoplay.paused) {
          percentTime = 0;
          bar.style.width = 0;
        }
      }

      function resetProgressBar() {
        percentTime = 0;
        bar.style.width = 0;
        bar.style.transition = "none";
        clearInterval(tick);
      }

      startProgressBar();
    }
  };
  // mainSlider();

  // ____________________FULL PAGE
  const lmenu = document.querySelector(".dp-page_lmenu");
  const header = document.querySelector("header");
  const mob_menuBtn = document.querySelector(".navbar-menu__btn");

  function fullPage(menu_nodes, header) {
    new fullpage("#full-page", {
      autoScrolling: true,
      // scrollBar: true,
      anchors: ["page1", "page2", "page3", "page4", "page5", "page6"],
      onLeave: function (index, nextIndex, direction) {
        // console.log(nextIndex.index);

        if (document.querySelector(".home")) {
          if (nextIndex.index >= 3) {
            header.classList.add("sticky");
          } else {
            header.classList.remove("sticky");
          }
        } else if (document.querySelector(".about")) {
          if (nextIndex.index >= 2) {
            header.classList.add("sticky");
          } else {
            header.classList.remove("sticky");
          }
        } else if (document.querySelector(".installment")) {
          // let { anchor } = index;
          // console.log(anchor);

          if (nextIndex.index > 0) {
            header.classList.add("sticky");
            menu_nodes.classList.add("dark_color");
            if (nextIndex.index === 2) {
              menu_nodes.classList.add("dp-page_lmenu_hidden");
            } else if (nextIndex.index !== 2) {
              menu_nodes.classList.remove("dp-page_lmenu_hidden");
            }
          } else {
            header.classList.remove("sticky");
            menu_nodes.classList.remove("dark_color");
          }
        } else if (document.querySelector(".sale_accumulator")) {
          if (nextIndex.index > 0) {
            header.classList.add("sticky");
            menu_nodes.classList.add("dark_color");
            if (nextIndex.index === 3) {
              menu_nodes.classList.add("dp-page_lmenu_hidden");
            } else if (nextIndex.index !== 3) {
              menu_nodes.classList.remove("dp-page_lmenu_hidden");
            }
          } else {
            header.classList.remove("sticky");
            menu_nodes.classList.remove("dark_color");
          }
        } else if (document.querySelector(".sale_loader")) {
          if (nextIndex.index === 1) {
            menu_nodes.classList.add("dp-page_lmenu_hidden");
          } else if (nextIndex.index !== 1) {
            menu_nodes.classList.remove("dp-page_lmenu_hidden");
          }
        } else if (document.querySelector(".services_traction")) {
          if (nextIndex.index > 0) {
            header.classList.add("sticky");
            menu_nodes.classList.add("dark_color");
            if (nextIndex.index === 4) {
              menu_nodes.classList.add("dp-page_lmenu_hidden");
            } else if (nextIndex.index !== 4) {
              menu_nodes.classList.remove("dp-page_lmenu_hidden");
            }
          } else {
            header.classList.remove("sticky");
            menu_nodes.classList.remove("dark_color");
          }
        }

        if (direction == "down") {
          if (document.querySelector(".home")) {
            // textAnime("[data-animate]");
            textAnime(".about-home .text_anime span");
            textAnime(".induidal .text_anime span");
            textAnime(".solution .text_anime span");
            textAnime(".car.first .text_anime span");
            textAnime(".car.second .text_anime span");
          } else if (document.querySelector(".about")) {
            textAnime(".about-header .text_anime span");
            textAnime(".about-footer .text_anime span");
            textAnime(".induidal .text_anime span");
            textAnime(".values .text_anime span");
          } else if (document.querySelector(".installment")) {
            textAnime(".advantage .text_anime span");
          } else if (document.querySelector(".sale_accumulator")) {
            textAnime(".dp-page.one .text_anime span");
            textAnime(".dp-page.two .text_anime span");
            textAnime(".benefits .text_anime span");
            textAnime(".delivery .text_anime span");
          }
        }
      },
    });
  }
  fullPage(lmenu, header);

  function destroyFullPage() {
    fullpage_api.destroy("all");
  }

  function startFullPage(header) {
    const lmenu = document.querySelector(".dp-page_lmenu");

    fullPage(lmenu, header);
  }

  function mobDestroyFullPage() {
    const scroll_top = document.querySelector(".scroll-top a");
    if (scroll_top) {
      if (window.innerWidth <= 1024) {
        fullpage_api.destroy("all");
        scroll_top.addEventListener("click", function (e) {
          e.preventDefault();
          $("html, body").animate({ scrollTop: 0 }, "300");
          document
              .querySelector(".dp-page_lmenu")
              .classList.remove("dp-page_lmenu_hidden");
        });
      } else {
        scroll_top.addEventListener("click", function () {
          fullpage_api.moveTo("page1", 1);
          document
              .querySelector(".dp-page_lmenu")
              .classList.remove("dp-page_lmenu_hidden");
        });
      }
    }
  }
  mobDestroyFullPage();

  // Text_ANIME__________________START
  const textAnime = (nodes) => {
    var tl = gsap.timeline();
    tl.fromTo(
        nodes,
        { y: "100%", opacity: 0 },
        {
          y: 0,
          duration: 0.5,
          opacity: 1,
          stagger: 0.3,
        }
    );
  };

  function allMenu(header, mob_menuBtn) {
    // Drop Down Hover Image________________START
    const dp_services = gsap.utils.toArray(
        ".dp_services .dropdown-menu__navbar a"
    );
    const dp_services_imgWrap = document.querySelector(".dp_services .bgimg");
    const dp_services_activImg = dp_services_imgWrap.dataset.activdimg;

    const dp_sale = gsap.utils.toArray(".dp_sale .dropdown-menu__navbar a");
    const dp_sale_imgWrap = document.querySelector(".dp_sale .bgimg");
    const dp_sale_activImg = dp_sale_imgWrap.dataset.activdimg;

    function dropDownImg(nodes, imgWrapper, activeImg) {
      nodes.forEach((item) => {
        item.addEventListener("mouseenter", function (e) {
          imgHover(e, imgWrapper, activeImg);
        });
        item.addEventListener("mouseleave", function (e) {
          imgHover(e, imgWrapper, activeImg);
        });
      });
    }
    function imgHover(e, wrapImg, activeImg) {
      if (e.type === "mouseenter") {
        const targetImg = e.target.dataset.dimg;
        const tl = gsap.timeline();

        tl.set(wrapImg, {
          backgroundImage: `url(${targetImg})`,
        }).to(wrapImg, {
          duration: 1,
          autoAlpha: 1,
        });
      } else if (e.type === "mouseleave") {
        const tl = gsap.timeline();

        tl.set(wrapImg, {
          backgroundImage: `url(${activeImg})`,
        }).to(wrapImg, {
          duration: 0.5,
          autoAlpha: 1,
        });
      }
    }

    dropDownImg(dp_services, dp_services_imgWrap, dp_services_activImg);
    dropDownImg(dp_sale, dp_sale_imgWrap, dp_sale_activImg);

    // Drop Down Hover Image________________END

    // Menu_____________START
    const navbar_dlinks = document.querySelectorAll(".deck .dropdown");

    const block_page = document.querySelector(".block_page");

    function dropDown() {
      navbar_dlinks.forEach((item) => {
        item.addEventListener("click", dropDownActive);
      });
    }
    function dropDownActive(e) {
      navbar_dlinks.forEach((item) => {
        if (item !== this) {
          item.classList.remove("show");
        }
      });
      this.classList.toggle("show");
      if (this.classList.contains("show")) {
        header.classList.add("active");
      } else {
        header.classList.remove("active");
      }
    }
    const removeMenu = () => {
      navbar_dlinks.forEach((item) => {
        item.classList.remove("show");
      });
      header.classList.remove("active");
    };

    block_page.addEventListener("click", removeMenu);

    dropDown();

    // Menu_____________END

    // Menu__mob_________________START

    const menu__list = document.querySelector(".navbar-menu");
    const mob__dp = document.querySelectorAll(".mob .dropdown");

    mob_menuBtn.addEventListener("click", function () {
      menu__list.classList.toggle("active");
      document
          .querySelector(".header-content__logo")
          .classList.toggle("mobActive");
    });
    mob__dp.forEach((item) => {
      item.addEventListener("click", activeMobDp);
    });

    function activeMobDp() {
      mob__dp.forEach((item) => {
        if (item !== this) {
          item.classList.remove("show");
        }
      });
      this.classList.toggle("show");
    }
    const mob_navbarList = document.querySelectorAll(".mob-dp__item");
    mob_navbarList.forEach((item) => {
      item.addEventListener("click", function () {
        if (this.className == "mob-dp__item") {
          menu__list.classList.remove("active");
          document
              .querySelector(".header-content__logo")
              .classList.remove("mobActive");
        }
      });
    });
    // Menu__mob_________________START
  }

  allMenu(header, mob_menuBtn);

  function heroScroll(header, mob_menuBtn) {
    window.addEventListener("scroll", function () {
      const solution_top_y = document
          .querySelector(".dark_scroll")
          .getBoundingClientRect().y;
      if (solution_top_y < 100) {
        header.classList.add("sticky");
        mob_menuBtn.classList.add("dark_btn");
      } else {
        header.classList.remove("sticky");
        mob_menuBtn.classList.remove("dark_btn");
      }
    });
  }
  heroScroll(header, mob_menuBtn);

  function aboutSlider() {
    const slide_about = document.querySelector(".values_mob");
    if (slide_about) {
      var swiper = new Swiper(".values_mob .swiper-container", {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
          // when window width is >= 320px
          320: {
            slidesPerView: 1,
          },
          769: {
            slidesPerView: 2,
          },
          1025: {
            slidesPerView: 3,
          },
        },
      });
    }
  }
  aboutSlider();
  function saleSlider() {
    const slide_sale = document.querySelector(".advantage_box-mob");
    if (slide_sale) {
      var swiper = new Swiper(".advantage_box-mob .swiper-container", {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
          // when window width is >= 320px
          320: {
            slidesPerView: 1,
          },
          769: {
            slidesPerView: 2,
          },
          1025: {
            slidesPerView: 3,
          },
        },
      });
    }
  }
  saleSlider();

  function servicesSlider() {
    const slide_about = document.querySelector(".serv");
    if (slide_about) {
      var swiper = new Swiper(".serv", {
        slidesPerView: 2,
        spaceBetween: 30,
        loop: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
          // when window width is >= 320px
          320: {
            slidesPerView: 1,
          },
          769: {
            slidesPerView: 2,
          },
          1025: {
            slidesPerView: 2,
          },
        },
      });
    }
  }
  servicesSlider();

  // swup
  const swup = new Swup({
    plugins: [
      new SwupOverlayTheme({
        color: "#282828",
        duration: 1000,
        direction: "to-bottom",
      }),
    ],
  });

  // ____________calculator
  function calcSumm() {
    let output__amount = $(".output__amount");
    let output__term = $(".output__term");
    let output__percent = $(".output__percent");

    let amountRange = $(".amount__range").val();
    let termRange = $(".term__range").val();
    let percentRange = $(".percent__range").val();

    output__amount.html(amountRange + " млн");
    output__term.html(termRange + " месяцев");
    output__percent.html(percentRange + " %");

    $(".amount__range").on("change input", function () {
      amountRange = $(".amount__range").val();
      output__amount.html(amountRange + " млн");
      summ(amountRange, termRange, percentRange);
    });

    $(".term__range").on("change input", function () {
      termRange = $(".term__range").val();
      output__term.html(termRange + " месяцев");
      summ(amountRange, termRange, percentRange);
    });

    $(".percent__range").on("change input", function () {
      percentRange = $(".percent__range").val();
      output__percent.html(percentRange + " %");
      summ(amountRange, termRange, percentRange);
    });

    function summ(amountRange, termRange, percentRange) {
      amountRange *= 1000000;
      let res = (amountRange * percentRange) / 100;
      amountRange -= res;
      let totalMonth = amountRange / termRange;

      $(".summa__count span").html(round(totalMonth, 3));
    }
    summ(amountRange, termRange, percentRange);

    function round(value, decimals) {
      return Number(Math.round(value + "e" + decimals) + "e-" + decimals);
    }
  }
  calcSumm();
  // ____________calculator

  swup.on("willReplaceContent", function () {
    destroyFullPage();
  });
  swup.on("contentReplaced", function () {
    const header = document.querySelector("header");
    const mob_menuBtn = document.querySelector(".navbar-menu__btn");
    startFullPage(header);
    mobDestroyFullPage();
    mainSlider();
    aboutSlider();
    allMenu(header, mob_menuBtn);
    saleSlider();
    heroScroll(header, mob_menuBtn);
    servicesSlider();
    calcSumm();
  });
});
