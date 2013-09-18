<?php 

/**
 * Handles the email confirmation process
 */
class ConfirmationController extends BaseController
{
    protected $layout = 'layouts.page';

    /**
     * Default home screen
     */
    public function getIndex()
    {
        $this->layout->content = View::make('pages.confirmation');
    }

    /**
     * Login/Register
     */
    public function postIndex()
    {
        $this->layout->content = View::make('pages.confirmation');
    }
}