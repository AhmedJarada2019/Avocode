<?php

namespace App\Http\Controllers;

use App\Models\Intro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class IntroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.intros.index');
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

        $rules = [
            'image' => 'required|image',
        ];
        foreach (locales() as $key => $language) {
            $rules['title_' . $key] = 'required|string|max:255';
            $rules['description_' . $key] = 'required|string|max:255';
        }
        $this->validate($request, $rules);
        $data = [];
        foreach (locales() as $key => $language) {
            $data['title'][$key] = $request->get('title_' . $key);
            $data['description'][$key] = $request->get('description_' . $key);
        }
        $data['image']   = $request->image->store('dashboard/Intros', 'public');
        $data['status'] = 1;
        Intro::query()->create($data);
        if ($request->ajax()) {
            return response()->json(['status' => true]);
        }
        Session::flash('success_message', __('item_added'));
        return redirect()->route('intros.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Intro  $intro
     * @return \Illuminate\Http\Response
     */
    public function show(Intro $intro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Intro  $intro
     * @return \Illuminate\Http\Response
     */
    public function edit(Intro $intro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Intro  $intro
     * @return \Illuminate\Http\Response
     */
    public function update($uuid, Request $request)
    {
        $intro = Intro::query()->find($uuid);
        $rules = [];
        foreach (locales() as $key => $language) {
            $rules['title_' . $key] = 'required|string|max:255';
            $rules['description_' . $key] = 'required|string|max:255';
        }
        $this->validate($request, $rules);
        $data = [];
        foreach (locales() as $key => $language) {
            $data['title'][$key] = $request->get('title_' . $key);
            $data['description'][$key] = $request->get('description_' . $key);
        }
        if ($request->hasFile('image')) {
            Storage::delete('public/' . $intro->getRawOriginal('image'));
            $data['image']   = $request->image->store('dashboard/Intros', 'public');
        }
        $intro->update($data);
        if ($request->ajax()) {
            return response()->json(['status' => true]);
        }
        Session::flash('success_message', __('item_added'));
        return redirect()->route('intros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Intro  $intro
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid, Request $request)
    {
        try {
            $uus =   explode(',', $uuid);
            foreach ($uus as $uu) {
                $intro = Intro::where('uuid', $uu)->first();
                Storage::delete('public/' . $intro->getRawOriginal('image'));
            }
            $intro = Intro::whereIn('uuid', explode(',', $uuid))->delete();
        } catch (\Exception $e) {
            return response()->json(['status' => false]);
        }
        return response()->json(['status' => true]);
    }


    public function indexTable(Request $request)
    {
        $intros = Intro::query();
        return Datatables::of($intros)
            ->addColumn('action', function ($intro) {
                $data_attr = '';
                $data_attr .= 'data-uuid="' . $intro->uuid . '"';
                $data_attr .= 'data-image="' . $intro->image . '"';
                foreach (locales() as $key => $value) {
                    $data_attr .= 'data-title_' . $key . '="' . $intro->getTranslation('title', $key) . '" ';
                    $data_attr .= 'data-description_' . $key . '="' . $intro->getTranslation('description', $key) . '" ';
                }
                $string = '';
                $string .= '<button class="edit_btn btn btn-sm btn-outline-primary" data-toggle="modal"
                data-target="#edit_modal" ' . $data_attr . '>' . __('edit') . '</button>';
                $string .= ' <button type="button" id="delete" class="btn btn-sm btn-outline-danger delete-btn" data-id="' . $intro->uuid .
                    '">' . __('delete') . '</button>';
                return $string;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function updateStatus(Request $request)
    {
        $rules = [
            'ids' => 'required',
            'status' => 'required|in:0,1',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => false]);
        }
        try {
            Intro::query()->whereIn('uuid', explode(',', $request->ids))
                ->update(['status' => $request->status]);
        } catch (\Exception $e) {
            return response()->json(['status' => false]);
        }
        return response()->json(['status' => true]);
    }
}
