<html moznomarginboxes mozdisallowselectionprint>

<head>
    <title>Invoice-Angsuran-<?= $angsuran->id_pelanggan == null ? "Umum" : $angsuran->nama_pelanggan ?>-<?= $angsuran->date_angsuran ?></title>
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
            padding-bottom: 8px;
            border-bottom: 1px dashed;
        }

        .head {
            margin-top: 10px;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px dashed;
        }

        table {
            width: 100%;
            font-size: 12px;
        }

        .thanks {
            margin-top: 10px;
            padding-top: 10px;
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
                        echo Date("d-m-Y") . "&nbsp;&nbsp;" . Date("H:i", strtotime($angsuran->created_a));
                        ?>
                    </td>
                    <td>Pelanggan</td>
                    <td style="text-align: center; width:10px">:</td>
                    <td style="text-align: right; width:100px">
                        <?= $angsuran->id_pelanggan == null ? "Umum" : $angsuran->pic_pelanggan ?>
                    </td>
                </tr>
                <tr>

                    <td>Kasir</td>
                    <td style="text-align: center; width:10px">:</td>
                    <td style="width:200px"">
                        <?= ucfirst($angsuran->user_a) ?>
                    </td>
                    <td>Kategori</td>
                    <td style=" text-align: center; width:10px">:</td>
                    <td style="text-align: right; width:100px">
                        <?= $angsuran->id_pelanggan == null ? "Umum" : $angsuran->id_kategori ?>
                    </td>
                </tr>
            </table>
        </div>

        <div class=" transaksi">
            <table class="transaksi-table" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="width: 50px; font-size: 12px">Invoice</td>
                    <td style="text-align: center; width:10px">:</td>
                    <td style="width:100px">
                        <?= $angsuran->invoice ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50px; font-size: 12px">Tagihan Awal</td>
                    <td style="text-align: center; width:10px; font-size: 12px">:</td>
                    <td style="width:100px; font-size: 12px">
                        <?= convertRupiah($angsuran->tagihan_a) ?>
                    </td>
                </tr>

                <tr>
                    <td style="width: 50px; font-size: 12px">Nominal Angsuran</td>
                    <td style="text-align: center; width:10px; font-size: 12px">:</td>
                    <td style="width:100px; font-size: 12px">
                        <?= convertRupiah(($angsuran->angsuran_pokok) + ($angsuran->angsuran_laba)) ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50px; font-size: 12px"><b>Saldo</b></td>
                    <td style="text-align: center; width:10px; font-size: 12px">:</td>
                    <td style="width:100px; font-size: 12px">
                        <?= convertRupiah($angsuran->saldo_tagihan) ?>
                    </td>
                </tr>

                <tr>
                    <td style="width: 50px; font-size: 12px">Keterangan</td>
                    <td style="text-align: center; width:10px; font-size: 12px">:</td>
                    <td style="width:100px; font-size: 12px">
                        <?= $angsuran->keterangan_a ?>
                    </td>
                </tr>

            </table>

        </div>

        <div class="thanks">
            <p style="text-align: start">
                Catatan :
                <br>
                1. Simpan struk ini sebagai bukti pembayaran
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