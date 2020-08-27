(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[6],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ProdutosComponent.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/ProdutosComponent.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      carregando: true,
      salvando: false,
      dados: {},
      form: new Form({
        name: "",
        amount: ""
      }),
      formUp: new Form({
        name: "",
        amount: "",
        id: ""
      })
    };
  },
  methods: {
    modalAdd: function modalAdd() {
      this.form.reset();
      $("#modaladd").modal("show");
    },
    modalUpdate: function modalUpdate(item) {
      this.formUp.reset();
      this.formUp.name = item.name;
      this.formUp.amount = item.amount;
      this.formUp.id = item.id;
      $("#modalup").modal("show");
    },
    alertDelete: function alertDelete(id) {
      var _this = this;

      this.$swal({
        title: 'Deseja excluir o produto?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não',
        showCloseButton: true,
        showLoaderOnConfirm: true
      }).then(function (result) {
        if (result.value) {
          _this.DeleteProduto(id);

          _this.$swal('Excluido', '', 'success');
        }
      });
    },
    BuscadProdutos: function BuscadProdutos() {
      var _this2 = this;

      axios.get("/products", {
        headers: {
          authorization: "Bearer " + localStorage.getItem("auth_token_default")
        }
      }).then(function (res) {
        _this2.dados = res.data.produtos;
        _this2.carregando = false;
      });
    },
    CadastrarProduto: function CadastrarProduto() {
      var _this3 = this;

      this.salvando = true;
      this.form.post("/product", {
        headers: {
          authorization: "Bearer " + localStorage.getItem("auth_token_default")
        }
      }).then(function (res) {
        _this3.dados.push(res.data.produto);

        $("#modaladd").modal("hide");

        _this3.$swal("", "Produto cadastrado com sucesso! ");

        _this3.salvando = false;
      })["catch"](function (e) {
        _this3.$swal("", "Error......" + e);

        _this3.salvando = false;
      });
    },
    AtualizarProduto: function AtualizarProduto(id) {
      var _this4 = this;

      this.salvando = true;
      this.formUp.put("/product/" + this.formUp.id, {
        headers: {
          authorization: "Bearer " + localStorage.getItem("auth_token_default")
        }
      }).then(function (res) {
        $("#modalup").modal("hide");

        _this4.$swal("", "Produto atualizado com sucesso! ");

        _this4.salvando = false;

        _this4.BuscadProdutos();
      })["catch"](function (e) {
        _this4.$swal("", "Error......" + e);

        _this4.salvando = false;
      });
    },
    DeleteProduto: function DeleteProduto(id) {
      var _this5 = this;

      axios["delete"]("/product/" + id, {
        headers: {
          authorization: "Bearer " + localStorage.getItem("auth_token_default")
        }
      }).then(function (res) {
        console.log(res);

        _this5.BuscadProdutos();
      })["catch"](function (e) {
        _this5.$swal("", "Error......" + e);
      });
    }
  },
  mounted: function mounted() {
    this.BuscadProdutos();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ProdutosComponent.vue?vue&type=template&id=cf98e5b0&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/ProdutosComponent.vue?vue&type=template&id=cf98e5b0& ***!
  \********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "tela-produto" }, [
    _c("br"),
    _vm._v(" "),
    _c("div", { staticClass: "row" }, [
      _vm._m(0),
      _vm._v(" "),
      _c("div", { staticClass: "col" }, [
        _c("h1", { staticStyle: { float: "right!important" } }, [
          _c(
            "button",
            {
              staticClass: "btn btn-dark",
              attrs: { type: "button" },
              on: {
                click: function($event) {
                  return _vm.modalAdd()
                }
              }
            },
            [_vm._v("Adicionar")]
          )
        ])
      ])
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "shadow-sm p-3 mb-5 bg-white rounded" }, [
      _c("div", { staticClass: "card-body" }, [
        _c("div", { staticClass: "table-responsive" }, [
          _c("table", { staticClass: "table" }, [
            _vm._m(1),
            _vm._v(" "),
            _c(
              "tbody",
              [
                _c(
                  "tr",
                  {
                    directives: [
                      {
                        name: "show",
                        rawName: "v-show",
                        value: _vm.carregando,
                        expression: "carregando"
                      }
                    ]
                  },
                  [_vm._m(2)]
                ),
                _vm._v(" "),
                _vm._l(_vm.dados, function(d) {
                  return _c("tr", { key: d.id }, [
                    _c("th", { attrs: { scope: "row" } }, [
                      _vm._v(_vm._s(d.id))
                    ]),
                    _vm._v(" "),
                    _c("td", [_vm._v(_vm._s(d.slug))]),
                    _vm._v(" "),
                    _c(
                      "td",
                      [
                        _c(
                          "router-link",
                          {
                            attrs: {
                              to: {
                                name: "Checkout",
                                params: { slug: d.slug }
                              },
                              target: "_blank"
                            }
                          },
                          [_vm._v("Chekount")]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c("td", [_vm._v(_vm._s(d.name))]),
                    _vm._v(" "),
                    _c("td", [_vm._v(_vm._s(_vm._f("FormatMoney")(d.amount)))]),
                    _vm._v(" "),
                    _c("td", [
                      _vm._v(_vm._s(_vm._f("formatDate")(d.created_at)))
                    ]),
                    _vm._v(" "),
                    _c("td", [
                      _vm._v(_vm._s(_vm._f("formatDate")(d.updated_at)))
                    ]),
                    _vm._v(" "),
                    _c("td", [
                      _c(
                        "div",
                        {
                          staticClass: "btn-group mr-2",
                          attrs: { role: "group", "aria-label": "First group" }
                        },
                        [
                          _c(
                            "button",
                            {
                              staticClass: "btn btn-secondary",
                              on: {
                                click: function($event) {
                                  return _vm.modalUpdate(d)
                                }
                              }
                            },
                            [_c("i", { staticClass: "fas fa-edit" })]
                          ),
                          _vm._v(" "),
                          _c(
                            "button",
                            {
                              staticClass: "btn btn-danger",
                              on: {
                                click: function($event) {
                                  return _vm.alertDelete(d.id)
                                }
                              }
                            },
                            [_c("i", { staticClass: "fas fa-trash" })]
                          )
                        ]
                      )
                    ])
                  ])
                })
              ],
              2
            )
          ])
        ])
      ])
    ]),
    _vm._v(" "),
    _c(
      "div",
      {
        staticClass: "modal fade",
        attrs: {
          id: "modaladd",
          tabindex: "-1",
          role: "dialog",
          "aria-labelledby": "modaladdLabel",
          "aria-hidden": "true"
        }
      },
      [
        _c(
          "div",
          { staticClass: "modal-dialog", attrs: { role: "document" } },
          [
            _c("div", { staticClass: "modal-content" }, [
              _vm._m(3),
              _vm._v(" "),
              _c(
                "form",
                {
                  on: {
                    submit: function($event) {
                      $event.preventDefault()
                      return _vm.CadastrarProduto()
                    }
                  }
                },
                [
                  _c("div", { staticClass: "modal-body" }, [
                    _c(
                      "div",
                      { staticClass: "input-group mb-3" },
                      [
                        _vm._m(4),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.name,
                              expression: "form.name"
                            }
                          ],
                          staticClass: "form-control",
                          class: { "is-invalid": _vm.form.errors.has("name") },
                          attrs: {
                            type: "text",
                            placeholder: "Nome do produto",
                            name: "name",
                            "aria-label": "text",
                            "aria-describedby": "basic-addon1",
                            required: ""
                          },
                          domProps: { value: _vm.form.name },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(_vm.form, "name", $event.target.value)
                            }
                          }
                        }),
                        _vm._v(" "),
                        _c("has-error", {
                          attrs: { form: _vm.form, field: "name" }
                        })
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "input-group mb-3" },
                      [
                        _vm._m(5),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.amount,
                              expression: "form.amount"
                            }
                          ],
                          staticClass: "form-control",
                          class: {
                            "is-invalid": _vm.form.errors.has("amount")
                          },
                          attrs: {
                            type: "number",
                            placeholder: "Valor do produto",
                            name: "amount",
                            "aria-label": "text",
                            "aria-describedby": "basic-addon1",
                            required: "",
                            step: "0.01",
                            min: "0",
                            lang: "pt-br"
                          },
                          domProps: { value: _vm.form.amount },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(_vm.form, "amount", $event.target.value)
                            }
                          }
                        }),
                        _vm._v(" "),
                        _c("has-error", {
                          attrs: { form: _vm.form, field: "amount" }
                        })
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "modal-footer" }, [
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-secondary",
                        attrs: { type: "button", "data-dismiss": "modal" }
                      },
                      [_vm._v("Fechar")]
                    ),
                    _vm._v(" "),
                    _c(
                      "button",
                      {
                        directives: [
                          {
                            name: "show",
                            rawName: "v-show",
                            value: !_vm.salvando,
                            expression: "!salvando"
                          }
                        ],
                        staticClass: "btn btn-primary"
                      },
                      [_vm._v("Salvar")]
                    ),
                    _vm._v(" "),
                    _c(
                      "button",
                      {
                        directives: [
                          {
                            name: "show",
                            rawName: "v-show",
                            value: _vm.salvando,
                            expression: "salvando"
                          }
                        ],
                        staticClass: "btn btn-primary",
                        attrs: { disabled: "" }
                      },
                      [_vm._v("Salvando")]
                    )
                  ])
                ]
              )
            ])
          ]
        )
      ]
    ),
    _vm._v(" "),
    _c(
      "div",
      {
        staticClass: "modal fade",
        attrs: {
          id: "modalup",
          tabindex: "-1",
          role: "dialog",
          "aria-labelledby": "modaladdLabel",
          "aria-hidden": "true"
        }
      },
      [
        _c(
          "div",
          { staticClass: "modal-dialog", attrs: { role: "document" } },
          [
            _c("div", { staticClass: "modal-content" }, [
              _vm._m(6),
              _vm._v(" "),
              _c(
                "form",
                {
                  on: {
                    submit: function($event) {
                      $event.preventDefault()
                      return _vm.AtualizarProduto()
                    }
                  }
                },
                [
                  _c("div", { staticClass: "modal-body" }, [
                    _c(
                      "div",
                      { staticClass: "input-group mb-3" },
                      [
                        _vm._m(7),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.formUp.name,
                              expression: "formUp.name"
                            }
                          ],
                          staticClass: "form-control",
                          class: {
                            "is-invalid": _vm.formUp.errors.has("name")
                          },
                          attrs: {
                            type: "text",
                            placeholder: "Nome do produto",
                            name: "text",
                            "aria-label": "text",
                            "aria-describedby": "basic-addon1",
                            required: ""
                          },
                          domProps: { value: _vm.formUp.name },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(_vm.formUp, "name", $event.target.value)
                            }
                          }
                        }),
                        _vm._v(" "),
                        _c("has-error", {
                          attrs: { form: _vm.formUp, field: "name" }
                        })
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "input-group mb-3" },
                      [
                        _vm._m(8),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.formUp.amount,
                              expression: "formUp.amount"
                            }
                          ],
                          staticClass: "form-control",
                          class: {
                            "is-invalid": _vm.formUp.errors.has("amount")
                          },
                          attrs: {
                            type: "number",
                            placeholder: "Valor do produto",
                            name: "amount",
                            "aria-label": "text",
                            "aria-describedby": "basic-addon1",
                            required: "",
                            step: "0.01",
                            min: "0",
                            lang: "pt-br"
                          },
                          domProps: { value: _vm.formUp.amount },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.formUp,
                                "amount",
                                $event.target.value
                              )
                            }
                          }
                        }),
                        _vm._v(" "),
                        _c("has-error", {
                          attrs: { form: _vm.formUp, field: "amount" }
                        })
                      ],
                      1
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "modal-footer" }, [
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-secondary",
                        attrs: { type: "button", "data-dismiss": "modal" }
                      },
                      [_vm._v("Fechar")]
                    ),
                    _vm._v(" "),
                    _c(
                      "button",
                      {
                        directives: [
                          {
                            name: "show",
                            rawName: "v-show",
                            value: !_vm.salvando,
                            expression: "!salvando"
                          }
                        ],
                        staticClass: "btn btn-primary"
                      },
                      [_vm._v("Salvar")]
                    ),
                    _vm._v(" "),
                    _c(
                      "button",
                      {
                        directives: [
                          {
                            name: "show",
                            rawName: "v-show",
                            value: _vm.salvando,
                            expression: "salvando"
                          }
                        ],
                        staticClass: "btn btn-primary",
                        attrs: { disabled: "" }
                      },
                      [_vm._v("Salvando")]
                    )
                  ])
                ]
              )
            ])
          ]
        )
      ]
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col" }, [
      _c(
        "h3",
        {
          staticClass: "m-0 font-weight-bold",
          staticStyle: { float: "left!important" }
        },
        [_vm._v("Produtos")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", { attrs: { scope: "col" } }, [_vm._v("#")]),
        _vm._v(" "),
        _c("th", { attrs: { scope: "col" } }, [_vm._v("Slug")]),
        _vm._v(" "),
        _c("th", { attrs: { scope: "col" } }, [_vm._v("Link")]),
        _vm._v(" "),
        _c("th", { attrs: { scope: "col" } }, [_vm._v("Nome")]),
        _vm._v(" "),
        _c("th", { attrs: { scope: "col" } }, [_vm._v("Valor")]),
        _vm._v(" "),
        _c("th", { attrs: { scope: "col" } }, [_vm._v("Dt. Criação")]),
        _vm._v(" "),
        _c("th", { attrs: { scope: "col" } }, [_vm._v("Dt. Atualização")]),
        _vm._v(" "),
        _c("th", { attrs: { scope: "col" } }, [_vm._v("Opção")])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("td", { staticClass: "text-center", attrs: { colspan: "7" } }, [
      _c("i", { staticClass: "fas fa-spinner fa-spin" }),
      _vm._v("\n              buscando...\n            ")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "modal-header" }, [
      _c("h5", { staticClass: "modal-title", attrs: { id: "modaladdLabel" } }, [
        _vm._v("Cadastrar produto")
      ]),
      _vm._v(" "),
      _c(
        "button",
        {
          staticClass: "close",
          attrs: {
            type: "button",
            "data-dismiss": "modal",
            "aria-label": "Close"
          }
        },
        [_c("span", { attrs: { "aria-hidden": "true" } }, [_vm._v("×")])]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "input-group-prepend" }, [
      _c(
        "span",
        {
          staticClass: "input-group-text icone-input",
          attrs: { id: "basic-addon1" }
        },
        [_c("i", { staticClass: "fas fa-bullhorn" })]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "input-group-prepend" }, [
      _c(
        "span",
        {
          staticClass: "input-group-text icone-input",
          attrs: { id: "basic-addon1" }
        },
        [_c("i", { staticClass: "fas fa-dollar-sign" })]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "modal-header" }, [
      _c("h5", { staticClass: "modal-title", attrs: { id: "modaladdLabel" } }, [
        _vm._v("Cadastrar produto")
      ]),
      _vm._v(" "),
      _c(
        "button",
        {
          staticClass: "close",
          attrs: {
            type: "button",
            "data-dismiss": "modal",
            "aria-label": "Close"
          }
        },
        [_c("span", { attrs: { "aria-hidden": "true" } }, [_vm._v("×")])]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "input-group-prepend" }, [
      _c(
        "span",
        {
          staticClass: "input-group-text icone-input",
          attrs: { id: "basic-addon1" }
        },
        [_c("i", { staticClass: "fas fa-bullhorn" })]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "input-group-prepend" }, [
      _c(
        "span",
        {
          staticClass: "input-group-text icone-input",
          attrs: { id: "basic-addon1" }
        },
        [_c("i", { staticClass: "fas fa-dollar-sign" })]
      )
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
        injectStyles.call(
          this,
          (options.functional ? this.parent : this).$root.$options.shadowRoot
        )
      }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./resources/js/components/ProdutosComponent.vue":
/*!*******************************************************!*\
  !*** ./resources/js/components/ProdutosComponent.vue ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ProdutosComponent_vue_vue_type_template_id_cf98e5b0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProdutosComponent.vue?vue&type=template&id=cf98e5b0& */ "./resources/js/components/ProdutosComponent.vue?vue&type=template&id=cf98e5b0&");
/* harmony import */ var _ProdutosComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProdutosComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/ProdutosComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ProdutosComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ProdutosComponent_vue_vue_type_template_id_cf98e5b0___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ProdutosComponent_vue_vue_type_template_id_cf98e5b0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/ProdutosComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/ProdutosComponent.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/js/components/ProdutosComponent.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProdutosComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./ProdutosComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ProdutosComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProdutosComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/ProdutosComponent.vue?vue&type=template&id=cf98e5b0&":
/*!**************************************************************************************!*\
  !*** ./resources/js/components/ProdutosComponent.vue?vue&type=template&id=cf98e5b0& ***!
  \**************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProdutosComponent_vue_vue_type_template_id_cf98e5b0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./ProdutosComponent.vue?vue&type=template&id=cf98e5b0& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ProdutosComponent.vue?vue&type=template&id=cf98e5b0&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProdutosComponent_vue_vue_type_template_id_cf98e5b0___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProdutosComponent_vue_vue_type_template_id_cf98e5b0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);