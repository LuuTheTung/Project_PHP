<?php
$controllers = array(
  'Authentication' => [
    'onClickSignUpButton', 'onClickSubmitSignUpButton', 'onClickSubmitSignInButton',
    'onClickSignInButton', 'onClickSignOutButton', 'preprocessSignUpInfo'
  ],
  'HO' => [
     'onClickMyFormButton', 'onSelectForm', 'makeForm',
    'onClickMyStatisticsButton', 'onSelectStatistics', 'makeStatistics',
      'getAllForms', 'onClickSubmitFormButton', 'onClickSubmitStatisticsButton'
  ],
  'Base' => [
    'home', 'about', 'termOfService', 'form'
  ],
  'Citizen' =>[
    'onSelectForm', 'onClickMyFormButton', 'onClickMyStatisticsButton', 
    'onSelectStatistics', 'onClickSubmitForm', 'makeForm',
      'getAllForms', 'onClickViewInfo', 'onClickUpdate'
  ],
);

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  $controller = 'Base';
  $action = 'home';
}
include_once('controller/' .$controller . 'Controller.php');
$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
$controller->$action();
