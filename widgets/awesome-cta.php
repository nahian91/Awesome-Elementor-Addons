<?php
/**
 * Awesome CTA Widget.
 *
 * Elementor widget that inserts a affiliate products into the page
 *
 * @since 1.0.0
 */
namespace Elementor;
class Awesome_CTA extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve heading widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesome-cta';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve affiliate products widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'CTA', 'webbricks' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve affiliate products widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-call-to-action';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'aee-elementor' ];
	}

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		
		// start of the Content tab section
	   $this->start_controls_section(
	       'wb_affiliate_contents',
		    [
		        'label' => esc_html__('Section Heading', 'webbricks'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
	    );
		
		// CTA Sub Title
		$this->add_control(
			'aee_cta_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'are you ready?' ),
			]
		);

		// CTA Title
		$this->add_control(
			'aee_cta_title',
			[
				'label' => esc_html__( 'Title', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'We Are Awesome CTA!' ),
			]
		);

		// CTA Description
		$this->add_control(
			'aee_cta_desc',
			[
				'label' => esc_html__( 'Description', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters' ),
			]
		);

		// CTA Button 1
		$this->add_control(
			'aee_cta_button1',
			[
				'label' => esc_html__( 'Button 1', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '+880 123 4567 890' ),
			]
		);

		// CTA Button 2
		$this->add_control(
			'aee_cta_button2',
			[
				'label' => esc_html__( 'Button 2', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'info@anahian.com' ),
			]
		);
		
		$this->end_controls_section();


		// Repeater Start
		$this->start_controls_section(
			'wb_affilaite_list',
			 [
				 'label' => esc_html__('Affiliate List', 'webbricks'),
				 'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			
			 ]
		 );

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'wb_affiliate_image',
			[
				'label' => esc_html__( 'Choose Product Image', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => plugin_dir_url(__DIR__) . 'assets/images/product-1.png',
				],
			]
		);

		$repeater->add_control(
			'wb_affiliate_link',
			[
			    'label' => esc_html__( 'Affiliate Link', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => 'https://getwebbricks.com/',
					'is_external' => true,
					'nofollow' => false,
					'custom_attributes' => '',
				]
			]
		);		

		$this->add_control(
			'wb_affiliate_lists',
			[
				'label' => __( 'Product Lists', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'wb_affiliate_image' => [
							'url' => plugin_dir_url(__DIR__) . 'assets/images/product-1.png',
						],
					],
					[
						'wb_affiliate_image' => [
							'url' => plugin_dir_url(__DIR__) . 'assets/images/product-2.png',
						],
					],
					[
						'wb_affiliate_image' => [
							'url' => plugin_dir_url(__DIR__) . 'assets/images/product-3.png',
						],
					],
					[
						'wb_affiliate_image' => [
							'url' => plugin_dir_url(__DIR__) . 'assets/images/product-4.png',
						],
					],
					[
						'wb_affiliate_image' => [
							'url' => plugin_dir_url(__DIR__) . 'assets/images/product-5.png',
						],
					],
					[
						'wb_affiliate_image' => [
							'url' => plugin_dir_url(__DIR__) . 'assets/images/product-6.png',
						],
					],

				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'wb_affiliate_settings',
			 [
				 'label' => esc_html__('Settings', 'webbricks'),
				 'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			
			 ]
		 );

		 // Affiliate Column
		 $this->add_control(
			'wb_affiliate_column',
			[
				'label' => esc_html__( 'Column', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'4' => esc_html__( '3', 'webbricks' ),
					'3' => esc_html__( '4', 'webbricks' ),
					'2' => esc_html__( '6', 'webbricks' )
				],
			]
		);

		$this->end_controls_section();
		// end of the Content tab section
		
		// start of the Style tab section
		$this->start_controls_section(
			'wb_affiliate_sep_section',
			[
				'label' => esc_html__( 'Bullet', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Affliate Bullet Background
		$this->add_control(
			'wb_affiliate_sep_background',
			[
				'label' => esc_html__( 'Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title h4:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Affiliate Bullet Round
		$this->add_control(
			'wb_affiliate_sep_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .section-title h4:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_affiliate_subtitle_section',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		// Affiliate Sub Heading Color
		$this->add_control(
			'wb_affiliate_subtitle_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				],
				'selectors' => [
					'{{WRAPPER}} .section-title h4' => 'color: {{VALUE}}',
				],
			]
		);

		// // Affiliate Sub Heading Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_affiliate_subtitle_typography',
				'selector' => '{{WRAPPER}} .section-title h4',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_affiliate_title_section',
			[
				'label' => esc_html__( 'Heading', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Affiliate Title Color
		$this->add_control(
			'wb_affiliate_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .section-title h2' => 'color: {{VALUE}}',
				],
			]
		);

		// Affiliate Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_affiliate_title_typography',
				'selector' => '{{WRAPPER}} .section-title h2',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_affiliate_btn_section',
			[
				'label' => esc_html__( 'Button', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'wb_affiliate_btn_style_tab'
		);

		// Affiliate Button Normal Tab
		$this->start_controls_tab(
			'wb_affiliate_btn_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks' ),
			]
		);

		// Affiliate Button Color
		$this->add_control(
			'wb_affiliate_btn_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Affiliate Button Border
		$this->add_control(
			'wb_affiliate_btn_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Affiliate Button Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_affiliate_btn_typography',
				'selector' => '{{WRAPPER}} .btn-border',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		$this->end_controls_tab();

		// Affiliate Button Hover Tab
		$this->start_controls_tab(
			'wb_affiliate_btn_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks' ),
			]
		);

		// Affiliate Button Hover Color
		$this->add_control(
			'wb_affiliate_btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border:hover' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Affiliate Button Hover Background
		$this->add_control(
			'wb_affiliate_btn_hover_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border:hover:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Affiliate Button Hover Border
		$this->add_control(
			'wb_affiliate_btn_hover_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_products_section',
			[
				'label' => esc_html__( 'Product', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Affiliate Image Options
		$this->add_control(
			'wb_affiliate_image_options',
			[
				'label' => esc_html__( 'Image', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Affiliate Image Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'wb_price_border',
				'selector' => '{{WRAPPER}} .affiliate-img img',
			]
		);	

		// Affiliate Image Border Radius
		$this->add_control(
			'wb_price_border_style',
			[
				'label' => esc_html__( 'Border Radiuse', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .affiliate-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Affiliate Link Options
		$this->add_control(
			'wb_affiliate_link_options',
			[
				'label' => esc_html__( 'Product Link', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->start_controls_tabs(
			'wb_affiliate_btn_icon_style_tab'
		);

		// Affiliate Button Normal Tab
		$this->start_controls_tab(
			'wb_affiliate_btn_icon_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks' ),
			]
		);

		// Affiliate Button Color
		$this->add_control(
			'wb_affiliate_btn_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Affiliate Button Border
		$this->add_control(
			'wb_affiliate_btn_icon_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_tab();

		// Affiliate Button Hover Tab
		$this->start_controls_tab(
			'wb_affiliate_btn_icon_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks' ),
			]
		);

		// Affiliate Button Hover Icon Color
		$this->add_control(
			'wb_affiliate_btn_icon_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border:hover i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Affiliate Button Hover Background
		$this->add_control(
			'wb_affiliate_btn_icon_hover_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border:hover:after' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// end of the Style tab section

	}

	/**
	 * Render heading widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();
		$aee_cta_sub_title = $settings['aee_cta_sub_title'];
		$aee_cta_title = $settings['aee_cta_title'];
		$aee_cta_desc = $settings['aee_cta_desc'];
		$aee_cta_button1 = $settings['aee_cta_button1'];
		$aee_cta_button2 = $settings['aee_cta_button2'];
       ?>
			<div class="cta-box">
				<span><?php echo $aee_cta_sub_title;?></span>
				<h4><?php echo $aee_cta_title;?></h4>
				<p><?php echo $aee_cta_desc;?></p>
				<span class="cta-button"><?php echo $aee_cta_button1;?></span>
				<span class="cta-button"><?php echo $aee_cta_button2;?></span>
			</div>
       <?php
	}
}