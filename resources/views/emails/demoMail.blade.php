<!DOCTYPE html>
<html>

<head>
    <title>ItsolutionStuff.com</title>
</head>

<body>
    <div class="judul" style="text-align:center ;">
        <h1>{{ $mailData['title'] }}</h1>
    </div>
    <div class="isi" style="border-style:solid ;">
        <p class="card-text" style="margin-right:3px ;">pelanggan atas nama <em> <b> {{ $mailData['nama'] }} </b> </em>
            telah melakukan pembelian produk <b> {{ $mailData['barang'] }} </b>,<br>
            dengan jumlah <b>{{ $mailData['kuantitas'] }}. </b> <br>
            total pembelian senilai <b> Rp. {{ number_format($mailData['total']) }} </b></p>
        <p class="card-text">Terima Kasih telah membeli produk kami</p>
    </div>
</body>


</html>
