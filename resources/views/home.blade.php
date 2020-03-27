@extends('master')
@section('konten')
@include('componen.datatable')
<style>
    @media only screen and (max-width: 1200px) {
        .addCol {
            display: none;
        }
    }

    @media only screen and (min-width: 1200px) {
        .addCol {
            display: block;
        }
    }

</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header" style="text-align: center;">
                <h4>Informasi Covid19 di Indonesia</h4>
            </div>
            <div class="card-body">
                <div class="row mt-3">
                    <div class="col-12 col-lg-6 col-xl-3">
                        <div class="card gradient-bloody">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <p class="text-white">Total Kasus</p>
                                        <h4 class="text-white line-height-5" id="kasus"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3">
                        <div class="card gradient-bloody">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <p class="text-white">Dalam Perawatan</p>
                                        <h4 class="text-white line-height-5" id="perawatan"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3">
                        <div class="card gradient-bloody">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <p class="text-white">Total Sembuh</p>
                                        <h4 class="text-white line-height-5" id="sembuh"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3">
                        <div class="card gradient-bloody">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <p class="text-white">Total Meninggal</p>
                                        <h4 class="text-white line-height-5" id="meninggal"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-bordered" id="table_provinsi">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Provinsi</th>                                
                                <th scope="col">Kasus</th>
                                <th scope="col">Dalam Perawatan</th>
                                <th scope="col">Sembuh</th>
                                <th scope="col">Meninggal</th>
                            </tr>
                        </thead>
                        <tbody id="dataCorona">
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        getCoronaIndonesia();
        getCoronaProvinsi();
    });

    function getCoronaIndonesia(){
        $.ajax({
            type:"GET",
            url:"/api/indonesia",
            data:{},
            success:function(data){
                let respon = $.parseJSON(data);                
                if(respon.status === 1){
                    $("#kasus").text(respon.data.kasus);
                    $("#sembuh").text(respon.data.sembuh);
                    $("#meninggal").text(respon.data.meninggal);
                    $("#perawatan").text( (parseInt(respon.data.kasus)) - (parseInt(respon.data.meninggal) + parseInt(respon.data.sembuh)));
                }
                else{
                    getCoronaIndonesia();
                }
            },
            error:function(data){
                console.log(data);
            }
        });
    }

    function getCoronaProvinsi(){
        $.ajax({
            type:"GET",
            url:"/api/provinsi",
            data:{},
            success:function(data){
                let respon = $.parseJSON(data);        
                let output = "";
                $.each(respon.data, function(index, item){
                    output += `<tr>
                                <th scope="row">${index+1}</th>
                                <td>${item.attributes.Provinsi}</td>                                
                                <td>${item.attributes.Kasus_Posi}</td>
                                <td>${((parseInt(item.attributes.Kasus_Posi)) - (parseInt(item.attributes.Kasus_Semb) + parseInt(item.attributes.Kasus_Meni)))}</td>
                                <td>${item.attributes.Kasus_Semb}</td>
                                <td>${item.attributes.Kasus_Meni}</td>
                            </tr>`;
                });  
                $("#dataCorona").html(output);   
                $("#table_provinsi").DataTable();   
                //console.log(respon);
            },
            error:function(data){
                console.log(data);
            }
        });
    }
</script>
@endsection
