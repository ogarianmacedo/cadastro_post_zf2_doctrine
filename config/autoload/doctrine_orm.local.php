<?php

return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driveClass' => 'Doctrine\DBAL\Driver\PDOMysql\Driver',
                'params' => array(
                    'host' => '127.0.0.1',
                    'port' => '3306',
                    'user' => 'root',
                    'password' => '',
                    'dbname' => 'crud_postagens_zend2',
                    'driverOptions' => array(
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
                    )
                )
            )
        )
    )
);