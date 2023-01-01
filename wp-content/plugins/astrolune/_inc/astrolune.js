jQuery(document).ready(function() {


	jQuery('.button-secondary-astro').on('click', function(e){
		e.preventDefault()
		var _this = jQuery(this);

		var _getUploadField = _this.closest('div.line').find('#upload_image_astro');
		formfield = _getUploadField.attr('id');
		_this.closest('div.line').addClass('active');
		if(_getUploadField.length){
			tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
			return false;
		}
	})

jQuery('#upload_image_button_astro').click(function() {
	formfield = jQuery('#upload_image_astro').attr('id');
	tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	return false;
});

jQuery('#upload_pdf_button').click(function() {
	formfield = jQuery('#upload_pdf').attr('name');
	tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	return false;
});

 save_verify_habillage_clicked();

jQuery('[name="same_bool"]').on('click', function(){
	verify_habillage(this);
});
function verify_habillage(el){
	var _this = jQuery(el);
	var data_attr = _this.attr('data-id');

	if(_this.is(":checked") && data_attr =="boolean_rd_sm"){
		jQuery("#boolean_rd_sm").val("true");
		jQuery("#boolean_rd").val("false");
	}else if(_this.is(":checked") && data_attr =="boolean_rd") {
			jQuery("#boolean_rd").val("true");
		jQuery("#boolean_rd_sm").val("false");
	}
}
function save_verify_habillage_clicked(){
	if(jQuery("#boolean_rd").val() == "true"){
		jQuery(".boolean_rd").trigger('click');
	}else if(jQuery("#boolean_rd_sm").val() == "true") {
		jQuery(".boolean_rd_sm").trigger('click');
	}
}
window.send_to_editor = function(html) {
	imgurl = jQuery(html).attr('href');
	jQuery('div.active').find('#'+formfield).val(imgurl);
    jQuery('div.active').find('img').attr('src', imgurl);
	tb_remove();
	jQuery('div.line').removeClass('active');
}

});


