<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Auth\UserRepository;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;

/**
 * Class ConfirmAccountController.
 */
class ConfirmAccountController extends Controller
{
   /**
    * @var UserRepository
    */
   protected $user;

   /**
    * ConfirmAccountController constructor.
    *
    * @param UserRepository $user
    */
   public function __construct(UserRepository $user)
   {
      $this->user = $user;
   }

   /**
    * @param $token
    *
    * @throws \App\Exceptions\GeneralException
    * @return mixed
    */
   public function confirm($token)
   {
      $this->user->confirm($token);
      session()->flash('flash_success', 'Your registration is complete');
      return redirect()->route('frontend.auth.account.verified')->with('flash_success', 'Your registration is complete');
   }

   /**
    * @param $uuid
    *
    * @throws \App\Exceptions\GeneralException
    * @return mixed
    */
   public function sendConfirmationEmail($uuid)
   {
      $user = $this->user->findByUuid($uuid);

      if ($user->isConfirmed()) {
         return redirect()->route('frontend.auth.login')->withFlashSuccess(__('exceptions.frontend.auth.confirmation.already_confirmed'));
      }

      $user->notify(new UserNeedsConfirmation($user->confirmation_code));

      return redirect()->route('frontend.auth.login')->withFlashSuccess(__('exceptions.frontend.auth.confirmation.resent'));
   }

   public function verified()
   {
      return view('frontend.user.verified');
   }
}
