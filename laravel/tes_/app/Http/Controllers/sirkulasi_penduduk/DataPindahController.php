<?php

namespace App\Http\Controllers\sirkulasi_penduduk;

use App\Http\Controllers\Controller;
use App\Http\Requests\MoveRequest;
use App\Models\Move;
use App\Models\Resident;
use Illuminate\Http\Request;

class DataPindahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moves = Move::all();

        return view('pages.sirkulasi_penduduk.data-pindah.index', [
            'moves' => $moves
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $moves = Move::all();
        $residents = Resident::all();

        return view('pages.sirkulasi_penduduk.data-pindah.create', [
            'moves' => $moves,
            'residents' => $residents,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MoveRequest $request)
    {
        $data = $request->all();
        $residents = Resident::findOrFail($request->residents_id);

        $update = [
            'status' => 'PINDAH',
        ];

        $residents->update($update);
        Move::create($data);

        return redirect()->route('sirkulasi_penduduk-data_pindah')->with('notification-success-add', '');
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
        $data = Move::findOrFail($id);
        $residents = Resident::all();

        return view('pages.sirkulasi_penduduk.data-pindah.edit', [
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
    public function update(MoveRequest $request, $id)
    {
        $data = Move::findOrFail($id);
        $before_residents = Resident::find($data->residents_id);
        $residents = Resident::findOrFail($request->residents_id);
        
        if ($before_residents->id != $request->residents_id) {
            $updateSebelum = [
                'status' => 'ADA',
            ];
            $resident_update = [
                'status' => 'PINDAH',
            ];
            $before_residents->update($updateSebelum);
    
            $residents->update($resident_update);
        }
        
        $data->update($request->all());
        return redirect()->route('sirkulasi_penduduk-data_pindah')->with('notification-success-edit', '');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Move::findOrFail($id);
        $residents = Resident::find($data->residents_id);

        $ada = [
            'status' => 'ADA',
        ];

        $residents->update($ada);
        $data->delete();

        return back()->with('notification-success-delete', '');
    }
}
