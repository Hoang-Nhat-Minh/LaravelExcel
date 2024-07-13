<div class="card-body">
  <div class="table-responsive">
    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <div class="dataTables_length" id="dataTable_length">
            <label>Show
              <select name="dataTable_length" wire:model="paginate" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                <option value="1">1</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
              </select>
              users</label>
          </div>
        </div>
        <div class="col-sm-12 col-md-6">
          <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" wire:model="key" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
            <thead>
              <tr>
                <th rowspan="1" colspan="1">ID</th>
                <th rowspan="1" colspan="1">Name</th>
                <th rowspan="1" colspan="1">Avatar</th>
                <th rowspan="1" colspan="1">Email</th>
                <th rowspan="1" colspan="1">Start date</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th rowspan="1" colspan="1">ID</th>
                <th rowspan="1" colspan="1">Name</th>
                <th rowspan="1" colspan="1">Avatar</th>
                <th rowspan="1" colspan="1">Email</th>
                <th rowspan="1" colspan="1">Start date</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($users as $key => $u)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $u->name }}</td>
                <td>
                  <img src="{{ asset('storage/' . $u->avatar) }}" alt="{{ $u->name }}" style="height:40px;width:40px">
                </td>
                <td>{{ $u->email }}</td>
                <td>{{ \Carbon\Carbon::parse($u->created_at)->format('d-m-Y') }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      {{ $users->links('vendor.custom_paginate') }}
    </div>
  </div>
</div>
