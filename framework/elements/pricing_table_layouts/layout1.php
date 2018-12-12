<?php
	if($icon) echo '<div class="bt-icon" '.implode(' ', $icon_attributes).'>'.$icon.'</div>';
	if($title) echo '<h3 class="bt-title" '.implode(' ', $title_attributes).'>'.$title.'</h3>';
?>
<?php if($price || $time){ ?>
	<div class="bt-price-time">
		<?php
			if($price) echo '<div class="bt-price" '.implode(' ', $price_attributes).'>'.$price.'</div>';
			if($time) echo '<div class="bt-time" '.implode(' ', $time_attributes).'>'.$time.'</div>';
		?>
	</div>
<?php } ?>
<?php
	if(!empty($options_value)){
		echo '<ul class="bt-options" '.implode(' ', $options_attributes).'>'.implode(' ', $options_value).'</ul>';
	}
?>
<?php if($button_text) echo '<a class="bt-btn-order" '.implode(' ', $button_attributes).'>'.$button_text.'</a>'; ?>
