<?php

 namespace Ketongu\Init\PokemonBattle\Model;


 /**
  * Class Trainer
  * @package Ketongu
  *
  * @Entity
  * @Table(name="Trainer")
  */
 class TrainerModel implements TrainerInterface
{
    /**
     * @var int
     *
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="username", type="string", length=50, unique=true)
     */
    private $username;





    /**
     * @var string
     *
     * @Column(name="password", type="string", length=25)
     */
    private $password;

     /**
      * @var int
      *
      * @Column(name="PokemonId", type="integer")
      */
     private $pokemonId;

     /**
      * @param int $pokemonId
      */
     public function setPokemonId($pokemonId)
     {
         $this->pokemonId = $pokemonId;
     }

     /**
      * @return int
      */
     public function getPokemonId()
     {
         return $this->pokemonId;
     }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * {@inheritdoc}
     *
     * @return TrainerModel
     *
     * @throws \Exception
     */
    public function setUsername($username)
    {
        if (true == is_string($username)) {
            $this->username = $username;
        } else
            throw new \Exception('name => string');
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * {@inheritdoc}
     *
     * @return TrainerModel
     *
     * @throws \Exception
     */
    public function setPassword($password)
    {
        if (is_string($password))
            $this->password = $password;
        else
            throw new \Exception('password => string');

        return $this;
    }
}