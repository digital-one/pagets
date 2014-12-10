<?php 
if( !class_exists('Signpost_Box_Widget') ):
class Signpost_Box_Widget extends WP_Widget {
	
	public $fields;
	function Signpost_Box_Widget(){
		
		$this_ops = array('description' => __('Signpost Box Widget', 'pagets_theme'));
		$control_ops = array('width' => 400, 'height' => 400);
		parent::WP_Widget('Signpost_Box_Widget', $name='Pagets :: Signpost Box', $this_ops, $control_ops);
	}
	
	
	function widget($args, $instance) {
		global $current_user;
		global $post;
		//output widget in user language
		extract($args);
		$html= $instance['html'];
		echo $before_widget;
		?>
        <!-- box -->
 <div class="box keyline dashed-list">
 	<?php echo $html ?>
 <!--	<h4>Free Booklets</h4><ul>
  <li>Paget’s Disease: The Facts</li>
  <li>Paget’s Disease and Pain</li>
  <li>Paget’s Disease: Investigations Explained</li>
</ul>
<p>The above booklets are available to download free of charge.</p>
<p><a href="#" class="button full-width">Register now to access</a></p>
<p>Alternatively booklets are available from our <a href="#">online shop</a></p>
</div>-->
      <!-- /box -->
                    <?php
					echo $after_widget;
					
		} 

	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['html'] = stripslashes($new_instance['html']);
		return $instance;
	}
	 
	function form($instance){
			
			$html = isset($instance['html']) ? $instance['html'] : '';
		?>
		<div class="widget-section"><div class="widget-section-top"><div class="widget-section-title-action">
<a class="widget-action hide-if-no-js" href="#"></a>
</div></div><div class="widget-section-content">
<p><label for="<?php echo $this->get_field_id('html')?>"><?php echo __('HTML', 'pagets_theme')?></label><br />
	<?php
	$settings = array( 'media_buttons' => false );

wp_editor( $html, $this->get_field_id('html'), $settings );
?>
</p>

	</div></div>
	<?php
		
	}

} // class

register_widget('Signpost_Box_Widget');

endif; // class_exists
?>
