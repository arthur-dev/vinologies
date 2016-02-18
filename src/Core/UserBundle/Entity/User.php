<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 18/02/16
 * Time: 12:42
 */

namespace Core\UserBundle\Entity;


use Core\UserBundle\Model\RoleBearerInterface;
use Core\UserBundle\Model\UserInterface;
use Core\UtilsBundle\Entity\RichResource;

/**
 * Class User
 * @package Core\UserBundle\Entity
 */
class User extends RichResource implements UserInterface
{
    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    public function getRoles()
    {
        // TODO: Implement getRoles() method.
    }

    public function getPassword()
    {
        // TODO: Implement getPassword() method.
        return $this->password;
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function getUsername()
    {
        // TODO: Implement getUsername() method.
        return $this->username;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function hasRole($role)
    {
        // TODO: Implement hasRole() method.
    }

    public function setRoles(array $roles)
    {
        // TODO: Implement setRoles() method.
    }

    public function addRole($role)
    {
        // TODO: Implement addRole() method.
    }

    public function removeRole($role)
    {
        // TODO: Implement removeRole() method.
    }


    public function getEmail()
    {
        // TODO: Implement getEmail() method.
    }

    public function setEmail($email)
    {
        // TODO: Implement setEmail() method.
    }

    public function getEmailCanonical()
    {
        // TODO: Implement getEmailCanonical() method.
    }

    public function setEmailCanonical($emailCanonical)
    {
        // TODO: Implement setEmailCanonical() method.
    }

    public function getPlainPassword()
    {
        // TODO: Implement getPlainPassword() method.
    }

    public function setPlainPassword($password)
    {
        // TODO: Implement setPlainPassword() method.
    }

    public function setPassword($password)
    {
        // TODO: Implement setPassword() method.
    }

    public function setEnabled($boolean)
    {
        // TODO: Implement setEnabled() method.
    }

    public function setLocked($boolean)
    {
        // TODO: Implement setLocked() method.
    }

    public function getConfirmationToken()
    {
        // TODO: Implement getConfirmationToken() method.
    }

    public function setConfirmationToken($confirmationToken)
    {
        // TODO: Implement setConfirmationToken() method.
    }

    public function setPasswordRequestedAt(\DateTime $date = null)
    {
        // TODO: Implement setPasswordRequestedAt() method.
    }

    public function isPasswordRequestNonExpired($ttl)
    {
        // TODO: Implement isPasswordRequestNonExpired() method.
    }

    public function setLastLogin(\DateTime $time = null)
    {
        // TODO: Implement setLastLogin() method.
    }

    public function getFirstName()
    {
        // TODO: Implement getFirstName() method.
    }

    public function getLastName()
    {
        // TODO: Implement getLastName() method.
    }

    public function getPhone()
    {
        // TODO: Implement getPhone() method.
    }

    public function isAccountNonExpired()
    {
        // TODO: Implement isAccountNonExpired() method.
    }

    public function isAccountNonLocked()
    {
        // TODO: Implement isAccountNonLocked() method.
    }

    public function isCredentialsNonExpired()
    {
        // TODO: Implement isCredentialsNonExpired() method.
    }

    public function isEnabled()
    {
        // TODO: Implement isEnabled() method.
    }


}