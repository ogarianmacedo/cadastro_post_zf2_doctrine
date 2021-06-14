<?php

namespace Autor\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

/**
 * Class AutorService
 * @package Autor\Service
 */
class AutorService extends AbstractService
{
    /**
     * AutorService constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->entity = 'Autor\Entity\Autor';
        parent::__construct($em);
    }
}