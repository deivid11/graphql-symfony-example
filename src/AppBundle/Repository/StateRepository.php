<?php

namespace AppBundle\Repository;
use AppBundle\Entity\Country;

/**
 * CountryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class StateRepository extends \Doctrine\ORM\EntityRepository
{

	public function findStatesWithCountry($args){

		$qb = $this->createQueryBuilder('s')
		           ->select("s")
		           ->addSelect("c")
					->addSelect('m')
		           ->leftJoin('s.country', 'c')
					->leftJoin('s.municipalities', 'm');
		if(isset($args["country"])){
			$qb->where('c.id=:id')
				->setParameter('id', $args['country']);
		}
		return $qb->getQuery()->getResult();
	}
}