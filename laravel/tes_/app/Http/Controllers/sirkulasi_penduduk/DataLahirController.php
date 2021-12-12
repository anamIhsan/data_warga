<?php

namespace App\Http\Controllers\sirkulasi_penduduk;

use App\Http\Controllers\Controller;
use App\Http\Requests\BornRequest;
use App\Models\Born;
use App\Models\FamilyCard;
use App\Models\Member;
use App\Models\Resident;
use Illuminate\Http\Request;

class DataLahirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borns = Born::all();

        return view('pages.sirkulasi_penduduk.data-lahir.index', [
            'borns' => $borns
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $borns = Born::all();
        $kk = FamilyCard::all();
        $residents = Resident::doesnthave('member')->get();
        
        return view('pages.sirkulasi_penduduk.data-lahir.create', [
            'borns' => $borns,
            'kk' => $kk,
            'residents' => $residents
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BornRequest $request)
    {
        $data = $request->all();
        Born::create($data);

        $id = Resident::find($request->residents_id);
        $kk = FamilyCard::find($request->familyCards_id);

        $create = [
            'residents_id' => $request->residents_id,
            'hubungan' => 'Anak',
            'familyCards_id' => $request->familyCards_id,
        ];

        $update = [
            'no_kk' => $kk->no_kk,
        ];
        $id->update($update);

        Member::create($create);

        return redirect()->route('sirkulasi_penduduk-data_lahir')->with('notification-success-add', '');
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
        $data = Born::findOrFail($id);
        $kk = FamilyCard::all();
        $residents = Resident::doesnthave('member')->get();

        return view('pages.sirkulasi_penduduk.data-lahir.edit', [
            'data' => $data,
            'kk' => $kk,
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
    public function update(BornRequest $request, $id)
    {
        $data = Born::findOrFail($id);
        $member = Member::where('residents_id', $data->residents_id)->get();
        $kk = FamilyCard::find($request->familyCards_id);
        $before_residents = Resident::findOrFail($data->residents_id);
        $residents = Resident::findOrFail($request->residents_id);

        foreach ($member as $anggota) {
            $update = [
                'residents_id' => $request->residents_id,
                'familyCards_id' => $request->familyCards_id
            ];

            $anggota->update($update);
        }

        if ($before_residents) {
            $updateSebelum = [
                'no_kk' => NULL,
            ];
            $resident_update = [
                'no_kk' => $kk->no_kk,
            ];
            $before_residents->update($updateSebelum);
            $residents->update($resident_update);
        }

        $data->update($request->all());
        return redirect()->route('sirkulasi_penduduk-data_lahir')->with('notification-success-edit', '');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Born::findOrFail($id);
        $members = Member::where('hubungan', 'anak', $data->id);
        $residents = Resident::find($data->residents_id);

        $null = [
            'no_kk' => NULL,
        ];

        $residents->update($null);
        $members->delete();
        $data->delete();

        return back()->with('notification-success-delete', '');
    }
}
