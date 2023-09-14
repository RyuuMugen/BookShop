
<?php
class Admin_Model extends Model
{
	function __construct()
	{
		parent::__construct();
	}
	public function cateAdd()
	{
		$cate = array(
			'category_name' => $_POST['category_name'],
			'parent' => $_POST['parent'],
			'status' => $_POST['status'],

		);
		$this->addRecord('category', $cate);
	}
	public function cateEdit($id)
	{
		$cate = array(
			'category_name' => $_POST['category_name'],
			'status' => $_POST['status'],

		);
		$this->editRecord('category', $cate, $id);
	}
	public function deleteOrder($id)
		{
			$sql = "DELETE FROM orders WHERE id=$id";
			$sql2 = "DELETE FROM order_details WHERE order_id=$id";
			$this->setQuery($sql2);
			$this->setQuery($sql);
		}
	public function orderEdit($id)
	{
		$cate = array(
			'name' => $_POST['name'],
			'phone' => $_POST['phone'],
			'address' => $_POST['address'],
			'delivered' => $_POST['status']

		);
		$this->editRecord('orders', $cate, $id);
	}
	public function productAdd()
	{
		$i = "temp.png";
		if ($_FILES['image']['size'] == 0) {
			echo $_FILES['image']['error'];
		} else {
			$file = $_FILES['image'];
			$i = $file['name'];
			$u = new Upload();
			$u->doUpload($file, 'book');
		}
		$pro = array(
			'product_name' => $_POST['product_name'],
			'publisher' => $_POST['publisher'],
			'author' => $_POST['author'],
			'category_id' => $_POST['category_id'],
			'image' => $i,
			'sale' => $_POST['sale'],
			'quantity' => $_POST['quantity'],
			'price' => $_POST['price'],
			'saleprice' => $_POST['saleprice'],
			'product_detail' => $_POST['product_detail'],
			'status' => $_POST['status'],
			'created_at' => date("Y-m-d H:i:s"),
		);
		$this->addRecord('products', $pro);
	}


	public function newsAdd()
	{
		$i = "temp.png";
		if ($_FILES['avatar']['size'] == 0) {
			echo $_FILES['avatar']['error'];
		} else {
			$file = $_FILES['avatar'];
			$i = $file['name'];
			$u = new Upload();
			$u->doUpload($file, 'news');
		}
		$news = array(
			'title' => $_POST['title'],
			'short_description' => $_POST['short_description'],
			'content' => $_POST['content'],
			'avatar' => $i,
			'status' => $_POST['status'],
			'created_at' => date("Y-m-d H:i:s"),
		);
		$this->addRecord('news', $news);
	}

	public function bannerAdd()
	{
		$i = "temp.png";
		if ($_FILES['avatar']['size'] == 0) {
			echo $_FILES['avatar']['error'];
		} else {
			$file = $_FILES['avatar'];
			$i = $file['name'];
			$u = new Upload();
			$u->doUpload($file, 'banner');
		}
		$banner = array(
			'title' => $_POST['title'],
			'date_start' => date($_POST['startdate']),
			'date_end' => date($_POST['enddate']),
			'image' => $i,
			'status' => $_POST['status'],
		);
		$this->addRecord('banner', $banner);
	}
	public function infoAdd()
	{
		$u = new Upload();
		foreach ($_FILES['img']['name'] as $key => $name) {
			$file = array(
				'name' => $_FILES['img']['name'][$key],
				'type' => $_FILES['img']['type'][$key],
				'tmp_name' => $_FILES['img']['tmp_name'][$key],
				'error' => $_FILES['img']['error'][$key],
				'size' => $_FILES['img']['size'][$key]
			);
			$u->doUpload($file, 'bookinfo');
		}
		$pages = ($_POST['type'] == 'cover') ? 0 : 1;
		foreach ($_FILES['img']['name'] as $key => $name) {
			$info = array(
				'book_id' => $_POST['id'],
				'book_images' => $name,
				'types' => $_POST['type'],
				'pages' => $pages,
				'trash' => 0,
			);
			$this->addRecord('book_info', $info);

			if ($_POST['type'] == 'read') {
				$pages++;
			}
		}
	}
	public function productEdit($id)
	{
		$pro = array(
			'product_name' => $_POST['product_name'],
			'publisher' => $_POST['publisher'],
			'author' => $_POST['author'],
			'category_id' => $_POST['category_id'],
			'sale' => $_POST['sale'],
			'quantity' => $_POST['quantity'],
			'price' => $_POST['price'],
			'saleprice' => $_POST['saleprice'],
			'product_detail' => $_POST['product_detail'],
			'status' => $_POST['status'],
			'created_at' => date("Y-m-d H:i:s"),
		);
		if ($_FILES['image']['size'] != 0) {
			$file = $_FILES['image'];
			$i = $file['name'];
			$pro['image'] = $i;
			$u = new Upload();
			$u->doUpload($file, 'book');
		}
		$this->editRecord('products', $pro, $id);
	}
	public function newsEdit($id)
	{
		$pro = array(
			'title' => $_POST['title'],
			'short_description' => $_POST['short_description'],
			'content' => $_POST['content'],
			'status' => $_POST['status'],
		);
		if ($_FILES['avatar']['size'] != 0) {
			$file = $_FILES['avatar'];
			$i = $file['name'];
			$pro['avatar'] = $i;
			$u = new Upload();
			$u->doUpload($file, 'news');
		}
		$this->editRecord('news', $pro, $id);
	}
	public function infoEdit($id)
	{
		$pro = array(
			'types' => $_POST['status'],
		);
		if ($_FILES['avatar']['size'] != 0) {
			$file = $_FILES['avatar'];
			$i = $file['name'];
			$pro['book_images'] = $i;
			$u = new Upload();
			$u->doUpload($file, 'bookinfo');
		}
		$this->editRecord('book_info', $pro, $id);
	}
	public function bannerEdit($id)
	{
		$pro = array(
			'title' => $_POST['title'],
			'date_start' => $_POST['startdate'],
			'date_end' => $_POST['enddate'],
			'status' => $_POST['status'],
		);
		if ($_FILES['avatar']['size'] != 0) {
			$file = $_FILES['avatar'];
			$i = $file['name'];
			$pro['image'] = $i;
			$u = new Upload();
			$u->doUpload($file, 'banner');
		}
		$this->editRecord('banner', $pro, $id);
	}
}

?>