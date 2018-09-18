<?php

namespace App\Model\backend;

use App\Model\frontend\Login;

class Access

{
    private $id;
    private $pseudo;
    private $mail;
    private $pass;


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
    return $this;
	} 

  public function getMail()
  {
    return $this->mail;
  }

  public function setMail()
  {
    $this->mail = $mail;
  }

  public function getPass()
  {
    return $this->pass;
  }

  public function setPass()
  {
    $this->pass = $pass;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setId()
  {
    $this->id = $id;
  }

  public function getPseudo()
  {
    return $this->pseudo;
  }

  public function setPseudo()
  {
    $this->pseudo = $pseudo;
  }
