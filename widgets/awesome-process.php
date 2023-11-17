<?php
/**
 * Awesome Process Widget.
 *
 * Elementor widget that inserts a process into the page
 *
 * @since 1.0.0
 */
namespace Elementor;
class Awesome_Process extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve faq widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesome-process';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve faq widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Process', 'awesome-widgets' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve faq widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-checkbox';
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
		return [ 'awesome-widgets-elementor' ];
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
	       'awea_process_contents',
		    [
		        'label' => esc_html__('Content', 'awesome-widgets'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
	    );
		
		// Process Title
		$this->add_control(
			'awea_process_title',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'First Step' ),
			]
		);

		// Process Number
		$this->add_control(
			'awea_process_number',
			[
				'label' => esc_html__( 'Number', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '1' ),
			]
		);

		// Process Description
		$this->add_control(
			'awea_process_des',
			[
				'label' => esc_html__( 'Description', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content', 'awesome-widgets' ),
			]
		);

		// Process Alignment
		$this->add_control(
			'awea_process_alignment',
			[
				'label' => esc_html__( 'Alignment', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'separator' => 'before',
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'awesome-widgets' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'awesome-widgets' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'awesome-widgets' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .single-process' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		// end of the Content tab section

		// start of the Style tab section
		$this->start_controls_section(
			'awea_process_title_options',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Process Background Color
		$this->add_control(
			'awea_process_title_background_color',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-process h6' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Process Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'awea_process_title_border',
				'selector' => '{{WRAPPER}} .single-process h6',
			]
		);	

		// Process Border Radius
		$this->add_control(
			'awea_process_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .single-process h6' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Process Padding
		$this->add_control(
			'awea_process_padding',
			[
				'label' => esc_html__( 'Padding', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .single-process h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Process Title Color
		$this->add_control(
			'awea_process_title_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-process h6' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Process Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'awea_process_title_typography',
				'selector' => '{{WRAPPER}} .single-process h6',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Content tab section
		
		// start of the Style tab section
		$this->start_controls_section(
			'awea_process_number_options',
			[
				'label' => esc_html__( 'Number', 'awesome-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		// Process Number Color
		$this->add_control(
			'awea_process_number_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} .single-process h6 span' => 'color: {{VALUE}}',
				],
			]
		);
		
		// FAQ Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'awea_process_number_typography',
				'selector' => '{{WRAPPER}} .single-process h6 span',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		// Process Number Background
		$this->add_control(
			'awea_process_number_bg',
			[
				'label' => esc_html__( 'Background', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} .single-process h6 span' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'awea_process_desc_options',
			[
				'label' => esc_html__( 'Description', 'awesome-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		// Process Description Color
		$this->add_control(
			'awea_process_desc_color',
			[
				'label' => esc_html__( 'Color', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} .single-process p' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Process Description Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'awea_process_desc_typography',
				'selector' => '{{WRAPPER}} .single-process p',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
				]
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
		$awea_process_title = $settings['awea_process_title'];
		$awea_process_number = $settings['awea_process_number'];
		$awea_process_des = $settings['awea_process_des'];
       ?>
			<div class="single-process">
				<h6><?php echo esc_html($awea_process_title);?> <span><?php echo esc_html($awea_process_number);?></span></h6>
				<p><?php echo esc_html($awea_process_des);?></p>
			</div>
       <?php
	}
}