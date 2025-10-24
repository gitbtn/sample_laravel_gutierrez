@extends('layout.app')


@section('content')


<main class="app-main" id="main" tabindex="-1">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">

        <h2>Edit course</h2>


<div class="row">
<div class="col-md-12">
    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Course Information</h3>
                    </div>
                    <div class="card-body">


                        <form method="POST" action="{{ route('courses.update', $data->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- First Name -->
                             <div class="mb-3">
                                <label for="course_code" class="form-label">Course Code</label>
                                <input type="text" class="form-control" id="course_code" name="course_code" value={{ old('course_code',$data->course_code) }} required>
                            </div>

                            <div class="mb-3">
                                <label for="course_desc" class="form-label">Course Description</label>
                                <textarea class="form-control" id="course_desc" name="course_desc" rows="3" required>{{ old('course_desc',$data->course_desc) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="photo" class="form-label">Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo" value={{ old('photo',$data->photo) }}>
                            </div>


                            <!-- Submit Button -->
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
</div>
</div>
</main>

@endsection
