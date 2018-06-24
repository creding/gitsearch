// resources/views/home.blade.php

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->
<div class="container">
<div class="row" >
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="/search" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="user" id="user-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-search"></i> Search
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection