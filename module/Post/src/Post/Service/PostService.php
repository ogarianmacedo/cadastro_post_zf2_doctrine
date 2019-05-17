<?php

namespace Post\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class PostService extends AbstractService
{
    public function __construct(EntityManager $em)
    {
        $this->entity = 'Post\Entity\Post';
        parent::__construct($em);
    }

    /**
     * @param array $data
     * @return bool|\Doctrine\Common\Proxy\Proxy|null|object
     */
    public function save(Array $data = array())
    {
        $data['categoria_id'] = $this->em->getRepository('Categoria\Entity\Categoria')->find($data['categoria_id']);
        
        $data['autor_id'] = $this->em->getRepository('Autor\Entity\Autor')->find($data['autor_id']);

        return parent::save($data);
    }

}