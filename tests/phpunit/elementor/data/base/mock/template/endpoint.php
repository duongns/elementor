<?php
namespace Elementor\Tests\Phpunit\Elementor\Data\Base\Mock\Template;

class Endpoint extends \Elementor\Data\Base\Endpoint {

	/**
	 * @var \Elementor\Tests\Phpunit\Elementor\Data\Base\Mock\Template\Controller
	 */
	public $controller;

	use BaseTrait;

	public function get_type() {
		return 'endpoint';
	}

	protected function get_items( $request ) {
		$test_data = $this->get_test_data( 'get_items');

		if ( $test_data ) {
			return $test_data;
		}

		return parent::get_items( $request );
	}

	protected function register() {
		// Can be part of BaseTrait.
		if ( ! $this->controller->bypass_register_status ) {
			parent::register();
		}
	}

	public function do_get_items( $request ) {
		return $this->get_items( $request );
	}

	public function do_get_items_recursive( $request ) {
		return parent::get_items_recursive( $request );
	}

	public function do_register() {
		parent::register();
	}

	public function do_register_sub_endpoint( $route, $endpoint_class ) {
		return parent::register_sub_endpoint( $route, $endpoint_class );
	}
}
