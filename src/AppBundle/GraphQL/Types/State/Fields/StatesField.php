<?php
namespace AppBundle\GraphQL\Types\State\Fields;

use AppBundle\Entity\Country;
use AppBundle\GraphQL\Types\AbstractField;
use AppBundle\GraphQL\Types\Country\CountryType;
use AppBundle\GraphQL\Types\State\StateType;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Scalar\IntType;


class StatesField extends AbstractField {
	public function __construct( array $config = [] ) {
		$config["args"]= [
			'country' => new IntType()
		];
		parent::__construct( $config );
	}

	public function getType() {
		return  new ListType(new StateType());
	}

	public function resolve($value, array $args, ResolveInfo $info ) {
		$repo =$this->getEntityManager()->getRepository("AppBundle:State");
		$states = $repo->findStatesWithCountry($args);
		return $states;
	}
}