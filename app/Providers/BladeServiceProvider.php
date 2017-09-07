<?php

/*
 *
 * @Project        zlara
 * @Copyright      leechanrin
 * @Created        2017-04-09 오후 8:53:33
 * @Filename       BladeServiceProvider.php
 * @Description
 *
 */

namespace App\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider {

    // public function boot() {
    //     Blade::directive('latest', function($posts) {
    //         return "<?php foreach({$posts} as {$post}); ?>";
    //     });
    // }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register() {
        //
    }

}
