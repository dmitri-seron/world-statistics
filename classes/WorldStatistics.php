<?php

namespace classes;

/**
 * Class WorldStatistics.
 *
 * @author Dmitri Seron <dmitri.seron@gmail.com>
 */
class WorldStatistics {

  use Database {
    Database::__construct as private __tConstruct;
  }

  /**
   * @var string
   */
  private string $order;

  /**
   * @var string
   */
  private string $direction;

  /**
   * WorldStatistics constructor.
   *
   * @param string|null $order
   *   Column name for order by.
   * @param string|null $direction
   *   Order directions.
   */
  public function __construct(?string $order, ?string $direction) {
    $this->setOrder($order ?? 'Continent');
    $this->setDirection($direction ?? 'DESC');
    $this->__tConstruct();
  }

  /**
   *  Get data for WorldStatistics table rendering.
   *
   * @return array
   *   Array of world statistics table data.
   */
  protected function getData(): array {
    $sql = "SELECT DISTINCTROW c1.Continent, c1.Region, COUNT(c1.Name) as Countries, ROUND(AVG(c1.LiveExpextancy), 2) as LiveDuration,
SUM(c1.Population) as Population, SUM(j1.City) as Cities, SUM(j2.Lang) as Languages
FROM country c1
LEFT JOIN 
(
    SELECT COUNT(c2.ID) as City, c2.CountryCode
      FROM city c2
     GROUP BY c2.CountryCode
  ) AS j1
ON j1.CountryCode = c1.Code
LEFT JOIN 
(
    SELECT COUNT(c3.Language) as Lang, c3.CountryCode
      FROM countrylanguage c3
     GROUP BY c3.CountryCode
  ) AS j2
ON j2.CountryCode = c1.Code
GROUP BY c1.Region
ORDER BY {$this->getOrder()} {$this->getDirection()}";

    return $this->connection
      ->query($sql)
      ->fetchAll(\PDO::FETCH_ASSOC);
  }

  /**
   *  Get HTML WorldStatistics table.
   *
   * @return string
   *   HTML markup of WorldStatistics table.
   */
  public function getTable(): string {
    $data = $this->getData();
    $output = '<table class="world-statistics">';
    $output .= '<tr class="table-header">';
    // Table header.
    foreach ($data[0] as $key => $value) {
      $class = ['sortable'];
      if ($key == $this->getOrder()) {
        $class[] = 'active';
        $class[] = $this->getDirection() == 'asc' ? 'asc' : 'desc';
      }
      $output .= '<th>';
      $output .= '<a href="#" id="' . $key . '" class = "' . implode(' ', $class) . '">' . $key . '</a>';
      $output .= '</th>';
    }
    $output .= '</tr>';

    // Table data.
    foreach ($data as $row) {
      $output .= '<tr>';
      foreach ($row as $cell) {
        $output .= '<td>';
        $output .= $cell;
        $output .= '</td>';
      }
      $output .= '</tr>';
    }

    $output .= '</table>';
    $output .= '<script src="/assets/js/statistics-table.js"></script>';
    return $output;
  }

  /**
   * @return string
   */
  public function getOrder(): string {
    return $this->order;
  }

  /**
   * @param string $order
   */
  public function setOrder(string $order): void {
    $this->order = $order;
  }

  /**
   * @return string
   */
  public function getDirection(): string {
    return $this->direction;
  }

  /**
   * @param string $direction
   */
  public function setDirection(string $direction): void {
    $this->direction = $direction;
  }

}