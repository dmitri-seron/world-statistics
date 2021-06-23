<?php
/**
 * A single entry point to the Web application.
 *
 * @author Dmitri Seron <dmitri.seron@gmail.com>
 */

use classes\page\Frontpage;
use classes\page\TaskDescription;

spl_autoload_register('_autoloader');

function _autoloader($class) {
  $filename = str_replace('\\', '/', $class) . '.php';
  require_once('../' . $filename);
}

switch (array_key_first($_REQUEST)) {
  case '/task-description':
    $page = new TaskDescription();
    $page->Render();
    break;
  case '/ajax_sorting':
  case '/ajax_sorting/':
    $page = new Frontpage();
    $page->RenderContentAjax();
    break;
  default:
    $page = new Frontpage();
    $page->Render();
    break;
}
