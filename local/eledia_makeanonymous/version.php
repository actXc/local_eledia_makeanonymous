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

defined('MOODLE_INTERNAL') || die();

$plugin->version   = 2014082803;                     // The current plugin version (Date: YYYYMMDDXX)
$plugin->requires  = 2012120300;                     // Requires this Moodle version.
$plugin->release   = '0.4a (2014082803)';            // For Moodle 2.6 & 2.7
$plugin->component = 'local_eledia_makeanonymous';   // Full name of the plugin (used for diagnostics).
$plugin->maturity  = MATURITY_STABLE;
$plugin->cron      = 600;  // 10 minutes.
