var MINOVATE = MINOVATE || {};

$(function() {




  //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  // global inicialization functions
  //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

  MINOVATE.global = {

    init: function() {
      MINOVATE.global.deviceSize();
      MINOVATE.global.layout();
      MINOVATE.global.animsition();
    },

    // device identification function
    deviceSize: function(){
			var jRes = jRespond([
				{
					label: 'smallest',
					enter: 0,
					exit: 479
				},{
					label: 'handheld',
					enter: 480,
					exit: 767
				},{
					label: 'tablet',
					enter: 768,
					exit: 991
				},{
					label: 'laptop',
					enter: 992,
					exit: 1199
				},{
					label: 'desktop',
					enter: 1200,
					exit: 10000
				}
			]);
			jRes.addFunc([
				{
					breakpoint: 'desktop',
					enter: function() { $body.addClass('device-lg'); },
					exit: function() { $body.removeClass('device-lg'); }
				},{
					breakpoint: 'laptop',
					enter: function() { $body.addClass('device-md'); },
					exit: function() { $body.removeClass('device-md'); }
				},{
					breakpoint: 'tablet',
					enter: function() { $body.addClass('device-sm'); },
					exit: function() { $body.removeClass('device-sm'); }
				},{
					breakpoint: 'handheld',
					enter: function() { $body.addClass('device-xs'); },
					exit: function() { $body.removeClass('device-xs'); }
				},{
					breakpoint: 'smallest',
					enter: function() { $body.addClass('device-xxs'); },
					exit: function() { $body.removeClass('device-xxs'); }
				}
			]);
		},

    layout: function() {
      var defaultHeaderScheme = 'scheme-default',
          defaultNavbarScheme = 'scheme-default',
          defaultBrandingScheme = 'scheme-default',
          defaultColorScheme = 'default-scheme-color',
          defaultHeaderPosition = 'header-fixed',
          defaultNavbarPosition = 'aside-fixed',
          defaultRightbarVisibility = 'rightbar-hidden',
          defaultAppClasses = 'scheme-default default-scheme-color header-fixed aside-fixed rightbar-hidden';

      $body.addClass(defaultAppClasses);
      $header.addClass(defaultHeaderScheme);
      $branding.addClass(defaultBrandingScheme);
      $sidebar.addClass(defaultNavbarScheme).addClass(defaultNavbarPosition);

      $headerSchemeEl.on('click', function($event) {
        var scheme = $(this).data('scheme');

        $body.removeClass(defaultHeaderScheme).addClass(scheme);
        $header.removeClass(defaultHeaderScheme).addClass(scheme);
        defaultHeaderScheme = scheme;
        $event.stopPropagation();
      });

      $brandingSchemeEl.on('click', function($event) {
        var scheme = $(this).data('scheme');

        $branding.removeClass(defaultBrandingScheme).addClass(scheme);
        defaultBrandingScheme = scheme;
        $event.stopPropagation();
      });

      $sidebarSchemeEl.on('click', function($event) {
        var scheme = $(this).data('scheme');

        $body.removeClass(defaultNavbarScheme).addClass(scheme);
        $sidebar.removeClass(defaultNavbarScheme).addClass(scheme);
        defaultNavbarScheme = scheme;
        $event.stopPropagation();
      });

      $colorSchemeEl.on('click', function($event) {
        var scheme = $(this).data('scheme');

        $body.removeClass(defaultColorScheme).addClass(scheme);
        defaultColorScheme = scheme;
        $event.stopPropagation();
      });

      $fixedHeaderEl.change(function() {
        if ($body.hasClass('header-fixed')) {
          $body.removeClass('header-fixed').addClass('header-static');
        } else {
          $body.removeClass('header-static').addClass('header-fixed');
        }
      });
      $fixedHeaderEl.parent().on('click', function($event) {
        $event.stopPropagation();
      });

      $fixedAsideEl.change(function() {
        if ($body.hasClass('aside-fixed')) {
          $body.removeClass('aside-fixed').addClass('aside-static');
          $sidebar.removeClass('aside-fixed').addClass('aside-static');
        } else {
          $body.removeClass('aside-static').addClass('aside-fixed');
          $sidebar.removeClass('aside-static').addClass('aside-fixed');
        }
      });
      $fixedAsideEl.parent().on('click', function($event) {
        $event.stopPropagation();
      });

      $toggleRightbarEl.on('click', function() {
        if ($body.hasClass('rightbar-hidden')) {
          $body.removeClass('rightbar-hidden').addClass('rightbar-show');
        } else {
          $body.removeClass('rightbar-show').addClass('rightbar-hidden');
        }
      });

      if ($app.hasClass('boxed-layout')){
        $app.parent().addClass('boxed-layout');
      }

      if ($app.hasClass('sidebar-offcanvas')){
        $app.parent().addClass('sidebar-offcanvas');
      }

      if ($app.hasClass('hz-menu')){
        $app.parent().addClass('hz-menu');
      }

      if ($app.hasClass('rtl')){
        $app.parent().addClass('rtl');
      }

    },

    // initialize animsition
    animsition: function() {
      $wrap.animsition({
        inClass               :   'fade-in',
        outClass              :   'fade-out',
        inDuration            :    1500,
        outDuration           :    800,
        linkElement           :   '.animsition-link',
        // e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
        loading               :    true,
        loadingParentElement  :   'body', //animsition wrapper element
        loadingClass          :   'animsition-loading',
        unSupportCss          : [ 'animation-duration',
          '-webkit-animation-duration',
          '-o-animation-duration'
        ],
        //"unSupportCss" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
        //The default setting is to disable the "animsition" in a browser that does not support "animation-duration".

        overlay               :   false,
        overlayClass          :   'animsition-overlay-slide',
        overlayParentElement  :   'body'
      });
    }

  };






  //!!!!!!!!!!!!!!!!!!!!!!!!!
  // header section functions
  //!!!!!!!!!!!!!!!!!!!!!!!!!

  MINOVATE.header = {

    init: function() {

    }


  };






  //!!!!!!!!!!!!!!!!!!!!!!!!!
  // navbar section functions
  //!!!!!!!!!!!!!!!!!!!!!!!!!

  MINOVATE.navbar = {

    init: function() {
      MINOVATE.navbar.menu();
      MINOVATE.navbar.ripple();
      MINOVATE.navbar.removeRipple();
      MINOVATE.navbar.collapse();
      MINOVATE.navbar.offcanvas();
    },

    menu: function(){
      if( $dropdowns.length > 0 ) {

        $dropdowns.addClass('dropdown');

        var $submenus = $dropdowns.find('ul >.dropdown');
        $submenus.addClass('submenu');

        $a.append('<i class="fa fa-plus"></i>');

        $a.on('click', function(event) {
          if ($app.hasClass('sidebar-sm') || $app.hasClass('sidebar-xs') || $app.hasClass('hz-menu')) {
            return false;
          }

          var $this = $(this),
              $parent = $this.parent('li'),
              $openSubmenu = $('.submenu.open');

          if (!$parent.hasClass('submenu')) {
            $dropdowns.not($parent).removeClass('open').find('ul').slideUp();
          }

          $openSubmenu.not($this.parents('.submenu')).removeClass('open').find('ul').slideUp();
          $parent.toggleClass('open').find('>ul').stop().slideToggle();
          event.preventDefault();
        });

        $dropdowns.on('mouseenter', function() {
          $sidebar.addClass('dropdown-open');
          $controls.addClass('dropdown-open');
        });

        $dropdowns.on('mouseleave', function() {
          $sidebar.removeClass('dropdown-open');
          $controls.removeClass('dropdown-open');
        });

        $notDropdownsLinks.on('click', function() {
          $dropdowns.removeClass('open').find('ul').slideUp();
        });

        var $activeDropdown = $('.dropdown>ul>.active').parent();

        $activeDropdown.css('display', 'block');
      }
    },

    ripple: function() {
      var parent, ink, d, x, y;

      $navigation.find('>li>a').click(function(e){
        parent = $(this).parent();

        if(parent.find('.ink').length === 0) {
          parent.prepend('<span class="ink"></span>');
        }

        ink = parent.find('.ink');
        //incase of quick double clicks stop the previous animation
        ink.removeClass('animate');

        //set size of .ink
        if(!ink.height() && !ink.width())
        {
          //use parent's width or height whichever is larger for the diameter to make a circle which can cover the entire element.
          d = Math.max(parent.outerWidth(), parent.outerHeight());
          ink.css({height: d, width: d});
        }

        //get click coordinates
        //logic = click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center;
        x = e.pageX - parent.offset().left - ink.width()/2;
        y = e.pageY - parent.offset().top - ink.height()/2;

        //set the position and add class .animate
        ink.css({top: y+'px', left: x+'px'}).addClass('animate');

        setTimeout(function(){
          $('.ink').remove();
        }, 600);
      });
    },

    removeRipple: function(){
      $sidebar.find('.ink').remove();
    },

    collapse: function(){
      $collapseSidebarEl.on('click', function(e) {
        if ($app.hasClass('sidebar-sm')) {
          $app.removeClass('sidebar-sm').addClass('sidebar-xs');
        }
        else if ($app.hasClass('sidebar-xs')) {
          $app.removeClass('sidebar-xs');
        }
        else {
          $app.addClass('sidebar-sm');
        }

        $app.removeClass('sidebar-sm-forced sidebar-xs-forced');
        $app.parent().removeClass('sidebar-sm sidebar-xs');
        MINOVATE.navbar.removeRipple;
        $window.trigger('resize');
        e.preventDefault();
      });
    },

    offcanvas: function() {
      $offcanvasToggleEl.on('click', function(e) {
        if ($app.hasClass('offcanvas-opened')) {
          $app.removeClass('offcanvas-opened');
        } else {
          $app.addClass('offcanvas-opened');
        }
        e.preventDefault();
      });
    }


  };
  



  //!!!!!!!!!!!!!!!!
  // tiles functions
  //!!!!!!!!!!!!!!!!

  MINOVATE.tiles = {

    init: function() {
      MINOVATE.tiles.toggle();
      MINOVATE.tiles.refresh();
      MINOVATE.tiles.fullscreen();
      MINOVATE.tiles.close();
    },

    toggle: function() {
      $tileToggleEl.on('click', function(){
        var element = $(this);
        var tile = element.parents('.tile');

        tile.toggleClass('collapsed');
        tile.children().not('.tile-header').slideToggle(150);
      });
    },

    refresh: function() {
      $tileRefreshEl.on('click', function(){
        var element = $(this);
        var tile = element.parents('.tile');
        var dropdown = element.parents('.dropdown');

        tile.addClass('refreshing');
        dropdown.trigger('click');

        var t = setTimeout( function(){
          tile.removeClass('refreshing');
        }, 3000 );
      });
    },

    fullscreen: function() {
      $tileFullscreenEl.on('click', function(){
        var element = $(this);
        var tile = element.parents('.tile');
        var dropdown = element.parents('.dropdown');

        screenfull.toggle(tile[0]);
        dropdown.trigger('click');
      });

      if ($tileFullscreenEl.length > 0) {
        $(document).on(screenfull.raw.fullscreenchange, function () {
          var element = $(screenfull.element);
          if (screenfull.isFullscreen) {
            element.addClass('isInFullScreen');
          } else {
            $('.tile.isInFullScreen').removeClass('isInFullScreen');
          }
        });
      }
    },

    close: function() {
      $tileCloseEl.on('click', function(){
        var element = $(this);
        var tile = element.parents('.tile');

        tile.addClass('closed').fadeOut();
      });
    }

  };



  //!!!!!!!!!!!!!!!!
  // extra functions
  //!!!!!!!!!!!!!!!!

  MINOVATE.extra = {

    init: function() {
      MINOVATE.extra.sparklineChart();
      MINOVATE.extra.slimScroll();
      MINOVATE.extra.daterangePicker();
      MINOVATE.extra.easypiechart();
      MINOVATE.extra.chosen();
      MINOVATE.extra.toggleClass();
      MINOVATE.extra.colorpicker();
      MINOVATE.extra.touchspin();
      MINOVATE.extra.datepicker();
      MINOVATE.extra.animateProgress();
      MINOVATE.extra.counter();
      MINOVATE.extra.popover();
      MINOVATE.extra.tooltip();
      MINOVATE.extra.splash();
      MINOVATE.extra.lightbox();
    },

    //initialize sparkline chart on elements
    sparklineChart: function(){

      if( $sparklineEl.length > 0 ){
        $sparklineEl.each(function() {
          var element = $(this);

          element.sparkline('html', { enableTagOptions: true });
        });
      }

    },

    //initialize slimscroll on elements
    slimScroll: function(){

      if( $slimScrollEl.length > 0 ){
        $slimScrollEl.each(function() {
          var element = $(this);

          element.slimScroll({height: '100%'});
        });
      }

    },

    //initialize date range picker on elements
    daterangePicker: function() {

      if ($pickDateEl.length > 0) {
        $pickDateEl.each(function() {
          var element = $(this);

          element.find('span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

          element.daterangepicker({
            format: 'MM/DD/YYYY',
            startDate: moment().subtract(29, 'days'),
            endDate: moment(),
            minDate: '01/01/2012',
            maxDate: '12/31/2015',
            dateLimit: { days: 60 },
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
              'Today': [moment(), moment()],
              'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days': [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month': [moment().startOf('month'), moment().endOf('month')],
              'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'left',
            drops: 'down',
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-success',
            cancelClass: 'btn-default',
            separator: ' to ',
            locale: {
              applyLabel: 'Submit',
              cancelLabel: 'Cancel',
              fromLabel: 'From',
              toLabel: 'To',
              customRangeLabel: 'Custom',
              daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
              monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
              firstDay: 1
            }
          }, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
            element.find('span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
          });

        });
      }

    },

    easypiechart: function() {
      if ($easypiechartEl.length > 0) {
        $easypiechartEl.each(function() {
          var element = $(this);
          element.easyPieChart({
            onStart: function(value) {
              if (element.hasClass('animate')) {
                $(this.el).find('span').countTo({to: value});
              }
            }
          });
        });
      }
    },

    chosen: function() {
      if ($chosenEl.length > 0) {
        $chosenEl.each(function() {
          var element = $(this);
          element.on('chosen:ready', function(e, chosen) {
            var width = element.css("width");
            element.next().find('.chosen-choices').addClass('form-control');
            element.next().css("width", width);
            element.next().find('.search-field input').css("width", "125px");
          }).chosen();
        });
      }
    },

    toggleClass: function() {
      $toggleClassEl.on('click', function(){
        var element = $(this),
            className = element.data('toggle'),
            type = element.data('type');

        if (type === 'radio') {
          element.parent().find('.'+className).removeClass(className);
        }

        if (element.hasClass(className)) {
          element.removeClass(className);
        } else {
          element.addClass(className);
        }
      });
    },

    colorpicker: function() {
      if ($colorPickerEl.length > 0) {
        $colorPickerEl.each(function() {
          var element = $(this);
          element.colorpicker();
        });
      }
    },

    touchspin: function() {
      if ($touchspinEl.length > 0) {
        $touchspinEl.each(function() {
          var element = $(this);
          element.TouchSpin();
        });
      }
    },

    datepicker: function() {
      if ($datepickerEl.length > 0) {
        $datepickerEl.each(function() {
          var element = $(this);
          var format = element.data('format')
          element.datetimepicker({
            format: format
          });
        });
      }
    },

    animateProgress: function() {
      if ($animateProgressEl.length > 0) {
        $animateProgressEl.each(function() {
          var element = $(this);
          var progress =  element.data('percentage');

          element.css('width', progress);
        });
      }
    },

    counter: function(){
			if ($counterEl.length > 0) {
        $counterEl.each(function() {
          var element = $(this);

          element.countTo();
        });
      }
		},

    popover: function() {
      $popoverEl = $('[data-toggle="popover"]');
      if ($popoverEl.length > 0) {
        $popoverEl.each(function() {
          var element = $(this);

          element.popover();
        });
      }
    },

    tooltip: function() {
      $tooltipEl = $('[data-toggle="tooltip"]');
      if ($tooltipEl.length > 0) {
        $tooltipEl.each(function() {
          var element = $(this);

          element.tooltip();
        });
      }
    },

    splash: function() {
      var options = "";
      var target = "";
      $splashEl.on('show.bs.modal', function (e) {
        options = e.relatedTarget.dataset.options;
        target = $(e.target);

        target.addClass(options);
        $body.addClass(options).addClass('splash');
      });
      $splashEl.on('hidden.bs.modal', function () {
        target.removeClass(options);
        $body.removeClass(options).removeClass('splash');
      });
    },

    //initialize magnificPopup lightbox
    lightbox: function(){
			var $lightboxImageEl = $('[data-lightbox="image"]'),
          $lightboxIframeEl = $('[data-lightbox="iframe"]'),
          $lightboxGalleryEl = $('[data-lightbox="gallery"]');

			if( $lightboxImageEl.length > 0 ) {
				$lightboxImageEl.magnificPopup({
					type: 'image',
					closeOnContentClick: true,
					closeBtnInside: false,
					fixedContentPos: true,
					image: {
						verticalFit: true
					}
				});
			}

      if( $lightboxIframeEl.length > 0 ) {
				$lightboxIframeEl.magnificPopup({
					disableOn: 600,
					type: 'iframe',
					removalDelay: 160,
					preloader: false,
					fixedContentPos: false
				});
			}

			if( $lightboxGalleryEl.length > 0 ) {
				$lightboxGalleryEl.each(function() {
					var element = $(this);

					if( element.find('a[data-lightbox="gallery-item"]').parent('.clone').hasClass('clone') ) {
						element.find('a[data-lightbox="gallery-item"]').parent('.clone').find('a[data-lightbox="gallery-item"]').attr('data-lightbox','');
					}

					element.magnificPopup({
						delegate: 'a[data-lightbox="gallery-item"]',
						type: 'image',
						closeOnContentClick: true,
						closeBtnInside: false,
						fixedContentPos: true,
						image: {
							verticalFit: true
						},
						gallery: {
							enabled: true,
							navigateByImgClick: true,
							preload: [0,1] // Will preload 0 - before current, and 1 after the current image
						}
					});
				});
			}
		}

  };




  //!!!!!!!!!!!!!!!!!!!!
  // check mobile device
  //!!!!!!!!!!!!!!!!!!!!

  MINOVATE.isMobile = {
    Android: function() {
      return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
      return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
      return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
      return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
      return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
      return (MINOVATE.isMobile.Android() || MINOVATE.isMobile.BlackBerry() || MINOVATE.isMobile.iOS() || MINOVATE.isMobile.Opera() || MINOVATE.isMobile.Windows());
    }
  };



  //!!!!!!!!!!!!!!!!!!!!!!!!!
  // initialize after resize
  //!!!!!!!!!!!!!!!!!!!!!!!!!

  MINOVATE.documentOnResize = {

		init: function(){

      var t = setTimeout( function(){

        MINOVATE.documentOnReady.setSidebar();
        MINOVATE.navbar.removeRipple();

			}, 500 );

		}

	};






  //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  // initialize when document ready
  //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

  MINOVATE.documentOnReady = {

		init: function(){
      MINOVATE.global.init();
			MINOVATE.header.init();
      MINOVATE.navbar.init();
      MINOVATE.documentOnReady.windowscroll();
      MINOVATE.tiles.init();
      MINOVATE.extra.init();
      MINOVATE.documentOnReady.setSidebar();
		},

    // run on window scrolling

    windowscroll: function(){

			$window.on( 'scroll', function(){


			});
		},


    setSidebar: function() {

      width = $window.width();

      if (width < 992) {
        $app.addClass('sidebar-sm');
      } else {
        $app.removeClass('sidebar-sm sidebar-xs');
      }

      if (width < 768) {
        $app.removeClass('sidebar-sm').addClass('sidebar-xs');
      } else if (width > 992){
        $app.removeClass('sidebar-sm sidebar-xs');
      } else {
        $app.removeClass('sidebar-xs').addClass('sidebar-sm');
      }

      if ($app.hasClass('sidebar-sm-forced')) {
        $app.addClass('sidebar-sm');
      }

      if ($app.hasClass('sidebar-xs-forced')) {
        $app.addClass('sidebar-xs');
      }

    }

	};







  //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  // initialize when document load
  //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	MINOVATE.documentOnLoad = {

		init: function(){

		}

	};






  //!!!!!!!!!!!!!!!!!!!!!!!!!
  // global variables
  //!!!!!!!!!!!!!!!!!!!!!!!!!

  var $window = $(window),
      $body = $('body'),
      $header = $('#header'),
      $branding = $('#header .branding'),
      $sidebar = $('#sidebar'),
      $controls = $('#controls'),
      $app = $('.appWrapper'),
      $navigation = $('#navigation'),
      $sparklineEl = $('.sparklineChart'),
      $slimScrollEl = $('.slim-scroll'),
      $collapseSidebarEl = $('.collapse-sidebar'),
      $wrap = $('#wrap'),
      $offcanvasToggleEl = $('.offcanvas-toggle'),

      //navigation elements
      $dropdowns = $navigation.find('ul').parent('li'),
      $a = $dropdowns.children('a'),
      $notDropdowns = $navigation.children('li').not($dropdowns),
      $notDropdownsLinks = $notDropdowns.children('a'),
      // end of navuigation elements

      $headerSchemeEl = $('.color-schemes .header-scheme'),
      $brandingSchemeEl = $('.color-schemes .branding-scheme'),
      $sidebarSchemeEl = $('.color-schemes .sidebar-scheme'),
      $colorSchemeEl = $('.color-schemes .color-scheme'),
      $fixedHeaderEl = $('#fixed-header'),
      $fixedAsideEl = $('#fixed-aside'),
      $toggleRightbarEl = $('.toggle-right-sidebar'),
      $pickDateEl = $('.pickDate'),

      $tileEl = $('.tile'),
      $tileToggleEl = $('.tile .tile-toggle'),
      $tileRefreshEl = $('.tile .tile-refresh'),
      $tileFullscreenEl = $('.tile .tile-fullscreen'),
      $tileCloseEl = $('.tile .tile-close'),

      $easypiechartEl = $('.easypiechart'),
      $chosenEl = $('.chosen-select'),
      $toggleClassEl = $('.toggle-class'),
      $colorPickerEl = $('.colorpicker'),
      $touchspinEl = $('.touchspin'),
      $datepickerEl = $('.datepicker'),
      $animateProgressEl = $('.animate-progress-bar'),
      $counterEl = $('.counter'),
      $splashEl = $('.splash');


  //!!!!!!!!!!!!!
  // initializing
  //!!!!!!!!!!!!!
  $(document).ready( MINOVATE.documentOnReady.init );
  $window.load( MINOVATE.documentOnLoad.init );
  $window.on( 'resize', MINOVATE.documentOnResize.init );

});

function getEditDataParamCld(id, name){
	$(".input_param_cld").hide();
	$(".edit_param_cld").show();
	$("#edit_param_cld").val(name);
	$("#id_hide_param_cld").val(id);
	$("#edit_param_cld").focus();
}

function getEditDataParamMmr(id, name){
	$(".input_param_cld").hide();
	$(".edit_param_cld").show();
	$("#edit_param_mmr").val(name);
	$("#id_hide_param_mmr").val(id);
	$("#edit_param_mmr").focus();
}

function getEditDataSubParamCld(id, name, master_id){
	$(".input_param_cld").hide();
	$(".edit_param_cld").show();
	$("#edit_param_nilai").val(name);
	$("#id_hide_param_cld").val(id);
	$("#master_param").val(master_id);
	$("#edit_param_nilai").focus();
}

function getEditDataSubParamMmr(id, name, master_id){
	$(".input_param_cld").hide();
	$(".edit_param_cld").show();
	$("#edit_param_nilai").val(name);
	$("#id_hide_param_cld").val(id);
	$("#master_param").val(master_id);
	$("#edit_param_nilai").focus();
}

function backToInputCld(){
	$(".input_param_cld").show();
	$(".edit_param_cld").hide();
	$("#input_param_nilai").focus();
}

function getEditDataParamRatingCld(id, name){
	$(".input_param_cld").hide();
	$(".edit_param_cld").show();
	$("#edit_param_cld").val(name);
	$("#id_hide_param_cld").val(id);
	$("#edit_param_cld").focus();
}

function addUserBasic(){
	$(".input_param_cld").show('slow');
	$(".edit_param_cld").hide();
	$(".edit_pass").hide();
	
}

function getEditUserBasic(id_hide, name, id_dept, username, active){
	$(".input_param_cld").hide();
	$(".edit_param_cld").show();
	$("#name").val(name);
	$("#id_dept").val(id_dept);
	$("#username").val(username);
	$("#active").val(active);
	$("#id_hide").val(id_hide);
	$(".edit_pass").hide();
	$("#name").focus();
}

function changePassUserBasic(id){
	$(".edit_pass").show();
	$(".input_param_cld").hide();
	$(".edit_param_cld").hide();
	$("#id_hide_pass").val(id);
	$("#edit_pass_user").focus();
	
}

function getEditUserAdmin(id_hide, name, username, active){
	$(".input_param_cld").hide();
	$(".edit_param_cld").show();
	$("#name").val(name);
	$("#username").val(username);
	$("#active").val(active);
	$("#id_hide").val(id_hide);
	$(".edit_pass").hide();
	$("#name").focus();
}

var i = 0; /* Set Global Variable i */
function increment(){
	i += 1; /* Function for automatic increment of field's "Name" attribute. */
}


function addRow(id){
		var r = document.createElement('span');
		var y = document.createElement("INPUT");
		y.setAttribute("type", "text");
		y.setAttribute("class", "form-control");
		y.setAttribute("placeholder", "Name");
		var g = document.createElement("span");
		
		increment();
		y.setAttribute("Name", "nilai_" + id + "[]");
		r.appendChild(y);
		g.setAttribute("onclick", "removeElement('the_row_"+ id +"','id_" + id + '_' + i +"')");
		r.appendChild(g);
		g.innerHTML="remove";
		r.setAttribute("id", "id_" + id + '_' + i);
		document.getElementById("the_row_"+id).appendChild(r);
}

function addRow2(id){
		var r = document.createElement('table');
		var y = document.createElement("INPUT");
		var k = document.createElement("INPUT");
		y.setAttribute("type", "text");
		y.setAttribute("class", "form-control col-sm-5");
		y.setAttribute("placeholder", "Dept Name");
		k.setAttribute("type", "text");
		k.setAttribute("class", "form-control col-sm-5");
		k.setAttribute("placeholder", "Qty");
		var g = document.createElement("span");
		
		increment();
		y.setAttribute("Name", "nilai_" + id + "[]");
		k.setAttribute("Name", "qty_" + id + "[]");
		
		
		
		
		g.setAttribute("onclick", "removeElement('the_row_"+ id +"','id_" + id + '_' + i +"')");
		r.appendChild(g);
		r.appendChild(y);
		
		r.appendChild(k);
		g.innerHTML="remove";
		r.setAttribute("id", "id_" + id + '_' + i);
		document.getElementById("the_row_"+id).appendChild(r);
}

function removeElement(parentDiv, childDiv){
		if (childDiv == parentDiv){
				alert("The parent div cannot be removed.");
		}
		else if (document.getElementById(childDiv)){
		var child = document.getElementById(childDiv);
		var parent = document.getElementById(parentDiv);
		parent.removeChild(child);
		}
		else{
				alert("Child div has already been removed or does not exist.");
		return false;
		}
}