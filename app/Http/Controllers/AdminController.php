<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Question;
use App\Models\Review;
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
    public function main(){
        $countKitchenMembers = User::where('status', 'kitchen')->count();
        $countDeliverMembers = User::where('status', 'deliver')->count();
        $countQuestions = Question::all()->count();
        $countMenuPositions = Menu::all()->count();

        $totalPrices = [];
        $orderCounts = [];
        $months = range(1, 12);

        foreach ($months as $month) {
            $totalPrices[date('F', mktime(0, 0, 0, $month, 1))] = Order::whereMonth('created_at', $month)->sum('price');
            $orderCounts[date('F', mktime(0, 0, 0, $month, 1))] = Order::whereMonth('created_at', $month)->count();
        }



        return view('templates.adminHeader') .view('adminFolder.mainMenu', compact('countKitchenMembers', 'countDeliverMembers', 'countQuestions', 'countMenuPositions', 'totalPrices', 'orderCounts'));
    }


    public function addDishes(){
        return view('templates.adminHeader') .view('adminFolder.addMenuPosition');
    }

    private function requestDishesForm(Request $request, $type){

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

        return $type == 1 ? $data : $imageData;

    }

    public function saveDishes(Request $request){
        $data = $this->requestDishesForm($request, 1);
        $imageData = $this->requestDishesForm($request, 2);

        $this->service->addImageDishesToMenu($imageData, $this->service->addDishesToMenu($data));

        return redirect()->to(route('admin.menu'));
    }
    public function editDishes($id){
        $dish = Menu::find($id);

        return view('templates.adminHeader') .view('adminFolder.editDishes', ['dish' => $dish]);
    }
    public function saveEditDishes(Request $request ,$id){
        $data = $this->requestDishesForm($request, 1);

        $this->service->saveEditDishes($data, $id);

        return redirect()->to(route('admin.menu'));
    }




    public function addKitchen(){
        return view('templates.adminHeader') .view('adminFolder.addKitchenEmployee');
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

    public function saveAddKitchen(Request $request){
        $data = $this->requestKitchenForm($request);

        $this->service->saveNewKitchen($data);

        return redirect()->to(route('kitchen.main'));
    }
    public function saveEditKitchen(Request $request, $id){
        $data = $this->requestKitchenForm($request);

        $this->service->saveEditKitchen($data, $id);

        return redirect()->to(route('kitchen.main'));
    }

    private function requestKitchenForm(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'password' => 'required',
        ]);

        return $data;
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


    public function editDelivery($id){
        $user = User::find($id);

        return view('templates.adminHeader') .view('adminFolder.editDeliverEmployee', ['user' => $user]);
    }
    public function saveAddProvider(Request $request){
        $data = $this->requestDeliveryForm($request);

        $this->service->saveNewProvider($data);

        return redirect()->to(route('delivery.main'));
    }
    public function saveEditDelivery(Request $request, $id){
        $data = $this->requestDeliveryForm($request);

        $this->service->saveEditProvider($data, $id);

        return redirect()->to(route('delivery.main'));
    }

    private function requestDeliveryForm(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'password' => 'required',
        ]);

        return $data;
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

    public function orders(){
        $orders = Order::all();

        return view('templates.adminHeader') .view('adminFolder.orders', ['orders' => $orders]);
    }

    public function reviews(){
        $reviews = Review::all();

        return view('templates.adminHeader') .view('adminFolder.reviews', ['reviews' => $reviews]);
    }
    public function reviewDelete($id){
        $this->service->reviewDelete($id);

        return back();
    }
}
