<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * anonymizes data of deleted users, optinally with a delay time
 *
 * @package local_eledia_makeanonymous
 * @author Matthias Schwabe <support@eledia.de>
 * @copyright 2013 eLeDia GmbH
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($hassiteconfig) {

    $settings = new admin_settingpage('local_eledia_makeanonymous', get_string('pluginname', 'local_eledia_makeanonymous'));
    $ADMIN->add('localplugins', $settings);

    $settings->add(new admin_setting_heading('local_eledia_makeanonymous_head', '',
                   get_string('makeanonymous_desc', 'local_eledia_makeanonymous')));
    $settings->add(new admin_setting_configcheckbox('local_eledia_makeanonymous/enable',
                   get_string('makeanonymous_enable', 'local_eledia_makeanonymous'),
                   get_string('makeanonymous_enable_desc', 'local_eledia_makeanonymous'), 1));
    $settings->add(new admin_setting_configtext('local_eledia_makeanonymous/deletedcountry',
                   get_string('anonymouscountry', 'local_eledia_makeanonymous'), '', 'DE', PARAM_TEXT, 2));
    $settings->add(new admin_setting_configtext('local_eledia_makeanonymous/deletedcity',
                   get_string('anonymouscity', 'local_eledia_makeanonymous'), '', 'Berlin', PARAM_TEXT, 32));
    $settings->add(new admin_setting_configtext('local_eledia_makeanonymous/deletedfirstname',
                   get_string('anonymousfirstname', 'local_eledia_makeanonymous'), '', 'deleted', PARAM_TEXT, 32));
    $settings->add(new admin_setting_configtext('local_eledia_makeanonymous/deletedsurname',
                   get_string('anonymoussurname', 'local_eledia_makeanonymous'), '', 'User', PARAM_TEXT, 32));
    $settings->add(new admin_setting_heading('local_eledia_makeanonymous_delayhead', '',
                   get_string('makeanonymous_delay_desc', 'local_eledia_makeanonymous')));
    $settings->add(new admin_setting_configcheckbox('local_eledia_makeanonymous/delay',
                   get_string('makeanonymous_delay', 'local_eledia_makeanonymous'),
                   get_string('makeanonymous_delay_config', 'local_eledia_makeanonymous'), 0));
    $settings->add(new admin_setting_configtext('local_eledia_makeanonymous/delaytime',
                   get_string('makeanonymous_delay_time', 'local_eledia_makeanonymous'), '', '1440', PARAM_INT, 6));
}