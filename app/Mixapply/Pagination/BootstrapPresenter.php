<?php

namespace App\Mixapply\Pagination;

use Illuminate\Pagination\BootstrapFourPresenter;

class BootstrapPresenter extends BootstrapFourPresenter {

    use \Illuminate\Pagination\BootstrapThreeNextPreviousButtonRendererTrait;

    public function getPreviousButton($text = '<i class="fa fa-angle-left"></i>') {
        return parent::getPreviousButton($text);
    }

    public function getNextButton($text = '<i class="fa fa-angle-right"></i>') {
        return parent::getNextButton($text);
    }

}
