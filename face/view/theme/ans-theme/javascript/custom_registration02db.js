window.addEventListener('load', function() {
    if (typeof send_otp_section != 'undefined' && send_otp_section == "1" && user_blocked == "0") {
        if (varification_type === 'both') {
            initiateOtp();
            initiateEmail();
        } else if (varification_type == 'otp') {
            initiateOtp();
        } else if (varification_type == 'email') {
            initiateOtp();
        }
    }
    function initiateOtp() {
        $(".otp-field").show();
        $('#input-register-passShowHide').show(0);
        $('#input-register-counter').hide(0);
    }
    function initiateEmail() {
        $(".email-otp-field").show();
        $('#input-register-emailpassShowHide').show(0);
        $('#input-register-email-counter').hide(0);
    }
var $token = $('#__csrf').val();
if(typeof send_otp_section != 'undefined' && (varification_type === 'both' || varification_type === 'otp')) {
$(document).on('click', '#button-resend', function() {
        sendOtp('resent');
});   
}
$(document).on('click', '#button-change-mobile', function() {
        $( "#input-registration-telephone" ).focus();
        $( "#input-registration-telephone" ).val('');
        $('.otpSuccessMessage').hide();
        $('#input-registration-telephone').prop('readonly',false)
        $(".btn-den").prop("disabled", true);
        $(".btn-den").prop("type", 'button');
});
function timer() {
        $('#input-register-passShowHide').delay(0).hide(0);
        $('#input-register-counter').delay(0).show(0);
        let timeleft = 15;
        document.getElementById("timer").innerHTML = '00:15';
        let downloadTimer = setInterval(function(){  
                --timeleft;
                if(timeleft > 9) {
                        document.getElementById("timer").innerHTML ='00:'+timeleft; 
                } else {
                        document.getElementById("timer").innerHTML ='00:0'+timeleft; 
                }   
                if(timeleft <= 1){
                        clearInterval(downloadTimer);
                }
        }, 1000)
}

function sendOtp(type) {         
        var telephone = $("#input-registration-telephone").val();
               $.ajax({
                       url: 'index.php?route=account/login/registerSendOtp',
                       type: 'post',
                       data: { 'telephone': telephone,'type':type},
                       headers: {"Authorization": $token },
                       dataType: 'json',
                       cache: false,
                       success: function(json) {
                              $(".text-danger-telephone").remove();
                              if (json['success']) {
                                       timer();
                                       $("#input-registration-otp").val('');
                                       $(".otp-field").show();                                       
                                       $('#otpMessage').text(json['success']).css('color', '#3c763d');
                                       $('#input-register-passShowHide').delay(15000).show(0);
                                       $('#input-register-counter').delay(15000).hide(0);
                               } else if (json['error']) {
                                       for (i in json['error']) {
                                               var element = $('#input-registration-' + i.replace('_', '-'));
                                                if(i === "otp") {
                                                    $('#otpMessage').text(json['error'][i]).css('color', '#a94442');
                                                } else {                                                
                                                    $(element).after('<div style="color:#a94442;font-size:12px;" class="text-danger-telephone">' + json['error'][i] + '</div>');
                                                }
                                               $(element).css('border', '1px solid #f00').css('background', '#FFE3E3');
                                       }
                               }
                       }
               });
}
if(typeof send_otp_section != 'undefined' && (varification_type === 'both' || varification_type === 'email')) {
$(document).on('click', '#button-resend-email', function() {
        sendEmail('resent');
});  
}
function emailtimer() {
        $('#input-register-emailpassShowHide').delay(0).hide(0);
        $('#input-register-email-counter').delay(0).show(0);
        let timeleft = 15;
        document.getElementById("emailtimer").innerHTML = '00:15';
        let downloademailtimerTimer = setInterval(function(){  
                --timeleft;
                if(timeleft > 9) {
                        document.getElementById("emailtimer").innerHTML ='00:'+timeleft; 
                } else {
                        document.getElementById("emailtimer").innerHTML ='00:0'+timeleft; 
                }   
                if(timeleft <= 1){
                        clearInterval(downloademailtimerTimer);
                }
        }, 1000)
}

function sendEmail(type) {         
        var email = $("#input-registration-email").val();
               $.ajax({
                       url: 'index.php?route=account/login/registerSendEmail',
                       type: 'post',
                       data: { 'email': email,'type':type},
                       headers: {"Authorization": $token },
                       dataType: 'json',
                       cache: false,
                       success: function(json) {
                              $(".text-danger-email").remove();
                              if (json['success']) {
                                       emailtimer();
                                       $("#input-registration-email-otp").val('');
                                       $(".email-otp-field").show();                                       
                                       $('#emailotpMessage').text(json['success']).css('color', '#3c763d');
                                       $('#input-register-emailpassShowHide').delay(15000).show(0);
                                       $('#input-register-email-counter').delay(15000).hide(0);
                               } else if (json['error']) {
                                       for (i in json['error']) {
                                               var element = $('#input-registration-' + i);
                                               if(i === 'email-otp') {
                                                   $("#emailotpMessage").text('');
                                               }
                                            $(element).after('<div style="color:#a94442;font-size:12px;" class="text-danger-email"><p>' + json['error'][i] + '</p></div>');
                                            $(element).css('border', '1px solid #f00').css('background', '#FFE3E3');
                                            setTimeout(function () {
                                                 $(".text-danger").remove();
                                            }, 1000); 
                                       }
                               }
                       }
               });
}

$(document).on('click', '#button-change-email', function() {
        $( "#input-registration-email" ).focus();
        $( "#input-registration-email" ).val('');
        $('.emailSuccessMessage').hide();
        $('#input-registration-email').prop('readonly',false)
        $(".btn-den").prop("disabled", true);
        $(".btn-den").prop("type", 'button');
});
});


