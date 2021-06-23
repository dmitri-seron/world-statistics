<?php

namespace classes\page;

use classes\WorldStatistics;

/**
 * Class Frontpage
 *
 * @author Dmitri Seron <dmitri.seron@gmail.com>
 */
class Frontpage extends layout {

  /**
   * Frontpage constructor.
   */
  public function __construct() {
    $this->setPageId('frontpage');
    $this->setTitle('Dmitri Serõn. test');
    $this->setKeywords('Dmitri Serõn');
    $this->setDescription('test');
  }

  /**
   *  Frontpage content.
   *
   * @param bool|null $is_ajax
   *
   * @return $this
   */
  protected function showContent(?bool $is_ajax = FALSE): Frontpage {
    $order = $_REQUEST['order'] ?? NULL;
    $direction = $_REQUEST['direction'] ?? NULL;

    if (!in_array($order, [
      'Continent',
      'Region',
      'Countries',
      'LiveDuration',
      'Population',
      'Cities',
      'Languages',
    ])) {
      $order = NULL;
    }

    if (!in_array($direction, [
      'desc',
      'asc',
    ])) {
      $direction = NULL;
    }

    $statistics = new WorldStatistics($order, $direction);
    if ($is_ajax) {
      echo $statistics->getTable();
    }
    else {
      echo '<div id="statistics-table-container">';
      echo $statistics->getTable();
      echo '</div>';
    }

    return $this;
  }

}