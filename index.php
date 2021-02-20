<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='assets/css/main.min.css' rel='stylesheet' />
<link rel="stylesheet" href="assets/css/calendar.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/style.css">
<script src="assets/js/jquery-3.5.1.min.js"></script>
<script src='assets/js/main.min.js'></script>
<script src="assets/js/locales-all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="assets/js/script.js"></script>

</head>
<body>
<?php 
if(isset($_SESSION['msg'])){
  echo  $_SESSION['msg'];
  unset($_SESSION['msg']);
}
?>


  <div id='loading'>loading...</div>

  <div id='calendar'></div>

  <!-- Modal -->
<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="visevent">
          <p>Id do Eventp:</p>
          <div id="id"></div>
          <p>Título do Evento</p>
          <div id="title"></div>
          <p>Inicio do Evento</p>
          <div id="start"></div>
          <p>Fim do Evento</p>
          <div id="end"></div>
          <button class="btn btn-warning btn-canc-vis">Editar</button>
        </div>
        <div class="formedit">
          FORM
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
 <!-- Modal 02-->
 <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form id="addevent" method="POST">
            <span id="msg-cad"></span>
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
                </div>
                <div class="form-group">
                    <label for="color">Cor</label>
                   <select name="color" id="color" class="form-control">
                   <option style="color:#FFF700" value="#FFF700">Amarelo</option>
                   <option style="color:#0071C5" value="#0071C5">Azul Turquesa</option>
                   <option style="color:#FF4500" value="#FF4500">Laranja</option>
                   <option style="color:#8B4513" value="#8B4513">Marrom</option>
                   <option style="color:#1C1C1C" value="#1C1C1C">Preto</option>
                   <option style="color:#436EEE" value="#436EEE">Royal Blue</option>
                   <option style="color:#A020F0" value="#A020F0">Roxo</option>
                   <option style="color:#40E0D0" value="#40E0D0">Turquesa</option>
                   <option style="color:#228B22" value="#228B22">Verde</option>
                   <option style="color:#8B0000" value="#8B0000">Vermelho</option>
                   </select>
                </div>
                <div class="form-group">
                    <label for="txt_inicio">Início do Evento</label>
                    <input type="text" class="form-control" id="start" name="start" onkeypress="DataHora(event, this)">
                </div>
                <div class="form-group">
                    <label for="txt_fim">Fim do Evento</label>
                    <input type="text" class="form-control" id="end" name="end" onkeypress="DataHora(event, this)">
                </div>
                <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-success">Cadastrar</button>
            </form>
        </div>
  </div>
</div>
</body>
</html>
