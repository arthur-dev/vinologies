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

    /**
     * @var string
     */
    protected $salt;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $plainPassword;

    /**
     * @var array
     */
    protected $roles;

    public function __construct()
    {
        parent::__construct();
        $this->salt=uniqid(rand(),true);
        $this->roles= array();
    }

    /**
     * @param $username
     */
    public function SetUsername($username)
    {
        $this->username = $username;
    }


    public function getRoles()
    {
        return $this->roles;
    }

    public function hasRole($role)
    {
       if (in_array($role,$this->roles))
           return true;
        else
            return false;
    }

    public function setRoles(array $roles)
    {
        $this->roles=$roles;
    }

    public function addRole($role)
    {
        $this->roles[]=$role;
    }

    public function removeRole($role)
    {
        if ($this->hasRole($role))
            unset($this->roles[$role]);
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function eraseCredentials()
    {
       $this->plainPassword = null;
    }

    public function getEmail()
    {
       return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
       $this->plainPassword = $password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getEmailCanonical()
    {
        // TODO: Implement getEmailCanonical() method.
    }

    public function setEmailCanonical($emailCanonical)
    {
        // TODO: Implement setEmailCanonical() method.
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