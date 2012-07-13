<?php

/**
 * NVP API wrappers model
 */
class Md_Api_Nvp extends Md_Api_Abstract
{
    /**
     * Paypal methods definition
     */
    //const DO_DIRECT_PAYMENT             = 'DoDirectPayment';
    //const DO_CAPTURE                    = 'DoCapture';
    //const DO_VOID                       = 'DoVoid';
    //const REFUND_TRANSACTION            = 'RefundTransaction';
    //const CALLBACK_RESPONSE             = 'CallbackResponse';
    const SET_EXPRESS_CHECKOUT          = 'SetExpressCheckout';
    const GET_EXPRESS_CHECKOUT_DETAILS  = 'GetExpressCheckoutDetails';
    const DO_EXPRESS_CHECKOUT_PAYMENT   = 'DoExpressCheckoutPayment';
    const CREATE_RECURRING_PAYMENTS_PROFILE = 'CreateRecurringPaymentsProfile';


    /**
     * Paypal ManagePendingTransactionStatus actions
     */
    const PENDING_TRANSACTION_ACCEPT    = 'Accept';
    const PENDING_TRANSACTION_DENY      = 'Deny';

    /**
     * Map of credit card types supported by this API
     * @var array
     */
    protected $_supportedCcTypes = array(
        'VI' => 'Visa', 'MC' => 'MasterCard', 'DI' => 'Discover', 'AE' => 'Amex', 'SM' => 'Maestro', 'SO' => 'Solo');

    protected $_callErrors = array();
    
    protected $_callWarnings = array();    
    /**
     * SetExpressCheckout call
     * @link https://cms.paypal.com/us/cgi-bin/?&cmd=_render-content&content_ID=developer/e_howto_api_nvp_r_SetExpressCheckout
     * TODO: put together style and giropay settings
     */
    public function callSetExpressCheckout(Md_Express_Checkout $object)
    {
        $request = array();
        
        $this->_prepareRequest($request);
        $this->_addVersionToRequest($request);
        
        $object->_preparePaymentDetail($request);
        $object->_exportToRequest($request);

        $response = $this->call(self::SET_EXPRESS_CHECKOUT, $request);

        if($response)
        {
            if($this->_isCallSuccessful($response))
            {
                $token = $response["TOKEN"];

                header("Location: " . $this->getPayPalUrl() . $token);                
                
                exit();
            }
        }
        
        throw new Exception(serialize($this->_callErrors), 12);
    }

    /**
     * GetExpressCheckoutDetails call
     * @link https://cms.paypal.com/us/cgi-bin/?&cmd=_render-content&content_ID=developer/e_howto_api_nvp_r_GetExpressCheckoutDetails
     */
    function callGetExpressCheckoutDetails(Md_Express_Checkout $object)
    {
        $request = array();
        
        $this->_prepareRequest($request);
        $this->_addVersionToRequest($request);
        
        $this->_addToRequest($request, array('TOKEN' => $object->getToken()));
        
        $response = $this->call(self::GET_EXPRESS_CHECKOUT_DETAILS, $request);

        if($response)
        {
            if($this->_isCallSuccessful($response))
            {
                return $response;
            }
        }
        
        return false;        
    }

    /**
     * DoExpressCheckout call
     * @link https://cms.paypal.com/us/cgi-bin/?&cmd=_render-content&content_ID=developer/e_howto_api_nvp_r_DoExpressCheckoutPayment
     */
    public function callDoExpressCheckoutPayment($options)
    {
        $request = array();
        
        $this->_prepareRequest($request);
        $this->_addVersionToRequest($request);
        
        $this->_addToRequest($request, $options);

        $response = $this->call(self::DO_EXPRESS_CHECKOUT_PAYMENT, $request);
        
        if($response)
        {
            if($this->_isCallSuccessful($response))
            {
                return $response;
            }
        }
        
        return false;
    }

    /**
     * CreateRecurringPaymentsProfile call
     */
    public function callCreateRecurringPaymentsProfile(Md_Express_Checkout $object)
    {
        $request = array();
        
        $this->_prepareRequest($request);
        $this->_addVersionToRequest($request);
        
        $this->_addToRequest($request, array('TOKEN' => $object->getToken()));
        $options = $object->getRecurringPaymentProfileDetails();        
        $this->_addToRequest($request, $options);       
        
        $response = $this->call(self::CREATE_RECURRING_PAYMENTS_PROFILE, $request);
        
        if($response)
        {
            if($this->_isCallSuccessful($response))
            {
                return $response;
            }
        }
        
        return false;
        //$this->_analyzeRecurringProfileStatus($this->getRecurringProfileStatus(), $this);
    }

    /**
     * ManageRecurringPaymentsProfileStatus call
     */
    public function callManageRecurringPaymentsProfileStatus()
    {
        /*$request = $this->_exportToRequest($this->_manageRecurringPaymentsProfileStatusRequest);
        if (isset($request['ACTION'])) {
            $request['ACTION'] = $this->_filterRecurringProfileActionToNvp($request['ACTION']);
        }
        try {
            $response = $this->call('ManageRecurringPaymentsProfileStatus', $request);
        } catch (Mage_Core_Exception $e) {
            if ((in_array(11556, $this->_callErrors) && 'Cancel' === $request['ACTION'])
                || (in_array(11557, $this->_callErrors) && 'Suspend' === $request['ACTION'])
                || (in_array(11558, $this->_callErrors) && 'Reactivate' === $request['ACTION'])
            ) {
                Mage::throwException(Mage::helper('paypal')->__('Unable to change status. Current status is not correspond to real status.'));
            }
            throw $e;
        }*/
    }

    /**
     * GetRecurringPaymentsProfileDetails call
     */
    public function callGetRecurringPaymentsProfileDetails(Varien_Object $result)
    {
        /*$request = $this->_exportToRequest($this->_getRecurringPaymentsProfileDetailsRequest);
        $response = $this->call('GetRecurringPaymentsProfileDetails', $request);
        $this->_importFromResponse($this->_getRecurringPaymentsProfileDetailsResponse, $response);
        $this->_analyzeRecurringProfileStatus($this->getStatus(), $result);*/
    }

    /**
     * Add method to request array
     *
     * @param string $methodName
     * @param array $request
     * @return array
     */
    protected function _addMethodToRequest($methodName, &$request)
    {
        $request['METHOD'] = $methodName;
        return $request;
    }
    
    protected function _addVersionToRequest(&$request)
    {
        $request['VERSION'] = urlencode($this->getVersion());
        return $request;
    }

    /**
     * Do the API call
     *
     * @param string $methodName
     * @param array $request
     * @return array
     * @throws Mage_Core_Exception
     */
    public function call($methodName, array $request)
    {
        sfContext::getInstance()->getLogger()->log('PAYPAL::call');
        
        $this->_addMethodToRequest($methodName, $request);

        $http_connection = new HttpConnection();

        $response = $http_connection->post($this->getApiEndpoint(), $request);
        
        sfContext::getInstance()->getLogger()->log('PAYPAL::call - response ' . serialize($response));        

        $http_connection->close();
        
        if(!$response)
        {
            $this->_callErrors = $http_connection->getError();
            return false;
        }
        
        return $this->_deformatNVP($response);
    }
    
    /**
     *
     * @param type $request
     * @return type 
     */
    protected function _prepareRequest(&$request)
    {
        $request['USER']        = urlencode($this->getApiUsername());
        $request['PWD']         = urlencode($this->getApiPassword());
        $request['SIGNATURE']   = urlencode($this->getApiSignature());
        return $request;
    }

    /**
     * Catch success calls and collect warnings
     *
     * @param array
     * @return bool| success flag
     */
    protected function _isCallSuccessful($response)
    {
        $ack = strtoupper($response['ACK']);
        
        if ($ack == 'SUCCESS' || $ack == 'SUCCESSWITHWARNING') {
            // collect warnings
            if ($ack == 'SUCCESSWITHWARNING') {
                for ($i = 0; isset($response["L_ERRORCODE{$i}"]); $i++) {
                    $this->_callWarnings[] = $response["L_ERRORCODE{$i}"];
                }
            }
            return true;
        }
        $this->_callErrors = $response;
        return false;
    }

    /**
     * Parse an NVP response string into an associative array
     * @param string $nvpstr
     * @return array
     */
    protected function _deformatNVP($nvpstr)
    {
        $intial=0;
        $nvpArray = array();

        $nvpstr = strpos($nvpstr, "\r\n\r\n")!==false ? substr($nvpstr, strpos($nvpstr, "\r\n\r\n")+4) : $nvpstr;

        while(strlen($nvpstr)) {
            //postion of Key
            $keypos= strpos($nvpstr,'=');
            //position of value
            $valuepos = strpos($nvpstr,'&') ? strpos($nvpstr,'&'): strlen($nvpstr);

            /*getting the Key and Value values and storing in a Associative Array*/
            $keyval=substr($nvpstr,$intial,$keypos);
            $valval=substr($nvpstr,$keypos+1,$valuepos-$keypos-1);
            //decoding the respose
            $nvpArray[urldecode($keyval)] =urldecode( $valval);
            $nvpstr=substr($nvpstr,$valuepos+1,strlen($nvpstr));
         }
        return $nvpArray;
    }
    
    protected function _addToRequest(&$request, $options)
    {
        $request = array_merge($request, $options);
    }

    /**
     * Filter for credit card type
     *
     * @param string $value
     * @return string
     */
    protected function _filterCcType($value)
    {
        if (isset($this->_supportedCcTypes[$value])) {
            return $this->_supportedCcTypes[$value];
        }
        return '';
    }

    /**
     * Filter for true/false values (converts to boolean)
     *
     * @param mixed $value
     * @return mixed
     */
    protected function _filterToBool($value)
    {
        if ('false' === $value || '0' === $value) {
            return false;
        } elseif ('true' === $value || '1' === $value) {
            return true;
        }
        return $value;
    }

    public function getErrors()
    {
        return $this->_callErrors;
    }
    
    public function getWarnings()
    {
        return $this->_callWarnings;
    }

    /**
     * Validate response array.
     * 
     * @param string $method
     * @param array $response
     * @return bool
     */
    /*protected function _validateResponse($method, $response) 
    {
        if (isset($this->_requiredResponseParams[$method])) {
            foreach ($this->_requiredResponseParams[$method] as $param) {
                if (!isset($response[$param])) {
                    return false;
                }    
            }
        }
        return true;
    }*/    
    
}
