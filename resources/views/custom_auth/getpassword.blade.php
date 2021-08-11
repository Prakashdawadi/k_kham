 
 <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><php></title>

  <link rel="stylesheet" type="text/css" href="{{asset('frontend/bootstrap/css/bootstrap.min.css')}}">
     <!-- Fontfaces CSS-->
    

  <link rel="stylesheet" type="text/css" href="{{asset('frontend/fontawesome/css/all.min.css')}}">
 
</head>


 <body>

 
 


<div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">

              <div class="row">
     <div class=" alert-danger" id="mydiv"><p>{{session('error')}}</p></div>
   
   </div>
                 <div class="card-header">Reset Password</div>
                      <div class="card-body">
                        <form action="{{url('{token}/updatepassword')}}" method="post">
                           @csrf

                         
                           <input type="hidden" name="token" value="{{$token}}">

                        <!-- <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                          <div class="col-md-6"> -->

                              @foreach($emails as $data)
                                <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $data->email }}" autocomplete="email" autofocus>
                                @endforeach

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                      <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                     <div class="form-group row mb-0">
                           <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 </body>
 




