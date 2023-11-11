<?php
/**
 * Awesome Testimonial
 *
 * Elementor widget that inserts a Info Box into the page
 *
 * @since 1.0.0
*/

namespace Elementor;
class Awesome_Testimonial extends Widget_Base {

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
		return 'awesome-testimonial';
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
		return esc_html__( 'Testimonial', 'webbricks' );
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
		return 'eicon-testimonial-carousel';
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
	       'wb_info_box_contents',
		    [
		        'label' => esc_html__('Contents', 'webbricks'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
	    );
		
		// Info Box Heading
		$this->add_control(
		    'aee_testimonial_description',
			[
			    'label' => esc_html__('Heading', 'webbricks'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__('Car Rental', 'webbricks'),
				'separator' => 'before'
			]
		);

		$this->add_control(
			'aee_testimonial_author_image',
			[
				'label' => esc_html__( 'Choose Featured Image', 'aee' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => plugin_dir_url(__DIR__) . 'assets/images/about.jpg',
				]
			]
		);

		// Info Box Description
		$this->add_control(
			'aee_testimonial_author_name',
			[
				'label' => esc_html__( 'Description', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat.', 'webbricks' ),
				'separator' => 'before',
				'label_block' => true
			]
		);

		// Info Box Description
		$this->add_control(
			'aee_testimonial_author_designation',
			[
				'label' => esc_html__( 'Description', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat.', 'webbricks' ),
				'separator' => 'before',
				'label_block' => true
			]
		);

		// Info Box Alignment
		$this->add_control(
			'wb_info_box_alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Alignment', 'webbricks' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'webbricks' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'webbricks' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'webbricks' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .info-box' => 'text-align: {{VALUE}}',
				],
				'separator' => 'before'
			],
		);
		
		$this->end_controls_section();
		// end of the Content tab section
		
		// start of the Style tab section

		// Info Box Layout
		$this->start_controls_section(
			'wb_info_box_style',
			[
				'label' => esc_html__( 'Layout', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Info Box Background
		$this->add_control(
			'wb_info_box_background',
			[
				'label' => esc_html__( 'Background', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .info-box' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// // Info Box Layout Round
		$this->add_control(
			'wb_info_box_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .info-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Info Box Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'wb_price_border',
				'selector' => '{{WRAPPER}} .info-box',
			]
		);	


		// Info Box Padding
		$this->add_control(
			'wb_info_box_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .info-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Info Box Icon Style
		$this->start_controls_section(
			'wb_info_box_icon_style',
			[
				'label' => esc_html__( 'Icon', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Info Box Icon Color
		$this->add_control(
			'wb_info_box_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .info-box-icon i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Info Box Icon Size
		$this->add_control(
			'wb_info_box_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 60,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 43,
				],
				'selectors' => [
					'{{WRAPPER}} .info-box-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Info Box Content Style
		$this->start_controls_section(
			'wb_info_box_title_style',
			[
				'label' => esc_html__( 'Contents', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Info Box Content Title Heading
		$this->add_control(
			'wb_info_box_title_head',
			[
				'label' => esc_html__( 'Heading', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Info Box Content Title Color
		$this->add_control(
			'wb_info_box_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .info-box-content h4' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Info Box Content Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_info_box_title_typography',
				'selector' => '{{WRAPPER}} .info-box-content h4',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// Info Box Content Descrption
		$this->add_control(
			'wb_info_box_desc_head',
			[
				'label' => esc_html__( 'Description', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Info Box Content Description Color
		$this->add_control(
			'wb_info_box_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .info-box-content p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Info Box Content Description Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_info_box_desc_typography',
				'selector' => '{{WRAPPER}} .info-box-content p',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();

		// Info Box Button Style
		$this->start_controls_section(
			'wb_info_box_button_style',
			[
				'label' => esc_html__( 'Button', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_info_box_show_btn' => 'yes'
				]
			]
		);

		$this->start_controls_tabs(
			'wb_info_box_style_tabs'
		);

		// Info Box Button Normal Tab
		$this->start_controls_tab(
			'wb_info_box_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks' ),
			]
		);

		// Info Box Button Color
		$this->add_control(
			'wb_info_box_btn_color',
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

		// Info Box Button Border Color
		$this->add_control(
			'wb_info_box_btn_border_color',
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

		// Info Box Button Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_info_box_btn_typography',
				'selector' => '{{WRAPPER}} .btn-border',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		$this->end_controls_tab();

		// Info Box Hover Tab
		$this->start_controls_tab(
			'wb_button_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks' ),
			]
		);

		// Info Box Button Hover Color
		$this->add_control(
			'wb_info_box_btn_hover_color',
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

		// Info Box Button Hover Background
		$this->add_control(
			'wb_info_box_btn_hover_bg',
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

		// Info Box Button Hover Border
		$this->add_control(
			'wb_info_box_btn_hover_border',
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
		$aee_testimonial_description = $settings['aee_testimonial_description'];
		$aee_testimonial_author_image = $settings['aee_testimonial_author_image']['url'];
		$aee_testimonial_author_name = $settings['aee_testimonial_author_name'];
		$aee_testimonial_author_designation = $settings['aee_testimonial_author_designation'];
       ?>
			<div class="single-testimonial">
				<i class="fas fa-quote-left"></i>
				<p><?php echo $aee_testimonial_description;?></p>
				<div class="authro-info">
					<h4><img src="<?php echo $aee_testimonial_author_image;?>" alt=""><?php echo $aee_testimonial_author_name;?> <span><?php echo $aee_testimonial_author_designation;?></span></h4>
				</div>
			</div>
       <?php
	}
}