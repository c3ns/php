<?php
namespace Models;

use Models\Db\DB;
Use Faker\Factory;

class Comment extends DB
{
    private $author;
    private $comment;
    private $date;

    public function __construct()
    {
        $faker = Factory::create();
        $this->author = $faker->name;
        $this->comment = $faker->text;
        $this->date = $faker->iso8601($max = 'now');
    }
    public function save(){
        $sql = "INSERT INTO comments(author, comment, created_at) VALUES (:author, :comment, :created_at)";

        $data = [
            'author' => $this->author,
            'comment' => $this->comment,
            'created_at' => $this->date
        ];

        parent::query($sql, $data);
    }
}