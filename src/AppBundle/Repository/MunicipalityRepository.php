<?php

namespace AppBundle\Repository;

/**
 * MunicipalityRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MunicipalityRepository extends \Doctrine\ORM\EntityRepository
{
	public function findMunicipalitiesWithState($args){

		$qb = $this->createQueryBuilder('m')
		           ->select("m")
		           ->addSelect("s")
		           ->leftJoin('m.state', 's');
		if(isset($args["stateId"])){
			$qb->where('s.id=:id')
			   ->setParameter('id', $args['stateId']);
		}
		return $qb->getQuery()->getResult();
	}
}
