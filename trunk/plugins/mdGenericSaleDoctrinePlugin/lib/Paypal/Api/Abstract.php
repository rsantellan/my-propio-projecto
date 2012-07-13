<?php
/**
 * Abstract class for Paypal API wrappers
 *
 * @author      Gaston Caldeiro
 */
abstract class Md_Api_Abstract
{   
    /**
     * Return Paypal Api user name based on config data
     *
     * @return string
     */
    public function getApiUsername()
    {
      
        return sfConfig::get('app_paypal_API_USERNAME');
    }

    /**
     * Return Paypal Api password based on config data
     *
     * @return string
     */
    public function getApiPassword()
    {
        return sfConfig::get('app_paypal_API_PASSWORD');
    }

    /**
     * Return Paypal Api signature based on config data
     *
     * @return string
     */
    public function getApiSignature()
    {
        return sfConfig::get('app_paypal_API_SIGNATURE');
    }

    /**
     * API endpoint getter
     *
     * @return string
     */
    public function getApiEndpoint()
    {
        return sfConfig::get('app_paypal_API_ENDPOINT');
    }
    
    /**
     * Return Paypal Api proxy status based on config data
     *
     * @return bool
     */
    public function getUseProxy()
    {
        return $sfConfig::get('app_paypal_USE_PROXY', false);
    }

    /**
     * Return Paypal Api proxy host based on config data
     *
     * @return string
     */
    public function getProxyHost()
    {
        return sfConfig::get('app_paypal_PROXY_HOST');
    }

    /**
     * Return Paypal Api proxy port based on config data
     *
     * @return string
     */
    public function getProxyPort()
    {
        return sfConfig::get('app_paypal_PROXY_PORT');
    }

    public function getPayPalUrl()
    {
        return sfConfig::get('app_paypal_URL');
    }
    
    /**
     * Return Paypal Api version
     *
     * @return string
     */
    public function getVersion()
    {
        return sfConfig::get('app_paypal_VERSION');
    }    

    /**
     * Log debug data to file
     *
     * @param mixed $debugData
     */
    protected function _debug($debugData)
    {
        if($this->getDebugFlag())
        {
            // Loguear
            sfContext::getInstance()->getLogger()->log('> paypal log: ' . $debugData);            
        }
    }

    /**
     * Define if debugging is enabled
     *
     * @return bool
     */
    public function getDebugFlag()
    {
        // Setearlo en archivo de configuracion
        return sfConfig::get('app_paypal_DEBUG');
    }

    /**
     * Current locale code getter TODO
     *
     * @return string
     */
    public function getLocaleCode()
    {
        return 'BR';
    }

    /**
     * Filter amounts in API calls
     * @param float|string $value
     * @return string
     */
    public function _filterAmount($value)
    {
        return sprintf('%.2F', $value);
    }

    /**
     * Filter boolean values in API calls
     *
     * @param mixed $value
     * @return string
     */
    public function _filterBool($value)
    {
        return ($value) ? 'true' : 'false';
    }

    /**
     * Filter int values in API calls
     *
     * @param mixed $value
     * @return int
     */
    public function _filterInt($value)
    {
        return (int)$value;
    }

    /**
     * Filter qty in API calls
     * Paypal note: The value for quantity must be a positive integer. Null, zero, or negative numbers are not allowed.
     *
     * @param float|string|int $value
     * @return string
     */
    public function _filterQty($value)
    {
        return intval($value);
    }
}
