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
class awe_Gravity_Forms extends Widget_Base {

	public function get_name() {
		return 'awe-gravity-forms';
	}

	public function get_title() {
		return esc_html__( 'Gravity Forms', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-form';
	}

	public function get_categories() {
		return [ 'awe_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'awe-for-elementor-gravity-forms' ];
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
			'section_content_layout',
			[
				'label' => esc_html__( 'Layout', 'aa_elementor' ),
			]
		);

		$this->add_control(
			'gravity_form',
			[
				'label'   => esc_html__( 'Select Form', 'aa_elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '0',
				'options' => advanced_addons_gravity_forms_options(),
			]
		);


		$this->add_control(
		    'title_hide',
		    [
				'label'   => __( 'Title', 'aa_elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
		    ]
		);
		
		$this->add_control(
		    'description_hide',
		    [
				'label'   => __( 'Description', 'aa_elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
		    ]
		);
		
        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_style_label',
			[
				'label' => esc_html__( 'Label', 'aa_elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
		    'text_color_label',
		    [
				'label'     => __( 'Text Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
		            '{{WRAPPER}} .ad-gravity-forms .gfield label' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
				'name'     => 'typography_label',
				'label'    => __( 'Typography', 'aa_elementor' ),
				'selector' => '{{WRAPPER}} .ad-gravity-forms .gfield label',
		    ]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_input',
			[
				'label' => esc_html__( 'Input', 'aa_elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_responsive_control(
            'input_alignment',
            [
				'label'   => __( 'Alignment', 'aa_elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left'      => [
						'title' => __( 'Left', 'aa_elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'center'    => [
						'title' => __( 'Center', 'aa_elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'     => [
						'title' => __( 'Right', 'aa_elementor' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ad-gravity-forms .gfield input[type="text"], 
					 {{WRAPPER}} .ad-gravity-forms .gfield textarea' => 'text-align: {{VALUE}};',
				],
			]
		);

        $this->start_controls_tabs( 'tabs_fields_style' );

        $this->start_controls_tab(
            'tab_fields_normal',
            [
				'label' => __( 'Normal', 'aa_elementor' ),
            ]
        );

        $this->add_control(
            'field_bg_color',
            [
				'label'     => __( 'Background Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ad-gravity-forms .gfield input[type="text"], 
                     {{WRAPPER}} .ad-gravity-forms .gfield textarea, {{WRAPPER}} .ad-gravity-forms .gfield select' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'field_text_color',
            [
				'label'     => __( 'Text Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ad-gravity-forms .gfield input[type="text"], 
                     {{WRAPPER}} .ad-gravity-forms .gfield textarea, {{WRAPPER}} .ad-gravity-forms .gfield select' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'field_spacing',
            [
				'label' => __( 'Spacing', 'aa_elementor' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
                    ],
                ],
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
                    '{{WRAPPER}} .ad-gravity-forms .gfield' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

		$this->add_responsive_control(
			'field_padding',
			[
				'label'      => __( 'Padding', 'aa_elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .ad-gravity-forms .gform_wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), 
					 {{WRAPPER}} .ad-gravity-forms .gfield textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->add_responsive_control(
            'text_indent',
            [
				'label' => __( 'Text Indent', 'aa_elementor' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min'  => 0,
						'max'  => 60,
                    ],
					'%' => [
						'min'  => 0,
						'max'  => 30,
                    ],
                ],
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
                    '{{WRAPPER}} .ad-gravity-forms .gfield input[type="text"], 
                     {{WRAPPER}} .ad-gravity-forms .gfield textarea, {{WRAPPER}} .ad-gravity-forms .gfield select' => 'text-indent: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'input_width',
            [
				'label' => __( 'Input Width', 'aa_elementor' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
                    'px' => [
						'min'  => 0,
						'max'  => 1200,
                    ],
                ],
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
                    '{{WRAPPER}} .ad-gravity-forms .gfield input[type="text"], 
                     {{WRAPPER}} .ad-gravity-forms .gfield select' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'input_height',
            [
				'label' => __( 'Input Height', 'aa_elementor' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
                    'px' => [
						'min'  => 0,
						'max'  => 80,
                    ],
                ],
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
                    '{{WRAPPER}} .ad-gravity-forms .gfield input[type="text"], 
                     {{WRAPPER}} .ad-gravity-forms .gfield input[type="email"], 
                     {{WRAPPER}} .ad-gravity-forms .gfield input[type="url"], 
                     {{WRAPPER}} .ad-gravity-forms .gfield select' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'textarea_width',
            [
				'label' => __( 'Textarea Width', 'aa_elementor' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
                    'px' => [
						'min'  => 0,
						'max'  => 1200,
                    ],
                ],
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
                    '{{WRAPPER}} .ad-gravity-forms .gfield textarea' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'textarea_height',
            [
				'label' => __( 'Textarea Height', 'aa_elementor' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
                    'px' => [
						'min'  => 0,
						'max'  => 400,
                    ],
                ],
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
                    '{{WRAPPER}} .ad-gravity-forms .gfield textarea' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'        => 'field_border',
				'label'       => __( 'Border', 'aa_elementor' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} .ad-gravity-forms .gfield input[type="text"], 
								  {{WRAPPER}} .ad-gravity-forms .gfield textarea, {{WRAPPER}} .ad-gravity-forms .gfield select',
				'separator'   => 'before',
			]
		);

		$this->add_control(
			'field_radius',
			[
				'label'      => __( 'Border Radius', 'aa_elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .ad-gravity-forms .gfield input[type="text"], 
					 {{WRAPPER}} .ad-gravity-forms .gfield textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
				'name'      => 'field_typography',
				'label'     => __( 'Typography', 'aa_elementor' ),
				'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
				'selector'  => '{{WRAPPER}} .ad-gravity-forms .gfield input[type="text"], 
								{{WRAPPER}} .ad-gravity-forms .gfield textarea, {{WRAPPER}} .ad-gravity-forms .gfield select',
				'separator' => 'before',
            ]
        );

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'      => 'field_box_shadow',
				'selector'  => '{{WRAPPER}} .ad-gravity-forms .gfield input[type="text"], 
								{{WRAPPER}} .ad-gravity-forms .gfield textarea, {{WRAPPER}} .ad-gravity-forms .gfield select',
				'separator' => 'before',
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_fields_focus',
            [
				'label' => __( 'Focus', 'aa_elementor' ),
            ]
        );

        $this->add_control(
            'field_bg_color_focus',
            [
				'label'     => __( 'Background Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ad-gravity-forms .gfield input:focus, 
    				 {{WRAPPER}} .ad-gravity-forms .gfield textarea:focus' => 'background-color: {{VALUE}}',
                ],
            ]
        );

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'        => 'focus_input_border',
				'label'       => __( 'Border', 'aa_elementor' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} .ad-gravity-forms .gfield input:focus, 
								  {{WRAPPER}} .ad-gravity-forms .gfield textarea:focus',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'      => 'focus_box_shadow',
				'selector'  => '{{WRAPPER}} .ad-gravity-forms .gfield input:focus, 
				 				{{WRAPPER}} .ad-gravity-forms .gfield textarea:focus',
				'separator' => 'before',
			]
		);

        $this->end_controls_tab();

        $this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
		    'section_field_description_style',
		    [
				'label' => __( 'Field Description', 'aa_elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_control(
		    'field_description_text_color',
		    [
				'label'     => __( 'Text Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
		            '{{WRAPPER}} .ad-gravity-forms .gfield .gfield_description' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
				'name'     => 'field_description_typography',
				'label'    => __( 'Typography', 'aa_elementor' ),
				'selector' => '{{WRAPPER}} .ad-gravity-forms .gfield .gfield_description',
		    ]
		);
		
		$this->add_responsive_control(
		    'field_description_spacing',
		    [
				'label' => __( 'Spacing', 'aa_elementor' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
		            ],
		        ],
		        'size_units'            => [ 'px', 'em', '%' ],
		        'selectors'             => [
		            '{{WRAPPER}} .ad-gravity-forms .gfield .gfield_description' => 'padding-top: {{SIZE}}{{UNIT}}',
		        ],
		    ]
		);
		
		$this->end_controls_section();

        $this->start_controls_section(
            'section_field_style',
            [
				'label' => __( 'Section Field', 'aa_elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_field_text_color',
            [
				'label'     => __( 'Text Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ad-gravity-forms .gfield.gsection .gsection_title' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
				'name'      => 'section_field_typography',
				'label'     => __( 'Typography', 'aa_elementor' ),
				'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
				'selector'  => '{{WRAPPER}} .ad-gravity-forms .gfield.gsection .gsection_title',
				'separator' => 'before',
            ]
        );
        
        $this->add_control(
            'section_field_border_type',
            [
				'label'   => __( 'Border Type', 'aa_elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'none'   => __( 'None', 'aa_elementor' ),
					'solid'  => __( 'Solid', 'aa_elementor' ),
					'double' => __( 'Double', 'aa_elementor' ),
					'dotted' => __( 'Dotted', 'aa_elementor' ),
					'dashed' => __( 'Dashed', 'aa_elementor' ),
                ],
				'selectors' => [
                    '{{WRAPPER}} .ad-gravity-forms .gfield.gsection' => 'border-bottom-style: {{VALUE}}',
                ],
				'separator' => 'before',
            ]
        );
        
        $this->add_responsive_control(
            'section_field_border_height',
            [
				'label'   => __( 'Border Height', 'aa_elementor' ),
				'type'    => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
                ],
				'range' => [
                    'px' => [
						'min'  => 1,
						'max'  => 20,
                    ],
                ],
				'size_units' => [ 'px' ],
				'selectors'  => [
                    '{{WRAPPER}} .ad-gravity-forms .gfield.gsection' => 'border-bottom-width: {{SIZE}}{{UNIT}}',
                ],
				'condition' => [
					'section_field_border_type!' => 'none',
                ],
            ]
        );

        $this->add_control(
            'section_field_border_color',
            [
				'label'     => __( 'Border Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ad-gravity-forms .gfield.gsection' => 'border-bottom-color: {{VALUE}}',
                ],
				'condition' => [
                    'section_field_border_type!'   => 'none',
                ],
            ]
        );

		$this->add_responsive_control(
			'section_field_margin',
			[
				'label'      => __( 'Margin', 'aa_elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .ad-gravity-forms .gfield.gsection' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
        
        $this->end_controls_section();

        $this->start_controls_section(
            'section_price_style',
            [
				'label' => __( 'Price', 'aa_elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'price_label_color',
            [
				'label'     => __( 'Price Label Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ad-gravity-forms .gform_wrapper .ginput_product_price_label' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'price_text_color',
            [
				'label'     => __( 'Price Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ad-gravity-forms .gform_wrapper .ginput_product_price' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
            'section_placeholder_style',
            [
				'label' => __( 'Placeholder', 'aa_elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_color_placeholder',
            [
				'label'     => __( 'Text Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ad-gravity-forms .gfield input::-webkit-input-placeholder, 
                     {{WRAPPER}} .ad-gravity-forms .gfield textarea::-webkit-input-placeholder' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
            'section_radio_checkbox_style',
            [
				'label' => __( 'Radio & Checkbox', 'aa_elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'custom_radio_checkbox',
            [
				'label' => __( 'Custom Styles', 'aa_elementor' ),
				'type'  => Controls_Manager::SWITCHER,
				'prefix_class' => 'ad-custom-rc-',
            ]
        );
        
        $this->add_responsive_control(
            'radio_checkbox_size',
            [
				'label'   => __( 'Size', 'aa_elementor' ),
				'type'    => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem' ],
				'default'    => [
					'unit' => 'px',
					'size' => 20,
				],
				'range'      => [
					'px' => [
						'min' => 15,
						'max' => 50,
					],
				],
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
                     '{{WRAPPER}}.ad-custom-rc-yes .ad-gravity-forms .gform_wrapper .gfield_checkbox input[type=checkbox], 
                      {{WRAPPER}}.ad-custom-rc-yes .ad-gravity-forms .gform_wrapper .gfield_radio input[type=radio]' => 'width: {{SIZE}}{{UNIT}} !important; height:{{SIZE}}{{UNIT}};',
                ],
				'condition' => [
					'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->start_controls_tabs( 'tabs_radio_checkbox_style' );

        $this->start_controls_tab(
            'radio_checkbox_normal',
            [
				'label'     => __( 'Normal', 'aa_elementor' ),
				'condition' => [
					'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'radio_checkbox_color',
            [
				'label'     => __( 'Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}}.ad-custom-rc-yes .ad-gravity-forms .gform_wrapper .gfield_checkbox input[type=checkbox], 
                      {{WRAPPER}}.ad-custom-rc-yes .ad-gravity-forms .gform_wrapper .gfield_radio input[type=radio]' => 'background-color: {{VALUE}}',
                ],
				'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'radio_checkbox_border_width',
            [
				'label' => __( 'Border Width', 'aa_elementor' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min'  => 0,
						'max'  => 15,
                    ],
                ],
				'size_units' => [ 'px' ],
				'selectors'  => [
                    '{{WRAPPER}}.ad-custom-rc-yes .ad-gravity-forms .gform_wrapper ul.gfield_checkbox li input[type=checkbox], {{WRAPPER}}.ad-custom-rc-yes .ad-gravity-forms .gform_wrapper ul.gfield_radio li input[type=radio]' => 'border-width: {{SIZE}}{{UNIT}}',
                ],
				'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'radio_checkbox_border_color',
            [
				'label'     => __( 'Border Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}}.ad-custom-rc-yes .ad-gravity-forms .gform_wrapper ul.gfield_checkbox li input[type=checkbox], {{WRAPPER}}.ad-custom-rc-yes .ad-gravity-forms .gform_wrapper ul.gfield_radio li input[type=radio]' => 'border-color: {{VALUE}}',
                ],
				'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );
        
        $this->add_control(
            'checkbox_heading',
            [
				'label'     => __( 'Checkbox', 'aa_elementor' ),
				'type'      => Controls_Manager::HEADING,
				'condition' => [
					'custom_radio_checkbox' => 'yes',
				],
            ]
        );

		$this->add_control(
			'checkbox_border_radius',
			[
				'label'      => __( 'Border Radius', 'aa_elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}}.ad-custom-rc-yes input[type="checkbox"], 
					 {{WRAPPER}}.ad-custom-rc-yes input[type="checkbox"]:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'condition'             => [
                    'custom_radio_checkbox' => 'yes',
                ],
			]
		);
        
        $this->add_control(
            'radio_heading',
            [
				'label'     => __( 'Radio Buttons', 'aa_elementor' ),
				'type'      => Controls_Manager::HEADING,
				'condition' => [
					'custom_radio_checkbox' => 'yes',
				],
            ]
        );

		$this->add_control(
			'radio_border_radius',
			[
				'label'      => __( 'Border Radius', 'aa_elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}}.ad-custom-rc-yes input[type="radio"], 
					 {{WRAPPER}}.ad-custom-rc-yes input[type="radio"]:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'condition'             => [
                    'custom_radio_checkbox' => 'yes',
                ],
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'radio_checkbox_checked',
            [
				'label'     => __( 'Checked', 'aa_elementor' ),
				'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'radio_checkbox_color_checked',
            [
				'label'     => __( 'Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}}.ad-custom-rc-yes .ad-gravity-forms .gform_wrapper .gfield_radio input[type=radio]:checked, 
                     {{WRAPPER}}.ad-custom-rc-yes .ad-gravity-forms .gform_wrapper .gfield_checkbox input[type=checkbox]:checked, 
                     {{WRAPPER}}.ad-custom-rc-yes .ad-gravity-forms .gform_wrapper .gfield_checkbox input[type=checkbox]:indeterminate' => 'background-color: {{VALUE}}',
                ],
                'condition'             => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();
        
        $this->end_controls_section();

		$this->start_controls_section(
			'section_style_submit_button',
			[
				'label' => esc_html__( 'Submit Button', 'aa_elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_responsive_control(
			'button_align',
			[
				'label'   => __( 'Alignment', 'aa_elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left'        => [
						'title'   => __( 'Left', 'aa_elementor' ),
						'icon'    => 'eicon-h-align-left',
					],
					'center'      => [
						'title'   => __( 'Center', 'aa_elementor' ),
						'icon'    => 'eicon-h-align-center',
					],
					'right'       => [
						'title'   => __( 'Right', 'aa_elementor' ),
						'icon'    => 'eicon-h-align-right',
					],
				],
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ad-gravity-forms .gform_footer'   => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .ad-gravity-forms .gform_footer input[type="submit"]' => 'display:inline-block;'
				],
                'condition'             => [
                    'button_width_type' => 'custom',
                ],
			]
		);
        
        $this->add_control(
            'button_width_type',
            [
				'label'   => __( 'Width', 'aa_elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'custom',
				'options' => [
					'full-width' => __( 'Full Width', 'aa_elementor' ),
					'custom'     => __( 'Custom', 'aa_elementor' ),
                ],
				'prefix_class' => 'ad-gravity-form-button-',
            ]
        );
        
        $this->add_responsive_control(
            'button_width',
            [
				'label'   => __( 'Width', 'aa_elementor' ),
				'type'    => Controls_Manager::SLIDER,
				'default' => [
					'size' => '100',
					'unit' => 'px'
                ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1200,
                    ],
                ],
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
                    '{{WRAPPER}} .ad-gravity-forms .gform_footer input[type="submit"]' => 'width: {{SIZE}}{{UNIT}}',
                ],
                'condition'             => [
                    'button_width_type' => 'custom',
                ],
            ]
        );

        $this->start_controls_tabs( 'tabs_button_style' );

        $this->start_controls_tab(
            'tab_button_normal',
            [
				'label' => __( 'Normal', 'aa_elementor' ),
            ]
        );

        $this->add_control(
            'button_bg_color_normal',
            [
				'label'     => __( 'Background Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ad-gravity-forms .gform_footer input[type="submit"]' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_text_color_normal',
            [
				'label'     => __( 'Text Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ad-gravity-forms .gform_footer input[type="submit"]' => 'color: {{VALUE}}',
                ],
            ]
        );

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'        => 'button_border_normal',
				'label'       => __( 'Border', 'aa_elementor' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} .ad-gravity-forms .gform_footer input[type="submit"]',
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label'      => __( 'Border Radius', 'aa_elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .ad-gravity-forms .gform_footer input[type="submit"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label'      => __( 'Padding', 'aa_elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .ad-gravity-forms .gform_footer input[type="submit"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->add_responsive_control(
            'button_margin',
            [
				'label' => __( 'Margin Top', 'aa_elementor' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
                    ],
                ],
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
                    '{{WRAPPER}} .ad-gravity-forms .gform_footer input[type="submit"]' => 'margin-top: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_button_hover',
            [
				'label' => __( 'Hover', 'aa_elementor' ),
            ]
        );

        $this->add_control(
            'button_bg_color_hover',
            [
				'label'     => __( 'Background Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ad-gravity-forms .gform_footer input[type="submit"]:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_text_color_hover',
            [
				'label'     => __( 'Text Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ad-gravity-forms .gform_footer input[type="submit"]:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_border_color_hover',
            [
				'label'     => __( 'Border Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ad-gravity-forms .gform_footer input[type="submit"]:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        
        $this->end_controls_tab();
        
        $this->end_controls_tabs();
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
				'name'      => 'button_typography',
				'label'     => __( 'Typography', 'aa_elementor' ),
				'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
				'selector'  => '{{WRAPPER}} .ad-gravity-forms .gform_footer input[type="submit"]',
				'separator' => 'before',
            ]
        );

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'      => 'button_box_shadow',
				'selector'  => '{{WRAPPER}} .ad-gravity-forms .gform_footer input[type="submit"]',
				'separator' => 'before',
			]
		);
        

		$this->end_controls_section();

        $this->start_controls_section(
            'section_error_style',
            [
				'label' => __( 'Errors', 'aa_elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'error_messages_heading',
            [
				'label'     => __( 'Error Messages', 'aa_elementor' ),
				'type'      => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'error_message_text_color',
            [
				'label'     => __( 'Text Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ad-gravity-forms .gfield .validation_message' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_control(
            'validation_errors_heading',
            [
				'label'     => __( 'Validation Errors', 'aa_elementor' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );

        $this->add_control(
            'validation_error_description_color',
            [
				'label'     => __( 'Error Description Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ad-gravity-forms .gform_wrapper .validation_error' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'validation_error_border_color',
            [
				'label'     => __( 'Error Border Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ad-gravity-forms .gform_wrapper .validation_error' => 'border-top-color: {{VALUE}}; border-bottom-color: {{VALUE}}',
                    '{{WRAPPER}} .ad-gravity-forms .gfield_error' => 'border-top-color: {{VALUE}}; border-bottom-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'validation_errors_bg_color',
            [
				'label'     => __( 'Error Field Background Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ad-gravity-forms .gfield_error' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'validation_error_field_label_color',
            [
				'label'     => __( 'Error Field Label Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ad-gravity-forms .gfield_error .gfield_label' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'validation_error_field_input_border_color',
            [
				'label'     => __( 'Error Field Input Border Color', 'aa_elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ad-gravity-forms .gform_wrapper li.gfield_error input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), 
                    {{WRAPPER}} .gform_wrapper li.gfield_error textarea' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'validation_error_field_input_border_width',
            [
				'label'     => __( 'Error Field Input Border Width', 'aa_elementor' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 1,
				'min'       => 1,
				'max'       => 10,
				'selectors' => [
                    '{{WRAPPER}} .ad-gravity-forms .gform_wrapper li.gfield_error input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), 
                    {{WRAPPER}} .gform_wrapper li.gfield_error textarea' => 'border-width: {{VALUE}}px',
                ],
            ]
        );
        
        $this->end_controls_section();

		$this->start_controls_section(
			'section_style_additional_option',
			[
				'label' => esc_html__( 'Additional Option', 'aa_elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'fullwidth_input',
			[
				'label'     => esc_html__( 'Fullwidth Input', 'aa_elementor' ),
				'type'      => Controls_Manager::SWITCHER,
				'selectors' => [
					'{{WRAPPER}} .field-wrap>div input:not([type*="button"])' => 'width: 100%;',
					'{{WRAPPER}} .field-wrap select'                        => 'width: 100%;',
				],
			]
		);
		
		$this->add_control(
			'fullwidth_textarea',
			[
				'label'     => esc_html__( 'Fullwidth Texarea', 'aa_elementor' ),
				'type'      => Controls_Manager::SWITCHER,
				'selectors' => [
					'{{WRAPPER}} .field-wrap textarea' => 'width: 100%;',
				],
			]
		);
		
		$this->add_control(
			'fullwidth_button',
			[
				'label'     => esc_html__( 'Fullwidth Button', 'aa_elementor' ),
				'type'      => Controls_Manager::SWITCHER,
				'selectors' => [
					'{{WRAPPER}} .field-wrap>div input[type*="button"]' => 'width: 100%;',
				],
			]
		);

		$this->end_controls_section();
		
    }
    
    
    private function get_shortcode() {
		$settings = $this->get_settings();

		if (!$settings['gravity_form']) {
			return '<div class="ad-alert ad-alert-warning">'.__('Please select a Contact Form From Setting!', 'aa_elementor').'</div>';
		}

		$attributes = [
			'id'          => $settings['gravity_form'],
			'title'       => $settings['title_hide'] ? 'true' : 'false',
			'description' => $settings['description_hide'] ? 'true' : 'false',
		];

		$this->add_render_attribute( 'shortcode', $attributes );

		$shortcode   = [];
		$shortcode[] = sprintf( '[gravityform %s]', $this->get_render_attribute_string( 'shortcode' ) );

		return implode("", $shortcode);
    }
    
    public function render_plain_content() {
		echo $this->get_shortcode();
	}

	protected function render() {
		require AWESOME_ADDONS_PATH . '/modules/gravity-forms/template/view.php';
    }
    



}
