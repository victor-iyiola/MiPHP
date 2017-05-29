<?php

function redirect($url = ''){
        echo "<script>window.location = '".$url."';</script>";
}

function preserveInputs($key) {
  return isset($_REQUEST[$key]) ?
    htmlspecialchars($_REQUEST[$key]) : "";
}
