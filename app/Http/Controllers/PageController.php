<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\product;
use App\category;
use App\Users;
use Auth;
use Hash;
use App\TimeLine;
use App\Customer;
use App\orders;
use App\status;

class PageController extends Controller
{
	public function Login()
	{
		return view('login');
	}
	public function postLogin(Request $req)
	{
		$this->validate($req,[
			'email'=>'required',
			'password'=>'required|min:8|max:42'
		],[
			'email.required'=>'Bạn chưa nhập email',
			'password.required'=>'Bạn chưa nhập password',
			'password.min'=>'Mật khẩu phải chưa ít nhất 8 ký tự',
			'password.max'=>'Mật khẩu phải chứa 8~42 ký tự'
		]);

        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password],true)){
        	return redirect(url('Admin/Home'));
        }
        else{
            return redirect(url('Admin/login'))->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
	}
	public function Register()
	{
		return view('register');
	}
	public function postRegister(Request $req)
	{
		$this->validate($req,[
			'email'=>'required|email|unique:users,email',
			'password'=>'required|min:8|max:42',
			'repassword'=>'required|same:password',
			'name'=>'required',
			'check'=>'required'
		],[
			'email.required'=>'Bạn chưa nhập email',
			'email.unique'=>'Email đã tồn tại',
			'password.required'=>'Bạn chưa nhập password',
			'password.min'=>'password phải có độ dài ít nhất 8 ký tự',
			'password.max'=>'password phải có độ dài từ 8~42 ký tự',
			'repassword.required'=>'Bạn chưa nhập lại password',
			'repassword.same'=>'password nhập lại không trùng',
			'name.required'=>'Bạn chưa nhập tên của mình',
			'check.required'=>'Bạn chưa đồng ý điều khoản'
		]);
		$user = new Users();
		$check = $req->check;
		if($check==1){
			$user->name = $req->name;
			$user->email = $req->email;
			$user->password = Hash::make($req->password);
			$user->remember_token = "bjfbelrhknflhfiefff354f3ffhajfbwjf";
			if ($req->image) {
    		$file = $req->file('image');
    		echo $req->image;
    		$duoi = $file->getClientOriginalExtension();
		    if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg')
		    	{
		    		return redirect(url('insert'))->with("Lỗi", "Bạn chỉ có thể đưa vào file có đuôi jpg, png hoặc jpeg");
		    	}
    		$nameimage = $file->getClientOriginalName();
    		$image1 = str_random(5)."_".$nameimage;
    		while (file_exists("images/".$image1)) {
    			$image1 = str_random(5)."_".$nameimage;
    		}
    		$file->move("../images/",$image1);
    		$user->image = "../images/".$image1;
    	}
    	else
    	{
    		$user->image = "";
    	}
			$user->save();
			return redirect('Admin/login');
		}
		else
		{
			return redirect('register')->with(['thongbao','message'=>'Bạn chưa đồng ý với điều khoản của chúng tôi']);
		}	
	}
    public function ListUser(){
        $data['arr'] = Users::paginate(10);
        return view('listuser',$data);
    }
	public function Profile($id)
	{
		$data['arr'] = Users::where('id',$id)->get();
		$data2['arr2'] = TimeLine::where('id_user',$id)->get();
		return view('profile',$data,$data2);
	}
	public function Home()
	{
        $orders = orders::orderBy('id','DESC')->limit(10)->get();
        $data['arr'] = Users::orderBy('id','DESC')->limit(8)->get();
		return view('Home',$data,['orders'=>$orders]);
	}
    public function Upstatuscart($id)
    {
        $orders = orders::where('id',$id)->get();
        $data['arr'] = status::all();
        return view('Upstatuscart',['orders'=>$orders],$data);
    }
    public function PostUpstatuscart(Request $req,$id)
    {
        $status = $req->status;
        orders::where('id',$id)->update(['id_status'=>$status]);
        return redirect(url('Admin/Home'));
    }
    public function ListOrder()
    {
        $orders = orders::orderBy('id','DESC')->paginate(20);
        return view('listorder',['orders'=>$orders]);
    }
	public function getinsert()
	{
		$data['arr'] = category::all();
		return view('insert',$data);
	}
    public function insert(Request $req)
    {
    	$product = new product();
    	$product->name = $req->product;
    	$product->origin = $req->origin;
    	$product->price = $req->price;
    	$product->id_category = $req->category;
    	if ($req->image) {
    		$file = $req->file('image');
    		$duoi= $file->getClientOriginalExtension();
		    if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg')
		    	{
		    		return redirect(url('insert'))->with("Lỗi", "Bạn chỉ có thể đưa vào file có đuôi jpg, png hoặc jpeg");
		    	}
    		$nameimage = $file->getClientOriginalName();
    		$image1 = str_random(5)."_".$nameimage;
    		while (file_exists("images/".$image1)) {
    			$image1 = str_random(5)."_".$nameimage;
    		}
    		$file->move("../images/",$image1);
    		$product->image = "../images/".$image1;
    	}
    	else
    	{
    		$product->image = "";
    	}
    	$product->save();
    	return redirect(url('Admin/list'));
    }
    public function Viewlist()
    {

    	$data['arr'] = product::paginate(6);
    	return view('list',$data);
    }
    public function delete($id)
    {
    	$product = new product();
    	$product->where('id',$id)->delete();
    	return redirect(url('Admin/list'));
    }
    public function EditProduct($id)
    {
    	$product = new product();
    	$data['arr'] = $product->where('id',$id)->get();
    	// echo json_decode($data);
    	$data2['arr2'] = category::all();
    	return view('editproduct',$data,$data2);
    }
    public function postEditProduct(Request $req,$id)
    {
    	// $product = new product();
    	$name = $req->product;
    	$id_category = $req->category;
    	$origin = $req->origin;
    	$price = $req->price;
    	if ($req->image) {
    		$file = $req->file('image');
    		$duoi= $file->getClientOriginalExtension();
		    if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg')
		    	{
		    		return redirect(url('Admin/Edit/{id}'))->with("Lỗi", "Bạn chỉ có thể đưa vào file có đuôi jpg, png hoặc jpeg");
		    	}
    		$nameimage = $file->getClientOriginalName();
    		$image1 = str_random(5)."_".$nameimage;
    		while (file_exists("images/".$image1)) {
    			$image1 = str_random(5)."_".$nameimage;
    		}
    		$file->move("../images/",$image1);
    		$image2 = "../images/".$image1;
    	}
    	else
    	{
    		$image2 ="";
    		
    	}
    	if($image2 !=""){
    		product::where('id',$id)->update(['name'=>$name,'id_category'=>$id_category,'origin'=>$origin,'price'=>$price,'image'=>$image2]);
    		return redirect('Admin/list');
    	}
    	else{
    		product::where('id',$id)->update(['name'=>$name,'id_category'=>$id_category,'origin'=>$origin,'price'=>$price]);
    		return redirect('Admin/list');
    	}
    	
    	
    }
    public function InsertCategory()
    {
    	return view('insertcategory');
    }
    public function postInsertCategory(Request $req)
    {
    	$category = new category();
    	$category->name = $req->category;
    	$category->save();
    	return redirect('Admin/listcategory');
    }
    public function ListCategory()
    {
    	$data['arr'] = category::paginate(10);
    	return view('listcategory',$data);
    }
    public function DeleteCategory($id)
    {
    	category::where('id',$id)->delete();
    	return redirect('Admin/listcategory');
    }
    public function EditCategory($id)
    {
    	$data['arr'] = category::where('id',$id)->get();
    	return view('editcategory',$data);
    }
    public function postEditCategory(Request $req,$id)
    {
    	$name = $req->category;
    	category::where('id',$id)->update(['name'=>$name]);
    	return redirect('Admin/listcategory');
    }
    public function Diary($id)
    {
    	return view('diary');
    }
    public function insertDiary(Request $req,$id)
    {
    	$infor = $req->diary;
    	TimeLine::insert(['id_user'=>$id,'infor'=>$infor]);
    	return redirect('Admin/profile/'.$id);
    }
    public function viewHome(){
        $data = product::orderBy('id','DESC')->limit(6)->get();
       return view('users.Home',['data'=>$data]);
    }
}
