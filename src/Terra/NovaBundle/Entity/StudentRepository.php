<?

namespace Terra\NovaBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class StudentRepository extends EntityRepository {

    public function findByClasse($idClass) {
        $qb = $this->createQueryBuilder('c');
        $qb->where('c.classe', ':id')
           ->setParameter('id', $idClass);

        return $class = $qb->getQuery()->getResult();
    }

}
