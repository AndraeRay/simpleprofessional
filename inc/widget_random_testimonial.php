<?php

function sp_getPostTypes() {
	$args = array(
	   'public'   => true,
	   '_builtin' => false
	);

	//declare post types and include post
	$post_types = array("post");

	$output = 'names'; // names or objects, note names is the default
	$operator = 'and'; // 'and' or 'or'

	$raw_post_types = get_post_types( $args, $output, $operator );

	foreach ( $raw_post_types  as $post_type ) {
	   array_push($post_types, $post_type);
	}


	//return($post_types);
	return $post_types;
}

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

		$post_type = $instance['post_type'];
		$offset = get_random_post_offset($post_type);
		$NUM_POSTS = 1;
		sp_retrieve_post($post_type, $NUM_POSTS, $offset );

		echo $args['after_widget'];
	}

// Widget Backend 
	public function form( $instance ) {

		$post_types = sp_getPostTypes();
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'sp_widget_domain' );
		}
		if ( isset( $instance[ 'post_type' ] ) ) {
			$post_type = $instance[ 'post_type' ];
		}
		else {
			$post_type = __( 'post', 'sp_widget_domain' );
		}
// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'post_type' ); ?>"><?php _e( 'Post Type:' ); ?></label> 
			<select class="widefat" id="<?php echo $this->get_field_id( 'post_type' ); ?>" name="<?php echo $this->get_field_name( 'post_type' ); ?>" >
				<?php foreach ($post_types as $key=>$value): ?> <option value="<?php echo $value;?>" <?php echo (array_search($post_type, $post_types) == $key) ? 'selected' : ''?>> <?php echo $value; ?> </option> <?php endforeach ?>
			</select>
		</p>

		<?php 
	}
	
// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['post_type'] = ( ! empty( $new_instance['post_type'] ) ) ? strip_tags( $new_instance['post_type'] ) : '';
		return $instance;
	}
} // Class wpb_widget ends here

// Register and load the widget
function sp_load_widget() {
	register_widget( 'sp_widget' );
}
add_action( 'widgets_init', 'sp_load_widget' );