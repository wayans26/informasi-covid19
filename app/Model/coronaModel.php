<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class coronaModel extends Model
{
    //
    public static function getCoronaIndonesia(){
        try {
            $data = Http::get('https://api.kawalcorona.com/indonesia')->json();
            return json_encode(array(
                'status'    => 1,
                'message'   => 'Berhasil',
                'data'      => array(
                    'name'      => $data[0]['name'],
                    'kasus'     => $data[0]['positif'],
                    'sembuh'    => $data[0]['sembuh'],
                    'meninggal' => $data[0]['meninggal'] 
                )
            ));
        } catch (\Throwable $th) {
            return json_encode(array(
                'status'    => 0,
                'message'   => 'Api Bermasalah'                
            ));
        }        
    }
    public static function getCoronaByProvinsi($codeProvinsi){
        $data = Http::get('https://api.kawalcorona.com/indonesia/provinsi')->json();
        try {
            foreach ($data as $key => $value) {
                if($value['attributes']['Kode_Provi'] === $codeProvinsi){
                    return json_encode(array(
                        'status'    => 1,
                        'message'   => 'ditemukan',
                        'data'      => $value['attributes']
                    ));
                }
            }
        } catch (\Throwable $th) {
            return json_encode(array(
                'status'    => 0,
                'message'   => 'Api Bermasalah'            
            ));
        }
        return json_encode(array(
            'status'    => 0,
            'message'   => 'Tidak ditemukan'            
        ));        
    }
    public static function getCoronaProvinsi(){
        $respon = Http::get('https://api.kawalcorona.com/indonesia/provinsi');
        if($respon->successful()){
            return json_encode(array(
                'status'    => 1,
                'message'   => 'Berhasil',
                'data'      => $respon->json()
            ));
        }        
        else{
            return json_encode(array(
                'status'    => 0,
                'message'   => 'Api Bermasalah'                
            ));
        }
    }
}
