<?php
if(!empty($_SESSION['idplano'])){
        echo '<hr class="my-4">

                                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img
                                                    src="' . $plano->getImagem() . '"
                                                    class="img-fluid rounded-3" alt="Imagem Produto">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <h6 class="text-muted">Plano</h6>
                                            <h6 class="mb-0">'.$plano->getTitulo().'</h6>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                             
                                            <h6 class="mb-0">Mensalidade: R$' . $plano->getValor(). '</h6>
                                             
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>
                                    <hr class="my-4">';
}
else {
    echo '<hr class="my-4">
              <div class="col-md-3 col-lg-3 col-xl-3">
                  <h6 class="mb-0">Nenhum plano selecionado</h6>
              </div>
          <hr class="my-4">';
}