@extends('admin.layouts.app')

@section('wrapper')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    
    @include('admin.layouts.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            @include('admin.layouts.topbar')

            <!-- Begin Page Content -->
            <div class="container">

                @yield('content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        @include('admin.layouts.footer')

    </div>
    <!-- End of Content Wrapper -->
@endsection
