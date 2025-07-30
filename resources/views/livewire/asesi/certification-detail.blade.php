  <!-- Halaman 2: Detail Sertifikasi Level C -->
  <div id="detail_sertifikasi_page" class="page-section">
      <div class="max-w-4xl mx-auto">
          <!-- Header Section -->
          <div class="flex items-center mb-6">
              <!-- Link "Kembali ke Status Sertifikasi" -->
              <a href="{{ route('asesi.sertifikasi') }}" class=" mt-5 flex items-center text-blue-600 hover:text-blue-800 transition duration-200">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                  </svg>
                  <span class="font-medium">Kembali ke Status Sertifikasi</span>
              </a>
          </div>

          <!-- Main Content Card -->
          <div class="card p-6 sm:p-8">
              <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-6">Progres Teaching Mastery Certification Level C</h1>

              <!-- Certificate Summary -->
              <div class="bg-blue-50 p-4 rounded-lg mb-8 flex items-center justify-between">
                  <div>
                      <p class="text-lg font-semibold text-blue-800">Teaching Mastery Certification Level C</p>
                      <p class="text-blue-700 text-sm">Anda telah menyelesaikan semua persyaratan untuk sertifikasi ini.</p>
                  </div>
                  <!-- Tombol "Lihat Sertifikat" -->
                  <button id="viewCertificateBtn" onclick="showPage('sertifikat_anda_page')" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-5 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                      Lihat Sertifikat
                  </button>
              </div>

              <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                  <!-- Riwayat Submisi Section -->
                  <div class="card p-5">
                      <h2 class="text-xl font-semibold text-gray-700 mb-4">Riwayat Submisi</h2>
                      <div class="overflow-x-auto">
                          <table class="min-w-full divide-y divide-gray-200">
                              <thead class="bg-gray-50">
                                  <tr>
                                      <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          Tugas/Proyek
                                      </th>
                                      <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          Tanggal Submisi
                                      </th>
                                      <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          Status
                                      </th>
                                  </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-gray-200">
                                  <tr>
                                      <td class="px-3 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Video Mengajar (Proyek Akhir)</td>
                                      <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">20 Mei 2024</td>
                                      <td class="px-3 py-4 whitespace-nowrap">
                                          <span class="status-badge status-lulus">Lulus</span>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td class="px-3 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Refleksi Tertulis</td>
                                      <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">15 Mei 2024</td>
                                      <td class="px-3 py-4 whitespace-nowrap">
                                          <span class="status-badge status-revisi">Revisi</span>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td class="px-3 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Modul Ajar</td>
                                      <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">10 Mei 2024</td>
                                      <td class="px-3 py-4 whitespace-nowrap">
                                          <span class="status-badge status-lulus">Lulus</span>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td class="px-3 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Observasi Praktik</td>
                                      <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">05 Mei 2024</td>
                                      <td class="px-3 py-4 whitespace-nowrap">
                                          <span class="status-badge status-menunggu">Menunggu Penilaian</span>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                      <div class="text-right mt-4">
                          <!-- Link "Selengkapnya" untuk Riwayat Submisi -->
                          <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Selengkapnya &rarr;</a>
                      </div>
                  </div>

                  <!-- Riwayat Ujian Section -->
                  <div class="card p-5">
                      <h2 class="text-xl font-semibold text-gray-700 mb-4">Riwayat Ujian</h2>
                      <div class="overflow-x-auto">
                          <table class="min-w-full divide-y divide-gray-200">
                              <thead class="bg-gray-50">
                                  <tr>
                                      <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          Ujian
                                      </th>
                                      <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          Tanggal Ujian
                                      </th>
                                      <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          Nilai
                                      </th>
                                  </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-gray-200">
                                  <tr>
                                      <td class="px-3 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Ujian Pengetahuan Level C</td>
                                      <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">22 Mei 2024</td>
                                      <td class="px-3 py-4 whitespace-nowrap">
                                          <span class="status-badge status-lulus">85%</span>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td class="px-3 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Ujian Praktik Mengajar</td>
                                      <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">18 Mei 2024</td>
                                      <td class="px-3 py-4 whitespace-nowrap">
                                          <span class="status-badge status-lulus">90%</span>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td class="px-3 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Kuis Refleksi</td>
                                      <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">16 Mei 2024</td>
                                      <td class="px-3 py-4 whitespace-nowrap">
                                          <span class="status-badge status-lulus">78%</span>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td class="px-3 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Simulasi Pengajaran</td>
                                      <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">12 Mei 2024</td>
                                      <td class="px-3 py-4 whitespace-nowrap">
                                          <span class="status-badge status-lulus">88%</span>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                      <div class="text-right mt-4">
                          <!-- Link "Selengkapnya" untuk Riwayat Ujian -->
                          <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Selengkapnya &rarr;</a>
                      </div>
                  </div>
              </div>

              <!-- Forum Diskusi and Mentoring Platform Sections -->
              <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                  <!-- Forum Diskusi Section -->
                  <div class="card p-5">
                      <div class="flex items-center mb-4">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                          </svg>
                          <h2 class="text-xl font-semibold text-gray-700">Forum Diskusi</h2>
                      </div>
                      <p class="text-gray-600 text-sm mb-4">Berdiskusilah dengan para expert, alumni, dan siswa lainnya terkait kelas Belajar Pengembangan Web Intermediate.</p>
                      <div class="text-right">
                          <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Ke forum diskusi &rarr;</a>
                      </div>
                  </div>

                  <!-- Mentoring Platform Section -->
                  <div class="card p-5">
                      <div class="flex items-center mb-4">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                          </svg>
                          <h2 class="text-xl font-semibold text-gray-700">Mentoring Platform</h2>
                      </div>
                      <p class="text-gray-600 text-sm mb-4">Berminat secara langsung dengan para expert untuk memecahkan kasusmu.</p>
                      <div class="text-right">
                          <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Ke mentoring platform &rarr;</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
