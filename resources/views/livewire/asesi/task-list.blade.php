<div class="flex-1 ml-0 md:ml-64 pt-10 px-6 md:px-12 pb-12 min-h-screen">
    <!-- Header Section -->
    @if ($batch)
        <div class="mb-10 max-w-8xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-6">
                <div>
                    <h1 class="text-4xl font-bold text-brandBlue-dark/90 tracking-tight">
                        {{ $batch->name }} : Implementasi HOTS di Kelas
                    </h1>
                </div>
            </div>

            <!-- Status Tabs -->
            <div class="flex border-b border-gray-300 mb-8 overflow-x-auto hide-scrollbar">
                <button wire:click="changeTab('belum_dikerjakan')"
                    class="px-6 py-4 text-sm uppercase tracking-wider font-semibold {{ $activeTab === 'belum_dikerjakan' ? 'text-cyan-700 border-b-2 border-cyan-700' : 'text-brandBlue-dark' }}">
                    Belum Dikerjakan
                </button>

                <button wire:click="changeTab('sudah_dikirim')"
                    class="px-6 py-4 text-sm uppercase tracking-wider font-semibold {{ $activeTab === 'sudah_dikirim' ? 'text-cyan-700 border-b-2 border-cyan-700' : 'text-brandBlue-dark' }}">
                    Sudah Dikirim
                </button>

                 <button wire:click="changeTab('sudah_dikerjakan')"
                    class="px-6 py-4 text-sm uppercase tracking-wider font-semibold {{ $activeTab === 'sudah_dikerjakan' ? 'text-cyan-700 border-b-2 border-cyan-700' : 'text-brandBlue-dark' }}">
                    Sudah Selesai
                </button>
            </div>
            <!-- Session Alerts -->
            @if (session()->has('success'))
                <div class="mb-6 bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r-xl shadow-sm flex items-center gap-3 animate__animated animate__fadeIn">
                    <span class="material-symbols-outlined text-emerald-600 text-2xl">check_circle</span>
                    <div>
                        <p class="font-semibold text-emerald-800">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-xl shadow-sm flex items-center gap-3 animate__animated animate__fadeIn">
                    <span class="material-symbols-outlined text-red-600 text-2xl">error</span>
                    <div>
                        <p class="font-semibold text-red-800">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <!-- Bento Grid Layout for Content -->
            <div class="grid grid-cols-1 gap-8">
                <!-- Left Column: Task Details (8 cols) -->
                <div class="lg:col-span-8 flex flex-col gap-6">
                    <!-- DETAIL MAIN CARD -->
                    @if ($activeTab === 'belum_dikerjakan')
                        @forelse ($notDoneTask as $data)
                            <div class="bg-white rounded-xl shadow-ambient p-8 border-ghost mb-10">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-full bg-brandGreen/30 flex items-center justify-center text-brandGreen-dark">
                                            <span class="material-symbols-outlined"
                                                data-icon="description">description</span>
                                        </div>
                                        <h2 class="text-xl font-headline font-semibold text-brandBlue-dark/90">
                                            Penugasan {{ $data->title }}
                                        </h2>
                                    </div>
                                    <div
                                        class="flex items-center gap-2.5 bg-brandBlue-dark/90 px-4 py-2 rounded-lg w-fit shadow-md">
                                        <p class="text-sm font-label text-white font-medium">
                                            Batas Pengumpulan: <span class="font-medium text-accent">{{ $data->ends_at->timezone('Asia/Makassar')->locale('id')->isoFormat('dddd, D MMMM YYYY, HH:mm') }} WITA</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="max-w-none font-body leading-relaxed ">

                                   <p class="text-gray-800">
                                     {!! $data->body !!}
                                   </p>

                                    <div class="bg-gray-100 p-2 rounded-lg mt-6 border-l-4 border-brandBlue">
                                        <h4 class="font-semibold text-gray-800 mb-2">Persyaratan Pengumpulan :</h4>
                                        <ul class="list-disc pl-5 space-y-1 text-sm">
                                            <li class="text-gray-800">Format file: PDF atau Word (.doc, .docx)</li>
                                            <li class="text-gray-800">Maksimal ukuran file: 10MB</li>
                                        </ul>
                                    </div>
                                    
                                    <!-- Interactive Upload Dropzone -->
                                    <div class="pt-8" x-data="{ 
                                        isDragging: false, 
                                        fileName: '', 
                                        fileSize: '',
                                        isUploading: false,
                                        uploadProgress: 0,
                                        triggerSelect() {
                                            this.$refs.fileInput.click();
                                        },
                                        handleFileSelect(event) {
                                            const files = event.target.files;
                                            if (files.length > 0) {
                                                this.uploadFile(files[0]);
                                            }
                                        },
                                        handleDrop(event) {
                                            this.isDragging = false;
                                            const files = event.dataTransfer.files;
                                            if (files.length > 0) {
                                                this.uploadFile(files[0]);
                                            }
                                        },
                                        uploadFile(file) {
                                            const allowedTypes = ['.pdf', '.doc', '.docx'];
                                            const extension = '.' + file.name.split('.').pop().toLowerCase();
                                            if (!allowedTypes.includes(extension)) {
                                                alert('Format file tidak didukung. Harap unggah berkas PDF atau Word (.doc, .docx).');
                                                return;
                                            }
                                            if (file.size > 10 * 1024 * 1024) {
                                                alert('Ukuran file melebihi batas maksimal 10MB.');
                                                return;
                                            }

                                            this.fileName = file.name;
                                            this.fileSize = (file.size / 1024 / 1024).toFixed(2) + ' MB';
                                            this.isUploading = true;
                                            this.uploadProgress = 0;

                                            @this.upload('files.' + {{ $data->id }}, file, 
                                                (uploadedName) => {
                                                    this.isUploading = false;
                                                    this.uploadProgress = 100;
                                                }, 
                                                () => {
                                                    this.isUploading = false;
                                                    this.fileName = '';
                                                    this.fileSize = '';
                                                    alert('Gagal mengunggah file.');
                                                }, 
                                                (event) => {
                                                    this.uploadProgress = event.detail.progress;
                                                }
                                            );
                                        }
                                    }">
                                        <div 
                                            @click="triggerSelect"
                                            @dragover.prevent="isDragging = true"
                                            @dragleave.prevent="isDragging = false"
                                            @drop.prevent="handleDrop"
                                            :class="isDragging ? 'border-brandBlue bg-blue-100/50' : 'border-outline-variant bg-blue-50'"
                                            class="border-2 border-dashed rounded-xl flex flex-col items-center justify-center transition-colors cursor-pointer group p-6"
                                            id="dropzone-{{ $data->id }}">
                                            
                                            <input accept=".pdf,.doc,.docx" class="hidden" x-ref="fileInput" @change="handleFileSelect" type="file">
                                            
                                            <div class="rounded-full bg-surface-container-lowest shadow-sm flex items-center justify-center group-hover:scale-110 transition-transform duration-300 w-10 h-10 mb-2">
                                                <span class="material-symbols-outlined text-primary text-xl" data-icon="cloud_upload">cloud_upload</span>
                                            </div>
                                            
                                            <template x-if="!fileName">
                                                <div class="text-center">
                                                    <p class="text-gray-800 font-medium mb-2">Drag &amp; drop file Anda di sini</p>
                                                    <p class="text-gray-800 text-sm mb-2">atau</p>
                                                    <button type="button" class="px-6 py-2 rounded-lg border border-outline-variant bg-white text-gray-800 font-medium hover:bg-surface-container-high transition-colors text-sm">
                                                        Pilih File dari Perangkat
                                                    </button>
                                                </div>
                                            </template>
                                            
                                            <template x-if="fileName">
                                                <div class="text-center w-full max-w-xs">
                                                    <div class="flex items-center justify-center gap-2 mb-2">
                                                        <span class="material-symbols-outlined text-brandBlue">description</span>
                                                        <span class="text-gray-800 font-semibold truncate text-sm" x-text="fileName"></span>
                                                    </div>
                                                    <p class="text-xs text-gray-500 mb-2" x-text="fileSize"></p>
                                                    
                                                    <template x-if="isUploading">
                                                        <div class="w-full bg-gray-200 rounded-full h-1.5 dark:bg-gray-700 mt-2">
                                                            <div class="bg-brandBlue h-1.5 rounded-full" :style="'width: ' + uploadProgress + '%'"></div>
                                                        </div>
                                                    </template>
                                                    
                                                    <template x-if="!isUploading">
                                                        <span class="text-xs text-brandGreen font-medium flex items-center justify-center gap-1">
                                                            <span class="material-symbols-outlined text-xs">check_circle</span> Berkas siap dikirim
                                                        </span>
                                                    </template>
                                                </div>
                                            </template>
                                        </div>
                                        
                                        @error('files.' . $data->id)
                                            <p class="text-red-500 text-xs mt-2 font-medium">{{ $message }}</p>
                                        @enderror

                                        <div class="mt-4 flex justify-end" x-show="fileName" x-transition>
                                            <button 
                                                wire:click="submitTask({{ $data->id }})"
                                                :disabled="isUploading"
                                                :class="isUploading ? 'opacity-50 cursor-not-allowed' : 'hover:brightness-110'"
                                                class="px-6 py-2 rounded-lg bg-brandBlue text-white font-headline font-semibold shadow-md transition-all focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-surface-container-lowest"
                                                id="submitBtn-{{ $data->id }}">Submit Tugas
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <x-asesi.empty-state-card 
                                title="Tugas Belum Tersedia"
                                message="Saat ini belum ada tugas baru yang diterbitkan untuk Anda. Silakan periksa kembali halaman ini secara berkala."
                                icon="assignment_late" 
                                type="info" 
                            />
                        @endforelse
                    @elseif ($activeTab === 'sudah_dikerjakan')
                        @forelse ($doneTasks as $submission)
                            <div class="bg-white rounded-xl shadow-ambient p-8 border-ghost mb-10">
                                <!-- Banners Status: Berhasil Dikirim -->
                                <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 mb-6 rounded-r-xl">
                                    <div class="flex items-center gap-3">
                                        <span class="material-symbols-outlined text-emerald-600 text-2xl">check_circle</span>
                                        <div>
                                            <p class="font-semibold text-emerald-800">Tugas Berhasil Dikirim!</p>
                                            <p class="text-xs text-emerald-700">Anda masih dapat memperbarui jawaban sebelum
                                                batas pengumpulan atau batas maksimal pengiriman tercapai.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-brandGreen/30 flex items-center justify-center text-brandGreen-dark">
                                            <span class="material-symbols-outlined" data-icon="description">description</span>
                                        </div>
                                        <h2 class="text-xl font-headline font-semibold text-brandBlue-dark/90">
                                            Penugasan {{ $submission->task->title }}
                                        </h2>
                                    </div>
                                    <div class="flex items-center gap-2.5 bg-brandBlue-dark/90 px-4 py-2 rounded-lg w-fit shadow-md">
                                        <p class="text-sm font-label text-white font-medium">
                                            Batas Pengumpulan: <span class="font-bold text-accent">{{ $submission->task->ends_at->timezone('Asia/Makassar')->locale('id')->isoFormat('dddd, D MMMM YYYY, HH:mm') }} WITA</span>
                                        </p>
                                    </div>
                                </div>

                                <div class="max-w-none font-body leading-relaxed mb-6 text-gray-800">
                                    {!! $submission->task->body !!}
                                </div>

                                <!-- Detail File Terkirim -->
                                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 mb-8">
                                    <h4 class="font-semibold text-gray-800 mb-3 text-sm uppercase tracking-wider">Berkas Terkirim</h4>
                                    <div class="flex items-center justify-between bg-white p-4 rounded-lg border border-gray-150">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-red-50 text-red-500 rounded flex items-center justify-center border border-red-100 font-bold text-xs uppercase">
                                                {{ pathinfo($submission->file_path, PATHINFO_EXTENSION) }}
                                            </div>
                                            <div>
                                                <p class="text-sm font-semibold text-gray-800">{{ basename($submission->file_path) }}</p>
                                                <p class="text-xs text-gray-500">Dikirim pada: {{ $submission->submitted_at->timezone('Asia/Makassar')->locale('id')->isoFormat('D MMMM YYYY, HH:mm') }} WITA</p>
                                            </div>
                                        </div>
                                        <button wire:click="download({{ $submission->id }})"
                                            class="flex items-center gap-1.5 px-3 py-1.5 border border-gray-300 rounded-lg text-xs font-semibold text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                            <span class="material-symbols-outlined text-sm">download</span>
                                            Unduh File
                                        </button>
                                    </div>
                                    <div class="mt-4 text-xs text-gray-600 flex items-center gap-1.5">
                                        <span class="material-symbols-outlined text-sm text-brandBlue">cached</span>
                                        <span>Jumlah pengumpulan: <strong class="text-gray-800">{{ $submission->submission_count }} dari {{ $submission->task->max_submissions }} kali</strong> batas maksimal.</span>
                                    </div>
                                </div>

                                <!-- Upload Ulang Form -->
                                <div class="pt-6 border-t border-gray-100" x-data="{ 
                                    isDragging: false, 
                                    fileName: '', 
                                    fileSize: '',
                                    isUploading: false,
                                    uploadProgress: 0,
                                    triggerSelect() {
                                        this.$refs.fileInput.click();
                                    },
                                    handleFileSelect(event) {
                                        const files = event.target.files;
                                        if (files.length > 0) {
                                            this.uploadFile(files[0]);
                                        }
                                    },
                                    handleDrop(event) {
                                        this.isDragging = false;
                                        const files = event.dataTransfer.files;
                                        if (files.length > 0) {
                                            this.uploadFile(files[0]);
                                        }
                                    },
                                    uploadFile(file) {
                                        const allowedTypes = ['.pdf', '.doc', '.docx'];
                                        const extension = '.' + file.name.split('.').pop().toLowerCase();
                                        if (!allowedTypes.includes(extension)) {
                                            alert('Format file tidak didukung. Harap unggah berkas PDF atau Word (.doc, .docx).');
                                            return;
                                        }
                                        if (file.size > 10 * 1024 * 1024) {
                                            alert('Ukuran file melebihi batas maksimal 10MB.');
                                            return;
                                        }

                                        this.fileName = file.name;
                                        this.fileSize = (file.size / 1024 / 1024).toFixed(2) + ' MB';
                                        this.isUploading = true;
                                        this.uploadProgress = 0;

                                        @this.upload('files.' + {{ $submission->task_id }}, file, 
                                            (uploadedName) => {
                                                this.isUploading = false;
                                                this.uploadProgress = 100;
                                            }, 
                                            () => {
                                                this.isUploading = false;
                                                this.fileName = '';
                                                this.fileSize = '';
                                                alert('Gagal mengunggah file.');
                                            }, 
                                            (event) => {
                                                this.uploadProgress = event.detail.progress;
                                            }
                                        );
                                    }
                                }">
                                    <h4 class="font-semibold text-gray-800 mb-3 text-sm">Ingin Memperbarui Jawaban?</h4>
                                    <div 
                                        @click="triggerSelect"
                                        @dragover.prevent="isDragging = true"
                                        @dragleave.prevent="isDragging = false"
                                        @drop.prevent="handleDrop"
                                        :class="isDragging ? 'border-brandBlue bg-blue-100/50' : 'border-gray-300 bg-gray-50'"
                                        class="border-2 border-dashed rounded-xl flex flex-col items-center justify-center transition-colors cursor-pointer group p-6 hover:bg-blue-50/20 hover:border-brandBlue/50"
                                        id="dropzone-update-{{ $submission->task_id }}">
                                        
                                        <input accept=".pdf,.doc,.docx" class="hidden" x-ref="fileInput" @change="handleFileSelect" type="file">
                                        
                                        <div class="rounded-full bg-white shadow-sm flex items-center justify-center group-hover:scale-110 transition-transform duration-300 w-10 h-10 mb-2 border border-gray-100">
                                            <span class="material-symbols-outlined text-brandBlue text-xl">cloud_upload</span>
                                        </div>
                                        
                                        <template x-if="!fileName">
                                            <div class="text-center">
                                                <p class="text-gray-800 text-sm font-medium mb-1">Drag &amp; drop berkas baru di sini untuk mengganti</p>
                                                <p class="text-gray-400 text-xs mb-2">Maksimal ukuran file: 10MB (PDF, Word)</p>
                                                <button type="button" class="px-4 py-1.5 rounded-lg border border-gray-300 bg-white text-gray-700 font-medium hover:bg-gray-50 transition-colors text-xs shadow-sm">Pilih Berkas</button>
                                            </div>
                                        </template>
                                        
                                        <template x-if="fileName">
                                            <div class="text-center w-full max-w-xs">
                                                <div class="flex items-center justify-center gap-2 mb-2">
                                                    <span class="material-symbols-outlined text-brandBlue">description</span>
                                                    <span class="text-gray-800 font-semibold truncate text-sm" x-text="fileName"></span>
                                                </div>
                                                <p class="text-xs text-gray-500 mb-2" x-text="fileSize"></p>
                                                
                                                <template x-if="isUploading">
                                                    <div class="w-full bg-gray-200 rounded-full h-1.5 dark:bg-gray-700 mt-2">
                                                        <div class="bg-brandBlue h-1.5 rounded-full" :style="'width: ' + uploadProgress + '%'"></div>
                                                    </div>
                                                </template>
                                                
                                                <template x-if="!isUploading">
                                                    <span class="text-xs text-brandGreen font-medium flex items-center justify-center gap-1">
                                                        <span class="material-symbols-outlined text-xs">check_circle</span> Berkas siap dikirim
                                                    </span>
                                                </template>
                                            </div>
                                        </template>
                                    </div>
                                    @error('files.' . $submission->task_id)
                                        <p class="text-red-500 text-xs mt-2 font-medium">{{ $message }}</p>
                                    @enderror

                                    <div class="mt-4 flex justify-center" x-show="fileName" x-transition>
                                        <button 
                                            wire:click="submitTask({{ $submission->task_id }})"
                                            :disabled="isUploading"
                                            :class="isUploading ? 'opacity-50 cursor-not-allowed' : 'hover:brightness-110'"
                                            class="px-6 py-2.5 rounded-lg bg-brandBlue text-white font-semibold text-sm shadow-md transition-all">
                                            Perbarui Jawaban
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <x-asesi.empty-state-card 
                                title="Tidak Ada Tugas Berjalan"
                                message="Anda tidak memiliki tugas yang sudah dikerjakan namun masih dapat direvisi saat ini."
                                icon="task" 
                                type="info" 
                            />
                        @endforelse
                    @else
                        <!-- TAMPILAN SUDAH DIKIRIM (TERKUNCI) -->
                        @forelse ($sentTasks as $submission)
                            <div class="bg-white rounded-xl shadow-ambient p-8 border-ghost mb-10">
                                <!-- Banners Status: Terkunci/Final -->
                                {{-- <div class="bg-blue-50 border-l-4 border-cyan-600 p-4 mb-6 rounded-r-xl">
                                    <div class="flex items-center gap-3">
                                        <span class="material-symbols-outlined text-cyan-600 text-2xl">lock</span>
                                        <div>
                                            <p class="font-semibold text-cyan-800">Tugas Dikirim (Terkunci & Final)</p>
                                            <p class="text-xs text-cyan-700">Tugas ini sudah terkirim secara final. Anda tidak dapat mengedit atau mengirim ulang karena batas pengumpulan atau batas maksimal pengiriman telah terlampaui.</p>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-brandGreen/30 flex items-center justify-center text-brandGreen-dark">
                                            <span class="material-symbols-outlined" data-icon="description">description</span>
                                        </div>
                                        <h2 class="text-xl font-headline font-semibold text-brandBlue-dark/90">
                                            Penugasan {{ $submission->task->title }} (Sudah Dikirim)
                                        </h2>
                                    </div>
                                    <div class="flex items-center gap-2.5 bg-brandBlue-dark/90 px-4 py-2 rounded-lg w-fit shadow-md">
                                        <p class="text-sm font-label text-white font-medium">
                                            Batas Pengumpulan: <span class="font-bold text-accent">{{ $submission->task->ends_at->timezone('Asia/Makassar')->locale('id')->isoFormat('dddd, D MMMM YYYY, HH:mm') }} WITA</span>
                                        </p>
                                    </div>
                                </div>

                                <div class="max-w-none font-body leading-relaxed mb-6 text-gray-800">
                                    {!! $submission->task->body !!}
                                </div>

                                <!-- Detail File Final -->
                                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6">
                                    <h4 class="font-semibold text-gray-800 mb-3 text-sm uppercase tracking-wider">Berkas Pengumpulan Akhir</h4>
                                    <div class="flex items-center justify-between bg-white p-4 rounded-lg border border-gray-150 shadow-sm">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-red-50 text-red-500 rounded flex items-center justify-center border border-red-100 font-bold text-xs uppercase">
                                                {{ pathinfo($submission->file_path, PATHINFO_EXTENSION) }}
                                            </div>
                                            <div>
                                                <p class="text-sm font-semibold text-gray-800">{{ basename($submission->file_path) }}</p>
                                                <p class="text-xs text-gray-500">Dikirim pada: {{ $submission->submitted_at->timezone('Asia/Makassar')->locale('id')->isoFormat('D MMMM YYYY, HH:mm') }} WITA</p>
                                            </div>
                                        </div>
                                        <button wire:click="download({{ $submission->id }})"
                                            class="flex items-center gap-1.5 px-3 py-1.5 border border-gray-300 rounded-lg text-xs font-semibold text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                            <span class="material-symbols-outlined text-sm">download</span>
                                            Unduh File
                                        </button>
                                    </div>
                                    <div class="mt-4 text-xs text-gray-500 flex items-center gap-1.5">
                                        <span class="material-symbols-outlined text-sm text-cyan-600">verified</span>
                                        <span>Status pengiriman: <strong class="text-emerald-600">Final (Selesai)</strong> dengan <strong class="text-gray-800">{{ $submission->submission_count }} dari {{ $submission->task->max_submissions }} kali</strong> pengumpulan.</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <x-asesi.empty-state-card 
                                title="Belum Ada Tugas Final"
                                message="Anda belum memiliki tugas yang sudah dikirimi secara final."
                                icon="lock" 
                                type="info" 
                            />
                        @endforelse
                    @endif


                </div>
            </div>
        </div>
    @else
        {{-- JIKA BATCH TIDAK DITEMUKAN --}}
        <x-asesi.empty-state-card title="Angkatan Belum Aktif"
            message="Akun Anda saat ini belum terdaftar di kelas/angkatan (batch) yang sedang berjalan. Silakan hubungi administrator jika Anda merasa ini adalah kesalahan."
            icon="info" type="info" />
    @endif
</div>