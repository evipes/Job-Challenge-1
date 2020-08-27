(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[5],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/PainelComponent.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/PainelComponent.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************/
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
      salvando: false,
      QtdProdutos: [],
      Vendas: [],
      Compras: [],
      Total_Compras: 0,
      Total_Vendas: 0,
      form: new Form({
        status: ""
      })
    };
  },
  methods: {
    BuscadProdutos: function BuscadProdutos() {
      var _this = this;

      axios.get("/products", {
        headers: {
          authorization: "Bearer " + localStorage.getItem("auth_token_default")
        }
      }).then(function (res) {
        _this.QtdProdutos = res.data.produtos;
      });
    },
    BuscadVendas: function BuscadVendas() {
      var _this2 = this;

      axios.get("/saler", {
        headers: {
          authorization: "Bearer " + localStorage.getItem("auth_token_default")
        }
      }).then(function (res) {
        _this2.Vendas = res.data.sales;
        _this2.Total_Vendas = res.data.sales_total;
        _this2.Compras = res.data.shopping;
        _this2.Total_Compras = res.data.shopping_total;
      });
    },
    modalUpdate: function modalUpdate(item) {
      this.form.reset();
      this.form.status = item.status;
      this.form.id = item.id;
      $("#modalup").modal("show");
    },
    AtualizarStatus: function AtualizarStatus() {
      var _this3 = this;

      this.salvando = true;
      this.form.put("/saler/" + this.form.id, {
        headers: {
          authorization: "Bearer " + localStorage.getItem("auth_token_default")
        }
      }).then(function (res) {
        $("#modalup").modal("hide");

        _this3.$swal("", "Pedido atualizado com sucesso! ");

        _this3.salvando = false;

        _this3.BuscadVendas();
      })["catch"](function (e) {
        _this3.$swal("", "Error......" + e);

        _this3.salvando = false;
      });
    },
    alertQuero: function alertQuero() {
      var _this4 = this;

      this.$swal({
        title: 'Deseja torna-se vendedor?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não',
        showCloseButton: true,
        showLoaderOnConfirm: true
      }).then(function (result) {
        if (result.value) {
          _this4.QueroVender();

          _this4.$swal('Agora você pode vender seus produtos', '', 'success');
        }
      });
    },
    QueroVender: function QueroVender() {
      axios.put("/user", {
        headers: {
          authorization: "Bearer " + localStorage.getItem("auth_token_default")
        }
      }).then(function (res) {
        console.log(res);
        location.reload();
      });
    }
  },
  mounted: function mounted() {
    this.BuscadProdutos();
    this.BuscadVendas();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/PainelComponent.vue?vue&type=template&id=7a1663e5&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/PainelComponent.vue?vue&type=template&id=7a1663e5& ***!
  \******************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "tela-painel" }, [
    _c("br"),
    _vm._v(" "),
    _c("div", { staticClass: "row" }, [
      _vm._m(0),
      _vm._v(" "),
      _c("div", { staticClass: "col" }, [
        _c("span", { staticStyle: { float: "right!important" } }, [
          _vm._v("\n        Olá\n        "),
          _c("b", [_vm._v(_vm._s(_vm.$auth.user().name))])
        ])
      ])
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "row" }, [
      _c(
        "div",
        {
          directives: [
            {
              name: "show",
              rawName: "v-show",
              value: _vm.$auth.check("seller"),
              expression: "$auth.check('seller')"
            }
          ],
          staticClass: "col-xl-3 col-md-6 mb-4"
        },
        [
          _c(
            "div",
            {
              staticClass:
                "card text-white bg-secondary mb-3 border-left-primary shadow-sm p-3 mb-5 rounded"
            },
            [
              _c("div", { staticClass: "card-body" }, [
                _c(
                  "div",
                  { staticClass: "row no-gutters align-items-center" },
                  [
                    _c("div", { staticClass: "col mr-2" }, [
                      _c(
                        "div",
                        {
                          staticClass:
                            "text-xs font-weight-bold text-white text-uppercase mb-1"
                        },
                        [_vm._v("Qtd. Produtos")]
                      ),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          staticClass: "h2 mb-0 font-weight-bold text-gray-800"
                        },
                        [_vm._v(_vm._s(_vm.QtdProdutos.length))]
                      )
                    ]),
                    _vm._v(" "),
                    _vm._m(1)
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
          directives: [
            {
              name: "show",
              rawName: "v-show",
              value: _vm.Compras.length > 0,
              expression: "Compras.length > 0"
            }
          ],
          staticClass: "col-xl-4 col-md-6 mb-4"
        },
        [
          _c(
            "div",
            {
              staticClass:
                "card text-white bg-secondary mb-3 border-left-primary shadow-sm p-3 mb-5 rounded"
            },
            [
              _c("div", { staticClass: "card-body" }, [
                _c(
                  "div",
                  { staticClass: "row no-gutters align-items-center" },
                  [
                    _c("div", { staticClass: "col mr-2" }, [
                      _c(
                        "div",
                        {
                          staticClass:
                            "text-xs font-weight-bold text-white text-uppercase mb-1"
                        },
                        [
                          _vm._v(
                            "Compras - " + _vm._s(_vm.Compras.length) + "UN"
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          staticClass: "h2 mb-0 font-weight-bold text-gray-800"
                        },
                        [
                          _c("b", [_vm._v("Valor")]),
                          _vm._v(
                            "\n                : " +
                              _vm._s(_vm._f("FormatMoney")(_vm.Total_Compras)) +
                              "\n              "
                          )
                        ]
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
          directives: [
            {
              name: "show",
              rawName: "v-show",
              value: _vm.$auth.check("seller"),
              expression: "$auth.check('seller')"
            }
          ],
          staticClass: "col-xl-5 col-md-6 mb-4"
        },
        [
          _c(
            "div",
            {
              staticClass:
                "card text-white bg-secondary mb-3 border-left-primary shadow-sm p-3 mb-5 rounded"
            },
            [
              _c("div", { staticClass: "card-body" }, [
                _c(
                  "div",
                  { staticClass: "row no-gutters align-items-center" },
                  [
                    _c("div", { staticClass: "col mr-2" }, [
                      _c(
                        "div",
                        {
                          staticClass:
                            "text-xs font-weight-bold text-white text-uppercase mb-1"
                        },
                        [
                          _vm._v(
                            "Total de vendas - " +
                              _vm._s(_vm.Vendas.length) +
                              "UN"
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          staticClass: "h2 mb-0 font-weight-bold text-gray-800"
                        },
                        [
                          _c("b", [_vm._v("Valor")]),
                          _vm._v(
                            "\n                : " +
                              _vm._s(_vm._f("FormatMoney")(_vm.Total_Vendas)) +
                              "\n              "
                          )
                        ]
                      )
                    ]),
                    _vm._v(" "),
                    _vm._m(2)
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
          directives: [
            {
              name: "show",
              rawName: "v-show",
              value: _vm.$auth.check("client"),
              expression: "$auth.check('client')"
            }
          ],
          staticClass: "col-xl-8 col-md-8 mb-4"
        },
        [
          _c(
            "div",
            {
              staticClass:
                "card text-white bg-secondary mb-3 border-left-primary shadow-sm p-3 mb-5 rounded"
            },
            [
              _c("div", { staticClass: "card-body" }, [
                _c(
                  "div",
                  { staticClass: "row no-gutters align-items-center" },
                  [
                    _c("div", { staticClass: "col mr-2" }, [
                      _c(
                        "div",
                        {
                          staticClass:
                            "text-xs font-weight-bold text-white text-uppercase mb-1"
                        },
                        [
                          _vm._v(
                            "Clique no botão abaixo para começar a vender tambem!"
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          staticClass: "h2 mb-0 font-weight-bold text-gray-800"
                        },
                        [
                          _c(
                            "button",
                            {
                              staticClass: "btn btn-warning btn-block",
                              attrs: { type: "button" },
                              on: {
                                click: function($event) {
                                  return _vm.alertQuero()
                                }
                              }
                            },
                            [_vm._v("Quero vender")]
                          )
                        ]
                      )
                    ]),
                    _vm._v(" "),
                    _vm._m(3)
                  ]
                )
              ])
            ]
          )
        ]
      )
    ]),
    _vm._v(" "),
    _c(
      "div",
      {
        directives: [
          {
            name: "show",
            rawName: "v-show",
            value: _vm.$auth.check("seller"),
            expression: "$auth.check('seller')"
          }
        ],
        staticClass: "row"
      },
      [
        _c("div", { staticClass: "col-12" }, [
          _c("div", { staticClass: "shadow-sm p-3 mb-2 bg-white rounded" }, [
            _c("div", { staticClass: "card-body" }, [
              _c("h5", { staticClass: "card-title" }, [_vm._v("Suas vendas")]),
              _vm._v(" "),
              _c("div", { staticClass: "table-responsive" }, [
                _c("table", { staticClass: "table" }, [
                  _vm._m(4),
                  _vm._v(" "),
                  _c(
                    "tbody",
                    _vm._l(_vm.Vendas, function(d) {
                      return _c("tr", { key: d.id }, [
                        _c("td", [_vm._v(_vm._s(d.id))]),
                        _vm._v(" "),
                        _c("td", [_vm._v(_vm._s(d.product.name))]),
                        _vm._v(" "),
                        _c("td", [_vm._v(_vm._s(d.user.name))]),
                        _vm._v(" "),
                        _c("td", [
                          _vm._v(_vm._s(_vm._f("FormatMoney")(d.amount)))
                        ]),
                        _vm._v(" "),
                        _c("td", [
                          d.status == "pending"
                            ? _c("h2", { staticClass: "badge badge-primary" }, [
                                _vm._v("Pendente")
                              ])
                            : d.status == "approved"
                            ? _c("h2", { staticClass: "badge badge-success" }, [
                                _vm._v("Aprovado")
                              ])
                            : _c("h2", { staticClass: "badge badge-dark" }, [
                                _vm._v("Rejeitado")
                              ])
                        ]),
                        _vm._v(" "),
                        _c("td", [
                          _vm._v(_vm._s(_vm._f("formatDate")(d.created_at)))
                        ]),
                        _vm._v(" "),
                        _c("td", [
                          _c(
                            "div",
                            {
                              staticClass: "btn-group mr-2",
                              attrs: {
                                role: "group",
                                "aria-label": "First group"
                              }
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
                              )
                            ]
                          )
                        ])
                      ])
                    }),
                    0
                  )
                ])
              ])
            ])
          ])
        ])
      ]
    ),
    _vm._v(" "),
    _c("hr"),
    _vm._v(" "),
    _c(
      "div",
      {
        directives: [
          {
            name: "show",
            rawName: "v-show",
            value: _vm.Compras.length > 0,
            expression: "Compras.length > 0"
          }
        ],
        staticClass: "row"
      },
      [
        _c("div", { staticClass: "col-12" }, [
          _c("div", { staticClass: "shadow-sm p-3 mb-2 bg-white rounded" }, [
            _c("div", { staticClass: "card-body" }, [
              _c("h5", { staticClass: "card-title" }, [_vm._v("Suas compras")]),
              _vm._v(" "),
              _c("div", { staticClass: "table-responsive" }, [
                _c("table", { staticClass: "table" }, [
                  _vm._m(5),
                  _vm._v(" "),
                  _c(
                    "tbody",
                    _vm._l(_vm.Compras, function(d) {
                      return _c("tr", { key: d.id }, [
                        _c("td", [_vm._v(_vm._s(d.id))]),
                        _vm._v(" "),
                        _c("td", [_vm._v(_vm._s(d.product.name))]),
                        _vm._v(" "),
                        _c("td", [_vm._v(_vm._s(d.product.user.name))]),
                        _vm._v(" "),
                        _c("td", [
                          _vm._v(_vm._s(_vm._f("FormatMoney")(d.amount)))
                        ]),
                        _vm._v(" "),
                        _c("td", [
                          d.status == "pending"
                            ? _c("h2", { staticClass: "badge badge-primary" }, [
                                _vm._v("Pendente")
                              ])
                            : d.status == "approved"
                            ? _c("h2", { staticClass: "badge badge-success" }, [
                                _vm._v("Aprovado")
                              ])
                            : _c("h2", { staticClass: "badge badge-dark" }, [
                                _vm._v("Rejeitado")
                              ])
                        ]),
                        _vm._v(" "),
                        _c("td", [
                          _vm._v(_vm._s(_vm._f("formatDate")(d.created_at)))
                        ])
                      ])
                    }),
                    0
                  )
                ])
              ])
            ])
          ])
        ])
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
                      return _vm.AtualizarStatus()
                    }
                  }
                },
                [
                  _c("div", { staticClass: "modal-body" }, [
                    _c(
                      "div",
                      { staticClass: "form-group" },
                      [
                        _c(
                          "label",
                          { attrs: { for: "exampleFormControlSelect1" } },
                          [_vm._v("Selecione o status")]
                        ),
                        _vm._v(" "),
                        _c(
                          "select",
                          {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.form.status,
                                expression: "form.status"
                              }
                            ],
                            staticClass: "form-control",
                            class: {
                              "is-invalid": _vm.form.errors.has("status")
                            },
                            attrs: { id: "exampleFormControlSelect1" },
                            on: {
                              change: function($event) {
                                var $$selectedVal = Array.prototype.filter
                                  .call($event.target.options, function(o) {
                                    return o.selected
                                  })
                                  .map(function(o) {
                                    var val = "_value" in o ? o._value : o.value
                                    return val
                                  })
                                _vm.$set(
                                  _vm.form,
                                  "status",
                                  $event.target.multiple
                                    ? $$selectedVal
                                    : $$selectedVal[0]
                                )
                              }
                            }
                          },
                          [
                            _c(
                              "option",
                              {
                                attrs: { value: "pending" },
                                domProps: {
                                  selected: _vm.form.status == "pending"
                                }
                              },
                              [_vm._v("Pendente")]
                            ),
                            _vm._v(" "),
                            _c(
                              "option",
                              {
                                attrs: { value: "approved" },
                                domProps: {
                                  selected: _vm.form.status == "approved"
                                }
                              },
                              [_vm._v("Aprovado")]
                            ),
                            _vm._v(" "),
                            _c(
                              "option",
                              {
                                attrs: { value: "rejected" },
                                domProps: {
                                  selected: _vm.form.status == "rejected"
                                }
                              },
                              [_vm._v("Rejeitado")]
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c("has-error", {
                          attrs: { form: _vm.form, field: "status" }
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
        [_vm._v("Painel")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-auto" }, [
      _c("i", { staticClass: "fab fa-product-hunt fa-3x text-gray-300" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-auto" }, [
      _c("i", { staticClass: "fas fa-dollar-sign fa-3x text-gray-300" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-auto" }, [
      _c("i", { staticClass: "fas fa-dollar-sign fa-3x text-gray-300" })
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
        _c("th", { attrs: { scope: "col" } }, [_vm._v("Produto")]),
        _vm._v(" "),
        _c("th", { attrs: { scope: "col" } }, [_vm._v("Cliente")]),
        _vm._v(" "),
        _c("th", { attrs: { scope: "col" } }, [_vm._v("Valor")]),
        _vm._v(" "),
        _c("th", { attrs: { scope: "col" } }, [_vm._v("Status")]),
        _vm._v(" "),
        _c("th", { attrs: { scope: "col" } }, [_vm._v("Data")]),
        _vm._v(" "),
        _c("th", { attrs: { scope: "col" } }, [_vm._v("Opção")])
      ])
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
        _c("th", { attrs: { scope: "col" } }, [_vm._v("Produto")]),
        _vm._v(" "),
        _c("th", { attrs: { scope: "col" } }, [_vm._v("Vendedor")]),
        _vm._v(" "),
        _c("th", { attrs: { scope: "col" } }, [_vm._v("Valor")]),
        _vm._v(" "),
        _c("th", { attrs: { scope: "col" } }, [_vm._v("Status")]),
        _vm._v(" "),
        _c("th", { attrs: { scope: "col" } }, [_vm._v("Data")])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "modal-header" }, [
      _c("h5", { staticClass: "modal-title", attrs: { id: "modaladdLabel" } }, [
        _vm._v("Atualizar pedido")
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

/***/ "./resources/js/components/PainelComponent.vue":
/*!*****************************************************!*\
  !*** ./resources/js/components/PainelComponent.vue ***!
  \*****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _PainelComponent_vue_vue_type_template_id_7a1663e5___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PainelComponent.vue?vue&type=template&id=7a1663e5& */ "./resources/js/components/PainelComponent.vue?vue&type=template&id=7a1663e5&");
/* harmony import */ var _PainelComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PainelComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/PainelComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _PainelComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _PainelComponent_vue_vue_type_template_id_7a1663e5___WEBPACK_IMPORTED_MODULE_0__["render"],
  _PainelComponent_vue_vue_type_template_id_7a1663e5___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/PainelComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/PainelComponent.vue?vue&type=script&lang=js&":
/*!******************************************************************************!*\
  !*** ./resources/js/components/PainelComponent.vue?vue&type=script&lang=js& ***!
  \******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PainelComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./PainelComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/PainelComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PainelComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/PainelComponent.vue?vue&type=template&id=7a1663e5&":
/*!************************************************************************************!*\
  !*** ./resources/js/components/PainelComponent.vue?vue&type=template&id=7a1663e5& ***!
  \************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PainelComponent_vue_vue_type_template_id_7a1663e5___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./PainelComponent.vue?vue&type=template&id=7a1663e5& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/PainelComponent.vue?vue&type=template&id=7a1663e5&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PainelComponent_vue_vue_type_template_id_7a1663e5___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PainelComponent_vue_vue_type_template_id_7a1663e5___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);