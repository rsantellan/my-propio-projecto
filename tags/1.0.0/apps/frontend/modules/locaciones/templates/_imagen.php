<?php if(isset($imagen) and isset($locacion)): ?>
<?php for($i=0;$i<count($imagen);$i++): ?>
				<a  href="<?php echo url_for('locacion',$locacion[$i]); ?>" alt="<?php echo $locacion[$i]->getNombre() ?>" >
        <img class="promo" src="<?php echo $imagen[$i]->getUrl(array(mdWebOptions::CODE => mdWebCodes::ORIGINAL)); ?>" style="<?php if($i != 0) echo ' display:none;' ?>" /></a>
<?php endfor; ?>
<?php endif; ?>
<style>
.col-right img {
  bottom: 75px;
  position: absolute;
  right: 0;
}
.col-right {
  float: right;
  height: 421px;
  margin-right: 30px;
  position: relative;
  width: 480px;
}
</style>
<script>
$(document).ready(function(){
	function changeImage(){
		var count = $('img.promo').length;
		var showItem = Math.floor(Math.random()*count);
		var i = 0;
		//console.info(showItem);
		$('img.promo').each(function(){
			if($(this).is(":visible")){
				$(this).fadeOut(500);
				//console.log(i);
				if(i == showItem){
					if(showItem == count-1){
						$('img.promo').first().fadeIn(500);
					}else showItem++;
				}
				//console.log(showItem);
			}else{
				if(i == showItem){
					$(this).fadeIn(500);
				}
			}
			i++;
		})
		timer = setTimeout(function(){changeImage()}, 5000);
	}
	var timer = setTimeout(function(){changeImage()}, 5000);
	$(document).keyup(function(e) {

	  if (e.keyCode == 27) { clearTimeout(timer) }   // esc
		if(e.keyCode == 39 ){ clearTimeout(timer); changeImage(); }
	});
});
</script>