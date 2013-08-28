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
$string['makeanonymous_enable'] = 'Enable makeanonymous plugin';
$string['makeanonymous_enable_desc'] = 'If this option is disabled this plugin will have no effect.';

