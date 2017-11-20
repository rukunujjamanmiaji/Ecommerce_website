var IttadiShop = {};
jQuery(document).ready(function () {
    App.init();
    var id = jQuery(".main_page_content").attr("id");
    if (id && id.length > 0)
        IttadiShop[id]();
});
// Product Add Frist Step
IttadiShop.products_attributes = function () {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = '/plugins/jstree/dist/jstree.js';
    $(".dynamic_js").append(script);
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = '/js/pages/ui-tree.js';
    $(".dynamic_js").append(script);
    UITree.init();

    jQuery(".submit_product_category").click(function (evt) {
        evt.preventDefault();
        App.blockUI({boxed: true});

        $.ajax({
            type: "POST",
            cache: false,
            data: 'category_id=' + $('#ItemMainCatId').val(),
            url: '/products/attributes/' + $('#ItemId').val(),
            dataType: 'json',
            success: function (res) {
                App.unblockUI();
                //  location.reload();
                window.location = '/products/attributes/' + res
            }
        });
    });
}
IttadiShop.products_edit = function () {
    jQuery(".update_product_general").click(function (evt) {
        evt.preventDefault();
        App.blockUI({boxed: true});
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        $.ajax({
            type: "POST",
            cache: false,
            url: '/products/edit/' + $('#ItemId').val(),
            data: $('#ItemEditForm').serializeArray(),
            success: function (res) {
                //$('#add_category').html(res);
                $('#ItemPriceSale').val(res);
                App.unblockUI();
            },
        });
    });
}
IttadiShop.products_merchants = function () {
    $(".select2_publisher").select2({
        ajax: {
            url: '/merchants/search_json', dataType: 'json', delay: 250,
            data: function (params) {
                return {term: params.term, page: params.page};
            },
            processResults: function (data, page) {
                return {
                    results: $.map(data, function (item) {
                        return {text: item.name, id: item.id}
                    })
                };
            },
            cache: true
        },
        minimumInputLength: 1,
    });
    if (jQuery().datepicker) {
        $('.date-picker').datepicker({rtl: App.isRTL(), autoclose: true});
    }
    jQuery(".update_product_merchant").click(function (evt) {
        evt.preventDefault();
        App.blockUI({boxed: true});

        $.ajax({
            type: "POST",
            cache: false,
            url: '/products/merchants/' + $('#ItemId').val(),
            data: $('#ItemMerchantsForm').serializeArray(),
            success: function (res) {
                //$('#add_category').html(res);
                App.unblockUI();
            },
        });
    });
}
IttadiShop.products_writers = function () {
    $('.select2').select2({});
    $(".select2_writer").select2({
        ajax: {
            url: '/writers/search_json',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    term: params.term,
                    page: params.page
                };
            },
            processResults: function (data, page) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        },
        minimumInputLength: 1,
    });
    jQuery(".update_product_writer").click(function (evt) {
        evt.preventDefault();
        App.blockUI({boxed: true});

        $.ajax({
            type: "POST",
            cache: false,
            url: '/products/writers/' + $('#ItemId').val(),
            data: $('#ItemWritersForm').serializeArray(),
            success: function (res) {
                //$('#add_category').html(res);
                App.unblockUI();
            },
        });
    });
}
IttadiShop.products_all_attributes = function () {
    jQuery(".set_attribute").change(function (evt) {
        evt.preventDefault();
        App.blockUI({boxed: true});
        $.ajax({
            type: "GET",
            cache: false,
            url: '/attributes/category_attribute/' + this.value + '/' + $('#ItemId').val(),
            success: function (res) {
                $('#product_add_attribute').html(res);
                App.unblockUI();

            },
        });
    });
    jQuery(".update_product_attributes").click(function (evt) {
        evt.preventDefault();
        App.blockUI({boxed: true});
        $.ajax({
            type: "POST",
            cache: false,
            url: '/products/all_attributes/' + $('#ItemId').val(),
            data: $('#ItemAllAttributesForm').serialize(),
            success: function (res) {
                //  $('#product_add_attribute').html(res);

                App.unblockUI();

            },
        });
    });

}


IttadiShop.categories_index = function () {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = '/plugins/jstree/dist/jstree.js';
    $(".dynamic_js").append(script);
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = '/js/pages/ui-tree.js';
    $(".dynamic_js").append(script);
    UITree.init();

    jQuery("#btn_add_parent_category").click(function (evt) {
        evt.preventDefault();
        $("#category_nodes").jstree('close_all');
        $.ajax({
            type: "GET",
            cache: false,
            url: '/categories/get_category_data/',
            success: function (res) {
                $('#add_category').html(res);

            },
        });
    });
    jQuery("#btn_add_child_category").click(function (evt) {
        evt.preventDefault();
        text = "<input type='hidden' value='" + $('#CategoryId').val() + "' name='data[Category][parent_id]' />";
        $('#CategoryParentId').before('<label> : ' + $('#CategoryName').val() + ' </label>').before(text).remove();
        $('#CategoryGid').val('');
        $('#CategoryId').val('');
        $('#CategoryName').val('');
        $('#CategoryNameEng').val('');
        $('#CategoryUrlName').val('');
    });

    function add_category() {
        $("#category_nodes").jstree('close_all');
        $.ajax({
            type: "GET",
            cache: false,
            url: '/categories/get_category_data/',
            success: function (res) {
                $('#add_category').html(res);

            },
            error: function (xhr, ajaxOptions, thrownError) {
            }
        });

    }
}

IttadiShop.categories_sort = function () {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = '/plugins/jstree/dist/jstree.js';
    $(".dynamic_js").append(script);
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = '/js/pages/ui-tree.js';
    $(".dynamic_js").append(script);
    UITree.init();

    // jquery - ui
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = '/js/jquery-ui.min.js';
    $(".dynamic_js").append(script);

    //$("#book_images_section").disableSelection();


}

IttadiShop.products_categories = function () {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = '/plugins/jstree/dist/jstree.js';
    $(".dynamic_js").append(script);
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = '/js/pages/ui-tree.js';
    $(".dynamic_js").append(script);
    UITree.init();

     $(function () {
        books_category_sortable($('#ItemProductId').val());

    });

    var books_category_sortable = function (book_id) {
        $("#book_category_section tbody").sortable({
             cursor: 'move',
            stop: function (event, ui) {
                var data = $(this).sortable('serialize');
                $.ajax({type: "POST", cache: false,
                    url: '/products/category_sort/' + book_id,
                    data: data, dataType: "json",
                    error: function (xhr, ajaxOptions, thrownError) {
                    }
                });
            }
        });


    }

    jQuery(".submit_product_category").click(function (evt) {
        evt.preventDefault();
        var selectedElmsIds = [];
        var selectedElms = $('#books_category_nodes').jstree("get_selected", true);
        $.each(selectedElms, function () {
            selectedElmsIds.push(this.id);
        });
        // console.log(selectedElmsIds);
        App.blockUI({boxed: true});
        $.ajax({
            type: "POST",
            cache: false,
            data: 'categories=' + selectedElmsIds,
            url: '/products/categories/' + $('#ItemProductId').val(),
            dataType: "json",
            success: function (res) {
                App.unblockUI();
                location.reload();
                //$('#book_image_' + id).remove();
            },
            error: function (xhr, ajaxOptions, thrownError) {
            }
        });
    });
    $('.main_category_selector').change(function (evt) {
        evt.preventDefault();
        var id = $(this).val()
        App.blockUI({boxed: true});
        $.ajax({
            type: "POST",
            cache: false,
            url: '/products/set_main_category/' + $('#ItemProductId').val() + '/' + id,
            success: function (res) {
                App.unblockUI();
            }
        });
    });
    jQuery(".cat_delete").click(function (evt) {
        evt.preventDefault();
        var id = $(this).attr('data-id');
        App.blockUI({boxed: true});
        $.ajax({
            type: "POST",
            cache: false,
            url: '/products/categories_delete/' + id,
            success: function (res) {
                $('#tr_' + id).remove();
                App.unblockUI();
            },
        });
    });
    //$("#book_images_section").disableSelection();


}
//IttadiShop.products_add = function () {
//    $('.select2').select2({});
//    $(".select2_writer").select2({
//        ajax: {
//            url: '/writers/search_json',
//            dataType: 'json',
//            delay: 250,
//            data: function (params) {
//                return {
//                    term: params.term,
//                    page: params.page
//                };
//            },
//            processResults: function (data, page) {
//                return {
//                    results: $.map(data, function (item) {
//                        return {
//                            text: item.name,
//                            id: item.id
//                        }
//                    })
//                };
//            },
//            cache: true
//        },
//        minimumInputLength: 1,
//    });
//
//    $(".select2_publisher").select2({
//        ajax: {
//            url: '/merchants/search_json',
//            dataType: 'json',
//            delay: 250,
//            data: function (params) {
//                return {
//                    term: params.term,
//                    page: params.page
//                };
//            },
//            processResults: function (data, page) {
//                return {
//                    results: $.map(data, function (item) {
//                        return {
//                            text: item.name,
//                            id: item.id
//                        }
//                    })
//                };
//            },
//            cache: true
//        },
//        minimumInputLength: 1,
//    });
//    if (jQuery().datepicker) {
//        $('.date-picker').datepicker({
//            rtl: App.isRTL(),
//            autoclose: true
//        });
//        // $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
//    }
//    jQuery(".set_attribute").click(function (evt) {
//        evt.preventDefault();
//
//        $.ajax({
//            type: "GET",
//            cache: false,
//            url: '/attributes/category_attribute/' + this.value,
//            success: function (res) {
//                $('#product_add_attribute').html(res);
//
//            },
//        });
//    });
//}
//IttadiShop.products_edit = function () {
//    $('.select2').select2({});
//    $(".select2_writer").select2({
//        ajax: {
//            url: '/writers/search_json',
//            dataType: 'json',
//            delay: 250,
//            data: function (params) {
//                return {
//                    term: params.term,
//                    page: params.page
//                };
//            },
//            processResults: function (data, page) {
//                return {
//                    results: $.map(data, function (item) {
//                        return {
//                            text: item.name,
//                            id: item.id
//                        }
//                    })
//                };
//            },
//            cache: true
//        },
//        minimumInputLength: 1,
//    });
//    $(".select2_publisher").select2({
//        ajax: {
//            url: '/merchants/search_json',
//            dataType: 'json',
//            delay: 250,
//            data: function (params) {
//                return {
//                    term: params.term,
//                    page: params.page
//                };
//            },
//            processResults: function (data, page) {
//                return {
//                    results: $.map(data, function (item) {
//                        return {
//                            text: item.name,
//                            id: item.id
//                        }
//                    })
//                };
//            },
//            cache: true
//        },
//        minimumInputLength: 1,
//    });
//    if (jQuery().datepicker) {
//        $('.date-picker').datepicker({
//            rtl: App.isRTL(),
//            autoclose: true
//        });
//        // $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
//    }
//    jQuery(".set_attribute").click(function (evt) {
//        evt.preventDefault();
//        $.ajax({
//            type: "GET",
//            cache: false,
//            url: '/attributes/category_attribute/' + this.value + '/' + $('#ItemId').val(),
//            success: function (res) {
//                $('#product_add_attribute').html(res);
//
//            },
//        });
//    });
//
//
//}
// Merchange Index
IttadiShop.merchants_index = function () {
    $(".select2_publisher").select2({
        ajax: {
            url: '/merchants/search_json', dataType: 'json', delay: 250,
            data: function (params) {
                return {term: params.term, page: params.page};
            },
            processResults: function (data, page) {
                return {
                    results: $.map(data, function (item) {
                        return {text: item.name, id: item.id}
                    })
                };
            },
            cache: true
        },
        minimumInputLength: 1,
    });
    jQuery("#ItemBookName").keyup(function (evt) {
        var name = $("#ItemBookName").val();
        var loading = false;
        if (loading == false) {
            loading = true;
            $.ajax({
                type: "POST",
                dataType: 'html',
                url: "/merchants/search_byname",
                data: {name: name},
                success: function (data) {
                    $('#book_name_search_ul').show().html(data);
                    loading = false;
                }
            });
        }
    });

    function search_publishers() {

    }
}
// Merchant add/Edit page 
IttadiShop.MerchantsUpdate = function () {
    $(".select2_publisher").select2({
        ajax: {
            url: '/merchants/search_json', dataType: 'json', delay: 250,
            data: function (params) {
                return {term: params.term, page: params.page};
            },
            processResults: function (data, page) {
                return {
                    results: $.map(data, function (item) {
                        return {text: item.name, id: item.id}
                    })
                };
            },
            cache: true
        },
        minimumInputLength: 1,
    });
    jQuery(".deleteMerchantImage").click(function (evt) {
        evt.preventDefault();
        $.ajax({
            type: "GET",
            url: "/merchants/deleteImage/" + $(this).attr('data-type') + '/' + $(this).attr('data-id'),
            success: function (data) {
                if ($(this).attr('data-type') === 'image') {
                    $('#logoMerchat').hide();
                } else {
                    $('#bannerMerchat').hide();
                }

            }
        });
    });
}
// Merchant add/Edit page 
IttadiShop.WritersUpdate = function () {
    jQuery(".deleteMerchantImage").click(function (evt) {
        evt.preventDefault();
        $.ajax({
            type: "GET",
            url: "/writers/deleteImage/" + $(this).attr('data-type') + '/' + $(this).attr('data-id'),
            success: function (data) {
                if ($(this).attr('data-type') == 'image') {
                    $('#logoWriter').hide();
                } else {
                    $('#bannerWriter').hide();
                }

            }
        });
    });
}
// Attributes Home
IttadiShop.attributes = function () {
    jQuery("#AttributeCategoryId").change(function (evt) {
        var name = $("#AttributeCategoryId").val();
        $.ajax({
            type: "POST",
            dataType: 'html',
            url: "/attributes/get_subcategory/" + name,
            success: function (data) {
                $('#get_subcategory').html(data);
                // loading = false;
            }
        });
    });
}
// Product image 
IttadiShop.products_images = function () {
    $(function () {
        books_images_sortable($('#ItemId').val());

    });

    var books_images_sortable = function (book_id) {
        $("#book_images_section").sortable({
            stop: function (event, ui) {
                var data = $(this).sortable('serialize');
                $.ajax({type: "POST", cache: false,
                    url: '/products/images_sort/' + book_id,
                    data: data, dataType: "json",
                    error: function (xhr, ajaxOptions, thrownError) {
                    }
                });
            }
        });


    }
    var $filequeue, $filelist;
    var book_image_type;
    $(document).ready(function () {
        $filequeue = $(".filelist.queue");
        $filelist = $(".filelist.complete");
        book_image_type = $('input[name=book_image]:checked').val();
        $("#dropped").dropper({
            action: "/products/upload/" + $('#ItemId').val() + '/' + book_image_type,
            maxSize: 999999999
        }).on("start.dropper", onStart)
                .on("complete.dropper", onComplete)
                .on("fileStart.dropper", onFileStart)
                .on("fileProgress.dropper", onFileProgress)

                .on("fileComplete.dropper", onFileComplete)
                .on("fileError.dropper", onFileError);

        $(window).one("pronto.load", function () {
            $(".demo .dropped").dropper("destroy").off(".dropper");
        });
    });

    function onStart(e, files) {
        $('.filelists').show();
        var html = '';

        for (var i = 0; i < files.length; i++) {
            html += '<li data-index="' + files[i].index + '"><span class="file">' + files[i].name + '</span><span class="progress">Queued</span></li>';
        }

        $filequeue.append(html);
    }

    function onComplete(e) {
        //console.log("Complete");
        // All done!
    }

    function onFileStart(e, file) {
        //console.log("File Start");

        $filequeue.find("li[data-index=" + file.index + "]")
                .find(".progress").text("0%");
    }

    function onFileProgress(e, file, percent) {
        //console.log("File Progress");

        $filequeue.find("li[data-index=" + file.index + "]")
                .find(".progress").text(percent + "%");
    }

    function onFileComplete(e, file, response) {

        response_json = $.parseJSON(response);
        if (response.trim() === "" || response.toLowerCase().indexOf("error") > -1) {
            $filequeue.find("li[data-index=" + file.index + "]").addClass("error")
                    .find(".progress").text(response.trim());
        } else {
            var $target = $filequeue.find("li[data-index=" + file.index + "]");

            $target.find(".file").text(file.name);
            $target.find(".progress").remove();
            $target.appendTo($filelist);
        }
        text = "<div class='col-md-3 col-sm-4' id='book_image_" + response_json[1] + "' >";
        text += "<div class='thumbnail' style='position: relative;'>";
        text += "<img width='100%' src='" + response_json[0] + "'>";
        text += "<div><select id='ItemImageType' class='form-control' name='data[Item][image_type]' onchange='chagne_image_type(" + response_json[1] + ",this.value)'>";
        text += "<option value='1'>Front</option><option value='2'>Back</option><option value='3'>Featured</option><option selected='selected' value='4'>Other</option><option value='5'>PDF</option></select></div>";
        text += "<div style='position: absolute;top:0px;right: 0px;padding:3px;background-color: red;color:#fff;cursor:pointer;' onclick='delete_image(" + response_json[1] + ");'>Delete</div>";
        text += "</div></div>";
        $('#book_images_section').append(text);

    }

    function onFileError(e, file, error) {
        //console.log("File Error");

        $filequeue.find("li[data-index=" + file.index + "]").addClass("error")
                .find(".progress").text("Error: " + error);
    }

    jQuery(".change_image_type").change(function (evt) {
        evt.preventDefault();
        href = '/products/images/' + $('#ItemId').val() + '/' + $('input[name=book_image]:checked').val();
        window.location = href;

    });

}
/* product Index page */
IttadiShop.products_Index = function () {
    $('.select2').select2({});
    $(".book_name_search").select2({
        ajax: {
            url: '/products/search_byname', dataType: 'json', delay: 250,
            data: function (params) {
                return {term: params.term, page: params.page};
            },
            processResults: function (data, page) {
                return {results: $.map(data, function (item) {
                        return {text: item.name, id: item.id}
                    })};
            },
            cache: true
        },
        minimumInputLength: 2,
    });
    $(".select2_writer").select2({
        ajax: {
            url: '/writers/search_json', dataType: 'json', delay: 250,
            data: function (params) {
                return {term: params.term, page: params.page};
            },
            processResults: function (data, page) {
                return {results: $.map(data, function (item) {
                        return {text: item.name, id: item.id}
                    })};
            },
            cache: true
        },
        minimumInputLength: 1,
    });
    $(".select2_publisher").select2({
        ajax: {
            url: '/merchants/search_json', dataType: 'json', delay: 250,
            data: function (params) {
                return {term: params.term, page: params.page};
            },
            processResults: function (data, page) {
                return {
                    results: $.map(data, function (item) {
                        return {text: item.name, id: item.id}
                    })
                };
            },
            cache: true
        },
        minimumInputLength: 1,
    });

}
function set_merchant_price(type, id) {
    App.blockUI({boxed: true});
    $.ajax({
        type: "POST",
        url: "/merchants/set_price/" + type + '/' + id,
        success: function (data) {
            App.unblockUI();
        }
    });
}
function delete_image(id) {
    $.ajax({
        type: "GET",
        cache: false,
        url: '/products/delete_image/' + id,
        dataType: "html",
        success: function (res) {
            $('#book_image_' + id).remove();
        },
        error: function (xhr, ajaxOptions, thrownError) {
        }
    });

}
function chagne_image_type(id, type) {
    $.ajax({
        type: "GET",
        cache: false,
        url: '/products/update_image_type/' + id + '/' + type,
        dataType: "json",
        success: function (res) {
        },
        error: function (xhr, ajaxOptions, thrownError) {
        }
    });

}


function show_book_details(id) {
    $('#details_' + id).toggle();
    if ($('#row_details_' + id).hasClass('row-details-close')) {
        $('#row_details_' + id).addClass('row-details-open').removeClass('row-details-close');
    } else {
        $('#row_details_' + id).removeClass('row-details-open').addClass('row-details-close');
    }
}
function add_new_publishers() {
    name = $('#ItemNewPublisher').val();
    name_eng = $('#ItemNewPublisherEng').val();
    if (name != '') {
        $.ajax({
            type: "POST",
            cache: false,
            url: '/merchants/add_new_publishers/',
            data: "name=" + name + "&name_eng=" + name_eng,
            dataType: "json",
            success: function (res) {
                $('#ItemPublisherId').append('<option value="' + res.id + '">' + res.name + '</option>');
                $('#ItemNewPublisher').val('');
                $('#ItemNewPublisherEng').val('');
            },
            error: function (xhr, ajaxOptions, thrownError) {
            }
        });
    }
}
function add_new_writers() {
    name = $('#ItemNewWriter').val();
    name_eng = $('#ItemNewWriterEng').val();
    if (name != '') {
        $.ajax({
            type: "POST",
            cache: false,
            url: '/writers/add_new_writers/',
            data: "name=" + name + "&name_eng=" + name_eng,
            dataType: "json",
            success: function (res) {
                $('#writer0').append('<option value="' + res.id + '">' + res.name + '</option>');
                $('#writer1').append('<option value="' + res.id + '">' + res.name + '</option>');
                $('#writer2').append('<option value="' + res.id + '">' + res.name + '</option>');
                $('#writer3').append('<option value="' + res.id + '">' + res.name + '</option>');
                $('#writer4').append('<option value="' + res.id + '">' + res.name + '</option>');
                $('#ItemNewWriter').val('');
                $('#ItemNewWriterEng').val('');
            },
            error: function (xhr, ajaxOptions, thrownError) {
            }
        });
    }
}
function products_images_sortable(book_id) {
    $("#book_images_section").sortable({
        stop: function (event, ui) {
            var data = $(this).sortable('serialize');
            // console.log(data);
            $.ajax({
                type: "POST",
                cache: false,
                url: '/products/images_sort/' + book_id,
                data: data,
                dataType: "json",
                success: function (res) {
                },
                error: function (xhr, ajaxOptions, thrownError) {
                }
            });
        }
    });
    //$("#book_images_section").disableSelection();

}
function related_products_sortable() {
    $("#datatable_ajax tbody").sortable({
        cursor: 'move',
        stop: function (event, ui) {
            var data = $(this).sortable("serialize");
            $.ajax({
                type: "POST",
                cache: false,
                url: '/products/sort_related_books/',
                data: data,
                dataType: "json",
                success: function (res) {
                },
                error: function (xhr, ajaxOptions, thrownError) {
                }
            });
        }
    });
    //$("#book_images_section").disableSelection();

}

function writers_sortable() {
    $("#datatable_ajax").sortable({
        cursor: 'move',
        stop: function (event, ui) {
            var data = $(this).sortable("serialize");
            $.ajax({
                type: "POST",
                cache: false,
                url: '/writers/sort_post/',
                data: data,
                dataType: "json",
                success: function (res) {
                },
                error: function (xhr, ajaxOptions, thrownError) {
                }
            });
        }
    });
    //$("#book_images_section").disableSelection();

}
/** Update any book values by ajax */
function update_book_values(type, id, value) {
    App.blockUI({boxed: true});
    $.ajax({
        type: "POST",
        cache: false,
        url: '/products/update_book_values/' + type + '/' + id + '/' + value,
        dataType: "json",
        success: function (res) {
            App.unblockUI();
        }
    });
}
function send_sms_order(type, order_id) {
    $.ajax({
        type: "POST",
        dataType: 'jsonp',
        url: "/orders/sms/" + type + '/' + order_id,
        success: function (data) {

        }
    });
}

function add_item_on_order() {
    $.ajax({
        type: "POST",
        dataType: 'html',
        url: "/orders/add_item/" + $('#h_order_id').val(),
        data: 'b_book_id=' + $('#OrderBookName').val() + '&book_id=' + $('#item').val() + '&quantity=' + $('#quantity').val(),
        success: function (data) {
            $('#load_items').after(data);
            $('#item').val('');
            $('#OrderBookName').val('');
            $('#select2-OrderBookName-container').text('');
        }
    });
}

function remove_order_item_tr(order_id, id) {
    $.ajax({
        type: "POST",
        dataType: 'html',
        url: "/orders/remove_item/" + order_id + '/' + id,
        data: {name: name},
        success: function (data) {
            $('#oreder_item_tr_' + id).remove();
        }
    });

}
function add_related_book(book_id) {
    $.ajax({
        type: "POST",
        dataType: 'html',
        url: "/products/related_add/" + book_id,
        data: 'b_book_id=' + $('#BookBookName').val() + '&book_id=' + $('#item').val(),
        success: function (data) {
            $('#load_items').after(data);
            $('#item').val('');
            $('#BookBookName').val('');
            $('#select2-BookBookName-container').text('');
        }
    });
}
function remove_related_book(book_id, related_book_id) {
    $.ajax({
        type: "POST",
        dataType: 'html',
        url: "/products/related_delete/" + book_id + '/' + related_book_id,
        success: function (data) {
            $('#oreder_item_tr_' + related_book_id).remove();
        }
    });
}

function search_writer() {
    var name = $("#ItemBookName").val();
    var loading = false;
    if (loading == false) {
        loading = true;
        $.ajax({
            type: "POST",
            dataType: 'html',
            url: "/writers/search_byname",
            data: {name: name},
            success: function (data) {

                $('#book_name_search_ul').show().html(data);
                loading = false;
            }
        });
    }
}
function change_district(type) {
    if (type == 1) {
        district_id = $('#UserState').val();
    } else {
        district_id = $('#OrderState').val();
    }
    if (district_id != '') {
        $.ajax({
            type: "GET",
            dataType: 'html',
            url: "/users/change_discrict/" + district_id + '/' + type,
            success: function (data) {
                $('#selected_areas').html(data);
            }
        });
    }
}

// Update publisher field
function update_publisher_field(id, field) {
    if ($('#pub_home_' + id).attr('checked') == 'checked') {
        val = 1;
    } else {
        val = 0;
    }
    $.ajax({
        type: "GET",
        dataType: 'html',
        url: "/publishers/update_publisher_field/" + id + '/' + field + '/' + val,
        success: function (data) {
        }
    });
}

function update_store(book_id) {
    $.ajax({
        type: "POST",
        dataType: 'html',
        url: "/products/update_store/" + book_id,
        data: ({quantity: $('#quantity_' + book_id).val(), price: $('#price_' + book_id).val(), owned: $('#owned_' + book_id).val()}),
        success: function (data) {
        }
    });
}
function order_submit() {
    var error = 0;
    if ($('#OrderPhone').val() == '') {
        error = 1;
    }
    if ($('#OrderName').val() == '') {
        error = 1;
    }
    if (error == 1) {
        return false;
    } else {
        return true;
    }
    return true;
}