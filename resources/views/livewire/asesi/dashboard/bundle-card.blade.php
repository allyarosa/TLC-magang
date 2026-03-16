  <div id="section-bundle" class="hidden transition-all duration-500">
    @php
        $user = auth()->user();
    @endphp
      <div class="max-w-4xl mx-auto mb-16">
          <!-- Bundle Card -->
          <div class="bundle-card rounded-3xl shadow-2xl p-10 text-white relative overflow-hidden"
              style="background: linear-gradient(135deg, #E76F51 0%, #F4A261 100%);">
              <!-- Background Decorations -->
              <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-32 -mt-32">
              </div>
              <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full blur-2xl -ml-24 -mb-24">
              </div>

              <!-- Save Badge -->
              <div
                  class="absolute top-6 right-6 bg-white text-[#E76F51] px-4 py-2 rounded-full font-black text-sm shadow-lg animate-pulse z-50">
                  HEMAT 20%
              </div>

              <div class="relative z-10">
                  <div class="flex flex-col lg:flex-row gap-10">
                      <!-- Left: Info -->
                      <div class="flex-1">
                          <span
                              class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur text-white text-xs font-bold rounded-full mb-6">
                              PAKET BUNDLE LENGKAP
                          </span>

                          <h2 class="text-4xl sm:text-5xl font-black mb-4 leading-tight">
                              Complete Teaching
                              <br>Certification
                          </h2>

                          <p class="text-white/80 text-lg mb-8 max-w-md">
                              Dapatkan akses ke semua level sertifikasi dengan harga spesial. Solusi terbaik
                              untuk pengembangan karir mengajar Anda.
                          </p>

                          <!-- Included Levels -->
                          <div class="flex flex-wrap gap-3 mb-8">
                              <span
                                  class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur rounded-full text-sm font-semibold">
                                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                      <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                          clip-rule="evenodd" />
                                  </svg>
                                  Level A
                              </span>
                              <span
                                  class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur rounded-full text-sm font-semibold">
                                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                      <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                          clip-rule="evenodd" />
                                  </svg>
                                  Level B
                              </span>
                              <span
                                  class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur rounded-full text-sm font-semibold">
                                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                      <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                          clip-rule="evenodd" />
                                  </svg>
                                  Level C
                              </span>
                          </div>

                          <!-- Bonus -->
                          <div class="bg-white/10 backdrop-blur rounded-2xl p-4 mb-6">
                              <p class="text-white/60 text-xs font-semibold mb-2">🎉 BONUS EKSKLUSIF</p>
                              <ul class="space-y-2">
                                  <li class="flex items-center gap-2 text-sm">
                                      <svg class="w-4 h-4 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                          <path
                                              d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                      </svg>
                                      Konsultasi pribadi (3 sesi)
                                  </li>
                                  <li class="flex items-center gap-2 text-sm">
                                      <svg class="w-4 h-4 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                          <path
                                              d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                      </svg>
                                      Akses komunitas seumur hidup
                                  </li>
                                  <li class="flex items-center gap-2 text-sm">
                                      <svg class="w-4 h-4 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                          <path
                                              d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                      </svg>
                                      E-book & template eksklusif
                                  </li>
                              </ul>
                          </div>
                      </div>

                      <!-- Right: Pricing -->
                      <div class="lg:w-80">
                          <div class="bg-white rounded-3xl p-8 text-gray-900 shadow-2xl">
                              <div class="text-center mb-6">
                                  <p class="text-gray-400 text-sm line-through mb-1">Rp
                                      {{ number_format($levels[0]->price + $levels[1]->price + $levels[2]->price, 0, ',', '.') }}
                                  </p>
                                  <p class="text-4xl font-black text-[#1D4E89]">Rp
                                      {{ number_format($levels[3]->price, 0, ',', '.') }}</p>
                                  <p class="text-gray-500 text-sm mt-2">Pembayaran satu kali</p>
                              </div>

                              <div class="space-y-3 mb-8">
                                  <div class="flex items-center gap-3 text-sm text-gray-600">
                                      <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                          <path fill-rule="evenodd"
                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                              clip-rule="evenodd" />
                                      </svg>
                                      Akses semua level
                                  </div>
                                  <div class="flex items-center gap-3 text-sm text-gray-600">
                                      <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                          <path fill-rule="evenodd"
                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                              clip-rule="evenodd" />
                                      </svg>
                                      Sertifikat Premium
                                  </div>
                                  <div class="flex items-center gap-3 text-sm text-gray-600">
                                      <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                          <path fill-rule="evenodd"
                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                              clip-rule="evenodd" />
                                      </svg>
                                      Bonus eksklusif
                                  </div>
                                  <div class="flex items-center gap-3 text-sm text-gray-600">
                                      <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                          <path fill-rule="evenodd"
                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                              clip-rule="evenodd" />
                                      </svg>
                                      Akses seumur hidup
                                  </div>
                              </div>

                              <!-- Button Bundle -->
                              @if (
                                  $user->hasPermissionTo('access_level_A') &&
                                      $user->hasPermissionTo('access_level_B') &&
                                      $user->hasPermissionTo('access_level_C'))
                                  <a href="{{ route('asesi.sertifikasi') }}"
                                      class="w-full flex items-center justify-center gap-2 py-4 bg-gradient-to-r from-[#1D4E89] to-[#2563eb] text-white font-bold rounded-xl hover:opacity-90 transition-opacity shadow-lg">
                                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                      </svg>
                                      Akses Semua Materi
                                  </a>
                              @elseif (
                                  !$user->hasPermissionTo('access_level_A') &&
                                      !$user->hasPermissionTo('access_level_B') &&
                                      !$user->hasPermissionTo('access_level_C'))
                                  <a href="{{ route('payments.create', Hashids::encode($levels[3]->id)) }}"
                                      class="w-full flex items-center justify-center gap-2 py-4 bg-gradient-to-r from-[#E76F51] to-[#F4A261] text-white font-bold rounded-xl hover:opacity-90 transition-opacity shadow-lg">
                                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                      </svg>
                                      Daftar Bundle Sekarang
                                  </a>
                              @else
                                  <button disabled
                                      class="w-full flex items-center justify-center gap-2 py-4 bg-gray-200 text-gray-400 font-semibold rounded-xl cursor-not-allowed">
                                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                      </svg>
                                      Anda Sudah Punya Level
                                  </button>
                              @endif

                              <p class="text-center text-xs text-gray-400 mt-4">
                                  💳 Pembayaran aman & terpercaya
                              </p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
