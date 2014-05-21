<?php

namespace Terra\NovaBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class StudentRepository extends EntityRepository {

    public function findByClasse($idClass) {
        $qb = $this->createQueryBuilder('c');
        $qb->where('c.classe = :id')
           ->setParameter('id', $idClass);

        return $class = $qb->getQuery()->getResult();
    }

    public function findByStudent($login,$class){
		$qb = $this->createQueryBuilder('s');
		$qb->where('lower(s.login) LIKE :login')
			->andWhere('s.classe = :class')
			->setParameters(array(
					'login' => strtolower($login),
					'class' => $class
				));

		return $student = $qb->getQuery()->getResult();
    }

    public function unSetAvatar($studentId,$avatar){
		$qb = $this->getEntityManager()->createQueryBuilder();
		$qb->update('TerraNovaBundle:Student', 's')
			->set('s.avatar', '?1')
			->setParameter(1, $avatar)
			->andWhere("s.id =".$studentId."");

        return $qb->getQuery()->execute();
    }
}
