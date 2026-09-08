<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\AuditLog;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $query = Message::query();

        if ($request->filled('search')) {
            $s = $request->input('search');
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%{$s}%")
                  ->orWhere('email', 'like', "%{$s}%")
                  ->orWhere('subject', 'like', "%{$s}%")
                  ->orWhere('message', 'like', "%{$s}%");
            });
        }

        if ($request->filled('status') && $request->input('status') !== 'all') {
            $query->where('status', $request->input('status'));
        }

        $messages = $query->latest()->paginate(12)->withQueryString();
        $unreadCount = Message::where('status', 'unread')->count();

        return view('admin.messages.index', compact('messages', 'unreadCount'));
    }

    public function show($id)
    {
        $message = Message::findOrFail($id);
        if ($message->status === 'unread') {
            $message->status = 'read';
            $message->save();
        }
        return view('admin.messages.show', compact('message'));
    }

    public function update(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $status = $request->input('status', 'read');
        $message->status = $status;
        if ($status === 'replied') {
            $message->replied_by = session('user_id');
            $message->replied_at = now();
        }
        $message->save();

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'update_message_status',
            'description' => "Memperbarui status pesan dari '{$message->name}' menjadi {$status}.",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->back()->with('success', "Status pesan berhasil diubah menjadi {$status}!");
    }

    public function destroy(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $sender = $message->name;
        $message->delete();

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'delete_message',
            'description' => "Menghapus pesan dari '{$sender}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.messages.index')->with('success', 'Pesan berhasil dihapus!');
    }
}
