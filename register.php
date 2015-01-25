<?php

require __DIR__.'/header.php';




/** @var \Doctrine\ORM\EntityManager $em */

use \Ketongu\Init\PokemonBattle\Model\TrainerModel;

$trainer = new TrainerModel();


if (  !empty($_POST['username']) AND !empty($_POST['password']) )
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    /** @var \Doctrine\ORM\EntityRepository $trainerRepository */
    $trainerRepository = $em->getRepository('Ketongu\Init\PokemonBattle\Model\TrainerModel');
    $user = $trainerRepository->findOneBy([
        'username' => $username,
    ]);
    if ($user == null)
    {
        $trainer = new TrainerModel();
        $trainer
            ->setusername($username)
            ->setpassword($password)
        ;
        $em->persist($trainer);
        $em->flush();
        //echo '<div class="col-md-12"><h2>Trainer registered</h2></div>';
        header('Location: index.php');
    }
    else
    {
        echo '<div class="col-md-12"><h2>name already used</h2></div>';
    }
}





require __DIR__.'/html_header.html';?>
     <div class="col-md-3">
         <form id="register" role="form" method="post">
             <label for="username">Username: </label>
             <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
             <label for="password">Password: </label>
             <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
             <button type="submit" class="btn btn-default" name="registerSubmit">Submit</button>
             <a href="./index.php" >login</a>
         </form>
     </div>
 </body>