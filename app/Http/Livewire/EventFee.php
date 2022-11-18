<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EventFee extends Component
{

    public $event, $cardholder, $cardNumber, $month, $year;

    public function render()
    {
        return view('livewire.event-fee');
    }

    public function formatBankAccount(){
        $bank_account = $this->cardNumber;
        $bank_account = preg_replace('/[^0-9]+/', '', $bank_account);
        $bank_account = substr($bank_account, 0, 19);
        $length = strlen($bank_account);
        $formatted = "";
        for ($i = 0; $i < $length; $i++) { 
            $formatted .= $bank_account[$i];
            if($i == 3 || $i == 7 || $i == 11){
                $formatted .= " ";
            }
        }
        $this->cardNumber = $formatted;
    }

    
}
