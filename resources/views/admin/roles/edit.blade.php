@extends('admin.layouts.admin',['title'=>'Roles'])
@section('content')
<div>
    <div class="container">
        <div class="row">
             {{ Form::model($role, ['route' => array('roles.update', $role->id), 'method' => 'PUT','style'=>'width:100%;display:contents !important']) }}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                       
                        <div class="form-group">
                            {{ Form::label('name', 'Role Name') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>
                   </div>
                </div>
            </div>
                @foreach ($permissionNames as $permissionName)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <span class="elipsis"><!-- card title -->
                                    <strong style="text-transform: uppercase;">{{ $permissionName }}</strong>
                                </span>
                            </div>
                           <div class="card-body">
                                @foreach ($permissions as $permission)
                                    @if (str_contains($permission->name, $permissionName))
                                         <label class="switch switch switch-round block">
                                            {{ Form::checkbox('permissions[]',  $permission->id,$role->permissions ) }}
                                            <span class="switch-label" data-on="YES" data-off="NO"></span>
                                            <span>{{ Form::label($permission->name, ucfirst($permission->name)) }}</span>
                                        </label>
                                    @endif
                                @endforeach
                           </div>
                        </div>
                    </div>
                @endforeach
                <hr>
                <div class="clearfix"></div>
                @can('edit_roles')
                {{ Form::submit('Modifier', array('class' => 'btn btn-primary float-right')) }}
                @endcan
                {{ Form::close() }}            
            </div>
        </div>
    </div>
</div>
@endsection