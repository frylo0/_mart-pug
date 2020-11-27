/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/mini-css-extract-plugin/dist/loader.js?!./node_modules/css-loader/dist/cjs.js?!./node_modules/postcss-loader/src/index.js!./node_modules/sass-loader/dist/cjs.js!./src/Pages/index/index.sass":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/mini-css-extract-plugin/dist/loader.js??ref--5-1!./node_modules/css-loader/dist/cjs.js??ref--5-2!./node_modules/postcss-loader/src!./node_modules/sass-loader/dist/cjs.js!./src/Pages/index/index.sass ***!
  \*****************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin
    if(false) { var cssReload; }
  

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js":
/*!****************************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js ***!
  \****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var isOldIE = function isOldIE() {
  var memo;
  return function memorize() {
    if (typeof memo === 'undefined') {
      // Test for IE <= 9 as proposed by Browserhacks
      // @see http://browserhacks.com/#hack-e71d8692f65334173fee715c222cb805
      // Tests for existence of standard globals is to allow style-loader
      // to operate correctly into non-standard environments
      // @see https://github.com/webpack-contrib/style-loader/issues/177
      memo = Boolean(window && document && document.all && !window.atob);
    }

    return memo;
  };
}();

var getTarget = function getTarget() {
  var memo = {};
  return function memorize(target) {
    if (typeof memo[target] === 'undefined') {
      var styleTarget = document.querySelector(target); // Special case to return head of iframe instead of iframe itself

      if (window.HTMLIFrameElement && styleTarget instanceof window.HTMLIFrameElement) {
        try {
          // This will throw an exception if access to iframe is blocked
          // due to cross-origin restrictions
          styleTarget = styleTarget.contentDocument.head;
        } catch (e) {
          // istanbul ignore next
          styleTarget = null;
        }
      }

      memo[target] = styleTarget;
    }

    return memo[target];
  };
}();

var stylesInDom = [];

function getIndexByIdentifier(identifier) {
  var result = -1;

  for (var i = 0; i < stylesInDom.length; i++) {
    if (stylesInDom[i].identifier === identifier) {
      result = i;
      break;
    }
  }

  return result;
}

function modulesToDom(list, options) {
  var idCountMap = {};
  var identifiers = [];

  for (var i = 0; i < list.length; i++) {
    var item = list[i];
    var id = options.base ? item[0] + options.base : item[0];
    var count = idCountMap[id] || 0;
    var identifier = "".concat(id, " ").concat(count);
    idCountMap[id] = count + 1;
    var index = getIndexByIdentifier(identifier);
    var obj = {
      css: item[1],
      media: item[2],
      sourceMap: item[3]
    };

    if (index !== -1) {
      stylesInDom[index].references++;
      stylesInDom[index].updater(obj);
    } else {
      stylesInDom.push({
        identifier: identifier,
        updater: addStyle(obj, options),
        references: 1
      });
    }

    identifiers.push(identifier);
  }

  return identifiers;
}

function insertStyleElement(options) {
  var style = document.createElement('style');
  var attributes = options.attributes || {};

  if (typeof attributes.nonce === 'undefined') {
    var nonce =  true ? __webpack_require__.nc : undefined;

    if (nonce) {
      attributes.nonce = nonce;
    }
  }

  Object.keys(attributes).forEach(function (key) {
    style.setAttribute(key, attributes[key]);
  });

  if (typeof options.insert === 'function') {
    options.insert(style);
  } else {
    var target = getTarget(options.insert || 'head');

    if (!target) {
      throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");
    }

    target.appendChild(style);
  }

  return style;
}

function removeStyleElement(style) {
  // istanbul ignore if
  if (style.parentNode === null) {
    return false;
  }

  style.parentNode.removeChild(style);
}
/* istanbul ignore next  */


var replaceText = function replaceText() {
  var textStore = [];
  return function replace(index, replacement) {
    textStore[index] = replacement;
    return textStore.filter(Boolean).join('\n');
  };
}();

function applyToSingletonTag(style, index, remove, obj) {
  var css = remove ? '' : obj.media ? "@media ".concat(obj.media, " {").concat(obj.css, "}") : obj.css; // For old IE

  /* istanbul ignore if  */

  if (style.styleSheet) {
    style.styleSheet.cssText = replaceText(index, css);
  } else {
    var cssNode = document.createTextNode(css);
    var childNodes = style.childNodes;

    if (childNodes[index]) {
      style.removeChild(childNodes[index]);
    }

    if (childNodes.length) {
      style.insertBefore(cssNode, childNodes[index]);
    } else {
      style.appendChild(cssNode);
    }
  }
}

function applyToTag(style, options, obj) {
  var css = obj.css;
  var media = obj.media;
  var sourceMap = obj.sourceMap;

  if (media) {
    style.setAttribute('media', media);
  } else {
    style.removeAttribute('media');
  }

  if (sourceMap && btoa) {
    css += "\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))), " */");
  } // For old IE

  /* istanbul ignore if  */


  if (style.styleSheet) {
    style.styleSheet.cssText = css;
  } else {
    while (style.firstChild) {
      style.removeChild(style.firstChild);
    }

    style.appendChild(document.createTextNode(css));
  }
}

var singleton = null;
var singletonCounter = 0;

function addStyle(obj, options) {
  var style;
  var update;
  var remove;

  if (options.singleton) {
    var styleIndex = singletonCounter++;
    style = singleton || (singleton = insertStyleElement(options));
    update = applyToSingletonTag.bind(null, style, styleIndex, false);
    remove = applyToSingletonTag.bind(null, style, styleIndex, true);
  } else {
    style = insertStyleElement(options);
    update = applyToTag.bind(null, style, options);

    remove = function remove() {
      removeStyleElement(style);
    };
  }

  update(obj);
  return function updateStyle(newObj) {
    if (newObj) {
      if (newObj.css === obj.css && newObj.media === obj.media && newObj.sourceMap === obj.sourceMap) {
        return;
      }

      update(obj = newObj);
    } else {
      remove();
    }
  };
}

module.exports = function (list, options) {
  options = options || {}; // Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
  // tags it will allow on a page

  if (!options.singleton && typeof options.singleton !== 'boolean') {
    options.singleton = isOldIE();
  }

  list = list || [];
  var lastIdentifiers = modulesToDom(list, options);
  return function update(newList) {
    newList = newList || [];

    if (Object.prototype.toString.call(newList) !== '[object Array]') {
      return;
    }

    for (var i = 0; i < lastIdentifiers.length; i++) {
      var identifier = lastIdentifiers[i];
      var index = getIndexByIdentifier(identifier);
      stylesInDom[index].references--;
    }

    var newLastIdentifiers = modulesToDom(newList, options);

    for (var _i = 0; _i < lastIdentifiers.length; _i++) {
      var _identifier = lastIdentifiers[_i];

      var _index = getIndexByIdentifier(_identifier);

      if (stylesInDom[_index].references === 0) {
        stylesInDom[_index].updater();

        stylesInDom.splice(_index, 1);
      }
    }

    lastIdentifiers = newLastIdentifiers;
  };
};

/***/ }),

/***/ "./src/Attach sync recursive \\.":
/*!****************************!*\
  !*** ./src/Attach sync \. ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./Fonts/Arsenal-Bold.ttf": "./src/Attach/Fonts/Arsenal-Bold.ttf",
	"./Fonts/Arsenal-Italic.ttf": "./src/Attach/Fonts/Arsenal-Italic.ttf",
	"./Fonts/Raleway-Regular.ttf": "./src/Attach/Fonts/Raleway-Regular.ttf",
	"./Fonts/more/Arsenal-BoldItalic.ttf": "./src/Attach/Fonts/more/Arsenal-BoldItalic.ttf",
	"./Fonts/more/Arsenal-Regular.ttf": "./src/Attach/Fonts/more/Arsenal-Regular.ttf",
	"./Fonts/more/Raleway-Black.ttf": "./src/Attach/Fonts/more/Raleway-Black.ttf",
	"./Fonts/more/Raleway-BlackItalic.ttf": "./src/Attach/Fonts/more/Raleway-BlackItalic.ttf",
	"./Fonts/more/Raleway-Bold.ttf": "./src/Attach/Fonts/more/Raleway-Bold.ttf",
	"./Fonts/more/Raleway-BoldItalic.ttf": "./src/Attach/Fonts/more/Raleway-BoldItalic.ttf",
	"./Fonts/more/Raleway-ExtraBold.ttf": "./src/Attach/Fonts/more/Raleway-ExtraBold.ttf",
	"./Fonts/more/Raleway-ExtraBoldItalic.ttf": "./src/Attach/Fonts/more/Raleway-ExtraBoldItalic.ttf",
	"./Fonts/more/Raleway-ExtraLight.ttf": "./src/Attach/Fonts/more/Raleway-ExtraLight.ttf",
	"./Fonts/more/Raleway-ExtraLightItalic.ttf": "./src/Attach/Fonts/more/Raleway-ExtraLightItalic.ttf",
	"./Fonts/more/Raleway-Italic.ttf": "./src/Attach/Fonts/more/Raleway-Italic.ttf",
	"./Fonts/more/Raleway-Light.ttf": "./src/Attach/Fonts/more/Raleway-Light.ttf",
	"./Fonts/more/Raleway-LightItalic.ttf": "./src/Attach/Fonts/more/Raleway-LightItalic.ttf",
	"./Fonts/more/Raleway-Medium.ttf": "./src/Attach/Fonts/more/Raleway-Medium.ttf",
	"./Fonts/more/Raleway-MediumItalic.ttf": "./src/Attach/Fonts/more/Raleway-MediumItalic.ttf",
	"./Fonts/more/Raleway-SemiBold.ttf": "./src/Attach/Fonts/more/Raleway-SemiBold.ttf",
	"./Fonts/more/Raleway-SemiBoldItalic.ttf": "./src/Attach/Fonts/more/Raleway-SemiBoldItalic.ttf",
	"./Fonts/more/Raleway-Thin.ttf": "./src/Attach/Fonts/more/Raleway-Thin.ttf",
	"./Fonts/more/Raleway-ThinItalic.ttf": "./src/Attach/Fonts/more/Raleway-ThinItalic.ttf",
	"./Images/back.jpg": "./src/Attach/Images/back.jpg",
	"./Images/boat1.jpg": "./src/Attach/Images/boat1.jpg",
	"./Images/boat10.jpg": "./src/Attach/Images/boat10.jpg",
	"./Images/boat11.jpg": "./src/Attach/Images/boat11.jpg",
	"./Images/boat2.jpg": "./src/Attach/Images/boat2.jpg",
	"./Images/boat3.jpg": "./src/Attach/Images/boat3.jpg",
	"./Images/boat4.jpg": "./src/Attach/Images/boat4.jpg",
	"./Images/boat5.jpg": "./src/Attach/Images/boat5.jpg",
	"./Images/boat6.jpg": "./src/Attach/Images/boat6.jpg",
	"./Images/boat7.jpg": "./src/Attach/Images/boat7.jpg",
	"./Images/boat8.jpg": "./src/Attach/Images/boat8.jpg",
	"./Images/boat9.jpg": "./src/Attach/Images/boat9.jpg",
	"./Images/button.jpg": "./src/Attach/Images/button.jpg",
	"./Images/diving-icon.svg": "./src/Attach/Images/diving-icon.svg",
	"./Images/fish-icon.svg": "./src/Attach/Images/fish-icon.svg",
	"./Images/food-icon.svg": "./src/Attach/Images/food-icon.svg",
	"./Images/logo-dark.svg": "./src/Attach/Images/logo-dark.svg",
	"./Images/logo-light.svg": "./src/Attach/Images/logo-light.svg"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./src/Attach sync recursive \\.";

/***/ }),

/***/ "./src/Attach/Fonts/Arsenal-Bold.ttf":
/*!*******************************************!*\
  !*** ./src/Attach/Fonts/Arsenal-Bold.ttf ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/font/Arsenal-Bold.ttf");

/***/ }),

/***/ "./src/Attach/Fonts/Arsenal-Italic.ttf":
/*!*********************************************!*\
  !*** ./src/Attach/Fonts/Arsenal-Italic.ttf ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/font/Arsenal-Italic.ttf");

/***/ }),

/***/ "./src/Attach/Fonts/Raleway-Regular.ttf":
/*!**********************************************!*\
  !*** ./src/Attach/Fonts/Raleway-Regular.ttf ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/font/Raleway-Regular.ttf");

/***/ }),

/***/ "./src/Attach/Fonts/more/Arsenal-BoldItalic.ttf":
/*!******************************************************!*\
  !*** ./src/Attach/Fonts/more/Arsenal-BoldItalic.ttf ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/font/Arsenal-BoldItalic.ttf");

/***/ }),

/***/ "./src/Attach/Fonts/more/Arsenal-Regular.ttf":
/*!***************************************************!*\
  !*** ./src/Attach/Fonts/more/Arsenal-Regular.ttf ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/font/Arsenal-Regular.ttf");

/***/ }),

/***/ "./src/Attach/Fonts/more/Raleway-Black.ttf":
/*!*************************************************!*\
  !*** ./src/Attach/Fonts/more/Raleway-Black.ttf ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/font/Raleway-Black.ttf");

/***/ }),

/***/ "./src/Attach/Fonts/more/Raleway-BlackItalic.ttf":
/*!*******************************************************!*\
  !*** ./src/Attach/Fonts/more/Raleway-BlackItalic.ttf ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/font/Raleway-BlackItalic.ttf");

/***/ }),

/***/ "./src/Attach/Fonts/more/Raleway-Bold.ttf":
/*!************************************************!*\
  !*** ./src/Attach/Fonts/more/Raleway-Bold.ttf ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/font/Raleway-Bold.ttf");

/***/ }),

/***/ "./src/Attach/Fonts/more/Raleway-BoldItalic.ttf":
/*!******************************************************!*\
  !*** ./src/Attach/Fonts/more/Raleway-BoldItalic.ttf ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/font/Raleway-BoldItalic.ttf");

/***/ }),

/***/ "./src/Attach/Fonts/more/Raleway-ExtraBold.ttf":
/*!*****************************************************!*\
  !*** ./src/Attach/Fonts/more/Raleway-ExtraBold.ttf ***!
  \*****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/font/Raleway-ExtraBold.ttf");

/***/ }),

/***/ "./src/Attach/Fonts/more/Raleway-ExtraBoldItalic.ttf":
/*!***********************************************************!*\
  !*** ./src/Attach/Fonts/more/Raleway-ExtraBoldItalic.ttf ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/font/Raleway-ExtraBoldItalic.ttf");

/***/ }),

/***/ "./src/Attach/Fonts/more/Raleway-ExtraLight.ttf":
/*!******************************************************!*\
  !*** ./src/Attach/Fonts/more/Raleway-ExtraLight.ttf ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/font/Raleway-ExtraLight.ttf");

/***/ }),

/***/ "./src/Attach/Fonts/more/Raleway-ExtraLightItalic.ttf":
/*!************************************************************!*\
  !*** ./src/Attach/Fonts/more/Raleway-ExtraLightItalic.ttf ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/font/Raleway-ExtraLightItalic.ttf");

/***/ }),

/***/ "./src/Attach/Fonts/more/Raleway-Italic.ttf":
/*!**************************************************!*\
  !*** ./src/Attach/Fonts/more/Raleway-Italic.ttf ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/font/Raleway-Italic.ttf");

/***/ }),

/***/ "./src/Attach/Fonts/more/Raleway-Light.ttf":
/*!*************************************************!*\
  !*** ./src/Attach/Fonts/more/Raleway-Light.ttf ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/font/Raleway-Light.ttf");

/***/ }),

/***/ "./src/Attach/Fonts/more/Raleway-LightItalic.ttf":
/*!*******************************************************!*\
  !*** ./src/Attach/Fonts/more/Raleway-LightItalic.ttf ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/font/Raleway-LightItalic.ttf");

/***/ }),

/***/ "./src/Attach/Fonts/more/Raleway-Medium.ttf":
/*!**************************************************!*\
  !*** ./src/Attach/Fonts/more/Raleway-Medium.ttf ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/font/Raleway-Medium.ttf");

/***/ }),

/***/ "./src/Attach/Fonts/more/Raleway-MediumItalic.ttf":
/*!********************************************************!*\
  !*** ./src/Attach/Fonts/more/Raleway-MediumItalic.ttf ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/font/Raleway-MediumItalic.ttf");

/***/ }),

/***/ "./src/Attach/Fonts/more/Raleway-SemiBold.ttf":
/*!****************************************************!*\
  !*** ./src/Attach/Fonts/more/Raleway-SemiBold.ttf ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/font/Raleway-SemiBold.ttf");

/***/ }),

/***/ "./src/Attach/Fonts/more/Raleway-SemiBoldItalic.ttf":
/*!**********************************************************!*\
  !*** ./src/Attach/Fonts/more/Raleway-SemiBoldItalic.ttf ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/font/Raleway-SemiBoldItalic.ttf");

/***/ }),

/***/ "./src/Attach/Fonts/more/Raleway-Thin.ttf":
/*!************************************************!*\
  !*** ./src/Attach/Fonts/more/Raleway-Thin.ttf ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/font/Raleway-Thin.ttf");

/***/ }),

/***/ "./src/Attach/Fonts/more/Raleway-ThinItalic.ttf":
/*!******************************************************!*\
  !*** ./src/Attach/Fonts/more/Raleway-ThinItalic.ttf ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/font/Raleway-ThinItalic.ttf");

/***/ }),

/***/ "./src/Attach/Images/back.jpg":
/*!************************************!*\
  !*** ./src/Attach/Images/back.jpg ***!
  \************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/img/back.jpg");

/***/ }),

/***/ "./src/Attach/Images/boat1.jpg":
/*!*************************************!*\
  !*** ./src/Attach/Images/boat1.jpg ***!
  \*************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/img/boat1.jpg");

/***/ }),

/***/ "./src/Attach/Images/boat10.jpg":
/*!**************************************!*\
  !*** ./src/Attach/Images/boat10.jpg ***!
  \**************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/img/boat10.jpg");

/***/ }),

/***/ "./src/Attach/Images/boat11.jpg":
/*!**************************************!*\
  !*** ./src/Attach/Images/boat11.jpg ***!
  \**************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/img/boat11.jpg");

/***/ }),

/***/ "./src/Attach/Images/boat2.jpg":
/*!*************************************!*\
  !*** ./src/Attach/Images/boat2.jpg ***!
  \*************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/img/boat2.jpg");

/***/ }),

/***/ "./src/Attach/Images/boat3.jpg":
/*!*************************************!*\
  !*** ./src/Attach/Images/boat3.jpg ***!
  \*************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/img/boat3.jpg");

/***/ }),

/***/ "./src/Attach/Images/boat4.jpg":
/*!*************************************!*\
  !*** ./src/Attach/Images/boat4.jpg ***!
  \*************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/img/boat4.jpg");

/***/ }),

/***/ "./src/Attach/Images/boat5.jpg":
/*!*************************************!*\
  !*** ./src/Attach/Images/boat5.jpg ***!
  \*************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/img/boat5.jpg");

/***/ }),

/***/ "./src/Attach/Images/boat6.jpg":
/*!*************************************!*\
  !*** ./src/Attach/Images/boat6.jpg ***!
  \*************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/img/boat6.jpg");

/***/ }),

/***/ "./src/Attach/Images/boat7.jpg":
/*!*************************************!*\
  !*** ./src/Attach/Images/boat7.jpg ***!
  \*************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/img/boat7.jpg");

/***/ }),

/***/ "./src/Attach/Images/boat8.jpg":
/*!*************************************!*\
  !*** ./src/Attach/Images/boat8.jpg ***!
  \*************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/img/boat8.jpg");

/***/ }),

/***/ "./src/Attach/Images/boat9.jpg":
/*!*************************************!*\
  !*** ./src/Attach/Images/boat9.jpg ***!
  \*************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/img/boat9.jpg");

/***/ }),

/***/ "./src/Attach/Images/button.jpg":
/*!**************************************!*\
  !*** ./src/Attach/Images/button.jpg ***!
  \**************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/img/button.jpg");

/***/ }),

/***/ "./src/Attach/Images/diving-icon.svg":
/*!*******************************************!*\
  !*** ./src/Attach/Images/diving-icon.svg ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/img/diving-icon.svg");

/***/ }),

/***/ "./src/Attach/Images/fish-icon.svg":
/*!*****************************************!*\
  !*** ./src/Attach/Images/fish-icon.svg ***!
  \*****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/img/fish-icon.svg");

/***/ }),

/***/ "./src/Attach/Images/food-icon.svg":
/*!*****************************************!*\
  !*** ./src/Attach/Images/food-icon.svg ***!
  \*****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/img/food-icon.svg");

/***/ }),

/***/ "./src/Attach/Images/logo-dark.svg":
/*!*****************************************!*\
  !*** ./src/Attach/Images/logo-dark.svg ***!
  \*****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/img/logo-dark.svg");

/***/ }),

/***/ "./src/Attach/Images/logo-light.svg":
/*!******************************************!*\
  !*** ./src/Attach/Images/logo-light.svg ***!
  \******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "./attach/img/logo-light.svg");

/***/ }),

/***/ "./src/Logic sync recursive \\.js$":
/*!******************************!*\
  !*** ./src/Logic sync \.js$ ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./core.js": "./src/Logic/core.js"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./src/Logic sync recursive \\.js$";

/***/ }),

/***/ "./src/Logic/core.js":
/*!***************************!*\
  !*** ./src/Logic/core.js ***!
  \***************************/
/*! no static exports found */
/***/ (function(module, exports) {



/***/ }),

/***/ "./src/Pages/index/index.js":
/*!**********************************!*\
  !*** ./src/Pages/index/index.js ***!
  \**********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _bundle__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./../../bundle */ "./src/bundle.js");
/* harmony import */ var _bundle__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_bundle__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _Plugins_eventone_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../Plugins/eventone.js */ "./src/Plugins/eventone.js");


// Code libs and plugins


Object(_Plugins_eventone_js__WEBPACK_IMPORTED_MODULE_1__["globalEventone"])();

/***/ }),

/***/ "./src/Pages/index/index.sass":
/*!************************************!*\
  !*** ./src/Pages/index/index.sass ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var api = __webpack_require__(/*! ../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
            var content = __webpack_require__(/*! !../../../node_modules/mini-css-extract-plugin/dist/loader.js??ref--5-1!../../../node_modules/css-loader/dist/cjs.js??ref--5-2!../../../node_modules/postcss-loader/src!../../../node_modules/sass-loader/dist/cjs.js!./index.sass */ "./node_modules/mini-css-extract-plugin/dist/loader.js?!./node_modules/css-loader/dist/cjs.js?!./node_modules/postcss-loader/src/index.js!./node_modules/sass-loader/dist/cjs.js!./src/Pages/index/index.sass");

            content = content.__esModule ? content.default : content;

            if (typeof content === 'string') {
              content = [[module.i, content, '']];
            }

var options = {};

options.insert = "head";
options.singleton = false;

var update = api(content, options);



module.exports = content.locals || {};

/***/ }),

/***/ "./src/Plugins/eventone.js":
/*!*********************************!*\
  !*** ./src/Plugins/eventone.js ***!
  \*********************************/
/*! exports provided: globalEventone */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "globalEventone", function() { return globalEventone; });
const __EVENTONE__ = {};

function action(label, inPlaceCallback) {
  return function (...args) {
    let reactors;
    if (__EVENTONE__[label]) // giving shorten name
      reactors = __EVENTONE__[label];

    if (reactors) {
      // reactors before main reactor
      if (Array.isArray(reactors.before) && reactors.before.length > 0)
        reactors.before.forEach(([, reactor]) => reactor(...args));
      // main reactor with 0 callPlace
      if (inPlaceCallback)
        inPlaceCallback(...args);
      // reactors after main reactor
      if (Array.isArray(reactors.after) && reactors.after.length > 0)
        reactors.after.forEach(([, reactor]) => reactor(...args));

    } else if (inPlaceCallback) {
      inPlaceCallback(...args); //just main reactor call
    }
  };
}

function when(actionLabel, reactor, callPlace = 0) {
  if (typeof actionLabel == 'string') {
    whenLogic(actionLabel);
  } else if (Array.isArray(actionLabel)) {
    for (let singleActionLabel of actionLabel) {
      whenLogic(singleActionLabel);
    }
  }

  function whenLogic(actionLabel) {
    let placeDimension = callPlace < 0 ? 'before' : 'after';
    if (!__EVENTONE__[actionLabel]) // check actionLabel exist
      __EVENTONE__[actionLabel] = {}; // create if not
    if (!Array.isArray(__EVENTONE__[actionLabel][placeDimension])) // check dimension is Array
      __EVENTONE__[actionLabel][placeDimension] = []; // create if not

    __EVENTONE__[actionLabel][placeDimension].push([callPlace, reactor]); // pushing reactor inside
    __EVENTONE__[actionLabel][placeDimension].sort((a, b) => a[0] - b[0]); // sorting reactors by callPlace
  }
}

function globalEventone() {
  window.__EVENTONE__ = __EVENTONE__;
  window.action = action;
  window.when = when;
}

/***/ }),

/***/ "./src/bundle.js":
/*!***********************!*\
  !*** ./src/bundle.js ***!
  \***********************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

const importer = __webpack_require__(/*! ../webpack.importer */ "./webpack.importer.js");

const imported = importer([
  __webpack_require__("./src/Logic sync recursive \\.js$"),
  __webpack_require__("./src/Attach sync recursive \\."),
]);



/***/ }),

/***/ "./webpack.importer.js":
/*!*****************************!*\
  !*** ./webpack.importer.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

function importAll(req) {
  let targets = {};
  req.keys().forEach(item => { targets[item.replace('./', '')] = req(item); });
  //console.log('targets', targets);
  return targets;
}

function importer(fileImports) {
  const imported = [];
  for (let req of fileImports) {
    imported.push(importAll(req));
  }

  return imported;
}

module.exports = importer;

/***/ }),

/***/ 0:
/*!*********************************************************************!*\
  !*** multi ./src/Pages/index/index.js ./src/Pages/index/index.sass ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /var/www/html/shpargalki/front/src/Pages/index/index.js */"./src/Pages/index/index.js");
module.exports = __webpack_require__(/*! /var/www/html/shpargalki/front/src/Pages/index/index.sass */"./src/Pages/index/index.sass");


/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAiLCJ3ZWJwYWNrOi8vLy4vc3JjL1BhZ2VzL2luZGV4L2luZGV4LnNhc3M/OWY5YSIsIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvc3R5bGUtbG9hZGVyL2Rpc3QvcnVudGltZS9pbmplY3RTdHlsZXNJbnRvU3R5bGVUYWcuanMiLCJ3ZWJwYWNrOi8vLy4vc3JjL0F0dGFjaCBzeW5jIFxcLiIsIndlYnBhY2s6Ly8vLi9zcmMvQXR0YWNoL0ZvbnRzL0Fyc2VuYWwtQm9sZC50dGYiLCJ3ZWJwYWNrOi8vLy4vc3JjL0F0dGFjaC9Gb250cy9BcnNlbmFsLUl0YWxpYy50dGYiLCJ3ZWJwYWNrOi8vLy4vc3JjL0F0dGFjaC9Gb250cy9SYWxld2F5LVJlZ3VsYXIudHRmIiwid2VicGFjazovLy8uL3NyYy9BdHRhY2gvRm9udHMvbW9yZS9BcnNlbmFsLUJvbGRJdGFsaWMudHRmIiwid2VicGFjazovLy8uL3NyYy9BdHRhY2gvRm9udHMvbW9yZS9BcnNlbmFsLVJlZ3VsYXIudHRmIiwid2VicGFjazovLy8uL3NyYy9BdHRhY2gvRm9udHMvbW9yZS9SYWxld2F5LUJsYWNrLnR0ZiIsIndlYnBhY2s6Ly8vLi9zcmMvQXR0YWNoL0ZvbnRzL21vcmUvUmFsZXdheS1CbGFja0l0YWxpYy50dGYiLCJ3ZWJwYWNrOi8vLy4vc3JjL0F0dGFjaC9Gb250cy9tb3JlL1JhbGV3YXktQm9sZC50dGYiLCJ3ZWJwYWNrOi8vLy4vc3JjL0F0dGFjaC9Gb250cy9tb3JlL1JhbGV3YXktQm9sZEl0YWxpYy50dGYiLCJ3ZWJwYWNrOi8vLy4vc3JjL0F0dGFjaC9Gb250cy9tb3JlL1JhbGV3YXktRXh0cmFCb2xkLnR0ZiIsIndlYnBhY2s6Ly8vLi9zcmMvQXR0YWNoL0ZvbnRzL21vcmUvUmFsZXdheS1FeHRyYUJvbGRJdGFsaWMudHRmIiwid2VicGFjazovLy8uL3NyYy9BdHRhY2gvRm9udHMvbW9yZS9SYWxld2F5LUV4dHJhTGlnaHQudHRmIiwid2VicGFjazovLy8uL3NyYy9BdHRhY2gvRm9udHMvbW9yZS9SYWxld2F5LUV4dHJhTGlnaHRJdGFsaWMudHRmIiwid2VicGFjazovLy8uL3NyYy9BdHRhY2gvRm9udHMvbW9yZS9SYWxld2F5LUl0YWxpYy50dGYiLCJ3ZWJwYWNrOi8vLy4vc3JjL0F0dGFjaC9Gb250cy9tb3JlL1JhbGV3YXktTGlnaHQudHRmIiwid2VicGFjazovLy8uL3NyYy9BdHRhY2gvRm9udHMvbW9yZS9SYWxld2F5LUxpZ2h0SXRhbGljLnR0ZiIsIndlYnBhY2s6Ly8vLi9zcmMvQXR0YWNoL0ZvbnRzL21vcmUvUmFsZXdheS1NZWRpdW0udHRmIiwid2VicGFjazovLy8uL3NyYy9BdHRhY2gvRm9udHMvbW9yZS9SYWxld2F5LU1lZGl1bUl0YWxpYy50dGYiLCJ3ZWJwYWNrOi8vLy4vc3JjL0F0dGFjaC9Gb250cy9tb3JlL1JhbGV3YXktU2VtaUJvbGQudHRmIiwid2VicGFjazovLy8uL3NyYy9BdHRhY2gvRm9udHMvbW9yZS9SYWxld2F5LVNlbWlCb2xkSXRhbGljLnR0ZiIsIndlYnBhY2s6Ly8vLi9zcmMvQXR0YWNoL0ZvbnRzL21vcmUvUmFsZXdheS1UaGluLnR0ZiIsIndlYnBhY2s6Ly8vLi9zcmMvQXR0YWNoL0ZvbnRzL21vcmUvUmFsZXdheS1UaGluSXRhbGljLnR0ZiIsIndlYnBhY2s6Ly8vLi9zcmMvQXR0YWNoL0ltYWdlcy9iYWNrLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvQXR0YWNoL0ltYWdlcy9ib2F0MS5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL0F0dGFjaC9JbWFnZXMvYm9hdDEwLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvQXR0YWNoL0ltYWdlcy9ib2F0MTEuanBnIiwid2VicGFjazovLy8uL3NyYy9BdHRhY2gvSW1hZ2VzL2JvYXQyLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvQXR0YWNoL0ltYWdlcy9ib2F0My5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL0F0dGFjaC9JbWFnZXMvYm9hdDQuanBnIiwid2VicGFjazovLy8uL3NyYy9BdHRhY2gvSW1hZ2VzL2JvYXQ1LmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvQXR0YWNoL0ltYWdlcy9ib2F0Ni5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL0F0dGFjaC9JbWFnZXMvYm9hdDcuanBnIiwid2VicGFjazovLy8uL3NyYy9BdHRhY2gvSW1hZ2VzL2JvYXQ4LmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvQXR0YWNoL0ltYWdlcy9ib2F0OS5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL0F0dGFjaC9JbWFnZXMvYnV0dG9uLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvQXR0YWNoL0ltYWdlcy9kaXZpbmctaWNvbi5zdmciLCJ3ZWJwYWNrOi8vLy4vc3JjL0F0dGFjaC9JbWFnZXMvZmlzaC1pY29uLnN2ZyIsIndlYnBhY2s6Ly8vLi9zcmMvQXR0YWNoL0ltYWdlcy9mb29kLWljb24uc3ZnIiwid2VicGFjazovLy8uL3NyYy9BdHRhY2gvSW1hZ2VzL2xvZ28tZGFyay5zdmciLCJ3ZWJwYWNrOi8vLy4vc3JjL0F0dGFjaC9JbWFnZXMvbG9nby1saWdodC5zdmciLCJ3ZWJwYWNrOi8vLy4vc3JjL0xvZ2ljIHN5bmMgXFwuanMkIiwid2VicGFjazovLy8uL3NyYy9QYWdlcy9pbmRleC9pbmRleC5qcyIsIndlYnBhY2s6Ly8vLi9zcmMvUGFnZXMvaW5kZXgvaW5kZXguc2Fzcz9lNmE2Iiwid2VicGFjazovLy8uL3NyYy9QbHVnaW5zL2V2ZW50b25lLmpzIiwid2VicGFjazovLy8uL3NyYy9idW5kbGUuanMiLCJ3ZWJwYWNrOi8vLy4vd2VicGFjay5pbXBvcnRlci5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiO1FBQUE7UUFDQTs7UUFFQTtRQUNBOztRQUVBO1FBQ0E7UUFDQTtRQUNBO1FBQ0E7UUFDQTtRQUNBO1FBQ0E7UUFDQTtRQUNBOztRQUVBO1FBQ0E7O1FBRUE7UUFDQTs7UUFFQTtRQUNBO1FBQ0E7OztRQUdBO1FBQ0E7O1FBRUE7UUFDQTs7UUFFQTtRQUNBO1FBQ0E7UUFDQSww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QUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0Esd0Q7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FDdEJBO0FBQUE7QUFBQTtBQUFBO0FBQXdCOztBQUV4QjtBQUMyRDs7QUFFM0QsMkVBQWMsRzs7Ozs7Ozs7Ozs7QUNMZCxVQUFVLG1CQUFPLENBQUMseUpBQThFO0FBQ2hHLDBCQUEwQixtQkFBTyxDQUFDLHdiQUE4Tzs7QUFFaFI7O0FBRUE7QUFDQSwwQkFBMEIsUUFBUztBQUNuQzs7QUFFQTs7QUFFQTtBQUNBOztBQUVBOzs7O0FBSUEsc0M7Ozs7Ozs7Ozs7OztBQ2xCQTtBQUFBO0FBQUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxLQUFLO0FBQ0wsK0JBQStCO0FBQy9CO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EscUNBQXFDO0FBQ3JDO0FBQ0EscURBQXFEOztBQUVyRCx5RUFBeUU7QUFDekUsMEVBQTBFO0FBQzFFO0FBQ0E7O0FBRU87QUFDUDtBQUNBO0FBQ0E7QUFDQSxDOzs7Ozs7Ozs7OztBQ2xEQSxpQkFBaUIsbUJBQU8sQ0FBQyxrREFBcUI7O0FBRTlDO0FBQ0EsRUFBRSx3REFBMEM7QUFDNUMsRUFBRSxzREFBd0M7QUFDMUM7Ozs7Ozs7Ozs7Ozs7QUNMQTtBQUNBO0FBQ0EsOEJBQThCLDZDQUE2QyxFQUFFO0FBQzdFO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUEsMEIiLCJmaWxlIjoiaW5kZXguYnVuZGxlLmpzIiwic291cmNlc0NvbnRlbnQiOlsiIFx0Ly8gVGhlIG1vZHVsZSBjYWNoZVxuIFx0dmFyIGluc3RhbGxlZE1vZHVsZXMgPSB7fTtcblxuIFx0Ly8gVGhlIHJlcXVpcmUgZnVuY3Rpb25cbiBcdGZ1bmN0aW9uIF9fd2VicGFja19yZXF1aXJlX18obW9kdWxlSWQpIHtcblxuIFx0XHQvLyBDaGVjayBpZiBtb2R1bGUgaXMgaW4gY2FjaGVcbiBcdFx0aWYoaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0pIHtcbiBcdFx0XHRyZXR1cm4gaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0uZXhwb3J0cztcbiBcdFx0fVxuIFx0XHQvLyBDcmVhdGUgYSBuZXcgbW9kdWxlIChhbmQgcHV0IGl0IGludG8gdGhlIGNhY2hlKVxuIFx0XHR2YXIgbW9kdWxlID0gaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0gPSB7XG4gXHRcdFx0aTogbW9kdWxlSWQsXG4gXHRcdFx0bDogZmFsc2UsXG4gXHRcdFx0ZXhwb3J0czoge31cbiBcdFx0fTtcblxuIFx0XHQvLyBFeGVjdXRlIHRoZSBtb2R1bGUgZnVuY3Rpb25cbiBcdFx0bW9kdWxlc1ttb2R1bGVJZF0uY2FsbChtb2R1bGUuZXhwb3J0cywgbW9kdWxlLCBtb2R1bGUuZXhwb3J0cywgX193ZWJwYWNrX3JlcXVpcmVfXyk7XG5cbiBcdFx0Ly8gRmxhZyB0aGUgbW9kdWxlIGFzIGxvYWRlZFxuIFx0XHRtb2R1bGUubCA9IHRydWU7XG5cbiBcdFx0Ly8gUmV0dXJuIHRoZSBleHBvcnRzIG9mIHRoZSBtb2R1bGVcbiBcdFx0cmV0dXJuIG1vZHVsZS5leHBvcnRzO1xuIFx0fVxuXG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlcyBvYmplY3QgKF9fd2VicGFja19tb2R1bGVzX18pXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm0gPSBtb2R1bGVzO1xuXG4gXHQvLyBleHBvc2UgdGhlIG1vZHVsZSBjYWNoZVxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5jID0gaW5zdGFsbGVkTW9kdWxlcztcblxuIFx0Ly8gZGVmaW5lIGdldHRlciBmdW5jdGlvbiBmb3IgaGFybW9ueSBleHBvcnRzXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmQgPSBmdW5jdGlvbihleHBvcnRzLCBuYW1lLCBnZXR0ZXIpIHtcbiBcdFx0aWYoIV9fd2VicGFja19yZXF1aXJlX18ubyhleHBvcnRzLCBuYW1lKSkge1xuIFx0XHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBuYW1lLCB7IGVudW1lcmFibGU6IHRydWUsIGdldDogZ2V0dGVyIH0pO1xuIFx0XHR9XG4gXHR9O1xuXG4gXHQvLyBkZWZpbmUgX19lc01vZHVsZSBvbiBleHBvcnRzXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLnIgPSBmdW5jdGlvbihleHBvcnRzKSB7XG4gXHRcdGlmKHR5cGVvZiBTeW1ib2wgIT09ICd1bmRlZmluZWQnICYmIFN5bWJvbC50b1N0cmluZ1RhZykge1xuIFx0XHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBTeW1ib2wudG9TdHJpbmdUYWcsIHsgdmFsdWU6ICdNb2R1bGUnIH0pO1xuIFx0XHR9XG4gXHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCAnX19lc01vZHVsZScsIHsgdmFsdWU6IHRydWUgfSk7XG4gXHR9O1xuXG4gXHQvLyBjcmVhdGUgYSBmYWtlIG5hbWVzcGFjZSBvYmplY3RcbiBcdC8vIG1vZGUgJiAxOiB2YWx1ZSBpcyBhIG1vZHVsZSBpZCwgcmVxdWlyZSBpdFxuIFx0Ly8gbW9kZSAmIDI6IG1lcmdlIGFsbCBwcm9wZXJ0aWVzIG9mIHZhbHVlIGludG8gdGhlIG5zXG4gXHQvLyBtb2RlICYgNDogcmV0dXJuIHZhbHVlIHdoZW4gYWxyZWFkeSBucyBvYmplY3RcbiBcdC8vIG1vZGUgJiA4fDE6IGJlaGF2ZSBsaWtlIHJlcXVpcmVcbiBcdF9fd2VicGFja19yZXF1aXJlX18udCA9IGZ1bmN0aW9uKHZhbHVlLCBtb2RlKSB7XG4gXHRcdGlmKG1vZGUgJiAxKSB2YWx1ZSA9IF9fd2VicGFja19yZXF1aXJlX18odmFsdWUpO1xuIFx0XHRpZihtb2RlICYgOCkgcmV0dXJuIHZhbHVlO1xuIFx0XHRpZigobW9kZSAmIDQpICYmIHR5cGVvZiB2YWx1ZSA9PT0gJ29iamVjdCcgJiYgdmFsdWUgJiYgdmFsdWUuX19lc01vZHVsZSkgcmV0dXJuIHZhbHVlO1xuIFx0XHR2YXIgbnMgPSBPYmplY3QuY3JlYXRlKG51bGwpO1xuIFx0XHRfX3dlYnBhY2tfcmVxdWlyZV9fLnIobnMpO1xuIFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkobnMsICdkZWZhdWx0JywgeyBlbnVtZXJhYmxlOiB0cnVlLCB2YWx1ZTogdmFsdWUgfSk7XG4gXHRcdGlmKG1vZGUgJiAyICYmIHR5cGVvZiB2YWx1ZSAhPSAnc3RyaW5nJykgZm9yKHZhciBrZXkgaW4gdmFsdWUpIF9fd2VicGFja19yZXF1aXJlX18uZChucywga2V5LCBmdW5jdGlvbihrZXkpIHsgcmV0dXJuIHZhbHVlW2tleV07IH0uYmluZChudWxsLCBrZXkpKTtcbiBcdFx0cmV0dXJuIG5zO1xuIFx0fTtcblxuIFx0Ly8gZ2V0RGVmYXVsdEV4cG9ydCBmdW5jdGlvbiBmb3IgY29tcGF0aWJpbGl0eSB3aXRoIG5vbi1oYXJtb255IG1vZHVsZXNcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubiA9IGZ1bmN0aW9uKG1vZHVsZSkge1xuIFx0XHR2YXIgZ2V0dGVyID0gbW9kdWxlICYmIG1vZHVsZS5fX2VzTW9kdWxlID9cbiBcdFx0XHRmdW5jdGlvbiBnZXREZWZhdWx0KCkgeyByZXR1cm4gbW9kdWxlWydkZWZhdWx0J107IH0gOlxuIFx0XHRcdGZ1bmN0aW9uIGdldE1vZHVsZUV4cG9ydHMoKSB7IHJldHVybiBtb2R1bGU7IH07XG4gXHRcdF9fd2VicGFja19yZXF1aXJlX18uZChnZXR0ZXIsICdhJywgZ2V0dGVyKTtcbiBcdFx0cmV0dXJuIGdldHRlcjtcbiBcdH07XG5cbiBcdC8vIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbFxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5vID0gZnVuY3Rpb24ob2JqZWN0LCBwcm9wZXJ0eSkgeyByZXR1cm4gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iamVjdCwgcHJvcGVydHkpOyB9O1xuXG4gXHQvLyBfX3dlYnBhY2tfcHVibGljX3BhdGhfX1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5wID0gXCJcIjtcblxuXG4gXHQvLyBMb2FkIGVudHJ5IG1vZHVsZSBhbmQgcmV0dXJuIGV4cG9ydHNcbiBcdHJldHVybiBfX3dlYnBhY2tfcmVxdWlyZV9fKF9fd2VicGFja19yZXF1aXJlX18ucyA9IDApO1xuIiwiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luXG4gICAgaWYobW9kdWxlLmhvdCkge1xuICAgICAgLy8gMTYwNjUwMzE3NTEwNVxuICAgICAgdmFyIGNzc1JlbG9hZCA9IHJlcXVpcmUoXCIvdmFyL3d3dy9odG1sL3NocGFyZ2Fsa2kvZnJvbnQvbm9kZV9tb2R1bGVzL21pbmktY3NzLWV4dHJhY3QtcGx1Z2luL2Rpc3QvaG1yL2hvdE1vZHVsZVJlcGxhY2VtZW50LmpzXCIpKG1vZHVsZS5pZCwge1wiaG1yXCI6dHJ1ZSxcInJlbG9hZEFsbFwiOnRydWUsXCJsb2NhbHNcIjpmYWxzZX0pO1xuICAgICAgbW9kdWxlLmhvdC5kaXNwb3NlKGNzc1JlbG9hZCk7XG4gICAgICBtb2R1bGUuaG90LmFjY2VwdCh1bmRlZmluZWQsIGNzc1JlbG9hZCk7XG4gICAgfVxuICAiLCJcInVzZSBzdHJpY3RcIjtcblxudmFyIGlzT2xkSUUgPSBmdW5jdGlvbiBpc09sZElFKCkge1xuICB2YXIgbWVtbztcbiAgcmV0dXJuIGZ1bmN0aW9uIG1lbW9yaXplKCkge1xuICAgIGlmICh0eXBlb2YgbWVtbyA9PT0gJ3VuZGVmaW5lZCcpIHtcbiAgICAgIC8vIFRlc3QgZm9yIElFIDw9IDkgYXMgcHJvcG9zZWQgYnkgQnJvd3NlcmhhY2tzXG4gICAgICAvLyBAc2VlIGh0dHA6Ly9icm93c2VyaGFja3MuY29tLyNoYWNrLWU3MWQ4NjkyZjY1MzM0MTczZmVlNzE1YzIyMmNiODA1XG4gICAgICAvLyBUZXN0cyBmb3IgZXhpc3RlbmNlIG9mIHN0YW5kYXJkIGdsb2JhbHMgaXMgdG8gYWxsb3cgc3R5bGUtbG9hZGVyXG4gICAgICAvLyB0byBvcGVyYXRlIGNvcnJlY3RseSBpbnRvIG5vbi1zdGFuZGFyZCBlbnZpcm9ubWVudHNcbiAgICAgIC8vIEBzZWUgaHR0cHM6Ly9naXRodWIuY29tL3dlYnBhY2stY29udHJpYi9zdHlsZS1sb2FkZXIvaXNzdWVzLzE3N1xuICAgICAgbWVtbyA9IEJvb2xlYW4od2luZG93ICYmIGRvY3VtZW50ICYmIGRvY3VtZW50LmFsbCAmJiAhd2luZG93LmF0b2IpO1xuICAgIH1cblxuICAgIHJldHVybiBtZW1vO1xuICB9O1xufSgpO1xuXG52YXIgZ2V0VGFyZ2V0ID0gZnVuY3Rpb24gZ2V0VGFyZ2V0KCkge1xuICB2YXIgbWVtbyA9IHt9O1xuICByZXR1cm4gZnVuY3Rpb24gbWVtb3JpemUodGFyZ2V0KSB7XG4gICAgaWYgKHR5cGVvZiBtZW1vW3RhcmdldF0gPT09ICd1bmRlZmluZWQnKSB7XG4gICAgICB2YXIgc3R5bGVUYXJnZXQgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKHRhcmdldCk7IC8vIFNwZWNpYWwgY2FzZSB0byByZXR1cm4gaGVhZCBvZiBpZnJhbWUgaW5zdGVhZCBvZiBpZnJhbWUgaXRzZWxmXG5cbiAgICAgIGlmICh3aW5kb3cuSFRNTElGcmFtZUVsZW1lbnQgJiYgc3R5bGVUYXJnZXQgaW5zdGFuY2VvZiB3aW5kb3cuSFRNTElGcmFtZUVsZW1lbnQpIHtcbiAgICAgICAgdHJ5IHtcbiAgICAgICAgICAvLyBUaGlzIHdpbGwgdGhyb3cgYW4gZXhjZXB0aW9uIGlmIGFjY2VzcyB0byBpZnJhbWUgaXMgYmxvY2tlZFxuICAgICAgICAgIC8vIGR1ZSB0byBjcm9zcy1vcmlnaW4gcmVzdHJpY3Rpb25zXG4gICAgICAgICAgc3R5bGVUYXJnZXQgPSBzdHlsZVRhcmdldC5jb250ZW50RG9jdW1lbnQuaGVhZDtcbiAgICAgICAgfSBjYXRjaCAoZSkge1xuICAgICAgICAgIC8vIGlzdGFuYnVsIGlnbm9yZSBuZXh0XG4gICAgICAgICAgc3R5bGVUYXJnZXQgPSBudWxsO1xuICAgICAgICB9XG4gICAgICB9XG5cbiAgICAgIG1lbW9bdGFyZ2V0XSA9IHN0eWxlVGFyZ2V0O1xuICAgIH1cblxuICAgIHJldHVybiBtZW1vW3RhcmdldF07XG4gIH07XG59KCk7XG5cbnZhciBzdHlsZXNJbkRvbSA9IFtdO1xuXG5mdW5jdGlvbiBnZXRJbmRleEJ5SWRlbnRpZmllcihpZGVudGlmaWVyKSB7XG4gIHZhciByZXN1bHQgPSAtMTtcblxuICBmb3IgKHZhciBpID0gMDsgaSA8IHN0eWxlc0luRG9tLmxlbmd0aDsgaSsrKSB7XG4gICAgaWYgKHN0eWxlc0luRG9tW2ldLmlkZW50aWZpZXIgPT09IGlkZW50aWZpZXIpIHtcbiAgICAgIHJlc3VsdCA9IGk7XG4gICAgICBicmVhaztcbiAgICB9XG4gIH1cblxuICByZXR1cm4gcmVzdWx0O1xufVxuXG5mdW5jdGlvbiBtb2R1bGVzVG9Eb20obGlzdCwgb3B0aW9ucykge1xuICB2YXIgaWRDb3VudE1hcCA9IHt9O1xuICB2YXIgaWRlbnRpZmllcnMgPSBbXTtcblxuICBmb3IgKHZhciBpID0gMDsgaSA8IGxpc3QubGVuZ3RoOyBpKyspIHtcbiAgICB2YXIgaXRlbSA9IGxpc3RbaV07XG4gICAgdmFyIGlkID0gb3B0aW9ucy5iYXNlID8gaXRlbVswXSArIG9wdGlvbnMuYmFzZSA6IGl0ZW1bMF07XG4gICAgdmFyIGNvdW50ID0gaWRDb3VudE1hcFtpZF0gfHwgMDtcbiAgICB2YXIgaWRlbnRpZmllciA9IFwiXCIuY29uY2F0KGlkLCBcIiBcIikuY29uY2F0KGNvdW50KTtcbiAgICBpZENvdW50TWFwW2lkXSA9IGNvdW50ICsgMTtcbiAgICB2YXIgaW5kZXggPSBnZXRJbmRleEJ5SWRlbnRpZmllcihpZGVudGlmaWVyKTtcbiAgICB2YXIgb2JqID0ge1xuICAgICAgY3NzOiBpdGVtWzFdLFxuICAgICAgbWVkaWE6IGl0ZW1bMl0sXG4gICAgICBzb3VyY2VNYXA6IGl0ZW1bM11cbiAgICB9O1xuXG4gICAgaWYgKGluZGV4ICE9PSAtMSkge1xuICAgICAgc3R5bGVzSW5Eb21baW5kZXhdLnJlZmVyZW5jZXMrKztcbiAgICAgIHN0eWxlc0luRG9tW2luZGV4XS51cGRhdGVyKG9iaik7XG4gICAgfSBlbHNlIHtcbiAgICAgIHN0eWxlc0luRG9tLnB1c2goe1xuICAgICAgICBpZGVudGlmaWVyOiBpZGVudGlmaWVyLFxuICAgICAgICB1cGRhdGVyOiBhZGRTdHlsZShvYmosIG9wdGlvbnMpLFxuICAgICAgICByZWZlcmVuY2VzOiAxXG4gICAgICB9KTtcbiAgICB9XG5cbiAgICBpZGVudGlmaWVycy5wdXNoKGlkZW50aWZpZXIpO1xuICB9XG5cbiAgcmV0dXJuIGlkZW50aWZpZXJzO1xufVxuXG5mdW5jdGlvbiBpbnNlcnRTdHlsZUVsZW1lbnQob3B0aW9ucykge1xuICB2YXIgc3R5bGUgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KCdzdHlsZScpO1xuICB2YXIgYXR0cmlidXRlcyA9IG9wdGlvbnMuYXR0cmlidXRlcyB8fCB7fTtcblxuICBpZiAodHlwZW9mIGF0dHJpYnV0ZXMubm9uY2UgPT09ICd1bmRlZmluZWQnKSB7XG4gICAgdmFyIG5vbmNlID0gdHlwZW9mIF9fd2VicGFja19ub25jZV9fICE9PSAndW5kZWZpbmVkJyA/IF9fd2VicGFja19ub25jZV9fIDogbnVsbDtcblxuICAgIGlmIChub25jZSkge1xuICAgICAgYXR0cmlidXRlcy5ub25jZSA9IG5vbmNlO1xuICAgIH1cbiAgfVxuXG4gIE9iamVjdC5rZXlzKGF0dHJpYnV0ZXMpLmZvckVhY2goZnVuY3Rpb24gKGtleSkge1xuICAgIHN0eWxlLnNldEF0dHJpYnV0ZShrZXksIGF0dHJpYnV0ZXNba2V5XSk7XG4gIH0pO1xuXG4gIGlmICh0eXBlb2Ygb3B0aW9ucy5pbnNlcnQgPT09ICdmdW5jdGlvbicpIHtcbiAgICBvcHRpb25zLmluc2VydChzdHlsZSk7XG4gIH0gZWxzZSB7XG4gICAgdmFyIHRhcmdldCA9IGdldFRhcmdldChvcHRpb25zLmluc2VydCB8fCAnaGVhZCcpO1xuXG4gICAgaWYgKCF0YXJnZXQpIHtcbiAgICAgIHRocm93IG5ldyBFcnJvcihcIkNvdWxkbid0IGZpbmQgYSBzdHlsZSB0YXJnZXQuIFRoaXMgcHJvYmFibHkgbWVhbnMgdGhhdCB0aGUgdmFsdWUgZm9yIHRoZSAnaW5zZXJ0JyBwYXJhbWV0ZXIgaXMgaW52YWxpZC5cIik7XG4gICAgfVxuXG4gICAgdGFyZ2V0LmFwcGVuZENoaWxkKHN0eWxlKTtcbiAgfVxuXG4gIHJldHVybiBzdHlsZTtcbn1cblxuZnVuY3Rpb24gcmVtb3ZlU3R5bGVFbGVtZW50KHN0eWxlKSB7XG4gIC8vIGlzdGFuYnVsIGlnbm9yZSBpZlxuICBpZiAoc3R5bGUucGFyZW50Tm9kZSA9PT0gbnVsbCkge1xuICAgIHJldHVybiBmYWxzZTtcbiAgfVxuXG4gIHN0eWxlLnBhcmVudE5vZGUucmVtb3ZlQ2hpbGQoc3R5bGUpO1xufVxuLyogaXN0YW5idWwgaWdub3JlIG5leHQgICovXG5cblxudmFyIHJlcGxhY2VUZXh0ID0gZnVuY3Rpb24gcmVwbGFjZVRleHQoKSB7XG4gIHZhciB0ZXh0U3RvcmUgPSBbXTtcbiAgcmV0dXJuIGZ1bmN0aW9uIHJlcGxhY2UoaW5kZXgsIHJlcGxhY2VtZW50KSB7XG4gICAgdGV4dFN0b3JlW2luZGV4XSA9IHJlcGxhY2VtZW50O1xuICAgIHJldHVybiB0ZXh0U3RvcmUuZmlsdGVyKEJvb2xlYW4pLmpvaW4oJ1xcbicpO1xuICB9O1xufSgpO1xuXG5mdW5jdGlvbiBhcHBseVRvU2luZ2xldG9uVGFnKHN0eWxlLCBpbmRleCwgcmVtb3ZlLCBvYmopIHtcbiAgdmFyIGNzcyA9IHJlbW92ZSA/ICcnIDogb2JqLm1lZGlhID8gXCJAbWVkaWEgXCIuY29uY2F0KG9iai5tZWRpYSwgXCIge1wiKS5jb25jYXQob2JqLmNzcywgXCJ9XCIpIDogb2JqLmNzczsgLy8gRm9yIG9sZCBJRVxuXG4gIC8qIGlzdGFuYnVsIGlnbm9yZSBpZiAgKi9cblxuICBpZiAoc3R5bGUuc3R5bGVTaGVldCkge1xuICAgIHN0eWxlLnN0eWxlU2hlZXQuY3NzVGV4dCA9IHJlcGxhY2VUZXh0KGluZGV4LCBjc3MpO1xuICB9IGVsc2Uge1xuICAgIHZhciBjc3NOb2RlID0gZG9jdW1lbnQuY3JlYXRlVGV4dE5vZGUoY3NzKTtcbiAgICB2YXIgY2hpbGROb2RlcyA9IHN0eWxlLmNoaWxkTm9kZXM7XG5cbiAgICBpZiAoY2hpbGROb2Rlc1tpbmRleF0pIHtcbiAgICAgIHN0eWxlLnJlbW92ZUNoaWxkKGNoaWxkTm9kZXNbaW5kZXhdKTtcbiAgICB9XG5cbiAgICBpZiAoY2hpbGROb2Rlcy5sZW5ndGgpIHtcbiAgICAgIHN0eWxlLmluc2VydEJlZm9yZShjc3NOb2RlLCBjaGlsZE5vZGVzW2luZGV4XSk7XG4gICAgfSBlbHNlIHtcbiAgICAgIHN0eWxlLmFwcGVuZENoaWxkKGNzc05vZGUpO1xuICAgIH1cbiAgfVxufVxuXG5mdW5jdGlvbiBhcHBseVRvVGFnKHN0eWxlLCBvcHRpb25zLCBvYmopIHtcbiAgdmFyIGNzcyA9IG9iai5jc3M7XG4gIHZhciBtZWRpYSA9IG9iai5tZWRpYTtcbiAgdmFyIHNvdXJjZU1hcCA9IG9iai5zb3VyY2VNYXA7XG5cbiAgaWYgKG1lZGlhKSB7XG4gICAgc3R5bGUuc2V0QXR0cmlidXRlKCdtZWRpYScsIG1lZGlhKTtcbiAgfSBlbHNlIHtcbiAgICBzdHlsZS5yZW1vdmVBdHRyaWJ1dGUoJ21lZGlhJyk7XG4gIH1cblxuICBpZiAoc291cmNlTWFwICYmIGJ0b2EpIHtcbiAgICBjc3MgKz0gXCJcXG4vKiMgc291cmNlTWFwcGluZ1VSTD1kYXRhOmFwcGxpY2F0aW9uL2pzb247YmFzZTY0LFwiLmNvbmNhdChidG9hKHVuZXNjYXBlKGVuY29kZVVSSUNvbXBvbmVudChKU09OLnN0cmluZ2lmeShzb3VyY2VNYXApKSkpLCBcIiAqL1wiKTtcbiAgfSAvLyBGb3Igb2xkIElFXG5cbiAgLyogaXN0YW5idWwgaWdub3JlIGlmICAqL1xuXG5cbiAgaWYgKHN0eWxlLnN0eWxlU2hlZXQpIHtcbiAgICBzdHlsZS5zdHlsZVNoZWV0LmNzc1RleHQgPSBjc3M7XG4gIH0gZWxzZSB7XG4gICAgd2hpbGUgKHN0eWxlLmZpcnN0Q2hpbGQpIHtcbiAgICAgIHN0eWxlLnJlbW92ZUNoaWxkKHN0eWxlLmZpcnN0Q2hpbGQpO1xuICAgIH1cblxuICAgIHN0eWxlLmFwcGVuZENoaWxkKGRvY3VtZW50LmNyZWF0ZVRleHROb2RlKGNzcykpO1xuICB9XG59XG5cbnZhciBzaW5nbGV0b24gPSBudWxsO1xudmFyIHNpbmdsZXRvbkNvdW50ZXIgPSAwO1xuXG5mdW5jdGlvbiBhZGRTdHlsZShvYmosIG9wdGlvbnMpIHtcbiAgdmFyIHN0eWxlO1xuICB2YXIgdXBkYXRlO1xuICB2YXIgcmVtb3ZlO1xuXG4gIGlmIChvcHRpb25zLnNpbmdsZXRvbikge1xuICAgIHZhciBzdHlsZUluZGV4ID0gc2luZ2xldG9uQ291bnRlcisrO1xuICAgIHN0eWxlID0gc2luZ2xldG9uIHx8IChzaW5nbGV0b24gPSBpbnNlcnRTdHlsZUVsZW1lbnQob3B0aW9ucykpO1xuICAgIHVwZGF0ZSA9IGFwcGx5VG9TaW5nbGV0b25UYWcuYmluZChudWxsLCBzdHlsZSwgc3R5bGVJbmRleCwgZmFsc2UpO1xuICAgIHJlbW92ZSA9IGFwcGx5VG9TaW5nbGV0b25UYWcuYmluZChudWxsLCBzdHlsZSwgc3R5bGVJbmRleCwgdHJ1ZSk7XG4gIH0gZWxzZSB7XG4gICAgc3R5bGUgPSBpbnNlcnRTdHlsZUVsZW1lbnQob3B0aW9ucyk7XG4gICAgdXBkYXRlID0gYXBwbHlUb1RhZy5iaW5kKG51bGwsIHN0eWxlLCBvcHRpb25zKTtcblxuICAgIHJlbW92ZSA9IGZ1bmN0aW9uIHJlbW92ZSgpIHtcbiAgICAgIHJlbW92ZVN0eWxlRWxlbWVudChzdHlsZSk7XG4gICAgfTtcbiAgfVxuXG4gIHVwZGF0ZShvYmopO1xuICByZXR1cm4gZnVuY3Rpb24gdXBkYXRlU3R5bGUobmV3T2JqKSB7XG4gICAgaWYgKG5ld09iaikge1xuICAgICAgaWYgKG5ld09iai5jc3MgPT09IG9iai5jc3MgJiYgbmV3T2JqLm1lZGlhID09PSBvYmoubWVkaWEgJiYgbmV3T2JqLnNvdXJjZU1hcCA9PT0gb2JqLnNvdXJjZU1hcCkge1xuICAgICAgICByZXR1cm47XG4gICAgICB9XG5cbiAgICAgIHVwZGF0ZShvYmogPSBuZXdPYmopO1xuICAgIH0gZWxzZSB7XG4gICAgICByZW1vdmUoKTtcbiAgICB9XG4gIH07XG59XG5cbm1vZHVsZS5leHBvcnRzID0gZnVuY3Rpb24gKGxpc3QsIG9wdGlvbnMpIHtcbiAgb3B0aW9ucyA9IG9wdGlvbnMgfHwge307IC8vIEZvcmNlIHNpbmdsZS10YWcgc29sdXRpb24gb24gSUU2LTksIHdoaWNoIGhhcyBhIGhhcmQgbGltaXQgb24gdGhlICMgb2YgPHN0eWxlPlxuICAvLyB0YWdzIGl0IHdpbGwgYWxsb3cgb24gYSBwYWdlXG5cbiAgaWYgKCFvcHRpb25zLnNpbmdsZXRvbiAmJiB0eXBlb2Ygb3B0aW9ucy5zaW5nbGV0b24gIT09ICdib29sZWFuJykge1xuICAgIG9wdGlvbnMuc2luZ2xldG9uID0gaXNPbGRJRSgpO1xuICB9XG5cbiAgbGlzdCA9IGxpc3QgfHwgW107XG4gIHZhciBsYXN0SWRlbnRpZmllcnMgPSBtb2R1bGVzVG9Eb20obGlzdCwgb3B0aW9ucyk7XG4gIHJldHVybiBmdW5jdGlvbiB1cGRhdGUobmV3TGlzdCkge1xuICAgIG5ld0xpc3QgPSBuZXdMaXN0IHx8IFtdO1xuXG4gICAgaWYgKE9iamVjdC5wcm90b3R5cGUudG9TdHJpbmcuY2FsbChuZXdMaXN0KSAhPT0gJ1tvYmplY3QgQXJyYXldJykge1xuICAgICAgcmV0dXJuO1xuICAgIH1cblxuICAgIGZvciAodmFyIGkgPSAwOyBpIDwgbGFzdElkZW50aWZpZXJzLmxlbmd0aDsgaSsrKSB7XG4gICAgICB2YXIgaWRlbnRpZmllciA9IGxhc3RJZGVudGlmaWVyc1tpXTtcbiAgICAgIHZhciBpbmRleCA9IGdldEluZGV4QnlJZGVudGlmaWVyKGlkZW50aWZpZXIpO1xuICAgICAgc3R5bGVzSW5Eb21baW5kZXhdLnJlZmVyZW5jZXMtLTtcbiAgICB9XG5cbiAgICB2YXIgbmV3TGFzdElkZW50aWZpZXJzID0gbW9kdWxlc1RvRG9tKG5ld0xpc3QsIG9wdGlvbnMpO1xuXG4gICAgZm9yICh2YXIgX2kgPSAwOyBfaSA8IGxhc3RJZGVudGlmaWVycy5sZW5ndGg7IF9pKyspIHtcbiAgICAgIHZhciBfaWRlbnRpZmllciA9IGxhc3RJZGVudGlmaWVyc1tfaV07XG5cbiAgICAgIHZhciBfaW5kZXggPSBnZXRJbmRleEJ5SWRlbnRpZmllcihfaWRlbnRpZmllcik7XG5cbiAgICAgIGlmIChzdHlsZXNJbkRvbVtfaW5kZXhdLnJlZmVyZW5jZXMgPT09IDApIHtcbiAgICAgICAgc3R5bGVzSW5Eb21bX2luZGV4XS51cGRhdGVyKCk7XG5cbiAgICAgICAgc3R5bGVzSW5Eb20uc3BsaWNlKF9pbmRleCwgMSk7XG4gICAgICB9XG4gICAgfVxuXG4gICAgbGFzdElkZW50aWZpZXJzID0gbmV3TGFzdElkZW50aWZpZXJzO1xuICB9O1xufTsiLCJ2YXIgbWFwID0ge1xuXHRcIi4vRm9udHMvQXJzZW5hbC1Cb2xkLnR0ZlwiOiBcIi4vc3JjL0F0dGFjaC9Gb250cy9BcnNlbmFsLUJvbGQudHRmXCIsXG5cdFwiLi9Gb250cy9BcnNlbmFsLUl0YWxpYy50dGZcIjogXCIuL3NyYy9BdHRhY2gvRm9udHMvQXJzZW5hbC1JdGFsaWMudHRmXCIsXG5cdFwiLi9Gb250cy9SYWxld2F5LVJlZ3VsYXIudHRmXCI6IFwiLi9zcmMvQXR0YWNoL0ZvbnRzL1JhbGV3YXktUmVndWxhci50dGZcIixcblx0XCIuL0ZvbnRzL21vcmUvQXJzZW5hbC1Cb2xkSXRhbGljLnR0ZlwiOiBcIi4vc3JjL0F0dGFjaC9Gb250cy9tb3JlL0Fyc2VuYWwtQm9sZEl0YWxpYy50dGZcIixcblx0XCIuL0ZvbnRzL21vcmUvQXJzZW5hbC1SZWd1bGFyLnR0ZlwiOiBcIi4vc3JjL0F0dGFjaC9Gb250cy9tb3JlL0Fyc2VuYWwtUmVndWxhci50dGZcIixcblx0XCIuL0ZvbnRzL21vcmUvUmFsZXdheS1CbGFjay50dGZcIjogXCIuL3NyYy9BdHRhY2gvRm9udHMvbW9yZS9SYWxld2F5LUJsYWNrLnR0ZlwiLFxuXHRcIi4vRm9udHMvbW9yZS9SYWxld2F5LUJsYWNrSXRhbGljLnR0ZlwiOiBcIi4vc3JjL0F0dGFjaC9Gb250cy9tb3JlL1JhbGV3YXktQmxhY2tJdGFsaWMudHRmXCIsXG5cdFwiLi9Gb250cy9tb3JlL1JhbGV3YXktQm9sZC50dGZcIjogXCIuL3NyYy9BdHRhY2gvRm9udHMvbW9yZS9SYWxld2F5LUJvbGQudHRmXCIsXG5cdFwiLi9Gb250cy9tb3JlL1JhbGV3YXktQm9sZEl0YWxpYy50dGZcIjogXCIuL3NyYy9BdHRhY2gvRm9udHMvbW9yZS9SYWxld2F5LUJvbGRJdGFsaWMudHRmXCIsXG5cdFwiLi9Gb250cy9tb3JlL1JhbGV3YXktRXh0cmFCb2xkLnR0ZlwiOiBcIi4vc3JjL0F0dGFjaC9Gb250cy9tb3JlL1JhbGV3YXktRXh0cmFCb2xkLnR0ZlwiLFxuXHRcIi4vRm9udHMvbW9yZS9SYWxld2F5LUV4dHJhQm9sZEl0YWxpYy50dGZcIjogXCIuL3NyYy9BdHRhY2gvRm9udHMvbW9yZS9SYWxld2F5LUV4dHJhQm9sZEl0YWxpYy50dGZcIixcblx0XCIuL0ZvbnRzL21vcmUvUmFsZXdheS1FeHRyYUxpZ2h0LnR0ZlwiOiBcIi4vc3JjL0F0dGFjaC9Gb250cy9tb3JlL1JhbGV3YXktRXh0cmFMaWdodC50dGZcIixcblx0XCIuL0ZvbnRzL21vcmUvUmFsZXdheS1FeHRyYUxpZ2h0SXRhbGljLnR0ZlwiOiBcIi4vc3JjL0F0dGFjaC9Gb250cy9tb3JlL1JhbGV3YXktRXh0cmFMaWdodEl0YWxpYy50dGZcIixcblx0XCIuL0ZvbnRzL21vcmUvUmFsZXdheS1JdGFsaWMudHRmXCI6IFwiLi9zcmMvQXR0YWNoL0ZvbnRzL21vcmUvUmFsZXdheS1JdGFsaWMudHRmXCIsXG5cdFwiLi9Gb250cy9tb3JlL1JhbGV3YXktTGlnaHQudHRmXCI6IFwiLi9zcmMvQXR0YWNoL0ZvbnRzL21vcmUvUmFsZXdheS1MaWdodC50dGZcIixcblx0XCIuL0ZvbnRzL21vcmUvUmFsZXdheS1MaWdodEl0YWxpYy50dGZcIjogXCIuL3NyYy9BdHRhY2gvRm9udHMvbW9yZS9SYWxld2F5LUxpZ2h0SXRhbGljLnR0ZlwiLFxuXHRcIi4vRm9udHMvbW9yZS9SYWxld2F5LU1lZGl1bS50dGZcIjogXCIuL3NyYy9BdHRhY2gvRm9udHMvbW9yZS9SYWxld2F5LU1lZGl1bS50dGZcIixcblx0XCIuL0ZvbnRzL21vcmUvUmFsZXdheS1NZWRpdW1JdGFsaWMudHRmXCI6IFwiLi9zcmMvQXR0YWNoL0ZvbnRzL21vcmUvUmFsZXdheS1NZWRpdW1JdGFsaWMudHRmXCIsXG5cdFwiLi9Gb250cy9tb3JlL1JhbGV3YXktU2VtaUJvbGQudHRmXCI6IFwiLi9zcmMvQXR0YWNoL0ZvbnRzL21vcmUvUmFsZXdheS1TZW1pQm9sZC50dGZcIixcblx0XCIuL0ZvbnRzL21vcmUvUmFsZXdheS1TZW1pQm9sZEl0YWxpYy50dGZcIjogXCIuL3NyYy9BdHRhY2gvRm9udHMvbW9yZS9SYWxld2F5LVNlbWlCb2xkSXRhbGljLnR0ZlwiLFxuXHRcIi4vRm9udHMvbW9yZS9SYWxld2F5LVRoaW4udHRmXCI6IFwiLi9zcmMvQXR0YWNoL0ZvbnRzL21vcmUvUmFsZXdheS1UaGluLnR0ZlwiLFxuXHRcIi4vRm9udHMvbW9yZS9SYWxld2F5LVRoaW5JdGFsaWMudHRmXCI6IFwiLi9zcmMvQXR0YWNoL0ZvbnRzL21vcmUvUmFsZXdheS1UaGluSXRhbGljLnR0ZlwiLFxuXHRcIi4vSW1hZ2VzL2JhY2suanBnXCI6IFwiLi9zcmMvQXR0YWNoL0ltYWdlcy9iYWNrLmpwZ1wiLFxuXHRcIi4vSW1hZ2VzL2JvYXQxLmpwZ1wiOiBcIi4vc3JjL0F0dGFjaC9JbWFnZXMvYm9hdDEuanBnXCIsXG5cdFwiLi9JbWFnZXMvYm9hdDEwLmpwZ1wiOiBcIi4vc3JjL0F0dGFjaC9JbWFnZXMvYm9hdDEwLmpwZ1wiLFxuXHRcIi4vSW1hZ2VzL2JvYXQxMS5qcGdcIjogXCIuL3NyYy9BdHRhY2gvSW1hZ2VzL2JvYXQxMS5qcGdcIixcblx0XCIuL0ltYWdlcy9ib2F0Mi5qcGdcIjogXCIuL3NyYy9BdHRhY2gvSW1hZ2VzL2JvYXQyLmpwZ1wiLFxuXHRcIi4vSW1hZ2VzL2JvYXQzLmpwZ1wiOiBcIi4vc3JjL0F0dGFjaC9JbWFnZXMvYm9hdDMuanBnXCIsXG5cdFwiLi9JbWFnZXMvYm9hdDQuanBnXCI6IFwiLi9zcmMvQXR0YWNoL0ltYWdlcy9ib2F0NC5qcGdcIixcblx0XCIuL0ltYWdlcy9ib2F0NS5qcGdcIjogXCIuL3NyYy9BdHRhY2gvSW1hZ2VzL2JvYXQ1LmpwZ1wiLFxuXHRcIi4vSW1hZ2VzL2JvYXQ2LmpwZ1wiOiBcIi4vc3JjL0F0dGFjaC9JbWFnZXMvYm9hdDYuanBnXCIsXG5cdFwiLi9JbWFnZXMvYm9hdDcuanBnXCI6IFwiLi9zcmMvQXR0YWNoL0ltYWdlcy9ib2F0Ny5qcGdcIixcblx0XCIuL0ltYWdlcy9ib2F0OC5qcGdcIjogXCIuL3NyYy9BdHRhY2gvSW1hZ2VzL2JvYXQ4LmpwZ1wiLFxuXHRcIi4vSW1hZ2VzL2JvYXQ5LmpwZ1wiOiBcIi4vc3JjL0F0dGFjaC9JbWFnZXMvYm9hdDkuanBnXCIsXG5cdFwiLi9JbWFnZXMvYnV0dG9uLmpwZ1wiOiBcIi4vc3JjL0F0dGFjaC9JbWFnZXMvYnV0dG9uLmpwZ1wiLFxuXHRcIi4vSW1hZ2VzL2RpdmluZy1pY29uLnN2Z1wiOiBcIi4vc3JjL0F0dGFjaC9JbWFnZXMvZGl2aW5nLWljb24uc3ZnXCIsXG5cdFwiLi9JbWFnZXMvZmlzaC1pY29uLnN2Z1wiOiBcIi4vc3JjL0F0dGFjaC9JbWFnZXMvZmlzaC1pY29uLnN2Z1wiLFxuXHRcIi4vSW1hZ2VzL2Zvb2QtaWNvbi5zdmdcIjogXCIuL3NyYy9BdHRhY2gvSW1hZ2VzL2Zvb2QtaWNvbi5zdmdcIixcblx0XCIuL0ltYWdlcy9sb2dvLWRhcmsuc3ZnXCI6IFwiLi9zcmMvQXR0YWNoL0ltYWdlcy9sb2dvLWRhcmsuc3ZnXCIsXG5cdFwiLi9JbWFnZXMvbG9nby1saWdodC5zdmdcIjogXCIuL3NyYy9BdHRhY2gvSW1hZ2VzL2xvZ28tbGlnaHQuc3ZnXCJcbn07XG5cblxuZnVuY3Rpb24gd2VicGFja0NvbnRleHQocmVxKSB7XG5cdHZhciBpZCA9IHdlYnBhY2tDb250ZXh0UmVzb2x2ZShyZXEpO1xuXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhpZCk7XG59XG5mdW5jdGlvbiB3ZWJwYWNrQ29udGV4dFJlc29sdmUocmVxKSB7XG5cdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8obWFwLCByZXEpKSB7XG5cdFx0dmFyIGUgPSBuZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiICsgcmVxICsgXCInXCIpO1xuXHRcdGUuY29kZSA9ICdNT0RVTEVfTk9UX0ZPVU5EJztcblx0XHR0aHJvdyBlO1xuXHR9XG5cdHJldHVybiBtYXBbcmVxXTtcbn1cbndlYnBhY2tDb250ZXh0LmtleXMgPSBmdW5jdGlvbiB3ZWJwYWNrQ29udGV4dEtleXMoKSB7XG5cdHJldHVybiBPYmplY3Qua2V5cyhtYXApO1xufTtcbndlYnBhY2tDb250ZXh0LnJlc29sdmUgPSB3ZWJwYWNrQ29udGV4dFJlc29sdmU7XG5tb2R1bGUuZXhwb3J0cyA9IHdlYnBhY2tDb250ZXh0O1xud2VicGFja0NvbnRleHQuaWQgPSBcIi4vc3JjL0F0dGFjaCBzeW5jIHJlY3Vyc2l2ZSBcXFxcLlwiOyIsImV4cG9ydCBkZWZhdWx0IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCIuL2F0dGFjaC9mb250L0Fyc2VuYWwtQm9sZC50dGZcIjsiLCJleHBvcnQgZGVmYXVsdCBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiLi9hdHRhY2gvZm9udC9BcnNlbmFsLUl0YWxpYy50dGZcIjsiLCJleHBvcnQgZGVmYXVsdCBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiLi9hdHRhY2gvZm9udC9SYWxld2F5LVJlZ3VsYXIudHRmXCI7IiwiZXhwb3J0IGRlZmF1bHQgX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcIi4vYXR0YWNoL2ZvbnQvQXJzZW5hbC1Cb2xkSXRhbGljLnR0ZlwiOyIsImV4cG9ydCBkZWZhdWx0IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCIuL2F0dGFjaC9mb250L0Fyc2VuYWwtUmVndWxhci50dGZcIjsiLCJleHBvcnQgZGVmYXVsdCBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiLi9hdHRhY2gvZm9udC9SYWxld2F5LUJsYWNrLnR0ZlwiOyIsImV4cG9ydCBkZWZhdWx0IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCIuL2F0dGFjaC9mb250L1JhbGV3YXktQmxhY2tJdGFsaWMudHRmXCI7IiwiZXhwb3J0IGRlZmF1bHQgX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcIi4vYXR0YWNoL2ZvbnQvUmFsZXdheS1Cb2xkLnR0ZlwiOyIsImV4cG9ydCBkZWZhdWx0IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCIuL2F0dGFjaC9mb250L1JhbGV3YXktQm9sZEl0YWxpYy50dGZcIjsiLCJleHBvcnQgZGVmYXVsdCBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiLi9hdHRhY2gvZm9udC9SYWxld2F5LUV4dHJhQm9sZC50dGZcIjsiLCJleHBvcnQgZGVmYXVsdCBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiLi9hdHRhY2gvZm9udC9SYWxld2F5LUV4dHJhQm9sZEl0YWxpYy50dGZcIjsiLCJleHBvcnQgZGVmYXVsdCBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiLi9hdHRhY2gvZm9udC9SYWxld2F5LUV4dHJhTGlnaHQudHRmXCI7IiwiZXhwb3J0IGRlZmF1bHQgX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcIi4vYXR0YWNoL2ZvbnQvUmFsZXdheS1FeHRyYUxpZ2h0SXRhbGljLnR0ZlwiOyIsImV4cG9ydCBkZWZhdWx0IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCIuL2F0dGFjaC9mb250L1JhbGV3YXktSXRhbGljLnR0ZlwiOyIsImV4cG9ydCBkZWZhdWx0IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCIuL2F0dGFjaC9mb250L1JhbGV3YXktTGlnaHQudHRmXCI7IiwiZXhwb3J0IGRlZmF1bHQgX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcIi4vYXR0YWNoL2ZvbnQvUmFsZXdheS1MaWdodEl0YWxpYy50dGZcIjsiLCJleHBvcnQgZGVmYXVsdCBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiLi9hdHRhY2gvZm9udC9SYWxld2F5LU1lZGl1bS50dGZcIjsiLCJleHBvcnQgZGVmYXVsdCBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiLi9hdHRhY2gvZm9udC9SYWxld2F5LU1lZGl1bUl0YWxpYy50dGZcIjsiLCJleHBvcnQgZGVmYXVsdCBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiLi9hdHRhY2gvZm9udC9SYWxld2F5LVNlbWlCb2xkLnR0ZlwiOyIsImV4cG9ydCBkZWZhdWx0IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCIuL2F0dGFjaC9mb250L1JhbGV3YXktU2VtaUJvbGRJdGFsaWMudHRmXCI7IiwiZXhwb3J0IGRlZmF1bHQgX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcIi4vYXR0YWNoL2ZvbnQvUmFsZXdheS1UaGluLnR0ZlwiOyIsImV4cG9ydCBkZWZhdWx0IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCIuL2F0dGFjaC9mb250L1JhbGV3YXktVGhpbkl0YWxpYy50dGZcIjsiLCJleHBvcnQgZGVmYXVsdCBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiLi9hdHRhY2gvaW1nL2JhY2suanBnXCI7IiwiZXhwb3J0IGRlZmF1bHQgX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcIi4vYXR0YWNoL2ltZy9ib2F0MS5qcGdcIjsiLCJleHBvcnQgZGVmYXVsdCBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiLi9hdHRhY2gvaW1nL2JvYXQxMC5qcGdcIjsiLCJleHBvcnQgZGVmYXVsdCBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiLi9hdHRhY2gvaW1nL2JvYXQxMS5qcGdcIjsiLCJleHBvcnQgZGVmYXVsdCBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiLi9hdHRhY2gvaW1nL2JvYXQyLmpwZ1wiOyIsImV4cG9ydCBkZWZhdWx0IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCIuL2F0dGFjaC9pbWcvYm9hdDMuanBnXCI7IiwiZXhwb3J0IGRlZmF1bHQgX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcIi4vYXR0YWNoL2ltZy9ib2F0NC5qcGdcIjsiLCJleHBvcnQgZGVmYXVsdCBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiLi9hdHRhY2gvaW1nL2JvYXQ1LmpwZ1wiOyIsImV4cG9ydCBkZWZhdWx0IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCIuL2F0dGFjaC9pbWcvYm9hdDYuanBnXCI7IiwiZXhwb3J0IGRlZmF1bHQgX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcIi4vYXR0YWNoL2ltZy9ib2F0Ny5qcGdcIjsiLCJleHBvcnQgZGVmYXVsdCBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiLi9hdHRhY2gvaW1nL2JvYXQ4LmpwZ1wiOyIsImV4cG9ydCBkZWZhdWx0IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCIuL2F0dGFjaC9pbWcvYm9hdDkuanBnXCI7IiwiZXhwb3J0IGRlZmF1bHQgX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcIi4vYXR0YWNoL2ltZy9idXR0b24uanBnXCI7IiwiZXhwb3J0IGRlZmF1bHQgX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcIi4vYXR0YWNoL2ltZy9kaXZpbmctaWNvbi5zdmdcIjsiLCJleHBvcnQgZGVmYXVsdCBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiLi9hdHRhY2gvaW1nL2Zpc2gtaWNvbi5zdmdcIjsiLCJleHBvcnQgZGVmYXVsdCBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiLi9hdHRhY2gvaW1nL2Zvb2QtaWNvbi5zdmdcIjsiLCJleHBvcnQgZGVmYXVsdCBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiLi9hdHRhY2gvaW1nL2xvZ28tZGFyay5zdmdcIjsiLCJleHBvcnQgZGVmYXVsdCBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiLi9hdHRhY2gvaW1nL2xvZ28tbGlnaHQuc3ZnXCI7IiwidmFyIG1hcCA9IHtcblx0XCIuL2NvcmUuanNcIjogXCIuL3NyYy9Mb2dpYy9jb3JlLmpzXCJcbn07XG5cblxuZnVuY3Rpb24gd2VicGFja0NvbnRleHQocmVxKSB7XG5cdHZhciBpZCA9IHdlYnBhY2tDb250ZXh0UmVzb2x2ZShyZXEpO1xuXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhpZCk7XG59XG5mdW5jdGlvbiB3ZWJwYWNrQ29udGV4dFJlc29sdmUocmVxKSB7XG5cdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8obWFwLCByZXEpKSB7XG5cdFx0dmFyIGUgPSBuZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiICsgcmVxICsgXCInXCIpO1xuXHRcdGUuY29kZSA9ICdNT0RVTEVfTk9UX0ZPVU5EJztcblx0XHR0aHJvdyBlO1xuXHR9XG5cdHJldHVybiBtYXBbcmVxXTtcbn1cbndlYnBhY2tDb250ZXh0LmtleXMgPSBmdW5jdGlvbiB3ZWJwYWNrQ29udGV4dEtleXMoKSB7XG5cdHJldHVybiBPYmplY3Qua2V5cyhtYXApO1xufTtcbndlYnBhY2tDb250ZXh0LnJlc29sdmUgPSB3ZWJwYWNrQ29udGV4dFJlc29sdmU7XG5tb2R1bGUuZXhwb3J0cyA9IHdlYnBhY2tDb250ZXh0O1xud2VicGFja0NvbnRleHQuaWQgPSBcIi4vc3JjL0xvZ2ljIHN5bmMgcmVjdXJzaXZlIFxcXFwuanMkXCI7IiwiaW1wb3J0ICcuLy4uLy4uL2J1bmRsZSc7XG5cbi8vIENvZGUgbGlicyBhbmQgcGx1Z2luc1xuaW1wb3J0IHsgZ2xvYmFsRXZlbnRvbmUgfSBmcm9tICcuLi8uLi9QbHVnaW5zL2V2ZW50b25lLmpzJztcblxuZ2xvYmFsRXZlbnRvbmUoKTsiLCJ2YXIgYXBpID0gcmVxdWlyZShcIiEuLi8uLi8uLi9ub2RlX21vZHVsZXMvc3R5bGUtbG9hZGVyL2Rpc3QvcnVudGltZS9pbmplY3RTdHlsZXNJbnRvU3R5bGVUYWcuanNcIik7XG4gICAgICAgICAgICB2YXIgY29udGVudCA9IHJlcXVpcmUoXCIhIS4uLy4uLy4uL25vZGVfbW9kdWxlcy9taW5pLWNzcy1leHRyYWN0LXBsdWdpbi9kaXN0L2xvYWRlci5qcz8/cmVmLS01LTEhLi4vLi4vLi4vbm9kZV9tb2R1bGVzL2Nzcy1sb2FkZXIvZGlzdC9janMuanM/P3JlZi0tNS0yIS4uLy4uLy4uL25vZGVfbW9kdWxlcy9wb3N0Y3NzLWxvYWRlci9zcmMvaW5kZXguanMhLi4vLi4vLi4vbm9kZV9tb2R1bGVzL3Nhc3MtbG9hZGVyL2Rpc3QvY2pzLmpzIS4vaW5kZXguc2Fzc1wiKTtcblxuICAgICAgICAgICAgY29udGVudCA9IGNvbnRlbnQuX19lc01vZHVsZSA/IGNvbnRlbnQuZGVmYXVsdCA6IGNvbnRlbnQ7XG5cbiAgICAgICAgICAgIGlmICh0eXBlb2YgY29udGVudCA9PT0gJ3N0cmluZycpIHtcbiAgICAgICAgICAgICAgY29udGVudCA9IFtbbW9kdWxlLmlkLCBjb250ZW50LCAnJ11dO1xuICAgICAgICAgICAgfVxuXG52YXIgb3B0aW9ucyA9IHt9O1xuXG5vcHRpb25zLmluc2VydCA9IFwiaGVhZFwiO1xub3B0aW9ucy5zaW5nbGV0b24gPSBmYWxzZTtcblxudmFyIHVwZGF0ZSA9IGFwaShjb250ZW50LCBvcHRpb25zKTtcblxuXG5cbm1vZHVsZS5leHBvcnRzID0gY29udGVudC5sb2NhbHMgfHwge307IiwiY29uc3QgX19FVkVOVE9ORV9fID0ge307XG5cbmZ1bmN0aW9uIGFjdGlvbihsYWJlbCwgaW5QbGFjZUNhbGxiYWNrKSB7XG4gIHJldHVybiBmdW5jdGlvbiAoLi4uYXJncykge1xuICAgIGxldCByZWFjdG9ycztcbiAgICBpZiAoX19FVkVOVE9ORV9fW2xhYmVsXSkgLy8gZ2l2aW5nIHNob3J0ZW4gbmFtZVxuICAgICAgcmVhY3RvcnMgPSBfX0VWRU5UT05FX19bbGFiZWxdO1xuXG4gICAgaWYgKHJlYWN0b3JzKSB7XG4gICAgICAvLyByZWFjdG9ycyBiZWZvcmUgbWFpbiByZWFjdG9yXG4gICAgICBpZiAoQXJyYXkuaXNBcnJheShyZWFjdG9ycy5iZWZvcmUpICYmIHJlYWN0b3JzLmJlZm9yZS5sZW5ndGggPiAwKVxuICAgICAgICByZWFjdG9ycy5iZWZvcmUuZm9yRWFjaCgoWywgcmVhY3Rvcl0pID0+IHJlYWN0b3IoLi4uYXJncykpO1xuICAgICAgLy8gbWFpbiByZWFjdG9yIHdpdGggMCBjYWxsUGxhY2VcbiAgICAgIGlmIChpblBsYWNlQ2FsbGJhY2spXG4gICAgICAgIGluUGxhY2VDYWxsYmFjayguLi5hcmdzKTtcbiAgICAgIC8vIHJlYWN0b3JzIGFmdGVyIG1haW4gcmVhY3RvclxuICAgICAgaWYgKEFycmF5LmlzQXJyYXkocmVhY3RvcnMuYWZ0ZXIpICYmIHJlYWN0b3JzLmFmdGVyLmxlbmd0aCA+IDApXG4gICAgICAgIHJlYWN0b3JzLmFmdGVyLmZvckVhY2goKFssIHJlYWN0b3JdKSA9PiByZWFjdG9yKC4uLmFyZ3MpKTtcblxuICAgIH0gZWxzZSBpZiAoaW5QbGFjZUNhbGxiYWNrKSB7XG4gICAgICBpblBsYWNlQ2FsbGJhY2soLi4uYXJncyk7IC8vanVzdCBtYWluIHJlYWN0b3IgY2FsbFxuICAgIH1cbiAgfTtcbn1cblxuZnVuY3Rpb24gd2hlbihhY3Rpb25MYWJlbCwgcmVhY3RvciwgY2FsbFBsYWNlID0gMCkge1xuICBpZiAodHlwZW9mIGFjdGlvbkxhYmVsID09ICdzdHJpbmcnKSB7XG4gICAgd2hlbkxvZ2ljKGFjdGlvbkxhYmVsKTtcbiAgfSBlbHNlIGlmIChBcnJheS5pc0FycmF5KGFjdGlvbkxhYmVsKSkge1xuICAgIGZvciAobGV0IHNpbmdsZUFjdGlvbkxhYmVsIG9mIGFjdGlvbkxhYmVsKSB7XG4gICAgICB3aGVuTG9naWMoc2luZ2xlQWN0aW9uTGFiZWwpO1xuICAgIH1cbiAgfVxuXG4gIGZ1bmN0aW9uIHdoZW5Mb2dpYyhhY3Rpb25MYWJlbCkge1xuICAgIGxldCBwbGFjZURpbWVuc2lvbiA9IGNhbGxQbGFjZSA8IDAgPyAnYmVmb3JlJyA6ICdhZnRlcic7XG4gICAgaWYgKCFfX0VWRU5UT05FX19bYWN0aW9uTGFiZWxdKSAvLyBjaGVjayBhY3Rpb25MYWJlbCBleGlzdFxuICAgICAgX19FVkVOVE9ORV9fW2FjdGlvbkxhYmVsXSA9IHt9OyAvLyBjcmVhdGUgaWYgbm90XG4gICAgaWYgKCFBcnJheS5pc0FycmF5KF9fRVZFTlRPTkVfX1thY3Rpb25MYWJlbF1bcGxhY2VEaW1lbnNpb25dKSkgLy8gY2hlY2sgZGltZW5zaW9uIGlzIEFycmF5XG4gICAgICBfX0VWRU5UT05FX19bYWN0aW9uTGFiZWxdW3BsYWNlRGltZW5zaW9uXSA9IFtdOyAvLyBjcmVhdGUgaWYgbm90XG5cbiAgICBfX0VWRU5UT05FX19bYWN0aW9uTGFiZWxdW3BsYWNlRGltZW5zaW9uXS5wdXNoKFtjYWxsUGxhY2UsIHJlYWN0b3JdKTsgLy8gcHVzaGluZyByZWFjdG9yIGluc2lkZVxuICAgIF9fRVZFTlRPTkVfX1thY3Rpb25MYWJlbF1bcGxhY2VEaW1lbnNpb25dLnNvcnQoKGEsIGIpID0+IGFbMF0gLSBiWzBdKTsgLy8gc29ydGluZyByZWFjdG9ycyBieSBjYWxsUGxhY2VcbiAgfVxufVxuXG5leHBvcnQgZnVuY3Rpb24gZ2xvYmFsRXZlbnRvbmUoKSB7XG4gIHdpbmRvdy5fX0VWRU5UT05FX18gPSBfX0VWRU5UT05FX187XG4gIHdpbmRvdy5hY3Rpb24gPSBhY3Rpb247XG4gIHdpbmRvdy53aGVuID0gd2hlbjtcbn0iLCJjb25zdCBpbXBvcnRlciA9IHJlcXVpcmUoJy4uL3dlYnBhY2suaW1wb3J0ZXInKTtcclxuXHJcbmNvbnN0IGltcG9ydGVkID0gaW1wb3J0ZXIoW1xyXG4gIHJlcXVpcmUuY29udGV4dCgnLi9Mb2dpYy8nLCB0cnVlLCAvXFwuanMkLyksXHJcbiAgcmVxdWlyZS5jb250ZXh0KCcuL0F0dGFjaC8nLCB0cnVlLCAvXFwuLyksXHJcbl0pO1xyXG5cclxuIiwiZnVuY3Rpb24gaW1wb3J0QWxsKHJlcSkge1xuICBsZXQgdGFyZ2V0cyA9IHt9O1xuICByZXEua2V5cygpLmZvckVhY2goaXRlbSA9PiB7IHRhcmdldHNbaXRlbS5yZXBsYWNlKCcuLycsICcnKV0gPSByZXEoaXRlbSk7IH0pO1xuICAvL2NvbnNvbGUubG9nKCd0YXJnZXRzJywgdGFyZ2V0cyk7XG4gIHJldHVybiB0YXJnZXRzO1xufVxuXG5mdW5jdGlvbiBpbXBvcnRlcihmaWxlSW1wb3J0cykge1xuICBjb25zdCBpbXBvcnRlZCA9IFtdO1xuICBmb3IgKGxldCByZXEgb2YgZmlsZUltcG9ydHMpIHtcbiAgICBpbXBvcnRlZC5wdXNoKGltcG9ydEFsbChyZXEpKTtcbiAgfVxuXG4gIHJldHVybiBpbXBvcnRlZDtcbn1cblxubW9kdWxlLmV4cG9ydHMgPSBpbXBvcnRlcjsiXSwic291cmNlUm9vdCI6IiJ9