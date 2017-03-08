<?php
define('APP_LOG_FILE', __DIR__."/log.txt");
define('APP_MAX_UPLOAD', 1024*1024 ); // 20KO
define('APP_ACCEPTED_CONTENT_TYPES',
    [
        'image/gif',
        'image/jpeg',
        'image/png',
    ]
);
function logIt($message, $die = true)
{
    file_put_contents(APP_LOG_FILE, date('c').' - "'.$_POST['nom'].'" - "'.$message.'"'.PHP_EOL, FILE_APPEND);
    if($die === true){
        die($message);
    }
}
