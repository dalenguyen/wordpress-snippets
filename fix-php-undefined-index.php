// Put this code in functions.php

// Get array value
function idx($array, $key){
  if(isset($array[$key])){
    return $array[$key];
  }else{
    return NULL;
  }
}

// This code can be used anywhere, and will return NULL if value doesn't exist in an Array
// No more Notice for Undefined Index
