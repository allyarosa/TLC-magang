<div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Provinsi -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Provinsi</label>
            <select wire:model.live="province_id" class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">Pilih Provinsi</option>
                @if(is_array($provinces))
                    @foreach($provinces as $prov)
                        <option value="{{ $prov['id'] }}" wire:key="province-{{ $prov['id'] }}">
                            {{ $prov['name'] }}
                        </option>
                    @endforeach
                @endif
            </select>
            @error('province_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Kabupaten/Kota -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kabupaten/Kota</label>
            <select wire:model.live="regency_id"
                    class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    {{ empty($regencys) ? 'disabled' : '' }}>
                <option value="">Pilih Kabupaten/Kota</option>
                @if(is_array($regencys) && count($regencys) > 0)
                    @foreach($regencys as $kab)
                        <option value="{{ $kab['id'] }}" wire:key="regency-{{ $kab['id'] }}">
                            {{ $kab['name'] }}
                        </option>
                    @endforeach
                @endif
            </select>
            @error('regency_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Kecamatan -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kecamatan</label>
            <select wire:model.live="district_id"
                    class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    {{ empty($districts) ? 'disabled' : '' }}>
                <option value="">Pilih Kecamatan</option>
                @if(is_array($districts) && count($districts) > 0)
                    @foreach($districts as $kec)
                        <option value="{{ $kec['id'] }}" wire:key="district-{{ $kec['id'] }}">
                            {{ $kec['name'] }}
                        </option>
                    @endforeach
                @endif
            </select>
            @error('district_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Kelurahan/Desa -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kelurahan/Desa</label>
            <select wire:model.live="village_id"
                    class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    {{ empty($villages) ? 'disabled' : '' }}>
                <option value="">Pilih Kelurahan/Desa</option>
                @if(is_array($villages) && count($villages) > 0)
                    @foreach($villages as $desa)
                        <option value="{{ $desa['id'] }}" wire:key="village-{{ $desa['id'] }}">
                            {{ $desa['name'] }}
                        </option>
                    @endforeach
                @endif
            </select>
            @error('village_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
    </div>

    <!-- Hidden inputs to pass data to the parent form -->
    <input type="hidden" name="province_id" value="{{ $province_id }}">
    <input type="hidden" name="regency_id" value="{{ $regency_id }}">
    <input type="hidden" name="district_id" value="{{ $district_id }}">
    <input type="hidden" name="village_id" value="{{ $village_id }}">

    <!-- Debug info (hapus setelah testing) -->
    <div class="mt-4 text-sm text-gray-600">
        <p>Province ID: {{ $province_id ?? 'null' }}</p>
        <p>Regency ID: {{ $regency_id ?? 'null' }}</p>
        <p>District ID: {{ $district_id ?? 'null' }}</p>
        <p>Village ID: {{ $village_id ?? 'null' }}</p>
        <p>Regencys count: {{ count($regencys ?? []) }}</p>
        <p>Districts count: {{ count($districts ?? []) }}</p>
        <p>Villages count: {{ count($villages ?? []) }}</p>
    </div>
</div>
