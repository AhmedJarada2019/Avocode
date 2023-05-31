<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::query()->get();
        return view('admin.subcategories.index', compact('categories'));
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
            'category_uuid' => 'required'
        ];
        foreach (locales() as $key => $language) {
            $rules['name_' . $key] = 'required|string|max:255';
        }
        $this->validate($request, $rules);
        $data = [];
        foreach (locales() as $key => $language) {
            $data['name'][$key] = $request->get('name_' . $key);
        }
        $data['image']   = $request->image->store('dashboard/SubCategories', 'public');
        $data['category_uuid'] = $request->category_uuid;
        SubCategory::query()->create($data);
        if ($request->ajax()) {
            return response()->json(['status' => true]);
        }
        Session::flash('success_message', __('item_added'));
        return redirect()->route('sub-categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update($uuid, Request $request)
    {
        $subCategory = SubCategory::query()->find($uuid);
        $rules = [
            'category_uuid' => 'required'
        ];
        foreach (locales() as $key => $language) {
            $rules['name_' . $key] = 'required|string|max:255';
        }
        $this->validate($request, $rules);
        $data = [];
        foreach (locales() as $key => $language) {
            $data['name'][$key] = $request->get('name_' . $key);
        }
        if ($request->hasFile('image')) {
            Storage::delete('public/' . $subCategory->getRawOriginal('image'));
            $data['image']   = $request->image->store('dashboard/SubCategories', 'public');
        }
        $data['category_uuid'] = $request->category_uuid;
        $subCategory->update($data);
        if ($request->ajax()) {
            return response()->json(['status' => true]);
        }
        Session::flash('success_message', __('item_added'));
        return redirect()->route('sub-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid, SubCategory $subCategory)
    {
        try {
            $uus =   explode(',', $uuid);
            foreach ($uus as $uu) {
                $subCategory = SubCategory::where('uuid', $uu)->first();
                Storage::delete('public/' . $subCategory->getRawOriginal('image'));
            }
            $subCategory = SubCategory::whereIn('uuid', explode(',', $uuid))->delete();
        } catch (\Exception $e) {
            return response()->json(['status' => false]);
        }
        return response()->json(['status' => true]);
    }

    public function indexTable(Request $request)
    {
        $subCategories = SubCategory::query()->with('category');
        return DataTables::of($subCategories)
            ->addColumn('category_name', function ($subCategory) {
                return @$subCategory->category->name;
            })
            ->addColumn('status_text', function ($subCategory) {
                return $this->status($subCategory);
            })

            ->addColumn('action', function ($subCategory) {
                $data_attr = '';
                $data_attr .= 'data-uuid="' . $subCategory->uuid . '"';
                $data_attr .= 'data-image="' . $subCategory->image . '"';
                foreach (locales() as $key => $value) {
                    $data_attr .= 'data-name_' . $key . '="' . $subCategory->getTranslation('name', $key) . '" ';
                }
                $data_attr .= 'data-category_uuid="' . $subCategory->category_uuid . '"';

                $string = '';
                $string .= '<button class="edit_btn btn btn-sm btn-outline-primary" data-toggle="modal"
                data-target="#edit_modal" ' . $data_attr . '>' . __('edit') . '</button>';
                $string .= ' <button type="button" id="delete" class="btn btn-sm btn-outline-danger delete-btn" data-id="' . $subCategory->uuid .
                    '">' . __('delete') . '</button>';
                return $string;
            })

            ->rawColumns(['category_name', 'status_text',  'action'])
            ->make(true);
    }
}
