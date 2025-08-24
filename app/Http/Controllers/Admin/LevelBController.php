<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\CategoryB;
use App\Models\QuestionB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LevelBController extends Controller
{
    public function index()
    {
        return view('admin.level.level-b-index');
    }

    public function categoriesIndex()
    {
        $categories = CategoryB::all();

        $categoriesWithCount = $categories->map(function ($category) {
            $count = QuestionB::where('category_b_id', $category->id)->count();
            return [
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description,
                'image_url' => $category->image_url ?? 'blankCategories.jpg',
                'status' => $category->status ?? false,
                'question_count' => $count ?? 'null, data not found'
            ];
        });

        return view('admin.categories.categories-b-index', [
            'categoriesB' => $categoriesWithCount ?? 'null, data not found'
        ]);
    }

    public function categoriesEdit(string $id)
    {
        $categoriesBaseID = CategoryB::find($id);

        if (!$categoriesBaseID) {
            return redirect()->route('admin.categories.b.index')->with('error', 'Data kategori B tidak ditemukan.');
        }
        return view('admin.categories.categories-b-edit', [
            'title' => 'Edit Categories B',
            'category' => $categoriesBaseID
        ]);
    }

    public function categoriesShow(string $id)
    {
        try {
            // Find the category
            $category = CategoryB::findOrFail($id);

            // Get questions related to this category
            $questions = QuestionB::where('category_b_id', $category->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10); // Adjust pagination as needed

            // Count total questions
            $questionCount = QuestionB::where('category_b_id', $category->id)->count();

            return view('admin.categories.categories-b-show', [
                'title' => 'Detail Kategori',
                'category' => $category,
                'questions' => $questions,
                'questionCount' => $questionCount
            ]);
        } catch (ModelNotFoundException $e) {
            Log::warning('Category show failed: Category B with ID ' . $id . ' not found');
            return redirect()->route('admin.categories.b.index')
                ->with('error', 'Data kategori B tidak ditemukan.');
        } catch (Exception $e) {
            Log::error('Category show failed with exception: ' . $e->getMessage());
            return redirect()->route('admin.categories.b.index')
                ->with('error', 'Terjadi kesalahan saat menampilkan data kategori B. Silakan coba lagi.');
        }
    }

    public function categoriesUpdate(Request $request, string $id)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'image_url' => 'nullable|mimes:jpg,jpeg,png,gif,svg|max:2048',
                'status' => 'required|boolean',
            ]);

            $categoriesBaseID = CategoryB::find($id);

            if (!$categoriesBaseID) {
                Log::warning('Category update failed: Category B with ID ' . $id . ' not found');
                return redirect()->route('admin.categories.b.index')
                    ->with('error', 'Data kategori B tidak ditemukan.');
            }

            if ($request->hasFile('image_url')) {
                if (
                    $categoriesBaseID->image_url &&
                    Storage::disk('public')->exists($categoriesBaseID->image_url) &&
                    $categoriesBaseID->image_url !== 'blankCategories.jpg'
                ) {
                    Storage::disk('public')->delete($categoriesBaseID->image_url);
                }

                $imagePath = $request->file('image_url')->store('categories/images', 'public');
                $validated['image_url'] = $imagePath;
            } else {
                unset($validated['image_url']);
            }

            $categoriesBaseID->update($validated);
            $categoriesBaseID->save();

            Log::info('Category B with ID ' . $id . ' has been updated successfully by user ' . auth()->user()->id);

            DB::commit();
            Alert::success('Berhasil', 'Data kategori B berhasil diubah.');
            return redirect()->route('admin.categories.b.index')
                ->with('success', 'Data kategori B berhasil diubah.');
        } catch (ValidationException $e) {
            DB::rollBack();
            Log::error('Category update validation failed: ' . json_encode($e->errors()));
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            DB::rollback();
            Log::error('Category update failed with exception: ' . $e->getMessage());
            return redirect()->route('admin.categories.b.edit')
                ->with('error', 'Terjadi kesalahan saat mengubah data kategori B. Silakan coba lagi.');
        }
    }

    public function bankSoalIndex(Request $request)
    {
        $query = QuestionB::with('categoryB');

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('question_text', 'like', "%{$keyword}%")
                    ->orWhere('option_a', 'like', "%{$keyword}%")
                    ->orWhere('option_b', 'like', "%{$keyword}%")
                    ->orWhere('option_c', 'like', "%{$keyword}%")
                    ->orWhere('option_d', 'like', "%{$keyword}%")
                    ->orWhere('option_e', 'like', "%{$keyword}%");
            });
            $emptyStateMessage = 'Tidak ditemukan soal yang cocok dengan kata kunci: ' . $keyword;
        }

        if ($request->filled('category_id')) {
            $query->where('category_b_id', $request->category_id);
            $emptyState = CategoryB::where('id', $request->category_id)->first()->name;
            $emptyStateMessage = 'Tidak ditemukan soal dengan kategori ' . $emptyState;
        }

        $questions = $query->paginate(10)->withQueryString();

        $categories = CategoryB::all();

        $categoriesWithCount = $categories->map(function ($category) {
            $count = QuestionB::where('category_b_id', $category->id)->count();
            return [
                'name' => $category->name,
                'question_count' => $count ?? 'null, data not found',
            ];
        });

        return view('admin.questions.bankSoalBIndex', [
            'title' => 'Bank Soal Level B',
            'questions' => $questions,
            'categories' => $categories,
            'countSoal' => $categoriesWithCount,
            'emptyStateMessage' => $emptyStateMessage ?? 'Belum ada pertanyaan yang tersedia saat ini',
        ]);
    }

    public function bankSoalCreate()
    {
        $categoriesB = CategoryB::all();
        return view('admin.questions.bankSoalBCreate', [
            'title' => 'Tambah Soal Level B',
            'categoriesB' => $categoriesB,
        ]);
    }

    public function bankSoalShow(string $id)
    {
        $questionB = QuestionB::with('categoryB')->where('id', $id)->first();

        return view('admin.questions.bankSoalBShow', [
            'title' => 'Show Soal Level B',
            'questionB' => $questionB,
        ]);
    }

    public function bankSoalEdit(string $id)
    {
        $categoriesB = CategoryB::all();
        $question = QuestionB::find($id);
        $categoriesEdit = CategoryB::where('id', $question->category_b_id)->first();

        if (!$question) {
            return redirect()->route('admin.question.b.index')->with('error', 'Data soal B tidak ditemukan.');
        }

        return view('admin.questions.bankSoalBEdit', [
            'title' => 'Edit Soal Level B',
            'categoriesB' => $categoriesB,
            'question' => $question,
            'categoriesEdit' => $categoriesEdit,
        ]);
    }

    public function bankSoalStore(Request $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validate([
                'category_b_id' => 'required|exists:categories_b,id',
                'question_text' => 'required|string',
                'option_a' => 'required|string',
                'option_b' => 'required|string',
                'option_c' => 'required|string',
                'option_d' => 'required|string',
                'correct_answer' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('question_b_image', 'public');
                $validated['image'] = $path;
            }

            QuestionB::create($validated);
            DB::commit();
            Alert::success('success', 'Soal berhasil ditambahkan.');
            return redirect()->route('admin.question.b.index');
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

    public function bankSoalUpdate(Request $request, string $id)
    {
        $validated = $request->validate([
            'category_b_id' => 'required|exists:categories_b,id',
            'question_text' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_answer' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $question = QuestionB::findOrFail($id);

            if ($request->hasFile('image')) {
                if ($question->image && Storage::disk('public')->exists($question->image)) {
                    Storage::disk('public')->delete($question->image);
                }
                $path = $request->file('image')->store('question_b_image', 'public');
                $validated['image'] = $path;
            } else {
                unset($validated['image']);
            }

            $question->update($validated);
            Log::info('Question updated successfully', [
                'id' => $id,
                'user_id' => auth()->id(),
                'data' => $validated
            ]);

            DB::commit();
            Alert::success('success', 'Soal berhasil diperbarui.');
            return redirect()->route('admin.question.b.index');
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

            $questionB = QuestionB::find($id);

            if (!$questionB) {
                return redirect()->route('admin.question.b.index')->with('error', 'Soal tidak ditemukan.');
            }

            if ($questionB->image && Storage::disk('public')->exists($questionB->image)) {
                Storage::disk('public')->delete($questionB->image);
            }

            $questionB->delete();

            DB::commit();

            Alert::success('success', 'Soal berhasil dihapus.');
            return redirect()->route('admin.question.b.index');
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
