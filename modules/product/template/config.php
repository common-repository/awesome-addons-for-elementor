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
class AA_Product extends Widget_Base {

	public function get_name() {
		return 'aa-product';
	}

	public function get_title() {
		return esc_html__( 'Product', ' aw_elementor' );
	}

	public function get_icon() {
		return 'ad ad-badge1';
	}

	public function get_categories() {
		return [ 'awe_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'aa-product' ];
	}


	protected function _register_controls() {
		
		$this->start_controls_section(
            'woolentor-products',
            [
                'label' => esc_html__( 'Product Settings', 'woolentor' ),
            ]
        );
        
            $this->add_control(
                'woolentor_product_style',
                [
                    'label'   => esc_html__( 'Product style', 'woolentor' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1' => esc_html__( 'Product style One', 'woolentor' ),
                        '2' => esc_html__( 'Product style Two', 'woolentor' ),
                        '3' => esc_html__( 'Product style Three', 'woolentor' ),
                    ],
                ]
            );

            $this->add_control(
                'woolentor_product_grid_product_filter',
                [
                    'label'   => esc_html__( 'Filter By', 'woolentor' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'recent',
                    'options' => [
                        'recent'       => esc_html__( 'Recent Products', 'woolentor' ),
                        'featured'     => esc_html__( 'Featured Products', 'woolentor' ),
                        'best_selling' => esc_html__( 'Best Selling Products', 'woolentor' ),
                        'sale'         => esc_html__( 'Sale Products', 'woolentor' ),
                        'top_rated'    => esc_html__( 'Top Rated Products', 'woolentor' ),
                        'mixed_order'  => esc_html__( 'Mixed order Products', 'woolentor' ),
                    ],
                ]
			);
			
			$this->add_control(
                'woolentor_product_grid_column',
                [
                    'label' => esc_html__( 'Columns', 'woolentor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '4',
                    'options' => [
                        '1' => esc_html__( '1', 'woolentor' ),
                        '2' => esc_html__( '2', 'woolentor' ),
                        '3' => esc_html__( '3', 'woolentor' ),
                        '4' => esc_html__( '4', 'woolentor' ),
                        '5' => esc_html__( '5', 'woolentor' ),
                        '6' => esc_html__( '6', 'woolentor' ),
                    ],
                ]
            );

            $this->add_control(
              'woolentor_product_grid_row',
              [
                 'label'   => __( 'Rows', 'woolentor' ),
                 'type'    => Controls_Manager::NUMBER,
                 'default' => 1,
                 'min'     => 1,
                 'max'     => 20,
                 'step'    => 1,
              ]
            );

            $this->add_control(
              'woolentor_product_grid_products_count',
              [
                 'label'   => __( 'Products Count', 'woolentor' ),
                 'type'    => Controls_Manager::NUMBER,
                 'default' => 4,
                 'min'     => 1,
                 'max'     => 100,
                 'step'    => 1,
              ]
			);
			
			$this->add_control(
                'woolentor_product_grid_categories',
                [
                    'label' => esc_html__( 'Product Categories', 'woolentor' ),
                    'type' => Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => awesome_addons_woocommerce_product_categories(),
                ]
            );

            $this->add_control(
                'custom_order',
                [
                    'label' => esc_html__( 'Custom order', 'woolentor' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'orderby',
                [
                    'label' => esc_html__( 'Orderby', 'woolentor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'none',
                    'options' => [
                        'none'          => esc_html__('None','woolentor'),
                        'ID'            => esc_html__('ID','woolentor'),
                        'date'          => esc_html__('Date','woolentor'),
                        'name'          => esc_html__('Name','woolentor'),
                        'title'         => esc_html__('Title','woolentor'),
                        'comment_count' => esc_html__('Comment count','woolentor'),
                        'rand'          => esc_html__('Random','woolentor'),
                    ],
                    'condition' => [
                        'custom_order' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'order',
                [
                    'label' => esc_html__( 'order', 'woolentor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'DESC',
                    'options' => [
                        'DESC'  => esc_html__('Descending','woolentor'),
                        'ASC'   => esc_html__('Ascending','woolentor'),
                    ],
                    'condition' => [
                        'custom_order' => 'yes',
                    ]
                ]
            );


			$this->end_controls_section();

}

	protected function render() {
		require AWESOME_ADDONS_PATH . '/modules/product/template/view.php';
	}

	// protected function _content_template() {
	// 	require AWESOME_ADDONS_PATH . '/modules/product/template/content-template.php';
	// }

}
