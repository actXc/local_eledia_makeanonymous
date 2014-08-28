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

$string['pluginname'] = 'makeanonymous';

$string['anonymousauth'] = 'Auth method of anonymous users';
$string['anonymouscountry'] = 'Country of anonymous users';
$string['anonymouscity'] = 'City of anonymous users';
$string['anonymousfirstname'] = 'First name of anonymous users';
$string['anonymoussurname'] = 'Surname of anonymous users';
$string['makeanonymous_desc'] = 'eLeDia makeanonymous plugin to make deleted users anonymous';
$string['makeanonymous_delay_desc'] = 'You can delay the anonymization';
$string['makeanonymous_delay'] = 'Enable delay';
$string['makeanonymous_delay_config'] = 'Enable delay to anonymize deleted users after a certain time.';
$string['makeanonymous_delay_time'] = 'Delay time (minutes)';
$string['makeanonymous_anonymize_old_head'] = 'Anonymization of former deleted users';
$string['makeanonymous_enable'] = 'Enable makeanonymous plugin';
$string['makeanonymous_enable_desc'] = 'If this option is disabled this plugin will have no effect.';
$string['makeanonymous_anonymize_no_users'] = 'There are no former deleted users you can anonymize.';
$string['makeanonymous_anonymize_users_available'] = 'There are {$a} former deleted users you can anonymize. You can do this by clicking the button below this text.';
$string['makeanonymous_button'] = 'Make former deleted users anonymous';
$string['makeanonymous_anonymize_old_desc'] = 'You can also anonymize users which you have deleted in the past.';
