<?php

namespace Categoria\Controller;

use Base\Controller\AbstractController;

/**
 * Class IndexController
 * @package Categoria\Controller
 */
class IndexController extends AbstractController
{
    /**
     * IndexController constructor.
     */
    public function __construct()
    {
        $this->form = 'Categoria\Form\CategoriaForm';
        $this->controller = 'categoria';
        $this->route = 'categoria/default';
        $this->service = 'Categoria\Service\CategoriaService';
        $this->entity = 'Categoria\Entity\Categoria';
    }
}
