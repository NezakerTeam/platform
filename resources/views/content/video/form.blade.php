{!! form($form) !!}

@section('jsBodyEnd')
@parent

<script>
    $(document).ready(function () {
        $(document).on('change', '.element-refresher', function () {
            var selectedValue = $(this).val();
            var url = $(this).data('refresh-url');
            var targetElementId = $(this).data('refresh-element');
            $.get(url,
                    {
                        selectedOptionId: selectedValue,
                    }
            ).done(function (data) {
                $('#' + targetElementId).replaceWith(data);
                $('#' + targetElementId).val('').trigger('change');
            });
        });
    })
</script>
@endsection

