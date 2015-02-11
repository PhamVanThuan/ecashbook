<?php namespace EcashBook\Http\Controllers;

use EcashBook\Http\Requests;
use EcashBook\Http\Requests\TransaksiRequest;
use EcashBook\Repositories\TransaksiRepository;
use EcashBook\Transaksi;

class TransaksiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(TransaksiRepository $repository)
    {
        return $repository->find($term = null);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return Transaksi::all();
    }

    public function store(TransaksiRequest $request, TransaksiRepository $transaksi)
    {
        return $transaksi->create($request->all());
    }

    public function show(TransaksiRepository $transaksi, $id)
    {
        return $transaksi->findById($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Requests\TransaksiEditRequest $request, $id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->uraian = $request->get('uraian');
        $transaksi->jumlah = $request->get('jumlah');
        $transaksi->status = $request->get('status');
        $transaksi->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
