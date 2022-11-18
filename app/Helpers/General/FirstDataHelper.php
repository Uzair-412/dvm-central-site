<?php

namespace App\Helpers\General;

use VinceG\FirstDataApi\FirstData;

/**
 * Class FirstDataHelper.
 */
class FirstDataHelper
{
    public static function charge($data)
    {
        error_reporting(0);

        $firstData = new FirstData('R53851-74', '1r5ekKiqHl2sypKxSRgLLmqDdQVtV4RZ');

        $firstData->setTransactionType(FirstData::TRAN_PURCHASE);
        $firstData->setCreditCardType($data['cc_type'])
            ->setCreditCardNumber($data['cc_number'])
            ->setCreditCardName($data['cc_name'])
            ->setCreditCardExpiration($data['cc_expiry'])
            ->setAmount($data['amount'])
            ->setReferenceNumber($data['ref_number']);

        if($data['cc_zip']) {
            $firstData->setCreditCardZipCode($data['cc_zip']);
        }

        if($data['cc_cvv']) {
            $firstData->setCreditCardVerification($data['cc_ccv']);
        }

        if($data['cc_address']) {
            $firstData->setCreditCardAddress($data['cc_address']);
        }

        $firstData->process();

        $response = $firstData->getResponse();

        /*error_log('--------------------------');
        error_log($response);
        error_log('--------------------------');*/

        //$response = '{"transaction_error":0,"transaction_approved":1,"exact_resp_code":"00","exact_message":"Transaction Normal","bank_resp_code":"100","bank_message":"Approved","sequence_no":"0908290","avs":"S","retrieval_ref_no":"200421","merchant_name":"GERMED LTD","merchant_city":"NEW HYDE PARK","merchant_province":"New York","merchant_country":"United States","merchant_url":"WWW.GERVETUSA.COM","ctr":"========== TRANSACTION RECORD ==========\nGERMED LTD\n\nNEW HYDE PARK, NY\nUnited States\nWWW.GERVETUSA.COM\n\nTYPE: Purchase\n\nACCT: Visa $ 1.00 USD\n\nCARDHOLDER NAME : Farhan Asim\nCARD NUMBER : ############4555\nDATE/TIME : 21 Apr 20 16:14:04\nREFERENCE # : 003 0908290 M\nAUTHOR. # : 191746\nTRANS. REF. : GV-1587500043\n\n Approved - Thank You 100\n\n\nPlease retain this copy for your records.\n\nCardholder will pay above amount to\ncard issuer pursuant to cardholder\nagreement.\n========================================","gateway_id":"R53851-74","transaction_type":"00","amount":1.0,"cc_number":"############4555","transaction_tag":5223298245,"authorization_num":"191746","cc_expiry":"0324","cardholder_name":"Farhan Asim","cc_verification_str1":"333 W Merrick Road Unit D Valley Stream, NY 11580","cvd_presence_ind":1,"reference_no":"GV-1587500043","currency_code":"USD","partial_redemption":0,"credit_card_type":"Visa"}';

        if($response = self::is_json($response))
        {
            if(isset($response['transaction_approved']) && $response['transaction_approved'] == '1')
            {
                return ['status' => 1, 'cc_number' => $response['cc_number'], 'cc_expiry' => $response['cc_expiry'],
                    'transaction_tag' => $response['transaction_tag'], 'authorization_num' => $response['authorization_num'],
                    'credit_card_type' => $response['credit_card_type'], 'reference_no' => $response['reference_no'],
                    'ctr' => $response['ctr']];
            }
            else
            {
                if(isset($response['bank_message']))
                    $message = $response['bank_message'];
                else
                    $message = 'Unable to process the payment request, please try again later.';

                throw new \Exception($message);
            }
        }

        throw new \Exception('Unable to process the payment request, please try again later or contact support.');
    }

    public static function is_json($string)
    {
        $response = json_decode($string, true);

        if (json_last_error() == JSON_ERROR_NONE)
        {
            return $response;
        }

        return false;
    }
}
