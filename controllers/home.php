
<?php
session_start();
class Home extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->p = new Paginator();
		$this->p2 = new Paginator();
		$this->p3 = new Paginator();
		
	}
	public function index()
	{
		$this->model = new Home_Model;
		$data = array();
		$data["new_products"] = $this->model->getNewProducts();
		$data["sale_products"] = $this->model->getSaleProducts();
		$data["new_list"] = $this->model->getnewList();
		if (isset($_SESSION['user_id'])) {
			$data["recomment"] = $this->model->getRecommendindex();
		}
		$data["category"] = $this->model->getCategory();
		$data["banner"] = $this->model->getBanner();
		$data['page'] = 'shop/pages/home';
		$this->load->view("shop/index", $data);
	}
	public function details()
	{
		$id = $_GET['id'];
		$page = $_GET['page'];
		$cat = $this->model->getComment($id);
		$n = count($cat);
		$config = array(
			'base_url' => URL . "index.php/home/details?id=$id&page=",
			'total_rows' => $n,
			'per_page' => 5,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data = array();
		$data["details"] = $this->model->getDetails($id);
		$data['comment'] = $this->model->getcomments($config['per_page'], $page, $id);
		$data["cover"] = $this->model->getCover($id);
		$data['page'] = 'shop/pages/details';
		$data['paginator'] = $this->p->createLinks();
		$data["category"] = $this->model->getCategory();
		$this->load->view("shop/index", $data);
	}

	public function details_new($id)
	{
		$data = array();
		$data["new"] = $this->model->getnew($id);
		$data["banner"] = $this->model->getBanner();
		$data['page'] = 'shop/pages/new';
		$data["category"] = $this->model->getCategory();
		$this->load->view("shop/index", $data);
	}
	public function category()
	{
		$id =  $_GET['category'];
		$page = $_GET['page'];
		$cat = $this->model->getProductbyCategory($id);
		$n = count($cat);
		$config = array(
			'base_url' => URL . "index.php/home/category?category=$id&page=",
			'total_rows' => $n,
			'per_page' => 8,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data = array();
		$data["category"] = $this->model->getCategory();
		$data["banner"] = $this->model->getBanner();
		$data['product_ed'] = $this->model->getDataCate($id, 'products', $config['per_page'], $page);
		$data['paginator'] = $this->p->createLinks();
		$data["product_cate"] = $this->model->getProductbyCategory($id);
		$data['page'] = 'shop/pages/category';
		$this->load->view("shop/index", $data);
	}
	public function register()
	{
		$data = array();
		$data["category"] = $this->model->getCategory();
		$data['page'] = 'shop/pages/register';
		$this->load->view("shop/index", $data);
	}
	public function postRegister()
	{
		$data['count'] = $this->model->isEmailExists($_POST['email']);
		if ($data['count'] <1) {
			$data['page'] = 'shop/pages/register';
			$data["thongbao"] = "TÀI KHOẢN ĐÃ TỒN TẠI";
			$this->load->view("shop/index", $data);
		} else {
			$this->model->doRegister();
			header('Location:../home/index');
		}
	}
	public function login()
	{
		if (isset($_SESSION['user'])) {
			header('Location:../home/index');
		} else {
			$data = array();
			$data['page'] = 'shop/pages/login';
			$data["category"] = $this->model->getCategory();
			
			$this->load->view("shop/index", $data);
			
		}
	}
	public function postLogin()
	{
		
		$user = $this->model->doLogin();
		if ($user !== null) {
			if ($user['status'] == 1) {
				header('Location:../home/lock');
			} else {
				$_SESSION['user'] = $user['name'];
				$_SESSION['user_id'] = $user['id'];
				$_SESSION['role'] = $user['role'];
				$_SESSION['avatar'] = $user['avatar'];
				header('Location:../home/index');
			}
		} else {
			$data['page'] = 'shop/pages/login';
			$data["thongbao"] = "SAI TÀI KHOẢN MẬT KHẨU";
			$this->load->view("shop/index", $data);
			echo "Thất bại";
		}
	}
	public function lock()
	{
		$data['page'] = 'shop/pages/lock';
		$this->load->view("shop/index2", $data);
	}
	public function logout()
	{

		unset($_SESSION['user_id']);
		unset($_SESSION['role']);
		unset($_SESSION['user']);
		unset($_SESSION['avatar']);
		header('Location:../home/index');
	}
	public function cartview()
	{
		$data["category"] = $this->model->getCategory();
		$data["banner"] = $this->model->getBanner();
		if (isset($_SESSION['cart'])) {
		}
		$data['page'] = 'shop/pages/cart';
		$this->load->view("shop/index", $data);
	}
	public function payment()
	{	
		$data["category"] = $this->model->getCategory();
		$data["banner"] = $this->model->getBanner();
		$data["newest"] =  $this->model->newestOrder();
		if (isset($_SESSION['user'])) {
			$data['page'] = 'shop/pages/payment';
			if(isset($_GET['message'])){
				$message = $_GET['message'];
				$decodedMessage = urldecode($message);
				$id = $data["newest"]["id"];
					if ($decodedMessage === "Giao dịch bị từ chối bởi người dùng.") {
						$this->model->deleteOrder($id);
						$newUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/bookstorenew/index.php/home/payment';
						header('Location: ' . $newUrl);
						exit;
					} elseif($decodedMessage === "Successful."){
						unset($_SESSION['cart']);
						$_SESSION['total'] = 0;
						$newUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/bookstorenew/index.php/home/complete';
						header('Location: ' . $newUrl);
						exit;
					}}
			$this->load->view("shop/index", $data);
		} else {
			header('Location:' . URL . 'index.php/home/login');
		}
	}
	public function deleteAllCart()
	{
		unset($_SESSION['cart']);
		$_SESSION['total'] = 0;
		header('Location:' . URL . 'index.php/home/index');
	}
	public function cartplus($id)
	{
		$_SESSION['cart'][$id]['quantity']++;
		$_SESSION['total'] += $_SESSION['cart'][$id]['price'];
		header('Location:' . URL . 'index.php/home/cartview');
	}
	public function deleteOneCart($id)
	{
		$_SESSION['total'] -= $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['quantity'];
		unset($_SESSION['cart'][$id]);

		header('Location:' . URL . 'index.php/home/cartview');
	}
	public function cartunplus($id)
	{
		$_SESSION['cart'][$id]['quantity']--;
		$_SESSION['total'] -= $_SESSION['cart'][$id]['price'];
		if ($_SESSION['cart'][$id]['quantity'] == 0) {
			unset($_SESSION['cart'][$id]);
		}
		header('Location:' . URL . 'index.php/home/cartview');
	}
	public function addcart($id)
	{
		$data["details"] = $this->model->getDetails($id);
		$a = $data["details"];
		$name = $a['product_name'];
		if ($a['sale'] == 1) {
			$price = $a['price'] - ($a['price'] * ($a['saleprice'] / 100));
		} else {
			$price = $a['price'];
		}
		if (!isset($_SESSION['cart'])) {
			$_SESSION['cart'] = [];
			$_SESSION['total'] = 0;
		}
		if (isset($_SESSION['cart'][$id])) {
			$_SESSION['cart'][$id]['quantity']++;
			$_SESSION['total'] += $price;
		} else {
			$_SESSION['total'] += $price;
			$_SESSION['cart'][$id] = [
				'id' => $id,
				'product_name' => $name,
				'price' => $price,
				'quantity' => 1
			];
		}

		header('Location:' . URL . 'index.php/home/index');
	}
	public function Ordercomplete()
	{
		if (isset($_SESSION['cart'])) {
			$p = [];
			$this->model->doOrder();
			$p['a'] = $this->model->getOrder();
			$this->model->doDetailsOrder($p['a'][0]['id'], $_SESSION['cart']);
			unset($_SESSION['cart']);
			$_SESSION['total'] = 0;
			header('Location:' . URL . 'index.php/home/complete');
		}
	}
	public function momopayment()
	{
		if (isset($_SESSION['cart'])) {
			$data['page'] = 'shop/pages/momopayment';
			$this->load->view("shop/index2", $data);
		}
		
	}
	public function momoatm()
	{
		if (isset($_SESSION['cart'])) {
			$p = [];
			$this->model->doOrder();
			$p['a'] = $this->model->getOrder();
			$this->model->doDetailsOrder($p['a'][0]['id'], $_SESSION['cart']);
			// unset($_SESSION['cart']);
			// $_SESSION['total'] = 0;
			$data['page'] = 'shop/pages/momoatm';
			$this->load->view("shop/index2", $data);
		}
		
	}
	public function complete()
	{	
		$data = [];
		$data['page'] = 'shop/pages/complete';
		$this->load->view("shop/index2", $data);
	}
	public function detailsUser()
	{
		$data = array();
		if (!isset($_SESSION['user'])) {
			header('Location:' . URL . 'index.php/home/login');
		}
		$data["detailUser"] = $this->model->getUser($_SESSION['user_id']);
		$data["detailUserOrder"] = $this->model->getUserOrder($_SESSION['user_id']);
		$_SESSION['user'] = $data["detailUser"]["name"];
		$data["category"] = $this->model->getCategory();
		$data['page'] = 'shop/pages/users';
		$this->load->view("shop/index", $data);
	}
	public function postchangeinfo()
	{
		$this->model->doUpdateUser($_SESSION["user_id"]);
		header('Location:' . URL . 'index.php/home/detailsUser');
	}
	public function postchangepass()
	{
		$ab = $this->model->checkPass($_SESSION['user_id'], $_POST['password']);
		$a = -1;
		$b = -1;
		if ($ab == "") {
			$data['thongbao'] = "Mật khẩu cũ không đúng";
			$data['page'] = 'shop/pages/changepass';
			$this->load->view("shop/index", $data);
		} else {
			$a = 0;
		}
		if ($_POST['newpassword'] != $_POST['passwordagain']) {
			$data['thongbao'] = "Nhập lại mật khẩu không đúng";

			$data['page'] = 'shop/pages/changepass';
			$this->load->view("shop/index", $data);
		} else {
			$b = 0;
		}
		if ($a == 0 && $b == 0) {
			$this->model->doUpdatePass($_SESSION['user_id'], $_POST['newpassword']);
			unset($_SESSION['user_id']);
			unset($_SESSION['role']);
			unset($_SESSION['user']);
			header('Location:../home/index');
		}
	}
	function orderDetails($id)
	{
		$data['product'] = $this->model->getRecordByTrash('products',0);
		$data["category"] = $this->model->getCategory();
		$data['order_details'] = $this->model->getOrderDetails('order_details',$id) ;
		$data['page'] = "shop/pages/orderdetails";
		$this->load->view("shop/index",$data);
	}
	function deleteOrder($id)
	{
		$this->model->deleteOrder($id);
		header('Location:' . URL . 'index.php/home/detailsUserOrder');
	}
	function cancelOrder($id)
	{
		$this->model->cancelOrder($id);
		header('Location:' . URL . 'index.php/home/detailsUserOrder');
	}
	function postComment($id)
	{
		$this->model->addComent($id);
		header('Location:'.URL."index.php/home/details?id=$id&page=1");
	}
	public function news()
	{
		$page = $_GET['page'];
		$data = $this->model->getnewListfull();
		$n = count($data);
		$_SESSION['pages'] = $page;
		$config = array(
			'base_url' => URL . "index.php/home/news?page=",
			'total_rows' => $n,
			'per_page' => 9,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data["new_list"] = $this->model->countnewListfull($config['per_page'], $page);
		$data['page'] = 'shop/pages/news';
		$data["category"] = $this->model->getCategory();
		$data["banner"] = $this->model->getBanner();
		$data['paginator'] = $this->p->createLinks();
		$this->load->view("shop/index", $data);
	}
	public function sale()
	{
		$page = $_GET['page'];
		$data = $this->model->getSaleProductsall();
		$n = count($data);
		$_SESSION['pages'] = $page;
		$config = array(
			'base_url' => URL . "index.php/home/sale?page=",
			'total_rows' => $n,
			'per_page' => 18,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data["sale_products"] = $this->model->countSaleProducts($config['per_page'], $page);
		$data['page'] = "shop/pages/sale";
		$data["category"] = $this->model->getCategory();
		$data["banner"] = $this->model->getBanner();
		$data['paginator'] = $this->p->createLinks();
		$this->load->view("shop/index", $data);
	}
	public function recommend()
	{
		$page = $_GET['page'];
		$page2 = $_GET['page2'];
		$page3 = $_GET['page3'];
		$data = $this->model->getRecommend();
		$n = count($data);
		$config = array(
			'base_url' => URL . "index.php/home/recommend?page2=$page2&page3=$page3&page=",
			'total_rows' => $n,
			'per_page' => 12,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data["recommend"] = $this->model->countRecommend($config['per_page'], $page);
		$data['authors'] = $this->model->getAuthor();
		$data['author'] = $this->model->getRecommendAuthor($data['authors']);
		$n2 = count($data['author']);
		$config2 = array(
			'base_url' => URL . "index.php/home/recommend?page=$page&page3=$page3&page2=",
			'total_rows' => $n2,
			'per_page' => 12,
			'cur_page' => $page2
		);
		$this->p2->init($config2);
		$data["recommendauthor"] = $this->model->countRecommendAuthor($data['authors'],$config2['per_page'], $page2);
		
		$data['publishers'] = $this->model->getPublisher();
		$data['publisher'] = $this->model->getRecommendPublisher($data['publishers']);
		$n3 = count($data['publisher']);
		$config3 = array(
			'base_url' => URL . "index.php/home/recommend?page=$page&page2=$page2&page3=",
			'total_rows' => $n3,
			'per_page' => 12,
			'cur_page' => $page3
		);
		$this->p3->init($config3);
		$data["recommendpublisher"] = $this->model->countRecommendPublisher($data['publishers'],$config3['per_page'], $page3);
		
		$data['page'] = "shop/pages/recommend";
		$data["category"] = $this->model->getCategory();
		$data["banner"] = $this->model->getBanner();
		$data['paginator'] = $this->p->createLinks();
		$data['paginator2'] = $this->p2->createLinks();
		$data['paginator3'] = $this->p3->createLinks();
		$this->load->view("shop/index", $data);
	}
	public function search()
	{	
		$page = $_GET['page'];
		$search = $_GET['value'];
		$data = $this->model->search($search);
		$n = count($data);
		$_SESSION['pages'] = $page;
		$config = array(
			'base_url' => URL . "index.php/home/search/$search/",
			'total_rows' => $n,
			'per_page' => 18,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data["search"] = $this->model->searchcount($search,$config['per_page'], $page);
		$data["category"] = $this->model->getCategory();
		$data["banner"] = $this->model->getBanner();
		$data['page'] = "shop/pages/search";
		$data['paginator'] = $this->p->createLinks();
		
		$this->load->view("shop/index", $data);
	}
}
?>