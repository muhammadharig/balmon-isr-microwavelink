@if (session()->has('success'))
    <script>
        iziToast.success({
            title: "Berhasil!",
            message: "{{ session('success') }}",
            position: "topRight",
        });
    </script>
@endif
@if (session()->has('error'))
    <script>
        iziToast.error({
            title: "Gagal!",
            message: "{{ session('error') }}",
            position: "topRight",
        });
    </script>
@endif
