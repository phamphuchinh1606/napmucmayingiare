/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/
/* ----------------------- KHAI BÁO URL WEB SITE DE SU DUNG CKFILE ------------------------------------------ */
var base_url_web = 'http://napmucmayingiare.net/';

CKEDITOR.plugins.addExternal('onchange');
CKEDITOR.config.entities = false;
CKEDITOR.editorConfig = function(config)
{
	config.extraPlugins = 'onchange';
	config.resize_dir = 'vertical';
	
	config.filebrowserBrowseUrl = base_url_web + 'public/admin/js/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = base_url_web + 'public/admin/js/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl = base_url_web + 'public/admin/js/ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl = base_url_web + 'public/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = base_url_web + 'public/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = base_url_web + 'public/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
	config.filebrowserImageBrowseLinkUrl = '';
	
	config.enterMode = CKEDITOR.ENTER_BR;
	

	config.toolbar = 'Custom';
	config.toolbar_Custom = [
		["Image","-","Bold","Italic","Underline","Strike","-","NumberedList","BulletedList","-","Outdent","Indent","Blockquote","-","Link","Unlink","-","Table","SpecialChar","-","Cut","Copy","Paste","-","Undo","Redo","-"],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['Styles','Format','Font','FontSize'],
		['TextColor','BGColor'],
		['Source']
	];
	config.toolbar_Custom_Short = [
		["Image","-","Bold","Italic","Underline","Strike","-","NumberedList","BulletedList","-","Outdent","Indent","Blockquote","-","Link","Unlink","-","Table","SpecialChar","-","Cut","Copy","Paste","-","Undo","Redo","-"]
	];
	
};