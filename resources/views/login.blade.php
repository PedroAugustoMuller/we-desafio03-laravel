<x-layout>
    @section('pageTitle','Login - Portal das Cartas')
    <section style="padding: 20px; background: #eee">
        <div class="container-fluid h-custom shadow p-3 mb-5 bg-white rounded" style="justify-content: center; align-items: center;width: fit-content; border-radius: 10px; padding: 30px">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://img.nsctotal.com.br/wp-content/uploads/2023/11/tarot.jpg"
                         class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="post" action="{{route('login_api')}}">
                        @csrf
                        <div class="errors" style="display: grid">
                            @if($errors->has('email'))
                                <h7 style="margin: 10px 10px 10px 0px; color: red">{{ $errors->first('email') }}</h7>
                            @endif
                            @if($errors->has('cpf'))
                                <h7 style="margin: 10px 10px 10px 0px; color: red">{{ $errors->first('cpf') }}</h7>
                            @endif
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control form-control-lg"
                                   placeholder="Insira seu endereço de email"/>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-3">
                            <label class="form-label" for="cpf">CPF</label>
                            <input type="text" name="cpf" id="cpf" class="form-control form-control-lg"
                                   placeholder="Insira seu CPF"/>
                        </div>
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <input type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                                   style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Login">
                        </div>
                        @if(session()->get('error') !== null)
                            <div class="alert alert-danger" style="margin: 10px 10px 10px 0px;">{{session()->get('error')}}</div>
                        @else
                            <div class="alert alert-danger" style="margin: 10px 10px 10px 0px; visibility: hidden "></div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>

