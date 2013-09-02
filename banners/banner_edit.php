<?php

include('../../../config.php');
require_login();
if (!has_capability('moodle/site:config', get_context_instance(CONTEXT_SYSTEM))) {
    error("Only the administrator can access this page!", $CFG->wwwroot);
}

$id = (isset($_REQUEST['id']) && $_REQUEST['id'] != '') ? $_REQUEST['id'] : '' ;
$audience = optional_param('audience', 1, PARAM_INT);

if ($id != '' || !is_numeric($id)) {
    // Get a list of tables we should be able to export data from
    $query = sprintf("SELECT id, link, img_url FROM mdl_conel_banners WHERE id = %d", $id);

    if ($results = $DB->get_records_sql($query)) {
        foreach ($results as $row) {
            $banner_id = $row->id;
            $banner_link = $row->link;
            $banner_img_url	= $row->img_url;
        }
    }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-AU" xml:lang="en-AU">
<head>
<title>Banners</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body> 
<div id="holder">
<div id="banner_edit_form">
	<h3>Update Banner</h3>
		<form enctype="multipart/form-data" action="banner_actions.php" method="POST">
			<table>
				<tr>
					<td><label for="upload_link">Link:</label></td>
					<td><input type="text" name="banner_link" class="field" value="<?php echo $banner_link; ?>" id="upload_link" /></td>
				</tr>
				<tr>
					<td valign="top"><label for="new_upload_banner">Banner:</label></td>
					<td>
						<input type="file" name="new_banner_img" id="upload_banner" />
						<input type="hidden" name="MAX_FILE_SIZE" value="500000" />
						<input type="hidden" name="id" value="<?php echo $banner_id; ?>" />
						<input type="hidden" name="action" value="update" />
						<input type="hidden" name="role" value="<?php echo $audience; ?>" />
						<p class="note">Only select a banner image if you're changing the image</p>
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="Update Banner" /></td>
				</tr>
			</table>
		</form>
</div>
</div>
</body>
</html>
