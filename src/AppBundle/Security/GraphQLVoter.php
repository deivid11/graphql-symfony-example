<?php
namespace AppBundle\Security;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQLBundle\Security\Manager\SecurityManagerInterface;

class GraphQLVoter extends Voter
{
	/*
	 * *a -> No authenticated Public
	 *  * -> Authenticated public
	 */
	private $permissions = [
		"__schema" => "*",
		"countries" => "*",
		"country" => "*",
		"states" => "*",
		"state" => "*",
		"municipality" => "*",
		"municipalities" => "*"
	];

	/**
	 * @inheritdoc
	 */
	protected function supports($attribute, $subject)
	{
		return in_array($attribute, [SecurityManagerInterface::RESOLVE_FIELD_ATTRIBUTE, SecurityManagerInterface::RESOLVE_ROOT_OPERATION_ATTRIBUTE]);
	}

	/**
	 * @inheritdoc
	 */
	protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
	{
		// your own validation logic here
		$user = $token->getUser();

		/*
		if(!$user instanceof UserInterface)
			return false;
		*/


		if (SecurityManagerInterface::RESOLVE_FIELD_ATTRIBUTE == $attribute) {
			/** @var $subject ResolveInfo */
			//Not implemented now, performance slowed down

		} elseif (SecurityManagerInterface::RESOLVE_ROOT_OPERATION_ATTRIBUTE == $attribute) {


			if (isset($this->permissions[$subject->getName()])) {
				$allowedRoles = $this->permissions[$subject->getName()];
				if($allowedRoles=="*")
					return true;
				foreach ($allowedRoles as $allowedRole){
					if(in_array($allowedRole, $user->getRoles()))
						return true;
				}
			}
		}
		return false;
	}
}
