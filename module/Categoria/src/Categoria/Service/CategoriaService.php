<?php

namespace Categoria\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

/**
 * Class CategoriaService
 * @package Categoria\Service
 */
class CategoriaService extends AbstractService
{
    /**
     * CategoriaService constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->entity = 'Categoria\Entity\Categoria';
        parent::__construct($em);
    }
}