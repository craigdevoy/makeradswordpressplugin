<?php
   /*
   Plugin Name: MakerAds
   Plugin URI: https://makerads.xyz/
   description: Unobtrusive adverts for makers. Together we can reach more users. Use [makerads] to show ads.
   Version: 0.1
   Author: Craig Devoy, for James & Danielle
   Author URI: https://craigdevoy.com/
   License: GPL2
   */


	function makerads() {

		return '<iframe style="border:0;width:320px;height:144px;" src="https://makerads.xyz/ad"></iframe>';

	}
	add_shortcode( 'makerads', 'makerads' );

	// Register and load the widget
   function makerads_load_widget() {
       register_widget( 'makerads_widget' );
   }
   add_action( 'widgets_init', 'makerads_load_widget' );
    
   // Creating the widget 
   class makerads_widget extends WP_Widget {
       
      function __construct() {
         parent::__construct(
          
         // Base ID of your widget
         'makerads_widget', 
          
         // Widget name will appear in UI
         __('MakerAds Widget', 'makerads_widget_domain'), 
          
         // Widget description
         array( 'description' => __( 'Show MakerAds in the sidebar', 'makerads_widget_domain' ), ) 
         );
      }
       
      // Creating widget front-end
       
      public function widget( $args, $instance ) {
         $title = apply_filters( 'widget_title', $instance['title'] );
          
         // before and after widget arguments are defined by themes
         echo $args['before_widget'];
         if ( ! empty( $title ) )
         echo $args['before_title'] . $title . $args['after_title'];
          
         // This is where you run the code and display the output
         echo __( '<iframe style="border:0;width:320px;height:144px;" src="https://makerads.xyz/ad"></iframe>', 'makerads_widget_domain' );
         echo $args['after_widget'];
      }
               
      // Widget Backend 
      public function form( $instance ) {
         if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
         }
         else {
            $title = __( 'New title', 'makerads_widget_domain' );
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
   } // Class makerads_widget ends here
?>
