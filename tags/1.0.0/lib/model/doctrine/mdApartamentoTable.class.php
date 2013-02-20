<?php

/**
 * mdApartamentoTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class mdApartamentoTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object mdApartamentoTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('mdApartamento');
    }

		/**
		 * retorna los apartamentos reservados de ahora en adelante por un usuario
		 *
		 * @return sfDoctrineCollection
		 * @author maui .-
		 **/
		public function findReservedBy($md_user_id)
		{
			$q = $this->createQuery('a');
			$q->innerJoin('a.mdReserva r')
			->addWhere('r.md_user_id=?', $md_user_id)
			->addWhere('r.fecha_desde > ?', date('Y-m-d'));
			return $q->execute();
		}

		/**
		 * retorna los apartamentos visitados por un usuario
		 *
		 * @return sfDoctrineCollection
		 * @author maui .-
		 **/
		public function findVisitedBy($md_user_id)
		{
			$q = $this->createQuery('a');
			$q->innerJoin('a.mdReserva r')
			->addWhere('r.md_user_id=?', $md_user_id)
			->addWhere('r.fecha_desde <= ?', date('Y-m-d'));
			return $q->execute();
		}
        
        public function countNumberOfTranslation($mdApartmentId)
        {
          $conn = Doctrine_Manager::getInstance()->getCurrentConnection(); 
          $sql = "SELECT id, titulo, copete, descripcion, lang  FROM md_apartamento_translation m where id = ?";
          $r = $conn->fetchAssoc($sql, array($mdApartmentId));
          return $r;
        }
        
        public function insertOtherLanguage($id, $titulo, $copete, $descripcion, $lang)
        {
          $conn = Doctrine_Manager::getInstance()->getCurrentConnection(); 
          $sql = "INSERT INTO `md_apartamento_translation` (`id` , `titulo` , `copete` , `descripcion` , `lang` ) VALUES (?, ?, ?, ?, ?)";
          $r = $conn->execute($sql, array( $id, $titulo, $copete, $descripcion, $lang));
          return $r;
        }
        
        public function getMdUserContactNumbers($md_user_id)
        {
          $conn = Doctrine_Manager::getInstance()->getCurrentConnection(); 
          $sql = "select distinct(contacto) from md_apartamento where md_user_id = ?";
          $r = $conn->fetchAssoc($sql, array($md_user_id));
          return $r;
        }

}