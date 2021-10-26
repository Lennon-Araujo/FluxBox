<?php include('includes/header.php') ?>
<?php include('includes/menu-lateral.php') ?>
<?php include('includes/barra-superior.php') ?>
<?php include('includes/conexao.php') ?>

<?php
$id = $_GET['id'];
?>
// TODO criar modal, passar ID para método confirmar venda
// site que peguei código https://pt.stackoverflow.com/questions/304609/abrir-um-modal-que-vem-de-uma-pagina-diferente-php
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <button type='button'  onclick='abreModal()' >Abrir</button>

<div class="modal"></div>

    //Ajax
    <script type="text/javascript">
    function abreModal(){
      $.ajax({
        type: 'POST',
        //Caminho do arquivo do seu modal
        url: 'pasta/modal.html',
        success: function(data){              
          $('.modal').html(data);
          $('#myModal').modal('show');
        }
      });
    }
    </script>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" width="100%">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <label class="modal-title">Modal</label>
      </div>
      <div class="modal-body">
        <p>Conteudo</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link waves-effect"  data-dismiss="modal">FECHAR</button>
      </div>
    </div>
  </div>
</div>