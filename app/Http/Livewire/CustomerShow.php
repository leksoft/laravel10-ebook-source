<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\Customer;
use Livewire\Component;

class CustomerShow extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $customer_name, $customer_email, $customer_tel, $customer_id;
    public $search = '';

    protected function rules()
    {
        return [
            'customer_name' => 'required|string|min:5',
            'customer_email' => ['required','email'],
            'customer_tel' => 'required|string',
        ];
    }
    protected function messages(){
        return [
            'customer_name.required' => 'กรุณาระบุชื่อลูกค้า',
            'customer_email.required' => 'กรุณาระบุอีเมล',
            'customer_tel.required' => 'กรุณาระบุเบอร์โทรศัพท์',

        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveCustomer()
    {
        $validatedData = $this->validate();

        Customer::create($validatedData);
        session()->flash('message','เพิ่มลูกค้าเรียบร้อยแล้ว');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editCustomer(int $customer_id)
    {
        $customer = Customer::find($customer_id);
        if($customer){

            $this->customer_id = $customer->id;
            $this->customer_name = $customer->customer_name;
            $this->customer_email = $customer->customer_email;
            $this->customer_tel = $customer->customer_tel;
        }else{
            return redirect()->to('/customer');
        }
    }

    public function updateCustomer()
    {
        $validatedData = $this->validate();

        Customer::where('id',$this->customer_id)->update([
            'customer_name' => $validatedData['customer_name'],
            'customer_email' => $validatedData['customer_email'],
            'customer_tel' => $validatedData['customer_tel']
        ]);
        session()->flash('message','แก้ไขข้อมูลลูกค้าเรียบร้อยแล้ว');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteCustomer(int $customer_id)
    {
        $this->customer_id = $customer_id;
    }

    public function destroyCustomer()
    {
        Customer::find($this->customer_id)->delete();
        session()->flash('message','ลูกข้อมูลลูกค้าเรียบร้อยแล้ว');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->customer_name = '';
        $this->customer_email = '';
        $this->customer_tel = '';
    }

    public function render()
    {
        $customers = Customer::where('customer_name', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5);
        return view('livewire.customer-show', ['customers' => $customers]);
    }
}
