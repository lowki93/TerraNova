<?php

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class ClassRepository extends EntityRepository {

    public function findByEnseignant($idEnseignant) {
        $qb = $this->createQueryBuilder('c');
        $qb->where('c.enseignant', ':id'))
            ->setParameter('id' , $idEnseignant);

        return $classe = $qb->getQuery()->getResult();
    }  

}