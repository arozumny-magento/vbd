$(function () {

    function detectLanguage() {
        const lang = document.documentElement.lang || navigator.language || "en";
        return lang.toLowerCase().slice(0, 2);
    }

    function normalizeLabel(labelText) {
        return labelText.replace(/\*/g, "").trim().toLowerCase();
    }

    const fieldNameFromLabel = {
        "first name": "firstname",
        "last name": "lastname",
        email: "email",
        "company name": "companyname",
        "job title": "jobtitle",
        phone: "phone",
        city: "city",
        country: "country",
        comment: "comment"
    };

    const translations = {
        labels: {
            pt: {
                firstname: "Nome",
                lastname: "Sobrenome",
                email: "E-mail",
                companyname: "Empresa",
                jobtitle: "Cargo",
                phone: "Telefone",
                city: "Cidade",
                country: "País",
                comment: "Comentário"
            },
            es: {
                firstname: "Nombre",
                lastname: "Apellido",
                email: "Correo electrónico",
                companyname: "Empresa",
                jobtitle: "Cargo",
                phone: "Teléfono",
                city: "Ciudad",
                country: "País",
                comment: "Comentario"
            },
            zh: {
                firstname: "名字",
                lastname: "姓氏",
                email: "电子邮箱",
                companyname: "公司名称",
                jobtitle: "职务",
                phone: "电话",
                city: "城市",
                country: "国家",
                comment: "查询信息"
            }
        },
        placeholders: {
            pt: {
                firstname: "Insira seu nome",
                lastname: "Insira seu sobrenome",
                email: "Insira seu e-mail",
                companyname: "Insira o nome da sua empresa",
                jobtitle: "Insira seu cargo",
                phone: "Insira seu telefone",
                city: "Escolha sua cidade",
                country: "Escolha sua país",
                comment: "Insira sua mensagem"
            },
            es: {
                firstname: "Ingrese su nombre",
                lastname: "Ingrese su apellido",
                email: "Ingrese su correo electrónico",
                companyname: "Ingrese el nombre de la empresa",
                jobtitle: "Ingrese su cargo",
                phone: "Ingrese su teléfono",
                city: "Ingrese su ciudad",
                country: "Ingrese su país",
                comment: "Escriba su comentario"
            },
            zh: {
                firstname: "请输入您的名字",
                lastname: "请输入您的姓氏",
                email: "请输入您的电子邮箱",
                companyname: "请输入您的公司名",
                jobtitle: "请输入您的职务",
                phone: "请输入您的电话号码",
                city: "请输入您的城市名",
                country: "国家",
                comment: "请输入您的查询信息"
            }
        },
        buttons: {
            pt: { submit: "ENVIAR" },
            es: { submit: "ENVIAR" },
            zh: { submit: "提交查询" }
        },
        textBlocks: {
            pt: {
                privacyNotice:
                    'Este formulário coleta seu nome, endereço de e-mail e número de telefone para que possamos nos comunicar com você. Por favor, revise nosso <a href="https://www.tridenttrust.com/legal-pages/data-protection/">Aviso de Privacidade</a> para ver como protegemos e gerenciamos seus dados enviados.<br><br>Ao clicar em enviar, eu consinto que a Trident Trust colete os dados pessoais acima mencionados e que li e entendi o <a href="https://www.tridenttrust.com/legal-pages/data-protection/">Aviso de Privacidade da Trident Trust</a>.',
                captchaInstruction: "Insira os caracteres que você vê"
            },
            es: {
                privacyNotice:
                    'Este formulario recopila su nombre, dirección de correo electrónico y número de teléfono para que podamos comunicarnos con usted. Por favor, revise nuestro <a href="https://www.tridenttrust.com/legal-pages/data-protection/">Aviso de Privacidad</a> para ver cómo protegemos y gestionamos sus datos enviados.<br><br>Al hacer clic en enviar, doy mi consentimiento a Trident Trust para recopilar los datos personales arriba mencionados y he leído y comprendido el <a href="https://www.tridenttrust.com/legal-pages/data-protection/">Aviso de Privacidad de Trident Trust</a>.',
                captchaInstruction: "Ingrese los caracteres que ve"
            },
            zh: {
                privacyNotice:
                    '本表单收集您的姓名、电子邮件地址和电话号码，以便我们与您沟通。请查看我们的<a href="https://www.tridenttrust.com/legal-pages/data-protection/">隐私声明</a>，了解我们如何保护和管理您提交的数据。<br><br>点击提交，即表示我同意Trident Trust收集上述个人信息，并已阅读并理解<a href="https://www.tridenttrust.com/legal-pages/data-protection/">Trident Trust的隐私声明</a>。',
                captchaInstruction: "请输入您看到的字母"
            }
        }
    };

    if (typeof MsCrmMkt !== "undefined" && MsCrmMkt.MsCrmFormLoader) {
        MsCrmMkt.MsCrmFormLoader.on("afterFormLoad", function () {
            const lang = detectLanguage();
            const labelT = translations.labels[lang];
            const placeholderT = translations.placeholders[lang];
            const buttonT = translations.buttons[lang];
            const textBlockT = translations.textBlocks[lang];

            if (lang !== "en" && labelT && placeholderT) {
                // Translate form fields
                document.querySelectorAll(".lp-form-fieldInput").forEach((input) => {
                    const container = input.closest(".lp-form-field");
                    if (!container) return;

                    const label = container.querySelector("label");
                    if (!label) return;

                    const rawLabel = label.textContent || "";
                    const cleanLabel = normalizeLabel(rawLabel);
                    const key = fieldNameFromLabel[cleanLabel];
                    if (!key) return;

                    if (labelT[key] && label.firstChild?.nodeType === Node.TEXT_NODE) {
                        label.firstChild.nodeValue = labelT[key];
                    }

                    if (placeholderT[key]) {
                        input.placeholder = placeholderT[key];
                    }
                });

                // Translate submit button
                if (buttonT?.submit) {
                    const submitButton = document.querySelector('button[type="submit"].lp-form-button');
                    if (submitButton) submitButton.textContent = buttonT.submit;
                }

                // Translate privacy notice
                if (textBlockT?.privacyNotice) {
                    const tryReplacePrivacyText = () => {
                        const blocks = document.querySelectorAll('div[data-editorblocktype="Text"]');
                        for (const block of blocks) {
                            const text = block.innerText?.toLowerCase();
                            if (
                                text.includes("this form collects your name") &&
                                text.includes("by clicking submit")
                            ) {
                                block.innerHTML = textBlockT.privacyNotice;
                                return;
                            }
                        }
                    };

                    let attempts = 0;
                    const interval = setInterval(() => {
                        if (attempts++ > 10) return clearInterval(interval);
                        tryReplacePrivacyText();
                    }, 300);
                }

                // Translate CAPTCHA label
                // Translate CAPTCHA label using MutationObserver
                if (textBlockT?.captchaInstruction) {
                    const tryTranslateCaptcha = () => {
                        const captchaLabel = document.querySelector("#wlspispHipInstructionContainer");
                        if (
                            captchaLabel &&
                            /enter the characters you see/i.test(captchaLabel.textContent)
                        ) {
                            captchaLabel.textContent = textBlockT.captchaInstruction;
                            return true;
                        }
                        return false;
                    };

                    // Try immediately
                    if (!tryTranslateCaptcha()) {
                        const observer = new MutationObserver(() => {
                            if (tryTranslateCaptcha()) observer.disconnect();
                        });

                        observer.observe(document.body, {
                            childList: true,
                            subtree: true
                        });
                    }
                }
            }
        });
    }




    var maxHeight = 0;

    var years = {};
    $('.award-year').each(function () {
        var year = $(this).attr('data-year');
        if (years[year]) {
            $(this).remove();
        } else {
            years[year] = true;
        }
    });

    $('.hover-card-btn').on('click', function () {
        $(this).closest('.hover-card').find('.card-bg').toggleClass('opacity-0 opacity-100 transition-all duration-300 duration-500');
        $(this).closest('.hover-card').find('.hover-card-btn-icon').toggleClass('rotate-45');
    });

    if ($('.office-service-selector').length) {
        var serviceCount = 0;
        var serviceSelectorCount = 0;
        var gridCols = "lg:grid-cols" + serviceSelectorCount;

        $('.office-service-selector').each(function (index) {
            serviceSelectorCount++;
            serviceCount = $(this).find('option').length;
            if (serviceCount < 2) {
                $(this).closest('.office-service-card').remove();
                serviceSelectorCount--;
            }
        });

        if (serviceSelectorCount <= 2) {
            gridCols = 'xl:grid-cols-2';
        } else if (serviceSelectorCount == 3) {
            gridCols = 'xl:grid-cols-3';
        } else if (serviceSelectorCount == 4) {
            gridCols = 'xl:grid-cols-4';
        }

        $('.service-grid').addClass(gridCols);

        $('.office-service-selector').on('change', function () {
            var serviceUrl = this.value;
            if (serviceUrl) {
                if (serviceUrl != 'all-services') {
                    if (serviceUrl == "/services/private-clients/private-yachts/" || serviceUrl == "/services/private-clients/private-yachts/") {
                        window.location = "/services/marine";
                    } else {
                        window.location = serviceUrl;
                    }

                }
            }
        });
    };

    if ($('.mobile-menu').length) {
        $('.nav-toggler').on('click', function () {
            var culture = $(this).data('culture');
            var region = $(this).data('region');
            /* If it's just the culture, then show the main global nav. If there's a region, show the regional nav.  */
            $('.regional-menu[data-region="' + region + '"]').toggleClass('hidden');
        });

        $('.nav-item').on('click', function () {
            $('.nav-item-container').toggleClass('hidden');
            $(this).hide();
            $(this).closest('.nav-item-container').toggleClass('hidden block')
            $(this).closest('.nav-item-container').find('.sub-nav').toggleClass('hidden block');
        });

        $('.back-btn').on('click', function () {
            $(this).closest('.sub-nav').toggleClass('hidden block')
            $(this).closest('.nav-item-container').find('.nav-item').show();
            $('.nav-item-container').removeClass('hidden').addClass('block');
        })
    }

    if ($('.slides-container').length) {
        $('.slides-container').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slides-container-nav',
            dots: true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 10000,
            pauseOnHover: false
        });
    }

    if ($('.videos-slider').length) {
        $('.videos-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: $('.prev'),
            nextArrow: $('.next'),
            appendDots: $('.custom-slick-dots'),
            fade: false,
            dots: true,
            infinite: true,
            autoplay: false,
            pauseOnHover: false
        });
    }

    if ($('.icon-slider').length) {
        $('.icon-slider').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows: false,
            fade: false,
            dots: true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
            pauseOnHover: false,
            responsive: [
                {
                    breakpoint: 1280,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }

            ]
        });
    }

    if ($('.slides-container').length) {
        $('.slides-container-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.slides-container',
            dots: false,
            centerMode: false,
            focusOnSelect: true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 10000,
            pauseOnHover: false,
        });
    }

    if ($('.news-container').length) {
        $('.news-container').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.news-container-nav'
        });
    }

    if ($('.news-container').length) {
        $('.news-container-nav').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            asNavFor: '.news-container',
            dots: false,
            centerMode: false,
            focusOnSelect: true
        });
    }

    if ($('.quote-picker').length) {
        $('.quote-picker').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            dots: true,
            autoplay: true,
            autoplaySpeed: 5000,
            adaptiveHeight: false,
        });
    }

    if ($('.history-slider-slides').length) {
        $('.history-slider-slides').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            infinite: false,
        });
    }

    if ($('#serviceSelector').length) {
        $('#serviceSelector').on('change', function () {
            var selectedValue = this.value;
            if (selectedValue == 'all-services') {
                $(".service-grid .grid-item").show();
                $(".no-services").hide();
            } else {
                var countItems = $(".service-grid").find(`[data-service='${selectedValue}']`).length;
                if (countItems > 0) {
                    $(".service-grid .grid-item").hide();
                    $(".service-grid").find(`[data-service='${selectedValue}']`).show();
                    $(".no-services").hide();
                } else {
                    $(".service-grid .grid-item").hide();
                    $(".no-services").show();
                }
            }
        });
    }

    if ($('#location').length) {
        $('#location').on('change', function () {
            var selectedValue = this.value;
            var selectedText = $("#location option:selected").text();
            var regionColour = "";
            if (selectedValue == "americas-caribbean") {
                regionColour = "#DBFE87";
            } else if (selectedValue == "amea") {
                regionColour = "#58D6C8";
            } else if (selectedValue == "europe") {
                regionColour = "#FF9456"
            } else {
                regionColour = "#FFFFFF";
            }
            $('.location-container').hide();
            $('#current-region-filter').html("<a title='View regional homepage for " + selectedText + "' href='/" + selectedValue + "'> <svg xmlns='http://www.w3.org/2000/svg' width='11.122' height='11.294' viewBox='0 11.122 11.294' class='mr-1 inline-block'>" +
                "<path id='Path_356' data-name='Path 356' d='M26.1,37.409,37.222,26.116H26.1Z' transform='translate(-26.1 -26.115)' fill='" + regionColour + "'></path> </svg>" + selectedText + "<a>");
            $('.' + selectedValue).show();
            AOS.refresh();
            if (selectedValue == "all") {
                $('.location-container').show();
                $('#current-region-filter').text('All Regions');
                AOS.refresh();
            }
        });
    }
    var selectedLocation = $("#downloadLocationFilter").val();
    var selectedService = $("#downloadServiceFilter").val();

    if ($('#downloadLocationFilter').length) {
        $('#downloadLocationFilter').on('change', function () {
            selectedLocation = this.value;
            var selectedText = $("#downloadLocationFilter option:selected").text();
            $('#current-office-filter').html(selectedText);
            $('.' + selectedLocation).show();
            AOS.refresh();

            $(".download-item").hide();
            $("." + selectedLocation).show();

            if (selectedLocation == "all") {
                $('#current-office-filter').text('All Offices');
                $(".download-item").show();
                AOS.refresh();
            }
        });
    }

    if ($('#downloadServiceFilter').length) {
        $('#downloadServiceFilter').on('change', function () {
            selectedService = this.value;
            var selectedText = $("#downloadServiceFilter option:selected").text();
            $('#current-service-filter').html(selectedText);
            $('.' + selectedService).show();
            AOS.refresh();

            $(".download-item").hide();
            $("." + selectedService).show();

            if (selectedService == "all") {
                $('#current-service-filter').text('All Services');
                $(".download-item").show();
                AOS.refresh();
            }
        });
    }

    if ($('#serviceFilter').length) {
        $('#serviceFilter').on('change', function () {
            var selectedValue = this.value;
            $('.service-card-grid').hide();
            $('.' + selectedValue).show();

            if (selectedValue == "all") {
                $('.service-card-grid').show();
            }
        });
    }

    if ($('#insightFilter').length) {
        $('#insightFilter').on('change', function () {
            AOS.refresh();
            var selectedValue = this.value;
            $('.insight-item').hide();
            $('.' + selectedValue).show();

            if (selectedValue == "all") {
                $('.insight-item').show();
                AOS.refresh();
            }
        });
    }


    if ($('#staffLocationFilter').length) {
        $('#staffLocationFilter').on('change', function () {
            selectedLocation = this.value;
            var selectedText = $("#staffLocationFilter option:selected").text();
            var selectedService = $("#staffServiceFilter").val();

            $('#current-office-filter').html(selectedText);
            $('.' + selectedLocation).show();

            $(".staff-item").hide();
            if (selectedService = "all") {
                $("." + selectedLocation).show();
            } else {
                $("." + selectedLocation + "." + selectedService).show();
            }
            if (selectedLocation == "all") {
                $('#current-office-filter').text('All Offices');
                $("." + selectedService).show();
            }

            if (selectedService == "all" && selectedLocation == "all") {
                $('.staff-item').show();
            }
        });
    }

    if ($('#staffServiceFilter').length) {
        $('#staffServiceFilter').on('change', function () {
            selectedService = this.value;
            var selectedText = $("#staffServiceFilter option:selected").text();
            var selectedLocation = $("#staffLocationFilter").val();

            $('#current-service-filter').html(selectedText);
            $('.' + selectedService).show();
            $(".staff-item").hide();

            if (selectedLocation == "all") {
                if (selectedService != "all") {
                    $("." + selectedService).show();
                } else {
                    $(".staff-item").show();
                }

            } else {
                $("." + selectedService + "." + selectedLocation).show();
            }

            if (selectedService == "all") {
                $('#current-service-filter').text('All Services');
                $("." + selectedLocation).show();
            }

            if (selectedService == "all" && selectedLocation == "all") {
                $('.staff-item').show();
            }
        });
    }





    if ($('#careerLocations').length) {
        $("#careerLocations option").each(function () {
            var countItems = $(".career-grid").find(`[data-office='${this.value}']`).length;
            if (this.value != 'all-locations') {
                this.append(' (' + countItems + ')')
            }
        });

        $('#careerLocations').on('change', function () {
            AOS.refresh();
            var selectedValue = this.value;
            if (selectedValue == 'all-locations') {
                $(".career-grid .grid-item").show();
                AOS.refresh();
            } else {
                var countItems = $(".career-grid").find(`[data-office='${selectedValue}']`).length;
                if (countItems > 0) {
                    $(".career-grid .grid-item").hide();
                    $(".career-grid").find(`[data-office='${selectedValue}']`).show();
                    AOS.refresh();
                } else {
                    $(".career-grid .grid-item").hide();
                    AOS.refresh();
                }
            }
        });
    }

    if ($('#accordionLocations h2').length) {
        $('#accordionLocations h2').on('click', function () {
            $(this).closest('.location-container').find('.flush-collapse').toggleClass('hidden block');
            $(this).closest('.location-container').find('.arrow').toggleClass('rotate-180 -left-1');
            AOS.refresh();
        });
    }

    if ($('#accordionDirectory h2').length) {
        $('#accordionDirectory h2').on('click', function () {
            $(this).closest('.location-container').find('.flush-collapse').toggleClass('hidden block');
            $(this).closest('.location-container').find('.arrow').toggleClass('open');
            AOS.refresh();
        });
    }

    if ($('.accordion-title').length) {
        $('.accordion-title').on('click', function () {
            $(this).closest('.accordion').find('.accordion-content').toggleClass('hidden');
            $(this).closest('.accordion').find('svg').toggleClass('open');
            AOS.refresh();
        })
    }

    function visible(partial) {
        var $t = partial,
            $w = jQuery(window),
            viewTop = $w.scrollTop(),
            viewBottom = viewTop + $w.height(),
            _top = $t.offset().top,
            _bottom = _top + $t.height(),
            compareTop = partial === true ? _bottom : _top,
            compareBottom = partial === true ? _top : _bottom;

        return ((compareBottom <= viewBottom) && (compareTop >= viewTop) && $t.is(':visible'));
    }

    $(window).scroll(function () {
        if ($('.counter').length) {
            if (visible($('.counter'))) {
                if ($('.counter').hasClass('counter-loaded')) return;
                $('.counter').addClass('counter-loaded');
                $('.counter').each(function () {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).text()
                    }, {
                        duration: 4000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(Math.ceil(now).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        }
                    });
                });
            }
        };
    });

    if ($('.button').length) {
        $('button').click(function () {
            $('.mobile-menu').toggleClass('hidden');
        });
    }

    if ($('.img-line').length) {
        inView('.img-line')
            .on('enter', el => {
                el.classList.add('slideIn')
            })
            .on('exit', el => {
                el.classList.remove('slideIn')
            })
    }

    if ($('.footer-nav').length) {
        if ($(window).width() < 769) {
            $('.footer-nav').on('click', function () {
                $(this).find('.footer-list').toggle();
                $(this).find('svg').toggleClass('rotate-180');
            });
        }
        $(window).resize(function () {
            if ($(window).width() < 769) {
                $('.footer-list').hide();
                $('.footer-list > svg').removeClass('rotate-180');
                $('.footer-nav').on('click', function () {
                    $(('.footer-list').hide())
                    $(this).find('.footer-list').toggle();
                    $(this).find('svg').toggleClass('rotate-180');
                });
            } else {
                $('.footer-list').show();
            }
        });
    }

    if ($('.mob-locations-trigger').length) {
        $('.mob-locations-trigger').on('click', function () {
            $('.mob-locations-menu').toggleClass('hidden');
            $('.nav-item-container').toggleClass('hidden');
        })
    }

    if ($('.form-toggle').length) {
        $('.form-toggle').on('click', function () {
            $(this).closest('body').find('.form').find('#form-modal').toggleClass('hidden');
            $(this).closest('body').find('.form').find('#form-close').toggleClass('hidden');
            $('body').toggleClass('overflow-hidden');
        });

        $('#form-close').on('click', function () {
            $(this).closest('body').find('.form').find('#form-modal').toggleClass('hidden');
            $(this).closest('body').find('.form').find('#form-close').toggleClass('hidden');
            $('body').toggleClass('overflow-hidden');
        })
    }

    if ($('.count').length) {
        $('.count').each(function () {
            var $this = $(this);
            jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
                duration: 3000,
                easing: 'swing',
                step: function () {
                    $this.text(Math.ceil(this.Counter));
                }
            });
        });
    }

    if ($('.sameHeight').length) {
        $(".sameHeight").each(function () {
            if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
        });
        $(".sameHeight").height(maxHeight);
    }

    if ($('.location-map-link').length) {
        $('.location-map-link').on('click', function (e) {
            e.preventDefault();
            var selectedValue = $(this).data('location');

            if ($('#location').length) {
                $("#location").val(selectedValue).trigger("change");
                var selectedText = $("#location option:selected").text();
                var regionColour = "";
                if (selectedValue == "americas-caribbean") {
                    regionColour = "#DBFE87";
                } else if (selectedValue == "amea") {
                    regionColour = "#58D6C8";
                } else if (selectedValue == "europe") {
                    regionColour = "#FF9456"
                } else {
                    regionColour = "#FFFFFF";
                }
                $('.location-container').hide();
                $('#current-region-filter').html("<a title='View regional homepage for " + selectedText + "' href='/" + selectedValue + "'> <svg xmlns='http://www.w3.org/2000/svg' width='11.122' height='11.294' viewBox='0 11.122 11.294' class='mr-1 inline-block'>" +
                    "<path id='Path_356' data-name='Path 356' d='M26.1,37.409,37.222,26.116H26.1Z' transform='translate(-26.1 -26.115)' fill='" + regionColour + "'></path> </svg>" + selectedText + "<a>");
                $('.' + selectedValue).show();
                AOS.refresh();

                $('html, body').animate({
                    scrollTop: $('.location-search').offset().top - 100
                }, 200);
            }
        });
    }


    AOS.init({
        duration: 1000,
        once: true
    });


    $(window).scroll(function () {
        // history sections
        document.querySelectorAll('.history-section').forEach(section => {
            var top = section.offsetTop - 50;
            var bottom = top + section.offsetHeight;
            var scroll = window.pageYOffset;
            var id = section.getAttribute('data-decade');

            if (scroll > top && scroll < bottom) {
                document.querySelectorAll('a.active-section-link').forEach(anchor => {
                    anchor.classList.remove('active-section-link');
                });
                document.querySelector('a[href="#' + id + '"]').classList.add('active-section-link');
            } 
        });

    });

});
document.addEventListener("DOMContentLoaded", function () {
    const dropdownToggles = document.querySelectorAll(".dropdown-selected");

    dropdownToggles.forEach(function (toggle) {
        const dropdownOptions = toggle.nextElementSibling;

        toggle.addEventListener("click", function (event) {
            event.stopPropagation(); // Prevent immediate closing from document click
            dropdownOptions.classList.toggle("show");
        });

        // Close dropdown when clicking outside
        document.addEventListener("click", function (event) {
            if (!toggle.contains(event.target) && !dropdownOptions.contains(event.target)) {
                dropdownOptions.classList.remove("show");
            }
        });
    });
});

    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenu = document.getElementById('mobileMenu');
        // const mobileMenuClose = document.getElementById('mobileMenuClose');

        // Close mobile menu
        // mobileMenuClose.addEventListener('click', () => {
        //     mobileMenu.classList.add('hidden');
        // });

        // Handle submenu toggles inside mobile menu
        document.querySelectorAll('.regionalsubmenu-toggle').forEach(toggle => {
            toggle.addEventListener('click', (e) => {
                e.preventDefault();
                const submenu = toggle.nextElementSibling;
                if (!submenu) return;
                    //do normal - no submenu
                if (submenu.classList.contains('hidden')) {
                    // Show submenu
                    
                    document.querySelectorAll('.regional-nav-item').forEach(item => item.classList.add('hidden'));
                    submenu.classList.remove('hidden');

                } else {
                    // Hide submenu
                 
                    submenu.classList.add('hidden');

                }
            });
        });

        // Handle back buttons inside submenus
        document.querySelectorAll('.back-btn').forEach(backBtn => {
            backBtn.addEventListener('click', () => {
                const submenu = backBtn.closest('.regionalsubmenu');
                 document.querySelectorAll('.regional-nav-item').forEach(item => item.classList.remove('hidden'));
                  document.querySelectorAll('.regionalsubmenu').forEach(item => item.classList.add('hidden'));
                if (submenu) {
                    submenu.classList.add('hidden');
                }
               
            });
        });


        (() => {
            document.querySelectorAll('.custom-dropdown').forEach(dropdown => {
                var languagePickerIcon = dropdown.querySelector('#language-picker-icon');
                const toggle = dropdown.querySelector('.dropdown-toggle');
                const menu = dropdown.querySelector('.dropdown-menu');
        
                toggle.addEventListener('click', e => {
                    e.stopPropagation();
                    menu.classList.toggle('hidden');
                    languagePickerIcon.classList.toggle('rotate-180');
                });
        
                // Close dropdown when clicking outside
                document.addEventListener('click', e => {
                    if (!dropdown.contains(e.target)) {
                        menu.classList.add('hidden');
                        languagePickerIcon.classList.toggle('rotate-180');
                    }
                });
            });
        })();



    });
    
