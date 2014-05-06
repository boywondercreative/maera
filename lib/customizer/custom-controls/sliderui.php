<?php

class SS_Customize_Sliderui_Control extends WP_Customize_Control {

	public $type = 'slider';

	public $description = '';

	public function enqueue() {

		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-slider' );

	}

	public function render_content() { ?>
		<label>

			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<input type="text" id="input_<?php echo $this->id; ?>" disabled value="<?php echo $this->value(); ?>" <?php $this->link(); ?>/>

			<?php if ( isset( $this->description ) && '' != $this->description ) { ?>
				<a href="#" class="button tooltip" title="<?php echo strip_tags( esc_html( $this->description ) ); ?>">?</a>
			<?php } ?>

		</label>

		<div id="slider_<?php echo $this->id; ?>" class="ss-slider"></div>
		<script>
		jQuery(document).ready(function($) {
			$( "#slider_<?php echo $this->id; ?>" ).slider({
					value : <?php echo $this->value(); ?>,
					min   : <?php echo $this->choices['min']; ?>,
					max   : <?php echo $this->choices['max']; ?>,
					step  : <?php echo $this->choices['step']; ?>,
					slide : function( event, ui ) { $( "#input_<?php echo $this->id; ?>" ).val(ui.value).keyup(); }
			});
			$( "#input_<?php echo $this->id; ?>" ).val( $( "#slider_<?php echo $this->id; ?>" ).slider( "value" ) );
		});
		</script>
		<?php
	}
}