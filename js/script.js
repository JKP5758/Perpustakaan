const navbarNav = document.querySelector(".navbar-nav");
document.querySelector("#hamburger-menu").onclick = () => {
  navbarNav.classList.toggle("active");
};

function setTanggalKembali() {
  var tanggalPinjam = new Date(document.getElementById('tanggal_p').value);
  tanggalPinjam.setDate(tanggalPinjam.getDate() + 7);
  var dd = String(tanggalPinjam.getDate()).padStart(2, '0');
  var mm = String(tanggalPinjam.getMonth() + 1).padStart(2, '0');
  var yyyy = tanggalPinjam.getFullYear();
  document.getElementById('tanggal_k').value = yyyy + '-' + mm + '-' + dd;
};








var totalDendaRusak = 0;
var dendaPerBuku;

document.getElementById('rusak').addEventListener('change', function() {
  var jumlahRusakInput = document.getElementsByName('jumlah_rusak')[0];
  var dendaInput = document.getElementsByName('denda_kerusakan')[0];
  var totalDendaInput = document.getElementsByName('total_denda')[0];

  switch (this.value) {
      case '1':
          dendaPerBuku = 5000;
          break;
      case '2':
          dendaPerBuku = 10000;
          break;
      case '3':
          dendaPerBuku = 20000;
          break;
      default:
          dendaPerBuku = 0;
  }

  if (this.value === '') {
      jumlahRusakInput.value = 0;
      jumlahRusakInput.min = 0;
      jumlahRusakInput.readOnly = true;
      totalDendaRusak = 0;
      dendaInput.value = 'Rp.0';
      //totalDendaInput.value = 'Rp.0';
      var SemuaDenda = parseInt(denda_terlambat) + parseInt(totalDendaRusak);
      totalDendaInput.value = 'Rp.' + SemuaDenda;
      
  } else {
      jumlahRusakInput.value = 1;
      jumlahRusakInput.min = 1 ;
      jumlahRusakInput.readOnly = false;
      totalDendaRusak = dendaPerBuku * parseInt(jumlahRusakInput.value);
      var SemuaDenda = parseInt(denda_terlambat) + parseInt(totalDendaRusak);
      dendaInput.value = 'Rp.' + totalDendaRusak;
      totalDendaInput.value = 'Rp.' + SemuaDenda;
  }
});

document.getElementsByName('jumlah_rusak')[0].addEventListener('input', function() {
  var dendaInput = document.getElementsByName('denda_kerusakan')[0];
  var totalDendaInput = document.getElementsByName('total_denda')[0];
  totalDendaRusak = dendaPerBuku * parseInt(this.value);
  dendaInput.value = 'Rp.' + totalDendaRusak;
  var SemuaDenda = parseInt(denda_terlambat) + parseInt(totalDendaRusak);
  totalDendaInput.value = 'Rp.' + SemuaDenda;
});




var denda_terlambat = 0;

var tanggalSeharusnya = document.getElementsByName('tanggal_p')[0].value;

document.getElementsByName('tanggal_k')[0].addEventListener('change', function() {
    var tanggalKembali = new Date(this.value);
    var tanggalSeharusnyaDate = new Date(tanggalSeharusnya);
    var dendaTerlambatInput = document.getElementsByName('denda_terlambat')[0];
    var totalDendaInput = document.getElementsByName('total_denda')[0];

    // Hitung selisih dalam hari
    var selisih = Math.ceil((tanggalKembali - tanggalSeharusnyaDate) / (1000 * 60 * 60 * 24));

    if (selisih > 7) {
        denda_terlambat = (selisih - 7) * 1000;
        dendaTerlambatInput.value = 'Rp.' + denda_terlambat;
        var SemuaDenda = parseInt(denda_terlambat) + parseInt(totalDendaRusak);
        totalDendaInput.value = 'Rp.' + SemuaDenda; 
    } else {
        denda_terlambat = 0;
        dendaTerlambatInput.value = 'Rp.0';
        var SemuaDenda = parseInt(denda_terlambat) + parseInt(totalDendaRusak);
        totalDendaInput.value = 'Rp.' + SemuaDenda;
    }
});

