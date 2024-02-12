@extends('layouts.admin')
@section('main')
    <div class="container">
        <div class="row">
            {{-- <div class="card col-2 m-2"> --}}
            @foreach ($attends as $item)
                <div class="card col-3 p-2 m-2">
                    <div class="card-title text-center ">
                        وثيقة دوام
                    </div>
                    <div class="bg-gray rounded-sm p-1 m-1">عام الدوام والفصل : {{$item->date}}</div>
 
                    @if ($item->st == 'pendding')
                        <div class="bg-warning rounded-sm p-1 m-1">status  :{{$item->st}}</div>
                        <form action="{{route('attends.update',$item->id)}}" method="post">
                            @csrf
                            @method('patch')
                            <select name = "statues">
            <option value = "done" selected>done & ready</option>
            <option value = "refused">refused</option>
         </select>
         <div class="form-group">
    <label for="formGroupExampleInput">messeage</label>
    <input type="text" class="form-control" name="message" id="formGroupExampleInput" placeholder="type message">
  </div>
                            
                        <button class="btn btn-sm btn-danger ml-4" >change status</button>
                    </form>
                    <a class="btn btn-sm btn-secondary m-4" href="{{route('users.show',$item->user_id)}}" >check the profile</a>    
                    @elseif ($item->st == 'done')
                    <div class="bg-success rounded-sm p-1 m-1"> status :{{$item->st}}</div>
                    <form action="{{route('attends.update',$item->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <select name = "statues">
            <option value = "pendding" selected>pendding</option>
            <option value = "refused">refused</option>
         </select>
         <div class="form-group">
    <label for="formGroupExampleInput">messeage</label>
    <input type="text" class="form-control" name="message" id="formGroupExampleInput" placeholder="type message">
  </div>
         
                        <button class="btn btn-sm btn-danger ml-4" >change status</button>
                    </form>
                    <a class="btn btn-sm btn-secondary m-4" href="{{route('users.show',$item->user_id)}}" >check the profile</a>    
                    @elseif ($item->st == 'refused')
                    <div class="bg-danger rounded-sm p-1 m-1"> status :{{$item->st}}</div>
                    <form action="{{route('attends.update',$item->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <select name = "statues">
            <option value = "pendding" selected>pendding</option>
            <option value = "done">done</option>
         </select>
         @if ($item->messeage == 'no messeage')
         <div class="form-group">
    <label for="formGroupExampleInput">messeage</label>
    <input type="text" class="form-control" name="message" id="formGroupExampleInput" placeholder="type message">
  </div>
        @else
        <div class="form-group">
    <label for="formGroupExampleInput">{{$item->messeage}}</label>
  </div>
        @endif
                        <button class="btn btn-sm btn-danger ml-4" >change status</button>
                    </form>
                    <a class="btn btn-sm btn-secondary m-4" href="{{route('users.show',$item->user_id)}}" >check the profile</a>    
                    @endif
                </div>
            @endforeach
            {{-- </div> --}}
        </div>
    </div>
@endsection
