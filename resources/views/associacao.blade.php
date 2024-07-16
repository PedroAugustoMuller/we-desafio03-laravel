<x-layout>
    <section class="h-100 h-custom" style="background-color: #d2c9ff;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0">Associação</h1>
                                        </div>
                                        @if(isset($plano))
                                            <hr class="my-4">

                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img
                                                        src="{{$plano->imagem}}"
                                                        class="img-fluid rounded-3" alt="Imagem Produto">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h6 class="text-muted">Plano</h6>
                                                    <h6 class="mb-0">{{$plano->dscplano}}</h6>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">

                                                    <h6 class="mb-0">Mensalidade: R$ {{$plano->valor_mensal}}</h6>

                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                                                </div>
                                            </div>
                                            <hr class="my-4">
                                        @else
                                            <hr class="my-4">
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <h6 class="mb-0">Nenhum plano selecionado</h6>
                                            </div>
                                            <hr class="my-4">
                                        @endif
                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="/" class="text-body"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>Outros planos</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-body-tertiary">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Informações</h3>
                                        <hr class="my-4">
                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">Preço Total</h5>
                                            @if(isset($plano))
                                            @else
                                            @endif

                                        </div>
                                        <form method="post">
                                            <input type="hidden" name="associar">
                                            <input type="submit" data-mdb-button-init data-mdb-ripple-init
                                                   class="btn btn-dark btn-block btn-lg"
                                                   data-mdb-ripple-color="dark" value="Finalizar Associação">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
