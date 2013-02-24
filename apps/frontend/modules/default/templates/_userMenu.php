<li class="green logged;"><a href="#"><?php echo $sf_user->getProfile()->getName() . ' ' . $sf_user->getProfile()->getLastName() ?></a>
    <ul>
        <li><a href="<?php echo url_for('profile', $sf_user->getMdUser()); ?>"><?php echo __('Usuario_Ver perfil') ?></a> - </li>
        <li><a href="<?php echo url_for('@logout'); ?>"><?php echo __('Usuario_Salir') ?></a></li>
    </ul>
</li>
