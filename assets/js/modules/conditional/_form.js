
//General Form Javascript


//////////////////////////
// Styled Select boxes //
////////////////////////

// WARNING!
// Currently doesn't support clicking of input[type="reset"] buttons

// Style the select boxes
$('select').each(function(){
    var text = $(this).find('option:selected').text();
    $(this).wrap('<div class="styledSelect-JS" />');
    $(this).after('<span class="styledSelect__display-JS elipsis">' + text + '</span>');

	//Move error class to the visible part
	if ($(this).hasClass('error')){
		$(this).removeClass('error').parent().addClass('error');
	}
});

//Handles changing of text
$('select').on('change', function(){
    var text = $(this).find('option:selected').text();
    $(this).next('.styledSelect__display-JS').text(text);
});


/////////////////////////////////////////////
// Force labels next to checkboxes/radios //
///////////////////////////////////////////

//if label isn't next to it's checkbox or radio button, the label is moved
$('input[type="checkbox"],input[type="radio"]').each(function(){
	var partner = $('label[for="'+$(this).attr('id')+'"]');
	if (partner != $(this).next()){
		$(this).after(partner);
	}
});

///////////////////////////
// Style browse buttons//
/////////////////////////

if ($('input[type="file"]').length){
	$('input[type="file"]').wrap('<div class="styledBrowse__button-JS"><a href="javascript:void(0)" class="action"></a></div>');
	$('.styledBrowse__button-JS').append('<span class="styledBrowse__preview-JS"></span>').find('a').prepend('Browse');
	$('input[type="file"].error').removeClass('error').parent().addClass('error');
	$('input[type="file"]').change(function(){
		var file_path = $(this).val();
		var last_slash = file_path.lastIndexOf("\\") + 1;
		var file_only = file_path.substr(last_slash);
		$(this).parent().next().text(file_only);
	});
	$('input[type=reset]').click(function(){
		$('.styledBrowse__preview-JS').text('');
	})
};
