<?php namespace EcashBook\Repositories;

use EcashBook\Transaksi;

class TransaksiRepository extends AbstractReposiotries
{
    public function __construct(Transaksi $transaksi)
    {
        $this->model = $transaksi;
    }

    public function find($term = null)
    {
        return $this->model->paginate(10);
    }

    public function create(array $data)
    {
        $transaksi = $this->getNew();
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

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function update($id, $data)
    {
        $transaksi = $this->findById($id);

        $transaksi->uraian = $data['uraian'];
    }

    public function destroy($id)
    {

    }

}