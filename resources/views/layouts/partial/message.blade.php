  @if ($errors->any())
      @foreach ($errors->all() as $error)
                          
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="material-icons">close</i>
          </button>
              <span> <b> Danger - </b> {{ $error }} </span>
        </div>
      @endforeach
  @endif


  @if(Session::has('success'))
                    <div class="card-body">

                      <div class="alert alert-outline-success alert-dismissible" role="alert">

                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        
                        <div class="alert-icon">
                         <i class="fa fa-check"></i>
                        </div>

                        <div class="alert-message">
                          <span><strong>Success!</strong> {{ Session::get('success') }}</span>
                        </div>
                      </div>
                    </div>
  @endif

  @if(Session::has('error'))
                    <div class="card-body">

                      <div class="alert alert-outline-danger alert-dismissible" role="alert">

                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        
                        <div class="alert-icon">
                         <i class="fa fa-check"></i>
                        </div>

                        <div class="alert-message">
                          <span><strong>Opps!</strong> {{ Session::get('error') }}</span>
                        </div>
                      </div>
                    </div>
  @endif