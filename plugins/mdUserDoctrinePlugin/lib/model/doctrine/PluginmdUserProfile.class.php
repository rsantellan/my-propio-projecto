<?php

/**
 * PluginmdUserProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class PluginmdUserProfile extends BasemdUserProfile {

    protected $defaultImage = null;
    public $mdUserIdTmp = 0;
    public $mdEmbedProfile = false;
    public $tmp_array_profile_id = NULL;
    public $tmp_array_md_attribute_values = array();
    private $_mdUser = null;
    private $_mdPassport = null;

    public function  __toString() {
        return $this->getFullName();
    }

    /**
     * Returns the mdUserProfile full name, name + last name
     *
     * @return String
     * @author Rodrigo Santellan
     */
    public function getFullName() {
        return $this->getName() . ' ' . $this->getLastName();
    }

    /**
     * Return the mdUser that this mdComponent belongs
     *
     * @return MdUser
     * @author Rodrigo Santellan
     */
    public function retrieveMdUser() {
        if (is_null($this->_mdUser)) {
            $mdObject = Doctrine::getTable('mdContent')->retrieveByObject($this); //$this->getMdContent();
            $this->_mdUser = Doctrine::getTable('mdUser')->retrieveMdUserById($mdObject->getMdUserId());
        }
        return $this->_mdUser;
    }

    /**
     * Return the class of this object
     *
     * @return String
     * @author Rodrigo Santellan
     */
    public function getObjectClass() {
        return get_class($this);
    }

    public function getObjectClassName() {
        return get_class($this);
    }

    public function getPath() {
        return DIRECTORY_SEPARATOR.'media'.DIRECTORY_SEPARATOR.'userProfile'.DIRECTORY_SEPARATOR;
    }

    public static function getMdUserProfileOfProfile($mdProfileName) {
        $mdProfile = Doctrine::getTable('mdProfile')->findOneBy('name', $mdProfileName);
        if ($mdProfile) {
            $list = array();
            array_push($list, $mdProfile->getId());
            $returnList = Doctrine::getTable('mdUserProfile')->getAllMdUserProfileOfProfileIds($list);
            return $returnList;
        } else {
            return array();
        }
    }

    /**
     * Returns the mdGroups of a user profile in a given application
     *
     * @param mdApplication $mdApplication
     * @return Doctrine_Collection collections of mdGroups
     * @author Rodrigo Santellan
     */
    public function retrieveMdGroups($mdApplication) {
        $mdPassport = $this->retrieveMdPassport($mdApplication);
        $groups = $mdPassport->getGroups();
        return $groups;
    }

    /**
     * Returns the mdPassport of the mdUserProfile of the given application
     * @return mdPassport
     * @author Rodrigo Santellan
     */
    public function retrieveMdPassport() {
        $mdUser = $this->getMdUser();
        $this->_mdPassport = Doctrine::getTable('mdPassport')->retrieveMdPassportByUserId($mdUser->getId());
        return $this->_mdPassport;
    }

    public function retrieveLoadedMdPassport() {
        return $this->_mdPassport;
    }

    public function save(Doctrine_Connection $conn = null) {
        if ($this->getId() != 0) {
            if (sfConfig::get('sf_driver_cache')) {
                $mdUser = $this->getMdUser();
                Doctrine::getTable('mdUserProfile')->removeCacheByPrefix('_findByMdUserId_' . $mdUser->getId());
            }
        }
        return parent::save($conn);
    }

    public function postSave($event)
    {
        mdUserSearchHandler::saveMdUserProfile($this);
    }

    public function postDelete($event) {
        if (sfConfig::get('sf_driver_cache')) {
            $mdUser = $this->getMdUser();

            Doctrine::getTable('mdUserProfile')->removeCacheByPrefix('_findByMdUserId_' . $mdUser->getId());
            Doctrine::getTable('mdUserProfile')->refreshCacheId($this->getId());
        }
    }

    public function retrieveDefault() {
        return DIRECTORY_SEPARATOR."mdUserDoctrinePlugin".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."md_user_image.jpg";
    }

    public static function retrieveByMdUserId($md_user_id) {
        return Doctrine::getTable('mdUserProfile')->findByMdUserId($md_user_id);
    }

    public function retrieveCountryName()
    {
        return sfCultureInfo::getInstance()->getCountry($this->getCountryCode());
    }

    public function retrieveCityName()
    {
        return mdCountriesManager::getInstance()->getCityName($this->getCity());
    }

}
