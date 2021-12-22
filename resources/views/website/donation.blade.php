@extends('website.master')

@section('content')

<main>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <h1 class="mb-4 text-center">Thanks for your kindly donation</h1>
                <h4 class="mb-5 text-center">You will donate <b class="text-danger">({{ $amount }}$)</b> for <b class="text-danger">({{ $project->title }})</b></h4>

                <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{$checkoutId}}"></script>

                <form action="{{ route('website.donation_result', $project->id) }}" class="paymentWidgets" data-brands="VISA MASTER AMEX MADA"></form>



            </div>
        </div>

    </div>
</main>

@stop
