<?php


class mdValidatorDateRange extends sfValidatorDateRange
{
  

  /**
   * @see sfValidatorBase
   */
  protected function doClean($value)
  {
    $fromField = $this->getOption('from_field');
    $toField   = $this->getOption('to_field');

    //$value[$fromField] = $this->getOption('from_date')->clean(isset($value[$fromField]) ? $value[$fromField] : null);
    //$value[$toField]   = $this->getOption('to_date')->clean(isset($value[$toField]) ? $value[$toField] : null);

    return $value;
  }
}
