<div class="lg:col-span-4">
    <h3 class="text-lg font-display font-bold text-gray-800 mb-2 tracking-wide">RIWAYAT TRANSAKSI</h3>
    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-outline-variant/10">
        <div class="divide-y divide-slate-100 min-h-[200px] flex flex-col">
            @forelse ($transactions as $item)
                @php
                    $url = '#';
                    $target = '';
                    if ($item->status === 'success') {
                        $url = route('asesi.transaksi.invoice', \Vinkla\Hashids\Facades\Hashids::encode($item->id));
                        $target = 'target="_blank"';
                    } elseif (in_array($item->status, ['pending', 'waiting_confirmation', 'failed'])) {
                        $url = route('payments.detail', \Vinkla\Hashids\Facades\Hashids::encode($item->id));
                    }
                @endphp
                <a href="{{ $url }}" {!! $target !!} class="block p-4 hover:bg-slate-50/80 transition-all duration-200 group">
                    <div class="flex justify-between items-center">
                        <div class="space-y-1">
                            <p class="text-sm font-bold text-gray-700 group-hover:text-brandBlue transition-colors">
                                {{ $item->level ? 'Level ' . $item->level->level_name : 'Pembayaran' }}
                            </p>
                            <p class="text-[10px] text-gray-500 flex items-center gap-1.5">
                                <span>{{ $item->payment_time ? \Carbon\Carbon::parse($item->payment_time)->translatedFormat('d M Y') : $item->created_at->translatedFormat('d M Y') }}</span>
                                <span>·</span>
                                <span class="font-mono font-semibold text-gray-400">{{ $item->order_id ?? '#TLC-' . $item->id }}</span>
                            </p>
                        </div>
                        <div class="flex flex-col items-end gap-1.5">
                            <span class="text-xs font-bold text-gray-800">
                                Rp {{ number_format($item->amount, 0, ',', '.') }}
                            </span>
                            @if ($item->status === 'success')
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-green-50 text-green-700 border border-green-200/50 uppercase">
                                    Sukses
                                </span>
                            @elseif ($item->status === 'pending')
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-200/50 uppercase">
                                    Pending
                                </span>
                            @elseif ($item->status === 'waiting_confirmation')
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-blue-50 text-blue-700 border border-blue-200/50 uppercase">
                                    Verifikasi
                                </span>
                            @elseif ($item->status === 'failed')
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-red-50 text-red-700 border border-red-200/50 uppercase">
                                    Gagal
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-gray-50 text-gray-700 border border-gray-200/50 uppercase">
                                    {{ $item->status }}
                                </span>
                            @endif
                        </div>
                    </div>
                </a>
            @empty
                <div class="px-8 text-center flex flex-col items-center justify-center py-4 flex-1">
                    <div class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 mb-4 border border-dashed border-slate-200">
                        <span class="material-symbols-outlined text-2xl text-gray-400">payments</span>
                    </div>
                    <h4 class="font-bold text-gray-700 text-sm">Belum Ada Transaksi</h4>
                    <p class="text-xs text-gray-500 max-w-[200px] mt-1 mx-auto">
                        Riwayat pembayaran sertifikasi Anda akan muncul di sini setelah Anda melakukan pendaftaran.
                    </p>
                </div>
            @endforelse
        </div>
        <a href="{{ route('asesi.transaksi') }}" class="block w-full text-center py-3 text-xs font-bold text-outline hover:bg-slate-50 border-t border-slate-100 transition-colors uppercase tracking-wider text-brandBlue">
            Lihat Semua Transaksi
        </a>
    </div>
</div>
