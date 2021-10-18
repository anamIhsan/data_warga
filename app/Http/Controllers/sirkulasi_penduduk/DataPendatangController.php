<?php

namespace App\Http\Controllers\sirkulasi_penduduk;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComeRequest;
use App\Models\Come;
use App\Models\Resident;
use Illuminate\Http\Request;

class DataPendatangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comes = Come::all();

        return view('pages.sirkulasi_penduduk.data-pendatang.index', [
            'comes' => $comes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comes = Come::all();
        $residents = Resident::all();

        return view('pages.sirkulasi_penduduk.data-pendatang.create', [
            'comes' => $comes,
            'residents' => $residents
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComeRequest $request)
    {
        $data = $request->all();
        $residents = Resident::findOrFail($request->residents_id);

        $update = [
            'status' => 'PENDATANG',
        ];

        $residents->update($update);
        Come::create($data);

        return redirect()->route('sirkulasi_penduduk-data_pendatang')->with('notification-success-add', '');
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
        $data = Come::findOrFail($id);
        $residents = Resident::all();

        return view('pages.sirkulasi_penduduk.data-pendatang.edit', [
            'data' => $data,
            'residents' => $residents
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ComeRequest $request, $id)
    {
        $data = Come::findOrFail($id);
        $before_residents = Resident::find($data->residents_id);
        $residents = Resident::findOrFail($request->residents_id);
        
        if ($before_residents->id != $request->residents_id) {
            $updateSebelum = [
                'status' => 'ADA',
            ];
            $resident_update = [
                'status' => 'PENDATANG',
            ];
            $before_residents->update($updateSebelum);
    
            $residents->update($resident_update);
        }

        $data->update($request->all());
        return redirect()->route('sirkulasi_penduduk-data_pendatang')->with('notification-success-edit', '');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Come::findOrFail($id);
        $residents = Resident::find($data->residents_id);

        $ada = [
            'status' => 'ADA',
        ];

        $residents->update($ada);
        $data->delete();

        return back()->with('notification-success-delete', '');

    }
}
