<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback(UserService $userService)
    {
        $facebookUser = Socialite::driver('facebook')->user();

        if (empty($facebookUser->getEmail())) {
            return Socialite::driver('facebook')->reRequest()->redirect();
        }

        $user = $userService->getBySocialUser($facebookUser);

        $loggedInUser = Auth::loginUsingId($user->getId());

        if (!$loggedInUser) {
            throw new Exception('Error logging in');
        }

        return redirect(route('app.dashboard'));
    }
}
