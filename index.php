<?php

require('koneksi.php');

$xy = mysqli_query($koneksi, "select * from `variabel`");
if(isset($_POST['submit'])){
  if($_POST['xpredik'] !== ''){
  $xpredik = $_POST['xpredik'];
  } else {
  $xpredik = 0;
  }
}else {
  $xpredik = 0;
}

$jum = mysqli_num_rows($xy);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/jqueryui.js"></script>
    <title>Regresi Linear dengan PHP</title>
    <style>
    span {
      width :-moz-available;
    }
    .card:hover{
        border : 3px solid blue;
        cursor : pointer;
    }
    .card {
      background-color: #fff !important;
      box-shadow : 0px 4px 8px blue;
    }

    #show{
      position : fixed;
      display: block;
      top : 50%;
      left : 1%;
      box-shadow : 0px 4px 8px black;
    }

    #reload{
      position : fixed;
      display: block;
      top : 60%;
      left : 1%;
      box-shadow : 0px 4px 8px black;
    }
    #btn_prediksi{
      position : fixed;
      display: block;
      top : 70%;
      left : 1%;
      box-shadow : 0px 4px 8px black;
    }

    #btnupload{
      position : fixed;
      display: block;
      top : 80%;
      left : 1%;
      box-shadow : 0px 4px 8px black;
    }

    .range{
      position : fixed;
      display: block;
      top : 40%;
      left : 1%;
      box-shadow : 0px 4px 8px black;
    }

    body{
      background : #eee;
    }

    </style>
    <link rel="stylesheet" href="css/jqueryui.css">
      <script src="js/jquery.js"></script>
    <script src="js/jqueryui.js"></script>
<script>
  $( function() {
    $( ".draggable" ).draggable().resizable();
  } );
  
  </script>
</head>
<body>
    <div class="container">

    <div class="row p-5">
  <div class="col-md-4 mb-2">
    <div class="card shadow draggable" id="start">
      <div class="card-title bg-success p-3 text-white">
        Umur (X) 
      </div>
      <div class="card-body d-flex h-100 ">

      <span class="justify-content-center align-self-center pl-3 draggable"> 
      <table class="table table-hover table-stripped">
      <tr>
      <th>No.</th>
      <th>Umur</th>
      </tr>
      <?php
        $no = 1;
        $jumlahx =0;
       foreach($xy as $x){
         $jumx = $x['x'];
         $jumlahx += $jumx;
         echo '<tr>';
         echo '<td>'.$no++.'</td>';
         echo '<td>'.$jumx.'</td>';
         echo '</tr>';
       }
       echo '</table>';
       echo '<hr>';
       echo '<b> &sum;X = '.$jumlahx.'</b>';
      ?>
      </table>
      </span>
      </div>
    </div>
  </div>
<div class="col-md-4 mb-2"></div>

  <div class="col-md-4 mb-2 ">
    <div class="card shadow draggable" id="start1">
      <div class="card-title bg-primary p-3 text-white">
        Glukosa (Y) 
      </div>
      <div class="card-body d-flex h-100">

      <span class="justify-content-center align-self-center pl-3">
      <table class="table table-hover table-stripped">
      <tr>
      <th>No.</th>
      <th>Glukosa (Y)</th>
      </tr>
      <?php
        $no = 1;
        $jumlahy = 0;
       foreach($xy as $y){
         $jumy = $y['y'];
         $jumlahy += $jumy;
         echo '<tr>';
         echo '<td>'.$no++.'</td>';
         echo '<td>'.$jumy.'</td>';
         echo '</tr>';
       }
       echo '</table>';
       echo '<hr>';
       echo '<b> &sum;Y = '.$jumlahy.'</b>';
      ?>
      </span>
      </div>
    </div>
  </div>
  <!-- row -->
</div>

<div class="row p-5">
<div class="col-md-4 mb-2"></div>
  <div class="col-md-4 mb-2 ">
    <div class="card shadow draggable" id="start2">
      <div class="card-title bg-primary p-3 text-white">
        Variabel XY 
      </div>
      <div class="card-body d-flex h-100">

      <span class="justify-content-center align-self-center pl-3">
      <table class="table table-hover table-stripped">
      <tr>
      <th>No.</th>
      <th>XY</th>
      </tr>
      <?php
        $no = 1;
        $jumlahxy = 0;
       foreach($xy as $xkaliy){
         $jumxkaliy = $xkaliy['x']*$xkaliy['y'];
         $jumlahxy += $jumxkaliy;
         echo '<tr>';
         echo '<td>'.$no++.'</td>';
         echo '<td>'.$jumxkaliy.'</td>';
         echo '</tr>';
       }
       echo '</table>';
       echo '<hr>';
       echo '<b> &sum;XY = '.$jumlahxy.'</b>';
      ?>
      </span>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-2"></div>
</div>



<div class="row p-5">
  <div class="col-md-4 mb-2">
    <div class="card shadow draggable" id="start3" >
      <div class="card-title bg-success p-3 text-white">
        Variabel X<sup>2</sup> 
      </div>
      <div class="card-body d-flex h-100">

      <span class="justify-content-center align-self-center pl-3"> 
      <table class="table table-hover table-stripped">
      <tr>
      <th>No.</th>
      <th>X<sup>2</sup></th>
      </tr>
      <?php
        $no = 1;
        $jumlahx2 = 0;
       foreach($xy as $x2){
         $jumx2 = $x2["x"]*$x2["x"];
         $jumlahx2 += $jumx2;
         echo '<tr>';
         echo '<td>'.$no++.'</td>';
         echo '<td>'.$jumx2.'</td>';
         echo '</tr>';
       }
       echo '</table>';
       echo '<hr>';
       echo '<b> &sum;X<sup>2</sup> = '.$jumlahx2.'</b>';
      ?>

      </span>
      </div>
    </div>
  </div>
<div class="col-md-4">
<span class="align-middle pt-5 pl-5">
</span>
</div>
  <div class="col-md-4 mb-2 ">
    <div class="card shadow draggable" id="start4">
      <div class="card-title bg-primary p-3 text-white">
        Variabel Y<sup>2</sup>
      </div>
      <div class="card-body d-flex h-100">

      <span class="justify-content-center align-self-center pl-3">
      <table class="table table-hover table-stripped">
      <tr>
      <th>No.</th>
      <th>Y<sup>2</sup></th>
      </tr>
      <?php
        $no = 1;
        $jumlahy2= 0;
       foreach($xy as $y2){
         $jumy2 = $y2['y']*$y2['y'];
         $jumlahy2 += $jumy2;
         echo '<tr>';
         echo '<td>'.$no++.'</td>';
         echo '<td>'.$jumy2.'</td>';
         echo '</tr>';
       }
       echo '</table>';
       echo '<hr>';
       echo '<b>&sum;Y<sup>2</sup> = '.$jumlahy2.'</b>';
      ?>
      </span>
      </div>
    </div>
  </div>
  <!-- row -->
</div>
<div class="row p-5"></div>

    
<div class="row p-5"></div>
<div class="row p-5 mt-5">
  <div class="col-md-4 mb-2 ">
    <div class="card shadow draggable" id="start5">
      <div class="card-title bg-primary p-3 text-white">
        Konstanta A
      </div>
      <div class="card-body d-flex h-100">

      <span class="justify-content-center align-self-center pl-3"> a =  <u>(Σy) (Σx²) – (Σx) (Σxy)</u> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;n(Σx²) – (Σx)²<br>
      <br>
      <?php
      $konst_a = 0;
      echo 'a = <u>('.$jumlahy.')&times;('.$jumlahx2.') - ('.$jumlahx.') &times; ('.$jumlahxy.')</u><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
      echo '('.$jum.'&times;'.$jumlahx2.') - ('.$jumlahx.')<sup>2</sup><br>';
      if($jumlahxy !== 0  ){
        $konst_a = (($jumlahy*$jumlahx2)-($jumlahx*$jumlahxy))/(($jum*$jumlahx2)-($jumlahx*$jumlahx));
        echo '<br>a ='.$konst_a;
      }else {
        echo '<br>a = 0';
      }
       ?>
      </span>
      </div>
    </div>
  </div>

  <div class="col-md-4"></div>

  <div class="col-md-4 mb-2 ">
    <div class="card shadow draggable" id="start6">
      <div class="card-title bg-primary p-3 text-white">
        Koefisien B
      </div>
      <div class="card-body d-flex h-100">

      <span class="justify-content-center align-self-center pl-3"> b =   <u>n(Σxy) – (Σx) (Σy)</u> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      n(Σx²) – (Σx)²<br>
      <br>
      <?php
        echo 'b = <u>('.$jum.')&times;('.$jumlahxy.') - ('.$jumlahx.') &times; ('.$jumlahxy.')</u><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo '('.$jum.'&times;'.$jumlahx2.') - ('.$jumlahx.')<sup>2</sup><br>';
        if($jumlahxy !== 0){
        $koefis_b = (($jum*$jumlahxy)-($jumlahx*$jumlahy))/ (($jum*$jumlahx2)-($jumlahx*$jumlahx));
        echo '<br>b ='.$koefis_b;
        }else{
          echo '<br>b = 0';
        }
      ?>
      </span>
      </div>
    </div>
  </div>
  <!-- row -->
</div>

<div class="row p-5">
<di class="col-md-4"></di>
<div class="col-md-4 mb-2 ">
    <div class="card shadow draggable" id="start7">
      <div class="card-title bg-primary p-3 text-white">
        Persamaan
      </div>
      <div class="card-body d-flex h-100">

      <span class="justify-content-center align-self-center pl-3">Y = a + bX<br>
      Y = a + b (<?=$xpredik?>) <br>
    <?php  if($jumlahxy !== 0){ ?>
      Y = <?=$konst_a?> + <?=$koefis_b?> (<?=$xpredik?>)
    <?php  }else{
     echo  'Y = 0 + 0 ('.$xpredik.')';
    } ?>
      </span>
      </div>
    </div>
  </div>
  
<div class="col-md-4"></div>
</div>


<div class="row p-5">
<di class="col-md-4"></di>
<div class="col-md-4 mb-2 ">
    <div class="card shadow draggable" id="start8">
      <div class="card-title bg-primary p-3 text-white">
        Hasil 
      </div>
      <div class="card-body d-flex h-100">

      <span class="justify-content-center align-self-center pl-3">
      <?php
      if($jumlahxy !== 0){
       $prediky = 0;
       $prediky =$konst_a+($koefis_b*$xpredik);
      } else {
        $prediky = 0;
      }
       echo 'Jika X ='.$xpredik.'.';
       echo '<div class="alert alert-success"> Maka Y ='.$prediky.'</div>';
      ?>
      </span>
      </div>
    </div>
  </div>
  </div>
  
  <div class="row p-5">
  <div class="col-md-2 mb-2"></div>
  <div class="col-md-8 mb-2">
  <div class="card shadow draggable" id="start9">
  <div class="card-title bg-primary p-3 text-white">
        Korelasi
      </div>
      <div class="card-body d-flex h-100">
      <span class="justify-content-center align-self-center pl-3">
        <?php
        echo 'r = &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>n∑xy - ∑x∑y</u><br> &nbsp;&nbsp;&nbsp;&nbsp;&radic;((n∑X<sup>2</sup> - (∑x)<sup>2</sup>) . (n∑Y<sup>2</sup> - (∑Y)<sup>2</sup>)) <br><br>';
        echo 'r = &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>('.$jum.'&times;'.$jumlahxy.') - ('.$jumlahx.'&times;'.$jumlahy.')</u><br>';
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&radic;('.$jum.'&times'.$jumlahx2.') - ('.$jumlahx.')<sup>2</sup>&times;('.$jum.'&times'.$jumlahy2.') -'.$jumlahy.')<sup>2</sup><br><br>';
         $korelasi = (($jum*$jumlahxy) -($jumlahx*$jumlahy))/ (sqrt((($jum*$jumlahx2)- pow($jumlahx,2))*(($jum*$jumlahy2)-pow($jumlahy,2))));
        echo 'r = '.$korelasi.'<br><br>';
         if ($korelasi <= 0) {
          $warna = 'secondary';
          echo " Tidak ada korelasi diantar dua variable (0 atau < 0). <br>Faktor usia tidak mempengaruhi gula(glukosa)<br>";
      } else if ($korelasi <= 0.25) {
        $warna = 'secondary';
          echo " Korelasi sangat lemah (>0 - 0,25).<br>Faktor usia jarang mempengaruhi gula(glukosa)<br>";
      } else if ($korelasi <= 0.5) {
        $warna = 'light';
          echo " Korelasi cukup  (>0.25 - 0.5). <br>Faktor usia bisa saja mempengaruhi gula(glukosa)<br>";
      } else if ($korelasi <= 0.75) {
        $warna = 'info';
          echo " Korelasi kuat (>0.5 - 0.75). <br> Faktor usia mempengaruhi gula(glukosa)<br>";
      } else if ($korelasi <= 0.99) {
        $warna = 'success';
          echo " Korelasi sangat kuat (>0.75 - 0.99).<br>Faktor usia sangat mempengaruhi gula(glukosa)<br>";
      } else if ($korelasi <= 1) {
        $warna = 'success';
          echo " Korelasi sempurna (>0.99 - 1).<br>Faktor usia Merupakan faktor utama yang mempengaruhi gula(glukosa)<br>";
      }
         echo '<div class="alert alert-'.$warna.'">'.$korelasi.'</div> <br>';
        ?>
      </span>
      </div>
  </div>
  </div>
  <div class="col-md-2 mb-2"></div>
  </div>

<div id="show" class="btn btn-danger">Sembunyikan</div>
<div id="reload" class="btn btn-danger">Reload</div>
<input class="range" type="range" min="0" max="100" value="0" id="fader" step="1" >
<!-- Button trigger modal -->
<button type="button" id="btn_prediksi" class="btn btn-primary" data-toggle="modal" data-target="#Prediksi">
  Prediksi
</button>


<!-- Modal -->
<div class="modal fade" id="Prediksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <label for="Prediksi">Masukkan X</label>
        <input type="number" name="xpredik" id="xpredik" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Prediksi</button>
        </form>
      </div>
    </div>
  </div>
</div>



<div class="row m-5">
<div class="col">
<div class="card p-3">
   <form enctype='multipart/form-data' action='' method='post'>
    Upload CSV File:<br />
    <input type='file' name='filename' class="form-control" size='100'><br>
   <input type='submit' class="btn btn-success" name='upload' value='Upload'>
   <button type="button" class="btn btn-secondary" onclick="download()">Download csv</button>
   <button type="button" class="btn btn-danger" onclick="hapus()">Hapus semua data</button>
   </form>
</div>
</div>
</div>

<?php

//Script Upload File..
if(isset($_POST['upload'])){ 
    //Import uploaded file to Database, Letakan dibawah sini..
    $handle = fopen($_FILES['filename']['tmp_name'], "r"); //Membuka file dan membacanya
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $import="INSERT into variabel (id,x,y) values(null,'$data[0]','$data[1]')"; //data array sesuaikan dengan jumlah kolom pada CSV anda mulai dari “0” bukan “1”
        mysqli_query($koneksi,$import) or die(mysqli_error()); //Melakukan Import
    }
 
    fclose($handle); //Menutup CSV file
  }
    
 //Jika belum menekan tombol submit, form dibawah akan muncul.. ?>
 
<!-- Form Untuk Upload File CSV-->
   <!-- Silahkan masukan file csv yang ingin diupload<br /> 
   <form enctype='multipart/form-data' action='' method='post'>
    Cari CSV File anda:<br />
    <input type='file' name='filename'>
   <input type='submit' name='upload' value='Upload'></form> -->

<!-- <div id="start">start</div>
<div id="end">end</div> -->
<script src="js/popper.js" ></script>
<script src="js/bootstrap.js" ></script>
<script src="leader-line/leader-line.min.js" ></script>



<script>

var line1 = new LeaderLine(document.getElementById('start'), document.getElementById('start2'),
  {
  dash: {animation: true},
  startPlug: 'square',
  endPlug: 'hand',
  }),
    shown = true;

var line2 = new LeaderLine(document.getElementById('start1'), document.getElementById('start4'),
  {
  dash: {animation: true},
  startPlug: 'square',
  endPlug: 'hand',
  }),
    shown = true;

  var line3 = new LeaderLine(document.getElementById('start'), document.getElementById('start3'),
  {
  dash: {animation: true},
  startPlug: 'square',
  endPlug: 'hand',
  }),
    shown = true;

  var line4 = new LeaderLine(document.getElementById('start1'), document.getElementById('start2'),
  {
  dash: {animation: true},
  startPlug: 'square',
  endPlug: 'hand',
  endSocket: 'top'
  }),
    shown = true;

var line5 = new LeaderLine(document.getElementById('start5'), document.getElementById('start7'),
  {
  dash: {animation: true},
  startPlug: 'square',
  endPlug: 'hand',
  }),
    shown = true;

  var line6 = new LeaderLine(document.getElementById('start6'), document.getElementById('start7'),
  {
  dash: {animation: true},
  startPlug: 'square',
  endPlug: 'hand',
  }),
    shown = true;

  var line7 = new LeaderLine(document.getElementById('start7'), document.getElementById('start8'),
  {
  dash: {animation: true},
  startPlug: 'square',
  endPlug: 'hand',
  }),
    shown = true;

 var button = document.getElementById('show').addEventListener('click', function(event) {
    shown = !shown;
     line7[shown ? 'show' : 'hide']('fade');
     line6[shown ? 'show' : 'hide']('fade');
     line5[shown ? 'show' : 'hide']('fade');
     line4[shown ? 'show' : 'hide']('fade');
     line3[shown ? 'show' : 'hide']('fade');
     line2[shown ? 'show' : 'hide']('fade');
     line1[shown ? 'show' : 'hide']('fade');
     event.target.textContent = shown ? 'Hide' : 'Show';
  }, false);


  $("#fader").on("input",function () {
            $('.card').css("font-size", $(this).val() + "px");
    });

  $('#reload').click(function() {
    location.reload();
  });

  $("#start9").click(function() {
  $("#start8").toggle();
  $("#start6").toggle();
  $("#start5").toggle();
  $("#start4").toggle();
  $("#start3").toggle();
  $("#start2").toggle();
  $("#start7").toggle();
  $("#start1").toggle();
  $("#start").toggle();
});

  $("#start").click(function() {
  $("#start8").toggle();
  $("#start6").toggle();
  $("#start5").toggle();
  $("#start4").toggle();
  $("#start3").toggle();
  $("#start2").toggle();
  $("#start7").toggle();
  $("#start1").toggle();
  $("#start9").toggle();
});

  $("#start1").click(function() {
  $("#start8").toggle();
  $("#start6").toggle();
  $("#start5").toggle();
  $("#start4").toggle();
  $("#start3").toggle();
  $("#start2").toggle();
  $("#start7").toggle();
  $("#start").toggle();
  $("#start9").toggle();
});

  $("#start2").click(function() {
  $("#start8").toggle();
  $("#start6").toggle();
  $("#start5").toggle();
  $("#start4").toggle();
  $("#start3").toggle();
  $("#start7").toggle();
  $("#start1").toggle();
  $("#start").toggle();
  $("#start9").toggle();
});

  $("#start3").click(function() {
  $("#start8").toggle();
  $("#start6").toggle();
  $("#start5").toggle();
  $("#start4").toggle();
  $("#start7").toggle();
  $("#start2").toggle();
  $("#start1").toggle();
  $("#start").toggle();
  $("#start9").toggle();
});
  $("#start4").click(function() {
  $("#start8").toggle();
  $("#start6").toggle();
  $("#start5").toggle();
  $("#start7").toggle();
  $("#start3").toggle();
  $("#start2").toggle();
  $("#start1").toggle();
  $("#start").toggle();
  $("#start9").toggle();
});

  $("#start5").click(function() {
  $("#start8").toggle();
  $("#start6").toggle();
  $("#start7").toggle();
  $("#start4").toggle();
  $("#start3").toggle();
  $("#start2").toggle();
  $("#start1").toggle();
  $("#start").toggle();
  $("#start9").toggle();
});

  $("#start6").click(function() {
  $("#start8").toggle();
  $("#start7").toggle();
  $("#start5").toggle();
  $("#start4").toggle();
  $("#start3").toggle();
  $("#start2").toggle();
  $("#start1").toggle();
  $("#start").toggle();
  $("#start9").toggle();
});

  $("#start7").click(function() {
  $("#start8").toggle();
  $("#start6").toggle();
  $("#start5").toggle();
  $("#start4").toggle();
  $("#start3").toggle();
  $("#start2").toggle();
  $("#start1").toggle();
  $("#start").toggle();
  $("#start9").toggle();
});

$("#start8").click(function() {
  $("#start7").toggle();
  $("#start6").toggle();
  $("#start5").toggle();
  $("#start4").toggle();
  $("#start3").toggle();
  $("#start2").toggle();
  $("#start1").toggle();
  $("#start").toggle();
  $("#start9").toggle();
});
</script>
<script>
function hapus(){
  window.location.href = "hapus.php";
}

function download(){
  window.location.href = "dataset.csv";
}
</script>

<script src="js/popper.js" ></script>
<script src="js/bootstrap.js" ></script>

</body>
</html>