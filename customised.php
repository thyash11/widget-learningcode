<?php
class Thiyagesh_Widget extends WP_Widget {
    public function __construct() { parent::__construct(false, $name = __( 'Thiyagesh Widget')); }
    public function widget( $args, $instance ) {
        extract( $args );
        $title      = apply_filters( 'widget_title', $instance['title'] );
        $message    = $instance['message'];
        echo $before_widget;
        if ( $title ) {
            echo $title;
        }  
        echo $before_title . $message . $after_title;
        echo $after_widget;
    }
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['message'] = strip_tags( $new_instance['message'] );
        return $instance;    
    }
    public function form( $instance ) {
        $message    = esc_attr( $instance['message'] ); 
        $title      = esc_attr( $instance['title'] ); ?>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<br/>
		<input  id="<?php echo $this->get_field_id( 'title' ); ?>"
		      name="<?php echo $this->get_field_name( 'title' ); ?>"
			  type="text"
			 value="<?php echo esc_attr( $title ); ?>" />
		<br/>
		<label for="<?php echo $this->get_field_id( 'message' ); ?>"><?php _e( 'Message:' ); ?></label>
		<br/>
		 <input id="<?php echo $this->get_field_id('message'); ?>"
			  name="<?php echo $this->get_field_name('message'); ?>"
			  type="text"
			 value="<?php echo $message; ?>" />
		<br/>
		<br/>
<?php }
}
add_action( 'widgets_init', function(){
	register_widget( 'Thiyagesh_Widget' );
});