<?php //#########################################
// Login / Register validation
//###############################################
namespace Services\Validators;

class Login extends Validator {
    public static $rules = [
        'email'     => 'required',
        'password'  => 'required',
        'action'    => 'required|in:Login,Register'
    ];
}