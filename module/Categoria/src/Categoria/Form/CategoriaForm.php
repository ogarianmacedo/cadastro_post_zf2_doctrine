<?php

namespace Categoria\Form;

use Zend\Form\Element\Button;
use Zend\Form\Element\Text;
use Zend\Form\Form;
use Categoria\Form\CategoriaFilter;

class CategoriaForm extends Form
{
    public function __construct()
    {
        parent::__construct(null);
        $this->setAttribute('method', 'POST');

        $this->setInputFilter(new CategoriaFilter());

        //Instancia um input type='text'
        $nome = new Text('nome');
        $nome->setLabel('Nome')
            ->setAttributes(array(
               'maxlength' => 255,
                'class' => 'form-control',
                'size' => '100'
            ));
        $this->add($nome);

        //Instancia um button submit
        $button = new Button('submit');
        $button->setLabel('Salvar')
            ->setAttributes(array(
               'type' => 'submit',
                'class' => 'btn btn-success'
            ));
        $this->add($button);
    }
}