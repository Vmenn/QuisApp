        @extends('guru.body.app')
        @section('main')

        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                    Tambah
                  </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if ($quiz->isNotEmpty())
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama Quiz</th>
                        <th>Status</th>
                        <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quiz as $item)
                        <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama}}</td>
                        <td>
                            @if ($item->status == 1)
                                <span class="badge badge-success">Aktiv</span>    
                            @else
                                <span class="badge badge-danger">Tidak Aktiv</span>    
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('create.soal',$item->id)}}"  class="btn btn-sm btn-info mr-2">Tambah Soal</a>
                                <a href="{{route('lihat.soal',$item->id)}}"class="btn btn-sm btn-info mr-2">Lihat soal</a>
                                <a href="{{route('edit.soal',$item->id)}}" class="btn btn-sm btn-primary mr-2">Edit</a>
                                <a  class="btn btn-sm btn-danger">Hapus</a>
                                <a  class="btn btn-sm btn-danger">Lihat Murid</a>
                            </div>
                        </td>
                        </tr>
                    @endforeach
                    
                    </tfoot>
                </table>
                @else
                    <Span>Data TIdak Ada</Span>
                @endif
           
            </div>
            <!-- /.card-body -->
        </div>
        {{$quiz->links('pagination::bootstrap-4')}}

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Form Name Quis</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="">Name</label>
                            <input type="text" class="form-control"  name="nama">
                        </div>
                    </div>
                    <div class="justify-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                  </form>
                </div>
                
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        @endsection