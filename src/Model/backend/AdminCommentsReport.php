<?php

namespace App\Model\backend;

use App\Model\frontend\Login;

class AdminCommentsReport


{
    private $id;
    private $id_chapter;
    private $content;
    private $pseudo;
    private $datePublication;
    private $report;
    private $moderation;

    public function __construct($values = null) {
      if($values != null) {
        $this->hydrate($values);
      }
    }

    public function hydrate(array $values) {
  	    foreach ($values as $key=>$value) {
  		      $elements = explode('_',$key);
  		      $newKey='';
  		  foreach($elements as $el) {
  			    $newKey .= ucfirst($el);
  		  }
  		  $method = 'set' .ucfirst($newKey);
  		  if (method_exists($this, $method)) {
  			    $this->$method($value);
  		  }
  	    }
    }

     public function getId() {
         return $this->id;
     }

     public function setId(int $id) {
         $this->id = $id;
     }

     public function getTitle() {
         return $this->title;
     }

     public function setTitle(string $title) {
         $this->title = $title;
     }

     public function getContent() {
         return $this->content;
     }

     public function setContent(string $content) {
         $this->content = $content;
     }

     public function getDatePublication() {
         return $this->datePublication;
     }

     public function setDatePublication(int $datePublication) {
         $this->datePublication = $datePublication;;
     }

     public function getReport() {
        return $this->report;
     }

     public function setReport(bool $report) {
        $this->report = $report;
     }

     public function getIdChapter() {
        return $this->id_chapter;
     }

     public function setIdChapter(int $id_chapter) {
        $this->id_chapter = $id_chapter;
     }

     public function getPseudo() {
        return $this->pseudo;
     }

     public function setPseudo(string $pseudo) {
        $this->pseudo = $pseudo;
     }

     public function getModeration() {
         return $this->moderation;
     }

     public function setModeration(bool $moderation) {
         $this->moderation = $moderation;
     }

}
