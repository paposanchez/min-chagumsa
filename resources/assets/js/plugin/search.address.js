/* 
 Document   : 
 Created on : 2013. 7. 29, 오후 5:42:22
 Author     : chali5124@gmail.com
 Description: 주소검색폼 자바스크립트
 */
$(document).ready(function () {

    var select_address_wrap = '';
    $(document).on('click', ".zfp-zip-modal", function (e) {
        select_address_wrap = $(this);
        $("#zfp-modalzip").modal();
    });

    // form reset
    $("#inputSearchAddress").on('shown.bs.modal', function (e) {
        reset_select();
    });


    $(document).on('click', '.zfp-zip-click', function (e) {
        $('#zfp-paginator').bootpag({total: 1});
        search();
    });

    $('#zfp-paginator').bootpag({
        total: 1,
        next: '<i class="fa fa-chevron-right"></i>',
        prev: '<i class="fa fa-chevron-left"></i>',
        maxVisible: 10,
    }).on("page", function (e, p) {
        $("#zfp-zip-page").val(p);
        search();
    });

    $(document).on('change', '.zfp-zip-select', function (e) {
        var none = new Option(ZFOOP.Languages.please_select, '');

        if ($(this).attr('id') === 'inputCountry') {
            $('#inputStates').html(new Option(ZFOOP.Languages.please_select, ''));
            $('#inputCity').html(new Option(ZFOOP.Languages.please_select, ''));
            $('#inputDistrict').html(new Option(ZFOOP.Languages.please_select, ''));
            $('#zfp-paginator').bootpag({total: 1});
        }

        if ($(this).attr('id') === 'inputStates') {
            $('#inputCity').html(new Option(ZFOOP.Languages.please_select, ''));
            $('#inputDistrict').html(new Option(ZFOOP.Languages.please_select, ''));
            $('#zfp-paginator').bootpag({total: 1});
        }

        if ($(this).attr('id') === 'inputCity') {
            $('#inputDistrict').html(new Option(ZFOOP.Languages.please_select, ''));
            $('#zfp-paginator').bootpag({total: 1});
        }

        if ($(this).attr('id') === 'inputDistrict') {

        }

        if ($(this).attr('id') === 'inputCountry') {
            if ($("#inputCountry option:selected").val() === '') {
                reset_select();
                return;
            }
        }

        search();
    });

    function reset_select() {
        var none = new Option(ZFOOP.Languages.please_select, '');

        $('#inputCountry').val('');
        $('#inputStates').html(none);
        $('#inputCity').html(none);
        $('#inputDistrict').html(none);
        $("#zfp-zip-results").html('<tr><td colspan="3" class="no-result">' + ZFOOP.Languages.no_result + '</td></tr>');
        $("#zfp-address-select-manual-zip").val('');
        $("#zfp-address-select-manual-address").val('');
    }

    // 조회선택
    $(document).on('click', '.zfp-address-select', function (e) {
        e.preventDefault();
        $('#inputShippingZip').val($(this).data('zip'));
        $('#inputShippingCountry').val($(this).data('country'));
        $('#inputShippingStates').val($(this).data('states'));
        $('#inputShippingDistrict').val($(this).data('district'));
        $('#inputShippingCity').val($(this).data('city'));
        $('#inputShippingAddress').val($(this).data('address'));
        $("#zfp-modalzip").modal('hide');
    });

    var search = function () {
        $("#zfp-modalzip").find('.modal-loading').addClass('in');
        $.ajax({
            url: "/json/address/",
            dataType: 'json',
            data: $("#zfp-form-address").serialize(),
            type: 'POST',
            success: function (response) {
                if (response.msg) {
                    alert(response.msg);
                }

                if (response.status === "ok") {

                    $('#zfp-paginator').bootpag({total: response.data.pages});

                    var is_selected = false;
                    var html = '';

                    for (var i in response.data.entrys) {
                        var entry = response.data.entrys[i];
                        html += '<tr>';
                        html += '<td>' + entry.zip + '</td>';
                        html += '<td class="text-left text-valign">' + entry.states + ' ' + entry.city + ' ' + entry.district + ' ' + entry.address + '</td>';
                        html += '<td class="text-valign"><a href="#" ';
                        html += 'data-country="' + entry.country + '"';
                        html += 'data-zip="' + entry.zip + '"';
                        html += 'data-states="' + entry.states + '"';
                        html += 'data-city="' + entry.city + '"';
                        html += 'data-district="' + entry.district + '"';
                        html += 'data-address="' + entry.address + '"';
                        html += ' class="btn btn-info btn-sm zfp-address-select"><i class="fa fa-check"></i></a></td>';
                        html += '</tr>';
                    }

                    if (response.data.pages == 1 && response.data.total == 0) {
                        html = '<tr><td class="no-result" colspan="3">{{ trans('common.no-result') }}</td></tr>';
                    }

                    $("#zfp-zip-results").html(html);

                    if (typeof response.data.states !== 'undefined') {
                        var now_select_state = $('#inputStates').find('option:selected').val();
                        $('#inputStates').empty().append(new Option(ZFOOP.Languages.please_select, ''));
                        for (var i in response.data.states) {
                            var entry = response.data.states[i];
                            is_selected = (now_select_state === entry) ? true : false;
                            $('#inputStates').append(new Option(entry, entry, false, is_selected));
                        }
                    }
                    if (typeof response.data.city !== 'undefined') {
                        var now_select_city = $('#inputCity').find('option:selected').val();
                        $('#inputCity').empty().append(new Option(ZFOOP.Languages.please_select, ''));

                        if (response.data.city.length > 0) {
                            for (var i in response.data.city) {
                                var entry = response.data.city[i];
                                is_selected = (now_select_city === entry) ? true : false;
                                $('#inputCity').append(new Option(entry, entry, false, is_selected));
                            }
                        }
                    }
                    if (typeof response.data.district !== 'undefined') {
                        var now_select_district = $('#inputDistrict').find('option:selected').val();
                        $('#inputDistrict').empty().append(new Option(ZFOOP.Languages.please_select, ''));
                        if (response.data.district.length > 0) {
                            for (var i in response.data.district) {
                                var entry = response.data.district[i];
                                is_selected = (now_select_district === entry) ? true : false;
                                $('#inputDistrict').append(new Option(entry, entry, false, is_selected));
                            }
                        }
                    }

                }
            },
            error: function (e) {
                alert(ZFOOP.Languages.can_not_process_retry);
            },
            complete: function (e) {
                $("#zfp-modalzip").find('.modal-loading').removeClass('in');
            }
        });
    };
});