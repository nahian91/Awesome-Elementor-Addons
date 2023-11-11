<?php
/**
 * Awesome Headingt Widget.
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
	 * Retrieve blog widget name.
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
		return esc_html__( 'Heading', 'webbricks' );
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
			'wb_blog_carousel_heading_box',
			 [
				 'label' => esc_html__('Blogs Heading', 'webbricks'),
				 'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			
			 ]
		);

		// Heading Sub Title
		$this->add_control(
			'aee_heading_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Dummy Text' ),
			]
		);

		// Heading Title
		$this->add_control(
			'aee_heading_title',
			[
				'label' => esc_html__( 'Title', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Awesome Heading' ),
			]
		);

		// Heading Description
		$this->add_control(
			'aee_heading_des',
			[
				'label' => esc_html__( 'Description', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page.' ),
			]
		);

		$this->end_controls_section();

		// start of the Content tab section
	    $this->start_controls_section(
			'wb_blog_carousel_contents',
			 [
				 'label' => esc_html__('Query', 'webbricks'),
				 'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			
			 ]
		 );
 
		 // Blog Order
		 $this->add_control(
			 'wb_blog_carousel_order',
			 [
				 'label' 		=> __('Order', 'webbricks'),
				 'type' 			=> Controls_Manager::SELECT,
				 'default' 		=> '',
				 'options' 		=> [
					 '' 			=> __('Default', 'webbricks'),
					 'DESC' 		=> __('DESCENDING', 'webbricks'),
					 'ASC' 		=> __('ASCENDING', 'webbricks'),
				 ],
			 ]
		 );
 
		 // Blog Orderby
		 $this->add_control(
			 'wb_blog_carousel_orderby',
			 [
				 'label' 		=> __('Order By', 'webbricks'),
				 'type' 			=> Controls_Manager::SELECT,
				 'default' 		=> '',
				 'options' 		=> [
					 '' 				=> __('Default', 'webbricks'),
					 'date' 			=> __('Date', 'webbricks'),
					 'title' 		=> __('Title', 'webbricks'),
					 'name' 			=> __('Name', 'webbricks'),
					 'modified' 		=> __('Modified', 'webbricks'),
					 'author' 		=> __('Author', 'webbricks'),
					 'rand' 			=> __('Random', 'webbricks'),
					 'ID' 			=> __('ID', 'webbricks'),
					 'comment_count' => __('Comment Count', 'webbricks'),
					 'menu_order' 	=> __('Menu Order', 'webbricks'),
				 ],
			 ]
		 );
 
		 $args = array(
			 'hide_empty' => false,
		 );
		 
		 $categories = get_categories($args);
 
		 if($categories) {
			 foreach ( $categories as $key => $category ) {
				 $options[$category->term_id] = $category->name;
			 }
		 }
 
		 // Blog Categories
		 $this->add_control(
			 'wb_blog_carousel_include_categories',
			 [
				 'label' => __( 'Post Filter', 'webbricks' ),
				 'type' => \Elementor\Controls_Manager::SELECT2,
				 'multiple' => true,
				 'options' => $options,
			 ]
		 );
		 
		 $this->end_controls_section();
 
		 $this->start_controls_section(
			 'wb_blog_carousel_option_section',
			  [
				  'label' => esc_html__('Meta Info', 'webbricks'),
				  'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			 
			 ]
		 );
 
		 // Blog Category Show
		 $this->add_control(
			 'wb_blog_carousel_cat_visibility',
			 [
				 'label' 		=> __('Show Category', 'webbricks'),
				 'type' 			=> Controls_Manager::SWITCHER,
				 'default' 		=> 'yes',
				 'label_on' 		=> __('Show', 'webbricks'),
				 'label_off' 	=> __('Hide', 'webbricks'),
			 ]
		 );
 
		 // Blog Date Show
		 $this->add_control(
			 'wb_blog_carousel_date_visibility',
			 [
				 'label' 		=> __('Show Date', 'webbricks'),
				 'type' 			=> Controls_Manager::SWITCHER,
				 'default' 		=> 'yes',
				 'label_on' 		=> __('Show', 'webbricks'),
				 'label_off' 	=> __('Hide', 'webbricks'),
			 ]
		 );
 
		 // Blog Excerpt Show
		 $this->add_control(
			 'wb_blog_carousel_excerpt_visibility',
			 [
				 'label' 		=> __('Show Excerpt', 'webbricks'),
				 'type' 			=> Controls_Manager::SWITCHER,
				 'default' 		=> 'yes',
				 'label_on' 		=> __('Show', 'webbricks'),
				 'label_off' 	=> __('Hide', 'webbricks'),
			 ]
		 );
 
		 $this->end_controls_section();
		 // end of the Content tab section

		 // start of the Content tab section
		$this->start_controls_section(
			'wb_blog_carousel_settings',
			 [
				 'label' => esc_html__('Settings', 'webbricks'),
				 'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			
			 ]
		 );

		// Blogs Carousel Number
		$this->add_control(
			'wb_blog_carousel_number',
			[
				'label' 		=> __('Number of Blogs', 'webbricks'),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> '4',
			]
		);

		// Blogs Carousel Arrows
		$this->add_control(
			'wb_blog_carousel_arrows',
			[
				'label' => esc_html__( 'Arrows', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks' ),
				'label_off' => esc_html__( 'No', 'webbricks' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'wb_blog_carousel_arrows' => 'yes'
				],
			]
		);

		// Blogs Carousel Loops
		$this->add_control(
			'wb_blog_carousel_loop',
			[
				'label' => esc_html__( 'Loops', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks' ),
				'label_off' => esc_html__( 'No', 'webbricks' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Blogs Carousel Pause
		$this->add_control(
			'wb_blog_carousel_pause',
			[
				'label' => esc_html__( 'Pause on hover', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks' ),
				'label_off' => esc_html__( 'No', 'webbricks' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Blogs Carousel Autoplay
		$this->add_control(
			'wb_blog_carousel_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks' ),
				'label_off' => esc_html__( 'No', 'webbricks' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Blogs Carousel Autoplay Speed
		$this->add_control(
			'wb_blog_carousel_autoplay_speed',
			[
				'label' => esc_html__( 'Speed', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '5000',
				'options' => [
					'1000' => esc_html__( '1 Seconds', 'webbricks' ),
					'2000' => esc_html__( '2 Seconds', 'webbricks' ),
					'3000' => esc_html__( '3 Seconds', 'webbricks' ),
					'4000' => esc_html__( '4 Seconds', 'webbricks' ),
					'5000' => esc_html__( '5 Seconds', 'webbricks' ),
					'6000' => esc_html__( '6 Seconds', 'webbricks' ),
					'7000' => esc_html__( '7 Seconds', 'webbricks' ),
					'8000' => esc_html__( '8 Seconds', 'webbricks' ),
					'9000' => esc_html__( '9 Seconds', 'webbricks' ),
					'10000' => esc_html__( '10 Seconds', 'webbricks' ),
				],
			]
		);

		// Blogs Carousel Animation Speed
		$this->add_control(
			'wb_blog_carousel_autoplay_animation',
			[
				'label' => esc_html__( 'Timeout', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '5000',
				'options' => [
					'1000' => esc_html__( '1 Seconds', 'webbricks' ),
					'2000' => esc_html__( '2 Seconds', 'webbricks' ),
					'3000' => esc_html__( '3 Seconds', 'webbricks' ),
					'4000' => esc_html__( '4 Seconds', 'webbricks' ),
					'5000' => esc_html__( '5 Seconds', 'webbricks' ),
					'6000' => esc_html__( '6 Seconds', 'webbricks' ),
					'7000' => esc_html__( '7 Seconds', 'webbricks' ),
					'8000' => esc_html__( '8 Seconds', 'webbricks' ),
					'9000' => esc_html__( '9 Seconds', 'webbricks' ),
					'10000' => esc_html__( '10 Seconds', 'webbricks' ),
				],
			]
		);

		 $this->end_controls_section();
		 // end of the Content tab section

		// Blog Section Heading Style
		$this->start_controls_section(
			'wb_blog_carousel_sectiontitle_style',
			[
				'label' => esc_html__( 'Section Heading', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Blog Section Bullet Options
		$this->add_control(
			'wb_blog_carousel_section_sep_options',
			[
				'label' => esc_html__( 'Bullet', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		// Blog Section Bullet Color
		$this->add_control(
			'wb_blog_carousel_section_sep_bg',
			[
				'label' => esc_html__( 'Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title h4:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Blog Section Bullet Round
		$this->add_control(
			'wb_blog_carousel_section_sep_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .section-title h4:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Blog Section Sub Heading Options
		$this->add_control(
			'wb_blog_carousel_subtitle_options',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Blog Section Sub Heading Color
		$this->add_control(
			'wb_blog_carousel_subtitle_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title h4' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Blog Section Sub Heading Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_blog_carousel_subtitle_typography',
				'selector' => '{{WRAPPER}} .section-title h4',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Blog Section Heading Options
		$this->add_control(
			'wb_blog_carousel_title_options',
			[
				'label' => esc_html__( 'Heading', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Blog Section Heading Color
		$this->add_control(
			'wb_blog_carousel_section_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title h2' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Blog Section Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_blog_carousel_section_title_typography',
				'selector' => '{{WRAPPER}} .section-title h2',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'wb_blog_carousel_layout_style',
			[
				'label' => esc_html__( 'Layout', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);	

		// Blog Background
		$this->add_control(
			'wb_blog_carousel_bg_color',
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
			'wb_blog_carousel_padding',
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
			'wb_blog_carousel_border_radius',
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
			'wb_blog_carousel_meta_style',
			[
				'label' => esc_html__( 'Meta', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);	

		// Meta Color
		$this->add_control(
			'wb_blog_carousel_meta_color',
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
				'name' => 'wb_blog_carousel_meta_typography',
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
			'wb_blog_carousel_title_style',
			[
				'label' => esc_html__( 'Title', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);	

		// Title Color
		$this->add_control(
			'wb_blog_carousel_title_color',
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
				'name' => 'wb_blog_carousel_title_typography',
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
			'wb_blog_carousel_excerpt_style',
			[
				'label' => esc_html__( 'Excerpt', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);	

		// Excerpt Color
		$this->add_control(
			'wb_blog_carousel_excerpt_color',
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
				'name' => 'wb_blog_carousel_excerpt_typography',
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
			'wb_blog_carousel_image_style',
			[
				'label' => esc_html__( 'Image', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);	

		// Blog Image Radius
		$this->add_control(
			'wb_blog_carousel_image_radius',
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
			'wb_blog_carousel_button_style',
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
			'wb_blog_carousel_btn_color',
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
			'wb_blog_carousel_btn_border_color',
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
			'wb_blog_carousel_button_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks' ),
			]
		);

		// Blog Button Hover Icon Color
		$this->add_control(
			'wb_blog_carousel_btn_bg_hover_color',
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
			'wb_blog_carousel_btn_bg_hover_bg',
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

		// Blog Arrow Style
		$this->start_controls_section(
			'wb_blog_carousel_arrow_style',
			[
				'label' => esc_html__( 'Arrow Buttons', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'wb_blog_carousel_arrow_style_tabs'
		);

		// Blog Arrow Normal Tab
		$this->start_controls_tab(
			'wb_blog_carousel_arrow_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks' ),
			]
		);

		// Blog Arrow Color
		$this->add_control(
			'wb_blog_carousel_arrow_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-arrow i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Blog Arrow Border Color
		$this->add_control(
			'wb_blog_carousel_arrow_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-arrow' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_tab();

		// Blog Arrow Hover Tab
		$this->start_controls_tab(
			'wb_blog_carousel_arrow_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks' ),
			]
		);

		// Blog Arrow Hover Icon Color
		$this->add_control(
			'wb_blog_carousel_arrow_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-arrow:hover i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Blog Arrow Round
		$this->add_control(
			'wb_blog_carousel_arrow_hover_bg',
			[
				'label' => esc_html__( 'Background Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-arrow:after' => 'background-color: {{VALUE}}',
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