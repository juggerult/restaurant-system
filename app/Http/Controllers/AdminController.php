<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends BaseController
{


    public function menu()
    {
        $menu = Menu::all()->reverse();

        return view('templates.adminHeader') . view('adminFolder.menu', ['menus' => $menu]);
    }



    public function addDishes(){
        return view('templates.adminHeader') .view('adminFolder.addMenuPosition');
    }
    public function saveDishes(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'weight' => 'required',
            'price' => 'required',
            'description' => 'required',
            'type_dishes' => 'required'
        ]);

        $imageData = $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $this->service->addImageDishesToMenu($imageData, $this->service->addDishesToMenu($data));

        return redirect()->to(route('admin.menu'));
    }
    public function editDishes($id){
        $dish = Menu::find($id);

        return view('templates.adminHeader') .view('adminFolder.editDishes', ['dish' => $dish]);
    }
    public function saveEditDishes(Request $request ,$id){
        $data = $request->validate([
            'name' => 'required',
            'weight' => 'required',
            'price' => 'required',
            'description' => 'required',
            'type_dishes' => 'required'
        ]);

        $this->service->saveEditDishes($data, $id);

        return redirect()->to(route('admin.menu'));
    }




    public function addKitchen(){
        return view('templates.adminHeader') .view('adminFolder.addKitchenEmployee');
    }
    public function saveAddKitchen(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'password' => 'required',
        ]);

        $this->service->saveNewKitchen($data);

        return redirect()->to(route('kitchen.main'));
    }
    public function kitchen(){
        $employees = User::where('status', 'kitchen')->get();
        $countOfDone = Order::where('status_oder', 'Приготовлено')
                     ->where('cook_id', Auth::user()->id)->get()->count();

        return view('templates.adminHeader') .view('adminFolder.kitchenEmployee', compact('employees', 'countOfDone'));
    }
    public function editKitchen($id){
        $user = User::find($id);

        return view('templates.adminHeader') .view('adminFolder.editKitchen', ['user' => $user]);
    }
    public function saveEditKitchen(Request $request, $id){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'password' => 'required',
        ]);

        $this->service->saveEditKitchen($data, $id);

        return redirect()->to(route('kitchen.main'));
    }
    public function deleteKitchen($id){
        $this->service->deleteKitchen($id);

        return back();
    }




    public function delivery(){
        $employees = User::where('status', 'deliver')->get();
        $countOfDone = Order::where('status_oder', 'Доставлено')
                     ->where('provider_id', Auth::user()->id)->get()->count();

        return view('templates.adminHeader') .view('adminFolder.deliveryEmployee', compact('employees', 'countOfDone'));
    }
    public function addProvider(){
        return view('templates.adminHeader') .view('adminFolder.addDeliverEmployee');
    }
    public function saveAddProvider(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'password' => 'required',
        ]);

        $this->service->saveNewProvider($data);

        return redirect()->to(route('delivery.main'));
    }

    public function editDelivery($id){
        $user = User::find($id);

        return view('templates.adminHeader') .view('adminFolder.editDeliverEmployee', ['user' => $user]);
    }
    public function saveEditDelivery(Request $request, $id){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'password' => 'required',
        ]);

        $this->service->saveEditProvider($data, $id);

        return redirect()->to(route('delivery.main'));
    }
    public function deleteDelivery($id){
        $this->service->deleteProvider($id);

        return back();
    }


    public function users(){
        $users = User::where('status', 'user')->get();

        return view('templates.adminHeader') .view('adminFolder.users', ['users' => $users]);
    }
    public function deleteUser($id){
        $this->service->deleteUser($id);

        return back();
    }
    public function restoreUser($id){
        $this->service->restoreUser($id);

        return back();
    }


    public function question(){
        $questions = Question::all();

        return view('templates.adminHeader') .view('adminFolder.questions', ['questions' => $questions]);
    }
    public function deleteQuestion($id){
        $this->service->deleteQuestion($id);

        return back();
    }
}
