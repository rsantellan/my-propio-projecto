<?php
slot('novedades', true);

use_stylesheet('novedades.css');

?>
<div class="title">
    <li><img src="/images/folder.png" width="15" height="12" /></li>
		<li><a href="<?php echo url_for('@homepage') ?>"><?php echo __('Global_Home') ?></a></li>
    <li>/</li>
    <li class="current"><?php echo __('novedades_Navegacion') ?></li>
</div> 

<div class="main-content-up">
<div class="titulo green"><?php echo __("usuario_Recordar contraseña");?></div>

<h3>
  <?php echo $mdPassport->getUsername()?>
</h3>

<div class="clear"></div>

<?php if($code == "3"){ ?>
<div>
<form action="<?php echo url_for('@confirm_user_password') ?>" id="reset_password_form" onsubmit="" method="post">
<ul>
	<li>
		<?php echo $form->renderHiddenFields()?>
        <?php echo $form->renderGlobalErrors(); ?>
		<input type="hidden" name="sf_method" value="put" />
	</li>
	<li>
		<?php echo $form['id']->render(array('value'=>$mdPassport->getId()));?>
	</li>
	<li> 
		Password: 
        <div class="clear"></div>  
        <?php echo $form['password']->render();?> <?php echo $form['password']->renderError();?>
        <div class="clear"></div>  
        Re-Enter Password:
        <div class="clear"></div>  
        <?php echo $form['password_confirmation']->render();?> <?php echo $form['password_confirmation']->renderError();?>
        <div class="clear"></div>  
        <input type="submit" value="Ingresar"/>
        <div class="clear"></div>  
        </li>
</ul>
</form>
</div>
<hr/>
<?php 
}else {

        switch($this->error){
            case 1: $error = 'El tiempo expiro tendria que tirar una excepcion.';
                break;
            case 2: $error = 'El codigo de confirmacion es incorrecto. Se le ha reseteado el codigo nuevamente';
                break;
        }
?>
    <hr/><?php echo $error; ?><hr/>

<?php } ?>
</div>





