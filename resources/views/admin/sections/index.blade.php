@extends('layouts.admin2')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Section </h4>
        <p class="card-description">
          <form>
            <label for="txtsearch">ค้นหา</label>
            <input name='txtsearch' placeholder="ค้นหา" type="text" value="{{ Request::get('txtsearch') }}" />
            <button type="submit" >ค้นหา</button> 
          </form>
        </p>
        <a href="{{url('admin/sections/create')}}" class="btn btn-primary">Add</a>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Seq</th>
                <th scope="col">Name</th>
                <th scope="col">course</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($sections as $section)
                <tr>
                    <th scope="row">{{ $section->id }}</th>
                    <td>{{ $section->seq }}</td>
                    <td>{{ $section->name }}</td>
                    <td>{{ $section->lesson->name }}</td>
                    <td>{{ $section->status }}</td>
                    <td>
                        <a href="{{ url('/admin/sections/'.$section->id) }}" class="btn btn-secondary">View</a>
                        <a href="{{ url('/admin/sections/'.$section->id.'/edit') }}" class="btn btn-primary">Edit</a>
                        <form action="{{ url('/admin/sections/'.$section->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" value="delete" class="btn btn-danger">Delete
                        </button>
                      </form>
                      </td>
                  </tr>
                @endforeach 
              </tbody>
            </table>
            <?php echo $sections->appends(['txtsearch' => Request::get('txtsearch')])->links(); ?>
          </div>
        </div>
    


@endsection