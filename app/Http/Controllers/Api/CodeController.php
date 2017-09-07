<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Code;

class CodeController extends ApiController {

        /**
        * @SWG\Get(
        *     path="/codes",
        *     tags={"Codes"},
        *     description="코드 목록",
        *     operationId="__invoke",
        *     produces={"application/json"},
        *     @SWG\Parameter(name="group",in="query",description="코드 그룹키",required=false,type="string",format="int64"),
        *     @SWG\Response(response=200,description="success",
        *          @SWG\Schema(type="array",@SWG\Items(ref="#/definitions/Code"))
        *     ),
        *     @SWG\Response(response=401, description="unauthorized"),
        *     @SWG\Response(response=500, description="internal server error"),
        *     @SWG\Response(response="default",description="error",
        *          @SWG\Schema(ref="#/definitions/Error")
        *     ),
        *     security={
        *       {"api_key": {}}
        *     }
        * )
        */
        public function __invoke(Request $request) {

                $where = Code::select('id', 'group', 'name');

                if ($request->get('group')) {
                        $where->where("group", $request->get('group'));
                }

                $result = $where->get();
                $return = [];
                foreach ($result as $entry) {
                        $return[] = [
                                'id' => $entry->id,
                                'name' => $entry->name,
                                'group' => $entry->group,
                                'display' => $entry->display(),
                        ];
                }
                return response()->json($return);
        }



}
