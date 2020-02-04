<?php

/*
 * - recuperer l'URL et la décomposer
 *
 */
include "conf/gen.conf.php";
include "core/loader.php";
include "core/database.php";

require "core/page.php";

include "core/views/pageHead.php";

$page = new Page();
$page->render();

$request= explode('/', $_SERVER["REQUEST_URI"]);
unset($request[0]);
echo "<pre>";
print_r($request);
echo "</pre>";
include "core/views/footer.php";

