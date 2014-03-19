<?php

namespace Terra\NovaBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class ClasseRepository extends EntityRepository {

    public function findByEnseignant($idEnseignant) {
        $qb = $this->createQueryBuilder('c');
        $qb->where('c.enseignant', ':id')
            ->setParameter('id' , $idEnseignant);

        return $classe = $qb->getQuery()->getResult();
    }  

}