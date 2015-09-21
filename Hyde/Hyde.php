<?php
// resources
require 'config.php';
require 'functions.php';
require 'Page.php';

/**
 * Data structure for the Hyde templating system
 */
class Hyde
{
  public $pages;

  /**
   * Map URL to Hyde page
   * @param string $requestPath URL to Map
   * @param string $name        Name of page to map to
   */
  public function addPage($requestPath, $name) {
    $page = new Page($requestPath, $name);
    $this->pages[] = $page;
  }

  /**
   * Load Hyde page and output to the buffer
   * @param  string $name Name of page to load (file base name)
   * @return bool       Page was loaded
   */
  public function loadPage($name) {
    $file = PATH_PAGES . $name . '.php';
    if (file_exists($file)) {
      // load page data
      ob_start();
      include $file;
      $content = ob_get_clean();

      // If a layout wasn't specified in the page use the default layout
      if (false == isset($layout)) {
        $layout = 'default';
      }

       // get page layout and output the final page
       $output = $this->loadLayout($layout, $content);
       if (true == $output) {
         echo $output;
         return true;
       } else {
         return false;
       }

     } else {
       return false;
     }
  }

  /**
   * Load Hyde layout file and inject content
   * @param  string $name    Name of layout (file base name)
   * @param  string $content Html to inject into layout template
   * @return string/bool     String if layout template was found or false if not
   */
  public function loadLayout($name, $content) {
    $file = PATH_LAYOUTS . $name . '.php';
    if (file_exists($file)) {
      ob_start();
      include PATH_LAYOUTS . $name . '.php';
      return ob_get_clean();
    } else {
      return false;
    }
  }

  /**
   * Route URLs to their respective pages
   */
  public function routePages() {
    $url = $_SERVER['REQUEST_URI'];

    foreach ($this->pages as $page) {
      if ($url == $page->requestPath) {
        return $this->loadPage($page->name);
      }
    }

    // if we get to this point we didn't find the requested page
    http_response_code(404);
  }
}
