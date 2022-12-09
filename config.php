<?php
    define("BASE_URL", 'http://localhost/' . basename(__DIR__) . '/');
    set_include_path(implode(PATH_SEPARATOR, array(
        __DIR__,
        get_include_path()
    )))
?>