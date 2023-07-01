@extends('admin.layouts.base')

@section('title', 'Transaction')

@section('content')
    <div class="section-body">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="movie" class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Package</th>
                                <th>User</th>
                                <th>Amount</th>
                                <th>Transaction Code</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>{{ $transaction->package->name}}</td>
                                    <td>{{ $transaction->user->name}}</td>
                                    <td>{{ $transaction->ammount}}</td>
                                    <td>{{ $transaction->transaction_code}}</td>
                                    <td>{{ $transaction->transaction_status}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#movie').DataTable();
    </script>
@endsection

