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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/create.js":
/*!********************************!*\
  !*** ./resources/js/create.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  $(document).on('click', '#food_cre', function () {
    var table = document.getElementById("food_table");
    var row = table.insertRow(); //td分追加

    var cell1 = row.insertCell();
    var cell2 = row.insertCell();
    var cell3 = row.insertCell();
    var cell4 = row.insertCell(); // セルの内容入力

    cell1.innerHTML = '<td class="foodname"><input class=foodtex value="" name="foodname[]" type="text" placeholder="食材名"></td>';
    cell2.innerHTML = '<td class="foodnum"><input class=food_num value="" name="foodnum[]" type="text" placeholder="数量"></td>';
    cell3.innerHTML = '<td class="foodunit"><select name="unit[]" class="unit"><option value="">単位</option><option value="cc">cc</option><option value="ml">ml</option><option value="g">g</option><option value="本">本</option><option value="個">個</option><option value="枚">枚</option><option value="束">束</option><option value="袋">袋</option><option value="缶">缶</option><option value="房">房</option><option value="切">切</option><option value="合">合</option><option value="適量">適量</option>';
    cell4.innerHTML = '<td class="food_del"><button class="fooddel" name="del">✖︎</button></td>';
  });
});
$(function () {
  $(document).on('click', '.fooddel', function () {
    var row = $(this).closest("tr").remove();
    $(row).remove();
  });
}); //shopping 買い物メモの金額自動計算設定

function addSelectItem() {
  itemStr = document.form1.shop.value;
  len = document.form1.retailer.options.length;
  document.form1.retailer.options[len] = new Option(itemStr, itemStr);
}

function inputCheck() {
  // 2つの入力フォームの値を取得
  //document（資料）オブジェクトは、ブラウザ上で表示されたドキュメントを操作できます
  var amount = document.getElementById("amount").value;
  var num = document.getElementById("num").value; //乗算の設定

  var mul = parseFloat(amount, 10) * parseFloat(num, 10); //デバックの設定

  console.log(mul); // 計算結果を表示

  var amounttotal = document.getElementById("amounttotal");

  if (isNaN) {
    amounttotal.value = mul;
  } else {
    amounttotal.value = 0;
  }
}

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/create.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/ubuntu/dev/recipe/resources/js/create.js */"./resources/js/create.js");


/***/ })

/******/ });