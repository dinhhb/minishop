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
                      <th>User ID</th>
                      <th>Amount</th>
                      <th>Ship Name</th>
                      <th>Ship Address</th>
                      <th>Ship Address 2</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Zip</th>
                      <th>Country</th>
                      <th>Phone</th>
                      <th>Fax</th>
                      <th>Shipping</th>
                      <th>Tax</th>
                      <th>Email</th>
                      <th>Date</th>
                      <th>Shipped</th>
                      <th>Tracking number</th>
                      <th>Option</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php foreach ($orders as $order){ ?>
                      <tr>
                        <td><?= $order['OrderID'] ?></td>
                        <td><?= $order['OrderUserID'] ?></td>
                        <td><?= $order['OrderAmount'] ?></td>
                        <td><?= $order['OrderShipName'] ?></td>
                        <td><?= $order['OrderShipAddress'] ?></td>
                        <td><?= $order['OrderShipAddress2'] ?></td>
                        <td><?= $order['OrderCity'] ?></td>
                        <td><?= $order['OrderState'] ?></td>
                        <td><?= $order['OrderZip'] ?></td>
                        <td><?= $order['OrderCountry'] ?></td>
                        <td><?= $order['OrderPhone'] ?></td>
                        <td><?= $order['OrderFax'] ?></td>
                        <td><?= $order['OrderShipping'] ?></td>
                        <td><?= $order['OrderTax'] ?></td>
                        <td><?= $order['OrderEmail'] ?></td>
                        <td><?= $order['OrderDate'] ?></td>
                        <td><?= $order['OrderShipped'] ?></td>
                        <td><?= $order['OrderTrackingNumber'] ?></td>
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