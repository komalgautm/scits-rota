<?php
define('YOUR_CONSTANT_VAR', 'VALUE');
//image paths
if (!defined('userProfileImagePath'))define('userProfileImagePath', asset('public/images/userProfileImages'));
if (!defined('serviceUserProfileImagePath'))define('serviceUserProfileImagePath', asset('public/images/serviceUserProfileImages'));
if (!defined('careTeam'))define('careTeam', asset('public/images/careTeam'));
if (!defined('home'))define('home', asset('public/images/home'));
if (!defined('adminImgPath'))define('adminImgPath', asset('public/images/admin'));
if (!defined('ServiceUserFilePath'))define('ServiceUserFilePath', asset('public/images/serviceUserFiles'));
if (!defined('pettyCashReceiptPath'))define('pettyCashReceiptPath', asset('/public/images/pettyCash'));
if (!defined('MoodImgPath'))define('MoodImgPath', asset('/public/images/mood'));
if (!defined('userQualificationImgPath'))define('userQualificationImgPath', asset('/public/images/userQualification'));
if (!defined('PoliciesFilePath'))define('PoliciesFilePath', asset('public/images/policies'));
if (!defined('contactsPath'))define('contactsPath',asset('/public/images/contacts'));
if (!defined('pemFilePath'))define('pemFilePath','/home/mercury/public_html/scits/public/notify.pem');
if (!defined('SecurityPolicyFilePath'))define('SecurityPolicyFilePath', asset('public/images/securityPolicy'));
if (!defined('suCareHistoryFilePath'))define('suCareHistoryFilePath', asset('public/images/suCareHistoryFiles'));
if (!defined('agentProfileImagePath'))define('agentProfileImagePath', asset('public/images/agentProfileImages'));
if (!defined('managerImagePath'))define('managerImagePath', asset('public/images/managerProfileImages'));

//used in controller
if (!defined('userProfileImageBasePath'))define('userProfileImageBasePath', '/public/images/userProfileImages');
if (!defined('serviceUserProfileImageBasePath'))define('serviceUserProfileImageBasePath', '/public/images/serviceUserProfileImages');
if (!defined('careTeamPath'))define('careTeamPath', '/public/images/careTeam');
if (!defined('homebasePath'))define('homebasePath', '/public/images/home');
if (!defined('adminbasePath'))define('adminbasePath', '/public/images/admin');
if (!defined('ServiceUserFileBasePath'))define('ServiceUserFileBasePath', '/public/images/serviceUserFiles');
if (!defined('pettyCashFilesBasePath'))define('pettyCashFilesBasePath', '/public/images/pettyCash');
if (!defined('MoodImgBasePath'))define('MoodImgBasePath', '/public/images/mood');
if (!defined('userQualificationBaseImgPath'))define('userQualificationBaseImgPath', '/public/images/userQualification');
if (!defined('PoliciesFileBasePath'))define('PoliciesFileBasePath', '/public/images/policies');
if (!defined('contactsBasePath'))define('contactsBasePath','/public/images/contacts');
if (!defined('SecurityPolicyFileBasePath'))define('SecurityPolicyFileBasePath', '/public/images/securityPolicy');
if (!defined('suCareHistoryFileBasePath'))define('suCareHistoryFileBasePath', '/public/images/suCareHistoryFiles');
if (!defined('agentProfileImageBasePath'))define('agentProfileImageBasePath', '/public/images/agentProfileImages');
if (!defined('managerImageBasePath'))define('managerImageBasePath', '/public/images/managerProfileImages');

//Messages 
if (!defined('UNAUTHORIZE_ERR'))define("UNAUTHORIZE_ERR", "Sorry, You are not authorized to access this page.");
if (!defined('UNAUTHORIZE_ERR_APP'))define("UNAUTHORIZE_ERR_APP", "Sorry, You are not authorized.");
if (!defined('COMMON_ERROR'))define("COMMON_ERROR","Some error occured, Please try again after sometime.");
if (!defined('NO_HOME_ERR'))define("NO_HOME_ERR","Please first select a home from welcome page"); 
if (!defined('FILL_FIELD_ERR'))define("FILL_FIELD_ERR","Fill all the required fields.");

//	You have not selected any home, Please select a home from welcome page.");
if (!defined('NO_RECORD'))define('NO_RECORD','No Record Found.');
if (!defined('ADD_RCD_MSG'))define('ADD_RCD_MSG','Record has been added successfully.');
if (!defined('EDIT_RCD_MSG'))define('EDIT_RCD_MSG','Record has been updated successfully.');
if (!defined('DEL_RECORD'))define('DEL_RECORD', 	'Record has been deleted successfully.');
if (!defined('CAl_ADD_RECORD'))define('CAl_ADD_RECORD','Record has been add to calendar successfully.');
if (!defined('DEL_CONFIRM'))define('DEL_CONFIRM', 	'Are you sure to delete this ?');

//other constants
if (!defined('PROJECT_NAME'))define('PROJECT_NAME', 'SCITS');
if (!defined('LOCK_TIME'))define('LOCK_TIME', '3000'); //in seconds i.e. 60 sec = 1 min, 300 = 5 mint, 3600 sec = 1 hr
if (!defined('DEFAULT_SU_EARN_TARGET'))define('DEFAULT_SU_EARN_TARGET','70'); //if no target will be defined for a su
if (!defined('SESSION_TIMEOUT'))define('SESSION_TIMEOUT', '20'); //in minutes
if (!defined('DEFAULT_LOCATION_RECALL_TIME'))define('DEFAULT_LOCATION_RECALL_TIME', '15'); //in minutes
if (!defined('MIN_PETTY_CASH_BALANCE'))define('MIN_PETTY_CASH_BALANCE', '1000'); //in minutes

?>