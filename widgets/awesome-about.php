<?php
/**
 * Awesome About Widget.
 *
 * Elementor widget that inserts a about into the page
 *
 * @since 1.0.0
*/

namespace Elementor;
class Awesome_About extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve about widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesome-about';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve about widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'About', 'aee' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve about widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-single-post';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the about widget belongs to.
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
	       'wb_about_contents',
		    [
		        'label' => esc_html__('Contents', 'aee'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
	    );

		// About Featured Image
		$this->add_control(
			'aee_about_image',
			[
				'label' => esc_html__( 'Choose Featured Image', 'aee' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => plugin_dir_url(__DIR__) . 'assets/images/about.jpg',
				]
			]
		);

		// About Counter Title
		$this->add_control(
			'aee_about_title',
			[
				'label' => esc_html__( 'Counter Title', 'aee' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Counter Visiting', 'aee' ),
			]
		);

		// About Counter Title
		$this->add_control(
			'aee_about_des',
			[
				'label' => esc_html__( 'Counter Title', 'aee' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Counter Visiting', 'aee' ),
			]
		);
		 
		// About Button 1 Title
		$this->add_control(
		    'aee_about_text',
			[
			    'label' => esc_html__('Button 1 Text', 'aee'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Contact Us', 'aee')
			]
		);

		// About Button Link
		$this->add_control(
		    'aee_about_link',
			[
			    'label' => esc_html__( 'Button 1 Link', 'aee' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => 'https://your-link.com',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				]
			]
		);
		 
		$this->end_controls_section();
		// End of the Buttons Tab Section
		
		// Start of the Style Tab Section
		$this->start_controls_section(
			'wb_style_section',
			[
				'label' => esc_html__( 'Contents', 'aee' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);	

		// About Content Subtitle Separator Options
		$this->add_control(
			'wb_about_subtitle_sep_options',
			[
				'label' => esc_html__( 'Bullet', 'aee' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		// About Content Subtitle Separator Color
		$this->add_control(
			'wb_about_subtitle_sep_color',
			[
				'label' => esc_html__( 'Color', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title h4:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// About Content Subtitle Separator Round
		$this->add_control(
			'wb_about_subtitle_sep_round',
			[
				'label' => esc_html__( 'Border Radius', 'aee' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .section-title h4:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// About Content Subtitle Options
		$this->add_control(
			'wb_about_subtitle_options',
			[
				'label' => esc_html__( 'Sub Title', 'aee' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// About Content Subtitle Color
		$this->add_control(
			'wb_about_subtitle_color',
			[
				'label' => esc_html__( 'Text Color', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title h4' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// About Content Subtitle Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_about_subtitle_typography',
				'selector' => '{{WRAPPER}} .section-title h4',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// About Content Title Options
		$this->add_control(
			'wb_about_title_options',
			[
				'label' => esc_html__( 'Title', 'aee' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// About Content Title Color
		$this->add_control(
			'wb_about_title_color',
			[
				'label' => esc_html__( 'Text Color', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title h2' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// About Content Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_about_title_typography',
				'selector' => '{{WRAPPER}} .section-title h2',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// About Content Description Options
		$this->add_control(
			'wb_about_desc_options',
			[
				'label' => esc_html__( 'Description', 'aee' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// About Content Description Color
		$this->add_control(
			'wb_about_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-desc p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				]
			]
		);

		// About Content Description Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_about_desc_typography',
				'selector' => '{{WRAPPER}} .about-desc p',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		$this->start_controls_section(
			'wb_counters_style',
			[
				'label' => esc_html__( 'Counters', 'aee' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_about_counter_show_btn' => 'yes'
				]
			]
		);

		// About Counter Number Options
		$this->add_control(
			'wb_about_counter_number_options',
			[
				'label' => esc_html__( 'Number', 'aee' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		// About Counter Number Color
		$this->add_control(
			'wb_about_counter_number_color',
			[
				'label' => esc_html__( 'Text Color', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-about-counter h2' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// About Counter Number Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_about_counter_number_typography',
				'selector' => '{{WRAPPER}} .single-about-counter h2',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// About Counter Title Options
		$this->add_control(
			'wb_about_counter_title_options',
			[
				'label' => esc_html__( 'Title', 'aee' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// About Counter Title Color
		$this->add_control(
			'wb_about_counter_title_color',
			[
				'label' => esc_html__( 'Text Color', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-about-counter h4' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				]
			]
		);

		// About Counter Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_about_counter_title_typography',
				'selector' => '{{WRAPPER}} .single-about-counter h4',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		// About Counter Separator Options
		$this->add_control(
			'wb_about_counter_sep_options',
			[
				'label' => esc_html__( 'Separator', 'aee' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// About Counter Separator Color
		$this->add_control(
			'wb_about_counter_sep_color',
			[
				'label' => esc_html__( 'Color', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-about-counter' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		$this->start_controls_section(
			'wb_buttons_style',
			[
				'label' => esc_html__( 'Buttons', 'aee' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// About Button 1 Options
		$this->add_control(
			'wb_about_button1_options',
			[
				'label' => esc_html__( 'Button 1', 'aee' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->start_controls_tabs(
			'wp_about_btn1_style_tab'
		);

		// About Button 1 Normal Tab
		$this->start_controls_tab(
			'wb_about_btn1_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'aee' ),
			]
		);

		// About Button 1 Color
		$this->add_control(
			'wb_about_btn1_color',
			[
				'label' => esc_html__( 'Text Color', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// About Button 1 Background
		$this->add_control(
			'wb_about_btn1_bg',
			[
				'label' => esc_html__( 'Background', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// About Button 1 Border
		$this->add_control(
			'wb_about_btn1_border',
			[
				'label' => esc_html__( 'Border Color', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// About Button 1 Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_about_btn1_typography',
				'selector' => '{{WRAPPER}} .btn-bg',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		$this->end_controls_tab();

		// About Button 1 Hover Tab
		$this->start_controls_tab(
			'wb_about_btn1_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'aee' ),
			]
		);

		// About Button 1 Hover Color
		$this->add_control(
			'wb_about_btn1_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg:hover' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// About Button 1 Hover Background
		$this->add_control(
			'wb_about_btn1_hover_bg',
			[
				'label' => esc_html__( 'Background', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg:hover:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// About Button 1 Hover Background
		$this->add_control(
			'wb_about_btn1_hover_border',
			[
				'label' => esc_html__( 'Border Color', 'aee' ),
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


		// About Button 2 Options
		$this->add_control(
			'wb_about_button2_options',
			[
				'label' => esc_html__( 'Button 2', 'aee' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->start_controls_tabs(
			'wp_about_btn2_style_tab'
		);

		// About Button 2 Normal Tab
		$this->start_controls_tab(
			'wb_about_btn2_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'aee' ),
			]
		);

		// About Button 2 Color
		$this->add_control(
			'wb_about_btn2_color',
			[
				'label' => esc_html__( 'Text Color', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// About Button 2 Border
		$this->add_control(
			'wb_about_btn2_border',
			[
				'label' => esc_html__( 'Border Color', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// About Button 2 Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_about_btn2_typography',
				'selector' => '{{WRAPPER}} .btn-border',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		$this->end_controls_tab();

		// About Button 2 Hover Tab
		$this->start_controls_tab(
			'wb_about_btn2_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'aee' ),
			]
		);

		// About Button 2 Hover Color
		$this->add_control(
			'wb_about_btn2_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border:hover' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// About Button 2 Hover Color
		$this->add_control(
			'wb_about_btn2_hover_border',
			[
				'label' => esc_html__( 'Border Color', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// About Button 2 Hover Background
		$this->add_control(
			'wb_about_btn2_hover_bg',
			[
				'label' => esc_html__( 'Background', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border:hover:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_tab();
		
		$this->end_controls_tabs();

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
		$aee_about_image = $settings['aee_about_image']['url'];
		$aee_about_title = $settings['aee_about_title'];
		$aee_about_des = $settings['aee_about_des'];
		$aee_about_text = $settings['aee_about_text'];
		$aee_about_link = $settings['aee_about_link']['url'];		
       ?>
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-4">
					<div class="about-image">
						<img src="<?php echo esc_url($aee_about_image);?>" alt="<?php echo $aee_about_title;?>">
					</div>
				</div>
				<div class="col-xl-8">
					<div class="about-content">
						<h4><?php echo $aee_about_title;?></h4>
						<p><?php echo $aee_about_des;?></p>
						<a href="<?php echo esc_url($aee_about_link);?>"><?php echo $aee_about_text;?></a>
					</div>
				</div>
			</div>
		</div>
       <?php
	}
}