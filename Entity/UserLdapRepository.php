<?php

namespace Yunai39\Bundle\SimpleLdapBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * UserInfoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserLdapRepository extends EntityRepository
{

    public function findRoleScalar($username)
    {
        $query = $this->getEntityManager()->createQueryBuilder();
        $parcs = $query->select('r.role_name')
            ->from('UserLdap', 'u')
            ->innerJoin('u.roles', 'r')
            ->where('u.id_ldap = :username')
            ->setParameter('username', $username)
            ->getQuery()->getScalarResult();
        if ($parcs) {
            return array_map('current', $result);
        } else {
            return false;
        }
    }
}
