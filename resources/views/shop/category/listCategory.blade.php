<div>Categories</div>
<div class="container content">
  <div class="row">
		<a href="{{route('restaurant_list_shop')}}">Все рестораны</a>
    @foreach ($categories as $category)
        <h2>{{ $category->name }}</h2>
        <p>{{ $category->image }}</p>
        <p>{{ $category->restaurant_id }}</p>
        <a class="btn btn-info" href="{{route('food_by_categori_id',['category_id'=>$category->id])}}" role="button">{{ $category->name }}</a>
    @endforeach

  </div>
</div>