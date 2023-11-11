<?php 
/**
 * Awesome Image Box
 *
 * Elementor widget that inserts a blog into the page
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
		return esc_html__( 'Image Box', 'webbricks' );
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
		return 'eicon-post-content';
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
	       'wb_blog_contents',
		    [
		        'label' => esc_html__('Query', 'webbricks'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
	    );

		// Image Box Image
		$this->add_control(
			'aee_image_box_image',
			[
				'label' => esc_html__( 'Choose Image', 'awesome-widgets' ),
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
				'label' => esc_html__( 'Title', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Awesome Heading' ),
			]
		);

		// Image Box Description
		$this->add_control(
			'aee_image_box_des',
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
			'wb_blog_layout_style',
			[
				'label' => esc_html__( 'Layout', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);	

		// Blog Background
		$this->add_control(
			'wb_blog_bg_color',
			[
				'label' => esc_html__( 'Background', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-content' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Blog Padding
		$this->add_control(
			'wb_blog_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .blog-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Blog Border Radius
		$this->add_control(
			'wb_blog_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .blog-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'wb_blog_meta_style',
			[
				'label' => esc_html__( 'Meta', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);	

		// Meta Color
		$this->add_control(
			'wb_meta_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-meta, .blog-meta a' => 'color: {{VALUE}} !important',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Meta Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_blogmeta_typography',
				'selector' => '{{WRAPPER}} .blog-meta, .blog-meta a',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_blog_title_style',
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
					'{{WRAPPER}} .blog-title h3 a' => 'color: {{VALUE}}',
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
				'name' => 'wb_blog_title_typography',
				'selector' => '{{WRAPPER}} .blog-title h3 a',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_blog_excerpt_style',
			[
				'label' => esc_html__( 'Excerpt', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);	

		// Excerpt Color
		$this->add_control(
			'wb_excerpt_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-excerpt' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Excerpt Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'excerpt_typography',
				'selector' => '{{WRAPPER}} .blog-excerpt',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_blog_image_style',
			[
				'label' => esc_html__( 'Image', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);	

		// Blog Image Radius
		$this->add_control(
			'wb_blog_image_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .blog-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wb_blog_button_style',
			[
				'label' => esc_html__( 'Button', 'webbricks' ),
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
				'label' => esc_html__( 'Normal', 'webbricks' ),
			]
		);

		// Blog Button Color
		$this->add_control(
			'wb_blog_btn_color',
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

		// Blog Button Border Color
		$this->add_control(
			'wb_blog_btn_border_color',
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

		// Blog Button Hover Tab
		$this->start_controls_tab(
			'wb_blog_button_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks' ),
			]
		);

		// Blog Button Hover Icon Color
		$this->add_control(
			'wb_blog_btn_bg_hover_color',
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

		// Blog Button Hover Background Color
		$this->add_control(
			'wb_blog_btn_bg_hover_bg',
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