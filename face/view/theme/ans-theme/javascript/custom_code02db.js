$(document).ready(function(){if($(window).width()>767){$("div.box-filter > div.list-group > a").on("click",function(){$(this).next().slideToggle(),$(this).toggleClass("active");});$(".box-with-categories .box-heading").on("click",function(){$(".box-with-categories .categorie-container").slideToggle(),$(this).toggleClass("active");});}
$(".bestseller-image").show();});function isNumber(evt){evt=(evt)?evt:window.event;var charCode=(evt.which)?evt.which:evt.keyCode;if(charCode>31&&(charCode<48||charCode>57)){return false;}
return true;}
if($(window).width()<992){$(document).delegate(".responsive .mega-menu-modules .horizontal .megamenu-wrapper","click",function(){$(".responsive body .mega-menu-modules .horizontal .megamenu-wrapper").animate({left:'-103%'});$("#mobile-menu-icon").removeClass("active");});$(document).delegate(".responsive .mega-menu-modules .horizontal .megamenu-wrapper .megamenu-pattern","click",function(e){e.stopPropagation();});}
$(document).ready(function(){$("#submit-dfycontact").click(function(event){var error=false;var email=$('#email').val();var name=$('#name').val();var message=$('#message').val();var regex_email=/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;if(email==""){$('#email').next("span").css("color","red");$('#email').next("span").html("This field is required");error=true;}else if(!regex_email.test($('#email').val())){$('#email').next("span").css("color","red");$('#email').next("span").html("Please enter a valid email");error=true;}else{$('#email').next("span").html("");}
if(message==""){$('#message').next("span").css("color","red");$('#message').next("span").html("This field is required");error=true;}else if(($('#message').val().length<'10')){$('#message').next("span").css("color","red");$('#message').next("span").html("Comment must be greater than 10 characters!");error=true;}else{$('#message').next("span").html("");}
if(name==""){$('#name').next("span").css("color","red");$('#name').next("span").html("This field is required");error=true;}else if((($('#name').val().length<'3')||($('#name').val().length>'32'))){$('#name').next("span").css("color","red");$('#name').next("span").html("Name must be between 3 and 32 characters!");error=true;}else{$('#name').next("span").html("");}
if(!error){$.ajax({type:"POST",url:"index.php?route=information/contact/formDfyContactUs",data:{'email':email,'name':name,'message':message},dataType:'html',beforeSend:function(){$("#submit-dfycontact").html('Sending...');},success:function(data){if(data){$(".form").prepend("<div id='successMessage' class='col-sm-12'><div class='alert alert-success'>"+data+"</div></div>");setTimeout(function(){$('#successMessage').fadeOut('slow');},8000);$('html, body').animate({scrollTop:0},'1000');$('input[type="text"],input[type="email"],textarea').val('');$("#submit-dfycontact").html('SUBMIT');}}});}});});function thumbSlider(){$(".category-product-images").mouseenter(function(){$(this).owlCarousel({paginationSpeed:200,singleItem:true,autoPlay:1500,pagination:true});var owl=$(this).data('owlCarousel');owl.play();$(this).find(".owl-controls").show();$(this).find(".item").css("display","block");});$(".category-product-images").mouseleave(function(){var owl=$(this).data('owlCarousel');$(this).find(".owl-controls").hide();owl.stop();owl.jumpTo(0);});}
function init_images(){setTimeout(function(){var vidDefer=document.getElementsByClassName('lload');for(var i=0;i<vidDefer.length;i++){if(vidDefer[i].getAttribute('data-src')){vidDefer[i].setAttribute('src',vidDefer[i].getAttribute('data-src'));}}},1000);}
$(document).ready(function(){init_images();});
// quantity decrease increase //
function increaseValue() {
    var value = parseInt(document.getElementById('input-quantity').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('input-quantity').value = value;
}
 
function decreaseValue() {
    var value = parseInt(document.getElementById('input-quantity').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    value = (value <= 0) ? 1 : value;
    document.getElementById('input-quantity').value = value;
}
$(document).ready(function(){
    $(".sort-btn").on("click", function(){
       $(".sort-filter-popup").addClass("filter-show");
    });
    $(".sort-filter-popup").on("click", function(){
       $(".sort-filter-popup").removeClass("filter-show");
    });
});

// fynd cancellation code
function cancelOrderItemFynd(data,payment_code,type) {
        var url = '/index.php?route=account/order/cancel&data=' + data;
        $.ajax({ 
            method: "POST",
            url: '/index.php?route=account/order/gofyndInitiateCancel',
            dataType: 'html',
            data: {
                data: data,
                payment_code: payment_code,
                type:type
            },
            success: function (html) {
                $('#modal-box').html(html);
            }
        }); 
} 