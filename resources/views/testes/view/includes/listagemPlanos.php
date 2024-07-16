<?php if ($planos != null) {
    foreach ($planos as $plano)
    {
        echo '<div class="card" style="width:300px">
                  <img class="card-img-top" src="'.$plano->getImagem().'" alt="Card image">
                  <div class="card-body">
                    <h4 class="card-title">'.$plano->getTitulo().'</h4>
                    <p class="card-text">'.$plano->getDescricao().'</p>
                    <p class="card-text">Mensalidade: R$ '.$plano->getValor().'</p>
                    <form method="post">
                        <input type="hidden" value="'.$plano->getId().'" name="idplano">
                        <input type="submit" class="btn btn-primary" value="Aderir ao plano">
                    </form>
                  </div>
            </div>';
    }
}
