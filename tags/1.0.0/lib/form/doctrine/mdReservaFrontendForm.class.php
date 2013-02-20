<?php

/**
 * mdReserva form.
 *
 * @package    rentNchill
 * @subpackage form
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mdReservaFrontendForm extends BasemdReservaForm
{
  public function configure()
  {
		unset($this['created_at'], $this['updated_at'], $this['md_user_id'], $this['status']);

		$this->setWidget('fecha_desde', new sfWidgetFormInput());
		$this->setWidget('fecha_hasta', new sfWidgetFormInput());

		$this->setWidget('md_apartamento_id', new sfWidgetFormInputHidden());
		$this->setWidget('md_currency_id', new sfWidgetFormInputHidden());
		$this->setWidget('total', new sfWidgetFormInputHidden());

		$this->setDefault('md_currency_id', mdCurrencyHandler::getCurrent()->getId());
  }
}
