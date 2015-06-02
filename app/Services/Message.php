<?php namespace App\Services;

use Session;

class Message
{
    /**
     * Add success message
     *
     * @param $message
     */
    public function success($message)
    {
        Session::flash('message', $message);
        Session::flash('alert-class', 'alert-success');
    }

    /**
     * Add danger message
     *
     * @param $message
     */
    public function danger($message)
    {
        Session::flash('message', $message);
        Session::flash('alert-class', 'alert-danger');
    }
}