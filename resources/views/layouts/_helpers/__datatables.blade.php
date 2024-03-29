@push('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
@endpush
@once
    @push('scripts')
        <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

        <script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>
    @endpush
@endonce
