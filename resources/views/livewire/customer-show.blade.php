<div>

    @include('livewire.customermodal')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Laravel Livewire CRUD ด้วย Bootstrap Modal
                            <input type="search" wire:model="search" class="form-control float-end mx-2"
                                placeholder="ค้นหา..." style="width: 250px" />
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#customerModal">
                                เพิ่มลูกค้าใหม่
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ชื่อลูกค้า</th>
                                    <th>อีเมล</th>
                                    <th>เบอร์โทร</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->id }}</td>
                                        <td>{{ $customer->customer_name }}</td>
                                        <td>{{ $customer->customer_email }}</td>
                                        <td>{{ $customer->customer_tel }}</td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#updateCustomerModal"
                                                wire:click="editCustomer({{ $customer->id }})" class="btn btn-primary">
                                                แก้ไข
                                            </button>
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#deleteCustomerModal"
                                                wire:click="deleteCustomer({{ $customer->id }})"
                                                class="btn btn-danger">ลบ</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">ไม่พบข้อมูล</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $customers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
