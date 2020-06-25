<?php $i = 1;
if ($cart->num_rows() > 0) {
    foreach ($cart->result() as $c => $data) { ?>
        <tr>
            <th class="text-center" scope="row"><?= $i++; ?></th>
            <td><?= $data->kode_produk ?></td>
            <td><?= $data->nama_produk ?></td>
            <td class="text-center"><?= $data->qty_barang ?></td>
            <td><?= $data->harga_barang ?></td>
            <td id="total"><?= $data->total_harga ?></td>
            <td>
                <button type="button" id="update_cart" data-toggle="modal" data-target="#modal-item-edit" class="btn btn-primary btn-sm waves-effect waves-light" data-cartid="<?= $data->id_cart_pembelian ?>" data-kode="<?= $data->kode_produk ?>" data-product="<?= $data->nama_produk ?>" data-price="<?= $data->harga_barang ?>" data-qty="<?= $data->qty_barang ?>" data-total="<?= $data->total_harga ?>">Edit</button>
                <button type="button" id="del_cart" data-cartid="<?= $data->id_cart_pembelian ?>" class="btn btn-danger btn-sm waves-effect waves-light">Delete</button>
            </td>
        </tr>
<?php
    }
} else {
    echo '<tr> 
    <td colspan="9" class="text-center">Tidak ada Produk yang di pilih</td>
    </tr>';
} ?>