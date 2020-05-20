



$('#reservationdate').datetimepicker({
    format: 'L'
    // format: 'DD/MM/YYYY'
});
function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test($email);
}

var SendData = $('#SendData')
var PIDobj = $('#Pid')
var EmailObj = $('#Email')
var NameObj = $('.Name')
var ZipcodeObj = $('#Zipcode')
NameObj.each(function () {
    $(this).on('blur', function () {
        if ($(this).val() == '' || $(this).val() == "null") {
            $(this).removeClass("is-valid").addClass("is-invalid");
        } else {
            $(this).removeClass("is-invalid").addClass("is-valid");
        }
    })
})
ZipcodeObj.keyup(function () {
    if (ZipcodeObj.val().length != 5 && $(this).val().match(/^([0-9])+$/i)) {
        ZipcodeObj.removeClass("is-valid").addClass("is-invalid");
    } else {
        ZipcodeObj.removeClass("is-invalid").addClass("is-valid");
    }
})
$(".btswitch").each(function () {
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
    $(this).bootstrapSwitch('onText', 'ชาย');
    $(this).bootstrapSwitch('offText', 'หญิง');
    // $(this).click(function(){
    //     alert('test')
    // })

});


$('#other').click(function () {
    if ($(this).is(':checked')) {
        $('#txtother').prop('disabled', false)
    } else {
        $('#txtother').val("")
        $('#txtother').prop('disabled', true)
    }

})






SendData.click(function () {
    // $('#Form_Register').submit()
    if ($('.bootstrap-switch-id-sexget').hasClass('bootstrap-switch-on')) {

        $('#sex').val("ชาย")

    } else {

        $('#sex').val("หญิง")
    }


    $.ajax({
        url: 'register.control.php',
        method: "POST",
        data: $('#Form_Register').serialize() + "&action=1",
        success: function (result) {
            // alert(result)
            if (result == "") {
                $("#ShowOutput").html("ลงทะเบียนสำเร็จ")
                $('#Finish').show()
                $('#Failed').hide()
                $.ajax({
                    url: 'register.control.php',
                    method: "POST",
                    data: {
                        Pid: $('#Pid').val(),
                        action: 2
                    },
                    success: function (data) {
                        $("#ShowOutput").append(data)
                    }
                });
            } else {
                $("#ShowOutput").html(result)
                $('#Finish').hide()
                $('#Failed').show()
            }
        }
    });
    // console.log($('#Form_Register').serialize());
});
PIDobj.keyup(function () {

    if (PIDobj.val().length != 13) {
        PIDobj.removeClass("is-valid").addClass("is-invalid");
    } else {
        for (i = 0, sum = 0; i < 12; i++) {
            sum += parseFloat(PIDobj.val().charAt(i)) * (13 - i);
        }
        // console.log(sum)
        if ((11 - sum % 11) % 10 != parseFloat(PIDobj.val().charAt(12))) {

            PIDobj.removeClass("is-valid").addClass("is-invalid");
        } else {
            PIDobj.removeClass("is-invalid").addClass("is-valid");

        }
    }
});
EmailObj.keyup(function () {
    if (!validateEmail(EmailObj.val()) || $(this).val() == "") {
        EmailObj.removeClass("is-valid").addClass("is-invalid");
    } else {
        EmailObj.removeClass("is-invalid").addClass("is-valid");
    }
});
$('#province').change(function () {
    $('#amphure').html('<option selected="selected" value="">เลือกอำเภอ</option>');
    $('#amphure').val() == 0
    $('#district').html('<option selected="selected" value="">เลือกตำบล</option>');
    // console.log($("#province").val())
    // console.log($(this).children(":selected").attr("id"))
    if ($("#province").val() == "") {
        $("#province").removeClass("is-valid").addClass("is-invalid");
        $("#amphure").prop('disabled', true);

    } else {
        $("#province").removeClass("is-invalid").addClass("is-valid");
        $.ajax({
            url: 'register.control.php',
            method: 'POST',
            data: {
                province_id: $(this).children(":selected").attr("id")
            },
            success: function (result) {
                var data = JSON.parse(result);
                console.log(data)
                $.each(data, function (index, item) {
                    $('#amphure').append(
                        $('<option></option>').val(item.name_th).html(item.name_th).attr('id', item.id)

                    );
                });

            }
        });
        $("#amphure").prop('disabled', false);
    }
});
$('#Finish').click(function () {

    $('#footFinish').html("")
    $.ajax({
        url: 'register.control.php',
        method: "POST",
        data: {
            Pid: $('#Pid').val(),
            action: 2
        },
        success: function (data) {
            $("#ShowQR").html(data)
        }
    });

});
$('#amphure').change(function () {
    if ($('#amphure').val() == "" || $('#amphure').val() == "0") {
        $('#district').html('<option selected="selected"  value="">เลือกตำบล</option>');

        console.log($(this).children(":selected").attr("id"))
        console.log($(this).children(":selected").attr("value"))
    }
    $("#district").prop('disabled', false)
    $.ajax({
        url: 'register.control.php',
        method: "POST",
        data: {
            amphure_id: $(this).children(":selected").attr("id")
        },
        success: function (result) {
            var data = JSON.parse(result);
            $.each(data, function (index, item) {
                $('#district').append(
                    $('<option></option>').val(item.name_th).html(item.name_th).attr('id', item.id)

                );
            });
            // console.log(data)

        }


    });
});
// if($('#province').val()=="0"){

// }

$('#addEvent').click(function () {
    location.reload();

});
$('#ShowMember').click(function () {
    $.ajax({
        url: "checkmember.php",
        method: 'POST',
        data: {
            action: 1
        },
        success: function (result) {
            $('#ShowData').html(result)
            // console.log(result)
        }
    });
});

$('#Height').change(function () {
    if (!$(this).val().match(/^([0-9])+$/i)) {
        $(this).removeClass("is-valid").addClass("is-invalid");
    } else {
        $(this).removeClass("is-invalid").addClass("is-valid");
    }
})
$('#Age').change(function () {
    if (!$(this).val().match(/^([0-9])+$/i)) {
        $(this).removeClass("is-valid").addClass("is-invalid");
    } else {
        $(this).removeClass("is-invalid").addClass("is-valid");
    }
})
$('.Tel').each(function () {
    $(this).change(function () {
        console.log($(this).val())
        if (!$(this).val().match(/^([0-9])+$/i) || $(this).val().length != 10) {
            $(this).removeClass("is-valid").addClass("is-invalid");
        } else {
            $(this).removeClass("is-invalid").addClass("is-valid");
        }
    })
})
$('#subject').change(function () {

    $.ajax({
        url: "register.control.php",
        method: "POST",
        data: {
            Event_ID: $('option:selected').attr('data-id'),
            action: 3
        }, success: function (result) {
            //  alert(result.Field4)
            if (result.Field1 == 'No') {
                $('#radioPrimary1').prop('disabled', true)
                $('#radioPrimary1').prop('checked', false)
            } else {
                $('#radioPrimary1').prop('disabled', false)
            }
            if (result.Field2 == 'No') {
                $('#radioPrimary2').prop('disabled', true)
                $('#radioPrimary2').prop('checked', false)
            } else {
                $('#radioPrimary2').prop('disabled', false)
            }
            if (result.Field3 == 'No') {
                $('#radioPrimary3').prop('disabled', true)
                $('#radioPrimary3').prop('checked', false)
            } else {
                $('#radioPrimary3').prop('disabled', false)
            }
            if (result.Field4 == 'No') {
                $('#radioPrimary4').prop('disabled', true)
                $('#radioPrimary4').prop('checked', false)
            } else {
                $('#radioPrimary4').prop('disabled', false)
            }

        }
    })
})

$('#club').change(function () {
    if (!$(this).val().match(/^([ก-๙a-z0-9 ])+$/i)) {
        $(this).removeClass("is-valid").addClass("is-invalid");
    } else {
        $(this).removeClass("is-invalid").addClass("is-valid");
    }
})
$('#Pname').change(function () {
    if (!$(this).val().match(/^([ก-๙a-z ])+$/i)) {
        $(this).removeClass("is-valid").addClass("is-invalid");
    } else {
        $(this).removeClass("is-invalid").addClass("is-valid");
    }
})
$('#Position').change(function () {
    if (!$(this).val().match(/^([ก-๙a-z -])+$/i)) {
        $(this).removeClass("is-valid").addClass("is-invalid");
    } else {
        $(this).removeClass("is-invalid").addClass("is-valid");
    }
})
$('.ThName').each(function () {
    $(this).change(function () {
        // console.log($(this).val())
        if (!$(this).val().match(/^([ก-๙])+$/i)) {
            $(this).removeClass("is-valid").addClass("is-invalid");
        } else {
            $(this).removeClass("is-invalid").addClass("is-valid");
        }
    })
})
$('.EnName').each(function () {
    $(this).change(function () {
        // console.log($(this).val())
        if (!$(this).val().match(/^([a-z])+$/i)) {
            $(this).removeClass("is-valid").addClass("is-invalid");
        } else {
            $(this).removeClass("is-invalid").addClass("is-valid");
        }
    })
})
$('#Nickname').change(function () {
    if (!$(this).val().match(/^([a-zก-๙])+$/i)) {
        $(this).removeClass("is-valid").addClass("is-invalid");
    } else {
        $(this).removeClass("is-invalid").addClass("is-valid");
    }
})

$('#sb').click(function () {

    if ($('#body').hasClass('sidebar-collapse')) {
        $('#body').removeClass('sidebar-collapse');

    } else {
        $('#body').addClass('sidebar-collapse');

    }
    if ($('#body').hasClass('sidebar-open')) {
        $('#body').removeClass('sidebar-open');
        $('#body').addClass('sidebar-close');

    } else {
        $('#body').removeClass('sidebar-close');
        $('#body').addClass('sidebar-open');;
    }

})
$('#sidebar-overlay').click(function () {
    $('#body').removeClass('sidebar-open');
    $('#body').addClass('sidebar-close');
})
$('#Finish').click(function () {

    $('#footFinish').html("")
    $.ajax({
        url: 'register.control.php',
        method: "POST",
        data: {
            Pid: $('#Pid').val(),
            action: 2
        },
        success: function (data) {
            $("#ShowQR").html(data)
        }
    });

});