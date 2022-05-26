@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Profilim') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                            <div class="card p-4">
                                <div class=" image d-flex flex-column justify-content-center align-items-center">
                                    <button class="btn btn-secondary">
                                        <img src="{{ asset('images/' . $user->image) }}"
                                            onerror="this.onerror=null;this.src='{{ asset('assest/images/logo.gif') }}'"
                                            height="100" width="100" />
                                    </button>
                                    <span class="name mt-3">{{ $user->name }}</span>
                                    <span class="idd">{{ $user->email }}</span>
                                    <div class=" d-flex mt-2">
                                        <button type="button" class="btn1 btn-dark" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">Profil Güncelle</button>
                                    </div>
                                    <div class=" px-2 rounded mt-4 date "> <span class="join">
                                            {{ $user->created_at }} Tarihinde kayıt oldunuz</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profilim Güncelle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                         <!-- Form Group (image)-->
                         <div class="mb-3">
                            <label class="small mb-1" for="inputimage">Resim (resim değişmesini istemiyorsanız boş bırakın)</label>
                            <input class="form-control" id="inputimage" type="file"  name="image" accept="image/png, image/gif, image/jpeg, image/jpg" >
                        </div>
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">İsim </label>
                            <input class="form-control" id="inputUsername" type="text" name="name" placeholder="Enter your username" value="{{ $user->name }}">
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email </label>
                            <input class="form-control" id="inputEmailAddress" type="email" name="email"
                                placeholder="Enter your email address" value="{{ $user->email }}">
                        </div>
                        <!-- Form Group (password)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputpassword">Şifre (şifre değişmesini istemiyorsanız boş bırakın)</label>
                            <input class="form-control" id="inputpassword" type="text" name="password" placeholder="Enter your password">
                        </div>
                    </div>
                    <!-- Save changes button-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>







            </div>
        </div>
    </div>
@endsection
