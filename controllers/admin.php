<?php
session_start();
class admin extends Controller
{
	public function __construct()
	{
		if (isset($_SESSION['user'])) {
			if ($_SESSION['role'] == 0) {
				header('Location:' . URL . 'index.php/home/login');
			} else {
				parent::__construct();
				$this->p = new Paginator();
			}
		} else {
			header('Location:' . URL . 'index.php/home/login');
		}
	}
	function index()
	{
		$data = array();
		$data['page'] = "dashboard/page/home";
		$this->load->view("dashboard/index", $data);
	}
	function cateList()
	{
		$page =$_GET['page'];
		$cat = $this->model->getRecordByTrash('category', 0);
		$n = count($cat);
		$config = array(
			'base_url' => URL . "index.php/admin/cateList?page=",
			'total_rows' => $n,
			'per_page' => 5,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data = array();
		$data['allCat'] = $cat;
		$data['trash'] =  $this->model->getRecordByTrash('category', 1);
		$data['category'] = $this->model->getData('category', $config['per_page'], $page);
		$data['paginator'] = $this->p->createLinks();
		$data['page'] = "dashboard/page/category/list";

		$this->load->view("dashboard/index", $data);
	}
	function addCate()
	{
		$data['category'] = $this->model->getRecordByTrash('category', 0);
		$data['page'] = "dashboard/page/category/create";
		$this->load->view("dashboard/index", $data);
	}
	function postaddcate()
	{
		$this->model->cateAdd();
		header('Location:../admin/cateList?page=1');
	}
	public function editOrder($id)
	{
		$data = array();
		$data['edit'] = $this->model->getOneRecord('orders', $id);

		$data['page'] = "dashboard/page/orders/edit";
		$this->load->view("dashboard/index", $data);
	}
	function deleteOrder($id)
	{
		$this->model->deleteOrder($id);
		header('Location:' . URL . 'index.php/admin/orderList?page=1');
	}
	function posteditorder($id)
	{
		$this->model->orderEdit($id);
		header('Location:' . URL . 'index.php/admin/orderList?page=1');
	}
	public function editCate($id)
	{
		$data = array();
		$data['edit'] = $this->model->getOneRecordByTrash('category', 0, $id);
		$data['category'] = $this->model->getRecordByTrash('category', 0);
		$data['page'] = "dashboard/page/category/edit";
		$this->load->view("dashboard/index", $data);
	}
	function posteditcate($id)
	{
		$this->model->cateEdit($id);
		header('Location:' . URL . 'index.php/admin/cateList?page=1');
	}
	function delTempCate($id)
	{
		$this->model->delTempRecord('category', $id);
		header('Location:' . URL . 'index.php/admin/cateList?page=1');
	}
	function retoreTempCate($id)
	{
		$this->model->retoreTempRecord('category', $id);
		header('Location:' . URL . 'index.php/admin/trashCate?page=1');
	}

	function delTempNews($id)
	{
		$this->model->delTempRecord('news', $id);
		header('Location:' . URL . 'index.php/admin/newsList?page=1');
	}
	function retoreTempNews($id)
	{
		$this->model->retoreTempRecord('news', $id);
		header('Location:' . URL . 'index.php/admin/trashNews?page=1');
	}
	function delTempProduct($id)
	{
		$this->model->delTempRecord('products', $id);
		header('Location:' . URL . 'index.php/admin/productList?page=1');
	}
	function retoreTempProduct($id)
	{
		$this->model->retoreTempRecord('products', $id);
		header('Location:' . URL . 'index.php/admin/trashProduct?page=1');
	}
	function delTempBanner($id)
	{
		$this->model->delTempRecord('banner', $id);
		header('Location:' . URL . 'index.php/admin/trashBanner?page=1');
	}
	function retoreTempBanner($id)
	{
		$this->model->retoreTempRecord('banner', $id);
		header('Location:' . URL . 'index.php/admin/trashBanner?page=1');
	}
	function delTempInfo($id1, $id2)
	{
		$this->model->delTempRecord('book_info', $id2);
		header('Location:' . URL . 'index.php/admin/infoProduct?id=' . $id1 . '&page=1');
	}
	function retoreTempInfo($id1, $id2)
	{
		$this->model->retoreTempRecord('book_info', $id2);
		header('Location:' . URL . 'index.php/admin/trashInfo?id=' . $id1 . '&page=1');
	}
	function delTempReadInfo($id1, $id2)
	{
		$this->model->delTempRecord('book_info', $id2);
		header('Location:' . URL . 'index.php/admin/readtrashInfo?id=' . $id1 . '&page=1');
	}
	function retoreTempReadInfo($id1, $id2)
	{
		$this->model->retoreTempRecord('book_info', $id2);
		header('Location:' . URL . 'index.php/admin/readtrashInfo?id=' . $id1 . '&page=1');
	}

	function delStatusCate($id)
	{
		$this->model->status('category', $id, 1);
		header('Location:' . URL . 'index.php/admin/cateList?page=1');
	}
	function deleteUsers($id)
	{
		$this->model->deleteTempRecord('users', $id);
		header('Location:' . URL . 'index.php/admin/usersList?page=1');
	}
	function deleteNews($id)
	{
		$this->model->deleteTempRecord('news', $id);
		header('Location:' . URL . 'index.php/admin/trashNews?page=1');
	}
	function deleteProduct($id)
	{
		$this->model->deleteTempRecord('products', $id);
		header('Location:' . URL . 'index.php/admin/trashProduct?page=1');
	}
	function deleteBanner($id)
	{
		$this->model->deleteTempRecord('banner', $id);
		header('Location:' . URL . 'index.php/admin/trashBanner?page=1');
	}
	function deleteInfo($id1, $id2)
	{
		$this->model->deleteTempRecord('book_info', $id2);
		header('Location:' . URL . 'index.php/admin/trashInfo?id=' . $id1 . '&page=1');
	}
	function deleteComment()
	{
		$id1 = $_GET['bookid'];
		$id2 = $_GET['id'];
		$this->model->deleteTempRecord('comment', $id2);
		header('Location:' . URL . 'index.php/admin/infoComment?id=' . $id1 . '&page=1');
	}
	function deleteReadInfo($id1, $id2)
	{
		$this->model->deleteTempRecord('book_info', $id2);
		header('Location:' . URL . 'index.php/admin/readtrashInfo?id=' . $id1 . '&page=1');
	}

	function deleteCategory($id)
	{
		$this->model->deleteTempRecord('category', $id);
		header('Location:' . URL . 'index.php/admin/categoryList?page=1');
	}
	function retoreStatusCate($id)
	{
		$this->model->status('category', $id,0);
		header('Location:' . URL . 'index.php/admin/cateList?page=1');
	}
	function delStatusUsers($id)
	{
		$this->model->status('users', $id,1);
		header('Location:' . URL . 'index.php/admin/usersList?page=1');
	}
	function retoreStatusUsers($id)
	{
		$this->model->status('users', $id,0);
		header('Location:' . URL . 'index.php/admin/usersList?page=1');
	}
	function delStatusProduct($id)
	{
		$this->model->status('products', $id,1);
		header('Location:' . URL . 'index.php/admin/productList?page=1');
	}
	function retoreStatusProduct($id)
	{
		$this->model->status('products', $id,0);
		header('Location:' . URL . 'index.php/admin/productList?page=1');
	}
	function delStatusBanner($id)
	{
		$this->model->status('banner', $id,1);
		header('Location:' . URL . 'index.php/admin/bannerList?page=1');
	}
	function retoreStatusBanner($id)
	{
		$this->model->status('banner', $id,0);
		header('Location:' . URL . 'index.php/admin/bannerList?page=1');
	}
	function delStatusNews($id)
	{
		$this->model->status('news', $id,1);
		header('Location:' . URL . 'index.php/admin/newsList?page=1');
	}
	function retoreStatusNews($id)
	{
		$this->model->status('news', $id,0);
		header('Location:' . URL . 'index.php/admin/newsList?page=1');
	}
	function trashCate()
	{
		$page = $_GET['page'];
		$cat = $this->model->getRecordByTrash('category', 1);
		$n = count($cat);
		$config = array(
			'base_url' => URL . "index.php/admin/trashCate?page=",
			'total_rows' => $n,
			'per_page' => 5,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data = array();
		$data['allCat'] = $this->model->getRecordByTrash('category', 1);

		$data['trash'] = $this->model->getTrash('category', $config['per_page'], $page);
		$data['paginator'] = $this->p->createLinks();
		$data['page'] = "dashboard/page/category/trash";

		$this->load->view("dashboard/index", $data);
	}
	function trashNews()
	{
		$page = $_GET['page'];
		$cat = $this->model->getRecordByTrash('news', 1);
		$n = count($cat);
		$config = array(
			'base_url' => URL . "index.php/admin/trashNews?page=",
			'total_rows' => $n,
			'per_page' => 5,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data = array();
		$data['trash'] = $this->model->getRecordByTrash('news', 1);

		$data['news'] = $this->model->getTrash('news', $config['per_page'], $page);
		$data['paginator'] = $this->p->createLinks();
		$data['page'] = "dashboard/page/news/trash";
		$this->load->view("dashboard/index", $data);
	}
	function trashProduct()
	{
		$page = $_GET['page'];
		$cat = $this->model->getRecordByTrash('products', 1);
		$n = count($cat);
		$config = array(
			'base_url' => URL . "index.php/admin/trashCate?page=",
			'total_rows' => $n,
			'per_page' => 5,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data = array();
		$data['allCate'] = $this->model->getRecordByTrash('category', 0);
		$data['trash'] = $this->model->getTrash('products', $config['per_page'], $page);
		$data['paginator'] = $this->p->createLinks();
		$data['page'] = "dashboard/page/product/trash";

		$this->load->view("dashboard/index", $data);
	}
	function trashBanner()
	{
		$page = $_GET['page'];
		$cat = $this->model->getRecordByTrash('banner', 1);
		$n = count($cat);
		$config = array(
			'base_url' => URL . "index.php/admin/trashBanner?page=",
			'total_rows' => $n,
			'per_page' => 5,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data = array();
		$data['trash'] = $this->model->getRecordByTrash('banner', 1);
		$data['banner'] = $this->model->getTrash('banner', $config['per_page'], $page);
		$data['paginator'] = $this->p->createLinks();
		$data['page'] = "dashboard/page/banner/trash";
		$this->load->view("dashboard/index", $data);
	}
	public function trashInfo()
	{
		$id = $_GET['id'];
		$page = $_GET['page'];
		$cat = $this->model->getBookRecordByTrash('book_info', 1, $id);
		$n = count($cat);
		$config = array(
			'base_url' => URL . "index.php/admin/trashInfo/$id/",
			'total_rows' => $n,
			'per_page' => 5,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data = array();
		$data['trash'] =  $this->model->getBookRecordByTrash('book_info', 1, $id);
		$data['book_info'] = $this->model->getbookData('book_info', $config['per_page'], $page, $id);
		$data['id'] = $id;
		$data['paginator'] = $this->p->createLinks();
		$data['page'] = "dashboard/page/info/trash";
		$this->load->view("dashboard/index", $data);
	}
	public function readtrashInfo()
	{
		$id = $_GET['id'];
		$page = $_GET['page'];
		$cat = $this->model->getBookReadByTrash('book_info', 1, $id);
		$n = count($cat);
		$config = array(
			'base_url' => URL . "index.php/admin/trashInfo/$id/",
			'total_rows' => $n,
			'per_page' => 5,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data = array();
		$data['trash'] =  $this->model->getBookReadByTrash('book_info', 1, $id);
		$data['book_info'] = $this->model->getreadbookData('book_info', $config['per_page'], $page, $id);
		$data['id'] = $id;
		$data['paginator'] = $this->p->createLinks();
		$data['page'] = "dashboard/page/info/readtrash";
		$this->load->view("dashboard/index", $data);
	}


	function newsList()
	{
		$page =$_GET['page'];
		$cat = $this->model->getRecordByTrash('news', 0);
		$n = count($cat);
		$config = array(
			'base_url' => URL . "index.php/admin/newsList?page=",
			'total_rows' => $n,
			'per_page' => 4,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data = array();

		$data['trash'] = $this->model->getRecordByTrash('news', 1);
		$data['news'] = $this->model->getData('news', $config['per_page'], $page);
		$data['paginator'] = $this->p->createLinks();
		$data['page'] = "dashboard/page/news/list";
		$this->load->view("dashboard/index", $data);
	}
	function usersList()
	{
		$page =$_GET['page'];
		$cat = $this->model->getRecord('users');
		$n = count($cat);
		$config = array(
			'base_url' => URL . "index.php/admin/usersList?page=",
			'total_rows' => $n,
			'per_page' => 6,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data = array();
		$data['user'] = $this->model->getDatas('users', $config['per_page'], $page);
		$data['paginator'] = $this->p->createLinks();
		$data['page'] = "dashboard/page/users/list";
		$this->load->view("dashboard/index", $data);
	}
	function productList()
	{
		$page =$_GET['page'];
		$cat = $this->model->getRecordByTrash('products', 0);
		$n = count($cat);
		$config = array(
			'base_url' => URL . "index.php/admin/productList?page=",
			'total_rows' => $n,
			'per_page' => 5,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data = array();
		$data['allCate'] = $this->model->getRecordByTrash('category', 0);

		$data['trash'] =  $this->model->getRecordByTrash('products', 1);
		$data['product'] = $this->model->getData('products', $config['per_page'], $page);
		$data['paginator'] = $this->p->createLinks();
		$data['page'] = "dashboard/page/product/list";

		$this->load->view("dashboard/index", $data);
	}
	function commentlist()
	{
		$page =$_GET['page'];
		$cat = $this->model->getRecordByTrash('products', 0);
		$n = count($cat);
		$config = array(
			'base_url' => URL . "index.php/admin/commentlist?page=",
			'total_rows' => $n,
			'per_page' => 5,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data = array();
		$data['allCate'] = $this->model->getRecordByTrash('category', 0);

		$data['trash'] =  $this->model->getRecordByTrash('products', 1);
		$data['product'] = $this->model->getData('products', $config['per_page'], $page);
		$data['paginator'] = $this->p->createLinks();
		$data['page'] = "dashboard/page/comment/list";

		$this->load->view("dashboard/index", $data);
	}
	function bannerList()
	{
		$page =$_GET['page'];
		$cat = $this->model->getRecordByTrash('banner', 0);
		$n = count($cat);
		$config = array(
			'base_url' => URL . "index.php/admin/bannerList?page=",
			'total_rows' => $n,
			'per_page' => 5,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data = array();
		$data['trash'] =  $this->model->getRecordByTrash('banner', 1);
		$data['banner'] = $this->model->getData('banner', $config['per_page'], $page);
		$data['paginator'] = $this->p->createLinks();
		$data['page'] = "dashboard/page/banner/list";
		$this->load->view("dashboard/index", $data);
	}
	public function infoProduct()
	{
		$id = $_GET['id'];
		$page = $_GET['page'];
		$cat = $this->model->getBookRecordByTrash('book_info', 0, $id);
		$n = count($cat);
		$config = array(
			'base_url' => URL . "index.php/admin/infoProduct?id=$id&page=",
			'total_rows' => $n,
			'per_page' => 5,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data = array();
		$data['trash'] =  $this->model->getBookRecordByTrash('book_info', 1, $id);
		$data['book_info'] = $this->model->getbookData('book_info', $config['per_page'], $page, $id);
		$data['id'] = $id;
		$data['paginator'] = $this->p->createLinks();
		$data['page'] = "dashboard/page/info/list";
		$this->load->view("dashboard/index", $data);
	}
	public function infoComment()
	{
		$id = $_GET['id'];
		$page = $_GET['page'];
		$cat = $this->model->getBookComment($id);
		$n = count($cat);
		$config = array(
			'base_url' => URL . "index.php/admin/infoComment?id=$id&page=",
			'total_rows' => $n,
			'per_page' => 5,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data = array();
		$data['comment_info'] = $this->model->getcommentbookData($config['per_page'], $page, $id);
		$data['paginator'] = $this->p->createLinks();
		$data['page'] = "dashboard/page/comment/infocomment";
		$this->load->view("dashboard/index", $data);
	}
	public function readInfo()
	{
		$id = $_GET['id'];
		$page = $_GET['page'];
		$cat = $this->model->getBookReadByTrash('book_info', 0, $id);
		$n = count($cat);
		$config = array(
			'base_url' => URL . "index.php/admin/infoProduct/$id/",
			'total_rows' => $n,
			'per_page' => 5,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data = array();
		$data['trash'] =  $this->model->getBookReadByTrash('book_info', 1, $id);
		$data['book_info'] = $this->model->getreadbookData('book_info', $config['per_page'], $page, $id);
		$data['id'] = $id;
		$data['paginator'] = $this->p->createLinks();
		$data['page'] = "dashboard/page/info/readlist";
		$this->load->view("dashboard/index", $data);
	}
	function addProduct()
	{
		$data['category'] = $this->model->getRecordByTrash('category', 0);
		$data['page'] = "dashboard/page/product/create";
		$this->load->view("dashboard/index", $data);
	}
	function addBanner()
	{
		$data['page'] = "dashboard/page/banner/create";
		$this->load->view("dashboard/index", $data);
	}
	function addInfo($id)
	{
		$data['id'] = $id;
		$data['page'] = "dashboard/page/info/create";
		$this->load->view("dashboard/index", $data);
	}

	function addNews()
	{
		$data['page'] = "dashboard/page/news/create";
		$this->load->view("dashboard/index", $data);
	}

	public function postaddproduct()
	{
		$this->model->productAdd();
		header('Location:../admin/productList?page=1');
	}
	public function postaddbanner()
	{
		$this->model->bannerAdd();
		header('Location:../admin/bannerList?page=1');
	}
	public function postaddnews()
	{
		$this->model->newsAdd();
		header('Location:../admin/newsList?page=1');
	}
	public function postaddinfo($id)
	{
		$this->model->infoAdd();
		header('Location:../infoProduct/?id=' . $id . '&page=1');
	}
	public function editProduct($id)
	{
		$data = array();
		$data['edit'] = $this->model->getOneRecordByTrash('products', 0, $id);
		$data['category'] = $this->model->getRecordByTrash('category', 0);
		$data['page'] = "dashboard/page/product/edit";
		$this->load->view("dashboard/index", $data);
	}
	public function editNews($id)
	{
		$data = array();
		$data['edit'] = $this->model->getOneRecordByTrash('news', 0, $id);
		$data['page'] = "dashboard/page/news/edit";
		$this->load->view("dashboard/index", $data);
	}
	public function editBanner($id)
	{
		$data = array();
		$data['edit'] = $this->model->getOneRecordByTrash('banner', 0, $id);
		$data['page'] = "dashboard/page/banner/edit";
		$this->load->view("dashboard/index", $data);
	}
	public function editInfo($id, $id2)
	{
		$data = array();
		$data['edit'] = $this->model->getOneRecordByTrash('book_info', 0, $id2);
		$data['page'] = "dashboard/page/info/edit";
		$this->load->view("dashboard/index", $data);
	}

	public function posteditproduct($id)
	{
		$this->model->productEdit($id);
		header('Location:../productList?page=1');
	}
	public function posteditnews($id)
	{
		$this->model->newsEdit($id);
		header('Location:../newsList?page=1');
	}
	public function posteditinfo($id)
	{
		$this->model->infoEdit($id);
		$data['edit'] = $this->model->getOneRecordByTrash('book_info', 0, $id);
		$data['id'] = $data['edit']['book_id'];
		header('Location:../infoProduct?id=' . $data['id'] . '&page=1');
	}
	public function posteditbanner($id)
	{
		$this->model->bannerEdit($id);
		header('Location:../bannerList?page=1');
	}
	function orderList()
	{
		$page =$_GET['page'];
		$cat = $this->model->getRecord('orders');
		$n = count($cat);
		$config = array(
			'base_url' => URL . "index.php/admin/orderList?page=",
			'total_rows' => $n,
			'per_page' => 5,
			'cur_page' => $page
		);
		$this->p->init($config);
		$data = array();
		$data['allOrder'] = $cat;
		$data['trash'] =  $this->model->getRecord('orders');
		$data['order'] = $this->model->getDatas('orders', $config['per_page'], $page);
		$data['paginator'] = $this->p->createLinks();
		$data['page'] = "dashboard/page/orders/list";
		$_SESSION['pages'] = $page;
		$this->load->view("dashboard/index", $data);
	}
	function orderDetails($id)
	{
		$data['product'] = $this->model->getRecord('products');
		$data['order_details'] = $this->model->getOrderDetails('order_details', $id);
		$data['page'] = "dashboard/page/orders/order_details";
		$this->load->view("dashboard/index", $data);
	}
}
