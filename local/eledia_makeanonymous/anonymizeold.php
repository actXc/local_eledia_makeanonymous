<?php
/**
 * This local plugin anonymizes data of deleted users, 
 * optinally with a delay time.
 *
 * @package local_eledia_makeanonymous
 * @author Matthias Schwabe <support@eledia.de>
 * @copyright 2013 & 2014 eLeDia GmbH
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');
require_once('lib.php');

defined('MOODLE_INTERNAL') || die;

global $CFG, $DB, $PAGE;

$PAGE->set_url('/blocks/eledia_makeanonymous/anonymizeold.php');

require_login();
$context = context_system::instance();
$PAGE->set_context($context);

if (has_capability('moodle/site:config', $context)) {
    
    $deletedusers = $DB->get_records_sql("SELECT id, username
                                          FROM {user}
                                          WHERE deleted = 1");

    $toanonymize = array();
    foreach ($deletedusers as $user) {
        if (substr($user->username, 0, 12) != 'deletedUser_') {
            make_anonymous($user);
        }
    }
    
    redirect($CFG->wwwroot.'/admin/settings.php?section=local_eledia_makeanonymous');
}
