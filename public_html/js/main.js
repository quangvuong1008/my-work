var swiper_top_index = new Swiper('.swiper-container-top-index', {
    slidesPerView: 4,
    spaceBetween: 30,
    slidesPerGroup: 1,

    loop: true,
    loopFillGroupWithBlank: true,
    // autoplay: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});
var swiper_top_index_mobile = new Swiper('.swiper-container-top-index-mobile', {
    slidesPerView: 1,
    spaceBetween: 30,
    slidesPerGroup: 1,

    loop: true,
    loopFillGroupWithBlank: true,
    autoplay: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});


var swiper_patner = new Swiper('.swiper-partner-container', {
    slidesPerView: 5,
    spaceBetween: 30,
    slidesPerGroup: 1,

    loop: true,
    loopFillGroupWithBlank: true,
    autoplay: true,
    pagination: {
        // el: '.swiper-pagination-product-discount',
        clickable: true,
    },
});

var swiper_patner_mobile = new Swiper('.swiper-partner-container-mobile', {
    slidesPerView: 2,
    spaceBetween: 30,
    slidesPerGroup: 1,

    loop: true,
    loopFillGroupWithBlank: true,
    autoplay: true,
    pagination: {
        // el: '.swiper-pagination-product-discount',
        clickable: true,
    },
});

var sw;
if (document.getElementsByClassName('swiper-main-container').length > 0 && Swiper) {
    sw = new Swiper('.swiper-main-container', {
        loop: true,
        autoplay: true,
        // pagination: {
        //     el: '.swiper-pagination',
        // },
        // navigation: {
        //     nextEl: '.swiper-button-next',
        //     prevEl: '.swiper-button-prev',
        // },
        scrollbar: {
            el: '.swiper-scrollbar',
        },
        // slidesPerView: 4
    });
}

/* plugin  */
$(function () {
    //ajax getAlldata candidates
    if ($('.main-colm-candidates').is(":visible")) {
        ajaxCandidateData();
    }
    //ajax getApply candidates
    if ($('#main-row-apply-profile').is(":visible")) {
        ajaxApplyProfileData();
    }

    //ajax getdata saved-profile
    if ($('#main-saved-profiled').is(":visible")) {
        ajaxSaveProfileData();
        $('#datetimepicker_from').datetimepicker({
            format: 'YYYY-MM-DD',
        });
        $('#datetimepicker_to').datetimepicker({
            format: 'YYYY-MM-DD',
        });
    }
    //ajax getdata viewed-profile
    if ($('#main-viewed-profiled').is(":visible")) {
        ajaxViewProfileData();
        $('#datetimepicker_viewed_from').datetimepicker({
            format: 'YYYY-MM-DD',
        });
        $('#datetimepicker_viewed_to').datetimepicker({
            format: 'YYYY-MM-DD',
        });
    }

    //ajax get-mess-receive candidates
    if ($('#message-receive-page').is(":visible")) {
        ajaxMessReceiveData(0);
    }

    //ajax get-sent candidates
    if ($('#message-sent-page').is(":visible")) {
        ajaxMessSentData();
    }

    //ajax get-seeker-mess-receive 
    if ($('#seeker_message_receive_page').is(":visible")) {
        ajaxMessSeekerReceiveData(0);
    }

    //ajax get-seeker-sent
    if ($('#seeker_message_sent_page').is(":visible")) {
        ajaxMessSeekerSentData();
    }

    $(".div_cate_vote").rateYo({
        rating: $(".div_cate_vote").data('rate-init'),
        fullStar: true,
        starWidth: "15px"
    }).on("rateyo.set", function (e, data) {
        rate_vote = data.rating;
        object_id = $(".div_cate_vote").data('object_id');
        _data = 'object_id=' + object_id + '&vote_rate=' + rate_vote;
        $.ajax({
            url: $(".div_cate_vote").data('url-post'),
            data: _data,
            type: 'POST',
            datatype: '',
            catch: false,
            success: function (data) {
                result = JSON.parse(data);
            }
        });
    });
});

(function ($) {
    $.fn.stickyNav = function (opt) {
        var o = this, w = $(window), options = $.extend(opt, {});
        var threshold = options.threshold || 120;
        var clsName = options.clsName || 'in';

        var _runner = function (pos) {
            if (pos > threshold) {
                o.addClass(clsName);
            } else {
                o.removeClass(clsName);
            }
        };

        _runner(w.scrollTop());

        w.scroll(function () {
            _runner(w.scrollTop());
        });

        return o;
    };
    var nav = $('.navbar').stickyNav({
        threshold: 66,
        clsName: 'slide-down'
    });

    $.fn.responsiveImage = function () {
        var o, img, src, _runner = function () {
            o = $(this);
            if ((img = $('img', o)) && (src = img.attr('src')) !== null) {
                o.css('background-image', 'url(\'' + src + '\')').css('background-size', 'cover');
            }
        };
        if (!this.hasClass('img-wrap')) {
            return $('.img-wrap', this).each(_runner);
        }
        return this.each(_runner);
    };

    $('.project-tab[data-toggle="tab"]:visible').on('shown.bs.tab', function (e) {
        var categoryId = $(e.target).data('index');
        $.get('/project/ajaxCategory/' + categoryId, function (res) {
            $('.tab-content').html(res).responsiveImage();
        });
    });

    var firstCat;
    if ((firstCat = $('.category-nav:visible > li.active:first-child > a')) && firstCat.length > 0) {
        $.get('/project/ajaxCategory/' + firstCat.data('index'), function (res) {
            $('.tab-content').html(res).responsiveImage();
        });
    }

    $('.category-top-tab[data-toggle="tab"]:visible').on('shown.bs.tab', function (e) {
        var categoryId = $(e.target).data('index');
        $.get('/category/ajaxCategoryTop/' + categoryId, function (res) {
            $('.tab-content').html(res).responsiveImage();
        });
    });

    var firstCatTop;
    if ((firstCatTop = $('.category-top-nav:visible > li.active:first-child > a')) && firstCatTop.length > 0) {
        $.get('/category/ajaxCategoryTop/' + firstCatTop.data('index'), function (res) {
            $('.tab-content').html(res).responsiveImage();
        });
    }

    $(".icheckbox_minimal-grey-candidates").click(function () {
        if ($(this).hasClass("checked")) {
            $(this).removeClass("checked");
        } else {
            $(this).addClass("checked");
        }
        var queryParams = new URLSearchParams(window.location.search);
        queryParams.set("page", 1);
        history.replaceState(null, null, "?" + queryParams.toString());
        ajaxCandidateData();
    });

    $(".icheckbox_minimal-grey-apply").click(function () {
        if ($(this).hasClass("checked")) {
            $(this).removeClass("checked");
        } else {
            $(this).addClass("checked");
        }
        var queryParams = new URLSearchParams(window.location.search);
        queryParams.set("page", 1);
        history.replaceState(null, null, "?" + queryParams.toString());
        ajaxApplyProfileData();
    });

    $("#checkbox_apply_all_rows").click(function () {
        if ($(this).hasClass("checked")) {
            $(this).removeClass("checked");
            $(this).prop("checked", false);
            $(".checkbox_rows_apply").each(function () {
                $(this).removeClass("checked");
                $(this).prop("checked", false);
            })

        } else {
            $(this).addClass("checked");
            $(this).prop("checked", true);
            $(".checkbox_rows_apply").each(function () {
                $(this).addClass("checked");
                $(this).prop("checked", true);
            })
        }
    });

    $(".select-andidates").change(function () {
        var queryParams = new URLSearchParams(window.location.search);
        queryParams.set("page", 1);
        history.replaceState(null, null, "?" + queryParams.toString());
        ajaxCandidateData();
    })

    $(".select-apply").change(function () {
        var queryParams = new URLSearchParams(window.location.search);
        queryParams.set("page", 1);
        history.replaceState(null, null, "?" + queryParams.toString());
        ajaxApplyProfileData();
    })

    $("#select-category").change(function () {
        var queryParams = new URLSearchParams(window.location.search);
        queryParams.set("page", 1);
        history.replaceState(null, null, "?" + queryParams.toString());
        ajaxSaveProfileData();
    })

    $("#search-title").keyup(function () {
        var queryParams = new URLSearchParams(window.location.search);
        queryParams.set("page", 1);
        history.replaceState(null, null, "?" + queryParams.toString());
        ajaxSaveProfileData();
    })

    $("#search-title-viewed").keyup(function () {
        var queryParams = new URLSearchParams(window.location.search);
        queryParams.set("page", 1);
        history.replaceState(null, null, "?" + queryParams.toString());
        ajaxViewProfileData();
    })

    $('.datetimepicker').blur(function () {
        var queryParams = new URLSearchParams(window.location.search);
        queryParams.set("page", 1);
        history.replaceState(null, null, "?" + queryParams.toString());
        ajaxSaveProfileData();
    })

    $('.datetimepicker-viewed').blur(function () {
        var queryParams = new URLSearchParams(window.location.search);
        queryParams.set("page", 1);
        history.replaceState(null, null, "?" + queryParams.toString());
        ajaxViewProfileData();
    })

    var getCartInfo = function () {
        let cart, badge = $('#cart-badge');
        $.get('/cart', (res) => {
            if (!res || !(cart = JSON.parse(res))) return;
            $('span', badge).text(cart.total);
        });
    };
    $(document).ready(getCartInfo);
    var o;
    $('.add-to-cart-btn:visible').each(function () {
        o = $(this);
        o.click(function () {
            $.post(o.attr('href'), o.data(), function (res) {
                if (res) {
                    $.toast({
                        heading: 'Giỏ hàng',
                        text: 'Thêm vào giỏ hàng thành công',
                        icon: 'success',
                        bgColor: 'green',
                        position: 'bottom-right'
                    });
                    getCartInfo();
                }
            });
            return false;
        });
    });

    $('.img-wrap:visible').responsiveImage();

    $('.e-carousel:visible').lightSlider({
        gallery: true,
        item: 1,
        loop: true,
        thumbItem: 4,
        slideMargin: 0,
        enableDrag: true,
        controls: true,
        currentPagerPosition: 'left',
        onSliderLoad: function (el) {
            $(el).removeClass('no-js');
            $('.lSPager.lSGallery > li > a', o).addClass('img-wrap').responsiveImage();
        }
    });

    $('.content-table:visible').each(function () {
        var o = $(this);
        $('a.btn-tb-content:visible', o).on('click', function (e) {
            e.preventDefault();
            o.toggleClass('closed');
        });
    });

    $('.gallery-wrap:visible').each(function () {
        var o = $(this);
        $('.singer-carousel:visible', o).lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            thumbItem: 4,
            slideMargin: 0,
            enableDrag: true,
            controls: true,
            currentPagerPosition: 'left',
            onSliderLoad: function (el) {
                $(el).removeClass('no-js');
                $('.lSPager.lSGallery > li > a', o).addClass('img-wrap').responsiveImage();
            }
        });
    });

    $('.video-modal').on('shown.bs.modal', function (e) {
        var modal = $(this), btn = $(e.relatedTarget), src = btn.data('src');
        $('.modal-content', modal).html('<div class="embed-responsive embed-responsive-4by3">' +
            '<iframe src="' + src + '" frameborder="0" ' +
            'allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" ' +
            'allowfullscreen class="embed-responsive-item"></iframe>' +
            '</div>');
    }).on('hidden.bs.modal', function (e) {
        $('.modal-content', $(this)).html('');
    });

    $('#contactConfirmModal').on('hidden.bs.modal', function () {
        console.log('hide contactConfirmModal and post');
        // do something…
        form = $("#contactFormAjax");
        //$("#contactFormAjax").ajaxSubmit({url: form.attr('action'), type: 'post'});
        $.post(form.attr('action'), $('#contactFormAjax').serialize());
        $('#contactFormAjax').trigger("reset");
        grecaptcha.reset();
    });

    $("#contactFormAjax").submit(function (event) {
        var response = grecaptcha.getResponse();

        if (response.length == 0) {
            return false;
        } else {
            $('#contactModal').modal('hide');
            //alert( "Handler for .submit() called." );
            $('#contactConfirmModal').modal();
        }

        //event.preventDefault();
        return false;
    });

    $('#filter-applicable').click(function () {
        if ($('#ex-open-applicable').is(":visible")) {
            $('#ex-open-applicable').hide();
        } else {
            $('#ex-open-applicable').show();
        }
    });

    $('input[name="checkAll"]').click(function () {
        console.log(this.checked);
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

})(jQuery);


$(function () {
    $('#start_date').datetimepicker({
        format: 'DD/MM/yyyy'
    });
    $('#seeker_birthday').datetimepicker({
        format: 'DD/MM/yyyy',
    });
});

// $('.selectpicker').selectpicker('refresh');

function delete_insert_fields(id) {
    let _data;
    _data = 'id=' + id;


    $.ajax({
        url: $(".btn_delete_fields").data('url-post'),
        data: _data,
        type: 'POST',
        datatype: '',
        catch: false,
        success: function (data) {
            result = JSON.parse(data);
            console.log();
        }
    });

    //remove ảnh đi
    $('.div_fields_upload_' + id).remove();

}

function delete_insert_province(id) {
    let _data;
    _data = 'id=' + id;


    $.ajax({
        url: $(".btn_delete_province").data('url-post'),
        data: _data,
        type: 'POST',
        datatype: '',
        catch: false,
        success: function (data) {
            result = JSON.parse(data);
            console.log();
        }
    });

    //remove ảnh đi
    $('.div_province_upload_' + id).remove();

}

function delete_insert_job(id) {
    let _data;
    _data = 'id=' + id;


    $.ajax({
        url: $(".btn_delete_job").data('url-post'),
        data: _data,
        type: 'POST',
        datatype: '',
        catch: false,
        success: function (data) {
            result = JSON.parse(data);
            console.log();
        }
    });

    //remove ảnh đi
    $('.div_job_upload_' + id).remove();

}

function price(id) {
    var base_url = window.location.origin;

    $.getJSON(base_url + '/Recruitment/select_price/' + id, function (data) {
        $('#list_price').html('');
        var result = data;
        var _html = '';
        for (var i = 0; i < result.length; i++) {
            if (result[i]['price_discount'] == 0) {
                _html +=
                    '<div class="jsx-1845280293 text-right total-price col-md-6">' +
                    '<span  class="jsx-1845280293 color-red-e11f28 font-weight-bold">'
                    + new Intl.NumberFormat('de-DE').format(result[i]['price_origin']) + '</span>'
                    + '</div>'
            } else {
                _html +=
                    '<div class="jsx-1845280293 text-right total-price col-md-6">' +
                    '<span  class="jsx-1845280293 color-red-e11f28 font-weight-bold">'
                    + new Intl.NumberFormat('de-DE').format(result[i]['price_discount']) +

                    '</span>' +
                    '<br class="jsx-1845280293">' +
                    '<del class="pdComparePrice jsx-1845280293 del price-old position-relative">'
                    + new Intl.NumberFormat('de-DE').format(result[i]['price_origin']) +
                    '</del>'
                    + '</div>'
            }
        }
        $('#list_price').html(_html);
    })
    $('.btn_glr_price').first().click();

}

function build_query() {
    var url = new URL(window.location);
    var search_params = url.searchParams;

    wage_value = $('select.filter_wage ').val();
    if (wage_value) {
        search_params.set('wage', wage_value);
    } else {
        search_params.delete('wage');

    }

    province_ids = Array();
    $('.filter_province[type="checkbox"]:checked').each(function () {
        var sThisVal = (this.checked ? $(this).data('province_id') : "");
        // console.log('value:' + sThisVal );
        province_ids.push(sThisVal);
    });

    if (province_ids.length) {
        str_provinces = province_ids.join(',');
        search_params.set('province_ids', str_provinces);
    } else {
        search_params.delete('province_ids');

    }

    job_ids = Array();
    $('.filter_job[type="checkbox"]:checked').each(function () {
        var sThisVal = (this.checked ? $(this).data('job_id') : "");
        // console.log('value:' + sThisVal );
        job_ids.push(sThisVal);
    });

    if (job_ids.length) {
        str_job = job_ids.join(',');
        search_params.set('job_ids', str_job);
    } else {
        search_params.delete('job_ids');
    }

    level_ids = Array();
    $('.filter_level[type="checkbox"]:checked').each(function () {
        var sThisVal = (this.checked ? $(this).data('level_id') : "");
        // console.log('value:' + sThisVal );
        level_ids.push(sThisVal);
    });

    if (level_ids.length) {
        str_level = level_ids.join(',');
        search_params.set('level_ids', str_level);
    } else {
        search_params.delete('level_ids');
    }

    type_of_work_ids = Array();
    $('.filter_type_of_work[type="checkbox"]:checked').each(function () {
        var sThisVal = (this.checked ? $(this).data('type_of_work_id') : "");
        // console.log('value:' + sThisVal );
        type_of_work_ids.push(sThisVal);
    });

    if (type_of_work_ids.length) {
        str_type_of_work = type_of_work_ids.join(',');
        search_params.set('type_of_work_ids', str_type_of_work);
    } else {
        search_params.delete('type_of_work_ids');
    }
    // dua cac tham so loc vao day


    // change the search property of the main url
    url.search = search_params.toString();

    // the new url string
    var new_url = url.toString();

    // output : http://demourl.com/path?id=101&topic=main
    console.log(new_url);
    window.location = new_url;
}

function save_news_recruitment(news_recruitment_id, user_type) {
    if (!user_type) {
        var url = window.location.origin + '/dang-nhap';
        location.replace(url);
    } else {
        $.post('/userseeker/save_news_recruitment/' + news_recruitment_id, {
        }, function (res) {
            if (res) {
                alert('Đã lưu tin tuyển dụng');
            }
        });
    }
}

function get_fillter(className) {
    var filter = [];
    $('.' + className).each(function () {
        if ($(this).hasClass("checked")) {
            filter.push($(this).find('input').attr("name"));
        }
    })
    return filter;
}

function get_fillter_self(className) {
    var filter = [];
    $('.' + className).each(function () {
        if ($(this).hasClass("checked")) {
            filter.push($(this).attr("name"));
        }
    })
    return filter;
}

function get_select(id) {
    select = []
    $('#' + id).find("option").each(function () {
        select.push($(this).val());
    })
    select.splice(0, 1);
    return select;
}

function movePageCandidate(page) {
    //get search and set search gfor url
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.set("page", page);
    history.replaceState(null, null, "?" + queryParams.toString());

    //ajax
    var province_ids = get_fillter('province');
    var job_ids = get_fillter('job');
    var position_wanted_ids = get_fillter('position_wanted');
    var education_level_ids = get_fillter('education_level');
    var experience_ids = get_fillter('experience');
    var gender_ids = get_fillter('gender');
    var salary_range = $("select[id='salary_range']").val();
    var time_range = $("select[id='time_range']").val();
    var search_navbar = $("#search_navbar").val();
    $.post('/recruitment/ajaxCandidates?' + queryParams.toString(), {
        province_ids: province_ids,
        job_ids: job_ids,
        salary_range: salary_range,
        time_range: time_range,
        position_wanted_ids: position_wanted_ids,
        education_level_ids: education_level_ids,
        experience_ids: experience_ids,
        gender_ids: gender_ids,
        search_navbar: search_navbar,
        pageSize: 10,
    }, function (res) {
        $('.main-colm').html(res);
    });

}



function showDialogManageCategory() {
    $('#modalManageCategory').modal('show');
}

function editManageCategory(id) {
    className = $('#icon_' + id).attr('class');
    if (className == 'far fa-edit') {
        $('#icon_' + id).attr('class', 'far fa-check-circle');
        $('#label_' + id).hide();
        $('#title_' + id).show();
        $("#title_" + id).focus();

    } else {
        value = $('#title_' + id).val();
        update_manage_category(id, value);
        $('#icon_' + id).attr('class', 'far fa-edit');
        $('#label_' + id).show();
        $('#title_' + id).hide();
    }
}

function update_manage_category(id, title) {
    $.post('/PostsRecruitment/ajaxUpdateCategory', {
        id: id,
        title: title
    }, function (res) {
        if (res) {
            toastChange('toast_change_modal_saved');
        }
    });
}

function delte_manage_category(id) {
    $.post('/PostsRecruitment/ajaxDeleteCategory', {
        id: id,
    }, function (res) {
        if (res) {
            toastChange('toast_change_modal_saved');
        }
    });
    $('#title_' + id).closest('tr').hide();
}


function uploadGPKD() {
    var file_data = $('#GPKD').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    $.ajax({
        url: '/UserRecruitment/ajaxUploadGPKD', // gửi đến file upload.php 
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (res) {
            if (res) {
                alert(res)
            }
        }
    });
}

function toastChange(id) {
    var x = document.getElementById(id ? id : "toast_change");
    x.className = "show";
    setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000);
}



// call action js
function showDialogExportCSV() {
    $('#modalExportCSVSaved').modal('show');
}

function showDialogSaveCandidated(user_type = null) {
    if (!user_type) {
        var url = window.location.origin + '/nha-tuyen-dung/dang-nhap';
        location.replace(url);
    } else {
        $('#modalSaveCandidate').modal('show');
    }
}

function showAddCategory() {
    $('#modalSaveCandidate').modal('hide');
    $('#modalManageCategory').modal('hide');
    $('#modalAddCategory').modal('show');
}

function showDialogManageCategory() {
    $('#modalManageCategory').modal('show');
}

function showDialogSavedProfile(cat_id, note, user_profile_id, saved_by) {
    if (cat_id) {
        $('#cat_id').val(cat_id).change();
    } else {
        $('#cat_id').attr('value', 'null');
    }

    $('#note').val(note).change();
    $('#user_profile_id_modal').val(user_profile_id).change();
    $('#saved_by_modal').val(saved_by).change();
    $('#modalEditSavedProfile').modal('show');
}

function showDialogUpdateNoteApply(id, note) {
    if (note) {
        $('#button_back_apply').hide();
        $('#buton_delete_note_apply').show();
    } else {
        $('#button_back_apply').show();
        $('#buton_delete_note_apply').hide();
    }
    $('#note_apply').val(note).change();
    $('#id_userP_apply').val(id).change();
    $('#modalUpdateNoteApply').modal('show');
}

function showModalDeteleApplyProfile() {
    $('#modalDeleteApplyProfile').modal('show');
}

function onclickCheckboxRowsAplly(id) {
    if ($('#' + id).hasClass("checked")) {
        $('#' + id).removeClass("checked");
    } else {
        $('#' + id).addClass("checked");
    }
}

function showModalMess(id, status, id_candidate, slug, id_send, id_receive) {
    $('#modalMessage').modal('show');
    if (id_candidate && slug && id_send && id_receive) {
        $('#a_detail_candidate').attr("href", "/nha-tuyen-dung/ho-so/" + id_candidate + "/" + slug + ".html");
        $("#receiver_id").val(id_send).change();
        $("#sender_id").val(id_receive).change();
    }
    ajaxMessDetailData(id, status);
}

function showModalSeekerMess(id, status, id_send, id_receive) {
    $('#seeker_modalMessage').modal('show');
    if (id_send && id_receive) {
        $("#receiver_id").val(id_send).change();
        $("#sender_id").val(id_receive).change();
    }
    ajaxMessSeekerDetailData(id, status);
}

function showModalDeteleMess(id) {
    $('#id_mess').val(id).change();
    $('#modalDeleteMess').modal('show');
}

function showModalSendMessAtCandidateDetail(user_type = null) {
    if (!user_type) {
        var url = window.location.origin + '/auth/login';
        location.replace(url);
    } else {
        $('#modalSendMess').modal('show');
    }
}

function moveToLoginSeeker(){
    var url = window.location.origin + '/dang-nhap';
    location.replace(url);
}


// call movepage
function movePageCandidate(page) {
    //get search and set search gfor url
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.set("page", page);
    history.replaceState(null, null, "?" + queryParams.toString());

    //ajax
    var province_ids = get_fillter('province');
    var job_ids = get_fillter('job');
    var position_wanted_ids = get_fillter('position_wanted');
    var education_level_ids = get_fillter('education_level');
    var experience_ids = get_fillter('experience');
    var gender_ids = get_fillter('gender');
    var salary_range = $("select[id='salary_range']").val();
    var time_range = $("select[id='time_range']").val();
    $.post('/recruitment/ajaxCandidates?' + queryParams.toString(), {
        province_ids: province_ids,
        job_ids: job_ids,
        salary_range: salary_range,
        time_range: time_range,
        position_wanted_ids: position_wanted_ids,
        education_level_ids: education_level_ids,
        experience_ids: experience_ids,
        gender_ids: gender_ids,
        pageSize: 10,
    }, function (res) {
        $('.main-colm').html(res);
    });

}

function movePageSaveProfile(page) {
    //get search and set search gfor url
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.set("page", page);
    history.replaceState(null, null, "?" + queryParams.toString());

    //ajax
    cat_id = $('#select-category').val();
    search_title = $('#search-title').val();
    date_from = $('#datetimepicker_from').val();
    date_to = $('#datetimepicker_to').val();

    $.post('/PostsRecruitment/ajaxSaveProfile?' + queryParams.toString(), {
        cat_id: cat_id,
        search_title: search_title,
        date_from: date_from,
        date_to: date_to,
        pageSize: 10,
    }, function (res) {
        $('#main-saved-profiled').html(res);
        $('#countSavedProfile').text($('#countSavedProfileAjax').text());

    });

}

function movePageViewProfile(page) {
    //get search and set search gfor url
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.set("page", page);
    history.replaceState(null, null, "?" + queryParams.toString());

    //ajax
    search_title = $('#search-title-viewed').val();
    date_from = $('#datetimepicker_viewed_from').val();
    date_to = $('#datetimepicker_viewed_to').val();
    $.post('/PostsRecruitment/ajaxViewProfile?' + queryParams.toString(), {
        search_title: search_title,
        date_from: date_from,
        date_to: date_to,
        pageSize: 10,
    }, function (res) {
        $('#main-viewed-profiled').html(res);
    });

}

function movePageApplyProfile(page) {
    //get search and set search gfor url
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.set("page", page);
    history.replaceState(null, null, "?" + queryParams.toString());

    //ajax
    var position_apply = $("select[id='select-position-apply']").val();
    var time_range = $("select[id='select-time-range-apply']").val();
    var status_apply_ids = get_fillter('status-apply');
    var salary_range_ids = get_fillter('salary-range-apply');
    var education_level_ids = get_fillter('education-apply');
    var experience_ids = get_fillter('experience-apply');
    var gender_ids = get_fillter('gender-apply');

    $.post('/PostsRecruitment/ajaxApplyProfile?' + queryParams.toString(), {
        position_apply: position_apply,
        time_range: time_range,
        status_apply_ids: status_apply_ids,
        salary_range_ids: salary_range_ids,
        education_level_ids: education_level_ids,
        experience_ids: experience_ids,
        gender_ids: gender_ids,
        pageSize: 10
    }, function (res) {
        $('#main-row-apply-profile').html(res);
        $('#countApplyProfile').text($('#countApplyProfileAjax').text());
    });

}

//call ajax
function ajaxCandidateData() {
    var url = document.URL;
    var page = "";
    if (url.lastIndexOf("?") < 0) {
        page = "?page=1";
    } else {
        page = url.slice(url.lastIndexOf("?"), url.length) || "?page=1";
    }
    //get query
    var province_ids = get_fillter('province');
    var job_ids = get_fillter('job');
    var position_wanted_ids = get_fillter('position_wanted');
    var education_level_ids = get_fillter('education_level');
    var experience_ids = get_fillter('experience');
    var gender_ids = get_fillter('gender');
    var salary_range = $("select[id='salary_range']").val();
    var time_range = $("select[id='time_range']").val();
    var search_navbar = $("#search_navbar").val();

    //ajax
    $.post('/recruitment/ajaxCandidates' + page, {
        province_ids: province_ids,
        job_ids: job_ids,
        salary_range: salary_range,
        time_range: time_range,
        position_wanted_ids: position_wanted_ids,
        education_level_ids: education_level_ids,
        experience_ids: experience_ids,
        gender_ids: gender_ids,
        search_navbar: search_navbar,
        pageSize: 10,
    }, function (res) {
        $('.main-colm-candidates').html(res);
    });
}


function ajaxSaveProfileData(type = null) {
    var download_type = 1;
    if (type) {
        download_type = $('input[name="radio"]:checked').val() || 1;
        $('#modalExportCSVSaved').modal('hide');
    }
    var url = document.URL;
    var page = "";
    if (url.lastIndexOf("?") < 0) {
        page = "?page=1";
    } else {
        page = url.slice(url.lastIndexOf("?"), url.length) || "?page=1";
    }
    cat_id = $('#select-category').val();
    console.log(cat_id);
    search_title = $('#search-title').val();
    date_from = $('#datetimepicker_from').val();
    date_to = $('#datetimepicker_to').val();
    $.post('/PostsRecruitment/ajaxSaveProfile' + page, {
        cat_id: cat_id,
        search_title: search_title,
        date_from: date_from,
        date_to: date_to,
        type: type,
        pageSize: 10,
        download_type: download_type,
    }, function (res) {
        $('#main-saved-profiled').html(res);
        $('#countSavedProfile').text($('#countSavedProfileAjax').text());

    });
}

function ajaxViewProfileData(type = null) {
    var download_type = 1;
    if (type) {
        download_type = $('input[name="radio"]:checked').val() || 1;
        $('#modalExportCSVSaved').modal('hide');

    }
    var url = document.URL;
    var page = "";
    if (url.lastIndexOf("?") < 0) {
        page = "?page=1";
    } else {
        page = url.slice(url.lastIndexOf("?"), url.length) || "?page=1";
    }
    search_title = $('#search-title-viewed').val();
    date_from = $('#datetimepicker_viewed_from').val();
    date_to = $('#datetimepicker_viewed_to').val();
    $.post('/PostsRecruitment/ajaxViewProfile' + page, {
        search_title: search_title,
        date_from: date_from,
        date_to: date_to,
        type: type,
        pageSize: 10,
        download_type: download_type,
    }, function (res) {
        $('#main-viewed-profiled').html(res);
    });
}

function ajaxApplyProfileData(type = null) {
    var download_type = 1;
    if (type) {
        download_type = $('input[name="radio"]:checked').val() || 1;
        $('#modalExportCSVSaved').modal('hide');

    }
    var url = document.URL;
    var page = "";
    if (url.lastIndexOf("?") < 0) {
        page = "?page=1";
    } else {
        page = url.slice(url.lastIndexOf("?"), url.length) || "?page=1";
    }
    var position_apply = $("select[id='select_position_apply']").val();
    var time_range = $("select[id='select-time-range-apply']").val();
    var status_apply_ids = get_fillter('status-apply');
    var salary_range_ids = get_fillter('salary-range-apply');
    var education_level_ids = get_fillter('education-apply');
    var experience_ids = get_fillter('experience-apply');
    var gender_ids = get_fillter('gender-apply');
    var position_apply_ids = get_select('select_position_apply');

    $.post('/PostsRecruitment/ajaxApplyProfile' + page, {
        position_apply: position_apply,
        time_range: time_range,
        status_apply_ids: status_apply_ids,
        salary_range_ids: salary_range_ids,
        education_level_ids: education_level_ids,
        experience_ids: experience_ids,
        gender_ids: gender_ids,
        position_apply_ids: position_apply_ids,
        type: type,
        pageSize: 10,
        download_type: download_type,
    }, function (res) {
        $('#main-row-apply-profile').html(res);
        $('#countApplyProfile').text($('#countApplyProfileAjax').text());
    });
}


function ajaxMessReceiveData(status) {
    $.post('/PostsRecruitment/ajaxMessReceiveData', {
        status: status,
    }, function (res) {
        $('#message_receive_' + status).html(res);
        if (status == '0') {
            $('#tab_mess_receive_0').text("Tất cả " + $('#countMessReceive_' + status).text());
        }
        if (status == '1') {
            $('#tab_mess_receive_1').text("Chưa đọc " + $('#countMessReceive_' + status).text());
        }
        if (status == '2') {
            $('#tab_mess_receive_2').text("Đã đọc " + $('#countMessReceive_' + status).text());
        }
    });
}

function ajaxMessSeekerReceiveData(status) {
    $.post('/UserSeeker/ajaxMessSeekerReceiveData', {
        status: status,
    }, function (res) {
        $('#seeker_message_receive_' + status).html(res);
        if (status == '0') {
            $('#seeker_tab_mess_receive_0').text("Tất cả " + $('#countMessReceive_' + status).text());
        }
        if (status == '1') {
            $('#seeker_tab_mess_receive_1').text("Chưa đọc " + $('#countMessReceive_' + status).text());
        }
        if (status == '2') {
            $('#seeker_tab_mess_receive_2').text("Đã đọc " + $('#countMessReceive_' + status).text());
        }
    });
}

function ajaxMessSentData() {
    $.post('/PostsRecruitment/ajaxMessSentData', {
    }, function (res) {
        $('#message_sent_0').html(res);
        $('#tab_mess_sent_0').text("Tất cả " + $('#countMessSent_0').text());
    });
}

function ajaxMessSeekerSentData() {
    $.post('/UserSeeker/ajaxMessSeekerSentData', {
    }, function (res) {
        $('#seeker_message_sent_0').html(res);
        $('#seeker_tab_mess_sent_0').text("Tất cả " + $('#countMessSent_0').text());
    });
}

function ajaxMessDetailData(id, status) {
    $.post('/PostsRecruitment/ajaxMessDetailData', {
        id: id,
        status: status,
    }, function (res) {
        $('#body_message_receive_detail').html(res);
        if (status != '1') {
            $("#captcha_mess_recr").attr({
                "class": "g-recaptcha",
                "data-sitekey": "6LeDB4AbAAAAAPcJOAKctU3vT5UPve4vyEJ1O8En"
            });
        }
    });
}

function ajaxMessSeekerDetailData(id, status) {
    $.post('/UserSeeker/ajaxMessSeekerDetailData', {
        id: id,
        status: status,
    }, function (res) {
        $('#seeker_body_message_receive_detail').html(res);
    });
}


function ajaxChangeFavourite(user_id, user_recr_id, key, user_type) {
    if (!user_type) {
        var url = window.location.origin + '/nha-tuyen-dung/dang-nhap';
        location.replace(url);
    } else {
        if ($('#favourite_' + key).is(":visible")) {
            $.post('/UserRecruitment/delete_candidate_saved', {
                user_profile_id: user_id,
                saved_by: user_recr_id,
            }, function (res) {
                $('#favourite_' + key).hide();
                $('#not_favourite_' + key).show();

                toastChange();
            });

        } else {
            $.post('/UserRecruitment/save_candidate', {
                user_profile_id: user_id,
                saved_by: user_recr_id,
            }, function (res) {
                $('#not_favourite_' + key).hide();
                $('#favourite_' + key).show();

                toastChange();
            });
        }
    }
}

function ajaxDeleteFavourite(user_type = null, user_id, user_recr_id, key = null, type = null) {
    if (!user_type) {
        var url = window.location.origin + '/nha-tuyen-dung/dang-nhap';
        location.replace(url);
    } else {
        if ($('#countSavedProfile').is(":visible")) {
            number = parseInt($('#countSavedProfile').text()) - 1;
            $('#countSavedProfile').text(number);
        }
        $.post('/UserRecruitment/delete_candidate_saved', {
            user_profile_id: user_id,
            saved_by: user_recr_id,
        }, function (res) {
            if (res) {
                if (type == 'remove' && key) {
                    $('#user_profile_saved_' + key).remove();
                } else {
                    $('#favourite').hide();
                    $('#not_favourite').show();
                }
                toastChange();
            }

        });
    }

}


function ajaxInsertFavourite() {
    $('#modalSaveCandidate').modal('hide');
    cat_id = $('#cat_id').val();
    note = $('#note').val();
    user_profile_id = $('#user_profile_id').val();


    $.post('/UserRecruitment/save_candidate', {
        cat_id: cat_id,
        note: note,
        user_profile_id: user_profile_id,
    }, function (res) {
        $('#not_favourite').hide();
        $('#favourite').show();

        toastChange();
    });
}

function ajaxUpdateFavourite() {
    $('#modalEditSavedProfile').modal('hide');
    cat_id = $('#cat_id').val();
    note = $('#note').val();
    user_profile_id = $('#user_profile_id_modal').val();
    saved_by = $('#saved_by_modal').val();

    $.post('/UserRecruitment/update_candidate_saved', {
        cat_id: cat_id,
        note: note,
        user_profile_id: user_profile_id,
        saved_by: saved_by,
    }, function (res) {
        if (res) {
            ajaxSaveProfileData();
            toastChange();
        }
    });
}

function ajaxUpdateNoteApply() {
    $('#modalUpdateNoteApply').modal('hide');
    id_userP_apply = $('#id_userP_apply').val();
    note_apply = $('#note_apply').val();

    $.post('/PostsRecruitment/ajaxInsertOrUpdateNoteApplyUsP', {
        id_userP_apply: id_userP_apply,
        note_apply: note_apply,

    }, function (res) {
        if (res) {
            ajaxApplyProfileData();
            toastChange();
        }
    });
}

function ajaxDeleteNoteApply() {
    $('#modalUpdateNoteApply').modal('hide');
    id_userP_apply = $('#id_userP_apply').val();

    $.post('/PostsRecruitment/ajaxDeleteNoteApplyUsP', {
        id_userP_apply: id_userP_apply,

    }, function (res) {
        if (res) {
            ajaxApplyProfileData();
            toastChange();
        }
    });
}

function ajaxUpdateStatusApply(id, status, key) {
    if (status == key) {
        $('#checkbox_apply_' + id + "_" + key).prop("checked", true);
        //nothing
    } else {

        $.post('/PostsRecruitment/ajaxUpdateStatusApply', {
            id_userP_apply: id,
            status_update: key,

        }, function (res) {
            if (res) {
                ajaxApplyProfileData();
                toastChange();
            }
        });
    }
}

function ajaxDeleteApplyProfile() {
    ids = get_fillter_self('checkbox_rows_apply');

    if (ids.length > 0) {
        $.post('/PostsRecruitment/ajaxDeleteRowsApllyProfile', {
            ids: ids,

        }, function (res) {
            if (res) {
                $('#modalDeleteApplyProfile').modal('hide');
                toastChange();
                ajaxApplyProfileData();
            }
        });
    } else {
        alert("Bạn chưa chọn hồ sơ để xóa!");
        $('#modalDeleteApplyProfile').modal('hide');
    }
}

function ajaxDeleteMess(typeDelete) {
    id = $('#id_mess').val();

    $.post('/PostsRecruitment/ajaxDeleteMess', {
        id: id,
        typeDelete: typeDelete
    }, function (res) {
        if (res) {
            $('#modalDeleteMess').modal('hide');
            toastChange();
            if ($('#message-receive-page').is(":visible")) {
                tab = $("#message-receive-page").find("li.active").attr("id");
                ajaxMessReceiveData(tab);
            } else {
                ajaxMessSentData();
            }

            if ($('#seeker_message_receive_page').is(":visible")) {
                tab = $("#seeker_message_receive_page").find("li.active").attr("id");
                ajaxMessSeekerReceiveData(tab);
            }

            if ($('#seeker_message_sent_page').is(":visible")) {
                ajaxMessSeekerSentData();
            }


        }
    });
}

function ajaxReceiveMess() {
    title_mess = $('#title_mess').val();
    content_mess = $('#content_mess').val();
    receiver_id = $('#receiver_id').val();
    sender_id = $('#sender_id').val();
    g_recaptcha_response = grecaptcha.getResponse();

    if (title_mess && content_mess && g_recaptcha_response) {
        $.post('/PostsRecruitment/ajaxReceiveMess', {
            title_mess: title_mess,
            content_mess: content_mess,
            receiver_id: receiver_id,
            sender_id: sender_id,
            g_recaptcha_response: g_recaptcha_response,
        }, function (res) {
            if (res == '1') {
                if ($('#modalMessage').is(":visible")) {
                    $('#modalMessage').modal('hide');
                } else {
                    $('#modalSendMess').modal('hide');
                }
                $('#title_mess').val("");
                $('#content_mess').val("");
                grecaptcha.reset();
                toastChange();
            } else {
                alert(res);
            }
        });
    } else {
        alert("Vui lòng nhập đủ thông tin!");
    }

}

function ajaxReceiveMessSeeker() {
    title_mess = $('#title_mess').val();
    content_mess = $('#content_mess').val();
    receiver_id = $('#receiver_id').val();
    sender_id = $('#sender_id').val();
    g_recaptcha_response = grecaptcha.getResponse();

    if (title_mess && content_mess && g_recaptcha_response) {
        $.post('/UserSeeker/ajaxReceiveMessSeeker', {
            title_mess: title_mess,
            content_mess: content_mess,
            receiver_id: receiver_id,
            sender_id: sender_id,
            g_recaptcha_response: g_recaptcha_response
        }, function (res) {
            if (res == '1') {
                $('#seeker_modalMessage').modal('hide');
                $('#title_mess').val("");
                $('#content_mess').val("");
                grecaptcha.reset();
                toastChange();
            } else {
                alert(res);
            }
        });
    } else {
        alert("Vui lòng nhập đủ thông tin!");
    }

}

function deleteSendRequest() {
    $('#cat_send_request').val(0);
    $('#description_send_request').val("").change();
    grecaptcha.reset();
}
function ajaxSendrequest() {
    cat_send_request = $('#cat_send_request').val();
    description_send_request = $('#description_send_request').val();
    g_recaptcha_response = grecaptcha.getResponse();

    if (cat_send_request && description_send_request && g_recaptcha_response) {
        $.post('/PostsRecruitment/ajaxSendrequest', {
            cat_send_request: cat_send_request,
            description_send_request: description_send_request,
            g_recaptcha_response: g_recaptcha_response
        }, function (res) {
            if (res == '1') {
                deleteSendRequest();
                toastChange();
            }
        });
    } else {
        alert("Vui lòng nhập đủ thông tin!");
    }

}

function ajaxSendMessToRecruitment() {
    title_mess = $('#title_mess').val();
    content_mess = $('#content_mess').val();
    receiver_id = $('#receiver_id').val();
    g_recaptcha_response = grecaptcha.getResponse();

    if (title_mess && content_mess && g_recaptcha_response) {
        $.post('/UserSeeker/ajaxSendMessToRecruitment', {
            title_mess: title_mess,
            content_mess: content_mess,
            receiver_id: receiver_id,
            g_recaptcha_response: g_recaptcha_response
        }, function (res) {
            if (res == '1') {
                $('#modalSendMess').modal('hide');
                $('#title_mess').val("");
                $('#content_mess').val("");
                grecaptcha.reset();
                toastChange();
            } else {
                alert(res);
            }
        });
    } else {
        alert("Vui lòng nhập đủ thông tin!");
    }

}

function delete_company_follow() {
    list_id = new Array();
    $('input[data-check_company_id]').each(function () {
        // var sThisVal = (this.checked ? "1" : "0");
        // sList += (sList=="" ? sThisVal : "," + sThisVal);
        if (this.checked) {
            list_id.push($(this).data('check_company_id'));
        }
    });
    if (list_id.length > 0) {
        console.log(list_id.join(','));
        str_company_id = list_id.join(',');
        $.post('/UserSeeker/delete_company_follow', {
            company_ids: str_company_id
        }, function (res) {
            location.reload();
        });
    }
}

function add_company_follow(company_id) {
    if (company_id) {
        $.post('/UserSeeker/add_company_follow', {
            company_id: company_id
        }, function (res) {
            location.reload();
        });
    }
}