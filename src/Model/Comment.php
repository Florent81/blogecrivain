<?php

namespace App\Controller;

use App\Controller\Login;

class Comment

    
{
    private $id;
    private $title;
    private $content;
    private $pseudo;
    private $datePublication;
    private $report;       
            

  public function __construct($values = NULL)
  {
    if($values != null)
    {
      $this->hydrate($values)
    }
  }
  public function hydrate(array $values)
	{
		foreach ($values as $key=>$value)
		{
			$elements = explode('_',$key);
			$newKey='';
			foreach($elements as $el)
			{
				$newKey .= ucfirst($el);
			}
			
			$method = 'set' .ucfirst($newKey);
			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	} 

  public function getId() 
  {
    return $this->id;
  }

  public function setId(int $id)
  {
    $this->id = $id;
  }

  public function getTitle(): ?varchar  
  {
    return $this->title;
  }

  public function setTitle(varchar $title)
  {
    $this->title = $title;
  }
  public function getContent(): ?string  
  {
    return $this->content;
  }

  public function setContent(string $content)
  {
    $this->content = $content;
  }

  public function getPseudo(): ?varchar  
  {
    return $this->pseudo;
  }

  public function setPseudo(varchar $content)
  {
    $this->pseudo = $pseudo;
  }

  public function getDatePublication(): ?int 
  {
    return $this->datePublication;
  }

  public function setDatePublication(int $datePublication)
  {
    $this->datePublication = $datePublication;
  }

  public function getReport(): ?int 
  {
    return $this->report;
  }

  public function setReport(int $datePublication)
  {
    $this->report = $report;
  }


}