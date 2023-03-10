<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Transaksi</title>
    <link rel="stylesheet" href="{{asset('vendor/adminlte/css/adminlte.min.css')}}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <h4>{{config('app.name')}}</h4>
                <h5>Bukti Transaksi</h5>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <p>No Transaksi: {{$id}}</p>
            </div>
            <div class="col-6 text-right">
                <p>{{date('d F Y', strtotime($dataTransaksi->created_at))}}</p>
                <p>{{$dataTransaksi->member->name}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead class="">
                        <tr>
                            <th>No</th>
                            <th>Barang</th>
                            <th>Servis</th>
                            <th>Kategori</th>
                            <th>Banyak</th>
                            <th>Harga</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $tot = 0;
                        @endphp

                        @foreach ($dataTransaksi->transaction_details as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->price_list->item->name}}</td>
                            <td>{{$item->price_list->service->name}}</td>
                            <td>{{$item->price_list->category->name}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->sub_total}}</td>
                        </tr>
                        @php
                        $tot += $item->sub_total;
                        @endphp
                        @endforeach

                        <tr>
                            <td colspan="6" class="text-center"><b>Sub Total Harga</b></td>
                            <td>{{$tot}}</td>
                        </tr>
                        <tr>
                            <td colspan="6" class="text-center"><b>{{$dataTransaksi->service_type->name}}</b></td>
                            <td>{{$dataTransaksi->service_cost}}</td>
                        </tr>
                        <tr>
                            <td colspan="6" class="text-center"><b>Potongan</b></td>
                            <td>- {{$dataTransaksi->discount}}</td>
                        </tr>
                        <tr>
                            <td colspan="6" class="text-center"><b>Total</b></td>
                            <td><b>{{$dataTransaksi->total}}</b></td>
                        </tr>
                        <tr>
                            <td colspan="6" class="text-center"><b>Dibayar</b></td>
                            <td><b>{{$dataTransaksi->payment_amount}}</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-4 text-center">
                <p>Bandar Lampung, {{date('d F Y')}}</p>
                <br>
                <br>
                <br>
                <p>{{$dataTransaksi->admin->name}}</p>
            </div>
            <div class="col-4"></div>
            <div class="col-4 text-center">
                <p>Bandar Lampung, {{date('d F Y')}}</p>
                <br>
                <br>
                <br>
                <p>{{$dataTransaksi->member->name}}</p>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
