# Resize Images on Upload + Plus 
Extension for OpenCart 1.5.x

Automatically resize images uploaded in the Admin dashboard.
- conserve server space by automatically resizing large images
- modify the 300kB default max filesize limit
- require minimum image dimenions
- restrict by filetype (.jpg, .jpeg, .gif, .png, .flv) and filename length
- option to maintain image dimensions ratio and scale to a fixed width/height

**NEW!** Works with 3 popular MULTI-IMAGE upload extensions!
- Multiply Upload Image Files [VQMOD]+ (http://www.opencart.com/index.php?route=extension/extension/info&extension_id=8221) - all features supported
- Power Image Manager (http://www.opencart.com/index.php?route=extension/extension/info&extension_id=6236) - only max filesize and resize dimensions are supported; width/height ratio maintained and images are automatically scaled
- Image Manager + (http://www.opencart.com/index.php?route=extension/extension/info&extension_id=16447) - only max filesze, resize dimensions, and filetypes are supported; width/height ratio maintained and images are automatically scaled

Does not overwrite any existing files and uses vQmod (http://code.google.com/p/vqmod/). Easy to install and uninstall.

**!IMPORTANT:** Resize Images on Upload will affect ALL images uploaded in the Admin dashboard.  Enable/Disable as necessary.

For installation instructions, please refer to the included file 'install.txt'.
For license info, please refer to the included file 'license.txt'.


## CHANGELOG

v1.2.0
-------
- added support for 3 popular multi-image upload extensions
- misc updates

v1.1.1
-------
- fixed auto-scale option when height and width not equal

v1.1.0
-------
- added auto-scale option to keep original image dimensions ratio and resize to a fixed width/height
- added link to open Image Manager in the Admin nav menu under Catalog->Images

v1.0.1
-------
- updated error reporting to properly display multiple errors when necessary

