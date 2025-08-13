<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\CategoryC;
use App\Models\QuestionC;
use App\Models\LevelCHistory;
use App\Models\LevelCSubmission; // Added missing import
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreAssessmentRequestC;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LevelCController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $levelCHistories = LevelCHistory::with('user')
            ->when($search, function ($query) use ($search) {
                $query->whereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->paginate(10);

        return view('admin.level.level-c-index', compact('levelCHistories'));
    }

    public function categoriesIndex()
    {
        $categories = CategoryC::all();

        $categoriesWithCount = $categories->map(function ($category) {
            $count = QuestionC::where('category_c_id', $category->id)->count();
            return [
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description,
                'image_url' => $category->image_url ?? 'blankCategories.jpg',
                'status' => $category->status ?? false,
                'question_count' => $count ?? 'null, data not found'
            ];
        });

        return view('admin.categories.categories-c-index', [
            'categoriesC' => $categoriesWithCount ?? 'null, data not found'
        ]);
    }

    public function categoriesEdit(string $id)
    {
        $categoriesBaseID = CategoryC::find($id);

        if (!$categoriesBaseID) {
            return redirect()->route('admin.categories.c.index')->with('error', 'Data kategori C tidak ditemukan.');
        }
        return view('admin.categories.categories-c-edit', [
            'title' => 'Edit Categories C',
            'category' => $categoriesBaseID
        ]);
    }

    public function categoriesShow(string $id)
    {
        try {
            // Find the category
            $category = CategoryC::findOrFail($id);

            // Get questions related to this category
            $questions = QuestionC::where('category_c_id', $category->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10); // Adjust pagination as needed

            // Count total questions
            $questionCount = QuestionC::where('category_c_id', $category->id)->count();

            return view('admin.categories.categories-c-show', [
                'title' => 'Detail Kategori',
                'category' => $category,
                'questions' => $questions,
                'questionCount' => $questionCount
            ]);
        } catch (ModelNotFoundException $e) {
            Log::warning('Category show failed: Category C with ID ' . $id . ' not found');
            return redirect()->route('admin.categories.c.index')
                ->with('error', 'Data kategori C tidak ditemukan.');
        } catch (Exception $e) {
            Log::error('Category show failed with exception: ' . $e->getMessage());
            return redirect()->route('admin.categories.c.index')
                ->with('error', 'Terjadi kesalahan saat menampilkan data kategori C. Silakan coba lagi.');
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

            $categoriesBaseID = CategoryC::find($id);

            if (!$categoriesBaseID) {
                Log::warning('Category update failed: Category C with ID ' . $id . ' not found');
                return redirect()->route('admin.categories.c.index')
                    ->with('<error></error>', 'Data kategori C tidak ditemukan.');
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

            Log::info('Category C with ID ' . $id . ' has been updated successfully by user ' . auth()->user()->id);

            DB::commit();
            Alert::success('Berhasil', 'Data kategori C berhasil diubah.');
            return redirect()->route('admin.categories.c.index')
                ->with('success', 'Data kategori C berhasil diubah.');
        } catch (ValidationException $e) {
            DB::rollBack();
            Log::error('Category update validation failed: ' . json_encode($e->errors()));
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            DB::rollback();
            Log::error('Category update failed with exception: ' . $e->getMessage());
            return redirect()->route('admin.categories.c.edit')
                ->with('error', 'Terjadi kesalahan saat mengubah data kategori C. Silakan coba lagi.');
        }
    }

    public function instructionEssay()
    {
        return view('user.sertifikasi.levelC.ESSAY.instruction');
    }

    public function instructionVideoUpload()
    {
        return view('user.sertifikasi.levelC.VIDEO.instruction');
    }

    public function instruction(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|numeric',
            'user_id' => 'required|numeric',
        ]);

        if ($validated['category_id'] == 1) {
            return view('user.sertifikasi.levelC.ESSAY.instruction', [
                'user_id' => $validated['user_id'],
            ]);
        } else if ($validated['category_id'] == 2) {
            return view('user.sertifikasi.levelC.VIDEO.instruction', [
                'user_id' => $validated['user_id'],
            ]);
        }
    }

    public function formEssay()
    {
        return view('user.sertifikasi.levelC.ESSAY.form');
    }

    public function formVideoUpload()
    {
        return view('user.sertifikasi.levelC.VIDEO.form');
    }

    public function storeVideoSubmission(Request $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'video_url' => 'required|url',
                'description' => 'required|string|min:10|max:500',
            ]);

            $userId = Auth::id();
            $user = Auth::user();

            // Validate YouTube URL format
            $youtubeRegex = '/^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.?be)\/.+$/';
            if (!preg_match($youtubeRegex, $validated['video_url'])) {
                throw new \Exception('URL harus berupa link YouTube yang valid');
            }

            // Create submission record
            $levelC = LevelCSubmission::create([
                'user_id' => $userId,
                'category' => 'video',
                'url_video' => $validated['video_url'],
                'description' => $validated['description'],
                'status' => 'pending',
            ]);

            $user->givePermissionTo('VIDEO_UPLOAD');

            DB::commit();

            Alert::success('Video pembelajaran berhasil dikirim. Silahkan tunggu pengecekan oleh Asesor.');
            return redirect()->route('asesi.sertifikasi');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::channel('level_c')->error('Failed to store Level C video submission', [
                'user_id' => $userId ?? null,
                'error_message' => $e->getMessage(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal mengirim video pembelajaran: ' . $e->getMessage());
        }
    }

    public function storeSubmission(StoreAssessmentRequestC $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $user = Auth::user();

            // Create submission record
            $levelC = LevelCSubmission::create([
                'user_id' => $user->id,
                'category' => 'video',
                'url_video' => $validated['url_video'],
                'description' => $validated['description'],
                'status' => 'pending',
            ]);
            DB::commit();
            $user->givePermissionTo('VIDEO_UPLOAD');

            Alert::success('Berhasil Dikirim', 'Silahkan tunggu pengecekan oleh Asesor.');
            return redirect()->route('asesi.sertifikasi');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::channel('level_c')->error('Failed to store Level C submission', [
                'user_id' => $user->id ?? null,
                'error_message' => $e->getMessage(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error', 'Gagal mengirim permohonan sertifikasi Level C: ' . $e->getMessage());
        }
    }

    public function bankSoalIndex(Request $request)
    {
        $query = QuestionC::with('categoryC');

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('question', 'like', "%{$keyword}%");
            });
            $emptyStateMessage = 'Tidak ditemukan soal yang cocok dengan kata kunci: ' . $keyword;
        }

        if ($request->filled('category_id')) {
            $query->where('category_c_id', $request->category_id);
            $emptyState = CategoryC::where('id', $request->category_id)->first()->name;
            $emptyStateMessage = 'Tidak ditemukan soal dengan kategori ' . $emptyState;
        }

        $questions = $query->paginate(10)->withQueryString();

        $categories = CategoryC::all();

        $categoriesWithCount = $categories->map(function ($category) {
            $count = QuestionC::where('category_c_id', $category->id)->count();
            return [
                'name' => $category->name,
                'question_count' => $count ?? 'null, data not found',
            ];
        });

        return view('admin.questions.bankSoalCIndex', [
            'title' => 'Bank Soal Level C',
            'questions' => $questions,
            'categories' => $categories,
            'countSoal' => $categoriesWithCount,
            'emptyStateMessage' => $emptyStateMessage ?? 'Belum ada pertanyaan yang tersedia saat ini',
        ]);
    }

    public function bankSoalCreate()
    {
        $categoriesC = CategoryC::all();
        return view('admin.questions.bankSoalCCreate', [
            'title' => 'Tambah Soal Level C',
            'categoriesC' => $categoriesC,
        ]);
    }

    public function bankSoalShow(string $id)
    {
        $questionC = QuestionC::with('categoryC')->where('id', $id)->first();

        return view('admin.questions.bankSoalCShow', [
            'title' => 'Show Soal Level C',
            'questionC' => $questionC,
        ]);
    }

    public function bankSoalEdit(string $id)
    {
        $categoriesC = CategoryC::all();
        $question = QuestionC::find($id);
        $categoriesEdit = CategoryC::where('id', $question->category_c_id)->first();

        if (!$question) {
            return redirect()->route('admin.question.c.index')->with('error', 'Data soal C tidak ditemukan.');
        }

        return view('admin.questions.bankSoalCEdit', [
            'title' => 'Edit Soal Level C',
            'categoriesC' => $categoriesC,
            'question' => $question,
            'categoriesEdit' => $categoriesEdit,
        ]);
    }

    public function bankSoalStore(Request $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validate([
                'category_c_id' => 'required|exists:categories_c,id',
                'question' => 'required|string', // Fixed: removed comma, added arrow
                'order' => 'required|integer',
                'is_active' => 'required|boolean',
                'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('image_url')) {
                $path = $request->file('image_url')->store('question_c_image', 'public');
                $validated['image_url'] = $path;
            }

            QuestionC::create($validated);
            DB::commit();
            Alert::success('success', 'Soal berhasil ditambahkan.');
            return redirect()->route('admin.question.c.index');
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
            'category_c_id' => 'required|exists:categories_c,id',
            'question' => 'required|string',
            'order' => 'required|integer',
            'is_active' => 'required|boolean',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $question = QuestionC::findOrFail($id);

            if ($request->hasFile('image_url')) {
                if ($question->image_url && Storage::disk('public')->exists($question->image_url)) {
                    Storage::disk('public')->delete($question->image_url);
                }
                $path = $request->file('image_url')->store('question_c_image', 'public');
                $validated['image_url'] = $path;
            } else {
                unset($validated['image_url']);
            }

            $question->update($validated);
            Log::info('Question updated successfully', [
                'id' => $id,
                'user_id' => auth()->id(),
                'data' => $validated // Fixed: changed from 'error' to 'data'
            ]);

            DB::commit();
            Alert::success('success', 'Soal berhasil diperbarui.');
            return redirect()->route('admin.question.c.index');
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

            $questionC = QuestionC::find($id);

            if (!$questionC) {
                return redirect()->route('admin.question.c.index')->with('error', 'Soal tidak ditemukan.');
            }

            if ($questionC->image_url && Storage::disk('public')->exists($questionC->image_url)) {
                Storage::disk('public')->delete($questionC->image_url);
            }

            $questionC->delete();

            DB::commit();

            Alert::success('success', 'Soal berhasil dihapus.');
            return redirect()->route('admin.question.c.index');
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
