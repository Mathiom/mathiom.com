<?php //#########################################
// Home Controller
//###############################################

class HomeController extends BaseController
{
    /**
     * Default home screen
     */
    public function getIndex()
    {
        return View::make('pages.home');
    }

    /**
     * Login/Register
     */
    public function postIndex()
    {
        //- - - - - - - - - - - - - - - - - - - - - - - -
        // Validate
        //- - - - - - - - - - - - - - - - - - - - - - - -
        $valid = new Services\Validators\Login();
        if(!$valid->passes())
            return Redirect::back()
                ->withInput(Input::except('password'))
                ->withErrors($valid->errors);

        return 'SUCCESS';
    }
}