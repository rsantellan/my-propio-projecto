<?php use_stylesheet('search.css') ?>
<div class="title">
  <li><img src="/images/folder.png" width="15" height="12" /></li>
  <li><a href="<?php echo url_for('@homepage') ?>"<?php echo __('Global_Home') ?></a></li>
  <li>/</li>
  <li class="current"><?php echo __('Search_navegacion') ?></li>
</div> 
<?php echo include_component('locaciones', 'title_right', array('mdLocacionId' => (isset($filter) ? $filter->getValue('md_locacion_id') : null))); ?>
<div class="main-content-up">
  <div class="col-left">
    <?php include_component('apartamentos', 'search', (isset($filter) ? array('form' => $filter) : array())) ?>
    <div id="results_loading" style="display:none"></div>
    <div class="results" id="results">
      <?php 
      include_partial('results', array('pager' => $pager));
      ?>
    </div>
  </div>
  <div class="col-right">
    <?php include_component('apartamentos', 'filters', (isset($filter) ? array('form' => $filter) : array())) ?>
  </div>
</div>

