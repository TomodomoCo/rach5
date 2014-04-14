<?php

class RfWidget extends WP_Widget {

	function __construct() {
		parent::__construct( false, 'Rach5: Default Widget' );
	}

	function widget( $args, $instance ) {
		extract( $args );

		echo $before_widget;

		// Widget Content here

		echo $after_widget;
	}

}
