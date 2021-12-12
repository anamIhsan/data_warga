<?php

namespace App\Http\Controllers\kelola_data;

use App\Http\Controllers\Controller;
use App\Models\FamilyCard;
use App\Models\Member;
use App\Models\Resident;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($url)
    {
        $kk = FamilyCard::findOrFail($url);
        $residents = Resident::all();
        $members = Member::all();

        return view('pages.kelola_data.data-kartu-keluarga.detail', [
            'kk' => $kk,
            'residents' => $residents,
            'members' => $members,
        ]);
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
    public function store(Request $request, $id)
    {
        $request->validate([
            'residents_id' => 'required|unique:members,residents_id',
            'hubungan' => 'required'
        ]);
        
        $data = $request->all();
        $residents = Resident::findOrFail($request->residents_id);
        $kk = FamilyCard::find($request->familyCards_id);

        $update = [
            'no_kk' => $kk->no_kk,
        ];

        $residentsPr = Resident::where('gender', 'PR')->get();

        foreach ($residentsPr as $pr) {
            if ($request->hubungan === 'Istri'){
                if ($residents->gender != $pr->gender) {
                    return back()->with('notification-success-failed', ''); 
                }
            }
        }

        $residents->update($update);
        Member::create($data);
        
        return back()->with('notification-success-add', '');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Member::findOrFail($id);
        $residents = Resident::find($data->residents_id);

        $null = [
            'no_kk' => NULL,
        ];

        $residents->update($null);
        $data->delete();
        return back()->with('notification-success-delete', '');
    }
}
