/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'ru';
	config.uiColor = '#ffffff';
        config.skin = 'moono';
         
        config.toolbar = [
        {name: 'document', items: [ 'Maximize', 'ShowBlocks','Source','-','Save','NewPage','DocProps','Preview','-','Templates' ] }, 
        {name: 'clipboard', items: [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
        {name: 'insert', items: [ 'Table','HorizontalRule','Smiley','SpecialChar','PageBreak' ] },
        {name: 'links', items: [ 'Link','Unlink','Anchor' ] }, 
        '/',
        {name: 'styles', items: [ 'Styles','Format','FontSize' ] },
        {name: 'colors', items: [ 'TextColor','BGColor' ] }, 
//        {name: 'editing', items: [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] }, 
//        {name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] }, 
//        '/', 
        {name: 'basicstyles', items: [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] }, 
        {name: 'paragraph', items: [ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv' ] } 
        ];
// Подключение файлового менеджера Kcfibder
        config.filebrowserBrowseUrl = '/editor/kcfinder/browse.php?opener=ckeditor&type=files';
        config.filebrowserImageBrowseUrl = '/editor/kcfinder/browse.php?opener=ckeditor&type=images';
        config.filebrowserFlashBrowseUrl = '/editor/kcfinder/browse.php?opener=ckeditor&type=flash';
        config.filebrowserUploadUrl = '/editor/kcfinder/upload.php?opener=ckeditor&type=files';
        config.filebrowserImageUploadUrl = '/editor/kcfinder/upload.php?opener=ckeditor&type=images';
        config.filebrowserFlashUploadUrl = '/editor/kcfinder/upload.php?opener=ckeditor&type=flash';
};
