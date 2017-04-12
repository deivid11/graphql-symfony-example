<?php
namespace AppBundle\GraphQL\Types\State\Fields;

use AppBundle\Entity\Country;
use AppBundle\GraphQL\Types\AbstractField;
use AppBundle\GraphQL\Types\Country\CountryType;
use AppBundle\GraphQL\Types\State\StateType;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;


class StateField extends AbstractField {
	public function __construct( array $config = [] ) {
		$config["args"]= [
			'id' => new NonNullType(new IdType())
		];
		parent::__construct( $config );
	}

	public function getType() {
		return  new StateType();
	}

	public function resolve($value, array $args, ResolveInfo $info ) {
		$repo =$this->getEntityManager()->getRepository("AppBundle:State");
		$country = $repo->findOneBy(['id'=>$args['id']]);
		return $country;
	}
}