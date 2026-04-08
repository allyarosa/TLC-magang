<div>
    <div class="group flex items-start rounded-2xl border border-transparent px-4 py-2">
        <div>
            <p class="text-xs font-bold uppercase tracking-widest text-brandBlue">Telepon</p>
            <p class="mt-1 text-base  text-slate-700">
                {{ $phoneNumber ?? 'nomor belum tersedia' }}</p>
        </div>
    </div>

    <div class="group flex items-start rounded-2xl border border-transparent px-4 py-2">
        <div>
            <p class="text-xs font-bold uppercase tracking-widest text-brandBlue">Email</p>
            <p class="mt-1 text-base text-slate-700">
                {{ $email ?? 'Email belum tersedia' }}</p>
        </div>
    </div>

    <div class="group flex items-start gap-4 rounded-2xl border border-transparent px-4 py-2">
        <div>
            <p class="text-xs font-bold uppercase tracking-widest text-brandBlue">Alamat</p>
            <p class="mt-1 text-base text-slate-700">
                {!! $address ?? 'Alamat belum tersedia' !!}</p>
        </div>
    </div>
</div>
