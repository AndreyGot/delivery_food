@extends('admin.mainTemplates.association')

@section('sideBar')
    <a class="btn btn-success btn-success--mod" href="{{ route('adminPanel') }}" role="button">Вернутся к панели</a>
    <a class="btn btn-success btn-success--mod" href="{{ route('admin_associations_list') }}" role="button">Список
        Асоциаций->Категорий</a>
    <a class="btn btn-success btn-success--mod" href="{{ route('admin_addForm_association') }}" role="button">Создать новую
        Асоциацию</a>
@endsection

@section('content')

   <div class="row">
       <form class="formAssociation" method="POST" action="{{ $action }}" enctype="multipart/form-data">
           {{ csrf_field() }}

           <div class="form-group">
               <label for="name" class="col-md-4 control-label">Название Ассоциации</label>
               <div class="col-md-6">
                   <input id="name" type="text" class="form-control" name="name" value="{{$association->name}}" autofocus>
               </div>
           </div>

           <div class="form-group form-group--mod">
               <div class="col-md-8 ">
                   <button type="submit" class="btn btn-primary">
                       Сохранить
                   </button>
               </div>
           </div>
       </form>
   </div>


@endsection