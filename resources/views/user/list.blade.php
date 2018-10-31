@extends('adminlte::page')

@section('content_header')
<h1>LISTING</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">User Listing</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <legend>User Listing</legend>
        @if(auth()->user()->type == 1)
        <a href="{{ route('createUser') }}" class="btn btn-primary">New user
            <i class="fa fa-user-plus"></i>
        </a>
        @endif
    </div>
    <div class="box-body">
        @if(session('sucess'))
        <p class="alert alert-success">
            {{ session('sucess') }}
        </p>
        @endif
        @if(session('error'))
        <p class="alert alert-error">
            {{ session('error') }}
        </p>
        @endif

        <table class="table table-bordered col-sm-10">
            <tr>
                @if(auth()->user()->type == 1)
                <th>Action</th>
                @endif
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>Login</th>
                <th>Email</th>
                <th>Type</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                @if(auth()->user()->type == 1)
                <td class="list-action">
                    <a href="{{ route('userDestroy', $user->id) }}" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></a>
                    <a href="{{ route('editUser', $user->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>                    
                    <button data-toggle="modal" data-target="#userModal" onclick="viewUser('{{ $user->id }}')" type="button" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></button>


                    <!-- Large modal -->
                    <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".mdUser">Large modal</button>-->


                    
                    <!-- <a href="{{ route('userDestroy', ['id'=>$user->id]) }}" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></a>
                    <a href="" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></a> -->
                </td>
                @endif
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->login }}</td>
                <td>{{ $user->email }}</td>
                @if ($user->type == 1)
                <td>Administrador</td>
                @else
                <td>Comum</td>
                @endif
            </tr>
            @endforeach

            <!------------------- MODAL ------------------->            
      
      <!-- Modal -->
      <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">User Data</h4>
            </div>
            <div class="modal-body">              

                            <div class="form-group">
                                <label>Nome: </label> 
                                <span id="userName"></span>
                            </div>
                            <div class="form-group">
                                <label>Login: </label> 
                                <span id="userLogin"></span>
                            </div>
                            <div class="form-group">
                                <label>Email: </label> 
                                <span id="userEmail"></span>
                            </div>
                            <div class="form-group">
                                <label>Created: </label> 
                                <span id="userCreated"></span>
                            </div>
                            <div class="form-group">
                                <label>Type: </label> 
                                <span id="userType"></span>
                            </div>                 

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>   
            </div>
          </div>
        </div>
      </div>


            <!------------------------------------->

        </table>
    </div>
    {!! $users->links() !!}
</div>
@stop
