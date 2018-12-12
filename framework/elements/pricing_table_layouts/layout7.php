<?php
	if($icon) echo '<div class="bt-icon" '.implode(' ', $icon_attributes).'>'.$icon.'</div>';
	if($title) echo '<h3 class="bt-title" '.implode(' ', $title_attributes).'>'.$title.'</h3>';
	if($sub_title) echo '<div class="bt-subtitle" '.implode(' ', $sub_title_attributes).'>'.$sub_title.'</div>';
?>
<?php
	if($price) echo '<h4 class="bt-price" '.implode(' ', $price_attributes).'>'.$price.'</h4>';
	if($time) echo '<div class="bt-time" '.implode(' ', $time_attributes).'>'.$time.'</div>';
?>
<?php
	if(!empty($options_value)){
		echo '<ul class="bt-options" '.implode(' ', $options_attributes).'>'.implode(' ', $options_value).'</ul>';
	}
	if($button_text) echo '<a class="bt-btn-order" '.implode(' ', $button_attributes).'>'.$button_text.'</a>';
?>
