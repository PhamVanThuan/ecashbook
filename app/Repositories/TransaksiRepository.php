<?php
/**
 * Created by PhpStorm.
 * User: Edi
 * Date: 2/8/2015
 * Time: 2:28 PM
 */

namespace EcashBook\Repositories;


use EcashBook\Transaksi;

class TransaksiRepository
{

    public function create(array $data)
    {
        $transaksi = new Transaksi();
        $transaksi->uraian = $data['uraian'];
        $transaksi->jumlah = $data['jumlah'];
        $transaksi->status = $data['status'];
        $transaksi->save();

        return [
            'success' => true,
            'result'  => [
                'message' => 'Sukses data berhasil disimpan.',
            ]
        ];
    }

}