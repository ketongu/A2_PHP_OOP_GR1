<?php

require __DIR__.'/header.php';


use Ketongu\Init\PokemonBattle\Model\TrainerModel;




if (  !empty($_POST['username']) AND !empty($_POST['password']) )
{
    $username = $_POST['username'];
    $password = $_POST['password'];


    /** @var \Doctrine\ORM\EntityRepository $trainerRepository */
    $trainerRepository = $em->getRepository('Ketongu\Init\PokemonBattle\Model\TrainerModel');
    /** @var TrainerModel|null $trainer */
    $trainer = $trainerRepository->findOneBy([
        'username' => $username,
        'password' => $password,
    ]);
    if (!empty($trainer))
    {
        $_SESSION['id'] = $trainer->getId();
        $_SESSION['username'] = $trainer->getUsername();
        $_SESSION['isConnected'] = true;


        header("Location: home.php");
    }
    else
    {
        echo '<div class="col-md-12"><h2>wrong informations</h2></div>';
    }
}

require __DIR__.'/html_header.html';?>
    <div class="col-md-12">
        <h2>log yourself</h2>
    </div>
    <div class="col-md-3">
        <form id="login" role="form" method="post">
            <label for="username">Username: </label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            <label for="password">Password: </label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn btn-default" name="loginSubmit">Submit</button>
            <a href="./register.php" >register</a>
        </form>
    </div>
</body>


