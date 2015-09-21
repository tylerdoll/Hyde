<?php
/**
 * Includes a file from the includes directory
 * @param  string $fileName Name of the file to include
 * @return string           Contents of included file
 */
function getInclude($fileName) {
  ob_start();
  include PATH_INCLUDES . $fileName;
  echo ob_get_clean();
}
