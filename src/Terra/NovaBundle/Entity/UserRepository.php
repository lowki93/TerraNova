<?php

namespace Terra\NovaBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class UserRepository extends EntityRepository {

    public function findByEnseignant($email, $password) {
    	$qb = $this->createQueryBuilder('u');
    	$qb->where('c.name',':name');
    		->andWhere('c.password',':password');
    		
    }

}
