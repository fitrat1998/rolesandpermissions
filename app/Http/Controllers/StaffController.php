<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::all();

        return view('staffs.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('staffs.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStaffRequest $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
        ], [
            'name.required' => 'F.I.Sh majburiy maydon.',
            'name.string' => 'F.I.Sh faqat matn bo‘lishi kerak.',
            'name.min' => 'F.I.Sh kamida 3 ta belgi bo‘lishi kerak.',
            'name.max' => 'F.I.Sh 255 ta belgidan oshmasligi kerak.',
        ]);

        $staff = Staff::create([
            'fullname' => $request->name,
        ]);

        return redirect()->route('staffs.index')->with('success', "Xodim muvaffaqiyatli qo‘shildi");


    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $staff = Staff::find($id);

        return view('staffs.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStaffRequest $request, $id)
    {
        $staff = Staff::find($id);

//        dd($request);

        $staff->update([
            'fullname' => $request->name,
        ]);

        if ($staff) {
            return redirect()->route('staffs.index')->with('success', "Xodim muvaffaqiyatli tahrirlandi");
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $staff = Staff::find($id);

        if ($staff) {
            $staff = Staff::find($id)->delete();
            return redirect()->route('staffs.index')->with('success', "Xodim muvaffaqiyatli o'chirildi");
        }
        return redirect()->back();
    }
}
