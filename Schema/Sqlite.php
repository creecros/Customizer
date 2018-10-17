<?php

namespace Kanboard\Plugin\Customizer\Schema;

use PDO;

const VERSION = 1;

function version_1(PDO $pdo)
{

$pdo->exec("
        CREATE TABLE customizer_files (
            id INTEGER PRIMARY KEY,
            custom_id INTEGER NOT NULL,
            name TEXT COLLATE NOCASE NOT NULL,
            path TEXT NOT NULL,
            is_image INTEGER DEFAULT 0,
            size INTEGER DEFAULT 0 NOT NULL,
            user_id INTEGER DEFAULT 0 NOT NULL,
            date INTEGER DEFAULT 0 NOT NULL
        )"
    );
    
}
