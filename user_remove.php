<?php
/**
 * Created by PhpStorm.
 * User: Ketongu
 * Date: 09/01/2015
 * Time: 14:00
 */

//TODO ici

/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';

/** @var \Doctrine\ORM\EntityRepository $userRepository */
$userRepository = $em->getRepository('Cartman\Init\User');

/** @var \Cartman\Init\User $user */


if (!empty($_GET['id']))
{
    $user = $userRepository->find(!empty($_GET['id'])) ;
}
else
{
    $user = null;
}

if (null !== $user)
{
    $em->remove($user);

    $em->flush();
}