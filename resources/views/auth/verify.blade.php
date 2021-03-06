@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('verify.Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('verify.A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('verify.Before proceeding, please check your email for a verification link.') }}
                    {{ __('verify.If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('verify.click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
