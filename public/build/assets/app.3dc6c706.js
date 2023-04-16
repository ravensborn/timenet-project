var mn=(Y,N)=>()=>(N||Y((N={exports:{}}).exports,N),N.exports);var hn=mn((exports,module)=>{/*
* HSCore
* @version: 4.0.0 (01 June, 2021)
* @author: HtmlStream
* @event-namespace: .HSCore
* @license: Htmlstream Libraries (https://htmlstream.com/licenses)
* Copyright 2021 Htmlstream
*/const HSCore={init:()=>{var Y=[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));Y.map(function(H){return new bootstrap.Tooltip(H)});var N=[].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));N.map(function(H){return new bootstrap.Popover(H)})},components:{}};HSCore.init();(function(N,H){typeof exports=="object"&&typeof module=="object"?module.exports=H():typeof define=="function"&&define.amd?define([],H):typeof exports=="object"?exports.HSMegaMenu=H():N.HSMegaMenu=H()})(window,function(){return function(Y){var N={};function H(A){if(N[A])return N[A].exports;var q=N[A]={i:A,l:!1,exports:{}};return Y[A].call(q.exports,q,q.exports,H),q.l=!0,q.exports}return H.m=Y,H.c=N,H.d=function(A,q,R){H.o(A,q)||Object.defineProperty(A,q,{enumerable:!0,get:R})},H.r=function(A){typeof Symbol<"u"&&Symbol.toStringTag&&Object.defineProperty(A,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(A,"__esModule",{value:!0})},H.t=function(A,q){if(q&1&&(A=H(A)),q&8||q&4&&typeof A=="object"&&A&&A.__esModule)return A;var R=Object.create(null);if(H.r(R),Object.defineProperty(R,"default",{enumerable:!0,value:A}),q&2&&typeof A!="string")for(var oe in A)H.d(R,oe,function(K){return A[K]}.bind(null,oe));return R},H.n=function(A){var q=A&&A.__esModule?function(){return A.default}:function(){return A};return H.d(q,"a",q),q},H.o=function(A,q){return Object.prototype.hasOwnProperty.call(A,q)},H.p="",H(H.s="./src/js/hs-mega-menu.js")}({"./src/js/hs-mega-menu.js":function(module,__webpack_exports__,__webpack_require__){eval(`__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return HSMegaMenu; });
/* harmony import */ var _methods_object_assign_deep__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./methods/object-assign-deep */ "./src/js/methods/object-assign-deep.js");
/* harmony import */ var _methods_object_assign_deep__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_methods_object_assign_deep__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _methods_get_type__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./methods/get-type */ "./src/js/methods/get-type.js");
/* harmony import */ var _methods_smart_position__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./methods/smart-position */ "./src/js/methods/smart-position.js");
/* harmony import */ var _methods_desktop_css_animation_enable__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./methods/desktop-css-animation-enable */ "./src/js/methods/desktop-css-animation-enable.js");
/* harmony import */ var _methods_desktop_mouseenter_event_listener__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./methods/desktop-mouseenter-event-listener */ "./src/js/methods/desktop-mouseenter-event-listener.js");
/* harmony import */ var _methods_desktop_mouseleave_event_listener__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./methods/desktop-mouseleave-event-listener */ "./src/js/methods/desktop-mouseleave-event-listener.js");
/* harmony import */ var _methods_desktop_click_event_listener__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./methods/desktop-click-event-listener */ "./src/js/methods/desktop-click-event-listener.js");
/* harmony import */ var _methods_mobile_click_event_listener__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./methods/mobile-click-event-listener */ "./src/js/methods/mobile-click-event-listener.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/*
* HSMegaMenu Plugin
* @version: 2.0.1 (Sun, 1 Nov 2021)
* @author: HtmlStream
* @event-namespace: .HSMegaMenu
* @license: Htmlstream Libraries (https://htmlstream.com/)
* Copyright 2021 Htmlstream
*/








var dataAttributeName = 'data-hs-mega-menu-options';
var defaults = {
  eventType: 'hover',
  direction: 'horizontal',
  breakpoint: 'lg',
  rtl: false,
  isMenuOpened: false,
  sideBarRatio: 1 / 4,
  pageContainer: document.getElementsByTagName('body'),
  mobileSpeed: 400,
  duration: 300,
  delay: 0,
  itemOptions: {
    megaMenuTimeOut: null,
    desktop: {
      animation: 'animated',
      animationIn: 'slideInUp',
      animationOut: false,
      position: null,
      maxWidth: null
    }
  },
  classMap: {
    rtl: '.hs-rtl',
    reversed: '.hs-reversed',
    initialized: '.hs-menu-initialized',
    mobileState: '.hs-mobile-state',
    invoker: '.hs-mega-menu-invoker',
    subMenu: '.hs-sub-menu',
    hasSubMenu: '.hs-has-sub-menu',
    hasSubMenuActive: '.hs-sub-menu-opened',
    megaMenu: '.hs-mega-menu',
    hasMegaMenu: '.hs-has-mega-menu',
    hasMegaMenuActive: '.hs-mega-menu-opened'
  }
};

var HSMegaMenu = /*#__PURE__*/function () {
  function HSMegaMenu(el, options, id) {
    _classCallCheck(this, HSMegaMenu);

    this.collection = [];
    var that = this;
    var elems;

    if (el instanceof HTMLElement) {
      elems = [el];
    } else if (el instanceof Object) {
      elems = el;
    } else {
      elems = document.querySelectorAll(el);
    }

    for (var i = 0; i < elems.length; i += 1) {
      that.addToCollection(elems[i], options, id || elems[i].id);
    }

    if (!that.collection.length) {
      return false;
    } // initialization calls


    that._init();

    return this;
  }

  _createClass(HSMegaMenu, [{
    key: "_init",
    value: function _init() {
      var _this = this;

      var that = this;

      var _loop = function _loop(i) {
        var _$el = void 0;

        var _options = void 0;

        if (that.collection[i].hasOwnProperty('$initializedEl')) {
          return "continue";
        }

        _$el = that.collection[i].$el;
        _options = that.collection[i].options;
        _options.state = null; // Resolution list

        resolutionsList = {
          xs: 0,
          sm: 576,
          md: 768,
          lg: 992,
          xl: 1200
        }; // Keycodes

        ESC_KEYCODE = 27;
        TAB_KEYCODE = 9;
        ENTER_KEYCODE = 13;
        SPACE_KEYCODE = 32;
        ARROW_UP_KEYCODE = 38;
        ARROW_DOWN_KEYCODE = 40;
        ARROW_RIGHT_KEYCODE = 39;
        ARROW_LEFT_KEYCODE = 37; // Prevent scroll

        var preventScroll = function preventScroll(keycode) {
          return function (e) {
            if (e.which === keycode) {
              e.preventDefault();
            }
          };
        }; // Get Item Settings


        var getItemSettings = function getItemSettings($el) {
          if (!$el) return false;
          var dataSettings = $el.hasAttribute('data-hs-mega-menu-item-options') ? JSON.parse($el.getAttribute('data-hs-mega-menu-item-options')) : {},
              itemSettings = _options.itemOptions;
          itemSettings = Object.assign({}, itemSettings, dataSettings);

          itemSettings.activeItemClass = function () {
            return Object(_methods_get_type__WEBPACK_IMPORTED_MODULE_1__["default"])($el, _options) === 'mega-menu' ? _options.classMap.hasMegaMenuActive : _options.classMap.hasSubMenuActive;
          };

          return itemSettings;
        };

        var stateDetection = function stateDetection() {
          if (window.innerWidth < resolutionsList[_options.breakpoint]) {
            _this.state = 'mobile';
          } else {
            _this.state = 'desktop';
          }
        };

        stateDetection(); // State Detection

        window.addEventListener('resize', function () {
          stateDetection();
        }); // Set RTL

        if (_options.rtl) {
          _$el.addClass(_options.classMap.rtl.slice(1));
        } // Init Menu Items


        _$el.querySelectorAll("".concat(_options.classMap.hasMegaMenu, ", ").concat(_options.classMap.hasSubMenu)).forEach(function (el) {
          _this.MegaMenuItem(el, el.querySelector(_options.classMap[Object(_methods_get_type__WEBPACK_IMPORTED_MODULE_1__["default"])(el, _options) === 'mega-menu' ? 'megaMenu' : 'subMenu']), _options);
        }); // Add Initialized Classes


        _$el.classList.add("".concat(_options.classMap.initialized.slice(1)), "hs-menu-".concat(_options.direction)); // *****
        // Start: ACCESSIBILITY
        // *****


        myPreventScrollSpace = preventScroll(SPACE_KEYCODE);
        myPreventScrollDown = preventScroll(ARROW_DOWN_KEYCODE);
        myPreventScrollUp = preventScroll(ARROW_UP_KEYCODE);
        var $items = void 0,
            index = void 0,
            state = null;
        document.addEventListener('keyup', function () {
          window.removeEventListener('keydown', myPreventScrollSpace, false);
          window.removeEventListener('keydown', myPreventScrollUp, false);
          window.removeEventListener('keydown', myPreventScrollDown, false);
        });
        document.addEventListener('keyup', function (e) {
          if (!e.target.closest("".concat(_options.classMap.hasMegaMenu, ", ").concat(_options.classMap.hasSubMenu)) || e.target.closest('input')) return false; //
          // Start: PREVENT SCROLL
          //

          e.preventDefault();
          e.stopPropagation();
          window.addEventListener('keydown', myPreventScrollSpace, false);
          window.addEventListener('keydown', myPreventScrollUp, false);
          window.addEventListener('keydown', myPreventScrollDown, false); //
          // End: PREVENT SCROLL
          //
          //
          // Start: ELEMENT DETECTION
          //

          if (e.target.classList.contains(_options.classMap.invoker.slice(1)) && !e.target.closest(["".concat(_options.classMap.subMenu, ", ").concat(_options.classMap.megaMenu)])) {
            // console.log('Top level');
            if (state !== 'topLevel') {
              state = 'topLevel';
            }

            $items = [].slice.call(e.target.parentNode.parentNode.querySelectorAll(_options.classMap.invoker)).filter(function (item) {
              if (!item.closest(["".concat(_options.classMap.subMenu, ", ").concat(_options.classMap.megaMenu)])) {
                return item.offsetParent !== null;
              }
            });
          } else if (e.target.closest(["".concat(_options.classMap.subMenu, ", ").concat(_options.classMap.megaMenu)]) && e.target.parentNode.querySelector("".concat(_options.classMap.subMenu, ", ").concat(_options.classMap.megaMenu))) {
            // console.log('Has submenu and not top level');
            if (state !== 'hasSubmenu') {
              state = 'hasSubmenu';
            }

            $items = [].slice.call(e.target.parentNode.parentNode.querySelectorAll(_options.classMap.invoker)).filter(function (item) {
              return item.offsetParent !== null;
            });
          } else {
            // console.log('Just element');
            if (state !== 'simple') {
              state = 'simple';
            }

            $items = [].slice.call(e.target.closest(["".concat(_options.classMap.subMenu, ", ").concat(_options.classMap.megaMenu)]).querySelectorAll('a, button')).filter(function (item) {
              return item.offsetParent !== null;
            });
          } //
          // End: ELEMENT DETECTION
          //


          index = $items.indexOf(e.target); //
          // Start: TOP LEVEL
          //
          // Left

          if (state === 'topLevel' && e.which === ARROW_LEFT_KEYCODE && index > 0) {
            index--;
          } // Right


          if (state === 'topLevel' && e.which === ARROW_RIGHT_KEYCODE && index < $items.length - 1) {
            index++;
          } // Open Sub


          if (state === 'topLevel' && (e.which === ARROW_DOWN_KEYCODE || e.which === SPACE_KEYCODE || e.which === ENTER_KEYCODE)) {
            if (!e.target.parentNode.querySelector(["".concat(_options.classMap.megaMenu, ".").concat(_options.itemOptions.desktop.animationIn, ", ").concat(_options.classMap.subMenu, ".").concat(_options.itemOptions.desktop.animationIn)])) {
              Object(_methods_desktop_mouseenter_event_listener__WEBPACK_IMPORTED_MODULE_4__["default"])(e.target.parentNode, e.target.parentNode.querySelector(["".concat(_options.classMap.subMenu, ", ").concat(_options.classMap.megaMenu)]), _options, getItemSettings(e.target.parentNode))();
            } else if (e.target.parentNode.querySelector(["".concat(_options.classMap.megaMenu, ".").concat(_options.itemOptions.desktop.animationIn, ", ").concat(_options.classMap.subMenu, ".").concat(_options.itemOptions.desktop.animationIn)])) {
              e.target.parentNode.querySelector(["".concat(_options.classMap.megaMenu, ".").concat(_options.itemOptions.desktop.animationIn, ", ").concat(_options.classMap.subMenu, ".").concat(_options.itemOptions.desktop.animationIn)]).querySelectorAll('a')[0].focus();
              return;
            }
          } // Close Siblings


          if (state === 'topLevel' && (e.which === TAB_KEYCODE || e.which === ARROW_RIGHT_KEYCODE || e.which === ARROW_LEFT_KEYCODE) && e.target.closest("".concat(_options.classMap.hasMegaMenu, ", ").concat(_options.classMap.hasSubMenu)).parentNode.querySelector("".concat(_options.classMap.megaMenu, ".").concat(_options.itemOptions.desktop.animationIn, ", ").concat(_options.classMap.subMenu, ".").concat(_options.itemOptions.desktop.animationIn))) {
            Object(_methods_desktop_mouseleave_event_listener__WEBPACK_IMPORTED_MODULE_5__["default"])(e.target.closest("".concat(_options.classMap.hasMegaMenu, ", ").concat(_options.classMap.hasSubMenu)), e.target.closest("".concat(_options.classMap.hasMegaMenu, ", ").concat(_options.classMap.hasSubMenu)).parentNode.querySelector("".concat(_options.classMap.hasMegaMenuActive, " > ").concat(_options.classMap.megaMenu, ", ").concat(_options.classMap.hasSubMenuActive, " > ").concat(_options.classMap.subMenu)), _options, getItemSettings(e.target.closest("".concat(_options.classMap.hasMegaMenu, ", ").concat(_options.classMap.hasSubMenu))))();
          } //
          // End: TOP LEVEL
          //
          //
          // Start: HAS SUB-MENU BUT NOT TOP LEVEL
          //
          // Up


          if (state === 'hasSubmenu' && e.which === ARROW_UP_KEYCODE && index > 0) {
            index--;
          } // Down


          if (state === 'hasSubmenu' && e.which === ARROW_DOWN_KEYCODE && index < $items.length - 1) {
            index++;
          } // Open Sub


          if (state === 'hasSubmenu' && (e.which === ARROW_LEFT_KEYCODE || e.which === ARROW_RIGHT_KEYCODE || e.which === SPACE_KEYCODE || e.which === ENTER_KEYCODE)) {
            if (!e.target.parentNode.querySelector(["".concat(_options.classMap.megaMenu, ".").concat(_options.itemOptions.desktop.animationIn, ", ").concat(_options.classMap.subMenu, ".").concat(_options.itemOptions.desktop.animationIn)])) {
              Object(_methods_desktop_mouseenter_event_listener__WEBPACK_IMPORTED_MODULE_4__["default"])(e.target.parentNode, e.target.parentNode.querySelector(["".concat(_options.classMap.subMenu, ", ").concat(_options.classMap.megaMenu)]), _options, getItemSettings(e.target.parentNode))();
            } else if (e.target.parentNode.querySelector(["".concat(_options.classMap.megaMenu, ".").concat(_options.itemOptions.desktop.animationIn, ", ").concat(_options.classMap.subMenu, ".").concat(_options.itemOptions.desktop.animationIn)])) {
              e.target.parentNode.querySelector(["".concat(_options.classMap.megaMenu, ".").concat(_options.itemOptions.desktop.animationIn, ", ").concat(_options.classMap.subMenu, ".").concat(_options.itemOptions.desktop.animationIn)]).querySelectorAll('a')[0].focus();
              return;
            }
          } // Close Siblings


          if (state === 'hasSubmenu' && (e.which === TAB_KEYCODE || e.which === ARROW_DOWN_KEYCODE || e.which === ARROW_UP_KEYCODE) && e.target.closest(["".concat(_options.classMap.hasMegaMenu, ", ").concat(_options.classMap.hasSubMenu)]).parentNode.querySelectorAll("".concat(_options.classMap.megaMenu, ".").concat(_options.itemOptions.desktop.animationIn, ", ").concat(_options.classMap.subMenu, ".").concat(_options.itemOptions.desktop.animationIn)).length) {
            Object(_methods_desktop_mouseleave_event_listener__WEBPACK_IMPORTED_MODULE_5__["default"])(e.target.closest(["".concat(_options.classMap.hasMegaMenu, ", ").concat(_options.classMap.hasSubMenu)]), e.target.closest(["".concat(_options.classMap.hasMegaMenu, ", ").concat(_options.classMap.hasSubMenu)]).parentNode.querySelector("".concat(_options.classMap.hasMegaMenuActive, " > ").concat(_options.classMap.megaMenu, ", ").concat(_options.classMap.hasSubMenuActive, " > ").concat(_options.classMap.subMenu)), _options, getItemSettings(e.target.closest(["".concat(_options.classMap.hasMegaMenu, ", ").concat(_options.classMap.hasSubMenu)])))();
          } //
          // End: HAS SUB-MENU BUT NOT TOP LEVEL
          //
          //
          // Start: SIMPLE
          //
          // Left, Up


          if (state === 'simple' && e.which === ARROW_UP_KEYCODE && index > 0) {
            index--;
          } // Right, Down


          if (state === 'simple' && e.which === ARROW_DOWN_KEYCODE && index < $items.length - 1) {
            index++;
          } // Close Siblings


          if (state === 'simple' && (e.which === ARROW_RIGHT_KEYCODE || e.which === ARROW_LEFT_KEYCODE) && e.target.closest(_options.classMap.hasSubMenu).parentNode.querySelector(_options.classMap.subMenu)) {
            e.target.closest(_options.classMap.hasSubMenu).querySelector(_options.classMap.invoker).focus();
            Object(_methods_desktop_mouseleave_event_listener__WEBPACK_IMPORTED_MODULE_5__["default"])(e.target.closest(_options.classMap.hasSubMenu), e.target.closest(_options.classMap.hasSubMenu).parentNode.querySelector("".concat(_options.classMap.hasSubMenuActive, " > ").concat(_options.classMap.subMenu)), _options, getItemSettings(e.target.closest(_options.classMap.hasSubMenu)))();
            return;
          } //
          // End: SIMPLE
          //
          // Close Self


          if (e.which === ESC_KEYCODE && _this.state === 'desktop' && document.querySelector("".concat(_options.classMap.megaMenu, ".").concat(_options.itemOptions.desktop.animationIn, ", ").concat(_options.classMap.subMenu, ".").concat(_options.itemOptions.desktop.animationIn))) {
            Object(_methods_desktop_mouseleave_event_listener__WEBPACK_IMPORTED_MODULE_5__["default"])(document.querySelector("".concat(_options.classMap.hasMegaMenuActive, ", ").concat(_options.classMap.hasSubMenuActive)), document.querySelector("".concat(_options.classMap.megaMenu, ".").concat(_options.itemOptions.desktop.animationIn, ", ").concat(_options.classMap.subMenu, ".").concat(_options.itemOptions.desktop.animationIn)), _options, getItemSettings(document.querySelector("".concat(_options.classMap.hasMegaMenuActive, ", ").concat(_options.classMap.hasSubMenuActive))))();
            return;
          } // Reset index


          if (index < 0) {
            index = 0;
          }

          $items[index].focus();
        });
        document.addEventListener('keyup', function (e) {
          // Close All
          if (e.which === TAB_KEYCODE && document.querySelector("".concat(_options.classMap.megaMenu, ".").concat(_options.itemOptions.desktop.animationIn, ", ").concat(_options.classMap.subMenu, ".").concat(_options.itemOptions.desktop.animationIn))) {
            Object(_methods_desktop_mouseleave_event_listener__WEBPACK_IMPORTED_MODULE_5__["default"])(document.querySelector("".concat(_options.classMap.hasMegaMenuActive, ", ").concat(_options.classMap.hasSubMenuActive)), document.querySelector("".concat(_options.classMap.megaMenu, ".").concat(_options.itemOptions.desktop.animationIn, ", ").concat(_options.classMap.subMenu, ".").concat(_options.itemOptions.desktop.animationIn)), _options, getItemSettings(document.querySelector("".concat(_options.classMap.hasMegaMenuActive, ", ").concat(_options.classMap.hasSubMenuActive))))();
          }
        }); // *****
        // End: ACCESSIBILITY
        // *****

        that.collection[i].$initializedEl = _options;
      };

      for (var i = 0; i < that.collection.length; i += 1) {
        var resolutionsList;
        var ESC_KEYCODE, TAB_KEYCODE, ENTER_KEYCODE, SPACE_KEYCODE, ARROW_UP_KEYCODE, ARROW_DOWN_KEYCODE, ARROW_RIGHT_KEYCODE, ARROW_LEFT_KEYCODE;
        var myPreventScrollSpace, myPreventScrollDown, myPreventScrollUp;

        var _ret = _loop(i);

        if (_ret === "continue") continue;
      }
    }
  }, {
    key: "MegaMenuItem",
    value: function MegaMenuItem(el, menu, params) {
      var context = this,
          settings = params,
          itemDataSettings = el.hasAttribute('data-hs-mega-menu-item-options') ? JSON.parse(el.getAttribute('data-hs-mega-menu-item-options')) : {},
          $el = el,
          $menu = menu;
      var itemSettings = {
        eventType: itemDataSettings.eventType ? itemDataSettings.eventType : settings.eventType,
        megaMenuTimeOut: null,
        desktop: {
          animation: 'animated',
          animationIn: 'slideInUp',
          animationOut: false,
          position: null,
          maxWidth: null
        }
      };
      itemSettings = _methods_object_assign_deep__WEBPACK_IMPORTED_MODULE_0___default()({}, settings, itemSettings, itemDataSettings);

      itemSettings.activeItemClass = function () {
        return Object(_methods_get_type__WEBPACK_IMPORTED_MODULE_1__["default"])($el, itemSettings) === 'mega-menu' ? itemSettings.classMap.hasMegaMenuActive : itemSettings.classMap.hasSubMenuActive;
      }; // Set Menu Breakpoint Class


      $menu.classList.add(Object(_methods_get_type__WEBPACK_IMPORTED_MODULE_1__["default"])($el, itemSettings) === 'mega-menu' ? "hs-mega-menu-desktop-".concat(itemSettings.breakpoint) : "hs-sub-menu-desktop-".concat(itemSettings.breakpoint)); // Listeners

      var myDesktopCSSAnimationEnable = Object(_methods_desktop_css_animation_enable__WEBPACK_IMPORTED_MODULE_3__["default"])($menu, itemSettings),
          myDesktopMouseEnterEventListener = Object(_methods_desktop_mouseenter_event_listener__WEBPACK_IMPORTED_MODULE_4__["default"])($el, $menu, settings, itemSettings),
          myDesktopMouseLeaveEventListener = Object(_methods_desktop_mouseleave_event_listener__WEBPACK_IMPORTED_MODULE_5__["default"])($el, $menu, settings, itemSettings),
          myDesktopClickEventListener = Object(_methods_desktop_click_event_listener__WEBPACK_IMPORTED_MODULE_6__["default"])($el, $menu, settings, itemSettings),
          myMobileClickEventListener = Object(_methods_mobile_click_event_listener__WEBPACK_IMPORTED_MODULE_7__["default"])($el, $menu, settings, itemSettings);

      var mobileListeners = function mobileListeners() {
        // Remove Desktop Listeners
        $menu.removeEventListener('animationend', myDesktopCSSAnimationEnable, false);
        $menu.removeEventListener('webkitAnimationEnd', myDesktopCSSAnimationEnable, false);
        $el.removeEventListener('mouseenter', myDesktopMouseEnterEventListener, false);
        $el.removeEventListener('mouseleave', myDesktopMouseLeaveEventListener, false); // $el.children(settings.classMap.invoker)[0].removeEventListener('focus', myDesktopMouseEnterEventListener, false);

        $el.querySelector(itemSettings.classMap.invoker).removeEventListener('click', myDesktopClickEventListener, false); // Add Mobile Listeners

        $el.querySelector(itemSettings.classMap.invoker).addEventListener('click', myMobileClickEventListener, false);
      },
          desktopListeners = function desktopListeners() {
        // Remove Mobile Listeners
        $el.querySelector(itemSettings.classMap.invoker).removeEventListener('click', myMobileClickEventListener, false); // Add Desktop Listeners

        $menu.addEventListener('animationend', myDesktopCSSAnimationEnable, false);
        $menu.addEventListener('webkitAnimationEnd', myDesktopCSSAnimationEnable, false);

        if (itemSettings.eventType === 'hover') {
          $el.addEventListener('mouseenter', myDesktopMouseEnterEventListener, false);
          $el.addEventListener('mouseleave', myDesktopMouseLeaveEventListener, false);
        }

        if (itemSettings.eventType === 'click') {
          $el.querySelector(itemSettings.classMap.invoker).addEventListener('click', myDesktopClickEventListener, false);
        }
      };

      if (itemSettings.desktop.maxWidth) {
        $menu.style.maxWidth = itemSettings.desktop.maxWidth;
      }

      if (itemSettings.desktop.position) {
        $menu.classList.add("hs-position-".concat(itemSettings.desktop.position));
      } // Document Events


      document.addEventListener('click', function (e) {
        if (!e.target.closest([itemSettings.classMap.subMenu, itemSettings.classMap.megaMenu, itemSettings.classMap.invoker]) && context.state === 'desktop') {
          $el.classList.remove(itemSettings.activeItemClass().slice(1));
          $menu.classList.remove(itemSettings.desktop.animationIn);

          if (itemSettings.animationOut) {
            $menu.classList.add(itemSettings.desktop.animationOut);
          } else {
            $menu.style.display = 'none';
          }
        }
      }); // Resize and Scroll Events

      window.addEventListener('resize', function () {
        if (context.state === 'desktop') {
          Object(_methods_smart_position__WEBPACK_IMPORTED_MODULE_2__["default"])($menu, itemSettings);
        }
      });

      var resizeDetection = function resizeDetection() {
        if (context.state === 'mobile') {
          $menu.classList.remove(itemSettings.desktop.animation);
          $menu.style.animationDuration = '';
          mobileListeners();
        } else if (context.state === 'desktop') {
          $menu.classList.add(itemSettings.desktop.animation);
          $menu.style.animationDuration = "".concat(itemSettings.duration, "ms");
          desktopListeners();
        }
      };

      resizeDetection(); // State Detection

      window.addEventListener('resize', function () {
        resizeDetection();
      });
    }
  }, {
    key: "addToCollection",
    value: function addToCollection(item, options, id) {
      this.collection.push({
        $el: item,
        id: id || null,
        options: _methods_object_assign_deep__WEBPACK_IMPORTED_MODULE_0___default()({}, defaults, item.hasAttribute(dataAttributeName) ? JSON.parse(item.getAttribute(dataAttributeName)) : {}, options)
      });
    }
  }, {
    key: "getItems",
    value: function getItems() {
      var that = this;
      var newCollection = [];

      for (var i = 0; i < that.collection.length; i += 1) {
        newCollection.push(that.collection[i].$initializedEl);
      }

      return newCollection;
    }
  }, {
    key: "getItem",
    value: function getItem(ind) {
      return this.collection[ind].$initializedEl;
    }
  }]);

  return HSMegaMenu;
}();



//# sourceURL=webpack://HSMegaMenu/./src/js/hs-mega-menu.js?`)},"./src/js/methods/desktop-click-event-listener.js":function(module,__webpack_exports__,__webpack_require__){eval(`__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return desktopClickEventListener; });
/* harmony import */ var _get_type__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./get-type */ "./src/js/methods/get-type.js");
/* harmony import */ var _smart_position__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./smart-position */ "./src/js/methods/smart-position.js");
/* harmony import */ var _desktop_show__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./desktop-show */ "./src/js/methods/desktop-show.js");
/* harmony import */ var _desktop_hide__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./desktop-hide */ "./src/js/methods/desktop-hide.js");




function desktopClickEventListener(el, menu, params, itemParams) {
  return function () {
    var $siblingInvokers = menu.closest("".concat(params.classMap.hasMegaMenu, ", ").concat(params.classMap.hasSubMenu)).parentNode.querySelectorAll("".concat(params.classMap.hasMegaMenu).concat(params.classMap.hasMegaMenuActive, ", ").concat(params.classMap.hasSubMenu).concat(params.classMap.hasSubMenuActive));

    if ($siblingInvokers.length) {
      $siblingInvokers.forEach(function ($el) {
        if (el === $el) return;
        var $menu = $el.querySelector("".concat(params.classMap.megaMenu, ", ").concat(params.classMap.subMenu)),
            itemDataSettings = $el.hasAttribute('data-hs-mega-menu-item-options') ? JSON.parse($el.getAttribute('data-hs-mega-menu-item-options')) : {};
        var itemSettings = {
          desktop: {
            animation: 'animated',
            animationIn: 'slideInUp',
            animationOut: 'fadeOut',
            position: null
          }
        };
        itemSettings = Object.assign({}, itemSettings, itemDataSettings);

        itemSettings.activeItemClass = function () {
          return Object(_get_type__WEBPACK_IMPORTED_MODULE_0__["default"])($el, params) === 'mega-menu' ? params.classMap.hasMegaMenuActive : params.classMap.hasSubMenuActive;
        };

        $el.classList.remove(itemSettings.activeItemClass().slice(1));
        Object(_desktop_hide__WEBPACK_IMPORTED_MODULE_3__["default"])($el, $menu, params, itemSettings);
      });
    }

    if (menu.offsetParent === null) {
      el.classList.add(itemParams.activeItemClass().slice(1));
      Object(_desktop_show__WEBPACK_IMPORTED_MODULE_2__["default"])(el, menu, params, itemParams);
      Object(_smart_position__WEBPACK_IMPORTED_MODULE_1__["default"])(menu, params);
    } else {
      el.classList.remove(itemParams.activeItemClass().slice(1));
      Object(_desktop_hide__WEBPACK_IMPORTED_MODULE_3__["default"])(el, menu, params, itemParams);
    }
  };
}

//# sourceURL=webpack://HSMegaMenu/./src/js/methods/desktop-click-event-listener.js?`)},"./src/js/methods/desktop-css-animation-enable.js":function(module,__webpack_exports__,__webpack_require__){eval(`__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return desktopCSSAnimationEnable; });
function desktopCSSAnimationEnable(menu, itemParams) {
  return function (e) {
    if (menu.classList.contains(itemParams.desktop.animationOut)) {
      menu.classList.remove(itemParams.desktop.animationOut);
      menu.style.display = 'none';
    }

    e.preventDefault();
    e.stopPropagation();
  };
}

//# sourceURL=webpack://HSMegaMenu/./src/js/methods/desktop-css-animation-enable.js?`)},"./src/js/methods/desktop-hide.js":function(module,__webpack_exports__,__webpack_require__){eval(`__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return desktopHide; });
function desktopHide(el, menu, params, itemParams) {
  if (!menu) {
    return this;
  }

  if (itemParams.desktop.animationOut) {
    menu.classList.remove(itemParams.desktop.animationIn);
    menu.classList.add(itemParams.desktop.animationOut);
    menu.style.display = 'none';
  } else {
    menu.classList.remove(itemParams.desktop.animationIn);
    menu.style.display = 'none';
  }
}

//# sourceURL=webpack://HSMegaMenu/./src/js/methods/desktop-hide.js?`)},"./src/js/methods/desktop-mouseenter-event-listener.js":function(module,__webpack_exports__,__webpack_require__){eval(`__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return desktopMouseEnterEventListener; });
/* harmony import */ var _smart_position__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./smart-position */ "./src/js/methods/smart-position.js");
/* harmony import */ var _desktop_show__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./desktop-show */ "./src/js/methods/desktop-show.js");
/* harmony import */ var _get_type__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./get-type */ "./src/js/methods/get-type.js");
/* harmony import */ var _desktop_hide__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./desktop-hide */ "./src/js/methods/desktop-hide.js");




function desktopMouseEnterEventListener(el, menu, params, itemParams) {
  return function () {
    if (itemParams.megaMenuTimeOut) {
      clearTimeout(itemParams.megaMenuTimeOut);
    }

    var $siblingInvokers = menu.closest("".concat(params.classMap.hasMegaMenu, ", ").concat(params.classMap.hasSubMenu)).parentNode.querySelectorAll("".concat(params.classMap.hasMegaMenu).concat(params.classMap.hasMegaMenuActive, ", ").concat(params.classMap.hasSubMenu).concat(params.classMap.hasSubMenuActive));

    if ($siblingInvokers.length) {
      $siblingInvokers.forEach(function ($el) {
        var $menu = $el.querySelector("".concat(params.classMap.megaMenu, ", ").concat(params.classMap.subMenu)),
            itemDataSettings = $el.hasAttribute('data-hs-mega-menu-item-options') ? JSON.parse($el.getAttribute('data-hs-mega-menu-item-options')) : {};
        var itemSettings = {
          desktop: {
            animation: 'animated',
            animationIn: 'slideInUp',
            animationOut: 'fadeOut',
            position: null
          }
        };
        itemSettings = Object.assign({}, itemSettings, itemDataSettings);

        itemSettings.activeItemClass = function () {
          return Object(_get_type__WEBPACK_IMPORTED_MODULE_2__["default"])($el, params) === 'mega-menu' ? params.classMap.hasMegaMenuActive : params.classMap.hasSubMenuActive;
        };

        $el.classList.remove(itemSettings.activeItemClass().slice(1));
        Object(_desktop_hide__WEBPACK_IMPORTED_MODULE_3__["default"])($el, $menu, params, itemSettings);
      });
    }

    el.classList.add(itemParams.activeItemClass().slice(1));
    Object(_desktop_show__WEBPACK_IMPORTED_MODULE_1__["default"])(el, menu, params, itemParams);
    Object(_smart_position__WEBPACK_IMPORTED_MODULE_0__["default"])(menu, params);
  };
}

//# sourceURL=webpack://HSMegaMenu/./src/js/methods/desktop-mouseenter-event-listener.js?`)},"./src/js/methods/desktop-mouseleave-event-listener.js":function(module,__webpack_exports__,__webpack_require__){eval(`__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return desktopMouseLeaveEventListener; });
/* harmony import */ var _desktop_hide__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./desktop-hide */ "./src/js/methods/desktop-hide.js");

function desktopMouseLeaveEventListener(el, menu, params, itemParams) {
  return function () {
    itemParams.megaMenuTimeOut = setTimeout(function () {
      el.classList.remove(itemParams.activeItemClass().slice(1));
      Object(_desktop_hide__WEBPACK_IMPORTED_MODULE_0__["default"])(el, menu, params, itemParams);
    }, params.delay);
  };
}

//# sourceURL=webpack://HSMegaMenu/./src/js/methods/desktop-mouseleave-event-listener.js?`)},"./src/js/methods/desktop-show.js":function(module,__webpack_exports__,__webpack_require__){eval(`__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return desktopShow; });
function desktopShow(el, menu, params, itemParams) {
  menu.classList.remove(itemParams.desktop.animationOut);
  menu.style.display = 'block';
  menu.classList.add(itemParams.desktop.animationIn);
}

//# sourceURL=webpack://HSMegaMenu/./src/js/methods/desktop-show.js?`)},"./src/js/methods/get-type.js":function(module,__webpack_exports__,__webpack_require__){eval(`__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return getType; });
function getType(el, params) {
  if (!el) {
    return false;
  }

  return el.classList.contains(params.classMap.hasSubMenu.slice(1)) ? 'sub-menu' : el.classList.contains(params.classMap.hasMegaMenu.slice(1)) ? 'mega-menu' : null;
}

//# sourceURL=webpack://HSMegaMenu/./src/js/methods/get-type.js?`)},"./src/js/methods/mobile-click-event-listener.js":function(module,__webpack_exports__,__webpack_require__){eval(`__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return mobileClickEventListener; });
/* harmony import */ var _get_type__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./get-type */ "./src/js/methods/get-type.js");
/* harmony import */ var _mobile_show__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./mobile-show */ "./src/js/methods/mobile-show.js");
/* harmony import */ var _mobile_hide__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./mobile-hide */ "./src/js/methods/mobile-hide.js");



function mobileClickEventListener(el, menu, params, itemParams) {
  return function () {
    var $siblingInvokers = menu.closest("".concat(params.classMap.hasMegaMenu, ", ").concat(params.classMap.hasSubMenu)).parentNode.querySelectorAll("".concat(params.classMap.hasMegaMenu).concat(params.classMap.hasMegaMenuActive, ", ").concat(params.classMap.hasSubMenu).concat(params.classMap.hasSubMenuActive));

    if ($siblingInvokers.length) {
      $siblingInvokers.forEach(function ($el) {
        var $menu = $el.querySelector("".concat(params.classMap.megaMenu, ", ").concat(params.classMap.subMenu)),
            itemSettings = {};

        itemSettings.activeItemClass = function () {
          return Object(_get_type__WEBPACK_IMPORTED_MODULE_0__["default"])($el, params) === 'mega-menu' ? params.classMap.hasMegaMenuActive : params.classMap.hasSubMenuActive;
        };

        Object(_mobile_hide__WEBPACK_IMPORTED_MODULE_2__["default"])($el, $menu, params, itemSettings);
      });
    }

    if (menu.offsetParent === null) {
      Object(_mobile_show__WEBPACK_IMPORTED_MODULE_1__["default"])(el, menu, params, itemParams);
    } else {
      Object(_mobile_hide__WEBPACK_IMPORTED_MODULE_2__["default"])(el, menu, params, itemParams);
    }
  };
}

//# sourceURL=webpack://HSMegaMenu/./src/js/methods/mobile-click-event-listener.js?`)},"./src/js/methods/mobile-hide.js":function(module,__webpack_exports__,__webpack_require__){eval(`__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return mobileHide; });
/* harmony import */ var _slideUp__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./slideUp */ "./src/js/methods/slideUp.js");

function mobileHide(el, menu, params, itemParams) {
  if (!menu) {
    return this;
  }

  el.classList.remove(itemParams.activeItemClass().slice(1));
  Object(_slideUp__WEBPACK_IMPORTED_MODULE_0__["default"])(menu, params.mobileSpeed);
}

//# sourceURL=webpack://HSMegaMenu/./src/js/methods/mobile-hide.js?`)},"./src/js/methods/mobile-show.js":function(module,__webpack_exports__,__webpack_require__){eval(`__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return mobileShow; });
/* harmony import */ var _slideDown__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./slideDown */ "./src/js/methods/slideDown.js");

function mobileShow(el, menu, params, itemParams) {
  if (!menu) {
    return this;
  }

  el.classList.add(itemParams.activeItemClass().slice(1));
  Object(_slideDown__WEBPACK_IMPORTED_MODULE_0__["default"])(menu, params.mobileSpeed);
}

//# sourceURL=webpack://HSMegaMenu/./src/js/methods/mobile-show.js?`)},"./src/js/methods/object-assign-deep.js":function(module,exports,__webpack_require__){eval(`
/*
 * OBJECT ASSIGN DEEP
 * Allows deep cloning of plain objects that contain primitives, nested plain objects, or nested plain arrays.
 */

/*
 * A unified way of returning a string that describes the type of the given variable.
 */

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function getTypeOf(input) {
  if (input === null) {
    return 'null';
  } else if (typeof input === 'undefined') {
    return 'undefined';
  } else if (_typeof(input) === 'object') {
    return Array.isArray(input) ? 'array' : 'object';
  }

  return _typeof(input);
}
/*
 * Branching logic which calls the correct function to clone the given value base on its type.
 */


function cloneValue(value) {
  // The value is an object so lets clone it.
  if (getTypeOf(value) === 'object') {
    return quickCloneObject(value);
  } // The value is an array so lets clone it.
  else if (getTypeOf(value) === 'array') {
    return quickCloneArray(value);
  } // Any other value can just be copied.


  return value;
}
/*
 * Enumerates the given array and returns a new array, with each of its values cloned (i.e. references broken).
 */


function quickCloneArray(input) {
  return input.map(cloneValue);
}
/*
 * Enumerates the properties of the given object (ignoring the prototype chain) and returns a new object, with each of
 * its values cloned (i.e. references broken).
 */


function quickCloneObject(input) {
  var output = {};

  for (var key in input) {
    if (!Object.prototype.hasOwnProperty.call(input, key)) {
      continue;
    }

    output[key] = cloneValue(input[key]);
  }

  return output;
}
/*
 * Does the actual deep merging.
 */


function executeDeepMerge(target) {
  var _objects = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : [];

  var _options = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {};

  var options = {
    arrayBehaviour: _options.arrayBehaviour || 'replace' // Can be "merge" or "replace".

  }; // Ensure we have actual objects for each.

  var objects = _objects.map(function (object) {
    return object || {};
  });

  var output = target || {}; // Enumerate the objects and their keys.

  for (var oindex = 0; oindex < objects.length; oindex++) {
    var object = objects[oindex];
    var keys = Object.keys(object);

    for (var kindex = 0; kindex < keys.length; kindex++) {
      var key = keys[kindex];
      var value = object[key];
      var type = getTypeOf(value);
      var existingValueType = getTypeOf(output[key]);

      if (type === 'object') {
        if (existingValueType !== 'undefined') {
          var existingValue = existingValueType === 'object' ? output[key] : {};
          output[key] = executeDeepMerge({}, [existingValue, quickCloneObject(value)], options);
        } else {
          output[key] = quickCloneObject(value);
        }
      } else if (type === 'array') {
        if (existingValueType === 'array') {
          var newValue = quickCloneArray(value);
          output[key] = options.arrayBehaviour === 'merge' ? output[key].concat(newValue) : newValue;
        } else {
          output[key] = quickCloneArray(value);
        }
      } else {
        output[key] = value;
      }
    }
  }

  return output;
}
/*
 * Merge all the supplied objects into the target object, breaking all references, including those of nested objects
 * and arrays, and even objects nested inside arrays. The first parameter is not mutated unlike Object.assign().
 * Properties in later objects will always overwrite.
 */


module.exports = function objectAssignDeep(target) {
  for (var _len = arguments.length, objects = new Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
    objects[_key - 1] = arguments[_key];
  }

  return executeDeepMerge(target, objects);
};
/*
 * Same as objectAssignDeep() except it doesn't mutate the target object and returns an entirely new object.
 */


module.exports.noMutate = function objectAssignDeepInto() {
  for (var _len2 = arguments.length, objects = new Array(_len2), _key2 = 0; _key2 < _len2; _key2++) {
    objects[_key2] = arguments[_key2];
  }

  return executeDeepMerge({}, objects);
};
/*
 * Allows an options object to be passed in to customise the behaviour of the function.
 */


module.exports.withOptions = function objectAssignDeepInto(target, objects, options) {
  return executeDeepMerge(target, objects, options);
};

//# sourceURL=webpack://HSMegaMenu/./src/js/methods/object-assign-deep.js?`)},"./src/js/methods/offset.js":function(module,__webpack_exports__,__webpack_require__){eval(`__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (function (el) {
  if (!el) return false;
  var rect = el.getBoundingClientRect();
  return {
    top: rect.top - window.scrollY,
    left: rect.left - window.scrollX
  };
});

//# sourceURL=webpack://HSMegaMenu/./src/js/methods/offset.js?`)},"./src/js/methods/slideDown.js":function(module,__webpack_exports__,__webpack_require__){eval(`__webpack_require__.r(__webpack_exports__);
var slideDown = function slideDown(target) {
  var duration = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 500;
  target.style.removeProperty('display');
  var display = window.getComputedStyle(target).display;
  if (display === 'none') display = 'block';
  target.style.display = display;
  var height = target.offsetHeight;
  target.style.overflow = 'hidden';
  target.style.height = 0;
  target.style.paddingTop = 0;
  target.style.paddingBottom = 0;
  target.style.marginTop = 0;
  target.style.marginBottom = 0;
  target.offsetHeight;
  target.style.boxSizing = 'border-box';
  target.style.transitionProperty = "height, margin, padding";
  target.style.transitionDuration = duration + 'ms';
  target.style.height = height + 'px';
  target.style.removeProperty('padding-top');
  target.style.removeProperty('padding-bottom');
  target.style.removeProperty('margin-top');
  target.style.removeProperty('margin-bottom');
  window.setTimeout(function () {
    target.style.removeProperty('height');
    target.style.removeProperty('overflow');
    target.style.removeProperty('transition-duration');
    target.style.removeProperty('transition-property');
  }, duration);
};

/* harmony default export */ __webpack_exports__["default"] = (slideDown);

//# sourceURL=webpack://HSMegaMenu/./src/js/methods/slideDown.js?`)},"./src/js/methods/slideUp.js":function(module,__webpack_exports__,__webpack_require__){eval(`__webpack_require__.r(__webpack_exports__);
var slideUp = function slideUp(target) {
  var duration = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 500;
  target.style.transitionProperty = 'height, margin, padding';
  target.style.transitionDuration = duration + 'ms';
  target.style.boxSizing = 'border-box';
  target.style.height = target.offsetHeight + 'px';
  target.offsetHeight;
  target.style.overflow = 'hidden';
  target.style.height = 0;
  target.style.paddingTop = 0;
  target.style.paddingBottom = 0;
  target.style.marginTop = 0;
  target.style.marginBottom = 0;
  window.setTimeout(function () {
    target.style.display = 'none';
    target.style.removeProperty('height');
    target.style.removeProperty('padding-top');
    target.style.removeProperty('padding-bottom');
    target.style.removeProperty('margin-top');
    target.style.removeProperty('margin-bottom');
    target.style.removeProperty('overflow');
    target.style.removeProperty('transition-duration');
    target.style.removeProperty('transition-property'); //alert("!");
  }, duration);
};

/* harmony default export */ __webpack_exports__["default"] = (slideUp);

//# sourceURL=webpack://HSMegaMenu/./src/js/methods/slideUp.js?`)},"./src/js/methods/smart-position.js":function(module,__webpack_exports__,__webpack_require__){eval(`__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return smartPosition; });
/* harmony import */ var _offset__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./offset */ "./src/js/methods/offset.js");

function smartPosition(el, params) {
  if (!el) return;

  if (!params.rtl) {
    if (Object(_offset__WEBPACK_IMPORTED_MODULE_0__["default"])(el).left + el.offsetWidth > window.innerWidth) {
      el.classList.add(params.classMap.reversed.slice(1));
    }
  } else {
    if (Object(_offset__WEBPACK_IMPORTED_MODULE_0__["default"])(el).left < 0) {
      el.classList.add(params.classMap.reversed.slice(1));
    }
  }
}

//# sourceURL=webpack://HSMegaMenu/./src/js/methods/smart-position.js?`)}}).default});(function(Y,N){typeof exports=="object"&&typeof module<"u"?module.exports=N():typeof define=="function"&&define.amd?define(N):(Y=typeof globalThis<"u"?globalThis:Y||self,Y.Swiper=N())})(globalThis,function(){function Y(t){return t!==null&&typeof t=="object"&&"constructor"in t&&t.constructor===Object}function N(t,e){t===void 0&&(t={}),e===void 0&&(e={}),Object.keys(e).forEach(s=>{typeof t[s]>"u"?t[s]=e[s]:Y(e[s])&&Y(t[s])&&Object.keys(e[s]).length>0&&N(t[s],e[s])})}const H={body:{},addEventListener(){},removeEventListener(){},activeElement:{blur(){},nodeName:""},querySelector(){return null},querySelectorAll(){return[]},getElementById(){return null},createEvent(){return{initEvent(){}}},createElement(){return{children:[],childNodes:[],style:{},setAttribute(){},getElementsByTagName(){return[]}}},createElementNS(){return{}},importNode(){return null},location:{hash:"",host:"",hostname:"",href:"",origin:"",pathname:"",protocol:"",search:""}};function A(){const t=typeof document<"u"?document:{};return N(t,H),t}const q={document:H,navigator:{userAgent:""},location:{hash:"",host:"",hostname:"",href:"",origin:"",pathname:"",protocol:"",search:""},history:{replaceState(){},pushState(){},go(){},back(){}},CustomEvent:function(){return this},addEventListener(){},removeEventListener(){},getComputedStyle(){return{getPropertyValue(){return""}}},Image(){},Date(){},screen:{},setTimeout(){},clearTimeout(){},matchMedia(){return{}},requestAnimationFrame(t){return typeof setTimeout>"u"?(t(),null):setTimeout(t,0)},cancelAnimationFrame(t){typeof setTimeout>"u"||clearTimeout(t)}};function R(){const t=typeof window<"u"?window:{};return N(t,q),t}function oe(t){const e=t.__proto__;Object.defineProperty(t,"__proto__",{get(){return e},set(s){e.__proto__=s}})}class K extends Array{constructor(e){typeof e=="number"?super(e):(super(...e||[]),oe(this))}}function se(t){t===void 0&&(t=[]);const e=[];return t.forEach(s=>{Array.isArray(s)?e.push(...se(s)):e.push(s)}),e}function Se(t,e){return Array.prototype.filter.call(t,e)}function Re(t){const e=[];for(let s=0;s<t.length;s+=1)e.indexOf(t[s])===-1&&e.push(t[s]);return e}function Be(t,e){if(typeof t!="string")return[t];const s=[],n=e.querySelectorAll(t);for(let a=0;a<n.length;a+=1)s.push(n[a]);return s}function T(t,e){const s=R(),n=A();let a=[];if(!e&&t instanceof K)return t;if(!t)return new K(a);if(typeof t=="string"){const i=t.trim();if(i.indexOf("<")>=0&&i.indexOf(">")>=0){let l="div";i.indexOf("<li")===0&&(l="ul"),i.indexOf("<tr")===0&&(l="tbody"),(i.indexOf("<td")===0||i.indexOf("<th")===0)&&(l="tr"),i.indexOf("<tbody")===0&&(l="table"),i.indexOf("<option")===0&&(l="select");const u=n.createElement(l);u.innerHTML=i;for(let d=0;d<u.childNodes.length;d+=1)a.push(u.childNodes[d])}else a=Be(t.trim(),e||n)}else if(t.nodeType||t===s||t===n)a.push(t);else if(Array.isArray(t)){if(t instanceof K)return t;a=t}return new K(Re(a))}T.fn=K.prototype;function He(){for(var t=arguments.length,e=new Array(t),s=0;s<t;s++)e[s]=arguments[s];const n=se(e.map(a=>a.split(" ")));return this.forEach(a=>{a.classList.add(...n)}),this}function We(){for(var t=arguments.length,e=new Array(t),s=0;s<t;s++)e[s]=arguments[s];const n=se(e.map(a=>a.split(" ")));return this.forEach(a=>{a.classList.remove(...n)}),this}function Ne(){for(var t=arguments.length,e=new Array(t),s=0;s<t;s++)e[s]=arguments[s];const n=se(e.map(a=>a.split(" ")));this.forEach(a=>{n.forEach(i=>{a.classList.toggle(i)})})}function qe(){for(var t=arguments.length,e=new Array(t),s=0;s<t;s++)e[s]=arguments[s];const n=se(e.map(a=>a.split(" ")));return Se(this,a=>n.filter(i=>a.classList.contains(i)).length>0).length>0}function Ye(t,e){if(arguments.length===1&&typeof t=="string")return this[0]?this[0].getAttribute(t):void 0;for(let s=0;s<this.length;s+=1)if(arguments.length===2)this[s].setAttribute(t,e);else for(const n in t)this[s][n]=t[n],this[s].setAttribute(n,t[n]);return this}function Ge(t){for(let e=0;e<this.length;e+=1)this[e].removeAttribute(t);return this}function Ue(t){for(let e=0;e<this.length;e+=1)this[e].style.transform=t;return this}function Ve(t){for(let e=0;e<this.length;e+=1)this[e].style.transitionDuration=typeof t!="string"?`${t}ms`:t;return this}function Xe(){for(var t=arguments.length,e=new Array(t),s=0;s<t;s++)e[s]=arguments[s];let[n,a,i,l]=e;typeof e[1]=="function"&&([n,i,l]=e,a=void 0),l||(l=!1);function u(o){const r=o.target;if(!r)return;const m=o.target.dom7EventData||[];if(m.indexOf(o)<0&&m.unshift(o),T(r).is(a))i.apply(r,m);else{const g=T(r).parents();for(let _=0;_<g.length;_+=1)T(g[_]).is(a)&&i.apply(g[_],m)}}function d(o){const r=o&&o.target?o.target.dom7EventData||[]:[];r.indexOf(o)<0&&r.unshift(o),i.apply(this,r)}const p=n.split(" ");let c;for(let o=0;o<this.length;o+=1){const r=this[o];if(a)for(c=0;c<p.length;c+=1){const m=p[c];r.dom7LiveListeners||(r.dom7LiveListeners={}),r.dom7LiveListeners[m]||(r.dom7LiveListeners[m]=[]),r.dom7LiveListeners[m].push({listener:i,proxyListener:u}),r.addEventListener(m,u,l)}else for(c=0;c<p.length;c+=1){const m=p[c];r.dom7Listeners||(r.dom7Listeners={}),r.dom7Listeners[m]||(r.dom7Listeners[m]=[]),r.dom7Listeners[m].push({listener:i,proxyListener:d}),r.addEventListener(m,d,l)}}return this}function Ke(){for(var t=arguments.length,e=new Array(t),s=0;s<t;s++)e[s]=arguments[s];let[n,a,i,l]=e;typeof e[1]=="function"&&([n,i,l]=e,a=void 0),l||(l=!1);const u=n.split(" ");for(let d=0;d<u.length;d+=1){const p=u[d];for(let c=0;c<this.length;c+=1){const o=this[c];let r;if(!a&&o.dom7Listeners?r=o.dom7Listeners[p]:a&&o.dom7LiveListeners&&(r=o.dom7LiveListeners[p]),r&&r.length)for(let m=r.length-1;m>=0;m-=1){const g=r[m];i&&g.listener===i||i&&g.listener&&g.listener.dom7proxy&&g.listener.dom7proxy===i?(o.removeEventListener(p,g.proxyListener,l),r.splice(m,1)):i||(o.removeEventListener(p,g.proxyListener,l),r.splice(m,1))}}}return this}function Fe(){const t=R();for(var e=arguments.length,s=new Array(e),n=0;n<e;n++)s[n]=arguments[n];const a=s[0].split(" "),i=s[1];for(let l=0;l<a.length;l+=1){const u=a[l];for(let d=0;d<this.length;d+=1){const p=this[d];if(t.CustomEvent){const c=new t.CustomEvent(u,{detail:i,bubbles:!0,cancelable:!0});p.dom7EventData=s.filter((o,r)=>r>0),p.dispatchEvent(c),p.dom7EventData=[],delete p.dom7EventData}}}return this}function Ze(t){const e=this;function s(n){n.target===this&&(t.call(this,n),e.off("transitionend",s))}return t&&e.on("transitionend",s),this}function Je(t){if(this.length>0){if(t){const e=this.styles();return this[0].offsetWidth+parseFloat(e.getPropertyValue("margin-right"))+parseFloat(e.getPropertyValue("margin-left"))}return this[0].offsetWidth}return null}function Qe(t){if(this.length>0){if(t){const e=this.styles();return this[0].offsetHeight+parseFloat(e.getPropertyValue("margin-top"))+parseFloat(e.getPropertyValue("margin-bottom"))}return this[0].offsetHeight}return null}function et(){if(this.length>0){const t=R(),e=A(),s=this[0],n=s.getBoundingClientRect(),a=e.body,i=s.clientTop||a.clientTop||0,l=s.clientLeft||a.clientLeft||0,u=s===t?t.scrollY:s.scrollTop,d=s===t?t.scrollX:s.scrollLeft;return{top:n.top+u-i,left:n.left+d-l}}return null}function tt(){const t=R();return this[0]?t.getComputedStyle(this[0],null):{}}function st(t,e){const s=R();let n;if(arguments.length===1)if(typeof t=="string"){if(this[0])return s.getComputedStyle(this[0],null).getPropertyValue(t)}else{for(n=0;n<this.length;n+=1)for(const a in t)this[n].style[a]=t[a];return this}if(arguments.length===2&&typeof t=="string"){for(n=0;n<this.length;n+=1)this[n].style[t]=e;return this}return this}function nt(t){return t?(this.forEach((e,s)=>{t.apply(e,[e,s])}),this):this}function it(t){const e=Se(this,t);return T(e)}function at(t){if(typeof t>"u")return this[0]?this[0].innerHTML:null;for(let e=0;e<this.length;e+=1)this[e].innerHTML=t;return this}function rt(t){if(typeof t>"u")return this[0]?this[0].textContent.trim():null;for(let e=0;e<this.length;e+=1)this[e].textContent=t;return this}function ot(t){const e=R(),s=A(),n=this[0];let a,i;if(!n||typeof t>"u")return!1;if(typeof t=="string"){if(n.matches)return n.matches(t);if(n.webkitMatchesSelector)return n.webkitMatchesSelector(t);if(n.msMatchesSelector)return n.msMatchesSelector(t);for(a=T(t),i=0;i<a.length;i+=1)if(a[i]===n)return!0;return!1}if(t===s)return n===s;if(t===e)return n===e;if(t.nodeType||t instanceof K){for(a=t.nodeType?[t]:t,i=0;i<a.length;i+=1)if(a[i]===n)return!0;return!1}return!1}function lt(){let t=this[0],e;if(t){for(e=0;(t=t.previousSibling)!==null;)t.nodeType===1&&(e+=1);return e}}function ct(t){if(typeof t>"u")return this;const e=this.length;if(t>e-1)return T([]);if(t<0){const s=e+t;return s<0?T([]):T([this[s]])}return T([this[t]])}function dt(){let t;const e=A();for(let s=0;s<arguments.length;s+=1){t=s<0||arguments.length<=s?void 0:arguments[s];for(let n=0;n<this.length;n+=1)if(typeof t=="string"){const a=e.createElement("div");for(a.innerHTML=t;a.firstChild;)this[n].appendChild(a.firstChild)}else if(t instanceof K)for(let a=0;a<t.length;a+=1)this[n].appendChild(t[a]);else this[n].appendChild(t)}return this}function pt(t){const e=A();let s,n;for(s=0;s<this.length;s+=1)if(typeof t=="string"){const a=e.createElement("div");for(a.innerHTML=t,n=a.childNodes.length-1;n>=0;n-=1)this[s].insertBefore(a.childNodes[n],this[s].childNodes[0])}else if(t instanceof K)for(n=0;n<t.length;n+=1)this[s].insertBefore(t[n],this[s].childNodes[0]);else this[s].insertBefore(t,this[s].childNodes[0]);return this}function ut(t){return this.length>0?t?this[0].nextElementSibling&&T(this[0].nextElementSibling).is(t)?T([this[0].nextElementSibling]):T([]):this[0].nextElementSibling?T([this[0].nextElementSibling]):T([]):T([])}function ft(t){const e=[];let s=this[0];if(!s)return T([]);for(;s.nextElementSibling;){const n=s.nextElementSibling;t?T(n).is(t)&&e.push(n):e.push(n),s=n}return T(e)}function mt(t){if(this.length>0){const e=this[0];return t?e.previousElementSibling&&T(e.previousElementSibling).is(t)?T([e.previousElementSibling]):T([]):e.previousElementSibling?T([e.previousElementSibling]):T([])}return T([])}function ht(t){const e=[];let s=this[0];if(!s)return T([]);for(;s.previousElementSibling;){const n=s.previousElementSibling;t?T(n).is(t)&&e.push(n):e.push(n),s=n}return T(e)}function gt(t){const e=[];for(let s=0;s<this.length;s+=1)this[s].parentNode!==null&&(t?T(this[s].parentNode).is(t)&&e.push(this[s].parentNode):e.push(this[s].parentNode));return T(e)}function vt(t){const e=[];for(let s=0;s<this.length;s+=1){let n=this[s].parentNode;for(;n;)t?T(n).is(t)&&e.push(n):e.push(n),n=n.parentNode}return T(e)}function _t(t){let e=this;return typeof t>"u"?T([]):(e.is(t)||(e=e.parents(t).eq(0)),e)}function wt(t){const e=[];for(let s=0;s<this.length;s+=1){const n=this[s].querySelectorAll(t);for(let a=0;a<n.length;a+=1)e.push(n[a])}return T(e)}function bt(t){const e=[];for(let s=0;s<this.length;s+=1){const n=this[s].children;for(let a=0;a<n.length;a+=1)(!t||T(n[a]).is(t))&&e.push(n[a])}return T(e)}function Et(){for(let t=0;t<this.length;t+=1)this[t].parentNode&&this[t].parentNode.removeChild(this[t]);return this}const xe={addClass:He,removeClass:We,hasClass:qe,toggleClass:Ne,attr:Ye,removeAttr:Ge,transform:Ue,transition:Ve,on:Xe,off:Ke,trigger:Fe,transitionEnd:Ze,outerWidth:Je,outerHeight:Qe,styles:tt,offset:et,css:st,each:nt,html:at,text:rt,is:ot,index:lt,eq:ct,append:dt,prepend:pt,next:ut,nextAll:ft,prev:mt,prevAll:ht,parent:gt,parents:vt,closest:_t,find:wt,children:bt,filter:it,remove:Et};Object.keys(xe).forEach(t=>{Object.defineProperty(T.fn,t,{value:xe[t],writable:!0})});function yt(t){const e=t;Object.keys(e).forEach(s=>{try{e[s]=null}catch{}try{delete e[s]}catch{}})}function J(t,e){return e===void 0&&(e=0),setTimeout(t,e)}function U(){return Date.now()}function Mt(t){const e=R();let s;return e.getComputedStyle&&(s=e.getComputedStyle(t,null)),!s&&t.currentStyle&&(s=t.currentStyle),s||(s=t.style),s}function fe(t,e){e===void 0&&(e="x");const s=R();let n,a,i;const l=Mt(t);return s.WebKitCSSMatrix?(a=l.transform||l.webkitTransform,a.split(",").length>6&&(a=a.split(", ").map(u=>u.replace(",",".")).join(", ")),i=new s.WebKitCSSMatrix(a==="none"?"":a)):(i=l.MozTransform||l.OTransform||l.MsTransform||l.msTransform||l.transform||l.getPropertyValue("transform").replace("translate(","matrix(1, 0, 0, 1,"),n=i.toString().split(",")),e==="x"&&(s.WebKitCSSMatrix?a=i.m41:n.length===16?a=parseFloat(n[12]):a=parseFloat(n[4])),e==="y"&&(s.WebKitCSSMatrix?a=i.m42:n.length===16?a=parseFloat(n[13]):a=parseFloat(n[5])),a||0}function ne(t){return typeof t=="object"&&t!==null&&t.constructor&&Object.prototype.toString.call(t).slice(8,-1)==="Object"}function St(t){return typeof window<"u"&&typeof window.HTMLElement<"u"?t instanceof HTMLElement:t&&(t.nodeType===1||t.nodeType===11)}function V(){const t=Object(arguments.length<=0?void 0:arguments[0]),e=["__proto__","constructor","prototype"];for(let s=1;s<arguments.length;s+=1){const n=s<0||arguments.length<=s?void 0:arguments[s];if(n!=null&&!St(n)){const a=Object.keys(Object(n)).filter(i=>e.indexOf(i)<0);for(let i=0,l=a.length;i<l;i+=1){const u=a[i],d=Object.getOwnPropertyDescriptor(n,u);d!==void 0&&d.enumerable&&(ne(t[u])&&ne(n[u])?n[u].__swiper__?t[u]=n[u]:V(t[u],n[u]):!ne(t[u])&&ne(n[u])?(t[u]={},n[u].__swiper__?t[u]=n[u]:V(t[u],n[u])):t[u]=n[u])}}}return t}function ie(t,e,s){t.style.setProperty(e,s)}function Te(t){let{swiper:e,targetPosition:s,side:n}=t;const a=R(),i=-e.translate;let l=null,u;const d=e.params.speed;e.wrapperEl.style.scrollSnapType="none",a.cancelAnimationFrame(e.cssModeFrameID);const p=s>i?"next":"prev",c=(r,m)=>p==="next"&&r>=m||p==="prev"&&r<=m,o=()=>{u=new Date().getTime(),l===null&&(l=u);const r=Math.max(Math.min((u-l)/d,1),0),m=.5-Math.cos(r*Math.PI)/2;let g=i+m*(s-i);if(c(g,s)&&(g=s),e.wrapperEl.scrollTo({[n]:g}),c(g,s)){e.wrapperEl.style.overflow="hidden",e.wrapperEl.style.scrollSnapType="",setTimeout(()=>{e.wrapperEl.style.overflow="",e.wrapperEl.scrollTo({[n]:g})}),a.cancelAnimationFrame(e.cssModeFrameID);return}e.cssModeFrameID=a.requestAnimationFrame(o)};o()}let me;function xt(){const t=R(),e=A();return{smoothScroll:e.documentElement&&"scrollBehavior"in e.documentElement.style,touch:!!("ontouchstart"in t||t.DocumentTouch&&e instanceof t.DocumentTouch),passiveListener:function(){let n=!1;try{const a=Object.defineProperty({},"passive",{get(){n=!0}});t.addEventListener("testPassiveListener",null,a)}catch{}return n}(),gestures:function(){return"ongesturestart"in t}()}}function Ce(){return me||(me=xt()),me}let he;function Tt(t){let{userAgent:e}=t===void 0?{}:t;const s=Ce(),n=R(),a=n.navigator.platform,i=e||n.navigator.userAgent,l={ios:!1,android:!1},u=n.screen.width,d=n.screen.height,p=i.match(/(Android);?[\s\/]+([\d.]+)?/);let c=i.match(/(iPad).*OS\s([\d_]+)/);const o=i.match(/(iPod)(.*OS\s([\d_]+))?/),r=!c&&i.match(/(iPhone\sOS|iOS)\s([\d_]+)/),m=a==="Win32";let g=a==="MacIntel";const _=["1024x1366","1366x1024","834x1194","1194x834","834x1112","1112x834","768x1024","1024x768","820x1180","1180x820","810x1080","1080x810"];return!c&&g&&s.touch&&_.indexOf(`${u}x${d}`)>=0&&(c=i.match(/(Version)\/([\d.]+)/),c||(c=[0,1,"13_0_0"]),g=!1),p&&!m&&(l.os="android",l.android=!0),(c||r||o)&&(l.os="ios",l.ios=!0),l}function Ct(t){return t===void 0&&(t={}),he||(he=Tt(t)),he}let ge;function $t(){const t=R();function e(){const s=t.navigator.userAgent.toLowerCase();return s.indexOf("safari")>=0&&s.indexOf("chrome")<0&&s.indexOf("android")<0}return{isSafari:e(),isWebView:/(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(t.navigator.userAgent)}}function Pt(){return ge||(ge=$t()),ge}function kt(t){let{swiper:e,on:s,emit:n}=t;const a=R();let i=null,l=null;const u=()=>{!e||e.destroyed||!e.initialized||(n("beforeResize"),n("resize"))},d=()=>{!e||e.destroyed||!e.initialized||(i=new ResizeObserver(o=>{l=a.requestAnimationFrame(()=>{const{width:r,height:m}=e;let g=r,_=m;o.forEach(f=>{let{contentBoxSize:h,contentRect:b,target:v}=f;v&&v!==e.el||(g=b?b.width:(h[0]||h).inlineSize,_=b?b.height:(h[0]||h).blockSize)}),(g!==r||_!==m)&&u()})}),i.observe(e.el))},p=()=>{l&&a.cancelAnimationFrame(l),i&&i.unobserve&&e.el&&(i.unobserve(e.el),i=null)},c=()=>{!e||e.destroyed||!e.initialized||n("orientationchange")};s("init",()=>{if(e.params.resizeObserver&&typeof a.ResizeObserver<"u"){d();return}a.addEventListener("resize",u),a.addEventListener("orientationchange",c)}),s("destroy",()=>{p(),a.removeEventListener("resize",u),a.removeEventListener("orientationchange",c)})}function Ot(t){let{swiper:e,extendParams:s,on:n,emit:a}=t;const i=[],l=R(),u=function(c,o){o===void 0&&(o={});const r=l.MutationObserver||l.WebkitMutationObserver,m=new r(g=>{if(g.length===1){a("observerUpdate",g[0]);return}const _=function(){a("observerUpdate",g[0])};l.requestAnimationFrame?l.requestAnimationFrame(_):l.setTimeout(_,0)});m.observe(c,{attributes:typeof o.attributes>"u"?!0:o.attributes,childList:typeof o.childList>"u"?!0:o.childList,characterData:typeof o.characterData>"u"?!0:o.characterData}),i.push(m)},d=()=>{if(!!e.params.observer){if(e.params.observeParents){const c=e.$el.parents();for(let o=0;o<c.length;o+=1)u(c[o])}u(e.$el[0],{childList:e.params.observeSlideChildren}),u(e.$wrapperEl[0],{attributes:!1})}},p=()=>{i.forEach(c=>{c.disconnect()}),i.splice(0,i.length)};s({observer:!1,observeParents:!1,observeSlideChildren:!1}),n("init",d),n("destroy",p)}var Lt={on(t,e,s){const n=this;if(!n.eventsListeners||n.destroyed||typeof e!="function")return n;const a=s?"unshift":"push";return t.split(" ").forEach(i=>{n.eventsListeners[i]||(n.eventsListeners[i]=[]),n.eventsListeners[i][a](e)}),n},once(t,e,s){const n=this;if(!n.eventsListeners||n.destroyed||typeof e!="function")return n;function a(){n.off(t,a),a.__emitterProxy&&delete a.__emitterProxy;for(var i=arguments.length,l=new Array(i),u=0;u<i;u++)l[u]=arguments[u];e.apply(n,l)}return a.__emitterProxy=e,n.on(t,a,s)},onAny(t,e){const s=this;if(!s.eventsListeners||s.destroyed||typeof t!="function")return s;const n=e?"unshift":"push";return s.eventsAnyListeners.indexOf(t)<0&&s.eventsAnyListeners[n](t),s},offAny(t){const e=this;if(!e.eventsListeners||e.destroyed||!e.eventsAnyListeners)return e;const s=e.eventsAnyListeners.indexOf(t);return s>=0&&e.eventsAnyListeners.splice(s,1),e},off(t,e){const s=this;return!s.eventsListeners||s.destroyed||!s.eventsListeners||t.split(" ").forEach(n=>{typeof e>"u"?s.eventsListeners[n]=[]:s.eventsListeners[n]&&s.eventsListeners[n].forEach((a,i)=>{(a===e||a.__emitterProxy&&a.__emitterProxy===e)&&s.eventsListeners[n].splice(i,1)})}),s},emit(){const t=this;if(!t.eventsListeners||t.destroyed||!t.eventsListeners)return t;let e,s,n;for(var a=arguments.length,i=new Array(a),l=0;l<a;l++)i[l]=arguments[l];return typeof i[0]=="string"||Array.isArray(i[0])?(e=i[0],s=i.slice(1,i.length),n=t):(e=i[0].events,s=i[0].data,n=i[0].context||t),s.unshift(n),(Array.isArray(e)?e:e.split(" ")).forEach(d=>{t.eventsAnyListeners&&t.eventsAnyListeners.length&&t.eventsAnyListeners.forEach(p=>{p.apply(n,[d,...s])}),t.eventsListeners&&t.eventsListeners[d]&&t.eventsListeners[d].forEach(p=>{p.apply(n,s)})}),t}};function Dt(){const t=this;let e,s;const n=t.$el;typeof t.params.width<"u"&&t.params.width!==null?e=t.params.width:e=n[0].clientWidth,typeof t.params.height<"u"&&t.params.height!==null?s=t.params.height:s=n[0].clientHeight,!(e===0&&t.isHorizontal()||s===0&&t.isVertical())&&(e=e-parseInt(n.css("padding-left")||0,10)-parseInt(n.css("padding-right")||0,10),s=s-parseInt(n.css("padding-top")||0,10)-parseInt(n.css("padding-bottom")||0,10),Number.isNaN(e)&&(e=0),Number.isNaN(s)&&(s=0),Object.assign(t,{width:e,height:s,size:t.isHorizontal()?e:s}))}function It(){const t=this;function e(C){return t.isHorizontal()?C:{width:"height","margin-top":"margin-left","margin-bottom ":"margin-right","margin-left":"margin-top","margin-right":"margin-bottom","padding-left":"padding-top","padding-right":"padding-bottom",marginRight:"marginBottom"}[C]}function s(C,y){return parseFloat(C.getPropertyValue(e(y))||0)}const n=t.params,{$wrapperEl:a,size:i,rtlTranslate:l,wrongRTL:u}=t,d=t.virtual&&n.virtual.enabled,p=d?t.virtual.slides.length:t.slides.length,c=a.children(`.${t.params.slideClass}`),o=d?t.virtual.slides.length:c.length;let r=[];const m=[],g=[];let _=n.slidesOffsetBefore;typeof _=="function"&&(_=n.slidesOffsetBefore.call(t));let f=n.slidesOffsetAfter;typeof f=="function"&&(f=n.slidesOffsetAfter.call(t));const h=t.snapGrid.length,b=t.slidesGrid.length;let v=n.spaceBetween,E=-_,L=0,$=0;if(typeof i>"u")return;typeof v=="string"&&v.indexOf("%")>=0&&(v=parseFloat(v.replace("%",""))/100*i),t.virtualSize=-v,l?c.css({marginLeft:"",marginBottom:"",marginTop:""}):c.css({marginRight:"",marginBottom:"",marginTop:""}),n.centeredSlides&&n.cssMode&&(ie(t.wrapperEl,"--swiper-centered-offset-before",""),ie(t.wrapperEl,"--swiper-centered-offset-after",""));const k=n.grid&&n.grid.rows>1&&t.grid;k&&t.grid.initSlides(o);let S;const I=n.slidesPerView==="auto"&&n.breakpoints&&Object.keys(n.breakpoints).filter(C=>typeof n.breakpoints[C].slidesPerView<"u").length>0;for(let C=0;C<o;C+=1){S=0;const y=c.eq(C);if(k&&t.grid.updateSlide(C,y,o,e),y.css("display")!=="none"){if(n.slidesPerView==="auto"){I&&(c[C].style[e("width")]="");const w=getComputedStyle(y[0]),x=y[0].style.transform,P=y[0].style.webkitTransform;if(x&&(y[0].style.transform="none"),P&&(y[0].style.webkitTransform="none"),n.roundLengths)S=t.isHorizontal()?y.outerWidth(!0):y.outerHeight(!0);else{const z=s(w,"width"),j=s(w,"padding-left"),M=s(w,"padding-right"),D=s(w,"margin-left"),O=s(w,"margin-right"),B=w.getPropertyValue("box-sizing");if(B&&B==="border-box")S=z+D+O;else{const{clientWidth:W,offsetWidth:G}=y[0];S=z+j+M+D+O+(G-W)}}x&&(y[0].style.transform=x),P&&(y[0].style.webkitTransform=P),n.roundLengths&&(S=Math.floor(S))}else S=(i-(n.slidesPerView-1)*v)/n.slidesPerView,n.roundLengths&&(S=Math.floor(S)),c[C]&&(c[C].style[e("width")]=`${S}px`);c[C]&&(c[C].swiperSlideSize=S),g.push(S),n.centeredSlides?(E=E+S/2+L/2+v,L===0&&C!==0&&(E=E-i/2-v),C===0&&(E=E-i/2-v),Math.abs(E)<1/1e3&&(E=0),n.roundLengths&&(E=Math.floor(E)),$%n.slidesPerGroup===0&&r.push(E),m.push(E)):(n.roundLengths&&(E=Math.floor(E)),($-Math.min(t.params.slidesPerGroupSkip,$))%t.params.slidesPerGroup===0&&r.push(E),m.push(E),E=E+S+v),t.virtualSize+=S+v,L=S,$+=1}}if(t.virtualSize=Math.max(t.virtualSize,i)+f,l&&u&&(n.effect==="slide"||n.effect==="coverflow")&&a.css({width:`${t.virtualSize+n.spaceBetween}px`}),n.setWrapperSize&&a.css({[e("width")]:`${t.virtualSize+n.spaceBetween}px`}),k&&t.grid.updateWrapperSize(S,r,e),!n.centeredSlides){const C=[];for(let y=0;y<r.length;y+=1){let w=r[y];n.roundLengths&&(w=Math.floor(w)),r[y]<=t.virtualSize-i&&C.push(w)}r=C,Math.floor(t.virtualSize-i)-Math.floor(r[r.length-1])>1&&r.push(t.virtualSize-i)}if(r.length===0&&(r=[0]),n.spaceBetween!==0){const C=t.isHorizontal()&&l?"marginLeft":e("marginRight");c.filter((y,w)=>n.cssMode?w!==c.length-1:!0).css({[C]:`${v}px`})}if(n.centeredSlides&&n.centeredSlidesBounds){let C=0;g.forEach(w=>{C+=w+(n.spaceBetween?n.spaceBetween:0)}),C-=n.spaceBetween;const y=C-i;r=r.map(w=>w<0?-_:w>y?y+f:w)}if(n.centerInsufficientSlides){let C=0;if(g.forEach(y=>{C+=y+(n.spaceBetween?n.spaceBetween:0)}),C-=n.spaceBetween,C<i){const y=(i-C)/2;r.forEach((w,x)=>{r[x]=w-y}),m.forEach((w,x)=>{m[x]=w+y})}}if(Object.assign(t,{slides:c,snapGrid:r,slidesGrid:m,slidesSizesGrid:g}),n.centeredSlides&&n.cssMode&&!n.centeredSlidesBounds){ie(t.wrapperEl,"--swiper-centered-offset-before",`${-r[0]}px`),ie(t.wrapperEl,"--swiper-centered-offset-after",`${t.size/2-g[g.length-1]/2}px`);const C=-t.snapGrid[0],y=-t.slidesGrid[0];t.snapGrid=t.snapGrid.map(w=>w+C),t.slidesGrid=t.slidesGrid.map(w=>w+y)}if(o!==p&&t.emit("slidesLengthChange"),r.length!==h&&(t.params.watchOverflow&&t.checkOverflow(),t.emit("snapGridLengthChange")),m.length!==b&&t.emit("slidesGridLengthChange"),n.watchSlidesProgress&&t.updateSlidesOffset(),!d&&!n.cssMode&&(n.effect==="slide"||n.effect==="fade")){const C=`${n.containerModifierClass}backface-hidden`,y=t.$el.hasClass(C);o<=n.maxBackfaceHiddenSlides?y||t.$el.addClass(C):y&&t.$el.removeClass(C)}}function At(t){const e=this,s=[],n=e.virtual&&e.params.virtual.enabled;let a=0,i;typeof t=="number"?e.setTransition(t):t===!0&&e.setTransition(e.params.speed);const l=u=>n?e.slides.filter(d=>parseInt(d.getAttribute("data-swiper-slide-index"),10)===u)[0]:e.slides.eq(u)[0];if(e.params.slidesPerView!=="auto"&&e.params.slidesPerView>1)if(e.params.centeredSlides)(e.visibleSlides||T([])).each(u=>{s.push(u)});else for(i=0;i<Math.ceil(e.params.slidesPerView);i+=1){const u=e.activeIndex+i;if(u>e.slides.length&&!n)break;s.push(l(u))}else s.push(l(e.activeIndex));for(i=0;i<s.length;i+=1)if(typeof s[i]<"u"){const u=s[i].offsetHeight;a=u>a?u:a}(a||a===0)&&e.$wrapperEl.css("height",`${a}px`)}function jt(){const t=this,e=t.slides;for(let s=0;s<e.length;s+=1)e[s].swiperSlideOffset=t.isHorizontal()?e[s].offsetLeft:e[s].offsetTop}function zt(t){t===void 0&&(t=this&&this.translate||0);const e=this,s=e.params,{slides:n,rtlTranslate:a,snapGrid:i}=e;if(n.length===0)return;typeof n[0].swiperSlideOffset>"u"&&e.updateSlidesOffset();let l=-t;a&&(l=t),n.removeClass(s.slideVisibleClass),e.visibleSlidesIndexes=[],e.visibleSlides=[];for(let u=0;u<n.length;u+=1){const d=n[u];let p=d.swiperSlideOffset;s.cssMode&&s.centeredSlides&&(p-=n[0].swiperSlideOffset);const c=(l+(s.centeredSlides?e.minTranslate():0)-p)/(d.swiperSlideSize+s.spaceBetween),o=(l-i[0]+(s.centeredSlides?e.minTranslate():0)-p)/(d.swiperSlideSize+s.spaceBetween),r=-(l-p),m=r+e.slidesSizesGrid[u];(r>=0&&r<e.size-1||m>1&&m<=e.size||r<=0&&m>=e.size)&&(e.visibleSlides.push(d),e.visibleSlidesIndexes.push(u),n.eq(u).addClass(s.slideVisibleClass)),d.progress=a?-c:c,d.originalProgress=a?-o:o}e.visibleSlides=T(e.visibleSlides)}function Rt(t){const e=this;if(typeof t>"u"){const p=e.rtlTranslate?-1:1;t=e&&e.translate&&e.translate*p||0}const s=e.params,n=e.maxTranslate()-e.minTranslate();let{progress:a,isBeginning:i,isEnd:l}=e;const u=i,d=l;n===0?(a=0,i=!0,l=!0):(a=(t-e.minTranslate())/n,i=a<=0,l=a>=1),Object.assign(e,{progress:a,isBeginning:i,isEnd:l}),(s.watchSlidesProgress||s.centeredSlides&&s.autoHeight)&&e.updateSlidesProgress(t),i&&!u&&e.emit("reachBeginning toEdge"),l&&!d&&e.emit("reachEnd toEdge"),(u&&!i||d&&!l)&&e.emit("fromEdge"),e.emit("progress",a)}function Bt(){const t=this,{slides:e,params:s,$wrapperEl:n,activeIndex:a,realIndex:i}=t,l=t.virtual&&s.virtual.enabled;e.removeClass(`${s.slideActiveClass} ${s.slideNextClass} ${s.slidePrevClass} ${s.slideDuplicateActiveClass} ${s.slideDuplicateNextClass} ${s.slideDuplicatePrevClass}`);let u;l?u=t.$wrapperEl.find(`.${s.slideClass}[data-swiper-slide-index="${a}"]`):u=e.eq(a),u.addClass(s.slideActiveClass),s.loop&&(u.hasClass(s.slideDuplicateClass)?n.children(`.${s.slideClass}:not(.${s.slideDuplicateClass})[data-swiper-slide-index="${i}"]`).addClass(s.slideDuplicateActiveClass):n.children(`.${s.slideClass}.${s.slideDuplicateClass}[data-swiper-slide-index="${i}"]`).addClass(s.slideDuplicateActiveClass));let d=u.nextAll(`.${s.slideClass}`).eq(0).addClass(s.slideNextClass);s.loop&&d.length===0&&(d=e.eq(0),d.addClass(s.slideNextClass));let p=u.prevAll(`.${s.slideClass}`).eq(0).addClass(s.slidePrevClass);s.loop&&p.length===0&&(p=e.eq(-1),p.addClass(s.slidePrevClass)),s.loop&&(d.hasClass(s.slideDuplicateClass)?n.children(`.${s.slideClass}:not(.${s.slideDuplicateClass})[data-swiper-slide-index="${d.attr("data-swiper-slide-index")}"]`).addClass(s.slideDuplicateNextClass):n.children(`.${s.slideClass}.${s.slideDuplicateClass}[data-swiper-slide-index="${d.attr("data-swiper-slide-index")}"]`).addClass(s.slideDuplicateNextClass),p.hasClass(s.slideDuplicateClass)?n.children(`.${s.slideClass}:not(.${s.slideDuplicateClass})[data-swiper-slide-index="${p.attr("data-swiper-slide-index")}"]`).addClass(s.slideDuplicatePrevClass):n.children(`.${s.slideClass}.${s.slideDuplicateClass}[data-swiper-slide-index="${p.attr("data-swiper-slide-index")}"]`).addClass(s.slideDuplicatePrevClass)),t.emitSlidesClasses()}function Ht(t){const e=this,s=e.rtlTranslate?e.translate:-e.translate,{slidesGrid:n,snapGrid:a,params:i,activeIndex:l,realIndex:u,snapIndex:d}=e;let p=t,c;if(typeof p>"u"){for(let r=0;r<n.length;r+=1)typeof n[r+1]<"u"?s>=n[r]&&s<n[r+1]-(n[r+1]-n[r])/2?p=r:s>=n[r]&&s<n[r+1]&&(p=r+1):s>=n[r]&&(p=r);i.normalizeSlideIndex&&(p<0||typeof p>"u")&&(p=0)}if(a.indexOf(s)>=0)c=a.indexOf(s);else{const r=Math.min(i.slidesPerGroupSkip,p);c=r+Math.floor((p-r)/i.slidesPerGroup)}if(c>=a.length&&(c=a.length-1),p===l){c!==d&&(e.snapIndex=c,e.emit("snapIndexChange"));return}const o=parseInt(e.slides.eq(p).attr("data-swiper-slide-index")||p,10);Object.assign(e,{snapIndex:c,realIndex:o,previousIndex:l,activeIndex:p}),e.emit("activeIndexChange"),e.emit("snapIndexChange"),u!==o&&e.emit("realIndexChange"),(e.initialized||e.params.runCallbacksOnInit)&&e.emit("slideChange")}function Wt(t){const e=this,s=e.params,n=T(t).closest(`.${s.slideClass}`)[0];let a=!1,i;if(n){for(let l=0;l<e.slides.length;l+=1)if(e.slides[l]===n){a=!0,i=l;break}}if(n&&a)e.clickedSlide=n,e.virtual&&e.params.virtual.enabled?e.clickedIndex=parseInt(T(n).attr("data-swiper-slide-index"),10):e.clickedIndex=i;else{e.clickedSlide=void 0,e.clickedIndex=void 0;return}s.slideToClickedSlide&&e.clickedIndex!==void 0&&e.clickedIndex!==e.activeIndex&&e.slideToClickedSlide()}var Nt={updateSize:Dt,updateSlides:It,updateAutoHeight:At,updateSlidesOffset:jt,updateSlidesProgress:zt,updateProgress:Rt,updateSlidesClasses:Bt,updateActiveIndex:Ht,updateClickedSlide:Wt};function qt(t){t===void 0&&(t=this.isHorizontal()?"x":"y");const e=this,{params:s,rtlTranslate:n,translate:a,$wrapperEl:i}=e;if(s.virtualTranslate)return n?-a:a;if(s.cssMode)return a;let l=fe(i[0],t);return n&&(l=-l),l||0}function Yt(t,e){const s=this,{rtlTranslate:n,params:a,$wrapperEl:i,wrapperEl:l,progress:u}=s;let d=0,p=0;const c=0;s.isHorizontal()?d=n?-t:t:p=t,a.roundLengths&&(d=Math.floor(d),p=Math.floor(p)),a.cssMode?l[s.isHorizontal()?"scrollLeft":"scrollTop"]=s.isHorizontal()?-d:-p:a.virtualTranslate||i.transform(`translate3d(${d}px, ${p}px, ${c}px)`),s.previousTranslate=s.translate,s.translate=s.isHorizontal()?d:p;let o;const r=s.maxTranslate()-s.minTranslate();r===0?o=0:o=(t-s.minTranslate())/r,o!==u&&s.updateProgress(t),s.emit("setTranslate",s.translate,e)}function Gt(){return-this.snapGrid[0]}function Ut(){return-this.snapGrid[this.snapGrid.length-1]}function Vt(t,e,s,n,a){t===void 0&&(t=0),e===void 0&&(e=this.params.speed),s===void 0&&(s=!0),n===void 0&&(n=!0);const i=this,{params:l,wrapperEl:u}=i;if(i.animating&&l.preventInteractionOnTransition)return!1;const d=i.minTranslate(),p=i.maxTranslate();let c;if(n&&t>d?c=d:n&&t<p?c=p:c=t,i.updateProgress(c),l.cssMode){const o=i.isHorizontal();if(e===0)u[o?"scrollLeft":"scrollTop"]=-c;else{if(!i.support.smoothScroll)return Te({swiper:i,targetPosition:-c,side:o?"left":"top"}),!0;u.scrollTo({[o?"left":"top"]:-c,behavior:"smooth"})}return!0}return e===0?(i.setTransition(0),i.setTranslate(c),s&&(i.emit("beforeTransitionStart",e,a),i.emit("transitionEnd"))):(i.setTransition(e),i.setTranslate(c),s&&(i.emit("beforeTransitionStart",e,a),i.emit("transitionStart")),i.animating||(i.animating=!0,i.onTranslateToWrapperTransitionEnd||(i.onTranslateToWrapperTransitionEnd=function(r){!i||i.destroyed||r.target===this&&(i.$wrapperEl[0].removeEventListener("transitionend",i.onTranslateToWrapperTransitionEnd),i.$wrapperEl[0].removeEventListener("webkitTransitionEnd",i.onTranslateToWrapperTransitionEnd),i.onTranslateToWrapperTransitionEnd=null,delete i.onTranslateToWrapperTransitionEnd,s&&i.emit("transitionEnd"))}),i.$wrapperEl[0].addEventListener("transitionend",i.onTranslateToWrapperTransitionEnd),i.$wrapperEl[0].addEventListener("webkitTransitionEnd",i.onTranslateToWrapperTransitionEnd))),!0}var Xt={getTranslate:qt,setTranslate:Yt,minTranslate:Gt,maxTranslate:Ut,translateTo:Vt};function Kt(t,e){const s=this;s.params.cssMode||s.$wrapperEl.transition(t),s.emit("setTransition",t,e)}function $e(t){let{swiper:e,runCallbacks:s,direction:n,step:a}=t;const{activeIndex:i,previousIndex:l}=e;let u=n;if(u||(i>l?u="next":i<l?u="prev":u="reset"),e.emit(`transition${a}`),s&&i!==l){if(u==="reset"){e.emit(`slideResetTransition${a}`);return}e.emit(`slideChangeTransition${a}`),u==="next"?e.emit(`slideNextTransition${a}`):e.emit(`slidePrevTransition${a}`)}}function Ft(t,e){t===void 0&&(t=!0);const s=this,{params:n}=s;n.cssMode||(n.autoHeight&&s.updateAutoHeight(),$e({swiper:s,runCallbacks:t,direction:e,step:"Start"}))}function Zt(t,e){t===void 0&&(t=!0);const s=this,{params:n}=s;s.animating=!1,!n.cssMode&&(s.setTransition(0),$e({swiper:s,runCallbacks:t,direction:e,step:"End"}))}var Jt={setTransition:Kt,transitionStart:Ft,transitionEnd:Zt};function Qt(t,e,s,n,a){if(t===void 0&&(t=0),e===void 0&&(e=this.params.speed),s===void 0&&(s=!0),typeof t!="number"&&typeof t!="string")throw new Error(`The 'index' argument cannot have type other than 'number' or 'string'. [${typeof t}] given.`);if(typeof t=="string"){const v=parseInt(t,10);if(!isFinite(v))throw new Error(`The passed-in 'index' (string) couldn't be converted to 'number'. [${t}] given.`);t=v}const i=this;let l=t;l<0&&(l=0);const{params:u,snapGrid:d,slidesGrid:p,previousIndex:c,activeIndex:o,rtlTranslate:r,wrapperEl:m,enabled:g}=i;if(i.animating&&u.preventInteractionOnTransition||!g&&!n&&!a)return!1;const _=Math.min(i.params.slidesPerGroupSkip,l);let f=_+Math.floor((l-_)/i.params.slidesPerGroup);f>=d.length&&(f=d.length-1),(o||u.initialSlide||0)===(c||0)&&s&&i.emit("beforeSlideChangeStart");const h=-d[f];if(i.updateProgress(h),u.normalizeSlideIndex)for(let v=0;v<p.length;v+=1){const E=-Math.floor(h*100),L=Math.floor(p[v]*100),$=Math.floor(p[v+1]*100);typeof p[v+1]<"u"?E>=L&&E<$-($-L)/2?l=v:E>=L&&E<$&&(l=v+1):E>=L&&(l=v)}if(i.initialized&&l!==o&&(!i.allowSlideNext&&h<i.translate&&h<i.minTranslate()||!i.allowSlidePrev&&h>i.translate&&h>i.maxTranslate()&&(o||0)!==l))return!1;let b;if(l>o?b="next":l<o?b="prev":b="reset",r&&-h===i.translate||!r&&h===i.translate)return i.updateActiveIndex(l),u.autoHeight&&i.updateAutoHeight(),i.updateSlidesClasses(),u.effect!=="slide"&&i.setTranslate(h),b!=="reset"&&(i.transitionStart(s,b),i.transitionEnd(s,b)),!1;if(u.cssMode){const v=i.isHorizontal(),E=r?h:-h;if(e===0){const L=i.virtual&&i.params.virtual.enabled;L&&(i.wrapperEl.style.scrollSnapType="none",i._immediateVirtual=!0),m[v?"scrollLeft":"scrollTop"]=E,L&&requestAnimationFrame(()=>{i.wrapperEl.style.scrollSnapType="",i._swiperImmediateVirtual=!1})}else{if(!i.support.smoothScroll)return Te({swiper:i,targetPosition:E,side:v?"left":"top"}),!0;m.scrollTo({[v?"left":"top"]:E,behavior:"smooth"})}return!0}return i.setTransition(e),i.setTranslate(h),i.updateActiveIndex(l),i.updateSlidesClasses(),i.emit("beforeTransitionStart",e,n),i.transitionStart(s,b),e===0?i.transitionEnd(s,b):i.animating||(i.animating=!0,i.onSlideToWrapperTransitionEnd||(i.onSlideToWrapperTransitionEnd=function(E){!i||i.destroyed||E.target===this&&(i.$wrapperEl[0].removeEventListener("transitionend",i.onSlideToWrapperTransitionEnd),i.$wrapperEl[0].removeEventListener("webkitTransitionEnd",i.onSlideToWrapperTransitionEnd),i.onSlideToWrapperTransitionEnd=null,delete i.onSlideToWrapperTransitionEnd,i.transitionEnd(s,b))}),i.$wrapperEl[0].addEventListener("transitionend",i.onSlideToWrapperTransitionEnd),i.$wrapperEl[0].addEventListener("webkitTransitionEnd",i.onSlideToWrapperTransitionEnd)),!0}function es(t,e,s,n){if(t===void 0&&(t=0),e===void 0&&(e=this.params.speed),s===void 0&&(s=!0),typeof t=="string"){const l=parseInt(t,10);if(!isFinite(l))throw new Error(`The passed-in 'index' (string) couldn't be converted to 'number'. [${t}] given.`);t=l}const a=this;let i=t;return a.params.loop&&(i+=a.loopedSlides),a.slideTo(i,e,s,n)}function ts(t,e,s){t===void 0&&(t=this.params.speed),e===void 0&&(e=!0);const n=this,{animating:a,enabled:i,params:l}=n;if(!i)return n;let u=l.slidesPerGroup;l.slidesPerView==="auto"&&l.slidesPerGroup===1&&l.slidesPerGroupAuto&&(u=Math.max(n.slidesPerViewDynamic("current",!0),1));const d=n.activeIndex<l.slidesPerGroupSkip?1:u;if(l.loop){if(a&&l.loopPreventsSlide)return!1;n.loopFix(),n._clientLeft=n.$wrapperEl[0].clientLeft}return l.rewind&&n.isEnd?n.slideTo(0,t,e,s):n.slideTo(n.activeIndex+d,t,e,s)}function ss(t,e,s){t===void 0&&(t=this.params.speed),e===void 0&&(e=!0);const n=this,{params:a,animating:i,snapGrid:l,slidesGrid:u,rtlTranslate:d,enabled:p}=n;if(!p)return n;if(a.loop){if(i&&a.loopPreventsSlide)return!1;n.loopFix(),n._clientLeft=n.$wrapperEl[0].clientLeft}const c=d?n.translate:-n.translate;function o(f){return f<0?-Math.floor(Math.abs(f)):Math.floor(f)}const r=o(c),m=l.map(f=>o(f));let g=l[m.indexOf(r)-1];if(typeof g>"u"&&a.cssMode){let f;l.forEach((h,b)=>{r>=h&&(f=b)}),typeof f<"u"&&(g=l[f>0?f-1:f])}let _=0;if(typeof g<"u"&&(_=u.indexOf(g),_<0&&(_=n.activeIndex-1),a.slidesPerView==="auto"&&a.slidesPerGroup===1&&a.slidesPerGroupAuto&&(_=_-n.slidesPerViewDynamic("previous",!0)+1,_=Math.max(_,0))),a.rewind&&n.isBeginning){const f=n.params.virtual&&n.params.virtual.enabled&&n.virtual?n.virtual.slides.length-1:n.slides.length-1;return n.slideTo(f,t,e,s)}return n.slideTo(_,t,e,s)}function ns(t,e,s){t===void 0&&(t=this.params.speed),e===void 0&&(e=!0);const n=this;return n.slideTo(n.activeIndex,t,e,s)}function is(t,e,s,n){t===void 0&&(t=this.params.speed),e===void 0&&(e=!0),n===void 0&&(n=.5);const a=this;let i=a.activeIndex;const l=Math.min(a.params.slidesPerGroupSkip,i),u=l+Math.floor((i-l)/a.params.slidesPerGroup),d=a.rtlTranslate?a.translate:-a.translate;if(d>=a.snapGrid[u]){const p=a.snapGrid[u],c=a.snapGrid[u+1];d-p>(c-p)*n&&(i+=a.params.slidesPerGroup)}else{const p=a.snapGrid[u-1],c=a.snapGrid[u];d-p<=(c-p)*n&&(i-=a.params.slidesPerGroup)}return i=Math.max(i,0),i=Math.min(i,a.slidesGrid.length-1),a.slideTo(i,t,e,s)}function as(){const t=this,{params:e,$wrapperEl:s}=t,n=e.slidesPerView==="auto"?t.slidesPerViewDynamic():e.slidesPerView;let a=t.clickedIndex,i;if(e.loop){if(t.animating)return;i=parseInt(T(t.clickedSlide).attr("data-swiper-slide-index"),10),e.centeredSlides?a<t.loopedSlides-n/2||a>t.slides.length-t.loopedSlides+n/2?(t.loopFix(),a=s.children(`.${e.slideClass}[data-swiper-slide-index="${i}"]:not(.${e.slideDuplicateClass})`).eq(0).index(),J(()=>{t.slideTo(a)})):t.slideTo(a):a>t.slides.length-n?(t.loopFix(),a=s.children(`.${e.slideClass}[data-swiper-slide-index="${i}"]:not(.${e.slideDuplicateClass})`).eq(0).index(),J(()=>{t.slideTo(a)})):t.slideTo(a)}else t.slideTo(a)}var rs={slideTo:Qt,slideToLoop:es,slideNext:ts,slidePrev:ss,slideReset:ns,slideToClosest:is,slideToClickedSlide:as};function os(){const t=this,e=A(),{params:s,$wrapperEl:n}=t,a=n.children().length>0?T(n.children()[0].parentNode):n;a.children(`.${s.slideClass}.${s.slideDuplicateClass}`).remove();let i=a.children(`.${s.slideClass}`);if(s.loopFillGroupWithBlank){const d=s.slidesPerGroup-i.length%s.slidesPerGroup;if(d!==s.slidesPerGroup){for(let p=0;p<d;p+=1){const c=T(e.createElement("div")).addClass(`${s.slideClass} ${s.slideBlankClass}`);a.append(c)}i=a.children(`.${s.slideClass}`)}}s.slidesPerView==="auto"&&!s.loopedSlides&&(s.loopedSlides=i.length),t.loopedSlides=Math.ceil(parseFloat(s.loopedSlides||s.slidesPerView,10)),t.loopedSlides+=s.loopAdditionalSlides,t.loopedSlides>i.length&&(t.loopedSlides=i.length);const l=[],u=[];i.each((d,p)=>{const c=T(d);p<t.loopedSlides&&u.push(d),p<i.length&&p>=i.length-t.loopedSlides&&l.push(d),c.attr("data-swiper-slide-index",p)});for(let d=0;d<u.length;d+=1)a.append(T(u[d].cloneNode(!0)).addClass(s.slideDuplicateClass));for(let d=l.length-1;d>=0;d-=1)a.prepend(T(l[d].cloneNode(!0)).addClass(s.slideDuplicateClass))}function ls(){const t=this;t.emit("beforeLoopFix");const{activeIndex:e,slides:s,loopedSlides:n,allowSlidePrev:a,allowSlideNext:i,snapGrid:l,rtlTranslate:u}=t;let d;t.allowSlidePrev=!0,t.allowSlideNext=!0;const c=-l[e]-t.getTranslate();e<n?(d=s.length-n*3+e,d+=n,t.slideTo(d,0,!1,!0)&&c!==0&&t.setTranslate((u?-t.translate:t.translate)-c)):e>=s.length-n&&(d=-s.length+e+n,d+=n,t.slideTo(d,0,!1,!0)&&c!==0&&t.setTranslate((u?-t.translate:t.translate)-c)),t.allowSlidePrev=a,t.allowSlideNext=i,t.emit("loopFix")}function cs(){const t=this,{$wrapperEl:e,params:s,slides:n}=t;e.children(`.${s.slideClass}.${s.slideDuplicateClass},.${s.slideClass}.${s.slideBlankClass}`).remove(),n.removeAttr("data-swiper-slide-index")}var ds={loopCreate:os,loopFix:ls,loopDestroy:cs};function ps(t){const e=this;if(e.support.touch||!e.params.simulateTouch||e.params.watchOverflow&&e.isLocked||e.params.cssMode)return;const s=e.params.touchEventsTarget==="container"?e.el:e.wrapperEl;s.style.cursor="move",s.style.cursor=t?"grabbing":"grab"}function us(){const t=this;t.support.touch||t.params.watchOverflow&&t.isLocked||t.params.cssMode||(t[t.params.touchEventsTarget==="container"?"el":"wrapperEl"].style.cursor="")}var fs={setGrabCursor:ps,unsetGrabCursor:us};function ms(t,e){e===void 0&&(e=this);function s(n){if(!n||n===A()||n===R())return null;n.assignedSlot&&(n=n.assignedSlot);const a=n.closest(t);return!a&&!n.getRootNode?null:a||s(n.getRootNode().host)}return s(e)}function hs(t){const e=this,s=A(),n=R(),a=e.touchEventsData,{params:i,touches:l,enabled:u}=e;if(!u||e.animating&&i.preventInteractionOnTransition)return;!e.animating&&i.cssMode&&i.loop&&e.loopFix();let d=t;d.originalEvent&&(d=d.originalEvent);let p=T(d.target);if(i.touchEventsTarget==="wrapper"&&!p.closest(e.wrapperEl).length||(a.isTouchEvent=d.type==="touchstart",!a.isTouchEvent&&"which"in d&&d.which===3)||!a.isTouchEvent&&"button"in d&&d.button>0||a.isTouched&&a.isMoved)return;!!i.noSwipingClass&&i.noSwipingClass!==""&&d.target&&d.target.shadowRoot&&t.path&&t.path[0]&&(p=T(t.path[0]));const o=i.noSwipingSelector?i.noSwipingSelector:`.${i.noSwipingClass}`,r=!!(d.target&&d.target.shadowRoot);if(i.noSwiping&&(r?ms(o,p[0]):p.closest(o)[0])){e.allowClick=!0;return}if(i.swipeHandler&&!p.closest(i.swipeHandler)[0])return;l.currentX=d.type==="touchstart"?d.targetTouches[0].pageX:d.pageX,l.currentY=d.type==="touchstart"?d.targetTouches[0].pageY:d.pageY;const m=l.currentX,g=l.currentY,_=i.edgeSwipeDetection||i.iOSEdgeSwipeDetection,f=i.edgeSwipeThreshold||i.iOSEdgeSwipeThreshold;if(_&&(m<=f||m>=n.innerWidth-f))if(_==="prevent")t.preventDefault();else return;if(Object.assign(a,{isTouched:!0,isMoved:!1,allowTouchCallbacks:!0,isScrolling:void 0,startMoving:void 0}),l.startX=m,l.startY=g,a.touchStartTime=U(),e.allowClick=!0,e.updateSize(),e.swipeDirection=void 0,i.threshold>0&&(a.allowThresholdMove=!1),d.type!=="touchstart"){let h=!0;p.is(a.focusableElements)&&(h=!1,p[0].nodeName==="SELECT"&&(a.isTouched=!1)),s.activeElement&&T(s.activeElement).is(a.focusableElements)&&s.activeElement!==p[0]&&s.activeElement.blur();const b=h&&e.allowTouchMove&&i.touchStartPreventDefault;(i.touchStartForcePreventDefault||b)&&!p[0].isContentEditable&&d.preventDefault()}e.params.freeMode&&e.params.freeMode.enabled&&e.freeMode&&e.animating&&!i.cssMode&&e.freeMode.onTouchStart(),e.emit("touchStart",d)}function gs(t){const e=A(),s=this,n=s.touchEventsData,{params:a,touches:i,rtlTranslate:l,enabled:u}=s;if(!u)return;let d=t;if(d.originalEvent&&(d=d.originalEvent),!n.isTouched){n.startMoving&&n.isScrolling&&s.emit("touchMoveOpposite",d);return}if(n.isTouchEvent&&d.type!=="touchmove")return;const p=d.type==="touchmove"&&d.targetTouches&&(d.targetTouches[0]||d.changedTouches[0]),c=d.type==="touchmove"?p.pageX:d.pageX,o=d.type==="touchmove"?p.pageY:d.pageY;if(d.preventedByNestedSwiper){i.startX=c,i.startY=o;return}if(!s.allowTouchMove){T(d.target).is(n.focusableElements)||(s.allowClick=!1),n.isTouched&&(Object.assign(i,{startX:c,startY:o,currentX:c,currentY:o}),n.touchStartTime=U());return}if(n.isTouchEvent&&a.touchReleaseOnEdges&&!a.loop){if(s.isVertical()){if(o<i.startY&&s.translate<=s.maxTranslate()||o>i.startY&&s.translate>=s.minTranslate()){n.isTouched=!1,n.isMoved=!1;return}}else if(c<i.startX&&s.translate<=s.maxTranslate()||c>i.startX&&s.translate>=s.minTranslate())return}if(n.isTouchEvent&&e.activeElement&&d.target===e.activeElement&&T(d.target).is(n.focusableElements)){n.isMoved=!0,s.allowClick=!1;return}if(n.allowTouchCallbacks&&s.emit("touchMove",d),d.targetTouches&&d.targetTouches.length>1)return;i.currentX=c,i.currentY=o;const r=i.currentX-i.startX,m=i.currentY-i.startY;if(s.params.threshold&&Math.sqrt(r**2+m**2)<s.params.threshold)return;if(typeof n.isScrolling>"u"){let h;s.isHorizontal()&&i.currentY===i.startY||s.isVertical()&&i.currentX===i.startX?n.isScrolling=!1:r*r+m*m>=25&&(h=Math.atan2(Math.abs(m),Math.abs(r))*180/Math.PI,n.isScrolling=s.isHorizontal()?h>a.touchAngle:90-h>a.touchAngle)}if(n.isScrolling&&s.emit("touchMoveOpposite",d),typeof n.startMoving>"u"&&(i.currentX!==i.startX||i.currentY!==i.startY)&&(n.startMoving=!0),n.isScrolling){n.isTouched=!1;return}if(!n.startMoving)return;s.allowClick=!1,!a.cssMode&&d.cancelable&&d.preventDefault(),a.touchMoveStopPropagation&&!a.nested&&d.stopPropagation(),n.isMoved||(a.loop&&!a.cssMode&&s.loopFix(),n.startTranslate=s.getTranslate(),s.setTransition(0),s.animating&&s.$wrapperEl.trigger("webkitTransitionEnd transitionend"),n.allowMomentumBounce=!1,a.grabCursor&&(s.allowSlideNext===!0||s.allowSlidePrev===!0)&&s.setGrabCursor(!0),s.emit("sliderFirstMove",d)),s.emit("sliderMove",d),n.isMoved=!0;let g=s.isHorizontal()?r:m;i.diff=g,g*=a.touchRatio,l&&(g=-g),s.swipeDirection=g>0?"prev":"next",n.currentTranslate=g+n.startTranslate;let _=!0,f=a.resistanceRatio;if(a.touchReleaseOnEdges&&(f=0),g>0&&n.currentTranslate>s.minTranslate()?(_=!1,a.resistance&&(n.currentTranslate=s.minTranslate()-1+(-s.minTranslate()+n.startTranslate+g)**f)):g<0&&n.currentTranslate<s.maxTranslate()&&(_=!1,a.resistance&&(n.currentTranslate=s.maxTranslate()+1-(s.maxTranslate()-n.startTranslate-g)**f)),_&&(d.preventedByNestedSwiper=!0),!s.allowSlideNext&&s.swipeDirection==="next"&&n.currentTranslate<n.startTranslate&&(n.currentTranslate=n.startTranslate),!s.allowSlidePrev&&s.swipeDirection==="prev"&&n.currentTranslate>n.startTranslate&&(n.currentTranslate=n.startTranslate),!s.allowSlidePrev&&!s.allowSlideNext&&(n.currentTranslate=n.startTranslate),a.threshold>0)if(Math.abs(g)>a.threshold||n.allowThresholdMove){if(!n.allowThresholdMove){n.allowThresholdMove=!0,i.startX=i.currentX,i.startY=i.currentY,n.currentTranslate=n.startTranslate,i.diff=s.isHorizontal()?i.currentX-i.startX:i.currentY-i.startY;return}}else{n.currentTranslate=n.startTranslate;return}!a.followFinger||a.cssMode||((a.freeMode&&a.freeMode.enabled&&s.freeMode||a.watchSlidesProgress)&&(s.updateActiveIndex(),s.updateSlidesClasses()),s.params.freeMode&&a.freeMode.enabled&&s.freeMode&&s.freeMode.onTouchMove(),s.updateProgress(n.currentTranslate),s.setTranslate(n.currentTranslate))}function vs(t){const e=this,s=e.touchEventsData,{params:n,touches:a,rtlTranslate:i,slidesGrid:l,enabled:u}=e;if(!u)return;let d=t;if(d.originalEvent&&(d=d.originalEvent),s.allowTouchCallbacks&&e.emit("touchEnd",d),s.allowTouchCallbacks=!1,!s.isTouched){s.isMoved&&n.grabCursor&&e.setGrabCursor(!1),s.isMoved=!1,s.startMoving=!1;return}n.grabCursor&&s.isMoved&&s.isTouched&&(e.allowSlideNext===!0||e.allowSlidePrev===!0)&&e.setGrabCursor(!1);const p=U(),c=p-s.touchStartTime;if(e.allowClick){const b=d.path||d.composedPath&&d.composedPath();e.updateClickedSlide(b&&b[0]||d.target),e.emit("tap click",d),c<300&&p-s.lastClickTime<300&&e.emit("doubleTap doubleClick",d)}if(s.lastClickTime=U(),J(()=>{e.destroyed||(e.allowClick=!0)}),!s.isTouched||!s.isMoved||!e.swipeDirection||a.diff===0||s.currentTranslate===s.startTranslate){s.isTouched=!1,s.isMoved=!1,s.startMoving=!1;return}s.isTouched=!1,s.isMoved=!1,s.startMoving=!1;let o;if(n.followFinger?o=i?e.translate:-e.translate:o=-s.currentTranslate,n.cssMode)return;if(e.params.freeMode&&n.freeMode.enabled){e.freeMode.onTouchEnd({currentPos:o});return}let r=0,m=e.slidesSizesGrid[0];for(let b=0;b<l.length;b+=b<n.slidesPerGroupSkip?1:n.slidesPerGroup){const v=b<n.slidesPerGroupSkip-1?1:n.slidesPerGroup;typeof l[b+v]<"u"?o>=l[b]&&o<l[b+v]&&(r=b,m=l[b+v]-l[b]):o>=l[b]&&(r=b,m=l[l.length-1]-l[l.length-2])}let g=null,_=null;n.rewind&&(e.isBeginning?_=e.params.virtual&&e.params.virtual.enabled&&e.virtual?e.virtual.slides.length-1:e.slides.length-1:e.isEnd&&(g=0));const f=(o-l[r])/m,h=r<n.slidesPerGroupSkip-1?1:n.slidesPerGroup;if(c>n.longSwipesMs){if(!n.longSwipes){e.slideTo(e.activeIndex);return}e.swipeDirection==="next"&&(f>=n.longSwipesRatio?e.slideTo(n.rewind&&e.isEnd?g:r+h):e.slideTo(r)),e.swipeDirection==="prev"&&(f>1-n.longSwipesRatio?e.slideTo(r+h):_!==null&&f<0&&Math.abs(f)>n.longSwipesRatio?e.slideTo(_):e.slideTo(r))}else{if(!n.shortSwipes){e.slideTo(e.activeIndex);return}e.navigation&&(d.target===e.navigation.nextEl||d.target===e.navigation.prevEl)?d.target===e.navigation.nextEl?e.slideTo(r+h):e.slideTo(r):(e.swipeDirection==="next"&&e.slideTo(g!==null?g:r+h),e.swipeDirection==="prev"&&e.slideTo(_!==null?_:r))}}function Pe(){const t=this,{params:e,el:s}=t;if(s&&s.offsetWidth===0)return;e.breakpoints&&t.setBreakpoint();const{allowSlideNext:n,allowSlidePrev:a,snapGrid:i}=t;t.allowSlideNext=!0,t.allowSlidePrev=!0,t.updateSize(),t.updateSlides(),t.updateSlidesClasses(),(e.slidesPerView==="auto"||e.slidesPerView>1)&&t.isEnd&&!t.isBeginning&&!t.params.centeredSlides?t.slideTo(t.slides.length-1,0,!1,!0):t.slideTo(t.activeIndex,0,!1,!0),t.autoplay&&t.autoplay.running&&t.autoplay.paused&&t.autoplay.run(),t.allowSlidePrev=a,t.allowSlideNext=n,t.params.watchOverflow&&i!==t.snapGrid&&t.checkOverflow()}function _s(t){const e=this;!e.enabled||e.allowClick||(e.params.preventClicks&&t.preventDefault(),e.params.preventClicksPropagation&&e.animating&&(t.stopPropagation(),t.stopImmediatePropagation()))}function ws(){const t=this,{wrapperEl:e,rtlTranslate:s,enabled:n}=t;if(!n)return;t.previousTranslate=t.translate,t.isHorizontal()?t.translate=-e.scrollLeft:t.translate=-e.scrollTop,t.translate===0&&(t.translate=0),t.updateActiveIndex(),t.updateSlidesClasses();let a;const i=t.maxTranslate()-t.minTranslate();i===0?a=0:a=(t.translate-t.minTranslate())/i,a!==t.progress&&t.updateProgress(s?-t.translate:t.translate),t.emit("setTranslate",t.translate,!1)}let ke=!1;function bs(){}const Oe=(t,e)=>{const s=A(),{params:n,touchEvents:a,el:i,wrapperEl:l,device:u,support:d}=t,p=!!n.nested,c=e==="on"?"addEventListener":"removeEventListener",o=e;if(!d.touch)i[c](a.start,t.onTouchStart,!1),s[c](a.move,t.onTouchMove,p),s[c](a.end,t.onTouchEnd,!1);else{const r=a.start==="touchstart"&&d.passiveListener&&n.passiveListeners?{passive:!0,capture:!1}:!1;i[c](a.start,t.onTouchStart,r),i[c](a.move,t.onTouchMove,d.passiveListener?{passive:!1,capture:p}:p),i[c](a.end,t.onTouchEnd,r),a.cancel&&i[c](a.cancel,t.onTouchEnd,r)}(n.preventClicks||n.preventClicksPropagation)&&i[c]("click",t.onClick,!0),n.cssMode&&l[c]("scroll",t.onScroll),n.updateOnWindowResize?t[o](u.ios||u.android?"resize orientationchange observerUpdate":"resize observerUpdate",Pe,!0):t[o]("observerUpdate",Pe,!0)};function Es(){const t=this,e=A(),{params:s,support:n}=t;t.onTouchStart=hs.bind(t),t.onTouchMove=gs.bind(t),t.onTouchEnd=vs.bind(t),s.cssMode&&(t.onScroll=ws.bind(t)),t.onClick=_s.bind(t),n.touch&&!ke&&(e.addEventListener("touchstart",bs),ke=!0),Oe(t,"on")}function ys(){Oe(this,"off")}var Ms={attachEvents:Es,detachEvents:ys};const Le=(t,e)=>t.grid&&e.grid&&e.grid.rows>1;function Ss(){const t=this,{activeIndex:e,initialized:s,loopedSlides:n=0,params:a,$el:i}=t,l=a.breakpoints;if(!l||l&&Object.keys(l).length===0)return;const u=t.getBreakpoint(l,t.params.breakpointsBase,t.el);if(!u||t.currentBreakpoint===u)return;const p=(u in l?l[u]:void 0)||t.originalParams,c=Le(t,a),o=Le(t,p),r=a.enabled;c&&!o?(i.removeClass(`${a.containerModifierClass}grid ${a.containerModifierClass}grid-column`),t.emitContainerClasses()):!c&&o&&(i.addClass(`${a.containerModifierClass}grid`),(p.grid.fill&&p.grid.fill==="column"||!p.grid.fill&&a.grid.fill==="column")&&i.addClass(`${a.containerModifierClass}grid-column`),t.emitContainerClasses()),["navigation","pagination","scrollbar"].forEach(f=>{const h=a[f]&&a[f].enabled,b=p[f]&&p[f].enabled;h&&!b&&t[f].disable(),!h&&b&&t[f].enable()});const m=p.direction&&p.direction!==a.direction,g=a.loop&&(p.slidesPerView!==a.slidesPerView||m);m&&s&&t.changeDirection(),V(t.params,p);const _=t.params.enabled;Object.assign(t,{allowTouchMove:t.params.allowTouchMove,allowSlideNext:t.params.allowSlideNext,allowSlidePrev:t.params.allowSlidePrev}),r&&!_?t.disable():!r&&_&&t.enable(),t.currentBreakpoint=u,t.emit("_beforeBreakpoint",p),g&&s&&(t.loopDestroy(),t.loopCreate(),t.updateSlides(),t.slideTo(e-n+t.loopedSlides,0,!1)),t.emit("breakpoint",p)}function xs(t,e,s){if(e===void 0&&(e="window"),!t||e==="container"&&!s)return;let n=!1;const a=R(),i=e==="window"?a.innerHeight:s.clientHeight,l=Object.keys(t).map(u=>{if(typeof u=="string"&&u.indexOf("@")===0){const d=parseFloat(u.substr(1));return{value:i*d,point:u}}return{value:u,point:u}});l.sort((u,d)=>parseInt(u.value,10)-parseInt(d.value,10));for(let u=0;u<l.length;u+=1){const{point:d,value:p}=l[u];e==="window"?a.matchMedia(`(min-width: ${p}px)`).matches&&(n=d):p<=s.clientWidth&&(n=d)}return n||"max"}var Ts={setBreakpoint:Ss,getBreakpoint:xs};function Cs(t,e){const s=[];return t.forEach(n=>{typeof n=="object"?Object.keys(n).forEach(a=>{n[a]&&s.push(e+a)}):typeof n=="string"&&s.push(e+n)}),s}function $s(){const t=this,{classNames:e,params:s,rtl:n,$el:a,device:i,support:l}=t,u=Cs(["initialized",s.direction,{"pointer-events":!l.touch},{"free-mode":t.params.freeMode&&s.freeMode.enabled},{autoheight:s.autoHeight},{rtl:n},{grid:s.grid&&s.grid.rows>1},{"grid-column":s.grid&&s.grid.rows>1&&s.grid.fill==="column"},{android:i.android},{ios:i.ios},{"css-mode":s.cssMode},{centered:s.cssMode&&s.centeredSlides},{"watch-progress":s.watchSlidesProgress}],s.containerModifierClass);e.push(...u),a.addClass([...e].join(" ")),t.emitContainerClasses()}function Ps(){const t=this,{$el:e,classNames:s}=t;e.removeClass(s.join(" ")),t.emitContainerClasses()}var ks={addClasses:$s,removeClasses:Ps};function Os(t,e,s,n,a,i){const l=R();let u;function d(){i&&i()}!T(t).parent("picture")[0]&&(!t.complete||!a)&&e?(u=new l.Image,u.onload=d,u.onerror=d,n&&(u.sizes=n),s&&(u.srcset=s),e&&(u.src=e)):d()}function Ls(){const t=this;t.imagesToLoad=t.$el.find("img");function e(){typeof t>"u"||t===null||!t||t.destroyed||(t.imagesLoaded!==void 0&&(t.imagesLoaded+=1),t.imagesLoaded===t.imagesToLoad.length&&(t.params.updateOnImagesReady&&t.update(),t.emit("imagesReady")))}for(let s=0;s<t.imagesToLoad.length;s+=1){const n=t.imagesToLoad[s];t.loadImage(n,n.currentSrc||n.getAttribute("src"),n.srcset||n.getAttribute("srcset"),n.sizes||n.getAttribute("sizes"),!0,e)}}var Ds={loadImage:Os,preloadImages:Ls};function Is(){const t=this,{isLocked:e,params:s}=t,{slidesOffsetBefore:n}=s;if(n){const a=t.slides.length-1,i=t.slidesGrid[a]+t.slidesSizesGrid[a]+n*2;t.isLocked=t.size>i}else t.isLocked=t.snapGrid.length===1;s.allowSlideNext===!0&&(t.allowSlideNext=!t.isLocked),s.allowSlidePrev===!0&&(t.allowSlidePrev=!t.isLocked),e&&e!==t.isLocked&&(t.isEnd=!1),e!==t.isLocked&&t.emit(t.isLocked?"lock":"unlock")}var As={checkOverflow:Is},De={init:!0,direction:"horizontal",touchEventsTarget:"wrapper",initialSlide:0,speed:300,cssMode:!1,updateOnWindowResize:!0,resizeObserver:!0,nested:!1,createElements:!1,enabled:!0,focusableElements:"input, select, option, textarea, button, video, label",width:null,height:null,preventInteractionOnTransition:!1,userAgent:null,url:null,edgeSwipeDetection:!1,edgeSwipeThreshold:20,autoHeight:!1,setWrapperSize:!1,virtualTranslate:!1,effect:"slide",breakpoints:void 0,breakpointsBase:"window",spaceBetween:0,slidesPerView:1,slidesPerGroup:1,slidesPerGroupSkip:0,slidesPerGroupAuto:!1,centeredSlides:!1,centeredSlidesBounds:!1,slidesOffsetBefore:0,slidesOffsetAfter:0,normalizeSlideIndex:!0,centerInsufficientSlides:!1,watchOverflow:!0,roundLengths:!1,touchRatio:1,touchAngle:45,simulateTouch:!0,shortSwipes:!0,longSwipes:!0,longSwipesRatio:.5,longSwipesMs:300,followFinger:!0,allowTouchMove:!0,threshold:0,touchMoveStopPropagation:!1,touchStartPreventDefault:!0,touchStartForcePreventDefault:!1,touchReleaseOnEdges:!1,uniqueNavElements:!0,resistance:!0,resistanceRatio:.85,watchSlidesProgress:!1,grabCursor:!1,preventClicks:!0,preventClicksPropagation:!0,slideToClickedSlide:!1,preloadImages:!0,updateOnImagesReady:!0,loop:!1,loopAdditionalSlides:0,loopedSlides:null,loopFillGroupWithBlank:!1,loopPreventsSlide:!0,rewind:!1,allowSlidePrev:!0,allowSlideNext:!0,swipeHandler:null,noSwiping:!0,noSwipingClass:"swiper-no-swiping",noSwipingSelector:null,passiveListeners:!0,maxBackfaceHiddenSlides:10,containerModifierClass:"swiper-",slideClass:"swiper-slide",slideBlankClass:"swiper-slide-invisible-blank",slideActiveClass:"swiper-slide-active",slideDuplicateActiveClass:"swiper-slide-duplicate-active",slideVisibleClass:"swiper-slide-visible",slideDuplicateClass:"swiper-slide-duplicate",slideNextClass:"swiper-slide-next",slideDuplicateNextClass:"swiper-slide-duplicate-next",slidePrevClass:"swiper-slide-prev",slideDuplicatePrevClass:"swiper-slide-duplicate-prev",wrapperClass:"swiper-wrapper",runCallbacksOnInit:!0,_emitClasses:!1};function js(t,e){return function(n){n===void 0&&(n={});const a=Object.keys(n)[0],i=n[a];if(typeof i!="object"||i===null){V(e,n);return}if(["navigation","pagination","scrollbar"].indexOf(a)>=0&&t[a]===!0&&(t[a]={auto:!0}),!(a in t&&"enabled"in i)){V(e,n);return}t[a]===!0&&(t[a]={enabled:!0}),typeof t[a]=="object"&&!("enabled"in t[a])&&(t[a].enabled=!0),t[a]||(t[a]={enabled:!1}),V(e,n)}}const ve={eventsEmitter:Lt,update:Nt,translate:Xt,transition:Jt,slide:rs,loop:ds,grabCursor:fs,events:Ms,breakpoints:Ts,checkOverflow:As,classes:ks,images:Ds},_e={};class X{constructor(){let e,s;for(var n=arguments.length,a=new Array(n),i=0;i<n;i++)a[i]=arguments[i];if(a.length===1&&a[0].constructor&&Object.prototype.toString.call(a[0]).slice(8,-1)==="Object"?s=a[0]:[e,s]=a,s||(s={}),s=V({},s),e&&!s.el&&(s.el=e),s.el&&T(s.el).length>1){const p=[];return T(s.el).each(c=>{const o=V({},s,{el:c});p.push(new X(o))}),p}const l=this;l.__swiper__=!0,l.support=Ce(),l.device=Ct({userAgent:s.userAgent}),l.browser=Pt(),l.eventsListeners={},l.eventsAnyListeners=[],l.modules=[...l.__modules__],s.modules&&Array.isArray(s.modules)&&l.modules.push(...s.modules);const u={};l.modules.forEach(p=>{p({swiper:l,extendParams:js(s,u),on:l.on.bind(l),once:l.once.bind(l),off:l.off.bind(l),emit:l.emit.bind(l)})});const d=V({},De,u);return l.params=V({},d,_e,s),l.originalParams=V({},l.params),l.passedParams=V({},s),l.params&&l.params.on&&Object.keys(l.params.on).forEach(p=>{l.on(p,l.params.on[p])}),l.params&&l.params.onAny&&l.onAny(l.params.onAny),l.$=T,Object.assign(l,{enabled:l.params.enabled,el:e,classNames:[],slides:T(),slidesGrid:[],snapGrid:[],slidesSizesGrid:[],isHorizontal(){return l.params.direction==="horizontal"},isVertical(){return l.params.direction==="vertical"},activeIndex:0,realIndex:0,isBeginning:!0,isEnd:!1,translate:0,previousTranslate:0,progress:0,velocity:0,animating:!1,allowSlideNext:l.params.allowSlideNext,allowSlidePrev:l.params.allowSlidePrev,touchEvents:function(){const c=["touchstart","touchmove","touchend","touchcancel"],o=["pointerdown","pointermove","pointerup"];return l.touchEventsTouch={start:c[0],move:c[1],end:c[2],cancel:c[3]},l.touchEventsDesktop={start:o[0],move:o[1],end:o[2]},l.support.touch||!l.params.simulateTouch?l.touchEventsTouch:l.touchEventsDesktop}(),touchEventsData:{isTouched:void 0,isMoved:void 0,allowTouchCallbacks:void 0,touchStartTime:void 0,isScrolling:void 0,currentTranslate:void 0,startTranslate:void 0,allowThresholdMove:void 0,focusableElements:l.params.focusableElements,lastClickTime:U(),clickTimeout:void 0,velocities:[],allowMomentumBounce:void 0,isTouchEvent:void 0,startMoving:void 0},allowClick:!0,allowTouchMove:l.params.allowTouchMove,touches:{startX:0,startY:0,currentX:0,currentY:0,diff:0},imagesToLoad:[],imagesLoaded:0}),l.emit("_swiper"),l.params.init&&l.init(),l}enable(){const e=this;e.enabled||(e.enabled=!0,e.params.grabCursor&&e.setGrabCursor(),e.emit("enable"))}disable(){const e=this;!e.enabled||(e.enabled=!1,e.params.grabCursor&&e.unsetGrabCursor(),e.emit("disable"))}setProgress(e,s){const n=this;e=Math.min(Math.max(e,0),1);const a=n.minTranslate(),l=(n.maxTranslate()-a)*e+a;n.translateTo(l,typeof s>"u"?0:s),n.updateActiveIndex(),n.updateSlidesClasses()}emitContainerClasses(){const e=this;if(!e.params._emitClasses||!e.el)return;const s=e.el.className.split(" ").filter(n=>n.indexOf("swiper")===0||n.indexOf(e.params.containerModifierClass)===0);e.emit("_containerClasses",s.join(" "))}getSlideClasses(e){const s=this;return s.destroyed?"":e.className.split(" ").filter(n=>n.indexOf("swiper-slide")===0||n.indexOf(s.params.slideClass)===0).join(" ")}emitSlidesClasses(){const e=this;if(!e.params._emitClasses||!e.el)return;const s=[];e.slides.each(n=>{const a=e.getSlideClasses(n);s.push({slideEl:n,classNames:a}),e.emit("_slideClass",n,a)}),e.emit("_slideClasses",s)}slidesPerViewDynamic(e,s){e===void 0&&(e="current"),s===void 0&&(s=!1);const n=this,{params:a,slides:i,slidesGrid:l,slidesSizesGrid:u,size:d,activeIndex:p}=n;let c=1;if(a.centeredSlides){let o=i[p].swiperSlideSize,r;for(let m=p+1;m<i.length;m+=1)i[m]&&!r&&(o+=i[m].swiperSlideSize,c+=1,o>d&&(r=!0));for(let m=p-1;m>=0;m-=1)i[m]&&!r&&(o+=i[m].swiperSlideSize,c+=1,o>d&&(r=!0))}else if(e==="current")for(let o=p+1;o<i.length;o+=1)(s?l[o]+u[o]-l[p]<d:l[o]-l[p]<d)&&(c+=1);else for(let o=p-1;o>=0;o-=1)l[p]-l[o]<d&&(c+=1);return c}update(){const e=this;if(!e||e.destroyed)return;const{snapGrid:s,params:n}=e;n.breakpoints&&e.setBreakpoint(),e.updateSize(),e.updateSlides(),e.updateProgress(),e.updateSlidesClasses();function a(){const l=e.rtlTranslate?e.translate*-1:e.translate,u=Math.min(Math.max(l,e.maxTranslate()),e.minTranslate());e.setTranslate(u),e.updateActiveIndex(),e.updateSlidesClasses()}let i;e.params.freeMode&&e.params.freeMode.enabled?(a(),e.params.autoHeight&&e.updateAutoHeight()):((e.params.slidesPerView==="auto"||e.params.slidesPerView>1)&&e.isEnd&&!e.params.centeredSlides?i=e.slideTo(e.slides.length-1,0,!1,!0):i=e.slideTo(e.activeIndex,0,!1,!0),i||a()),n.watchOverflow&&s!==e.snapGrid&&e.checkOverflow(),e.emit("update")}changeDirection(e,s){s===void 0&&(s=!0);const n=this,a=n.params.direction;return e||(e=a==="horizontal"?"vertical":"horizontal"),e===a||e!=="horizontal"&&e!=="vertical"||(n.$el.removeClass(`${n.params.containerModifierClass}${a}`).addClass(`${n.params.containerModifierClass}${e}`),n.emitContainerClasses(),n.params.direction=e,n.slides.each(i=>{e==="vertical"?i.style.width="":i.style.height=""}),n.emit("changeDirection"),s&&n.update()),n}changeLanguageDirection(e){const s=this;s.rtl&&e==="rtl"||!s.rtl&&e==="ltr"||(s.rtl=e==="rtl",s.rtlTranslate=s.params.direction==="horizontal"&&s.rtl,s.rtl?(s.$el.addClass(`${s.params.containerModifierClass}rtl`),s.el.dir="rtl"):(s.$el.removeClass(`${s.params.containerModifierClass}rtl`),s.el.dir="ltr"),s.update())}mount(e){const s=this;if(s.mounted)return!0;const n=T(e||s.params.el);if(e=n[0],!e)return!1;e.swiper=s;const a=()=>`.${(s.params.wrapperClass||"").trim().split(" ").join(".")}`;let l=(()=>{if(e&&e.shadowRoot&&e.shadowRoot.querySelector){const u=T(e.shadowRoot.querySelector(a()));return u.children=d=>n.children(d),u}return n.children?n.children(a()):T(n).children(a())})();if(l.length===0&&s.params.createElements){const d=A().createElement("div");l=T(d),d.className=s.params.wrapperClass,n.append(d),n.children(`.${s.params.slideClass}`).each(p=>{l.append(p)})}return Object.assign(s,{$el:n,el:e,$wrapperEl:l,wrapperEl:l[0],mounted:!0,rtl:e.dir.toLowerCase()==="rtl"||n.css("direction")==="rtl",rtlTranslate:s.params.direction==="horizontal"&&(e.dir.toLowerCase()==="rtl"||n.css("direction")==="rtl"),wrongRTL:l.css("display")==="-webkit-box"}),!0}init(e){const s=this;return s.initialized||s.mount(e)===!1||(s.emit("beforeInit"),s.params.breakpoints&&s.setBreakpoint(),s.addClasses(),s.params.loop&&s.loopCreate(),s.updateSize(),s.updateSlides(),s.params.watchOverflow&&s.checkOverflow(),s.params.grabCursor&&s.enabled&&s.setGrabCursor(),s.params.preloadImages&&s.preloadImages(),s.params.loop?s.slideTo(s.params.initialSlide+s.loopedSlides,0,s.params.runCallbacksOnInit,!1,!0):s.slideTo(s.params.initialSlide,0,s.params.runCallbacksOnInit,!1,!0),s.attachEvents(),s.initialized=!0,s.emit("init"),s.emit("afterInit")),s}destroy(e,s){e===void 0&&(e=!0),s===void 0&&(s=!0);const n=this,{params:a,$el:i,$wrapperEl:l,slides:u}=n;return typeof n.params>"u"||n.destroyed||(n.emit("beforeDestroy"),n.initialized=!1,n.detachEvents(),a.loop&&n.loopDestroy(),s&&(n.removeClasses(),i.removeAttr("style"),l.removeAttr("style"),u&&u.length&&u.removeClass([a.slideVisibleClass,a.slideActiveClass,a.slideNextClass,a.slidePrevClass].join(" ")).removeAttr("style").removeAttr("data-swiper-slide-index")),n.emit("destroy"),Object.keys(n.eventsListeners).forEach(d=>{n.off(d)}),e!==!1&&(n.$el[0].swiper=null,yt(n)),n.destroyed=!0),null}static extendDefaults(e){V(_e,e)}static get extendedDefaults(){return _e}static get defaults(){return De}static installModule(e){X.prototype.__modules__||(X.prototype.__modules__=[]);const s=X.prototype.__modules__;typeof e=="function"&&s.indexOf(e)<0&&s.push(e)}static use(e){return Array.isArray(e)?(e.forEach(s=>X.installModule(s)),X):(X.installModule(e),X)}}Object.keys(ve).forEach(t=>{Object.keys(ve[t]).forEach(e=>{X.prototype[e]=ve[t][e]})}),X.use([kt,Ot]);function zs(t){let{swiper:e,extendParams:s,on:n,emit:a}=t;s({virtual:{enabled:!1,slides:[],cache:!0,renderSlide:null,renderExternal:null,renderExternalUpdate:!0,addSlidesBefore:0,addSlidesAfter:0}});let i;e.virtual={cache:{},from:void 0,to:void 0,slides:[],offset:0,slidesGrid:[]};function l(r,m){const g=e.params.virtual;if(g.cache&&e.virtual.cache[m])return e.virtual.cache[m];const _=g.renderSlide?T(g.renderSlide.call(e,r,m)):T(`<div class="${e.params.slideClass}" data-swiper-slide-index="${m}">${r}</div>`);return _.attr("data-swiper-slide-index")||_.attr("data-swiper-slide-index",m),g.cache&&(e.virtual.cache[m]=_),_}function u(r){const{slidesPerView:m,slidesPerGroup:g,centeredSlides:_}=e.params,{addSlidesBefore:f,addSlidesAfter:h}=e.params.virtual,{from:b,to:v,slides:E,slidesGrid:L,offset:$}=e.virtual;e.params.cssMode||e.updateActiveIndex();const k=e.activeIndex||0;let S;e.rtlTranslate?S="right":S=e.isHorizontal()?"left":"top";let I,C;_?(I=Math.floor(m/2)+g+h,C=Math.floor(m/2)+g+f):(I=m+(g-1)+h,C=g+f);const y=Math.max((k||0)-C,0),w=Math.min((k||0)+I,E.length-1),x=(e.slidesGrid[y]||0)-(e.slidesGrid[0]||0);Object.assign(e.virtual,{from:y,to:w,offset:x,slidesGrid:e.slidesGrid});function P(){e.updateSlides(),e.updateProgress(),e.updateSlidesClasses(),e.lazy&&e.params.lazy.enabled&&e.lazy.load(),a("virtualUpdate")}if(b===y&&v===w&&!r){e.slidesGrid!==L&&x!==$&&e.slides.css(S,`${x}px`),e.updateProgress(),a("virtualUpdate");return}if(e.params.virtual.renderExternal){e.params.virtual.renderExternal.call(e,{offset:x,from:y,to:w,slides:function(){const D=[];for(let O=y;O<=w;O+=1)D.push(E[O]);return D}()}),e.params.virtual.renderExternalUpdate?P():a("virtualUpdate");return}const z=[],j=[];if(r)e.$wrapperEl.find(`.${e.params.slideClass}`).remove();else for(let M=b;M<=v;M+=1)(M<y||M>w)&&e.$wrapperEl.find(`.${e.params.slideClass}[data-swiper-slide-index="${M}"]`).remove();for(let M=0;M<E.length;M+=1)M>=y&&M<=w&&(typeof v>"u"||r?j.push(M):(M>v&&j.push(M),M<b&&z.push(M)));j.forEach(M=>{e.$wrapperEl.append(l(E[M],M))}),z.sort((M,D)=>D-M).forEach(M=>{e.$wrapperEl.prepend(l(E[M],M))}),e.$wrapperEl.children(".swiper-slide").css(S,`${x}px`),P()}function d(r){if(typeof r=="object"&&"length"in r)for(let m=0;m<r.length;m+=1)r[m]&&e.virtual.slides.push(r[m]);else e.virtual.slides.push(r);u(!0)}function p(r){const m=e.activeIndex;let g=m+1,_=1;if(Array.isArray(r)){for(let f=0;f<r.length;f+=1)r[f]&&e.virtual.slides.unshift(r[f]);g=m+r.length,_=r.length}else e.virtual.slides.unshift(r);if(e.params.virtual.cache){const f=e.virtual.cache,h={};Object.keys(f).forEach(b=>{const v=f[b],E=v.attr("data-swiper-slide-index");E&&v.attr("data-swiper-slide-index",parseInt(E,10)+_),h[parseInt(b,10)+_]=v}),e.virtual.cache=h}u(!0),e.slideTo(g,0)}function c(r){if(typeof r>"u"||r===null)return;let m=e.activeIndex;if(Array.isArray(r))for(let g=r.length-1;g>=0;g-=1)e.virtual.slides.splice(r[g],1),e.params.virtual.cache&&delete e.virtual.cache[r[g]],r[g]<m&&(m-=1),m=Math.max(m,0);else e.virtual.slides.splice(r,1),e.params.virtual.cache&&delete e.virtual.cache[r],r<m&&(m-=1),m=Math.max(m,0);u(!0),e.slideTo(m,0)}function o(){e.virtual.slides=[],e.params.virtual.cache&&(e.virtual.cache={}),u(!0),e.slideTo(0,0)}n("beforeInit",()=>{!e.params.virtual.enabled||(e.virtual.slides=e.params.virtual.slides,e.classNames.push(`${e.params.containerModifierClass}virtual`),e.params.watchSlidesProgress=!0,e.originalParams.watchSlidesProgress=!0,e.params.initialSlide||u())}),n("setTranslate",()=>{!e.params.virtual.enabled||(e.params.cssMode&&!e._immediateVirtual?(clearTimeout(i),i=setTimeout(()=>{u()},100)):u())}),n("init update resize",()=>{!e.params.virtual.enabled||e.params.cssMode&&ie(e.wrapperEl,"--swiper-virtual-size",`${e.virtualSize}px`)}),Object.assign(e.virtual,{appendSlide:d,prependSlide:p,removeSlide:c,removeAllSlides:o,update:u})}function Rs(t){let{swiper:e,extendParams:s,on:n,emit:a}=t;const i=A(),l=R();e.keyboard={enabled:!1},s({keyboard:{enabled:!1,onlyInViewport:!0,pageUpDown:!0}});function u(c){if(!e.enabled)return;const{rtlTranslate:o}=e;let r=c;r.originalEvent&&(r=r.originalEvent);const m=r.keyCode||r.charCode,g=e.params.keyboard.pageUpDown,_=g&&m===33,f=g&&m===34,h=m===37,b=m===39,v=m===38,E=m===40;if(!e.allowSlideNext&&(e.isHorizontal()&&b||e.isVertical()&&E||f)||!e.allowSlidePrev&&(e.isHorizontal()&&h||e.isVertical()&&v||_))return!1;if(!(r.shiftKey||r.altKey||r.ctrlKey||r.metaKey)&&!(i.activeElement&&i.activeElement.nodeName&&(i.activeElement.nodeName.toLowerCase()==="input"||i.activeElement.nodeName.toLowerCase()==="textarea"))){if(e.params.keyboard.onlyInViewport&&(_||f||h||b||v||E)){let L=!1;if(e.$el.parents(`.${e.params.slideClass}`).length>0&&e.$el.parents(`.${e.params.slideActiveClass}`).length===0)return;const $=e.$el,k=$[0].clientWidth,S=$[0].clientHeight,I=l.innerWidth,C=l.innerHeight,y=e.$el.offset();o&&(y.left-=e.$el[0].scrollLeft);const w=[[y.left,y.top],[y.left+k,y.top],[y.left,y.top+S],[y.left+k,y.top+S]];for(let x=0;x<w.length;x+=1){const P=w[x];if(P[0]>=0&&P[0]<=I&&P[1]>=0&&P[1]<=C){if(P[0]===0&&P[1]===0)continue;L=!0}}if(!L)return}e.isHorizontal()?((_||f||h||b)&&(r.preventDefault?r.preventDefault():r.returnValue=!1),((f||b)&&!o||(_||h)&&o)&&e.slideNext(),((_||h)&&!o||(f||b)&&o)&&e.slidePrev()):((_||f||v||E)&&(r.preventDefault?r.preventDefault():r.returnValue=!1),(f||E)&&e.slideNext(),(_||v)&&e.slidePrev()),a("keyPress",m)}}function d(){e.keyboard.enabled||(T(i).on("keydown",u),e.keyboard.enabled=!0)}function p(){!e.keyboard.enabled||(T(i).off("keydown",u),e.keyboard.enabled=!1)}n("init",()=>{e.params.keyboard.enabled&&d()}),n("destroy",()=>{e.keyboard.enabled&&p()}),Object.assign(e.keyboard,{enable:d,disable:p})}function Bs(t){let{swiper:e,extendParams:s,on:n,emit:a}=t;const i=R();s({mousewheel:{enabled:!1,releaseOnEdges:!1,invert:!1,forceToAxis:!1,sensitivity:1,eventsTarget:"container",thresholdDelta:null,thresholdTime:null}}),e.mousewheel={enabled:!1};let l,u=U(),d;const p=[];function c(v){let k=0,S=0,I=0,C=0;return"detail"in v&&(S=v.detail),"wheelDelta"in v&&(S=-v.wheelDelta/120),"wheelDeltaY"in v&&(S=-v.wheelDeltaY/120),"wheelDeltaX"in v&&(k=-v.wheelDeltaX/120),"axis"in v&&v.axis===v.HORIZONTAL_AXIS&&(k=S,S=0),I=k*10,C=S*10,"deltaY"in v&&(C=v.deltaY),"deltaX"in v&&(I=v.deltaX),v.shiftKey&&!I&&(I=C,C=0),(I||C)&&v.deltaMode&&(v.deltaMode===1?(I*=40,C*=40):(I*=800,C*=800)),I&&!k&&(k=I<1?-1:1),C&&!S&&(S=C<1?-1:1),{spinX:k,spinY:S,pixelX:I,pixelY:C}}function o(){!e.enabled||(e.mouseEntered=!0)}function r(){!e.enabled||(e.mouseEntered=!1)}function m(v){return e.params.mousewheel.thresholdDelta&&v.delta<e.params.mousewheel.thresholdDelta||e.params.mousewheel.thresholdTime&&U()-u<e.params.mousewheel.thresholdTime?!1:v.delta>=6&&U()-u<60?!0:(v.direction<0?(!e.isEnd||e.params.loop)&&!e.animating&&(e.slideNext(),a("scroll",v.raw)):(!e.isBeginning||e.params.loop)&&!e.animating&&(e.slidePrev(),a("scroll",v.raw)),u=new i.Date().getTime(),!1)}function g(v){const E=e.params.mousewheel;if(v.direction<0){if(e.isEnd&&!e.params.loop&&E.releaseOnEdges)return!0}else if(e.isBeginning&&!e.params.loop&&E.releaseOnEdges)return!0;return!1}function _(v){let E=v,L=!0;if(!e.enabled)return;const $=e.params.mousewheel;e.params.cssMode&&E.preventDefault();let k=e.$el;if(e.params.mousewheel.eventsTarget!=="container"&&(k=T(e.params.mousewheel.eventsTarget)),!e.mouseEntered&&!k[0].contains(E.target)&&!$.releaseOnEdges)return!0;E.originalEvent&&(E=E.originalEvent);let S=0;const I=e.rtlTranslate?-1:1,C=c(E);if($.forceToAxis)if(e.isHorizontal())if(Math.abs(C.pixelX)>Math.abs(C.pixelY))S=-C.pixelX*I;else return!0;else if(Math.abs(C.pixelY)>Math.abs(C.pixelX))S=-C.pixelY;else return!0;else S=Math.abs(C.pixelX)>Math.abs(C.pixelY)?-C.pixelX*I:-C.pixelY;if(S===0)return!0;$.invert&&(S=-S);let y=e.getTranslate()+S*$.sensitivity;if(y>=e.minTranslate()&&(y=e.minTranslate()),y<=e.maxTranslate()&&(y=e.maxTranslate()),L=e.params.loop?!0:!(y===e.minTranslate()||y===e.maxTranslate()),L&&e.params.nested&&E.stopPropagation(),!e.params.freeMode||!e.params.freeMode.enabled){const w={time:U(),delta:Math.abs(S),direction:Math.sign(S),raw:v};p.length>=2&&p.shift();const x=p.length?p[p.length-1]:void 0;if(p.push(w),x?(w.direction!==x.direction||w.delta>x.delta||w.time>x.time+150)&&m(w):m(w),g(w))return!0}else{const w={time:U(),delta:Math.abs(S),direction:Math.sign(S)},x=d&&w.time<d.time+500&&w.delta<=d.delta&&w.direction===d.direction;if(!x){d=void 0,e.params.loop&&e.loopFix();let P=e.getTranslate()+S*$.sensitivity;const z=e.isBeginning,j=e.isEnd;if(P>=e.minTranslate()&&(P=e.minTranslate()),P<=e.maxTranslate()&&(P=e.maxTranslate()),e.setTransition(0),e.setTranslate(P),e.updateProgress(),e.updateActiveIndex(),e.updateSlidesClasses(),(!z&&e.isBeginning||!j&&e.isEnd)&&e.updateSlidesClasses(),e.params.freeMode.sticky){clearTimeout(l),l=void 0,p.length>=15&&p.shift();const M=p.length?p[p.length-1]:void 0,D=p[0];if(p.push(w),M&&(w.delta>M.delta||w.direction!==M.direction))p.splice(0);else if(p.length>=15&&w.time-D.time<500&&D.delta-w.delta>=1&&w.delta<=6){const O=S>0?.8:.2;d=w,p.splice(0),l=J(()=>{e.slideToClosest(e.params.speed,!0,void 0,O)},0)}l||(l=J(()=>{d=w,p.splice(0),e.slideToClosest(e.params.speed,!0,void 0,.5)},500))}if(x||a("scroll",E),e.params.autoplay&&e.params.autoplayDisableOnInteraction&&e.autoplay.stop(),P===e.minTranslate()||P===e.maxTranslate())return!0}}return E.preventDefault?E.preventDefault():E.returnValue=!1,!1}function f(v){let E=e.$el;e.params.mousewheel.eventsTarget!=="container"&&(E=T(e.params.mousewheel.eventsTarget)),E[v]("mouseenter",o),E[v]("mouseleave",r),E[v]("wheel",_)}function h(){return e.params.cssMode?(e.wrapperEl.removeEventListener("wheel",_),!0):e.mousewheel.enabled?!1:(f("on"),e.mousewheel.enabled=!0,!0)}function b(){return e.params.cssMode?(e.wrapperEl.addEventListener(event,_),!0):e.mousewheel.enabled?(f("off"),e.mousewheel.enabled=!1,!0):!1}n("init",()=>{!e.params.mousewheel.enabled&&e.params.cssMode&&b(),e.params.mousewheel.enabled&&h()}),n("destroy",()=>{e.params.cssMode&&h(),e.mousewheel.enabled&&b()}),Object.assign(e.mousewheel,{enable:h,disable:b})}function we(t,e,s,n){const a=A();return t.params.createElements&&Object.keys(n).forEach(i=>{if(!s[i]&&s.auto===!0){let l=t.$el.children(`.${n[i]}`)[0];l||(l=a.createElement("div"),l.className=n[i],t.$el.append(l)),s[i]=l,e[i]=l}}),s}function Hs(t){let{swiper:e,extendParams:s,on:n,emit:a}=t;s({navigation:{nextEl:null,prevEl:null,hideOnClick:!1,disabledClass:"swiper-button-disabled",hiddenClass:"swiper-button-hidden",lockClass:"swiper-button-lock",navigationDisabledClass:"swiper-navigation-disabled"}}),e.navigation={nextEl:null,$nextEl:null,prevEl:null,$prevEl:null};function i(g){let _;return g&&(_=T(g),e.params.uniqueNavElements&&typeof g=="string"&&_.length>1&&e.$el.find(g).length===1&&(_=e.$el.find(g))),_}function l(g,_){const f=e.params.navigation;g&&g.length>0&&(g[_?"addClass":"removeClass"](f.disabledClass),g[0]&&g[0].tagName==="BUTTON"&&(g[0].disabled=_),e.params.watchOverflow&&e.enabled&&g[e.isLocked?"addClass":"removeClass"](f.lockClass))}function u(){if(e.params.loop)return;const{$nextEl:g,$prevEl:_}=e.navigation;l(_,e.isBeginning&&!e.params.rewind),l(g,e.isEnd&&!e.params.rewind)}function d(g){g.preventDefault(),!(e.isBeginning&&!e.params.loop&&!e.params.rewind)&&(e.slidePrev(),a("navigationPrev"))}function p(g){g.preventDefault(),!(e.isEnd&&!e.params.loop&&!e.params.rewind)&&(e.slideNext(),a("navigationNext"))}function c(){const g=e.params.navigation;if(e.params.navigation=we(e,e.originalParams.navigation,e.params.navigation,{nextEl:"swiper-button-next",prevEl:"swiper-button-prev"}),!(g.nextEl||g.prevEl))return;const _=i(g.nextEl),f=i(g.prevEl);_&&_.length>0&&_.on("click",p),f&&f.length>0&&f.on("click",d),Object.assign(e.navigation,{$nextEl:_,nextEl:_&&_[0],$prevEl:f,prevEl:f&&f[0]}),e.enabled||(_&&_.addClass(g.lockClass),f&&f.addClass(g.lockClass))}function o(){const{$nextEl:g,$prevEl:_}=e.navigation;g&&g.length&&(g.off("click",p),g.removeClass(e.params.navigation.disabledClass)),_&&_.length&&(_.off("click",d),_.removeClass(e.params.navigation.disabledClass))}n("init",()=>{e.params.navigation.enabled===!1?m():(c(),u())}),n("toEdge fromEdge lock unlock",()=>{u()}),n("destroy",()=>{o()}),n("enable disable",()=>{const{$nextEl:g,$prevEl:_}=e.navigation;g&&g[e.enabled?"removeClass":"addClass"](e.params.navigation.lockClass),_&&_[e.enabled?"removeClass":"addClass"](e.params.navigation.lockClass)}),n("click",(g,_)=>{const{$nextEl:f,$prevEl:h}=e.navigation,b=_.target;if(e.params.navigation.hideOnClick&&!T(b).is(h)&&!T(b).is(f)){if(e.pagination&&e.params.pagination&&e.params.pagination.clickable&&(e.pagination.el===b||e.pagination.el.contains(b)))return;let v;f?v=f.hasClass(e.params.navigation.hiddenClass):h&&(v=h.hasClass(e.params.navigation.hiddenClass)),a(v===!0?"navigationShow":"navigationHide"),f&&f.toggleClass(e.params.navigation.hiddenClass),h&&h.toggleClass(e.params.navigation.hiddenClass)}});const r=()=>{e.$el.removeClass(e.params.navigation.navigationDisabledClass),c(),u()},m=()=>{e.$el.addClass(e.params.navigation.navigationDisabledClass),o()};Object.assign(e.navigation,{enable:r,disable:m,update:u,init:c,destroy:o})}function F(t){return t===void 0&&(t=""),`.${t.trim().replace(/([\.:!\/])/g,"\\$1").replace(/ /g,".")}`}function Ws(t){let{swiper:e,extendParams:s,on:n,emit:a}=t;const i="swiper-pagination";s({pagination:{el:null,bulletElement:"span",clickable:!1,hideOnClick:!1,renderBullet:null,renderProgressbar:null,renderFraction:null,renderCustom:null,progressbarOpposite:!1,type:"bullets",dynamicBullets:!1,dynamicMainBullets:1,formatFractionCurrent:f=>f,formatFractionTotal:f=>f,bulletClass:`${i}-bullet`,bulletActiveClass:`${i}-bullet-active`,modifierClass:`${i}-`,currentClass:`${i}-current`,totalClass:`${i}-total`,hiddenClass:`${i}-hidden`,progressbarFillClass:`${i}-progressbar-fill`,progressbarOppositeClass:`${i}-progressbar-opposite`,clickableClass:`${i}-clickable`,lockClass:`${i}-lock`,horizontalClass:`${i}-horizontal`,verticalClass:`${i}-vertical`,paginationDisabledClass:`${i}-disabled`}}),e.pagination={el:null,$el:null,bullets:[]};let l,u=0;function d(){return!e.params.pagination.el||!e.pagination.el||!e.pagination.$el||e.pagination.$el.length===0}function p(f,h){const{bulletActiveClass:b}=e.params.pagination;f[h]().addClass(`${b}-${h}`)[h]().addClass(`${b}-${h}-${h}`)}function c(){const f=e.rtl,h=e.params.pagination;if(d())return;const b=e.virtual&&e.params.virtual.enabled?e.virtual.slides.length:e.slides.length,v=e.pagination.$el;let E;const L=e.params.loop?Math.ceil((b-e.loopedSlides*2)/e.params.slidesPerGroup):e.snapGrid.length;if(e.params.loop?(E=Math.ceil((e.activeIndex-e.loopedSlides)/e.params.slidesPerGroup),E>b-1-e.loopedSlides*2&&(E-=b-e.loopedSlides*2),E>L-1&&(E-=L),E<0&&e.params.paginationType!=="bullets"&&(E=L+E)):typeof e.snapIndex<"u"?E=e.snapIndex:E=e.activeIndex||0,h.type==="bullets"&&e.pagination.bullets&&e.pagination.bullets.length>0){const $=e.pagination.bullets;let k,S,I;if(h.dynamicBullets&&(l=$.eq(0)[e.isHorizontal()?"outerWidth":"outerHeight"](!0),v.css(e.isHorizontal()?"width":"height",`${l*(h.dynamicMainBullets+4)}px`),h.dynamicMainBullets>1&&e.previousIndex!==void 0&&(u+=E-(e.previousIndex-e.loopedSlides||0),u>h.dynamicMainBullets-1?u=h.dynamicMainBullets-1:u<0&&(u=0)),k=Math.max(E-u,0),S=k+(Math.min($.length,h.dynamicMainBullets)-1),I=(S+k)/2),$.removeClass(["","-next","-next-next","-prev","-prev-prev","-main"].map(C=>`${h.bulletActiveClass}${C}`).join(" ")),v.length>1)$.each(C=>{const y=T(C),w=y.index();w===E&&y.addClass(h.bulletActiveClass),h.dynamicBullets&&(w>=k&&w<=S&&y.addClass(`${h.bulletActiveClass}-main`),w===k&&p(y,"prev"),w===S&&p(y,"next"))});else{const C=$.eq(E),y=C.index();if(C.addClass(h.bulletActiveClass),h.dynamicBullets){const w=$.eq(k),x=$.eq(S);for(let P=k;P<=S;P+=1)$.eq(P).addClass(`${h.bulletActiveClass}-main`);if(e.params.loop)if(y>=$.length){for(let P=h.dynamicMainBullets;P>=0;P-=1)$.eq($.length-P).addClass(`${h.bulletActiveClass}-main`);$.eq($.length-h.dynamicMainBullets-1).addClass(`${h.bulletActiveClass}-prev`)}else p(w,"prev"),p(x,"next");else p(w,"prev"),p(x,"next")}}if(h.dynamicBullets){const C=Math.min($.length,h.dynamicMainBullets+4),y=(l*C-l)/2-I*l,w=f?"right":"left";$.css(e.isHorizontal()?w:"top",`${y}px`)}}if(h.type==="fraction"&&(v.find(F(h.currentClass)).text(h.formatFractionCurrent(E+1)),v.find(F(h.totalClass)).text(h.formatFractionTotal(L))),h.type==="progressbar"){let $;h.progressbarOpposite?$=e.isHorizontal()?"vertical":"horizontal":$=e.isHorizontal()?"horizontal":"vertical";const k=(E+1)/L;let S=1,I=1;$==="horizontal"?S=k:I=k,v.find(F(h.progressbarFillClass)).transform(`translate3d(0,0,0) scaleX(${S}) scaleY(${I})`).transition(e.params.speed)}h.type==="custom"&&h.renderCustom?(v.html(h.renderCustom(e,E+1,L)),a("paginationRender",v[0])):a("paginationUpdate",v[0]),e.params.watchOverflow&&e.enabled&&v[e.isLocked?"addClass":"removeClass"](h.lockClass)}function o(){const f=e.params.pagination;if(d())return;const h=e.virtual&&e.params.virtual.enabled?e.virtual.slides.length:e.slides.length,b=e.pagination.$el;let v="";if(f.type==="bullets"){let E=e.params.loop?Math.ceil((h-e.loopedSlides*2)/e.params.slidesPerGroup):e.snapGrid.length;e.params.freeMode&&e.params.freeMode.enabled&&!e.params.loop&&E>h&&(E=h);for(let L=0;L<E;L+=1)f.renderBullet?v+=f.renderBullet.call(e,L,f.bulletClass):v+=`<${f.bulletElement} class="${f.bulletClass}"></${f.bulletElement}>`;b.html(v),e.pagination.bullets=b.find(F(f.bulletClass))}f.type==="fraction"&&(f.renderFraction?v=f.renderFraction.call(e,f.currentClass,f.totalClass):v=`<span class="${f.currentClass}"></span> / <span class="${f.totalClass}"></span>`,b.html(v)),f.type==="progressbar"&&(f.renderProgressbar?v=f.renderProgressbar.call(e,f.progressbarFillClass):v=`<span class="${f.progressbarFillClass}"></span>`,b.html(v)),f.type!=="custom"&&a("paginationRender",e.pagination.$el[0])}function r(){e.params.pagination=we(e,e.originalParams.pagination,e.params.pagination,{el:"swiper-pagination"});const f=e.params.pagination;if(!f.el)return;let h=T(f.el);h.length!==0&&(e.params.uniqueNavElements&&typeof f.el=="string"&&h.length>1&&(h=e.$el.find(f.el),h.length>1&&(h=h.filter(b=>T(b).parents(".swiper")[0]===e.el))),f.type==="bullets"&&f.clickable&&h.addClass(f.clickableClass),h.addClass(f.modifierClass+f.type),h.addClass(e.isHorizontal()?f.horizontalClass:f.verticalClass),f.type==="bullets"&&f.dynamicBullets&&(h.addClass(`${f.modifierClass}${f.type}-dynamic`),u=0,f.dynamicMainBullets<1&&(f.dynamicMainBullets=1)),f.type==="progressbar"&&f.progressbarOpposite&&h.addClass(f.progressbarOppositeClass),f.clickable&&h.on("click",F(f.bulletClass),function(v){v.preventDefault();let E=T(this).index()*e.params.slidesPerGroup;e.params.loop&&(E+=e.loopedSlides),e.slideTo(E)}),Object.assign(e.pagination,{$el:h,el:h[0]}),e.enabled||h.addClass(f.lockClass))}function m(){const f=e.params.pagination;if(d())return;const h=e.pagination.$el;h.removeClass(f.hiddenClass),h.removeClass(f.modifierClass+f.type),h.removeClass(e.isHorizontal()?f.horizontalClass:f.verticalClass),e.pagination.bullets&&e.pagination.bullets.removeClass&&e.pagination.bullets.removeClass(f.bulletActiveClass),f.clickable&&h.off("click",F(f.bulletClass))}n("init",()=>{e.params.pagination.enabled===!1?_():(r(),o(),c())}),n("activeIndexChange",()=>{(e.params.loop||typeof e.snapIndex>"u")&&c()}),n("snapIndexChange",()=>{e.params.loop||c()}),n("slidesLengthChange",()=>{e.params.loop&&(o(),c())}),n("snapGridLengthChange",()=>{e.params.loop||(o(),c())}),n("destroy",()=>{m()}),n("enable disable",()=>{const{$el:f}=e.pagination;f&&f[e.enabled?"removeClass":"addClass"](e.params.pagination.lockClass)}),n("lock unlock",()=>{c()}),n("click",(f,h)=>{const b=h.target,{$el:v}=e.pagination;if(e.params.pagination.el&&e.params.pagination.hideOnClick&&v&&v.length>0&&!T(b).hasClass(e.params.pagination.bulletClass)){if(e.navigation&&(e.navigation.nextEl&&b===e.navigation.nextEl||e.navigation.prevEl&&b===e.navigation.prevEl))return;const E=v.hasClass(e.params.pagination.hiddenClass);a(E===!0?"paginationShow":"paginationHide"),v.toggleClass(e.params.pagination.hiddenClass)}});const g=()=>{e.$el.removeClass(e.params.pagination.paginationDisabledClass),e.pagination.$el&&e.pagination.$el.removeClass(e.params.pagination.paginationDisabledClass),r(),o(),c()},_=()=>{e.$el.addClass(e.params.pagination.paginationDisabledClass),e.pagination.$el&&e.pagination.$el.addClass(e.params.pagination.paginationDisabledClass),m()};Object.assign(e.pagination,{enable:g,disable:_,render:o,update:c,init:r,destroy:m})}function Ns(t){let{swiper:e,extendParams:s,on:n,emit:a}=t;const i=A();let l=!1,u=null,d=null,p,c,o,r;s({scrollbar:{el:null,dragSize:"auto",hide:!1,draggable:!1,snapOnRelease:!0,lockClass:"swiper-scrollbar-lock",dragClass:"swiper-scrollbar-drag",scrollbarDisabledClass:"swiper-scrollbar-disabled",horizontalClass:"swiper-scrollbar-horizontal",verticalClass:"swiper-scrollbar-vertical"}}),e.scrollbar={el:null,dragEl:null,$el:null,$dragEl:null};function m(){if(!e.params.scrollbar.el||!e.scrollbar.el)return;const{scrollbar:w,rtlTranslate:x,progress:P}=e,{$dragEl:z,$el:j}=w,M=e.params.scrollbar;let D=c,O=(o-c)*P;x?(O=-O,O>0?(D=c-O,O=0):-O+c>o&&(D=o+O)):O<0?(D=c+O,O=0):O+c>o&&(D=o-O),e.isHorizontal()?(z.transform(`translate3d(${O}px, 0, 0)`),z[0].style.width=`${D}px`):(z.transform(`translate3d(0px, ${O}px, 0)`),z[0].style.height=`${D}px`),M.hide&&(clearTimeout(u),j[0].style.opacity=1,u=setTimeout(()=>{j[0].style.opacity=0,j.transition(400)},1e3))}function g(w){!e.params.scrollbar.el||!e.scrollbar.el||e.scrollbar.$dragEl.transition(w)}function _(){if(!e.params.scrollbar.el||!e.scrollbar.el)return;const{scrollbar:w}=e,{$dragEl:x,$el:P}=w;x[0].style.width="",x[0].style.height="",o=e.isHorizontal()?P[0].offsetWidth:P[0].offsetHeight,r=e.size/(e.virtualSize+e.params.slidesOffsetBefore-(e.params.centeredSlides?e.snapGrid[0]:0)),e.params.scrollbar.dragSize==="auto"?c=o*r:c=parseInt(e.params.scrollbar.dragSize,10),e.isHorizontal()?x[0].style.width=`${c}px`:x[0].style.height=`${c}px`,r>=1?P[0].style.display="none":P[0].style.display="",e.params.scrollbar.hide&&(P[0].style.opacity=0),e.params.watchOverflow&&e.enabled&&w.$el[e.isLocked?"addClass":"removeClass"](e.params.scrollbar.lockClass)}function f(w){return e.isHorizontal()?w.type==="touchstart"||w.type==="touchmove"?w.targetTouches[0].clientX:w.clientX:w.type==="touchstart"||w.type==="touchmove"?w.targetTouches[0].clientY:w.clientY}function h(w){const{scrollbar:x,rtlTranslate:P}=e,{$el:z}=x;let j;j=(f(w)-z.offset()[e.isHorizontal()?"left":"top"]-(p!==null?p:c/2))/(o-c),j=Math.max(Math.min(j,1),0),P&&(j=1-j);const M=e.minTranslate()+(e.maxTranslate()-e.minTranslate())*j;e.updateProgress(M),e.setTranslate(M),e.updateActiveIndex(),e.updateSlidesClasses()}function b(w){const x=e.params.scrollbar,{scrollbar:P,$wrapperEl:z}=e,{$el:j,$dragEl:M}=P;l=!0,p=w.target===M[0]||w.target===M?f(w)-w.target.getBoundingClientRect()[e.isHorizontal()?"left":"top"]:null,w.preventDefault(),w.stopPropagation(),z.transition(100),M.transition(100),h(w),clearTimeout(d),j.transition(0),x.hide&&j.css("opacity",1),e.params.cssMode&&e.$wrapperEl.css("scroll-snap-type","none"),a("scrollbarDragStart",w)}function v(w){const{scrollbar:x,$wrapperEl:P}=e,{$el:z,$dragEl:j}=x;!l||(w.preventDefault?w.preventDefault():w.returnValue=!1,h(w),P.transition(0),z.transition(0),j.transition(0),a("scrollbarDragMove",w))}function E(w){const x=e.params.scrollbar,{scrollbar:P,$wrapperEl:z}=e,{$el:j}=P;!l||(l=!1,e.params.cssMode&&(e.$wrapperEl.css("scroll-snap-type",""),z.transition("")),x.hide&&(clearTimeout(d),d=J(()=>{j.css("opacity",0),j.transition(400)},1e3)),a("scrollbarDragEnd",w),x.snapOnRelease&&e.slideToClosest())}function L(w){const{scrollbar:x,touchEventsTouch:P,touchEventsDesktop:z,params:j,support:M}=e,D=x.$el;if(!D)return;const O=D[0],B=M.passiveListener&&j.passiveListeners?{passive:!1,capture:!1}:!1,W=M.passiveListener&&j.passiveListeners?{passive:!0,capture:!1}:!1;if(!O)return;const G=w==="on"?"addEventListener":"removeEventListener";M.touch?(O[G](P.start,b,B),O[G](P.move,v,B),O[G](P.end,E,W)):(O[G](z.start,b,B),i[G](z.move,v,B),i[G](z.end,E,W))}function $(){!e.params.scrollbar.el||!e.scrollbar.el||L("on")}function k(){!e.params.scrollbar.el||!e.scrollbar.el||L("off")}function S(){const{scrollbar:w,$el:x}=e;e.params.scrollbar=we(e,e.originalParams.scrollbar,e.params.scrollbar,{el:"swiper-scrollbar"});const P=e.params.scrollbar;if(!P.el)return;let z=T(P.el);e.params.uniqueNavElements&&typeof P.el=="string"&&z.length>1&&x.find(P.el).length===1&&(z=x.find(P.el)),z.addClass(e.isHorizontal()?P.horizontalClass:P.verticalClass);let j=z.find(`.${e.params.scrollbar.dragClass}`);j.length===0&&(j=T(`<div class="${e.params.scrollbar.dragClass}"></div>`),z.append(j)),Object.assign(w,{$el:z,el:z[0],$dragEl:j,dragEl:j[0]}),P.draggable&&$(),z&&z[e.enabled?"removeClass":"addClass"](e.params.scrollbar.lockClass)}function I(){const w=e.params.scrollbar,x=e.scrollbar.$el;x&&x.removeClass(e.isHorizontal()?w.horizontalClass:w.verticalClass),k()}n("init",()=>{e.params.scrollbar.enabled===!1?y():(S(),_(),m())}),n("update resize observerUpdate lock unlock",()=>{_()}),n("setTranslate",()=>{m()}),n("setTransition",(w,x)=>{g(x)}),n("enable disable",()=>{const{$el:w}=e.scrollbar;w&&w[e.enabled?"removeClass":"addClass"](e.params.scrollbar.lockClass)}),n("destroy",()=>{I()});const C=()=>{e.$el.removeClass(e.params.scrollbar.scrollbarDisabledClass),e.scrollbar.$el&&e.scrollbar.$el.removeClass(e.params.scrollbar.scrollbarDisabledClass),S(),_(),m()},y=()=>{e.$el.addClass(e.params.scrollbar.scrollbarDisabledClass),e.scrollbar.$el&&e.scrollbar.$el.addClass(e.params.scrollbar.scrollbarDisabledClass),I()};Object.assign(e.scrollbar,{enable:C,disable:y,updateSize:_,setTranslate:m,init:S,destroy:I})}function qs(t){let{swiper:e,extendParams:s,on:n}=t;s({parallax:{enabled:!1}});const a=(u,d)=>{const{rtl:p}=e,c=T(u),o=p?-1:1,r=c.attr("data-swiper-parallax")||"0";let m=c.attr("data-swiper-parallax-x"),g=c.attr("data-swiper-parallax-y");const _=c.attr("data-swiper-parallax-scale"),f=c.attr("data-swiper-parallax-opacity");if(m||g?(m=m||"0",g=g||"0"):e.isHorizontal()?(m=r,g="0"):(g=r,m="0"),m.indexOf("%")>=0?m=`${parseInt(m,10)*d*o}%`:m=`${m*d*o}px`,g.indexOf("%")>=0?g=`${parseInt(g,10)*d}%`:g=`${g*d}px`,typeof f<"u"&&f!==null){const h=f-(f-1)*(1-Math.abs(d));c[0].style.opacity=h}if(typeof _>"u"||_===null)c.transform(`translate3d(${m}, ${g}, 0px)`);else{const h=_-(_-1)*(1-Math.abs(d));c.transform(`translate3d(${m}, ${g}, 0px) scale(${h})`)}},i=()=>{const{$el:u,slides:d,progress:p,snapGrid:c}=e;u.children("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y], [data-swiper-parallax-opacity], [data-swiper-parallax-scale]").each(o=>{a(o,p)}),d.each((o,r)=>{let m=o.progress;e.params.slidesPerGroup>1&&e.params.slidesPerView!=="auto"&&(m+=Math.ceil(r/2)-p*(c.length-1)),m=Math.min(Math.max(m,-1),1),T(o).find("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y], [data-swiper-parallax-opacity], [data-swiper-parallax-scale]").each(g=>{a(g,m)})})},l=function(u){u===void 0&&(u=e.params.speed);const{$el:d}=e;d.find("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y], [data-swiper-parallax-opacity], [data-swiper-parallax-scale]").each(p=>{const c=T(p);let o=parseInt(c.attr("data-swiper-parallax-duration"),10)||u;u===0&&(o=0),c.transition(o)})};n("beforeInit",()=>{!e.params.parallax.enabled||(e.params.watchSlidesProgress=!0,e.originalParams.watchSlidesProgress=!0)}),n("init",()=>{!e.params.parallax.enabled||i()}),n("setTranslate",()=>{!e.params.parallax.enabled||i()}),n("setTransition",(u,d)=>{!e.params.parallax.enabled||l(d)})}function Ys(t){let{swiper:e,extendParams:s,on:n,emit:a}=t;const i=R();s({zoom:{enabled:!1,maxRatio:3,minRatio:1,toggle:!0,containerClass:"swiper-zoom-container",zoomedSlideClass:"swiper-slide-zoomed"}}),e.zoom={enabled:!1};let l=1,u=!1,d,p,c;const o={$slideEl:void 0,slideWidth:void 0,slideHeight:void 0,$imageEl:void 0,$imageWrapEl:void 0,maxRatio:3},r={isTouched:void 0,isMoved:void 0,currentX:void 0,currentY:void 0,minX:void 0,minY:void 0,maxX:void 0,maxY:void 0,width:void 0,height:void 0,startX:void 0,startY:void 0,touchesStart:{},touchesCurrent:{}},m={x:void 0,y:void 0,prevPositionX:void 0,prevPositionY:void 0,prevTime:void 0};let g=1;Object.defineProperty(e.zoom,"scale",{get(){return g},set(M){if(g!==M){const D=o.$imageEl?o.$imageEl[0]:void 0,O=o.$slideEl?o.$slideEl[0]:void 0;a("zoomChange",M,D,O)}g=M}});function _(M){if(M.targetTouches.length<2)return 1;const D=M.targetTouches[0].pageX,O=M.targetTouches[0].pageY,B=M.targetTouches[1].pageX,W=M.targetTouches[1].pageY;return Math.sqrt((B-D)**2+(W-O)**2)}function f(M){const D=e.support,O=e.params.zoom;if(p=!1,c=!1,!D.gestures){if(M.type!=="touchstart"||M.type==="touchstart"&&M.targetTouches.length<2)return;p=!0,o.scaleStart=_(M)}if((!o.$slideEl||!o.$slideEl.length)&&(o.$slideEl=T(M.target).closest(`.${e.params.slideClass}`),o.$slideEl.length===0&&(o.$slideEl=e.slides.eq(e.activeIndex)),o.$imageEl=o.$slideEl.find(`.${O.containerClass}`).eq(0).find("picture, img, svg, canvas, .swiper-zoom-target").eq(0),o.$imageWrapEl=o.$imageEl.parent(`.${O.containerClass}`),o.maxRatio=o.$imageWrapEl.attr("data-swiper-zoom")||O.maxRatio,o.$imageWrapEl.length===0)){o.$imageEl=void 0;return}o.$imageEl&&o.$imageEl.transition(0),u=!0}function h(M){const D=e.support,O=e.params.zoom,B=e.zoom;if(!D.gestures){if(M.type!=="touchmove"||M.type==="touchmove"&&M.targetTouches.length<2)return;c=!0,o.scaleMove=_(M)}if(!o.$imageEl||o.$imageEl.length===0){M.type==="gesturechange"&&f(M);return}D.gestures?B.scale=M.scale*l:B.scale=o.scaleMove/o.scaleStart*l,B.scale>o.maxRatio&&(B.scale=o.maxRatio-1+(B.scale-o.maxRatio+1)**.5),B.scale<O.minRatio&&(B.scale=O.minRatio+1-(O.minRatio-B.scale+1)**.5),o.$imageEl.transform(`translate3d(0,0,0) scale(${B.scale})`)}function b(M){const D=e.device,O=e.support,B=e.params.zoom,W=e.zoom;if(!O.gestures){if(!p||!c||M.type!=="touchend"||M.type==="touchend"&&M.changedTouches.length<2&&!D.android)return;p=!1,c=!1}!o.$imageEl||o.$imageEl.length===0||(W.scale=Math.max(Math.min(W.scale,o.maxRatio),B.minRatio),o.$imageEl.transition(e.params.speed).transform(`translate3d(0,0,0) scale(${W.scale})`),l=W.scale,u=!1,W.scale===1&&(o.$slideEl=void 0))}function v(M){const D=e.device;!o.$imageEl||o.$imageEl.length===0||r.isTouched||(D.android&&M.cancelable&&M.preventDefault(),r.isTouched=!0,r.touchesStart.x=M.type==="touchstart"?M.targetTouches[0].pageX:M.pageX,r.touchesStart.y=M.type==="touchstart"?M.targetTouches[0].pageY:M.pageY)}function E(M){const D=e.zoom;if(!o.$imageEl||o.$imageEl.length===0||(e.allowClick=!1,!r.isTouched||!o.$slideEl))return;r.isMoved||(r.width=o.$imageEl[0].offsetWidth,r.height=o.$imageEl[0].offsetHeight,r.startX=fe(o.$imageWrapEl[0],"x")||0,r.startY=fe(o.$imageWrapEl[0],"y")||0,o.slideWidth=o.$slideEl[0].offsetWidth,o.slideHeight=o.$slideEl[0].offsetHeight,o.$imageWrapEl.transition(0));const O=r.width*D.scale,B=r.height*D.scale;if(!(O<o.slideWidth&&B<o.slideHeight)){if(r.minX=Math.min(o.slideWidth/2-O/2,0),r.maxX=-r.minX,r.minY=Math.min(o.slideHeight/2-B/2,0),r.maxY=-r.minY,r.touchesCurrent.x=M.type==="touchmove"?M.targetTouches[0].pageX:M.pageX,r.touchesCurrent.y=M.type==="touchmove"?M.targetTouches[0].pageY:M.pageY,!r.isMoved&&!u){if(e.isHorizontal()&&(Math.floor(r.minX)===Math.floor(r.startX)&&r.touchesCurrent.x<r.touchesStart.x||Math.floor(r.maxX)===Math.floor(r.startX)&&r.touchesCurrent.x>r.touchesStart.x)){r.isTouched=!1;return}if(!e.isHorizontal()&&(Math.floor(r.minY)===Math.floor(r.startY)&&r.touchesCurrent.y<r.touchesStart.y||Math.floor(r.maxY)===Math.floor(r.startY)&&r.touchesCurrent.y>r.touchesStart.y)){r.isTouched=!1;return}}M.cancelable&&M.preventDefault(),M.stopPropagation(),r.isMoved=!0,r.currentX=r.touchesCurrent.x-r.touchesStart.x+r.startX,r.currentY=r.touchesCurrent.y-r.touchesStart.y+r.startY,r.currentX<r.minX&&(r.currentX=r.minX+1-(r.minX-r.currentX+1)**.8),r.currentX>r.maxX&&(r.currentX=r.maxX-1+(r.currentX-r.maxX+1)**.8),r.currentY<r.minY&&(r.currentY=r.minY+1-(r.minY-r.currentY+1)**.8),r.currentY>r.maxY&&(r.currentY=r.maxY-1+(r.currentY-r.maxY+1)**.8),m.prevPositionX||(m.prevPositionX=r.touchesCurrent.x),m.prevPositionY||(m.prevPositionY=r.touchesCurrent.y),m.prevTime||(m.prevTime=Date.now()),m.x=(r.touchesCurrent.x-m.prevPositionX)/(Date.now()-m.prevTime)/2,m.y=(r.touchesCurrent.y-m.prevPositionY)/(Date.now()-m.prevTime)/2,Math.abs(r.touchesCurrent.x-m.prevPositionX)<2&&(m.x=0),Math.abs(r.touchesCurrent.y-m.prevPositionY)<2&&(m.y=0),m.prevPositionX=r.touchesCurrent.x,m.prevPositionY=r.touchesCurrent.y,m.prevTime=Date.now(),o.$imageWrapEl.transform(`translate3d(${r.currentX}px, ${r.currentY}px,0)`)}}function L(){const M=e.zoom;if(!o.$imageEl||o.$imageEl.length===0)return;if(!r.isTouched||!r.isMoved){r.isTouched=!1,r.isMoved=!1;return}r.isTouched=!1,r.isMoved=!1;let D=300,O=300;const B=m.x*D,W=r.currentX+B,G=m.y*O,re=r.currentY+G;m.x!==0&&(D=Math.abs((W-r.currentX)/m.x)),m.y!==0&&(O=Math.abs((re-r.currentY)/m.y));const ce=Math.max(D,O);r.currentX=W,r.currentY=re;const de=r.width*M.scale,Z=r.height*M.scale;r.minX=Math.min(o.slideWidth/2-de/2,0),r.maxX=-r.minX,r.minY=Math.min(o.slideHeight/2-Z/2,0),r.maxY=-r.minY,r.currentX=Math.max(Math.min(r.currentX,r.maxX),r.minX),r.currentY=Math.max(Math.min(r.currentY,r.maxY),r.minY),o.$imageWrapEl.transition(ce).transform(`translate3d(${r.currentX}px, ${r.currentY}px,0)`)}function $(){const M=e.zoom;o.$slideEl&&e.previousIndex!==e.activeIndex&&(o.$imageEl&&o.$imageEl.transform("translate3d(0,0,0) scale(1)"),o.$imageWrapEl&&o.$imageWrapEl.transform("translate3d(0,0,0)"),M.scale=1,l=1,o.$slideEl=void 0,o.$imageEl=void 0,o.$imageWrapEl=void 0)}function k(M){const D=e.zoom,O=e.params.zoom;if(o.$slideEl||(M&&M.target&&(o.$slideEl=T(M.target).closest(`.${e.params.slideClass}`)),o.$slideEl||(e.params.virtual&&e.params.virtual.enabled&&e.virtual?o.$slideEl=e.$wrapperEl.children(`.${e.params.slideActiveClass}`):o.$slideEl=e.slides.eq(e.activeIndex)),o.$imageEl=o.$slideEl.find(`.${O.containerClass}`).eq(0).find("picture, img, svg, canvas, .swiper-zoom-target").eq(0),o.$imageWrapEl=o.$imageEl.parent(`.${O.containerClass}`)),!o.$imageEl||o.$imageEl.length===0||!o.$imageWrapEl||o.$imageWrapEl.length===0)return;e.params.cssMode&&(e.wrapperEl.style.overflow="hidden",e.wrapperEl.style.touchAction="none"),o.$slideEl.addClass(`${O.zoomedSlideClass}`);let B,W,G,re,ce,de,Z,Q,Ie,Ae,je,ze,pe,ue,be,Ee,ye,Me;typeof r.touchesStart.x>"u"&&M?(B=M.type==="touchend"?M.changedTouches[0].pageX:M.pageX,W=M.type==="touchend"?M.changedTouches[0].pageY:M.pageY):(B=r.touchesStart.x,W=r.touchesStart.y),D.scale=o.$imageWrapEl.attr("data-swiper-zoom")||O.maxRatio,l=o.$imageWrapEl.attr("data-swiper-zoom")||O.maxRatio,M?(ye=o.$slideEl[0].offsetWidth,Me=o.$slideEl[0].offsetHeight,G=o.$slideEl.offset().left+i.scrollX,re=o.$slideEl.offset().top+i.scrollY,ce=G+ye/2-B,de=re+Me/2-W,Ie=o.$imageEl[0].offsetWidth,Ae=o.$imageEl[0].offsetHeight,je=Ie*D.scale,ze=Ae*D.scale,pe=Math.min(ye/2-je/2,0),ue=Math.min(Me/2-ze/2,0),be=-pe,Ee=-ue,Z=ce*D.scale,Q=de*D.scale,Z<pe&&(Z=pe),Z>be&&(Z=be),Q<ue&&(Q=ue),Q>Ee&&(Q=Ee)):(Z=0,Q=0),o.$imageWrapEl.transition(300).transform(`translate3d(${Z}px, ${Q}px,0)`),o.$imageEl.transition(300).transform(`translate3d(0,0,0) scale(${D.scale})`)}function S(){const M=e.zoom,D=e.params.zoom;o.$slideEl||(e.params.virtual&&e.params.virtual.enabled&&e.virtual?o.$slideEl=e.$wrapperEl.children(`.${e.params.slideActiveClass}`):o.$slideEl=e.slides.eq(e.activeIndex),o.$imageEl=o.$slideEl.find(`.${D.containerClass}`).eq(0).find("picture, img, svg, canvas, .swiper-zoom-target").eq(0),o.$imageWrapEl=o.$imageEl.parent(`.${D.containerClass}`)),!(!o.$imageEl||o.$imageEl.length===0||!o.$imageWrapEl||o.$imageWrapEl.length===0)&&(e.params.cssMode&&(e.wrapperEl.style.overflow="",e.wrapperEl.style.touchAction=""),M.scale=1,l=1,o.$imageWrapEl.transition(300).transform("translate3d(0,0,0)"),o.$imageEl.transition(300).transform("translate3d(0,0,0) scale(1)"),o.$slideEl.removeClass(`${D.zoomedSlideClass}`),o.$slideEl=void 0)}function I(M){const D=e.zoom;D.scale&&D.scale!==1?S():k(M)}function C(){const M=e.support,D=e.touchEvents.start==="touchstart"&&M.passiveListener&&e.params.passiveListeners?{passive:!0,capture:!1}:!1,O=M.passiveListener?{passive:!1,capture:!0}:!0;return{passiveListener:D,activeListenerWithCapture:O}}function y(){return`.${e.params.slideClass}`}function w(M){const{passiveListener:D}=C(),O=y();e.$wrapperEl[M]("gesturestart",O,f,D),e.$wrapperEl[M]("gesturechange",O,h,D),e.$wrapperEl[M]("gestureend",O,b,D)}function x(){d||(d=!0,w("on"))}function P(){!d||(d=!1,w("off"))}function z(){const M=e.zoom;if(M.enabled)return;M.enabled=!0;const D=e.support,{passiveListener:O,activeListenerWithCapture:B}=C(),W=y();D.gestures?(e.$wrapperEl.on(e.touchEvents.start,x,O),e.$wrapperEl.on(e.touchEvents.end,P,O)):e.touchEvents.start==="touchstart"&&(e.$wrapperEl.on(e.touchEvents.start,W,f,O),e.$wrapperEl.on(e.touchEvents.move,W,h,B),e.$wrapperEl.on(e.touchEvents.end,W,b,O),e.touchEvents.cancel&&e.$wrapperEl.on(e.touchEvents.cancel,W,b,O)),e.$wrapperEl.on(e.touchEvents.move,`.${e.params.zoom.containerClass}`,E,B)}function j(){const M=e.zoom;if(!M.enabled)return;const D=e.support;M.enabled=!1;const{passiveListener:O,activeListenerWithCapture:B}=C(),W=y();D.gestures?(e.$wrapperEl.off(e.touchEvents.start,x,O),e.$wrapperEl.off(e.touchEvents.end,P,O)):e.touchEvents.start==="touchstart"&&(e.$wrapperEl.off(e.touchEvents.start,W,f,O),e.$wrapperEl.off(e.touchEvents.move,W,h,B),e.$wrapperEl.off(e.touchEvents.end,W,b,O),e.touchEvents.cancel&&e.$wrapperEl.off(e.touchEvents.cancel,W,b,O)),e.$wrapperEl.off(e.touchEvents.move,`.${e.params.zoom.containerClass}`,E,B)}n("init",()=>{e.params.zoom.enabled&&z()}),n("destroy",()=>{j()}),n("touchStart",(M,D)=>{!e.zoom.enabled||v(D)}),n("touchEnd",(M,D)=>{!e.zoom.enabled||L()}),n("doubleTap",(M,D)=>{!e.animating&&e.params.zoom.enabled&&e.zoom.enabled&&e.params.zoom.toggle&&I(D)}),n("transitionEnd",()=>{e.zoom.enabled&&e.params.zoom.enabled&&$()}),n("slideChange",()=>{e.zoom.enabled&&e.params.zoom.enabled&&e.params.cssMode&&$()}),Object.assign(e.zoom,{enable:z,disable:j,in:k,out:S,toggle:I})}function Gs(t){let{swiper:e,extendParams:s,on:n,emit:a}=t;s({lazy:{checkInView:!1,enabled:!1,loadPrevNext:!1,loadPrevNextAmount:1,loadOnTransitionStart:!1,scrollingElement:"",elementClass:"swiper-lazy",loadingClass:"swiper-lazy-loading",loadedClass:"swiper-lazy-loaded",preloaderClass:"swiper-lazy-preloader"}}),e.lazy={};let i=!1,l=!1;function u(c,o){o===void 0&&(o=!0);const r=e.params.lazy;if(typeof c>"u"||e.slides.length===0)return;const g=e.virtual&&e.params.virtual.enabled?e.$wrapperEl.children(`.${e.params.slideClass}[data-swiper-slide-index="${c}"]`):e.slides.eq(c),_=g.find(`.${r.elementClass}:not(.${r.loadedClass}):not(.${r.loadingClass})`);g.hasClass(r.elementClass)&&!g.hasClass(r.loadedClass)&&!g.hasClass(r.loadingClass)&&_.push(g[0]),_.length!==0&&_.each(f=>{const h=T(f);h.addClass(r.loadingClass);const b=h.attr("data-background"),v=h.attr("data-src"),E=h.attr("data-srcset"),L=h.attr("data-sizes"),$=h.parent("picture");e.loadImage(h[0],v||b,E,L,!1,()=>{if(!(typeof e>"u"||e===null||!e||e&&!e.params||e.destroyed)){if(b?(h.css("background-image",`url("${b}")`),h.removeAttr("data-background")):(E&&(h.attr("srcset",E),h.removeAttr("data-srcset")),L&&(h.attr("sizes",L),h.removeAttr("data-sizes")),$.length&&$.children("source").each(k=>{const S=T(k);S.attr("data-srcset")&&(S.attr("srcset",S.attr("data-srcset")),S.removeAttr("data-srcset"))}),v&&(h.attr("src",v),h.removeAttr("data-src"))),h.addClass(r.loadedClass).removeClass(r.loadingClass),g.find(`.${r.preloaderClass}`).remove(),e.params.loop&&o){const k=g.attr("data-swiper-slide-index");if(g.hasClass(e.params.slideDuplicateClass)){const S=e.$wrapperEl.children(`[data-swiper-slide-index="${k}"]:not(.${e.params.slideDuplicateClass})`);u(S.index(),!1)}else{const S=e.$wrapperEl.children(`.${e.params.slideDuplicateClass}[data-swiper-slide-index="${k}"]`);u(S.index(),!1)}}a("lazyImageReady",g[0],h[0]),e.params.autoHeight&&e.updateAutoHeight()}}),a("lazyImageLoad",g[0],h[0])})}function d(){const{$wrapperEl:c,params:o,slides:r,activeIndex:m}=e,g=e.virtual&&o.virtual.enabled,_=o.lazy;let f=o.slidesPerView;f==="auto"&&(f=0);function h(v){if(g){if(c.children(`.${o.slideClass}[data-swiper-slide-index="${v}"]`).length)return!0}else if(r[v])return!0;return!1}function b(v){return g?T(v).attr("data-swiper-slide-index"):T(v).index()}if(l||(l=!0),e.params.watchSlidesProgress)c.children(`.${o.slideVisibleClass}`).each(v=>{const E=g?T(v).attr("data-swiper-slide-index"):T(v).index();u(E)});else if(f>1)for(let v=m;v<m+f;v+=1)h(v)&&u(v);else u(m);if(_.loadPrevNext)if(f>1||_.loadPrevNextAmount&&_.loadPrevNextAmount>1){const v=_.loadPrevNextAmount,E=Math.ceil(f),L=Math.min(m+E+Math.max(v,E),r.length),$=Math.max(m-Math.max(E,v),0);for(let k=m+E;k<L;k+=1)h(k)&&u(k);for(let k=$;k<m;k+=1)h(k)&&u(k)}else{const v=c.children(`.${o.slideNextClass}`);v.length>0&&u(b(v));const E=c.children(`.${o.slidePrevClass}`);E.length>0&&u(b(E))}}function p(){const c=R();if(!e||e.destroyed)return;const o=e.params.lazy.scrollingElement?T(e.params.lazy.scrollingElement):T(c),r=o[0]===c,m=r?c.innerWidth:o[0].offsetWidth,g=r?c.innerHeight:o[0].offsetHeight,_=e.$el.offset(),{rtlTranslate:f}=e;let h=!1;f&&(_.left-=e.$el[0].scrollLeft);const b=[[_.left,_.top],[_.left+e.width,_.top],[_.left,_.top+e.height],[_.left+e.width,_.top+e.height]];for(let E=0;E<b.length;E+=1){const L=b[E];if(L[0]>=0&&L[0]<=m&&L[1]>=0&&L[1]<=g){if(L[0]===0&&L[1]===0)continue;h=!0}}const v=e.touchEvents.start==="touchstart"&&e.support.passiveListener&&e.params.passiveListeners?{passive:!0,capture:!1}:!1;h?(d(),o.off("scroll",p,v)):i||(i=!0,o.on("scroll",p,v))}n("beforeInit",()=>{e.params.lazy.enabled&&e.params.preloadImages&&(e.params.preloadImages=!1)}),n("init",()=>{e.params.lazy.enabled&&(e.params.lazy.checkInView?p():d())}),n("scroll",()=>{e.params.freeMode&&e.params.freeMode.enabled&&!e.params.freeMode.sticky&&d()}),n("scrollbarDragMove resize _freeModeNoMomentumRelease",()=>{e.params.lazy.enabled&&(e.params.lazy.checkInView?p():d())}),n("transitionStart",()=>{e.params.lazy.enabled&&(e.params.lazy.loadOnTransitionStart||!e.params.lazy.loadOnTransitionStart&&!l)&&(e.params.lazy.checkInView?p():d())}),n("transitionEnd",()=>{e.params.lazy.enabled&&!e.params.lazy.loadOnTransitionStart&&(e.params.lazy.checkInView?p():d())}),n("slideChange",()=>{const{lazy:c,cssMode:o,watchSlidesProgress:r,touchReleaseOnEdges:m,resistanceRatio:g}=e.params;c.enabled&&(o||r&&(m||g===0))&&d()}),n("destroy",()=>{!e.$el||e.$el.find(`.${e.params.lazy.loadingClass}`).removeClass(e.params.lazy.loadingClass)}),Object.assign(e.lazy,{load:d,loadInSlide:u})}function Us(t){let{swiper:e,extendParams:s,on:n}=t;s({controller:{control:void 0,inverse:!1,by:"slide"}}),e.controller={control:void 0};function a(p,c){const o=function(){let _,f,h;return(b,v)=>{for(f=-1,_=b.length;_-f>1;)h=_+f>>1,b[h]<=v?f=h:_=h;return _}}();this.x=p,this.y=c,this.lastIndex=p.length-1;let r,m;return this.interpolate=function(_){return _?(m=o(this.x,_),r=m-1,(_-this.x[r])*(this.y[m]-this.y[r])/(this.x[m]-this.x[r])+this.y[r]):0},this}function i(p){e.controller.spline||(e.controller.spline=e.params.loop?new a(e.slidesGrid,p.slidesGrid):new a(e.snapGrid,p.snapGrid))}function l(p,c){const o=e.controller.control;let r,m;const g=e.constructor;function _(f){const h=e.rtlTranslate?-e.translate:e.translate;e.params.controller.by==="slide"&&(i(f),m=-e.controller.spline.interpolate(-h)),(!m||e.params.controller.by==="container")&&(r=(f.maxTranslate()-f.minTranslate())/(e.maxTranslate()-e.minTranslate()),m=(h-e.minTranslate())*r+f.minTranslate()),e.params.controller.inverse&&(m=f.maxTranslate()-m),f.updateProgress(m),f.setTranslate(m,e),f.updateActiveIndex(),f.updateSlidesClasses()}if(Array.isArray(o))for(let f=0;f<o.length;f+=1)o[f]!==c&&o[f]instanceof g&&_(o[f]);else o instanceof g&&c!==o&&_(o)}function u(p,c){const o=e.constructor,r=e.controller.control;let m;function g(_){_.setTransition(p,e),p!==0&&(_.transitionStart(),_.params.autoHeight&&J(()=>{_.updateAutoHeight()}),_.$wrapperEl.transitionEnd(()=>{!r||(_.params.loop&&e.params.controller.by==="slide"&&_.loopFix(),_.transitionEnd())}))}if(Array.isArray(r))for(m=0;m<r.length;m+=1)r[m]!==c&&r[m]instanceof o&&g(r[m]);else r instanceof o&&c!==r&&g(r)}function d(){!e.controller.control||e.controller.spline&&(e.controller.spline=void 0,delete e.controller.spline)}n("beforeInit",()=>{e.controller.control=e.params.controller.control}),n("update",()=>{d()}),n("resize",()=>{d()}),n("observerUpdate",()=>{d()}),n("setTranslate",(p,c,o)=>{!e.controller.control||e.controller.setTranslate(c,o)}),n("setTransition",(p,c,o)=>{!e.controller.control||e.controller.setTransition(c,o)}),Object.assign(e.controller,{setTranslate:l,setTransition:u})}function Vs(t){let{swiper:e,extendParams:s,on:n}=t;s({a11y:{enabled:!0,notificationClass:"swiper-notification",prevSlideMessage:"Previous slide",nextSlideMessage:"Next slide",firstSlideMessage:"This is the first slide",lastSlideMessage:"This is the last slide",paginationBulletMessage:"Go to slide {{index}}",slideLabelMessage:"{{index}} / {{slidesLength}}",containerMessage:null,containerRoleDescriptionMessage:null,itemRoleDescriptionMessage:null,slideRole:"group",id:null}});let a=null;function i(y){const w=a;w.length!==0&&(w.html(""),w.html(y))}function l(y){y===void 0&&(y=16);const w=()=>Math.round(16*Math.random()).toString(16);return"x".repeat(y).replace(/x/g,w)}function u(y){y.attr("tabIndex","0")}function d(y){y.attr("tabIndex","-1")}function p(y,w){y.attr("role",w)}function c(y,w){y.attr("aria-roledescription",w)}function o(y,w){y.attr("aria-controls",w)}function r(y,w){y.attr("aria-label",w)}function m(y,w){y.attr("id",w)}function g(y,w){y.attr("aria-live",w)}function _(y){y.attr("aria-disabled",!0)}function f(y){y.attr("aria-disabled",!1)}function h(y){if(y.keyCode!==13&&y.keyCode!==32)return;const w=e.params.a11y,x=T(y.target);e.navigation&&e.navigation.$nextEl&&x.is(e.navigation.$nextEl)&&(e.isEnd&&!e.params.loop||e.slideNext(),e.isEnd?i(w.lastSlideMessage):i(w.nextSlideMessage)),e.navigation&&e.navigation.$prevEl&&x.is(e.navigation.$prevEl)&&(e.isBeginning&&!e.params.loop||e.slidePrev(),e.isBeginning?i(w.firstSlideMessage):i(w.prevSlideMessage)),e.pagination&&x.is(F(e.params.pagination.bulletClass))&&x[0].click()}function b(){if(e.params.loop||e.params.rewind||!e.navigation)return;const{$nextEl:y,$prevEl:w}=e.navigation;w&&w.length>0&&(e.isBeginning?(_(w),d(w)):(f(w),u(w))),y&&y.length>0&&(e.isEnd?(_(y),d(y)):(f(y),u(y)))}function v(){return e.pagination&&e.pagination.bullets&&e.pagination.bullets.length}function E(){return v()&&e.params.pagination.clickable}function L(){const y=e.params.a11y;!v()||e.pagination.bullets.each(w=>{const x=T(w);e.params.pagination.clickable&&(u(x),e.params.pagination.renderBullet||(p(x,"button"),r(x,y.paginationBulletMessage.replace(/\{\{index\}\}/,x.index()+1)))),x.is(`.${e.params.pagination.bulletActiveClass}`)?x.attr("aria-current","true"):x.removeAttr("aria-current")})}const $=(y,w,x)=>{u(y),y[0].tagName!=="BUTTON"&&(p(y,"button"),y.on("keydown",h)),r(y,x),o(y,w)},k=y=>{const w=y.target.closest(`.${e.params.slideClass}`);if(!w||!e.slides.includes(w))return;const x=e.slides.indexOf(w)===e.activeIndex,P=e.params.watchSlidesProgress&&e.visibleSlides&&e.visibleSlides.includes(w);x||P||e.slideTo(e.slides.indexOf(w),0)},S=()=>{const y=e.params.a11y;y.itemRoleDescriptionMessage&&c(T(e.slides),y.itemRoleDescriptionMessage),y.slideRole&&p(T(e.slides),y.slideRole);const w=e.params.loop?e.slides.filter(x=>!x.classList.contains(e.params.slideDuplicateClass)).length:e.slides.length;y.slideLabelMessage&&e.slides.each((x,P)=>{const z=T(x),j=e.params.loop?parseInt(z.attr("data-swiper-slide-index"),10):P,M=y.slideLabelMessage.replace(/\{\{index\}\}/,j+1).replace(/\{\{slidesLength\}\}/,w);r(z,M)})},I=()=>{const y=e.params.a11y;e.$el.append(a);const w=e.$el;y.containerRoleDescriptionMessage&&c(w,y.containerRoleDescriptionMessage),y.containerMessage&&r(w,y.containerMessage);const x=e.$wrapperEl,P=y.id||x.attr("id")||`swiper-wrapper-${l(16)}`,z=e.params.autoplay&&e.params.autoplay.enabled?"off":"polite";m(x,P),g(x,z),S();let j,M;e.navigation&&e.navigation.$nextEl&&(j=e.navigation.$nextEl),e.navigation&&e.navigation.$prevEl&&(M=e.navigation.$prevEl),j&&j.length&&$(j,P,y.nextSlideMessage),M&&M.length&&$(M,P,y.prevSlideMessage),E()&&e.pagination.$el.on("keydown",F(e.params.pagination.bulletClass),h),e.$el.on("focus",k,!0)};function C(){a&&a.length>0&&a.remove();let y,w;e.navigation&&e.navigation.$nextEl&&(y=e.navigation.$nextEl),e.navigation&&e.navigation.$prevEl&&(w=e.navigation.$prevEl),y&&y.off("keydown",h),w&&w.off("keydown",h),E()&&e.pagination.$el.off("keydown",F(e.params.pagination.bulletClass),h),e.$el.off("focus",k,!0)}n("beforeInit",()=>{a=T(`<span class="${e.params.a11y.notificationClass}" aria-live="assertive" aria-atomic="true"></span>`)}),n("afterInit",()=>{!e.params.a11y.enabled||I()}),n("slidesLengthChange snapGridLengthChange slidesGridLengthChange",()=>{!e.params.a11y.enabled||S()}),n("fromEdge toEdge afterInit lock unlock",()=>{!e.params.a11y.enabled||b()}),n("paginationUpdate",()=>{!e.params.a11y.enabled||L()}),n("destroy",()=>{!e.params.a11y.enabled||C()})}function Xs(t){let{swiper:e,extendParams:s,on:n}=t;s({history:{enabled:!1,root:"",replaceState:!1,key:"slides",keepQuery:!1}});let a=!1,i={};const l=m=>m.toString().replace(/\s+/g,"-").replace(/[^\w-]+/g,"").replace(/--+/g,"-").replace(/^-+/,"").replace(/-+$/,""),u=m=>{const g=R();let _;m?_=new URL(m):_=g.location;const f=_.pathname.slice(1).split("/").filter(E=>E!==""),h=f.length,b=f[h-2],v=f[h-1];return{key:b,value:v}},d=(m,g)=>{const _=R();if(!a||!e.params.history.enabled)return;let f;e.params.url?f=new URL(e.params.url):f=_.location;const h=e.slides.eq(g);let b=l(h.attr("data-history"));if(e.params.history.root.length>0){let E=e.params.history.root;E[E.length-1]==="/"&&(E=E.slice(0,E.length-1)),b=`${E}/${m}/${b}`}else f.pathname.includes(m)||(b=`${m}/${b}`);e.params.history.keepQuery&&(b+=f.search);const v=_.history.state;v&&v.value===b||(e.params.history.replaceState?_.history.replaceState({value:b},null,b):_.history.pushState({value:b},null,b))},p=(m,g,_)=>{if(g)for(let f=0,h=e.slides.length;f<h;f+=1){const b=e.slides.eq(f);if(l(b.attr("data-history"))===g&&!b.hasClass(e.params.slideDuplicateClass)){const E=b.index();e.slideTo(E,m,_)}}else e.slideTo(0,m,_)},c=()=>{i=u(e.params.url),p(e.params.speed,i.value,!1)},o=()=>{const m=R();if(!!e.params.history){if(!m.history||!m.history.pushState){e.params.history.enabled=!1,e.params.hashNavigation.enabled=!0;return}a=!0,i=u(e.params.url),!(!i.key&&!i.value)&&(p(0,i.value,e.params.runCallbacksOnInit),e.params.history.replaceState||m.addEventListener("popstate",c))}},r=()=>{const m=R();e.params.history.replaceState||m.removeEventListener("popstate",c)};n("init",()=>{e.params.history.enabled&&o()}),n("destroy",()=>{e.params.history.enabled&&r()}),n("transitionEnd _freeModeNoMomentumRelease",()=>{a&&d(e.params.history.key,e.activeIndex)}),n("slideChange",()=>{a&&e.params.cssMode&&d(e.params.history.key,e.activeIndex)})}function Ks(t){let{swiper:e,extendParams:s,emit:n,on:a}=t,i=!1;const l=A(),u=R();s({hashNavigation:{enabled:!1,replaceState:!1,watchState:!1}});const d=()=>{n("hashChange");const r=l.location.hash.replace("#",""),m=e.slides.eq(e.activeIndex).attr("data-hash");if(r!==m){const g=e.$wrapperEl.children(`.${e.params.slideClass}[data-hash="${r}"]`).index();if(typeof g>"u")return;e.slideTo(g)}},p=()=>{if(!(!i||!e.params.hashNavigation.enabled))if(e.params.hashNavigation.replaceState&&u.history&&u.history.replaceState)u.history.replaceState(null,null,`#${e.slides.eq(e.activeIndex).attr("data-hash")}`||""),n("hashSet");else{const r=e.slides.eq(e.activeIndex),m=r.attr("data-hash")||r.attr("data-history");l.location.hash=m||"",n("hashSet")}},c=()=>{if(!e.params.hashNavigation.enabled||e.params.history&&e.params.history.enabled)return;i=!0;const r=l.location.hash.replace("#","");if(r)for(let g=0,_=e.slides.length;g<_;g+=1){const f=e.slides.eq(g);if((f.attr("data-hash")||f.attr("data-history"))===r&&!f.hasClass(e.params.slideDuplicateClass)){const b=f.index();e.slideTo(b,0,e.params.runCallbacksOnInit,!0)}}e.params.hashNavigation.watchState&&T(u).on("hashchange",d)},o=()=>{e.params.hashNavigation.watchState&&T(u).off("hashchange",d)};a("init",()=>{e.params.hashNavigation.enabled&&c()}),a("destroy",()=>{e.params.hashNavigation.enabled&&o()}),a("transitionEnd _freeModeNoMomentumRelease",()=>{i&&p()}),a("slideChange",()=>{i&&e.params.cssMode&&p()})}function Fs(t){let{swiper:e,extendParams:s,on:n,emit:a}=t,i;e.autoplay={running:!1,paused:!1},s({autoplay:{enabled:!1,delay:3e3,waitForTransition:!0,disableOnInteraction:!0,stopOnLastSlide:!1,reverseDirection:!1,pauseOnMouseEnter:!1}});function l(){const f=e.slides.eq(e.activeIndex);let h=e.params.autoplay.delay;f.attr("data-swiper-autoplay")&&(h=f.attr("data-swiper-autoplay")||e.params.autoplay.delay),clearTimeout(i),i=J(()=>{let b;e.params.autoplay.reverseDirection?e.params.loop?(e.loopFix(),b=e.slidePrev(e.params.speed,!0,!0),a("autoplay")):e.isBeginning?e.params.autoplay.stopOnLastSlide?d():(b=e.slideTo(e.slides.length-1,e.params.speed,!0,!0),a("autoplay")):(b=e.slidePrev(e.params.speed,!0,!0),a("autoplay")):e.params.loop?(e.loopFix(),b=e.slideNext(e.params.speed,!0,!0),a("autoplay")):e.isEnd?e.params.autoplay.stopOnLastSlide?d():(b=e.slideTo(0,e.params.speed,!0,!0),a("autoplay")):(b=e.slideNext(e.params.speed,!0,!0),a("autoplay")),(e.params.cssMode&&e.autoplay.running||b===!1)&&l()},h)}function u(){return typeof i<"u"||e.autoplay.running?!1:(e.autoplay.running=!0,a("autoplayStart"),l(),!0)}function d(){return!e.autoplay.running||typeof i>"u"?!1:(i&&(clearTimeout(i),i=void 0),e.autoplay.running=!1,a("autoplayStop"),!0)}function p(f){!e.autoplay.running||e.autoplay.paused||(i&&clearTimeout(i),e.autoplay.paused=!0,f===0||!e.params.autoplay.waitForTransition?(e.autoplay.paused=!1,l()):["transitionend","webkitTransitionEnd"].forEach(h=>{e.$wrapperEl[0].addEventListener(h,o)}))}function c(){const f=A();f.visibilityState==="hidden"&&e.autoplay.running&&p(),f.visibilityState==="visible"&&e.autoplay.paused&&(l(),e.autoplay.paused=!1)}function o(f){!e||e.destroyed||!e.$wrapperEl||f.target===e.$wrapperEl[0]&&(["transitionend","webkitTransitionEnd"].forEach(h=>{e.$wrapperEl[0].removeEventListener(h,o)}),e.autoplay.paused=!1,e.autoplay.running?l():d())}function r(){e.params.autoplay.disableOnInteraction?d():(a("autoplayPause"),p()),["transitionend","webkitTransitionEnd"].forEach(f=>{e.$wrapperEl[0].removeEventListener(f,o)})}function m(){e.params.autoplay.disableOnInteraction||(e.autoplay.paused=!1,a("autoplayResume"),l())}function g(){e.params.autoplay.pauseOnMouseEnter&&(e.$el.on("mouseenter",r),e.$el.on("mouseleave",m))}function _(){e.$el.off("mouseenter",r),e.$el.off("mouseleave",m)}n("init",()=>{e.params.autoplay.enabled&&(u(),A().addEventListener("visibilitychange",c),g())}),n("beforeTransitionStart",(f,h,b)=>{e.autoplay.running&&(b||!e.params.autoplay.disableOnInteraction?e.autoplay.pause(h):d())}),n("sliderFirstMove",()=>{e.autoplay.running&&(e.params.autoplay.disableOnInteraction?d():p())}),n("touchEnd",()=>{e.params.cssMode&&e.autoplay.paused&&!e.params.autoplay.disableOnInteraction&&l()}),n("destroy",()=>{_(),e.autoplay.running&&d(),A().removeEventListener("visibilitychange",c)}),Object.assign(e.autoplay,{pause:p,run:l,start:u,stop:d})}function Zs(t){let{swiper:e,extendParams:s,on:n}=t;s({thumbs:{swiper:null,multipleActiveThumbs:!0,autoScrollOffset:0,slideThumbActiveClass:"swiper-slide-thumb-active",thumbsContainerClass:"swiper-thumbs"}});let a=!1,i=!1;e.thumbs={swiper:null};function l(){const p=e.thumbs.swiper;if(!p||p.destroyed)return;const c=p.clickedIndex,o=p.clickedSlide;if(o&&T(o).hasClass(e.params.thumbs.slideThumbActiveClass)||typeof c>"u"||c===null)return;let r;if(p.params.loop?r=parseInt(T(p.clickedSlide).attr("data-swiper-slide-index"),10):r=c,e.params.loop){let m=e.activeIndex;e.slides.eq(m).hasClass(e.params.slideDuplicateClass)&&(e.loopFix(),e._clientLeft=e.$wrapperEl[0].clientLeft,m=e.activeIndex);const g=e.slides.eq(m).prevAll(`[data-swiper-slide-index="${r}"]`).eq(0).index(),_=e.slides.eq(m).nextAll(`[data-swiper-slide-index="${r}"]`).eq(0).index();typeof g>"u"?r=_:typeof _>"u"?r=g:_-m<m-g?r=_:r=g}e.slideTo(r)}function u(){const{thumbs:p}=e.params;if(a)return!1;a=!0;const c=e.constructor;if(p.swiper instanceof c)e.thumbs.swiper=p.swiper,Object.assign(e.thumbs.swiper.originalParams,{watchSlidesProgress:!0,slideToClickedSlide:!1}),Object.assign(e.thumbs.swiper.params,{watchSlidesProgress:!0,slideToClickedSlide:!1});else if(ne(p.swiper)){const o=Object.assign({},p.swiper);Object.assign(o,{watchSlidesProgress:!0,slideToClickedSlide:!1}),e.thumbs.swiper=new c(o),i=!0}return e.thumbs.swiper.$el.addClass(e.params.thumbs.thumbsContainerClass),e.thumbs.swiper.on("tap",l),!0}function d(p){const c=e.thumbs.swiper;if(!c||c.destroyed)return;const o=c.params.slidesPerView==="auto"?c.slidesPerViewDynamic():c.params.slidesPerView;let r=1;const m=e.params.thumbs.slideThumbActiveClass;if(e.params.slidesPerView>1&&!e.params.centeredSlides&&(r=e.params.slidesPerView),e.params.thumbs.multipleActiveThumbs||(r=1),r=Math.floor(r),c.slides.removeClass(m),c.params.loop||c.params.virtual&&c.params.virtual.enabled)for(let f=0;f<r;f+=1)c.$wrapperEl.children(`[data-swiper-slide-index="${e.realIndex+f}"]`).addClass(m);else for(let f=0;f<r;f+=1)c.slides.eq(e.realIndex+f).addClass(m);const g=e.params.thumbs.autoScrollOffset,_=g&&!c.params.loop;if(e.realIndex!==c.realIndex||_){let f=c.activeIndex,h,b;if(c.params.loop){c.slides.eq(f).hasClass(c.params.slideDuplicateClass)&&(c.loopFix(),c._clientLeft=c.$wrapperEl[0].clientLeft,f=c.activeIndex);const v=c.slides.eq(f).prevAll(`[data-swiper-slide-index="${e.realIndex}"]`).eq(0).index(),E=c.slides.eq(f).nextAll(`[data-swiper-slide-index="${e.realIndex}"]`).eq(0).index();typeof v>"u"?h=E:typeof E>"u"?h=v:E-f===f-v?h=c.params.slidesPerGroup>1?E:f:E-f<f-v?h=E:h=v,b=e.activeIndex>e.previousIndex?"next":"prev"}else h=e.realIndex,b=h>e.previousIndex?"next":"prev";_&&(h+=b==="next"?g:-1*g),c.visibleSlidesIndexes&&c.visibleSlidesIndexes.indexOf(h)<0&&(c.params.centeredSlides?h>f?h=h-Math.floor(o/2)+1:h=h+Math.floor(o/2)-1:h>f&&c.params.slidesPerGroup,c.slideTo(h,p?0:void 0))}}n("beforeInit",()=>{const{thumbs:p}=e.params;!p||!p.swiper||(u(),d(!0))}),n("slideChange update resize observerUpdate",()=>{d()}),n("setTransition",(p,c)=>{const o=e.thumbs.swiper;!o||o.destroyed||o.setTransition(c)}),n("beforeDestroy",()=>{const p=e.thumbs.swiper;!p||p.destroyed||i&&p.destroy()}),Object.assign(e.thumbs,{init:u,update:d})}function Js(t){let{swiper:e,extendParams:s,emit:n,once:a}=t;s({freeMode:{enabled:!1,momentum:!0,momentumRatio:1,momentumBounce:!0,momentumBounceRatio:1,momentumVelocityRatio:1,sticky:!1,minimumVelocity:.02}});function i(){const d=e.getTranslate();e.setTranslate(d),e.setTransition(0),e.touchEventsData.velocities.length=0,e.freeMode.onTouchEnd({currentPos:e.rtl?e.translate:-e.translate})}function l(){const{touchEventsData:d,touches:p}=e;d.velocities.length===0&&d.velocities.push({position:p[e.isHorizontal()?"startX":"startY"],time:d.touchStartTime}),d.velocities.push({position:p[e.isHorizontal()?"currentX":"currentY"],time:U()})}function u(d){let{currentPos:p}=d;const{params:c,$wrapperEl:o,rtlTranslate:r,snapGrid:m,touchEventsData:g}=e,f=U()-g.touchStartTime;if(p<-e.minTranslate()){e.slideTo(e.activeIndex);return}if(p>-e.maxTranslate()){e.slides.length<m.length?e.slideTo(m.length-1):e.slideTo(e.slides.length-1);return}if(c.freeMode.momentum){if(g.velocities.length>1){const S=g.velocities.pop(),I=g.velocities.pop(),C=S.position-I.position,y=S.time-I.time;e.velocity=C/y,e.velocity/=2,Math.abs(e.velocity)<c.freeMode.minimumVelocity&&(e.velocity=0),(y>150||U()-S.time>300)&&(e.velocity=0)}else e.velocity=0;e.velocity*=c.freeMode.momentumVelocityRatio,g.velocities.length=0;let h=1e3*c.freeMode.momentumRatio;const b=e.velocity*h;let v=e.translate+b;r&&(v=-v);let E=!1,L;const $=Math.abs(e.velocity)*20*c.freeMode.momentumBounceRatio;let k;if(v<e.maxTranslate())c.freeMode.momentumBounce?(v+e.maxTranslate()<-$&&(v=e.maxTranslate()-$),L=e.maxTranslate(),E=!0,g.allowMomentumBounce=!0):v=e.maxTranslate(),c.loop&&c.centeredSlides&&(k=!0);else if(v>e.minTranslate())c.freeMode.momentumBounce?(v-e.minTranslate()>$&&(v=e.minTranslate()+$),L=e.minTranslate(),E=!0,g.allowMomentumBounce=!0):v=e.minTranslate(),c.loop&&c.centeredSlides&&(k=!0);else if(c.freeMode.sticky){let S;for(let I=0;I<m.length;I+=1)if(m[I]>-v){S=I;break}Math.abs(m[S]-v)<Math.abs(m[S-1]-v)||e.swipeDirection==="next"?v=m[S]:v=m[S-1],v=-v}if(k&&a("transitionEnd",()=>{e.loopFix()}),e.velocity!==0){if(r?h=Math.abs((-v-e.translate)/e.velocity):h=Math.abs((v-e.translate)/e.velocity),c.freeMode.sticky){const S=Math.abs((r?-v:v)-e.translate),I=e.slidesSizesGrid[e.activeIndex];S<I?h=c.speed:S<2*I?h=c.speed*1.5:h=c.speed*2.5}}else if(c.freeMode.sticky){e.slideToClosest();return}c.freeMode.momentumBounce&&E?(e.updateProgress(L),e.setTransition(h),e.setTranslate(v),e.transitionStart(!0,e.swipeDirection),e.animating=!0,o.transitionEnd(()=>{!e||e.destroyed||!g.allowMomentumBounce||(n("momentumBounce"),e.setTransition(c.speed),setTimeout(()=>{e.setTranslate(L),o.transitionEnd(()=>{!e||e.destroyed||e.transitionEnd()})},0))})):e.velocity?(n("_freeModeNoMomentumRelease"),e.updateProgress(v),e.setTransition(h),e.setTranslate(v),e.transitionStart(!0,e.swipeDirection),e.animating||(e.animating=!0,o.transitionEnd(()=>{!e||e.destroyed||e.transitionEnd()}))):e.updateProgress(v),e.updateActiveIndex(),e.updateSlidesClasses()}else if(c.freeMode.sticky){e.slideToClosest();return}else c.freeMode&&n("_freeModeNoMomentumRelease");(!c.freeMode.momentum||f>=c.longSwipesMs)&&(e.updateProgress(),e.updateActiveIndex(),e.updateSlidesClasses())}Object.assign(e,{freeMode:{onTouchStart:i,onTouchMove:l,onTouchEnd:u}})}function Qs(t){let{swiper:e,extendParams:s}=t;s({grid:{rows:1,fill:"column"}});let n,a,i;const l=p=>{const{slidesPerView:c}=e.params,{rows:o,fill:r}=e.params.grid;a=n/o,i=Math.floor(p/o),Math.floor(p/o)===p/o?n=p:n=Math.ceil(p/o)*o,c!=="auto"&&r==="row"&&(n=Math.max(n,c*o))},u=(p,c,o,r)=>{const{slidesPerGroup:m,spaceBetween:g}=e.params,{rows:_,fill:f}=e.params.grid;let h,b,v;if(f==="row"&&m>1){const E=Math.floor(p/(m*_)),L=p-_*m*E,$=E===0?m:Math.min(Math.ceil((o-E*_*m)/_),m);v=Math.floor(L/$),b=L-v*$+E*m,h=b+v*n/_,c.css({"-webkit-order":h,order:h})}else f==="column"?(b=Math.floor(p/_),v=p-b*_,(b>i||b===i&&v===_-1)&&(v+=1,v>=_&&(v=0,b+=1))):(v=Math.floor(p/a),b=p-v*a);c.css(r("margin-top"),v!==0?g&&`${g}px`:"")},d=(p,c,o)=>{const{spaceBetween:r,centeredSlides:m,roundLengths:g}=e.params,{rows:_}=e.params.grid;if(e.virtualSize=(p+r)*n,e.virtualSize=Math.ceil(e.virtualSize/_)-r,e.$wrapperEl.css({[o("width")]:`${e.virtualSize+r}px`}),m){c.splice(0,c.length);const f=[];for(let h=0;h<c.length;h+=1){let b=c[h];g&&(b=Math.floor(b)),c[h]<e.virtualSize+c[0]&&f.push(b)}c.push(...f)}};e.grid={initSlides:l,updateSlide:u,updateWrapperSize:d}}function en(t){const e=this,{$wrapperEl:s,params:n}=e;if(n.loop&&e.loopDestroy(),typeof t=="object"&&"length"in t)for(let a=0;a<t.length;a+=1)t[a]&&s.append(t[a]);else s.append(t);n.loop&&e.loopCreate(),n.observer||e.update()}function tn(t){const e=this,{params:s,$wrapperEl:n,activeIndex:a}=e;s.loop&&e.loopDestroy();let i=a+1;if(typeof t=="object"&&"length"in t){for(let l=0;l<t.length;l+=1)t[l]&&n.prepend(t[l]);i=a+t.length}else n.prepend(t);s.loop&&e.loopCreate(),s.observer||e.update(),e.slideTo(i,0,!1)}function sn(t,e){const s=this,{$wrapperEl:n,params:a,activeIndex:i}=s;let l=i;a.loop&&(l-=s.loopedSlides,s.loopDestroy(),s.slides=n.children(`.${a.slideClass}`));const u=s.slides.length;if(t<=0){s.prependSlide(e);return}if(t>=u){s.appendSlide(e);return}let d=l>t?l+1:l;const p=[];for(let c=u-1;c>=t;c-=1){const o=s.slides.eq(c);o.remove(),p.unshift(o)}if(typeof e=="object"&&"length"in e){for(let c=0;c<e.length;c+=1)e[c]&&n.append(e[c]);d=l>t?l+e.length:l}else n.append(e);for(let c=0;c<p.length;c+=1)n.append(p[c]);a.loop&&s.loopCreate(),a.observer||s.update(),a.loop?s.slideTo(d+s.loopedSlides,0,!1):s.slideTo(d,0,!1)}function nn(t){const e=this,{params:s,$wrapperEl:n,activeIndex:a}=e;let i=a;s.loop&&(i-=e.loopedSlides,e.loopDestroy(),e.slides=n.children(`.${s.slideClass}`));let l=i,u;if(typeof t=="object"&&"length"in t){for(let d=0;d<t.length;d+=1)u=t[d],e.slides[u]&&e.slides.eq(u).remove(),u<l&&(l-=1);l=Math.max(l,0)}else u=t,e.slides[u]&&e.slides.eq(u).remove(),u<l&&(l-=1),l=Math.max(l,0);s.loop&&e.loopCreate(),s.observer||e.update(),s.loop?e.slideTo(l+e.loopedSlides,0,!1):e.slideTo(l,0,!1)}function an(){const t=this,e=[];for(let s=0;s<t.slides.length;s+=1)e.push(s);t.removeSlide(e)}function rn(t){let{swiper:e}=t;Object.assign(e,{appendSlide:en.bind(e),prependSlide:tn.bind(e),addSlide:sn.bind(e),removeSlide:nn.bind(e),removeAllSlides:an.bind(e)})}function ee(t){const{effect:e,swiper:s,on:n,setTranslate:a,setTransition:i,overwriteParams:l,perspective:u,recreateShadows:d,getEffectParams:p}=t;n("beforeInit",()=>{if(s.params.effect!==e)return;s.classNames.push(`${s.params.containerModifierClass}${e}`),u&&u()&&s.classNames.push(`${s.params.containerModifierClass}3d`);const o=l?l():{};Object.assign(s.params,o),Object.assign(s.originalParams,o)}),n("setTranslate",()=>{s.params.effect===e&&a()}),n("setTransition",(o,r)=>{s.params.effect===e&&i(r)}),n("transitionEnd",()=>{if(s.params.effect===e&&d){if(!p||!p().slideShadows)return;s.slides.each(o=>{s.$(o).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").remove()}),d()}});let c;n("virtualUpdate",()=>{s.params.effect===e&&(s.slides.length||(c=!0),requestAnimationFrame(()=>{c&&s.slides&&s.slides.length&&(a(),c=!1)}))})}function ae(t,e){return t.transformEl?e.find(t.transformEl).css({"backface-visibility":"hidden","-webkit-backface-visibility":"hidden"}):e}function le(t){let{swiper:e,duration:s,transformEl:n,allSlides:a}=t;const{slides:i,activeIndex:l,$wrapperEl:u}=e;if(e.params.virtualTranslate&&s!==0){let d=!1,p;a?p=n?i.find(n):i:p=n?i.eq(l).find(n):i.eq(l),p.transitionEnd(()=>{if(d||!e||e.destroyed)return;d=!0,e.animating=!1;const c=["webkitTransitionEnd","transitionend"];for(let o=0;o<c.length;o+=1)u.trigger(c[o])})}}function on(t){let{swiper:e,extendParams:s,on:n}=t;s({fadeEffect:{crossFade:!1,transformEl:null}}),ee({effect:"fade",swiper:e,on:n,setTranslate:()=>{const{slides:l}=e,u=e.params.fadeEffect;for(let d=0;d<l.length;d+=1){const p=e.slides.eq(d);let o=-p[0].swiperSlideOffset;e.params.virtualTranslate||(o-=e.translate);let r=0;e.isHorizontal()||(r=o,o=0);const m=e.params.fadeEffect.crossFade?Math.max(1-Math.abs(p[0].progress),0):1+Math.min(Math.max(p[0].progress,-1),0);ae(u,p).css({opacity:m}).transform(`translate3d(${o}px, ${r}px, 0px)`)}},setTransition:l=>{const{transformEl:u}=e.params.fadeEffect;(u?e.slides.find(u):e.slides).transition(l),le({swiper:e,duration:l,transformEl:u,allSlides:!0})},overwriteParams:()=>({slidesPerView:1,slidesPerGroup:1,watchSlidesProgress:!0,spaceBetween:0,virtualTranslate:!e.params.cssMode})})}function ln(t){let{swiper:e,extendParams:s,on:n}=t;s({cubeEffect:{slideShadows:!0,shadow:!0,shadowOffset:20,shadowScale:.94}});const a=(d,p,c)=>{let o=c?d.find(".swiper-slide-shadow-left"):d.find(".swiper-slide-shadow-top"),r=c?d.find(".swiper-slide-shadow-right"):d.find(".swiper-slide-shadow-bottom");o.length===0&&(o=T(`<div class="swiper-slide-shadow-${c?"left":"top"}"></div>`),d.append(o)),r.length===0&&(r=T(`<div class="swiper-slide-shadow-${c?"right":"bottom"}"></div>`),d.append(r)),o.length&&(o[0].style.opacity=Math.max(-p,0)),r.length&&(r[0].style.opacity=Math.max(p,0))};ee({effect:"cube",swiper:e,on:n,setTranslate:()=>{const{$el:d,$wrapperEl:p,slides:c,width:o,height:r,rtlTranslate:m,size:g,browser:_}=e,f=e.params.cubeEffect,h=e.isHorizontal(),b=e.virtual&&e.params.virtual.enabled;let v=0,E;f.shadow&&(h?(E=p.find(".swiper-cube-shadow"),E.length===0&&(E=T('<div class="swiper-cube-shadow"></div>'),p.append(E)),E.css({height:`${o}px`})):(E=d.find(".swiper-cube-shadow"),E.length===0&&(E=T('<div class="swiper-cube-shadow"></div>'),d.append(E))));for(let $=0;$<c.length;$+=1){const k=c.eq($);let S=$;b&&(S=parseInt(k.attr("data-swiper-slide-index"),10));let I=S*90,C=Math.floor(I/360);m&&(I=-I,C=Math.floor(-I/360));const y=Math.max(Math.min(k[0].progress,1),-1);let w=0,x=0,P=0;S%4===0?(w=-C*4*g,P=0):(S-1)%4===0?(w=0,P=-C*4*g):(S-2)%4===0?(w=g+C*4*g,P=g):(S-3)%4===0&&(w=-g,P=3*g+g*4*C),m&&(w=-w),h||(x=w,w=0);const z=`rotateX(${h?0:-I}deg) rotateY(${h?I:0}deg) translate3d(${w}px, ${x}px, ${P}px)`;y<=1&&y>-1&&(v=S*90+y*90,m&&(v=-S*90-y*90)),k.transform(z),f.slideShadows&&a(k,y,h)}if(p.css({"-webkit-transform-origin":`50% 50% -${g/2}px`,"transform-origin":`50% 50% -${g/2}px`}),f.shadow)if(h)E.transform(`translate3d(0px, ${o/2+f.shadowOffset}px, ${-o/2}px) rotateX(90deg) rotateZ(0deg) scale(${f.shadowScale})`);else{const $=Math.abs(v)-Math.floor(Math.abs(v)/90)*90,k=1.5-(Math.sin($*2*Math.PI/360)/2+Math.cos($*2*Math.PI/360)/2),S=f.shadowScale,I=f.shadowScale/k,C=f.shadowOffset;E.transform(`scale3d(${S}, 1, ${I}) translate3d(0px, ${r/2+C}px, ${-r/2/I}px) rotateX(-90deg)`)}const L=_.isSafari||_.isWebView?-g/2:0;p.transform(`translate3d(0px,0,${L}px) rotateX(${e.isHorizontal()?0:v}deg) rotateY(${e.isHorizontal()?-v:0}deg)`),p[0].style.setProperty("--swiper-cube-translate-z",`${L}px`)},setTransition:d=>{const{$el:p,slides:c}=e;c.transition(d).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(d),e.params.cubeEffect.shadow&&!e.isHorizontal()&&p.find(".swiper-cube-shadow").transition(d)},recreateShadows:()=>{const d=e.isHorizontal();e.slides.each(p=>{const c=Math.max(Math.min(p.progress,1),-1);a(T(p),c,d)})},getEffectParams:()=>e.params.cubeEffect,perspective:()=>!0,overwriteParams:()=>({slidesPerView:1,slidesPerGroup:1,watchSlidesProgress:!0,resistanceRatio:0,spaceBetween:0,centeredSlides:!1,virtualTranslate:!0})})}function te(t,e,s){const n=`swiper-slide-shadow${s?`-${s}`:""}`,a=t.transformEl?e.find(t.transformEl):e;let i=a.children(`.${n}`);return i.length||(i=T(`<div class="swiper-slide-shadow${s?`-${s}`:""}"></div>`),a.append(i)),i}function cn(t){let{swiper:e,extendParams:s,on:n}=t;s({flipEffect:{slideShadows:!0,limitRotation:!0,transformEl:null}});const a=(d,p,c)=>{let o=e.isHorizontal()?d.find(".swiper-slide-shadow-left"):d.find(".swiper-slide-shadow-top"),r=e.isHorizontal()?d.find(".swiper-slide-shadow-right"):d.find(".swiper-slide-shadow-bottom");o.length===0&&(o=te(c,d,e.isHorizontal()?"left":"top")),r.length===0&&(r=te(c,d,e.isHorizontal()?"right":"bottom")),o.length&&(o[0].style.opacity=Math.max(-p,0)),r.length&&(r[0].style.opacity=Math.max(p,0))};ee({effect:"flip",swiper:e,on:n,setTranslate:()=>{const{slides:d,rtlTranslate:p}=e,c=e.params.flipEffect;for(let o=0;o<d.length;o+=1){const r=d.eq(o);let m=r[0].progress;e.params.flipEffect.limitRotation&&(m=Math.max(Math.min(r[0].progress,1),-1));const g=r[0].swiperSlideOffset;let f=-180*m,h=0,b=e.params.cssMode?-g-e.translate:-g,v=0;e.isHorizontal()?p&&(f=-f):(v=b,b=0,h=-f,f=0),r[0].style.zIndex=-Math.abs(Math.round(m))+d.length,c.slideShadows&&a(r,m,c);const E=`translate3d(${b}px, ${v}px, 0px) rotateX(${h}deg) rotateY(${f}deg)`;ae(c,r).transform(E)}},setTransition:d=>{const{transformEl:p}=e.params.flipEffect;(p?e.slides.find(p):e.slides).transition(d).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(d),le({swiper:e,duration:d,transformEl:p})},recreateShadows:()=>{const d=e.params.flipEffect;e.slides.each(p=>{const c=T(p);let o=c[0].progress;e.params.flipEffect.limitRotation&&(o=Math.max(Math.min(p.progress,1),-1)),a(c,o,d)})},getEffectParams:()=>e.params.flipEffect,perspective:()=>!0,overwriteParams:()=>({slidesPerView:1,slidesPerGroup:1,watchSlidesProgress:!0,spaceBetween:0,virtualTranslate:!e.params.cssMode})})}function dn(t){let{swiper:e,extendParams:s,on:n}=t;s({coverflowEffect:{rotate:50,stretch:0,depth:100,scale:1,modifier:1,slideShadows:!0,transformEl:null}}),ee({effect:"coverflow",swiper:e,on:n,setTranslate:()=>{const{width:l,height:u,slides:d,slidesSizesGrid:p}=e,c=e.params.coverflowEffect,o=e.isHorizontal(),r=e.translate,m=o?-r+l/2:-r+u/2,g=o?c.rotate:-c.rotate,_=c.depth;for(let f=0,h=d.length;f<h;f+=1){const b=d.eq(f),v=p[f],E=b[0].swiperSlideOffset,L=(m-E-v/2)/v,$=typeof c.modifier=="function"?c.modifier(L):L*c.modifier;let k=o?g*$:0,S=o?0:g*$,I=-_*Math.abs($),C=c.stretch;typeof C=="string"&&C.indexOf("%")!==-1&&(C=parseFloat(c.stretch)/100*v);let y=o?0:C*$,w=o?C*$:0,x=1-(1-c.scale)*Math.abs($);Math.abs(w)<.001&&(w=0),Math.abs(y)<.001&&(y=0),Math.abs(I)<.001&&(I=0),Math.abs(k)<.001&&(k=0),Math.abs(S)<.001&&(S=0),Math.abs(x)<.001&&(x=0);const P=`translate3d(${w}px,${y}px,${I}px)  rotateX(${S}deg) rotateY(${k}deg) scale(${x})`;if(ae(c,b).transform(P),b[0].style.zIndex=-Math.abs(Math.round($))+1,c.slideShadows){let j=o?b.find(".swiper-slide-shadow-left"):b.find(".swiper-slide-shadow-top"),M=o?b.find(".swiper-slide-shadow-right"):b.find(".swiper-slide-shadow-bottom");j.length===0&&(j=te(c,b,o?"left":"top")),M.length===0&&(M=te(c,b,o?"right":"bottom")),j.length&&(j[0].style.opacity=$>0?$:0),M.length&&(M[0].style.opacity=-$>0?-$:0)}}},setTransition:l=>{const{transformEl:u}=e.params.coverflowEffect;(u?e.slides.find(u):e.slides).transition(l).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(l)},perspective:()=>!0,overwriteParams:()=>({watchSlidesProgress:!0})})}function pn(t){let{swiper:e,extendParams:s,on:n}=t;s({creativeEffect:{transformEl:null,limitProgress:1,shadowPerProgress:!1,progressMultiplier:1,perspective:!0,prev:{translate:[0,0,0],rotate:[0,0,0],opacity:1,scale:1},next:{translate:[0,0,0],rotate:[0,0,0],opacity:1,scale:1}}});const a=u=>typeof u=="string"?u:`${u}px`;ee({effect:"creative",swiper:e,on:n,setTranslate:()=>{const{slides:u,$wrapperEl:d,slidesSizesGrid:p}=e,c=e.params.creativeEffect,{progressMultiplier:o}=c,r=e.params.centeredSlides;if(r){const m=p[0]/2-e.params.slidesOffsetBefore||0;d.transform(`translateX(calc(50% - ${m}px))`)}for(let m=0;m<u.length;m+=1){const g=u.eq(m),_=g[0].progress,f=Math.min(Math.max(g[0].progress,-c.limitProgress),c.limitProgress);let h=f;r||(h=Math.min(Math.max(g[0].originalProgress,-c.limitProgress),c.limitProgress));const b=g[0].swiperSlideOffset,v=[e.params.cssMode?-b-e.translate:-b,0,0],E=[0,0,0];let L=!1;e.isHorizontal()||(v[1]=v[0],v[0]=0);let $={translate:[0,0,0],rotate:[0,0,0],scale:1,opacity:1};f<0?($=c.next,L=!0):f>0&&($=c.prev,L=!0),v.forEach((x,P)=>{v[P]=`calc(${x}px + (${a($.translate[P])} * ${Math.abs(f*o)}))`}),E.forEach((x,P)=>{E[P]=$.rotate[P]*Math.abs(f*o)}),g[0].style.zIndex=-Math.abs(Math.round(_))+u.length;const k=v.join(", "),S=`rotateX(${E[0]}deg) rotateY(${E[1]}deg) rotateZ(${E[2]}deg)`,I=h<0?`scale(${1+(1-$.scale)*h*o})`:`scale(${1-(1-$.scale)*h*o})`,C=h<0?1+(1-$.opacity)*h*o:1-(1-$.opacity)*h*o,y=`translate3d(${k}) ${S} ${I}`;if(L&&$.shadow||!L){let x=g.children(".swiper-slide-shadow");if(x.length===0&&$.shadow&&(x=te(c,g)),x.length){const P=c.shadowPerProgress?f*(1/c.limitProgress):f;x[0].style.opacity=Math.min(Math.max(Math.abs(P),0),1)}}const w=ae(c,g);w.transform(y).css({opacity:C}),$.origin&&w.css("transform-origin",$.origin)}},setTransition:u=>{const{transformEl:d}=e.params.creativeEffect;(d?e.slides.find(d):e.slides).transition(u).find(".swiper-slide-shadow").transition(u),le({swiper:e,duration:u,transformEl:d,allSlides:!0})},perspective:()=>e.params.creativeEffect.perspective,overwriteParams:()=>({watchSlidesProgress:!0,virtualTranslate:!e.params.cssMode})})}function un(t){let{swiper:e,extendParams:s,on:n}=t;s({cardsEffect:{slideShadows:!0,transformEl:null,rotate:!0}}),ee({effect:"cards",swiper:e,on:n,setTranslate:()=>{const{slides:l,activeIndex:u}=e,d=e.params.cardsEffect,{startTranslate:p,isTouched:c}=e.touchEventsData,o=e.translate;for(let r=0;r<l.length;r+=1){const m=l.eq(r),g=m[0].progress,_=Math.min(Math.max(g,-4),4);let f=m[0].swiperSlideOffset;e.params.centeredSlides&&!e.params.cssMode&&e.$wrapperEl.transform(`translateX(${e.minTranslate()}px)`),e.params.centeredSlides&&e.params.cssMode&&(f-=l[0].swiperSlideOffset);let h=e.params.cssMode?-f-e.translate:-f,b=0;const v=-100*Math.abs(_);let E=1,L=-2*_,$=8-Math.abs(_)*.75;const k=e.virtual&&e.params.virtual.enabled?e.virtual.from+r:r,S=(k===u||k===u-1)&&_>0&&_<1&&(c||e.params.cssMode)&&o<p,I=(k===u||k===u+1)&&_<0&&_>-1&&(c||e.params.cssMode)&&o>p;if(S||I){const x=(1-Math.abs((Math.abs(_)-.5)/.5))**.5;L+=-28*_*x,E+=-.5*x,$+=96*x,b=`${-25*x*Math.abs(_)}%`}if(_<0?h=`calc(${h}px + (${$*Math.abs(_)}%))`:_>0?h=`calc(${h}px + (-${$*Math.abs(_)}%))`:h=`${h}px`,!e.isHorizontal()){const x=b;b=h,h=x}const C=_<0?`${1+(1-E)*_}`:`${1-(1-E)*_}`,y=`
        translate3d(${h}, ${b}, ${v}px)
        rotateZ(${d.rotate?L:0}deg)
        scale(${C})
      `;if(d.slideShadows){let x=m.find(".swiper-slide-shadow");x.length===0&&(x=te(d,m)),x.length&&(x[0].style.opacity=Math.min(Math.max((Math.abs(_)-.5)/.5,0),1))}m[0].style.zIndex=-Math.abs(Math.round(g))+l.length,ae(d,m).transform(y)}},setTransition:l=>{const{transformEl:u}=e.params.cardsEffect;(u?e.slides.find(u):e.slides).transition(l).find(".swiper-slide-shadow").transition(l),le({swiper:e,duration:l,transformEl:u})},perspective:()=>!0,overwriteParams:()=>({watchSlidesProgress:!0,virtualTranslate:!e.params.cssMode})})}const fn=[zs,Rs,Bs,Hs,Ws,Ns,qs,Ys,Gs,Us,Vs,Xs,Ks,Fs,Zs,Js,Qs,rn,on,ln,cn,dn,pn,un];return X.use(fn),X});new HSMegaMenu(".js-mega-menu",{desktop:{position:"left"}});new Swiper(".js-swiper-shop-hero-thumbs",{watchSlidesVisibility:!0,watchSlidesProgress:!0,history:!1,slidesPerView:3,spaceBetween:15,on:{beforeInit:Y=>{const N=`.swiper-slide-thumb-active .swiper-thumb-progress .swiper-thumb-progress-path {
                opacity: 1;
                -webkit-animation: ${Y.originalParams.autoplay.delay}ms linear 0ms forwards swiperThumbProgressDash;
                animation: ${Y.originalParams.autoplay.delay}ms linear 0ms forwards swiperThumbProgressDash;
            }`;let H=document.createElement("style");document.head.appendChild(H),H.setAttribute("type","text/css"),H.appendChild(document.createTextNode(N)),Y.el.querySelectorAll(".js-swiper-thumb-progress").forEach(A=>{A.insertAdjacentHTML("beforeend",'<span class="swiper-thumb-progress"><svg version="1.1" viewBox="0 0 160 160"><path class="swiper-thumb-progress-path" d="M 79.98452083651917 4.000001576345426 A 76 76 0 1 1 79.89443752470656 4.0000733121155605 Z"></path></svg></span>')})}}});new Swiper(".js-swiper-shop-classic-hero",{autoplay:!0,loop:!0,navigation:{nextEl:".js-swiper-shop-classic-hero-button-next",prevEl:".js-swiper-shop-classic-hero-button-prev"}});new Swiper(".swiper",{direction:"horizontal",loop:!0,pagination:{el:".swiper-pagination"},navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},scrollbar:{el:".swiper-scrollbar"}})});export default hn();
