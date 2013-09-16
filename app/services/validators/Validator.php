<?php //#########################################
// Abstract Validator class
//###############################################
namespace Services\Validators;

abstract class Validator{
    protected $validate;
    public $errors;

    /**
     * Setup the attributes
     * @param [ARR] $validate Items to validate
     */
    public function __construct($validate = null)
    {
        $this->validate = $validate ?: \Input::all();
    }


    /**
     * Check if the validation passes against the given rules
     * @return [BOOL]
     */
    public function passes()
    {
        $validation = \Validator::make($this->validate, static::$rules);
        if($validation->passes()) return true;

        $this->errors = $validation->messages();
        return false;
    }
}