<?php

namespace Ketongu\Init\PokemonBattle;

use Ketongu\Init\PokemonBattle\Model\PokemonModel;

class PokemonWater extends PokemonModel
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setType(self::TYPE_WATER);
    }

    /**
     * @inheritdoc
     */
    public function isTypeWeak($type)
    {
        return (self::TYPE_PLANT === $type) ? true : false;
    }

    /**
     * @inheritdoc
     */
    public function isTypeStrong($type)
    {
        return (self::TYPE_FIRE === $type) ? true : false;
    }
}