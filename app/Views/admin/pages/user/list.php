<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý tài khoản</h1>
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
                <h3 class="card-title">Danh sách tài khoản</h3>

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
                    <th>Email</th>
                    <th>Password</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Email Verified</th>
                    <th>Registration Date</th>
                    <th>Verification Code</th>
                    <th>IP</th>
                    <th>Phone</th>
                    <th>Fax</th>
                    <th>Country</th>
                    <th>Address</th>
                    <th>Address 2</th>
                    <th>Is Admin</th>
                    <th>Option</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php foreach ($users as $user){ ?>
                      <tr>
                        <td><?= $user['UserID'] ?></td>
                        <td><?= $user['UserEmail'] ?></td>
                        <td><?= $user['UserPassword'] ?></td>
                        <td><?= $user['UserFirstName'] ?></td>
                        <td><?= $user['UserLastName'] ?></td>
                        <td><?= $user['UserCity'] ?></td>
                        <td><?= $user['UserState'] ?></td>
                        <td><?= $user['UserZip'] ?></td>
                        <td><?= $user['UserEmailVerified'] ?></td>
                        <td><?= $user['UserRegistrationDate'] ?></td>
                        <td><?= $user['UserVerificationCode'] ?></td>
                        <td><?= $user['UserIP'] ?></td>
                        <td><?= $user['UserPhone'] ?></td>
                        <td><?= $user['UserFax'] ?></td>
                        <td><?= $user['UserCountry'] ?></td>
                        <td><?= $user['UserAddress'] ?></td>
                        <td><?= $user['UserAddress2'] ?></td>
                        <td><?= $user['UserIsAdmin'] ?></td>
                        <td>
                        <!-- <a href="#" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Xem chi tiết</a> -->
                          <a href="admin/user/edit/<?= $user['UserID'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Sửa</a>
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