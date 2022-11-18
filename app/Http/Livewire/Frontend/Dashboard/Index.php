<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use App\Models\Course;
use App\Models\CourseEnrollment;
use App\Models\Notification;
use App\Models\Order;
use Auth;
use Livewire\Component;

class Index extends Component
{
    public $orders, $notifications, $courses;

    public function mount()
    {
        $filter['customer_id'] = Auth::user()->id;
        $filter['limit'] = 5;
        $notifications = Notification::where(['type' => 'alert', 'dismissed' => 'N', 'customer_id' => Auth::user()->id])->where('viewed', '<', 3)->get();
        $this->notifications = $notifications;
        
        $orders = Order::where('parent_id', 0)->where('vendor_id', NULL)->where('customer_id', $filter['customer_id'])->orderBy('id', 'DESC')->paginate('10');
        foreach($orders as $order)
        {
            $this->orders[] = $order;
        }

        $this->courses = CourseEnrollment::where('user_id', Auth::user()->id)->get();
    }

    public function render()
    {
        return view('livewire.frontend.dashboard.index');
    }

    public function ChangeView($view)
    {
        $this->view = $view;
    }
}
