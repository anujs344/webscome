<div class="container">
    @if (count($errors)>0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" style="margin-top:7px">
                {{ $error }}
            </div>
        @endforeach
    @endif

    @if(session('success'))
        <div class="alert alert-success" style="margin-top:7px">
            {{session('success')}}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger" style="margin-top:7px">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session()->get('error')}}
        </div>
    @endif
    @if(isset($error))
    <div class="alert alert-dismissible alert-warning" style="margin-top:7px">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
       {{$error}}
      </div>
    @endif
    @if(isset($success))
        <div class="alert alert-success alert-dismissible" style="margin-top:7px">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{$success}}
        </div>
    @endif
    </div>
