<?php
/**
 * A singleton trait for use in WordPress projects.
 *
 * @package johnwatkins0/wp-singleton
 */

namespace JohnWatkins0\WPSingleton;

/**
 * Trait Singleton
 */
trait Singleton {

	/**
	 * An instance of the object to prevent duplication.
	 *
	 * @var   object|null Instance of object.
	 */
	protected static $instance = null;

	/**
	 * Object constructor. Intentionally empty and protected.
	 */
	protected function __construct() {
	}

	/**
	 * Prevent the object from being cloned.
	 */
	final protected function __clone() {
	}

	/**
	 * Grabs an instance of the object.
	 *
	 * @return object
	 */
	final public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
			if ( method_exists( self::$instance, 'init' ) ) {
				self::$instance->init();
			}
		}

		return self::$instance;
	}

	/**
	 * Whether tests are running.
	 *
	 * @return boolean
	 */
	final public static function is_test_environment() {
		return ! ! getenv( 'TEST_SITE_WP_ADMIN_PATH' )
			&& ! defined( 'DOING_TESTS' );
	}

	/**
	 * If in a test environment, delete the instance.
	 */
	final public static function delete() {
		if ( self::is_test_environment() ) {
			self::$instance = null;
		}
	}
}
