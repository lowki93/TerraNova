<?php

namespace Terra\NovaBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class SousThemeRepository extends EntityRepository {

    public function findByName($name) {
        $qb = $this->createQueryBuilder('st');
        $qb->where('lower(st.name) LIKE :name')
            ->setParameter('name', $name);

        return $enseignant = $qb->getQuery()->getResult();
    }
}
