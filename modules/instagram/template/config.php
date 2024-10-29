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
class AA_Instagram extends Widget_Base {

	public function get_name() {
		return 'aa-instagram';
	}

	public function get_title() {
		return esc_html__( 'Instagram', 'aa_elementor' );
	}

	public function get_icon() {
		return 'ad ad-twitter';
	}

	public function get_categories() {
		return [ 'awe_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'aa-twitter' ];
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
            'instagram_content',
            [
                'label' => __( 'Instagram', 'aa_elementor' ),
            ]
        );
        
            $this->add_control(
                'style',
                [
                    'label' => __( 'Style', 'aa_elementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'style1',
                    'options' => [
                        'style1'   => __( 'Style One', 'aa_elementor' ),
                        'style2'   => __( 'Style Two', 'aa_elementor' ),
                        'style3'   => __( 'Style Three', 'aa_elementor' ),
                    ],
                ]
            );

            $this->add_control(
                'userid',
                [
                    'label'         => __( 'Instagram user ID', 'aa_elementor' ),
                    'type'          => Controls_Manager::TEXT,
                    'placeholder'   => __( '6666969077', 'aa_elementor' ),
                    'label_block'   =>true,
                    'description'   => wp_kses_post( '(<a href="'.esc_url('https://codeofaninja.com/tools/find-instagram-user-id').'" target="_blank">Lookup your User ID</a>)', 'aa_elementor' ),
                ]
            );
        
            $this->add_control(
                'access_token',
                [
                    'label'         => __( 'Instagram Access Token', 'aa_elementor' ),
                    'type'          => Controls_Manager::TEXT,
                    'placeholder'   => __( '6666969077.1677ed0.d325f406d94c4dfab939137c5c2cc6c2', 'aa_elementor' ),
                    'label_block'   =>true,
                    'description'   => wp_kses_post( '(<a href="'.esc_url('http://instagram.pixelunion.net/').'" target="_blank">Lookup your Access Token</a>)', 'aa_elementor' ),
                ]
            );

            $this->add_control(
                'limit',
                [
                    'label' => __( 'Item Limit (Max 12)', 'aa_elementor' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 20,
                    'step' => 1,
                    'default' => 8,
                    'separator'=>'before',
                ]
            );

            $this->add_control(
                'instagram_image_size',
                [
                    'label' => __( 'Image Size', 'aa_elementor' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'standard_resolution',
                    'options' => [
                        'thumbnail'             => __( 'Thumbnail', 'aa_elementor' ),
                        'low_resolution'        => __( 'Medium', 'aa_elementor' ),
                        'standard_resolution'   => __( 'Standard', 'aa_elementor' ),
                    ],
                ]
            );


        $this->end_controls_section();

            $this->start_controls_section(
                '_section_style_section',
                [
                        'label' => __( 'Section Style', 'aa_elementor' ),
                        'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_responsive_control(
                'padding',
                        [
                                'label'      => __( 'Padding', 'aa_elementor'),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => ['px', 'em', '%'],
                                'selectors'  => [
                                        '{{WRAPPER}} .aae-instagram' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'section_color',
                        'label' => __( 'Hover Background', 'aa_elementor' ),
                        'types' => [ 'classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .advanced_addons_instagram.type-1 .single-image > div',
                        'condition'   => [
                            'style' => [ 'style1'],
                        ],
                        
                    ]
                    
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'section3_color',
                        'label' => __( 'Hover Background', 'aa_elementor' ),
                        'types' => ['gradient'],
                        'selector' => '{{WRAPPER}} .advanced_addons_instagram.type-1.grad-style .single-image:hover > div::before',
                        'condition'   => [
                            'style' => [ 'style3'],
                        ],
                        
                    ]
                    
                );

             $this->end_controls_section();

             $this->start_controls_section(
                '_section_style_title',
                [
                        'label' => __( 'Title', 'aa_elementor' ),
                        'tab'   => Controls_Manager::TAB_STYLE,
                        'condition'   => [
                            'style' => [ 'style1'],
                        ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => __( 'Typography', 'aa_elementor' ),
                    'selector' => '{{WRAPPER}} .ad-instagram-name',
                    'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
                ]
            );

            $this->add_control(
                'text_color',
                [
                    'label'     => __( 'Title Color', 'aa_elementor' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ad-instagram-name' => 'color: {{VALUE}} !important',
                    ],
                ]
            );


            $this->end_controls_section();


}

	protected function render() {
		require AWESOME_ADDONS_PATH . '/modules/instagram/template/view.php';
    }

    // protected function _content_template() {
	// 	require AWESOME_ADDONS_PATH . '/modules/twitter/template/content-template.php';
    // }
    
   


}
