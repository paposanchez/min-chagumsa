<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Models\User;
use App\Models\Code;
use DB;
use Hash;
use Image;
use Carbon\Carbon;
use Laracasts\Flash\Flash;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class DashboardController extends Controller {

    /**
     * @SWG\Swagger(
     *     schemes={"http","https"},
     *     basePath="/",
     *     @SWG\Info(
     *         version="1.0.0",
     *         title="This is my website cool API",
     *         description="Api description...",
     *         termsOfService="",
     *         @SWG\Contact(
     *             email="contact@mysite.com"
     *         ),
     *         @SWG\License(
     *             name="Private License",
     *             url="URL to the license"
     *         )
     *     ),
     *     @SWG\ExternalDocumentation(
     *         description="Find out more about my website",
     *         url="http..."
     *     )
     * )
     */
    public function __invoke() {
        return response()->json([
                    "SERVICE" => config('app.domain'),
                    "VERSION" => config('api.VERSION'),
        ]);
    }

}
