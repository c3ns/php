<?php
class DB
{
    protected function getDB(){
        return new PDO('mysql:host=localhost;dbname=learn', 'root', '');
    }
}