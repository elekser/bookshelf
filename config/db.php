<?php
//$dbpath = realpath(__DIR__."/../booksdb.db");

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'sqlite:@app/booksdb.db'
];
