<?php

namespace Nath\TpPaginaire\Entity;
use Nath\TpPaginaire\Kernel\Model;

class Books extends Model {
    
    private int $id;
    private string $title;
    private string $author;
    private string $type;
    private string $image;
    private string $description;

    
    public function getId() {
        return $this->id;
    }
    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getType() {
        return $this->type;
    }

    public function getImage(){
        return $this->image;
    }

    public function getDescription(){
        return $this->description;
    }



}