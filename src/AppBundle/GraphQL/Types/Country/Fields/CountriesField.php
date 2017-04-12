<?php
namespace AppBundle\GraphQL\Types\Country\Fields;

use AppBundle\Entity\Country;
use AppBundle\GraphQL\Types\AbstractField;
use AppBundle\GraphQL\Types\Country\CountryType;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;


class CountriesField extends AbstractField {
	public function getType() {
		return  new ListType(new CountryType());
	}


	public function resolve($value, array $args, ResolveInfo $info ) {
		$repo =$this->getEntityManager()->getRepository("AppBundle:Country");
		$country = $repo->findCountriesWithStates();
		return $country;

	}
}