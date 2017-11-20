var B2Custom = {};
jQuery(document).ready(function () {
    var id = jQuery(".main_page_content").attr("id");
    if (id && id.length > 0)
        B2Custom[id]();
});

B2Custom.users_register = function () {

    $('#register-form').validate(/*feedback-form*/{
        onkeyup: false,
        onfocusout: false,
        errorElement: 'p',
        rules:
                {
                    name: {required: true},
                    email: {required: true, email: true},
                    password: {required: true},
                    rpassword: {required: true, equalTo: "#password"},
                    tnc: {required: true}
                },
        messages:
                {
                    name: {required: 'Please enter your name'},
                    email: {required: 'Please enter your email address', email: 'Please enter a VALID email address'},
                    password: {required: 'Please enter password'},
                    rpassword: {required: 'Please enter confirm password'},
                }

    });
}
B2Custom.users_login = function () {

    $('#login-form').validate(/*feedback-form*/{
        onkeyup: false,
        onfocusout: false,
        errorElement: 'p',
        rules:
                {
                    email: {required: true, email: true},
                    password: {required: true},
                },
        messages:
                {
                    email: {required: 'Please enter your email address', email: 'Please enter a VALID email address'},
                    password: {required: 'Please enter password'},
                }

    });
}
B2Custom.users_forgotpassword = function () {

    $('#login-form').validate(/*feedback-form*/{
        onkeyup: false,
        onfocusout: false,
        errorElement: 'p',
        rules:
                {
                    email: {required: true, email: true}
                },
        messages:
                {
                    email: {required: 'Please enter your email address', email: 'Please enter a VALID email address'},
                }

    });
}
B2Custom.users_cpassword = function () {

    $('#login-form').validate({
        onkeyup: false,
        onfocusout: false,
        errorElement: 'p',
        rules:
                {
                    password: {required: true},
                    cpassword: {required: true, equalTo: "#password"}
                },
        messages:
                {
                    password: {required: 'Please enter password'},
                    cpassword: {required: 'Please enter confirm password'},
                }

    });
}
B2Custom.users_change_password = function () {

    $('#login-form').validate({
        onkeyup: false,
        onfocusout: false,
        errorElement: 'p',
        rules:
                {
                    password: {required: true},
                    npassword: {required: true},
                    cpassword: {required: true, equalTo: "#npassword"},
                },
        messages:
                {
                    password: {required: 'Please enter password'},
                    npassword: {required: 'Please enter new password'},
                    cpassword: {required: 'Please enter confirm new password'},
                }

    });
}
B2Custom.users_profile = function () {

    $('#users_profile_form').validate(/*feedback-form*/{
        onkeyup: false,
        onfocusout: false,
        errorElement: 'p',
        rules:
                {
                    name: {required: true},
                    email: {required: true, email: true},
                },
        messages:
                {
                    name: {required: 'Please enter your name'},
                    email: {required: 'Please enter your email address', email: 'Please enter a VALID email address'},
                }

    });
}
B2Custom.contact_add = function () {

    $('#contact-form').validate({
        onkeyup: false,
        onfocusout: false,
        errorElement: 'p',
        rules: {
            name: {required: true},
            email: {required: true, email: true},
        },
        messages: {
            name: {required: 'Please enter name'},
            email: {required: 'Please enter customer email', email: 'Please enter valid email address.'},
        }

    });
}
B2Custom.Events_edit = function () {
    B2Custom.select2('/contacts/search');

}
B2Custom.Events_index = function () {
    $('.event_user_status').click(function () {
        id = $(this).attr('data-id');
        val = $(this).attr('data-val');
        if (id !== '') {
            B2.startPageLoading({animate: true});
            $.ajax({
                type: "POST",
                dataType: 'html',
                url: "/events/update_e_status",
                data: "contact_id=" + id + '&val=' + val,
                success: function (data) {
                    $('#event_user_status_' + id).html(data);
                    B2.stopPageLoading();
                }
            });
        }
    });
    $('.delete_contact').click(function () {
        id = $(this).attr('data-id');
        toastr.options = {
            "closeButton": true, "debug": true, "positionClass": "toast-bottom-center", "showDuration": "1000", "hideDuration": "100", "timeOut": "5000",
            "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "linear", "showMethod": "fadeIn", "hideMethod": "fadeOut",
            "positionClass" : "toast-top-center"
        }
        toastr['info']('<button type="button" class="btn red clear delete_contact_yes" style="margin-top:20px;" >Yes</button>', 'Are You sure want to delete this contact from this event');
        // toastr.clear();
        $('.delete_contact_yes').click(function () {
            B2.startPageLoading({animate: true})
            $.ajax({
                type: "POST",
                dataType: 'html',
                url: "/events/delete_contact",
                data: "id=" + id,
                success: function (data) {
                    $('#contact_' + id).hide('slow');
                    B2.initToaster('success', 'Contact Deleted from these event', '', '');
                    B2.stopPageLoading();
                }
            });
        });
    });
}



B2Custom.add_contact_on_event = function () {
    $('#users').on('select2:select', function (evt) {
        id = $('#users').val();
        if (id !== '') {
            B2.startPageLoading({animate: true});
            $.ajax({
                type: "POST",
                dataType: 'html',
                url: "/events/add_contact",
                data: "contact_id=" + id + '&id=' + $('#event_id').val(),
                success: function (data) {
                    $('.sContact').append(data);
                    if ($('#success_add').val() !== '0') {
                        B2.initToaster('success', 'Contact added on the event', '', '');
                    } else {
                        B2.initToaster('error', 'Already added this contact', '', '');
                    }

                    B2.stopPageLoading();
                }
            });
        }
    });
    $('.delete_contact').click(function () {
        id = $(this).attr('data-id');
        toastr.options = {
            "closeButton": true, "debug": true, "positionClass": "toast-bottom-center", "showDuration": "1000", "hideDuration": "100", "timeOut": "5000",
            "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "linear", "showMethod": "fadeIn", "hideMethod": "fadeOut",
            "positionClass" : "toast-top-center"
        }
        toastr['info']('<button type="button" class="btn red clear delete_contact_yes" style="margin-top:20px;" >Yes</button>', 'Are You sure want to delete this contact from this event');
        // toastr.clear();
        $('.delete_contact_yes').click(function () {
            B2.startPageLoading({animate: true})
            $.ajax({
                type: "POST",
                dataType: 'html',
                url: "/events/delete_contact",
                data: "id=" + id,
                success: function (data) {
                    $('#contact_' + id).hide('slow');
                    B2.initToaster('success', 'Contact Deleted from these event', '', '');
                    B2.stopPageLoading();
                }
            });
        });
    });



}
B2Custom.Events_message = function () {
    $('.sendMsg').click(function () {
        contact_id = $(this).attr('data-id');
        type = $(this).attr('data-type');
        B2Custom.sentMessage(type, contact_id);
    });
}
B2Custom.sentMessage = function (type, contact_id) {
    B2.startPageLoading({animate: true})
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: "/events/send_msg/" + type,
        data: "contact_id=" + contact_id,
        success: function (data) {
            // $('#contact_' + id).hide('slow');
            if(data.status=='success'){
              B2.initToaster('success', data.message, '', '');
          }else if(data.status=='error'){
              B2.initToaster('error', data.message, '', '');
          }
              B2.stopPageLoading();
        }
    });
}
B2Custom.select2 = function (url, option) {
    $(".ajax_select2").select2({
        ajax: {
            url: url,
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

                        return {text: item.name, id: item.id}
                    })
                };
            },
            cache: true
        },
        minimumInputLength: 1,
    });
}
$('.fancybox').fancybox();
function popitup(url) {
    newwindow = window.open(url, 'name', 'directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,height=400,width=550');
    if (window.focus) {
        newwindow.focus()
    }
    return false;
}

function delete_contact(id) {

    var delete_contact_yes = function (id) {
        alert(id);
    }
}