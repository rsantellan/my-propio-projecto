
<form class="form-search" method="post" id="md_narrow_search" action="<?php echo url_for('@buscador') ?>">
	<?php echo $form->renderHiddenFields() ?>

<?php if(isset($home)): ?>
	<div class="autocompletehome">
 	<?php echo $form['md_locacion_id'] ?>
	</div>
	                    <div class="div-search"><button class="search" type="submit"><?php echo __('Search_search') ?></button></div>
      <div class="campos">    
<?php $form['fecha']->getWidget()->setOption('template','
          <li class="date">
              <p>' . __('Search_Arrival') . '</p>
              <div>%from_date%</div>
          </li>
          <li class="date">
              <p>' . __('Search_Departure') . '</p>
              <div>%to_date%</div>
          </li>
') ?>
<?php echo $form['fecha']->render(array('class'=>'date')) ?>
          <li>
              <p><?php echo __('Search_guests') ?></p>
              <div><?php echo $form['cantidad_personas'] ?></div>
          </li>
      </div>   


<?php $jquery_id = 'li.date div input'; ?>
<?php else: ?>
	
<div class="search">
	<div class="autocomplete">
 	<?php echo $form['md_locacion_id'] ?>
	</div>
    <div class="search-inside">
				<?php $form['fecha']->getWidget()->setOption('template','
				<div class="arrival">%from_date%</div>
        <div class="departure">%to_date%</div>
				') ?>
				<?php echo $form['fecha'] ?>
        <div class="guests"><?php echo $form['cantidad_personas']->render() ?></div>
<?php if(count($form->getFormattedErrors())>0): ?>
				<div class="error"><?php echo implode('<br>', $form->getFormattedErrors()) ?></div>
<?php endif; ?>
    </div>
    <button class="buscar" type="submit"><?php echo __('Apartamento_search') ?></button>
 </div>

<?php $jquery_id = 'div.arrival input,div.departure input'; ?>	
<?php endif; ?>
</form>
<script>
$(function(){
	var dateformat = 'yy-mm-dd';
	if($('<?php echo $jquery_id; ?>').val()=='')
		$('<?php echo $jquery_id; ?>').val(dateformat);
	
	var dates = $( "<?php echo $jquery_id; ?>" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		changeYear: true,
		yearRange: 'c:c+5',
		dateFormat: dateformat,
		numberOfMonths: 1,
		onSelect: function( selectedDate ) {
			var option = this.id == "md_apartamento_search_filters_fecha_from" ? "minDate" : "maxDate",
				instance = $( this ).data( "datepicker" ),
				date = $.datepicker.parseDate(
					instance.settings.dateFormat ||
					$.datepicker._defaults.dateFormat,
					selectedDate, instance.settings );
			dates.not( this ).datepicker( "option", option, date );
		}
	});

	$('form.form-search').submit(function(event){
		form = $(this);            
		form.find('<?php echo $jquery_id; ?>').each(function(index, obj){
			obj = $(obj);
			if(obj.val() == dateformat){
				obj.val('');
			}
		});
		if($('#md_narrow_search_form_2').length > 0){
			event.preventDefault();
			form1data = form.serialize();
			form2data = $('#md_narrow_search_form_2').serialize();
			$('#results_loading').show();
			$.ajax({
				url: form.attr('action'),
				data: form1data + '&' + form2data,
				type: 'post',
				success: function(response){
					$('#results').html(response);
				},
				complete: function(){
					$('#results_loading').hide();
				},
				error: function(){
				}
			});
		}
		
	});
	
});
</script>
