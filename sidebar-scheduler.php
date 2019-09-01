<?php if ( is_active_sidebar('schedule-widget-area') ) : ?>
  <?php dynamic_sidebar('schedule-widget-area'); ?>
<?php else: ?>
  <div class="sidebar-module"> 
    <h4>Add Your Scheduler Widget Here</h4>
  </div>
<?php endif; ?>