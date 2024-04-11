 <!-- Core JS -->
 <!-- build:js assets/vendor/js/core.js -->
 <script src="{{ asset('sneat') }}/assets/vendor/libs/jquery/jquery.js"></script>
 <script src="{{ asset('sneat') }}/assets/vendor/libs/popper/popper.js"></script>
 <script src="{{ asset('sneat') }}/assets/vendor/js/bootstrap.js"></script>
 <script src="{{ asset('sneat') }}/assets/vendor/main/main.js"></script>
 <script src="{{ asset('sneat') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

 <script src="{{ asset('sneat') }}/assets/vendor/js/menu.js"></script>
 <!-- endbuild -->

 <!-- Vendors JS -->
 <script src="{{ asset('sneat') }}/assets/vendor/libs/apex-charts/apexcharts.js"></script>

 <!-- Main JS -->
 <script src="{{ asset('sneat') }}/assets/js/main.js"></script>

 <!-- Page JS -->
 <script src="{{ asset('sneat') }}/assets/js/dashboards-analytics.js"></script>

 <!-- Izi Toast -->
 <script src="{{ asset('sneat') }}/assets/js/iziToast.min.js"></script>

 <!-- Sweet Alert2 -->
 <script src="{{ asset('sneat') }}/assets/js/sweetalert2.all.min.js"></script>

 <script src="{{ asset('sneat') }}/assets/js/pages-account-settings-account.js"></script>

 <!-- Place this tag in your head or just before your close body tag. -->
 <script async defer src="https://buttons.github.io/buttons.js"></script>
 <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
 <script>
     new DataTable('#tbl-bc');
     new DataTable('#tbl-users');
 </script>

 <script>
     $('.show_confirm').click(function(event) {
         var form = $(this).closest("form");
         var name = $(this).data("name");
         event.preventDefault();

         Swal.fire({
                 title: "Apakah Anda Yakin Ingin Menghapus Data Berikut?",
                 text: "Data Yang Dihapus Tidak Dapat Dikembalikan.",
                 icon: "warning",
                 showCloseButton: true,
                 showCancelButton: true,
                 confirmButtonColor: "#28a745",
                 cancelButtonColor: "#d33",
                 confirmButtonText: "Hapus",
                 cancelButtonText: "Batal",
             })
             .then((willDelete) => {
                 if (willDelete.isConfirmed) {
                     form.submit();
                 }
             });
     });
 </script>

 <script>
     $(document).ready(function() {
         $('#import').on('submit', function(e) {
             e.preventDefault(); // Prevent the form from submitting normally
             let timerInterval;
             Swal.fire({
                 title: "Data Sedang Diimport..",
                 timer: 360000,
                 allowOutsideClick: false,
                 timerProgressBar: true,
                 didOpen: () => {
                     Swal.showLoading();
                     const timer = Swal.getPopup().querySelector("b");
                     timerInterval = setInterval(() => {
                         timer.textContent = `${Swal.getTimerLeft()}`;
                     }, 100);
                 },
                 willClose: () => {
                     clearInterval(timerInterval);
                 },
                 onBeforeOpen: () => {
                     Swal.showLoading();
                 }
             });
             setTimeout(() => {
                 e.target.submit();
             }, 500);
         });
     });
 </script>

 <!-- function close modal import -->
 <script>
     $(document).ready(function() {
         $('#import').on('submit', function(e) {
             // Tutup modal setelah formulir di-submit
             $('#modalImport').modal('hide');
         });
     });
 </script>
