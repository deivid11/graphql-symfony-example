<?php
namespace AppBundle\GraphQL\Types\Municipality\Fields;

use AppBundle\Entity\Country;
use AppBundle\GraphQL\Types\AbstractField;
use AppBundle\GraphQL\Types\Country\CountryType;
use AppBundle\GraphQL\Types\Municipality\MunicipalityType;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;


class MunicipalityField extends AbstractField {
	public function __construct( array $config = [] ) {
		$config["args"]= [
			'id' => new NonNullType(new IdType())
		];
		parent::__construct( $config );
	}

	public function getType() {
		return  new MunicipalityType();
	}

	public function resolve($value, array $args, ResolveInfo $info ) {
		$repo =$this->getEntityManager()->getRepository("AppBundle:Municipality");
		$country = $repo->findOneBy(['id'=>$args['id']]);
		return $country;
	}
}