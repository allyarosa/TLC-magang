<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\CategoryA;
use App\Models\QuestionA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionARequest;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LevelAController extends Controller
{
    public function index()
    {
        return view('admin.level.level-a-index');
    }

    public function categoriesIndex()
    {
        $categories = CategoryA::all();

        $categoriesWithCount = $categories->map(function ($category) {
            $count = QuestionA::where('category_a_id', $category->id)->count();
            return [
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description,
                'banner_img' => $category->banner_img ?? 'blankCategories.jpg',
                'time_limit' => $category->time_limit ?? 0,
                'is_locked' => $category->is_locked ?? false,
                'passing_score' => $category->passing_score ?? 0,
                'question_count' => $count ?? 'null, data not found'
            ];
        });

        return view('admin.categories.categories-a-index', [
            'categoriesA' => $categoriesWithCount ?? 'null, data not found'
        ]);
    }

    public function categoriesEdit(string $id)
    {
        $categoriesBaseID = CategoryA::find($id);

        if (!$categoriesBaseID) {
            return redirect()->route('admin.categories.a.index')->with('error', 'Data kategori A tidak ditemukan.');
        }
        return view('admin.categories.categories-a-edit', [
            'title' => 'Edit Categories A',
            'category' => $categoriesBaseID
        ]);
    }

    public function categoriesShow(string $id)
    {
        try {
            // Find the category
            $category = CategoryA::findOrFail($id);

            // Get questions related to this category
            $questions = QuestionA::where('category_a_id', $category->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10); // Adjust pagination as needed

            // Count total questions
            $questionCount = QuestionA::where('category_a_id', $category->id)->count();

            return view('admin.categories.categories-a-show', [
                'title' => 'Detail Kategori',
                'category' => $category,
                'questions' => $questions,
                'questionCount' => $questionCount
            ]);
        } catch (ModelNotFoundException $e) {
            Log::warning('Category show failed: Category A with ID ' . $id . ' not found');
            return redirect()->route('admin.categories.a.index')
                ->with('error', 'Data kategori A tidak ditemukan.');
        } catch (Exception $e) {
            Log::error('Category show failed with exception: ' . $e->getMessage());
            return redirect()->route('admin.categories.a.index')
                ->with('error', 'Terjadi kesalahan saat menampilkan data kategori A. Silakan coba lagi.');
        }
    }

    public function categoriesUpdate(Request $request, string $id)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'banner_img' => 'nullable|mimes:jpg,jpeg,png,gif,svg|max:2048',
                'time_limit' => 'required|integer',
                'is_locked' => 'required|boolean',
                'passing_score' => 'required|integer'
            ]);

            $categoriesBaseID = CategoryA::find($id);

            if (!$categoriesBaseID) {
                Log::warning('Category update failed: Category A with ID ' . $id . ' not found');
                return redirect()->route('admin.categories.a.index')
                    ->with('error', 'Data kategori A tidak ditemukan.');
            }

            if ($request->hasFile('banner_img')) {
                if (
                    $categoriesBaseID->banner_img &&
                    Storage::disk('public')->exists($categoriesBaseID->banner_img) &&
                    $categoriesBaseID->banner_img !== 'blankCategories.jpg'
                ) {
                    Storage::disk('public')->delete($categoriesBaseID->banner_img);
                }

                $imagePath = $request->file('banner_img')->store('categories/images', 'public');
                $validated['banner_img'] = $imagePath;
            } else {
                unset($validated['banner_img']);
            }

            $categoriesBaseID->update($validated);
            $categoriesBaseID->save();

            Log::info('Category A with ID ' . $id . ' has been updated successfully by user ' . auth()->user()->id);

            DB::commit();
            Alert::success('Berhasil', 'Data kategori A berhasil diubah.');
            return redirect()->route('admin.categories.a.index')
                ->with('success', 'Data kategori A berhasil diubah.');

        } catch (ValidationException $e) {
            DB::rollBack();
            Log::error('Category update validation failed: ' . json_encode($e->errors()));
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            DB::rollback();
            Log::error('Category update failed with exception: ' . $e->getMessage());
            return redirect()->route('admin.categories.a.edit')
                ->with('error', 'Terjadi kesalahan saat mengubah data kategori A. Silakan coba lagi.');
        }
    }

    public function bankSoalIndex(Request $request)
    {
        $query = QuestionA::with('categoryA');

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('question_text', 'like', "%{$keyword}%")
                    ->orWhere('option_a', 'like', "%{$keyword}%")
                    ->orWhere('option_b', 'like', "%{$keyword}%")
                    ->orWhere('option_c', 'like', "%{$keyword}%")
                    ->orWhere('option_d', 'like', "%{$keyword}%");
            });
            $emptyStateMessage = 'Tidak ditemukan soal yang cocok dengan kata kunci: ' . $keyword;
        }

        if ($request->filled('category_id')) {
            $query->where('category_a_id', $request->category_id);
            $emptyState = CategoryA::where('id', $request->category_id)->first()->name;
            $emptyStateMessage = 'Tidak ditemukan soal dengan kategori ' . $emptyState;
        }

        $questions = $query->paginate(10)->withQueryString();

        $categories = CategoryA::all();

        $categoriesWithCount = $categories->map(function ($category) {
            $count = QuestionA::where('category_a_id', $category->id)->count();
            return [
                'name' => $category->name,
                'question_count' => $count ?? 'null, data not found',
            ];
        });

        return view('admin.questions.bankSoalIndex', [
            'title' => 'Bank Soal Level A',
            'questions' => $questions,
            'categories' => $categories, //
            'countSoal' => $categoriesWithCount,
            'emptyStateMessage' => $emptyStateMessage ?? 'Belum ada pertanyaan yang tersedia saat ini',
        ]);
    }

    public function bankSoalCreate()
    {
        $categoriesA = CategoryA::all();
        return view('admin.questions.bankSoalCreate', [
            'title' => 'Tambah Soal Level A',
            'categoriesA' => $categoriesA,
        ]);
    }

    public function bankSoalShow(string $id)
    {
        $categoriesA = QuestionA::with('categoryA')->where('id', $id)->first();

        return view('admin.questions.bankSoalShow', [
            'title' => 'Show Soal Level A',
            'questionA' => $categoriesA,
        ]);
    }

    public function bankSoalEdit(string $id)
    {
        $categoriesA = CategoryA::all();
        $question = QuestionA::find($id);
        $categoriesEdit = CategoryA::where('id', $question->category_a_id)->first();

        if (!$question) {
            return redirect()->route('admin.question.a.index')->with('error', 'Data soal A tidak ditemukan.');
        }

        return view('admin.questions.bankSoalEdit', [
            'title' => 'Edit Soal Level A',
            'categoriesA' => $categoriesA,
            'question' => $question,
            'categoriesEdit' => $categoriesEdit,
        ]);
    }

    public function bankSoalStore(QuestionARequest $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('question_a_image', 'public');
                $validated['image'] = $path; // simpan path ke dalam kolom database
            }

            QuestionA::create($validated);
            DB::commit();
            Alert::success('success', 'Soal berhasil ditambahkan.');
            return redirect()->route('admin.question.a.index');

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error adding soal', [
                'error_message' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan soal.');
        }
    }

    public function bankSoalUpdate(QuestionARequest $request, string $id)
    {
        $validated = $request->validated();

        DB::beginTransaction();

        try {
            $question = QuestionA::findOrFail($id);

            $question->update($validated);
            Log::info('Question updated successfully', [
                'id' => $id,
                'user_id' => auth()->id(),
                'data' => $validated
            ]);

            DB::commit();
            Alert::success('success', 'Soal berhasil ditambahkan.');
            return redirect()->route('admin.question.a.index');

        } catch (Exception $e) {

            DB::rollBack();

            Log::error('Failed to update question', [
                'id' => $id,
                'user_id' => auth()->id(),
                'error' => $e->getMessage()
            ]);

            return redirect()->back()->with('error', 'Failed to update question');
        }
    }

    public function bankSoalDestroy(string $id)
    {
        try {
            DB::beginTransaction();

            $questionA = QuestionA::find($id)->first();

            $questionData = [
                'id' => $questionA->id,
                'title' => $questionA->title ?? 'N/A',
                'had_image' => !empty($questionA->image)
            ];

            if ($questionA->image && Storage::exists($questionA->image)) {
                Storage::delete($questionA->image);
            }

            $questionA->delete();

            DB::commit();

            Alert::success('success', 'Soal berhasil dihapus.');
            return redirect()->route('admin.question.a.index');

        } catch (Exception $e) {
            DB::rollBack();

            Log::error('Failed to delete question', [
                'id' => $id,
                'user_id' => auth()->id(),
                'error_message' => $e->getMessage(),
                'error_trace' => $e->getTraceAsString(),
                'timestamp' => now()
            ]);

            Alert::error('error', 'Gagal menghapus soal.');
            return back()->with('error', 'Gagal menghapus soal: ' . $e->getMessage());
        }
    }
}