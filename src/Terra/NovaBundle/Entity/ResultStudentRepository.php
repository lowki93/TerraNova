<?php

namespace Terra\NovaBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class ResultStudentRepository extends EntityRepository {

    public function findByStudent($id){
		$qb = $this->createQueryBuilder('s');
        $qb->where('s.student = :id')
           ->setParameter('id', $id);

		return $student = $qb->getQuery()->getResult();
    }
}
