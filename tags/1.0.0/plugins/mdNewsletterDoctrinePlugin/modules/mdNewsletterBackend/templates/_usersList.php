<div id="users_right_box" class="md_right_shadow">
  <div class="md_center_right">
      <div class="md_content_right">
          <div id="add-content"> 
          
            <div id='group_new_form_div'>
              <h2><?php echo __("newsletter_seleccionar usuarios") ?></h2>
              <div id="group_form_holder" class="users_holder">
                <?php foreach($users as $user): ?>
                
                <input type="checkbox" name="user" value="<?php echo $user->getId(); ?>" onclick="mdNeewsLetterBackend.getInstance().addUsersForSending();" /> <?php echo $user->getMdUser()->getEmail();?><br/>
                  <?php //print_r($users->toArray()); ?>
                  
                <?php endforeach;?>
              </div>
              <input type="button" name="options" value="<?php echo __("newsletter_no seleccionar a ninguno") ?>" onclick="mdNeewsLetterBackend.getInstance().deselectAll()" />
              <input type="button" name="options" value="<?php echo __("newsletter_seleccionar todos") ?>" onclick="mdNeewsLetterBackend.getInstance().selectAll()" />
            </div>     
          
          </div>
      </div>
  </div>
</div>
