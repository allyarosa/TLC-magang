<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'pending');
        $search = $request->get('search');

        $testimonials = Testimonial::with(['user', 'category', 'approver'])
            ->when($status === 'pending', fn($q) => $q->where('is_approved', false))
            ->when($status === 'approved', fn($q) => $q->where('is_approved', true))
            ->when($status === 'featured', fn($q) => $q->where('is_featured', true))
            ->when($search, function($q) use ($search) {
                return $q->where(function($query) use ($search) {
                    $query->where('content', 'like', "%{$search}%")
                          ->orWhereHas('user', function($userQuery) use ($search) {
                              $userQuery->where('name', 'like', "%{$search}%");
                          })
                          ->orWhereHas('category', function($catQuery) use ($search) {
                              $catQuery->where('name', 'like', "%{$search}%");
                          });
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.testimonials.index', compact('testimonials', 'status', 'search'));
    }

    public function approve(Testimonial $testimonial)
    {
        $testimonial->update([
            'is_approved' => true,
            'approved_by' => auth()->id(),
            'approved_at' => now()
        ]);

        return back()->with('success', 'Testimonial telah disetujui.');
    }

    public function feature(Testimonial $testimonial)
    {
        $testimonial->update([
            'is_featured' => !$testimonial->is_featured
        ]);

        $action = $testimonial->is_featured ? 'ditampilkan' : 'disembunyikan';
        return back()->with('success', "Testimonial telah {$action} di landing page.");
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return back()->with('success', 'Testimonial telah dihapus.');
    }
}