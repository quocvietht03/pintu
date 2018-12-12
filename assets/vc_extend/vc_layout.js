function changeLayout(obj){
    var $this = jQuery(obj),
		$option = $this.find("option:selected"),
		$preview_img = $this.parents(".wpb_el_type_bt_layout").find(".bt-preview img"),
		$preview_name = $option.data('name'),
		$preview_url = $option.data('url');
    
	
	$preview_img.attr("src", $preview_url);
	$preview_img.attr("alt", $preview_name);
}
