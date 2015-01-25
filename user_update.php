<?php
/**
 * Created by PhpStorm.
 * User: Ketongu
 * Date: 09/01/2015
 * Time: 14:00
 */


/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';

/** @var \Doctrine\ORM\EntityRepository userRepository */
$userRepository = $em->getRepository('Cartman\Init\User');

/** @var \Cartman\Init\User $user */


if(!empty($_POST["userUpdate"]))
$user = $userRepository->find($_POST["userUpdate"]);

$user->setTitle('');

$em->flush();