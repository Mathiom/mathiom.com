<?php 
/**
 * Handles the homepage and login and registration process
 */
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
        // Login
        //- - - - - - - - - - - - - - - - - - - - - - - -
        if(Input::get('action') == 'Login'){
            if(!User::login())
                return $this->failed(['login'=>'User/Password combination does not exist']);
            else
                return Redirect::route('dashboard');
        //- - - - - - - - - - - - - - - - - - - - - - - -
        // Register
        //- - - - - - - - - - - - - - - - - - - - - - - -
        } else {
            if(User::whereEmail(Input::get('email'))->first()){
                return $this->failed(['register'=>'This email is already registered, please click login instead.']);
            }
            else
                if(!User::register())
                    return $this->failed(['register'=>'Oops! Something went wrong, please try again!']);
                else
                    return Redirect::route('welcome');
        }
    }
}