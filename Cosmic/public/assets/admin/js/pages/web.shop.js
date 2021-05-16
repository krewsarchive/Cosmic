var shop = function() {

    return {
        init: function () {
            shop.initDatatable();
          
            $('#giveOffer').on('show.bs.modal', function (event) {
                shop.giveOffer();
            });
          
            $(".createOffer").click(function () {
                shop.editOffer(null);
            });
          
            $("#goBack").unbind().click(function () {
                shop.goBack();
            });

            $(".addVip").click(function () {
                shop.editOffer(null, 'vip');
            });
            
        },
      
        editOffer: function (id, type) {
            var self = this;
            this.ajax_manager = new WebPostInterface.init();
          
            $("#offerManage").show();
            $("#offers").hide();
         
            var data = {
                id: 99,
                text: 'VIP'
            };

            if(id != null) {
                self.ajax_manager.post("/housekeeping/api/shop/getofferbyid", {post: id}, function (result) {
                    result = result.data;
                    $('[name=shopId]').val(result.id);
                    $('[name=vip]').val(1);
                  
                    $("[name=currencys] option[value='" + result.currency_type + "']").prop('selected', true);
                    $("[name=lang] option[value='" + result.lang + "']").prop('selected', true);
                  
                    $('[name=amount]').val(result.amount);
                    $('[name=price]').val(result.price);
                    $('.currencyTag').text(result.currency);
                  
                
                    if(result.currency_type == 'vip') {
                        $(".hideVip").hide();
                        $(".offerName").html("Modify Offer");
                        if(result.data != '') {
                            var data = JSON.parse(result.data)
                            document.getElementById("json").innerHTML = JSON.stringify(data, undefined, 2);
                            var array = $("#json").html();
                            $('[name=data]').val(array);
                            $('#jsoneditor').html("");
                            $('.data').show();
                            const container = document.getElementById("jsoneditor")
                            const options = {};
                            editor = new JSONEditor(container, options)
                            editor.set(data)
                            
                             $(".offerName").click(function () {
                                $("[name=json]").val(JSON.stringify(editor.get()))
                            });
                        }
                        $('.data').show();
                    } else {
                        $('.data').hide();
                        $(".hideVip").show();
                    }
                });
            } else {  
                if(type == 'vip') {
                    $(".hideVip").hide();
                    $('.data').show();
                    $('[name=vip]').val(1);
                    $('.data').show();
                    $('#jsoneditor').html("");
                    const container = document.getElementById("jsoneditor")
                    const options = {};
                    editor = new JSONEditor(container, options)

                } else {
                    $('.data').hide();
                    $(".hideVip").show();
                    $('[name=vip]').val("");
                }
              
                $('[name=json]').val("");
                $(".offerName").html("Create Offer");
                $('[name=shopId]').val("");
                $('[name=amount]').val("")
                $('[name=price]').val("");
                $('[name=data]').val("");
                $('[name=private_key]').val("");
                $('[name=offer_id]').val("");    
            }
        },
      
        goBack: function() {
            $("#kt_datatable_shop").KTDatatable("reload")
          
            $("#offerManage").hide();
            $("#offers").show();
        },

        initDatatable: function () {

            var datatableShop = function () {

                if ($('#kt_datatable_shop').length === 0) {
                    return;
                }

                var t;
                $("#kt_datatable_shop").KTDatatable({
                    data: {
                        type: 'remote',
                        source: {
                            read: {
                                url: '/housekeeping/api/shop/getOffers',
                                headers: {
                                    'Authorization': 'housekeeping_shop_control'
                                }
                            }
                        },
                        pageSize: 10
                    },
                    layout: {
                        scroll: !1,
                        footer: !1
                    },
                    sortable: !0,
                    pagination: !0,
                    search: {
                        input: $("#searchLatestPlayers")
                    },
                    columns: [{
                        field: "id",
                        title: "#",
                        type: "number",
                        width: 75,
                        sortable: "desc"
                    }, {
                        field: "currency_type",
                        title: "Currency",
                        template: function(data) {
                            if(data.data != null)  {
                                return 'VIP'
                            }
                            return data.currency_type;
                        }
                    }, {
                        field: "amount",
                        title: "Amount"
                    }, {
                        field: "price",
                        title: "Price"
                    }, {
                        field: "Action",
                        title: "Action",
                        sortable: !1,
                        width: 110,  
                        overflow: "visible",
                        textAlign: "left",
                        autoHide: !1,
                        template: function(data) {
                            return '<a class="btn btn-sm btn-clean btn-icon btn-icon-sm" id="editOffer" title="Edit"><i class="flaticon2-edit"></i></a> <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-sm deleteOffer" data-toggle="modal" data-target="#confirm-delete" title="Delete"><i class="la la-trash"></i></a>'
                        }
                    }]
                });

                $("#kt_datatable_shop_reload").on("click", function () {
                    $("#kt_datatable_faq").KTDatatable("reload")
                });
            };

            $("#kt_datatable_shop").unbind().on("click", "#editOffer, .deleteOffer", function (e) {
                e.preventDefault();
             
                let id = $(e.target).closest('.kt-datatable__row').find('[data-field="id"]').text();
        
                if ($(this).attr("id") == "editOffer") {
                    shop.editOffer(id);
                } else {
                    $('#confirm-delete').on('show.bs.modal', function (e) {
                        $(".modal-title").html("Delete this offer?");
                        $(".btn-ok").unbind().click(function () {
                            shop.deleteOffer(id);
                        });
                    });
                }
            });

            datatableShop();
        },
      
        deleteOffer: function(id) {
            var self = this;
            this.ajax_manager = new WebPostInterface.init();

            self.ajax_manager.post("/housekeeping/api/shop/remove", {
                post: id
            }, function(result) {
                if (result.status == "success") {
                    $("#kt_datatable_shop").KTDatatable("reload");
                }
            });
        }
    }
}();

jQuery(document).ready(function() {
    shop.init();
 
    
    $('.targetCurrency').select2({
        placeholder: 'Select a currency',
        width: '85%',
        ajax: {
            url: '/housekeeping/search/get/currencys',
            headers: {
                "Authorization": "housekeeping_permissions"
            },
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    searchTerm: params.term
                };
            },
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });

});