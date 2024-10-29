<?php
 $settings = $this->get_settings_for_display();
// $this->add_inline_editing_attributes( 'title', 'none' );
// $this->add_render_attribute( 'title', 'class', 'card__header-title awe-card-title' );
?>
   <?php if($settings['style'] === 'style1'):?>
         <div class="awe-text-ani">
            <p><?php echo esc_html($settings['title']);?></p>
         </div>
   <?php endif;?>


<?php if($settings['style'] === 'style2'):?>
   <div class="awe-text-ani2">
      <h1><?php echo esc_html($settings['title']);?></h1>
   </div>
<?php endif;?>

<?php if($settings['style'] === 'style3'):?>
   <div class="inner-cutout"> 
         <h2 class="knockout"><?php echo esc_html($settings['title']);?></h2>
   </div>
<?php endif;?>

<?php if($settings['style'] === 'style4'):?>
      <h1 class="aa-text-ani4">
         <span><?php echo esc_html($settings['title']);?></span>
      </h1>
<?php endif;?>

