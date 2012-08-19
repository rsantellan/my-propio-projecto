<form id="form_bookit" action="<?php echo url_for('reservas/process') ?>" method="post">
	<?php echo $form->renderHiddenFields() ?>
<div class="search">
	<div class="search-title">
    	<ul>
            <li><?php echo __('Reserva_Arrival') ?></li>
            <li><?php echo __('Reserva_Departure') ?></li>
            <li><?php echo __('Reserva_Guests') ?></li>
        </ul>
        <div style="margin-left:6px;">
        	<div class="arrival"><?php echo $form['fecha_desde']->render(array('class'=>'pickDate')); ?></div>
          <div class="departure"><?php echo $form['fecha_hasta']->render(array('class'=>'pickDate')); ?></div>
          <div class="guests"><?php echo $form['cantidad_personas']->render(); ?></div>
					<ul class='error_list'>
						<?php foreach($form->getFormattedErrors() as $error): ?>
							<li><?php echo $error; ?></li>
						<?php endforeach; ?>
					</ul>
        </div>
    </div>
</div>
<div class="separator"><img width="285" height="7" src="/images/separator2.png"></div>
<div class="book-it">
	<div class="book-it-price">
     <div class="price-pn" style="color:#72D400;"><?php echo mdCurrencyHandler::getCurrentSymbol() ?><span id="total"><?php echo $form['total']->getValue() ?></span></div>
    <div class="price-pn-details">
    <li><?php echo __('Reserva_subtotal') ?></li>
    </div>
    </div>
    <label id="esta_reservado" style="display: none">
        <?php echo __('Reserva_se encuentra ya reservado'); ?>
    </label>
    
    <button class="book" type="submit"><?php echo __('Reserva_Bookit') ?></button>
</div>
</form>
<script>
$(function(){
	var dateformat = 'yy-mm-dd';
	if($('input.pickDate').val()=='')
		$('input.pickDate').val(dateformat);
	
	var dates = $( "input.pickDate" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		changeYear: true,
		yearRange: 'c:c+5',
		dateFormat: dateformat,
		numberOfMonths: 1,
		onSelect: function( selectedDate ) {
			var option = this.id == "md_reserva_fecha_desde" ? "minDate" : "maxDate",
				instance = $( this ).data( "datepicker" ),
				date = $.datepicker.parseDate(
					instance.settings.dateFormat ||
					$.datepicker._defaults.dateFormat,
					selectedDate, instance.settings );
			dates.not( this ).datepicker( "option", option, date );
			calculateTotal();
		}
	});

	$('#form_bookit').submit(function(){
		form = $(this);            
		form.find('input.pickDate').each(function(index, obj){
			obj = $(obj);
			if(obj.val() == dateformat){
				obj.val('');
			}
		});
		$.ajax({
		        url: $(form).attr('action'),
		        data: $(form).serialize(),
		        type: 'post',
		        dataType: 'json',
		        success: function(json){
		            if(json.response == "OK"){
									window.location.href ='<?php echo url_for('reservas/index') ?>';
		            }else {
									$('#bookIt').html(json.options.body);
		            }

		        },
		        complete: function(){

		        },
		    error: function(){
		    }
		    });
		return false;
	});
	
});
function calculateTotal(){
	url = '<?php echo url_for('reservas/calculatePrice') ?>';
	data = {
			'desde': $('#md_reserva_fecha_desde').val(),
			'hasta': $('#md_reserva_fecha_hasta').val(),
			'md_apartamento_id': $('#md_reserva_md_apartamento_id').val()
			};
	$.ajax({
  	url: url,
		data: data,
		type: 'post',
		dataType: 'json',
		success: function(json){
                    $('#esta_reservado').hide();
			if(json.response == 'OK'){
                            $('.book').show();
				$('span#total').html(json.options.total);
				$('#md_reserva_total').val(json.options.total);
			}else{
                            $('.book').hide();
                            if(json.options.ocupado == true)
                            {
                                $('span#total').html('');
                                $('#md_reserva_total').val('');
                                console.info('esta ocupado');
                                $('#esta_reservado').show();
                            }
                            else
                            {
                                $('span#total').html('');
                                $('#md_reserva_total').val('');
                            }
				
			}
		}
	})
}
</script>