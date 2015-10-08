<?php

/**********************************************
embeding video widget
***********************************************/

class widget_embed extends WP_Widget{ 
	
	
	public function __construct() {
		parent::__construct(
			'widget_embed', // Base ID
			__( 'Brad Video Embed', 'brad-framework' ), // Name
			array( 'description' => __( 'Display Your Videos', 'brad-framework' ), ) // Args
		);
	}
	
	
	public function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$embed = $instance['embed'];
		$description = $instance['description'];
		
	
		echo $before_widget;
		echo $before_title . $title . $after_title;
		
		echo '<div class="video">';
		echo esc_html($embed);
		if (!empty($description)) { echo '<p>' . esc_attr($description) . '</p>'; }
		echo '</div>';

		echo $after_widget;
	
	}
	
	
	public function update( $new_instance, $old_instance ) {  
		$instance = $old_instance; 
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['embed'] = $new_instance['embed'];
		$instance['description'] = $new_instance['description'];
		
		return $instance;
	}
	
	
	public function form($instance) {
		
		$defaults = array( 'title' => 'Embed Widget', 'embed' => '', 'description' => '' ); 
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Widget Title:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>"  style="width: 100%;"name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id( 'embed' ); ?>">Embed Code:</label>
			<textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id( 'embed' ); ?>" style="width: 100%;" name="<?php echo $this->get_field_name( 'embed' ); ?>"><?php echo esc_attr($instance['embed']); ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'description' ); ?>">Description:</label>
			<textarea class="widefat" rows="2" cols="20" style="width: 100%;"  id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>"><?php echo esc_attr($instance['description']); ?></textarea>
		</p>
		
    <?php }
}


?>