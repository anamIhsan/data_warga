<?php

namespace App\Http\Controllers\sirkulasi_penduduk;

use App\Http\Controllers\Controller;
use App\Http\Requests\DieRequest;
use App\Models\Death;
use App\Models\Resident;
use Illuminate\Http\Request;

class DataMeninggalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dies = Death::all();

        return view('pages.sirkulasi_penduduk.data-meninggal.index', [
            'dies' => $dies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dies = Death::all();
        $residents = Resident::all();

        return view('pages.sirkulasi_penduduk.data-meninggal.create', [
            'dies' => $dies,
            'residents' => $residents,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DieRequest $request)
    {
        $data = $request->all();
        $residents = Resident::findOrFail($request->residents_id);

        $update = [
            'status' => 'meninggal',
        ];

        $residents->update($update);
        Death::create($data);

        return redirect()->route('sirkulasi_penduduk-data_meninggal')->with('notification-success-add', '');
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
        $data = Death::findOrFail($id);
        $residents = Resident::all();

        return view('pages.sirkulasi_penduduk.data-meninggal.edit', [
            'data' => $data,
            'residents' => $residents,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DieRequest $request, $id)
    {
        $data = Death::findOrFail($id);
        $before_residents = Resident::find($data->residents_id);
        $residents = Resident::findOrFail($request->residents_id);
        
        if ($before_residents->id != $request->residents_id) {
            $updateSebelum = [
                'status' => 'ada',
            ];
            $resident_update = [
                'status' => 'meninggal',
            ];
            $before_residents->update($updateSebelum);
    
            $residents->update($resident_update);
        }

        $data->update($request->all());
        return redirect()->route('sirkulasi_penduduk-data_meninggal')->with('notification-success-edit', '');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Death::findOrFail($id);
        $residents = Resident::find($data->residents_id);

        $ada = [
            'status' => 'ada',
        ];

        $residents->update($ada);
        $data->delete();

        return back()->with('notification-success-delete', '');
    }
}
