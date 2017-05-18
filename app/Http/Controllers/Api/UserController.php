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
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserController extends Controller {

    use AuthenticatesUsers;

    /**
     * @SWG\Get(path="/login",
     *   tags={"User"},
     *   summary="Logs user into the system",
     *   description="",
     *   operationId="loginUser",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     name="user_id",
     *     in="query",
     *     description="The user name for login",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     name="password",
     *     in="query",
     *     description="The password for login in clear text",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="successful operation",
     *     @SWG\Schema(type="string"),
     *     @SWG\Header(
     *       header="X-Rate-Limit",
     *       type="integer",
     *       format="int32",
     *       description="calls per hour allowed by the user"
     *     ),
     *     @SWG\Header(
     *       header="X-Expires-After",
     *       type="string",
     *       format="date-time",
     *       description="date in UTC when token expires"
     *     )
     *   ),
     *   @SWG\Response(response=400, description="Invalid username/password supplied")
     * )
     */
    public function loginUser(Request $request) {

        if (Auth::check(['email' => $request->email, 'password' => $request->password])) {
            //$user = Student::where('email',$request->email)->first();
            $user = Auth::user();
            $user->api_token = str_random(60);
            $user->save();
            return response([
                'status' => Response::HTTP_OK,
                'response_time' => microtime(true) - LARAVEL_START,
                'user' => $user
                    ], Response::HTTP_OK);
        }

        return response([
            'status' => Response::HTTP_BAD_REQUEST,
            'response_time' => microtime(true) - LARAVEL_START,
            'error' => 'Wrong email or password',
            'request' => $request->all()
                ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request) {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request) {
        return $this->guard()->attempt(
                        $this->credentials($request), $request->has('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request) {
        return $request->only($this->username(), 'password');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request) {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
                ? : redirect()->intended($this->redirectPath());
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user8
     * @return mixed
     */
    protected function authenticated(Request $request, $user) {
        //
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request) {
        $errors = [$this->username() => trans('auth.failed')];

        return response()->json($errors, 422);
    }

    /**
     * @SWG\Post(path="/logout",
     *   tags={"User"},
     *   summary="Logs out current logged in user session",
     *   description="",
     *   operationId="logoutUser",
     *   produces={"application/xml", "application/json"},
     *   parameters={},
     *   @SWG\Response(response="default", description="successful")
     * )
     */
    public function logoutUser(Request $request) {
        $this->guard()->logout();

        $request->session()->flush();
        $request->session()->regenerate();

        return;
    }

    /**
     * @SWG\Get(path="/user/{user_id}",
     *   tags={"User"},
     *   summary="Get user by user id",
     *   description="",
     *   operationId="getUser",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     name="user_id",
     *     in="path",
     *     description="User id. ",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response=200, description="successful", @SWG\Schema(ref="#/definitions/User")),
     *   @SWG\Response(response=400, description="Invalid user id supplied"),
     *   @SWG\Response(response=404, description="User not found")
     * )
     */
    public function getUser($user_id) {
        return User::findOrFail($user_id);
    }

    /**
     * @SWG\Put(path="/user/{user_id}",
     *   tags={"User"},
     *   summary="Updated user",
     *   description="This can only be done by the logged in user.",
     *   operationId="updateUser",
     *   produces={"application/xml", "application/json"},
     *   @SWG\Parameter(
     *     name="username",
     *     in="path",
     *     description="name that need to be updated",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     in="body",
     *     name="user",
     *     description="Updated user object",
     *     required=true,
     *     @SWG\Schema(ref="#/definitions/User")
     *   ),
     *   @SWG\Response(response=400, description="Invalid user supplied"),
     *   @SWG\Response(response=404, description="User not found")
     * )
     */
    public function updateUser(Request $request, $user_id) {

        $user = App\Models\User::find($user_id);

        if ($user) {
            $user->update($request->all());
        }

        return;
    }

}
