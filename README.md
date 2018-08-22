Information
	Project: cuathongtin.com
	created_at: 16/06/2018
	user_make: khoivinhphan

Tài liệu tham khảo:
	Kiến trúc laravel
	https://viblo.asia/p/kien-truc-he-thong-tren-laravel-phan-9-RQqKLM4bZ7z#_1-khoi-tao-project-1

	Thông báo - notification 
	http://codeseven.github.io/toastr/demo.html


table: news
	new_id
	title
	content
	category_new_id
	status: công khai, bản nháp
	user_maked
	user_update
	user_delete

table: category_news
	category_new_id
	name
	user_maked
	user_update
	user_delete

table: products
	product_id
	name
	image
	price
	description
	details
	availability (tình trạng: còn/hết/...)
	status: (trạng thái: công khai/bản nháp)



