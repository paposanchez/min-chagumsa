<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\Models;
use App\Models\Detail;
use App\Models\Grade;

class CarPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *SELECT
    cargumsa4.brands.`name` AS brands_name,
    cargumsa4.brands.car_type AS brands_car_type,
    cargumsa4.brands.id AS brands_id,
    cargumsa4.models.`name` AS models_name,
    cargumsa4.models.id AS models_id,
    cargumsa4.details.id AS details_id,
    cargumsa4.details.`name` AS details_name,
    cargumsa4.grades.id AS grades_id,
    cargumsa4.grades.`name` AS grades_name,
    cargumsa4.grades.items_id AS items_id
    FROM
    cargumsa4.brands
    JOIN cargumsa4.models ON cargumsa4.brands.id = cargumsa4.models.brands_id
    JOIN cargumsa4.details ON cargumsa4.models.id = cargumsa4.details.models_id
    JOIN cargumsa4.grades ON cargumsa4.details.id = cargumsa4.grades.details_id
    WHERE
    brands.name = '미쯔오카'
    AND models.name = '누에라'
    AND details.name = '누에라'
    AND grades.name = '2.0 세단'
     * @return void
     */
    public function run()
    {
        //
        $csv = file_get_contents(storage_path() . '/logs/model_price.csv');
        $csv_list = str_getcsv($csv, "\n");

        $deploy_result = []; //결과 리스트

        foreach($csv_list as $key => $csv_row){
            $row = str_getcsv($csv_row);
            $brand = $row[0];
            $model = $row[1];
            $detail = $row[2];
            $grade = $row[3];
            $item_id = $row[5];



            try {
                $qry = DB::table('brands')->where('brands.name', $brand)->join('models', function ($model_qry) use ($model, $detail, $grade, $item_id) {

                    $model_qry->on('brands.id', 'models.brands_id')->where('models.name', $model);

                });

                $qry = $qry->join('details', function ($detail_qry) use ($detail, $grade, $item_id) {

                    $detail_qry->on('models.id', 'details.models_id')->where('details.name', $detail);
                });

                $qry = $qry->join('grades', function ($grade_qry) use ($grade, $item_id) {

                    $grade_qry->on('details.id', 'grades.details_id')->where('grades.name', $grade);
                });
                //            dd($qry->toSql());

                if($item_id != 5){
                    $qry->update(['items_id' => $item_id]);
                }


                $grade_row = $qry->first();

                try{
                    $result_list = [
                        $brand, $model, $detail, $grade, $item_id, $grade_row->id, $grade_row->details_id, $grade_row->models_id, $grade_row->brands_id, 'OK'
                    ];
                }catch (\Exception $e){
                    $result_list = [
                        $brand, $model, $detail, $grade, $item_id, "", "", "", "", 'NOT'
                    ];
                }


                $deploy_result[] = $result_list;
            }catch (\Exception $e){
                echo "Exception::::";
                echo $e->getMessage();
                echo PHP_EOL;
                echo $e->getLine();
                echo PHP_EOL;
                echo $e->getCode();
                $result_list = [
                    $brand, $model, $detail, $grade, $item_id, "", "", "", "", 'FAIL'
                ];
            }
//            sleep(0.01);

//            if($key == 2){
//                break;
//            }

        }

//        $out = fopen(storage_path() . '/logs/price_result.csv', 'w');
        $result = "";
        foreach ($deploy_result as $d){
            $result .= implode(",", $d)."\n";
        }
        file_put_contents(storage_path() . '/logs/price_result.csv', $result);
    }
}
