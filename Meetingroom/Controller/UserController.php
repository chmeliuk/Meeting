<?php

namespace Meetingroom\Controller;

class UserController extends \Phalcon\Mvc\Controller
{
    public function indexAction($page, $asd)
    {
        print_r(func_get_args());
    }

    public function loadAction($username)
    {
        $userFactory = new \Meetingroom\Entity\User\UserFactory();
        $user = $userFactory->getUser($username);
        var_dump($user->getId());
        exit;
    }

    public function testAction()
    {
        echo "<h1>User2!</h1>";

        //$user = new \Meetingroom\Models\UserModel();
        $ldap = new \Meetingroom\Service\LDAP\LDAP();

        $LDAPUser = $ldap->getUserInfo('sysgstats', 'pgGZErgMkNXF');


        print "Nickname: " . $LDAPUser->getNickname() . "<br />";
        print "Name: " . $LDAPUser->getName() . "<br />";
        print "Email: " . $LDAPUser->getEmail() . "<br />";
        print "Position: " . $LDAPUser->getPosition() . "<br />";


        $acl = $this->getDI()->get('acl');

        //test
        if ($acl->isAllowed("Users", "User", "test")) {
            echo "Access granted!";
        } else {
            echo "Access denied :(";
        }
        die();
    }

}
