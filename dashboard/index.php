<?php 
require 'header.php'; 
require 'navbar.php';
require 'sidebar.php';
?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
          </div>

          <h2>Artículos</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#Id</th>
                  <th>Autor</th>
                  <th>Fecha</th>
                  <th>Titulo</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody id="articles">
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <?php require 'footer.php'; ?>