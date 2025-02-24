@extends('frontend.layouts.default')
@section('title', __( 'Checkout' ))
@section('content')

<div class="container checkout-container mt-7">

    <div class="row">
        <div class="col-lg-7">
            <ul class="checkout-steps">
                <li>
                    <h2 class="step-title">Detail Pengiriman</h2>

                    <form action="{{ URL::to('do-checkout') }}" id="checkout-form" method="post">
                        @csrf
                        <input type="hidden" name="pelanggan_id" value="{{ $detailData->id }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama Lengkap
                                        <abbr class="required" title="required">*</abbr>
                                    </label>
                                    <input type="text" class="form-control" name="nama_lengkap"
                                        value="{{ $detailData->nama }}" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>No Telepon <abbr class="required" title="required">*</abbr></label>
                            <input type="tel" class="form-control" name="no_telp" value="{{ $detailData->no_telp }}"
                                required />
                        </div>
                        <div class="select-custom">
                            <label>Provinsi <abbr class="required" title="required">*</abbr></label>
                            <select name="provinsi_id" id="provinsi_id" class="form-control">
                                <option value="">-- Pilih Provinsi --</option>
                                @foreach($provinsi as $kp => $vp)
                                <option value="{{ $vp->id }}" @if(!empty($alamat)) @if($alamat->provinsi_id == $vp->id)
                                    selected @endif @endif>{{ $vp->province_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="select-custom">
                            <label>Kota <abbr class="required" title="required">*</abbr></label>
                            <select id="city" name="kota_id" class="form-control">
                                <option value="">-- Pilih Kota --</option>
                                @if(!empty($alamat))
                                @foreach($kota as $kp => $vp)
                                <option value="{{ $vp->id }}" @if(!empty($alamat)) @if($alamat->kota_id == $vp->id)
                                    selected @endif @endif>{{ $vp->city_name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group mb-1 pb-2">
                            <label>Alamat Lengkap
                                <abbr class="required" title="required">*</abbr></label>
                            <input type="text" class="form-control" name="alamat_lengkap"
                                value="@if(!empty($alamat)) {{ $alamat->alamat_lengkap }} @endif"
                                placeholder="Alamat Lengkap" required />
                        </div>

                        <div class="form-group">
                            <label>Kode Pos
                                <abbr class="required" title="required">*</abbr></label>
                            <input type="text" class="form-control" name="kode_pos"
                                value="@if(!empty($alamat)) {{ $alamat->kode_pos }} @endif" required />
                        </div>
                        <div class="select-custom">
                            <label>Kurir <abbr class="required" title="required">*</abbr></label>
                            <select name="kurir" id="kurir" class="form-control">
                                <option value="">-- Pilih Kurir --</option>
                                <option value="jne"> JNE</option>
                                <option value="tiki"> Tiki</option>
                                <option value="pos"> Pos</option>
                            </select>
                        </div>
                        <div class="custom-control custom-radio">
                            <button id="cekButton" type="button" class="btn btn-primary btn-sm"
                                onclick="retrieveOngkir()" disabled> Cek</button>
                        </div>
                        <input id="berat" name="berat" class="form-control" type="hidden" value="1">
                        <table id="datatable" class="table tbl-bordered tbl-striped">
                            <thead>
                                <tr>
                                    <th>Nama Kurir</th>
                                    <th>Paket</th>
                                    <th>Harga</th>
                                    <th>Estimasi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="kurir_table">

                            </tbody>
                        </table>
                        <div class="form-group">
                            <label class="order-comments">Order notes (optional)</label>
                            <textarea class="form-control"
                                placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                        </div>

                </li>
            </ul>
        </div>
        <!-- End .col-lg-8 -->

        <div class="col-lg-5">
            <div class="order-summary">
                <h3>YOUR ORDER</h3>
                <table class="table table-mini-cart">
                    <thead>
                        <tr>
                            <th>Botol</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="botol_id" id="botol_id" class="form-control" required>
                                    <option value="" selected disabled>-- Pilih Botol --</option>
                                    @foreach ($botol as $valBotol)
                                    <option value="{{ $valBotol->id }}" data-ukuran="{{ $valBotol->ukuran }}">{{
                                        $valBotol->tipe_botol.' '.$valBotol->ukuran }} ml</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-mini-cart">
                    <thead>
                        <tr>
                            <th colspan="2">Product</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataCart as $valCart)
                        <input type="hidden" name="produk_id[]" value="{{ $valCart->produk_id }}">
                        <input type="hidden" name="harga[]" value="{{ $valCart->harga }}">
                        <input type="hidden" name="id_cart[]" value="{{ $valCart->id }}">
                        <input type="hidden" name="qty[]" value="{{ $valCart->qty }}">
                        <tr>
                            <td class="product-col">
                                <p class="product-title">
                                    {{ $valCart->nama_produk }} ×
                                    <span class="product-qty">{{ $valCart->qty }}</span>
                                </p>
                            </td>

                            <td class="price-col">
                                <span id="price-{{ $valCart->id }}">{{ number_format($valCart->harga,2) }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Subtotal</td>

                            <td class="price-col">
                                <span id="total-subtotal"></span>
                            </td>
                        </tr>
                        <tr class="order-total">
                            <td>
                                <h6>Total</h6>
                            </td>
                            <td>
                                <input type="hidden" id="total-harga" name="total_pembayaran" value="">
                                <b class="total-price" id="total-price"><span></span></b>
                            </td>
                        </tr>
                    </tfoot>
                </table>

                <div class="payment-methods">
                    <h4 class="">Metode Pembayaran</h4>
                    <div class="info-box with-icon p-0">
                        <select name="payment_mmethod" id="" class="form-control" required>
                            <option value="" selected disabled>-- Pilih Metode Pembayaran --</option>
                            <option value="1">Bank Transfer</option>
                            <option value="2">Qris</option>
                            <option value="3">COD</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-dark btn-place-order" form="checkout-form">
                    Place order
                </button>
                </form>
            </div>
            <!-- End .cart-summary -->
        </div>
        <!-- End .col-lg-4 -->
    </div>
    <!-- End .row -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#provinsi_id').on('change', function() {
            var provinceID = $(this).val();
            if(provinceID) {
                $.ajax({
                    url: "{{ URL::to('getCity/') }}/" + provinceID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#city').empty();
                        $('#city').append('<option value="">-- Pilih Kota --</option>');
                        $.each(data, function(key, value) {
                            $('#city').append('<option value="'+ value.id +'">'+ value.city_name +'</option>');
                        });
                    }
                });
            } else {
                $('#city').empty();
                $('#city').append('<option value="">Pilih Kota</option>');
            }
        });
    });
</script>
<script type="text/javascript">
    document.getElementById('kurir').addEventListener('change', function() {
        var kurir = this.value;
        var cekButton = document.getElementById('cekButton');
        
        // Jika ada kurir yang dipilih, aktifkan tombol "Cek"
        if (kurir !== "") {
            cekButton.removeAttribute('disabled');
        } else {
            cekButton.setAttribute('disabled', 'disabled');
        }
    });

    function retrieveOngkir(){
        var kurir   = $('#kurir').val();
        var tujuan  = $('#city').val();
        var berat   = 1000;

        $.ajax({
            url : "{{ URL::to('get-kurir?kurir=') }}" +kurir+"&asal=152"+"&tujuan="+tujuan+"&berat="+berat,
            type: "GET",
            dataType: "JSON",
            success: function(data){ 
                $('#kurir_table').html(data.responseText);
            },

            error:function(data){
                console.log("error, ",data.responseText);
                $('#kurir_table').html(data.responseText);
            }
        });
    }

</script>
<script>

</script>
<script>
    document.getElementById('botol_id').addEventListener('change', calculateTotal);

    document.querySelectorAll('.shipping-cost-radio').forEach(function(radio) {
        radio.addEventListener('change', calculateTotal);
    });

    function calculateTotal() {
        var selectedOption = document.getElementById('botol_id').options[document.getElementById('botol_id').selectedIndex];
        var ukuranBotol = parseFloat(selectedOption.getAttribute('data-ukuran')) || 1; // Ambil ukuran botol, default 1 jika null

        var totalSubtotal = 0;

        @foreach ($dataCart as $valCart)
            var qty = {{ $valCart->qty }};
            var hargaProduk = {{ $valCart->harga }};
            
            // Hitung subtotal untuk produk ini (harga × qty × ukuran botol)
            var subtotal = hargaProduk * qty * ukuranBotol;
            
            // Tambahkan subtotal ini ke total subtotal
            totalSubtotal += subtotal;
        @endforeach

        // Update total subtotal di footer
        document.getElementById('total-subtotal').textContent = totalSubtotal.toFixed(2);

        var shippingCost = 0;
        var selectedShipping = document.querySelector('.shipping-cost-radio:checked');

        if (selectedShipping) {
            shippingCost = parseFloat(selectedShipping.value); // Ambil nilai ongkos kirim dari radio button yang dipilih
        }

        // Hitung total harga keseluruhan (subtotal + ongkos kirim)
        var totalPrice = totalSubtotal + shippingCost;

        // Update total harga di footer
        document.getElementById('total-price').textContent = totalPrice.toFixed(2);
        document.getElementById('total-harga').value = totalPrice;
    }
    document.addEventListener('change', function (event) {
        if (event.target.classList.contains('shipping-cost-radio')) {
            calculateTotal(); // Panggil fungsi setiap kali radio button diubah
        }
    });
</script>
@endsection