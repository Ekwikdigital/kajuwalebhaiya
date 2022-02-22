
var ajaxUrl = $("#action").val();
var action = $("#action").val();
var ajaxFilter = '';
var page_type = $("#page_type").val();
var fromFilter = false;
var group_feature = $("#group_feature").val();

var total_records = $("#total_products").val();
var total_pages = $("#total_pages").val();
var device_type = $("#device_type").val();
var current_page = $("#splug_page").val();
var isAjaxRunning = false;
var layout_type = $("#layout_type").val();
var selectedSort = $("#selected_sort").val();
var store_code = $("#store_code").val();
var scroll_button = $("#scroll_button").val();
var auto_up_scroll =  $("#auto_up_scroll").length ? $("#auto_up_scroll").val() : 0;
var filter_bubbles = parseInt($("#filter_bubbles").val());
var lightColours = ['white','yellow','beige','multicolor','silver','multi-colour','multi-color','multicolour'];
var scrollDirVal = document.getElementById('content').getBoundingClientRect().top;
var pagesOnDocument = [parseInt($("#splug_page").val())];


function init_images() {
    var vidDefer = document.getElementsByClassName('lload');
    for (var i=0; i<vidDefer.length; i++) {
        if(vidDefer[i].getAttribute('data-src')) {
            vidDefer[i].setAttribute('src',vidDefer[i].getAttribute('data-src'));
        } 
    } 
}

function removeToolTips(){
    if($(".tooltip").length){
            $(".tooltip").remove();
    }
}

function linkButtonClicks(){
    if($('#custom-clear-filter').length){
            $('#custom-clear-filter').attr('href',$('#clear_filter_href').val());
    };
    $(".apply-filter .cancel-filter").on("click", function(){
        $(".apply-filter").hide();
        $(".mobile-category .panel.panel-default.box-filter").hide();
        $(".filter-menu-icon").show();
        $("#column-left").hide();
        $('body').removeClass('ovflow-stop');
    });
}

function toggle_desc() {
    if($('.desc-more').html() == 'more'){
        $('.desc-more').html('less');
        $('.category-description > *').show();
    } else {
        $('.desc-more').html('more');
        $('.category-description > *').hide();
        $('.category-description > *:nth-child(-n + 2)').show();
    }
}

function toggleColourBoxTick (element, type){
    if(type == undefined){
        type = '';
    }
    if($(element).parent().has("i").length){
        $(element).parent().find("i").remove();
    } else {
        if(type == 'lable'){
            var colour = lightColours.indexOf($(element).parent().find('input').val().toLowerCase()) >= 0  ? 'black' : 'white';
            $(element).parent().find('label').prepend('<i class="fa fa-check-circle" style="color:'+ colour + ';"aria-hidden="true"></i>');
        } else {
            var colour = lightColours.indexOf($(element).val().toLowerCase()) >= 0  ? 'black' : 'white';
            $(element).parent().prepend('<i class="fa fa-check-circle" style="color:'+ colour + ';"aria-hidden="true"></i>');
        }
    }                
}

$(document).ready(function(){
    if(total_records == 0){
        if($('#splug_error').length) {
            $('#ajax-product-list').html('<div class="no-search-result"><h1>' + $('#splug_error').val() + '</h1></div>');
        } else {
	    $('#ajax-product-list').html('<div class="no-search-result"><h1> Sorry!! Could not find any match!!</h1></div>');
        }
    }
    init_images();
    productList(layout_type);
    //Removing class to enable product grid change - if its fixed for DB pages
    $("body").removeClass('product-search');
    $("body").addClass('product-category');
    
    //Since only first 2 elements will be shown from Category description on initial page load
    if($('.category-description > *').length > 2) {
        $('.category-description').append('<a class="desc-more" onclick="toggle_desc();">more</a>');
    }    
    if([2,4].indexOf(filter_bubbles) >= 0 || ([1,3].indexOf(filter_bubbles) >= 0 && (device_type == 'desktop'))) {
        filterTags();
        linkRemoveFilterTags();
    }

    if (history.scrollRestoration) {
        history.scrollRestoration = 'manual';
    }
    
});
function stickySidebar() { //for making sidebar sticky on IE browser
    var sidebar = document.getElementsByClassName("sticky_filter")[0]; // check if sticky is enabled from admin 
    if($(window).width() > 992 && document.documentMode && sidebar){
           var stickyDiv = sidebar.getBoundingClientRect().top;
           var contentDiv = document.getElementById('content');
        if ((contentDiv.getBoundingClientRect().bottom < sidebar.offsetHeight) || (contentDiv.getBoundingClientRect().top > 0)) {
            $("#column-left").removeClass("searchplug-sticky");
            contentDiv.style.float = "left";
          }
          else if (window.pageYOffset > stickyDiv) {
            $("#column-left").addClass("searchplug-sticky");
            contentDiv.style.float = "right";
          }
    }
  }

function mobileFilters(s){
    if($(window).width() < 768 || (store_code == "preethi" && $(window).width() < 769)){
        $(".filter-sec .list-group-item.filter-name:eq(0)").addClass("active");
    } else if($('#filter_open_status').length && ($('#filter_open_status').val() == 0)){
        $(".filter-sec .list-group-item.filter-name").addClass("active");
    }
    $(document).on('click', '#button-filter', function() {
        $('body').removeClass('ovflow-stop');
        fromFilter = true;
        $(".apply-filter").hide();
        $("#column-left").hide();
        var filterSet = [];
        var filter = '';
        var cnt = 1;
        var filter_separator_level_1 = '~';
        var filter_separator_level_2 = ':';
        $('.box-filter input[type=\'checkbox\']:checked').each(function(element) {
            var filter_group = $(this).closest("[filter-group]").attr("filter-group");
            if ((filter_group in filterSet)) {
                filterSet[filter_group] += ',' + encodeURIComponent(this.value);
            } else {
                filterSet[filter_group] = encodeURIComponent(this.value);
            }
        });
        cf = $('#last_selected_filter_group').val();
        var filterLength = Object.keys(filterSet).length;
        for (key in filterSet) {
            if (filterLength <= cnt) {
                filter_separator_level_1 = '';
            }
            filter += encodeURIComponent(key) + filter_separator_level_2 + filterSet[key] + filter_separator_level_1;
            cnt++;
        }
        ajaxFilter = filter;
        if (filter) {
            if(page_type =='category'){
		ajaxUrl = action + '?filter=' + filter + '&cf=' + encodeURIComponent(cf);
            }else{
                ajaxUrl = action + '&filter=' + filter + '&cf=' + encodeURIComponent(cf);
            }       
        }else{
            ajaxUrl = action;
        }
	$(".filter-menu-icon").show();
	$(".apply-filter").hide();

	$("a.list-group-item.filter-name.active").next().show()

	if(filterLength == 0) {
	    $(".box-no-advanced.box-with-categories .box-heading").addClass("active");
	    $(".box-content.box-category").show();
	}

	$(".filter-menu-icon .filter-btn").on("click", function(){
		$(".filter-menu-icon").hide();
        if (store_code === 'preethi') {
            $("#button-filter").text("Apply")
        }
        else {
            $("#button-filter").text("Apply filter")
        }
		$("#button-filter").show();
		$("#column-left").show();
                $('body').addClass('ovflow-stop');
		$(".product-category .filter-sec .list-group-item.filter-name:eq(0)").addClass("active");
		$("a.list-group-item.filter-name.active").next().show()

		$("a.list-group-item.filter-name").on("click", function(){
		    $("a.list-group-item.filter-name").next(".list-group-item.filter-box-container").hide();
		    $("a.list-group-item.filter-name").removeClass("active");
		    $(".box-no-advanced.box-with-categories .box-heading").removeClass("active");
		    $(".box-content.box-category").hide();
		    $(this).addClass("active");
		    $(this).next().toggle();
		});

		$(".box-no-advanced.box-with-categories .box-heading").on("click", function(){
		    $(this).addClass("active");
		    $("a.list-group-item.filter-name").removeClass("active");
		    $(".box-content.box-category").show();
		    $(".list-group-item.filter-box-container").hide();
		});
	});
        if(s!=1){
            getProducts();
        }
    });

}

function sanitizeUrl(ajaxUrl){
    ajaxUrl = ajaxUrl.replace(/\&?(is_ajax)\=[\d]+/g, '');
    ajaxUrl = ajaxUrl.replace(/\&?(page)\=[\d]+/g, '');
    ajaxUrl=ajaxUrl.replace(/\?(sort)\=[a-z_]+/g, '');
    ajaxUrl=ajaxUrl.replace(/\&(sort)\=[a-z_]+/g, '');
    ajaxUrl=ajaxUrl.replace(/\?(order)\=[a-z]+/g, '');
    ajaxUrl=ajaxUrl.replace(/\&(order)\=[a-z]+/g, '');
    return ajaxUrl;
}

function getProducts(scrollDir = 'down'){
    ajaxUrl = sanitizeUrl(ajaxUrl);

    if(scrollDir == 'up'){
        current_page = Math.min(...pagesOnDocument) - 1;
    } else {
        current_page = Math.max(...pagesOnDocument) + 1;
    }
    
    if(fromFilter){
        current_page = 1;
        pagesOnDocument = [1];
        scrollTop = 0;
//        document.documentElement.scrollTop = 0;
        $(window).scrollTop(0);
        if($('.scroll-up-div').length){$('.scroll-up-div').hide();};
    }

    if(selectedSort){
        var sort = selectedSort.split(':');
	ajaxUrl +='&sort='+sort[0]+'&order='+sort[1];
    }
    
    ajaxUrl += '&page=' + (current_page);
    var url = ajaxUrl;
    ajaxUrl += '&is_ajax=1';

    if((!isAjaxRunning && (current_page > 0) && (parseInt(current_page)<=parseInt(total_pages))) || fromFilter){
        $.ajax({
            url: ajaxUrl,
            type: 'get',
            beforeSend: function() {
                isAjaxRunning = true;
                if(scrollDir == 'up'){
                    $('#category-loader-up').show();
                    if($('#scroll-button-up').length){$('#scroll-button-up').text('Loading...')};
                } else {
                    $('#category-loader').show();
                }
            },
            complete: function() {
                $('#category-loader').hide();
                $('#category-loader-up').hide();
                if($('#scroll-button-up').length){$('#scroll-button-up').text('Load Previous Pages')};
                isAjaxRunning = false;
                fromFilter = false;
            },
            success: function(data) {
                window.history.pushState(null, null, url);
                var d = JSON.parse(data);
                total_pages = d[3];
		
		if(d[2] != 0){
			if(fromFilter){
			    $('#ajax-product-list').html('');
			    $('#ajax-product-list').html(d[0]);
			}else{
			    if((current_page<=total_pages) && (current_page > 0)){
                                    pagesOnDocument.push(current_page);
                                    var contentHeight = document.getElementById('content').offsetHeight;
                                    if(scrollDir == 'up'){
                                        $('#ajax-product-list').prepend(d[0]);
                                        var contentNewHeight = document.getElementById('content').offsetHeight;
                                        var diff = contentNewHeight - contentHeight;
                                        document.documentElement.scrollTop = document.documentElement.scrollTop + diff;
                                        if(current_page == 1){ $('.scroll-up-div').hide();}
                                    } else {
                                        $('#ajax-product-list').append(d[0]);
                                        document.documentElement.scrollTop = document.documentElement.scrollTop - 50;
                                    }
                                }
			    }
		} else {
                        if((7 in d) && (d[7] != '')){
                            $('#ajax-product-list').html('<div class="no-search-result"><h1> ' + d[7] + '</h1></div>');
                        } else {
                            $('#ajax-product-list').html('<div class="no-search-result"><h1> Sorry!! Could not find any match for selected filters!!</h1></div>');
                        }
                }

		$('#column-left').remove();
                $('#splug-content').prepend(d[1]);
                $(".flcross, .bg-black, .pronumber").hide();
                $("body").removeClass("no-scroll-sunglass");
                if($('.category-total-item')){
                    if (store_code === 'sunglass') {
                        $('.category-total-item').html('Results for your search');
                    } else {
                        $('.category-total-item').html(d[2] + ' items');
                    }
                }
                if($('.ajax-sort')){
                    $('.ajax-sort').html(d[4]);
                }
                // changing href of mobile sort-by section on ajax call 
                $.each(d[6], function(key, value){
                    $("#"+ value['value'].replace(':','_')).val(value['href']);
                });
                if([2,4].indexOf(filter_bubbles) >= 0 || ([1,3].indexOf(filter_bubbles) >= 0 && (device_type == 'desktop'))) {
                    filterTags();
                    linkRemoveFilterTags();
                }
                linkButtonClicks();
                removeToolTips();
                selectedSort = d[5];
                init_images();
                init_filter();
                reinit_filters();
                productList(layout_type);
                mobileFilters(1);
                if ($(window).width() < 769 && store_code == "preethi") {
                    $(".filter-menu-icon").show();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
}

function reinit_filters(stage){
    if(stage == undefined){
        stage = '';
    }
    if ((($(window).width() > 767) ||(store_code == "preethi" && $(window).width() < 769)) && store_code != 'sunglass') {
        $('input[name="filter[]"]').bind('click', function() {
            fromFilter = true;
            var current_filter_group = $(this).closest("[filter-group]").attr("filter-group");
            initAjaxCall(current_filter_group);
        });
        if($(".inline-filter").length && stage != 'initial'){
            $(".inline-filter").on('click', function () {
                $(this).find(".filter-box-container").slideToggle('slow');
                $(this).siblings('.inline-filter').find(".filter-box-container").slideUp();
                $(window).on('scroll', function () {
                    $(".filter-box-container").slideUp('slow');
                });
            });
        }
    }else{
        $('input[name="filter[]"]').bind('click', function() {
		if($(this).closest("[filter-group]").attr("filter-group")!=''){
		    $('#last_selected_filter_group').val($(this).closest("[filter-group]").attr("filter-group"));
        }
                if($(this).parent().parent().hasClass('color-item')){
                    toggleColourBoxTick(this);
                }
        });
        if($('.colour-filter-name').length){
            $('.colour-filter-name').bind('click', function() {
                toggleColourBoxTick(this, 'lable');
            });
        }
    }
    if(parseInt(current_page - 1)>=parseInt(total_pages)){
        $('#scroll-button').hide();
    }
}

function initAjaxCall(current_filter_group, scrollDir = 'down'){
    //fromFilter = false;
    var filterSet = [];
    var filter = '';
    var cnt = 1;
    var filter_separator_level_1 = '~';
    var filter_separator_level_2 = ':';
    var cf = ''
    $('.box-filter input[type=\'checkbox\']:checked').each(function(element) {
        var filter_group = $(this).closest("[filter-group]").attr("filter-group");
        if ((filter_group in filterSet)) {
            filterSet[filter_group] += ',' + encodeURIComponent(this.value);
        } else {
            filterSet[filter_group] = encodeURIComponent(this.value);
        }
    });
    cf = current_filter_group;
    var filterLength = Object.keys(filterSet).length;
    for (key in filterSet) {
        if (filterLength <= cnt) {
            filter_separator_level_1 = '';
        }
        filter += encodeURIComponent(key) + filter_separator_level_2 + filterSet[key] + filter_separator_level_1;
        cnt++;
    }
    ajaxFilter = filter;
    if (filter) {
        if(page_type =="category"){
            ajaxUrl = action + '?filter=' + filter + '&cf=' + encodeURIComponent(cf);
        }else{
            ajaxUrl = action + '&filter=' + filter + '&cf=' + encodeURIComponent(cf);
        }
    }else{   
        ajaxUrl = action;  
    }
    removeToolTips();
    getProducts(scrollDir);
}

function init_filter(){
    $(document).ready(function(){
        $("div.box-filter > div.list-group > a").on("click", function () {
            $(this).next().toggle(), $(this).toggleClass("active");
        });
        $(".box-with-categories .box-heading").on("click", function () {
            $(".box-with-categories .categorie-container").slideToggle(), $(this).toggleClass("active");
        });
    });
}
function productList(pl){
    pl = parseInt(pl);
    layout_type = pl;
    if(device_type=='mobile'){
         if(pl===1){
            $( "div .product-grid").removeClass( "col-xs-6" ).addClass( "col-xs-12" );
            $("#product-grid-3").removeClass("in-active").addClass( "active" );
            $("#product-grid-4").removeClass("active").addClass( "in-active" );
        }else if(pl===2){
            $( "div .product-grid").removeClass( "col-xs-12" ).addClass( "col-xs-6" );
            $("#product-grid-4").removeClass("in-active").addClass( "active" );
            $("#product-grid-3").removeClass("active").addClass( "in-active" );
        }
    }else{
        if(pl===3){
            $( "div .product-grid").removeClass( "col-lg-3" ).addClass( "col-lg-4" );
            $("#product-grid-3").removeClass("in-active").addClass( "active" );
            $("#product-grid-4").removeClass("active").addClass( "in-active" );
        }else if(pl===4){
            $( "div .product-grid").removeClass( "col-lg-4" ).addClass( "col-lg-3" );
            $("#product-grid-4").removeClass("in-active").addClass( "active" );
            $("#product-grid-3").removeClass("active").addClass( "in-active" );
        }
    }
    ls = window.location.search.replace(/\&?(plist)\=[\d]+/g, '');

    ls = ls === '' ? '?' : (ls === '?' ? ls : ls + '&');
    ls += 'plist=' + pl ;
    loc = window.location.protocol + '//' + window.location.hostname + window.location.pathname + ls + window.location.hash;
    window.history.replaceState(null, null, loc);
}


    
document.addEventListener("DOMContentLoaded", function(event) {
    cf = $('#last_selected_filter_group').val();
    var scrollTop = $(window).scrollTop();
    if(parseInt(current_page)>=parseInt(total_pages)){
        $('#scroll-button').hide();
    }
    // ===== go to Top ==== 
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 50) {
            $('#return-to-top').fadeIn(200);
        } else {
            $('#return-to-top').fadeOut(200);
        }
        stickySidebar();//  for making sidebar sticky on IE browser
    });
    $('#return-to-top').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
    });
    // ===== go to Top ====

    $(window).scroll(function(){
        scrollTop = $(window).scrollTop();
        if(document.getElementById('content').getBoundingClientRect().top < scrollDirVal){
            //Down Scroll Code
            if(parseInt(current_page)>=parseInt(total_pages)){
                $('#scroll-button').hide();
            }
            if($('.footer').height() > 200){
                var bottonMargin = $('.footer').height() - 100;
            } else {
                var bottonMargin = 100;
            }
            if($('body > div.custom-footer').length){
                bottonMargin = bottonMargin + $('body > div.custom-footer').height();
            }
            if($('.splug-category-description.bottom').length){
                bottonMargin = bottonMargin + $('.splug-category-description.bottom').height();
            }
            if($('#column-left').height() > $('#content').height()){
                bottonMargin = bottonMargin + ($('#column-left').height() - $('#content').height());
            }
            if (store_code === 'furnmill') {
                if(!fromFilter){
                    if(parseInt(scroll_button) === 1) {
                        $("#scroll-button").on("click", function () {
                            initAjaxCall($('#last_selected_filter_group').val());
                        });
                    } else {
                        initAjaxCall($('#last_selected_filter_group').val());
                    }
                }
            } else { 
                if(scrollTop>=($(document).height()-((window.innerHeight + bottonMargin)))){
                    if(!fromFilter){
                        if(parseInt(scroll_button) === 1) {
                            $("#scroll-button").on("click", function () {
                                initAjaxCall($('#last_selected_filter_group').val());
                            });
                        } else {
                            initAjaxCall($('#last_selected_filter_group').val());
                        }
                    }
                }
            }
        } else {
            //UP Scroll Code
            var intiateUpScroll = (scrollTop + (document.getElementById('ajax-product-list').getBoundingClientRect()).top) * 0.80;
//            var stopUpScroll = (scrollTop + (document.getElementById('ajax-product-list').getBoundingClientRect()).top) * 0.60;
            if ((scrollTop < intiateUpScroll)){ // && (scrollTop > stopUpScroll)) {
                if((Math.min(...pagesOnDocument) !== 1) && (parseInt(auto_up_scroll) !== 1)){
                    $('.scroll-up-div').show();
                } else {
                    $('.scroll-up-div').hide();
                }
                if(parseInt(auto_up_scroll) === 1) {
                    if(Math.min(...pagesOnDocument) !== 1){
                        initAjaxCall($('#last_selected_filter_group').val(), 'up');
                    }
                } else {
                    $("#scroll-button-up").on("click", function () {
                        initAjaxCall($('#last_selected_filter_group').val(), 'up');
                    });
                }
            }
        }
        
        scrollDirVal = document.getElementById('content').getBoundingClientRect().top;
    })

    // mobile filter //

    $("span.s-filter-toggle").on("click", function(){
        $('#button-filter').show();
        $(".mobile-category .panel.panel-default.box-filter").toggle();
        $(".filter-menu-icon").hide();
        if (store_code === 'preethi') {
            $("#button-filter").text("Apply")
        }
        else {
            $("#button-filter").text("Apply filter")
        }
        $(".apply-filter").show();
        $(".sort-filter-popup").hide();
    });


    // mobile filter //
    fromFilter='';
    mobileFilters(0);
    reinit_filters('initial');
    removeToolTips();
    //defaultFilters();
});

function defaultFilters(){
    var cf = $("#cf").val();
    var filter = '';
    fromFilter = true;
    var current_filter_group = cf;

    var filterSet = [];
    var cnt = 1;
    var filter_separator_level_1 = '~';
    var filter_separator_level_2 = ':';

    $('.box-filter input[type=\'checkbox\']:checked').each(function(element) {
        var filter_group = $(this).closest("[filter-group]").attr("filter-group");
        if ((filter_group in filterSet)) {
            filterSet[filter_group] += ',' + encodeURIComponent(this.value);
        } else {
            filterSet[filter_group] = encodeURIComponent(this.value);
        }
    });
    cf = current_filter_group;
    var filterLength = Object.keys(filterSet).length;
    for (key in filterSet) {
        if (filterLength <= cnt) {
            filter_separator_level_1 = '';
        }
        filter += encodeURIComponent(key) + filter_separator_level_2 + filterSet[key] + filter_separator_level_1;
        cnt++;
    }
    ajaxFilter = filter;
    if (filter) {
        if(page_type =="category"){
            ajaxUrl = action + '?filter=' + filter + '&cf=' + encodeURIComponent(cf);
        }else{
            ajaxUrl = action + '&filter=' + filter + '&cf=' + encodeURIComponent(cf);
        }
    }else{   
        ajaxUrl = action;  
    }
    getProducts();
}
function filterTags(){
	if($(".fltr")){
	    $(".fltr").remove();
	}
	$('.box-filter input[type=\'checkbox\']:checked').each(function() {
            var val = this.value;
            if($(this).next().hasClass('fa-inr')){
                val = "<i class='fa fa-inr rs-sym ir-symble'></i> " + val;
            }
            if([1,2].indexOf(filter_bubbles) >= 0 || ([4].indexOf(filter_bubbles) >= 0 && (device_type != 'desktop'))) { // replaced includes with indexOf due to IE compatibility 
                    $('#ajax-product-list').before("<div class='fltr' >" + val + "<span class='remove-filter' id='" + this.value.replace(/[^A-Za-z0-9]/gi, '') + "'> × </span></div>");
            } else if([3,4].indexOf(filter_bubbles) >= 0 && (device_type == 'desktop')){
                    $('.custom-clearfilter').after("<div class='fltr left' >" + val + "<span class='remove-filter' id='" + this.value.replace(/[^A-Za-z0-9]/gi, '') + "'> × </span></div>");
            }  
	})
}

function linkRemoveFilterTags(){
    if($(".remove-filter").length){
            $(".remove-filter").click(function() {
                    var remFilter = $(this).attr('id');
                    $('.box-filter input[type=\'checkbox\']:checked').each(function() {
                            if(this.value.replace(/[^A-Za-z0-9]/gi, '') == remFilter){
                                    $(this).trigger('click');
                                    if ($(window).width() < 767) {
                                            $('#button-filter').trigger('click');
                                    }
                            }
                    });
            });
    }
}

//Functions related to Smart Filters
function sfFilterClick(element){
    $(window).scrollTop(0);
    var filterGroupName = $(element).closest("[filter-group]").attr("filter-group");
    var currencySymbol = $('#currency_symbol').length ? $('#currency_symbol').val() : '';
    var filterName = $(element).html().replace(currencySymbol, '');
    var targetFilterId = filterGroupName.replace(/[^A-Za-z0-9\s]/gi, '').replace(/[_\s]/g, '') + filterName.replace(/[^A-Za-z0-9\s]/gi, '').replace(/[_\s]/g, '');
    if($('#' + targetFilterId).length){
        $('#' + targetFilterId).prop('checked', true);
    }
    $('#last_selected_filter_group').val(filterGroupName.replaceAll(" ","_"));
    $('#button-filter').trigger('click');
}
function sfOtherFiltersClick(element){
    var filterGroupName = $(element).closest("[filter-group]").attr("filter-group");
    var targetFilterGroupClass = filterGroupName.replaceAll(" ","_") + '_filterBox';
    $('a.filter-name').removeClass('active');
    $('div.filter-box-container').css("display","none");
    $('div.' + targetFilterGroupClass).prev('a').addClass('active');
    $('div.' + targetFilterGroupClass).css("display","block");
    if($(".filterby").length){
        $(".filterby").trigger("click");
    } else {
        $(".filter-menu-icon .filter-btn").trigger("click");
    }
    
}
//Functions related to Smart Filters