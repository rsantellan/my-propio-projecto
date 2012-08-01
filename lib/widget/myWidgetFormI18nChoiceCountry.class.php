<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfWidgetFormI18nChoiceCountry represents a country choice widget.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfWidgetFormI18nChoiceCountry.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class myWidgetFormI18nChoiceCountry extends sfWidgetFormChoice
{
  /**
   * Constructor.
   *
   * Available options:
   *
   *  * culture:   The culture to use for internationalized strings
   *  * countries: An array of country codes to use (ISO 3166)
   *  * add_empty: Whether to add a first empty value or not (false by default)
   *               If the option is not a Boolean, the value will be used as the text value
   *
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   *
   * @see sfWidgetFormChoice
   */
  protected function configure($options = array(), $attributes = array())
  {
    parent::configure($options, $attributes);

    $this->addOption('culture');
    $this->addOption('countries');
    $this->addOption('add_empty', false);

    // populate choices with all countries
    $culture = isset($options['culture']) ? $options['culture'] : 'en';

    $countries = sfCultureInfo::getInstance($culture)->getCountries(isset($options['countries']) ? $options['countries'] : null);

    $addEmpty = isset($options['add_empty']) ? $options['add_empty'] : false;
    if (false !== $addEmpty)
    {
      $countries = array_merge(array('' => true === $addEmpty ? '' : $addEmpty), $countries);
    }
    //Listado de paises que voy a dejar que se seleccionen.
    $list = array(
    'AR', 'AU', 'BR', 'CA', 'CL', 'CO', 'CR', 'HR', 'DK', 'EC', 'SV', 'SK', 'SI', 'ES', 'US', 'FI', 'FR', 'GR', 'HU', 'IE', 'IL', 'IT', 'JM', 'JP', 'LT', 'LU', 'MA', 'NI', 'NO', 'NZ', 'NL', 'PY', 'PE', 'PL', 'PT', 'PR', 'GB', 'RO', 'RU', 'RS', 'CS', 'ZA', 'SE', 'CH', 'TN', 'UY', 'VE' 
    );
    $usables = array();
    foreach($countries as $key => $value)
    {
      if(in_array($key, $list))
      {
        $usables[$key] = $value;
      }
    }
      
      
    $this->setOption('choices', $usables);
  }
}
