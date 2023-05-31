<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ads.index');
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
    public function store(Request $request)
    {
        foreach (locales() as $key => $language) {
            $rules['image_' . $key] = 'required|image';
        }
        $this->validate($request, $rules);
        $data = [];
        foreach (locales() as $key => $language) {
            $data['image'][$key] = $request->file('image_' . $key)->store('dashboard/Ads', 'public');
        }
        Ad::query()->create($data);
        if ($request->ajax()) {
            return response()->json(['status' => true]);
        }
        Session::flash('success_message', __('item_added'));
        return redirect()->route('Ads.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update($uuid, Request $request)
    {
        $ad = Ad::query()->find($uuid);
        $rules = [];
        foreach (locales() as $key => $language) {
            $rules['image_' . $key] = 'required|image';
        }
        $this->validate($request, $rules);
        $data = [];
        foreach (locales() as $key => $language) {
            $data['image'][$key] = $request->get('image_' . $key);
            if ($request->hasFile('image_' . $key)) {
                Storage::exists('public/' . $ad->getRawOriginal('image_' . $key));
                (Storage::exists('public/' . $ad->getRawOriginal('image_' . $key)));
                $data['image'][$key]   = $request->file('image_' . $key)->store('dashboard/Ads', 'public');
            }
        }
        $ad->update($data);
        if ($request->ajax()) {
            return response()->json(['status' => true]);
        }
        Session::flash('success_message', __('item_added'));
        return redirect()->route('Ads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid, Ad $ad)
    {
        try {
            $uus =   explode(',', $uuid);
            foreach ($uus as $uu) {
                $Ad = Ad::where('uuid', $uu)->first();
                foreach (locales() as $key => $value) {
                    Storage::delete('public/' . $Ad->getTranslation('image', $key));
                }
            }
            $intro = Ad::whereIn('uuid', explode(',', $uuid))->delete();
        } catch (\Exception $e) {
            return response()->json(['status' => false]);
        }
        return response()->json(['status' => true]);
    }


    public function indexTable(Request $request)
    {
        $ads = Ad::query();
        return DataTables::of($ads)
            ->addColumn('action', function ($ad) {
                $data_attr = '';
                $data_attr .= 'data-uuid="' . $ad->uuid . '"';
                foreach (locales() as $key => $value) {
                    $data_attr .= 'data-image_' . $key . '="' . $ad->getTranslation('image', $key) . '" ';
                }
                $string = '';
                $string .= '<button class="edit_btn btn btn-sm btn-outline-primary" data-toggle="modal"
                data-target="#edit_modal" ' . $data_attr . '>' . __('edit') . '</button>';
                $string .= ' <button type="button" id="delete" class="btn btn-sm btn-outline-danger delete-btn" data-id="' . $ad->uuid .
                    '">' . __('delete') . '</button>';
                return $string;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
