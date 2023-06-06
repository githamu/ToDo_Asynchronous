<?php

namespace App\Todo;

class Todo
{
    
    private $todo;

    public function __construct() {

        $this->todo = [
            'head' => 'ToDoリスト制作練習',
            'inputText' => 'ToDoリストの内容を入力',
            'priority' => '優先度を決める',
            'inputButton' => 'ToDoリストの内容を送信',
        ];

    }

    public function getTodo() {
        return $this->todo;
    }
}