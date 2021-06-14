<?php

namespace Autor\Controller;

use Base\Controller\AbstractController;

/**
 * Class IndexController
 * @package Autor\Controller
 */
class IndexController extends AbstractController
{
    /**
     * IndexController constructor.
     */
    public function __construct()
    {
        $this->form = 'Autor\Form\AutorForm';
        $this->controller = 'autor';
        $this->route = 'autor/default';
        $this->service = 'Autor\Service\AutorService';
        $this->entity = 'Autor\Entity\Autor';
    }
}
