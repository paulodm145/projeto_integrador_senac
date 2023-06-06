<?php
    session_start();
    if(!$_SESSION['pass']) {
        header('Location: ./template/login.php');
        exit();
    }
?>

<?php include 'template/topo.php'; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'template/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <?php include 'template/topbar.php' ?>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php 
                        if (isset($_GET["page"])) {
                            $page = $_GET["page"];
                            include 'template/'.$page.'.php';
                        } 

                        if (!isset($_GET["page"])) {
                            include 'template/pagina-inicial.php';
                        } 
                    ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="./app/operacoes/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <script>

    </script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script> -->

    <script>
        $(document).ready(function () {
            $('.datatable').DataTable();
        });
    </script>

    <script type="text/javascript">
      
      function deletePesq(id){
        swal({
              title: "Tem certeza que deseja deletar?",
              text: "Uma vez deletada, você não poderá recuperar mais a pesquisa!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  //COISA AQUI PRA FAZER
                  $.ajax({
                    method: "POST",
                    data: {"id":id, "op":2},
                    url:"http://localhost/projeto_integrador_senac/app/operacoes/pesquisa-op.php",
                    success:function (data){
                       swal("Sua pesquisa foi deletada com sucesso!", {
                            icon: "success",
                        });
                        $("#tbl_pesquisa_"+id).remove()
                    },
                    error:function (error){
                      console.error("Erro!", error);
                    }
                  })
                  // swal("Sua pesquisa foi deletada com sucesso!", {
                  //   icon: "success",
                  // });
                } 
              });
        }


        $.ajax({
            method: "POST",
            data: {"op":0},
            url:"http://localhost/projeto_integrador_senac/app/operacoes/pesquisa-op.php",
            success:function(data){
                console.log("Sucesso",data)
            }
        })

        
        $(document).ready(

            $.ajax({
            method: "GET",
            url:"http://localhost/projeto_integrador_senac/app/operacoes/pesquisa-op.php?operacao=listagem",
            success:function(data){
                console.log("Sucesso",data)

                let tabela = ``;
                data.forEach(element => {

                    tabela += `<tr id="tbl_pesquisa_${element.id}" >
                            <td>${element.id}</td>
                            <td>após id_option</td>
                            <td>17/05/2023</td>
                            <td>31/05/2023</td>
                            <td>Athos RH</td>
                            <td>32</td>
                            <td>
                                <a href="" class="btn btn-primary">Editar</a>
                                <a onclick="deletePesq(${element.id})" class="btn btn-danger">Excluir</a>
                            </td>
                            </tr> `
                        });

                $("#tabela-pesquisa").html(tabela);
            },
            error :function (err) {
                console.log(err.responseText);
            }
        })

        )
    </script>


    

</body>

</html>