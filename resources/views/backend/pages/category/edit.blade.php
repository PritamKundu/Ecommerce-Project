@extends ('backend.template.layout')

@section('dashboard-content')
<div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Dashboard</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
      </div>

      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="br-section-label">Card Block</h6>
          <p class="br-section-text">An example some text within a card block.</p>

          <div class="row mg-b-20">
            <div class="col-md">
              <div class="card card-body">
                <!--Create New Category page start-->
                <form action="{{route('updatecategories', $category->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label>Category Name</label>
                      <input type="text" name="cat_name" class="form-control" value="{{$category->name}}">
                    </div>

                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="cat_description" class="form-control" rows="3" >{{$category->description}}</textarea>
                    </div>

                    <div class="form-group">
                      <label>Category Thumbnail</label><br>
                      @if( $category->image==NULL )
                       No Image Uploaded
                      @else
                       <img src="{{ asset('images/category/'. $category->image )}}" width="100">
                      @endif
                      <input type="file" name="image" class="form-control-file">
                    </div>

                    <div class="form-group">
                      <label>Parent Category</label>
                      <select class="form-control" name="parent_id">
                        <option value="0">Select The Primary Category</option>
                        @foreach ($parent_categories as $parent)
                             <option value="{{ $parent->id }}" {{ $parent->id == $category->parent_id ? 'selected' : ''}}>{{ $parent->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <input type="submit" name="addcategory" value="Add Category" class="btn btn-success">
                    </div>

                </form>
  <!--Create New Category page end-->
              </div>
            </div>
          </div>

  </div><!-- br-section-wrapper -->
</div>
@endsection
