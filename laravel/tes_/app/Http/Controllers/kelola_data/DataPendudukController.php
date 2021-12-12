<?php

namespace App\Http\Controllers\kelola_data;

use App\Exports\ResidentExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResidentRequest;
use App\Imports\ResidentImport;
use App\Models\Resident;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DataPendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residents = Resident::all();

        return view('pages.kelola_data.data-penduduk.index', [
            'residents' => $residents
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $residents = Resident::all();

        return view('pages.kelola_data.data-penduduk.create', [
            'residents' => $residents
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResidentRequest $request)
    {
        Resident::create($request->all());

        return redirect()->route('kelola_data-data_penduduk')->with('notification-success-add', '');
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
        $data = Resident::findOrFail($id);

        return view('pages.kelola_data.data-penduduk.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResidentRequest $request, $id)
    {
        $data = Resident::findOrFail($id);

        $data->update($request->all());
        return redirect()->route('kelola_data-data_penduduk')->with('notification-success-edit', '');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Resident::findOrFail($id);

        $data->delete();

        return back()->with('notification-success-delete', '');
    }

    public function export()
    {
        return Excel::download(new ResidentExport, 'template.xlsx'); 
    }

    public function import(Request $request)
    {
        Excel::import(new ResidentImport, $request->file('file'));
        return back();
    }
}
