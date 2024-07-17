<x-layout>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    @section('pageTitle','Associação - Portal das Cartas')
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
                                        <x-associacao.plano :plano="$plano??null"></x-associacao.plano>
                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="/" class="text-body"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>Planos</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-body-tertiary">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Informações</h3>
                                        <hr class="my-4">
                                        <x-associacao.desconto :plano="$plano??null" :planoDesconto="$planoDesconto??null"></x-associacao.desconto>
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
