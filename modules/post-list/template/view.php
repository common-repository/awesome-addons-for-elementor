<?php
$settings = $this->get_settings_for_display();
$this->add_inline_editing_attributes( 'title', 'none' );
$this->add_render_attribute( 'title', 'class', 'post-list-title' );


$this->add_inline_editing_attributes( 'content', 'none' );
$this->add_render_attribute( 'content', 'class', 'post-list-content' );


$this->add_inline_editing_attributes( 'date', 'none' );
$this->add_render_attribute( 'date', 'class', 'post-list-date date' );


$this->add_inline_editing_attributes( 'author', 'none' );
$this->add_render_attribute( 'author', 'class', 'post-list-author author' );


$this->add_inline_editing_attributes( 'tags', 'none' );
$this->add_render_attribute( 'tags', 'class', 'post-list-tags tags' );


$this->add_inline_editing_attributes( 'btn', 'none' );
$this->add_render_attribute( 'btn', 'class', 'post-list-btn read-more' );

$args = array(
    'post_type'             => 'post',
    'post_status'           => 'publish',
    'posts_per_page'        => -1,
);

$single_post = new \WP_Query( $args );
?>
<?php 
  if( $single_post->have_posts() ):
        $i = 0;
      while( $single_post->have_posts() ): $single_post->the_post();
      $i++;
?>


    <?php if($settings['style'] === 'style1'):?>
        <?php if($i % 2 == 0) { ?>
            <div class="post-list">
                    <div class="meta">
                        <div class="photo" style="background-image: url(<?php the_post_thumbnail_url();?>)"></div>
                        <ul class="details">
                            <?php if($settings['show_author']):?>
                                <li <?php echo $this->get_render_attribute_string( 'author' ); ?>><a href="<?php the_permalink();?>"><?php the_author();?></a></li>
                            <?php endif;?>
                            <?php if($settings['show_date']):?>
                                <li <?php echo $this->get_render_attribute_string( 'date' ); ?>><?php the_time('F j, Y'); ?></li>
                            <?php endif;?>
                            <?php if($settings['show_category']):?>
                                <li <?php echo $this->get_render_attribute_string( 'tags' ); ?>>
                                    <?php the_tags( '<ul><li> ', '</li><li> ', '</li></ul> ' ); ?>
                                </li>
                            <?php endif;?>
                        </ul>
                    </div>
                    <div class="description">
                        <?php if($settings['show_title']):?>
                            <h1 <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php the_title();?></h1>
                        <?php endif;?>
                        <?php if($settings['show_content']):?>
                            <p <?php echo $this->get_render_attribute_string( 'content' ); ?>> <?php echo wp_trim_words(get_the_content(),25,' ');?></p>
                        <?php endif;?>
                        <p <?php echo $this->get_render_attribute_string( 'btn' ); ?>>
                            <a href="<?php the_permalink();?>">Read More</a>
                        </p>
                    </div>
                </div>
            <?php } else {?>
                <div class="post-list alt">
                    <div class="meta">
                        <div class="photo" style="background-image: url(<?php the_post_thumbnail_url();?>)"></div>
                        <ul class="details">
                            <?php if($settings['show_author']):?>
                                <li <?php echo $this->get_render_attribute_string( 'author' ); ?>><a href="#"><?php the_author();?></a></li>
                            <?php endif;?>
                            <?php if($settings['show_date']):?>
                                <li <?php echo $this->get_render_attribute_string( 'date' ); ?>><?php the_time('F j, Y'); ?></li>
                            <?php endif;?>
                            <?php if($settings['show_category']):?>
                                <li <?php echo $this->get_render_attribute_string( 'tags' ); ?>>
                                    <?php the_tags( '<ul><li> ', '</li><li> ', '</li></ul> ' ); ?>
                                </li>
                            <?php endif;?>
                        </ul>
                    </div>
                    <div class="description">
                        <?php if($settings['show_title']):?>
                            <h1 <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php the_title();?></h1>
                        <?php endif;?>
                        <?php if($settings['show_content']):?>
                            <p <?php echo $this->get_render_attribute_string( 'content' ); ?>><?php echo wp_trim_words(get_the_content(),25,' ');?></p>
                        <?php endif;?>
                            <p <?php echo $this->get_render_attribute_string( 'btn' ); ?>>
                            <a href="<?php the_permalink();?>">Read More</a>
                        </p>
                    </div>
                </div>
        
    <?php } endif;?>

<?php endwhile; wp_reset_postdata(); wp_reset_query(); endif; ?>



