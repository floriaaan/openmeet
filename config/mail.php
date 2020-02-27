<?php


/*try {
    $GLOBALS['config'] = json_decode(file_get_contents('./storage/settings.json'));
    var_dump($GLOBALS['config']);
    $domain = $GLOBALS['config']['openmeet']['name'];
} catch (Exception $e) {
    $domain = "OpenMeet";
}*/


return [
    "driver" => "smtp",
    "host" => "smtp.mailtrap.io",
    "port" => 2525,
    "from" => array(
        "address" => "admin@". strtolower('open') .".fr",
        "name" => 'open'
    ),
    "username" => "2e681f72979a38",
    "password" => "b36efe9206d692",
    "sendmail" => "/usr/sbin/sendmail -bs"
];
