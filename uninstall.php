<?php
ExtensionConfig::remove_language_key('sfs', 'English');
ExtensionConfig::remove_language_key('sfs_failmsg', 'English');
ExtensionConfig::remove_page('/admin/sfs');
ExtensionConfig::remove_admin_menu('sfs');
$q = new DBDelete('config', 'c_name IN(\'sfs_max_score\',\'sfs_check_values\')', 'Failed to delete config values');
$q->commit();

$files_to_delete = array('app_resources/pages/admin/sfs.php');