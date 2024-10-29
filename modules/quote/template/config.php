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
class Quote extends Widget_Base {

	public function get_name() {
		return 'awe-quote';
	}

	public function get_title() {
		return esc_html__( 'Quote', ' aw_elementor' );
	}

	public function get_icon() {
		return 'ad ad-quote';
	}

	public function get_categories() {
		return [ 'awe_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'awe-quote' ];
	}

	protected  function get_profile_names() {
		return [
				'apple' => __( 'Apple', 'aa_elementor' ),
				'behance' => __( 'Behance', 'aa_elementor' ),
				'bitbucket' => __( 'BitBucket', 'aa_elementor' ),
				'codepen' => __( 'CodePen', 'aa_elementor' ),
				'delicious' => __( 'Delicious', 'aa_elementor' ),
				'deviantart' => __( 'DeviantArt', 'aa_elementor' ),
				'digg' => __( 'Digg', 'aa_elementor' ),
				'dribbble' => __( 'Dribbble', 'aa_elementor' ),
				'email' => __( 'Email', 'aa_elementor' ),
				'facebook' => __( 'Facebook', 'aa_elementor' ),
				'flickr' => __( 'Flicker', 'aa_elementor' ),
				'foursquare' => __( 'FourSquare', 'aa_elementor' ),
				'github' => __( 'Github', 'aa_elementor' ),
				'houzz' => __( 'Houzz', 'aa_elementor' ),
				'instagram' => __( 'Instagram', 'aa_elementor' ),
				'jsfiddle' => __( 'JS Fiddle', 'aa_elementor' ),
				'linkedin' => __( 'LinkedIn', 'aa_elementor' ),
				'medium' => __( 'Medium', 'aa_elementor' ),
				'pinterest' => __( 'Pinterest', 'aa_elementor' ),
				'product-hunt' => __( 'Product Hunt', 'aa_elementor' ),
				'reddit' => __( 'Reddit', 'aa_elementor' ),
				'slideshare' => __( 'Slide Share', 'aa_elementor' ),
				'snapchat' => __( 'Snapchat', 'aa_elementor' ),
				'soundcloud' => __( 'SoundCloud', 'aa_elementor' ),
				'spotify' => __( 'Spotify', 'aa_elementor' ),
				'stack-overflow' => __( 'StackOverflow', 'aa_elementor' ),
				'tripadvisor' => __( 'TripAdvisor', 'aa_elementor' ),
				'tumblr' => __( 'Tumblr', 'aa_elementor' ),
				'twitch' => __( 'Twitch', 'aa_elementor' ),
				'twitter' => __( 'Twitter', 'aa_elementor' ),
				'vimeo' => __( 'Vimeo', 'aa_elementor' ),
				'vk' => __( 'VK', 'aa_elementor' ),
				'website' => __( 'Website', 'aa_elementor' ),
				'whatsapp' => __( 'WhatsApp', 'aa_elementor' ),
				'wordpress' => __( 'WordPress', 'aa_elementor' ),
				'xing' => __( 'Xing', 'aa_elementor' ),
				'yelp' => __( 'Yelp', 'aa_elementor' ),
				'youtube' => __( 'YouTube', 'aa_elementor' ),
		];
}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'_section_info',
			[
				'label' => __( 'Quote', ' aw_elementor' ),
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


			$this->add_control(
					'title',
						[
							'label'       => __( 'Title', ' aw_elementor' ),
							'type'        => Controls_Manager::TEXT,
							'placeholder' => __( 'Enter Title', ' aw_elementor' ),
							'default'     => __( 'Title', ' aw_elementor' ),
							'label_block' => true,
							'condition'   => [
								'style' => [ 'style1'],
								],
						]
			);

			$this->add_control(
				'first_content',
					[
						'label'       => __( 'First Content', ' aw_elementor' ),
						'type'        => Controls_Manager::TEXT,
						'placeholder' => __( 'Enter First Content', ' aw_elementor' ),
						'default'     => __( 'Intuitive design happens when', ' aw_elementor' ),
						'label_block' => true,
						'condition'   => [
							'style' => [ 'style2'],
							],
					]
		);

		$this->add_control(
			'second_content',
				[
					'label'       => __( 'Second Content', ' aw_elementor' ),
					'type'        => Controls_Manager::TEXT,
					'placeholder' => __( 'Enter Second Content', ' aw_elementor' ),
					'default'     => __( 'current knowledge is the same as the', ' aw_elementor' ),
					'label_block' => true,
					'condition'   => [
						'style' => [ 'style2'],
						],
				]
	);

	$this->add_control(
		'third_content',
			[
				'label'       => __( 'Third Content', ' aw_elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Third Content', ' aw_elementor' ),
				'default'     => __( 'target knowledge', ' aw_elementor' ),
				'label_block' => true,
				'condition'   => [
					'style' => [ 'style2'],
					],
			]
);

$this->add_control(
	'author',
		[
			'label'       => __( 'Author', ' aw_elementor' ),
			'type'        => Controls_Manager::TEXT,
			'placeholder' => __( 'Enter Author', ' aw_elementor' ),
			'default'     => __( '—Jared Spool', ' aw_elementor' ),
			'label_block' => true,
			'condition'   => [
				'style' => [ 'style2'],
				],
		]
);

$this->add_control(
	'position',
		[
			'label'       => __( 'Position', ' aw_elementor' ),
			'type'        => Controls_Manager::TEXT,
			'placeholder' => __( 'Enter Position', ' aw_elementor' ),
			'default'     => __( 'Web Site Usability: A Designers Guide', ' aw_elementor' ),
			'label_block' => true,
			'condition'   => [
				'style' => [ 'style2'],
				],
		]
);


			
			$this->add_control(
				'content',
						[
							'label'       => __( 'Content', ' aw_elementor' ),
							'type'        => Controls_Manager::TEXTAREA,
							'placeholder' => __( 'Enter Content', ' aw_elementor' ),
							'default'     => __( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta dolor praesentium at quod autem omnis', ' aw_elementor' ),
							'label_block' => true,
							'condition'   => [
								'style' => [ 'style1'],
								],
						]
			);
			
		

			$this->add_responsive_control(
				'align',
				[
						'label'   => __( 'Alignment', 'aa_elementor' ),
						'type'    => Controls_Manager::CHOOSE,
						'options' => [
								'left' => [
										'title' => __( 'Left', 'aa_elementor' ),
										'icon'  => 'fa fa-align-left',
								],
								'center' => [
										'title' => __( 'Center', 'aa_elementor' ),
										'icon'  => 'fa fa-align-center',
								],
								'right' => [
										'title' => __( 'Right', 'aa_elementor' ),
										'icon'  => 'fa fa-align-right',
								],
								'justify' => [
										'title' => __( 'Justify', 'aa_elementor' ),
										'icon'  => 'fa fa-align-justify',
								],
						],
						'toggle'    => true,
						'selectors' => [
								'{{WRAPPER}}' => 'text-align: {{VALUE}}'
						],
						'condition'   => [
							'style' => [ 'style1'],
							],
				]
		);

		$this->add_control(
			'title_tag',
			[
					'label'   => __( 'Title HTML Tag', 'aa_elementor' ),
					'type'    => Controls_Manager::CHOOSE,
					'options' => [
							'h1'  => [
									'title' => __( 'H1', 'aa_elementor' ),
									'icon'  => 'eicon-editor-h1'
							],
							'h2'  => [
									'title' => __( 'H2', 'aa_elementor' ),
									'icon'  => 'eicon-editor-h2'
							],
							'h3'  => [
									'title' => __( 'H3', 'aa_elementor' ),
									'icon'  => 'eicon-editor-h3'
							],
							'h4'  => [
									'title' => __( 'H4', 'aa_elementor' ),
									'icon'  => 'eicon-editor-h4'
							],
							'h5'  => [
									'title' => __( 'H5', 'aa_elementor' ),
									'icon'  => 'eicon-editor-h5'
							],
							'h6'  => [
									'title' => __( 'H6', 'aa_elementor' ),
									'icon'  => 'eicon-editor-h6'
							]
					],
					'default' => 'h3',
					'toggle'  => false,
			]
	);

		

$this->end_controls_section();

$this->start_controls_section(
	'_section_style_common',
		[
				'label' => __( 'Common Style', ' aw_elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'   => [
					'style' => [ 'style1'],
					],
		]
);

		$this->add_responsive_control(
			'padding',
					[
							'label'      => __( 'Padding', ' aw_elementor'),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => ['px', 'em', '%'],
							'selectors'  => [
									'{{WRAPPER}} .quote-con' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .quote-con' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
				]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
					'name' => 'p_background',
					'label' => __( 'Background Color', ' aw_elementor' ),
					'types' => [ 'classic', 'gradient'],
					'selector' => '{{WRAPPER}} .quote1 .text',
					'condition'   => [
						'style' => [ 'style1'],
						],
			]
	);


	$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
					'name'     => 'links_border',
					'selector' => '{{WRAPPER}} .quote1 .text',
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
							'{{WRAPPER}} .quote1 .text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'condition'   => [
					'style' => [ 'style1'],
					],
		]
);

			$this->add_control(
				'title_color',
						[
								'label'     => __( 'Title Color', 'aa_elementor' ),
								'type'      => Controls_Manager::COLOR,
								'selectors' => [
										'{{WRAPPER}} .awe-quote-title' => 'color: {{VALUE}}',
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
								'{{WRAPPER}} .awe-quote-title' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
						],
				]
		);

			$this->add_group_control(
					Group_Control_Typography:: get_type(),
							[
									'name'     => 'title_typography',
									'selector' => '{{WRAPPER}} .awe-quote-title',
									'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
							]
					);

$this->end_controls_section();

$this->start_controls_section(
	'_section_style_subtitle',
		[
				'label' => __( 'Content Style', ' aw_elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'   => [
					'style' => [ 'style1'],
					],
		]
);

			$this->add_control(
				'subtitle_color',
						[
								'label'     => __( 'Content Color', 'aa_elementor' ),
								'type'      => Controls_Manager::COLOR,
								'selectors' => [
										'{{WRAPPER}} .awe-quote-content' => 'color: {{VALUE}}',
								],
						]
			);


			$this->add_group_control(
					Group_Control_Typography:: get_type(),
							[
									'name'     => 'subtitle_typography',
									'selector' => '{{WRAPPER}} .awe-quote-content',
									'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
							]
					);

$this->end_controls_section();

$this->start_controls_section(
	'_section_style_icon',
		[
				'label' => __( 'Icon Style', ' aw_elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'   => [
					'style' => [ 'style1'],
					],
		]
);

			$this->add_control(
				'icon_color',
						[
								'label'     => __( 'Icon Color', 'aa_elementor' ),
								'type'      => Controls_Manager::COLOR,
								'selectors' => [
										'{{WRAPPER}} .quote-con i' => 'color: {{VALUE}}',
								],
						]
			);

$this->end_controls_section();

$this->start_controls_section(
	'_section_style_borders',
		[
				'label' => __( 'Border Style', ' aw_elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'   => [
					'style' => [ 'style1'],
					],
		]
);

		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
					'name'     => 'border_top',
					'selector' => '{{WRAPPER}} .quote1:after,.quote1:before',
			]
		);

		$this->add_responsive_control(
		'border_top_radius',
			[
					'label'      => __( 'Border Radius', ' aw_elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors'  => [
							'{{WRAPPER}} .quote1:after,.quote1:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				
			]
		);

$this->end_controls_section();

$this->start_controls_section(
	'_section_style2_common',
		[
				'label' => __( 'Common Style', ' aw_elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'   => [
					'style' => [ 'style2'],
					],
		]
);

$this->add_responsive_control(
	'padding2',
			[
					'label'      => __( 'Padding', ' aw_elementor'),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => ['px', 'em', '%'],
					'selectors'  => [
							'{{WRAPPER}} .blockquote h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
			]
);

$this->add_responsive_control(
'margin2',
		[
				'label'      => __( 'Margin', ' aw_elementor'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
						'{{WRAPPER}} .blockquote h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
		]
);
$this->add_group_control(
	Group_Control_Background::get_type(),
	[
			'name' => 'p_background2',
			'label' => __( 'Background Color', ' aw_elementor' ),
			'types' => [ 'classic', 'gradient'],
			'selector' => '{{WRAPPER}} .blockquote h1',
			
	]
);


$this->add_group_control(
	Group_Control_Border:: get_type(),
	[
			'name'     => 'links_border2',
			'selector' => '{{WRAPPER}} .blockquote h1',
			
			
	]
);

$this->add_responsive_control(
'border_radius2',
	[
			'label'      => __( 'Border Radius', ' aw_elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors'  => [
					'{{WRAPPER}} .blockquote h1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
			
	]
);

$this->end_controls_section();
$this->start_controls_section(
	'_section_style2_quote',
		[
				'label' => __( 'Quote After Style', ' aw_elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'   => [
					'style' => [ 'style2'],
					],
		]
);

$this->add_control(
	'after_color',
			[
					'label'     => __( 'After Border Color', 'aa_elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
							'{{WRAPPER}} .blockquote h1:after' => 'border-color: {{VALUE}}',
					],
			]
);

$this->add_control(
	'after_width',
			[
					'label'     => __( 'After Border Width', 'aa_elementor' ),
					'type'      => Controls_Manager::NUMBER,
					'selectors' => [
							'{{WRAPPER}} .blockquote h1:after' => 'border-width: {{VALUE}}px',
					],
			]
);

$this->end_controls_section();

$this->start_controls_section(
	'_section_style2_text',
		[
				'label' => __( 'Text Style', ' aw_elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'   => [
					'style' => [ 'style2'],
					],
		]
);

$this->add_control(
	'first_content_color',
			[
					'label'     => __( 'Firts Content Color', 'aa_elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
							'{{WRAPPER}} .first' => 'color: {{VALUE}}',
					],
			]
);

$this->add_group_control(
	Group_Control_Typography:: get_type(),
			[
					'name'     => 'first_typography',
					'selector' => '{{WRAPPER}} .first',
					'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
			]
	);

$this->add_control(
	'second_content_color',
			[
					'label'     => __( 'Second Content Color', 'aa_elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
							'{{WRAPPER}} .changecolor' => 'color: {{VALUE}}',
					],
			]
);
$this->add_group_control(
	Group_Control_Typography:: get_type(),
			[
					'name'     => 'second_typography',
					'selector' => '{{WRAPPER}} .changecolor',
					'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
			]
	);

$this->add_control(
	'third_content_color',
			[
					'label'     => __( 'third Content Color', 'aa_elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
							'{{WRAPPER}} .third' => 'color: {{VALUE}}',
					],
			]
);
$this->add_group_control(
	Group_Control_Typography:: get_type(),
			[
					'name'     => 'third_typography',
					'selector' => '{{WRAPPER}} .third',
					'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
			]
	);

$this->end_controls_section();

$this->start_controls_section(
	'_section_style2_author',
		[
				'label' => __( 'Author Style', ' aw_elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'   => [
					'style' => [ 'style2'],
					],
		]
);
$this->add_control(
	'author_color',
			[
					'label'     => __( 'Author Color', 'aa_elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
							'{{WRAPPER}} .author' => 'color: {{VALUE}}',
					],
			]
);
$this->add_group_control(
	Group_Control_Typography:: get_type(),
			[
					'name'     => 'author_typography',
					'selector' => '{{WRAPPER}} .author',
					'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
			]
	);
$this->end_controls_section();
	}

	protected function render() {
		require AWESOME_ADDONS_PATH . '/modules/quote/template/view.php';
	}

	// protected function _content_template() {
	// 	require AWESOME_ADDONS_PATH . '/modules/quote/template/content-template.php';
	// }

}
