<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>

<div class="container-fluid">
    <div class="justify-content-center m-4">
    <div class="row">
      <div class="col-lg-4 m-1">
        <div class="profile-card-4 z-depth-3">
          <div class="card">
            <div class="card-body text-center bg-primary rounded-top">
              <div class="user-box">
                <img src="/public/img/avatar.png" alt="user avatar">
              </div>
              <h5 class="mb-1 text-white">Jhon Doe</h5>
              <h6 class="text-light">Aluno</h6>
            </div>
            <div class="card-body">
              <ul class="list-group shadow-none">
                <li class="list-group-item">
                  <div class="list-icon">
                    <i class="fas fa-phone"></i>
                  </div>
                  <div class="list-details">
                    <span>9910XXXXXX</span>
                    <small>Numero de telemóvel</small>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="list-icon">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <div class="list-details">
                    <span>info@example.com</span>
                    <small>Email</small>
                  </div>
                </li>
              </ul>
              <div class="row text-center mt-4">
                <div class="col p-2">
                  <h4 class="mb-1 line-height-5">154</h4>
                  <small class="mb-0 font-weight-bold">Cursos</small>
                </div>
                <div class="col p-2">
                  <h4 class="mb-1 line-height-5">10</h4>
                  <small class="mb-0 font-weight-bold">Nota</small>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="col-lg-7 m-1" >
        <div class="card z-depth-3">
          <div class="card-body">
            <ul class="nav nav-pills nav-pills-primary nav-justified">
              <li class="nav-item">
                <a href="" data-target="#profile" data-toggle="pill" class="nav-link active show"><i
                    class="icon-user"></i> <span class="hidden-xs">Perfil</span></a>
              </li>

              <li class="nav-item">
                <a href="" data-target="#edit" data-toggle="pill" class="nav-link"><i
                    class="icon-note"></i> <span class="hidden-xs">Editar</span></a>
              </li>
            </ul>
            <div class="tab-content p-3">
              <div class="tab-pane active show" id="profile">
                <h5 class="mb-3">Perfil</h5>
                <div class="row">
                  <div class="col-md-6">
                    <h6>About</h6>
                    <p>
                      Web Designer, UI/UX Engineer
                    </p>
                    <h6>Hobbies</h6>
                    <p>
                      Indie music, skiing and hiking. I love the great outdoors.
                    </p>
                  </div>
                  <div class="col-md-6">
                    <h6>Cursos:</h6>
                    <a  class="badge badge-dark text-uppercase "> C++</a>
                    <a  class="badge badge-dark text-uppercase"> python</a>
                    <a  class="badge badge-dark text-uppercase"> machine learning</a>
                    <a  class="badge badge-dark text-uppercase"> matematica</a>

                  </div>
                  <div class="col-md-12">
                    <h5 class="mt-2 mb-3"><i class="far fa-clock float-right"></i> Recent Activity</h5>
                    <table class="table table-hover table-striped">
                      <tbody>
                        <tr>
                          <td>
                            <strong>Abby</strong> joined ACME Project Team in <strong>`Collaboration`</strong>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <strong>Gary</strong> deleted My Board1 in <strong>`Discussions`</strong>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <strong>Kensington</strong> deleted MyBoard3 in <strong>`Discussions`</strong>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <strong>John</strong> deleted My Board1 in <strong>`Discussions`</strong>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <strong>Skell</strong> deleted his post Look at Why this is.. in
                            <strong>`Discussions`</strong>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!--/row-->
              </div>
              
              <div class="tab-pane" id="edit">
                <form>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">First name</label>
                    <div class="col-lg-9">
                      <input class="form-control" type="text" value="Mark">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                    <div class="col-lg-9">
                      <input class="form-control" type="text" value="Jhonsan">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                    <div class="col-lg-9">
                      <input class="form-control" type="email" value="mark@example.com">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Change profile</label>
                    <div class="col-lg-9">
                      <div class="custom-file" id="customFile">
                        <input type="file" class="custom-file-input" id="exampleInputFile" aria-describedby="fileHelp">
                        <label class="custom-file-label" for="exampleInputFile">
                            Selecionar foto
                        </label>
                    </div>                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Address</label>
                    <div class="col-lg-9">
                      <input class="form-control" type="text" value="" placeholder="Street">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-6">
                      <input class="form-control" type="text" value="" placeholder="City">
                    </div>
                    <div class="col-lg-3">
                      <input class="form-control" type="text" value="" placeholder="State">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Username</label>
                    <div class="col-lg-9">
                      <input class="form-control" type="text" value="jhonsanmark">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                    <div class="col-lg-9">
                      <input class="form-control" type="password" value="11111122333">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                    <div class="col-lg-9">
                      <input class="form-control" type="password" value="11111122333">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-9">
                      <input type="reset" class="btn btn-secondary" value="Cancel">
                      <input type="button" class="btn btn-primary" value="Save Changes">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>

    </div>
</div>

<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>