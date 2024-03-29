/**
 * @license Copyright (c) 2003-2023, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    config.filebrowserBrowseUrl = '/kcfinder/browse.php?opener=ckeditor&type=files';
config.filebrowserImageBrowseUrl = '/kcfinder/browse.php?opener=ckeditor&type=images';
config.filebrowserFlashBrowseUrl = '/kcfinder/browse.php?opener=ckeditor&type=flash';

/* Image/Flash upload feature using kcfinder tool */
config.filebrowserUploadUrl = '/kcfinder/upload.php?opener=ckeditor&type=files';
config.filebrowserImageUploadUrl = '/kcfinder/upload.php?opener=ckeditor&type=images';
config.filebrowserFlashUploadUrl = '/kcfinder/upload.php?opener=ckeditor&type=flash';
};
