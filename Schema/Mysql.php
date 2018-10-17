<?php

namespace Kanboard\Plugin\Customizer\Schema;

use PDO;

const VERSION = 1;

function version_1(PDO $pdo)
{
   $pdo->exec("CREATE TABLE customizer_files (
        id INT NOT NULL AUTO_INCREMENT,
        custom_id INT NOT NULL,
        name VARCHAR(255),
        path VARCHAR(255),
        is_image TINYINT(1) DEFAULT 0,
        date INT NOT NULL DEFAULT 0,
        user_id INT NOT NULL DEFAULT 0,
        size INT NOT NULL DEFAULT 0,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB CHARSET=utf8"
    );
}
