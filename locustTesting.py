
saldo = 1_000_000  # saldo awal
pin = "1234"

print("=== Selamat Datang di ATM Sederhana ===")

# Login PIN
masukan_pin = input("Masukkan PIN: ")
if masukan_pin != pin:
    print("PIN salah! Akses ditolak.")
    exit()

while True:
    print("\nMenu ATM:")
    print("1. Cek Saldo")
    print("2. Tarik Tunai")
    print("3. Setor Tunai")
    print("4. Keluar")

    pilihan = input("Pilih menu (1/2/3/4): ")

    if pilihan == "1":
        print(f"Saldo Anda saat ini: Rp{saldo:,}")
    elif pilihan == "2":
        tarik = int(input("Masukkan jumlah tarik tunai: Rp"))
        if tarik > saldo:
            print("Saldo tidak cukup!")
        else:
            saldo -= tarik
            print(f"Berhasil menarik Rp{tarik:,}. Saldo tersisa Rp{saldo:,}")
    elif pilihan == "3":
        setor = int(input("Masukkan jumlah setor tunai: Rp"))
        saldo += setor
        print(f"Berhasil setor Rp{setor:,}. Saldo sekarang Rp{saldo:,}")
    elif pilihan == "4":
        print("Terima kasih telah menggunakan ATM!")
        break
    else:
        print("Pilihan tidak valid. Coba lagi.")
