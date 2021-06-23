<?php

namespace classes\page;

/**
 * Class TaskDescription.
 *
 * @author Dmitri Seron <dmitri.seron@gmail.com>
 */
class TaskDescription extends layout {

  /**
   * TaskDescription constructor.
   */
  public function __construct() {
    $this->setPageId('task-description');
    $this->setTitle('Task description');
    $this->setKeywords('Dmitri Serõn');
    $this->setDescription('test');
  }

  /**
   *  Task description content.
   *
   * @return $this
   */
  protected function showContent(): TaskDescription {
    echo <<<HTML

    <h1>Task description:</h1>
    <iframe id="task-description" src="/assets/PHP_TestTask.pdf">
    </iframe>

HTML;
    return $this;
  }

}