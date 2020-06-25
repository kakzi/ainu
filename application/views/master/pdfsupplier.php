<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier</title>
    <style>
        .tittle {
            font-size: 14pt;
            font-style: bold;

        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            font-size: 8pt;
            padding: 5px;
        }
    </style>
</head>

<body>
    <img src="assets/images/kopainu.png" width="100%">

    <p align="center" class="tittle">
        DATA SUPPLIER AINU <br>
    </p>

    <table align="center" style="width: 95%">
        <tr>
            <th width="3%">No.</th>
            <th width="12%">Kode Supplier</th>
            <th width="18%">Nama</th>
            <th width="10%">PIC</th>
            <th width="10%">NIK</th>
            <th width="20%">Alamat</th>
            <th width="10%">Telp</th>
            <!-- <th>Join</!--> -->
            <th width="12%">Created by</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($supplier as $s) : ?>
            <tr>
                <th style="text-align: center"><?= $i; ?></th>
                <td><?= $s['kode_supplier']; ?></td>
                <td><?= $s['nama_supplier']; ?></td>
                <td><?= $s['pic_supplier']; ?></td>
                <td><?= $s['nik']; ?></td>
                <td><?= $s['alamat_supplier']; ?></td>
                <td><?= $s['telp_supplier']; ?></td>
                <!-- <td><?= date('d F Y', $s['date']); ?></td> -->
                <td style="text-align: center"><?= $s['created']; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>

    </table>
</body>

</html>