<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = User::orderBy('created_at', 'desc')->get();
        return view('settings.staffs.index', compact('staffs'));
    }

    public function create()
    {
        return view('settings.staffs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'position' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'status' => 'boolean',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'position' => $request->position,
            'department' => $request->department,
            'status' => $request->has('status'),
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('settings.staffs.index')
                        ->with('success', 'Staff member created successfully.');
    }

    public function show($id)
    {
        $staff = User::findOrFail($id);
        return view('settings.staffs.show', compact('staff'));
    }

    public function edit($id)
    {
        $staff = User::findOrFail($id);
        return view('settings.staffs.edit', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $staff = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'position' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'status' => 'boolean',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'position' => $request->position,
            'department' => $request->department,
            'status' => $request->has('status'),
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $staff->update($updateData);

        return redirect()->route('settings.staffs.index')
                        ->with('success', 'Staff member updated successfully.');
    }

    public function destroy($id)
    {
        $staff = User::findOrFail($id);
        $staff->delete();

        return redirect()->route('settings.staffs.index')
                        ->with('success', 'Staff member deleted successfully.');
    }
}
