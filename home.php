<?php

require __DIR__.'/header.php';

use Ketongu\Init\PokemonBattle\Model\PokemonModel;

if ($_SESSION['isConnected'] !== true)
    header('Location: index.php');





/** @var \Doctrine\ORM\EntityRepository $pokemonRepository */
$pokemonRepository = $em->getRepository('Ketongu\Init\PokemonBattle\Model\PokemonModel');
/** @var PokemonModel|null $pokemon */
$pokemon = $pokemonRepository->findOneBy([
    'id' => $_SESSION['id'],
]);



if (!empty($_POST['pokemonName']) AND $pokemon == null)
{
    $pokemonName = $_POST['pokemonName'];
    $pokemonType = $_POST['pokemonType'];
    $newPokemon = new PokemonModel();

    $newPokemon
        ->setId($_SESSION ['id'])
        ->setHp(100)
        ->setName($pokemonName)
        ->settype($pokemonType)
    ;

    $em->persist($newPokemon);
    $em->flush();
}























require __DIR__.'/html_header.html'; ?>



    <div class="col-md-12">
        <h2>Welcome <?php echo $_SESSION['username']; ?></h2>
    </div>
    <div class="col-md-3">
        <form id="home" role="form" method="post">
            <?php if ($pokemon == null)
            {?>
                <h3> choose your new pokemon</h3>
                <select class="form-control" name="pokemonType">
                <option value="fire type">fire type</option>
                <option value="water type">water type</option>
                <option value="plant type">plant type</option>
                </select>
                <input type="text" class="form-control" id="pokemonName" name="pokemonName" placeholder="your Pokemon Name" required>
            <?php }?>



            <button type="submit" class="btn btn-default" name="homeSubmit">do this action</button>
            <a href="./logout.php" >logout</a>
        </form>
    </div>
</body>


