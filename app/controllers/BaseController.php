<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

    /**
     * Redirects back with an error message
     * @param  [OBJ\ARR] $errorMsg 	    OBJ: An \Illuminate\Support\MessageBag object
     *                                  ARR: An array of key/value pairs, to be converted to a MessageBag
     */
    protected function failed($errorMsg = [])
    {
        if(is_array($errorMsg)) $errorMsg = new \Illuminate\Support\MessageBag($errorMsg);

        return Redirect::back()
            ->withInput(Input::except('password'))
            ->withErrors($errorMsg);
    }
}