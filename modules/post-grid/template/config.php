<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use \Elementor\Group_Control_Background as Group_Control_Background;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Perfecto aae Portfolio
 *
 * Elementor widget for aae portfolio
 *
 * @since 1.0.0
 */
class AWE_Post_Grid extends Widget_Base {

	public function get_name() {
		return 'awe-post-grid';
	}

	public function get_title() {
		return esc_html__( 'Post Grid', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-team-member';
	}

	public function get_categories() {
		return [ 'awe_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'awe-post-grid' ];
    }

    protected  function get_profile_names() {
        return [
            'apple'          => __( 'Apple', 'aa_elementor' ),
            'behance'        => __( 'Behance', 'aa_elementor' ),
            'bitbucket'      => __( 'BitBucket', 'aa_elementor' ),
            'codepen'        => __( 'CodePen', 'aa_elementor' ),
            'delicious'      => __( 'Delicious', 'aa_elementor' ),
            'deviantart'     => __( 'DeviantArt', 'aa_elementor' ),
            'digg'           => __( 'Digg', 'aa_elementor' ),
            'dribbble'       => __( 'Dribbble', 'aa_elementor' ),
            'email'          => __( 'Email', 'aa_elementor' ),
            'facebook'       => __( 'Facebook', 'aa_elementor' ),
            'flickr'         => __( 'Flicker', 'aa_elementor' ),
            'foursquare'     => __( 'FourSquare', 'aa_elementor' ),
            'github'         => __( 'Github', 'aa_elementor' ),
            'houzz'          => __( 'Houzz', 'aa_elementor' ),
            'instagram'      => __( 'Instagram', 'aa_elementor' ),
            'jsfiddle'       => __( 'JS Fiddle', 'aa_elementor' ),
            'linkedin'       => __( 'LinkedIn', 'aa_elementor' ),
            'medium'         => __( 'Medium', 'aa_elementor' ),
            'pinterest'      => __( 'Pinterest', 'aa_elementor' ),
            'product-hunt'   => __( 'Product Hunt', 'aa_elementor' ),
            'reddit'         => __( 'Reddit', 'aa_elementor' ),
            'slideshare'     => __( 'Slide Share', 'aa_elementor' ),
            'snapchat'       => __( 'Snapchat', 'aa_elementor' ),
            'soundcloud'     => __( 'SoundCloud', 'aa_elementor' ),
            'spotify'        => __( 'Spotify', 'aa_elementor' ),
            'stack-overflow' => __( 'StackOverflow', 'aa_elementor' ),
            'tripadvisor'    => __( 'TripAdvisor', 'aa_elementor' ),
            'tumblr'         => __( 'Tumblr', 'aa_elementor' ),
            'twitch'         => __( 'Twitch', 'aa_elementor' ),
            'twitter'        => __( 'Twitter', 'aa_elementor' ),
            'vimeo'          => __( 'Vimeo', 'aa_elementor' ),
            'vk'             => __( 'VK', 'aa_elementor' ),
            'website'        => __( 'Website', 'aa_elementor' ),
            'whatsapp'       => __( 'WhatsApp', 'aa_elementor' ),
            'wordpress'      => __( 'WordPress', 'aa_elementor' ),
            'xing'           => __( 'Xing', 'aa_elementor' ),
            'yelp'           => __( 'Yelp', 'aa_elementor' ),
            'youtube'        => __( 'YouTube', 'aa_elementor' ),
        ];
    }
    

	protected function _register_controls() {
        $terms = get_terms( array(
            'taxonomy' => 'category',
            'hide_empty' => false,
        ) );
        $cat_names = array();
        foreach( $terms as $t ):
            $cat_names[$t->term_id] = $t->name;
        endforeach;

		$this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Post Section', 'aa_elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
		    'style',
				[
					'label'   => __( 'Visual Style', 'aa_elementor' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'style1',
					'options' => [
						'style1' => __( 'Style 1', 'aa_elementor' ),
						'style2' => __( 'Style 2', 'aa_elementor' ),			
						],
				]
        );

        $this->add_control(
            'cat_name',
                [
                    'label'       => __( 'From Category', 'aa_elementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'uncategorized',
                    'options' => $cat_names,
                ]
        );

        $this->add_control(
			'show_Column',
			[
				'label'   => __( 'Show Column', 'aa_elementor' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'6' => __( 'Two', 'aa_elementor' ),
					'4' => __( 'There', 'aa_elementor' ),
					'3' => __( 'Four', 'aa_elementor' ),
				],
				'default' => 4,
			]
		);

        $this->add_control(
			'posts_limit',
			[
				'label'   => esc_html__( 'Posts Limit', 'aa_elementor' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 5,
			]
        );
        
        $this->add_control(
            'custom_order',
            [
                'label' => esc_html__( 'Custom order', 'aa_elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'postorder',
            [
                'label' => esc_html__( 'Order', 'aa_elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => [
                    'DESC'  => esc_html__('Descending','aa_elementor'),
                    'ASC'   => esc_html__('Ascending','aa_elementor'),
                ],
                'condition' => [
                    'custom_order!' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => esc_html__( 'Orderby', 'aa_elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none'          => esc_html__('None','aa_elementor'),
                    'ID'            => esc_html__('ID','aa_elementor'),
                    'date'          => esc_html__('Date','aa_elementor'),
                    'name'          => esc_html__('Name','aa_elementor'),
                    'title'         => esc_html__('Title','aa_elementor'),
                    'comment_count' => esc_html__('Comment count','aa_elementor'),
                    'rand'          => esc_html__('Random','aa_elementor'),
                ],
                'condition' => [
                    'custom_order' => 'yes',
                ]
            ]
        );

        $this->add_control(
			'show_date',
			[
				'label'   => esc_html__( 'Date', 'aa_elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
        );
        
        $this->add_control(
			'show_author',
			[
				'label'   => esc_html__( 'Author', 'aa_elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_common',
            [
                'label' => __( 'Post Content', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'   => [
                    'style' => [ 'style1'],
                ],
            ]
		);

		$this->add_responsive_control(
            'content_padding',
            [
                'label'      => __( 'Content Padding', 'aa_elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_blog_post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

    
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_title',
            [
                'label' => __( 'Post Title', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'   => [
                    'style' => [ 'style1'],
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .block_post_title',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label'      => __( 'Title Bottom Spacing', 'aa_elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .block_post_title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->add_control(
            'text_color',
            [
                'label'     => __( 'Title Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .block_post_title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_meta',
            [
                'label' => __( 'Post Meta', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'   => [
                    'style' => [ 'style1'],
                ],
            ]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'post_meta_typography',
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .block_post_meta li a',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_responsive_control(
            'meta_spacing',
            [
                'label'      => __( 'Post Meta Bottom Spacing', 'aa_elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .block_post_meta li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->add_control(
            'meta_color',
            [
                'label'     => __( 'Post Meta Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .block_post_meta li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_desc',
            [
                'label' => __( 'Post Description', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'   => [
                    'style' => [ 'style1'],
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'post_desc_typography',
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .block_post_body p',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_responsive_control(
            'desc_spacing',
            [
                'label'      => __( 'Description Bottom Spacing', 'aa_elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .block_post_body' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->add_control(
            'desc_color',
            [
                'label'     => __( 'Description Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .block_post_body p' => 'color: {{VALUE}}',
                ],
            ]
        );

        
        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __( 'Button', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'   => [
                    'style' => [ 'style1'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'post_footer_typography',
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .block_post_footer a',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_responsive_control(
            'button_spacing',
            [
                'label'      => __( 'Button Bottom Spacing', 'aa_elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .block_post_footer' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->add_control(
            'button_color',
            [
                'label'     => __( 'Button Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .block_post_footer a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style2',
            [
                'label' => __( 'Section', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'   => [
                    'style' => [ 'style2','style3','style4','style5'],
                ],
            ]
        );

        $this->add_responsive_control(
            'content_padding_style2',
            [
                'label'      => __( 'Content Padding', 'aa_elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_blog_grid_post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style2_title',
            [
                'label' => __( 'Title', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'   => [
                    'style' => [ 'style2'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title2_typography',
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .blog_title',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_responsive_control(
            'title2_spacing',
            [
                'label'      => __( 'Title Bottom Spacing', 'aa_elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .blog_title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->add_control(
            'text2_color',
            [
                'label'     => __( 'Title Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style3_title',
            [
                'label' => __( 'Title', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'   => [
                    'style' => [ 'style3'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title3_typography',
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .advanced_addons_blog_grid_post.type-2 .blog_title',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_responsive_control(
            'title3_spacing',
            [
                'label'      => __( 'Title Bottom Spacing', 'aa_elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_blog_grid_post.type-2 .blog_title' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

		$this->add_control(
            'text3_color',
            [
                'label'     => __( 'Title Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_blog_grid_post.type-2 .blog_title' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style2_post_meta',
            [
                'label' => __( 'Post Meta', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'   => [
                    'style' => [ 'style2'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'post_meta2_typography',
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .post-meta',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_responsive_control(
            'meta2_spacing',
            [
                'label'      => __( 'Post Meta Bottom Spacing', 'aa_elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .post-meta' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->add_control(
            'meta2_color',
            [
                'label'     => __( 'Post Meta Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post-meta' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style3_post_meta',
            [
                'label' => __( 'Post Meta', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'   => [
                    'style' => [ 'style3','style4','style5'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'post_meta3_typography',
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .post-meta',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );


		$this->add_control(
            'meta3_color',
            [
                'label'     => __( 'Post Meta Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post-meta' => 'color: {{VALUE}}',
                ],
            ]
        );

		$this->add_control(
            'meta3_icon_color',
            [
                'label'     => __( 'Post Meta Icon Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post-meta i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style2_bg',
            [
                'label' => __( 'Background', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'   => [
                    'style' => [ 'style2'],
                ],
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label'     => __( 'Fornt Background', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_blog_grid_post.type-1 .blog_content::after' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'bg_back_color',
            [
                'label'     => __( 'Back Background', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_blog_grid_post.type-1 .blog_content::before' => 'background: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style3_desc',
            [
                'label' => __( 'Post Description', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'   => [
                    'style' => [ 'style3','style4','style5'],
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'post_desc_style3_typography',
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .post-desc',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_responsive_control(
            'desc_spacing_style3',
            [
                'label'      => __( 'Description Bottom Spacing', 'aa_elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .post-desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->add_control(
            'desc_color_style3',
            [
                'label'     => __( 'Description Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post-desc' => 'color: {{VALUE}}',
                ],
            ]
        );

        
        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style3_button',
            [
                'label' => __( 'Button', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'   => [
                    'style' => [ 'style3','style5'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'button_style3_typography',
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .post-btn',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );


		$this->add_control(
            'button_color_style3',
            [
                'label'     => __( 'Button Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style4_title',
            [
                'label' => __( 'Title', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'   => [
                    'style' => [ 'style4'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title4_typography',
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .advanced_addons_blog_grid_post.type-3 .blog_title',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_responsive_control(
            'title4_spacing',
            [
                'label'      => __( 'Title Bottom Spacing', 'aa_elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_blog_grid_post.type-3 .blog_title' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

		$this->add_control(
            'text4_color',
            [
                'label'     => __( 'Title Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_blog_grid_post.type-3 .blog_title' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style5_title',
            [
                'label' => __( 'Title', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'   => [
                    'style' => [ 'style5'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title5_typography',
                'label'    => __( 'Typography', 'aa_elementor' ),
                'selector' => '{{WRAPPER}} .advanced_addons_blog_grid_post.type-4 .blog_title',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_responsive_control(
            'title5_spacing',
            [
                'label'      => __( 'Title Bottom Spacing', 'aa_elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_blog_grid_post.type-4 .blog_title' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

		$this->add_control(
            'text5_color',
            [
                'label'     => __( 'Title Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_blog_grid_post.type-4 .blog_title' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_section();

       
		

	}

	protected function render() {
		require AWESOME_ADDONS_PATH . '/modules/post-grid/template/view.php';
    }
    
    
    

}
