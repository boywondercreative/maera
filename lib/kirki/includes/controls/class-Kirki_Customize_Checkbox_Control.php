<?php

class Kirki_Customize_Checkbox_Control extends WP_Customize_Control {

	public $type = 'checkbox';

	public $description = '';

	public $subtitle = '';

	public $separator = false;

	public $required;

	public function render_content() { ?>
		<label class="customizer-checkbox">
			<input type="checkbox" value="<?php echo esc_attr( $this->value() ); ?>" id="<?php echo $this->id . esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?> />
			<strong><?php echo esc_html( $this->label ); ?></strong>
			<?php if ( isset( $this->description ) && '' != $this->description ) { ?>
				<a href="#" class="button tooltip" title="<?php echo strip_tags( esc_html( $this->description ) ); ?>">?</a>
			<?php } ?>
			<?php if ( '' != $this->subtitle ) : ?>
				<div class="customizer-subtitle"><?php echo $this->subtitle; ?></div>
			<?php endif; ?>
		</label>
		<?php if ( $this->separator ) echo '<hr class="customizer-separator">'; 

		foreach ( $this->required as $id => $value ) : ?>
			<script>
			jQuery(document).ready(function($) {
			<?php if ( isset($id) && isset($value) && intval(get_theme_mod($id))==$value ) { ?>
				$("#customize-control-<?php echo $this->id; ?>").fadeIn(300);
			<?php } elseif ( isset($id) && isset($value) && intval(get_theme_mod($id))!=$value ) { ?>
				$("#customize-control-<?php echo $this->id; ?>").fadeOut(300);
			<?php }	?>
				$( "#input_<?php echo $id; ?> input" ).each(function(){
					$(this).click(function(){
						if ( $(this).val() == <?php echo $value; ?> ) {
							$("#customize-control-<?php echo $this->id; ?>").fadeIn(300);
						} else {
							$("#customize-control-<?php echo $this->id; ?>").fadeOut(300);
						}
					});
				});
			});
			</script>
		<?php endforeach;
	}
}