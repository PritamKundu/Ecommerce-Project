@extends ('backend.template.layout')

@section('dashboard-content')
<div class="br-mainpanel">
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
        <h4>Dashboard</h4>
        <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
i       </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">
        <h6 class="br-section-label">Add Brand Name</h6>
        <p class="br-section-text">An example some text within a card block.</p>

        <div class="row mg-b-20">
            <div class="col-md">
            <div class="card card-body">
                <!--Create New Brand page start-->
                <form action="{{route('storebrands')}}" method="POST" enctype="multipart/form-data">
                    @csrf
              			<div class="form-group">
              				<label>Brand Name</label>
              				<input type="text" name="brand_name" class="form-control">
              			</div>

              			<div class="form-group">
              				<label>Description</label>
              				<textarea name="brand_description" class="form-control" rows="3"></textarea>
              			</div>

              			<div class="form-group">
              				<label>Brand Thumbnail</label>
              				<input type="file" name="image" class="form-control-file">
              			</div>

              			<div class="form-group">
              				<input type="submit" name="addbrand" value="Add Brand" class="btn btn-success">
              			</div>

              	</form>
	<!--Create New Category page end-->
              </div>
            </div>
          </div>

	</div><!-- br-section-wrapper -->
</div>
@endsection
