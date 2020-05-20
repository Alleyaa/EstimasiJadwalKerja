@extends('layout.app')

@section('content')
<div class="jumbotron container-md " style="margin-top: 1cm">
    <h1 class="display-3" style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif"><strong> Selamat Datang!</strong></h1>
    <p class="lead">Disini kamu dapat melihat estimasi durasi waktu kerja kamu dengan menginputkan jam mulai kerja dan jam berakhir kerja</p>
    <hr class="my-4">
    <div class="container row">
        <nav class="col" style="box-align: left">
            <label for="appt" style=" font-size: 16pt" >Masukan Tanggal Kerja :</label>
            <input type="date" id="tgl" name="appt-Keluar" class="form-control h3" style="width: 5cm ">

            <label for="appt" style="font-size: 16pt; margin-top: 0.5cm">Masukan Waktu Mulai Kerja :</label>
            <input type="time" id="masuk" name="appt-masuk" class="form-control h3" style="width: 4cm ">
            
            <label for="appt" style="margin-top: 0.5cm; font-size: 16pt">Masukan Waktu Selesai Kerja :</label>
            <input type="time" id="keluar" name="appt-Keluar" class="form-control h3" style="width: 4cm ">
            
            <label for="appt" style="margin-top: 0.5cm; font-size: 16pt">Masukan Tugas yang Dikerjakan :</label>
            <textarea class="form-control" id="tugas" rows="3"></textarea>

            <label for="appt" style="margin-top: 0.5cm; font-size: 16pt">Masukan Kendala Selama Kerja :</label>
            <textarea class="form-control" id="kendala" rows="3"></textarea>

            <input type="button" value="submit" onclick="calcu()" class="btn btn-primary btn-lg" style="margin-top: 0.5cm">

            
        </nav>
        <nav  style="box-align: right" class="col">
            <p style="font-size: 16pt">
                <p id="antar" class="text-success"style="font-size: 16pt" ></p>
                <p id="DOME" class="text-success"style="font-size: 16pt"></p>
                <p id="desk" class="text-success"style="font-size: 16pt"></p>
                <p id="ken" class="text-success"style="font-size: 16pt"></p>
                <nav class="blockquote">
                    <hr class="my-4">
                    <nav class="mb-0" style="font-family: serif">
                        “Time is an equal opportunity employer. Each human being has exactly the same number
                         of hours and minutes every day. Rich people can't buy more hours. Scientists can't invent new minutes.
                          And you can't save time to spend it on another day. Even so, time is amazingly fair and forgiving. No 
                          matter how much time you've wasted in the past, you still have an entire tomorrow.”
                    </nav>
                    <footer class="blockquote-footer"> <cite title="Source Title">Denis Waitley</cite></footer>
                </nav>
            </p>
            
        </nav>
        
    </div>
  </div>
  <script> 
    
    function timeStringToFloat(time) {
        var hoursMinutes = time.split(/[.:]/);
        var hours = parseInt(hoursMinutes[0], 10);
        var minutes = hoursMinutes[1] ? parseInt(hoursMinutes[1], 10) : 0;
        return hours + minutes / 60;
    }
    function calcu(){
        var mulaiBef =document.getElementById("masuk").value;
        var akhirBef =document.getElementById("keluar").value;
        var tanggal = document.getElementById("tgl").value;
        var dectug = document.getElementById("tugas").value;
        var kendal = document.getElementById("kendala").value;

        var mulai = timeStringToFloat(mulaiBef);
        var akhir = timeStringToFloat(akhirBef);
        var hitung = akhir-mulai;
        var jam;
        if ((mulaiBef < "12:00" && akhirBef>"13:00")&& akhirBef<"16:00"){
            hitung= hitung-1;
        }
        if ((mulaiBef < "12:00" && akhirBef>"17:00")&& akhirBef<"18:00"){
            hitung = hitung -2;
        }
        if ((mulaiBef < "12:00" && akhirBef>"19:00")){
            hitung=hitung-3
        }
        if ((mulaiBef>="13:00" && akhirBef > "17:00")&&akhirBef<"18:00"){
            hitung = hitung -1;
        }
        if ((mulaiBef >= "13:00" && akhirBef>"19:00")){
            hitung=hitung-2;
        }
        if ((mulaiBef >= "17:00" && akhirBef>"19:00")){
            hitung = hitung -1;
        }
        
        var decimalTimeString=hitung;
        var decimalTine = parseFloat(decimalTimeString);
        decimalTine = decimalTine * 60 * 60;
        var hour = Math.floor((decimalTine/(60*60)));
        decimalTine=decimalTine - (hour*60*60);
        var minutes = Math.floor((decimalTine/60));
        jam = (hour + " Jam "+minutes +" Menit") ;
        var masukan = document.getElementById("DOME");
        document.getElementById("antar").innerHTML ="Estimasi lama waktu kerja pada tanggal "+tanggal+" adalah selama : " + jam;
        document.getElementById("desk").innerHTML ="Tugas yang dikerjakan : "+dectug;
        document.getElementById("ken").innerHTML ="Kendala yang dirakasan : "+kendal;
    }
</script>
@endsection