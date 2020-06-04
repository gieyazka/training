

$('#reservationdate').datetimepicker({
    // format: 'L'
    format: 'DD/MM/YYYY'

});
var Toast = Swal.mixin({
    showConfirmButton: false,
    timer: 2000,

});
function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test($email);
}
var SendData = $('#SendData')

$("#CheckMember").hide();

SendData.click(function () {
    // $('#Form_Register').submit()
    $.ajax({
        url: 'checkmember.control.php',
        method: "POST",
        data: {
            Pid: $('#Pid').val(),
            action: 1
        },
        success: function (result) {
            $("#CheckMember").show()
            $("#CheckMember").html(result)
            $.ajax({
                url: 'checkmember.control.php',
                method: "POST",
                data: {
                    Pid: $('#Pid').val(),
                    action: 2
                },
                success: function (result) {
                    $('#Pid1').val(result.Pid)
                    $('#Email').val(result.Email)
                    $('#FName').val(result.Firstname)
                    $('#LName').val(result.Lastname)
                    $('#reservationdate').val(result.Birthdate)
                    $('#Age').val(result.Age)
                    $('#EFName').val(result.Firstname_EN)
                    $('#ELName').val(result.Lastname_EN)
                    $('#Height').val(result.Height)
                    $('#School').val(result.School)
                    $('#Class').val(result.Class)
                    $('#Tel').val(result.Tel)
                    $('#club').val(result.Club)
                    $('#Position').val(result.Position)
                    $("#foot").val(result.Foot);
                    $('#salary').val(result.Salary)
                    $('#Pname').val(result.Pname)
                    $('#Nickname').val(result.Nickname)

                    $('#Address').val(result.Address)
                    $('#Parent_Tel').val(result.Parent_Tel)
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
                    $('.f').each(function () {

                        if ($(this).val() == result.Field) {
                            $(this).prop('checked', true)
                        }
                    })

                }

            })
        }
    });
    // console.log($('#Form_Register').serialize());
});

var PIDobj = $('#Pid')
var PIDobj1 = $('#Pid1')
var EmailObj = $('#Email')
var NameObj = $('.Name')

NameObj.each(function () {
    $(this).on('blur', function () {
        if ($(this).val() == '' || $(this).val() == "null") {
            $(this).removeClass("is-valid").addClass("is-invalid");
        } else {
            $(this).removeClass("is-invalid").addClass("is-valid");
        }
    })
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
$('#Updatedata').click(function () {
    // $('#Form_Register').submit()
    if ($('.bootstrap-switch-id-sexget').hasClass('bootstrap-switch-on')) {

        $('#sex').val("ชาย")

    } else {

        $('#sex').val("หญิง")
    }
    $.ajax({
        url: "checkmember.control.php",
        method: "POST",
        data: $('#Form_Register').serialize() + "&action=3",
        success: function (result) {
            if (result != "") {
                $('#Editmodal').modal('toggle')
                $('#Editdetail').html(result)
            } else {
                Toast.fire({
                    icon: 'success',
                    title: 'แก้ไขข้อมูลสำเร็จ'
                   

                })
                setTimeout("location.href = 'UserMenu';", 2100);

            }

        }
    })



    // console.log($('#Form_Register').serialize());
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