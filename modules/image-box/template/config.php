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
 * Elementor Perfecto awe Portfolio
 *
 * Elementor widget for awe portfolio
 *
 * @since 1.0.0
 */
class AAE_Image_Boxs extends Widget_Base {

	public function get_name() {
		return 'aae-image-box';
	}

	public function get_title() {
		return esc_html__( 'Image Box', ' aw_elementor' );
	}

	public function get_icon() {
		return 'ad ad-plus-box';
	}

	public function get_categories() {
		return [ 'awe_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'aae-image-box' ];
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
		
		$this->start_controls_section(
			'_section_info',
			[
				'label' => __( 'Image Box', ' aw_elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		/*-------------------------------------
			Visual Style
		-------------------------------------*/
        $this->add_control(
            'style',
            [
                'label'   => __( 'Visual Style', ' aw_elementor' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [
										'style1' => __( 'Style 1', ' aw_elementor' ),
										'style2' => __( 'Style 2', ' aw_elementor' ),
                ],
            ]
        );


				$repeater = new Repeater();

        $repeater->add_control(
            'title',
            [
                'label'          => __( 'Title', 'aa_elementor' ),
                'type'           => Controls_Manager::TEXT,
            ]
				);
				
				$repeater->add_control(
					'image',
					[
							'label'   => __( 'Image', 'aa_elementor' ),
							'type'    => Controls_Manager::MEDIA,
							'default' => [
									'url' => Utils::get_placeholder_image_src(),
							],
					]
			);


        
        $repeater->end_controls_tab();
        
        $repeater->end_controls_tabs();


        $this->add_control(
            'image_box',
            [
                'show_label'  => false,
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '<# print(name.slice(0,1).toUpperCase() + name.slice(1)) #>',
                'default'     => [
                    [
												'title' => 'Html',
												'image' => '',
                    ],
                    [
												'title' => 'Css',
												'image' => '',
                    ],
                    [
												'title' => 'java',
												'image' => '',
										],
										[
											'title' => 'Css',
											'image' => '',
										],
										[
											'title' => 'Html',
											'image' => '',
										],
                ]
            ]
        );

$this->end_controls_section();

$this->start_controls_section(
	'_section_style_common',
		[
				'label' => __( 'Common Style', ' aw_elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
		]
);

		$this->add_responsive_control(
			'padding',
					[
							'label'      => __( 'Padding', ' aw_elementor'),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => ['px', 'em', '%'],
							'selectors'  => [
									'{{WRAPPER}} .image-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
					]
		);

		$this->add_responsive_control(
		'margin',
				[
						'label'      => __( 'Margin', ' aw_elementor'),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => ['px', 'em', '%'],
						'selectors'  => [
								'{{WRAPPER}} .image-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
				]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
					'name' => 'p_background',
					'label' => __( 'Background Color', ' aw_elementor' ),
					'types' => [ 'classic', 'gradient'],
					'selector' => '{{WRAPPER}} .image-container',
					'condition'   => [
						'style' => [ 'style1'],
						],
			]
	);


	$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
					'name'     => 'links_border',
					'selector' => '{{WRAPPER}} .image-container',
					'condition'   => [
						'style' => [ 'style1'],
						],
			]
	);

	$this->add_responsive_control(
		'border_radius',
			[
					'label'      => __( 'Border Radius', ' aw_elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors'  => [
							'{{WRAPPER}} .image-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition'   => [
						'style' => [ 'style1'],
						],
			]
	);
		
$this->end_controls_section();

$this->start_controls_section(
	'_section_style_title',
		[
				'label' => __( 'Title Style', ' aw_elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
		]
);

			$this->add_control(
				'title_color',
						[
								'label'     => __( 'Title Color', 'aa_elementor' ),
								'type'      => Controls_Manager::COLOR,
								'selectors' => [
										'{{WRAPPER}} .image-box-title' => 'color: {{VALUE}}',
								],
						]
			);

			$this->add_responsive_control(
				'margin_bottom',
				[
						'label'      => __( 'Bottom Spaching', 'aa_elementor' ),
						'type'       => Controls_Manager::SLIDER,
						'size_units' => ['px'],
						'selectors'  => [
								'{{WRAPPER}} .image-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
						],
				]
		);

			$this->add_group_control(
					Group_Control_Typography:: get_type(),
							[
									'name'     => 'title_typography',
									'selector' => '{{WRAPPER}} .image-box-title',
									'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
							]
					);

$this->end_controls_section();



	}

	protected function render() {
		require AWESOME_ADDONS_PATH . '/modules/image-box/template/view.php';
	}

	// protected function _content_template() {
	// 	require AWESOME_ADDONS_PATH . '/modules/image-box/template/content-template.php';
	// }

}
