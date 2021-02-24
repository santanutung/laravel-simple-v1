@extends('layout.app')
@section('tittle', 'home')
@section('content')
    @include('layout.menu')
   
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#VisitorDt').DataTable({order:false});
            $('.dataTables_length').addClass('bs-select');
        });

    </script>
@endsection
