<?php
$variables = [
    'ENV' => 'local',
    'DB_HOST' => 'localhost',
    
    'DB_NAME' => 'gbaf',
    'DB_USER' => 'teg',
    'DB_PASSWORD' => 'Pandaren1984',
];
foreach ($variables as $key => $value)
{
    putenv("$key=$value");
}

?>