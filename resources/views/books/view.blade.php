@extends('layout.app')



@section('content')


<main class="app-main" id="main" tabindex="-1">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">

        <h2>List of books</h2>

<div class="row" style="margin-bottom:10px;">
    <div class="col-md-2">
        <a href={{ route('books.create')}}>
    <x-button style="background-color:green;" text="Add new book"/>
        </a>
    </div>
</div>

        <div class="row">

@foreach ($data as $datum)

<div class="col-md-4">
    <x-card>
        <x-slot name="image">
        <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/533439427.jpg?k=3bfff10fe4e2dc4654c66da0d8189b6393e5474931e05adce9a1b898d1dadf85&o=&hp=1"/>
        </x-slot>
        <x-slot name="title">
        {{ $datum->title}}
        </x-slot>
        <x-slot name="description">
        {{ $datum->description }}
        <br/>
        Stocks: {{ $datum->stocks}}
        <br/>
        Amount: {{ $datum->amount}}
        </x-slot>
        <x-slot name="button">
            <a href={{ route('books.edit', $datum->id)}} style="text-decoration:none;">
        <x-button style="background-color:blue;" text="View"/>
            </a>
         <x-button style="background-color:red;" text="Delete" onclick="deleteFunc({{$datum->id}})"/>
        </x-slot>
    </x-card>
</div>

@endforeach
        </div>
</main>

@endsection

<script>
function deleteFunc(id){

        const itemId = id; // Get the item ID from data-id attribute

        if (confirm('Are you sure you want to delete this item?')) {
            // If confirmed, you can submit a form or redirect to a delete route
            // For example, redirect:
            window.location.href = `/books/delete/${itemId}`;
            // Or submit a hidden form:
            // document.getElementById('delete-form-' + itemId).submit();
        }
    }

    </script>
