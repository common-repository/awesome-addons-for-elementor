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
class Awe_Post_List extends Widget_Base {

	public function get_name() {
		return 'awe-post-list';
	}

	public function get_title() {
		return esc_html__( 'Post List', ' aw_elementor' );
	}

	public function get_icon() {
		return 'ad ad-playing-card';
	}

	public function get_categories() {
		return [ 'awe_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'awe-post-list' ];
	}


	protected function _register_controls() {
		
		$this->start_controls_section(
			'_section_info',
			[
				'label' => __( 'Post List', ' aw_elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		/*-------------------------------------
			Visual Style
		-------------------------------------*/
        $this->add_control(
            'style',
            [
                'label'   => __( 'Visual Style', 'aa_elementor' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [
									'style1' => __( 'Style 1', ' aw_elementor' ),
                ],
            ]
        );

		$this->add_control(
			'show_title',
			[
				'label' => esc_html__( 'Title', 'aa_elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_content',
			[
				'label' => esc_html__( 'Content', 'aa_elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);


		$this->add_control(
			'show_category',
			[
				'label' => esc_html__( 'Tags', 'aa_elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_author',
			[
				'label' => esc_html__( 'Author', 'aa_elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_date',
			[
				'label' => esc_html__( 'Date', 'aa_elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

	$this->end_controls_section();

	$this->start_controls_section(
		'post_style_section',
		[
			'label' => __( 'Section', 'aa_elementor' ),
			'tab' => Controls_Manager::TAB_STYLE,
		]
	);

	$this->add_responsive_control(
		'section_padding',
		[
			'label' => __( 'Padding', 'aa_elementor' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors' => [
				'{{WRAPPER}} .post-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$this->add_responsive_control(
		'section_margin',
		[
			'label' => __( 'Margin', 'aa_elementor' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors' => [
				'{{WRAPPER}} .post-list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);


	$this->end_controls_section();

// Style Title tab section
$this->start_controls_section(
	'single_post_title_style_section',
	[
		'label' => __( 'Title', 'aa_elementor' ),
		'tab' => Controls_Manager::TAB_STYLE,
		'condition'=>[
			'show_title'=>'yes',
		]
	]
);
	$this->add_control(
		'title_color',
		[
			'label' => __( 'Color', 'aa_elementor' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .post-list-title' => 'color: {{VALUE}} !important',
			],
		]
	);

	$this->add_control(
		'title_color_before',
		[
			'label' => __( 'Before Color', 'aa_elementor' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .post-list-content:before' => 'background: {{VALUE}} !important',
			],
		]
	);

	$this->add_group_control(
		Group_Control_Typography::get_type(),
		[
			'name' => 'title_typography',
			'label' => __( 'Typography', 'aa_elementor' ),
			'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			'selector' => '{{WRAPPER}} .post-list-title',
		]
	);

	$this->add_responsive_control(
		'title_margin',
		[
			'label' => __( 'Margin', 'aa_elementor' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors' => [
				'{{WRAPPER}} .post-list-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$this->add_responsive_control(
		'title_padding',
		[
			'label' => __( 'Padding', 'aa_elementor' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors' => [
				'{{WRAPPER}} .post-list-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$this->add_responsive_control(
		'title_align',
		[
			'label' => __( 'Alignment', 'aa_elementor' ),
			'type' => Controls_Manager::CHOOSE,
			'options' => [
				'left' => [
					'title' => __( 'Left', 'aa_elementor' ),
					'icon' => 'fa fa-align-left',
				],
				'center' => [
					'title' => __( 'Center', 'aa_elementor' ),
					'icon' => 'fa fa-align-center',
				],
				'right' => [
					'title' => __( 'Right', 'aa_elementor' ),
					'icon' => 'fa fa-align-right',
				],
				'justify' => [
					'title' => __( 'Justified', 'aa_elementor' ),
					'icon' => 'fa fa-align-justify',
				],
			],
			'selectors' => [
				'{{WRAPPER}} .post-list-title' => 'text-align: {{VALUE}};',
			],
		]
	);

$this->end_controls_section();


// Style Title tab section
$this->start_controls_section(
	'single_post_content_style_section',
	[
		'label' => __( 'Content', 'aa_elementor' ),
		'tab' => Controls_Manager::TAB_STYLE,
		'condition'=>[
			'show_content'=>'yes',
		]
	]
);
	$this->add_control(
		'content_color',
		[
			'label' => __( 'Color', 'aa_elementor' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .post-list-content' => 'color: {{VALUE}}',
			],
		]
	);

	$this->add_group_control(
		Group_Control_Typography::get_type(),
		[
			'name' => 'content_typography',
			'label' => __( 'Typography', 'aa_elementor' ),
			'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			'selector' => '{{WRAPPER}} .post-list-content',
		]
	);

	$this->add_responsive_control(
		'content_margin',
		[
			'label' => __( 'Margin', 'aa_elementor' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors' => [
				'{{WRAPPER}} .post-list-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$this->add_responsive_control(
		'content_padding',
		[
			'label' => __( 'Padding', 'aa_elementor' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors' => [
				'{{WRAPPER}} .post-list-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$this->add_responsive_control(
		'content_align',
		[
			'label' => __( 'Alignment', 'aa_elementor' ),
			'type' => Controls_Manager::CHOOSE,
			'options' => [
				'left' => [
					'title' => __( 'Left', 'aa_elementor' ),
					'icon' => 'fa fa-align-left',
				],
				'center' => [
					'title' => __( 'Center', 'aa_elementor' ),
					'icon' => 'fa fa-align-center',
				],
				'right' => [
					'title' => __( 'Right', 'aa_elementor' ),
					'icon' => 'fa fa-align-right',
				],
				'justify' => [
					'title' => __( 'Justified', 'aa_elementor' ),
					'icon' => 'fa fa-align-justify',
				],
			],
			'selectors' => [
				'{{WRAPPER}} .post-list-content' => 'text-align: {{VALUE}};',
			],
		]
	);

$this->end_controls_section();

// Style Category tab section
$this->start_controls_section(
	'single_post_category_style_section',
	[
		'label' => __( 'Tags', 'aa_elementor' ),
		'tab' => Controls_Manager::TAB_STYLE,
		'condition'=>[
			'show_category'=>'yes',
		]
	]
);
	$this->add_control(
		'category_color',
		[
			'label' => __( 'Color', 'aa_elementor' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .post-list-tags' => 'color: {{VALUE}}',
			],
		]
	);

	$this->add_group_control(
		Group_Control_Typography::get_type(),
		[
			'name' => 'category_typography',
			'label' => __( 'Typography', 'aa_elementor' ),
			'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			'selector' => '{{WRAPPER}} .post-list-tags',
		]
	);

	$this->add_responsive_control(
		'category_margin',
		[
			'label' => __( 'Margin', 'aa_elementor' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors' => [
				'{{WRAPPER}} .post-list-tags' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$this->add_responsive_control(
		'category_padding',
		[
			'label' => __( 'Padding', 'aa_elementor' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors' => [
				'{{WRAPPER}} .post-list-tags' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$this->add_group_control(
		Group_Control_Background::get_type(),
		[
			'name' => 'category_background',
			'label' => __( 'Background', 'aa_elementor' ),
			'types' => [ 'classic', 'gradient' ],
			'selector' => '{{WRAPPER}} .post-list-tags',
		]
	);

$this->end_controls_section();

// Style Date tab section
$this->start_controls_section(
	'single_post_date_style_section',
	[
		'label' => __( 'Date', 'aa_elementor' ),
		'tab' => Controls_Manager::TAB_STYLE,
		'condition'=>[
			'show_date'=>'yes',
		]
	]
);
	$this->add_control(
		'date_color',
		[
			'label' => __( 'Color', 'aa_elementor' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .post-list-date' => 'color: {{VALUE}}',
			],
		]
	);

	$this->add_group_control(
		Group_Control_Typography::get_type(),
		[
			'name' => 'date_typography',
			'label' => __( 'Typography', 'aa_elementor' ),
			'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			'selector' => '{{WRAPPER}} .post-list-date',
		]
	);

	$this->add_responsive_control(
		'date_margin',
		[
			'label' => __( 'Margin', 'aa_elementor' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors' => [
				'{{WRAPPER}} .post-list-date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$this->add_responsive_control(
		'date_padding',
		[
			'label' => __( 'Padding', 'aa_elementor' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors' => [
				'{{WRAPPER}} .post-list-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$this->add_responsive_control(
		'date_align',
		[
			'label' => __( 'Alignment', 'aa_elementor' ),
			'type' => Controls_Manager::CHOOSE,
			'options' => [
				'left' => [
					'title' => __( 'Left', 'aa_elementor' ),
					'icon' => 'fa fa-align-left',
				],
				'center' => [
					'title' => __( 'Center', 'aa_elementor' ),
					'icon' => 'fa fa-align-center',
				],
				'right' => [
					'title' => __( 'Right', 'aa_elementor' ),
					'icon' => 'fa fa-align-right',
				],
				'justify' => [
					'title' => __( 'Justified', 'aa_elementor' ),
					'icon' => 'fa fa-align-justify',
				],
			],
			'selectors' => [
				'{{WRAPPER}} .post-list-date' => 'text-align: {{VALUE}};',
			],
			'default' => 'left',
		]
	);

$this->end_controls_section();


// Style Date tab section
$this->start_controls_section(
	'single_post_auth_style_section',
	[
		'label' => __( 'Author', 'aa_elementor' ),
		'tab' => Controls_Manager::TAB_STYLE,
		'condition'=>[
			'show_date'=>'yes',
		]
	]
);
	$this->add_control(
		'auth_color',
		[
			'label' => __( 'Color', 'aa_elementor' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .post-list-author' => 'color: {{VALUE}}',
			],
		]
	);

	$this->add_group_control(
		Group_Control_Typography::get_type(),
		[
			'name' => 'auth_typography',
			'label' => __( 'Typography', 'aa_elementor' ),
			'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			'selector' => '{{WRAPPER}} .post-list-author',
		]
	);

	$this->add_responsive_control(
		'auth_margin',
		[
			'label' => __( 'Margin', 'aa_elementor' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors' => [
				'{{WRAPPER}} .post-list-author' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$this->add_responsive_control(
		'auth_padding',
		[
			'label' => __( 'Padding', 'aa_elementor' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors' => [
				'{{WRAPPER}} .post-list-author' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$this->add_responsive_control(
		'auth_align',
		[
			'label' => __( 'Alignment', 'aa_elementor' ),
			'type' => Controls_Manager::CHOOSE,
			'options' => [
				'left' => [
					'title' => __( 'Left', 'aa_elementor' ),
					'icon' => 'fa fa-align-left',
				],
				'center' => [
					'title' => __( 'Center', 'aa_elementor' ),
					'icon' => 'fa fa-align-center',
				],
				'right' => [
					'title' => __( 'Right', 'aa_elementor' ),
					'icon' => 'fa fa-align-right',
				],
				'justify' => [
					'title' => __( 'Justified', 'aa_elementor' ),
					'icon' => 'fa fa-align-justify',
				],
			],
			'selectors' => [
				'{{WRAPPER}} .post-list-author' => 'text-align: {{VALUE}};',
			],
			'default' => 'left',
		]
	);

$this->end_controls_section();

$this->start_controls_section(
	'single_post_btn_style_section',
	[
		'label' => __( 'Button', 'aa_elementor' ),
		'tab' => Controls_Manager::TAB_STYLE,
	]
);
	$this->add_control(
		'btn_color',
		[
			'label' => __( 'Color', 'aa_elementor' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .post-list-btn a' => 'color: {{VALUE}}',
			],
		]
	);

	$this->add_group_control(
		Group_Control_Typography::get_type(),
		[
			'name' => 'btn_typography',
			'label' => __( 'Typography', 'aa_elementor' ),
			'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			'selector' => '{{WRAPPER}} .post-list-btn a',
		]
	);

	$this->add_responsive_control(
		'btn_margin',
		[
			'label' => __( 'Margin', 'aa_elementor' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors' => [
				'{{WRAPPER}} .post-list-btn a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$this->add_responsive_control(
		'btn_padding',
		[
			'label' => __( 'Padding', 'aa_elementor' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors' => [
				'{{WRAPPER}} .post-list-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);


$this->end_controls_section();


}

	protected function render() {
		require AWESOME_ADDONS_PATH . '/modules/post-list/template/view.php';
	}

	// protected function _content_template() {
	// 	require AWESOME_ADDONS_PATH . '/modules/post-list/template/content-template.php';
	// }

}
