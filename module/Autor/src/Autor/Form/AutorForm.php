<?php

namespace Autor\Form;

use Zend\Form\Element\Button;
use Zend\Form\Element\Email;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class AutorForm extends Form
{
    public function __construct()
    {
        parent::__construct(null);
        $this->setAttribute('method', 'POST');

        $nome = new Text('nome');
        $nome->setLabel('Nome')
            ->setAttributes(array(
                'maxlength' => 255,
                'class' => 'form-control',
                'size' => '100'
            ));
        $this->add($nome);

        $email = new Email('email');
        $email->setLabel('E-mail')
            ->setAttributes(array(
                'maxlength' => 255,
                'class' => 'form-control',
                'size' => '100'
            ));
        $this->add($email);

        $button = new Button('submit');
        $button->setLabel('Salvar')
            ->setAttributes(array(
                'type' => 'submit',
                'class' => 'btn btn-success btn-block'
            ));
        $this->add($button);

        $this->setInputFilter(new AutorFilter());
    }

}