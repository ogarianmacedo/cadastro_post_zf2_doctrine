<?php

namespace Post\Form;

use DoctrineModule\Form\Element\ObjectSelect;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Zend\Form\Element\Button;
use Zend\Form\Element\Checkbox;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Form;
use Post\Form\PostFilter;

/**
 * Class PostForm
 * @package Post\Form
 */
class PostForm extends Form implements ObjectManagerAwareInterface
{
    protected $objectManager;

    /**
     * PostForm constructor.
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        $this->setObjectManager($objectManager);

        parent::__construct(null);
        $this->setAttribute('method', 'POST');

        $titulo = new Text('titulo');
        $titulo->setLabel('Título')
            ->setAttributes(array(
                'maxlength' => 255,
                'class' => 'form-control',
                'size' => '100'
            ));
        $this->add($titulo);

        $descricao = new Text('descricao');
        $descricao->setLabel('Descrição')
            ->setAttributes(array(
                'maxlength' => 255,
                'class' => 'form-control',
                'size' => '100'
            ));
        $this->add($descricao);

        $texto = new Textarea('texto');
        $texto->setLabel('Texto/Resumo')
            ->setAttributes(array(
                'class' => 'form-control',
                'rows' => '5',
                'cols' => '100'
            ));
        $this->add($texto);

        $ativo = new Checkbox('ativo');
        $ativo->setLabel('Status Ativo?');
        $this->add($ativo);

        $categoriaId = new ObjectSelect('categoria_id');
        $categoriaId->setLabel('Categoria')
            ->setOptions(array(
                'object_manager' => $this->getObjectManager(),
                'target_class' => 'Categoria\Entity\Categoria',
                'property' => 'nome',
                'empty_option' => 'Selecione',
                'is_method' => true,
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('nome' => 'ASC'),
                    ),
                ),
            ))
            ->setAttributes(array(
                'class' => 'form-control',
            ));
        $this->add($categoriaId);

        $autorId = new ObjectSelect('autor_id');
        $autorId->setLabel('Autor')
            ->setOptions(array(
                'object_manager' => $this->getObjectManager(),
                'target_class' => 'Autor\Entity\Autor',
                'property' => 'nome',
                'empty_option' => 'Selecione',
                'is_method' => true,
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('nome' => 'ASC'),
                    ),
                ),
            ))
            ->setAttributes(array(
                'class' => 'form-control',
            ));
        $this->add($autorId);

        $button = new Button('submit');
        $button->setLabel('Salvar')
            ->setAttributes(array(
                'type' => 'submit',
                'class' => 'btn btn-success btn-block'
            ));
        $this->add($button);

        $this->setInputFilter(new PostFilter($autorId->getValueOptions()));
    }

    /**
     * Set the object manager
     *
     * @param ObjectManager $objectManager
     */
    public function setObjectManager(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * Get the object manager
     *
     * @return ObjectManager
     */
    public function getObjectManager()
    {
        return $this->objectManager;
    }
}