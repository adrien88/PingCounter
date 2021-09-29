<?php

namespace App\controllers;

class Pages
{
    static function default()
    {
        header('Content-Type: application/json');
        echo json_encode([
            '.test' => [
                'tagname' => 'div',
                'id' => 'sub'
            ],
        ], JSON_PRETTY_PRINT);
        exit;
    }
}
