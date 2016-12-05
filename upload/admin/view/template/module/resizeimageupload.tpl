<?php echo $header; ?>
<style>input[readonly="readonly"], input[disabled="disabled"] {color:rgb(84, 84, 84); background-color:rgb(235, 235, 228);}</style>
<div id="content">
	
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>

  <?php if ($error_warning) { ?><div class="warning"><?php echo $error_warning; ?></div><?php } ?>

  <div class="box">
	  
    <div class="heading">
      <h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a>&nbsp;<a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a></div>
    </div>
    
    <div class="content">
	  <h2><?php echo $heading_intro; ?></h2>
	  <p><?php echo $text_intro_instructions; ?></p>        
      
      <div id="tabs" class="htabs"><a href="#tab-general"><?php echo $tab_general; ?></a><a href="#tab-dimensions"><?php echo $tab_dimensions; ?></a><a href="#tab-restrictions"><?php echo $tab_restrictions; ?></a></div>
      
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
		<div id="tab-general">
          <table class="form">
            <tr>
                <td><?php echo $entry_status; ?></td>
                <td><select name="resizeimageupload_status">
                    <?php if ($resizeimageupload_status) { ?>
                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                    <option value="0"><?php echo $text_disabled; ?></option>
                    <?php } else { ?>
                    <option value="1"><?php echo $text_enabled; ?></option>
                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                    <?php } ?>
                  </select>
                  <p><span class="help"><?php echo $text_enabled_help; ?></span></p></td>
            </tr>
            <tr>
                <td><span class="required">*</span> <?php echo $entry_multiupload; ?></td>
				<td><select name="resizeimageupload_multiupload">
					<?php foreach ($multiupload_extensions as $multiupload_extension) { ?>
					<?php if ($multiupload_extension['id'] == $resizeimageupload_multiupload) { ?>
					<option value="<?php echo $multiupload_extension['id']; ?>" selected="selected"><?php echo $multiupload_extension['name']; ?></option>
					<?php } else { ?>
					<option value="<?php echo $multiupload_extension['id']; ?>"><?php echo $multiupload_extension['name']; ?></option>
					<?php } ?>
					<?php } ?>
					</select>
					<p><span class="help"><?php echo $text_multiupload_help; ?></span></p>
					<ul><?php foreach ($multiupload_extensions as $multiupload_extension) { ?>
						<?php if ($multiupload_extension['id'] == 0) continue; ?>
						<li><span class="help"><a href="<?php echo $multiupload_extension['href']; ?>" target="_blank"><?php echo $multiupload_extension['name']; ?></a><?php if ($multiupload_extension['id'] == 3) { ?>&nbsp;&nbsp;&nbsp;(<a href="<?php echo $href_imp_ext_original; ?>" target="_blank"><i><?php echo $text_imp_ext_original; ?></i></a>)<?php } ?></span></li>						
						<?php } ?></ul>
					<p><span class="help alert attention mui-notes notes"><?php echo $text_multiupload_mui_help; ?></span></p>
					</td>
			</tr>
			<tr>
			  <td><?php echo $entry_image_mananger_link; ?></td>
			  <td><?php if ($resizeimageupload_image_manager_link) { ?>
				<input type="radio" name="resizeimageupload_image_manager_link" value="1" checked="checked" />
				<?php echo $text_yes; ?>
				<input type="radio" name="resizeimageupload_image_manager_link" value="0" />
				<?php echo $text_no; ?>
				<?php } else { ?>
				<input type="radio" name="resizeimageupload_image_manager_link" value="1" />
				<?php echo $text_yes; ?>
				<input type="radio" name="resizeimageupload_image_manager_link" value="0" checked="checked" />
				<?php echo $text_no; ?>
				<?php } ?>
                <p><span class="help"><?php echo $text_image_mananger_link_help; ?></span></p>
				</td>
			</tr>
         </table>
		</div>
		
		<div id="tab-dimensions">
          <table class="form">
            <tr>
                <td><span class="required">*</span> <?php echo $entry_image_dimensions_resize; ?></td>
                <td>
                    <?php echo $text_width; ?>: <input type="text" name="resizeimageupload_image_dimensions_resize_width" value="<?php echo $resizeimageupload_image_dimensions_resize_width; ?>" size="4" />&nbsp;&times;&nbsp; 
                    <?php echo $text_height; ?>: <input type="text" name="resizeimageupload_image_dimensions_resize_height" value="<?php echo $resizeimageupload_image_dimensions_resize_height; ?>" size="4" />&nbsp;px
                    <p><span class="help"><?php echo $text_image_dimensions_resize_help; ?></span></p>
                    <?php if ($error_image_dimensions_resize) { ?>
                    <span class="error"><?php echo $error_image_dimensions_resize; ?></span>
                    <?php } ?>
                </td>
            </tr>
			<tr>
				<td><?php echo $entry_image_dimensions_ratio; ?></td>
				<td>
					<?php if ($resizeimageupload_image_dimensions_ratio) { ?>
					<input type="checkbox" name="resizeimageupload_image_dimensions_ratio" value="1" checked="checked" />&nbsp;<?php echo $text_keep; ?>
					<?php } else { ?>
					<input type="checkbox" name="resizeimageupload_image_dimensions_ratio" value="1" />&nbsp;<?php echo $text_keep; ?>
					<?php } ?>
					<p><span class="help"><?php echo $text_image_dimensions_ratio_help; ?></span></p>
                    <p><span class="help alert attention pim-notes notes"><?php echo $text_unsupported_scale_pim; ?></span></p>
                    <p><span class="help alert attention imp-notes notes"><?php echo $text_unsupported_scale_imp; ?></span></p>
					<div id="resizeimageupload_image_dimensions_keep"><span class="required">*</span> <?php echo $entry_image_dimensions_keep; ?>
						<select name="resizeimageupload_image_dimensions_keep">
							<option value=""><?php echo $text_select; ?></option>
							<?php if ($resizeimageupload_image_dimensions_keep == 'width') { ?>
							<option value="width" selected="selected"><?php echo $text_width; ?></option>
							<option value="height"><?php echo $text_height; ?></option>
							<?php } elseif ($resizeimageupload_image_dimensions_keep == 'height') { ?>
							<option value="width"><?php echo $text_width; ?></option>
							<option value="height" selected="selected"><?php echo $text_height; ?></option>
							<?php } else { ?>
							<option value="width"><?php echo $text_width; ?></option>
							<option value="height"><?php echo $text_height; ?></option>
							<?php } ?>
						</select>
						<p><span class="help"><?php echo $text_image_dimensions_keep_help; ?></span></p>
						<?php if ($error_image_dimensions_keep) { ?>
						<span class="error"><?php echo $error_image_dimensions_keep; ?></span>
						<?php } ?>
					</div>
				</td>
			</tr>
         </table>
		</div>
            
		<div id="tab-restrictions">
          <table class="form">           
			<tr>
                <td><span class="required">*</span> <?php echo $entry_image_upload_filesize_max; ?></td>
                <td>
                    <input type="text" name="resizeimageupload_image_upload_filesize_max" value="<?php echo $resizeimageupload_image_upload_filesize_max; ?>" size="4" /> kB
                    <p><span class="help"><?php echo $text_image_upload_filesize_max_help; ?></span></p>
                    <?php if ($error_image_upload_filesize_max) { ?>
                    <span class="error"><?php echo $error_image_upload_filesize_max; ?></span>
                    <?php } ?>
                </td>
            </tr>
             <tr>
                <td><span class="required">*</span> <?php echo $entry_image_dimensions_min; ?></td>
                <td>
                    <?php echo $text_width; ?>: <input type="text" name="resizeimageupload_image_dimensions_min_width" value="<?php echo $resizeimageupload_image_dimensions_min_width; ?>" size="4" />&nbsp;&times;&nbsp; 
                    <?php echo $text_height; ?>: <input type="text" name="resizeimageupload_image_dimensions_min_height" value="<?php echo $resizeimageupload_image_dimensions_min_height; ?>" size="4" />&nbsp;px
                    <p><span class="help"><?php echo $text_image_dimensions_min_help; ?></span></p>
                    <p><span class="help alert attention pim-notes notes"><?php echo $text_unsupported_min_pim; ?></span></p>
                    <p><span class="help alert attention imp-notes notes"><?php echo $text_unsupported_min_imp; ?></span></p>
                    <?php if ($error_image_dimensions_min) { ?>
                    <span class="error"><?php echo $error_image_dimensions_min; ?></span>
                    <?php } ?>
                </td>
            </tr>
			<tr>
                <td><span class="required">*</span> <?php echo $entry_image_filename; ?></td>
                <td>
                    <input type="text" name="resizeimageupload_image_filename_min" value="<?php echo $resizeimageupload_image_filename_min; ?>" size="4" /> -
                    <input type="text" name="resizeimageupload_image_filename_max" value="<?php echo $resizeimageupload_image_filename_max; ?>" size="4" />
                    <p><span class="help"><?php echo $text_image_filename_help; ?></span></p>
                    <p><span class="help alert attention pim-notes notes"><?php echo $text_unsupported_max_pim; ?></span></p>
                    <p><span class="help alert attention imp-notes notes"><?php echo $text_unsupported_max_imp; ?></span></p>
                    <?php if ($error_image_filename) { ?>
                    <span class="error"><?php echo $error_image_filename; ?></span>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td><span class="required">*</span> <?php echo $entry_image_types; ?></td>
				<td><div class="scrollbox" style="height:auto;">
					<?php $class = 'odd'; ?>
					<?php foreach ($file_types as $file_type) { ?>
					<?php $class = ($class == 'even' ? 'odd' : 'even'); ?>
					<div class="<?php echo $class; ?>">
					<?php if (in_array($file_type, $resizeimageupload_image_types)) { ?>
					<input type="checkbox" name="resizeimageupload_image_types[]" value="<?php echo $file_type; ?>" checked="checked" />
					<?php echo $file_type; ?>
					<?php } else { ?>
					<input type="checkbox" name="resizeimageupload_image_types[]" value="<?php echo $file_type; ?>" />
					<?php echo $file_type; ?>
					<?php } ?>
					</div>
					<?php } ?>
					</div>
                    <p><span class="help alert attention pim-notes notes"><?php echo $text_unsupported_filetype_pim; ?></span></p>
					<?php if ($error_image_types) { ?>
					<span class="error"><?php echo $error_image_types; ?></span>
					<?php } ?>
				</td>
            </tr>
         </table>
		</div>
		
      </form>
      
    </div><!-- .content -->
  </div><!-- .box -->
</div><!-- #content -->
<script type="text/javascript"><!--
$(document).ready(function () {
	$('.notes').hide();
	
	$('select[name=\'resizeimageupload_multiupload\']').change(function () {
		if ($(this).val() == 1) {
			$('.pim-notes, .imp-notes').hide();
			$('.mui-notes').show();
			$('input[name=\'resizeimageupload_image_dimensions_ratio\'], input[name=\'resizeimageupload_image_dimensions_keep\'], input[name=\'resizeimageupload_image_types[]\']').attr("disabled", false);
			$('input[name=\'resizeimageupload_image_dimensions_min_width\'], input[name=\'resizeimageupload_image_dimensions_min_height\'], input[name=\'resizeimageupload_image_filename_min\'], input[name=\'resizeimageupload_image_filename_max\']').attr("readonly", false);			
		} else if ($(this).val() == 2) {
			$('.imp-notes, .mui-notes, #resizeimageupload_image_dimensions_keep').hide();
			$('.pim-notes').show();
			$('input[name=\'resizeimageupload_image_dimensions_ratio\'], input[name=\'resizeimageupload_image_dimensions_keep\'], input[name=\'resizeimageupload_image_types[]\']').attr("disabled","disabled");
			$('input[name=\'resizeimageupload_image_dimensions_min_width\'], input[name=\'resizeimageupload_image_dimensions_min_height\'], input[name=\'resizeimageupload_image_filename_min\'], input[name=\'resizeimageupload_image_filename_max\']').attr("readonly","readonly");			
			$('input[name=\'resizeimageupload_image_dimensions_resize_width\'], input[name=\'resizeimageupload_image_dimensions_resize_height\']').attr("readonly", false);
		} else if ($(this).val() == 3) {
			$('.mui-notes, .pim-notes, #resizeimageupload_image_dimensions_keep').hide();
			$('.imp-notes').show();
			$('input[name=\'resizeimageupload_image_dimensions_ratio\'], input[name=\'resizeimageupload_image_dimensions_keep\']').attr("disabled","disabled");
			$('input[name=\'resizeimageupload_image_dimensions_min_width\'], input[name=\'resizeimageupload_image_dimensions_min_height\'], input[name=\'resizeimageupload_image_filename_min\'], input[name=\'resizeimageupload_image_filename_max\']').attr("readonly","readonly");			
			$('input[name=\'resizeimageupload_image_dimensions_resize_width\'], input[name=\'resizeimageupload_image_dimensions_resize_height\']').attr("readonly", false);
			$('input[name=\'resizeimageupload_image_types[]\']').attr("disabled", false);
		} else {
			$('.notes').hide();
			$('input[name=\'resizeimageupload_image_dimensions_ratio\'], input[name=\'resizeimageupload_image_dimensions_keep\'], input[name=\'resizeimageupload_image_types[]\']').attr("disabled", false);
			$('input[name=\'resizeimageupload_image_dimensions_min_width\'], input[name=\'resizeimageupload_image_dimensions_min_height\'], input[name=\'resizeimageupload_image_filename_min\'], input[name=\'resizeimageupload_image_filename_max\']').attr("readonly", false);			
		}
	}).trigger('change');
	
	$('select[name=\'resizeimageupload_image_dimensions_keep\']').change(function () {
		if ($(this).val() == 'width') {
			$('input[name=\'resizeimageupload_image_dimensions_resize_width\']').attr("readonly", false);
			$('input[name=\'resizeimageupload_image_dimensions_resize_height\']').attr("readonly","readonly");
		} else if ($(this).val() == 'height') {
			$('input[name=\'resizeimageupload_image_dimensions_resize_width\']').attr("readonly","readonly");
			$('input[name=\'resizeimageupload_image_dimensions_resize_height\']').attr("readonly", false);
		} else {
			$('input[name=\'resizeimageupload_image_dimensions_resize_width\'], input[name=\'resizeimageupload_image_dimensions_resize_height\']').attr("readonly", false);
		}
	}).trigger('change');
	
	$('input[name=\'resizeimageupload_image_dimensions_ratio\']').on("click", function () {
		if ($(this).is(":checked")) {
			$('#resizeimageupload_image_dimensions_keep').show();
			if ($('select[name=\'resizeimageupload_image_dimensions_keep\']').val() == 'width') {
				$('input[name=\'resizeimageupload_image_dimensions_resize_width\']').attr("readonly", false);
				$('input[name=\'resizeimageupload_image_dimensions_resize_height\']').attr("readonly","readonly");
			} else if ($('select[name=\'resizeimageupload_image_dimensions_keep\']').val() == 'height') {
				$('input[name=\'resizeimageupload_image_dimensions_resize_width\']').attr("readonly","readonly");
				$('input[name=\'resizeimageupload_image_dimensions_resize_height\']').attr("readonly", false);
			}
		} else {
			$('#resizeimageupload_image_dimensions_keep').hide();
			$('input[name=\'resizeimageupload_image_dimensions_resize_width\'], input[name=\'resizeimageupload_image_dimensions_resize_height\']').attr("readonly", false);
		}
	});

	<?php if (!$resizeimageupload_image_dimensions_ratio) { ?>
	$('#resizeimageupload_image_dimensions_keep').hide();
	<?php } else { ?>
		<?php if ($resizeimageupload_image_dimensions_keep == 'width') { ?>
		$('input[name=\'resizeimageupload_image_dimensions_resize_width\']').attr("readonly", false);
		$('input[name=\'resizeimageupload_image_dimensions_resize_height\']').attr("readonly","readonly");
		<?php } elseif ($resizeimageupload_image_dimensions_keep == 'height') { ?>
		$('input[name=\'resizeimageupload_image_dimensions_resize_width\']').attr("readonly","readonly");
		$('input[name=\'resizeimageupload_image_dimensions_resize_height\']').attr("readonly", false);
		<?php } ?>
	<?php } ?>
	
	<?php switch ($resizeimageupload_multiupload) {
		case 1:
			echo "$('.mui-notes').show();";
			break;
		case 2:
			echo "$('.pim-notes').show();";
			echo "$('input[name=\'resizeimageupload_image_dimensions_ratio\'], input[name=\'resizeimageupload_image_dimensions_keep\'], input[name=\'resizeimageupload_image_types[]\']').attr(\"disabled\",\"disabled\");";
			echo "$('input[name=\'resizeimageupload_image_dimensions_min_width\'], input[name=\'resizeimageupload_image_dimensions_min_height\'], input[name=\'resizeimageupload_image_filename_min\'], input[name=\'resizeimageupload_image_filename_max\']').attr(\"readonly\",\"readonly\");";
			break;
		case 3:
			echo "$('.imp-notes').show();";
			echo "$('input[name=\'resizeimageupload_image_dimensions_ratio\'], input[name=\'resizeimageupload_image_dimensions_keep\']').attr(\"disabled\",\"disabled\");";
			echo "$('input[name=\'resizeimageupload_image_dimensions_min_width\'], input[name=\'resizeimageupload_image_dimensions_min_height\'], input[name=\'resizeimageupload_image_filename_min\'], input[name=\'resizeimageupload_image_filename_max\']').attr(\"readonly\",\"readonly\");";
			break;
	} ?>
});
//--></script>
<script type="text/javascript"><!--
$('#tabs a').tabs();
//--></script> 
<?php echo $footer; ?>