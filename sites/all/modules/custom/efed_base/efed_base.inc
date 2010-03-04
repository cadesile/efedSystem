<?php

define('EFED_DEFAULT_ROLE','Character');
define('EFED_APP_TITLE','E-Fed ');
define('EFED_APP_TITLE_SAFE','e_fed_');
define('EFED_ADMIN_AREA','admin/efed');
define('EFED_TITLE',variable_get(EFED_APP_TITLE_SAFE . 'name','My ' . EFED_APP_TITLE));
define('EFED_INFO','
<h1>'.EFED_APP_TITLE.'</h1>
<p>Manage your roster, shows, cards and results.</p>
<p>Created by <em>Courtney Adesile</em> & <em>Lee Best</em></p>
<p><b>Version:</b> 1</p>
');
?>
