<?php
/**
 * Awesome Number Box
 *
 * webbricks widget that inserts a counter into the page
 *
 * @since 1.0.0
 */
namespace Elementor;
class Awesome_Number_Box extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve counter widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesome-number-box';
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
		return esc_html__( 'Number Box', 'webbricks' );
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
		return 'eicon-counter';
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
		
		// start of the Content tab section
	   $this->start_controls_section(
	       'counter_contents',
		    [
		        'label' => esc_html__('Content', 'webbricks'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
	    );

		// Number Box Number
		$this->add_control(
			'aee_number_box_number',
			[
				'label' => esc_html__( 'Number', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '1' ),
			]
		);

		// Number Box Title
		$this->add_control(
			'aee_number_box_title',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Awesome Heading' ),
			]
		);

		// Number Box Description
		$this->add_control(
			'aee_number_box_des',
			[
				'label' => esc_html__( 'Description', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters' ),
			]
		);
		
		$this->end_controls_section();
		// end of the Content tab section
		
		// start of the Style tab section
		$this->start_controls_section(
			'wb_counter_layout_style',
			[
				'label' => esc_html__( 'Layout', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Counter Background
		$this->add_control(
			'wb_counter_background',
			[
				'label' => esc_html__( 'Background', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-box' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Counter Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'wb_counter_border',
				'selector' => '{{WRAPPER}} .counter-box',
			]
		);

		// Counter Border Radius
		$this->add_control(
			'wb_counter_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .counter-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		// Counter Padding
		$this->add_control(
			'wb_counter_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .counter-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'wb_counter_icon_style',
			[
				'label' => esc_html__( 'Icon', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Icon Color
		$this->add_control(
			'wb_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-number i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Icon Size
		$this->add_control(
			'wb_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 100,
						'step' => 5,
					],
					'%' => [
						'min' => 5,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 55,
				],
				'selectors' => [
					'{{WRAPPER}} .counter-number i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_counter_number_style',
			[
				'label' => esc_html__( 'Number', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Number Color
		$this->add_control(
			'wb_number_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-content h3 span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Number Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_number_typography',
				'selector' => '{{WRAPPER}} .counter-content h3 span',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		// Number Suffix Color
		$this->add_control(
			'wb_number_suffix_color',
			[
				'label' => esc_html__( 'Suffix Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-content h3' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_counter_title_style',
			[
				'label' => esc_html__( 'Title', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Title Color
		$this->add_control(
			'wb_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-content p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_counter_title_typography',
				'selector' => '{{WRAPPER}} .counter-content p',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_SECONDARY,
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
		$aee_number_box_number = $settings['aee_number_box_number'];
		$aee_number_box_title = $settings['aee_number_box_title'];
		$aee_number_box_des = $settings['aee_number_box_des'];
       ?>
			<div class="single-number-box">
				<span><?php echo $aee_number_box_number;?></span>
				<h4><?php echo $aee_number_box_title;?></h4>
				<p><?php echo $aee_number_box_des;?></p>
			</div>
       <?php
	}
}