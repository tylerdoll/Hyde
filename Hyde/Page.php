<?php

/**
 * Data structure of Hyde page
 */
class Page extends Hyde
{
  public $requestPath;
  public $name;

  function __construct($requestPath, $name) {
    $this->requestPath = $requestPath;
    $this->name = $name;
  }
}
