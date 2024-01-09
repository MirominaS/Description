@extends('layouts.index')

@section('main')
<style>
    .card {
        background-image: linear-gradient(to top, #a18cd1 0, #fbc2eb 100%);
    }
</style>
<div class="row justify-content-center">
    <div class="col col-md-6">
        <div class="card">
            <div class="card-header text-center">
                <h4>Description</h4>
            </div>
            <div class="card-body">
                <p>{{ $description }}</p>
            </div>
        </div>
    </div>
</div>
@endsection