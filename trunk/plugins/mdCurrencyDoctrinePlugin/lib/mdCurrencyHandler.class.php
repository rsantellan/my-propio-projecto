<?php

/**
* Esta clase maneja el multi currency
*/
class mdCurrencyHandler
{

	/**
	 * retorna la moneda en que se está trabajando en la instancia
	 *
	 * @return void
	 * @author maui .-
	 **/
	static public function getCurrent()
	{
		if(sfContext::hasInstance()){
			$user = sfContext::getInstance()->getUser();
			if($user->hasAttribute('mdCurrency')){
				return $user->getAttribute('mdCurrency');
			}
		}
		// si llego hasta aca debo inicializar
		
		return self::inicialize();
	}
	static public function getCurrentCode(){
		if(self::getCurrent()){
			return self::getCurrent()->getCode();
		}
		return null;
	}

	static public function getCurrentSymbol(){
		if(self::getCurrent()){
			return self::getCurrent()->getSymbol();
		}
		return null;
	}

	static public function setCurrencyByCode($code){
		return self::inicialize($code);
	}
	
	static private function inicialize($code=null){
		if(!$code)
			$code = sfConfig::get('sf_plugins_default_currency', 'USD');

		$collection = Doctrine::getTable('mdCurrency')->findByCode($code);

		if($collection){
			$currency = $collection->getFirst();
			if(sfContext::hasInstance()){
				$user = sfContext::getInstance()->getUser();
				$user->setAttribute('mdCurrency', $currency);
			}
			return $currency;
		}else{
			return false;
		}
	}
	
	static public function getCurrencies(){
		return Doctrine::getTable('mdCurrency')->findAll();
	}


}
