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

function start_anonymous($user) {
    global $DB;

    $sql2 = ("SELECT value
              FROM {config_plugins}
              WHERE plugin='local_eledia_makeanonymous' AND name='enable'");

    $enable = $DB->get_field_sql($sql2, $params = null, $strictness = MUST_EXIST);

    if ($enable == '1') {

        $sql = ("SELECT value
                 FROM {config_plugins}
                 WHERE plugin='local_eledia_makeanonymous' AND name='delay'");

        $getconfig = $DB->get_field_sql($sql, $params = null, $strictness = IGNORE_MISSING);

        if ($getconfig == '0') {
            make_anonymous($user);
        } else {
            store_to_table($user);
        }
    }
}

function make_anonymous($user) {
    global $DB;

    $newusersettings = $DB->get_records_sql("SELECT name,
                                                    value
                                             FROM {config_plugins}
                                             WHERE plugin='local_eledia_makeanonymous'");

    $updateuser = $user;

    $updateuser->deleted      = 1;
    $updateuser->idnumber     = '';
    $updateuser->picture      = 0;
    $updateuser->firstname    = $newusersettings['deletedfirstname']->value;
    $updateuser->lastname     = $newusersettings['deletedsurname']->value;
    $updateuser->country      = $newusersettings['deletedcountry']->value;
    $updateuser->city         = $newusersettings['deletedcity']->value;
    $updateuser->username     = 'deletedUser_'.md5($user->username.time());
    $updateuser->email        = $updateuser->username.'@delet.ed';
    $updateuser->emailstop    = 1;
    $updateuser->auth         = $newusersettings['deletedauth']->value;

    $updateuser->mnethostid = 0;
    $updateuser->icq = '';
    $updateuser->skype = '';
    $updateuser->yahoo = '';
    $updateuser->aim = '';
    $updateuser->msn = '';
    $updateuser->phone1 = '';
    $updateuser->phone2 = '';
    $updateuser->institution = '';
    $updateuser->department = '';
    $updateuser->address = '';
    $updateuser->lang = '';
    $updateuser->timezone = '';
    $updateuser->lastip = '0.0.0.0';
    $updateuser->secret = '';
    $updateuser->url = '';
    $updateuser->description = '';
    $updateuser->imagealt = '';

    $updateuser->timemodified = '0';
    $updateuser->firstaccess = '0';
    $updateuser->lastaccess = '0';
    $updateuser->lastlogin = '0';
    $updateuser->currentlogin = '0';
    $updateuser->timecreated = '0';

    $updateuser->lastnamephonetic = '';
    $updateuser->firstnamephonetic = '';
    $updateuser->middlename = '';
    $updateuser->alternatename = '';

    $DB->update_record('user', $updateuser);
}

function store_to_table($user) {
    global $DB;

    $record = new stdClass();
    $record->userid = $user->id;
    $record->timedeleted = time();
    $DB->insert_record('local_eledia_makeanonymous', $record, false, false);
}

function local_eledia_makeanonymous_cron() {
    global $DB;

    $sql3 = ("SELECT value
              FROM {config_plugins}
              WHERE plugin='local_eledia_makeanonymous' AND name='enable'");

    $enable = $DB->get_field_sql($sql3, $params = null, $strictness = MUST_EXIST);

    if ($enable == '1') {

        $timenow = time();

        $sqldelay = ("SELECT value
                      FROM {config_plugins}
                      WHERE plugin='local_eledia_makeanonymous' AND name='delaytime'");

        $delay = $DB->get_field_sql($sqldelay, $params = null, $strictness = MUST_EXIST);
        $delay = $delay * 60; // Minutes to seconds.
        $delaytime = $timenow - $delay;

        $sqlselect = 'SELECT userid
                      FROM {local_eledia_makeanonymous}
                      WHERE timedeleted<'.$delaytime;

        $userids = $DB->get_records_sql($sqlselect);

        foreach ($userids as $userid) {

            $id = $userid->userid;
            $user = $DB->get_record('user', array('id' => $id));
            make_anonymous($user);
        }

        $DB->delete_records_select('local_eledia_makeanonymous', "timedeleted < ?", array($delaytime));
    }
}
