<?php
    /*
     * Делаем константы для хранения данных о базе данных
     * HOST - адрес для подключения к БД
     * USER - логин для доступа к БД
     * PASSWORD - пароль для доступа к БД
     * DATABASE - название базы данных, к которой мы подключаемся
     */
$Config = 
    [
        'Database' =>
        [
            'Server' => 'localhost',
            'Username' => 'root',
            'Password' => '',
            'Database' => 'tetatet',
        ],
        'NewsCount' => 25
    ];