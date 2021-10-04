@extends('master')
@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-body">
            <h2 class="section-title" style="text-transform: capitalize">Hi, {{ Auth::user()->name }} !!</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 ">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            @if ($data->foto == null)
                                <img src="{{ asset('/assets/img/avatar/avatar-1.png') }}" alt=""
                                    class="rounded-circle profile-widget-picture">
                            @else
                                <img alt="image" src="{{ asset("/img/$data->foto") }}"
                                    class="rounded-circle profile-widget-picture">
                            @endif
                            <form action="{{ route('profile.edit', [Auth::user()->id]) }}" method="post"
                                class="needs-validation" enctype="multipart/form-data">
                                @csrf
                                <label for="foto">
                                    <a class="btn btn-secondary rounded-circle"
                                        style="position: absolute; z-index: 999; margin-left: -25px; margin-top: 20px;">
                                        <span class="fa fa-camera"></span>
                                    </a>
                                </label>
                                <input type="file" name="foto" id="foto" class="d-none" value="">
                                <div class="profile-widget-items">
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Order</div>
                                        @if ($order >= 1000)
                                            <div class="profile-widget-item-value">{{ $order / 1000 }}K</div>
                                        @else
                                            <div class="profile-widget-item-value">{{ $order }}</div>
                                        @endif
                                    </div>
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Email</div>
                                        <div class="profile-widget-item-value">{{ $data->email }}</div>
                                    </div>
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Phone</div>
                                        <div class="profile-widget-item-value">{{ $data->tlp }}</div>
                                    </div>
                                </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">{{ $data->name }} <div
                                    class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div>
                                    <span style="text-transform: capitalize;">{{ $data->role }}</span>
                                </div>
                            </div>
                            {!! $data->deks !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>First Name</label>
                                    <input type="text" class="form-control"
                                        value="{{ Str::before(Auth::user()->name, ' ') }}" required="" name="nama_dp">
                                    <div class="invalid-feedback">
                                        Please fill in the first name
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control"
                                        value="{{ Str::after(Auth::user()->name, ' ') }}" required="" name="nama_bl">
                                    <div class="invalid-feedback">
                                        Please fill in the last name
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 col-12">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="{{ $data->email }}" required=""
                                        name="email">
                                    <div class="invalid-feedback">
                                        Please fill in the email
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>Phone</label>
                                    <input type="tel" class="form-control" value="{{ $data->tlp }}" name="tlp">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Gender</label>
                                    <select name="jenis_kelamin" id="" class="form-control">
                                        @if ($data->jenis_kelamin == 'laki-laki')
                                            <option value="{{ $data->jenis_kelamin }}">Laki-laki
                                            </option>
                                            <option value="perempuan">Perempuan</option>
                                        @else
                                            <option value="{{ $data->jenis_kelamin }}">Perempuan
                                            </option>
                                            <option value="laki-laki">Laki-laki</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>Address</label>
                                    <textarea name="alamat" id="" cols="30" rows="30"
                                        class="form-control">{{ $data->alamat }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>Description</label>
                                    <textarea name="deks" id="" cols="30" rows="30"
                                        class="form-control ckeditor">{{ $data->deks }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary" type="submit">Save Changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
@endpush
