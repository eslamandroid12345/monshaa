@php use Illuminate\Support\Facades\Session; @endphp
    <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('dashboard.core.tags.head')


<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to do the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('dashboard.core.includes.navbar')

    @include('dashboard.core.includes.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    @include('dashboard.core.includes.control-sidebar')

    @include('dashboard.core.includes.footer')
</div>
<!-- ./wrapper -->

@include('dashboard.core.tags.scripts')

@if(Session::has('error'))
    @include('dashboard.core.alerts.error', ['message' => Session::get('error')])
@elseif(Session::has('success'))
    @include('dashboard.core.alerts.success', ['message' => Session::get('success')])
@endif
@foreach($errors->all() as $message)
    @include('dashboard.core.alerts.error', compact('message'))
@endforeach


<script>
    $(document).ready(function() {
        $(window).scroll(function() {
            if($(window).scrollTop() + $(window).height() >= $(document).height()) {
                var nextPageUrl = $('ul.pagination .next > a').attr('href');

                if (nextPageUrl) {
                    // Display loading indicator
                    $('#load-more').html('<i class="fa fa-spinner fa-spin"></i> Loading...');

                    $.ajax({
                        url: nextPageUrl,
                        type: 'get',
                        dataType: 'json',
                        success: function(response) {
                            // Append new data to the container
                            $('#data-container').append(response.data);

                            // Update the next page URL
                            var nextPage = $(response.links).filter('.next').find('a').attr('href');
                            if (nextPage) {
                                $('ul.pagination .next > a').attr('href', nextPage);
                            } else {
                                // Remove load more button or loading indicator when there is no more data
                                $('#load-more').remove();
                            }
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            }
        });
    });

</script>

</body>
</html>
