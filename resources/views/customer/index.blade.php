@extends('layouts.frontend')

@section('content')
    <div>
        <livewire:customer-show>
    </div>
@endsection

@section('js_before')
    <script>
        window.addEventListener('close-modal', event => {

            $('#customerModal').modal('hide');
            $('#updateCustomerModal').modal('hide');
            $('#deleteCustomerModal').modal('hide');
        })
    </script>
@endsection
