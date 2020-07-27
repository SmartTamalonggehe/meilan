@extends('Admin.layout.default')

@section('isi')
<div class="col-md-12">
    <div class="card card-plain">
        <div class="card-header card-header-success">
            <h4 class="card-title mt-0"> Table on Plain Background <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#exampleModal">
                Tambah Data
              </button> </h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Salary</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Dakota Rice</td>
                            <td>Niger</td>
                            <td>Oud-Turnhout</td>
                            <td>$36,738</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Minerva Hooper</td>
                            <td>Curaçao</td>
                            <td>Sinaai-Waas</td>
                            <td>$23,789</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content dark-edition">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                   <label for="exampleInput1" class="bmd-label-floating">With Floating Label</label>
                   <input type="email" class="form-control" id="exampleInput1">
                </div>
                <div class="form-group">
                    <label for="jenkel">Jenkel</label><br>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
                            Radio is off
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" checked>
                            Radio is on
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>   
                </div> 
                <div class="form-group">
                    <label for="exampleInput1" class="bmd-label-floating">With Floating Label</label>
                    <input type="email" class="form-control" id="exampleInput1">
                 </div>     
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success">Save changes</button>
        </div>
            </form>
      </div>
    </div>
  </div>
@endsection