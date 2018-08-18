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
use App\slide;
use App\sale;
use Cart;
use App\fontsicons;
use App\review;
use App\image;
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

        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password,'status'=>1],true)){
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
		$validator = \Validator::make($req->all(),[
			'email'=>'required|email|unique:users,email',
			'password'=>'required|min:8|max:42',
			'repassword'=>'required|same:password',
			'name'=>'required',
		],[
			'email.required'=>'Bạn chưa nhập email',
			'email.unique'=>'Email đã tồn tại',
			'password.required'=>'Bạn chưa nhập password',
			'password.min'=>'password phải có độ dài ít nhất 8 ký tự',
			'password.max'=>'password phải có độ dài từ 8~42 ký tự',
			'repassword.required'=>'Bạn chưa nhập lại password',
			'repassword.same'=>'password nhập lại không trùng',
			'name.required'=>'Bạn chưa nhập tên của mình',
		]
        );
        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        if($validator->passes())
        {
           $user = new Users();
           $user->name = $req->name;
           $user->status = 1;
           $user->email = $req->email;
           $user->password = Hash::make($req->password);
           $user->remember_token = "bjfbelrhknflhfiefff354f3ffhajfbwjf";
            // if ($req->image) {
            // $file = $req->file('image');
            // echo $req->image;
            // $duoi = $file->getClientOriginalExtension();
            // if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg')
            //     {
            //         return redirect(url('insert'))->with("Lỗi", "Bạn chỉ có thể đưa vào file có đuôi jpg, png hoặc jpeg");
            //     }
            // $nameimage = $file->getClientOriginalName();
            // $image1 = str_random(5)."_".$nameimage;
            // while (file_exists("images/".$image1)) {
            //     $image1 = str_random(5)."_".$nameimage;
            // }
            // $file->move("../images/",$image1);
           $image1="avatar.png";
           $user->image = "../images/".$image1;
           $user->save();
           return response()->json(['success'=>'Bạn đã đăng ký thành công']);
        }    
        }
    public function ListUser(){
        $data['arr'] = Users::orderBy('status','DESC')->paginate(10);
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
        $orders = orders::orderBy('id_status')->limit(10)->get();
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
        return redirect(url('Admin/list_order'));
    }
    public function ListOrder()
    {
        $orders = orders::orderBy('id_status')->orderBy('id','DESC')->paginate(20);
        $td = orders::all()->count();
        return view('listorder',['orders'=>$orders,'td'=>$td]);
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
        $product->info = $req->content;
    	$product->save();

    	return redirect(url('Admin/list'));
    }
    public function Viewlist()
    {

    	$data = product::paginate(6);
    	return view('list',['data'=>$data]);
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
        $font = fontsicons::all(); 
    	return view('insertcategory',['font'=>$font]);
    }
    public function postInsertCategory(Request $req)
    {
    	$category = new category();
    	$category->name = $req->category;
        $category->id_icons= $req->icon;
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
    public function listSlide()
    {
        $slide = slide::paginate(6);
        return view('slide',['slide'=>$slide]);
    }
    public function DeleteSlide($id)
    {
        slide::where('id',$id)->delete();
        return redirect('Admin/list_slide');
    }
    public function getAddSlide()
    {
        return view('addslide');
    }
    public function AddSlide(Request $req)
    {
        $slide = new slide();
        if ($req->image) {
            $file = $req->file('image');
            $duoi= $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg')
                {
                    return redirect(url('insert'))->with("Lỗi", "Bạn chỉ có thể đưa vào file có đuôi jpg, png hoặc jpeg");
                }
            $nameimage = $file->getClientOriginalName();
            $image1 = str_random(5)."_".$nameimage;
            while (file_exists("users/img/".$image1)) {
                $image1 = str_random(5)."_".$nameimage;
            }
            $file->move("users/img/",$image1);
            $slide->image = "users/img/".$image1;
        }
        else
        {
            $product->image = "";
        }
        $slide->save();
        return redirect(url('Admin/list_slide'));
    }
    public function viewHome(){
        $category = category::all();
        $product = product::all();
        $data = product::orderBy('id','DESC')->limit(6)->get();
        $datan = product::orderBy('id','DESC')->limit(3)->get();
        $slide = slide::all();
        $datax = product::all()->load('sale');
        $contents = Cart::content();
       return view('users.Home',['data'=>$data,'slide'=>$slide,'datax'=>$datax,'contents'=>$contents,'category'=>$category,'product'=>$product,'datan'=>$datan]);
    }
    public function listSale(){
        $data = sale::paginate(10);
        return view('listsale',['data'=>$data]);
    }
    public function deleteSale($id){
        sale::where('id',$id)->delete();
        return redirect(url('Admin/list_sale'));
    }
    public function getAddSale()
    {
        return view('add_sale');
    }
    public function postAddSale(Request $req)
    {
        $sale = new sale();
        $sale->percent = $req->percent;
        $sale->save();
        return redirect(url('Admin/list_sale'));
    }
    public function getSaleProduct($id)
    {
        $sale = sale::orderBy('percent')->get();
        $data = product::where('id',$id)->get();
        return view('saleproduct',['data'=>$data,'sale'=>$sale]);
    }
    public function postSaleProduct(Request $req,$id)
    {
        $percent = $req->sale;
        product::where('id',$id)->update(['id_sale'=>$percent]);
        return redirect(url('Admin/list'));
    }
    public function getSaleCategory($id)
    {
        $category = category::where('id',$id)->get();
        $sale = sale::orderBy('percent')->get();
        return view('salecategory',['category'=>$category,'sale'=>$sale]);
    }
    public function postSalecategory(Request $req,$id)
    {
        $id_sale = $req->sale;
        product::where('id_category',$id)->update(['id_sale'=>$id_sale]);
        return redirect(url('Admin/list'));
    }
    public function FormStatisticalDay()
    {
        return view('Statisticalday');
    }
    public function StatisticalDay(Request $req)
    {
        $orders = orders::where('created_at','like','%'.$req->key.'%')->orderBy('id_status')->paginate(20);
        return view('StatisticalDaylist',['orders'=>$orders]);
    }
    public function FormStatisticalMonth()
    {
        return view('Statisticalmonth');
    }
    public function StatisticalMonth(Request $req)
    {
         $search = $req->key.'-';
         $orders = orders::where('created_at','like',$search.'%')->orderBy('id_status')->paginate(20);
         return view('StatisticalMonthlist',['orders'=>$orders]);
    }

    /////////////////////////////////// Users người dùng///////////////////////
    public function UsersLogin()
    {
        return view('users.login');
    }
        public function postUserLogin(Request $req)
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

        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password,'status'=>0],true)){
                return redirect(url('Home'));
        }
        else
            return redirect(url('login'))->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
    }
    public function UsersRegister()
    {
        return view('users.register');
    }
    public function UserspostRegister(Request $req)
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
            $user->status = 0;
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
            return redirect('login');
        }
        else
        {
            return redirect('register')->with(['thongbao','message'=>'Bạn chưa đồng ý với điều khoản của chúng tôi']);
        }   
    }



    public function getShopping($id,$id_user)
    {
        $product_by = product::where('id',$id)->first();
        if($product_by->sale !=null){
            $tientra = $product_by->price - ($product_by->price*($product_by->sale->percent)/100);
            Cart::add(array('id'=>$id,'name'=>$product_by->name,'qty'=>1,'price'=>$tientra,'options'=>array('img'=>$product_by->image,'id_users'=>$id_user)));
            $contents = Cart::content();
        }
        else{
            Cart::add(array('id'=>$id,'name'=>$product_by->name,'qty'=>1,'price'=>$product_by->price,'options'=>array('img'=>$product_by->image,'id_users'=>$id_user)));
            $contents = Cart::content();
        }
        return redirect(url('cart'));
    }
    public function ShopCart()
    {
        $contents = Cart::content();
        $total = Cart::subtotal();
        $tax = cart::tax();
        return view('users.shoppingcart',compact('contents'));
    }
    public function DeleteCart($id)
    {
        Cart::remove($id);
        return redirect(url('cart'));
    }
    public function Update(Request $req)
    {
        if($req->ajax()){
            $id = $req->get('id');
            $qty = $req->get('qty');
            Cart::update($id,$qty);
            echo "oke";
        }
    }
    public function Pay()
    {
        $contents = Cart::content();
        return view('users.pay',compact('contents'));
    }
    public function postPay(Request $req,$id)
    {
        $contents = Cart::content();
        foreach ($contents as $key) {
            if ($key->options->id_users == $id) {
                $orders = new orders();
                $orders->id_user = $id;
                $orders->id_product = $key->id;
                $orders->id_status = 1;
                $orders->qty = $key->qty;
                $orders->price = $key->price*$key->qty;
                $orders->nguoinhan = $req->name;
                $orders->phone = $req->phone;
                $orders->Address = $req->address.', '.$req->city;
                $orders->note = $req->note;
                $orders->code_order = 'Cafe'.str_random(10);
                $orders->save();
                Cart::remove($key->rowId);
            } 
        }
        return view('users.about',compact('contents'));
    }
    public function donhang($id)
    {
        $contents = Cart::content();
        $data = orders::where('id_user',$id)->orderBy('id_status')->orderBy('id','DESC')->get();
        return view('users.donhang',compact('data','contents'));
    }
    public function huydon($id,$id_user)
    {
        orders::where('id',$id)->delete();
        return redirect(url('don-hang/'.$id_user));
    }
    public function ProductofCate($name,$id)
    {
        $contents = Cart::content();
        $product = product::where('id_category',$id)->paginate(20);
        $category = category::all();
        $data = product::where('id_category',$id)->orderBy('id','DESC')->get();
        $slide = slide::all();
        return view('users.productofcate',['data'=>$data,'product'=>$product,'category'=>$category,'contents'=>$contents,'slide'=>$slide]);
    }
    public function infoProduct($id)
    {
        $product = product::where('id',$id)->get();
        $contents = Cart::content();
        $review = review::where('id_product',$id)->get();
        return view('users.infoproduct',['contents'=>$contents,'product'=>$product,'review'=>$review]);
    }
    public function postreviews(Request $req,$id)
    {
        $review = new review();
        $review->id_product = $id;
        $review->id_user = $req->id_user;
        $review->comment = $req->comment;
        $review->rating = $req->rating;
        $review->save();
        return redirect(url('infoproduct/'.$id));
    }
    public function getSearch(Request $req)
    {
        $contents = Cart::content();
        $slide = slide::all();
        $product = product::where('name','like','%'.$req->key.'%')->orWhere('price',$req->key)->get();
        return view('users.ViewSeach',['product'=>$product,'contents'=>$contents,'slide'=>$slide]);
    }
}
