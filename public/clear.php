<?php
if (function_exists('opcache_reset')) {
    opcache_reset();
    echo "OPcache cleared<br>";
}
if (function_exists('apcu_clear_cache')) {
    apcu_clear_cache();
    echo "APCu cleared<br>";
}
echo "Cache clear script executed.";
