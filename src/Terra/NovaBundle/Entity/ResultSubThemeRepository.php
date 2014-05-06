<?php

namespace Terra\NovaBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class ResultSubThemeRepository extends EntityRepository {

    public function findBySeance($idSeance,$idStudent){
		$qb = $this->createQueryBuilder('rst');
        $qb->where('rst.student = :idStudent')
        	->andWhere('rst.seance = :idSeance')
        	->setParameters(array(
        			'idStudent' => $idStudent,
        			'idSeance' => $idSeance,
        	));

		return $student = $qb->getQuery()->getResult();
    }

    public function findByStats($idSeance,$idSubTheme){
        $qb = $this->createQueryBuilder('rst');
        $qb->where('rst.sousTheme = :idSubTheme')
            ->andWhere('rst.seance = :idSeance')
            ->setParameters(array(
                    'idSubTheme' => $idSubTheme,
                    'idSeance' => $idSeance,
            ));

        return $student = $qb->getQuery()->getResult();
    }
}