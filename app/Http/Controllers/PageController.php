<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function form_page(){
        return view('new_client');
    }

    public function main_page(){
        $cars_arr = [];
        $clients = DB::table('clients')->select('id', 'FIO', 'cars')->get();
        $cars = DB::table('cars')->get();
        foreach ($cars as $car) {
            $cars_arr[$car->car_number] = [
                'mark' => $car->mark,
                'model' => $car->model,
                'color' => $car->color,
            ];
        }

        return view('index', ['clients' => $clients, 'cars' => $cars_arr]);
    }

    public function detail_page(Request $request){
        $client = DB::table('clients')->where('id', $request->id)->first();
        $client_cars = json_decode($client->cars);
        $cars = [];
        foreach($client_cars as $car_number){
            $cars[] = DB::table('cars')->where('car_number', $car_number)->first();

        }

        return view('detail', ['client' => $client, 'cars' => $cars]);
    }
}
