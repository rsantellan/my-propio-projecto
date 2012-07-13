<?php
/**
 * Wrapper that performs Paypal Express and Checkout communication
 * Use current Paypal Express method instance
 */
class Md_Express_Checkout
{
    const CALLBACKTIMEOUT = 4;
    
    /**
     * API instance
     * @var Mage_Paypal_Model_Api_Nvp
     */
    protected $_api = null;

    protected $_request = null;

    /**
     * Billing agreement that might be created during order placing
     *
     * @var array
     */
    protected $_billingAgreement = array();

    /**
     * 
     * @var array
     */
    protected $_shippingOptions = array();
    
    /**
     *
     * @var array
     */
    protected $_addressType = array();
    
    /**
     *
     * @var array
     */
    protected $_paymentDetail = array();
    
    /**
     *
     * @var array
     */
    protected $_paymentDetailsItem = array();
    
    /**
     * incluye: Recurring Payments Profile Details Fields, Schedule Details Fields, Billing Period Details Fields
     * @var array
     */
    protected $_recurringPaymentProfileDetails = array();
    
    /**
     * Required
     * 
     * @var string
     */
    protected $RETURNURL = null;
    
    /**
     * Required
     * 
     * @var string
     */
    protected $CANCELURL = null;
    
    /**
     *
     * @var string
     */
    protected $_token = null;


    /********************************************/
    //protected $LOCALECODE = null;
    //protected $MAXAMT = null;
    //protected $CALLBACK = null;    
    //protected $REQCONFIRMSHIPPING = null;    
    //protected $NOSHIPPING = null;    
    //protected $ALLOWNOTE = null;        
    //protected $PAGESTYLE = null;    
    //protected $HDRIMG = null;    
    //protected $HDRBORDERCOLOR = null;    
    //protected $HDRBACKCOLOR = null;    
    //protected $PAYFLOWCOLOR = null;    
    //protected $EMAIL = null;    
    //protected $SOLUTIONTYPE = null;    
    //protected $LANDINGPAGE = null;    
    //protected $CHANNELTYPE = null;    
    //protected $GIROPAYSUCCESSURL = null;    
    //protected $GIROPAYCANCELURL = null;    
    //protected $BANKTXNPENDINGURL = null;    
    //protected $BRANDNAME = null;
    /********************************************/
    
    /**
     * Set quote and config instances
     * @param array $params
     */
    public function __construct($params = array())
    {
        $this->_api     = new Md_Api_Nvp();
    }

    /**
     * Checkout with PayPal image URL getter
     * @return string
     */
    public function getCheckoutShortcutImageUrl()
    {
        // $this->_getSupportedLocaleCode($this->getLocaleCode()
        // Obtener de algun lado 
        return sprintf('https://www.paypal.com/%s/i/btn/btn_xpressCheckout.gif', 'pt_BR');
    }
    
    public function setCancelUrl($url)
    {
        $this->CANCELURL = $url;
    }
    
    public function setReturnUrl($url)
    {
        $this->RETURNURL = $url;
    }
    
    public function setToken($token)
    {
        $this->_token = $token;
    }
    
    public function getErrors()
    {
        return $this->_api->getErrors();
    }
    
    public function getSuccessWarnings()
    {
        return $this->_api->getWarnings();
    }
    
    public function getRecurringPaymentProfileDetails()
    {
        return $this->_recurringPaymentProfileDetails;
    }
    
    public function getToken()
    {
        return $this->_token;
    }

    /**
     * Reserve order ID for specified quote and start checkout on PayPal
     * @return string
     */
    public function setExpressCheckout()
    {
        $this->_api->callSetExpressCheckout($this);
    }
    
    public function getExpressCheckoutDetails()
    {
        return $this->_api->callGetExpressCheckoutDetails($this);
    }
    
    public function doExpressCheckoutPayment($expressCheckoutDetails)
    {
        $options = $this->_prepareDoCheckoutOptions($expressCheckoutDetails);
        
        return $this->_api->callDoExpressCheckoutPayment($options);
    }
    
    public function createRecurringPaymentsProfile()
    {
        return $this->_api->callCreateRecurringPaymentsProfile($this);
    }

    /**
     * Formas de envio
     * 
     * @param array $options 
     */
    public function addShippingOptions($options)
    {
        $i = count($this->_shippingOptions);
        
        $var = array(
            'L_SHIPPINGOPTIONISDEFAULT' . $i    => $options['L_SHIPPINGOPTIONISDEFAULT'],
            'L_SHIPPINGOPTIONNAME'      . $i    => $options['L_SHIPPINGOPTIONNAME'],
            'L_SHIPPINGOPTIONAMOUNT'    . $i    => $options['L_SHIPPINGOPTIONAMOUNT']
        );
        
        array_push($this->_shippingOptions, $var);
    }
    
    /**
     * Required:
     * BILLINGPERIOD:
     * BILLINGFREQUENCY:
     * AMT:
     * CURRENCYCODE:
     * DESC: This field must match the corresponding billing agreement description included in the SetExpressCheckout request.
     * PROFILESTARTDATE: The date when billing for this profile begins. Must be a valid date, in UTC/GMT format. The profile may take up to 24 hours for activation.
     * 
     * Not Supported: El resto de los parametros que aparecen en la documentacion
     * @param array $options 
     */
    public function addRecurringPaymentProfileDetails($options)
    {
        $var = array(
            'BILLINGPERIOD'     => $options['BILLINGPERIOD'],
            'BILLINGFREQUENCY'  => $options['BILLINGFREQUENCY'],
            'AMT'               => $this->_api->_filterAmount($options['AMT']),
            'CURRENCYCODE'      => $options['CURRENCYCODE'],
            'DESC'              => $options['DESC'],
            'PROFILESTARTDATE'  => $options['PROFILESTARTDATE']            
        );
        
        $this->_recurringPaymentProfileDetails = $var;
    }
    
    public function addAddressType($options)
    {
        $var = array(
            'PAYMENTREQUEST_' . $i . '_SHIPTONAME'          => $options['SHIPTONAME'],
            'PAYMENTREQUEST_' . $i . '_SHIPTOSTREET'        => $options['SHIPTOSTREET'],
            'PAYMENTREQUEST_' . $i . '_SHIPTOSTREET2'       => $options['SHIPTOSTREET2'],
            'PAYMENTREQUEST_' . $i . '_SHIPTOCITY'          => $options['SHIPTOCITY'],
            'PAYMENTREQUEST_' . $i . '_SHIPTOSTATE'         => $options['SHIPTOSTATE'],
            'PAYMENTREQUEST_' . $i . '_SHIPTOZIP'           => $options['SHIPTOZIP'],
            'PAYMENTREQUEST_' . $i . '_SHIPTOCOUNTRYCODE'   => $options['SHIPTOCOUNTRYCODE'],
            'PAYMENTREQUEST_' . $i . '_SHIPTOPHONENUM'      => $options['SHIPTOPHONENUM']            
        );
        
        array_push($this->_addressType, $var);
    }
    
    /**
     * Indices aceptables:
     * SHIPDISCAMT: Numero negativo
     * DESC: Descripcion de la compra
     * PAYMENTACTION: Sale | Authorization | Order
     * CURRENCYCODE: 
     * 
     *   //Todos estos son calculables
     *   //(Required) The total cost of the transaction to the customer. If shipping cost and tax charges are known, include them in 
     *   //this value; if not, this value should be the current sub-total of the order.
     *   //PAYMENTREQUEST_n_AMT 
     *   
     *   //PAYMENTREQUEST_n_CURRENCYCODE
     *   
     *   //Sum of cost of all items in this order. For digital goods, this field is required.
     *   //PAYMENTREQUEST_n_ITEMAMT
     *   
     *   //(Optional) Total shipping costs for this order.
     *   //PAYMENTREQUEST_n_SHIPPINGAMT
     *   
     *   //(Optional) Sum of tax for all items in this order. PAYMENTREQUEST_n_TAXAMT is required if you specify L_PAYMENTREQUEST_n_TAXAMTm 
     *   //PAYMENTREQUEST_n_TAXAMT
     *   
     *   /--------------------------------------------/
     *   //(Optional) Shipping discount for this order, specified as a negative number.
     *   //PAYMENTREQUEST_n_SHIPDISCAMT
     *   
     *   //(Optional) Description of items the customer is purchasing. The value you specify is only available if the transaction includes 
     *   //a purchase; this field is ignored if you set up a billing agreement 
     *   //for a recurring payment that is not immediately charged. 
     *   //PAYMENTREQUEST_n_DESC
     *   
     *   //Sale | Authorization | Order
     *   //PAYMENTREQUEST_n_PAYMENTACTION
     *   
     *   /--------------------------------------------/
     *   
     *   // No soportados
     *   //
     *   //PAYMENTREQUEST_n_HANDLINGAMT
     *   //PAYMENTREQUEST_n_CUSTOM
     *   //PAYMENTREQUEST_n_INVNUM
     *   //PAYMENTREQUEST_n_NOTIFYURL
     *   //PAYMENTREQUEST_n_NOTETEXT
     *   //PAYMENTREQUEST_n_TRANSACTIONID
     *   //PAYMENTREQUEST_n_ALLOWEDPAYMENTMETHOD
     *   //PAYMENTREQUEST_n_PAYMENTREQUESTID
     *   //
     *   //(Optional) Total shipping insurance costs for this order. The value must be a non-negative currency amount or null 
     *   //if insurance options are offered.
     *   //PAYMENTREQUEST_n_INSURANCEAMT
     *   //        
     *   //(Optional) If true, the Insurance drop-down on the PayPal Review page displays the string ‘Yes’ and the insurance amount. 
     *   //If true, the total shipping insurance for this order must be a positive number.
     *   //PAYMENTREQUEST_n_INSURANCEOPTIONOFFERED
     * 
     * @param type $options 
     */
    public function addPaymentDetail($options)
    {        
        $i = count($this->_paymentDetail);
        
        $var = array(
            'PAYMENTREQUEST_' . $i . '_DESC'          => $options['DESC'],
            'PAYMENTREQUEST_' . $i . '_PAYMENTACTION' => $options['PAYMENTACTION'],
            'PAYMENTREQUEST_' . $i . '_SHIPDISCAMT'   => (int)$options['SHIPDISCAMT'],
            'PAYMENTREQUEST_' . $i . '_CURRENCYCODE'  => $options['CURRENCYCODE']
        );
        
        array_push($this->_paymentDetail, $var);
        
        $this->_paymentDetailsItem[$i] = array();
    }

    /**
     *   $var = array(
     *       'NAME'    => $options['NAME'],
     *       'DESC'    => $options['DESC'],
     *       'AMT'     => $options['AMT'],
     *       'NUMBER'  => $options['NUMBER'],
     *       'QTY'     => $options['QTY'],
     *       'TAXAMT'  => $options['TAXAMT'],
     *       'ITEMWEIGHTVALUE' => $options['ITEMWEIGHTVALUE'],
     *       'ITEMWEIGHTUNIT'  => $options['ITEMWEIGHTUNIT'],
     *       'ITEMLENGTHVALUE' => $options['ITEMLENGTHVALUE'],
     *       'ITEMLENGTHUNIT'  => $options['ITEMLENGTHUNIT'],
     *       'ITEMWIDTHVALUE'  => $options['ITEMWIDTHVALUE'],
     *       'ITEMWIDTHUNIT'   => $options['ITEMWIDTHUNIT'],
     *       'ITEMHEIGHTVALUE' => $options['ITEMHEIGHTVALUE'],
     *       'ITEMHEIGHTUNIT'  => $options['ITEMHEIGHTUNIT'],
     *       'ITEMURL'         => $options['ITEMURL'],
     *       'ITEMCATEGORY'    => $options['ITEMCATEGORY']
     *   );
     * @param array $options
     * @param 0..9 $payment
     */
    public function addPaymentDetailsItem($options, $payment = 0)
    {
        if(!array_key_exists($payment, $this->_paymentDetailsItem))
        {
            throw new Exception('Invocar a addPaymentDetails previamente', 1);
        }
        
        array_push($this->_paymentDetailsItem[$payment], $options);        
    }
    
    /**
     * BILLINGTYPE:
     * BILLINGAGREEMENTDESCRIPTION
     * PAYMENTTYPE (Optional)
     * BILLINGAGREEMENTCUSTOM (Optional)
     * 
     * @param type $options
     */
    public function addBillingAgreementDetails($options)
    {
        $i = count($this->_billingAgreement);
        
        $var = array();
        foreach($options as $key => $value)
        {
            $var['L_' . $key . $i] = $value;
        }
        
        array_push($this->_billingAgreement, $var);
    }
    
    /**
     * TODO: shipping y tax
     * @param type $request 
     */
    public function _preparePaymentDetail(&$request)
    {
        foreach($this->_paymentDetail as $payment => $paymentDetail)        
        {
            $items = $this->_paymentDetailsItem[$payment];
            
            $amount = 0;
            $itemamount = 0;
            $shipping = 0;
            $tax = 0;
            
            $i = 0;
            // Preparamos los items de cada payment
            foreach($items as $package)
            {
                // Calculamos los parametros del payment            
                $itemamount+= $this->_api->_filterAmount($package['AMT']) * $this->_api->_filterQty($package['QTY']);
                //$shipping+= $a;
                //$tax+=$b;
                
                foreach($package as $key => $value)
                {   
                    $request['L_PAYMENTREQUEST_' . $payment . '_' . $key . $i] = $value;
                }
                
                $i++;
            }
            
            $amount+= $this->_api->_filterAmount($itemamount) + $this->_api->_filterAmount($shipping) + $this->_api->_filterAmount($tax);
            
            // Agregamos detalle del payment
            $request['PAYMENTREQUEST_' . $payment . '_AMT']       = $amount;
            $request['PAYMENTREQUEST_' . $payment . '_ITEMAMT']   = $itemamount;
            $request['PAYMENTREQUEST_' . $payment . '_SHIPPINGAMT']= $shipping;
            $request['PAYMENTREQUEST_' . $payment . '_TAXAMT']     = $tax;

            $request = array_merge($request, $paymentDetail);
            
        }
        
        $this->_request = $request;
    }
    
    public function _exportToRequest(&$request)
    {
        $request['CANCELURL'] = $this->CANCELURL;
        $request['RETURNURL'] = $this->RETURNURL;
        $request['ADDROVERRIDE'] = 0;
        //$request['MAXAMT'] = $request['AMT'] + 999.00; // it is impossible to calculate max amount

        // add recurring profiles information
        foreach ($this->_billingAgreement as $profile) 
        {
            $request = array_merge($request, $profile);
        }
        
        // import/suppress shipping address, if any
        /*$options = $this->getShippingOptions();
        if ($this->getAddress()) {
            $request = $this->_importAddresses($request);
            $request['ADDROVERRIDE'] = 1;
        } elseif ($options && (count($options) <= 10)) { // doesn't support more than 10 shipping options
            $request['CALLBACK'] = $this->getShippingOptionsCallbackUrl();
            $request['CALLBACKTIMEOUT'] = 6; // max value
            $request['MAXAMT'] = $request['AMT'] + 999.00; // it is impossible to calculate max amount
            $this->_exportShippingOptions($request);
        }*/        
    } 
    
    protected function _prepareDoCheckoutOptions($details)
    {
        $options = array();
        
        $options['TOKEN']           = $details['TOKEN'];
        $options['PAYERID']         = $details['PAYERID'];
        $options['PAYMENTACTION']   = (isset($details['PAYMENTACTION']) ? $details['PAYMENTACTION'] : 'Sale');
        $options['AMT']             = $details['AMT'] + $details['SHIPDISCAMT'];
        $options['CURRENCYCODE']    = $details['CURRENCYCODE'];
        
        return $options;
    }
    
    
    /**
     * Attempt to collect address shipping rates and return them for further usage in instant update API
     * Returns empty array if it was impossible to obtain any shipping rate
     * If there are shipping rates obtained, the method must return one of them as default.
     *
     * @param Mage_Sales_Model_Quote_Address $address
     * @param bool $mayReturnEmpty
     * @return array|false
     */
    protected function _prepareShippingOptions(Mage_Sales_Model_Quote_Address $address, $mayReturnEmpty = false)
    {
        // Magento will transfer only first 10 cheapest shipping options if there are more than 10 available.
        /*if (count($options) > 10) {
            usort($options, array(get_class($this),'cmpShippingOptions'));
            array_splice($options, 10);
            // User selected option will be always included in options list
            if (!is_null($userSelectedOption) && !in_array($userSelectedOption, $options)) {
                $options[9] = $userSelectedOption;
            }
        }

        return $options;*/
    }

    /**
     * Compare two shipping options based on their amounts
     *
     * This function is used as a callback comparison function in shipping options sorting process
     * @see self::_prepareShippingOptions()
     *
     * @param Varien_Object $option1
     * @param Varien_Object $option2
     * @return integer
     */
    protected static function cmpShippingOptions(Varien_Object $option1, Varien_Object $option2)
    {
        if ($option1->getAmount() == $option2->getAmount()) {
            return 0;
        }
        return ($option1->getAmount() < $option2->getAmount()) ? -1 : 1;
    }   
}
