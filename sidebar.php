<?php if ( is_active_sidebar('sidebar-widget-area') ) : ?>
  <?php dynamic_sidebar('sidebar-widget-area'); ?>
<?php else: ?>
  <div class="sidebar-module"> 
    <h4>Add Your Widgets to this Main Sidebar</h4>
  </div>
<?php endif; ?>