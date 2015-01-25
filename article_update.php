<?php

/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';

/** @var \Doctrine\ORM\EntityRepository $articleRepository */
$articleRepository = $em->getRepository('Ketongu\Init\Article');

/** @var \Ketongu\Init\Article $article */
$article = $articleRepository->find(3);

$article->setTitle('plop');

$em->flush();