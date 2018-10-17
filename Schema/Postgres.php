<?php

namespace Kanboard\Plugin\Customizer\Schema;

use PDO;

const VERSION = 1;

function version_1(PDO $pdo)
{

$pdo->exec("
        CREATE TABLE customizer_files (
            id SERIAL PRIMARY KEY,
            custom_id INTEGER NOT NULL,
            name VARCHAR(255) NOT NULL,
            path VARCHAR(255) NOT NULL,
            is_image BOOLEAN DEFAULT '0',
            size INTEGER DEFAULT 0 NOT NULL,
            user_id INTEGER DEFAULT 0 NOT NULL,
            date INTEGER DEFAULT 0 NOT NULL
        )"
    );
    
}
