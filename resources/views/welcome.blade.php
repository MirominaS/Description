@extends('layouts.index')

@section('main')
<style>
    .card{
        background-image: linear-gradient(to top,#a18cd1 0,#fbc2eb 100%);
    }
</style>
    <div class="row justify-content-center">
        <div class="col col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Description Generator</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('description.generate')}}" method="POST">
                    @csrf
                        <label for="exampleFormControlInput1" class="form-label">Category</label>
                        <input type="text" class="form-control" name="category" placeholder="Vehicle Category">

                        <label for="exampleFormControlInput2" class="form-label">Brand</label>
                        <input type="text" class="form-control" name="brand" placeholder="Vehicle Brand">

                        <label for="exampleFormControlInput2" class="form-label">Model</label>
                        <input type="text" class="form-control" name="model" placeholder="Vehicle Model">


                        <label for="exampleFormControlInput2" class="form-label">Condition</label>
                        <select class="form-select" name="condition" aria-label="Default select example">
                            <option selected>Select Condition</option>
                            <option value="1">Used</option>
                            <option value="2">New</option>
                        </select>

                        <label for="exampleFormControlInput2" class="form-label">Offer Type</label>
                        <select class="form-select" name="offerType" aria-label="Default select example">
                            <option selected>Select Offer Type</option>
                            <option value="1">For Sale</option>
                            <option value="2">For Rent</option>
                        </select>

                        <label for="exampleFormControlInput2" class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" placeholder="Price of the Vehicle">

                        <label for="exampleFormControlInput2" class="form-label">Location</label>
                        <input type="text" class="form-control" name="location" placeholder="Location">

                        <hr>

                        <div class="text-center">
                              <input type="submit" class="btn btn-secondary" value="Generate Description">
                        </div>
                       

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection