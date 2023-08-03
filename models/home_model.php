<?php
class Home_Model extends Model{
	function __construct(){
		parent::__construct();

	}
	public function getNewProducts(){
		$sql = "SELECT * FROM products WHERE status=0 AND trash=0 ORDER BY created_at DESC LIMIT 6";
		$result = $this->getAll($sql);
		return $result;
		
	}
	public function getSaleProducts(){
		$sql = "SELECT * FROM products Where sale=1 and status=0 AND trash=0 ORDER BY created_at DESC LIMIT 8";
		$result = $this->getAll($sql);
		return $result;
	}
	public function getSaleProductsall(){
		$sql = "SELECT * FROM products Where sale=1 and status=0 AND trash=0 ORDER BY created_at DESC";
		$result = $this->getAll($sql);
		return $result;
	}
	public function countSaleProducts($limit,$page){
		$sql = "SELECT * FROM products Where sale=1 and status=0 AND trash=0 ORDER BY created_at DESC LIMIT ". ($page-1)*$limit. ",".$limit;
		$result = $this->getAll($sql);
		return $result;
	}
	
	public function getNewsList(){
		$sql = "SELECT * FROM news Where status=0 AND trash=0 ORDER BY created_at DESC LIMIT 6 ";
		$result = $this->getAll($sql);
		return $result;
	}
	public function getNewsListfull(){
		$sql = "SELECT * FROM news Where status=0 AND trash=0 ORDER BY created_at DESC";
		$result = $this->getAll($sql);
		return $result;
	}
	public function countNewsListfull($limit,$page){
		$sql = "SELECT * FROM news Where status=0 AND trash=0 ORDER BY created_at DESC LIMIT ". ($page-1)*$limit. ",".$limit;
		$result = $this->getAll($sql);
		return $result;
	}
	public function getCategory()
	{
		$sql = "SELECT * FROM `category` WHERE trash=0 AND status=0";
		$result = $this->getAll($sql);
		return $result;
	}
	public function getDetails($id)
	{
		$sql = "SELECT * FROM products Where id=$id";
		$result = $this->getOne($sql);
		return $result;
	}
	public function getComment($id)
	{
		$sql = "SELECT comment.*, users.name,users.avatar FROM comment INNER JOIN users ON comment.user_id = users.id WHERE comment.book_id = $id;";
		$result = $this->getAll($sql);
		return $result;
	}
	public function getCover($id)
	{
		$sql = "SELECT * FROM book_info WHERE book_id=$id AND types='cover' AND trash=0";
		$result = $this->getAll($sql);
		return $result;
	}
	public function getUser($id)
	{
		$sql = "SELECT * FROM users Where id=$id";
		$result = $this->getOne($sql);
		return $result;
	}
	public function getUserOrder($id)
	{
		$sql = "SELECT * FROM users AS u INNER JOIN orders AS o ON u.id = o.customer_id  WHERE o.customer_id =$id";
		$result = $this->getAll($sql);
		return $result;
	}
	public function getNews($id)
	{
		$sql = "SELECT * FROM news Where id=$id LIMIT 5";
		$result = $this->getOne($sql);
		return $result;
	}
	public function getRecommend()
	{
		$userId = $_SESSION['user_id'];
		$sql= "SELECT DISTINCT p.*
				FROM orders o
				JOIN order_details od ON o.id = od.order_id
				JOIN products p ON od.product_id = p.id
				JOIN category c ON p.category_id = c.id
				WHERE o.customer_id = $userId
				AND p.category_id IN (
					SELECT DISTINCT p.category_id
					FROM orders o
					JOIN order_details od ON o.id = od.order_id
					JOIN products p ON od.product_id = p.id
					WHERE o.customer_id = $userId
				)
				AND p.id NOT IN (
					SELECT DISTINCT p.id
					FROM orders o
					JOIN order_details od ON o.id = od.order_id
					JOIN products p ON od.product_id = p.id
					WHERE o.customer_id = $userId
				)
				UNION
				SELECT DISTINCT p.*
				FROM products p
				JOIN category c ON p.category_id = c.id
				WHERE p.category_id IN (
					SELECT DISTINCT p.category_id
					FROM orders o
					JOIN order_details od ON o.id = od.order_id
					JOIN products p ON od.product_id = p.id
					WHERE o.customer_id = $userId
				)
				AND p.id NOT IN (
					SELECT DISTINCT p.id
					FROM orders o
					JOIN order_details od ON o.id = od.order_id
					JOIN products p ON od.product_id = p.id
					WHERE o.customer_id = $userId
				);
				";
		$result = $this->getAll($sql);
		return $result;
	}
	public function countRecommend($limit,$page){
		$userId = $_SESSION['user_id'];
		$sql = "SELECT DISTINCT p.*
				FROM orders o
				JOIN order_details od ON o.id = od.order_id
				JOIN products p ON od.product_id = p.id
				JOIN category c ON p.category_id = c.id
				WHERE o.customer_id = $userId
				AND p.category_id IN (
					SELECT DISTINCT p.category_id
					FROM orders o
					JOIN order_details od ON o.id = od.order_id
					JOIN products p ON od.product_id = p.id
					WHERE o.customer_id = $userId
				)
				AND p.id NOT IN (
					SELECT DISTINCT p.id
					FROM orders o
					JOIN order_details od ON o.id = od.order_id
					JOIN products p ON od.product_id = p.id
					WHERE o.customer_id = $userId
				)
				UNION
				SELECT DISTINCT p.*
				FROM products p
				JOIN category c ON p.category_id = c.id
				WHERE p.category_id IN (
					SELECT DISTINCT p.category_id
					FROM orders o
					JOIN order_details od ON o.id = od.order_id
					JOIN products p ON od.product_id = p.id
					WHERE o.customer_id = $userId
				)
				AND p.id NOT IN (
					SELECT DISTINCT p.id
					FROM orders o
					JOIN order_details od ON o.id = od.order_id
					JOIN products p ON od.product_id = p.id
					WHERE o.customer_id = $userId
				) LIMIT ".($page-1)*$limit. ",".$limit;
		$result = $this->getAll($sql);
		return $result;
	}

	public function getAuthor()
	{
		$userId = $_SESSION['user_id'];
		$sql = "SELECT p.author, COUNT(p.author) AS author_count
				FROM orders o
				JOIN order_details od ON o.id = od.order_id
				JOIN products p ON od.product_id = p.id
				WHERE o.customer_id = $userId
				GROUP BY p.author;
				";
		$result = $this->getAll($sql);

		$maxCount = 0;
		$maxAuthor = null;

		foreach ($result as $author) {
			$count = $author['author_count'];
			if ($count > $maxCount) {
				$maxCount = $count;
				$maxAuthor = $author;
			}
		}
		return $maxAuthor['author'];
	}
	public function getRecommendAuthor($author)
	{
		$userId = $_SESSION['user_id'];
		$sql = "SELECT DISTINCT p.*
				FROM products p
				WHERE p.author = '$author' AND p.id NOT IN (
					SELECT DISTINCT od.product_id
					FROM orders o
					JOIN order_details od ON o.id = od.order_id
					WHERE o.customer_id = $userId
				);";
		$result = $this->getAll($sql);
		return $result;
	}
	public function countRecommendAuthor($author,$limit,$page)
	{
		$userId = $_SESSION['user_id'];
		$sql = "SELECT DISTINCT p.*
				FROM products p
				WHERE p.author = '$author' AND p.id NOT IN (
					SELECT DISTINCT od.product_id
					FROM orders o
					JOIN order_details od ON o.id = od.order_id
					WHERE o.customer_id = $userId
				) LIMIT ".($page-1)*$limit. ",".$limit;
		$result = $this->getAll($sql);
		return $result;
	}
	public function getProductbyCategory($id)
	{
		$sql = "SELECT * FROM products Where trash=0 and status=0 and category_id=$id";
		$result = $this->getAll($sql);
		return $result;
	}
	public function doRegister()
	{
		$i = "temp.png";
		if ($_FILES['avatar']['size'] == 0) {
			echo $_FILES['avatar']['error'];
		} else {
			$file = $_FILES['avatar'];
			$i = $file['name'];
			$u = new Upload();
			$u->doUpload($file, 'avatar');
		}
		$user = array(
			'name'=>$_POST['name'],
			'email'=>$_POST['email'],
			'password'=>md5($_POST['password']) ,
			'phone'=>$_POST['phone'],
			'address'=>$_POST['address'],
			'avatar'=>$i,
			'status'=>0,
			'role'=>0,
			'created_at'=>date("Y-m-d H:i:s")
		);
		$this->addRecord("users",$user);

	}
	public function addComent($id)
	{
		$comment = array(
			'content' => $_POST['comment'],
			'book_id' => $id,
			'user_id' => $_SESSION['user_id']
		);
		$this->addRecord("comment",$comment);
	}
	public function doUpdateUser($id)
	{
		$user = array(
			'name'=>$_POST['name'],
			'phone'=>$_POST['phone'],
			'address'=>$_POST['address'],
		);
		$this->editRecord("users",$user,$id);
	}
	public function doLogin()
	{
		$u = $_POST['email'];
		if (!filter_var($u, FILTER_VALIDATE_EMAIL)) {
			echo "Địa chỉ email không hợp lệ";
		} else {
			$pw = md5($_POST['password']);
			$sql = "SELECT * FROM users WHERE email = '$u' AND password = '".$pw."'";
			$result = $this->getOne($sql);
			return $result;
		}
	}
	
	public function doOrder()
	{
		$order = array(
			'customer_id'=>$_SESSION['user_id'],
			'name'=>$_POST['name'],
			'phone'=>$_POST['phone'],
			'address'=>$_POST['address'],
			'total'=>$_SESSION['total'],
			'note'=>$_POST['note'],
			'method'=>$_POST['sexampleRadios'],
			'payment' => $_POST['payment']
		);
		$this->addRecord("orders",$order);

	}
	public function getOrder(){
		$sql = "SELECT * FROM orders order by id DESC";
		$result = $this->getAll($sql);
		return $result;
	}
	public function checkPass($id, $password)
	{
		$sql = "SELECT * FROM users  WHERE id= $id and password='".md5($password)."'";
		$result = $this->getOne($sql);
		return $result;
	}
	public function doUpdatePass($id, $password)
	{
		$p = md5($password);
		$user = array(
			'password'=>$p,
		);
		$this->editRecord("users",$user,$id);
	}
	public function doDetailsOrder($id, $cart)
	{

		foreach($cart as $item){
			$details = array(
				'order_id'=>$id,
				'product_id'=>$item['id'],
				'qty'=>$item['quantity'],
				'product_price'=>$item['price'],
				'total'=>$item['quantity']*$item['price']
			);
			$this->addRecord("order_details",$details);
		 $sql ="SELECT * FROM products WHERE id = ".$item['id'];
		 $result=[]; 
		 $result['value'] = $this->getOne($sql);
		  $p = $result['value'];
		  $product = array(
			'quantity'=>($p['quantity'] - $item['quantity'])
			);
			$this->editRecord('products',$product,$item['id']);	
		}
	}
	public function deleteOrder($id)
		{
			$sql = "DELETE FROM orders WHERE id=$id";
			$sql2 = "DELETE FROM order_details WHERE order_id=$id";
			$this->setQuery($sql2);
			$this->setQuery($sql);
		}
	public function search($search)
		{
			
			$sql = "SELECT * FROM products WHERE trash=0 AND status=0 AND (product_name LIKE '%$search%' OR publisher LIKE '%$search%' OR author LIKE '%$search%')";
			$result = $this->getAll($sql);
			return $result;
		}
	public function searchcount($search,$limit,$page)
		{
			$sql = "SELECT * FROM products 
					WHERE trash=0 AND status=0 
					AND (product_name LIKE '%$search%' 
					OR publisher LIKE '%$search%' 
					OR author LIKE '%$search%')
					LIMIT ". ($page-1)*$limit. ",".$limit;
			$result = $this->getAll($sql);
			return $result;
		}
}