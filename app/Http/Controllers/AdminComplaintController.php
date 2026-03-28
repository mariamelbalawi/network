<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;

class AdminComplaintController extends Controller
{
    public function index(Request $request)
    {
        $query = Complaint::with('user');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $complaints = $query->latest()->get();

        return view('complaintsa', compact('complaints'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:new,in_progress,done',
            'admin_note' => 'nullable|string',
        ]);

        $complaint = Complaint::findOrFail($id);

        $complaint->status = $request->status;

        if (Schema::hasColumn('complaints', 'admin_note')) {
            $complaint->admin_note = $request->admin_note;
        }

        $complaint->save();

        return redirect()
            ->route('admin.complaints.index')
            ->with('success', 'تم تحديث حالة الشكوى بنجاح');
    }

    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id);

        if ($complaint->attachment && Storage::disk('public')->exists($complaint->attachment)) {
            Storage::disk('public')->delete($complaint->attachment);
        }

        $complaint->delete();

        return redirect()
            ->route('admin.complaints.index')
            ->with('success', 'تم حذف الشكوى بنجاح');
    }
}