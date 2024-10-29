<?php
$settings = $this->get_settings_for_display();
$this->add_inline_editing_attributes( 'list-title', 'none' );
$this->add_render_attribute( 'list-title', 'class', 'aa-list-title' );

$this->add_inline_editing_attributes( 'list-number', 'none' );
$this->add_render_attribute( 'list-number', 'class', 'aa-list-number' );

$this->add_inline_editing_attributes( 'list-text', 'none' );
$this->add_render_attribute( 'list-text', 'class', 'aa-list-text' );

$target = $settings['link']['is_external'] ? ' target="_blank"' : '';
$nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';
?>
<?php if($settings['style'] == 'style1') :?>
  <div class="widget-list">
        <ul class="tilesWrap">
            <li>
                <h2 <?php echo $this->get_render_attribute_string( 'list-number' ); ?>><?php echo esc_html($settings['number']);?></h2>
                <h3 <?php echo $this->get_render_attribute_string( 'list-title' ); ?>><?php echo esc_html($settings['title']);?></h3>
                <p <?php echo $this->get_render_attribute_string( 'list-text' ); ?>>
                    <?php echo esc_html($settings['text']);?>
                </p>
                <a class="list-btn" href="<?php echo esc_url($settings['link']['url'])?>" <?php echo esc_attr($target);?> <?php echo esc_attr($nofollow);?>><?php echo esc_html($settings['btn_text']);?></a>
            </li>
        </ul>
  </div>
<?php endif; ?>

       