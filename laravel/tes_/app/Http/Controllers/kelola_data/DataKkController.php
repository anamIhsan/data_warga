<?php

namespace App\Http\Controllers\kelola_data;

use App\Http\Controllers\Controller;
use App\Http\Requests\KkRequest;
use App\Models\FamilyCard;
use App\Models\Member;
use App\Models\Resident;
use Illuminate\Http\Request;

class DataKkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kk = FamilyCard::all();

        return view('pages.kelola_data.data-kartu-keluarga.index', [
            'kk' => $kk
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kk = FamilyCard::all();
        $residents = Resident::all();
        $members = Member::all();

        return view('pages.kelola_data.data-kartu-keluarga.create', [
            'kk' => $kk,
            'residents' => $residents,
            'members' => $members
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KkRequest $request)
    {
        $data = $request->all();
        $kk = FamilyCard::create($data);
        $id = Resident::find($request->kepala_keluarga);

        $create = [
            'residents_id' => $request->kepala_keluarga,
            'familyCards_id' => $kk->id,
        ];

        $update = [
            'no_kk' => $request->no_kk,
        ];
        $id->update($update);

        Member::create($create);

        return redirect()->route('kelola_data-data_kartu_keluarga')->with('notification-success-add', '');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $url = action([MemberController::class, 'index'], ['id' => $id]);
        
        return redirect($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = FamilyCard::findOrFail($id);
        $residents = Resident::all();

        return view('pages.kelola_data.data-kartu-keluarga.edit', [
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
    public function update(KkRequest $request, $id)
    {
        $kk = FamilyCard::findOrFail($id);
        $member = Member::where('familyCards_id', $id)->first();
        $before_residents = Resident::findOrFail($member->residents_id);
        $residents = Resident::findOrFail($request->kepala_keluarga);
        
        $update = [
            'residents_id' => $request->kepala_keluarga
        ];
        
        if ($before_residents->id != $request->kepala_keluarga) {
            $updateSebelum = [
                'no_kk' => NULL,
            ];
            $resident_update = [
                'no_kk' => $request->no_kk,
            ];
            $before_residents->update($updateSebelum);
            $residents->update($resident_update);
        }

        $member->update($update);
        $kk->update($request->all());
        return redirect()->route('kelola_data-data_kartu_keluarga')->with('notification-success-edit', '');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = FamilyCard::findOrFail($id);
        $residents = Resident::where('no_kk', $data->no_kk);

        $null = [
            'no_kk' => NULL,
        ];

        $residents->update($null);
        $data->members()->delete();
        $data->delete();
        return back()->with('notification-success-delete', '');  
    }
}
