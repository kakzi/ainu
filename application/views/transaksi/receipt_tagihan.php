<html moznomarginboxes mozdisallowselectionprint>

<head>
    <title>Invoice-Tagihan-<?= $penjualan->id_pelanggan == null ? "Umum" : $penjualan->nama_pelanggan ?>-<?= $penjualan->date_penjualan ?></title>
    <style type="text/css">
        html {
            font-family: "Verdana, Arial";
        }

        .content {
            width: 80mm;
            font-size: 11px;
            padding: 5px;
        }

        .title {
            text-align: center;
            font-size: 13px;
            padding-bottom: 5px;
            border-bottom: 1px dashed;
        }

        .head {
            margin-top: 5px;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid;
        }

        table {
            width: 100%;
            font-size: 12px;
        }

        .thanks {
            margin-top: 5px;
            padding-top: 5px;
            text-align: center;
            border-top: 1px dashed;
        }

        .thankss {
            margin-top: 1px;
            padding-top: 1px;
            text-align: center;
            border-top: 1px dashed;
        }

        @media print {
            @page {
                width: 80mm;
                margin: 0mm;
            }
        }
    </style>
</head>

<body onload="window.print()">
    <div class="content">
        <div class="title">
            <b>AIRMINUM NU</b>
            <br>
            Jl. Raya Ngasem Kalitidu km.09
        </div>
        <div class="head">
            <table cellspacing="0" cellpadding="0">
                <tr>
                    <td>Tanggal</td>
                    <td style="text-align: center; width:10px">:</td>
                    <td style="width:100px">
                        <?php
                        echo $penjualan->date_penjualan . "&nbsp;&nbsp;" . Date("H:i", strtotime($penjualan->sale_created));
                        ?>
                    </td>
                    <td>Pelanggan</td>
                    <td style="text-align: center; width:10px">:</td>
                    <td style="text-align: right; width:100px">
                        <?= $penjualan->id_pelanggan == null ? "Umum" : $penjualan->pic_pelanggan ?>
                    </td>
                </tr>
                <tr>
                    <td>Invoice</td>
                    <td style="text-align: center; width:10px">:</td>
                    <td style="width:200px">
                        <?= $penjualan->invoice ?>
                    </td>
                    <td>Kategori</td>
                    <td style="text-align: center; width:10px">:</td>
                    <td style="text-align: right; width:100px">
                        <?= $penjualan->id_pelanggan == null ? "Umum" : $penjualan->id_kategori ?>
                    </td>
                </tr>
                <tr>
                    <td>Kasir</td>
                    <td style="text-align: center; width:10px">:</td>
                    <td style="width:200px"">
                        <?= ucfirst($penjualan->user_id) ?>
                    </td>
                    
                </tr>
            </table>
        </div>

        <div class=" transaksi">
                        <table class="transaksi-table" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style=" text-align: left; width: 165px"><b>Produk</b> </td>
                                <td style=" text-align: center; width: 10px"><b>QTY</b></td>
                                <td style=" text-align: right; width:100px">
                                    <b>Harga</b>
                                </td>
                                <td style=" text-align: right; width:100px">
                                    <b>Total</b>
                                </td>
                            </tr>
                            <?php
                            // $arr_diskon = array();
                            foreach ($detail_penjualan as $key => $value) { ?>
                                <tr>
                                    <td style="width: 165px"><?= $value->nama_produk ?></td>
                                    <td style="text-align: center; width: 10px"><?= $value->qty ?></td>
                                    <td style="text-align: right; width:100px"><?= convertRupiah($value->price) ?></td>
                                    <td style="text-align: right"><?= convertRupiah($value->total) ?></td>
                                </tr>

                            <?php
                                // if ($value->diskon_produk > 0) {
                                //     // $arr_diskon[] = $value->diskon_produk;
                                // }
                            }
                            // foreach ($arr_diskon as $key => $value) { 
                            ?>

                            <tr>
                                <td colspan="4" style="border-bottom: 1px dashed; padding-top:5px"></td>
                            </tr>

                            <tr>
                                <td style=" text-align: left; padding-top:10px; width: 200px">Metode Pembayaran</td>
                                <td style="text-align: center; padding-top:10px; width:10px">:</td>
                                <td style=" text-align: left; padding-top:10px; width: 60px"><b><?= $penjualan->jenis_payment ?></b> </td>
                            </tr>

                            <tr>
                                <td colspan="2"></td>
                                <td style="text-align: right; padding-top:5px">Subtotal</td>
                                <td style="text-align: right; padding-top:5px">
                                    <?= convertRupiah($penjualan->sub_total) ?>
                                </td>
                            </tr>

                            <?php if ($penjualan->diskon > 0) { ?>
                                <tr>
                                    <td colspan="2"></td>
                                    <td style="text-align: right; padding-bottom:5px">Diskon Penjualan</td>
                                    <td style="text-align: right; padding-bottom:5px">
                                        <?= convertRupiah($penjualan->diskon) ?>
                                    </td>
                                </tr>
                            <?php

                            } ?>


                            <tr>
                                <td colspan="2"></td>
                                <td style="border-top:1px dashed; text-align: right; padding-bottom:5px 0">Grand Total</td>
                                <td style="border-top:1px dashed; text-align: right; padding-bottom:5px 0">
                                    <?= convertRupiah($penjualan->total_price) ?>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2"></td>
                                <td style="border-top:1px dashed; text-align: right; padding-bottom:5px">Bayar</td>
                                <td style="border-top:1px dashed; text-align: right; padding-bottom:5px">
                                    <?= convertRupiah($penjualan->cash) ?>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2"></td>
                                <td style="text-align: right; ">Kembalian/Tagihan</td>
                                <td style="text-align: right; ">
                                    <?= convertRupiah($penjualan->remaining) ?>
                                </td>
                            </tr>

                        </table>
        </div>

        <div class="thankss">
            <p><b>KARTU ANGSURAN</b></p>
        </div>

        <div class="tagihan-thanks">
            <table style="margin-top: 3px" class="tagihan-table" cellspacing="0" cellpadding="0">
                <tr>
                    <td colspan="5" style="border-bottom: 1px dashed;"></td>
                </tr>
                <tr>
                    <td style="padding-top: 5px; text-align: left; width: 120px"><b>Tgl</b> </td>
                    <td style="padding-top: 5px; text-align: center; width: 10px"><b>Uraian</b></td>
                    <td style="padding-top: 5px; text-align: right; width:100px">
                        <b>Jumlah</b>
                    </td>
                    <td style="padding-top: 5px; text-align: right; width:100px">
                        <b>Saldo</b>
                    </td>
                    <td style="padding-top: 5px; text-align: right; width:100px">
                        <b>Sales</b>
                    </td>
                </tr>

                <?php
                foreach ($angsuran as $key => $data) { ?>
                    <tr>
                        <td style=" text-align: left; width: 120px; font-size: 8pt"><?= $data->date_angsuran ?></td>
                        <td style=" text-align: center; width: 10px"><?= $data->keterangan_a ?></td>
                        <td style=" text-align: right; width:120px"><?= convertRupiah(($data->angsuran_pokok) + ($data->angsuran_laba)) ?></td>
                        <td style=" text-align: right; width:120px"><?= convertRupiah($data->saldo_tagihan) ?></td>
                        <td style=" text-align: right; width:50px"><?= $data->user_a ?></td>

                    </tr>
                <?php

                } ?>

            </table>

        </div>

        <div class="thanks">
            <p style="text-align: start">
                <b>Keterangan :</b>
                <br>
                1. Barang yang sudah di beli tidak boleh di kembalikan
                <br>
                2. Kembalian/Tagihan menyesuaikan dengan metode pembayaran Cash/DP
                <br>
                3. Jika pembayaran dengan DP, Jatuh tempo 14 Hari setelah Invoice ini di buat
                <br>
                4. Simpan Struk ini sebagai bukti pembayaran yang sah!
            </p>
        </div>

        <div class="thanks">
            <b>~~~ AINU-STORE ~~~</b>
            <br>
            Berkah, dan Menyegarkan
        </div>

    </div>

</body>

</html>