@extends('layouts.app')

@section('content')

<div class="container">
    <div class="d-flex" style="justify-content: space-between">
        <a href="{{route('index')}}" class="mt-3" style="text-decoration: none; color: black">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <img src="{{asset('assets/images/logo_palestine_day.png')}}" alt="logo_palestineday" width="50px" height="50px" >
    </div>

    <div class="container">
        <div class="center alert alert-success alert-block">	
            <strong>Data telah tersimpan</strong>
        </div>
        <p class="text-justify mb-1" > Bismillah .. <br><br>Terimakasih Ayah/Bunda <strong> {{$donatur->nama_ortu}} </strong> sudah berkenan berdonasi untuk Palestine Day 2025 sebesar Rp. {{number_format($donatur->nominal_donasi)}}. Tinggal selangkah lagi yang perlu Ayah/Bunda lakukan.🙏😊 
        </p>
        <div class="center no_rekening">
            <span style="font-size: 14px"> Donasi ditransfer melalui rekening berikut : </span>
            <img src="{{asset('assets/images/logo_bsi.png')}}" alt="logo_bsi" width="45%" >
            <h1 class="mt-3" id="no_rek_sederec">7500500063 <button style="border: none" id="copy_rek"> <i  class="fa solid fa-copy" onclick="copy_rek()" title="salin"> </i></button> </h1>
            <p> Atas Nama <b><i> Sedekah Recehan </i></b> 
            </p>
        </div>

        <p class="mt-3 text-justify">Semoga Allah SWT senantiasa memberikan kelancaran aktivitas untuk Ayah Bunda <strong> {{$donatur->nama_ortu}} </strong> Sekeluarga.<br>Aamiin Ya Allah Ya Rabbal’Alamin 🤲🤲🤲 <br>
<b>Palestine Day 2025</b>
<i>Menyalakan Cinta Palestina dalam Karya</i>
        </p>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

        function copy_rek () {
            var copyText = document.getElementById("no_rek_sederec");
            var textArea = document.createElement("textarea");
            textArea.value = copyText.textContent;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand("Copy");
            alert("No rekening berhasil disalin");
            textArea.remove();
        }

</script>

@endsection