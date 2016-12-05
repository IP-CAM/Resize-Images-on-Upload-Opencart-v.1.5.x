<?php
// Heading
$_['heading_title']       					= 'Resize Images on Upload + Plus';
$_['heading_intro']       					= 'Instructions';

// Tabs
$_['tab_general']        					= 'General';
$_['tab_dimensions']        				= 'Dimensions';
$_['tab_restrictions']        				= 'Restrictions';

// Text
$_['text_module']        					= 'Modules';
$_['text_intro']        					= '<ul><li>Set PHP <a href="http://php.net/manual/en/ini.core.php#ini.upload-max-filesize"target="_blank" >upload_max_filesize</a> and <a href="http://php.net/manual/en/ini.core.php#ini.post-max-size" target="_blank">post_max_size</a> to large enough values for your requirements.</li><li>Configure %1$s module settings here.</li><li>For support, please contact <a href="mailto:%2$s">%2$s</a>.</li><li>Please <a href="%3$s" target="_blank">rate this extension</a>.</li></ul>';
$_['text_success']        					= 'Success: Your changes to Resize Images on Upload + Plus module have been saved!';
$_['text_width']        					= 'Width';
$_['text_height']        					= 'Height';
$_['text_keep']        						= 'Maintain Width/Height Ratio';
$_['text_unsupported']   					= 'This setting is <b>NOT supported</b> by %s.';
$_['text_auto_scale']   					= 'Dimension scaling is <b>automatically</b> performed.';
$_['text_footer']        					= 'Modules';

$_['text_resize_ext']   					= 'Resize Images on Upload + Plus';
$_['text_mui_ext']   						= 'Multiply Upload Image Files [VQMOD]+';
$_['text_pim_ext']   						= 'Power Image Manager';
$_['text_imp_ext']   						= 'Image Manager +';
$_['text_imp_ext_original']   				= 'link to original page';

$_['href_resize_ext']   					= 'http://www.opencart.com/index.php?route=extension/extension/info&extension_id=11497';
$_['href_mui_ext']   						= 'http://www.opencart.com/index.php?route=extension/extension/info&extension_id=8221';
$_['href_pim_ext']   						= 'http://www.opencart.com/index.php?route=extension/extension/info&extension_id=6236';
$_['href_imp_ext']   						= 'http://www.opencart.com/index.php?route=extension/extension/info&extension_id=16447';
$_['href_imp_ext_original']   				= 'http://www.opencart.com/index.php?route=extension/extension/info&extension_id=3601';

// Entry
$_['entry_status']       					= 'Status:';
$_['entry_multiupload']       				= 'Multi-Image Upload:';
$_['entry_image_upload_filesize_max']   	= 'Max Filesize:';
$_['entry_image_dimensions_min']    		= 'Min Dimensions:';
$_['entry_image_dimensions_resize']    		= 'Resize Dimensions:';
$_['entry_image_filename']    				= 'Filename Length:';
$_['entry_image_types']    					= 'Accepted File Types:';
$_['entry_image_dimensions_ratio']      	= 'Scale Dimensions:';
$_['entry_image_dimensions_keep']       	= 'Fixed Dimension:';
$_['entry_image_mananger_link']       		= 'Image Manager Menu Link:';

// Help
$_['text_enabled_help']        				= 'Settings will effect <strong>ALL images</strong> uploaded in the Admin dashboard.';
$_['text_image_upload_filesize_max_help']   = 'Max filesize for images uploaded.';
$_['text_image_dimensions_min_help']   		= 'Min width and height dimensions required for single image upload.';
$_['text_image_dimensions_resize_help']   	= 'Resize image dimensions. Larger images will be automatically resized during upload.';
$_['text_image_filename_help']   			= 'Min and max length of filename for single image upload.';
$_['text_image_dimensions_ratio_help']   	= 'Keep width/height ratio of the original image dimensions instead of filling the Resize Dimensions with <b>white space</b> around the scaled image.';
$_['text_image_dimensions_keep_help']   	= 'Fix either the <u>width</u> or the <u>height</u>. The other will be <b>automatically scaled</b> using the original image dimension\'s ratio.';
$_['text_image_mananger_link_help']   		= 'Add \'<i>Images</i>\' link to the Admin navigation menu under \'<i>Catalog</i>\' to access the Image Manager on any page of the Admin Dashboard.';
$_['text_multiupload_help']   				= '<strong>!IMPORTANT</strong>: select if one of the following multi-image upload extensions is installed:';
$_['text_multiupload_mui_help']   			= 'NOTE: <strong>auto insert to Images Tab</strong> feature of <i>Multiply Upload Image Files [VQMOD]</i> will be disabled and this can still be done manually using the \'ImageTab+\' button feature.';

// Error
$_['error_warning']    						= 'Warning: Please check the form carefully for errors!';
$_['error_image_upload_filesize_max']   	= 'Error: Max image filesize is required!';
$_['error_image_dimensions_min']    		= 'Error: Min image height and width is required!';
$_['error_image_dimensions_keep']    		= 'Error: Fixed dimension is required if choosing to keep original image dimensions ratio!';
$_['error_image_dimensions_resize']    		= 'Error: Resize image height and width is required!';
$_['error_image_filename']    				= 'Error: Filename min and max length is required and must be &GreaterEqual; 3 and &le; 255, respectively!';
$_['error_image_types']    					= 'Error: Image file type(s) is required!';
$_['error_permission']    					= 'Warning: You do not have permission to modify Resize Images on Upload + Plus module!';
?>
