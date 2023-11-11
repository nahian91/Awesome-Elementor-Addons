<?php
/**
 * Awesome Heading Widget.
 *
 * Elementor widget that inserts a blog into the page
 *
 * @since 1.0.0
 */

namespace Elementor;
class Awesome_Heading extends Widget_Base {

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
		return 'awesome-heading';
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
		return esc_html__( 'Heading', 'aee' );
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
		return 'eicon-heading';
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
			'aee_heading_contents',
			 [
				'label' => esc_html__('Contents', 'aee'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,			
			]
		);

		// Heading Sub Heading
		$this->add_control(
			'aee_heading_sub_heading',
			[
				'label' => esc_html__( 'Sub Heading', 'aee' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Dummy Text' ),
			]
		);

		// Heading
		$this->add_control(
			'aee_heading',
			[
				'label' => esc_html__( 'Heading', 'aee' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Awesome Heading' ),
			]
		);

		// Heading Description
		$this->add_control(
			'aee_heading_desc',
			[
				'label' => esc_html__( 'Description', 'aee' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page.', 'aee' ),
			]
		);

		// Heading Alignment
		$this->add_control(
			'aee_heading_alignment',
			[
				'label' => esc_html__( 'Alignment', 'aee' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'separator' => 'before',
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'aee' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'aee' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'aee' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .section-title' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
		// end of the Content tab section

		// start of the Heading Style
		$this->start_controls_section(
			'aee_heading_style',
			[
				'label' => esc_html__( 'Contents', 'aee' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Sub Heading Options
		$this->add_control(
			'aee_sub_heading_options',
			[
				'label' => esc_html__( 'Sub Heading', 'aee' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Sub Heading Color
		$this->add_control(
			'aee_sub_heading_color',
			[
				'label' => esc_html__( 'Color', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Sub Heading Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'aee_sub_heading_typography',
				'selector' => '{{WRAPPER}} .section-title span',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Heading Options
		$this->add_control(
			'aee_heading_options',
			[
				'label' => esc_html__( 'Heading', 'aee' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Heading Color
		$this->add_control(
			'aee_heading_color',
			[
				'label' => esc_html__( 'Text Color', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title h4' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Heading Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'aee_heading_typography',
				'selector' => '{{WRAPPER}} .section-title h4',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// Description Options
		$this->add_control(
			'aee_desc_options',
			[
				'label' => esc_html__( 'Description', 'aee' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Description Color
		$this->add_control(
			'aee_desc_color',
			[
				'label' => esc_html__( 'Color', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Description Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'aee_desc_typography',
				'selector' => '{{WRAPPER}} .section-title p',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
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
		$aee_heading_sub_title = $settings['aee_heading_sub_title'];
		$aee_heading_title = $settings['aee_heading_title'];
		$aee_heading_des = $settings['aee_heading_des'];
       ?>
			<div class="section-title">
				<span><?php echo $aee_heading_sub_title;?></span>
				<h4><?php echo $aee_heading_title;?></h4>
				<p><?php echo $aee_heading_des;?></p>
			</div>
       <?php
	}
}