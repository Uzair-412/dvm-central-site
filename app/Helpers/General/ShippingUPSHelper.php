<?php

namespace App\Helpers\General;

use App\Models\Country;
use App\Models\State;
use SimpleUPS\Api\InvalidParameterException;
use SimpleUPS\Api\ResponseErrorException;

/**
 * Class HtmlHelper.
 */
class ShippingUPSHelper
{
    public static function shipping_rates($address, $vendor = null, $select_cheapest = false)
    {
        try
        {
            //set shipper
            $fromAddress = new \SimpleUPS\InstructionalAddress();

            if($vendor)
            {
                $vendor_id  = $vendor->id;
                $addressee  = $vendor->name;
                $street     = $vendor->address;
                $state      = $vendor->state;
                $city       = $vendor->city;
                $zip        = $vendor->zip_code;
                $country    = $vendor->getVendorCountry->iso2;
            }
            else
            {
                $vendor_id  = 0;
                $addressee  = 'GerVetUSA';
                $street     = '1188 Willis Ave Suite#801';
                $state      = 'NY';
                $city       = 'New York';
                $zip        = '11507';
                $country    = 'US';
            }

            $fromAddress->setAddressee($addressee);
            $fromAddress->setStreet($street);
            $fromAddress->setStateProvinceCode($state);
            $fromAddress->setCity($city);
            $fromAddress->setPostalCode($zip);
            $fromAddress->setCountryCode($country);

            $shipper = new \SimpleUPS\Shipper();
            $shipper->setNumber('19972Y');
            $shipper->setAddress($fromAddress);

            \SimpleUPS\UPS::setShipper($shipper);

            //define a shipping destination
            $shippingDestination = new \SimpleUPS\InstructionalAddress();

            if(isset($address['address1']))
                $shippingDestination->setStreet($address['address1']);

            /*if(isset($address['address2']))
                $shippingDestination->setStreet($address['address2']);*/

            if(isset($address['state']))
            {
                if(is_numeric($address['state']))
                {
                    $state = State::find($address['state']);
                    $address['state'] = $state->iso2;
                }
                $shippingDestination->setStateProvinceCode(substr($address['state'], 0, 2));
            }

            if(isset($address['city']))
                $shippingDestination->setCity($address['city']);

            if(isset($address['zip']))
                $shippingDestination->setPostalCode($address['zip']);

            if(isset($address['country']))
            {
                if(is_numeric($address['country']))
                {
                    $country = Country::find($address['country']);
                    $address['country'] = $country->iso2;
                }
                $shippingDestination->setCountryCode($address['country']);
            }

            $weight = 5;
            if(isset($address['total_weight']))
                $weight = $address['total_weight'];

            //define a package, we could specify the dimensions of the box if we wanted a more accurate estimate
            $package = new \SimpleUPS\Rates\Package();
            $package->setWeight($weight);

            $shipment = new \SimpleUPS\Rates\Shipment();
            $shipment->setDestination($shippingDestination);
            $shipment->addPackage($package);

            \SimpleUPS\UPS::setAuthentication('ED731DE70F271E55', 'Gerinst', 'Mm121257@');

            $rates = [];

            if($vendor && session()->has( 'ses_vendor_shipping_method_'.$vendor->id ))
                $ses_enc = session( 'ses_vendor_shipping_method_'.$vendor->id );

            /*if(request()->session()->get('ses_free_shipping_coupon'))
            {
                $service = 'Free Ground Shipping';
                $rate = 0;
                $enc = base64_encode($service.'__'.$rate);

                if($ses['enc'] == $enc)
                    $sel = true;
                else
                    $sel = false;

                $rates[] = ['enc' => $enc, 'service' => $service, 'rate' => $rate, 'selected' => $sel];
            }*/

            $lowest_rate = 5000;
            $index = $lowest_or_selected_rate_index = 0;
            foreach (\SimpleUPS\UPS::getRates($shipment) as $shippingMethod)
            {
                $service = $shippingMethod->getService()->getDescription();
                $rate = round($shippingMethod->getTotalCharges(),2);
                $enc = base64_encode($service.'__'.$rate);

                $sel = false;

                if(isset($ses_enc))
                {
                    if($ses_enc == $enc)
                    {
                        $sel = true;
                        $lowest_or_selected_rate_index = $index;
                    }
                }
                else if($select_cheapest)
                {
                    if($rate < $lowest_rate)
                    {
                        $lowest_rate = $rate;
                        $lowest_or_selected_rate_index = $index;
                    }
                }

                $rates[] = ['enc' => $enc, 'service' => $service, 'rate' => $rate, 'selected' => $sel];
                $index++;
            }

            if(isset($rates[$lowest_or_selected_rate_index]))
                $rates[$lowest_or_selected_rate_index]['selected'] = true;

            $return['rates'] = $rates;
            $return['lowest_or_selected_rate_index'] = $lowest_or_selected_rate_index;
            $return['status'] = 1;
            //session()->put( 'ses_vendor_shipping_method_'.$vendor_id, $rates[$lowest_or_selected_rate_index]['enc']); // will do later

            session()->put('ses_vendor_shipping_rates_'.$vendor_id, $return);

            return $return;

        }
        catch (InvalidParameterException $e) {
            return ['status' => 0, 'message' => $e->getMessage().'. Please verify your shipping address and try again.', 'errors' => $e];
        }
        catch (ResponseErrorException $e) {
            return ['status' => 0, 'message' => $e->getMessage().'. Please verify your shipping address and try again.', 'errors' => $e];
        }
        catch (\Exception $e) {
            return ['status' => 0, 'message' => $e->getMessage(), 'line' => $e->getLine(),'file' => $e->getFile()];
        }
    }

    public static function shipping_rates_api($address, $vendor = null, $select_cheapest = false, $shipping_method='')
    {
        try
        {
            //set shipper
            $fromAddress = new \SimpleUPS\InstructionalAddress();

            if($vendor)
            {
                $vendor_id  = $vendor->id;
                $addressee  = $vendor->name;
                $street     = $vendor->address;
                $state      = $vendor->state;
                $city       = $vendor->city;
                $zip        = $vendor->zip_code;
                $country    = $vendor->getVendorCountry->iso2;
            }
            else
            {
                $vendor_id  = 0;
                $addressee  = 'GerVetUSA';
                $street     = '1188 Willis Ave Suite#801';
                $state      = 'NY';
                $city       = 'New York';
                $zip        = '11507';
                $country    = 'US';
            }

            $fromAddress->setAddressee($addressee);
            $fromAddress->setStreet($street);
            $fromAddress->setStateProvinceCode($state);
            $fromAddress->setCity($city);
            $fromAddress->setPostalCode($zip);
            $fromAddress->setCountryCode($country);

            $shipper = new \SimpleUPS\Shipper();
            $shipper->setNumber('19972Y');
            $shipper->setAddress($fromAddress);

            \SimpleUPS\UPS::setShipper($shipper);

            //define a shipping destination
            $shippingDestination = new \SimpleUPS\InstructionalAddress();

            if(isset($address['address1']))
                $shippingDestination->setStreet($address['address1']);

            /*if(isset($address['address2']))
                $shippingDestination->setStreet($address['address2']);*/

            if(isset($address['state']))
            {
                if(is_numeric($address['state']))
                {
                    $state = State::find($address['state']);
                    $address['state'] = $state->iso2;
                }
                $shippingDestination->setStateProvinceCode(substr($address['state'], 0, 2));
            }

            if(isset($address['city']))
                $shippingDestination->setCity($address['city']);

            if(isset($address['zip']))
                $shippingDestination->setPostalCode($address['zip']);

            if(isset($address['country']))
            {
                if(is_numeric($address['country']))
                {
                    $country = Country::find($address['country']);
                    $address['country'] = $country->iso2;
                }
                $shippingDestination->setCountryCode($address['country']);
            }

            $weight = 5;
            if(isset($address['total_weight']))
                $weight = $address['total_weight'];

            //define a package, we could specify the dimensions of the box if we wanted a more accurate estimate
            $package = new \SimpleUPS\Rates\Package();
            $package->setWeight($weight);

            $shipment = new \SimpleUPS\Rates\Shipment();
            $shipment->setDestination($shippingDestination);
            $shipment->addPackage($package);

            \SimpleUPS\UPS::setAuthentication('ED731DE70F271E55', 'Gerinst', 'Mm121257@');

            $rates = [];

            if(@$shipping_method)
                $ses_enc = $shipping_method;

            $lowest_rate = 5000;
            $index = $lowest_or_selected_rate_index = 0;
            foreach (\SimpleUPS\UPS::getRates($shipment) as $shippingMethod)
            {
                $service = $shippingMethod->getService()->getDescription();
                $rate = round($shippingMethod->getTotalCharges(),2);
                $enc = base64_encode($service.'__'.$rate);

                $sel = false;

                if(isset($ses_enc))
                {
                    if($ses_enc == $enc)
                    {
                        $sel = true;
                        $lowest_or_selected_rate_index = $index;
                    }
                }
                else if($select_cheapest)
                {
                    if($rate < $lowest_rate)
                    {
                        $lowest_rate = $rate;
                        $lowest_or_selected_rate_index = $index;
                    }
                }

                $rates[] = ['enc' => $enc, 'service' => $service, 'rate' => $rate, 'selected' => $sel];
                $index++;
            }

            if(isset($rates[$lowest_or_selected_rate_index]))
                $rates[$lowest_or_selected_rate_index]['selected'] = true;

            $return['rates'] = $rates;
            $return['lowest_or_selected_rate_index'] = $lowest_or_selected_rate_index;
            $return['status'] = 1;

            return $return;

        }
        catch (InvalidParameterException $e) {
            return ['status' => 0, 'message' => $e->getMessage().'. Please verify your shipping address and try again.', 'errors' => $e];
        }
        catch (ResponseErrorException $e) {
            return ['status' => 0, 'message' => $e->getMessage().'. Please verify your shipping address and try again.', 'errors' => $e];
        }
        catch (\Exception $e) {
            return ['status' => 0, 'message' => $e->getMessage(), 'line' => $e->getLine(),'file' => $e->getFile()];
        }
    }
}
