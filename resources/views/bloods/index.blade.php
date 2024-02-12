@extends('layouts.admin')
@section('main')
    <div class="container">
        <div class="row">
            {{-- <div class="card col-2 m-2"> --}}
            @foreach ($bloods as $item)
                <div class="card col-3 p-2 m-2">
                    <div class="card-title text-center ">
                        طلب اعفاء من التبرع بالدم
                    </div>
                    <div class="bg-gray rounded-sm p-1 m-1">الرقم الوطني : {{$item->nId}}</div>
                    <div class="bg-gray rounded-sm p-1 m-1">البنك : {{$item->bank}}</div>
 
                    @if ($item->st == 'pendding')
                        <div class="bg-warning rounded-sm p-1 m-1">
                            status  :{{$item->st}}
                            <form action="{{route('bloods.update',$item->id)}}" method="post">
                                @csrf
                                @method('patch')
                                <button class="btn btn-sm btn-danger ml-4" >change status</button>
                            </form>
                            <a class="btn btn-sm btn-secondary m-4" href="{{route('users.show',$item->user_id)}}" >check the profile</a> 
                        </div>
                    @elseif ($item->st == 'done')
                        <div class="bg-success rounded-sm p-1 m-1"> status :{{$item->st}}</div>
                        <a class="btn btn-sm btn-secondary m-4" href="{{route('users.show',$item->user_id)}}" >check the profile</a> 
                   @endif
                   
                </div>
            @endforeach
            {{-- </div> --}}
        </div>
    </div>
@endsection
