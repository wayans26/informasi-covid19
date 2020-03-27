<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\coronaModel;

class coronaController extends Controller
{
    //
    function index(){
        // $indonesia = coronaModel::getCoronaIndonesia();
        // $provinsi = coronaModel::getCoronaProvinsi();        
        return view('home');
    }

    function getDataIndonesia(){
        return coronaModel::getCoronaIndonesia();
    }

    function getDataProvinsi(){
        return coronaModel::getCoronaProvinsi();
    }
}
