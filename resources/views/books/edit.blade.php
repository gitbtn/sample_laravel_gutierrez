@extends('layout.app')


@section('content')


<main class="app-main" id="main" tabindex="-1">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">

        <h2>Edit book</h2>


<div class="row">
<div class="col-md-12">
    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Book Information</h3>
                    </div>
                    <div class="card-body">


                        <form method="POST" action="{{ route('books.update', $data->id)}}">
                            @csrf
                            @method('PUT')
                            <!-- First Name -->
                             <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value={{ $data->title }} required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="course_desc" name="course_desc" rows="3" required>{{ $data->course_desc }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="photo" class="form-label">Photo</label>
                                <input type="text" class="form-control" id="photo" name="photo" value={{ $data->photo }}>
                            </div>


                            <!-- Submit Button -->
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
</div>
</div>
</main>

@endsection
