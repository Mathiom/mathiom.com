<?php //#########################################
// Home Controller
//###############################################

class HomeController extends BaseController
{
    protected $layout = 'layouts.page';

    /**
     * Default home screen
     */
    public function getIndex()
    {
        $this->layout->content = View::make('pages.home');
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
            return $this->failed($valid->errors);


        //- - - - - - - - - - - - - - - - - - - - - - - -
        // Authenticate
        //- - - - - - - - - - - - - - - - - - - - - - - -
        if(Input::get('action') == 'Login'){
            if(!User::login())
                return $this->failed(['login'=>'User/Password combination does not exist']);
            else
                return Redirect::route('dashboard');
        } else {
            return 'Registering';
        }
    }
}