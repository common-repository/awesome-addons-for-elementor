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
class AA_List extends Widget_Base {

	public function get_name() {
		return 'aae-list';
	}

	public function get_title() {
		return esc_html__( 'List', 'aa_elementor' );
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
		return [ 'aae-for-elementor-team' ];
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
				'label' => __( 'Information', 'aa_elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
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
                        'style3' => __( 'Style 3', 'aa_elementor' ),
				],
			]
        );

        $this->add_control(
            'number',
                [
                    'label'       => __( 'List Number', ' aw_elementor' ),
                    'type'        => Controls_Manager::TEXT,
                    'placeholder' => __( 'Enter Number', ' aw_elementor' ),
                    'default'     => __( '1', ' aw_elementor' ),
                    'label_block' => true,
                    'condition'   => [
                        'style' => [ 'style1'],
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
            'text',
                [
                    'label'       => __( 'Description', ' aw_elementor' ),
                    'type'        => Controls_Manager::TEXTAREA,
                    'placeholder' => __( 'Enter Descriptions', ' aw_elementor' ),
                    'default'     => __( ' Lorem Ipsum is simply dummy text of the printing and typesetting   
                    industry. Lorem Ipsum has been the industrys standard dummy text ever 
                    since the 1500s.', ' aw_elementor' ),
                    'label_block' => true,
                    'condition'   => [
                        'style' => [ 'style1'],
                        ],
                ]
        );

        $this->add_control(
            'btn_text',
                [
                    'label'       => __( 'Button Text', ' aw_elementor' ),
                    'type'        => Controls_Manager::TEXT,
                    'placeholder' => __( 'Button Text', ' aw_elementor' ),
                    'default'     => __( 'Read More', ' aw_elementor' ),
                    'label_block' => true,
                    'condition'   => [
                        'style' => [ 'style1'],
                        ],
                ]
        );

        $this->add_control(
            'link',
                    [
                        'label'   => __( 'Link', 'aa_elementor' ),
                        'type'    => Controls_Manager::URL,
                        'dynamic' => [
                            'active' => true,
                        ],
                        'placeholder' => __( 'https://your-link.com', 'aa_elementor' ),
                        'default'     => [
                            'url' => '#',
                        ],
                        'condition'   => [
                            'style' => [ 'style1'],
                            ],
                    ]
                );


        $this->end_controls_section();

        


        $this->start_controls_section(
            '_section_default_style',
                [
                    'label' => __( 'Common Style', 'aa_elementor' ),
                    'tab'   => Controls_Manager::TAB_STYLE,
                    'condition'   => [
                        'style' => [ 'style1','style2','style4'],
                        ],
                ]
            );
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'section_bg_default_color',
                    'label' => __( 'Section  Background', 'aa_elementor' ),
                    'types' => [ 'classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .widget-list .tilesWrap li',
                    
                ]
                
            );
            $this->add_group_control(
            Group_Control_Box_Shadow:: get_type(),
            [
                'name'     => 'team_box_shadow',
                'selector' => '{{WRAPPER}} .widget-list .tilesWrap li'
            ]
        );

        $this->add_responsive_control(
			'padding',
					[
						'label'      => __( 'Padding', ' aw_elementor'),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => ['px', 'em', '%'],
						'selectors'  => [
								'{{WRAPPER}} .widget-list .tilesWrap li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .widget-list .tilesWrap li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
				]
		);
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_number',
            [
                'label' => __( 'Number', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'number_color',
            [
                'label'     => __( 'Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .aa-list-number' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'number_typography',
                'selector' => '{{WRAPPER}} .aa-list-number',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

        
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_title',
            [
                'label' => __( 'Title', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label'      => __( 'Bottom Spacing', 'aa_elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .aa-list-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => __( 'Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .aa-list-title' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'title_typography',
                'selector' => '{{WRAPPER}} .aa-list-title',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow:: get_type(),
            [
                'name'     => 'title_text_shadow',
                'selector' => '{{WRAPPER}} .aa-list-title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_desc',
            [
                'label' => __( 'Description', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'   => [
                       'style' => ['style1'],
                ],
            ]
        );

        $this->add_control(
            'desc_title_color',
            [
                'label'     => __( 'Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .aa-list-text' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'desc_title_typography',
                'selector' => '{{WRAPPER}} .aa-list-text',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow:: get_type(),
            [
                'name'     => 'desc_title_text_shadow',
                'selector' => '{{WRAPPER}} .aa-list-text',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_btn',
            [
                'label' => __( 'Button', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'   => [
                       'style' => ['style1'],
                ],
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label'     => __( 'Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .list-btn' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
					'name' => 'p_background',
					'label' => __( 'Background Color', ' aw_elementor' ),
					'types' => [ 'classic', 'gradient'],
					'selector' => '{{WRAPPER}} .list-btn',
					
			]
	);

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'btn_typography',
                'selector' => '{{WRAPPER}} .list-btn',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_group_control(
			Group_Control_Border:: get_type(),
			[
					'name'     => 'links_border',
					'selector' => '{{WRAPPER}} .list-btn',
					
			]
	);

	$this->add_responsive_control(
		'border_radius',
			[
					'label'      => __( 'Border Radius', ' aw_elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors'  => [
							'{{WRAPPER}} .list-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
					],
					
			]
	);

        $this->end_controls_section();

		

	}

	protected function render() {
		require AWESOME_ADDONS_PATH . '/modules/list/template/view.php';
    }
    
    
    

}
