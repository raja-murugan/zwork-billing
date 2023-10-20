@extends('layout.backend.guest')

@section('content')
    <div class="error_container">
        <div class="error-box">
            <h1 style="color: #7638ff;font-size: 147px;font-weight: 900;text-align: center;">403</h1>
            <h3 class="h2 mb-3 text-center"> Access Denied</h3>
            <p class="h4 font-weight-normal text-center">Sorry, but you don't have permission to access this page<br />You
                can go back to <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="">Previous
                    Page</a></p>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                @csrf
            </form>
        </div>
    </div>
@endsection
