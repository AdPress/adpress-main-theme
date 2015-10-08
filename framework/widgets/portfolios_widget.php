<?php


class portfolios_Widget extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
			'portfolio_widget', // Base ID
			__( 'Brad Portfolio Widget', 'brad-framework' ), // Name
			array( 'description' => __( 'Display Your Latest Work', 'brad-framework' ), ) // Args
		);
	}
	
	public function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$number = esc_attr($instance['number']);
		
		echo $before_widget;

		if($title) {
			echo $before_title . $title . $after_title;
		}
		?>
		<div class="recent-works-items clearfix">
		<?php
		$args = array(
			'post_type' => 'portfolio',
			'posts_per_page' => $number
		);
		$portfolio = new WP_Query($args);
		if($portfolio->have_posts()):
		?>
		<?php while($portfolio->have_posts()): $portfolio->the_post(); ?>
		<?php if(has_post_thumbnail()): ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="hoverborder">
	    <?php the_post_thumbnail('mini'); ?>
		</a>
		<?php endif; endwhile;?>
        <?php wp_reset_query(); ?>
        <?php endif; ?>
		</div>

		<?php echo $after_widget;
	}
	
	public function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = esc_attr($new_instance['title']);
		$instance['number'] = esc_attr($new_instance['number']);
		
		return $instance;
	}

	public function form($instance)
	{
		$defaults = array('title' => 'Recent Works', 'number' => 6);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">Number of items to show:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $instance['number']; ?>" />
		</p>
	<?php
	}
}
?>