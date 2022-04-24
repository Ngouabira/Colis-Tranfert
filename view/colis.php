<?php

// if (isset($_GET["id"])) {
//     # code...
//     echo $_GET["id"];
// } else {

//     echo "No id";

// }

$message = isset($_GET["id"]) ? $_GET["id"] : "No id";

echo $message;

var_dump(["value1", "value2",]);
