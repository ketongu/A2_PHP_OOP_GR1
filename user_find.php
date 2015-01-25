<?php
/**
 * Created by PhpStorm.
 * User: Ketongu
 * Date: 09/01/2015
 * Time: 14:15
 */

/**
 * @var \Doctrine\ORM\EntityManager $em
 */
$em = require __DIR__.'/bootstrap.php';

/**
 * @var \Doctrine\ORM\EntityRepository $userRepository
 */
$userRepository = $em->getRepository('Cartman\Init\User');

if (!empty ( $_POST["userSelectedByName"]))
{
    $userSelected = $_POST["userSelectedByName"];
    $user = $userRepository->find($userSelected);
}
if (!empty ( $_POST["userSelectedById"]))
{
    $userSelected = $_POST["userSelectedById"];
    $user = $userRepository->find($userSelected);
}



$userss = $userRepository->findAll();




