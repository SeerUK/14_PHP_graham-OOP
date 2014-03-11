<?php

require_once realpath(dirname(__FILE__)) . "/../../core/Controller/Controller.php";

/**
 * Admin Controller
 */
class AdminController extends Controller
{
    public function homeAction()
    {
        // if ( ! ($this->get('user.context')->isLoggedIn()) {
        //     $this->redirect('404page');
        //     return false;
        // }

        $gateway = $this->get('gateway.image');
        $image   = $gateway->findImage(1);

        echo $image['path'];
    }
}
