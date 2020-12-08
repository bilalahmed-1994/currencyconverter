@extends('layouts.app')

@section('content')

<token-component token="{{ $token }}" redirect = "{{ route('generateToken') }}" ></token-component>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    API Token

                    <a class="btn btn-sm btn-danger" style="float: right" href="{{ route('generateToken') }}">Generate New Token</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ $token }}
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
