<?php
namespace AppBundle\GraphQL\Types\Municipality\Fields;

use AppBundle\Entity\Country;
use AppBundle\GraphQL\Types\AbstractField;
use AppBundle\GraphQL\Types\Country\CountryType;
use AppBundle\GraphQL\Types\Municipality\MunicipalityType;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Scalar\IntType;


class MunicipalitiesField extends AbstractField {
	public function __construct( array $config = [] ) {
		$config["args"]= [
			'stateId' => new IntType()
		];
		parent::__construct( $config );
	}

	public function getType() {
		return  new ListType(new MunicipalityType());
	}

	public function resolve($value, array $args, ResolveInfo $info ) {

		$repo =$this->getEntityManager()->getRepository("AppBundle:Municipality");
		$states = $repo->findMunicipalitiesWithState($args);
		return $states;
	}
}