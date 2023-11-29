<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\BahanAjarRequest;
use ErrorException;
use App\Models\BahanAjar;
use Illuminate\Http\Request;
use Session;

class BahanAjarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file = BahanAjar::all();
        return view('backend.website.content.BahanAjar.index', compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BahanAjarRequest $request)
    {
        try {
            $file = $request->file('file');
            $nama_file = time()."_".$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/file/bahanajar';
            $file->storeAs($tujuan_upload,$nama_file);

            $bahanAjar = new BahanAjar;
            $bahanAjar->title     = $request->title;
            $bahanAjar->file     = $nama_file;
            $bahanAjar->save();

            Session::flash('success','Bahan Ajar Berhasil ditambah !');
            return redirect()->route('backend-imageslider.index');

        } catch (ErrorException $e) {
            throw new ErrorException($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file = BahanAjar::find($id);
        return view('backend.website.content.BahanAjar.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            if ($request->file) {
                $file = $request->file('file');
                $nama_file = time()."_".$file->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'public/file/bahanajar';
                $file->storeAs($tujuan_upload,$nama_file);
            }

            $bahanAjar = BahanAjar::find($id);
            $bahanAjar->file     = $nama_file ?? $bahanAjar->file;
            $bahanAjar->title     = $request->title;
            $bahanAjar->is_active = $request->is_active;
            $bahanAjar->save();

            Session::flash('success','Gambar Slider Berhasil diupdate !');
            return redirect()->route('backend-imageslider.index');

        } catch (ErrorException $e) {
            throw new ErrorException($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
