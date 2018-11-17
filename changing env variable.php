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

//You may use this function
      public function changemailenv($variable_name, $new_value, $config_name)
     {
         $path = base_path('.env');
         // get old value from current env
         $old_value = config('mail.'.$config_name);
         // rewrite file content with changed data
         if (file_exists($path)) {
             // replace current value with new value
             file_put_contents(
                 $path, str_replace(
                     $variable_name.'='.$old_value,
                     $variable_name.'='.$new_value,
                     file_get_contents($path)
                     )
                 );
             }
         }
?>