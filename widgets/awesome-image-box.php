<?php 
/**
 * Awesome Image Box Widget.
 *
 * Elementor widget that inserts a image box into the page
 *
 * @since 1.0.0
 */
namespace Elementor;
class Awesome_Image_Box extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve blog widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesome-image-box';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve blog widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Image Box', 'aee' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve blog widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-image-box';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the blog widget belongs to.
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
	       'aee_image_box_contents',
		    [
		        'label' => esc_html__('Contents', 'aee'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		    ]
	    );

		// Image Box Image
		$this->add_control(
			'aee_image_box_image',
			[
				'label' => esc_html__( 'Choose Image', 'aee' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		// Image Box Title
		$this->add_control(
			'aee_image_box_title',
			[
				'label' => esc_html__( 'Title', 'aee' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Awesome Heading' ),
			]
		);

		// Image Box Description
		$this->add_control(
			'aee_image_box_des',
			[
				'label' => esc_html__( 'Description', 'aee' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', 'aee' ),
			]
		);

		// Image Box Show Button?
		$this->add_control(
			'aee_image_box_show_btn',
			[
				'label' => esc_html__( 'Show Button?', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks' ),
				'label_off' => esc_html__( 'Hide', 'webbricks' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);

		// Image Box Button Title
		$this->add_control(
		    'aee_image_box_btn_title',
			[
			    'label' => esc_html__('Button Text', 'webbricks'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Click To Read More', 'webbricks'),
				'separator' => 'before',
				'condition' => [
					'aee_image_box_show_btn' => 'yes'
				],
			]
		);

		// Image Box Button Link
		$this->add_control(
		    'aee_image_box_btn_link',
			[
			    'label' => esc_html__( 'Button Link', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => 'https://anahian.com/',
					'is_external' => true,
					'nofollow' => false,
					'custom_attributes' => '',
				],
				'condition' => [
					'aee_image_box_show_btn' => 'yes'
				]
			]
		);

		// Image Box Alignment
		$this->add_control(
			'aee_image_box_alignment',
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
					'{{WRAPPER}} .single-image-box' => 'text-align: {{VALUE}};',
				],
			]
		);


		$this->end_controls_section();
		// end of the Content tab section
		
		// start of the Style tab section
		$this->start_controls_section(
			'aee_image_box_layout_style',
			[
				'label' => esc_html__( 'Layout', 'aee' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);	

		// Image Box Background
		$this->add_control(
			'aee_image_box_bg_color',
			[
				'label' => esc_html__( 'Background', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-image-box' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Image Box Padding
		$this->add_control(
			'aee_image_box_padding',
			[
				'label' => esc_html__( 'Padding', 'aee' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .single-image-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Image Box Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'aee_image_box_border',
				'selector' => '{{WRAPPER}} .single-image-box',
			]
		);	

		// Image Box Border Radius
		$this->add_control(
			'aee_image_box_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'aee' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .single-image-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'aee_image_box_contents_style',
			[
				'label' => esc_html__( 'Contents', 'aee' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);	

		// Title Color
		$this->add_control(
			'aee_image_box_title_color',
			[
				'label' => esc_html__( 'Color', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-image-box h4' => 'color: {{VALUE}} !important',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'aee_image_box_title_typography',
				'selector' => '{{WRAPPER}} .single-image-box h4',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		// Description Color
		$this->add_control(
			'aee_image_box_desc_color',
			[
				'label' => esc_html__( 'Color', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-image-box p' => 'color: {{VALUE}} !important',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Description Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'aee_image_box_desc_typography',
				'selector' => '{{WRAPPER}} .single-image-box p',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_blog_button_style',
			[
				'label' => esc_html__( 'Button', 'aee' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);	

		$this->start_controls_tabs(
			'wb_blogs_button_style_tabs'
		);

		// Blog Button Normal Tab
		$this->start_controls_tab(
			'button_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'aee' ),
			]
		);

		// Blog Button Color
		$this->add_control(
			'wb_blog_btn_color',
			[
				'label' => esc_html__( 'Icon Color', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Blog Button Border Color
		$this->add_control(
			'wb_blog_btn_border_color',
			[
				'label' => esc_html__( 'Border Color', 'aee' ),
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

		// Blog Button Hover Tab
		$this->start_controls_tab(
			'wb_blog_button_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'aee' ),
			]
		);

		// Blog Button Hover Icon Color
		$this->add_control(
			'wb_blog_btn_bg_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'aee' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border:hover i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Blog Button Hover Background Color
		$this->add_control(
			'wb_blog_btn_bg_hover_bg',
			[
				'label' => esc_html__( 'Background', 'aee' ),
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
		$aee_image_box_image = $settings['aee_image_box_image']['url'];
		$aee_image_box_title = $settings['aee_image_box_title'];
		$aee_image_box_des = $settings['aee_image_box_des'];
       ?>
			<div class="single-image-box">
				<img src="<?php echo $aee_image_box_image;?>">
				<h4><?php echo $aee_image_box_title;?></h4>
				<p><?php echo $aee_image_box_des;?></p>
			</div>
       <?php
	}
}