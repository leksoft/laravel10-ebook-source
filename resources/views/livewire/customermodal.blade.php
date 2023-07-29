<!-- Insert Customer Modal -->
<div wire:ignore.self class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customerModalLabel">เพิ่มลูกค้าใหม่</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="saveCustomer">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>ชื่อลูกค้า</label>
                        <input type="text" wire:model="customer_name" class="form-control">
                        @error('customer_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>อีเมล</label>
                        <input type="text" wire:model="customer_email" class="form-control">
                        @error('customer_email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>เบอร์โทร</label>
                        <input type="text" wire:model="customer_tel" class="form-control">
                        @error('customer_tel')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Update Customer Modal -->
<div wire:ignore.self class="modal fade" id="updateCustomerModal" tabindex="-1"
    aria-labelledby="updateCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateCustomerModalLabel">แก้ไขข้อมูลลูกค้า</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateCustomer">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>ชื่อลูกค้า</label>
                        <input type="text" wire:model="customer_name" class="form-control">
                        @error('customer_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>อีเมล</label>
                        <input type="text" wire:model="customer_email" class="form-control">
                        @error('customer_email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>เบอร์โทร</label>
                        <input type="text" wire:model="customer_tel" class="form-control">
                        @error('customer_tel')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary">แก้ไข</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Customer Modal -->
<div wire:ignore.self class="modal fade" id="deleteCustomerModal" tabindex="-1"
    aria-labelledby="deleteCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCustomerModalLabel">ลบข้อมูลลูกค้า</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyCustomer">
                <div class="modal-body">
                    <h4>ยืนยันการลบข้อมูลหรือไม่ ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary">ยืนยัน</button>
                </div>
            </form>
        </div>
    </div>
</div>
