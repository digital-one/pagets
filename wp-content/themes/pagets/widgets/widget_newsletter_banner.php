<?php 
if( !class_exists('Newsletter_Banner_Widget') ):
class Newsletter_Banner_Widget extends WP_Widget {
	
	public $fields;
	function Newsletter_Banner_Widget(){
		
		$this_ops = array('description' => __('Newsletter Banner Widget', 'pagets_theme'));
		$control_ops = array('width' => 400, 'height' => 400);
		parent::WP_Widget('Newsletter_Banner_Widget', $name='Pagets :: Newsletter Banner', $this_ops, $control_ops);
	}
	
	
	function widget($args, $instance) {
		global $current_user;
		global $post;
		//output widget in user language
		extract($args);
		$heading= $instance['heading'];
		$text = $instance['text'];
		$button_label = $instance['button_label'];
		$page_id = $instance['page_id'];
		echo $before_widget;
		?>
        <!-- offer -->
	<!--newsletter-->
<a href="<?php echo get_permalink(163)?>" id="newsletter">
<h4><?php echo $heading ?></h4>
<p><?php echo $text ?></p>
<span class="button"><?php echo $button_label ?></span>
</a>
<!--/newsletter-->
            <!-- /offer -->
                    <?php
					echo $after_widget;
					
		} 

	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['heading'] = stripslashes($new_instance['heading']);
		$instance['text'] = stripslashes($new_instance['text']);
		$instance['button_label'] = stripslashes($new_instance['button_label']);
		$instance['page_id'] = stripslashes($new_instance['page_id']);
		return $instance;
	}
	 
	function form($instance){
			
			$heading = isset($instance['heading']) ? $instance['heading'] : '';
			$text = isset($instance['text']) ? $instance['text'] : '';
			$button_label = isset($instance['button_label']) ? $instance['button_label'] : '';
			$page_id = isset($instance['page_id']) ? $instance['page_id'] : 0;
		?>
		<div class="widget-section"><div class="widget-section-top"><div class="widget-section-title-action">
<a class="widget-action hide-if-no-js" href="#"></a>
</div></div><div class="widget-section-content">
<p><label for="<?php echo $this->get_field_id('heading')?>"><?php echo __('Heading', 'pagets_theme')?></label><br />
<input type="text" name="<?php echo $this->get_field_name('heading')?>" id="<?php echo $this->get_field_id('heading')?>" value="<?php echo $heading ?>" class="widefat" />
</p>
<p><label for="<?php echo $this->get_field_id('text')?>"><?php echo __('Text', 'pagets_theme')?></label><br />
<textarea name="<?php echo $this->get_field_name('text')?>"  class="widefat" rows="8" id="<?php echo $this->get_field_id('text')?>"><?php echo $text ?></textarea>
</p>
<p><label for="<?php echo $this->get_field_id('button_label')?>"><?php echo __('Button Label', 'pagets_theme')?></label><br />
<input type="text" name="<?php echo $this->get_field_name('button_label')?>" id="<?php echo $this->get_field_id('button_label')?>" value="<?php echo $button_label ?>" class="widefat" />
</p>
<p><label for="<?php echo $this->get_field_id('page_id')?>"><?php echo __('Page Link', 'pagets_theme')?></label><br />
	<select name="<?php echo $this->get_field_name('page_id')?>" id="<?php echo $this->get_field_id('page_id')?>" class="widefat">
		<option value="">Select</option>
			<?php
	$args = array(
    'post_type' => 'page',
    'orderby' => 'menu_index',
    'order' => 'ASC',
    'posts_per_page' => -1,
    'post_status' => 'publish'
    );
    if($pages = get_posts($args)):
    	foreach($pages as $page):
    		$selected = $page->ID==$page_id ? ' selected="selected"' : '';
    		?>
    	<option value="<?php echo $page->ID?>"<?php echo $selected?>><?php echo $page->post_title ?></option>
	<?php endforeach; ?>
    	<?php endif ?>
    </select>
	</p>
<?php
/*
<p>Select pages to show this offer:</p><p>

	<?php
	$args = array(
    'post_type' => 'page',
    'orderby' => 'menu_index',
    'order' => 'ASC',
    'posts_per_page' => -1,
    'post_status' => 'publish'
    );
	$pages = get_posts($args);
	$selected_post_ids  = explode(',',$offer_post_ids);
	if($pages):
		foreach($pages as $page):
			
		$checked = in_array($page->ID,$selected_post_ids) ? ' checked="checked"' : '';
			?>
			<label for="ad_post_id_<?php echo $page->ID ?>"><input type="checkbox" class="post_id_cb" name="ad_post_id[]" id="ad_post_id_<?php echo $page->ID ?>" value="<?php echo $page->ID ?>"<?php echo $checked?> /><?php echo $page->post_title ?></label><br />
	<?php
	endforeach;
	endif;
	?>
	<input type="hidden" class="post_ids_hidden" name="<?php echo $this->get_field_name('offer_post_ids')?>" id="<?php echo $this->get_field_id('offer_post_ids')?>" value="<?php echo $offer_post_ids ?>">
</p>
*/
?>
	</div></div>
	<?php
		
	}

} // class

register_widget('Newsletter_Banner_Widget');

endif; // class_exists
?>
