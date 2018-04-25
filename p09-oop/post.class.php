<?php
class Post
{
    const MAX_LENGTH = 200;
    private $title;
    private $content;
    private $author;

    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
        $this->title = $title;
    }

    public function getContent(){
        return $this->content;
    }
    public function setContent($content){
        if(strlen($content) < self::MAX_LENGTH){
            $this->content = $content;
        }else{
            echo "Max length is: " . self::MAX_LENGTH;
        }
    }

    public function getAuthor(){
        return $this->author;
    }
    public function setAuthor(Person $author){
        $this->author = $author;
    }
}