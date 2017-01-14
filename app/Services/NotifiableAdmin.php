<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Services;

use Illuminate\Notifications\Notifiable;

/**
 * Description of NotifiableAdmin
 *
 * @author Sherif Medhat <sherif.mohamed.medhat@gmail.com>
 */
class NotifiableAdmin
{

    use Notifiable;

    protected static $instance = null;

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new NotifiableAdmin();
        }

        return self::$instance;
    }

    public function routeNotificationForMail()
    {
        return config('mail.from.address');
    }
}
