<?php

namespace Post\Form;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\InArray;
use Zend\Validator\NotEmpty;

/**
 * Class PostFilter
 * @package Post\Form
 */
class PostFilter extends InputFilter
{
    protected $autorId;

    /**
     * PostFilter constructor.
     * @param array $autorId
     */
    public function __construct(Array $autorId = array())
    {
        $this->autorId = $autorId;

        $titulo = new Input('titulo');
        $titulo->setRequired(true)
            ->getFilterChain()
            ->attach(new StringTrim())
            ->attach(new StripTags());
        $titulo->getValidatorChain()->attach(new NotEmpty());
        $this->add($titulo);

        $descricao = new Input('descricao');
        $descricao->setRequired(true)
            ->getFilterChain()
            ->attach(new StringTrim())
            ->attach(new StripTags());
        $descricao->getValidatorChain()->attach(new NotEmpty());
        $this->add($descricao);

        $texto = new Input('texto');
        $texto->setRequired(true)
            ->getFilterChain()
            ->attach(new StringTrim())
            ->attach(new StripTags());
        $texto->getValidatorChain()->attach(new NotEmpty());
        $this->add($texto);

        $inArray = new InArray();
        $inArray->setOptions(array('haystack' => $this->haystack($this->autorId)));

        $autor = new Input('autor_id');
        $autor->setRequired(true)
            ->getFilterChain()->attach(new StripTags())
            ->attach(new StringTrim());
        $autor->getValidatorChain()->attach($inArray);
        $this->add($autor);
    }

    /**
     * @param array $haystack
     * @return array
     */
    public function haystack(Array $haystack = array())
    {
        $array = array();
        foreach ($haystack as $value){
            if($value){
                $array[$value['value']] = $value['label'];
            }
        }

        return array_keys($array);
    }
}