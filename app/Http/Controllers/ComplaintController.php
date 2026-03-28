<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.complaints', compact('complaints'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'type' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'attachment' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf,doc,docx', 'max:5120'],
        ]);

        $attachmentPath = null;

        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('complaints', 'public');
        }

        Complaint::create([
            'title' => $validated['title'],
            'type' => $validated['type'] ?? null,
            'description' => $validated['description'],
            'attachment' => $attachmentPath,
            'user_id' => Auth::id(),
            'status' => 'new',
            'admin_note' => null,
        ]);

        return redirect()
            ->route('user.complaints')
            ->with('success', 'تم إرسال الشكوى بنجاح');
    }

    public function destroy($id)
    {
        $complaint = Complaint::where('user_id', Auth::id())->findOrFail($id);

        if ($complaint->attachment && Storage::disk('public')->exists($complaint->attachment)) {
            Storage::disk('public')->delete($complaint->attachment);
        }

        $complaint->delete();

        return redirect()
            ->route('user.complaints')
            ->with('success', 'تم حذف الشكوى بنجاح');
    }
}