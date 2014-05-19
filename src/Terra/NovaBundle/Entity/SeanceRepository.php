<?php

namespace Terra\NovaBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class SeanceRepository extends EntityRepository {

    public function findByEnseignant($user) {
        $qb = $this->createQueryBuilder('s');
        $qb->where('s.enseignant = :user')
            ->setParameter('user', $user);

        return $enseignant = $qb->getQuery()->getResult();
    }

    public function findByEnseignantAndPast($user,$date) {
        $qb = $this->createQueryBuilder('s');
        $qb->where('s.enseignant = :user')
        	->andWhere('s.date < :date')
        	->setParameters(array(
                'user' => $user,
                'date' => $date,
            ));

        return $seance = $qb->getQuery()->getResult();
    }

    public function findByEnseignantAndNext($user,$date) {
        $qb = $this->createQueryBuilder('s');
        $qb->where('s.enseignant = :user')
        	->andWhere('s.date >= :date')
        	->setParameters(array(
                'user' => $user,
                'date' => $date,
            ));

        return $seance = $qb->getQuery()->getResult();
    }

}
