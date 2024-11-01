@extends('layouts.app')

@section('content')

<div class="container">
        <div class="d-flex" style="justify-content: space-between"> 
            <img src="{{asset('assets/images/logo_palestineday.png')}}" alt="logo_palestineday" width="50px" height="50px" >
            <div class="title">
                <span style="font-size: 13px"> Formulir Donasi Khusus </span>
                <h3 style="font-size: 20px"> Palestine Day 2025 </h3>
            </div>
            <img src="{{asset('assets/images/logo_donationbox.png')}}" alt="logo_donation" width="50px" height="50px" >
        </div>
</div>

<div class="banner">
    <img src="{{asset('assets/images/banner-1.png')}}" alt="banner-1" width="100%" >
</div>

<div class="container">
    <form action="{{route('simpan_donasi')}}" method="POST" id="simpan_donasi" >
        @csrf
        <div class="sub-title">
            <h6> Lengkapi data diri </h6>

            <div class="form-group mt-2">
                <input class="form-control" id="nama_ortu" name="nama_ortu" placeholder="Nama Lengkap Orang Tua (wajib diisi)" required>
                <span type="hidden" style="font-size: 10px; color: red" id="alertnama"> </span>
            </div>
        
            <div class="form-group mt-2">
                <input class="form-control" id="no_hp" name="no_hp" type="tel" minlength="10" maxlength="13" placeholder="Masukkan No Whatsapp" onkeypress="return /[0-9]/i.test(event.key)" required>
                <span type="hidden" style="font-size: 10px; color: red" id="alertnohp"> </span>

            </div>
        
            <div class="form-group mt-2">
                <select id="nama_siswa" name="nama_siswa" class="select2 form-control px-3" required>
                    <option value="" disabled selected>-- Pilih Nama Siswa--</option>
                    @foreach ($nama_siswa as $item)
                        <option value="{{ $item->nama_anak }}" >{{ $item->lokasi }} - {{ $item->nama_anak }} </option>
                    @endforeach
                </select>
                <span type="hidden" style="font-size: 10px; color: red" id="alertnama_siswa"> </span>

            </div>
        </div>

        <div class="sub-title mt-3">
            <h6> Donasi </h6>
            
            <div class="input-group mt-2">
                <input type="text" class="form-control-group" id="nominal" name="nominal" placeholder="Nominal Donasi"  onkeyup="cekNominal()" aria-label="Nominal Donasi" aria-describedby="button-nominal" required>
                <button class="btn btn-nominal" type="button" id="button-nominal" data-bs-toggle="modal" data-bs-target="#opsi_nominal">Lainnya</button>    
            </div>
            <span type="hidden" style="font-size: 10px; color: red" id="alertnom"> </span>
        
            <div class="form-group mt-2">
                <input class="form-control" id="doa" name="doa" placeholder="Pesan / Doa untuk Palestina (Optional)">
            </div>
        
        </div>
    </form>

    <div class="form-check mt-3">
        <input class="form-check-input" type="checkbox" value="" id="check_setuju" onclick="oncheck()">
        <label class="form-check-label" for="check_setuju" style="font-size: 10px">
            <i>
            Saya dengan ini menyatakan bahwa donasi yang saya berikan adalah ikhlas untuk mendukung kegiatan <b> Palestine Day 2025.</b> <br><br>

            Saya setuju bahwa data yang saya berikan dalam formulir ini akan diproses sesuai dengan ketentuan sekolah untuk keperluan pengelolaan donasi acara <b>Palestine Day.</b>
            </i>
        </label>
    </div>

    <div class="center mt-3">
        <button type="button" id="btn_simpan" class="btn btn-simpan" style="width: 85%" disabled> Simpan </button>

        <div class="support mt-4">
            <i style="font-size: 9px"> Supported by: &nbsp;</i>
            <img src="{{asset('assets/images/logo_supported.png')}}" alt="supported" width="30%" >
        </div>
    </div>
</div>

<div class="modal fade" id="opsi_nominal" tabindex="-1" role="dialog" aria-labelledby="nominal_opsi" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Silahkan pilih nominal donasi anda</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach ($opsi_nominal as $item)
                        <div class="col-6 mt-3 center">
                            <button class="btn btn-simpan" style="font-size: large; width: 75%;" value="{{$item->nilai}}" onclick="clickNominal({{$item->nilai}})"><strong> {{$item->nilai_nominal}} </strong></button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
<script>


    function thousandSeparated(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    var citiTimer;
    function cekNominal() {
    clearTimeout(citiTimer);
        citiTimer = setTimeout(() => {
            var nominal = $("#nominal").val();
            
            nominal = parseInt(nominal.replace(/,/g, ""));
            
            $("#nominal").val(thousandSeparated(nominal));
            
        }, 1000);
    }

    function clickNominal(nominal) {
        $("#nominal").val(thousandSeparated(nominal));
        $("#opsi_nominal").modal("hide");
    }

    function oncheck() {
        var status_check = $('#check_setuju').prop('checked')

        if (status_check == true) {
            $('#btn_simpan').prop("disabled", false);
        } else {
            $('#btn_simpan').prop("disabled", true);
        }
    }



    $(document).ready(function() {
        $('#nama_siswa').select2();


        $("#btn_simpan").click(function() {

            var nama_ortu = $('#nama_ortu').val();
            var nama_siswa = $('#nama_siswa').val();
            var no_hp = $('#no_hp').val();
            var nominal = $('#nominal').val();

            if (nama_ortu == '' ) {
                $("#alertnama").html("Nama tidak boleh kosong");
            } else if (no_hp == '' ) {
                $("#alertnohp").html("No HP tidak boleh kosong");
                $('#alertnama').hide()
            } else if (nama_siswa == null ) {
                $("#alertnama_siswa").html("Nama Siswa tidak boleh kosong");
                $("#alertnohp").hide()
            } else  if (nominal == '' ) {
                $("#alertnom").html("Nominal tidak boleh kosong");
            } else {

                // disable button
                $(this).prop("disabled", true);
                // add spinner to button
                $(this).html(
                    `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );
                $("#simpan_donasi").submit();
            }

        });

    });


    
</script>

@endsection