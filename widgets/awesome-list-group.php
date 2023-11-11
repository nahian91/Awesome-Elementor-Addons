<?php
/**
 * Awesome List Group
 *
 * Elementor widget that inserts a brand into the page
 *
 * @since 1.0.0
 */
namespace Elementor;
class Awesome_List_Group extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve brand widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesome-list-group';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve brand widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'List Group', 'webbricks' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve heading widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-logo';
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
	       'brand_contents',
		    [
		        'label' => esc_html__('Contents', 'webbricks'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
	    );
		
		// List Group Repeater 
		$repeater = new \Elementor\Repeater();

		// List Group Title 
		$repeater->add_control(
			'aee_group_list_title',
			[
				'label' => esc_html__( 'List Title', 'ewa-elementor-extension' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		// List Group Icon
		$repeater->add_control(
        	'aee_group_list_icon',
			[
				'label'         => esc_html__('List Icon', 'ewa-elementor-extension'),
				'type'          => \Elementor\Controls_Manager::ICON,
				'label_block'   => true,
				'default' => 'fa fa-star',
			]
        );

		// List Group List
		$this->add_control(
			'aee_group_list',
			[
				'label' => esc_html__( 'List Group List', 'ewa-elementor-extension' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'aee_group_list_title' => __( 'List Item 1', 'ewa-elementor-extension' )
					],
					[
						'aee_group_list_title' => __( 'List Item 2', 'ewa-elementor-extension' )
					],
					[
						'aee_group_list_title' => __( 'List Item 3', 'ewa-elementor-extension' )
					],
				],
				'title_field' => '{{{ aee_group_list_title }}}',
			]
		);		
		
		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_brand_logos',
			 [
				 'label' => esc_html__('Logos', 'webbricks'),
				 'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			
			 ]
		 );
		 
		$repeater = new \Elementor\Repeater();

		// Brand Logo Image
		$repeater->add_control(
			'wb_brand_logo_img',
			[
				'label' => esc_html__( 'Choose Image', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => plugin_dir_url(__DIR__) . 'assets/images/logo1.png',
				]
			]
		);

		$this->add_control(
			'wb_brand',
			[
				'label' => esc_html__( 'Brands', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'separator' => 'before',
				'default' => [
					[
						'wb_brand_logo_img' => [
							'default' => [
								'url' => plugin_dir_url(__DIR__) . 'assets/images/logo1.png',
							]
						]
					],
					[
						'wb_brand_logo_img' => [
							'default' => [
								'url' => plugin_dir_url(__DIR__) . 'assets/images/logo2.png',
							]
						]
					],
					[
						'wb_brand_logo_img' => [
							'default' => [
								'url' => plugin_dir_url(__DIR__) . 'assets/images/logo3.png',
							]
						]
					],
					[
						'wb_brand_logo_img' => [
							'default' => [
								'url' => plugin_dir_url(__DIR__) . 'assets/images/logo4.png',
							]
						]
					],
					[
						'wb_brand_logo_img' => [
							'default' => [
								'url' => plugin_dir_url(__DIR__) . 'assets/images/logo5.png',
							]
						]
					],
					[
						'wb_brand_logo_img' => [
							'default' => [
								'url' => plugin_dir_url(__DIR__) . 'assets/images/logo6.png',
							]
						]
					],
					[
						'wb_brand_logo_img' => [
							'default' => [
								'url' => plugin_dir_url(__DIR__) . 'assets/images/logo7.png',
							]
						]
					],
					[
						'wb_brand_logo_img' => [
							'default' => [
								'url' => plugin_dir_url(__DIR__) . 'assets/images/logo8.png',
							]
						]
					],
					[
						'wb_brand_logo_img' => [
							'default' => [
								'url' => plugin_dir_url(__DIR__) . 'assets/images/logo9.png',
							]
						]
					]
				]
			]
		);

		$this->add_control(
			'important_note',
			[
				'label' => esc_html__( 'Suggestion: 9 brand logos look good, but you can increase or reduce the number of logos as needed.', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'content_classes' => 'notice-style',
			]
		);
		 
		$this->end_controls_section();
		 // end of the Content tab section
		
		// start of the Style tab section
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Contents', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);	

		// Brand Separator Options
		$this->add_control(
			'wb_brand_sep_options',
			[
				'label' => esc_html__( 'Bullet', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Brand Separator Background
		$this->add_control(
			'wb_brand_sep_background',
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

		// Brand Separator Round
		$this->add_control(
			'wb_brand_sep_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .section-title h4:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Brand Subtitle Options
		$this->add_control(
			'wb_brand_subtitle_options',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);
		
		// Brand Subtitle Color
		$this->add_control(
			'wb_brand_subtitle_color',
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

		// // Brand Subtitle Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_brand_subtitle_typography',
				'selector' => '{{WRAPPER}} .section-title h4',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Brand Title Options
		$this->add_control(
			'wb_brand_title_options',
			[
				'label' => esc_html__( 'Heading', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Brand Title Color
		$this->add_control(
			'wb_brand_title_color',
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

		// Brand Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_brand_title_typography',
				'selector' => '{{WRAPPER}} .section-title h2',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// Brand Description Options
		$this->add_control(
			'wb_brand_desc_options',
			[
				'label' => esc_html__( 'Description', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Brand Description Color
		$this->add_control(
			'wb_brand_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} .brand p' => 'color: {{VALUE}}',
				],
			]
		);

		// Brand Description Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_brand_desc_typography',
				'selector' => '{{WRAPPER}} .brand p',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'brand_logos_btn_section',
			[
				'label' => esc_html__( 'Buttons', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);	

		$this->start_controls_tabs(
			'wp_brand_btn_style_tab'
		);

		// Brand Button Normal Tab
		$this->start_controls_tab(
			'wb_brand_btn_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks' ),
			]
		);

		// Brand Button Color
		$this->add_control(
			'wb_brand_btn_color',
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

		// Brand Button Border
		$this->add_control(
			'wb_brand_btn_border',
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

		// Brand Button Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_brand_btn_typography',
				'selector' => '{{WRAPPER}} .btn-border',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		$this->end_controls_tab();

		// Brand Button Hover Tab
		$this->start_controls_tab(
			'wb_brand_btn_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks' ),
			]
		);

		// Brand Button Hover Color
		$this->add_control(
			'wb_brand_btn_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border:hover' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Brand Button Hover Background
		$this->add_control(
			'wb_brand_btn_hover_bg',
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

		// Brand Button Hover Border
		$this->add_control(
			'wb_brand_btn_hover_border',
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

		// start of the Logos tab section
		$this->start_controls_section(
			'brand_logos_style_section',
			[
				'label' => esc_html__( 'Logos', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);	

		// Logos Padding
		$this->add_control(
			'wb_logos_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .brand-img img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Logos Border Radius
		$this->add_control(
			'wb_logos_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .brand-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

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

		if ( $settings['aee_group_list'] ) {  ?>
			
			<?php 
			foreach (  $settings['aee_group_list'] as $item ) { 

				$aee_group_list_title = $item['aee_group_list_title'];
				$aee_group_list_icon =  $item['aee_group_list_icon'];
			?>
				<div class="list-group">
					<div class="list-item">
						<i class="<?php echo $aee_group_list_icon;?>"></i> <h4><?php echo $aee_group_list_title;?></h4>
					</div>
				</div>
			<?php } ?>
		<?php } 
	}
}