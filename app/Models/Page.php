<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends \Backpack\PageManager\app\Models\Page
{

    const URL_PREFIX = 'page/';

    public function getPageLink()
    {
        return url(self::URL_PREFIX . $this->slug);
    }
}
