<?php
/**
 * Define site wide Messages
 */


define('MSG_LOGIN_SUCCESS', 'Login Successfull!');
define('MSG_LOGIN_FAIL', 'Login Failure!');
define('MSG_BAD_REQUEST', '301 Bad request. Its seems that you are not logged-in OR An invalid access.');

define('MSG_NOT_LOGGED_IN_SEARCH', 'It seems that you are not logged in.<br />'
                    . 'Only you can view total profile found as per your search criteria.<br />'
                    . 'If you want to view profile in details, please Sign-In.<br /><br />'
                    . 'OR<br /><br />'
                    . 'If you not a registered user, please <a href="'.HTTP_PATH.'/'.PAGE_REGISTER.PAGE_EXTN.'">Register</a> yourself.');