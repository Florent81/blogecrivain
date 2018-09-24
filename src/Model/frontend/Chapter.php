<?php

namespace App\Model\frontend;

use App\Model\frontend\Login;

class Chapter


{
    private $id;
    private $title;
    private $content;
    private $datePublication;


    public function __construct($values = NULL) {
        if($values != null) {
            $this->hydrate($values)
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

    public function getIdChapter() 
  {
    return $this->id;
  }

  public function setId(int $id)
  {
    $this->id = $id;
  }

  public function getTitle(): ?string
  {
    return $this->title;
  }

  public function setTitle(string $title)
  {
    $this->title = $title;
  }
  public function getContent(): ?string
  {
    return $this->content;
  }

  public function setContent(string $content)
  {
    $this->title = $content;
  }

  public function getDatePublication(): ?int
  {
    return $this->datePublication;
  }

  public function setDatePublication(int $datePublication)
  {
    $this->title = $datePublication;
  }


}
