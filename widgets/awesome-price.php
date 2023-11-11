<?php
/**
 * Awesome Price
 *
 * Elementor widget that inserts a cta into the page
 *
 * @since 1.0.0
 */
namespace Elementor;
class Awesome_Price extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve cta widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesome-price';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve cta widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Price', 'webbricks' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve cta widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-price-table';
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
		
		// Start of the CTA Content Tab Section
	   $this->start_controls_section(
	       'cta_content',
		    [
		        'label' => esc_html__('Content', 'webbricks'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT		   
		    ]
	    );
		
		// Price Title
		$this->add_control(
			'aee_price_box_title',
			[
				'label' => esc_html__( 'Price Title', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Standard' ),
			]
		);

		// Price Amount
		$this->add_control(
			'aee_price_box_amount',
			[
				'label' => esc_html__( 'Price Amount', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '$25' ),
			]
		);

		// Price Plan
		$this->add_control(
			'aee_price_box_plan',
			[
				'label' => esc_html__( 'Price Plan', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Month' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		// Repeater for Price List
		$repeater->add_control(
			'aee_price_box_features',
			[
				'label' => esc_html__( 'Features Title', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Add New Feature' , 'awesome-widgets' ),
			]
		);

		// Features List
		$this->add_control(
			'aee_price_box_features_list',
			[
				'label' => esc_html__( 'Features List', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'text' => esc_html__( 'List Item #1', 'awesome-widgets' ),
					],
					[
						'text' => esc_html__( 'List Item #2', 'awesome-widgets' ),
					],
					[
						'text' => esc_html__( 'List Item #3', 'awesome-widgets' ),
					],
				],
				'title_field' => '{{{ aee_price_box_features }}}',
			]
		);

		// Price Plan Button Text
		$this->add_control(
			'aee_price_box_button_text',
			[
				'label' => esc_html__( 'Button Text', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Click me', 'awesome-widgets' ),
			]
		);

		// Price Plan Button Link
		$this->add_control(
			'aee_price_box_button_link',
			[
				'label' => __( 'Button Link', 'awesome-widgets' ),
				'type' => \Elementor\Controls_Manager::URL,
				'label_block' => true,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
			]
		);
		
		$this->end_controls_section();
		// End of the CTA Content Tab Section
		
		// CTA Layout
		$this->start_controls_section(
			'wb_cta_layout_style',
			[
				'label' => esc_html__( 'Layout', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// CTA Background Color
		$this->add_control(
			'wb_cta_background_color',
			[
				'label' => esc_html__( 'Background', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// CTA Border Radius
		$this->add_control(
			'wb_cta_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .cta' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// CTA Padding
		$this->add_control(
			'wb_cta_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .cta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// CTA Title Style
		$this->start_controls_section(
			'wb_cta_title_style',
			[
				'label' => esc_html__( 'CTA Content', 'webbricks' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// CTA Title Color
		$this->add_control(
			'wb_cta_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta h2' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// CTA Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wb_cta_title_typography',
				'selector' => '{{WRAPPER}} .cta h2',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_SECONDARY,
				]
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
		$aee_price_box_title = $settings['aee_price_box_title'];
		$aee_price_box_amount = $settings['aee_price_box_amount'];
		$aee_price_box_plan = $settings['aee_price_box_plan'];
		$aee_price_box_button_text = $settings['aee_price_box_button_text'];
		$aee_price_box_button_link = $settings['aee_price_box_button_link'];
       ?>
			<div class="single-price">
				  <div class="price-title">
					<h4><?php echo $aee_price_box_title;?></h4>
				  </div>
				  <div class="price-tag">
					<h2><?php echo $aee_price_box_amount;?> <span><?php echo $aee_price_box_plan;?></span></h2>
				  </div>
				  <div class="price-item">
					<ul>
						<?php 
							foreach (  $settings['aee_price_box_features_list'] as $item ) { 
								$aee_price_box_features = $item['aee_price_box_features'];
							?>
							<li class="price-area__item"><?php echo $aee_price_box_features;?></li>
						<?php 
							} 
						?>
					</ul>
				  </div>
				  <a href="<?php echo $aee_price_box_button_link;?>" class="box-btn"><?php echo $aee_price_box_button_text;?></a>
			</div>
       <?php
	}
}