// Data State
let bookingData = {
  nama: "",
  kelamin: "",
  tujuan: "",
};

// Navigasi Halaman (SPA Sederhana)
function showPage(pageId) {
  document
    .querySelectorAll(".page-section")
    .forEach((el) => el.classList.remove("active"));
  document.getElementById(pageId).classList.add("active");
}

// Validasi Halaman 1
function validateAndNext() {
  const nama = document.getElementById("nama").value.trim();
  const kelamin = document.getElementById("kelamin").value;

  if (!nama) {
    alert("Nama wajib diisi!");
    return;
  }
  if (!kelamin) {
    alert("Pilih jenis kelamin!");
    return;
  }

  bookingData.nama = nama;
  bookingData.kelamin = kelamin;
  showPage("page2");
}

// Pilih Rute
function selectRute(element, tujuan) {
  // Reset selection
  document
    .querySelectorAll(".rute-option")
    .forEach((el) => el.classList.remove("selected"));

  // Set active
  element.classList.add("selected");
  bookingData.tujuan = tujuan;
}

// Proses Pembayaran (Kirim ke CI4 Controller)
function processBooking() {
  if (!bookingData.tujuan) {
    alert("Mohon pilih rute perjalanan!");
    return;
  }

  const btn = document.getElementById("btnBayar");
  const oriText = btn.innerHTML;
  btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
  btn.disabled = true;

  // Generate ID Unik di Client (opsional, bisa juga full di server)
  const tiketId =
    "PN-" +
    Date.now().toString().slice(-6) +
    Math.random().toString(36).substring(2, 5).toUpperCase();

  const payload = {
    tiketId: tiketId,
    nama: bookingData.nama,
    kelamin: bookingData.kelamin,
    tujuan: bookingData.tujuan,
  };

  // Panggil Endpoint CI4
  // BASE_URL diambil dari template_main.php
  fetch(BASE_URL + "pesan", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(payload),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        // Tampilkan Data di Tiket
        document.getElementById("displayId").innerText = tiketId;
        document.getElementById("displayNama").innerText = bookingData.nama;
        document.getElementById("displayRute").innerText = bookingData.tujuan;

        showPage("page3");
      } else {
        alert("Gagal: " + (data.message || "Terjadi kesalahan server."));
      }
    })
    .catch((err) => {
      console.error(err);
      alert("Terjadi kesalahan koneksi.");
    })
    .finally(() => {
      btn.innerHTML = oriText;
      btn.disabled = false;
    });
}

// ADMIN: Update Stok
function updateStokAdmin() {
  const newVal = document.getElementById("inputStok").value;

  fetch(BASE_URL + "admin/update-stok", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ stok: newVal }),
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.status === "success") {
        alert("Stok berhasil diperbarui!");
        location.reload();
      } else {
        alert("Gagal update stok.");
      }
    });
}
