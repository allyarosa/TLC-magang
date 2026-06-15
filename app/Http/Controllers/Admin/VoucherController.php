<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use App\Services\VoucherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoucherController extends Controller
{
    protected VoucherService $voucherService;

    public function __construct(VoucherService $voucherService)
    {
        $this->voucherService = $voucherService;
    }

    public function index()
    {
        $vouchers = Voucher::with('creator')->latest()->paginate(15);
        return view('admin.vouchers.index', compact('vouchers'));
    }

    public function create()
    {
        return view('admin.vouchers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code'        => 'nullable|string|unique:vouchers,code|max:50',
            'type'        => 'required|in:fully_funded,partial_funded,discount',
            'value'       => 'nullable|numeric|min:0',
            'max_uses'    => 'nullable|integer|min:1',
            'valid_from'  => 'nullable|date',
            'valid_until' => 'nullable|date|after_or_equal:valid_from',
            'is_active'   => 'boolean',
        ]);

        if ($data['type'] === 'discount' && empty($data['value'])) {
            return back()->withInput()->withErrors(['value' => 'Nilai diskon wajib diisi untuk tipe diskon ini.']);
        }

        $data['is_active'] = $request->has('is_active');

        $this->voucherService->createVoucher($data, Auth::id());

        return redirect()->route('admin.vouchers.index')->with('success', 'Voucher berhasil ditambahkan.');
    }

    public function edit(Voucher $voucher)
    {
        return view('admin.vouchers.edit', compact('voucher'));
    }

    public function update(Request $request, Voucher $voucher)
    {
        $data = $request->validate([
            'type'        => 'required|in:fully_funded,partial_funded,discount',
            'value'       => 'nullable|numeric|min:0',
            'max_uses'    => 'nullable|integer|min:1',
            'valid_from'  => 'nullable|date',
            'valid_until' => 'nullable|date|after_or_equal:valid_from',
            'is_active'   => 'boolean',
        ]);

        if ($data['type'] === 'discount' && empty($data['value'])) {
            return back()->withInput()->withErrors(['value' => 'Nilai diskon wajib diisi untuk tipe diskon ini.']);
        }

        $data['is_active'] = $request->has('is_active');

        $voucher->update($data);

        return redirect()->route('admin.vouchers.index')->with('success', 'Voucher berhasil diperbarui.');
    }

    public function destroy(Voucher $voucher)
    {
        $voucher->delete();
        return redirect()->route('admin.vouchers.index')->with('success', 'Voucher berhasil dihapus.');
    }
}
