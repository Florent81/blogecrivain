<?php

require ('Login.php');

class Chapter 

    
{
    private $id;
    private $title;
    private $content;
    private $datePublication;       
            

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

  public function getTitle(): ?string  
  {
    return $this->title;
  }

  public function setTitle(string $title)
  {
    $this->title = $title;
  }


}