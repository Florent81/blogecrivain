<?php

namespace App\Model\backend;

use App\Model\frontend\Login;

class Access

{
    
    private $pseudo;
    private $mail;
    private $password;       
            

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

  public function getPseudo() 
  {
    return $this->pseudo;
  }

  public function setPseudo()
  {
    $this->pseudo = $Pseudo;
  }

  public function getMail()
  {
    return $this->mail;
  }

  public function setMail()
  {
    $this->mail = $mail;
  }  

  public function getPassword()
  {
    return $this->password;
  }

  public function setPassword()
  {
    $this->password = $password;
  }  
