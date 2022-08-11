<?PHP
/*
Simfatic Forms Main Form processor script

This script does all the server side processing. 
(Displaying the form, processing form submissions,
displaying errors, making CAPTCHA image, and so on.) 

All pages (including the form page) are displayed using 
templates in the 'templ' sub folder. 

The overall structure is that of a list of modules. Depending on the 
arguments (POST/GET) passed to the script, the modules process in sequence. 

Please note that just appending  a header and footer to this script won't work.
To embed the form, use the 'Copy & Paste' code in the 'Take the Code' page. 
To extend the functionality, see 'Extension Modules' in the help.

*/

@ini_set("display_errors", 1);//the error handler is added later in FormProc
error_reporting(E_ALL);

require_once(dirname(__FILE__)."/includes/Testity_test-lib.php");
$formproc_obj =  new SFM_FormProcessor('Testity_test');
$formproc_obj->initTimeZone('default');
$formproc_obj->setFormID('8fd18395-fbf2-4381-8c19-df9b333f8910');
$formproc_obj->setRandKey('7d3617a8-2108-4cba-9cea-a8aa2e819951');
$formproc_obj->setFormKey('5a4a0631-89e8-4687-bbc9-890d7d96b3f3');
$formproc_obj->setLocale('nb','dd.MM.yyyy');
$formproc_obj->setEmailFormatHTML(true);
$formproc_obj->EnableLogging(false);
$formproc_obj->SetDebugMode(false);
$formproc_obj->setIsInstalled(true);
$formproc_obj->SetPrintPreviewPage(sfm_readfile(dirname(__FILE__)."/templ/Testity_test_print_preview_file.txt"));
$formproc_obj->SetSingleBoxErrorDisplay(true);
$formproc_obj->setFormPage(0,sfm_readfile(dirname(__FILE__)."/templ/Testity_test_form_page_0.txt"));
$formproc_obj->setFormPage(1,sfm_readfile(dirname(__FILE__)."/templ/Testity_test_form_page_1.txt"));
$formproc_obj->AddElementInfo('RadioGroup1','radio_group','',0);
$formproc_obj->AddElementInfo('RadioGroup11','radio_group','',1);
$formproc_obj->SetHiddenInputTrapVarName('t026705e0d7578087a9ff');
$formproc_obj->SetFromAddress('forms@vegardasdf.github.io');
$page_renderer =  new FM_FormPageDisplayModule();
$formproc_obj->addModule($page_renderer);

$validator =  new FM_FormValidator();
$validator->addValidation("RadioGroup1","selone","Please select an option for RadioGroup1");
$validator->addValidation("RadioGroup11","selone","Please select an option for RadioGroup11");
$formproc_obj->addModule($validator);

$data_email_sender =  new FM_FormDataSender(sfm_readfile(dirname(__FILE__)."/templ/Testity_test_email_subj.txt"),sfm_readfile(dirname(__FILE__)."/templ/Testity_test_email_body.txt"),'');
$data_email_sender->AddToAddr('a <vegard_rs91@hotmail.com>');
$formproc_obj->addModule($data_email_sender);

$tupage =  new FM_ThankYouPage(sfm_readfile(dirname(__FILE__)."/templ/Testity_test_thank_u.txt"));
$formproc_obj->addModule($tupage);

$page_renderer->SetFormValidator($validator);
$formproc_obj->ProcessForm();

?>