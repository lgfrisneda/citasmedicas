@section('scripts')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $( function() {
                $( ".datepicker" ).datepicker({
                    changeMonth: true,
                    changeYear: true
                });
            });
        </script>
@endsection