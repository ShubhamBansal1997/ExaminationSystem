/** 
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved. 
 * For licensing, see LICENSE.md or http://ckeditor.com/license 
 */
CKEDITOR.editorConfig = function(config) {
    // Define changes to default configuration here. For example:  
    // config.language = 'fr';  
    // config.uiColor = '#AADC6E';  
    config.filebrowserBrowseUrl = '/templateEditor/kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = '/templateEditor/kcfinder/browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = '/templateEditor/kcfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = '/templateEditor/kcfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = '/templateEditor/kcfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = '/templateEditor/kcfinder/upload.php?opener=ckeditor&type=flash';
	config.extraPlugins = 'widget,lineutils,mathjax';
    config.mathJaxClass = 'my-math';
    config.mathJaxLib = '//cdn.mathjax.org/mathjax/2.6-latest/MathJax.js?config=TeX-AMS_HTML';
    
	
};