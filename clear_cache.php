<?php
exec('php artisan config:cache');
exec('php artisan cache:clear');
exec('php artisan route:clear');
exec('php artisan view:clear');
echo "cache cleared";
?>