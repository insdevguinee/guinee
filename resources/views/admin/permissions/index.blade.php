@extends('admin.layouts.admin',['title'=>'Permissions'])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-warning">
                <h4 class="card-title ">{{ __('Permission ') }}</h4>
                <p class="card-category"> Gestion de permission </p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        @can('add_roles')
                         <p> <a href="{{ route('permissions.create') }}" class="btn pull-right btn-sm btn-default btn-bordered">Ajouter une permission</a></p>
                        @endcan
                        <div class="clearfix"></div>
                        @foreach ($permissions as $permission)
                           <span class="badge badge-{{ str_contains($permission->name, 'delete') ? 'danger' : '' }} {{ str_contains($permission->name, 'edit') ? 'warning' : 'info' }}" style="margin: 5px;">
                             {{ $permission->name }}
                           

                            @can('edit_permissions')
                            <a href="{{ route('permissions.edit',[$permission->id]) }}" class="btn btn-warning btn-sm">M</a>
                            @endcan

                            @can('delete_permissions')
                            {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id], 'style'=>'display: inline;height:100%','onsubmit'=>'return show_alert();']) !!}
                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            {!! Form::close() !!}
                            @endcan
                          </span>
                        @endforeach
                    </div>
                </div>
                
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
