<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/header.php';





/** @var \Doctrine\ORM\EntityRepository $pokemonRepository */
$pokemonRepository = $em->getRepository('Ketongu\Init\PokemonBattle\Model\PokemonModel');

$striker = $pokemonRepository->findOneBy([
    'id' => $_SESSION["id"],
]);




$goal = $pokemonRepository->findOneBy([
    'name' => $_GET['opponent'],
]);


echo '<h1>'.$striker->getName().' versus '.$goal->getName().' ! </h1><br><br>';



$round =0;
while ($striker->getHP() != 0 AND $goal->getHP() != 0)
{
    if ($round !=0)
    {
        $swap = $striker;
        $striker = $goal;
        $goal = $swap;
    }

    $round++;




    echo'<h3> round '.$round.'</h3><br><br><br>';


    $nbrattack= mt_rand(1,2);


    echo '<p>'.$striker->getName().' avec '.$striker->getHP().'pv attaque ! </p><br>';

    for ($i = 0; $i < $nbrattack; $i++)
    {
        $attack = mt_rand(5,25);

//        if (true === $striker->isTypeWeak($goal->getType()))
//            $attack = (int)ceil($attack / 2);
//
//        if (true === $striker->isTypeStrong($goal->getType()))
//            $attack = (int)ceil($attack * 2);
        $goal->removeHP($attack);






        echo "<p> attaque".($i+1)."/".$nbrattack." ".$striker->getName()." fais ".$attack.' de dégat, '.$goal->getName().' a maintenant '.$goal->getHP().'pv ! </p>';
        if ($goal->getHP() == 0)
        {

//            echo '<br>'.$striker->getName().' avec '.$striker->getHP().'pv a tuer  '.$goal->getName().' ! <br>';
//            echo $striker->getName().' viol son cadavre ! <br>';
            break;
        }
    }


    echo ' <br><br><br>';
}





echo'round '.$round.' ';
echo'vainqueur '.$striker->getName().' avec '.$striker->getHp().'pv restant';












//
//
///** @var PokemonModel $striker */
//$striker = $pokemons[0];
///** @var PokemonModel $goal */
//$goal = $pokemons[1];
//
///**
// * Parameters
// */
//$roundNumber = 1;
//$matchOver   = false;
//
//echo '<h1>'.$striker->getName().' VS '.$goal->getName().'</h1>';
//
///**
// * Logic
// */
//while (false === $matchOver) {
//    echo '<h2>Round n°'.$roundNumber.'</h2>';
//
//    $attackNumber = mt_rand(1, 3);
//
//    for ($i = 0; $i < $attackNumber; $i++) {
//        $attackValue = mt_rand(5, 20);
//
//        if ($striker->isTypeWeak($goal->getType()))
//            $attackValue = ceil($attackValue / 2);
//
//        if ($striker->isTypeStrong($goal->getType()))
//            $attackValue = ceil($attackValue * 2);
//
//        $goal->removeHP((int)$attackValue);
//
//        echo '<h3>'.$striker->getName().' attacks '.$goal->getName().'. Attack n°'.($i+1).' on '.$attackNumber.' '.$attackValue.' HP removed. '.$goal->getName().' have '.$goal->getHP().'HP left</h3>';
//
//        if (0 === $goal->getHP()) {
//            $matchOver = true;
//            break;
//        }
//    }
//
//    if (false === $matchOver)
//        list($striker, $goal) = [$goal, $striker];
//
//    $roundNumber++;
//}
//
//echo '<h1>'.$striker->getName().' win!</h1>';
//echo '<h4>'.$striker->getHP().'HP left.</h4>';
//
//
