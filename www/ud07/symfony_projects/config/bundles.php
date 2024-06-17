<?php

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Symfony\Bundle\TwigBundle\TwigBundle::class => ['all' => true],
    Twig\Extra\TwigExtraBundle\TwigExtraBundle::class => ['all' => true],
    #Permite vincular un objeto a una plantilla
    Symfony\UX\TwigComponent\TwigComponentBundle::class => ['all' => true],
];
