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

 	public function updateResult($student,$newSuccess,$newTimePassing){
		$qb = $this->getEntityManager()->createQueryBuilder();
		$qb->update('TerraNovaBundle:ResultStudent', 'rs')
			->set('rs.success', ':newSuccess')
			->set('rs.timePassing', ':newTimePassing')
			->where("rs.student = :student")
			->setParameters(array(
					'newSuccess' => $newSuccess,
					'newTimePassing' => $newTimePassing,
					'student' => $student
				));

        return $qb->getQuery()->execute();
 	}   
}