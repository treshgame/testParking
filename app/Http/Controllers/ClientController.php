<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{

    public function new_client(Request $req){
        $cars = [];
        $cars[] = $req->{'car_number'};
        DB::table('cars')->insert([
            'mark' => $req->{'mark'},
            'model' => $req->{'model'},
            'color' => $req->{'color'},
            'car_number' => $req->{'car_number'},
            'on_parking' => $req->{'park_state'}
        ]);

        
        DB::table('clients')->insert([
            'FIO' => $req->name, 
            'sex' => $req->sex, 
            'phone_num' => $req->phone, 
            'adress' => $req->adress,
            'cars' => json_encode($cars)
        ]);

        return redirect('/newclient');
    }

    public function update_user(Request $req){
        $user_id = $req->user_id;
        $FIO = $req->name;
        $sex = $req->sex;
        $phone = $req->phone;
        $adress = $req->adress;
        
        DB::table('clients')-where('id', $user_id)->update([
            'FIO' => $FIO,
            'sex' => $sex,
            'phone_num' => $phone,
            'adress' => $adress
        ]);

        return redirect("/client_detail?id=$user_id");
    }

    public function update_car(Request $req){
        $car_numbers = [];
        $cars_amount = ++$req->cars_amount;
        $user_id = $req->user_id;
        for($i = 1; $i <= $cars_amount; $i++){
            $mark = $req->{"mark_$i"};
            $model = $req->{"model_$i"};
            $color = $req->{"color_$i"};
            $car_number = $req->{"car_number_$i"};
            $park_state = $req->{"park_state_$i"};

            echo "$mark $model $color $car_number";
            
            if((trim($mark) != "" && trim($model) != "") && (trim($color) != "" && trim($car_number) != "")){
                echo "Зашёл";
                $car_in_db = DB::table("cars")->where('car_number', $car_number)->first();
                if(isset($car_in_db)){
                    DB::table('cars')->where('car_number', $car_number)->update([
                        'mark' => $mark,
                        'model' => $model,
                        'color' => $color,
                        'on_parking' => $park_state
                    ]);
                }else{
                    DB::table('cars')->insert([
                        'mark' => $mark,
                        'model' => $model,
                        'color' => $color,
                        'car_number' => $car_number,
                        'on_parking' => $park_state
                    ]);
                }
                $car_numbers[] = $car_number;
            }
        }
        $new_cars_json = json_encode($car_numbers);
        DB::table('clients')->where('id', $user_id)->update(['cars' => $new_cars_json]);
        return redirect("/client_detail?id=$user_id");
    }

    public function delete_car(Request $req){
        $car_number = $req->number;
        $user_id = $req->user_id;

        DB::table('cars')->where('car_number', $car_number)->delete();
        $user_cars_obj = DB::table('clients')->where('id', $user_id)->select('cars')->first();
        $user_cars_arr = json_decode($user_cars_obj->cars);
        $car_index = array_search($car_number, $user_cars_arr);
        unset($user_cars_arr[$car_index]);
        if(empty($user_cars_arr)){
            DB::table('clients')->where('id', $user_id)->delete();
        }else{
            DB::table('clients')->where('id', $user_id)->update(['cars' => json_encode($user_cars_arr)]);
        }

        return redirect('/');
    }
}
