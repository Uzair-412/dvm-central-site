function ajax_request()
{
    var frm_data = $('form').serializeArray();
    // console.log(frm_data);

    $.ajax({
        method: "POST",
        url: "/admin/slug-checker",
        data: frm_data
    })
        .done(function( obj ) {
            if(obj.status == '1')
            {
                if(obj.cmd == 'slug')
                {
                    $('#slug').val(obj.slug);
                    console.log(obj.slug);
                }
            }
        });
}

function show_message(id)
{
    $.ajax({
        method: "GET",
        url: "/admin/sent-messages/show",
        data: {id: id}
    })
        .done(function( obj ) {
            if(obj.status == '1')
            {
                if(obj.status == '1')
                {
                    $('#modal_followup_messages_subject').html(obj.subject);
                    $('#modal_followup_messages_text').html(obj.message);
                    $('#modal_followup_messages').modal('show');
                }
            }
        });
}

function regenerate_sitemap()
{
    show_overlay();

    $.ajax({
        method: "GET",
        url: "/admin/sitemap-generate"
    })
        .done(function( obj ) {
            if(obj.status == '1')
            {
                location.reload();
            }
        });
}

$(document).ready(function() {
    // $('.product-vendor-id-selector').on('change', function(){
    //     let vendor_id = $(this).val();
    //     $('#parent_id').find('option').remove();
    //     if(vendor_id !== '')
    //     {
    //         get_categories(null, vendor_id);
    //     }
    // });
    $('#business_type').change(function() {
        var business_type = $(this).val();
        $('#parent_id').find('option').remove();
        if(business_type !== '')
        {
            get_categories(business_type);
        }
    });

    /*$('#business_type').change(function(){
        var id = $(this).val();
        // console.log(id);
        $('#parent_id').find('option').not(':first').remove();
        if(id !== ''){
            // console.log('the id is: '+id);
            $.ajax({
                url: '/admin/getCategories/'+id,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    var len = 0;
                    if(response['data'] != null){
                        len = response['data'].length;
                    }
                    $('#parent_id').removeAttr('disabled');
                    if(len > 0){
                        // Read data and create <option >
                        for(var i=0; i<len; i++){
                            var id = response['data'][i].id;
                            var name = response['data'][i].name;
                            var option = "<option value='"+id+"'>"+name+"</option>";
                            // console.log('called');
                            $("#parent_id").append(option); 
                        }
                    }
                }
            });
        }else{
            $('#parent_id').attr('disabled','true');
        }
    });*/
    $('#field_type').change(function(){
        var value = $(this).val();
        if(value == 'drop_down' || value == 'check_box' || value == 'radio'){
            console.log(value);
            $('#field_options').removeAttr('hidden');
            // $('#field_options_input').attr('required','true');
        }
        if(value == 'text_field' || value == 'link_field' || value == 'text_area' || value == 'editor' || value == 'date_picker'){
            console.log(value);
            $('#field_options').attr('hidden','true');
            // $('#field_options_input').removeAttr('required');
        }
    });
    (function ($) {
        var field_values = [];
	    $.fn.commaSeparated = function () {
	        return this.each(function () {
                var a = $('#field_options_hidden').val().split(",");
                field_values.push(a);
	            var
	                block = $(this),
	                field = block.find('input[type="text"]');
	            field.keyup(function (e) {
	                if (e.keyCode == 188) {
	                    var $this = $(this);
	                    var n = $this.val().split(",");
	                    var str = n[n.length - 2];
	                    if (str) $(this).after('<span class="removeName">' + str + '<small value="'+str+'">x</small></span>');
	                    $this.val('');
                        field_values.push(str);
                        // console.log(field_values);
                        $('#field_options_hidden').attr('value',field_values);
	                }
	            });
	        });
	    };
	    $(document).on('click', 'span.removeName small', function () {
	        $(this).closest('span').remove();
            // console.log(field_values[0][1]);
            // console.log(field_values);
            // console.log($(this).attr("value"));
            // console.log(field_values.indexOf($(this).attr("value")));
            // field_values.splice($(this).attr("value"),1);
            // $('#field_options_hidden').attr('value',field_values);
	    });
      //fire commaSeparated
	    $("#field_options").commaSeparated();
	})(jQuery);
    $('.select2').select2({
        placeholder: "Please select ...",
        allowClear: true
    });

    $('.select_tags').select2({
        placeholder: "Enter search tags separated by comma ...",
        allowClear: true,
        tags: true,
        tokenSeparators: [',']
    });

    $('.select_info').select2({
        placeholder: "",
        allowClear: true,
        selectOnClose: true,
        tags: true
    });

    $('#cl_extra_items').addClass('collapse');
    $('#cl_display').addClass('collapse');
    $('#cl_info').addClass('collapse');

    $('#div_add_variation').addClass('d-none');

    $('#product_video_modal').on('hidden.bs.modal', function (e) {
        $('#video_modal').html('');
    });

    $("#frm_sku_check").bind("keypress", function(e) {
        if (e.keyCode == 13)
        {
            return false;
        }
    });

    $('#btn_content_tab').on('click', function(){
        CKEDITOR.replace( document.getElementById('full_description') );
    });

    CKEDITOR.replace( '.ckeditor' );
});

function get_categories(business_type, vendor_id)
{
    business_type = business_type | null;
    vendor_id = vendor_id | null;

    $.ajax({
        method: "POST",
        url: "/admin/get-categories",
        headers: {
            'X-CSRF-TOKEN': get_csrf_token()
        },
        data: { business_type : business_type , vendor_id : vendor_id }
    })
        .done(function( obj )
        {
            if(obj.status == '1')
            {
                for (const [id, name] of Object.entries(obj.data))
                {
                    var option = "<option value='"+id+"'>"+name+"</option>";
                    $("#parent_id").append(option);
                }
                $('#parent_id').prop('disabled', false);
            }
            else
            {
                $('#parent_id').prop('disabled', true);
                alert(obj.message);
            }
        });
}

function set_default_image(radio, id, fileable_id)
{
    $.ajax({
        method: "GET",
        url: "/admin/set-default-image",
        data: {id: id, fileable_id: fileable_id}
    })
        .done(function( obj ) {
            if(obj.status != '1')
            {
                alert('Unable to set default image, please try again or contact administrator.')
            }
        });
}

function delete_product_file(type, id)
{
    if(window.confirm('Are you sure, you want to delete this '+type+'?'))
    {
        $.ajax({
            method: "GET",
            url: "/admin/delete-product-file",
            data: {id: id, type: type}
        })
            .done(function( obj ) {
                if(obj.status == '1')
                {
                    $('#tr_'+id).remove();
                }
                else
                {
                    alert('Unable to delete '+ type +', please try again or contact administrator.')
                }
            });
    }
}

function open_video_modal(video)
{
    video = '/up_data/products/videos/'+video;
    let video_tag = '<video width="700" controls><source src="'+ video +'" id="product_video" type="video/mp4">Your browser does not support the video tag.</video>';
    $('#video_modal').html(video_tag);
    $('#product_video_modal').modal('show');
}

function show_sku_modal()
{
    $('#product_variation_sku').modal('show');
}

function check_sku_variation(force)
{
    force = force || null;

    if($('#sku_cv').val() == '')
    {
        alert('Please enter SKU or Product ID!');
        $('#sku_cv').focus();
        return;
    }

    let frm_data = $('#frm_sku_check').serialize();

    if(force)
        frm_data += '&force=true';

    $.ajax({
        method: "POST",
        url: "/admin/check-sku-variation",
        data: frm_data
    })
        .done(function( obj )
        {
            if(obj.status == '0')
            {
                alert(obj.message);
            }
            else if(obj.status == '1')
            {
                alert('Product variation added successfully.');
                self.location.reload();
            }
            else if(obj.status == '3')
            {
                if(window.confirm(obj.message))
                {
                    if(window.confirm('Are you sure you want to convert this item to child product?'))
                    {
                        check_sku_variation(true);
                    }
                }
                //self.location.reload();
            }
            else if(obj.status == '2')
            {
                $('#sku').val($('#sku_cv').val());
                $('#product_variation_sku').modal('hide');
                show_hide_add_variation('show');
            }
        });
}

function add_set_item(force)
{
    if($('#sku_cv').val() == '')
    {
        alert('Please enter SKU or Product ID!');
        $('#sku_cv').focus();
        return;
    }

    let frm_data = $('#frm_sku_check').serialize();

    $.ajax({
        method: "POST",
        url: "/admin/add-set-item",
        data: frm_data
    })
        .done(function( obj )
        {
            if(obj.status == '0')
            {
                alert(obj.message);
            }
            else if(obj.status == '1')
            {
                alert('Product added in set successfully.');
                self.location.reload();
            }
        });
}


function delete_product_set(id)
{
    if(window.confirm('Are you sure, you want to remove this product from this set?'))
        {
            show_overlay();
        $.ajax({
                method: "GET",
                url: "/admin/delete-product-set-item",
                data: {id: id}
        })
            .done(function( obj ) {
                    hide_overlay();
                    if(obj.status == '1')
                        {
                            $('#tr_'+id).remove();
                    }
                    else
                    {
                        alert('Unable to delete product set item, please try again or contact administrator.')
                    }
                });
    }
}

function update_product_set(value, id, type)
{
    $.ajax({
            method: "GET",
            url: "/admin/update-product-set",
            data: {value: value, id: id, type: type}
    })
        .done(function( obj )
            {

            });
}

function set_position(position, id)
{
    $.ajax({
        method: "GET",
        url: "/admin/set-position",
        data: {position: position, id: id}
    })
        .done(function( obj )
        {

        });
}

function show_hide_add_variation(cmd, ct)
{
    ct = ct || 'Add New Variation';
    $('#sp_add_new_variation').text(ct);

    if(ct == 'Modify Variation')
    {
        $('#cmd').val('update');
    }
    else
    {
        $('#cmd').val('add');
    }

    if(cmd == 'show')
    {
        $('#btn_add_variation').addClass('d-none');
        $('#div_add_variation').removeClass('d-none');
    }
    else
    {
        $('#btn_add_variation').removeClass('d-none');
        $('#div_add_variation').addClass('d-none');
        $('#frm_variation')[0].reset();

        $('#related_products').val('');
        $('#related_products').trigger('change');

        $('#upsell_products').val('');
        $('#upsell_products').trigger('change');

        $('#cross_sell_products').val('');
        $('#cross_sell_products').trigger('change');

    }
}

function delete_product_variation(id, product_id)
{
    if(window.confirm('Are you sure, you want to delete this product variation?'))
    {
        show_overlay();
        $.ajax({
            method: "GET",
            url: "/admin/delete-product-variation",
            data: {id: id, product_id: product_id}
        })
            .done(function( obj ) {
                hide_overlay();
                if(obj.status == '1')
                {
                    $('#tr_'+id).remove();
                }
                else
                {
                    alert('Unable to delete product variation, please try again or contact administrator.')
                }
            });
    }
}

function modify_product_variation(id)
{
    show_overlay();
    $.ajax({
        method: "GET",
        url: "/admin/edit-product-variation",
        data: {id: id}
    })
        .done(function( obj ) {

            hide_overlay();

            if(obj.status == '1')
            {
                let prd = obj.product;

                // Basic
                $('#name').val(prd.name);
                $('#caption').val(prd.caption);
                $('#sku').val(prd.sku);
                $('#price_catalog').val(prd.price_catalog);
                // Basic

                // Content
                $('#short_description').val(prd.short_description);
                $('#full_description').val(prd.full_description);
                $('#pdf_link').val(prd.pdf_link);
                $('#video_link').val(prd.video_link);
                // Content

                // Additional Information
                var ai = jQuery.parseJSON(prd.additional_information);

                $.each(ai, function( k, v ){

                    if(v != 'null' && v != null && v != '')
                    {
                        let el = '#additional_info_'+k;
                        $(el).val(v).trigger('change');
                    }

                });
                // Additional Information

                // Special Price
                $('#price_discounted').val(prd.price_discounted);
                $('#price_discounted_start').val(prd.price_discounted_start);
                $('#price_discounted_end').val(prd.price_discounted_end);
                // Special Price

                // Stock, Shipping and Tax
                if (prd.in_stock == 'Y') {
                    $('#in_stock_y').prop('checked', true);
                    $('#in_stock_n').prop('checked', false);
                }
                else {
                    $('#in_stock_n').prop('checked', true);
                    $('#in_stock_y').prop('checked', false);
                }

                if (prd.check_quantity == 'Y') {
                    $('#check_quantity_y').prop('checked', true);
                    $('#check_quantity_n').prop('checked', false);
                }
                else {
                    $('#check_quantity_n').prop('checked', true);
                    $('#check_quantity_y').prop('checked', false);
                }

                $('#quantity').val(prd.quantity);

                if (prd.ship_type == 'intl') {
                    $('#ship_type_intl').prop('checked', true);
                    $('#ship_type_us').prop('checked', false);
                }
                else {
                    $('#ship_type_us').prop('checked', true);
                    $('#ship_type_intl').prop('checked', false);
                }

                $('#weight').val(prd.weight);

                if (prd.taxable == 'Y') {
                    $('#taxable_y').prop('checked', true);
                    $('#taxable_n').prop('checked', false);
                }
                else {
                    $('#taxable_n').prop('checked', true);
                    $('#taxable_y').prop('checked', false);
                }
                // Stock, Shipping and Tax


                // Related, Up-Sells and Cross-Sells
                if (prd.related_products != '' && prd.related_products != null)
                {
                    let rp = prd.related_products.split(',');
                    $('#related_products').val(rp);
                }
                else
                {
                    $('#related_products').val('');
                }
                $('#related_products').trigger('change');

                if(prd.upsell_products != '' && prd.upsell_products != null)
                {
                    let up = prd.upsell_products.split(',');
                    $('#upsell_products').val(up);
                }
                else
                {
                    $('#upsell_products').val('');
                }
                $('#upsell_products').trigger('change');

                if(prd.cross_sell_products != '' && prd.cross_sell_products != null)
                {
                    let csp = prd.cross_sell_products.split(',');
                    $('#cross_sell_products').val(csp);
                }
                else
                {
                    $('#cross_sell_products').val('');
                }
                $('#cross_sell_products').trigger('change');
                // Related, Up-Sells and Cross-Sells

                $('#variation_id').val(prd.id);
                $('#video_id').val(prd.video_id);

                show_hide_add_variation('show', 'Modify Variation');
            }
            else
            {
                alert('Unable to delete product variation, please try again or contact administrator.')
            }
        });
}

function get_csrf_token()
{
    return $('meta[name="csrf-token"]').attr('content');
}

function show_qr_code(id, product_id)
{
    product_id = product_id || null;
    show_overlay();
    $.ajax({
        method: "GET",
        url: "/admin/get-qr-code",
        data: {id: id, product_id: product_id}
    })
        .done(function( obj ) {

            hide_overlay();

            if(obj.status == '1')
            {
                $('#modal_alert_message').html('<h2>'+obj.name+' ('+ obj.sku +')</h2>'+obj.qr_code);
                $('#modal_alert').modal('show');
            }
            else
            {
                alert('Unable to fetch QR Code, please try again later.')
            }
        });
}

function readURL(input, id)
{
    if (input.files && input.files[0])
    {
        var reader = new FileReader();

        reader.onload = function(e)
        {
            $('#img_'+id).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$(".v_thumb").change(function() {
    readURL(this, $(this).attr('id'));
});

function show_overlay()
{
    //document.getElementById("overlay").style.display = "block";
}

function hide_overlay()
{
    //document.getElementById("overlay").style.display = "none";
}

function show_crm_data(id)
{
    show_overlay();
    $.ajax({
        method: "GET",
        url: "/admin/crm-data/"+id
    })
        .done(function( obj ) {
            if(obj.status == '1')
            {

                $('#crm_details_'+id).html(obj.data);
                $('.crm-data').addClass('d-none');
                $('#data_'+id).removeClass('d-none');

                hide_overlay();
            }
        });
}

function crm_verified(type, id)
{
    $.ajax({
        method: "GET",
        url: "/admin/verify-crm-data",
        data: {type: type, id: id}
    })
        .done(function( obj ) {
            if(obj.status == '1')
            {
                let old_text = $('#v_'+type+'_'+id).text();
                if(old_text == 'Not Verified')
                {
                    $('#v_'+type+'_'+id).text('Verified');
                    $('#v_'+type+'_'+id).removeClass('badge-warning');
                    $('#v_'+type+'_'+id).addClass('badge-success');
                }
                else
                {
                    $('#v_'+type+'_'+id).text('Not Verified');
                    $('#v_'+type+'_'+id).removeClass('badge-success');
                    $('#v_'+type+'_'+id).addClass('badge-warning');
                }
            }
        });
}

function edit_crm_data(id, cmd)
{
    let text_class = 'data_text_' + id;
    let edit_class = 'data_edit_' + id;

    cmd = cmd || 'edit';

    console.log(cmd);

    if(cmd == 'edit')
    {
        $('.'+text_class).addClass('d-none');
        $('.'+edit_class).removeClass('d-none');

        $('#edit_link_'+id).addClass('d-none');
        $('#cancel_edit_link_'+id).removeClass('d-none');

        $('#crm_update_button_'+id).removeClass('d-none');
    }
    else
    {
        $('.'+text_class).removeClass('d-none');
        $('.'+edit_class).addClass('d-none');

        $('#edit_link_'+id).removeClass('d-none');
        $('#cancel_edit_link_'+id).addClass('d-none');

        $('#crm_update_button_'+id).addClass('d-none');
    }
}

function crm_update(id)
{
    var frm_data = $('#frm_crm_data_'+id).serializeArray();

    show_overlay();
    $.ajax({
        method: "POST",
        url: "/admin/crm-data/"+id,
        data: frm_data
    })
        .done(function( obj ) {
            if(obj.status == '1')
            {
                edit_crm_data(id, 'cancel');
                show_crm_data(id);
            }
        });
}

function get_states(country_id)
{
    //var frm_data = $('form').serializeArray();

    show_overlay();

    $.ajax({
        method: "GET",
        url: "/admin/get-states",
        data: {country_id: country_id}
    })
        .done(function( obj ) {

            let html = '';

            if(obj.status == '1')
            {
                html += '<select name="state" id="state" class="form-control"><option value="">Please select ...</option>';

                obj.data.forEach(function(data){
                    html += '<option value="' + data.id + '">' +  data.name + '</option>';
                    //console.log('--> ' + data.id);
                });

                html += '</select>';
            }
            else
            {
                html = '<input class="form-control" placeholder="Enter state ..." name="state" type="text" id="state">';
            }

            $('#div_state').html(html);

            hide_overlay();
        });
}

function set_invoice_type(type)
{
    if(type != 'general')
    {
        $('#div_ref_id').removeClass('d-none');
    }
    else
    {
        $('#div_ref_id').addClass('d-none');
    }
}

function set_late_fee(type)
{
    if(type != 'none')
    {
        $('#div_late_fee').removeClass('d-none');
    }
    else
    {
        $('#div_late_fee').addClass('d-none');
    }
}

function get_customer_orders(customer_id)
{
    show_overlay();

    $.ajax({
        method: "GET",
        url: "/admin/get-customer-orders",
        data: {customer_id: customer_id}
    })
        .done(function( obj ) {

            let html = '';

            if(obj.status == '1')
            {
                console.log(obj.data);
                html += '<select name="ref_id" id="ref_id" class="form-control"><option value="">Please select ...</option>';

                obj.data.forEach(function(data){
                    html += '<option value="' + data.id + '">' +  data.title + '</option>';
                    //console.log('--> ' + data.id);
                });

                html += '</select>';
            }

            $('#div_ref_id_select').html(html);

            hide_overlay();
        });
}

function set_discount_type(type)
{
    if(type == 1 || type == 2)
    {
        $('#div_bogo').addClass('d-none');
        $('#div_discount').removeClass('d-none');
    }
    else
    {
        $('#div_bogo').removeClass('d-none');
        $('#div_discount').addClass('d-none');
    }
}

function save_slugs(cbk)
{
    $('#slug').prop('disabled', !cbk.checked);
    if(cbk.checked)
        $('#link_generate_slug').removeClass('d-none');
    else
        $('#link_generate_slug').addClass('d-none');
}

function show_variation_ref(sub_product_id)
{
    //show_overlay();

    $.ajax({
        method: "GET",
        url: "/admin/get-variation-ref",
        data: {sub_product_id: sub_product_id}
    })
        .done(function( obj ) {
            if(obj.status == '1')
            {
                $('#v_sub_name').html($('#td_'+sub_product_id).html());
                $('#variation_ref').html(obj.data);
                $('#variation_ref_modal').modal('show');
                //hide_overlay();
            }
        });
}

function add_micro_site_item(force)
{
    if($('#sku_cv').val() == '')
    {
        alert('Please enter SKU or Product ID!');
        $('#sku_cv').focus();
        return;
    }

    let frm_data = $('#frm_sku_check').serialize();

    $.ajax({
        method: "POST",
        url: "/admin/add-micro-site-item",
        data: frm_data
    })
        .done(function( obj )
        {
            if(obj.status == '0')
            {
                alert(obj.message);
            }
            else if(obj.status == '1')
            {
                alert('Product added in micro site successfully.');
                self.location.reload();
            }
        });
}

function delete_site_product(id)
{
    if(window.confirm('Are you sure, you want to remove this product from this micro site?'))
    {
        show_overlay();
        $.ajax({
            method: "GET",
            url: "/admin/delete-micro-site-item",
            data: {id: id}
        })
            .done(function( obj ) {
                hide_overlay();
                if(obj.status == '1')
                {
                    $('#tr_'+id).remove();
                }
                else
                {
                    alert('Unable to delete micro site product, please try again or contact administrator.')
                }
            });
    }
}

function update_site_product(value, id, type)
{
    $.ajax({
        method: "GET",
        url: "/admin/update-micro-site-item",
        data: {value: value, id: id, type: type}
    })
        .done(function( obj )
        {

        });
}