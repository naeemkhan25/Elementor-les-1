<?php

class Widget_1 extends  \Elementor\Widget_Base {
    public function get_name() {
		return 'TestWidgets';
	}

	public function get_title() {
		return __("Test Widgets","elementor-test-addon");
	}

	public function get_icon() {
		return 'eicon-code';
	}
	public function get_custom_help_url() {
		return 'https://go.elementor.com/widget-name';
	}

	public function get_categories() {
		return ['WPPOOL'];
	}

	public function get_keywords() {
		return [ 'keyword', 'keyword' ];
	}

	// public function get_script_depends() {}

	// public function get_style_depends() {}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-test-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'heading',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Title', 'elementor-test-addon' ),
				'placeholder' => esc_html__( 'Enter your title', 'elementor-test-addon' ),
			]
		);

		$this->add_control(
			'size',
			[
				'type' => \Elementor\Controls_Manager::NUMBER,
				'label' => esc_html__( 'Size', 'elementor-test-addon' ),
				'placeholder' => '0',
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'default' => 50,
			]
		);
		
		$this->end_controls_section();
		$this->start_controls_section(
			'position_section',
			[
				'label' => esc_html__( 'Position', 'elementor-test-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'alignment',
			[
				'label' => esc_html__( 'Alignment', 'elementor-test-addon' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'   => esc_html__( 'Left', 'elementor-test-addon' ),
					'right'  => esc_html__( 'Right', 'elementor-test-addon' ),
					'center' => esc_html__( 'Center', 'elementor-test-addon' ),
				],
				'selectors' => [
					'{{WRAPPER}} h3.heading' => 'text-align: {{VALUE}}',
				],

			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'color_section',
			[
				'label' => esc_html__( 'Color', 'elementor-test-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'elementor-test-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h3.heading' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();


	}

	protected function render() {


		//get the control for display;
		$settings = $this->get_settings_for_display();
		$this->add_render_attribute(
			'heading_title',
			[
				'class' => 'heading',
			]
		);

		$heading = $settings['heading'];
		echo $this->add_inline_editing_attributes( 'heading_title', 'none' );
		?>
		<h3 <?php echo $this->get_render_attribute_string( 'heading_title' ) ?> class='heading'> <?php echo esc_html($heading);?></h3>
		<?php
		
	}
	/**
	 * its use for preview in js
	 * 
	 */
	protected function content_template() {
	?>
		<#
		view.addInlineEditingAttributes( 'heading_title', 'none' );
		view.addRenderAttribute(
			'heading_title',
			{
				'class':'heading',
			}
		);

		#>
		<h3 {{{view.getRenderAttributeString( 'heading_title' ) }}}>{{{settings.heading}}}</h3>
	<?php

	}
}