<?php

namespace Terra\NovaBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class TrophyRepository extends EntityRepository {

    public function findByResult($subThemeId,$levelSuccess) {
        $qb = $this->createQueryBuilder('t');
        $qb->where('t.sousTheme = :subThemeId')
            ->andWhere($qb->expr()->like("t.type",':levelSuccess'))
            ->setParameters(array(
                'subThemeId' => $subThemeId,
                'levelSuccess' => $levelSuccess,
            ));

        return $classe = $qb->getQuery()->getResult();
    }

}
