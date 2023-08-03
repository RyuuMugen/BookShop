
<?php
session_start();
class Home extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->p = new Paginator();
		$this->p2 = new Paginator();
		
	}
	public function index()
	{
		$this->model = new Home_Model;
		$data = array();
		$data["new_products"] = $this->model->getNewProducts();
		$data["sale_products"] = $this->model->getSaleProducts();
		$data["news_list"] = $this->model->getNewsList();
		if (isset($_SESSION['user_id'])) {
			$data["recomment"] = $this->model->getRecommend();
		}
		$data["category"] = $this->model->getCategory();
		$data['page'] = 'shop/pages/home';
		$this->load->view("shop/index", $data);
	}
	public function details($id)
	{
		$data = array();
		$data["details"] = $this->model->getDetails($id);
		$data["comment"] = $this->model->getComment($id);
		$data["cover"] = $this->model->getCover($id);
		$data['page'] = 'shop/pages/details';
		$data["category"] = $this->model->getCategory();
		$this->load->view("shop/index", $data);
	}

	public function details_news($id)
	{
		$data = array();
		$data["news"] = $this->model->getNews($id);
		$data['page'] = 'shop/pages/news';
		$data["category"] = $this->model->getCategory();
		$this->load->view("shop/index", $data);
	}
	public function category($id, $page)
	{

		$cat = $this->model->getProductbyCategory($id);
		$n = count($cat);
		$config = array(
			'base_url' => URL . "index.php/home/category/$id/",
			'total_rows' => $n,
			'per_page' => 6,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data = array();
		$data["category"] = $this->model->getCategory();
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
		$this->model->doRegister();
		header('Location:../home/index');
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
		if (isset($_SESSION['cart'])) {
			echo "đã có";
		}
		$data['page'] = 'shop/pages/cart';
		$this->load->view("shop/index", $data);
	}
	public function payment()
	{	
		$data["category"] = $this->model->getCategory();
		if (isset($_SESSION['user'])) {
			$data['page'] = 'shop/pages/payment';
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
	public function changepass()
	{
		$data["category"] = $this->model->getCategory();
		$data['page'] = 'shop/pages/changepass';
		$this->load->view("shop/index", $data);
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
	public function detailsUserOrder()
	{
		$data = array();
		$data["category"] = $this->model->getCategory();
		if (!isset($_SESSION['user'])) {
			header('Location:' . URL . 'index.php/home/login');
		}
		$data["detailUserOrder"] = $this->model->getUserOrder($_SESSION['user_id']);
		if ($data["detailUserOrder"] == NULL) {
			$data['page'] = 'shop/pages/userordernull';
			$this->load->view("shop/index", $data);
		} else {
			$data["detailUser"] = $this->model->getUser($_SESSION['user_id']);
			$_SESSION['user'] = $data["detailUser"]["name"];
			$data['page'] = 'shop/pages/userorder';
			$this->load->view("shop/index", $data);
		}
	}
	function orderDetails($id)
	{
		$data["category"] = $this->model->getCategory();
		$data['product'] = $this->model->getRecordByTrash('products', 0);
		$data['order_details'] = $this->model->getOrderDetails('order_details', $id);
		$data['page'] = "shop/pages/orderdetails";
		$this->load->view("shop/index", $data);
	}
	function deleteOrder($id)
	{
		$this->model->deleteOrder($id);
		header('Location:' . URL . 'index.php/home/detailsUserOrder');
	}
	function postComment($id)
	{
		$this->model->addComent($id);
		header('Location:'.URL."index.php/home/details/$id");
	}
	public function newss($page)
	{
		$data = $this->model->getNewsListfull();
		$n = count($data);
		$_SESSION['pages'] = $page;
		$config = array(
			'base_url' => URL . "index.php/home/newss/",
			'total_rows' => $n,
			'per_page' => 9,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data["news_list"] = $this->model->countNewsListfull($config['per_page'], $page);
		$data['page'] = 'shop/pages/newss';
		$data["category"] = $this->model->getCategory();
		$data['paginator'] = $this->p->createLinks();
		$this->load->view("shop/index", $data);
	}
	public function sale($page)
	{
		$data = $this->model->getSaleProductsall();
		$n = count($data);
		$_SESSION['pages'] = $page;
		$config = array(
			'base_url' => URL . "index.php/home/sale/",
			'total_rows' => $n,
			'per_page' => 16,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data["sale_products"] = $this->model->countSaleProducts($config['per_page'], $page);
		$data['page'] = "shop/pages/sale";
		$data["category"] = $this->model->getCategory();
		$data['paginator'] = $this->p->createLinks();
		$this->load->view("shop/index", $data);
	}
	public function recommend($page)
	{
		$data = $this->model->getRecommend();
		$n = count($data);
		$_SESSION['pages'] = $page;
		$config = array(
			'base_url' => URL . "index.php/home/recommend/",
			'total_rows' => $n,
			'per_page' => 8,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data["recommend"] = $this->model->countRecommend($config['per_page'], $page);
		$data['authors'] = $this->model->getAuthor();
		$data['author'] = $this->model->getRecommendAuthor($data['authors']);
		$n2 = count($data['author']);
		$config2 = array(
			'base_url' => URL . "index.php/home/recommend/",
			'total_rows' => $n2,
			'per_page' => 8,
			'cur_page' => $page
		);
		$this->p2->init($config2);
		$data["recommendauthor"] = $this->model->countRecommendAuthor($data['authors'],$config2['per_page'], $page);
		
		$data['page'] = "shop/pages/recommend";
		$data["category"] = $this->model->getCategory();
		$data['paginator'] = $this->p->createLinks();
		$data['paginator2'] = $this->p2->createLinks();
		$this->load->view("shop/index", $data);
	}
	public function search($search,$page)
	{	
		
		$data = $this->model->search($search);
		$n = count($data);
		$_SESSION['pages'] = $page;
		$config = array(
			'base_url' => URL . "index.php/home/search/$search/",
			'total_rows' => $n,
			'per_page' => 16,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data["search"] = $this->model->searchcount($search,$config['per_page'], $page);
		$data["category"] = $this->model->getCategory();
		$data['page'] = "shop/pages/search";
		$data['paginator'] = $this->p->createLinks();
		
		$this->load->view("shop/index", $data);
	}
}
?>