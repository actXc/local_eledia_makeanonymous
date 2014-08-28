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

$handlers = array (
    'user_deleted' => array (
        'handlerfile'      => '/local/eledia_makeanonymous/lib.php',
        'handlerfunction'  => 'start_anonymous',
        'schedule'         => 'instant',
        'internal'         => 1,
    ),
);
