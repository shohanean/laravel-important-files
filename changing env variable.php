<?php
$key='NAME_OF_YOUR_VARIABLE';
$newValue='WHAT_VALUE_WILL_BE';
$delim='';

      $path = base_path('.env');
      // get old value from current env
      $oldValue = env($key);

      // was there any change?
      if ($oldValue === $newValue) {
          return;
      }

      // rewrite file content with changed data
      if (file_exists($path)) {
          // replace current value with new value
          file_put_contents(
              $path, str_replace(
                  $key.'='.$delim.$oldValue.$delim,
                  $key.'='.$delim.$newValue.$delim,
                  file_get_contents($path)
              )
          );
      }
?>