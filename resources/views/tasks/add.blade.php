@extends('layouts.tasks')

@section('title',  'Tasks > Add')

@section('content')
<form method="POST" action="">
    @csrf
    <label for="title">Task Title</label>
    <input type="text" name="title" id="title"/>

    <input type="submit" value="Add task">

</form>

@endsection
