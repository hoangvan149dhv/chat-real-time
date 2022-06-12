@extends('layouts.app')

@section('content')
    <div class="row justify-content-center h-100">
        <div class="col-md-12 col-xl-12 chat">
            <chat :msg='@json($messages)' :current-user='@json($currentUser)'
                :user-send='@json($userTwo)' />
        </div>
    </div>
@endsection
