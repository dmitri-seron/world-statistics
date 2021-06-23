<?php

namespace classes\page;


/**
 * Layout class.
 *
 * @author Dmitri Seron <dmitri.seron@gmail.com>
 */
abstract class Layout {

  /**
   * @var string
   */
  protected string $pageId = "";

  /**
   * @var string
   */
  protected string $title = "";

  /**
   * @var string
   */
  protected string $keywords = "";

  /**
   * @var string
   */
  protected string $description = "";

  /**
   * Show beginning part of HTML page.
   *
   * @return $this
   */
  protected function showBeginHTML(): self {
    echo <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{$this->getTitle()}</title>
    <meta name="keywords" content="{$this->getKeywords()}">
    <meta name="description" content="{$this->getDescription()}">
    <meta name="author" content="Dmitri Serõn">
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
HTML;

    return $this;
  }

  /**
   * Show end part of the HTML page.
   *
   * @return $this
   */
  protected function showEndHTML(): self {
    echo <<<HTML
</body>
</html>
HTML;

    return $this;
  }

  /**
   * Show main content of the page.
   *
   * @return $this
   */
  abstract protected function showContent(): self;

  /**
   * Get mein menu structure.
   *
   * @return array
   */
  protected function getMainMenuStructure(): array {

    return [
      [
        'id' => 'frontpage',
        'title' => 'Frontpage',
        'url' => '/',
      ],
      [
        'id' => 'task-description',
        'title' => 'Task description',
        'url' => '/task-description',
      ],
    ];
  }

  /**
   * Show main menu.
   *
   * @return $this
   */
  protected function showMainMenu(): self {
    echo "<div class='main-menu-container'>";
    echo "<ul class='main-menu'>";
    foreach ($this->getMainMenuStructure() as $menu_item) {
      $active_class = '';
      if ($menu_item['id'] == $this->getPageId()) {
        $active_class = 'active';
      }
      echo "<li class='main-menu-item $active_class'>";
      echo '<a href="' . $menu_item['url'] . '">' . $menu_item['title'] . '</a>';
      echo "</li>";
    }
    echo "</ul>";
    echo "</div>";
    return $this;
  }

  /**
   *  Render the page.
   */
  public function Render(): void {
    $this->showBeginHTML()
      ->showMainMenu()
      ->showContent()
      ->showEndHTML();
  }

  /**
   *  Render the page content only.
   */
  public function RenderContentAjax(): void {
    $this->showContent(TRUE);
  }

  /**
   * @return string
   */
  public function getTitle(): string {
    return $this->title;
  }

  /**
   * @param string $title
   */
  public function setTitle(string $title): void {
    $this->title = $title;
  }

  /**
   * @return string
   */
  public function getKeywords(): string {
    return $this->keywords;
  }

  /**
   * @param string $keywords
   */
  public function setKeywords(string $keywords): void {
    $this->keywords = $keywords;
  }

  /**
   * @return string
   */
  public function getDescription(): string {
    return $this->description;
  }

  /**
   * @param string $description
   */
  public function setDescription(string $description): void {
    $this->description = $description;
  }

  /**
   * @return string
   */
  public function getPageId(): string {
    return $this->pageId;
  }

  /**
   * @param string $pageId
   */
  public function setPageId(string $pageId): void {
    $this->pageId = $pageId;
  }

}