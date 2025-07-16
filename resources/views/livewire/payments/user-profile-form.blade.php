<div class="bg-gray-100 p-5">

    <div id="popupOverlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-xl p-8 w-full max-w-2xl max-h-[90vh] overflow-y-auto shadow-2xl slide-in relative">
            <!-- Close Button -->
            <button 
                onclick="hidePopup()" 
                class="absolute top-4 right-5 w-8 h-8 flex items-center justify-center text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-full transition-all duration-200 text-2xl"
            >
                &times;
            </button>
            
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Lengkapi Profilemu</h2>
                <p class="text-gray-600 text-sm">Sebelum melanjutkan transaksi, kamu harus melengkapi informasi data profilmu. Silahkan isi form di bawah ini:</p>
            </div>

            <!-- Form -->
            <form id="userProfileForm" onsubmit="handleSubmit(event)" class="space-y-6">
                <!-- Grid Container -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- NIK -->
                    <div class="space-y-2">
                        <label for="nik" class="block text-sm font-semibold text-gray-700">
                            NIK <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="nik" 
                            name="nik" 
                            required 
                            maxlength="16" 
                            placeholder="Masukkan NIK Anda"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all duration-200 outline-none"
                        >
                    </div>

                    <!-- NAMA LENGKAP + GELAR -->
                    <div class="space-y-2">
                        <label for="nama_depan" class="block text-sm font-semibold text-gray-700">
                            Nama Lengkap + gelar <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="nama_depan" 
                            name="nama_depan" 
                            required 
                            placeholder="user, S.T."
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all duration-200 outline-none"
                        >
                    </div>

                    <!-- Instansi -->
                    <div class="space-y-2">
                        <label for="instansi" class="block text-sm font-semibold text-gray-700">Instansi</label>
                        <select 
                            id="instansi" 
                            name="instansi" 
                            onchange="toggleCustomInstansi()"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all duration-200 outline-none bg-white"
                        >
                            <option value="">Pilih Instansi</option>
                            <option value="Pemerintah">Pemerintah</option>
                            <option value="Swasta">Swasta</option>
                            <option value="BUMN">BUMN</option>
                            <option value="TNI/Polri">TNI/Polri</option>
                            <option value="Akademisi">Akademisi</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    {{-- PROFESI --}}
                    <div class="space-y-2">
                        <label for="profesi" class="block text-sm font-semibold text-gray-700">
                            Profesi Saat Ini<span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="profesi" 
                            name="profesi" 
                            required 
                            placeholder="Profesi saat ini"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all duration-200 outline-none"
                        >
                    </div>

                    {{-- LAMA MASA KERJA --}}
                    <div class="space-y-2">
                        <label for="lama_masa_kerja" class="block text-sm font-semibold text-gray-700">
                            Lama Masa Kerja<span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="lama_masa_kerja" 
                            name="lama_masa_kerja" 
                            required 
                            placeholder="Lama masa kerja anda"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all duration-200 outline-none"
                        >
                    </div>

                    <!-- CUSTOM INSTANSI -->
                    <div id="customInstansiGroup" class="space-y-2 hidden">
                        <label for="custom_instansi" class="block text-sm font-semibold text-gray-700">Instansi Lainnya</label>
                        <input 
                            type="text" 
                            id="custom_instansi" 
                            name="custom_instansi" 
                            placeholder="Sebutkan instansi lainnya"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all duration-200 outline-none"
                        >
                    </div>

                    <!-- TEMPAT LAHIR -->
                    <div class="space-y-2">
                        <label for="tempat_lahir" class="block text-sm font-semibold text-gray-700">Tempat Lahir</label>
                        <input 
                            type="text" 
                            id="tempat_lahir" 
                            name="tempat_lahir" 
                            placeholder="Masukkan tempat lahir"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all duration-200 outline-none"
                        >
                    </div>

                    <!-- TANGGAL LAHIR -->
                    <div class="space-y-2">
                        <label for="tanggal_lahir" class="block text-sm font-semibold text-gray-700">Tanggal Lahir</label>
                        <input 
                            type="date" 
                            id="tanggal_lahir" 
                            name="tanggal_lahir"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all duration-200 outline-none"
                        >
                    </div>

                    <!-- JENIS KELAMIN -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700">Jenis Kelamin</label>
                        <div class="flex gap-6 mt-2">
                            <div class="flex items-center gap-2">
                                <input 
                                    type="radio" 
                                    id="laki_laki" 
                                    name="jenis_kelamin" 
                                    value="L"
                                    class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500"
                                >
                                <label for="laki_laki" class="text-sm text-gray-700">Laki-laki</label>
                            </div>
                            <div class="flex items-center gap-2">
                                <input 
                                    type="radio" 
                                    id="perempuan" 
                                    name="jenis_kelamin" 
                                    value="P"
                                    class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500"
                                >
                                <label for="perempuan" class="text-sm text-gray-700">Perempuan</label>
                            </div>
                        </div>
                    </div>

                    <!-- NO WA -->
                    <div class="space-y-2">
                        <label for="no_wa" class="block text-sm font-semibold text-gray-700">No. WhatsApp</label>
                        <input 
                            type="tel" 
                            id="no_wa" 
                            name="no_wa" 
                            placeholder="Contoh: 08123456789"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all duration-200 outline-none"
                        >
                    </div>

                    <!-- Provinsi -->
                    <div class="space-y-2">
                        <label for="provinsi" class="block text-sm font-semibold text-gray-700">Provinsi</label>
                        <select 
                            id="provinsi" 
                            name="provinsi"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all duration-200 outline-none bg-white"
                        >
                            <option value="">Pilih Provinsi</option>
                            <option value="DKI Jakarta">DKI Jakarta</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="Jawa Timur">Jawa Timur</option>
                            <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                            <option value="Sumatera Utara">Sumatera Utara</option>
                            <option value="Sumatera Barat">Sumatera Barat</option>
                            <option value="Riau">Riau</option>
                            <option value="Jambi">Jambi</option>
                            <option value="Sumatera Selatan">Sumatera Selatan</option>
                            <option value="Bengkulu">Bengkulu</option>
                            <option value="Lampung">Lampung</option>
                            <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
                            <option value="Kepulauan Riau">Kepulauan Riau</option>
                            <option value="Banten">Banten</option>
                            <option value="DI Yogyakarta">DI Yogyakarta</option>
                            <option value="Bali">Bali</option>
                            <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                            <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                            <option value="Kalimantan Barat">Kalimantan Barat</option>
                            <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                            <option value="Kalimantan Timur">Kalimantan Timur</option>
                            <option value="Kalimantan Utara">Kalimantan Utara</option>
                            <option value="Sulawesi Utara">Sulawesi Utara</option>
                            <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                            <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                            <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                            <option value="Gorontalo">Gorontalo</option>
                            <option value="Sulawesi Barat">Sulawesi Barat</option>
                            <option value="Maluku">Maluku</option>
                            <option value="Maluku Utara">Maluku Utara</option>
                            <option value="Papua">Papua</option>
                            <option value="Papua Barat">Papua Barat</option>
                            <option value="Papua Selatan">Papua Selatan</option>
                            <option value="Papua Tengah">Papua Tengah</option>
                            <option value="Papua Pegunungan">Papua Pegunungan</option>
                            <option value="Papua Barat Daya">Papua Barat Daya</option>
                        </select>
                    </div>

                    <!-- Kabupaten -->
                    <div class="space-y-2">
                        <label for="kabupaten" class="block text-sm font-semibold text-gray-700">Kabupaten/Kota</label>
                        <input 
                            type="text" 
                            id="kabupaten" 
                            name="kabupaten" 
                            placeholder="Masukkan kabupaten/kota"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all duration-200 outline-none"
                        >
                    </div>

                    <!-- Kecamatan -->
                    <div class="space-y-2">
                        <label for="kecamatan" class="block text-sm font-semibold text-gray-700">Kecamatan</label>
                        <input 
                            type="text" 
                            id="kecamatan" 
                            name="kecamatan" 
                            placeholder="Masukkan kecamatan"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all duration-200 outline-none"
                        >
                    </div>

                    <!-- Kelurahan -->
                    <div class="space-y-2">
                        <label for="kelurahan" class="block text-sm font-semibold text-gray-700">Kelurahan/Desa</label>
                        <input 
                            type="text" 
                            id="kelurahan" 
                            name="kelurahan" 
                            placeholder="Masukkan kelurahan/desa"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all duration-200 outline-none"
                        >
                    </div>
                </div>

                <!-- Profile Image - Full Width -->
                <div class="space-y-2">
                    <label for="profile_image" class="block text-sm font-semibold text-gray-700">Foto Profile</label>
                    <input 
                        type="file" 
                        id="profile_image" 
                        name="profile_image" 
                        accept="image/*"
                        class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all duration-200 outline-none bg-gray-50 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                    >
                    <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, GIF. Maksimal 2MB</p>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col md:flex-row gap-4 justify-end pt-6 border-t border-gray-200">
                    <button 
                        type="button" 
                        onclick="hidePopup()" 
                        class="w-full md:w-auto px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white rounded-lg font-semibold transition-all duration-200 order-2 md:order-1"
                    >
                        Batal
                    </button>
                    <button 
                        type="submit" 
                        class="w-full md:w-auto px-6 py-3 bg-indigo-500 hover:bg-indigo-600 text-white rounded-lg font-semibold transition-all duration-200 transform hover:-translate-y-0.5 hover:shadow-lg hover:shadow-indigo-500/30 order-1 md:order-2"
                    >
                        Simpan Profile
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showPopup() {
            document.getElementById('popupOverlay').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function hidePopup() {
            document.getElementById('popupOverlay').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function toggleCustomInstansi() {
            const instansi = document.getElementById('instansi').value;
            const customGroup = document.getElementById('customInstansiGroup');
            
            if (instansi === 'Lainnya') {
                customGroup.classList.remove('hidden');
                document.getElementById('custom_instansi').required = true;
            } else {
                customGroup.classList.add('hidden');
                document.getElementById('custom_instansi').required = false;
                document.getElementById('custom_instansi').value = '';
            }
        }

        function handleSubmit(event) {
            event.preventDefault();
            
            // Validasi NIK
            const nik = document.getElementById('nik').value;
            if (nik.length !== 16) {
                alert('NIK harus terdiri dari 16 digit');
                return;
            }

            // Validasi No WhatsApp
            const noWa = document.getElementById('no_wa').value;
            if (noWa && !noWa.match(/^[0-9+\-\s]+$/)) {
                alert('Format nomor WhatsApp tidak valid');
                return;
            }

            // Validasi file size
            const fileInput = document.getElementById('profile_image');
            if (fileInput.files[0] && fileInput.files[0].size > 2 * 1024 * 1024) {
                alert('Ukuran file maksimal 2MB');
                return;
            }

            // Simulasi pengiriman data
            const formData = new FormData(event.target);
            
            // Show loading state
            const submitBtn = event.target.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Menyimpan...';
            submitBtn.disabled = true;
            
            // Simulasi delay untuk demo
            setTimeout(() => {
                // Dalam implementasi nyata, kirim data ke server Laravel
                console.log('Data yang akan dikirim:');
                for (let [key, value] of formData.entries()) {
                    console.log(key + ': ' + value);
                }
                
                alert('Profile berhasil disimpan!');
                hidePopup();
                
                // Reset form dan button
                event.target.reset();
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                
                // Reset custom instansi field
                document.getElementById('customInstansiGroup').classList.add('hidden');
            }, 1500);
        }

        // Close popup when clicking outside
        document.getElementById('popupOverlay').addEventListener('click', function(e) {
            if (e.target === this) {
                hidePopup();
            }
        });

        // Close popup with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                hidePopup();
            }
        });

        // File input preview (optional enhancement)
        document.getElementById('profile_image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Check file size
                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file maksimal 2MB');
                    this.value = '';
                    return;
                }
                
                // Check file type
                const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                if (!validTypes.includes(file.type)) {
                    alert('Format file harus JPG, PNG, atau GIF');
                    this.value = '';
                    return;
                }
            }
        });
    </script>
</div>