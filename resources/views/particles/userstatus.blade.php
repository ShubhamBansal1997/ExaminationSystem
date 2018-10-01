@if(\App\Users::checkUserStatus()=='0')
        <div class="alert alert-success fade in">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              Sorry, your phone number is not verified
              </div>
        @endif