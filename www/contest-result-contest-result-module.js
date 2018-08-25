(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["contest-result-contest-result-module"],{

/***/ "./src/app/contest-result/contest-result.module.ts":
/*!*********************************************************!*\
  !*** ./src/app/contest-result/contest-result.module.ts ***!
  \*********************************************************/
/*! exports provided: ContestResultPageModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ContestResultPageModule", function() { return ContestResultPageModule; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/fesm5/common.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/fesm5/forms.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm5/router.js");
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @ionic/angular */ "./node_modules/@ionic/angular/dist/index.js");
/* harmony import */ var _contest_result_page__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./contest-result.page */ "./src/app/contest-result/contest-result.page.ts");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};






var routes = [
    {
        path: '',
        component: _contest_result_page__WEBPACK_IMPORTED_MODULE_5__["ContestResultPage"]
    }
];
var ContestResultPageModule = /** @class */ (function () {
    function ContestResultPageModule() {
    }
    ContestResultPageModule = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["NgModule"])({
            imports: [
                _angular_common__WEBPACK_IMPORTED_MODULE_1__["CommonModule"],
                _angular_forms__WEBPACK_IMPORTED_MODULE_2__["FormsModule"],
                _ionic_angular__WEBPACK_IMPORTED_MODULE_4__["IonicModule"],
                _angular_router__WEBPACK_IMPORTED_MODULE_3__["RouterModule"].forChild(routes)
            ],
            declarations: [_contest_result_page__WEBPACK_IMPORTED_MODULE_5__["ContestResultPage"]]
        })
    ], ContestResultPageModule);
    return ContestResultPageModule;
}());



/***/ }),

/***/ "./src/app/contest-result/contest-result.page.html":
/*!*********************************************************!*\
  !*** ./src/app/contest-result/contest-result.page.html ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<ion-header>\n  <ion-toolbar>\n    <ion-title>Toolbar</ion-title>\n  </ion-toolbar>\n</ion-header>\n\n<ion-content padding>\n\t \n\t <ion-grid>\n  <ion-row justify-content-center>\n  \t\t<ion-col size-md=\"2\" size-xs=\"2\">\n  \t\t\t<h2>Add User</h2>\n  \t\t</ion-col>\n  </ion-row>\n  <ion-row justify-content-center>\n    \n    <ion-col size-md=\"4\" size-xs=\"12\">\n      <div>\n          <ion-img src=\"https://beta.ionicframework.com/docs/content/component-preview-app/docs-www/assets/madison.jpg\"></ion-img>\n          <ion-item>\n\t\t\t  <ion-input required type=\"file\" placeholder=\"File\"></ion-input>\n\t\t\t</ion-item>\n      </div>\n    </ion-col>\n    <ion-col size-md=\"4\" size-xs=\"12\">\n      <div>\n        <form (ngSubmit)=\"presentLoading()\">\n        \t<ion-item>\n\t\t\t  <ion-input required type=\"text\" placeholder=\"First Name\"></ion-input>\n\t\t\t</ion-item>\n\t\t\t<ion-item>\n\t\t\t  <ion-textarea required type=\"text\" placeholder=\"First Name\"></ion-textarea>\n\t\t\t</ion-item>\n\n        \t<ion-button size=\"full\" type=\"submit\"  full>Small Button</ion-button>\n        </form>\n      </div>\n    </ion-col>\n    \n  </ion-row>\n</ion-grid>\n  \n</ion-content>\n"

/***/ }),

/***/ "./src/app/contest-result/contest-result.page.scss":
/*!*********************************************************!*\
  !*** ./src/app/contest-result/contest-result.page.scss ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = ""

/***/ }),

/***/ "./src/app/contest-result/contest-result.page.ts":
/*!*******************************************************!*\
  !*** ./src/app/contest-result/contest-result.page.ts ***!
  \*******************************************************/
/*! exports provided: ContestResultPage */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ContestResultPage", function() { return ContestResultPage; });
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @ionic/angular */ "./node_modules/@ionic/angular/dist/index.js");
var __decorate = (undefined && undefined.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (undefined && undefined.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
var __awaiter = (undefined && undefined.__awaiter) || function (thisArg, _arguments, P, generator) {
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : new P(function (resolve) { resolve(result.value); }).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
var __generator = (undefined && undefined.__generator) || function (thisArg, body) {
    var _ = { label: 0, sent: function() { if (t[0] & 1) throw t[1]; return t[1]; }, trys: [], ops: [] }, f, y, t, g;
    return g = { next: verb(0), "throw": verb(1), "return": verb(2) }, typeof Symbol === "function" && (g[Symbol.iterator] = function() { return this; }), g;
    function verb(n) { return function (v) { return step([n, v]); }; }
    function step(op) {
        if (f) throw new TypeError("Generator is already executing.");
        while (_) try {
            if (f = 1, y && (t = y[op[0] & 2 ? "return" : op[0] ? "throw" : "next"]) && !(t = t.call(y, op[1])).done) return t;
            if (y = 0, t) op = [0, t.value];
            switch (op[0]) {
                case 0: case 1: t = op; break;
                case 4: _.label++; return { value: op[1], done: false };
                case 5: _.label++; y = op[1]; op = [0]; continue;
                case 7: op = _.ops.pop(); _.trys.pop(); continue;
                default:
                    if (!(t = _.trys, t = t.length > 0 && t[t.length - 1]) && (op[0] === 6 || op[0] === 2)) { _ = 0; continue; }
                    if (op[0] === 3 && (!t || (op[1] > t[0] && op[1] < t[3]))) { _.label = op[1]; break; }
                    if (op[0] === 6 && _.label < t[1]) { _.label = t[1]; t = op; break; }
                    if (t && _.label < t[2]) { _.label = t[2]; _.ops.push(op); break; }
                    if (t[2]) _.ops.pop();
                    _.trys.pop(); continue;
            }
            op = body.call(thisArg, _);
        } catch (e) { op = [6, e]; y = 0; } finally { f = t = 0; }
        if (op[0] & 5) throw op[1]; return { value: op[0] ? op[1] : void 0, done: true };
    }
};


var ContestResultPage = /** @class */ (function () {
    function ContestResultPage(loadingController) {
        this.loadingController = loadingController;
        //this.presentLoading();
    }
    ContestResultPage.prototype.presentLoading = function () {
        return __awaiter(this, void 0, void 0, function () {
            var loading;
            return __generator(this, function (_a) {
                switch (_a.label) {
                    case 0: return [4 /*yield*/, this.loadingController.create({ content: 'Hellooo',
                            duration: 2000
                        })];
                    case 1:
                        loading = _a.sent();
                        return [4 /*yield*/, loading.present()];
                    case 2: return [2 /*return*/, _a.sent()];
                }
            });
        });
    };
    ContestResultPage.prototype.ngOnInit = function () {
    };
    ContestResultPage = __decorate([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_0__["Component"])({
            selector: 'contest-result',
            template: __webpack_require__(/*! ./contest-result.page.html */ "./src/app/contest-result/contest-result.page.html"),
            styles: [__webpack_require__(/*! ./contest-result.page.scss */ "./src/app/contest-result/contest-result.page.scss")],
        }),
        __metadata("design:paramtypes", [_ionic_angular__WEBPACK_IMPORTED_MODULE_1__["LoadingController"]])
    ], ContestResultPage);
    return ContestResultPage;
}());



/***/ })

}]);
//# sourceMappingURL=contest-result-contest-result-module.js.map