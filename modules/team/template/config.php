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
class AA_Team extends Widget_Base {

	public function get_name() {
		return 'aae-team';
	}

	public function get_title() {
		return esc_html__( 'Team Member', 'aa_elementor' );
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
            'image',
            [
                'label'   => __( 'Photo', 'aa_elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        

        $this->add_control(
            'title',
            [
                'label'       => __( 'Name', 'aa_elementor' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Raihan Islam', 'aa_elementor' ),
                'placeholder' => __( 'Type Member Name', 'aa_elementor' ),
            ]
        );

        $this->add_control(
            'job_title',
            [
                'label'       => __( 'Position', 'aa_elementor' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Web Developer', 'aa_elementor' ),
                'placeholder' => __( 'Type Member Position', 'aa_elementor' ),
            ]
        );

        $this->add_control(
            'pro_link',
            [
                'label'       => __( 'Profile Link', 'aa_elementor' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => __( '#', 'aa_elementor' ),
                'placeholder' => __( 'Profile Link', 'aa_elementor' ),
                'condition'   => [
                    'style' => [ 'style5'],
                    ],
            ]
        );

        $this->add_control(
            'desc',
            [
                'label'       => __( 'Content', 'aa_elementor' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Type Member Content', 'aa_elementor' ),
                'default'     => 'Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.',
                'condition'   => [
                    'style' => [ 'style2','style4'],
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
                'default' => 'h5',
                'toggle'  => false,
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            '_section_social',
            [
                'label' => __( 'Social Profiles', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition'   => [
                    'style' => [ 'style1','style2','style3','style4'],
                    ],
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'name',
            [
                'label'          => __( 'Profile Name', 'aa_elementor' ),
                'type'           => Controls_Manager::SELECT2,
                'select2options' => [
                    'allowClear' => false,
                ],
                'options' => self::get_profile_names()
            ]
        );

        $repeater->add_control(
            'link', [
                'label'         => __( 'Profile Link', 'aa_elementor' ),
                'placeholder'   => __( 'Add your profile link', 'aa_elementor' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => false,
                'autocomplete'  => false,
                'show_external' => false,
                'condition'     => [
                    'name!' => 'email'
                ]
            ]
        );

        $repeater->add_control(
            'email', [
                'label'       => __( 'Email Address', 'aa_elementor' ),
                'placeholder' => __( 'Add your email address', 'aa_elementor' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => false,
                'input_type'  => 'email',
                'condition'   => [
                    'name' => 'email'
                ]
            ]
        );


        $repeater->end_controls_tab();
        $repeater->start_controls_tab(
            '_tab_icon_hover',
            [
                'label' => __( 'Hover', 'aa_elementor' ),
            ]
        );


        $repeater->end_controls_tab();
        $repeater->end_controls_tabs();

        $this->add_control(
            'show_profiles',
            [
                'label'        => __( 'Show Profiles', 'plugin-domain' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'aa_elementor' ),
                'label_off'    => __( 'Hide', 'aa_elementor' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'profiles',
            [
                'show_label'  => false,
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '<# print(name.slice(0,1).toUpperCase() + name.slice(1)) #>',
                'default'     => [
                    [
                        'link' => ['url' => 'https://facebook.com/'],
                        'name' => 'facebook'
                    ],
                    [
                        'link' => ['url' => 'https://twitter.com/'],
                        'name' => 'twitter'
                    ],
                    [
                        'link' => ['url' => 'https://linkedin.com/'],
                        'name' => 'linkedin'
                    ]
                ]
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
                    'selector' => '{{WRAPPER}} .advanced_addons_team_member',
                    
                ]
                
            );
            $this->add_group_control(
            Group_Control_Box_Shadow:: get_type(),
            [
                'name'     => 'team_box_shadow',
                'selector' => '{{WRAPPER}} .advanced_addons_team_member'
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __( 'Name', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label'      => __( 'Content Padding', 'aa_elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_team_member' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            '_heading_title',
            [
                'type'      => Controls_Manager::HEADING,
                'label'     => __( 'Name', 'aa_elementor' ),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label'      => __( 'Bottom Spacing', 'aa_elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .ad-member-name' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => __( 'Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-member-name' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'title_typography',
                'selector' => '{{WRAPPER}} .ad-member-name',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

        
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_job',
            [
                'label' => __( 'Job Description', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'job_title_spacing',
            [
                'label'      => __( 'Bottom Spacing', 'aa_elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .ad-member-position' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'job_title_color',
            [
                'label'     => __( 'Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-member-position' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'job_title_typography',
                'selector' => '{{WRAPPER}} .ad-member-position',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow:: get_type(),
            [
                'name'     => 'job_title_text_shadow',
                'selector' => '{{WRAPPER}} .ad-member-position',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_desc',
            [
                'label' => __( 'Description', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'   => [
                       'style' => ['style2','style4'],
                ],
            ]
        );

        $this->add_control(
            'desc_title_color',
            [
                'label'     => __( 'Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-member-desc' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'desc_title_typography',
                'selector' => '{{WRAPPER}} .ad-member-desc',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow:: get_type(),
            [
                'name'     => 'desc_title_text_shadow',
                'selector' => '{{WRAPPER}} .ad-member-desc',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_social',
            [
                'label' => __( 'Social Icons', 'aa_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'   => [
                    'style' => [ 'style1','style2','style3','style4'],
                    ],
            ]
        );

        $this->add_responsive_control(
            'links_spacing',
            [
                'label'      => __( 'Right Spacing', 'aa_elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .ad-member-links li > a:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'links_padding',
            [
                'label'      => __( 'Padding', 'aa_elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .ad-member-links li > a' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'links_icon_size',
            [
                'label'      => __( 'Icon Size', 'aa_elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .ad-member-links li > a' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border:: get_type(),
            [
                'name'     => 'links_border',
                'selector' => '{{WRAPPER}} .ad-member-links li > a'
            ]
        );

        $this->add_responsive_control(
            'links_border_radius',
            [
                'label'      => __( 'Border Radius', 'aa_elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .ad-member-links li > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs( '_tab_links_colors' );
        $this->start_controls_tab(
            '_tab_links_normal',
            [
                'label' => __( 'Normal', 'aa_elementor' ),
            ]
        );

        $this->add_control(
            'links_color',
            [
                'label'     => __( 'Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-member-links li > a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'links_bg_color',
            [
                'label'     => __( 'Background Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-member-links li > a' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->start_controls_tab(
            '_tab_links_hover',
            [
                'label' => __( 'Hover', 'aa_elementor' ),
            ]
        );

        $this->add_control(
            'links_hover_color',
            [
                'label'     => __( 'Text Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-member-links li > a:hover, {{WRAPPER}} .ad-member-links li > a:focus' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'links_hover_bg_color',
            [
                'label'     => __( 'Background Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-member-links li > a:hover, {{WRAPPER}} .ad-member-links li > a:focus' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'links_hover_border_color',
            [
                'label'     => __( 'Border Color', 'aa_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-member-links li > a:hover, {{WRAPPER}} .ad-member-links li > a:focus' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'links_border_border!' => '',
                ]
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
		

	}

	protected function render() {
		require AWESOME_ADDONS_PATH . '/modules/team/template/view.php';
    }
    
    
    

}
