@extends('admin.app')
@section('content')

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Edit Content Writer</h1>
       <h1 class="page-header">{{ isset($con->Sno) ? "EDIT": "ENTER" }} Content Writer</h1>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Expert Details
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form role="form" method="POST" action="{{ URL::to('admin/editcon') }}/{{$content->id}}" enctype='multipart/form-data' >
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>First name</label>
                          <input class="form-control" type="text" value="{{ $content->fname}}" name="fname" readonly>
                        </div>
                        <div class="form-group">
                          <label>Last name</label>
                          <input class="form-control" value="{{ $content->lname}}" name='lname' readonly>
                        </div>
                        <div class="form-group">
                          <label>Phone number</label>
                          <input class="form-control" value="{{ $content->phone}}" name='phone' required>
                        </div>
                        <div class="form-group">
                          <label>Email ID</label>
                          <input class="form-control" value="{{ $content->email}}" name="email" required>
                        </div>
                         <div class="form-group">
                          <label>Password</label>
                          <input type="password" class="form-control" value="{{ $content->password}}" name="password" required>
                        </div>
                          <div class="form-group">
                          <label>Photo of content writter</label>
                          <input class="form-control" value="{{ $content->profile_pic}}" type="file" name="profile_pic" >  @if($content->profile_pic!=null)
                          
                          Profile Pic already uploaded. To change it choose file again.
                          
                          @endif
                        </div>
                          <div class="form-group">
                          <label>ID number</label>
                          <input class="form-control" value="{{ $content->id_proof}}" name="id_proof" required>
                        </div>
                         <div class="form-group">
                          <label>ID proof file</label>
                          <input class="form-control" type="file" value="{{ $content->id_proof_file}}" name="id_proof_file" >
                          </br>
                          @if($content->id_proof_file!=null)
                          
                          ID Proof file already uploaded. To change it choose file again.
                           @endif
                        </div>
                         <div class="form-group">
                          <label>Section(s)</label>
                          <select class="form-control" name="section[]" multiple required>
                         
<option value="{{$content->section}}">{{$content->section}}</option>
<option value="Physics XIth">Physics XIth</option>
<option value="Physics XIIth">Physics XIIth</option>
<option value="Biology XIth">Biology XIth</option>
<option value="Biology XIIth">Biology XIIth</option>
<option value="Chemistry XIth">Chemistry XIth</option>
<option value="Chemistry XIIth">Chemistry XIIth</option>
<option value="Test Series NEET">Test Series NEET</option>
<option value="Test Series AIIMS">Test Series AIIMS</option>
<option value="Test Series JIPMER">Test Series JIPMER</option>
<option value="Test Series EAMCET">Test Series EAMCET</option>

                          </select>
                        </div>
                        
                        
                        

                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>

              </div>
              </form>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
