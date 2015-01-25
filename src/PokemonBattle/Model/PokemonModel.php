<?php

namespace Ketongu\Init\PokemonBattle\Model;

/**
 * Class Pokemon
 * @package Ketongu
 *
 * @Entity
 * @Table(name="pokemon")
 */
 class PokemonModel implements PokemonInterface
 {
     /**
      * @var int
      *
      * @Id
      * @Column(name="id", type="integer")
      */
     private $id;

     /**
      * @var string
      *
      * @Column(name="name", type="string", length=60)
      */
     private $name;

     /**
      * @var int
      *
      * @Column(name="hp", type="integer", length=3)
      */
     private $hp;

     /**
      * @var int
      *
      * @Column(name="type", type="smallint")
      */
     private $type;

     const POKEMON_FIRE = 0;

     const POKEMON_PLANT = 1;

     const POKEMON_WATER = 2;

     /**
      * @return int
      */
     public function getId()
     {
         return $this->id;
     }

     /**
      * @return string
      */
     public function getName()
     {
         return $this->name;
     }

     /**
      * @param string $name
      *
      * @return Pokemon
      *
      * @throws \Exception
      */
     public function setName($name)
     {
         if (is_string($name))
             $this->name = $name;
         else
             throw new \Exception('name must be a string');

         return $this;
     }

     /**
      * @return int
      */
     public function getHp()
     {
         return $this->hp;
     }

     /**
      * @param int $hp
      *
      * @return Pokemon
      *
      * @throws \Exception
      */
     public function setHp($hp)
     {
         if (is_int($hp))
             $this->hp = $hp;
         else
             throw new \Exception('hp must be a int');

         return $this;
     }

     /**
      * {@inheritdoc}
      *
      * @throws \Exception
      */
     public function addHP($hp)
     {
         if (is_int($hp) && $hp > 0)
             $this->hp += $hp;
         else
             throw new \Exception('HP => int && > 0');

         return $this->hp;
     }

     /**
      * @param int $hp
      *
      * @throws \Exception
      * @return int
      */
     public function removeHP($hp)
     {
         if (is_int($hp) && $hp > 0)
             $this->hp = ($this->hp <= $hp) ? 0 : $this->hp - $hp;
         else
             throw new \Exception('HP => int && > 0');
     }

     /**
      * @return int
      */
     public function getType()
     {
         return $this->type;
     }

     /**
      * @param int $type
      *
      * @return pokemon
      *
      * @throws \Exception
      */
     public function setType($type)
     {
         if (true === in_array($type, [
                 self::POKEMON_FIRE,
                 self::POKEMON_WATER,
                 self::POKEMON_PLANT,
             ]))
             $this->type = $type;
         else
             throw new \Exception('type is not valid');

         return $this;
     }
 }


