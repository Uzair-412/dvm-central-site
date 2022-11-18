<?php

namespace App\Helpers\General;

use Omnipay\Common\CreditCard;
use Omnipay\Omnipay;

/**
 * Class AnetHelper.
 */
class AnetHelper
{
    public $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('AuthorizeNetApi_Api');

        if(config('anet.test_mode'))
        {
            $this->gateway->setAuthName(config('anet.sb_login_id'));
            $this->gateway->setTransactionKey(config('anet.sb_transaction_key'));
            $this->gateway->setTestMode(true);
        }
        else
        {
            $this->gateway->setAuthName(config('anet.login_id'));
            $this->gateway->setTransactionKey(config('anet.transaction_key'));
        }
    }

    public function charge($data)
    {
        try {

            $cc_data = [
                'number' => $data['cc_number'],
                'expiryMonth' => $data['cc_expiry_month'],
                'expiryYear' => $data['cc_expiry_year'],
                'cvv' => $data['cc_ccv'],
            ];

            if($data['bl_first_name'])
                $cc_data['billingFirstName'] = $data['bl_first_name'];

            if($data['bl_last_name'])
                $cc_data['billingLastName'] = $data['bl_last_name'];

            if($data['bl_zip'])
                $cc_data['billingPostcode'] = $data['bl_zip'];

            if($data['bl_address1'])
                $cc_data['billingAddress1'] = $data['bl_address1'];

            if($data['bl_address2'])
                $cc_data['billingAddress1'] = $data['bl_address2'];

            if($data['bl_company'])
                $cc_data['billingCompany'] = $data['bl_company'];

            if($data['bl_city'])
                $cc_data['billingCity'] = $data['bl_city'];

            if($data['bl_state'])
                $cc_data['billingState'] = $data['bl_state'];

            if($data['bl_country'])
                $cc_data['billingCountry'] = $data['bl_country'];

            if($data['bl_phone'])
                $cc_data['billingPhone'] = $data['bl_phone'];

            if($data['sp_first_name'])
                $cc_data['shippingFirstName'] = $data['sp_first_name'];

            if($data['sp_last_name'])
                $cc_data['shippingLastName'] = $data['sp_last_name'];

            if($data['sp_zip'])
                $cc_data['shippingPostcode'] = $data['sp_zip'];

            if($data['sp_address1'])
                $cc_data['shippingAddress1'] = $data['sp_address1'];

            if($data['sp_address2'])
                $cc_data['shippingAddress1'] = $data['sp_address2'];

            if($data['sp_company'])
                $cc_data['shippingCompany'] = $data['sp_company'];

            if($data['sp_city'])
                $cc_data['shippingCity'] = $data['sp_city'];

            if($data['sp_state'])
                $cc_data['shippingState'] = $data['sp_state'];

            if($data['sp_country'])
                $cc_data['shippingCountry'] = $data['sp_country'];

            if($data['sp_phone'])
                $cc_data['shippingPhone'] = $data['sp_phone'];

            if($data['email'])
                $cc_data['email'] = $data['email'];

            $creditCard = new CreditCard($cc_data);

            $transactionId = $data['ref_number'];

            $response = $this->gateway->authorize([
                'amount' => $data['amount'],
                'currency' => 'USD',
                'transactionId' => $transactionId,
                'card' => $creditCard,
                'invoiceNumber' => $data['ref_number'],
                'description' => 'Order from '.appName(),
            ])->send();

            if($response->isSuccessful())
            {
                $transactionReference = $response->getTransactionReference();

                $response = $this->gateway->capture([
                    'amount' => $data['amount'],
                    'currency' => 'USD',
                    'transactionReference' => $transactionReference
                ])->send();

                $resp_data = $response->getData();
                $transaction_response = $resp_data['transactionResponse'];

                //$transaction_id = $response->getTransactionReference();

                return ['status' => 1, 'cc_number' => $transaction_response['accountNumber'], 'cc_expiry' => $data['cc_expiry_month'].'/'.$data['cc_expiry_year'],
                    'transaction_tag' => $transaction_response['transId'], 'authorization_num' => $transaction_response['authCode'],
                    'credit_card_type' => $transaction_response['accountType'], 'reference_no' => $data['ref_number'],
                    'ctr' => json_encode($resp_data)];
            }
            else
            {
                if($response->getMessage())
                    $message = $response->getMessage();
                else
                    $message = 'Unable to process the payment request, please try again later.';

                throw new \Exception($message);
            }
        }
        catch(\Exception $e)
        {
            throw new \Exception('Unable to process the payment request, please try again later or contact support.');
        }
    }
}