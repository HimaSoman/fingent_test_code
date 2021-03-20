$(function () {

	var sidebarRequirementaddScheduleFormGroup = function(event) {
        event.preventDefault();
        var field_init_counter = $('#item-field-wrapper #field_init_counter').val();
        var field_index = parseInt(field_init_counter)+1;

        $('#item-field-wrapper .multiple-form-group').find('#field_init_counter').val(field_index);

        var $formGroup = $(this).closest('.form-group');
        var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
        var $formGroupClone = $formGroup.clone();

        $(this).toggleClass('btn-success btn-add btn-danger btn-remove').attr('data-index', field_index).html('–');

        $formGroupClone.find('[data-input="item-name"]').attr('id', 'item_name_'+field_index).attr('name', 'item_name_'+field_index).attr('data-index', field_index).val('');
        $formGroupClone.find('[data-input="item-quantity"]').attr('id', 'item_quantity_'+field_index).attr('name', 'item_quantity_'+field_index).attr('data-index', field_index).val('');
        $formGroupClone.find('[data-input="item-unitprice"]').attr('id', 'item_unitprice_'+field_index).attr('name', 'item_unitprice_'+field_index).attr('data-index', field_index).val('');
        $formGroupClone.find('[data-input="item-tax"]').attr('id', 'item_tax_'+field_index).attr('name', 'item_tax_'+field_index).attr('data-index', field_index).prop("selectedIndex", 0);
        $formGroupClone.find('[data-input="item-total-price"]').attr('id', 'item_total_price_'+field_index).attr('name', 'item_total_price_'+field_index).attr('data-index', field_index).val('');
        $formGroupClone.insertAfter($formGroup);

        var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
        if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
            $lastFormGroupLast.find('.btn-add').attr('disabled', true);
        }
    };
    var removeFormGroup = function(event) {
        event.preventDefault();
        var index = $(this).data('index');
        var $formGroup = $(this).closest('.form-group');
        var $multipleFormGroup = $formGroup.closest('.multiple-form-group');

        var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
        if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
            $lastFormGroupLast.find('.btn-add').attr('disabled', false);
        }
        $formGroup.remove();
        generateTotal();
    };

    var selectFormGroup = function(event) {
        event.preventDefault();

        var $selectGroup = $(this).closest('.input-group-select');
        var param = $(this).attr("href").replace("#", "");
        var concept = $(this).text();

        $selectGroup.find('.concept').text(concept);
        $selectGroup.find('.input-group-select-val').val(param);

    }

    var countFormGroup = function($form) {
        return $form.find('.form-group').length;
    };


    $(document).on('click', '#item-field-wrapper .multiple-form-group .btn-add', sidebarRequirementaddScheduleFormGroup);
    $(document).on('click', '#item-field-wrapper .multiple-form-group .btn-remove', removeFormGroup);



	$(document).on('change keyup', '[data-field="dynamic-input"]', function () {
		var item_name = 0, item_quantity = 0, item_unitprice=0, item_tax=0, total_price=0, tax_amount=0, total_amount=0;
		index = $(this).data('index');
		item_name = $('#item_name_'+index).val();
		item_quantity = $('#item_quantity_'+index).val();
		item_unitprice = $('#item_unitprice_'+index).val();
		item_tax = $('#item_tax_'+index).val();
		total_price = parseInt(item_unitprice)*item_quantity;
		tax_amount = parseInt(total_price)*item_tax/100;
        tax_amount = tax_amount.toFixed(2);
        total_amount = parseFloat(total_price)+parseFloat(tax_amount);
        total_amount = total_amount.toFixed(2);
        if ( item_quantity != '' && item_unitprice !='' ) {
	        $('#item_total_price_'+index).val(total_amount);
        	generateTotal();
	    }
	});

	$(document).on('change keyup', '[data-field="discount"]', function () {
        generateTotal();
	});





});


function formReset(form_id) {
	$('form#'+form_id)[0].reset();
}

function generateTotal() {
	var subtotal_with_tax= 0, row_total = 0, discount = 0;
	var index = $('#field_init_counter').val();
	for( i = 1; i <= index; i++ ) {
		row_total = $('#item_total_price_'+i).val();
		if ( row_total != undefined) {
			subtotal_with_tax = parseFloat(subtotal_with_tax)+parseFloat(row_total);
		}
	}
	discount = $('#discount').val();
	if ( discount != undefined) {
		var discount = (discount/100).toFixed(2);
		var deduct_amount = parseFloat(subtotal_with_tax)*parseFloat(discount);
		var discounted_amount = parseFloat(subtotal_with_tax)-parseFloat(deduct_amount);
	}
	$(document).find('#subtotal_with_tax').val(subtotal_with_tax);
	$(document).find('#total').val(discounted_amount.toFixed(2));
	return true;
}