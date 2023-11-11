<?php
/**
 * Awesome Process
 *
 * Elementor widget that inserts a faq into the page
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
		return esc_html__( 'Process', 'webbricks' );
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
		return 'eicon-accordion';
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
	       'faq_content',
		    [
		        'label' => esc_html__('Content', 'webbricks'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
	    );
		
		// Process Title
		$this->add_control(
			'aee_process_title',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'First Step' ),
			]
		);

		// Process Number
		$this->add_control(
			'aee_process_number',
			[
				'label' => esc_html__( 'Number', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '1' ),
			]
		);

		// Process Description
		$this->add_control(
			'aee_process_des',
			[
				'label' => esc_html__( 'Description', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content' ),
			]
		);
		
		$this->end_controls_section();
		// end of the Content tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_faq_options',
			[
				'label' => esc_html__( 'Layouts', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'wb_faq_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .faq' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		// end of the Content tab section
		
		// start of the Style tab section
		$this->start_controls_section(
			'wb_faq_title_options',
			[
				'label' => esc_html__( 'FAQ Question', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		// FAQ Title Color
		$this->add_control(
			'wb_faq_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} .faq li span' => 'color: {{VALUE}}',
				],
			]
		);

		// FAQ Title Border Color
		$this->add_control(
			'wb_faq_title_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .faq li' => 'border-color: {{VALUE}}',
				],
			]
		);

		// FAQ Title Border Active Color
		$this->add_control(
			'wb_faq_title_border_active_color',
			[
				'label' => esc_html__( 'Border Active', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} .faq li span.active' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		// FAQ Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_faq_title_typography',
				'selector' => '{{WRAPPER}} .faq li span',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'wb_faq_desc_options',
			[
				'label' => esc_html__( 'FAQ Answer', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		// FAQ Description Color
		$this->add_control(
			'wb_faq_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} .faq li p' => 'color: {{VALUE}}',
				],
			]
		);
		
		// FAQ Description Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_faq_desc_typography',
				'selector' => '{{WRAPPER}} .faq li p',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'wb_faq_icon_options',
			[
				'label' => esc_html__( 'Icon', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// FAQ Icon Color
		$this->add_control(
			'wb_faq_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_ACCENT,
				],
				'selectors' => [
					'{{WRAPPER}} .faq span:after' => 'color: {{VALUE}}',
				],
			]
		);

		// FAQ Icon Active Color
		$this->add_control(
			'wb_faq_icon_active_color',
			[
				'label' => esc_html__( 'Active Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				],
				'selectors' => [
					'{{WRAPPER}} span.active::after' => 'color: {{VALUE}}',
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
		$aee_process_title = $settings['aee_process_title'];
		$aee_process_number = $settings['aee_process_number'];
		$aee_process_des = $settings['aee_process_des'];
       ?>
			<div class="single-process">
				<h6><?php echo $aee_process_title;?> <span><?php echo $aee_process_number;?></span></h6>
				<p><?php echo $aee_process_des;?></p>
			</div>
       <?php
	}
}