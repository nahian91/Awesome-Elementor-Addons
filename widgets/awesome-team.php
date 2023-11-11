<?php
/**
 * Awesome Team
 *
 * Elementor widget that inserts a hero into the page
 *
 * @since 1.0.0
 */
namespace Elementor;
class Awesome_Team extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve hero widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesome-team';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve hero widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Team', 'webbricks' );
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
		return 'eicon-single-page';
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

		// Start of the Content Tab Section
		$this->start_controls_section(
			'hero_contents',
			 [
				 'label' => esc_html__('Content', 'webbricks'),
				 'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,			
			 ]
		 );

		 // Hero Featured Image
		$this->add_control(
			'aee_team_image',
			[
				'label' => esc_html__( 'Choose Featured Image', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => plugin_dir_url(__DIR__) . 'assets/images/hero.jpg',
				]
			]
		);
		 
		 // Hero Sub Title
		 $this->add_control(
			 'aee_team_title',
			 [
				 'label' => esc_html__('Sub Title', 'webbricks'),
				 'type' => \Elementor\Controls_Manager::TEXT,
				 'label_block' => true,
				 'default' => esc_html__('MAKE A CHNAGE', 'webbricks'),
			 ]
		 );
		 
		 // Hero Title
		 $this->add_control(
			 'aee_team_desg',
			 [
				 'label' => esc_html__('Title', 'webbricks'),
				 'type' => \Elementor\Controls_Manager::TEXT,
				 'label_block' => true,
				 'default' => esc_html__('Let’s See The World In A Better Way', 'webbricks'),
			 ]
		);
		 
		$this->end_controls_section();
		// end of the Content tab section

		 // start of the Style tab section
		$this->start_controls_section(
			'hero_content_style',
			[
				'label' => esc_html__( 'Content Box', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Hero Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'wb_hero_content_border',
				'selector' => '{{WRAPPER}} .hero-content',
			]
		);	

		// Hero Border Radius
		$this->add_control(
			'wb_hero_content_border',
			[
				'label' => esc_html__( 'Border Radiuse', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .hero-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Hero Padding
		$this->add_control(
			'wb_hero_content_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .hero-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();	
		
		// start of the Style tab section
		$this->start_controls_section(
			'hero_subtitle_style',
			[
				'label' => esc_html__( 'Sub Title', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Hero Sub Title Color
		$this->add_control(
			'wb_hero_subtitle_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-content h4' => 'color: {{VALUE}}',
				],
			]
		);

		// Hero Sub Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_hero_subtitle_typography',
				'selector' => '{{WRAPPER}} .hero-content h4',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);
		$this->end_controls_section();	

		// start of the Style tab section
		$this->start_controls_section(
			'hero_title_style',
			[
				'label' => esc_html__( 'Title', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Hero Title Color
		$this->add_control(
			'wb_hero_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-content h1' => 'color: {{VALUE}}',
				],
			]
		);

		// Hero Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_hero_title_typography',
				'selector' => '{{WRAPPER}} .hero-content h1',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);
		$this->end_controls_section();	

		// start of the Style tab section
		$this->start_controls_section(
			'hero_desc_style',
			[
				'label' => esc_html__( 'Description', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Hero Description Color
		$this->add_control(
			'wb_hero_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-content p' => 'color: {{VALUE}}',
				],
			]
		);

		// Hero Description Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_hero_desc_typography',
				'selector' => '{{WRAPPER}} .hero-content p',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();	

		$this->start_controls_section(
			'hero_buttons_style',
			[
				'label' => esc_html__( 'Buttons', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Hero Button 1 Options
		$this->add_control(
			'wb_hero_button1_options',
			[
				'label' => esc_html__( 'Button 1', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->start_controls_tabs(
			'wp_hero_btn1_style_tab'
		);

		// Hero Button 1 Normal Tab
		$this->start_controls_tab(
			'wb_hero_btn1_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks' ),
			]
		);

		// Hero Button 1 Color
		$this->add_control(
			'wb_hero_btn1_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Hero Button 1 Background
		$this->add_control(
			'wb_hero_btn1_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Hero Button 1 Border Color
		$this->add_control(
			'wb_hero_btn1_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg' => 'border-right-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Hero Button 1 Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_hero_btn1_typography',
				'selector' => '{{WRAPPER}} .btn-bg',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		$this->end_controls_tab();

		// Hero Button 1 Hover Tab
		$this->start_controls_tab(
			'wb_hero_btn1_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks' ),
			]
		);

		// Hero Button 1 Hover Color
		$this->add_control(
			'wb_hero_btn1_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg:hover' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Hero Button 1 Hover Background
		$this->add_control(
			'wb_hero_btn1_hover_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg:hover:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Hero Button 1 Hover Border
		$this->add_control(
			'wb_hero_btn1_hover_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();


		// Hero Button 2 Options
		$this->add_control(
			'wb_hero_button2_options',
			[
				'label' => esc_html__( 'Button 2', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->start_controls_tabs(
			'wp_hero_btn2_style_tab'
		);

		// Hero Button 2 Normal Tab
		$this->start_controls_tab(
			'wb_hero_btn2_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks' ),
			]
		);

		// Hero Button 2 Color
		$this->add_control(
			'wb_hero_btn2_color',
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

		// Hero Button 2 Border
		$this->add_control(
			'wb_hero_btn2_border',
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

		// Hero Button 2 Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_hero_btn2_typography',
				'selector' => '{{WRAPPER}} .btn-border',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		$this->end_controls_tab();

		// Hero Button 2 Hover Tab
		$this->start_controls_tab(
			'wb_hero_btn2_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks' ),
			]
		);

		// Hero Button 2 Hover Color
		$this->add_control(
			'wb_hero_btn2_hover_color',
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

		// Hero Button 2 Hover Background
		$this->add_control(
			'wb_hero_btn2_hover_bg',
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

		// Hero Button 2 Hover Border
		$this->add_control(
			'wb_hero_btn2_hover_border',
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

		// start of the Style tab section
		$this->start_controls_section(
			'wb_hero_image_style',
			[
				'label' => esc_html__( 'Image', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Hero Image Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'wb_hero_image_border',
				'selector' => '{{WRAPPER}} .hero-img',
			]
		);	

		// Hero Image Border Radius
		$this->add_control(
			'wb_hero_image_border_radius',
			[
				'label' => esc_html__( 'Border Radiuse', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .hero-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();	

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
		$aee_team_image = $settings['aee_team_image']['url'];
		$aee_team_title = $settings['aee_team_title'];
		$aee_team_desg = $settings['aee_team_desg'];

		?>
			<div class="single-team">
				<img src="<?php echo $aee_team_image;?>" alt="">
					<div class="team-hover">
						<div class="team-hover-table">
							<div class="team-hover-cell">
								<h4><?php echo $aee_team_title;?></h4>
								<p><?php echo $aee_team_desg;?></p>
								<div class="team-social">
									<!-- <?php 
										// foreach (  $settings['aee_social_list'] as $item ) { 
										// 	$aee_social_title = $item['aee_social_title'];
										// 	$aee_social_icon =  $item['aee_social_icon'];
										// 	$aee_social_link =  $item['aee_social_link']['url'];
										?>
										<a href="<?php //echo //$aee_social_link;?>"><i class="<?php //echo //$aee_social_icon;?>"></i></a>
									<?php 
										//} 
									?> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			
		<?php } 
	}