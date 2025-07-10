<?php

namespace App\Http\Controllers;

use Log;
use App\Models\ExamA;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{

    public function showForm(Request $request)
    {
        $examId = $request->exam_id;
        $categoryId = $request->category_id;

        // Validasi exam milik user dan sudah lulus
        $exam = ExamA::where('id', $examId)
                    ->where('user_id', Auth::id())
                    ->where('is_passed', true)
                    ->firstOrFail();

        // Cek apakah sudah pernah memberikan testimonial
        $existingTestimonial = Testimonial::where('user_id', Auth::id())
            ->where('category_a_id', $categoryId)
            ->exists();

        if ($existingTestimonial) {
            return redirect()->back()->with('error', 'Anda sudah memberikan testimonial untuk kategori ini.');
        }

        // Redirect kembali dengan flag untuk menampilkan form
        return redirect()->back()->with('show_testimonial_form', true);
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'content' => 'required|min:10|max:2000',
    //         'rating' => 'nullable|integer|between:1,5',
    //         'exam_a_id' => 'required|exists:exams_a,id',
    //         'category_a_id' => 'required|exists:categories_a,id'
    //     ]);

    //     $exam = ExamA::findOrFail($request->exam_a_id);

    //     // Pastikan user sudah lulus ujian ini
    //     if ($exam->user_id !== Auth::id() || $exam->is_passed !== 1) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Anda tidak memiliki akses untuk memberikan testimonial pada ujian ini.'
    //         ], 403);
    //     }

    //     // Cek apakah user sudah pernah memberikan testimonial untuk kategori ini
    //     $existingTestimonial = Testimonial::where('user_id', Auth::id())
    //         ->where('category_a_id', $request->category_a_id)
    //         ->exists();

    //     if ($existingTestimonial) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Anda sudah memberikan testimonial untuk kategori ini.'
    //         ], 422);
    //     }

    //     try {
    //         $testimonial = Testimonial::create([
    //             'user_id' => Auth::id(),
    //             'category_a_id' => $request->category_a_id,
    //             'exam_a_id' => $request->exam_a_id,
    //             'content' => $request->content,
    //             'rating' => $request->rating ?? 5,
    //             'is_approved' => false
    //         ]);

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Testimonial berhasil dikirim. Menunggu persetujuan admin.',
    //             'testimonial' => $testimonial
    //         ]);

    //     } catch (\Exception $e) {
    //         Log::error('Error creating testimonial: ' . $e->getMessage());

    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Terjadi kesalahan saat menyimpan testimonial. Silakan coba lagi.'
    //         ], 500);
    //     }
    // }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required|min:10|max:2000',
            'rating' => 'required|integer|between:1,5',
            'exam_a_id' => 'required|exists:exams_a,id',
            'category_a_id' => 'required|exists:categories_a,id'
        ], [
            'content.required' => 'Testimonial harus diisi.',
            'content.min' => 'Testimonial minimal 10 karakter.',
            'content.max' => 'Testimonial maksimal 2000 karakter.',
            'rating.required' => 'Rating harus dipilih.',
            'rating.between' => 'Rating harus antara 1-5.',
            'exam_a_id.required' => 'Data ujian tidak valid.',
            'exam_a_id.exists' => 'Data ujian tidak ditemukan.',
            'category_a_id.required' => 'Data kategori tidak valid.',
            'category_a_id.exists' => 'Data kategori tidak ditemukan.'
        ]);

        $exam = ExamA::findOrFail($request->exam_a_id);

        // Validasi keamanan
        if ($exam->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk memberikan testimonial pada ujian ini.');
        }

        if (!$exam->is_passed) {
            return redirect()->back()->with('error', 'Testimonial hanya dapat diberikan untuk ujian yang lulus.');
        }

        // Cek apakah user sudah pernah memberikan testimonial untuk kategori ini
        $existingTestimonial = Testimonial::where('user_id', Auth::id())
            ->where('category_a_id', $request->category_a_id)
            ->exists();

        if ($existingTestimonial) {
            return redirect()->back()->with('error', 'Anda sudah memberikan testimonial untuk kategori ini.');
        }

        try {
            $testimonial = Testimonial::create([
                'user_id' => Auth::id(),
                'category_a_id' => $request->category_a_id,
                'exam_a_id' => $request->exam_a_id,
                'content' => $validatedData['content'],
                'rating' => $validatedData['rating'],
                'is_approved' => false
            ]);

            Log::info('Testimonial created successfully', [
                'user_id' => Auth::id(),
                'testimonial_id' => $testimonial->id,
                'category_a_id' => $request->category_a_id,
                'exam_a_id' => $request->exam_a_id
            ]);

            return redirect()->back()->with('testimonial_success', 'Testimonial berhasil dikirim dan menunggu persetujuan admin. Terima kasih!');

        } catch (\Exception $e) {
            Log::error('Error creating testimonial', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan testimonial. Silakan coba lagi.');
        }
    }
}
