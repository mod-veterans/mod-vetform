/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

/* provided dependency */ var process = __webpack_require__(/*! process/browser */ "./node_modules/process/browser.js");
var _window$GOVUK$getCons, _window$GOVUK$getCons2;

function _createForOfIteratorHelper(o, allowArrayLike) { var it; if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

// require('./bootstrap');
(function (root) {
  'use strict';

  window.GOVUK = window.GOVUK || {};
  console.log(window.GOVUKFrontend);
  var DEFAULT_COOKIE_CONSENT = {
    'essential': true,
    'settings': false,
    'usage': false,
    'campaigns': false
  };
  var COOKIE_CATEGORIES = {
    'cookies_policy': 'essential',
    'seen_cookie_message': 'essential',
    'cookie_preferences_set': 'essential',
    'cookies_preferences_set': 'essential',
    '_email-alert-frontend_session': 'essential',
    'licensing_session': 'essential',
    'govuk_contact_referrer': 'essential',
    'global_bar_seen': 'settings',
    'govuk_browser_upgrade_dismisssed': 'settings',
    'govuk_not_first_visit': 'settings',
    'analytics_next_page_call': 'usage',
    '_ga': 'usage',
    '_gid': 'usage',
    '_gat': 'usage',
    'JS-Detection': 'usage',
    'TLSversion': 'usage'
  };
  /*
    Cookie methods
    ==============
    Usage:
      Setting a cookie:
      GOVUK.cookie('hobnob', 'tasty', { days: 30 });
      Reading a cookie:
      GOVUK.cookie('hobnob');
      Deleting a cookie:
      GOVUK.cookie('hobnob', null);
  */

  window.GOVUK.cookie = function (name, value, options) {
    if (typeof value !== 'undefined') {
      if (value === false || value === null) {
        return window.GOVUK.setCookie(name, '', {
          days: -1
        });
      } else {
        // Default expiry date of 30 days
        if (typeof options === 'undefined') {
          options = {
            days: 30
          };
        }

        return window.GOVUK.setCookie(name, value, options);
      }
    } else {
      return window.GOVUK.getCookie(name);
    }
  };

  window.GOVUK.setDefaultConsentCookie = function () {
    window.GOVUK.setConsentCookie(DEFAULT_COOKIE_CONSENT);
  };

  window.GOVUK.approveAllCookieTypes = function () {
    var approvedConsent = {
      'essential': true,
      'settings': true,
      'usage': true,
      'campaigns': true
    };
    window.GOVUK.setCookie('cookies_policy', JSON.stringify(approvedConsent), {
      days: 0
    });
  };

  window.GOVUK.setUsageCookieValue = function (value) {
    console.log('Setting usaage to: ', value);
    var consentCookie = window.GOVUK.getConsentCookie();
    consentCookie['usage'] = value;
    window.GOVUK.setCookie('cookies_policy', JSON.stringify(consentCookie), {
      days: 0
    });
  };

  window.GOVUK.getConsentCookie = function () {
    var consentCookie = window.GOVUK.cookie('cookies_policy');
    var consentCookieObj;

    if (consentCookie) {
      try {
        consentCookieObj = JSON.parse(consentCookie);
      } catch (err) {
        return null;
      }

      if (_typeof(consentCookieObj) !== 'object' && consentCookieObj !== null) {
        consentCookieObj = JSON.parse(consentCookieObj);
      }
    } else {
      return null;
    }

    return consentCookieObj;
  };

  window.GOVUK.setConsentCookie = function (options) {
    var cookieConsent = window.GOVUK.getConsentCookie();

    if (!cookieConsent) {
      cookieConsent = JSON.parse(JSON.stringify(DEFAULT_COOKIE_CONSENT));
    }

    for (var cookieType in options) {
      cookieConsent[cookieType] = options[cookieType]; // Delete cookies of that type if consent being set to false

      if (!options[cookieType]) {
        for (var cookie in COOKIE_CATEGORIES) {
          if (COOKIE_CATEGORIES[cookie] === cookieType) {
            window.GOVUK.deleteCookie(cookie);
          }
        }
      }
    }

    window.GOVUK.setCookie('cookies_policy', JSON.stringify(cookieConsent), {
      days: 0
    });
  };

  window.GOVUK.checkConsentCookieCategory = function (cookieName, cookieCategory) {
    var currentConsentCookie = window.GOVUK.getConsentCookie(); // If the consent cookie doesn't exist, but the cookie is in our known list, return true

    if (!currentConsentCookie && COOKIE_CATEGORIES[cookieName]) {
      return true;
    }

    currentConsentCookie = window.GOVUK.getConsentCookie(); // Sometimes currentConsentCookie is malformed in some of the tests, so we need to handle these

    try {
      return currentConsentCookie[cookieCategory];
    } catch (e) {
      console.error(e);
      return false;
    }
  };

  window.GOVUK.checkConsentCookie = function (cookieName, cookieValue) {
    // If we're setting the consent cookie OR deleting a cookie, allow by default
    if (cookieName === 'cookies_policy' || cookieValue === null || cookieValue === false) {
      return true;
    } // Survey cookies are dynamically generated, so we need to check for these separately


    if (cookieName.match('^govuk_surveySeen') || cookieName.match('^govuk_taken')) {
      return window.GOVUK.checkConsentCookieCategory(cookieName, 'settings');
    }

    if (COOKIE_CATEGORIES[cookieName]) {
      var cookieCategory = COOKIE_CATEGORIES[cookieName];
      return window.GOVUK.checkConsentCookieCategory(cookieName, cookieCategory);
    } else {
      // Deny the cookie if it is not known to us
      return false;
    }
  };

  window.GOVUK.setCookie = function (name, value, options) {
    if (window.GOVUK.checkConsentCookie(name, value)) {
      if (typeof options === 'undefined') {
        options = {};
      }

      var cookieString = name + '=' + value + '; path=/';

      if (options.days) {
        var date = new Date();
        date.setTime(date.getTime() + options.days * 24 * 60 * 60 * 1000);
        cookieString = cookieString + '; expires=' + date.toGMTString();
      }

      if (document.location.protocol === 'https:') {
        cookieString = cookieString + '; Secure';
      }

      document.cookie = cookieString;
    }
  };

  window.GOVUK.getCookie = function (name) {
    var nameEQ = name + '=';
    var cookies = document.cookie.split(';');

    for (var i = 0, len = cookies.length; i < len; i++) {
      var cookie = cookies[i];

      while (cookie.charAt(0) === ' ') {
        cookie = cookie.substring(1, cookie.length);
      }

      if (cookie.indexOf(nameEQ) === 0) {
        return decodeURIComponent(cookie.substring(nameEQ.length));
      }
    }

    return null;
  };

  window.GOVUK.getCookieCategory = function (cookie) {
    return COOKIE_CATEGORIES[cookie];
  };

  window.GOVUK.deleteCookie = function (cookie) {
    window.GOVUK.cookie(cookie, null);

    if (window.GOVUK.cookie(cookie)) {
      // We need to handle deleting cookies on the domain and the .domain
      document.cookie = cookie + '=;expires=' + new Date() + ';';
      document.cookie = cookie + '=;expires=' + new Date() + ';domain=' + window.location.hostname + ';path=/';
    }
  };

  window.GOVUK.deleteUnconsentedCookies = function () {
    var currentConsent = window.GOVUK.getConsentCookie();

    for (var cookieType in currentConsent) {
      // Delete cookies of that type if consent being set to false
      if (!currentConsent[cookieType]) {
        for (var cookie in COOKIE_CATEGORIES) {
          if (COOKIE_CATEGORIES[cookie] === cookieType) {
            window.GOVUK.deleteCookie(cookie);
          }
        }
      }
    }
  };

  window.GOVUKFrontend.CookieBanner = {
    init: function init() {
      window.GOVUK = window.GOVUK || {};

      if (!window.GOVUK.cookie('cookies_policy')) {
        window.GOVUK.setDefaultConsentCookie();
      }

      this.cookieBanner = document.getElementById('global-cookie-message');
      this.cookieBannerConfirmationMessage = document.querySelector('.govuk-cookie-message__accepted');
      this.setUpCookieMessage();
    },
    setUpCookieMessage: function setUpCookieMessage() {
      this.hideLink = document.querySelector('.govuk-hide-button');

      if (this.hideLink) {
        this.hideLink.addEventListener('click', this.hideCookieMessage);
      }

      this.acceptCookiesLink = document.querySelector('button[data-accept-cookies]');

      if (this.acceptCookiesLink) {
        this.acceptCookiesLink.addEventListener('click', this.setCookieConsent.bind(this));
      }

      this.showCookieMessage();
    },
    showCookieMessage: function showCookieMessage() {
      var shouldHaveCoookieMessage = window.GOVUK.cookie('cookies_preferences_set') !== 'true';

      if (shouldHaveCoookieMessage) {
        if (this.cookieBanner) {
          this.cookieBanner.style.display = 'block';

          if (!window.GOVUK.cookie('cookies_policy')) {
            window.GOVUK.setDefaultConsentCookie();
          }
        }

        window.GOVUK.deleteUnconsentedCookies();
      } else {
        this.cookieBanner.style.display = 'none';
      }
    },
    hideCookieMessage: function hideCookieMessage(event) {
      //if (this.cookieBanner) {
      document.getElementById('global-cookie-message').style.display = 'none'; // this.cookieBanner.style.display = 'none';

      window.GOVUK.cookie('cookies_preferences_set', 'true', {
        days: 0
      }); //}

      if (event && event.target) {
        event.preventDefault();
      }
    },
    showConfirmationMessage: function showConfirmationMessage() {
      this.cookieBannerMainContent = document.querySelector('.govuk-cookie-message__request');
      this.cookieBannerMainContent.style.display = 'none';
      this.cookieBannerConfirmationMessage.style.display = 'block';
    },
    setCookieConsent: function setCookieConsent() {
      window.GOVUK.approveAllCookieTypes();
      this.showConfirmationMessage();
      this.cookieBannerConfirmationMessage.focus();
      window.GOVUK.cookie('cookies_preferences_set', true, {
        days: 0
      });

      if (window.GOVUK.analyticsInit) {
        window.GOVUK.analyticsInit();
      }
    }
  };
})(window);

window["ga-disable-".concat(process.env['MIX_GA_ID'])] = (_window$GOVUK$getCons = (_window$GOVUK$getCons2 = window.GOVUK.getConsentCookie()) === null || _window$GOVUK$getCons2 === void 0 ? void 0 : _window$GOVUK$getCons2.usage) !== null && _window$GOVUK$getCons !== void 0 ? _window$GOVUK$getCons : false;
var cookiePreferenceForm = document.getElementById('cookie-usage-preference-form');

if (cookiePreferenceForm) {
  cookiePreferenceForm.addEventListener('submit', function (event) {
    var items = document.getElementsByName('allow-usage');

    var _iterator = _createForOfIteratorHelper(items),
        _step;

    try {
      for (_iterator.s(); !(_step = _iterator.n()).done;) {
        var item = _step.value;

        if (item.nodeName.toLowerCase() === 'input') {
          if (item.checked) {
            window.GOVUK.setUsageCookieValue(item.value !== 'No');
            window["ga-disable-".concat(process.env['MIX_GA_ID'])] = item.value !== 'No';
          }
        }
      }
    } catch (err) {
      _iterator.e(err);
    } finally {
      _iterator.f();
    }
  });
}

/***/ }),

/***/ "./resources/scss/all.scss":
/*!*********************************!*\
  !*** ./resources/scss/all.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/scss/all-ie8.scss":
/*!*************************************!*\
  !*** ./resources/scss/all-ie8.scss ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./node_modules/process/browser.js":
/*!*****************************************!*\
  !*** ./node_modules/process/browser.js ***!
  \*****************************************/
/***/ ((module) => {

// shim for using process in browser
var process = module.exports = {};

// cached from whatever global is present so that test runners that stub it
// don't break things.  But we need to wrap it in a try catch in case it is
// wrapped in strict mode code which doesn't define any globals.  It's inside a
// function because try/catches deoptimize in certain engines.

var cachedSetTimeout;
var cachedClearTimeout;

function defaultSetTimout() {
    throw new Error('setTimeout has not been defined');
}
function defaultClearTimeout () {
    throw new Error('clearTimeout has not been defined');
}
(function () {
    try {
        if (typeof setTimeout === 'function') {
            cachedSetTimeout = setTimeout;
        } else {
            cachedSetTimeout = defaultSetTimout;
        }
    } catch (e) {
        cachedSetTimeout = defaultSetTimout;
    }
    try {
        if (typeof clearTimeout === 'function') {
            cachedClearTimeout = clearTimeout;
        } else {
            cachedClearTimeout = defaultClearTimeout;
        }
    } catch (e) {
        cachedClearTimeout = defaultClearTimeout;
    }
} ())
function runTimeout(fun) {
    if (cachedSetTimeout === setTimeout) {
        //normal enviroments in sane situations
        return setTimeout(fun, 0);
    }
    // if setTimeout wasn't available but was latter defined
    if ((cachedSetTimeout === defaultSetTimout || !cachedSetTimeout) && setTimeout) {
        cachedSetTimeout = setTimeout;
        return setTimeout(fun, 0);
    }
    try {
        // when when somebody has screwed with setTimeout but no I.E. maddness
        return cachedSetTimeout(fun, 0);
    } catch(e){
        try {
            // When we are in I.E. but the script has been evaled so I.E. doesn't trust the global object when called normally
            return cachedSetTimeout.call(null, fun, 0);
        } catch(e){
            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error
            return cachedSetTimeout.call(this, fun, 0);
        }
    }


}
function runClearTimeout(marker) {
    if (cachedClearTimeout === clearTimeout) {
        //normal enviroments in sane situations
        return clearTimeout(marker);
    }
    // if clearTimeout wasn't available but was latter defined
    if ((cachedClearTimeout === defaultClearTimeout || !cachedClearTimeout) && clearTimeout) {
        cachedClearTimeout = clearTimeout;
        return clearTimeout(marker);
    }
    try {
        // when when somebody has screwed with setTimeout but no I.E. maddness
        return cachedClearTimeout(marker);
    } catch (e){
        try {
            // When we are in I.E. but the script has been evaled so I.E. doesn't  trust the global object when called normally
            return cachedClearTimeout.call(null, marker);
        } catch (e){
            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error.
            // Some versions of I.E. have different rules for clearTimeout vs setTimeout
            return cachedClearTimeout.call(this, marker);
        }
    }



}
var queue = [];
var draining = false;
var currentQueue;
var queueIndex = -1;

function cleanUpNextTick() {
    if (!draining || !currentQueue) {
        return;
    }
    draining = false;
    if (currentQueue.length) {
        queue = currentQueue.concat(queue);
    } else {
        queueIndex = -1;
    }
    if (queue.length) {
        drainQueue();
    }
}

function drainQueue() {
    if (draining) {
        return;
    }
    var timeout = runTimeout(cleanUpNextTick);
    draining = true;

    var len = queue.length;
    while(len) {
        currentQueue = queue;
        queue = [];
        while (++queueIndex < len) {
            if (currentQueue) {
                currentQueue[queueIndex].run();
            }
        }
        queueIndex = -1;
        len = queue.length;
    }
    currentQueue = null;
    draining = false;
    runClearTimeout(timeout);
}

process.nextTick = function (fun) {
    var args = new Array(arguments.length - 1);
    if (arguments.length > 1) {
        for (var i = 1; i < arguments.length; i++) {
            args[i - 1] = arguments[i];
        }
    }
    queue.push(new Item(fun, args));
    if (queue.length === 1 && !draining) {
        runTimeout(drainQueue);
    }
};

// v8 likes predictible objects
function Item(fun, array) {
    this.fun = fun;
    this.array = array;
}
Item.prototype.run = function () {
    this.fun.apply(null, this.array);
};
process.title = 'browser';
process.browser = true;
process.env = {};
process.argv = [];
process.version = ''; // empty string to avoid regexp issues
process.versions = {};

function noop() {}

process.on = noop;
process.addListener = noop;
process.once = noop;
process.off = noop;
process.removeListener = noop;
process.removeAllListeners = noop;
process.emit = noop;
process.prependListener = noop;
process.prependOnceListener = noop;

process.listeners = function (name) { return [] }

process.binding = function (name) {
    throw new Error('process.binding is not supported');
};

process.cwd = function () { return '/' };
process.chdir = function (dir) {
    throw new Error('process.chdir is not supported');
};
process.umask = function() { return 0; };


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		if(__webpack_module_cache__[moduleId]) {
/******/ 			return __webpack_module_cache__[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/
/******/ 	// the startup function
/******/ 	// It's empty as some runtime module handles the default behavior
/******/ 	__webpack_require__.x = x => {};
/************************************************************************/
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// Promise = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0
/******/ 		};
/******/
/******/ 		var deferredModules = [
/******/ 			["./resources/js/app.js"],
/******/ 			["./resources/scss/all.scss"],
/******/ 			["./resources/scss/all-ie8.scss"]
/******/ 		];
/******/ 		// no chunk on demand loading
/******/
/******/ 		// no prefetching
/******/
/******/ 		// no preloaded
/******/
/******/ 		// no HMR
/******/
/******/ 		// no HMR manifest
/******/
/******/ 		var checkDeferredModules = x => {};
/******/
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime, executeModules] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0, resolves = [];
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					resolves.push(installedChunks[chunkId][0]);
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			for(moduleId in moreModules) {
/******/ 				if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 					__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 				}
/******/ 			}
/******/ 			if(runtime) runtime(__webpack_require__);
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			while(resolves.length) {
/******/ 				resolves.shift()();
/******/ 			}
/******/
/******/ 			// add entry modules from loaded chunk to deferred list
/******/ 			if(executeModules) deferredModules.push.apply(deferredModules, executeModules);
/******/
/******/ 			// run deferred modules when all chunks ready
/******/ 			return checkDeferredModules();
/******/ 		}
/******/
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/
/******/ 		function checkDeferredModulesImpl() {
/******/ 			var result;
/******/ 			for(var i = 0; i < deferredModules.length; i++) {
/******/ 				var deferredModule = deferredModules[i];
/******/ 				var fulfilled = true;
/******/ 				for(var j = 1; j < deferredModule.length; j++) {
/******/ 					var depId = deferredModule[j];
/******/ 					if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferredModules.splice(i--, 1);
/******/ 					result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 				}
/******/ 			}
/******/ 			if(deferredModules.length === 0) {
/******/ 				__webpack_require__.x();
/******/ 				__webpack_require__.x = x => {};
/******/ 			}
/******/ 			return result;
/******/ 		}
/******/ 		var startup = __webpack_require__.x;
/******/ 		__webpack_require__.x = () => {
/******/ 			// reset startup function so it can be called again when more startup code is added
/******/ 			__webpack_require__.x = startup || (x => {});
/******/ 			return (checkDeferredModules = checkDeferredModulesImpl)();
/******/ 		};
/******/ 	})();
/******/
/************************************************************************/
/******/
/******/ 	// run startup
/******/ 	var __webpack_exports__ = __webpack_require__.x();
/******/
/******/ })()
;
