<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::all();
        return view('admin.pesanan.index', compact('customers'));
    }

    public function detail($id) {
        $customer = Customer::find($id);
        return view('admin.pesanan.detail', compact('customer'));
    }

    public function create() {
        return view('admin.pesanan.create');
    }

    public function store(Request $request) {
        // Check phone number
        $phone = str_replace(" ","",$request->input('phone'));
        $phone = str_replace("(","",$phone);
        $phone = str_replace(")","",$phone);
        $phone = str_replace(".","",$phone);
        $phone = str_replace("-","",$phone);
        if(!preg_match('/[^+0-9]/',trim($phone))){
            if(substr(trim($phone), 0, 3) == '+62'){
                $phone = trim($phone);
            }
            elseif(substr(trim($phone), 0, 1) == '0'){
                $phone = '+62'.substr(trim($phone), 1);
            }
        }
        // Merge request input
        $request->merge([
            'phone' => $phone,
        ]);

        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'company' => 'string|max:255',
            'phone' => 'required|string|max:13',
            'address' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Image upload
        $imageName = time() . '-' . $request->input('name') . '.' . $request->image->extension();
        $imageName = Str::of($imageName)->replace(' ', '');
        $request->image->move(public_path('img/customer'), $imageName);

        // Create customer
        Customer::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'company' => $request->input('company'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'image' => '/img/customer/' . $imageName,
        ]);

        return redirect()->route('admin.pesanan')->with('success', 'Pesanan berhasil ditambahkan');
    }

    public function edit($id) {
        $customer = Customer::find($id);
        return view('admin.pesanan.edit', compact('customer'));
    }

    public function update(Request $request, $id) {
        // Check phone number
        $phone = str_replace(" ","",$request->input('phone'));
        $phone = str_replace("(","",$phone);
        $phone = str_replace(")","",$phone);
        $phone = str_replace(".","",$phone);
        $phone = str_replace("-","",$phone);
        if(!preg_match('/[^+0-9]/',trim($phone))){
            if(substr(trim($phone), 0, 3) == '+62'){
                $phone = trim($phone);
            }
            elseif(substr(trim($phone), 0, 1) == '0'){
                $phone = '+62'.substr(trim($phone), 1);
            }
        }
        // Merge request input
        $request->merge([
            'phone' => $phone,
        ]);

        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'company' => 'string|max:255',
            'phone' => 'required|string|max:13',
            'address' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update customer
        Customer::find($id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'company' => $request->input('company'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);

        // Image upload
        if($request->hasFile('image')){
            if (Customer::find($id)->image != null) {
                File::delete(public_path(Customer::find($id)->image));
            }
            $imageName = time() . '-' . $request->input('name') . '.' . $request->image->extension();
            $imageName = Str::of($imageName)->replace(' ', '');
            $request->image->move(public_path('img/customer'), $imageName);
            Customer::find($id)->update([
                'image' => '/img/customer/' . $imageName,
            ]);
        }

        // Redirect
        return redirect()->route('admin.pesanan')->with('success', 'Pesanan berhasil diubah');
    }

    public function delete($id) {
        $customer = Customer::find($id);
        if ($customer->image != null) {
            File::delete(public_path($customer->image));
        }
        $customer->delete();
        return redirect()->route('admin.pesanan')->with('success', 'Pesanan berhasil dihapus');
    }

    public function formLogin() {
        if (auth('customer')->check()) {
            return redirect()->route('customer.orders');
        } else {
            return view('client.auth.login');
        }
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth('customer')->attempt($request->only(['email', 'password']))) {
            return redirect()->route('customer.orders');
        } else {
            return redirect()->route('customer.login')->with('error', 'Email atau password salah');
        }
    }

    public function profile() {
        $customer = Auth::guard('customer')->user();
        return view('client.auth.profile', compact('customer'));
    }

    public function updateProfile(Request $request) {
        // Check phone number
        $phone = str_replace(" ","",$request->input('phone'));
        $phone = str_replace("(","",$phone);
        $phone = str_replace(")","",$phone);
        $phone = str_replace(".","",$phone);
        $phone = str_replace("-","",$phone);
        if(!preg_match('/[^+0-9]/',trim($phone))){
            if(substr(trim($phone), 0, 3) == '+62'){
                $phone = trim($phone);
            }
            elseif(substr(trim($phone), 0, 1) == '0'){
                $phone = '+62'.substr(trim($phone), 1);
            }
        }
        // Merge request input
        $request->merge([
            'phone' => $phone,
        ]);

        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'company' => 'string|max:255',
            'phone' => 'required|string|max:13',
            'address' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Id customer
        $id = Auth::guard('customer')->user()->id;

        // Update customer
        Customer::find($id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'company' => $request->input('company'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);

        // Image upload
        if($request->hasFile('image')){
            if (Customer::find($id)->image != null) {
                File::delete(public_path(Customer::find($id)->image));
            }
            $imageName = time() . '-' . $request->input('name') . '.' . $request->image->extension();
            $imageName = Str::of($imageName)->replace(' ', '');
            $request->image->move(public_path('img/customer'), $imageName);
            Customer::find($id)->update([
                'image' => '/img/customer/' . $imageName,
            ]);
        }

        // Redirect
        return redirect()->route('customer.profile')->with('success', 'Profil berhasil diubah');
    }

    public function updatePassword(Request $request) {
        // Validate request
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        // Check old password
        if (Hash::check($request->input('old_password'), Auth::guard('customer')->user()->password)) {
            // Update password
            Customer::find(Auth::guard('customer')->user()->id)->update([
                'password' => Hash::make($request->input('new_password')),
            ]);
            // Redirect
            return redirect()->route('customer.profile')->with('success', 'Kata sandi berhasil diubah');
        } else {
            // Redirect
            return redirect()->route('customer.profile')->with('error', 'Kata sandi lama salah');
        }
    }

    public function logout() {
        auth('customer')->logout();
        return redirect()->route('landing');
    }
}