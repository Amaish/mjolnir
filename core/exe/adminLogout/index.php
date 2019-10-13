<?php

include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/core/core.php');
session_destroy();
header('location:'.$root_path.'');

?>
