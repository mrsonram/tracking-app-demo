@extends('layouts.master')

@section('title', 'Dashboard')

@section('style')
    .card {
    margin-top: 20px;
    }

    thead {
    text-align: center;
    }
@endsection

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

        @auth
            <!-- Sidebar -->
            @include('layouts.sidebar')
            <!-- End of Sidebar -->
        @endauth

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @auth
                    <!-- Topbar -->
                    @include('layouts.nav')
                    <!-- End of Topbar -->
                @endauth
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    @guest
        <div class="container" style="margin-top: 10px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="width: 50%; margin: 0 auto;">
                        <div class="card-body">
                            <div class="card-header">
                                <h3 class="text-center">Welcome to Note Creator</h3>
                                <hr>
                                <p class="text-center">Please <a href="/login">Login</a> or <a href="/register">Register</a> to create your note.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endguest
@endsection
