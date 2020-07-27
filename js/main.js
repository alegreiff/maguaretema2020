(function () {
    var no_slider_desktop = [];
    $(document).ready(function () {
        var slider = $('.mg-slider');
        var j = 0;

        window.secciones = window.secciones || { "categoria": "home-seccion" };

        for (var i = 0; i < slider.length; i++) {
            var hasPager = true;

            if (!$(slider[i]).data('slider-pager')) {
                hasPager = $(slider[i]).data('slider-pager')
            }

            if ($(slider[i]).data('auto')) {
                // Slider Home
                slider[i] = $(slider[i]).bxSlider({
                    controls: true,
                    auto: true,
                    stopAutoOnClick: true,
                    pause: 5000,
                    touchEnabled: false
                });
            } else {
                // Slider Secciones
                slider[i] = $(slider[i]).bxSlider({
                    controls: true,
                    pager: hasPager,
                    infiniteLoop: false,
                    touchEnabled: false
                });
            }

            if ($(slider[i]).data('destroy')) {
                no_slider_desktop[j] = slider[i];
                j++;
            };
        }

        $('.bx-controls').addClass('mg-slider-dots mg-slider-dots--wine');

        $(window).resize(function () {
            if ($(window).width() > 1280) {
                for (var i = 0; i < no_slider_desktop.length; i++) {
                    no_slider_desktop[i].destroySlider();
                }

                if (!$('.nav').hasClass('js-open')) {
                    $('.nav').css('left', 'auto');
                }
            } else {
                for (var i = 0; i < no_slider_desktop.length; i++) {

                    var hasPager = true;
                    if (!$(no_slider_desktop[i]).data('slider-pager')) {
                        hasPager = $(no_slider_desktop[i]).data('slider-pager')
                    }
                    no_slider_desktop[i].bxSlider({
                        controls: false,
                        pager: hasPager
                    });
                }

                if ($('.nav').hasClass('js-open')) {
                    $('.nav').css('left', 'auto');
                } else {
                    $('.nav').css('left', '-100%');
                }

                $('.bx-controls').addClass('mg-slider-dots mg-slider-dots--wine');
            }
        });

        if ($(window).width() > 1280) {
            for (var i = 0; i < no_slider_desktop.length; i++) {
                no_slider_desktop[i].destroySlider();
            }
        }

        // menu mobile

        $('.button--menu').click(function () {
            $('.nav').css("left", "0");
            $('.nav').addClass('js-open');
        });

        $('.nav .button--close').click(function () {
            $('.nav').css("left", "-100%");
            $('.nav').removeClass('js-open');
        });

        var audio_content = $('[data-audio-content]');

        if (audio_content.length) {
            var wavesurfer = WaveSurfer.create({
                container: $(audio_content).find('.visualizer')[0],
                waveColor: 'violet',
                progressColor: 'purple',
                responsive: 'true'
            });

            //Code take from https://codepen.io/gregh/pen/NdVvbm

            var playBtn = $(audio_content).find('[data-play]');
            var muteBtn = $(audio_content).find('[data-mute]');
            var audioPath = $(audio_content).find('[data-audio-path]').data().audioPath;
            var playPause = document.querySelector('#playPause');
            var audioPlayer = document.querySelector('.green-audio-player');
            var totalTime = audioPlayer.querySelector('.total-time');
            var progress = audioPlayer.querySelector('.progress');
            var currentTime = audioPlayer.querySelector('.current-time');
            var speaker = audioPlayer.querySelector('#speaker');
            var loading = audioPlayer.querySelector('.loading');
            var playpauseBtn = audioPlayer.querySelector('.play-pause-btn');

            wavesurfer.load(audioPath);

            wavesurfer.on('ready', function () {
                playpauseBtn.style.display = 'block';
                loading.style.display = 'none';
                totalTime.textContent = formatTime(wavesurfer.getDuration());

                playBtn.click(function () {
                    wavesurfer.playPause();
                    if (wavesurfer.isPlaying()) {
                        $(playBtn).addClass('play');
                        $(playBtn).removeClass('pause');
                        playPause.attributes.d.value = "M0 0h6v24H0zM12 0h6v24h-6z";
                    } else { // pause music
                        $(playBtn).removeClass('play');
                        $(playBtn).addClass('pause');
                        playPause.attributes.d.value = "M18 12L0 24V0";
                    }
                });

                playBtn.click();

                muteBtn.click(function () {
                    wavesurfer.toggleMute();
                    if (wavesurfer.getMute()) {
                        speaker.attributes.d.value = 'M0 7.667v8h5.333L12 22.333V1L5.333 7.667';
                    } else {
                        speaker.attributes.d.value = 'M14.667 0v2.747c3.853 1.146 6.666 4.72 6.666 8.946 0 4.227-2.813 7.787-6.666 8.934v2.76C20 22.173 24 17.4 24 11.693 24 5.987 20 1.213 14.667 0zM18 11.693c0-2.36-1.333-4.386-3.333-5.373v10.707c2-.947 3.333-2.987 3.333-5.334zm-18-4v8h5.333L12 22.36V1.027L5.333 7.693H0z';
                    }
                });
            });

            wavesurfer.on('audioprocess', function () {
                updateProgress();
            });

            // Reproducción automática  - Relacionados AUDIO
            wavesurfer.on('finish', function () {
                console.log('Finaliza Audio');
                var duracion = secciones.url_duracion;
                var url = secciones.url;
                if (duracion == 'notime' || duracion == '' || duracion == 'Indefinido') {
                    console.log('variable null');
                } else {
                    /*Redirección*/
                    window.location.href = url;
                }
            });

            function updateProgress() {
                var current = wavesurfer.getCurrentTime();
                var percent = (current / wavesurfer.getDuration()) * 100;
                progress.style.width = percent + '%';

                currentTime.textContent = formatTime(current);
            }

            function formatTime(time) {
                var min = Math.floor(time / 60);
                var sec = Math.floor(time % 60);
                return min + ':' + ((sec < 10) ? ('0' + sec) : sec);
            }
        }

        var btnAdvanceSearch = $('[data-cta-advance-search]');
        var modal_el = $('[data-modal]');
        var modal_search = $('[data-modal-content]');
        var modal_btn_close = modal_el.find('[data-button-close-modal]');
        var modal_page_el = $('[data-page-modal]');
        var modal_notes_el = $('[data-modal-notes]');
        var modal_frame_el = $('[data-modal-frame]');

        btnAdvanceSearch.click(function (event) {
            event.preventDefault();

            modal_search.addClass('active');
            modal_el.addClass('active');
        });

        modal_btn_close.click(function () {
            modal_el.removeClass('active');
            modal_search.removeClass('active');

            if (modal_page_el) {
                modal_notes_el.removeClass('active');
                modal_frame_el.removeClass('active');

                $(modal_frame_el).find('iframe').attr('src', '');
            }
        });

        if ($(modal_page_el).data()) {

            var notes_modal = $('[data-note-modal]');
            var notes_modal_cta = $(notes_modal).find('.link-1');

            notes_modal_cta.click(function (event) {
                event.preventDefault();
                var note = $(event.currentTarget).closest('[data-note-modal]');

                if (note.data().noteModal === 'app') {
                    var head = $(note).find('[data-note-head]').text();
                    var image = $(note).find('[data-note-image] img').clone();
                    var body = $(note).find('[data-note-body]').html();
                    var urls = $(note).data();
                    var btnAppstore = $(modal_notes_el).find('.button--appstore');
                    var btnPlaystore = $(modal_notes_el).find('.button--playstore');
                    var btnPc = $(modal_notes_el).find('.button--pc');

                    modal_el.addClass('active');
                    modal_notes_el.addClass('active');

                    $(modal_notes_el).find('.heading-section').empty().append(head);
                    $(modal_notes_el).find('.light-box__image').empty().append(image);
                    $(modal_notes_el).find('.text-note').empty().append(body);

                    if (urls.urlAppstore) {
                        $(btnAppstore).attr('href', urls.urlAppstore);
                        $(btnAppstore).show();
                    } else {
                        $(btnAppstore).hide();
                    }

                    if (urls.urlPlaystore) {
                        $(btnPlaystore).attr('href', urls.urlPlaystore);
                        $(btnPlaystore).show();
                    } else {
                        $(btnPlaystore).hide();
                    }

                    if (urls.urlPc) {
                        $(btnPc).attr('href', urls.urlPc);
                        $(btnPc).show();
                    } else {
                        $(btnPc).hide();
                    }
                }

                if (note.data().noteModal === 'interactive') {
                    var head = $(note).find('[data-note-head]').text();
                    var image = $(note).find('[data-note-image] img').clone();
                    var body = $(note).find('[data-note-body]').html();
                    var urls = $(note).data();

                    modal_el.addClass('active');
                    modal_frame_el.addClass('active');

                    $(modal_frame_el).find('.heading-section').empty().append(head);
                    $(modal_frame_el).find('iframe').attr('src', urls.urlInteractive);
                }
            });
        }

        var btnExpandEl = $('[data-expand-cta]');

        if (btnExpandEl) {
            var contentExpandEl = $('[data-expand-content]');

            btnExpandEl.click(function () {
                $(contentExpandEl).slideDown('slow');
            });
        }

        var shareBoxEl = $('.share-box');

        if (shareBoxEl) {
            var shareContentEl = $('.share-box__content');

            shareBoxEl.click(function () {
                $(shareContentEl).slideToggle('slow');
            });
        }

        var btnRandom = $('.button--random');

        btnRandom.click(function () {
            var notesContainer = $(btnRandom).closest('.notes-list');

            var notesList = $(notesContainer).find('.note.note--short');
            var numberNotes = notesList.length;
            var noteListContainer = $(notesContainer).find('.notes-list__container');

            var notesListRandom = shuffle(notesList);
            var numberNoteCounter = 0;

            for (var i = 0; i < noteListContainer.length; i++) {
                $(noteListContainer[i]).empty();

                for (var j = 0; j < 3; j++) {
                    $(noteListContainer[i]).append(notesList[numberNoteCounter]);
                    numberNoteCounter++;
                }
            }
        });

        var mainEl = $('main.mg__section-page');
        var isHomeSection = $(mainEl).is('.mg__jugar, .mg__cantar, .mg__crear, .mg__leer, .mg__ver, .mg__escuchar, .mg__bailar');
        var isOtherHomeSection = $(mainEl).is('.mg__resultados-buscador, .mg__home-especial, .mg__contenido-texto');

        if (!isHomeSection && !isOtherHomeSection) {
            var listOfClasses = ['mg__jugar', 'mg__cantar', 'mg__crear', 'mg__leer', 'mg__ver', 'mg__escuchar', 'mg__bailar'];
            var listOfNames = ['Jugar', 'Cantar', 'Crear', 'Leer', 'Ver', 'Escuchar', 'Bailar'];
            var selectedClass = '';
            var selectedName = '';
            var savedClass = sessionStorage.getItem('mgSectionClass');
            var savedName = sessionStorage.getItem('mgSectionName');
            var randomNumber = Math.floor(Math.random() * listOfClasses.length);

            if (secciones.categoria !== "home-seccion" && !savedClass) {
                var randomSectionNumber = Math.floor(Math.random() * secciones.categoria.length);
                var randomSection = secciones.categoria[randomSectionNumber];

                switch (randomSection) {
                    case 'jugar':
                        selectedClass = listOfClasses[0];
                        selectedName = listOfNames[0];
                        break;
                    case 'cantar':
                        selectedClass = listOfClasses[1];
                        selectedName = listOfNames[1];
                        break;
                    case 'crear':
                        selectedClass = listOfClasses[2];
                        selectedName = listOfNames[2];
                        break;
                    case 'leer':
                        selectedClass = listOfClasses[3];
                        selectedName = listOfNames[3];
                        break;
                    case 'ver':
                        selectedClass = listOfClasses[4];
                        selectedName = listOfNames[4];
                        break;
                    case 'escuchar':
                        selectedClass = listOfClasses[5];
                        selectedName = listOfNames[5];
                        break;
                    case 'bailar':
                        selectedClass = listOfClasses[6];
                        selectedName = listOfNames[6];
                        break;
                    default:

                }
            } else {
                if (savedClass && savedName) {
                    selectedClass = savedClass;
                    selectedName = savedName;
                } else {
                    selectedClass = listOfClasses[randomNumber];
                    selectedName = listOfNames[randomNumber];
                }
            }

            mainEl.addClass(selectedClass);
            $(mainEl).find('h1.heading-page').html(selectedName);
        } else if (isHomeSection) {
            var sectionClass = $(mainEl).attr('class').replace('mg__section-page ', '');
            var sectionName = $(mainEl).find('h1.heading-page').text();

            sessionStorage.setItem('mgSectionClass', sectionClass);
            sessionStorage.setItem('mgSectionName', sectionName);
        }
    });

    window.onload = function () {
        if (window.innerWidth > 1280) {
            for (var i = 0; i < no_slider_desktop.length; i++) {
                no_slider_desktop[i].destroySlider();
            }
        }
    };

    function shuffle(array) {
        var input = array;

        for (var i = input.length - 1; i >= 0; i--) {

            var randomIndex = Math.floor(Math.random() * (i + 1));
            var itemAtIndex = input[randomIndex];

            input[randomIndex] = input[i];
            input[i] = itemAtIndex;
        }
        return input;
    }

    // Custom JS
    /*Contenido Random*/
    var duracion = secciones.url_duracion;
    var url = secciones.url;
    var id_youtube = secciones.id_video_youtube;
    if (duracion == 'notime' || duracion == '' || duracion == 'Indefinido') {
        console.log('variable null');
    } else {
        /*Redirección*/
        //function funcRedirect(){
        //	window.location.href = url;
        //}
        //var duracion_ms = duracion * 1000;
        //console.log(duracion_ms);
        /*Duración*/
        //setTimeout(funcRedirect,duracion_ms);

        console.log('redireccion');

        /*var id_youtube = secciones.id_video_youtube;    
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        // Create the player object when API is ready
        var player;
        window.onYouTubeIframeAPIReady = function () {
            player = new YT.Player('player-maguare', {
                videoId: id_youtube ,
                host: 'https://www.youtube.com',
                playerVars: { 'autoplay': 1, 'controls': 1,'autohide':1,'wmode':'opaque', 'rel' : 0 , 'showinfo': 0 , 'enablejsapi': 1, 'origin':'https://staging.maguare.gov.co' },
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        };
        function onPlayerReady(event) {
            event.target.playVideo();
        }


        var done = false;
        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.ENDED && !done) {
                console.log('fin video');
                var url = secciones.url;
                //Redirección
                window.location.href = url;
                done = true;
            }
        }*/

        // 2. This code loads the IFrame Player API code asynchronously.
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        // 3. This function creates an <iframe> (and YouTube player)
        //    after the API code downloads.
        var player;
        window.onYouTubeIframeAPIReady = function () {
            player = new YT.Player('player-maguare', {
                videoId: id_youtube,
                height: '100%',
                width: '100%',
                playerVars: {
                    'autoplay': 1,
                    'controls': 1,
                    'autohide': 1,
                    'wmode': 'opaque',
                    'rel': 0,
                    'showinfo': 0,
                    'enablejsapi': 1,
                    'origin': window.location.origin
                    //'widget_referrer' :  window.location.origin
                },
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        // 4. The API will call this function when the video player is ready.
        function onPlayerReady(event) {
            //event.target.mute();
            event.target.playVideo();
        }

        var done = false;
        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.ENDED && !done) {
                console.log('fin video');
                var url = secciones.url;
                //Redirección
                window.location.href = url;
                done = true;
            }
        }





    } // Fin Validacion Redirección

    // Menu Principal
    var url_menu = window.location;
    $('ul.nav__list  li.nav__item a[href="' + url_menu + '"]').addClass('active');



})();
