<?php namespace EcashBook\Repositories;

use EcashBook\Services\LaraCache;
use EcashBook\Services\LaraCacheInterface;
use EcashBook\Transaksi;

class TransaksiRepository extends AbstractReposiotries
{
    protected $cache;

    public function __construct(Transaksi $transaksi, LaraCacheInterface $cache)
    {
        $this->model = $transaksi;
        $this->cache = $cache;
    }


    public function find($term = null)
    {
        $key = 'find-transaksi-' . $term;
        $section = 'transaksi';

        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        $transaksi = $this->model
            ->where('uraian', 'like', '%' . $term . '%')
            ->paginate(10)
            ->toArray();

        $this->cache->put($section, $key, $transaksi, 10);

        return $transaksi;
    }

    /**
     * @param array $data
     *
     * @return array
     */
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

    /**
     * @param $id
     *
     * @return \Illuminate\Support\Collection|null|static
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param $id
     * @param $data
     */
    public function update($id, $data)
    {
        $transaksi = $this->findById($id);

        $transaksi->uraian = $data['uraian'];
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {

    }

}