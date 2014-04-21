<?php

namespace Terra\NovaBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class ClasseRepository extends EntityRepository {

    public function findByEnseignant($idEnseignant) {
        $qb = $this->createQueryBuilder('c');
        $qb->where('c.enseignant = :id')
            ->setParameter('id' , $idEnseignant);

        return $classe = $qb->getQuery()->getResult();
    }

    public function findByName($idClasse){
        $qb = $this->createQueryBuilder('c');
        $qb->select()
           ->where('c.id = :id')
           ->setParameter('id', $idClasse);

        return $classeName = $qb->getQuery()->getResult();
    }

    /*public function findById($idClass)
    {
        $qb = $this->createQueryBuilder('c');
        $qb->where('c.id = :id')
           ->setParameter('id', $idClass);

        return $class = $qb->getQuery()->getResult();
}*/

}
