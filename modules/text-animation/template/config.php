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
class Text_Animation extends Widget_Base {

	public function get_name() {
		return 'awe-text-animation';
	}

	public function get_title() {
		return esc_html__( 'Text Animation', ' aw_elementor' );
	}

	public function get_icon() {
		return 'ad ad-text-animation';
	}

	public function get_categories() {
		return [ 'awe_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'awe-animation' ];
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
				'label' => __( 'Text Animation', ' aw_elementor' ),
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
							'style3' => __( 'Style 3', ' aw_elementor' ),
							'style4' => __( 'Style 4', ' aw_elementor' ),
					],
				]
        	);


		$this->add_control(
				'title',
					[
					'label'       => __( 'Text', ' aw_elementor' ),
					'type'        => Controls_Manager::TEXT,
					'placeholder' => __( 'Enter Text', ' aw_elementor' ),
					'default'     => __( 'Enter Text', ' aw_elementor' ),
					'label_block' => true,
					'condition'   => [
						'style' => [ 'style1','style2','style3','style4'],
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
						]
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
											'{{WRAPPER}} .awe-text-ani' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
										'{{WRAPPER}} .awe-text-ani' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
						]
				);
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
							'name' => 'p_background',
							'label' => __( 'Background Color', ' aw_elementor' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .awe-text-ani',
					]
			);
		
		
			$this->add_group_control(
					Group_Control_Border:: get_type(),
					[
							'name'     => 'links_border',
							'selector' => '{{WRAPPER}} .awe-text-ani'
					]
			);
		
			$this->add_responsive_control(
				'border_radius',
					[
							'label'      => __( 'Border Radius', ' aw_elementor' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%' ],
							'selectors'  => [
									'{{WRAPPER}} .awe-text-ani' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
					]
			);
				
		$this->end_controls_section();	
		
		$this->start_controls_section(
			'_section_style_text',
				[
						'label' => __( 'Text Style', ' aw_elementor' ),
						'tab'   => Controls_Manager::TAB_STYLE,
						'condition'   => [
							'style' => [ 'style1'],
							],
				]
			);
		
				$this->add_group_control(
					Group_Control_Background::get_type(),
						[
								'name' => 'text_background',
								'label' => __( 'Background Color', ' aw_elementor' ),
								'types' => [ 'classic', 'gradient'],
								'selector' => '{{WRAPPER}} .awe-text-ani p',
						]
				);
		
				
		
			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
						'name'     => 'title_typography',
						'selector' => '{{WRAPPER}} .awe-text-ani p',
						'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
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
											'{{WRAPPER}} .awe-text-ani2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
										'{{WRAPPER}} .awe-text-ani2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
						]
				);
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
							'name' => 'p_background2',
							'label' => __( 'Background Color', ' aw_elementor' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .awe-text-ani2',
					]
			);
		
		
			$this->add_group_control(
					Group_Control_Border:: get_type(),
					[
							'name'     => 'links_border2',
							'selector' => '{{WRAPPER}} .awe-text-ani2'
					]
			);
		
			$this->add_responsive_control(
				'border_radius2',
					[
							'label'      => __( 'Border Radius', ' aw_elementor' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%' ],
							'selectors'  => [
									'{{WRAPPER}} .awe-text-ani2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
					]
			);
				
		$this->end_controls_section();	

		$this->start_controls_section(
			'_section_style_text2',
				[
						'label' => __( 'Text Style', ' aw_elementor' ),
						'tab'   => Controls_Manager::TAB_STYLE,
						'condition'   => [
							'style' => [ 'style2'],
							],
				]
			);
		
			
			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
						'name'     => 'title2_typography',
						'selector' => '{{WRAPPER}} .awe-text-ani2 h1',
						'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
				]
			);
		
		$this->end_controls_section();


		$this->start_controls_section(
			'_section_style3_common',
				[
						'label' => __( 'Common Style', ' aw_elementor' ),
						'tab'   => Controls_Manager::TAB_STYLE,
						'condition'   => [
							'style' => [ 'style3'],
							],
				]
		);
		
				$this->add_responsive_control(
					'padding3',
							[
									'label'      => __( 'Padding', ' aw_elementor'),
									'type'       => Controls_Manager::DIMENSIONS,
									'size_units' => ['px', 'em', '%'],
									'selectors'  => [
											'{{WRAPPER}} .inner-cutout' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
									],
							]
				);
		
				$this->add_responsive_control(
				'margin3',
						[
								'label'      => __( 'Margin', ' aw_elementor'),
								'type'       => Controls_Manager::DIMENSIONS,
								'size_units' => ['px', 'em', '%'],
								'selectors'  => [
										'{{WRAPPER}} .inner-cutout' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
						]
				);
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
							'name' => 'p_background3',
							'label' => __( 'Background Color', ' aw_elementor' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .inner-cutout',
					]
			);
		
		
			$this->add_group_control(
					Group_Control_Border:: get_type(),
					[
							'name'     => 'links_border3',
							'selector' => '{{WRAPPER}} .inner-cutout'
					]
			);
		
			$this->add_responsive_control(
				'border_radius3',
					[
							'label'      => __( 'Border Radius', ' aw_elementor' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%' ],
							'selectors'  => [
									'{{WRAPPER}} .inner-cutout' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
					]
			);
				
		$this->end_controls_section();

		$this->start_controls_section(
			'_section_style_text3',
				[
						'label' => __( 'Text Style', ' aw_elementor' ),
						'tab'   => Controls_Manager::TAB_STYLE,
						'condition'   => [
							'style' => [ 'style3'],
							],
				]
			);
				
		
			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
						'name'     => 'title_typography3',
						'selector' => '{{WRAPPER}} .knockout',
						'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
				]
			);
		
		$this->end_controls_section();


		$this->start_controls_section(
			'_section_style4_common',
				[
						'label' => __( 'Common Style', ' aw_elementor' ),
						'tab'   => Controls_Manager::TAB_STYLE,
						'condition'   => [
							'style' => [ 'style4'],
							],
				]
		);
		
				$this->add_responsive_control(
					'padding4',
							[
									'label'      => __( 'Padding', ' aw_elementor'),
									'type'       => Controls_Manager::DIMENSIONS,
									'size_units' => ['px', 'em', '%'],
									'selectors'  => [
											'{{WRAPPER}} .aa-text-ani4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
									],
							]
				);
		
				$this->add_responsive_control(
				'margin4',
						[
								'label'      => __( 'Margin', ' aw_elementor'),
								'type'       => Controls_Manager::DIMENSIONS,
								'size_units' => ['px', 'em', '%'],
								'selectors'  => [
										'{{WRAPPER}} .aa-text-ani4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
						]
				);
				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
							'name' => 'p_background4',
							'label' => __( 'Background Color', ' aw_elementor' ),
							'types' => [ 'classic', 'gradient'],
							'selector' => '{{WRAPPER}} .aa-text-ani4',
					]
			);
		
		
			$this->add_group_control(
					Group_Control_Border:: get_type(),
					[
							'name'     => 'links_border4',
							'selector' => '{{WRAPPER}} .aa-text-ani4'
					]
			);
		
			$this->add_responsive_control(
				'border_radius4',
					[
							'label'      => __( 'Border Radius', ' aw_elementor' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%' ],
							'selectors'  => [
									'{{WRAPPER}} .aa-text-ani4' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
					]
			);
				
		$this->end_controls_section();

		$this->start_controls_section(
			'_section_style_text4',
				[
						'label' => __( 'Text Style', ' aw_elementor' ),
						'tab'   => Controls_Manager::TAB_STYLE,
						'condition'   => [
							'style' => [ 'style4'],
							],
				]
			);

			$this->add_control(
				'color',
				[
						'label'     => __( 'Text Color', 'aa_elementor' ),
						'type'      => Controls_Manager::COLOR,
						'selectors' => [
								'{{WRAPPER}} .aa-text-ani4 span' => 'color: {{VALUE}}',
						],
				]
		);
				
		
			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
						'name'     => 'title_typography4',
						'selector' => '{{WRAPPER}} .aa-text-ani4 span',
						'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
				]
			);

			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'box_shadow',
					'label' => __( 'Text Shadow', 'plugin-domain' ),
					'selector' => '{{WRAPPER}} .aa-text-ani4 span',
				]
			);
		
		$this->end_controls_section();

	}

	protected function render() {
		require AWESOME_ADDONS_PATH . '/modules/text-animation/template/view.php';
	}

	// protected function _content_template() {
	// 	require AWESOME_ADDONS_PATH . '/modules/text-animation/template/content-template.php';
	// }

}
