<?php
$variables = [
    'ENV' => 'local',
    'DB_HOST' => 'localhost',    
    'DB_NAME' => 'gbaf',
    'DB_USER' => '<user>',
    'DB_PASSWORD' => '<password>',
];
foreach ($variables as $key => $value)
{
    putenv("$key=$value");
}
?>