<?php

// Creating the widget 
class sp_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
// Base ID of your widget
			'sp_widget', 

// Widget name will appear in UI
			__('Random Testimonial', 'sp_widget_domain'), 

// Widget description
		array( 'description' => __( 'This widget will display 1 random testimonial', 'sp_widget_domain' ), ) 
			);
	}

// Creating widget front-end
// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output

		$post_type = ('sp_testimonial');
		$offset = get_random_post_offset($post_type);
		$NUM_POSTS = 1;
		sp_retrieve_post($post_type, $NUM_POSTS, $offset );

		echo $args['after_widget'];
	}

// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'sp_widget_domain' );
		}
// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}
	
// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} // Class wpb_widget ends here

// Register and load the widget
function sp_load_widget() {
	register_widget( 'sp_widget' );
}
add_action( 'widgets_init', 'sp_load_widget' );