<?php
namespace tableless\ModelBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Created by PhpStorm.
 * User: desenvolvimento
 * Date: 22/06/15
 * Time: 11:45
 */

class PostRepository extends EntityRepository{

    private function getQueryBuilder()
    {
        $em = $this->getEntityManager();

        $queryBuilder = $em->getRepository('tablelessModelBundle:Post')
            ->createQueryBuilder('p');

        return $queryBuilder;
    }

    public function findAllInOrder()
    {
        $qb = $this->getQueryBuilder()
            ->orderBy('p.createdAt', 'desc');

        return $qb->getQuery()->getResult();
    }
}