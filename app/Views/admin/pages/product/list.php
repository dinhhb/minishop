<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Danh sách sản phẩm</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách sản phẩm</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>SKU</th>
                      <th>Tên</th>
                      <th>Giá</th>
                      <th>Cân nặng</th>
                      <th>Mô tả giỏ hàng</th>
                      <th>Mô tả ngắn</th>
                      <th>Mô tả đầy đủ</th>
                      <th>Tiêu đề</th>
                      <th>Hình ảnh</th>
                      <th>ID Danh mục</th>
                      <th>Ngày cập nhật</th>
                      <th>Tồn</th>
                      <th>Trực tiếp</th>
                      <th>Không giới hạn</th>
                      <th>Địa chỉ</th>
                      <th>Tuỳ chọn</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php foreach ($products as $product) { ?>
                      <tr>
                        <td><?= $product['ProductID'] ?></td>
                        <td><?= $product['ProductSKU'] ?></td>
                        <td><?= $product['ProductName'] ?></td>
                        <td><?= $product['ProductPrice'] ?></td>
                        <td><?= $product['ProductWeight'] ?></td>
                        <td><?= $product['ProductCartDesc'] ?></td>
                        <td><?= $product['ProductShortDesc'] ?></td>
                        <td><?= $product['ProductLongDesc'] ?></td>
                        <td><?= $product['ProductThumb'] ?></td>
                        <td><?= $product['ProductImage'] ?></td>
                        <td><?= $product['ProductCategoryID'] ?></td>
                        <td><?= $product['ProductUpdateDate'] ?></td>
                        <td><?= $product['ProductStock'] ?></td>
                        <td><?= $product['ProductLive'] ?></td>
                        <td><?= $product['ProductUnlimited'] ?></td>
                        <td><?= $product['ProductLocation'] ?></td>
                        <td>
                        <!-- <a href="#" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Xem chi tiết</a> -->
                          <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Sửa</a>
                          <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Xoá</a>
                        </td>               
                      </tr>
                    <?php } ?>
                  </tbody>


                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->